<?php 
	require_once 'Mobile_Detect.php';

	class BaseContent
	{			
		private $detect;						// Variable for mobile detection
		private $file;							// Variable for file
		private $contentDir = "Main/";			// The main dir of content
		private $styleDir = "Style/";			// The main dir of style
		private $error;							// Variable for ErrorHandling
		private $db;							// Variable for News Information

		public function __construct($error)
		{
			$this->detect = new Mobile_Detect;
			$this->db = new DataBaseConnection($error);
			$this->error = $error;
		}

		public function GetStyle()
		{
			try
			{
				if(is_dir($this->styleDir))
				{
					if($this->detect->isMobile()) {
						$this->file = "Mobile.css";
					}
					else
					{
						$this->file = "Desktop.css";
					}

					return $this->styleDir . $this->file;
				}
			}
			catch(Exception $ex)
			{
				$this->error->CreateMessage("GetStyle", $ex);
			}
		}

		public function GetMenu()
		{
			try
			{
				if(is_dir($this->contentDir))
				{
					if(file_exists($this->contentDir . "MainMenu.php"))
					{				
						$this->file = "MainMenu.php";
						
					}
					
					return $this->contentDir . $this->file;
				}
			}
			catch(Exception $ex)
			{
				$this->error->CreateMessage("GetMenu", $ex);
			}
		}

		public function GetContent()
		{
			try
			{
				if(is_dir($this->contentDir))
				{
					if(file_exists($this->contentDir . "MainContent.php"))
					{				
						$this->file = "MainContent.php";
					}
					else
					{							
						$this->file = "404.php";
					}

					return $this->contentDir . $this->file;
				}
			}
			catch(Exception $ex)
			{
				$this->error->CreateMessage("GetContent", $ex);
			}
		}

		public function GetFooter()
		{
			try
			{
				if(is_dir($this->contentDir))
				{
					if(file_exists($this->contentDir . "MainFooter.php"))
					{				
						$this->file = "MainFooter.php";
					}

					return $this->contentDir . $this->file;
				}
			}
			catch(Exception $ex)
			{
				$this->error->CreateMessage("GetFooter", $ex);
			}
		}

		public function GetNews()
		{
			$message = "";
			$news = $this->db->GetNewsFromDB();
			foreach($news as $news)
			{
				$message .= "<p>" . $news['message'] . " <span>" . $news['time'] . "</span></p>";
			}
			return $message;
		}
		
		public function GetImage($img)
		{
			$img;
			return require_once('Main/MainImage.php');
		}
	}
?>