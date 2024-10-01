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
                                    <input type="hidden" name="strand" class="form-control strand_idModal">
                                    <label for="inputSubject">Course Code</label>
                                    <input type="hidden" name="id" class="id">
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
                                    <select class="form-control" id="studentStrand" name="pre_requisit">
                                        <option type="text" class="form-control" id="semester"
                                            placeholder="1st Semester" value="N/A">N/A
                                        </option>
                                        <?php foreach($sub as $newSub):?>
                                        <option type="text" class="form-control" id="semester"
                                            placeholder="1st Semester" value="<?= $newSub['id']?>">
                                            <?= $newSub['subject']?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="text-danger">
                                        <?= isset($validation) ? display_error($validation, 'pre_requisit') : '' ?>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="year_level">Year Level</label>
                                    <select class="form-control year_levelModal" id="studentStrand" name="year_level">

                                        <option type="text" class="form-control year_levelModal" id="year_level"
                                            placeholder="Year Level" value="<?=$prospectus[0]['year_level']?>">
                                            <?=$prospectus[0]['year_level']?></option>

                                    </select>

                                    <span class="text-danger">
                                        <?= isset($validation) ? display_error($validation, 'year_level') : '' ?>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="semester">Semester</label>
                                    <select class="form-control semesterModal" id="studentStrand" name="semester">
                                        <option type="text" class="form-control" id="semester"
                                            placeholder="1st Semester" value="<?= $sem_year['semester']?>">
                                            <?= $sem_year['semester']?></option>
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
<script>
$(document).ready(function() {
    // sa button
    $('.btn-updateProspectus').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const subject = $(this).data('subject');
        const subject_title = $(this).data('subject_title');
        const unit = $(this).data('unit');
        const pre_requisit = $(this).data('pre_requisit');
        const year_level = $(this).data('year_level');
        const semester = $(this).data('semester');
        const strand_id = $(this).data('strand_id');

        console.log(id);
        // // sa modal
        $('.id').val(id);
        $('.strand_idModal').val(strand_id);
        $('.subjectModal').val(subject);
        $('.subject_titleModal').val(subject_title);
        $('.unitModal').val(unit);
        $('.year_levelModal').val(year_level);
        $('.semesterModal').val(semester);
        $('.pre_requisitModel').val(pre_requisit).trigger('change');
        // Call Modal
        $('#updatesubject').modal('show');
    });
});
</script>