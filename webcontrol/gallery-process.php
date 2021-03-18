<?php
require 'clean.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $category = clean($_POST['category']);
    $home = clean($_POST['home']);
    $away = clean($_POST['away']);
    $pi = clean($_POST['pi']);

    if(isset($_POST['logx'])){
        $sql = $conn->query("UPDATE dgame SET dscore1='$home', dscore2='$away' WHERE gid='$pi' ");

        if($sql){
            $_SESSION['msgs']="Updated successfully";
        }else{
            $_SESSION['msg']="Oops! try again later";
        }
        if($category=='sure'){
            header("Location: sure-pending");
        }elseif($category=='suretip'){
            header("Location: suretip");
        }else{
            header("Location: games?category=$category");
        }
    }else{
        $_SESSION['msg']="Oops! you don't have access";
        header("Location: dashboard");
    }

}