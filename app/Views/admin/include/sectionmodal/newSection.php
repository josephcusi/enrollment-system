<div class="modal fade" id="new-section">
        <div class="modal-dialog" style = "font-family:poppins">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Section Maintenance</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('newsection'); ?>" method="post">
            <?= csrf_field(); ?>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputSection">Section</label>
                      <input type="text" name="section" class="form-control" id="inputSection" placeholder="Section">
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'section') : '' ?>
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputStrand">Strand</label>
                      <input type="text" name="strand" class="form-control" id="inputStrand" placeholder="Strand">
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'strand') : '' ?>
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputSemester">Semester</label>
                      <input type="text" name="semester" class="form-control" id="inputSemester" placeholder="Semester">
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'semester') : '' ?>
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputYearLevel">Year Level</label>
                      <input type="text" name="year_level" class="form-control" id="inputYearLevel" placeholder="YearLevel">
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