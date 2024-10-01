<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/01-app-landing-page-defoult/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2023 09:07:28 GMT -->
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BCC | Contact Us</title>

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
<style type="text/css">
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
   <div id = "loaderist" class="lds-container">
        <div>
          <div class="lds-logo">
            <img src="<?=base_url()?>/webpage/images/loading-screen.gif" alt="Loading Screen" />
            <div class="lds-logo-caption">Getting things ready. Please wait...</div>
          </div>
        </div>
      </div>

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
                <a class="nav-link" href="<?=base_url('/offered')?>">Courses</a>
              </li>
              <!-- secondery menu end -->
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/landing#faq')?>">FAQs</a>
              </li>
              <li>
                <a class="nav-link"  href="<?=base_url('/about')?>">About Us</a>
              </li>
              <li>
                <a class="nav-link active" href="<?=base_url('/contact')?>">Contact Us</a>
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
        
        <div class="bred_text">
          <h1>Contact us</h1>
          <p style = "color:aliceblue">If you have an query, please get in touch with us, we will revert back quickly.</p>
          <ul>
            <li><a href="<?=base_url('/landing')?>">Home</a></li>
            <li><span>»</span></li>
            <li><a href="#">Contact us</a></li>
          </ul>
        </div>
      </div>
    </div>  
    

    <!-- Contact Us Section Start -->
    <section class="contact_page_section">
      <div class="container">
          <div class="contact_inner">
              <div class="contact_form">
                <div class="section_title">
                    <h2>Leave a <span>message</span></h2>
                    <p>Fill up form below, our team will get back soon</p>
                </div>
                  <form id ="contact"action="<?= base_url('sendmail') ?>" method="post">
                    <div class="form-group">
                        <input name="name" id = "name" type="text" placeholder="Name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input name="email" id = "email" type="email" placeholder="Email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input name="subject" id = "subject" type="text" placeholder="subject" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <textarea name="message" id = "message" class="form-control" placeholder="Your message" required=""></textarea>
                    </div>
                   
                    <div class="form-group mb-0">
                      <button type="submit" id = "form-submit"class="btn puprple_btn">SEND MESSAGE</button>
                    </div>
                  </form>
              </div>
              <div class="contact_info">
               
                  <div class="icon"><img src="<?=base_url()?>/webpage/images/contact_message_icon.png" alt="image"></div>
                  <div class="section_title">
                    <h2>Have any <span>question?</span></h2>
                    <p>If you have any question about our services, or staffs. Visit our <a href="<?=base_url('/landing#faq')?>"style = "color:maroon;">FAQs page.</a></p>
                  </div>
                  
                  <ul class="contact_info_list">
                    <li>
                      <div class="img">
                        <img src="<?=base_url()?>/webpage/images/mail_icon.png" alt="image">
                      </div>
                      <div class="text">
                        <span>Email Us</span>
                        <a href="mailto:bccregistrar1@gmail.com">bccregistrar1@gmail.com</a>
                      </div>
                    </li>
                    <li>
                      <div class="img">
                        <img src="<?=base_url()?>/webpage/images/call_icon.png" alt="image">
                      </div>
                      <div class="text">
                        <span>Call Us</span>
                        <a href="tel:+63(992)553-46-11">+63(992)553-46-11</a>
                      </div>
                    </li>
                    <li>
                      <div class="img">
                        <img src="<?=base_url()?>/webpage/images/location_icon.png" alt="image">
                      </div>
                      <div class="text">
                        <span>Visit Us</span>
                        <p>Market Site, Poblacion Baco, Oriental Mindoro, Baco, Philippines</p>
                      </div>
                    </li>
                  </ul>
              </div>
          </div>
      </div>
    </section>
    <!-- Contact Us Section End -->


    <!-- Map Section Start -->
    <section class="row_am map_section">
      <div class="container">
          <div class="map_inner">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2555.049612149843!2d121.09499383882212!3d13.359241706379704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bcede1f9b25423%3A0x14b0eb8e73ca50d7!2sBaco%20Community%20College!5e1!3m2!1sen!2sph!4v1682747620491!5m2!1sen!2sph" width="100%" height="510" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
      </div>
    </section>
    <!-- Map Section End -->


    <!-- News-Letter-Section-Start -->
    
    <!-- News-Letter-Section-end -->


    <!-- Footer-Section start -->
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


<!-- Mirrored from kalanidhithemes.com/live-preview/landing-page/apper/all-demo/01-app-landing-page-defoult/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2023 09:08:12 GMT -->
</html>