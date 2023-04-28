<div class="modal fade" id="updategrade">
    <div class="modal-dialog modal-lg" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Grade Maintenance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=site_url('updateGrade')?>" method="post">
                    <div class="form-row" style="margin-left:25%">
                        <input type="hidden" name="idmod" class="idModal">
                        <input type="hidden" name="lrn" class="lrn">
                        <?php 
          $grades = array_combine(explode(",", $student_grade['subject_id']), explode(",", $student_grade['subject_grade']));
          foreach($subject as $sub):
              if(isset($grades[$sub['id']])):
      ?>
                        <div class="form-group col-sm-5">
                            <label>Subject</label>
                            <input type="text" class="form-control" value="<?= $sub['subject']?>" disabled>
                            <input type="hidden" name="subject[]" class="form-control" value="<?= $sub['id']?>">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="inputgrade">Subject Grade</label>
                            <input type="number" name="subject_grade[]" value="<?=$grades[$sub['id']]?>"
                                class="form-control" id="inputgrade" min="0" max="100">
                        </div>
                        <?php 
            endif;
        endforeach; 
    ?>
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