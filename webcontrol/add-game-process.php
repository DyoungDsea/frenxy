<?php
require 'clean.php';
$id = date("ymdhis").rand(10000, 99999);
// $now = gmdate("Y-m-d H:i:s");
// $date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));

if($_SERVER['REQUEST_METHOD']=="POST"){
    $category = clean($_POST['category']);
    $gtip = clean($_POST['gtip']);
    $home = clean($_POST['home']);
    $away = clean($_POST['away']);
    $tip = clean($_POST['tip']);
    $percent = clean($_POST['percent']);
    $tour = clean($_POST['tour']);
    $datex = date("Y-m-d", strtotime(clean($_POST['date'])));
    $time = clean($_POST['time']);

    $date = $datex.' '.$time;

    if($category=="Football"){
        $order = "A";
    }

    $cat = $conn->query("SELECT * FROM dgame_categories WHERE category_id='$category'");
    if($cat->num_rows>0){
        $catt = $cat->fetch_assoc();
        $cat_name = $catt['dcategory'];

        if($cat_name=="Football"){
            $order = "A";
        }elseif($cat_name=="Basketball"){
            $order = "B";
        }elseif($cat_name=="Hockey"){
            $order = "C";
        }elseif($cat_name=="Tennis"){
            $order = "D";
        }
    }

    if(isset($_POST['log'])){
        $sql = $conn->query("INSERT INTO dgame SET gid='$id', gcategory='$cat_name', dcategory_id='$category', tipcategory='$gtip', dtour='$tour', dhome='$home', daway='$away', dtip='$tip', dpercent='$percent', ddate='$date', ddate1='$datex', dorder='$order' ");
        if($sql){
            $_SESSION['msgs']="Game added successfully";
            // $sql = runQuery("SELECT * FROM dgame WHERE pdate='$datex' AND gcategory='$cat_name' AND tipcategory='$gtip'");
            // if($sql->num_rows==0){
            //     runQuery("UPDATE dgame SET pdate='$datex' WHERE gid='$id'");
            // }
            runQuery("INSERT INTO dgame_date SET gid='$id', ddate='$datex', gcategory='$cat_name', tipcategory='$gtip'");
        }else{
            $_SESSION['msg']="Oops! try again later";
        }

    }elseif(isset($_POST['logx'])){
        $pi = clean($_POST['pi']);
        $sql = $conn->query("UPDATE dgame SET gcategory='$cat_name', dcategory_id='$category', tipcategory='$gtip', dtour='$tour', dhome='$home', daway='$away', dtip='$tip', dpercent='$percent', ddate='$date', ddate1='$datex', dorder='$order' WHERE gid='$pi' ");

        if($sql){
            $_SESSION['msgs']="Updated successfully";
        }else{
            $_SESSION['msg']="Oops! try again later";
        }
    }

    header("Location: add-games");
}