<nav class="main-header navbar navbar-expand navbar-white navbar-light" style = "background-color:maroon">
  <!-- Left navbar links -->
  <ul class="navbar-nav" >
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa-solid fa-bars-staggered" style = "color:white"></i></a>

    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?=base_url()?>/user" class="nav-link" style = "color:white"><strong>Home</strong></a>

    </li>

  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->

    <?php $i = 0; foreach($userName as $name):?>
      <?php  $i++; if ($i == 1):?>
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-1 pb-1 mb-1 d-flex" >
    <?php  foreach($profile_picture as $prof):?>
      
      <div class="image" style = "margin-left:-15%">
        <img style="background-image:url(../../dist/img/profile.jfif); border-color:maroon; background-size:cover; width:40px; height:40px;" src="<?= base_url().'/'.'profile/'.$prof['profile_picture'] ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <?php endforeach;?>
</div>
  <div class="dropdown">
      <div class="info">
      <a class="d-block" style="color:white; background-color:#212529; font-family:poppins;  margin-top:1.5%; border-radius:18px; padding:7px" href="#">

                            <?= isset($name['firstname']) ? $name['firstname'] : $userName['firstname'];?>
                            <?=" " ?>
                            <?= isset($name['middlename']) ? $name['middlename'] : $userName['middlename']; ?>
                            <?php echo " " ?>
                            <?= isset($name['lastname']) ? $name['lastname'] : $userName['lastname']; ?>
    </a>
    <div class="dropdown-content " style = "margin-left:30%; margin-top:2%;">
      <a href="<?=site_url()?>logout" style = "font-family:poppins; margin-left:17%; font-weight:bolder" method="post">LOGOUT</a>
    </div>
      </div>
      </div>
      <?php endif;?>
    <?php endforeach;?>

    <!-- Messages Dropdown Menu -->
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt" style = "color:white"></i>
      </a>
    </li>
    <li class="nav-item">

      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="false" href="#" role="button">
        <i class="fas fa-th-large" style = "color:white"></i>
      </a>
    </li>
  </ul>
</nav>
