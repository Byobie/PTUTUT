<?php 
	
	class user
	{
		private $database;

		public function __construct($database)
		{
			$this->database = $database;
		}

		public function createUser ($password, $login, $email)
		{
			$passwordHash = password_hash($password, PASSWORD_DEFAULT);
			$loginTrimmed = trim($login);
			$emailTrimmed = trim($email);

			$db = $this->database;
			$query = $db->prepare("INSERT INTO user (login_user, password_user, email_user) VALUES (:login, :password, :email)");
			$query->bindParam(":login", $loginTrimmed);
			$query->bindParam(":password", $passwordHash);
			$query->bindParam(":email", $emailTrimmed);
			$query->execute();
		}
	}

?>