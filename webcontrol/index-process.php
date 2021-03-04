<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['log'])):
    $em = clean($_POST['email']);
    $pass = md5(clean($_POST['pass']));

        $x = $conn->query("SELECT * FROM `admin` WHERE demail='$em' AND dpass='$pass'");
        if($x->num_rows>0){
            $voo = $x->fetch_assoc();
            // $_SESSION['msgs'] = 'Oops! try again later';
            $_SESSION['admin']=true;
            $_SESSION['userid']=$voo['userid'];
            header("Location: dashboard");
                
        }else{
            $_SESSION['msg'] = 'Oops! try again later';
            header("Location: index");
        }
    


endif;
endif;