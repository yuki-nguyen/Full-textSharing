<?php
    define('host','localhost');
    define('dbusername','root');
    define('dbpassword','');
    define('dbname','textsharing');
    class DataProvider
    {
        public static function ExcuteQuey($sql)
        {
            $conn = mysqli_connect(host, dbusername, dbpassword, dbname) or die("Couldn't connect to localhost");
            mysqli_query($conn,"set names utf8");
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);

            return $result;
        }
    }
?>