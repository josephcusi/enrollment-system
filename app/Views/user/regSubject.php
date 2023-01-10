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
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=base_url()?>/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Joseph Salavaria Cusi</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-header">Student</li>
        <li class="nav-item">
          <a href="<?=base_url()?>/myprofile" class="nav-link    ">
            <i class="nav-icon fas fa-user"></i>
            <p>
              <strong>My Profile<strong>
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>

        <li class="nav-header">Maintenance</li>
        <li class="nav-item">
          <a href="<?=base_url()?>/registration" class="nav-link active">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Registration

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=base_url()?>/userSchedule" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Schedule
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=base_url()?>/userProspectus" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Prospectus
            </p>
          </a>
        </li>
        <br>
        <br>
          <li class="nav-item">
          <a href="<?=site_url()?>logout" method="post" class="nav-link">
            <i class="nav-icon fas fa-reply" style = "margin-left:4%"></i>

            <p>
              Log out
            </p>
           </a>
          </li>
          </ul>
          </li>


    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

</div>

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

  <br>
      <!-- Main content -->

      <div class="col-md-12">
        <div class="card">
          <div class="card-header p-2">
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="basic_info">

              <div class="tab-pane" id="credential">
                <div class = "card-header">

                <p style="font-size:20px; font-family: Poppins;color:maroon; margin-left:45%">Subject</p>
              </div><br><br>
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
                      <?php foreach($prospectus as $prospectus_value):?>
                      <tr>
                        <td><input type="checkbox"></td>
                        <td><?= $prospectus_value['subject'];?></td>
                        <td><?= $prospectus_value['title'];?></td>
                        <td><?= $prospectus_value['unit'];?></td>
                        <td><?= $prospectus_value['pre_requisit'];?></td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                  <div class="modal-footer justify-content-between">
                  <?php session()->setFlashdata('sendapplication', 'shhessh')?>
                  <a href="<?=site_url('registration')?>"><button type="submit" class="btn btn-primary" style = "margin-left:100%">Submit</button></a>
                 </div>
                  <!-- /.tab-pane -->
                <!-- /.tab-content -->
              </div>
              </div>
              <!-- /.tab-pane -->
              </form>
            </div>
              </div>
              <!-- /.tab-pane -->
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->

        </div><!-- /.card-body -->
      </div>

      <!-- /.content -->
    </div>


</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>
