<?php
    include_once("DataProvider/DBConnect.php");
    include_once("header.php");

    class Paste
    {
        public $formData;
        public function __construct($phpInput)
        {
            $this->formData = json_decode($phpInput);
        }

        public function insertPaste()
        {
            $username = $this->formData->username;
            $language = $this->formData->language;
            $content = addslashes($this->formData->content);

            $sqlInsert = "INSERT INTO tblguest(Name, Language, Content, DateCreated, isDelete) VALUES('{$username}', '{$language}', N'{$content}', NOW(), 0)";
            DataProvider::ExcuteQuey($sqlInsert);
            
            $sqlGetCurrentID = "SELECT STT FROM tblguest ORDER BY STT DESC LIMIT 0, 1";
            $resultCurrentID = DataProvider::ExcuteQuey($sqlGetCurrentID);
            $rowCurrentID = mysqli_fetch_array($resultCurrentID);

            return $rowCurrentID['STT'];

        }
            
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $clienPaste = new Paste(file_get_contents("php://input"));
        echo $clienPaste->insertPaste();

    }
    

?>