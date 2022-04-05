<?php

    class imageVerify
    {
        private $target_dir = "";
        private $target_file = "";
        private $imageFileType = "";

        public function __construct($path, $file)
        {
            $this->target_dir = $path;
            $this->target_file = $this->target_dir . basename($file["name"]);            
        }

        public function checkImage($submit, $fileToUpload)
        {
            $check = $this->checkDim($submit, $fileToUpload);
            if ($check === true) 
            {
                $check = $this->checkExistence();
                if ($check === true) 
                {
                    $check = $this->checkSize($fileToUpload);
                    if ($check === true)
                    {
                        $check = $this->checkFormat($submit, $fileToUpload);
                        if ($check === true)
                        {
                            return $check;
                        }
                        else
                        {
                            return $check;
                        }
                    }
                    else
                    {
                        return $check;
                    }
                }
                else
                {
                    return $check;
                }
            }
            else
            {
                return $check;
            }
        }

        private function checkDim($submit, $fileToUpload)
        {
            // Check if image file is a actual image or fake image
            if(isset($submit)) 
            {
                $check = getimagesize($fileToUpload["tmp_name"]);

                if($check[0] == 250 && $check[1] == 250) 
                {
                    $result = true;
                    return $result;
                } 
                else 
                {
                    $result = "The image must be 250px on 250px.";
                    return $result; 
                }
            }
            else 
            {
                $result = "An error occured during the uploading. Please, try again.";
                return $result;  
            } 
        }

        private function checkExistence()
        {
            // Check if file already exists
            if (file_exists($this->target_file)) 
            {
                $result = "This name is already used.";
                return $result;  
            }
            else
            {
                $result = true;
                $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
                return $result;              
            }
        }

        private function checkSize($fileToUpload)
        {

            if ($fileToUpload["size"] > 5120000) 
            {
                $result = "Your image must not weight more than 5 MB.";
                return $result;  
            }
            else
            {
                $result = true;
                return $result;              
            }
        }

        private function checkFormat($submit, $fileToUpload)
        {
            // Allow certain file formats

            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $detectedType = exif_imagetype($fileToUpload['tmp_name']);

            if(!in_array($detectedType, $allowedTypes)) 
            {
                $result = "Wrong format. Only jpg, gif, png and jpeg allowed.";
                return $result;  
            }
            else
            {
                $result = true;
                return $result;              
            }
        }
    }

?>
