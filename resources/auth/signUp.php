<?php include_once "models.php";

     $errors= array();
     
    if(isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password1 = $_POST['pwd1'];
        $password2 = $_POST['pwd2'];
        if(empty($firstname)) {
            $error_fname = "Please enter a valid firsname";
            array_push($errors,$error_fname);
        }
        if(empty($lastname)) {
            $error_lname = "Please enter a valid lastname";
            array_push($errors,$error_lname);
        }
        
        if(empty($email)) {
            $error_email = "Please enter a valid email";
            array_push($errors,$error_email);
        }
        if(empty($password1)) {
            $error_password1 = "Please enter a valid password";
            array_push($errors,$error_password1);
        }
        if(empty($password2)) {
            $error_password2 = "Please enter a valid password";
            array_push($errors,$error_password2);
        }
        if(!empty($password1) && !empty($password2) && $password1 != $password2) {
            $match_passwords = "Your passwords doesn't match!";
            array_push($errors,$match_passwords);
        }
        
        $query_mail = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($conn,$query_mail);
        if($result->num_rows > 0) {
            $error_email2 = "This mail already registered!";
            array_push($errors,$error_email2);
        }
    
        if(count($errors) == 0) {
            $md5_pass = md5(md5($email).md5($password2));
            $result_reg = mysqli_query($conn, "INSERT INTO users(firstname, lastname, email, password) VALUES('$firstname','$lastname','$email','$md5_pass')");?>
            <script>
                 window.location.href = 'index.php?person=admin&proces=signin';
             </script>
        
        <?php }
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
            <a class="nav-link js-scroll-trigger" href="index.php?person=admin&proces=signin">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?person=admin&proces=signup">Sign Up</a>
          </li>
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
    
    <form action="index.php?person=admin&proces=signup" method="POST">
     <div class="form-group">
        <label for="email">Firstname:</label>
        <input type="text" class="form-control" name="firstname">
    </div>
     <?php  if (isset($error_fname)) :?>
    <div class="alert alert-danger">
        <?php  if (isset($error_fname)) {
                   echo $error_fname;
                  }
        ?>
    </div>
    <?php endif ?>
    <div class="form-group">
        <label for="email">Lastname:</label>
        <input type="text" class="form-control" name="lastname">
    </div>
     <?php  if (isset($error_lname)) :?>
    <div class="alert alert-danger">
        <?php  if (empty($lastname)) {
                   echo $error_lname;
                  }
        ?>
    </div>
     <?php endif ?>
    <div class="form-group">
       <label for="email">Email address:</label>
       <input type="email" class="form-control" name="email">
    </div>
      <?php  if (isset($error_email) || isset($error_email2)) :?>
    <div class="alert alert-danger">
        <?php if (empty($email)) {
                echo $error_email;
                }
               if($result->num_rows > 0) {
                  echo $error_email2;
                }
        ?>
    </div>
    <?php endif ?>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd1">
  </div>
  <?php  if (isset($error_password1)) :?>
  <div class="alert alert-danger">
        <?php if (empty($password1)) {
                  echo $error_password1;
                }
        ?>
  </div>
   <?php endif ?>
  <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd2">
  </div>
   <?php  if (isset($error_password2) || isset($match_passwords)) :?>
  <div class="alert alert-danger">
        <?php   if (empty($password2)) {
                   echo $error_password2;
                }
                if (!empty($password1) && !empty($password2) && $password1 != $password2) {
                   echo $match_passwords;
                }
        ?>
 </div>
 <?php endif ?>
  <button type="submit" class="btn btn-success" name="submit">Submit</button>
  <div class="pt-5">
    <span class="txt1">
        Don’t have an account?
    </span>
    <a class="nav-link" href="index.php?person=admin&proces=signin">Sign In</a>
  </div>
   </form>

        </div>
      </div>
    </div>
</section>