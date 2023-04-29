<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>BCC | Contact</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>/webpage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?=base_url()?>/webpage/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?=base_url()?>/webpage/assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="<?=base_url()?>/webpage/assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><img src="<?=base_url()?>/cssjs/img/bccLogo.png" alt="dormehi Logo" class="brand-image img-circle elevation-3" style="opacity: 10;width:65px;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/landing')?>">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/offered')?>">Offers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/about')?>">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?=base_url('/contact')?>">Contact Us</a>
              </li>
              <li class="nav-item" style = "color:maroon;">
                <a class="nav-link" href="<?=base_url('/login')?>">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading contact-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>contact us</h4>
              <h2>let’s get in touch</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2 style = "color:maroon;font-weight:bold;">Our Location on Maps</h2>
            </div>
          </div>
          <div class="col-md-8">
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2555.049612149843!2d121.09499383882212!3d13.359241706379704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bcede1f9b25423%3A0x14b0eb8e73ca50d7!2sBaco%20Community%20College!5e1!3m2!1sen!2sph!4v1682747620491!5m2!1sen!2sph"width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4>About our School</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti.</p>
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Send us a Message</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <ul class="accordion">
              <li>
                  <a>Email:</a>
                  <div class="content">
                      <p>BCCBACO@GMAIL.COM</p>
                  </div>
              </li>
              <li>
                  <a>Website:</a>
                  <div class="content">
                      <p>www.bccbac0.com</p>
                  </div>
              </li>
              <li>
                  <a>Phone:</a>
                  <div class="content">
                      <p>09918782276</p>
                  </div>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>




    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2023 <a style = "color:maroon;font-weight:bold;">Baco Community College.<a>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url()?>/webpage/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>/webpage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="<?=base_url()?>/webpage/assets/js/custom.js"></script>
    <script src="<?=base_url()?>/webpage/assets/js/owl.js"></script>
    <script src="<?=base_url()?>/webpage/assets/js/slick.js"></script>
    <script src="<?=base_url()?>/webpage/assets/js/isotope.js"></script>
    <script src="<?=base_url()?>/webpage/assets/js/accordions.js"></script>


    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
