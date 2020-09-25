<?php session_start();
include_once "models.php";
$errors = array();
 if(isset($_POST['submit'])) {
     $email = $_POST['email'];
     $password = $_POST['pwd'];
     if(empty($email)) {
            $error_email = "Please enter a valid email";
            array_push($errors,$error_email);
     }
     if(empty($password)) {
         $error_password = "Please enter a valid password";
         array_push($errors,$error_password);
     }
     if(count($errors) == 0) {
         $md5_pass = md5(md5($email).md5($password));
         $result_query = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$md5_pass'");
         if($result_query->num_rows > 0) {
             $row = $result_query->fetch_assoc();
             $_SESSION['user_id'] = $row['id'];
             $_SESSION['firstname'] = $row['firstname'];
             $_SESSION['email'] = $row['email'];?>
             <script>
                 window.location.href = 'index.php?person=admin&proces=logined';
             </script>
             //header("Location: index.php");
           <?php }else {
             $error_user = "Wrong combination";
             array_push($errors,$error_user);
         } 
     }
 }
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
        <?php if(isset($_SESSION['firstname'])){?>
         <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?person=admin&proces=signin">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?person=admin&proces=signin">Product</a>
          </li>
        <?php }else{?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?person=admin&proces=signin">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?person=admin&proces=signup">Sign Up</a>
          </li>
          
      <?php } ?>
      </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Welcome</h1>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Login</h2>
    
 <form action="index.php?person=admin" method="POST">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
    <?php  if (isset($error_email)) :?>
    <div class="alert alert-danger">
        <?php if (empty($email)) {
                echo $error_email;
                }
        ?>
    </div>
    <?php endif ?>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>
    <?php  if (isset($error_password)) :?>
    <div class="alert alert-danger">
        <?php if (empty($password)) {
                echo $error_password;
                }
        ?>
    </div>
    <?php endif ?>
  <button type="submit" class="btn btn-success" name="submit">Submit</button>
  <div class="pt-5">
    <span class="txt1">
        Don’t have an account?
    </span>

  <a class="nav-link" href="index.php?person=admin&proces=signup">Sign Up</a>
  </div>
</form>

        </div>
      </div>
    </div>
  </section>