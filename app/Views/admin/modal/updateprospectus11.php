<div>
    <div>
        <div class="modal fade subjectmodal" id="updatesubject">
            <div class="modal-dialog" style="font-family:poppins">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="font-family:poppins">Update Prospectus</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('updateProspectus11'); ?>" method="post">
                            <input type="hidden" name="_method" value="PUT" />
                            <?= csrf_field(); ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <!-- <input type="hidden" name="strand" class="form-control" value="<$strand ?>"> -->
                                    <label for="inputSubject">Subject Code</label>
                                    <input type="hidden" name="id" class="id">
                                    <input type="hidden" name="year" class="form-control" value="<?= $sem_year['year']?>">
                                    <input type="text" name="subject" class="form-control subjectModal"
                                        id="inputSubject" placeholder="Subject">
                                    <span class="text-danger">
                                        <?= isset($validation) ? display_error($validation, 'subject') : '' ?>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputTitle">Title</label>
                                    <input type="text" name="title" class="form-control subject_titleModal"
                                        id="inputTitle" placeholder="Title">
                                    <span class="text-danger">
                                        <?= isset($validation) ? display_error($validation, 'title') : '' ?>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputUnit">Unit</label>
                                    <input type="text" name="unit" class="form-control unitModal" id="inputUnit"
                                        placeholder="Unit">
                                    <span class="text-danger">
                                        <?= isset($validation) ? display_error($validation, 'unit') : '' ?>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="PreRequisit">Pre-requisit</label>
                                    <input type="text" name="pre_requisit" class="form-control pre_requisitModel"
                                        id="PreRequisit" placeholder="Pre-Requisit">
                                    <span class="text-danger">
                                        <?= isset($validation) ? display_error($validation, 'pre_requisit') : '' ?>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="year_level">Year Level</label>
                                    <select class="form-control year_levelModal" id="studentStrand" name="year_level">

                                        <option type="text" class="form-control" id="year_level"
                                            placeholder="Year Level" value="Grade 11">Grade 11</option>

                                    </select>

                                    <span class="text-danger">
                                        <?= isset($validation) ? display_error($validation, 'year_level') : '' ?>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="semester">Semester</label>
                                    <select class="form-control semesterModal" id="studentStrand" name="semester">
                                    <option type="text" class="form-control" id="semester" placeholder="1st Semester" value="<?= $sem_year['semester']?>"><?= $sem_year['semester']?></option>
                                    </select>
                                    <span class="text-danger">
                                        <?= isset($validation) ? display_error($validation, 'semester') : '' ?>
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


    </div>
</div>