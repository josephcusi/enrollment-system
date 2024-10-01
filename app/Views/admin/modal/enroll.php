<style>
    .table-container {
        max-height: 400px; /* Adjust height as needed */
        overflow-y: auto;
        border: 1px solid #ccc; /* Optional: for better visibility */
        padding: 10px; /* Optional: for better spacing */
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px; /* Space between tables */
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .a {
        font-family: Poppins;
        color: maroon;
        margin-top: 20px;
    }
</style>
<div class="modal fade" id="enroll">
    <div class="modal-dialog modal-lg" style="font-family:poppins; ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Enrollment Approval (This is a
                <?php if($enrolled[0]['student_types'] == "1"):?>
                    New Student
                <?php elseif($enrolled[0]['student_types'] == "2"):?>
                    Old Student
                <?php else:?>
                    Transferee Student
                <?php endif;?>
                )</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= site_url('enrolled');?>" method='post' enctype="multipart/form-data">
                    <div class="card-body p-0">
                        <div class="bs-stepper">
                            <div class="bs-stepper-content mx-auto" style="width:70%">

                                <div class="form-horizontal" style="font-family:poppins; color:maroon;">
                                    <div class="form-group col-md-12">
                                        <input type="hidden" value="Enrolled" class="state" name="state">
                                        <!-- <input type="text" value="" name="subject_string_id"> -->
                                        <input type="hidden" value="<?=$enrolled[0]['strand'];?>" class="strand">
                                        <input type="hidden" value="<?=$enrolled[0]['year_level'];?>"
                                            class="year_level">
                                        <input type="hidden" value="<?=$enrolled[0]['id'];?>" name="id" class="ids">
                                        <input type="hidden" value="<?=$enrolled[0]['user_tbl_id'];?>"
                                            class="id_id_number" name="id_id_number">
                                        <input type="hidden" value="<?=$enrolled[0]['student_types'];?>"
                                            class="student_types" name="student_types">
                                        <label for="section">Section</label>
                                        <select class="form-control" id="section" name="section">
                                            <?php foreach($enroll as $en): ?>
                                            <option type="text" class="form-control section" id="section"
                                                value="<?= $en['section']; ?>"><?= $en['section']; ?>
                                                <?php
                                                  $count = 0;
                                                  foreach ($sect as $sec) {
                                                      if ($sec['secID'] == $en['secID']) {
                                                          $count++;
                                                      }
                                                  }
                                                  echo '(Total Student: ' . $count . ')';
                                                  ?>
                                            </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <label for="studentLRN" class="col-sm-6 col-form-label">Student ID</label>
                                    <div class="form-group col-md-12">
                                    
                                        <?php
                                            $originalValue = $enrolled[0]['lrn'];
                                            $pattern = '/^([A-Z]+\d+-)/';

                                            if (preg_match($pattern, $originalValue, $matches)) {
                                                $result = $matches[1]; 
                                            } else {
                                                $result = ''; 
                                            }
                                        ?>

                                        <input type="text" class="form-control" value="<?= $result; ?>"
                                            placeholder="ID Number" name="bcc_id">


                                    </div>
                                    <?php
                                    // Explode the subject IDs into the $test array
                                    $test = explode(',', $enrolled[0]['subject_id']);

                                    // Create a mapping of course IDs to course names
                                    $course_name_mapping = [];
                                    foreach ($subAll as $course) {
                                        $course_name_mapping[$course['id']] = $course['subject'];
                                    }

                                    // Group courses by year and semester
                                    $grouped_courses = [];
                                    foreach ($idd as $course) {
                                        $year_semester = $course['year_level'] . ' / ' . $course['semester'];
                                        if (!isset($grouped_courses[$year_semester])) {
                                            $grouped_courses[$year_semester] = [];
                                        }
                                        $grouped_courses[$year_semester][] = $course;
                                    }
                                    ?>

                                    <div class="table-container">
                                        <?php foreach ($grouped_courses as $year_semester => $courses): ?>
                                            <p class="a"><?= $year_semester ?></p>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" class="checkAll" data-group="<?= $year_semester ?>"></th>
                                                        <th>Course</th>
                                                        <th>Course Description</th>
                                                        <th>Unit</th>
                                                        <th>Pre-Requisite</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($courses as $course): ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="subject_string_ids[]" value="<?= $course['prs_tbl_id'] ?>" data-group="<?= $year_semester ?>"
                                                                <?php if (in_array($course['prs_tbl_id'], $test)) echo 'checked'; ?>>
                                                        </td>
                                                        <td><?= $course['subject'] ?></td>
                                                        <td><?= $course['subject_title'] ?></td>
                                                        <td><?= $course['unit'] ?></td>
                                                        <td>
                                                            <?php
                                                            // Split pre-requisites in case there are multiple
                                                            $pre_requisite_names = [];
                                                            $pre_requisites = explode(',', $course['pre_requisit']);
                                                            foreach ($pre_requisites as $pre_requisite_id) {
                                                                $pre_requisite_id = trim($pre_requisite_id);
                                                                if (isset($course_name_mapping[$pre_requisite_id])) {
                                                                    $pre_requisite_names[] = $course_name_mapping[$pre_requisite_id];
                                                                } else {
                                                                    $pre_requisite_names[] = $pre_requisite_id; // Show ID if name not found
                                                                }
                                                            }
                                                            echo implode(', ', $pre_requisite_names);
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        <?php endforeach; ?>
                                    </div>
                                
                                <div class="a" style="float:right;">
                                    <button type="submit" class="btn btn-primary-tikoll"
                                        style="float:right;font-family:poppins;background-color:green;border-color:green;border-radius:20px;color:white;">Enroll</button>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert library -->
<!-- <script>
    $(document).ready(function() {
        $('.btn-primary-tikoll').on('click', function() {
            const id = $('.ids').val(); // Get the id from the hidden input
            const state = $('.state').val(); // Get the id from the hidden input
            const section = $('.section').val(); // Get the id from the hidden input
            const strand = $('.strand').val(); // Get the id from the hidden input
            const year_level = $('.year_level').val(); // Get the id from the hidden input
            const updatedYearLvl = year_level.replace(' ', '-');
            const id_id_number = $('.id_id_number').val(); // Get the id from the hidden input
            const id_number = $('.id_number').val(); // Get the id from the hidden input


        

            const formData = new FormData();
            formData.append('id', id);
            formData.append('state', state);
            formData.append('section', section);
            formData.append('id_id_number', id_id_number);
            formData.append('id_number', id_number);

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/enrolled';
            form.style.display = 'none';
            document.body.appendChild(form);

            for (const pair of formData.entries()) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = pair[0];
                input.value = pair[1];
                form.appendChild(input);
            }

            form.submit();


          setTimeout(function() {
    const url = 'https://bccwebportal.com/pre-enrolled-registration/' + updatedYearLvl + '/' + strand + '/Pending';
    window.location.href = url;
}, 3000);
        });
    });
    
</script> -->
<script>
document.querySelectorAll('.checkAll').forEach(checkAll => {
    checkAll.addEventListener('click', () => {
        const group = checkAll.getAttribute('data-group');
        const checkboxes = document.querySelectorAll(`input[name="subject_string_ids[]"][data-group="${group}"]`);
        checkboxes.forEach(checkbox => {
            checkbox.checked = checkAll.checked;
        });
    });
});
</script>