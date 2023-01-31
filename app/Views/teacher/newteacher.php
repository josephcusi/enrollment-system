<?= $this->include('teacher/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?= $this->include('teacher/include/navbar')?>
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

             <li class="nav-header"style = "font-family:poppins;">Teacher</li>
             <br>

             <li class="nav-item"style = "font-family:poppins;">
                 <li class="nav-item"style = "font-family:poppins;">
                   <a href="<?=base_url('t_dashboard')?>" class="nav-link">
                     <i class="nav-icon fa-solid fa-user"></i>
                     <p>Student Grade</p>
                   </a>
                 </li>
             </li>

             <li class="nav-item"style = "font-family:poppins;">
                 <li class="nav-item"style = "font-family:poppins;">
                   <a href="<?=base_url('newteacher')?>" class="nav-link active"style = "background-color:maroon;">
                     <i class="nav-icon fa-solid fa-user"></i>
                     <p>Teacher</p>
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

  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>TEACHER</strong>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Teacher</li>
            <li class="breadcrumb-item active"style="font-family: 'Poppins';">Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->

      <div class="card-body">
        <div class="card mx-auto" style = "width:100%;">
          <div class="card-header">

            <a href="<?=base_url('addteacher')?>"><button type="button" class="btn btn-secondary btn-sm" style = "border-color:maroon;border-radius:15px;float:right; font-family:poppins; margin-bottom:1%; background-color:maroon; color: white;">New Teacher</button></a>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
    <!-- /.card-header -->

      <table id="example1" class="table table-bordered table" style = "font-family:poppins">

        <thead>
          <tr>
            <th>Teacher ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
            <a href="#"> <button type="button" class="btn btn-secondary btn-sm  btn-editAdmin" style = "border-radius:20px">update</button></a>

            </td>
          </tr>

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
<?= $this->include('teacher/include/end')?>
<?= $this->include('teacher/include/footer')?>
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
