<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
 if(isset($_POST['log'])){
     $cat = clean($_POST['cat']);
     $catf = clean($_POST['catf']);
     $win = clean($_POST['win']);
     $id =  date("ymdhis").rand(10000, 999999);
    //  $now = gmdate("Y-m-d H:i:s");
     $date = datePlusOneHour();

     //insert into dbase
     $q = $conn->query("INSERT INTO `dsubscription` SET subid='$id', dplan='$cat', dprice='$catf', ddate='$date' ");
     if($q){
        $_SESSION['msgs']='Added succesfully';

     }else{
        $_SESSION['msg']='Fail! try again later';

     }
     header("Location: subscriptions");

 }else if(isset($_POST['logx'])){
    $cat = clean($_POST['cat']);
    $catf = clean($_POST['catf']);
    $id = clean($_POST['hid']);
   //  $win = clean($_POST['win']);

    //insert into dbase
    $q = $conn->query("UPDATE `dsubscription` SET dplan='$cat', dprice='$catf' WHERE subid='$id' ");
    if($q){         
       $_SESSION['msgs']='Updated succesfully';

    }else{
       $_SESSION['msg']='Fail! try again later';

    }

    header("Location: subscriptions");
}else{
     $_SESSION['msg']='Oops! try again later';
     header("Location: index");
 }

endif;