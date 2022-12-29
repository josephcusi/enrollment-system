<?php use App\Models\AuthenticationModel;
  $authenticationModel = new AuthenticationModel();
  $loggedInUserId = session()->get('loggedInUser');
  $userInfo = $authenticationModel->find($loggedInUserId);?>

    <div class="modal fade" id="infomodal">
        <div class="modal-dialog">
          <div class="modal-content"style = "width:700px">
            <div class="modal-header">
              <h4 class="modal-title">Update</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" action="BasicInfo" method="post">
              <input type="hidden" name="_method" value="PUT" />
                    <p class="a" style = "font-size:1.5em; font-family: Poppins;color:maroon;">Basic Information</p>
                    <div class="form-group row">
                      <label for="uptlastname" class="col-sm-3 col-form-label">Last Name</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="uptlastname" name="uptlastname" placeholder="LastName" value="<?php echo $userInfo['lastname'];?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'uptlastname') : '' ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="firstname" class="col-sm-3 col-form-label">First Name</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" name="uptfirstname" id="uptfirstname" placeholder="First Name" value="<?php echo $userInfo['firstname'];?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'uptfirstname') : '' ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="middlename" class="col-sm-3 col-form-label">Middle Name</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="uptmiddlename" name="uptmiddlename" placeholder="Middle Name" value="<?php echo $userInfo['middlename'];?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'uptmiddlename') : '' ?></span>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Save changes</button>
            </div>
                  </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>