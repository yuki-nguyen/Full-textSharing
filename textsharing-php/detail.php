<?php
    include_once("DataProvider/DBConnect.php");
    include_once("header.php");


    class Detail
    {
        private $idDetail;
        public function __construct($id)
        {
            $this->idDetail = $id;
        }

        public function slelectDetail()
        {
            $sqlSelect = "SELECT Name, Language, Content FROM tblguest WHERE STT = {$this->idDetail}";
            $resultPasteInfo = DataProvider::ExcuteQuey($sqlSelect);
            $rowPasteInfo = mysqli_fetch_array($resultPasteInfo);    

            return json_encode($rowPasteInfo);

        }
            
    }


    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        
        $pasteID = $_GET['id'];
        $detail = new Detail($pasteID);

        echo $detail->slelectDetail();
       
    }


?>