<?php 

require 'clean.php';


$out ='';
if(isset($_POST['search']) AND $_POST['search']=="Sub"){
    $category = clean($_POST['id']);
    $list=$conn->query("SELECT * from dtournament where dcategory_id='$category' order by dtour");
    $out .='<option value="">Choose Tournament</option>';
    if($list->num_rows>0){
      while($rows=$list->fetch_assoc()){ 
      $out .='<option value="'.$rows['dtour'].'">'.$rows['dtour'].'</option>';
     }
    }else{
        $out .='<option value="">Update this Tournament</option>';
    }
}elseif(isset($_POST['search']) AND $_POST['search']=="Subs"){
    $category = clean($_POST['id']);
    $gid = clean($_POST['value']);

    $xp = $conn->query("SELECT * FROM `dgame` WHERE gid='$gid'");
    if($xp->num_rows>0){
        $xpp = $xp->fetch_assoc();
        $tour = $xpp['dtour'];
    }


    $list=$conn->query("SELECT * from dtournament where dcategory_id='$category' order by dtour");
    $out .='<option value="">Choose Tournament</option>';
    if($list->num_rows>0){
      while($rows=$list->fetch_assoc()){ 
      $out .='<option '; if($tour==$rows['dtour']){ 
        $out .= 'selected';} $out .= ' value="'.$rows['dtour'].'">'.$rows['dtour'].'</option>';
     }
    }else{
        $out .='<option value="">Update this Tournament</option>';
    }
}




 echo $out;   


?>