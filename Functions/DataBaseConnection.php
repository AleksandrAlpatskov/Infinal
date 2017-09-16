<?php
	class DataBaseConnection 
	{
		private $DBNAME = "test";
		private $DBUSER = "root";
		private $DBPASS = "";
		private $DBHOST = "localhost";
		private $con;
		private $error;
		public $news;
		public $date;

		
		public function __construct($error)
		{
			$this->error = $error;
			try
			{
				$this->con = new PDO('mysql:host=' . $this->DBHOST . ';dbname=' . $this->DBNAME, $this->DBUSER, $this->DBPASS);
			}
			catch(PDOException $ex)
			{
				$this->error->CreateMessage("MySQL Connection", $ex);
			}
		}

		public function GetNewsFromDB ()
		{			
			$stmt = $this->con->prepare("SELECT message, time FROM news ORDER BY time DESC LIMIT 5");
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $result;
		}
	}
?>