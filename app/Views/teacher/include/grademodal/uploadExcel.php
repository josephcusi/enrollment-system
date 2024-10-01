<?php if(count($userInfo) != 0 and count($check) == 0):?>
<div class="modal fade" id="excelUpload">
    <div class="modal-dialog modal-md" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Grade Maintenance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=site_url('convertExcelToHtml')?>" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-12">
                            <label>Please review the grades before proceeding with the upload.</label>
                            <input type="hidden" class="form-control sub_id" name="sub_id">
                            <input type="hidden" class="form-control year_level" name="year_level">
                            <input type="file" class="form-control" name="uploadExcel">
                        </div>
                    <!-- Submit button -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php else:?>
        <div class="modal fade" id="excelUpload">
    <div class="modal-dialog modal-md" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Grade Maintenance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=site_url('update_student_grade_excel')?>" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-12">
                            <label>Please review the grades before proceeding with the upload.</label>
                            <input type="hidden" class="form-control id" name="id">
                            <input type="hidden" class="form-control year_level" name="year_level">
                            <input type="hidden" name="sub_id" class="form-control sub_id">
                            <input type="file" class="form-control" name="uploadExcel">
                        </div>
                    <!-- Submit button -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php endif;?>