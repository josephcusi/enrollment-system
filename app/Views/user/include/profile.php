<div class="card card-primary card-outline">

<div class="card-body box-profile">
  <div class="text-center">
    <img class="profile-user-img img-fluid img-circle" style = "width:210px; background-color:maroon;"
         src="../../dist/img/profile.jpg"
         alt="User profile picture">
  </div>
  
  <h3 class="profile-username text-center" style = "color:maroon"><?php echo $userInfo['name'];?></h3>
  <p class="text-muted text-center"><?php echo $userInfo['email'];?></p>

  <ul class="list-group list-group-unbordered mb-3">
    <li class="list-group-item" style = "color:gray">
      <b>Course</b> <a class="float-right" style = "color:maroon">BSIT</a>
    </li>
    <li class="list-group-item" style = "color:gray">
      <b>Section</b> <a class="float-right" style = "color:maroon">BSIT-3F1</a>
    </li>
    <li class="list-group-item" style = "color:gray">
      <b>Semester</b> <a class="float-right" style = "color:maroon">1 Semester</a>
    </li>

  </ul>


</div>



<!-- /.card-body -->
</div>
<!-- /.card -->
<!-- /.card -->
</div>