<?php 
	
	class uploadImage
	{
		private $database;
        private $targetFile = "";
        private $fromPath = "";
        private $toPath = "";

		public function __construct($database, $file, $from, $to)
		{
			$this->database = $database;
			$this->targetFile = $file;  
			$this->fromPath = $from;
			$this->toPath = $to;
		}

		public function moveFile()
		{
			rename($this->fromPath.$this->targetFile, $this->toPath.$this->targetFile);
		}
	}

?>