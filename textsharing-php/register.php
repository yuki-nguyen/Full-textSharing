<?php
    include_once("DataProvider/DBConnect.php");
    include_once("header.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $formData = json_decode(file_get_contents("php://input"));
        $username = $formData->username;
        $password = md5($formData->password);
        $email = $formData->email;
        $status = [];

        $checkAvailableUsername = DataProvider::ExcuteQuey("SELECT ID FROM tblaccount WHERE Username = '{$username}'");
        $rowCount = mysqli_num_rows($checkAvailableUsername);
        

        if($rowCount > 0) {
            $status['status'] = 'available';
        } else {
            $status['status'] = 'success';
            $sqlInsert = "INSERT INTO tblaccount(Username, Password, Email, isDelete) VALUES('{$username}', '{$password}', '{$email}', 0)";
            DataProvider::ExcuteQuey($sqlInsert);

        }
        echo json_encode($status);
    }


?>
