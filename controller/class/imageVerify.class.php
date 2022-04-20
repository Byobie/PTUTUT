<?php

    class imageVerify
    {
        private $targetFile = "";
        private $temporaryFile = "";

        public function __construct($targetDir, $temporaryDir, $file)
        {
            $this->targetFile = $targetDir.$file;
            $this->temporaryFile = $temporaryDir.$file;      
        }

        public function checkImage()
        {
            $check = $this->checkFormat();
            if ($check === true) 
            {
                $check = $this->checkDim();
                if ($check === true) 
                {
                    $check = $this->checkExistence();
                    if ($check === true)
                    {
                        $check = $this->checkSize();
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

        private function deleteImage()
        {
            unlink($this->temporaryFile);
        }

        private function checkDim()
        {
            // Check if image file is a actual image or fake image
            $check = getimagesize($this->temporaryFile);

            if($check[0] == 250 && $check[1] == 250) 
            {
                $result = true;
                return $result;
            } 
            else 
            {
                $result = "The image must be 250px on 250px.";
                $this->deleteImage();
                return $result;  
            }
        }

        private function checkExistence()
        {
            // Check if file already exists
            if (file_exists($this->targetFile)) 
            {
                $result = "This name is already used.";
                $this->deleteImage();
                return $result;  
            }
            else
            {
                $result = true;
                return $result;              
            }
        }

        private function checkSize()
        {

            if ($this->temporaryFile > 1024000) 
            {
                $result = "Your image must not weight more than 5 MB.";
                $this->deleteImage();
                return $result;  
            }
            else
            {
                $result = true;
                return $result;              
            }
        }

        private function checkFormat()
        {
            // Allow certain file formats

            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $detectedType = exif_imagetype($this->temporaryFile);

            if(!in_array($detectedType, $allowedTypes)) 
            {
                $result = "Wrong format. Only jpg, gif, png and jpeg allowed.";
                $this->deleteImage();
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
