<div class="modal fade" id="updateProfile">
    <div class="modal-dialog modal-lg" style="font-family:poppins;">
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
                <form action="<?= base_url('#'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputSection">Gender</label>
                            <select class="form-control gender" id="inputGender" name = "gender" value="<?= isset($profile['gender']) ? $profile['gender'] : '' ; ?>">
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputGender">Male</option>
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputGender">Female</option>
                            </select>
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'gender') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputStrand">Civil Status</label>
                            <select class="form-control civul_status"id="inputCivil" name = "civil_status">
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Single</option>
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Married</option>
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Divorced</option>
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Separated</option>
                            </select>
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'civil_status') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputSemester">Religion</label>
                            <input type="text" name="religion" class="form-control religion" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'religion') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Nationality</label>
                            <input type="text" name="nationality" class="form-control nationality" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'nationality') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Birthday</label>
                            <input class="birthday" type="date" name="birthday" class="form-control" id="birthday" placeholder="Birthday" >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'birthday') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Birth Place</label>
                            <input type="text" name="birthplace" class="form-control birthplace" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'birthplace') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Street</label>
                            <input type="text" name="street" class="form-control street" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'street') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Baranggay</label>
                            <input type="text" name="baranggay" class="form-control baranggay" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'baranggay') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Provincial Address</label>
                            <input type="text" name="prov_add" class="form-control prov_add" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'prov_add') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Contact</label>
                            <input type="text" name="contact" class="form-control contact" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'contact') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Guardian Name</label>
                            <input type="text" name="guardian_name" class="form-control guardian_name" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'guardian_name') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Guardian Contact</label>
                            <input type="text" name="guardian_contact" class="form-control guardian_contact" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'guardian_contact') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Guardian Address</label>
                            <input type="text" name="guardian_address" class="form-control guardian_address" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'guardian_address') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Elem. School</label>
                            <input type="text" name="elem_school" class="form-control elem_school" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'elem_school') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Elem. School Address</label>
                            <input type="text" name="elem_address" class="form-control elem_address" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'elem_address') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Year Graduated</label>
                            <input type="text" name="elem_year" class="form-control elem_year" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'elem_year') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">High School</label>
                            <input type="text" name="high_school" class="form-control high_school" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'high_school') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">High School Address</label>
                            <input type="text" name="high_address" class="form-control high_address" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'high_address') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Year Graduated</label>
                            <input type="text" name="high_year" class="form-control high_year" 
                              >
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'high_year') : '' ?>
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