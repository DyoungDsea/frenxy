<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
 if(isset($_POST['log'])){
     $userid = clean($_POST['userid']);
     $plan = clean($_POST['subscribe']);
     $date = datePlusOneHour();
     $now = gmdate("Y-m-d H:i:s");

    $sub_xdate = addToDate($now, "+".$plan);
    $sql = $conn->query("SELECT * FROM dlogin WHERE userid='$userid' AND dsub_date IS NOT NULL");
    if($sql->num_rows>0){
        $row = $sql->fetch_assoc();
        //check if the vip is active
        if($row['dvip']=='inactive'){
            $sqlx = $conn->query("UPDATE dlogin SET dsub_date='$date', dsub_xdate='$sub_xdate', dvip='active' WHERE userid='$userid'");
        }else{
            $doop = $row['dsub_xdate'];
            $current = addToDate($doop, "+".$plan);
           $sqlx =  $conn->query("UPDATE dlogin SET dsub_date='$date', dsub_xdate='$current', dvip='active' WHERE userid='$userid'");
        }

        if($sqlx){
            $_SESSION['msgs']="Your subscription is active";
            $_SESSION['report']='<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 18px; margin-bottom:20px">
                <b>Congratulations!</b> Subscription is successfully for '.$plan.'days plan  
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
        }
        
    }else{
        $conn->query("UPDATE dlogin SET dsub_date='$date', dsub_xdate='$sub_xdate', dvip='active' WHERE userid='$userid'");
    }
     header("Location: users");

 }else{
     $_SESSION['msg']='Oops! try again later';
     header("Location: index");
 }

endif;