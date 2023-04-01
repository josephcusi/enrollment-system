<div class="modal fade" id="addSchedule">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Schedule Maintenance</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"style = "">
            <form class="form-horizontal" action="<?= site_url('addsched11/'. $id);?>" method="post">
            <?= csrf_field(); ?>
            <div class="form-row mt-3">
              <input type="hidden" class="id" name="id">
                      <div class="form-group col-sm-6 mx-auto">
                      <label for="teacher" class="col-sm-6 col-form-label">Teacher</label>
                      <select class="form-control" name="teacher">
                          <?php foreach($teacher as $newTeacher): ?>
                          <option type="text" value="<?= $newTeacher['id']?>">
                              <?= $newTeacher['firstname'] ?>
                              <?= ' ' ?>
                              <?= $newTeacher['middlename'] ?>
                              <?= ' ' ?>
                              <?= $newTeacher['lastname'] ?>
                            </option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-row mt-3">
              <input type="hidden" class="id" name="id">
                      <div class="form-group col-sm-6 mx-auto">
                      <label for="teacher" class="col-sm-6 col-form-label">Subject</label>
                      <select class="form-control" name="subject">
                          <?php foreach($subject as $newSub): ?>
                          <option type="text" value="<?= $newSub['id']?>">
                              <?= $newSub['subject'] ?>
                            </option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
            <div class="form-row mt-3">
                    <div class="form-group col-sm-6 mx-auto">
                      <input type="checkbox" id="monday" name="monday" value="monday">
                      <label for="monday" class="col-sm-6 col-form-label">Monday</label>
                      <input type="time" name="monOne" class="form-control" value="">
                      <span class="text-danger"><?= isset($validation) ? display_error($validation, 'monOne') : '' ?></span>
                    </div>
                    <div class="form-group col-sm-6 mx-auto">

                      <label for="" class="col-sm-6 col-form-label"> <br></label>
                      <input type="time" name="monTwo" class="form-control" value="">

                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-6 mx-auto" >
                      <input type="checkbox" id="tuesday" name="tuesday" value="tuesday">
                      <label for="tuesday" class="col-sm-6 col-form-label">Tuesday</label>
                      <input type="time" name="tueOne" class="form-control" value="">

                    </div>
                    <div class="form-group col-sm-6 mx-auto">

                      <label for="" class="col-sm-6 col-form-label"> <br></label>
                      <input type="time" name="tueTwo" class="form-control" value="">

                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-6 mx-auto">
                      <input type="checkbox" id="wednesday" name="wednesday" value="wednesday">
                      <label for="wednesday" class="col-sm-6. col-form-label">Wednesday</label>
                      <input type="time" name="wedOne" class="form-control" value="">

                    </div>
                    <div class="form-group col-sm-6 mx-auto">

                      <label for="" class="col-sm-6 col-form-label"> <br></label>
                      <input type="time" name="wedTwo" class="form-control" value="">

                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-6 mx-auto">
                      <input type="checkbox" id="thursday" name="thursday" value="thursday">
                      <label for="thursday" class="col-sm-6 col-form-label">Thursday</label>
                      <input type="time" name="thuOne" class="form-control" value="">

                    </div>
                    <div class="form-group col-sm-6 mx-auto">

                      <label for="" class="col-sm-6 col-form-label"> <br></label>
                      <input type="time" name="thuTwo" class="form-control" value="">

                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-sm-6 mx-auto">
                      <input type="checkbox" id="friday" name="friday" value="friday">
                      <label for="friday" class="col-sm-6 col-form-label">Friday</label>
                      <input type="time" name="friOne" class="form-control" value="">

                    </div>
                    <div class="form-group col-sm-6 mx-auto">

                      <label for="" class="col-sm-6 col-form-label"> <br></label>
                      <input type="time" name="friTwo" class="form-control" value="">

                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
