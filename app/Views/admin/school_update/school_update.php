<?= $this->include('admin/include/top')?>


<!--include top-->

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('admin/include/navbar')?>
        <aside class="main-sidebar sidebar-dark-secondary elevation-8">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?=base_url()?>/cssjs/img/bccLogo.png" alt="dormehi Logo"
                    class="brand-image img-circle elevation-3" style="opacity: 10;">
                <span class="brand-text font-weight-light" style="margin-left:0%; font-size:85%;"><strong>Baco Community
                        College</strong></span>
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

                        <li class="nav-header" style="font-family:poppins;">Admin</li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    <strong>Dashboard<strong>
                                            <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>
                        <br>
                        <li class="nav-item" style="font-family:poppins;">
                        <li class="nav-item menu-open" style="font-family:poppins;">
                            <a href="#" class="nav-link active">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>School Updates<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="school-update-nav-item">
                                    <a href="<?= site_url('school_updates/' . 'announcement');?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Announcements</p>
                                    </a>
                                </li>
                                <li class="school-update-nav-item">
                                    <a href="<?= site_url('school_updates/' . 'event')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Events</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('student_approve')?>" class="nav-link">
                                <i class="far fa-thin fa-newspaper"></i>
                                <p>Student Approval</p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="#" class="nav-link ">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Students Request<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-request/Grade-11')?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-request/Grade-12')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-request/1st-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-request/2nd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-request/3rd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-request/4th-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="#" class="nav-link ">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Students<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-list/Grade-11')?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-list/Grade-12')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-list/1st-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-list/2nd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-list/3rd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-list/4th-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="#" class="nav-link ">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Pre-Enrolled<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/Grade-11')?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/Grade-12')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/1st-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/2nd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/3rd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/4th-Year')?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">

                            <a href="#" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Section<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/Grade-11')?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/Grade-12')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/1st-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/2nd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/3rd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/4th-Year')?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <li class="nav-item" style="font-family:poppins;">
                            <a href="#" class="nav-link ">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Prospectus<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/Grade-11')?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/Grade-12')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/1st-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/2nd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/3rd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/4th-Year')?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">

                            <a href="#" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Grading<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/Grade-11')?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/Grade-12')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('/deadline_form') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Submission of Grade </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/1st-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/2nd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/3rd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/4th-Year')?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('/retrieve_strand')?>" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Program</p>
                            </a>
                        </li>
                        </li>

                        
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('/newadmin')?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        </li>

                        <li class="nav-item" style="font-family:poppins;">
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('/listofteacher')?>" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Teachers</p>
                            </a>
                        </li>
                        </li>
                        </li>

                    </ul>
                    </li>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

    </div>
    <link rel="stylesheet" href="<?=base_url('cssjs/school_upt_css/style.css')?>">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Baco Community College Calendar</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="elegant-calencar d-md-flex">
                        <div class="wrap-header d-flex align-items-center img"
                            style="background-image: url(images/bg.jpg);">
                            <p id="reset">Today</p>
                            <div id="header" class="p-0">
                                <!-- <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div> -->
                                <div class="head-info">
                                    <div class="head-month"></div>
                                    <div class="head-day"></div>
                                    <div style="color:maroon;" id="title" class="head-title"></div>
                                </div>
                                <!-- <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div> -->
                            </div>
                        </div>
                        <div class="calendar-wrap">
                            <div class="w-100 button-wrap">
                                <div class="pre-button d-flex align-items-center justify-content-center"><i
                                        class="fa fa-chevron-left"></i></div>
                                <div class="next-button d-flex align-items-center justify-content-center"><i
                                        class="fa fa-chevron-right"></i></div>
                            </div>
                            <table id="calendar">
                                <thead>
                                    <tr>
                                        <th>Sun</th>
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Wed</th>
                                        <th>Thu</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card" style="border-radius:15px;">
                                <a button type="button" class="btn btn-default"
                                    style="border-radius:15px;float:right; font-family:poppins; margin-bottom:; background-color:maroon; color: white;"
                                    data-toggle="modal" data-target="#new-announcement">Add Announcement</button></a>
                            </div>
                            <?= $this->include('admin/school_update/addAnnouncement')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<?= $this->include('admin/include/end')?>

<?= $this->include('admin/include/footer')?>
<script>
(function($) {
    "use strict";
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date(),
            year = today.getFullYear(),
            month = today.getMonth(),
            monthTag = ["January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December"
            ],
            day = today.getDate(),
            days = document.getElementsByTagName('td'),
            selectedDay,
            setDate,
            daysLen = days.length;

        // options should be like '2014-01-01'
        function Calendar(selector, options, data) {
            this.options = options;
            this.data = data;
            this.draw();
        }

        Calendar.prototype.draw = function() {
            this.getCookie('selected_day');
            this.getOptions();
            this.drawDays();
            var that = this,
                reset = document.getElementById('reset'),
                pre = document.getElementsByClassName('pre-button'),
                next = document.getElementsByClassName('next-button');

            pre[0].addEventListener('click', function() {
                that.preMonth();
            });
            next[0].addEventListener('click', function() {
                that.nextMonth();
            });
            reset.addEventListener('click', function() {
                that.reset();
            });
            while (daysLen--) {
                days[daysLen].addEventListener('click', function() {
                    that.clickDay(this);
                });
            }
        };

        Calendar.prototype.drawHeader = function(e) {
            var headDay = document.getElementsByClassName('head-day'),
                headMonth = document.getElementsByClassName('head-month'),
                headTitle = document.getElementsByClassName('head-title');

            e ? headDay[0].innerHTML = e : headDay[0].innerHTML = day;
            headMonth[0].innerHTML = monthTag[month] + " - " + year;
            if (this.data && this.data.result && this.data.result.length > 0) {
                headTitle[0].setAttribute('data-title', this.data.result[0]['announcement_event']);
            }
        };

        Calendar.prototype.drawDays = function() {
            var startDay = new Date(year, month, 1).getDay(),
                nDays = new Date(year, month + 1, 0).getDate(),
                n = startDay;

            for (var k = 0; k < 42; k++) {
                days[k].innerHTML = '';
                days[k].id = '';
                days[k].className = '';
            }

            for (var i = 1; i <= nDays; i++) {
                var dayElement = days[n];

                // Check if the day has event data
                var eventData = this.data && this.data.result;
                var hasEventOfType = eventData && eventData.some(function(event) {
                    var eventStartDate = new Date(event.event_start);
                    var eventEndDate = new Date(event.event_end);
                    return eventStartDate.getDate() <= i && i <= eventEndDate.getDate() &&
                        eventStartDate.getMonth() === month && eventStartDate.getFullYear() ===
                        year;
                });

                dayElement.innerHTML = i;

                if (hasEventOfType) {
                    var dot = document.createElement('span');
                    dot.className = 'dot';

                    // Get the event type
                    var eventType = eventData.find(function(event) {
                        var eventStartDate = new Date(event.event_start);
                        var eventEndDate = new Date(event.event_end);
                        return eventStartDate.getDate() <= i && i <= eventEndDate.getDate() &&
                            eventStartDate.getMonth() === month && eventStartDate
                            .getFullYear() === year;
                    }).type;

                    // Set the dot color based on the event type
                    if (eventType === '(event)') {
                        dot.style.backgroundColor = 'green';
                    } else if (eventType === '(announcement)') {
                        dot.style.backgroundColor = 'red';
                    }

                    dayElement.appendChild(dot);
                }

                n++;
            }


            for (var j = 0; j < 42; j++) {
                if (days[j].innerHTML === "") {
                    days[j].id = "disabled";
                } else if (j === day + startDay - 1) {
                    if ((this.options && (month === setDate.getMonth()) && (year === setDate
                            .getFullYear())) ||
                        (!this.options && (month === today.getMonth()) && (year === today
                            .getFullYear()))) {
                        this.drawHeader(day);
                        days[j].id = "today";
                    }
                }
                if (selectedDay) {
                    if ((j === selectedDay.getDate() + startDay - 1) && (month === selectedDay
                            .getMonth()) &&
                        (year === selectedDay.getFullYear())) {
                        days[j].className = "selected";
                        this.drawHeader(selectedDay.getDate());
                    }
                }
            }
        };



        Calendar.prototype.clickDay = function(o) {
            var selected = document.getElementsByClassName("selected");
            var len = selected.length;

            if (len !== 0) {
                selected[0].className = "";
            }
            o.className = "selected";

            // Assign the selectedDay directly to a new Date object to avoid modifying the original date
            var clickedDay = new Date(year, month, parseInt(o.innerHTML));
            clickedDay.setHours(0, 0, 0, 0);

            // Update the selectedDay only if the clicked day is within the current month
            if (clickedDay.getMonth() === month && clickedDay.getFullYear() === year) {
                selectedDay = clickedDay;
                this.drawHeader(o.innerHTML);
                this.setCookie('selected_day', 0);

                // Fetch data based on selected date
                var yearStr = selectedDay.getFullYear().toString();
                var monthStr = (selectedDay.getMonth() + 1).toString().padStart(2, '0');
                var dayStr = selectedDay.getDate().toString().padStart(2, '0');
                var selectedDate = yearStr + '-' + monthStr + '-' + dayStr;

                // Get the value of the hidden input field
                var dataSchoolUpts = document.getElementById('inputType').dataset.school_upts;

                // Pass the selectedDate and dataSchoolUpts to fetchEventData function
                fetchEventData(selectedDate, dataSchoolUpts);
            }
        };


        // Fetch event data based on selected date
        // Fetch event data based on selected date
        function fetchEventData(selectedDate, dataSchoolUpts) {
            // Send an AJAX request to your server-side script (announcement.php) to fetch data
            $.ajax({
                url: 'announcement',
                type: 'POST',
                data: {
                    date: selectedDate,
                    dataSchoolUpts: dataSchoolUpts // Include the dataSchoolUpts value in the data object
                },
                success: function(response) {
                    // Handle the response and update the 'title' element with the retrieved data
                    var eventData = JSON.parse(response);
                    var titleElement = document.getElementById('title');

                    if (eventData && eventData.result.length > 0) {
                        var events = eventData.result;
                        var eventTitles = [];

                        for (var i = 0; i < events.length; i++) {
                            var event = events[i];
                            var eventId = event.id; // Retrieve the ID of the title
                            var eventStartDate = event.event_start;
                            var eventEndDate = event.event_end;
                            var eventTitle = event.announcement_event;
                            var eventType = event.type;

                            // Parse event start and end dates
                            var start = new Date(Date.parse(eventStartDate));
                            var end = new Date(Date.parse(eventEndDate));

                            // Create a Date object for the selected day
                            var selectedDay = new Date(selectedDate);

                            // Check if selected date falls within the event date range
                            if (selectedDay >= start && selectedDay <= end) {
                                eventTitles.push({
                                    id: eventId,
                                    title: eventTitle,
                                    type: eventType
                                });
                            }
                        }

                        if (eventTitles.length > 0) {
                            // Update the title element with the retrieved data
                            var titleHTML = '<ol>';
                            for (var j = 0; j < eventTitles.length; j++) {
                                var event = eventTitles[j];
                                titleHTML += '<li data-id="' + event.id + '">' +
                                    '<button class="update-button" data-id="' + event.id +
                                    '" data-toggle="modal" data-target="#update-modal">' + event
                                    .title +
                                    '</button>' +
                                    '</li>';
                            }
                            titleHTML += '</ol>';
                            titleElement.innerHTML = titleHTML;
                            var urlUpdateAnnouncement = "<?= site_url('school_updates/UpdateAnnouncement') ?>";
                            // Add a modal for updating the announcement
                            var modalHTML =
                                '<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">' +
                                '<div class="modal-dialog" role="document">' +
                                '<div class="modal-content">' +
                                '<form id="updateForm" action="' + urlUpdateAnnouncement +
                                '" method="post" enctype="multipart/form-data">' +
                                '<div class="modal-header">' +
                                '<h5 class="modal-title" id="updateModalLabel">Update Announcement</h5>' +
                                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                                '</div>' +
                                '<div class="modal-body">' +
                                '<div class="form-group">' +
                                '<label for="inputStrand">Image</label>' +
                                '<input type="file" name="imagess" class="form-control eventTitle" id="inputImage">' +
                                '<input type="hidden" name="id" class="form-control" value="' + event.id + '">' +
                                '<input type="hidden" name="typess" class="form-control" value="' + event.type + '">' +
                                '</div>' +
                                '<div class="form-group">' +
                                '<label for="inputStrand">Title</label>' +
                                '<input type="text" name="titless" class="form-control eventTitle" id="inputTtle" placeholder="Title"> required' +
                                '</div>' +
                                '<input type="hidden" name="type" class="form-control type" id="inputType" data-school_upts="" value="">'  +
                                '<div class="form-group">' +
                                '<label for="inputTitle">Description</label>' +
                                '<input type="text" name="descriptionss" class="form-control eventDescription" id="inputDesc" placeholder="Description">' +
                                '</div>' +
                                '<div class="form-group">' +
                                '<label for="inputStartDate">Event Start</label>' +
                                '<input type="date" name="startDatess" class="form-control eventStart" id="inputStrtDate"> required' +
                                '</div>' +
                                '<div class="form-group">' +
                                '<label for="inputEndDate">Event End</label>' +
                                '<input type="date" name="endDatess" class="form-control eventEnd" id="inputEndDate"> required' +
                                '</div>' +
                                '</div>' +
                                '<div class="modal-footer">' +
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
                                '<button type="submit" class="btn btn-primary btn-updatee">Save</button>' +
                                '</div>' +
                                '</form>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            // Append the modal HTML to the document body
                            document.body.insertAdjacentHTML('beforeend', modalHTML);

                            // Function to handle updating event data

                        } else {
                            titleElement.innerHTML = "";
                        }

                    } else {
                        titleElement.innerHTML = "";
                    }
                },
                error: function() {
                    console.log('Error occurred while fetching event data.');
                }
            });
        }



        Calendar.prototype.preMonth = function() {
            if (month < 1) {
                month = 11;
                year = year - 1;
            } else {
                month = month - 1;
            }
            this.drawHeader(1);
            this.drawDays();
        };

        Calendar.prototype.nextMonth = function() {
            if (month >= 11) {
                month = 0;
                year = year + 1;
            } else {
                month = month + 1;
            }
            this.drawHeader(1);
            this.drawDays();
        };

        Calendar.prototype.getOptions = function() {
            if (this.options) {
                var sets = this.options.split('-');
                setDate = new Date(sets[0], sets[1] - 1, sets[2]);
                day = setDate.getDate();
                year = setDate.getFullYear();
                month = setDate.getMonth();
            }
        };

        Calendar.prototype.reset = function() {
            month = today.getMonth();
            year = today.getFullYear();
            day = today.getDate();
            this.options = undefined;
            this.drawDays();
        };

        Calendar.prototype.setCookie = function(name, expiredays) {
            if (expiredays) {
                var date = new Date();
                date.setTime(date.getTime() + (expiredays * 24 * 60 * 60 * 1000));
                var expires = "; expires=" + date.toGMTString();
            } else {
                var expires = "";
            }
            document.cookie = name + "=" + selectedDay + expires + "; path=/";
        };

        Calendar.prototype.getCookie = function(name) {
            if (document.cookie.length) {
                var arrCookie = document.cookie.split(';'),
                    nameEQ = name + "=";
                for (var i = 0, cLen = arrCookie.length; i < cLen; i++) {
                    var c = arrCookie[i];
                    while (c.charAt(0) === ' ') {
                        c = c.substring(1, c.length);
                    }
                    if (c.indexOf(nameEQ) === 0) {
                        selectedDay = new Date(c.substring(nameEQ.length, c.length));
                        selectedDay.setHours(0, 0, 0,
                            0); // Set hours, minutes, seconds, and milliseconds to zero
                    }
                }
            }
        };
        var $data = {
            result: <?= json_encode($result) ?>
        };


        var calendar = new Calendar(null, null, $data);
    }, false);
})(jQuery);
</script>
<script>
$(document).ready(function() {
    // Get the current page URL
    var url = window.location.href;

    // Find the link that matches the current page URL and add the active class
    $('.school-update-nav-item a').filter(function() {
        return this.href == url;
    }).addClass('active');

    // Add active class to clicked link
    $('.school-update-nav-item a').on('click', function() {
        $('.school-update-nav-item a').removeClass('active');
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
<style>
.update-button {
    background-color: #337ab7;
    color: #fff;
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.update-button:hover {
    background-color: #23527c;
}
</style>