<?= $this->include('admin/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?= $this->include('admin/include/navbar')?>
<aside class="main-sidebar sidebar-dark-secondary elevation-8">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?=base_url()?>/dist/img/dormehiLogo.png" alt="dormehi Logo" class="brand-image img-circle elevation-3" style="opacity: 10;">
    <span class="brand-text font-weight-light" style="margin-left:10%;"><strong>DORMEHI</strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-header"style = "font-family:poppins;">Admin</li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/admin" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              <strong>Dashboard<strong>
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <br>
        <br>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/pre_enrolled_reg')?>" class="nav-link">
                <i class="far fa-thin fa-newspaper"></i>
                <p>Pre-Enrolled</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">

              <a href="#" class="nav-link ">
                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                <p>Section<i class="right fas fa-angle-left"></i></p>
              </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/section11" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade 11</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/section12" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade 12</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item"style = "font-family:poppins;">

              <a href="#" class="nav-link ">
                <i class="fa-sharp fa-solid fa-atom"></i>
                <p>Prospectus<i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/prospectus11" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Grade 11</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/prospectus12" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Grade 12</p>
                  </a>
                </li>
              </ul>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/retrieve_strand')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                <p>Strand</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/newadmin')?>" class="nav-link active">
                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                <p>Admin</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/listofteacher')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                <p>Teachers</p>
              </a>
            </li>
        </li>
        <br>
        <br>


          </ul>
        </li>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

</div>
<div class="content-wrapper">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php if(!empty(session()->getFlashdata('admin'))) : ?>
  <script>swal("Added Successfully!", "You successfully added admin.", "success");</script>
  <?php endif ?>
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>ADMIN</strong>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
            <li class="breadcrumb-item active"style="font-family: 'Poppins';">Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->

      <div class="card-body">
        <div class="card card-primary card-outline mx-auto" style = "width:100%;">
          <div class="card-header">

            <a href="<?=base_url('addadmin')?>"><button type="button" class="btn btn-secondary btn-sm" style = "border-color:maroon;border-radius:15px;float:right; font-family:poppins; margin-bottom:1%; background-color:maroon; color: white;">New Admin</button></a>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
    <!-- /.card-header -->

      <table id="example1" class="table table-bordered table" style = "font-family:poppins">

        <thead>
          <tr>
            <th>Admin ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($retrieveAdmin as $ret_admin):?>
          <tr>
            <td><?=$ret_admin['lrn'];?></td>
            <td><?=$ret_admin['lastname'];?><?= " "?><?=$ret_admin['firstname'];?><?= " "?><?=$ret_admin['middlename'];?></td>
            <td><?=$ret_admin['email'];?></td>
            <td>
            <a href="#"> <button type="button" class="btn btn-secondary btn-sm btn-editAdmin" style = "border-radius:20px"
            data-id="<?=$ret_admin['id'];?>"
            data-profile_picture="<?=$ret_admin['profile_picture'];?>"data-lastname="<?=$ret_admin['lastname'];?>"data-firstname="<?=$ret_admin['firstname'];?>"data-middlename="<?=$ret_admin['middlename'];?>"
            data-email="<?=$ret_admin['email'];?>" data-password="<?=$ret_admin['password'];?>" >update</button></a>
            <?php include 'modal/adminUpdate.php'?>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
<!-- /.card-body -->
</div>
</div>
</div>
  <!-- /.content -->
</section>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
<script>
   $(document).ready(function(){
        // sa button
        $('.btn-editAdmin').on('click',function(){
            // data galing buton
            const id = $(this).data('id');
            const profile_picture = $(this).data('profile_picture');
            const lastname = $(this).data('lastname');
            const firstname = $(this).data('firstname');
            const middlename = $(this).data('middlename');
            const email = $(this).data('email');
            const password = $(this).data('password');
            // // sa modal
            $('.id').val(id);
            $('.Adminprofile_pics').val(profile_picture);
            $('.Adminlastname').val(lastname);
            $('.Adminfirstname').val(firstname);
            $('.Adminmiddlename').val(middlename);
            $('.Adminemail').val(email);
            $('.Adminpassword').val(password).trigger('change');
            // Call Modal
            $('#adminUpdate').modal('show');
        });
      });
</script>
