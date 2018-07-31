<?php
    include_once("DataProvider/DBConnect.php");
    include_once("header.php");

    class Update
    {
        private $formData;
        public function __construct($phpInput)
        {
            $this->formData = json_decode($phpInput);
        }

        public function updatePaste()
        {
            $id = $this->formData->id;
            $language = $this->formData->language;
            $content = addslashes($this->formData->content);

            $sqlInsert = "";
            if($language == "")
                $sqlInsert = "UPDATE tblguest SET Content = '{$content}' WHERE STT = $id";
            else
                $sqlInsert = "UPDATE tblguest SET Content = '{$content}', Language = '{$language}' WHERE STT = $id";

             DataProvider::ExcuteQuey($sqlInsert);

        }
            
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $clienUpdate = new Update(file_get_contents("php://input"));
        $clienUpdate->updatePaste();
        
    }


?>