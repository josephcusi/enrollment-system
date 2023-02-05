<div class="modal fade" id="addgrade">
        <div class="modal-dialog" style = "font-family:poppins">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Grade Maintenance</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?=site_url('grading/'. $id)?>" method="post">
                    <div class="form-horizontal" style = "margin-left:25%">
                    <div class="form-row mt-9"> 
                  <input type="hidden" class="id" name="id">
                  </div>
                  <div class="form-group col-md-9">
                      <label >Subject</label>
                      <select class="form-control" name="subject">
                          <?php foreach($info as $newInfo): ?>
                          <option type="text" value="<?= $newInfo['id']?>">
                              <?= $newInfo['subject'] ?>
                            </option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group col-md-9">
                      <label for="inputgrade">Midterm Grade</label>
                      <input type="hidden" name="lrn" class="lrnModal">
                      <input type="number" name="midterm" class="form-control" id="inputgrade" min = "75" max = "100">
                    </div>
                    <div class="form-group col-md-9">
                      <label for="inputgrade">Final Grade</label>
                      <input type="number" name="finals" class="form-control" id="inputgrade" min = "75" max = "100">
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
