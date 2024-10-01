<div class="modal fade" id="addroom">
    <div class="modal-dialog" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Room</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('add_room'); ?>" method="post">
                    <?= csrf_field(); ?>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputStrand">Room</label>
                            <input type="hidden" class="form-group section" name="section">
                            <input type="text" name="room" class="form-control room" id="inputStrand"
                                placeholder="Room">
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'strand') : '' ?>
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

<script>
$(document).ready(function() {
    // sa button
    $('.button-addroom').on('click', function() {
        
        const section = $(this).data('section');
        const room = $(this).data('room');

        // // sa modal
        $('.room').val(room);
        $('.section').val(section).trigger('change');
        // Call Modal
        $('#addroom').modal('show');
    });
});
</script>