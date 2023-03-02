<div class="modal fade" id="updategrade">
        <div class="modal-dialog" style = "font-family:poppins">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Grade Maintenance</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <form action="<?=site_url('updateGrade/'. $id)?>" method="post">
            <input type="hidden" name="_method" value="PUT" />
                    <div class="form-horizontal" style = "margin-left:25%">
                    <div class="form-group col-md-9">
                      <label >Subject</label>
                      <input class="form-control Modalsubject" name="subject" disabled>
                    </div>
                    <div class="form-group col-md-9">
                      <input type="hidden" name="idmod" class="idModal">
                      <input type="hidden" name="year" value="<?= $info[0]['year']?>">
                      <input type="hidden" name="semester" value="<?= $year_sem[0]['semester']; ?>">
                      <label for="inputgrade">Midterm Grade</label>
                      <input type="number" name="midterm" class="form-control midterm_modal" id="inputgrade" min = "75" max = "100">
                    </div>
                    <div class="form-group col-md-9">
                      <label for="inputgrade">Final Grade</label>
                      <input type="number" name="finals" class="form-control final_modal" id="inputgrade" min = "75" max = "100">
                    </div>
                    <div class="form-group col-md-9">
                      <label for="inputgrade">Remarks</label>
                      <select class="form-control"style = "border-radius:20px" id="inputGender" name = "remark">
                        <option type="text" class="form-control"style="font-family: Poppins;" id="inputGender">Passed</option>
                        <option type="text" class="form-control"style="font-family: Poppins;" id="inputGender">Failed</option>
                        </select>
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
