<?php
	class ErrorMessenger
	{
		private $message = array();

		public function CreateMessage($object, $ex)
		{
			$this->message[] = LANGUAGE::msg('errorMessage1') 
			. $object 
			. '<br /><label class="errorMessage" for="'
			. $object 
			. '">' 
			. LANGUAGE::msg('errorMessage2') 
			. '<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></label><input id="'
			. $object 
			. '" type="checkbox">'
			. "<div>{$ex}</div>";
		}

		public function ContainsMessage()
		{
			if(isset($this->message) && !empty($this->message))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function GetMessage()
		{
			return $this->message;
		}
	}
?>