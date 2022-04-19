<?php 
	
	class news
	{
		private $database;

		private $newsTitle = "";
		private $newsContent = "";
		private $newsImage = "";
		private $newsCategory = "";
		private $newsSources = "";
		private $newsDate = "";
		private $newsUser = "";

		public function __construct($database)
		{
			$this->database = $database;
			$this->newsDate = date("d/m/Y");
		}

		public function addTitleAndContent ($title, $content)
		{
			$this->newsTitle = ucfirst(strtolower(trim($title)));
			$this->newsContent = trim($content);
		}

		public function addImage ($path)
		{
			$this->newsImage = "../model/Uploads/".$path;
		}

		public function addCategory ($category)
		{
			$this->newsCategory = $category;
		}

		public function addSources ($sources)
		{
			$this->newsSources = $sources;			
		}

		public function addUser ($user)
		{
			$this->newsUser = $user;
		}

		public function createNews()
		{
			$db = $this->database;

			$query = $db->prepare("INSERT INTO news (id_category_news, id_user_news, date_news, title_news, content_news, image_news, sourceOneTitle_news, sourceOneUrl_news, sourceTwoTitle_news, sourceTwoUrl_news, sourceThreeTitle_news, sourceThreeUrl_news) VALUES (:category, :user, :datation, :title, :content, :image, :titleOne, :urlOne, :titleTwo, :urlTwo, :titleThree, :urlThree)");
			$query->bindParam(":category", $this->newsCategory);
			$query->bindParam(":user", $this->newsUser);
			$query->bindParam(":datation", $this->newsDate);
			$query->bindParam(":title", $this->newsTitle);
			$query->bindParam(":content", $this->newsContent);
			$query->bindParam(":image", $this->newsImage);
			$query->bindParam(":titleOne", $this->newsSources[0]);
			$query->bindParam(":urlOne", $this->newsSources[1]);
			$query->bindParam(":titleTwo", $this->newsSources[2]);
			$query->bindParam(":urlTwo", $this->newsSources[3]);
			$query->bindParam(":titleThree", $this->newsSources[4]);
			$query->bindParam(":urlThree", $this->newsSources[5]);
			$query->execute();
		}

		public function getNews($categoryName, $lowLimit, $highLimit)
		{
			$db = $this->database;

			$query = $db->prepare("SELECT * FROM news LIMIT :low, :high INNER JOIN category ON news.id_category_news = category.id_category WHERE category.name_category = :categoryName");
			$query->bindParam(":categoryName", $categoryName);
			$query->bindParam(":low", $lowLimit);
			$query->bindParam(":high", $highLimit);
			$query->execute();
			$query->fetchAll();
		}

		public function deleteNews ($id)
		{
			$db = $this->database;

			$query = $db->prepare("SELECT image_news FROM news WHERE id_news = :id");
			$query->bindParam(":id", $id);
			$query->execute();
			$data = $query->fetch();

			$link = str_replace("/model", "", $data["image_news"]);
			unlink($link);

			$query = $db->prepare("DELETE FROM news WHERE id_news = :id");
			$query->bindParam(":id", $id);
			$query->execute();
		}
	}

?>