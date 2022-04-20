<?php 
	//Extend makeDatabase class to associate SQL requests in form of methods. Filtrate the result to present a viable array, ready to use.

	require __DIR__ . "/makeDatabase.class.php";
	
	class sqlQuery extends makeDatabase
	{
		public function getDataWithoutCondition ($table, $fields)
		{
			$db = $this->dataBase;
			$query = $db->prepare("SELECT $fields FROM $table");
			$query->execute();

			$data = $query->fetchAll();

			$result = $this->organiseData($data);

			return $result;
		}

		public function getUsersList ($table, $fields)
		{
			$db = $this->dataBase;
			$query = $db->prepare("SELECT $fields FROM $table");
			$query->execute();

			$data = $query->fetchAll();

			return $data;
		}

		public function getMoreNews ($lowLimit, $highLimit)
		{
			$db = $this->dataBase;

			$query = $db->prepare("SELECT news.*, user.login_user, category.name_category FROM news INNER JOIN user ON news.id_user_news = user.id_user INNER JOIN category ON news.id_category_news = category.id_category ORDER BY news.date_news DESC LIMIT :low, :high");
			$query->bindParam(":low", $lowLimit);
			$query->bindParam(":high", $highLimit);
			$query->execute();
			$datas = $query->fetchAll();

			return $datas;
		}

		public function getMoreNewsByCategory ($position, $lowLimit, $highLimit)
		{
			$db = $this->dataBase;

			$query = $db->prepare("SELECT news.*, user.login_user, category.name_category FROM news INNER JOIN user ON news.id_user_news = user.id_user INNER JOIN category ON news.id_category_news = category.id_category WHERE category.name_category = :position ORDER BY news.date_news DESC LIMIT :low, :high");
			$query->bindParam(":low", $lowLimit);
			$query->bindParam(":high", $highLimit);
			$query->bindParam(":position", $position);
			$query->execute();
			$datas = $query->fetchAll();

			return $datas;
		}

		public function getNewsList ($table, $fields)
		{
			$db = $this->dataBase;
			$query = $db->prepare("SELECT $fields FROM $table");
			$query->execute();

			$data = $query->fetchAll();

			return $data;
		}

		public function getNewsByCategory($categoryName, $lowLimit, $highLimit)
		{
			$db = $this->dataBase;

			$query = $db->prepare("SELECT news.* FROM news INNER JOIN category ON news.id_category_news = category.id_category WHERE category.name_category = :categoryName ORDER BY date_news DESC LIMIT :low, :high");
			$query->bindParam(":categoryName", $categoryName);
			$query->bindParam(":low", $lowLimit);
			$query->bindParam(":high", $highLimit);
			$query->execute();
			$datas = $query->fetchAll();

			return $datas;
		}

		public function getAllNews ($table, $fields, $lowLimit, $highLimit)
		{
			$db = $this->dataBase;
			$query = $db->prepare("SELECT $fields FROM $table ORDER BY date_news DESC LIMIT :low, :high");
			$query->bindParam(":low", $lowLimit);
			$query->bindParam(":high", $highLimit);
			$query->execute();

			$data = $query->fetchAll();

			return $data;
		}

		private function organiseData ($queryResult)
		{
			$rawData = [];
			$organisedData = [];

			//Search for the arrays in array, then get the values to build an unique array.

			foreach ($queryResult as $key => $value) 
			{
				foreach ($value as $key2 => $value2)
				{
					array_push($rawData, $value2);			
				}	
			}

			//Get the values two by two. Odd number correspond to keys, even number to the values associated in database. Then, the for processes to build a proper array by associating keys with values.

			for ($i=0; $i < count($rawData); $i = $i+2) 
			{ 
				$z = $i+1;
				$organisedData += [$rawData[$i] => $rawData[$z]];
			}

			return $organisedData;
		}
	}

?>