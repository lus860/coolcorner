<?php
if($_GET['category'] =='updete' && isset($_GET['id'])) {
     $result_c = mysqli_query($conn, "SELECT * FROM category WHERE c_id=$_GET[id]");
   $result_c = $result_c->fetch_assoc();
   
}
    if(isset($_POST['submit'])) {
        $errors= array();
        $c_name = $_POST['c_name'];
        $id = $_POST['id'];
        
        if(empty($c_name )) {
            $error_cname = "Please enter category name";
            array_push($errors,$error_cname);
        }
        
        if(count($errors) == 0) {
            $result_reg = mysqli_query($conn, "UPDATE category SET c_name ='$c_name' WHERE c_id='$id' ");
            
         }
      
    }
    
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Hello Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
         <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?person=admin&category=list">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?person=admin&products=list">Products</a>
          </li>
      </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Updete Product</h1>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Updete Product</h2>
    
    <form action="index.php?person=admin&category=updete" method="POST">
     <div class="form-group">
        <label for="c_name">Category name</label>
        <input type="text" class="form-control" name="c_name" id="c_name" value="<?= $result_c['c_name'] ?>">
        <input type="hidden" class="form-control" name="id" value="<?= $result_c['c_id'] ?>">
    </div>
     <?php  if (isset($error_cname)) :?>
    <div class="alert alert-danger">
        <?php  if (isset($error_cname)) {
                   echo $error_cname;
                  }
        ?>
    </div>
    <?php endif ?>
  <button type="submit" class="btn btn-success" name="submit">Submit</button>
   </form>

        </div>
      </div>
    </div>
</section>