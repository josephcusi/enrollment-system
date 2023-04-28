<div class="modal fade" id="addgrade">
    <div class="modal-dialog modal-lg" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Grade Maintenance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=site_url('gradingStud')?>" method="post">
                    <div class="form-row" style="margin-left:25%">
                    <input type="hidden" name="lrn" class="lrnModal">
                            <?php $ids = explode(",", $info['subject_id']);
                          foreach($ids as $newInfo):
                            foreach($subject as $sub):
                              if($newInfo == $sub['id']):
                            ?>
                        <div class="form-group col-sm-5">
                            <label>Subject</label>
                            <input type="text" class="form-control" value="<?= $sub['subject']?>" disabled>
                            <input type="hidden" name="subject[]" class="form-control" value="<?= $sub['id']?>">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="inputgrade">Subject Grade</label>
                            <input type="number" name="subject_grade[]" class="form-control" id="inputgrade" min="0" max="100">
                        </div>
                        <?php endif; endforeach; endforeach;?>
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