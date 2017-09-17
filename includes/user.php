<?php
class USER
{
    private $con;
 
    public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->con = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
 
    public function register($username,$password_db,$email,$street,$plz,$city,$letter)
    {
       try
       {
			$password_db = hash("sha512", $password);
			
			$stmt = $this->con->prepare("INSERT INTO users (username, password, email, street, plz, city, newsletter) VALUES (:uname, :upass, :umail, :ustreet, :uplz, :ucity, :uletter)");
			$stmt->bindparam(":uname", $username);
			$stmt->bindparam(":upass", $password_db);
			$stmt->bindparam(":umail", $email);
			$stmt->bindparam(":ustreet", $street);
			$stmt->bindparam(":uplz", $plz);
			$stmt->bindparam(":ucity", $city);
			$stmt->bindparam(":uletter", $letter);
			
			$stmt->execute();
			
			return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function doLogin($uname,$umail,$upass)
    {
		$pass_hash = hash("sha512", $upass);
		try
		{
			$stmt = $this->db->prepare("SELECT * FROM users WHERE username=:uname OR useremail=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$uname));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if($row['password'] == $pass_hash)
				{
					$_SESSION['user_session'] = $row['username'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
		   echo $e->getMessage();
		}
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
   
   public function redirect($url)
	{
		header("Location: $url");
	}
 
   public function doLogout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>