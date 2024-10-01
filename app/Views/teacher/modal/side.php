<div class="modal fade" id="side">
    <div class="modal-dialog" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change education type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php if(session()->has('validation')){
                                            $errorFlash = session()->getFlashdata('validation');} ?>
            <div class="modal-body">
                <form action="<?= base_url('teacher_side_option'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12" style="font-family: Poppins;">
                            <label for="inputGender">SHS/COLLEGE</label>
                            <input type="hidden" class="form-control id" name="id">
                            <select class="form-control status" name="status">
                                <option type="text" class="form-control" style="font-family: Poppins;" id="inputGender">
                                    SHS
                                </option>
                                <option type="text" class="form-control" style="font-family: Poppins;" id="inputGender">
                                    COLLEGE
                                </option>
                            </select>
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'gender') : '' ?>
                            </span>
                        </div>
                    </div>
            </div>
            <!-- Submit button -->
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-default"
                    style="border-radius:20px;background-color:maroon; color:white;">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->