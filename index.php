<?php 

include_once "models.php";
include('resources/layouts/header.php');
if(isset($_GET['person']) && $_GET['person'] == 'admin'){
    if(isset($_GET['proces']) && $_GET['proces'] == 'signup'){
        include_once "resources/auth/signUp.php"; 
    }elseif(isset($_GET['proces']) && $_GET['proces'] == 'logined'){
         include_once "resources/admin.php"; 
    }elseif(isset($_GET['products']) && ($_GET['products'] == 'list' || $_GET['products'] == 'delete')){
        include_once "resources/products.php"; 
    }elseif(isset($_GET['products']) && $_GET['products'] == 'add'){
        include_once "resources/product_add.php"; 
    }elseif(isset($_GET['products']) && $_GET['products'] == 'updete'){
        include_once "resources/product_updete.php"; 
    }
    else{
       include_once "resources/auth/signIn.php"; 
    }
  
}else{
     include_once "resources/user.php";
}
include('resources/layouts/footer.php');

