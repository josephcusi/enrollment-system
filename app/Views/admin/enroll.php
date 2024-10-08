<div class="modal fade" id="enroll">
    <div class="modal-dialog modal-md" style="font-family:poppins; ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Enrollment Approval</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= site_url('enrolled');?>" method='post' enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="card-body p-0">
                        <div class="bs-stepper">
                            <div class="bs-stepper-content mx-auto" style="width:70%">

                                <div class="form-horizontal" style="font-family:poppins; color:maroon;">
                                    <div class="form-group col-md-12">
                                        <input type="hidden" value="Enrolled" name="state">
                                        <input type="hidden" value="<?=$enrolled[0]['id'];?>" name="id">

                                        <label for="section">Section</label>
                                        <select class="form-control" id="section" name="section">
                                            <?php foreach($enroll as $en): ?>
                                            <option type="text" class="form-control" id="section" value="<?= $en['section']; ?>"><?= $en['section']; ?>
                                                <?php
                                                  $count = 0;
                                                  foreach ($sect as $sec) {
                                                      if ($sec['secID'] == $en['secID']) {
                                                          $count++;
                                                      }
                                                  }
                                                  echo '(Total Student: ' . $count . ')';
                                                  ?>
                                            </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="studentLRN" class="col-sm-6 col-form-label">Student ID</label>
                                        <input type="text" class="form-control" value="<?=$enrolled[0]['lrn'];?>"
                                            id="studentLRN" placeholder="Learning Reference Number" disabled>
                                    </div>
                                </div>

                                <div class="a" style="float:right;">
                                    <button type="submit" class="btn btn-primary"
                                        style="float:right;font-family:poppins;background-color:green;border-color:green;border-radius:20px">Enroll</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>