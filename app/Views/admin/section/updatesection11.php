<div class="modal fade" id="updatesection">
    <div class="modal-dialog" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-family:poppins">Update Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('section_update11') ?>" method="post">
                    <input type="hidden" name="_method" value="PUT" />
                    <?= csrf_field(); ?>
                    <div class="form-row">
                        <input type="hidden" name="id" class="id">
                        <div class="form-group col-sm-6 mx-auto">
                            <label for="inputSection">Section</label>
                            <input type="text" name="section" class="form-control sectionModal" id="inputSection"
                                placeholder="Section" required>
                            <span class="text-danger">
                            </span>
                        </div>
                        <div class="form-group col-sm-6 mx-auto">
                            <label for="inputYearLevel">Year Level</label>
                            <select class="form-control year_levelModal" id="studentStrand" name="year_level">

                                <option type="text" class="form-control" id="year_level" placeholder="Year Level"
                                    value="Grade 11">Grade 11</option>

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