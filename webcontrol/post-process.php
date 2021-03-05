<?php
require 'clean.php';
$id = date("ymdhis").rand(10000, 99999);
$transid = date("ymdhis");
include '../image_php/class.upload.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $category = clean($_POST['category']);
    $author = clean($_POST['author']);
    $title = clean($_POST['title']);
    $type = clean($_POST['type']);
    $by = clean($_POST['by']);
    $desc = $_POST['desc'];
    $date = date("Y-m-d", strtotime(clean($_POST['date'])));
    $sub = !empty($_POST['sub'])? clean($_POST['sub']): NULL;
    $video = !empty($_POST['video'])? clean($_POST['video']): NULL;

    

    $cat = runQuery("SELECT * FROM dcategory WHERE cid='$category'");
    if($cat->num_rows>0){
        $catt = $cat->fetch_assoc();
        $cat_name = $catt['dcategory'];
    }

    if(isset($_POST['log'])){
        $sql = runQuery("INSERT INTO dpost SET pid='$id', dtitle='$title', dname='$author', dcategory_id='$category', dcategory='$cat_name', dsub_cat='$sub', ddesc='$desc', dtype='$type', post_by='$by', ddate='$date', vurl='$video'");
        if($sql){
            insertImages($transid, $id);
            $_SESSION['msgs']="Game added successfully";
        }else{
            $_SESSION['msg']="Oops! try again later";
        }

    }elseif(isset($_POST['logx'])){
        $pi = clean($_POST['pi']);
        $himg = clean($_POST['himg']);
        if(!empty($_FILES['img']['name'])){ 
            insertImages($transid, $pi);
            @unlink("../cover/$himg.jpg");
        }
        $sql = runQuery("UPDATE dpost SET dtitle='$title', dsub_cat='$sub', dname='$author', dcategory_id='$category', dcategory='$cat_name', ddesc='$desc', dtype='$type', post_by='$by', vurl='$video' WHERE pid='$pi' ");

        if($sql){
            $_SESSION['msgs']="Updated successfully";
        }else{
            $_SESSION['msg']="Oops! try again later";
        }
    }

    header("Location: posts");
}


function insertImages($transid, $rowId){
    GLOBAL $conn;
    @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
    if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
    $picid=$transid.'-1';
    $foo = new Upload($_FILES['img']);  
    include("../image_php/image_cover.php");     
    $conn->query("UPDATE dpost SET dimg='$picid' WHERE pid='$rowId'");
    }
    
}