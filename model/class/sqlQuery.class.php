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