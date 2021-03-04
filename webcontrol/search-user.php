<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"):
    $search = $_POST['search'];
    if(isset($_POST['user'])){
        header("Location: users?search=$search");
    }elseif(isset($_POST['active'])){
        // $_SESSION['search']=$search;
        header("Location: manage-subscription-active?search=". urlencode($search));
    }elseif(isset($_POST['pool'])){
        // $_SESSION['search']=$search;
        header("Location: manage-pool-subscription-active?search=". urlencode($search));
    }elseif(isset($_POST['off'])){
        // $_SESSION['search']=$search;
        header("Location: manage-offers?search=". urlencode($search));
    }


endif;