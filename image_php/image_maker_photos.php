<?php

if ($foo->uploaded) {   
   // save uploaded image with a new name,
   // resized to 100px wide
   $foo->file_new_name_body = $picid;
   $foo->image_resize = true;
   $foo->image_convert = 'jpg';
   $foo->image_x = 200;
   $foo->image_y = 200;
   $foo->Process('_photos');
   if ($foo->processed) {
     $foo->Clean();
   }  
}
?>