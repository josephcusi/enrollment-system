<div class="modal fade" id="excelUploadStudent">
    <div class="modal-dialog" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Student Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('student-list')?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-row">
                        <input type="hidden" value="insert_data" name="has_data">
                        <div class="form-group col-md-12">
                            <label>Please review the data before proceeding with the upload.</label>
                            <input type="file" class="form-control" name="uploadExcel">
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