<?php 

	class sourceVerify
	{
		private $database;

		private $titleOne;
		private $sourceOne;
		private $titleTwo;
		private $sourceTwo;
		private $titleThree;
		private $sourceThree;		

		public function __construct($db)
		{
			$this->database = $db;
		}

		public function assignDatas($nameOne, $urlOne, $nameTwo, $urlTwo, $nameThree, $urlThree)
		{
			$this->titleOne = ucfirst(strtolower(trim($nameOne)));
			$this->sourceOne = strtolower(trim($urlOne));
			$this->titleTwo = ucfirst(strtolower(trim($nameTwo)));
			$this->sourceTwo = strtolower(trim($urlTwo));
			$this->titleThree = ucfirst(strtolower(trim($nameThree)));
			$this->sourceThree = strtolower(trim($urlThree));
		}

		public function returnDatas ()
		{
			$result = [];

			array_push($result, $this->titleOne);
			array_push($result, $this->sourceOne);
			array_push($result, $this->titleTwo);
			array_push($result, $this->sourceTwo);
			array_push($result, $this->titleThree);
			array_push($result, $this->sourceThree);

			return $result;
		}

		public function checkSources()
		{
			$statement = $this->checkTitles();

			if($statement === true)
			{
				$statement = $this->checkUrl();

				if ($statement === true)
				{
					return $statement;
				}	
				else
				{
					return $statement;
				}				
			}
			else
			{
				return $statement;
			}
		}

		private function checkUrl()
		{
			if($this->sourceOne != "")
			{
				if($this->sourceOne != $this->sourceTwo && $this->sourceOne != $this->sourceThree)
				{
					if (filter_var($this->sourceOne, FILTER_VALIDATE_URL)) 
					{
					    if($this->sourceTwo == "" && $this->titleTwo != "")
					    {
	 						$result = "You must provide a valid URL for the source two.";
							return $result;
					    }
					    elseif ($this->sourceTwo != "" && $this->titleTwo != "") 
					    {
					    	if($this->sourceTwo != $this->sourceThree)
					    	{
						    	if (filter_var($this->sourceTwo, FILTER_VALIDATE_URL)) 
								{
							    	if ($this->sourceThree == "" && $this->titleThree != "") 
							    	{
			 							$result = "You must provide a valid URL for the source three.";
										return $result;
							    	}
							    	elseif ($this->sourceThree != "" && $this->titleThree != "") 
							    	{
							    		if (filter_var($this->sourceThree, FILTER_VALIDATE_URL)) 
										{
											$result = true;
											return $result;
										}
										else
										{
											$result = "You must provide a valid URL for the source three.";
											return $result;
										}
							    	}
							    	else
							    	{
										$result = true;
										return $result;
						    		}
								}
								else
								{
									$result = "You must provide a valid URL for the source two.";
									return $result;
								}
							}
							else
							{
								$result = "Two sources or more have the same URL. An must be unique.";
								return $result;
							}
					    }
					    else
					    {
					    	if ($this->sourceThree == "" && $this->titleThree != "") 
					    	{
	 							$result = "You must provide a valid URL for the source three.";
								return $result;
					    	}
					    	elseif ($this->sourceThree != "" && $this->titleThree != "") 
					    	{
					    		if (filter_var($this->sourceThree, FILTER_VALIDATE_URL)) 
								{
									$result = true;
									return $result;
								}
								else
								{
									$result = "You must provide a valid URL for the source three.";
									return $result;
								}
					    	}
					    	else
					    	{
								$result = true;
								return $result;
					    	}
					    }
					} 
					else 
					{
					    $result = "You must provide a valid URL for the source one.";
						return $result;
					}
				}
				else
				{
					$result = "Two sources or more have the same URL. An must be unique.";
					return $result;
				}
			}
			else
			{
				$result = "You must provide a valid URL for the source one.";
				return $result;
			}
		}

		private function checkTitles()
		{
			if($this->titleOne != "")
			{
				if(strlen($this->titleOne) >= 10)
				{
					if($this->titleOne != $this->titleTwo && $this->titleOne != $this->titleThree)
					{
						if($this->titleTwo != "")
						{
							if(strlen($this->titleTwo) >= 10)
							{
								if($this->titleTwo != $this->titleThree)
								{
									if($this->titleThree != "")
									{
										if(strlen($this->titleOne) >= 10)
										{
											$result = true;
											return $result;
										}
										else
										{
											$result = "Title three must be 10 characters long minimum.";
											return $result;
										}
									}
									elseif ($this->titleThree == "" && $this->sourceThree != "")
									{
										$result = "Title needed for source three.";
										return $result;
									}
									else
									{
										$result = true;
										return $result;
									}
								}
								else
								{
									$result = "Two sources or more have the same title. A title must be unique.";
									return $result;
								}
							}
							else
							{
								$result = "Title two must be 10 characters long minimum.";
								return $result;
							}
						}
						elseif ($this->titleTwo == "" && $this->sourceTwo != "")
						{
							$result = "Title needed for source two.";
							return $result;
						}
						else
						{
							if($this->titleThree != "")
							{
								if(strlen($this->titleOne) >= 10)
								{
									$result = true;
									return $result;
								}
								else
								{
									$result = "Title three must be 10 characters long minimum.";
									return $result;
								}
							}
							else
							{
								$result = true;
								return $result;
							}
						}
					}
					else
					{
						$result = "Two sources or more have the same title. A title must be unique.";
						return $result;
					}
				}
				else
				{
					$result = "Title one must be 10 characters long minimum.";
					return $result;
				}
			}
			else
			{
				$result = "Title required for the source one.";
				return $result;
			}
		}
	}

?>