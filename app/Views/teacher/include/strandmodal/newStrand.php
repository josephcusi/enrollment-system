<div class="modal fade" id="new-strand">
        <div class="modal-dialog" style = "font-family:poppins">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Strand Maintenance</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('insert_strand'); ?>" method="post">
            <?= csrf_field(); ?>
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputStrand">Strand</label>
                      <input type="text" name="strand" class="form-control" id="inputStrand" placeholder="Abbreviation">
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'strand') : '' ?>
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputType">Type</label>
                      <input type="text" name="type" class="form-control" id="inputType" placeholder="Type">
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'type') : '' ?>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title">
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