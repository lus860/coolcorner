<?php 

include_once "models.php";
include('resources/layouts/header.php');
if(isset($_GET['person']) && $_GET['person'] == 'admin'){
    if(isset($_GET['proces']) && $_GET['proces'] == 'signup'){
        include_once "resources/auth/signUp.php"; 
    }elseif(isset($_GET['proces']) && $_GET['proces'] == 'logined'){
         include_once "resources/admin.php"; 
    }elseif(isset($_GET['products']) && ($_GET['products'] == 'list' || $_GET['products'] == 'delete')){
        include_once "resources/product/products.php"; 
    }elseif(isset($_GET['products']) && $_GET['products'] == 'add'){
        include_once "resources/product/product_add.php"; 
    }elseif(isset($_GET['products']) && $_GET['products'] == 'updete'){
        include_once "resources/product/product_updete.php"; 
    }
    elseif(isset($_GET['category']) && ($_GET['category'] == 'list' || $_GET['category'] == 'delete')){
        include_once "resources/category/category.php"; 
    }elseif(isset($_GET['category']) && $_GET['category'] == 'add'){
        include_once "resources/category/category_add.php"; 
    }elseif(isset($_GET['category']) && $_GET['category'] == 'updete'){
        include_once "resources/category/category_updete.php"; 
    }
    else{
       include_once "resources/auth/signIn.php"; 
    }
  
}else{
     include_once "resources/user.php";
}
include('resources/layouts/footer.php');

