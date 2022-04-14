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

		public function getNewsByCategory($categoryName, $lowLimit, $highLimit)
		{
			$db = $this->dataBase;

			$query = $db->prepare("SELECT news.* FROM news ORDER BY date_news DESC INNER JOIN category ON news.id_category_news = category.id_category WHERE category.name_category = :categoryName LIMIT :low, :high");
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