<div class="modal fade" id="update_student">
    <div class="modal-dialog modal-xl" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Student Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?= site_url('update_student_info');?>" method='post' enctype="multipart/form-data">
                    <div class="form-row">
                        <input type="hidden" name="id" class="form-control id">
                        <div class="form-group col-md-5 mx-auto text-center">
                            <label for="year-range-input">School ID</label>
                            <input type="text" id="year-range-input" name="school_id" class="form-control school_id" placeholder="School ID">
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'section') : '' ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="year-range-input">First Name</label>
                            <input type="text" name="firstname" class="form-control firstname" placeholder="First Name">
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'section') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="year-range-input">Middle Name</label>
                            <input type="text" name="middlename" class="form-control middlename" placeholder="Middle Name">
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'section') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="year-range-input">Last Name</label>
                            <input type="text" name="lastname" class="form-control lastname" placeholder="Last Name">
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'section') : '' ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="year-range-input">Email</label>
                            <input type="email" name="email" class="form-control email" placeholder="Email">
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'section') : '' ?>
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
<script>
$(document).ready(function() {
    // sa button
    $('.btn-update_student').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const school_id = $(this).data('school_id');
        const firstname = $(this).data('firstname');
        const middlename = $(this).data('middlename');
        const lastname = $(this).data('lastname');
        const email = $(this).data('email');
        // // // sa modal
        $('.id').val(id);
        $('.school_id').val(school_id);
        $('.firstname').val(firstname);
        $('.middlename').val(middlename);
        $('.lastname').val(lastname);
        $('.email').val(email).trigger('change');
        // Call Modal
        $('#update_student').modal('show');
    });
});
</script>