<div class="modal fade" id="changePassword">
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
                                                <form action="<?= base_url('updatePassword'); ?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <input type="hidden" name="_method" value="PUT" />
                                                    <div class="form-row" style="text-align:center; justify-content:center;">
                                                        <div class="form-group col-md-10 password">
                                                            <label for="password">Old Password</label>
                                                            <div class="input-group">
                                                                <input type="password" name="oldpass" class="form-control password" placeholder="Old Password" required>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" id="toggleOldPassword">Show</button>
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'Old Password') : '' ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group col-md-10 password">
                                                            <label for="password">New Password</label>
                                                            <div class="input-group">
                                                                 <input type="hidden" name="password_id" class="form-control password_id">
                                                                <input type="password" name="password" class="form-control password" placeholder="New Password" required>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">Show</button>
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'password') : '' ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group col-md-10 password">
                                                            <label for="confPassword">Confirm Password</label>
                                                            <div class="input-group">
                                                                <input type="password" name="confPassword" class="form-control confPassword" placeholder="Confirm Password" required>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">Show</button>
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'confPassword') : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                            </div>
                                            <!-- Submit button -->
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-default" style = "border-radius:20px;background-color:maroon; color:white;">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        const toggleOldPassword = document.getElementById("toggleOldPassword");
                                        const toggleNewPassword = document.getElementById("toggleNewPassword");
                                        const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
                                
                                        const oldPasswordInput = document.querySelector("input[name='oldpass']");
                                        const newPasswordInput = document.querySelector("input[name='password']");
                                        const confirmPasswordInput = document.querySelector("input[name='confPassword']");
                                
                                        toggleOldPassword.addEventListener("click", function () {
                                            togglePasswordVisibility(oldPasswordInput, toggleOldPassword);
                                        });
                                
                                        toggleNewPassword.addEventListener("click", function () {
                                            togglePasswordVisibility(newPasswordInput, toggleNewPassword);
                                        });
                                
                                        toggleConfirmPassword.addEventListener("click", function () {
                                            togglePasswordVisibility(confirmPasswordInput, toggleConfirmPassword);
                                        });
                                
                                        function togglePasswordVisibility(inputElement, toggleButton) {
                                            if (inputElement.type === "password") {
                                                inputElement.type = "text";
                                                toggleButton.textContent = "Hide";
                                            } else {
                                                inputElement.type = "password";
                                                toggleButton.textContent = "Show";
                                            }
                                        }
                                    });
                                </script>