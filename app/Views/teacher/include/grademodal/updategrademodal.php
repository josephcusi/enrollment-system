<div class="modal fade" id="updategrade">
    <!-- Modal content -->
    <div class="modal-dialog modal-lg" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Grade Maintenance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('updateGrade') ?>" method="post">

                    <input type="hidden" class="form-control id" name="ids">
                    <input type="hidden" name="oldSubject_id" class="form-control sub" >
                    
                    <input type="hidden" name="oldSubject_Grade" class="form-control grade" >
                    <input type="hidden" name="oldSubject_Remark" class="form-control sub_remark" >
                
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label>Student Name</label>
                                <input type="text" class="form-control name"disabled>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control subject" disabled>
                                <input type="hidden" name="subject_id" class="form-control subject_id">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="inputgrade">Subject Grade</label>
                                <input type="text" name="subject_grade" class="form-control" id="inputgrade"
                                       min="0" max="100">
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

    <script>
$(document).ready(function() {
    // sa button
    $('.button-update-grade').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const sub = $(this).data('sub');
        const remark = $(this).data('remark');
        const grade = $(this).data('grade');
        const name = $(this).data('name');
        const subject = $(this).data('subject');
        const subject_id = $(this).data('subject_id');
        // console.log(lrn);
        // // sa modal
        $('.id').val(id);
        $('.subject_id').val(subject_id);
        $('.name').val(name);
        $('.sub_remark').val(remark);
        $('.subject').val(subject);
        $('.sub').val(sub);
        $('.grade').val(grade).trigger('change');
        // Call Modal
        $('#updategrade').modal('show');
    });
});
</script>