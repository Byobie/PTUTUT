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

		public function returnID ($argument)
		{
			$db = $this->database;
			$query = $db->prepare("SELECT id_user FROM user WHERE login_user = :login");
			$query->bindParam(":login", $argument);
			$query->execute();
			$result = $query->fetch();

			return $result["id_user"];
		}

		public function returnType ($argument)
		{
			$db = $this->database;
			$query = $db->prepare("SELECT type_user FROM user WHERE login_user = :login");
			$query->bindParam(":login", $argument);
			$query->execute();
			$result = $query->fetch();

			return $result["type_user"];
		}

		public function updateUser ($email, $login, $type, $id)
		{
			$db = $this->database;
			$query = $db->prepare("UPDATE user SET login_user = :login, email_user = :email, type_user = :type WHERE id_user = :id");
			$query->bindParam(":login", $login);
			$query->bindParam(":email", $email);
			$query->bindParam(":type", $type);
			$query->bindParam(":id", $id);
			$query->execute();
		}

		public function deleteUser ($id)
		{
			$db = $this->database;
			$query = $db->prepare("DELETE FROM user WHERE id_user = :id");
			$query->bindParam(":id", $id);
			$query->execute();
		}
	}

?>