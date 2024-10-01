<!DOCTYPE html>
<html lang="en">

<style>
    .table-container {
        max-height: 400px; /* Adjust height as needed */
        overflow-y: auto;
        border: 1px solid #ccc; /* Optional: for better visibility */
        padding: 10px; /* Optional: for better spacing */
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px; /* Space between tables */
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .a {
        font-family: Poppins;
        color: maroon;
        margin-top: 20px;
    }
</style>
<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/01-app-landing-page-defoult/blog-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2023 09:08:13 GMT -->
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BCC | Courses</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- icofont-css-link -->
  <link rel="stylesheet" href="<?=base_url()?>/webpage/css/icofont.min.css">
  <!-- Owl-Carosal-Style-link -->
  <link rel="stylesheet" href="<?=base_url()?>/webpage/css/owl.carousel.min.css">
  <!-- Bootstrap-Style-link -->
  <link rel="stylesheet" href="<?=base_url()?>/webpage/css/bootstrap.min.css">
  <!-- Aos-Style-link -->
  <link rel="stylesheet" href="<?=base_url()?>/webpage/css/aos.css">
  <!-- Coustome-Style-link -->
  <link rel="stylesheet" href="<?=base_url()?>/webpage/css/style.css">
  <!-- Responsive-Style-link -->
  <link rel="stylesheet" href="<?=base_url()?>/webpage/css/responsive.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?=base_url()?>/webpage/images/bccLogo.png" type="image/x-icon">
  <style>
      .containerz {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 20vh;
      
    }
    .box {
      width: 900px;
      height: auto;
      border: 1px solid #ccc;
      border-radius: 0.5rem;
      padding: 1rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    
    }
    .table {
      font-size: 14px;
    }
    .card-title {
      margin: 0;
    }
    .custom-list-icon {
      padding-right: 0px;
    }
    .custom-link {
      display: block;
      color: maroon;
      text-decoration: none;
    }
    .custom-link:hover {
      text-decoration: underline;
    }
        .lds-hidden {
                display: none;
            }

            .lds-container {
                background: #8c0001;
                height: 100%;
                position: fixed;
                text-align: center;
                user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                -webkit-user-select: none;
                width: 100%;
                z-index: 10000000000000000000000000000000000000000000;
            }

            .lds-container>div {
                height: 100%;
                position: relative;
                width: 100%;
            }

            .lds-logo {
                position: absolute;
                top: 50%;
                transform: translate(0, -50%);
                width: 100%;
            }

            .lds-logo img {
              min-width: 0%;
              min-height:0%;
              max-width: 100%;
              max-height:100%;
                            }

            .lds-logo-caption {
                                color: #ffffff;
                margin-top: 1rem;
            }
  </style>
</head>

<body>

  <!-- Page-wrapper-Start -->
  <div class="page_wrapper">

    <!-- Preloader -->
   <!--<div id = "loaderist" class="lds-container">-->
   <!--     <div>-->
   <!--       <div class="lds-logo">-->
   <!--         <img src="<?=base_url()?>/webpage/images/loading-screen.gif" alt="Loading Screen" />-->
   <!--         <div class="lds-logo-caption">Getting things ready. Please wait...</div>-->
   <!--       </div>-->
   <!--     </div>-->
   <!--   </div>-->

    <!-- Header Start -->
    <header>
      <!-- container start -->
      <div class="container">
      	<!-- navigation bar -->
        <nav class="navbar navbar-expand-lg"style = "color:maroon;">
          <a class="navbar-brand" href="#">
            <img src="<?=base_url()?>/webpage/images/logo.png" alt="image" >
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <!-- <i class="icofont-navigation-menu ico_menu"></i> -->
              <div class="toggle-wrap">
                <span class="toggle-bar"></span>
              </div>
            </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <!-- secondery menu start -->
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/landing')?>">Home</a>
              </li>
              <li>
                <a class="nav-link active" href="<?=base_url('/offered')?>">Courses</a>
              </li>
              <!-- secondery menu end -->
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/landing#faq')?>">FAQs</a>
              </li>
              <li>
                <a class="nav-link"  href="<?=base_url('/about')?>">About Us</a>
              </li>
              <li>
                <a class="nav-link" href="<?=base_url('/contact')?>">Contact Us</a>
              </li>
           
              <li class="nav-item">
                <a class="nav-link dark_btn" href="<?=base_url('/login')?>">ENROLL NOW</a>
              </li>
            </ul>
          </div>
        </nav>
        <!-- navigation end -->
      </div>
      <!-- container end -->
    </header>


    <!-- BredCrumb-Section -->
    <div class="bred_crumb">
      <div class="container">
        <!-- shape animation  -->
        <span class="banner_shape1"> <img src="<?=base_url()?>/webpage/images/banner-shape1.png" alt="image" > </span>
        <span class="banner_shape2"> <img src="<?=base_url()?>/webpage/images/banner-shape2.png" alt="image" > </span>
        <span class="banner_shape3"> <img src="<?=base_url()?>/webpage/images/banner-shape3.png" alt="image" > </span>

        <div class="bred_text" style = "color:gray">
          <h1>Courses</h1>
          <ul>
            <li><a href="<?=base_url('/landing')?>">Home</a></li>
            <li><span>»</span></li>
            <li><a href="#">Courses</a></li>
          </ul>
         
        </div>
      </div>
    </div>
<br>

   
  <!-- Card body END -->
</div>
<br>
<div class="section_title" data-aos="fade-in" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
  <h2><span><?= $prospectus[0]['strand']?></span></h2>
  <p>Prepare yourself for success with essential skills and knowledge, making you a <br>sought-after professional ready for real-world challenges.</p>
</div>
<div class="containerz" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
 
<div class="container">
  <h5 class="card-title mb-3">Arts and Sciences</h5>
  <?php
  $grouped_courses = [];
  foreach ($prospectus as $course) {
      $year_semester = $course['year_level'] . ' / ' . $course['semester'];
      if (!isset($grouped_courses[$year_semester])) {
          $grouped_courses[$year_semester] = [];
      }
      
      // Initialize $test with a default value
      $test = 'N/A';
      foreach ($subAll as $suball) {
          if ($suball['id'] == $course['pre_requisit']) {
              $test = isset($suball['subject']) ? $suball['subject'] : 'N/A';
              break; // Break the loop once the prerequisite subject is found
          }
      }

      // Add the prerequisite subject to the course data
      $course['pre_requisit_subject'] = $test;

      $grouped_courses[$year_semester][] = $course;
  }

  // Custom sorting function
  uksort($grouped_courses, function($a, $b) {
      list($a_year, $a_semester) = explode(' / ', $a);
      list($b_year, $b_semester) = explode(' / ', $b);

      if ($a_year == $b_year) {
          return $a_semester <=> $b_semester;
      }
      return $a_year <=> $b_year;
  });
  ?>

  <?php foreach ($grouped_courses as $year_semester => $courses): ?>
    <div class="year-semester mb-4">
      <p class="font-weight-bold"><?= $year_semester ?></p>
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>Course</th>
              <th>Course Description</th>
              <th>Unit</th>
              <th>Pre-Requisite</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($courses as $course): ?>
              <tr>
                <td><?= $course['subject'] ?></td>
                <td><?= $course['subject_title'] ?></td>
                <td><?= $course['unit'] ?></td>
                <td><?= $course['pre_requisit_subject'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php endforeach; ?>
</div>




<style>
  .container {
    padding-left: 15px;
    padding-right: 15px;
  }
  .table-container {
    overflow-x: auto; /* Ensure the table can be scrolled horizontally */
  }
  .year-semester p {
    margin-top: 20px;
    margin-bottom: 10px;
  }
</style>

<!-- Card body END -->
</div>

<br>
    <!-- Story-Section-end -->

    <!-- News-Letter-Section-Start -->
    <footer>
        <div class="top_footer" id="contact">
          <!-- animation line -->
          <div class="anim_line dark_bg">
            <span><img src="<?=base_url()?>/webpage/images/anim_line.png" alt="anim_line"></span>
            <span><img src="<?=base_url()?>/webpage/images/anim_line.png" alt="anim_line"></span>
            <span><img src="<?=base_url()?>/webpage/images/anim_line.png" alt="anim_line"></span>
            <span><img src="<?=base_url()?>/webpage/images/anim_line.png" alt="anim_line"></span>
            <span><img src="<?=base_url()?>/webpage/images/anim_line.png" alt="anim_line"></span>
            <span><img src="<?=base_url()?>/webpage/images/anim_line.png" alt="anim_line"></span>
            <span><img src="<?=base_url()?>/webpage/images/anim_line.png" alt="anim_line"></span>
            <span><img src="<?=base_url()?>/webpage/images/anim_line.png" alt="anim_line"></span>
            <span><img src="<?=base_url()?>/webpage/images/anim_line.png" alt="anim_line"></span>
          </div>
          	<!-- container start -->
            <div class="container">
              <!-- row start -->
              <div class="row">
              	  <!-- footer link 1 -->
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="abt_side">
                        <div class="logo"> <img src="<?=base_url()?>/webpage/images/logo.png" alt="image" ></div>
                        <ul>
                          <li><a href="#">bccregistrar1@gmail.com</a></li>
                          <li><a href="#">+63 995 (462) 318</a></li>
                        </ul>
                        <ul class="social_media">
                            <li><a href="https://www.facebook.com/BCCbaco2014/"><i class="icofont-facebook"></i></a></li>
                          
                        </ul>
                      </div>
                  </div>

                  <!-- footer link 2 -->
                  <div class="col-lg-3 col-md-6 col-12">
                      <div class="links">
                        <h3>Useful Links</h3>
                          <ul>
                            <li><a href="<?=base_url('/landing')?>">Home</a></li>
                            <li><a href="<?=base_url('/about')?>">About us</a></li>
                            <li><a href="<?=base_url('/offered')?>">Courses</a></li>
        
                            <li><a href="<?=base_url('/contact')?>">Contact us</a></li>
                          </ul>
                      </div>
                  </div>

                  <!-- footer link 3 -->
                  <div class="col-lg-3 col-md-6 col-12">
                    <div class="links">
                      <h3>Help & Support</h3>
                        <ul>
                          <li><a href="<?=base_url('/landing#faq')?>">FAQs</a></li>
                          
                        
                        </ul>
                    </div>
                  </div>

                  <!-- footer link 4 -->
                  
              </div>
              <!-- row end -->
          </div>
          <!-- container end -->
        </div>

        <!-- last footer -->
        <div class="bottom_footer">
        	<!-- container start -->
            <div class="container">
              <!-- row start -->
              <div class="row">
                <div class="col-md-6">
                    <p>© Copyrights 2023. All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
            <!-- row end -->
            </div>
            <!-- container end -->
        </div>

        <!-- go top button -->
       
    </footer>
    <!-- Footer-Section end -->
        <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "103273191216469");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v17.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

  </div>
  <!-- Page-wrapper-End -->

  <!-- Jquery-js-Link -->
  <script src="<?=base_url()?>/webpage/js/jquery.js"></script>
  <!-- owl-js-Link -->
  <script src="<?=base_url()?>/webpage/js/owl.carousel.min.js"></script>
  <!-- bootstrap-js-Link -->
  <script src="<?=base_url()?>/webpage/js/bootstrap.min.js"></script>
  <!-- aos-js-Link -->
  <script src="<?=base_url()?>/webpage/js/aos.js"></script>
  <!-- main-js-Link -->
  <script src="<?=base_url()?>/webpage/js/main.js"></script>
  <script src="<?=base_url()?>/webpage/js/loads.js"></script>

</body>


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/01-app-landing-page-defoult/blog-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2023 09:08:40 GMT -->
</html>