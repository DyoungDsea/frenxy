<?php
require 'clean.php';
if(isset($_POST['date'])){
    $start = clean($_POST['start']);
    $end = clean($_POST['end']);
    $user = clean($_POST['user']);
    header("Location:transaction-history?userid=$user&start=$start&end=$end");
}