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
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/section')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-section"></i>
                <p>Section</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/r_prospectus')?>" class="nav-link active">
                <i class="fa-sharp fa-solid fa-atom"></i>
                <p>Prospectus</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/grading')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-barcode"></i>
                <p>Grading</p>
              </a>
            </li>
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
              <a href="<?=base_url('/newadmin')?>" class="nav-link">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>Admin</p>
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
  <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
  <?php if(!empty(session()->getFlashdata('updateprospectus'))) : ?>
  <script>swal("Updated Successfully!", "Changes has made.", "success");</script>
  <?php endif ?>

  <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
  <?php if(!empty(session()->getFlashdata('subjectadded'))) : ?>
  <script>swal("Subject Added!", "You successfully added subject.", "success");</script>
  <?php endif ?>


  <?php if(!empty(session()->getFlashdata('notupdatesection'))) : ?>
  <script>swal("Duplicate Input!", "Please try another.", "warning");</script>
  <?php endif ?>
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style = "font-family:poppins;">Prospectus</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Prospectus</a></li>
              <li class="breadcrumb-item active">Prospectus</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">


            <div class="card card-primary card-outline" style = "">
              <div class="card-body box-profile">
                <div class="text-center">

                </div>
                <p class="text-muted text-left">Strand</p>
                <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                  <?php $strand = session()->getFlashdata('strand');?>
                <li class="nav-item"><a type="button" class="tablinks nav-link <?php if($strand == 'humss'){echo 'active' ;} ?>"style = "border-radius:20px" id="defaultOpen" href="<?= base_url('strandProspectus/'.'humss')?>">HUMSS</a></li>
                    <li class="nav-item"><a type="button" class="tablinks nav-link <?php if($strand == 'abm'){echo 'active';} ?>"style = "border-radius:20px" id="defaultOpen "  href="<?= base_url('strandProspectus/'.'abm')?>">ABM</a></li>
                    <li class="nav-item"><a type="button" class="tablinks nav-link <?php if($strand == 'stem'){echo 'active';} ?>"style = "border-radius:20px" id="defaultOpen "  href="<?= base_url('strandProspectus/'.'stem')?>">STEM</a></li>
                  </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->


            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline mx-auto" style = " ">
              <div class="card-body">


              <div id="humss" class="tabcontent">
            <table id="example1" class="table table-bordered table" style = "font-family:poppins">
              <thead>
                <tr>
                  <th>Subject Code</th>
                  <th>Title</th>
                  <th>Unit</th>
                  <th>Pre-Requisit</th>
                  <th>Actions</th>
                </tr>
              </thead>

                  <tbody>
                    <?php foreach($prospectus as $prospect):?>
                  <tr>
                    <td><?= $prospect['subject']?></td>
                    <td><?= $prospect['subject_title']?></td>
                    <td><?= $prospect['unit']?></td>
                    <td><?= $prospect['pre_requisit']?></td>
                    <td>
                      <a href="<?=base_url('edit_prospectus/'.$prospect['id'])?>"><button type="button" class="btn btn-secondary btn-sm"style = "border-radius:15px">update</button>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>

              </table>
              </div>
              <div class = "card"style = "border-radius:15px">
  <a  class="btn btn-default btn-edit" style = "border-radius:15px;float:right; font-family:poppins; background-color:maroon; color: white;" data-toggle="modal" data-target="#newSubject">New Subject</a>
</div>
              <div>
                <div>
              <div class="modal fade subjectmodal" id="newSubject">
        <div class="modal-dialog" style = "font-family:poppins">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Subject Maintenance</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('/newprospectus'); ?>" method="post">
            <?= csrf_field(); ?>

                    <div class="form-row">
                    <div class="form-group col-md-6">
                    <input type="hidden" name="strand" class="form-control" value="<?= $strand ?>">
                      <label for="inputSubject">Subject Code</label>

                      <input type="text" name="subject" class="form-control" id="inputSubject" placeholder="Subject">
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'subject') : '' ?>
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputTitle">Title</label>
                      <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title">
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'title') : '' ?>
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputUnit">Unit</label>
                      <input type="text" name="unit" class="form-control" id="inputUnit" placeholder="Unit">
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'unit') : '' ?>
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="PreRequisit">Pre-requisit</label>
                      <input type="text" name="pre_requisit" class="form-control" id="PreRequisit" placeholder="Pre-Requisit">
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'pre_requisit') : '' ?>
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="year_level">Year Level</label>
                      <select class="form-control"id="studentStrand" name = "year_level">

                      <option type="text" class="form-control" id="year_level" placeholder="Year Level" value="Grade 11">Grade 11</option>
                      <option type="text" class="form-control" id="year_level" placeholder="Year Level" value="Grade 12">Grade 12</option>

                     </select>

                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'year_level') : '' ?>
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="semester">Semester</label>
                      <select class="form-control"id="studentStrand" name = "semester">

                      <option type="text" class="form-control" id="semester" placeholder="1st Semester" value="1st Semester">1st Semester</option>
                      <option type="text" class="form-control" id="semester" placeholder="1st Semester" value="1st Semester">2nd Semester</option>

                     </select>
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'semester') : '' ?>
                      </span>
                    </div>
                  </div>
                  </div>
                  <!-- Submit button -->
                  <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <!-- /.modal -->


            </div>
            </div>
              </div>
                </div>
                  </div>
                    </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->
</div>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
