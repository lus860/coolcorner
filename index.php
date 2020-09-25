<?php 

include_once "models.php";
include_once "function.php";
include('layouts/header.php');
if(isset($_GET['person']) && $_GET['person'] == 'admin'){
    if(isset($_GET['proces']) && $_GET['proces'] == 'signup'){
        include_once "signUp.php"; 
    }elseif(isset($_GET['proces']) && $_GET['proces'] == 'logined'){
         include_once "admin.php"; 
    }else{
       include_once "signIn.php"; 
    }
  
}else{
     include_once "user.php";
}
include('layouts/footer.php');

