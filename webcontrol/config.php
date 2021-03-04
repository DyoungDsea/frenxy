<?php
@session_start();
//check whether on localhost or online
$localhost = array(
    '127.0.0.1',
    '::1'
);

if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){
    $conn=new mysqli("localhost","root","","frenzy");
}
else {
$conn=new mysqli("localhost","frenzy_user","frenzy.com.ng","frenzy_databasex");
}

if($conn->connect_error){
    die($conn->connect_error);
}

date_default_timezone_set("Africa/Lagos");
?>