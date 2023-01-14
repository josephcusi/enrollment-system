<div class="modal fade" id="profilepicture">
                                    <div class="modal-dialog" style="font-family:poppins">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Profile</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php if(session()->has('validation')){
                                            $errorFlash = session()->getFlashdata('validation');} ?>
                                            <div class="modal-body">
                                                <form action="<?= base_url('updateProfile/'.$prof['id']); ?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <input type="hidden" name="_method" value="PUT" />
                                                    <div class="form-row"
                                                        style="text-align:center; justify-content:center;">
                                                        <div class="form-group col-md-10 prof_pict">
                                                            <label for="profile_picture">Profile Picture</label>
                                                            <input type="file" name="profile_picture"
                                                                class="form-control profile_pics" size="30" accept="image/*" required>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'profile_picture') : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                            </div>
                                            <!-- Submit button -->
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"style = "border-radius:20px; background-color:maroon; border-color:maroon">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->