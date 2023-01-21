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
                <form action="<?= base_url('updateUserProfile/'.$myProfile['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputSection">Gender</label>
                            <select class="form-control updategender" id="inputGender" name = "updategender" >
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputGender">Male</option>
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputGender">Female</option>
                            </select>
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updategender') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputStrand">Civil Status</label>
                            <select class="form-control civil_status"id="inputCivil" name = "updatecivil_status" >
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Single</option>
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Married</option>
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Divorced</option>
                            <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Separated</option>
                            </select>
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updatecivil_status') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputSemester">Religion</label>
                            <input type="text" name="updatereligion" class="form-control religion" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updatereligion') : '' ?>                         </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Nationality</label>
                            <input type="text" name="updatenationality" class="form-control nationality" 
                              >
                            <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'updatenationality') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Birthday</label>
                            <input class="birthday" type="date" name="updatebirthday" class="form-control" id="birthday" placeholder="Birthday" >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updatebirthday') : '' ?>                         </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Birth Place</label>
                            <input type="text" name="updatebirthplace" class="form-control birthplace" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updatebirthplace') : '' ?>                           </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Street</label>
                            <input type="text" name="updatestreet" class="form-control street" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updatestreet') : '' ?>                       </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Baranggay</label>
                            <input type="text" name="updatebaranggay" class="form-control baranggay" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updatebaranggay') : '' ?>                          </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Provincial Address</label>
                            <input type="text" name="updateprov_add" class="form-control prov_add" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updateprov_add') : '' ?>                         </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Contact</label>
                            <input type="text" name="updatecontact" class="form-control contact" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updatecontact') : '' ?>                        </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Guardian Name</label>
                            <input type="text" name="updateguardian_name" class="form-control guardian_name" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updateguardian_name') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Guardian Contact</label>
                            <input type="text" name="updateguardian_contact" class="form-control guardian_contact" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updateguardian_contact') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Guardian Address</label>
                            <input type="text" name="updateguardian_address" class="form-control guardian_address" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updateguardian_address') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Elem. School</label>
                            <input type="text" name="updateelem_school" class="form-control elem_school" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updateelem_school') : '' ?>                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Elem. School Address</label>
                            <input type="text" name="updateelem_address" class="form-control elem_address" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updateelem_address') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Year Graduated</label>
                            <input type="text" name="updateelem_year" class="form-control elem_year" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updateelem_year') : '' ?>                          </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">High School</label>
                            <input type="text" name="updatehigh_school" class="form-control high_school" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updatehigh_school') : '' ?>                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">High School Address</label>
                            <input type="text" name="updatehigh_address" class="form-control high_address" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updatehigh_address') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputYearLevel">Year Graduated</label>
                            <input type="text" name="updatehigh_year" class="form-control high_year" 
                              >
                            <span class="text-danger">
                                <?= isset($errorFlash) ? display_error($errorFlash, 'updatehigh_year') : '' ?>                          </span>
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