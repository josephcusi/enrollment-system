<div class="modal fade" id="updategrade">
    <div class="modal-dialog" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-family:poppins">Update Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('#') ?>" method="post">
                    <input type="hidden" name="_method" value="PUT" />
                    <?= csrf_field(); ?>
                    <div class="form-row">
                        <input type="text" name="id" class="id">
                        <?php foreach($grade as $updateGrade):?>
                        <div class="form-group col-sm-8 mx-auto">
                            <label for="inputSection"><?//= $updateGrade['subject']?></label>
                            <input type="text" name="grade[]" class="form-control sectionModal" id="inputSection"
                                placeholder="Grade" required>
                            <span class="text-danger">
                            </span>
                        </div>
                        <?php endforeach;?>
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