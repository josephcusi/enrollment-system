<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top" style="background-color:maroon">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fa-solid fa-bars-staggered" style="color:white"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>/myprofile" class="nav-link" style="color:white"><strong>Home</strong></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-1 pb-1 mb-1 d-flex">
            <div class="image" style="margin-left:-15%">
                <img style="background-image:url(../../dist/img/profile.jpg); border-color:maroon;
                    background-size:cover; width:35px; height:35px;"
                    src="<?= base_url('student_credentials/' . $profile_picture[0]['firstname'] . ' ' . $profile_picture[0]['lastname'] . '/' . $profile_picture[0]['profile_picture']) ?>"
                    class="img-fluid img-circle">
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
                
                <a href="<?= base_url('myprofile'); ?>" style="display: block; padding: 10px; color: #212529;
                    text-decoration: none;">
                    <i class="fa fa-user-circle" style="margin-right: 5px;"></i>
                    My Profile
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

    </ul>
</nav>

<!-- Add some padding to the body to prevent content from being hidden behind the navbar -->
<style>
    body {
        padding-top: 56px; /* Adjust this value based on the height of your navbar */
    }
</style>

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
