<!-- Modal -->

<div class="modal fade" id="cred_schedule" style="display: none; font-family: Poppins;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Student Credential Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?=site_url('cred_schedule')?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label>Name</label>
                            <input type="hidden" class="form-control id" name="id">
                            <input type="text" class="form-control name" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label>Purpose</label>
                            <input type="text" class="form-control purpose" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="inputgrade">Credential to be requested</label>
                            <input type="text" class="form-control cred_requested" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="inputgrade">Schedule to be taken</label>
                            <input type="date" class="form-control" name="schedule">
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            Changes</button>
                    </div>
            </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
$(document).ready(function() {
    // sa button
    $('.btn-print-schedule').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const status = $(this).data('status');
        const name = $(this).data('name');
        const purpose = $(this).data('purpose');
        const cred_requested = $(this).data('cred_requested');

        $('.id').val(id);
        $('.status').val(status);
        $('.name').val(name);
        $('.purpose').val(purpose);
        $('.cred_requested').val(cred_requested).trigger('change');
        // Call Modal
        $('#cred_schedule').modal('show');

    });
});
</script>