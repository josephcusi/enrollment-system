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
                                            <form action="<?= base_url('updateUserProfile'); ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputGender">Gender</label>
                                                        <input type="hidden" class="form-control id" name="id">
                                                        <select class="form-control gender" style="border-radius:20px"
                                                            name="updategender"
                                                            value="<?= isset($profile['gender']) ? $profile['gender'] : '' ; ?>">
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;">Male
                                                            </option>
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;">Female
                                                            </option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'gender') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputReligion">Indigenous Peoples (IP)?</label>
                                                        <?php if(empty($ipcount['ip'])):?>
                                                        <input type="checkbox" name="ip" style="border-radius:20px;"
                                                            value="yes">
                                                        <?php else:?>
                                                        <input type="checkbox" name="ip" style="border-radius:20px;"
                                                            checked disabled>
                                                        <?php endif;?>

                                                        <input type="text" name="updateipOthers" class="form-control ip"
                                                            style="border-radius:20px;font-family:poppins;"
                                                            placeholder="If Yes. please specify">

                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'ipOthers') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputReligion">Age</label>
                                                        <input type="number" name="updateage" class="form-control age"
                                                            style="border-radius:20px;font-family:poppins;"
                                                            placeholder="e.g 18">
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'age') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputCivil">Civil Status</label>
                                                        <select class="form-control civil_status"
                                                            style="border-radius:20px"
                                                            name="updatecivil_status"
                                                            value="<?= isset($profile['civil_status']) ? $profile['civil_status'] : '' ; ?>">
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;">Single
                                                            </option>
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;">Married
                                                            </option>
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;">Divorced
                                                            </option>
                                                            <option type="text" class="form-control"
                                                                style="font-family: Poppins;">Separated
                                                            </option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'civil_status') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputReligion">Religion</label>
                                                        <input type="text" name="updatereligion"
                                                            class="form-control religion"
                                                            style="border-radius:20px;font-family:poppins;"
                                                             placeholder="Religion"
                                                            value="<?= isset($profile['religion']) ? $profile['religion'] : '' ; ?>">
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'religion') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputNationality">Nationality</label>
                                                        <input type="text" name="updatenationality"
                                                            class="form-control nationality"
                                                            style="border-radius:20px;font-family:poppins;"
                                                            placeholder="Nationality"
                                                            value="<?= isset($profile['nationality']) ? $profile['nationality'] : '' ; ?>">
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'nationality') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="inputBirthday">Birthday</label>
                                                        <input type="date" name="updatebirthday"
                                                            class="form-control birthday"
                                                            style="border-radius:20px;font-family:poppins;"
                                                            placeholder="Birthday"
                                                            value="<?= isset($profile['birthday']) ? $profile['birthday'] : '' ; ?>">
                                                        <span class="text-danger">
                                                            <?= isset($errorFlash) ? display_error($errorFlash, 'birthday') : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" style="font-family: Poppins;">
                                                        <label for="birthplace">Birthplace</label>
                                                        <input type="text" name="updatebirthplace"
                                                            class="form-control birthplace"
                                                            style="border-radius:20px;font-family:poppins;"
                                                            placeholder="Birthplace"
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

                                    <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Address
                                    </p>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label"
                                            style="font-family:poppins;">Provincial Address</label>
                                        <div class="col-sm-5">
                                            <div>
                                                <input type="text" name="updateprov_add" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    placeholder="e.g Bonifacio"
                                                    value="<?= isset($profile['prov_add']) ? $profile['prov_add'] : '' ; ?>">
                                            </div>
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'prov_add') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="contact" class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">City</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="updatecity" class="form-control"
                                                style="border-radius:20px;font-family:poppins;"
                                                placeholder="e.g Poblacion"
                                                value="<?= isset($profile['city']) ? $profile['city'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'city') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contact" class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">Barangay</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="updatebaranggay" class="form-control"
                                                style="border-radius:20px;font-family:poppins;"
                                                placeholder="e.g Baco"
                                                value="<?= isset($profile['baranggay']) ? $profile['baranggay'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'baranggay') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group row">
                                        <label for="contact" class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">Street</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control"
                                                style="border-radius:20px;font-family:poppins;" name="updatestreet"
                                                placeholder="e.g Oriental Mindoro"
                                                value="<?= isset($profile['street']) ? $profile['street'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'street') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pcontact" class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">Zip Code</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="updatezipcode" class="form-control zipcode"
                                                style="border-radius:20px;font-family:poppins;"
                                                placeholder="e.g 5102">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'zipcode') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pcontact" class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">Contact</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="updatecontact" class="form-control"
                                                style="border-radius:20px;font-family:poppins;"
                                                placeholder="e.g 09123456789"
                                                value="<?= isset($profile['contact']) ? $profile['contact'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'contact') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="guardian1">
                                        <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">
                                            Parent's/Guardian Information</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-9 col-form-label"
                                                    style="font-family: Poppins;">Father's Name</label>

                                                <input type="text" class="form-control father_name"
                                                    style="border-radius:20px;font-family:poppins;" name="updatefather_name"
                                                    placeholder="e.g Dela Cruz Juan E.">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'father_name') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-9 col-form-label"
                                                    style="font-family: Poppins;">Occupation</label>
                                                <input type="text" class="form-control father_occupation"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="updatefather_occupation" placeholder="Farmer.">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'father_occupation') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Father's Residence</label>
                                                <input type="text" class="form-control father_address"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="updatefather_address"
                                                    placeholder="e.g Poblacion, Baco, Oriental Mindoro.">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'father_address') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="contact" class="col-sm-7 col-form-label"
                                                    style="font-family: Poppins;">Contact</label>
                                                <input type="number" class="form-control father_contact"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="updatefather_contact"
                                                    placeholder="e.g 09123456789">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'father_contact') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-10 col-form-label"
                                                    style="font-family: Poppins;">Mother's Name</label>
                                                <input type="text" class="form-control mother_name"
                                                    style="border-radius:20px;font-family:poppins;" name="updatemother_name"
                                                    placeholder="e.g Dela Cruz Sisa A."
                                                  >
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'mother_name') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-9 col-form-label"
                                                    style="font-family: Poppins;">Occupation</label>
                                                <input type="text" class="form-control mother_occupation"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="updatemother_occupation" placeholder="Farmer.">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'mother_occupation') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Mother's Residence</label>
                                                <input type="text" class="form-control mother_address"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="updatemother_address"
                                                    placeholder="e.g Poblacion, Baco, Oriental Mindoro.">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'mother_address') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="contact" class="col-sm-7 col-form-label"
                                                    style="font-family: Poppins;">Contact</label>
                                                <input type="number" class="form-control mother_contact"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="updatemother_contact"
                                                    placeholder="e.g 09123456789">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'mother_contact') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-7 col-form-label"
                                                    style="font-family: Poppins;">Guardian</label>
                                                <input type="text" class="form-control guardian_name"
                                                    style="border-radius:20px;font-family:poppins;" name="updateguardian_name"
                                                    placeholder="e.g Juan E. Dela Cruz">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_name') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-9 col-form-label"
                                                    style="font-family: Poppins;">Occupation</label>
                                                <input type="text" class="form-control guardian_occupation"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="updateguardian_occupation" placeholder="Farmer.">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_occupation') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="contact" class="col-sm-7 col-form-label"
                                                    style="font-family: Poppins;">Address</label>
                                                <input type="text" class="form-control guardian_address"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="updateguardian_address" id="guardian_address"
                                                    placeholder="e.g Poblacion, Baco, Oriental Mindoro">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_address') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="contact" class="col-sm-7 col-form-label"
                                                    style="font-family: Poppins;">Contact</label>
                                                <input type="number" class="form-control guardian_contact"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="updateguardian_contact"
                                                    placeholder="e.g 09123456789">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_contact') : '' ?>
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
                                                style="border-radius:20px;font-family:poppins;"
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
                                                style="border-radius:20px;font-family:poppins;"
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
                                                style="border-radius:20px;font-family:poppins;" 
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
                                                style="border-radius:20px;font-family:poppins;"
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
                                                style="border-radius:20px;font-family:poppins;" 
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
                                                style="border-radius:20px;font-family:poppins;" 
                                                name="updatehigh_year" placeholder="Year attendee"
                                                value="<?= isset($profile['high_year']) ? $profile['high_year'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'high_year') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <p class="a" style="font-size:1.5em; font-family: Poppins; color:maroon;">Senior High
                                        School</p>
                                    <div class="form-group row">
                                        <label for="school_name" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">School Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control senior_high_school"
                                                style="border-radius:20px;font-family:poppins;"
                                                name="updatesenior_high_school" placeholder="School Name"
                                                value="<?= isset($profile['senior_high_school']) ? $profile['senior_high_school'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'senior_high_school') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control senior_high_address"
                                                style="border-radius:20px;font-family:poppins;" 
                                                name="updatesenior_high_address" placeholder="Address"
                                                value="<?= isset($profile['senior_high_address']) ? $profile['senior_high_address'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'senior_high_address') : '' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="year" class="col-sm-3 col-form-label"
                                            style="font-family: Poppins;">Year Attendee</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control senior_high_year"
                                                style="border-radius:20px;font-family:poppins;" 
                                                name="updatesenior_high_year" placeholder="Year attendee"
                                                value="<?= isset($profile['senior_high_year']) ? $profile['senior_high_year'] : '' ; ?>">
                                            <span class="text-danger">
                                                <?= isset($errorFlash) ? display_error($errorFlash, 'senior_high_year') : '' ?>
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