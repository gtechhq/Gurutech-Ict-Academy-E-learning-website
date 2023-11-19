<!DOCTYPE html>
<html lang="en">

<head>
  <title>Gurutech ICT Academy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <div class="py-2  " style="background-color:black; color:white;">

           <div class="col-lg-14 text-right">
           <a href="register.php" class="small btn btn-primary text-light px-4 py-2 ">  Student Sign Up</a>
           <a href="tutorregister.php" class="small btn btn-primary text-light px-4 py-2 "> Tutor Sign Up</a>

           </div>

        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.html" class="d-block">
              <img src="logo.png" height="40px" width="90px" alt="Image" class="img-fluid">
             </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a href="index.html" class="nav-link text-dark text-left">Home</a>
                </li>
                <li class="has-children">
                  <a href="about.html" class="nav-link text-left">About Us</a>
                  <ul class="dropdown">
                    <li><a href="teachers.html">Our Teachers</a></li>
                    <li><a href="about.html">Our School</a></li>
                    <li>
                      <a href="courses.html" class="nav-link text-left">Courses We Offer</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="admissions.html" class="nav-link text-left">Admissions  </a>
                </li>
                <li class="has-children">
                  <a href="#" class="nav-link text-left">Platform Features</a>
                  <ul class="dropdown">
                    <li><a href="teachers.html">Classes Video Call & Screen Sharing  Features </a></li>
                    <li><a href="about.html">Courses Forums For Learning</a></li>

                    <li>
                      <a href="courses.html" class="nav-link text-left">Register As A Tutor</a>
                    </li>
                    <li>
                      <a href="courses.html" class="nav-link text-left">Sell Your Tech Video Courses With Us </a>
                    </li>
                  </ul>
                </li>

                <li>
                    <a href="contact.html" class="nav-link text-left">Contact</a>
                  </li>

                  <li>
                      <a href="contact.html" class="nav-link text-left">Hire Our Graduates</a>
                    </li>
                    <li>
                        <a href="donate.php" class="btn   text-light text-left" style="background-color:green;">Donate To Us</a>
                    </li>
              </ul>
                                                                                                                                                                                                                                                                                   </ul>
            </nav>

          </div>
          <div class="ml-auto">

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>

        </div>
      </div>

    </header>

<br>
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container" style="padding:100px;">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Register</h2>
               </div>
          </div>
        </div>
      </div>
      <?php

      $showAlert = false;
      $showError = false;
      $exists = false;

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

          // Include file which makes the
          // Database Connection.
          include 'dbconnect.php';

          $username = $_POST["username"];
          $password = $_POST["password"];
          $cpassword = $_POST["cpassword"];

          // Generate a unique student registration number
          $registrationNumber = 'GurutechSTU' . uniqid();

          $sqlCheckUsername = "SELECT * FROM users WHERE username='$username'";
          $resultCheckUsername = mysqli_query($conn, $sqlCheckUsername);
          $num = mysqli_num_rows($resultCheckUsername);

          // This sql query is used to check if
          // the username is already present
          // or not in our Database
          if ($num == 0) {
              if (($password == $cpassword) && $exists == false) {

                  $hash = password_hash($password, PASSWORD_DEFAULT);

                  // Password Hashing is used here.
                  $sqlInsertUser = "INSERT INTO `users` (`username`, `password`, `registration_number`, `date`)
                                    VALUES ('$username', '$hash', '$registrationNumber', current_timestamp())";

                  $resultInsertUser = mysqli_query($conn, $sqlInsertUser);

                  if ($resultInsertUser) {
                      $showAlert = true;
                  } else {
                      $showError = "Error: " . mysqli_error($conn);
                  }
              } else {
                  $showError = "Passwords do not match";
              }
          } else {
              $exists = "Username not available";
          }
      }

      ?>

      <?php

if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created, and you can login with your student registration number, make sure you have copied your student registration number down which you will use to make payment .
            <a href="login.php" >Login With Your Student Registration Number </a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
          </div>';
}

if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
          </div>';
}

if ($exists) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $exists . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
          </div>';
}

?>


      <div class="container my-4 ">
        <?php
           if ($showAlert) {
               echo "<script>alert('Registration successful! Your registration number is: $registrationNumber');</script>";
           }
           if ($showError) {
               echo "<script>alert('$showError');</script>";
           }
           ?>
          <h1 class="text-center">Signup Here</h1>



          <form action=" " method="post">

              <div class="form-group">
                  <label for="username">Username</label>
              <input type="text" class="form-control" id="username"
                  name="username" aria-describedby="emailHelp">
              </div>

              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control"
                  id="password" name="password">
              </div>

              <div class="form-group">
                  <label for="cpassword">Confirm Password</label>
                  <input type="password" class="form-control"
                      id="cpassword" name="cpassword">

                  <small id="emailHelp" class="form-text text-muted">
                  Make sure to type the same password
                  </small>
              </div>

              <button type="submit" class="btn btn-primary">
              SignUp
              </button>
            <a href="login.php">
            Login An Account If You Have An Account
         </a>
          </form>
      </div>

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Register</span>
      </div>
    </div>

 </head>

     <div class="footer" style="background-color: black;">
       <div class="container">
         <div class="row">
           <div class="col-lg-3">
             <a href="index.html" class="d-block">
               <img src="logo.png"   alt="Image" class="img-fluid" class="text-light">
               Gurutech Ict Academy</a>
               <p>Welcome to GuruTech ICT Academy  , where the future of technology is shaped through a comprehensive and immersive 3-year training program...</p>
            </div>
           <div class="col-lg-3">
             <h3 class="footer-heading"><span>Our Campus</span></h3>
             <ul class="list-unstyled">
                 <li><a href="#">Acedemic</a></li>
                 <li><a href="#">News</a></li>
                 <li><a href="#">Our Interns</a></li>
                 <li><a href="#">Our Leadership</a></li>
                 <li><a href="#">Careers</a></li>
                 <li><a href="#">Human Resources</a></li>
             </ul>
           </div>
           <div class="col-lg-3">
               <h3 class="footer-heading"><span>Our Departments</span></h3>
               <ul class="list-unstyled">
                   <li><a href="#">Department Of Design</a></li>
                   <li><a href="#">Department Of Human Resource</a></li>
                   <li><a href="#">Department Of Managent</a></li>
                   <li><a href="#">Department Of Software Development</a></li>
                   <li><a href="#">Department Of Robotics/ Artificial Intelligence</a></li>
                   <li><a href="#">Department Of Cyber Security</a></li>
                   <li><a href="#">Department Of Computer Software</a></li>

               </ul>
           </div>
           <div class="col-lg-3">
               <h3 class="footer-heading"><span>Contact</span></h3>
               <ul class="list-unstyled">
                   <li><a href="help.php">Help Center</a></li>
                   <li><a href="#">Support Community</a></li>
                      <li><a href="sharestory.php">Share Your Story</a></li>
                        </ul>
           </div>
         </div>

         <div class="row">
           <div class="col-12">
             <div class="copyright">
                 <p>
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     Copyright &copy; 2023 GURUTECH ICT ACADEMY  All rights reserved |  made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://gurutechhq.com.ng" target="_blank" >Gurutechnology Corporation</a>
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     </p>
             </div>
           </div>
         </div>
       </div>
     </div>


   </div>
   <!-- .site-wrap -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>

</body>

</html>
