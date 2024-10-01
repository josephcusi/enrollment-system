<div class="modal fade" id="new-section">
    <div class="modal-dialog" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('newsection11'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-row">
                        <input type="text" name="strand_id" class="form-control" value="">
                        <div class="form-group col-md-6">
                            <label for="inputSection">Section</label>
                            <input type="text" name="section" class="form-control" id="inputSection"
                                placeholder="Section">
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'section') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputYearLevel">Year Level</label>
                            <select class="form-control" id="studentStrand" name="year_level">

                                <option type="text" class="form-control" id="year_level" placeholder="Year Level"
                                    value="<?=$stud_id['year_level']?>">
                                    <?=$stud_id['year_level']?></option>

                            </select>
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'year_level') : '' ?>
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