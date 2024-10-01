<div class="modal fade" id="new-announcement">
    <div class="modal-dialog" style="font-family:poppins">
        <div class="modal-content">
            <form action="<?=site_url('addAnnouncement');?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Add Announcement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="inputStrand">Image</label>
                        <input type="file" name="school_image" class="form-control eventTitle" id="inputTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="inputStrand">Title</label>
                        <input type="text" name="eventTitle" class="form-control eventTitle" id="inputTitle"
                            placeholder="Title" required>
                    </div>
                    <input type="hidden" name="type" class="form-control type" id="inputType"
                        data-school_upts="<?=$datum?>" value="<?=$datum?>">
                    <div class="form-group">
                        <label for="inputTitle">Description</label>
                        <input type="text" name="eventDescription" class="form-control eventDescription"
                            id="inputDescription" placeholder="Description" required>
                    </div>
                    <div class="form-group">
                        <label for="inputStartDate">Event Start</label>
                        <input type="date" name="eventStart" class="form-control eventStart" id="inputStartDate" required>

                    </div>
                    <div class="form-group">
                        <label for="inputEndDate">Event End</label>
                        <input type="date" name="eventEnd" class="form-control eventEnd" id="inputStartDate" required>

                    </div>
                </div>
                <!-- Submit button -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary buttonAdd">Save changes</button>
                </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->