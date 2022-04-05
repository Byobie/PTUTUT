<?php 
	
	class uploadImage
	{
		private $database;
        private $target_file = "";
        private $fileToUpload = "";

		public function __construct($database, $targetFile, $fileToUpload)
		{
			$this->database = $database;
            $this->target_file = $targetFile;    
            $this->fileToUpload = $fileToUpload;   
		}

		public function getPath()
		{
			return $this->target_file;
		}

		public function moveFile()
		{
			move_uploaded_file($this->fileToUpload["tmp_name"], $this->target_file.$this->fileToUpload["name"]);
		}

		private function addFileToDatabase()
		{

		}
	}

?>