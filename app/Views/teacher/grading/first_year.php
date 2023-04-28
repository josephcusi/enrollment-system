<?= $this->include('teacher/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('teacher/include/navbar')?>
        <aside class="main-sidebar sidebar-dark-secondary elevation-8">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?=base_url()?>/dist/img/dormehiLogo.png" alt="dormehi Logo"
                    class="brand-image img-circle elevation-3" style="opacity: 10;">
                <span class="brand-text font-weight-light" style="margin-left:10%;"><strong>DORMEHI</strong></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->


                        <li class="nav-header" style="font-family:poppins;">Teacher</li>
                        <br>
                        <li class="nav-item" style="font-family:poppins;">
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('newteacher')?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>Teacher</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open" style="font-family:poppins;">
                            <a href="tae.html" class="nav-link active">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>
                                    Section
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelOne['id']) ;?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelTwo['id'])  ;?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelOne['id'])  ;?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelTwo['id'])   ;?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelThird['id'])  ;?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelFourth['id'])  ;?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
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
        <?php if(!empty(session()->getFlashdata('invalid'))) : ?>
        <script>
        swal("Duplicate!", "You already set grade for this student.", "error");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('teacher'))) : ?>
        <script>
        swal("Welcome   <?= isset($userName['firstname']) ? $userName['firstname'] : $userName['firstname'];?>!",
            "You successfully login your account.", "success");
        </script>
        <?php endif ?>

        <!-- Main content -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>GRADING</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Grading</li>
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


                        <div class="card card-primary card-outline" style="">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                </div>
                                <p class="text-muted text-left">Strand</p>
                                <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                                    <?php if ($stat['status'] === "SHS"): ?>
                                    <?php $strand = session()->getFlashdata('strand');?>
                                    <li class="nav-item-active""><a id=" gas-btn" type="button"
                                        class="tablinks nav-link <?php if($strand == 'GAS'){echo 'active' ;} ?>"
                                        style="border-radius:20px" id="defaultOpen" data-year="<?=$stud_id['id']?>"
                                        data-year_level="GAS">GAS</a>
                                    </li>
                                    <li class="nav-item-active""><a id=" smaw-btn" type="button"
                                        class="tablinks nav-link <?php if($strand == 'SMAW'){echo 'active';} ?>"
                                        style="border-radius:20px" id="defaultOpen " data-year="<?=$stud_id['id']?>"
                                        data-year_level="SMAW">SMAW</a>
                                    </li>
                                    <?php else:?>
                                    <?php $strand = session()->getFlashdata('strand');?>
                                    <li class="nav-item-active"><a id="abh-btn" type="button"
                                            class="tablinks nav-link  <?php if($strand == 'ABH'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen" data-year="<?=$stud_id['id']?>"
                                            data-year_level="ABH">ABH</a>
                                    </li>
                                    <li class="nav-item-active"><a id="bpa-btn" type="button"
                                            class="tablinks nav-link <?php if($strand == 'BPA'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen" data-year="<?=$stud_id['id']?>"
                                            data-year_level="BPA">BPA</a>
                                    </li>
                                    <li class="nav-item-active"><a id="btvted-btn" type="button"
                                            class="tablinks nav-link <?php if($strand == 'BTVTED'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen" data-year="<?=$stud_id['id']?>"
                                            data-year_level="BTVTED">BTVTED</a>
                                    </li>
                                    <?php endif;?>
                                </ul>
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
                        <div class="card card-primary card-outline mx-auto" style="">


                            <div class="card-body">

                                <div id="bpa" class="tabcontent">
                                    <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                        <thead>
                                            <tr>
                                                <th>Student LRN</th>
                                                <th>Name</th>
                                                <th>Section</th>
                                                <th>Strand</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($userInfo as $user):?>
                                            <tr>
                                                <td><?=$user['lrn'];?></td>
                                                <td><?=$user['firstname'];?> <?= ' '?> <?=$user['middlename'];?>
                                                    <?= ' '?> <?=$user['lastname'];?></td>
                                                <td><?=$user['section'];?></td>
                                                <td><?=$user['strand'];?></td>
                                                <td>
                                                    <a href="<?=site_url('viewGrade/'. $user['id']);?>"><button
                                                            type="button" class="btn btn-secondary btn-sm"
                                                            style="border-radius:15px">Add Grade</button></a>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>


                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
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

<script>
$('.nav-item-active a').filter(function() {}).addClass('active');

// Add active class to clicked link
$('.nav-item-active a').on('click', function() {
    $('.nav-item-active a').removeClass('active');
    $(this).addClass('active');
});

function bindButtonClickEvent(buttonId) {
    $(buttonId).click(function() {
        const year = $(this).data('year');
        const year_level = $(this).data('year_level');

        $.ajax({
            method: 'post',
            url: '/Teacher_StudentGrading',
            data: {
                year: year,
                year_level: year_level
            },
            success: function(response) {
                $("#example1 tbody").empty();

                console.log(response.userInfo);

                $.each(response.userInfo, function(key, i) {
                    $("#example1 tbody").append(`<tr>
            <td>${i['lrn']}</td>
            <td>${i['firstname']} ${i['middlename']} ${i['lastname']}</td>
            <td>${i['section']}</td>
            <td>${i['strand']}</td>
            <td>
              <button type="button" class="btn btn-secondary btn-sm viewGrade" 
                data-id="${i['id']}" style="border-radius:15px">Add Grade
              </button>
            </td>
          </tr>`);
                });

                // Bind click event to viewGrade button
                $('.viewGrade').click(function() {
                    const studentId = $(this).data('id');

                    $.ajax({
                        type: "post",
                        url: "/viewGrade",
                        data: {
                            studentId: studentId
                        },
                        success: function(response) {
                            // alert('success');
                            $("#example1").hide();

// Show new view with student grade
                        $("#example1").load("<?=site_url('viewGrade')?>", function() {
                        // Callback function that runs after the view is loaded
                        // You can do any additional processing here
                        $("#example1").show();
                        });

                        }
                    });

                    // TODO: implement logic to show student grade
                });
            }
        });
    });
}


bindButtonClickEvent("#gas-btn");
bindButtonClickEvent("#smaw-btn");
bindButtonClickEvent("#abh-btn");
bindButtonClickEvent("#bpa-btn");
bindButtonClickEvent("#btvted-btn");

$(document).ready(function() {
    // Get the current page URL
    var url = window.location.href;
    // Find the link that matches the current page URL and add the active class
    $('.year-level-nav-item a').filter(function() {
        return this.href == url;
    }).addClass('active');

    // Add active class to clicked link
    $('.year-level-nav-item a').on('click', function() {
        $('.year-level-nav-item a').removeClass('active');
        $(this).addClass('active');
        // Store the active button's state in localStorage
        localStorage.setItem('activeButton', $(this).attr('id'));
    });

    // Retrieve the active button's state from localStorage and add the active class to it
    var activeButton = localStorage.getItem('activeButton');
    if (activeButton) {
        $('#' + activeButton).addClass('active');
    }
});
</script>