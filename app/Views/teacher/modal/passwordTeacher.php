<div class="modal fade" id="changePassword">
    <div class="modal-dialog" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php if(session()->has('validation')){
                                            $errorFlash = session()->getFlashdata('validation');} ?>
            <div class="modal-body">
                <form action="<?= base_url('updatePasswordTeacher'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-row" style="text-align:center; justify-content:center;">
                        <div class="form-group col-md-10 password">
                            <label for="password">Old Password</label>
                            <input type="hidden" name="id" class="form-control id">
                            <input type="password" name="oldpass" class="form-control password"
                                placeholder="Old Password" required>
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'Old Password') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-10 password">
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control password"
                                placeholder="New Password" required>
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'password') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-10 password">
                            <label for="confPassword">Confirm Password</label>
                            <input type="password" name="confPassword" class="form-control confPassword"
                                placeholder="Confirm Password" required>
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'confPassword') : '' ?>
                            </span>
                        </div>
                    </div>
            </div>
            <!-- Submit button -->
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-default"
                    style="border-radius:20px;background-color:maroon; font-color:white;">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->