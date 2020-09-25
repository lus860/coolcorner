<?php session_start();
 if($_GET['products'] =='delete' && isset($_GET['id'])) {
     $result_reg = mysqli_query($conn, "DELETE FROM products WHERE id=$_GET[id] ");?>
<!--
     <script>
        window.location.href = 'index.php?person=admin&products=list';
     </script>
-->

 <?php }

?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Hello 
          <?php if(isset($_SESSION['firstname'])){
               echo $_SESSION['firstname'];}
            else{ 
                echo 'Admin';
            } ?> 
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
       <ul class="navbar-nav ml-auto">
         <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?person=admin&proces=signin">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?person=admin&proces=signin">Product</a>
          </li>
      </ul>
      </div>
    </div>
  </nav>
  
  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Welcome to Admin Pane</h1>
      <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
    </div>
  </header>
<div class="container text-center">
<h3><a href="index.php?person=admin&products=add">Add product</a></h3>
 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php $result = mysqli_query($conn,"SELECT * FROM products INNER JOIN category ON products.category_id=category.c_id;");
      while($row = $result->fetch_assoc()) {?>
    <tr>
      <td><?php echo $row['p_name'] ?></td>
      <td><?php echo $row['c_name'] ?></td>
      <td><?php echo $row['description'] ?></td>
      <td><a href="index.php?person=admin&products=delete&id=<?php echo $row['id'] ?>">Delete/</a> <a href="index.php?person=admin&products=updete&id=<?php echo $row['id'] ?>"> Updete</a></td>
     
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
