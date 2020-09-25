<?php
     $errors= array();
     
    if(isset($_POST['submit'])) {
        $p_name = $_POST['p_name'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        
        if(empty($p_name )) {
            $error_pname = "Please enter product name";
            array_push($errors,$error_pname);
        }
        if(empty($description)) {
            $error_description = "Please enter description";
            array_push($errors,$error_description);
        }
        
        if(empty($category)) {
            $error_email = "Please select category";
            array_push($errors,$error_category);
        }
        
        if(count($errors) == 0) {
            $result_reg = mysqli_query($conn, "INSERT INTO products (p_name, category_id, description) VALUES('$p_name','$category','$description')");
           
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
      <h1>Add Product</h1>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Add Product</h2>
    
    <form action="index.php?person=admin&products=add" method="POST">
     <div class="form-group">
        <label for="p_name">Product name</label>
        <input type="text" class="form-control" name="p_name" id="p_name">
    </div>
     <?php  if (isset($error_pname)) :?>
    <div class="alert alert-danger">
        <?php  if (isset($error_pname)) {
                   echo $error_pname;
                  }
        ?>
    </div>
    <?php endif ?>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description">
    </div>
     <?php  if (isset($error_description)) :?>
    <div class="alert alert-danger">
        <?php  if (empty($description)) {
                   echo $error_description;
                  }
        ?>
    </div>
     <?php endif ?>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Category Name:</label>
    <select class="form-control" id="exampleFormControlSelect1" name="category">
    <?php $result = mysqli_query($conn,"SELECT * FROM category");
     while($row = $result->fetch_assoc()) {?>
      <option value="<?php echo $row['c_id'] ?>" ><?php echo $row['c_name'] ?></option>
            <?php }?>
    </select>
    </div>
      <?php  if (isset($error_category)) {?>
    <div class="alert alert-danger">
        <?php echo $error_category; ?>
    </div>
    <?php } ?>
  <button type="submit" class="btn btn-success" name="submit">Submit</button>
   </form>

        </div>
      </div>
    </div>
</section>