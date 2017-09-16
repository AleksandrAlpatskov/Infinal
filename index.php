<?php		
	error_reporting(E_ALL);
	require_once 'Functions/ErrorMessenger.php';
	require_once 'Functions/DataBaseConnection.php';
	require_once 'Functions/BaseContent.php';
	require_once 'Resource/language.php';
	require_once 'Functions/ServerConnection.php';

	$error = new ErrorMessenger;
	$content = new BaseContent($error);
	$server = new Server($error);
	$_SESSION['locale'] = 'de';	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">	
		<link type="text/css" rel="stylesheet" href="Extern/Bootstrap/bootstrap.min.css" >		
		<link type="text/css" rel="stylesheet" href="Extern/Fontawesome/font-awesome.min.css" >
		<link type="text/css" rel="stylesheet" href="<?=$content->GetStyle()?>" >	
		<script type="text/javascript" src="Scripts/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>		
	</head>
	<body>
		<?php 		
			if(!@include $content->GetMenu())
			{
				$error->CreateMessage("Include Menu", $content->GetMenu() . LANGUAGE::msg('includeError'));
			}
		?>
		<main>			
			<?php 
				if(!@include $content->GetContent())
				{
					$error->CreateMessage("Include Content", $content->GetContent() . LANGUAGE::msg('includeError'));
				}
			?>
			<?=$content->GetImage("Resource/Images/Flag/de.png")?>
			<img src="Resource/Images/Flag/de.png" oncontextmenu="return false;"/>			
			<img src="Resource/Images/Flag/ru.png" />
			<?=$server.GetArkPlayer()?>
		</main>
		<footer>
			<div class="container">
				<div class="row">
				  <div class="col-md-4 col-sm-6 footerleft ">
					<div class="logofooter">Logo</div>
					<p><?=LANGUAGE::msg('imprint')?></p>
					<p><i class="fa fa-map-pin"></i><?=LANGUAGE::msg('address')?></p>
					<p><i class="fa fa-phone"></i><a href="tel:+4901733656980">+49 0173 3656980</a></p>
					<p><i class="fa fa-envelope"></i><a href="mailto:info@infinal.de"><?=LANGUAGE::msg('email')?></a></p>
		
				  </div>
				  <div class="col-md-2 col-sm-6 paddingtop-bottom">
					<h6 class="heading7"><?=LANGUAGE::msg('generalLink')?></h6>
					<ul class="footer-ul">
					  <li><a href="#"><?=LANGUAGE::msg('infinalcraft')?></a></li>
					  <li><a href="#"><?=LANGUAGE::msg('Infinalark')?></a></li>
					  <li><a href="#"><?=LANGUAGE::msg('infinalspeak')?></a></li>
					  <li><a href="#"><?=LANGUAGE::msg('portfolio')?></a></li>
					</ul>
				  </div>
				  <div class="col-md-3 col-sm-6 paddingtop-bottom">
					<h6 class="heading7"><?=LANGUAGE::msg('latestNews')?></h6>
					<div class="post">
						<?=$content->GetNews()?>
					</div>
				  </div>
				  <div class="col-md-3 col-sm-6 paddingtop-bottom">
					<div class="fb-page" data-href="https://www.facebook.com/infinal" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
					  <div class="fb-xfbml-parse-ignore">
						<blockquote cite="https://www.facebook.com/infinal"><a href="https://www.facebook.com/infinal"><?=LANGUAGE::msg('facebook'); ?></a></blockquote>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</footer>
			<!--footer start from here-->

			<div class="copyright">
			  <div class="container">
				<div class="col-md-6">
				  <p><?=LANGUAGE::msg('copyright'); ?></p>
				</div>
				<div class="col-md-6">
				  <ul class="bottom_ul">
					<li><a href="#"><?=LANGUAGE::msg('home'); ?></a></li>
					<li><a href="#"><?=LANGUAGE::msg('ark'); ?></a></li>					
					<li><a href="#"><?=LANGUAGE::msg('minecraft'); ?></a></li>					
					<li><a href="#"><?=LANGUAGE::msg('teamspeak'); ?></a></li>
					<li><a href="#"><?=LANGUAGE::msg('about'); ?></a></li>
					<li><a href="#"><?=LANGUAGE::msg('support'); ?></a></li>
				  </ul>
				</div>
			  </div>
			</div>
		</footer>
			<?php
				if($error->GetMessage() !== null && !empty($error->GetMessage()))
				{
					foreach($error->GetMessage() as $message)
					{
						print_r($message);
					}
				}
			?>
	</body>
</html>