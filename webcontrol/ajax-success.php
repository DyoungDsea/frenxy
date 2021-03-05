<?php
require 'clean.php';
$trans = date("ymdhis").rand(10000, 99999);
$now = gmdate("Y-m-d H:i:s");
$date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));



function updateForMe($id, $result, $rorder){
    runQuery("UPDATE `dgame` SET dresult='$result', rorder='$rorder' WHERE gid='$id'");
}

function updateLogin($id, $status){
    runQuery("UPDATE `dlogin` SET status='$status' WHERE userid='$id'");
}

function updateGame($id){
    runQuery("UPDATE dgame_date SET dstatus='inactive' WHERE gid='$id'");
}


function deleteForMe($id, $tableName, $tableRowID){
    runQuery("DELETE FROM $tableName WHERE $tableRowID='$id' ");
}

if(isset($_POST['Message']) AND $_POST['Message']=="Ban"){
    updateSingleForMe('dlogin', 'status', 'ban', 'userid', clean($_POST['id']));
}

if(isset($_POST['Message']) AND $_POST['Message']=="UnBan"){
    updateSingleForMe('dlogin', 'status', 'active', 'userid', clean($_POST['id']));
}



if(isset($_POST['Message']) AND $_POST['Message']=="catDelete"):
    deleteForMe(clean($_POST['id']), 'dcategory', 'cid');// id, tablename, tableRowID
endif;

if(isset($_POST['Message']) AND $_POST['Message']=="subDelete"):
    deleteForMe(clean($_POST['id']), 'dsubscription', 'subid');
endif;

if(isset($_POST['Message']) AND $_POST['Message']=="postDelete"):
    deleteForMe(clean($_POST['id']), 'dpost', 'pid');
endif;

if(isset($_POST['Message']) AND $_POST['Message']=="confirmPost"):
    updateSingleForMe('dpost', 'dstatus', 'active', 'pid', clean($_POST['id']));
endif;

if(isset($_POST['Message']) AND $_POST['Message']=="gameWon"):
    updateForMe(clean($_POST['id']), 'won', 'B');
    updateGame(clean($_POST['id']));
endif;

if(isset($_POST['Message']) AND $_POST['Message']=="gameLost"):
    updateForMe(clean($_POST['id']), 'lost', 'B');
    updateGame(clean($_POST['id']));
endif;

if(isset($_POST['Message']) AND $_POST['Message']=="updateGames"):
    updateSingleForMe('dgame', 'dstatus', 'active', 'dstatus', 'pending');
endif;




//sure

function updateSingleForMe($tableName, $tableColumn, $columnValue, $rowId, $id){
    GLOBAL $conn;
    $conn->query("UPDATE `$tableName` SET $tableColumn='$columnValue' WHERE $rowId='$id'");
}

if(isset($_POST['Message']) AND $_POST['Message']=="gameSureOpen"):
    updateSingleForMe('dsure', 'dstatus', 'open', 'gid', clean($_POST['id']));
endif;

if(isset($_POST['Message']) AND $_POST['Message']=="gameSureHide"):
    updateSingleForMe('dsure', 'dstatus', 'hide', 'gid', clean($_POST['id']));
endif;

if(isset($_POST['Message']) AND $_POST['Message']=="gameSureDelete"):
    deleteForMe(clean($_POST['id']), 'dsure', 'gid');
    deleteForMe(clean($_POST['id']), 'dgame_date', 'gid');
endif;