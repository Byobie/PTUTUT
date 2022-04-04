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
			if(strlen($title) > 10)
			{
				if(preg_match("~[a-zA-Z_0-9.-:!?,]+~", $title))
				{
					$result = true;
					return $result;
				}
				else
				{
					$error = "No special characters allowed in the title.";
					return $error;					
				}
			}
			else
			{
				$error = "Your title must be at least 10 characters long.";
				return $error;
			}
		}

		private function checkContent ($content)
		{
			if(strlen($content) > 200)
			{
				$result = true;
				return $result;
			}
			else
			{
				$error = "Your news must be at least 200 characters long.";
				return $error;					
			}
		}

		private function registerCheckEmail ($email)
		{
			if (!empty($email))
			{
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					$db = $this->database;
					$query = $db->prepare("SELECT id_user FROM user WHERE email_user = :email");
					$query->bindParam(":email", $email);
					$query->execute();

					$email = $query->fetch();

					if(!$email)
					{
						$check = true;
						return $check;	
					}
					else
					{
						$error = "This email adress is already used.";
						return $error;
					}
				}
				else
				{
					$error = "Invalide email adress.";
					return $error;
				}
			}
			else
			{
				$error = "Empty field.";
				return $error;
			}
		}
	}

?>