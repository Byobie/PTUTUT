<?php 

	class register
	{
		private $database;

		public function __construct($database)
		{
			$this->database = $database;
		}

		public function checkRegister($username, $password, $confirmPassword, $email)
		{
			$result = $this->registerCheckEmail($email);

			if($result === true)
			{
				$result = $this->registerCheckUsername($username);

				if ($result === true)
				{
					$result = $this->registerCheckPassword($password, $confirmPassword);

					if ($result === true)
					{
						return $result;
					}	
					else
					{
						return $result;
					}				
				}
				else
				{
					return $result;
				}
			}
			else
			{
				return $result;
			}
		}

		private function registerCheckUsername ($username)
		{
			if (!empty($username))
			{
				if(strlen($username) < 10)
				{
					if(preg_match("~[a-zA-Z_0-9]+~", $username))
					{
						$db = $this->database;
						$query = $db->prepare("SELECT id_user FROM user WHERE login_user =:username");
						$query->bindParam(":username", $username);
						$query->execute();

						$user = $query->fetch();

						if(!$user)
						{
							$check = true;
							return $check;
						}
						else
						{
							$error = "This username is already used.";
							return $error;
						}
					}
					else
					{
						$error = "Your login can only be composed of majuscules, minuscules, digits and underscore.";
						return $error;
					}
				}
				else
				{
					$error = "Your username must not exceed 10 characters.";
					return $error;
				}
			}
			else
			{
				$error = "Empty field.";
				return $error;
			}
		}

		private function registerCheckPassword ($password, $confirmPassword)
		{
			if (!empty($password) && !empty($confirmPassword))
			{
				if($password == $confirmPassword)
				{
					if(strlen($password) > 11)
					{
						if(preg_match("~[a-z]+~", $password) && preg_match("~[A-Z]+~", $password) && preg_match("~[0-9]+~", $password) && preg_match("~[^A-Za-z0-9]+~", $password))
						{
							$check = true;
							return $check;
						}
						else
						{
							$error = "Your password must include majuscules, minuscules, digits and specials characters.";
							return $error;
						}
					}
					else
					{
						$error = "Your password must be at least 12 characters long.";
						return $error;
					}
				}
				else
				{
					$error = "Your confirmation password is different from your password.";
					return $error;
				}
			}
			else
			{
				$error = "Empty field.";
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