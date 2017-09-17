<?php
	require_once('../includes/session.php');
	require_once('../includes/connect.php');
	
	if(isset($_POST['btn-signup'])){
		$username =             		$_POST['username']; 
		$password =             		$_POST['pass']; 
		$password_repeat =      $_POST['passconf']; 
		$email = 							$_POST['mail'];
		$emailconf = 					$_POST['mailconf'];
		$city = 							$_POST['city'];
		$plz = 								$_POST['plz'];
		$street = 						$_POST['street'];
		$newsletter = 				$_POST['newsletter'];
		
		if($newsletter == "on"){
			$letter = 1;	
		}
		else {
			$letter = 0;	
		}
		
		if(isset($_POST['g-recaptcha-response'])){
		  $captcha = $_POST['g-recaptcha-response'];
		}
		if(!$captcha){
		  $errcaptcha =  'Please check the the captcha form!';
		}
		$secretKey = "6LeUJyQTAAAAAK89i4j2SioqJiL9lbe3fSgIOtsO";
		$ip = $_SERVER['REMOTE_ADDR'];
		$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
		$responseKeys = json_decode($response,true);
		if(intval($responseKeys["success"]) == 1) {
			if (strlen($username)>25) {
				$error[] = "Firstname, Lastname und Username dürfen nicht länger als 25 Zeichen sein"; 
			}
			else if (strlen($password)>25 || strlen($password)<8){ 
				$error[] = "Passwort muss zwischen 8 und 25 Zeichen haben!"; 
			}
			else if (!(strlen($plz)>4||strlen($plz)<11)) {
				$error[] = "Postleitzahl muss zwischen 5 und 10 Zeichen liegen!"; 
			}
			else if (!is_numeric($plz)){
				$error[] = "Die Postleitzahl muss numerisch sein!";	
			}
			else if ($email != $emailconf) {	
				$error[] = "E-Mails müssen gleich sein!";
			}
			else if ($password != $password_repeat) {
				$error[] = "Passwörter müssen gleich sein!"; 
			}
			else {
				try
				{
					$stmt = $con->prepare("SELECT username, email FROM users WHERE username=:uname OR email=:umail");
					$stmt->execute(array(':uname' => $username, ':umail'=>$email));
					$row=$stmt->fetch(PDO::FETCH_ASSOC);
					
					if($row['username']==$username) {
						$error[] = "Der Benutzername wird schon verwendet!";
					 }
					else if($row['email']==$email) {
						$error[] = "Die E-Mail wird schon verwendet!";
					}
					else {
						try
						{
							$password_db = hash("sha512", $password);
							
							$stmt = $con->prepare("INSERT INTO users (username, password, email, street, plz, city, newsletter) VALUES (:uname, :upass, :umail, :ustreet, :uplz, :ucity, :uletter)");
							$stmt->bindparam(":uname", $username);
							$stmt->bindparam(":upass", $password_db);
							$stmt->bindparam(":umail", $email);
							$stmt->bindparam(":ustreet", $street);
							$stmt->bindparam(":uplz", $plz);
							$stmt->bindparam(":ucity", $city);
							$stmt->bindparam(":uletter", $letter);
							
							$stmt->execute();
							
							$success = "Erfolgreich regestriert!"; 
						}
						catch(PDOException $e)
						{
						   echo $e->getMessage();
						}    
					}
				}
				catch (PDOException $e)
				{
					echo $e->getMessage();
				}
			}
		}
		else {$errcaptcha = 'You are a Bot :P'; }
	}
	define("TITLE", "Infinal-Online - Register");
	include('../includes/header.php');
?> 
<section  class="inhalt reg">
	<div class="registration">
	<?php if(!isset($_SESSION['username'])) { ?>
	<form method="post" action="register.php">
        <div class="container containerPadding marginTop">
            <fieldset>
                <dl class="formError">
                    <dt>
                        <label for="username">Benutzername</label>
                    </dt>
                    <dd>
                        <input type="text" id="username" name="username" value="<?php echo $username;?>" required="required" class="medium" placeholder="Darksheer" ><br />
                        <small style="position:relative; color:#8F0002; top: 10px;">Der Benutzername muss mindestens 3 und darf maximal 25 Zeichen lang sein.</small>
                    </dd>
                </dl>
            </fieldset>
            <fieldset>
                <dl>
                    <dt>
                        <label for="mail">E-Mail-Adresse</label>
                    </dt>
                    <dd>
                        <input type="email" id="mail" name="mail" value="<?php echo $email;?>" required="required" class="medium" placeholder="deinname@deinprovidername">
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <label for="mailconf">E-Mail-Adresse wiederholen</label>
                    </dt>
                    <dd>
                        <input type="email" id="mailconf" name="mailconf" value="<?php echo $emailconf;?>" required="required" class="medium" placeholder="deinname@deinprovidername">
                    </dd>
                </dl>
            </fieldset>
            <fieldset>
                <dl>
                    <dt>
                        <label for="pass">Kennwort</label>
                    </dt>
                    <dd>
                        <input type="password" id="pass" name="pass" value="" required="required" class="medium"><br />
                        <small style="position:relative; color:#8F0002; top:5px;">Ein sicheres Kennwort sollte mindestens 8 Zeichen lang sein.</small>
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <label for="passconf">Kennwort wiederholen</label>
                    </dt>
                    <dd>
                        <input type="password" id="passconf" name="passconf" value="" required="required" class="medium">
                    </dd>
                </dl>
            </fieldset>
            <fieldset>
                <dl>
                    <dt>
                        <label for="street">Straße</label>
                    </dt>
                    <dd>
                        <input type="text" id="street" name="street" value="<?php echo $street;?>" required="required" class="medium" placeholder="Musterstraße 12">
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <label for="plz">Postleitzahl</label>
                    </dt>
                    <dd>
                        <input type="text" id="plz" name="plz" value="<?php echo $plz;?>" required="required" class="medium" placeholder="12345">
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <label for="city">Stadt</label>
                    </dt>
                    <dd>
                        <input type="text" id="city" name="city" value="<?php echo $city;?>" required="required" class="medium" placeholder="Musterstadt">
                    </dd>
<input type="checkbox" class="newsletter" name="newsletter" class="medium"> Newsletter abbonieren
                </dl>
            </fieldset>
            <fieldset>
                <dl class="">
                    <dt></dt>
                    <dd>
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                        <div class="g-recaptcha" data-sitekey="6LeUJyQTAAAAAHlKT1_LCzE7nzbp7GcrPBCb-FEE"></div>
                    </dd>
                </dl>
            </fieldset>
        </div>
        <div class="formSubmit">
            <input type="submit" class="register_btn" value="Absenden" name="btn-signup" accesskey="s">
        </div>
        <?php
			if(isset($error))
            {
				echo '<div class="error">';
					foreach($error as $error)
					{
						echo $error."<br />"; 
					}
				echo '</div>';
			}

			if(isset($success))
			{
				echo '<div class="success">';
				echo $success;
        		echo '</div>';
			}
		?>
    </form>
    <?php } else { ?>
    	<div class="downerror">
		<h2>Hey <?php echo $_SESSION['username'] ?></h2><br />
		<p>Du bist schon regestriert.</p><br />
        <p><a href='http://infinal-online.de/includes/logout.php'>Möchtest du dich ausloggen?</a></p>
		</div>
    <?php }?>
    <div>
</section>
</main>
<footer class="footer regfooter">
<?php
	include('../includes/footer.php');
?>