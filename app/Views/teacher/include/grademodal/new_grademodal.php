<?php if(count($userInfo) != 0):?>
<div class="modal fade" id="addnewGrade">
    <div class="modal-dialog modal-lg" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Grade Maintenance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=site_url('update_student_grade')?>" method="post">
                    <input type="hidden" class="form-control id" name="id">
                    <input type="hidden" class="form-control lrn" name="student_lrn">
                    <?php foreach($userInfo as $user): ?>
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label>Student Name</label>
                            <input type="hidden" class="form-control" name="lrn[]" value="<?= $user['stud_lrn']?>">
                            <input type="text" class="form-control"
                                value="<?= $user['lastname'] . ', ' . $user['firstname'] . ' ' . $user['middlename']?>"
                                disabled>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Subject</label>
                            <input type="text" name="" class="form-control" value="<?= empty($test['subject']) ? $user['subject'] : $test['subject'] ?>" disabled>
                            <input type="hidden" name="subject[]" class="form-control"
                                value="<?= empty($test['id']) ? $user['pros_id'] : $test['id'] ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="inputgrade">Subject Grade</label>
                            <input type="number" name="subject_grade[]" class="form-control" id="inputgrade" min="0"
                                max="100">
                        </div>
                    </div>
                    <?php endforeach; ?>

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
    <?php else:?>
    <?php endif;?>


    <script>
$(document).ready(function() {
    // sa button
    $('.button-update-grading').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const lrn = $(this).data('lrn');
        // console.log(id,subject_id,subject_grade,subject_remark);
        // // sa modal
        $('.id').val(id);
        $('.lrn').val(lrn).trigger('change');
        // Call Modal
        $('#addnewGrade').modal('show');
    });
});
</script>