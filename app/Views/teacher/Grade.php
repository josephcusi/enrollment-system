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
              <a href="<?=base_url('t_dashboard')?>" class="nav-link active"style = "background-color:maroon;">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>Student Grade</p>
              </a>
            </li>
        </li>

        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('newteacher')?>" class="nav-link" >
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
<?php if(!empty(session()->getFlashdata('addgrade'))) : ?>
  <script>swal("Grade Added!", "Registration successfully rejected.", "success");</script>
  <?php endif ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">

    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>GRADE</strong>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Grading</li>
            <li class="breadcrumb-item active"style="font-family: 'Poppins';">Grade</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <div class="card card-primary card-outline mx-auto" style = "width:98%;">

    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table" style = "font-family:poppins">
        <thead>
          <tr>
            <th>Subject</th>
            <th>Midterm Grade</th>
            <th>Final Grade</th>
            <th>Remarks</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($userInfo as $userGrade):?>
          <tr>
            <td><?=$userGrade['subject']?></td>
            <td><?=$userGrade['midterm_grade']?></td>
            <td><?=$userGrade['final_grade']?></td>
            <td><?=$userGrade['remark']?></td>
            <td>
              <button type="button" class="btn btn-default btn-update"style = "border-radius:20px;font-family:poppins; background-color:maroon; color: white;"
              data-id="<?=$userGrade['id']?>"
              data-midterm="<?=$userGrade['midterm_grade']?>"
              data-final="<?=$userGrade['final_grade']?>"
              data-subjects="<?=$userGrade['subject']?>"
              >Update</button>
              <?php include 'include/grademodal/updategrademodal.php'?>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
</div>
<?php foreach($info as $newInfo):?>
<button type="button" class="btn btn-secondary btn-sm btn-add" style = "border-radius:15px" data-lrn="<?= $newInfo['lrn']?>">Add Grade</button>
  <?php include 'include/grademodal/grademodal.php';?>
  <?php endforeach;?>
      </table>
    <!-- /.card-body -->
  </div>
  <!-- /.content -->
</div>
  <!-- /.content -->
</div>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
<script>
    $(document).ready(function(){
        // sa button
        $('.btn-update').on('click',function(){
            // data galing buton
            const id = $(this).data('id');
            const midterm = $(this).data('midterm');
            const finals = $(this).data('final');
            const subjects = $(this).data('subjects');
            // const profile_picture = $(this).data('profile');
            // // sa modal
             $('.idModal').val(id);
             $('.midterm_modal').val(midterm);
             $('.Modalsubject').val(subjects);
             $('.final_modal').val(finals).trigger('change');
            // Call Modal
            $('#updategrade').modal('show');
        });
        $('.btn-add').on('click',function(){
            // data galing buton
            const lrn = $(this).data('lrn');
            // const profile_picture = $(this).data('profile');
            // // sa modal
             $('.lrnModal').val(lrn).trigger('change');
            // Call Modal
            $('#addgrade').modal('show');
        });
    });
</script>
