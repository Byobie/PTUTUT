<?php 

	class publishVerify
	{
		private $database;

		public function __construct($database)
		{
			$this->database = $database;
		}

		public function checkStepOne($title, $content)
		{

			$result = $this->checkTitle($title);

			if($result === true)
			{
				$result = $this->checkContent($content);
				return $result;
			}
			else
			{
				return $result;
			}
		}

		private function checkTitle ($title)
		{
			if(strlen($title) >= 10)
			{
				$result = true;
				return $result;
			}
			else
			{
				$error = "Your title must be at least 10 characters long.";
				return $error;
			}
		}

		private function checkContent ($content)
		{
			if(strlen($content) >= 100)
			{
				$result = true;
				return $result;
			}
			else
			{
				$error = "Your news must be at least 100 characters long.";
				return $error;					
			}
		}
	}

?>