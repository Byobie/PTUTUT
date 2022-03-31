<?php 
	
	class connexionVerify
	{
		private $database;

		public function __construct($database)
		{
			$this->database = $database;
		}

		public function checkConnexion ($password, $login)
		{
			$loginTrimmed = trim($login);

			$db = $this->database;
			$query = $db->prepare("SELECT password_user FROM user WHERE login_user = :login");
			$query->bindParam(":login", $loginTrimmed);
			$query->execute();

			$login = $query->fetch();

			if($login)
			{
				$passwordHash = $login["password_user"];

				if(password_verify($password, $passwordHash))
				{
					$verify = true;
				}
				else
				{
					$verify = "Wrong password.";
				}
			}
			else
			{
				$verify = "Wrong login.";
			}

			return $verify;
		}

	}

?>