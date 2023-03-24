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
                <div class="col-md-13">
                    <div class="card card-primary card-outline mx-auto" style="">

                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active"
                                        style="border-radius:20px;font-family: Poppins;" href="#basic_info1"
                                        data-toggle="tab">Basic
                                        Information</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        style="border-radius:20px;font-family: Poppins;" href="#address1"
                                        data-toggle="tab">Address</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        style="border-radius:20px;font-family: Poppins;" href="#guardian1"
                                        data-toggle="tab">Guardian</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        style="border-radius:20px;font-family: Poppins;" href="#education1"
                                        data-toggle="tab">Education</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                <div class="active tab-pane" id="basic_info1">
                                    <div class="container">
                                        <div class="card-body">
                                            <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">
                                                Other Info</p>
                                            <form action="<?= base_url('updateUserProfile/'.$myProfile['id']); ?>"
                                                method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputGender">Gender</label>
                                                        <select class="form-control gender" style="border-radius:20px"
                                                            id="inputGender" name="updategender"
                                                            value="<?= isset($profile['gender']) ? $profile['gender'] : '' ; ?>">
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;" id="inputGender">Male
                                                            </option>
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;" id="inputGender">Female
                                                            </option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'gender') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputCivil">Civil Status</label>
                                                        <select class="form-control civil_status" style="border-radius:20px"
                                                            id="inputCivil" name="updatecivil_status"
                                                            value="<?= isset($profile['civil_status']) ? $profile['civil_status'] : '' ; ?>">
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;" id="inputCivil">Single
                                                            </option>
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;" id="inputCivil">Married
                                                            </option>
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;" id="inputCivil">Divorced
                                                            </option>
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;" id="inputCivil">Separated
                                                            </option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'civil_status') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputReligion">Religion</label>
                                                        <input type="text" name="updatereligion" class="form-control religion"
                                                            style="border-radius:20px;font-family:poppins;"
                                                            id="religion" placeholder="Religion"
                                                            value="<?= isset($profile['religion']) ? $profile['religion'] : '' ; ?>">
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'religion') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputNationality">Nationality</label>
                                                        <input type="text" name="updatenationality" class="form-control nationality"
                                                            style="border-radius:20px;font-family:poppins;"
                                                            id="nationality" placeholder="Nationality"
                                                            value="<?= isset($profile['nationality']) ? $profile['nationality'] : '' ; ?>">
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'nationality') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputBirthday">Birthday</label>
                                                        <input type="date" name="updatebirthday" class="form-control birthday"
                                                            style="border-radius:20px;font-family:poppins;"
                                                            id="birthday" placeholder="Birthday"
                                                            value="<?= isset($profile['birthday']) ? $profile['birthday'] : '' ; ?>">
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'birthday') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="birthplace">Birthplace</label>
                                                        <input type="text" name="updatebirthplace" class="form-control birthplace"
                                                            style="border-radius:20px;font-family:poppins;"
                                                            id="birthplace" placeholder="Birthplace"
                                                            value="<?= isset($profile['birthplace']) ? $profile['birthplace'] : '' ; ?>">
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'birthplace') : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="address1">

                                    <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Address</p>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label"
                                            style="font-family:poppins;">Street</label>
                                        <div class="col-sm-8">
                                            <div>
                                                <input type="text" name="updatestreet" class="form-control street"
                                                    style="border-radius:20px;font-family:poppins;" id="street"
                                                    placeholder="Street"
                                                    value="<?= isset($profile['street']) ? $profile['street'] : '' ; ?>">
                                            </div>
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'street') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="contact" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Baranggay</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="updatebaranggay" class="form-control baranggay"
                                                style="border-radius:20px;font-family:poppins;" id="baranggay"
                                                placeholder="Baranggay"
                                                value="<?= isset($profile['baranggay']) ? $profile['baranggay'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'baranggay') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group row">
                                        <label for="contact" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Provincial Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control prov_add"
                                                style="border-radius:20px;font-family:poppins;" name="updateprov_add"
                                                id="prov_add" placeholder="Provincial"
                                                value="<?= isset($profile['prov_add']) ? $profile['prov_add'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'prov_add') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pcontact" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Contact</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="updatecontact" class="form-control contact"
                                                style="border-radius:20px;font-family:poppins;" id="contact"
                                                placeholder="Contact"
                                                value="<?= isset($profile['contact']) ? $profile['contact'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'contact') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="guardian1">
                                    <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Guardian
                                    </p>
                                    <div class="form-group row">
                                        <label for="guardian" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Guardian</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control guardian_name"
                                                style="border-radius:20px;font-family:poppins;" name="updateguardian_name"
                                                id="guardian_name" placeholder="Guardian Name"
                                                value="<?= isset($profile['guardian_name']) ? $profile['guardian_name'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_name') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contact" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Contact</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control guardian_contact"
                                                style="border-radius:20px;font-family:poppins;" name="updateguardian_contact"
                                                id="guardian_contact" placeholder="Contact Number"
                                                value="<?= isset($profile['guardian_contact']) ? $profile['guardian_contact'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_contact') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contact" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control guardian_address"
                                                style="border-radius:20px;font-family:poppins;" name="updateguardian_address"
                                                id="guardian_address" placeholder="Address"
                                                value="<?= isset($profile['guardian_address']) ? $profile['guardian_address'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_address') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="education1">
                                    <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Elementary
                                    </p>
                                    <div class="form-group row">
                                        <label for="school" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">School Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control elem_school"
                                                style="border-radius:20px;font-family:poppins;" id="school"
                                                name="updateelem_school" placeholder="School Name"
                                                value="<?= isset($profile['elem_school']) ? $profile['elem_school'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'elem_school') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control elem_address"
                                                style="border-radius:20px;font-family:poppins;" id="contact"
                                                name="updateelem_address" placeholder="Address"
                                                value="<?= isset($profile['elem_address']) ? $profile['elem_address'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'elem_address') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="year" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Year Attendee</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control elem_year"
                                                style="border-radius:20px;font-family:poppins;" id="address"
                                                name="updateelem_year" placeholder="Year attendee"
                                                value="<?= isset($profile['elem_year']) ? $profile['elem_year'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'elem_year') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <p class="a" style="font-size:1.5em; font-family: Poppins; color:maroon;">High
                                        School</p>
                                    <div class="form-group row">
                                        <label for="school_name" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">School Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control high_school"
                                                style="border-radius:20px;font-family:poppins;" id="school_name"
                                                name="updatehigh_school" placeholder="School Name"
                                                value="<?= isset($profile['high_school']) ? $profile['high_school'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'high_school') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control high_address"
                                                style="border-radius:20px;font-family:poppins;" id="address"
                                                name="updatehigh_address" placeholder="Address"
                                                value="<?= isset($profile['high_address']) ? $profile['high_address'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'high_address') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="year" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Year Attendee</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control high_year"
                                                style="border-radius:20px;font-family:poppins;" id="year"
                                                name="updatehigh_year" placeholder="Year attendee"
                                                value="<?= isset($profile['high_year']) ? $profile['high_year'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'high_year') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>


                                </div>


                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->

                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->