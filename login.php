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
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3 text-light"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a>
            <a href="#" class="small mr-3 text-light"><span class="icon-phone2 mr-2"></span> +2347031086612</a>
            <a href="#" class="small mr-3 text-light"><span class="icon-envelope-o mr-2"></span> info@gurutechictacademy.com</a>

          </div>
          <div class="col-lg-3 text-right">
           <a href="register.php" class="small btn btn-primary text-light px-4 py-2 ">  Student Sign Up</a>
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
                  <a href="index.html" class="nav-link text-left">Home</a>
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
                      <a href="courses.html" class="nav-link text-left">Register As A Tech / Computer Tutor</a>
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

              </ul>                                                                                                                                                                                                                                                                                          </ul>
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
<br>

        <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
            <div class="container" style="padding:100px;">
              <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                  <h2 class="mb-0">Login</h2>
                   </div>
              </div>
            </div>
          </div>


    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Login</span>
      </div>
    </div>

          <div class="container my-4 ">
            <?php


  $showError = false;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      include 'dbconnect.php';

      $username = $_POST["username"];
      $registrationNumber = $_POST["registration_number"];

      $sqlCheckUser = "SELECT * FROM users WHERE username='$username' AND registration_number='$registrationNumber'";
      $resultCheckUser = mysqli_query($conn, $sqlCheckUser);
      $num = mysqli_num_rows($resultCheckUser);

      if ($num == 1) {
          $_SESSION['username'] = $username;
          echo '<script>window.location.href = "paymentforcourse.php";</script>';
          exit();
      } else {
          $showError = true;
      }
  }
  ?>


    <style>
       .success {
           color: green;
       }

       .error {
           color: red;
       }
   </style>






            <div id="loginModal" class="error" style="display: <?php echo $showError ? 'block' : 'none'; ?>">
                   <p>Login failed. Please check your username and student registration number.</p>
               </div>
              <h1 class="text-center text-dark">Login With Your Student Registration Number</h1>
              <form action=" " method="post">

                  <div class="form-group">
                      <label for="username">Username</label>
                  <input type="text" class="form-control" id="username"
                      name="username" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                      <label for="Student Registration Number">Student Registration Number</label>
                      <input type="password" class="form-control"
                      id="registration_number" name="registration_number">
                  </div>

                      <small id="emailHelp" class="form-text text-muted">
                      Make sure to type your correct student registration number given to you..
                      </small>
                      <button type="submit" class="btn btn-primary">
                  Login
                </button>
                    <a href="register.php">
                SignUp If You Dont Have An Account
               </a>
                  </div>


              </form>
          </div>


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
