<?= $this->include('user/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?= $this->include('user/include/navbar')?>
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

        <li class="nav-header"style = "font-family:poppins;">Student</li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/myprofile" class="nav-link    ">
            <i class="nav-icon fa-solid fa-user"></i>
            <p>
              <strong>My Profile<strong>
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>

        <li class="nav-header"style = "font-family:poppins;">Maintenance</li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/registration" class="nav-link active">
          <i class="fa-sharp fa-solid fa-id-card"></i>
            <p>
              Registration

            </p>
          </a>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/userSchedule" class="nav-link">
            <i class="fa-sharp fa-solid fa-calendar"></i>
            <p>
              Schedule
            </p>
          </a>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/userProspectus" class="nav-link">
          <i class="fa-sharp fa-solid fa-book"></i>
            <p>
              Prospectus
            </p>
          </a>
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


  <!-- Main content -->
<br>
      <div class="card-body">
        <div class="card card-primary card-outline mx-auto" style = "width:100%; border-radius:15px">
          <div class="card-header">
            <h3 class="card-title"style = "font-family:poppins">Application Form</h3>


          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="#" method="post"  enctype="multipart/form-data">
                  <div class="card-body p-0">
                    <div class="bs-stepper">
                      <div class="bs-stepper-header mx-auto" style = "width:85%" role="tablist">
                        <!-- your steps here -->
                        <div class="step" data-target="#logins-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                            <span class="bs-stepper-circle" style = "background-color:maroon;">1</span>
                            <span class="bs-stepper-label"style = "font-family:poppins;">Strand Setup</span>
                          </button>
                        </div>
                        <div class="line" style = "background-color:maroon;"></div>
                        <div class="step" data-target="#information-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                            <span class="bs-stepper-circle" style = "background-color:maroon;">2</span>
                            <span class="bs-stepper-label" style = "font-family:poppins;">Subject</span>
                          </button>
                        </div>
                      </div>
                      <div class="bs-stepper-content mx-auto" style = "width:70%">


                        <!-- your steps content here -->
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                          <br>
                          <br>
                          <br>

                          <div class="form-group row"style="font-family: Poppins;">
                            <label class="col-sm-3 col-form-label"style="font-family: Poppins;">Learner Reference Number</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" value = "<?= $user['lrn'];?>" disabled>
                              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'lrn') : '' ?></span>
                            </div>
                          </div>
                          <div class="form-group row"style="font-family: Poppins;">
                            <label class="col-sm-3 col-form-label"style="font-family: Poppins;">Strand</label>
                            <div class="col-sm-7">
                            <select class="form-control"id="studentStrand" name = "strand">
                              <?php foreach($strands as $strand): ?>
                              <option type="text" value="<?= $strand['strand']?>"><?= $strand['strand'] ?></option>
                              <?php endforeach; ?>
                            </select>
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'strand') : '' ?></span>
                            </div>
                            </div>
                            <div class="form-group row"style="font-family: Poppins;">
                              <label class="col-sm-3 col-form-label"style="font-family: Poppins;">Year Level</label>
                              <div class="col-sm-7">
                                <select class="form-control"id="yearLevel" name = "year_level">
                                  <option type="text" value="Grade 11">Grade 11</option>
                                  <option type="text" value="Grade 12">Grade 12</option>
                                </select>
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'year_level') : '' ?></span>
                              </div>
                            </div>
                            <div class="form-group row"style="font-family: Poppins;">
                              <label class="col-sm-3 col-form-label"style="font-family: Poppins;">Semester</label>
                              <div class="col-sm-7">
                                <select class="form-control" name = "semester" placeholder="<?= $year['semester'];?>">
                                  <option type="text" value = "<?= $year['semester'];?>"><?= $year['semester'];?></option>
                                </select>
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'semester') : '' ?></span>
                              </div>
                            </div>
                          <button type="button" class="btn btn-primary" style = "float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px" onclick="stepper.next()">Next</button>

                      </div>
                      </div>
                      <div class="bs-stepper-content mx-auto" style = "width:80%">

                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                          <div class="card-body">

                              <table id="example1" class="table table-bordered table-striped" style = "font-family:poppins">
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th>Subject</th>
                                    <th>Title</th>
                                    <th>Unit</th>
                                    <th>Pre-Requisit</th>
                                  </tr>
                                </thead>
                                <tbody>

                                  <tr>
                                    <td><input type="checkbox" name="propectus_id" value="#"></td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                  </tr>

                                </tbody>
                              </table>

                          <div class = "a"style = "float:right;">
                          <button type="button" class="btn btn-primary"style = "font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px" onclick="stepper.previous()">Previous</button>
                          <?php session()->setFlashdata('sendapplication', 'shhessh')?>
                          <button type="submit" class="btn btn-primary"style = "font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                </div>
              </form>
                <!-- /.card -->
              </div>
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
<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>
