<?php
@session_start();
require("config.php");

function clean($value){
    GLOBAL $conn;
    $value=trim($value);
    $value=htmlspecialchars($value);
    $value=strip_tags($value);
    $value = $conn->real_escape_string($value);
    return $value;                
  }

  @$idc = clean($_SESSION['userid']);


  function formatDate($data){
    return date("d M, Y", strtotime($data));
  }

  function formatDateTime($data){
    return date("d M Y, h:i:sa", strtotime($data));
  }

  function  fetchAssoc($data){
    return $data->fetch_assoc();
  }


  function formatTime($data){
    return date("H:i", strtotime($data));
  }

  function runQuery($statement){
    GLOBAL $conn;
    return $conn->query($statement);
  }

  function addToDate($now, $howManyDays){
    $date = $now;
    $date = strtotime($date);
    $date = strtotime($howManyDays.' day', $date); //strtotime("+7 day", $date);
    return date('Y-m-d h:i:s', $date);
  }

  function datePlusOneHour(){    
  $now = gmdate("Y-m-d H:i:s");
  $date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));
  return $date;
  }

  $_SESSION['current_page'] = $_SERVER['REQUEST_URI']; //get the current url link