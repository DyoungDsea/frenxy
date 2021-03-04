<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $userid = clean($_POST['userid']);
    $amount = (Float)clean($_POST['cat']);
    $user = $conn->query("SELECT * FROM `dlogin` WHERE userid='$userid'")->fetch_assoc();
    $bal = (Float)$user['dwallet_balance'];
    $trans = date("ymdhis").rand(10000, 99999);
    $now = gmdate("Y-m-d H:i:s");
    $date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));

    if(isset($_POST['log'])){
        $final = $amount + $bal;
        //update user wallet
        $up = $conn->query("UPDATE `dlogin` SET dwallet_balance='$final' WHERE userid='$userid'");
        if($up){
            $_SESSION['msgs']="Added successfully";
            //insert record to user history
            $text = 'Manual Addition by Admin';
            $conn->query("INSERT INTO `dtransaction_history` SET  userid='$userid', dname='$text', transaction_id='$trans', amount='$amount', dcredit='$amount', dwallet_balance='$final', ddate='$date' ");
        }


    }elseif(isset($_POST['minus'])){
        //check if the amount is greater than wallet
        if($amount < $bal){
            $final =  $bal - $amount;
            $up = $conn->query("UPDATE `dlogin` SET dwallet_balance='$final' WHERE userid='$userid'");
        if($up){
            $_SESSION['msgs']="Deducted successfully";
            //insert record to user history
            $text = 'Manual Deduction by Admin';
            $conn->query("INSERT INTO `dtransaction_history` SET  userid='$userid', dname='$text', transaction_id='$trans', amount='$amount', ddebit='$amount', dwallet_balance='$final', ddate='$date'");
        }
        }else{
            $_SESSION['msg']='Sorry!, Amount is greater than Wallet';
        }
       
    }

    header("Location:users");
}