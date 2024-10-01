<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top" style="background-color:maroon">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa-solid fa-bars-staggered"
                    style="color:white"></i></a>

        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url()?>/admin" class="nav-link"
                style="color:white;font-family:poppins;"><strong>Home</strong></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a> <button class="nav-link btn-year"
                    style="color:white;font-family:poppins; background-color:transparent; border:none;"
                    data-id="<?= $sem_year['id']?>" data-year="<?= $sem_year['year']?>"
                    data-sem="<?= $sem_year['semester']?>"><strong><?= $sem_year['year']?></strong></button></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-1 pb-1 mb-1 d-flex">

            <div class="image" style="margin-left:-15%">
                
                    <img style="background-image:url(../../dist/img/profile.jpg); border-color:maroon; background-size:cover; width:35px; height:35px;"
                    src="<?= base_url().'/registrar-profile/' . $userName[0]['firstname'] . $userName[0]['lastname']. '/' . $userName[0]['profile_picture'] ?>" class="img-fluid img-circle" alt="">
            </div>
            
        </div>
       <div class="dropdown" style="position: relative; display: inline-block;">
    <a class="d-block" style="color: white; background-color: #212529; font-family: poppins;
        margin-top: 1.5%; border-radius: 18px; padding: 7px; cursor: pointer;" href="#">
        
        <span style="display: inline-block; margin-right: 5px;">
            <?= isset($userName[0]['firstname']) ? $userName[0]['firstname'] : ''; ?>
        </span>
        
        <span style="display: inline-block;">
            <?= isset($userName[0]['lastname']) ? $userName[0]['lastname'] : ''; ?>
        </span>
        
        <i class="" style="margin-left: 5px;"></i>
    </a>
    
    <div class="dropdown-content" style="position: absolute; top: 100%; left: 0; background-color: #fff;
        border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: none; min-width: 150px;
        font-family: poppins; transition: opacity 0.3s, visibility 0.3s;">
    <h6 class="m-0" style="text-align: center; padding: 10px 0;font-size:10px; color: #212529;">WELCOME!</h6>
    
    <a href="<?= base_url('admin'); ?>" style="display: block; padding: 10px; color: #212529;
        text-decoration: none;">
        <i class="fa fa-user-circle" style="margin-right: 5px;"></i>
        Dashboard
    </a>
    
    <a href="<?= site_url('logout'); ?>" style="display: block; padding: 10px; color: #212529;
        text-decoration: none;">
        <i class="fa fa-sign-out-alt" style="margin-right: 5px;"></i>
        Logout
    </a>
</div>
</div>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt" style="color:white"></i>
            </a>
        </li>
        <li class="nav-item">
            <label class="switch">
                <?php if($sem_year['enroll_status'] == 'on'):?>
                <input type="checkbox" class="checkkboxx" data-id="<?=$sem_year['id']?>" data-status="off" checked>
                <span class="slider round"></span>
                <?php else:?>
                <input type="checkbox" class="checkkboxx" data-id="<?=$sem_year['id']?>" data-status="on">
                <span class="slider round"></span>
                <?php endif;?>
               
            </label>
        </li>
    </ul>

</nav>
<?= $this->include('admin/modal/yearModal')?>

<script src="<?=base_url()?>/cssjs/js/jquery.min.js"></script>
<script src="<?=base_url()?>/cssjs/js/bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdown = document.querySelector('.dropdown');
        const dropdownContent = document.querySelector('.dropdown-content');

        dropdown.addEventListener('click', function (event) {
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            event.stopPropagation();
        });

        document.addEventListener('click', function () {
            dropdownContent.style.display = 'none';
        });

        dropdownContent.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    });
</script>
<script>
$(document).ready(function() {
    // sa button
    $('.btn-year').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const year = $(this).data('year');
        const sem = $(this).data('sem');
        // // sa modal
        $('.id').val(id);
        $('.yearModal').val(year);
        $('.semester').val(sem).trigger('change');
        // Call Modal
        $('#year').modal('show');
    });
});
</script>
<script>
$(document).ready(function() {
    $('input[class="checkkboxx"]').on('change', function() {
        var id = $(this).data('id');
        var status = $(this).is(':checked') ? 'on' : 'off';

        $.ajax({
            url: '/enrollment_status',
            type: 'POST',
            data: {
                id: id,
                status: status
            },
            success: function(response) {
                if (status == 'on') {
                    swal({
                        title: "Enrollment On Going",
                        text: "Enrollment is open",
                        icon: "success",
                       buttons: false,
                        timer: 1000,
                    });
                } else {
                    swal({
                        title: "Enrollment is CLOSED",
                        text: "Enrollment is closed",
                        icon: "success",
                       buttons: false,
                        timer: 1000,
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdown = document.querySelector('.dropdown');
        const dropdownContent = document.querySelector('.dropdown-content');
        
        dropdown.addEventListener('click', function (event) {
            dropdownContent.style.opacity = dropdownContent.style.opacity === '1' ? '0' : '1';
            dropdownContent.style.visibility = dropdownContent.style.visibility === 'visible' ? 'hidden' : 'visible';
            event.stopPropagation();
        });
        
        document.addEventListener('click', function () {
            dropdownContent.style.opacity = '0';
            dropdownContent.style.visibility = 'hidden';
        });
        
        dropdownContent.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    });
</script>
<style>
.switch {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 20px;
    margin-top: 25%;

}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 5px;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    border-radius: 50%;
    left: 2px;
    bottom: 2px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #2196F3;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(60px);
    transform: translateX(15px);
}

.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}

.switch-label {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 70px;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #2196F3;
}
</style>