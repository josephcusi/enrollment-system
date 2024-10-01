<div class="modal fade" id="past_sched">
    <div class="modal-dialog" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Past Schedules</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('all_year'); ?>" method="post">
                    <div class="form-group">
                        <label for="inputStrand">Schedules</label>
                        <input type="hidden" class="form-control section_id" name="section_id">
                        <select type="text" name="sched_year" class="form-control">
                            <?php foreach($sched_years as $sched_year):?>
                            <option value="<?= $sched_year['year']?>"><?= $sched_year['year']?></option>
                            <?php endforeach;?>
                        </select>
                        <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'strand') : '' ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="inputTitle">Semester</label>
                        <select type="text" name="semester" class="form-control">
                            <option value="1st Semester">1st Semester</option>
                            <option value="2nd Semester">2nd Semester</option>
                        </select>
                        <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'title') : '' ?>
                        </span>
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
<script>
$(document).ready(function() {
    // sa button
    $('.button-past-schedule').on('click', function() {
        // data galing buton
        const section_id = $(this).data('section_id');

        // // sa modal
        $('.section_id').val(section_id).trigger('change');
        // Call Modal
        $('#past_sched').modal('show');
    });
});
</script>