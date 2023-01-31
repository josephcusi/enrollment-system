
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style = "background-color:maroon">
  <!-- Left navbar links -->
  <ul class="navbar-nav" >
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa-solid fa-bars-staggered" style = "color:white"></i></a>

    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?=base_url()?>/admin" class="nav-link" style = "color:white;font-family:poppins;"><strong>Home</strong></a>

    </li>

  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-1 pb-1 mb-1 d-flex" >

      <div class="image" style = "margin-left:-15%">
        <img style="background-image:url(../../dist/img/profile.jfif); border-color:maroon; background-size:cover; width:35px; height:35px;" src="" class="img-fluid img-circle">
      </div>
</div>
  <div class="dropdown">
      <div class="info">
      <a class="d-block" style="color:white; background-color:#212529; font-family:poppins;  margin-top:1.5%; border-radius:18px; padding:7px" href="#">


    </a>
    <div class="dropdown-content " style = "margin-left:30%; margin-top:2%;">
      <a href="<?=site_url()?>logout" style = "font-family:poppins; margin-left:17%; font-weight:bolder" method="post">LOGOUT</a>
    </div>
      </div>
      </div>


    <!-- Messages Dropdown Menu -->
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt" style = "color:white"></i>
      </a>
    </li>
    <li class="nav-item">

      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large" style = "color:white"></i>
      </a>
    </li>
  </ul>

</nav>
