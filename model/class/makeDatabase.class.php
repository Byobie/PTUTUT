<?php 

	//Turns the PDO object into the makeDataBase object. To do that, at the construction, ask the parameters necessary to build the PDO.

	class makeDatabase
	{
		protected $dataBase;

		public function __construct($db_name, $host, $charset, $port, $login, $password)
		{
			$this->dataBase = $this->setDatabase($db_name, $host, $charset, $port, $login, $password);
        }

        public function getDatabase()
        {
        	return $this->dataBase;
        }

		protected function setDatabase($db_name, $host, $charset, $port, $login, $password)
        {
        	$dsn = "mysql:dbname=$db_name;host=$host;charset=$charset;port=$port";
			$user = $login;
			$password = $password;
			$options = [
	            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	            PDO::ATTR_EMULATE_PREPARES   => false,
	        ];

	        try 
	        {
	        	return new PDO($dsn, $user, $password, $options);
	        } 
	        catch (\PDOException $e) 
	        {
	            throw new \PDOException($e->getMessage(), (int)$e->getCode());
	        }
        }
	}

?>