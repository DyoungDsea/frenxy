<?php 

require 'clean.php';


$out ='';
if(isset($_POST['search']) AND $_POST['search']=="Sub"){
    $category = clean($_POST['id']);
    $list=$conn->query("SELECT * from dsub_cat where dcategory_id='$category' order by dsub_cat");
    
    if($list->num_rows>0){
        $out .='<div class="form-group">
    <select name="sub" class="form-control">
        <option value="">Choose Sub Category</option>';
      while($rows=$list->fetch_assoc()){ 
      $out .='<option value="'.$rows['dsub_cat'].'">'.$rows['dsub_cat'].'</option>';
     }
     $out .='</select>
                                  
        </div>';
    }else{
        $out .='<input type="hidden" value="">';
    }
        
}elseif(isset($_POST['search']) AND $_POST['search']=="Subs"){
    $category = clean($_POST['id']);
    $gid = clean($_POST['value']);

    $xp = $conn->query("SELECT * FROM `dpost` WHERE pid='$gid'");
    if($xp->num_rows>0){
        $xpp = $xp->fetch_assoc();
        $tour = $xpp['dsub_cat'];
    }


    $list=$conn->query("SELECT * from dsub_cat where dcategory_id='$category' order by dcategory");
    
    if($list->num_rows>0){
        $out .='<div class="form-group">
        <select name="sub" class="form-control">
            <option value="">Choose Sub Category</option>';
      while($rows=$list->fetch_assoc()){ 
      $out .='<option '; if($tour==$rows['dsub_cat']){ 
        $out .= 'selected';} $out .= ' value="'.$rows['dsub_cat'].'">'.$rows['dsub_cat'].'</option>';
     }
     $out .='</select>
                                  
        </div>';
    }else{
        $out .='<input type="hidden" value="">';
    }
}




 echo $out;   


?>