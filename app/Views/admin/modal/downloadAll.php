<div class="modal fade" id="download_info">
    <div class="modal-dialog modal-md" style="font-family:poppins; ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Download Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= site_url('download_form');?>" method='post' enctype="multipart/form-data">
                    <div class="card-body p-0">
                        <div class="bs-stepper">
                            <div class="bs-stepper-content mx-auto" style="width:100%">

                                <div class="form-horizontal" style="font-family:poppins; text-align: center;">
                                    <div class="form-group col-md-12">
                                        <input type="hidden" class="form-control id" name="id">
                                       
                                        <label for="section">Do you really want to download the enrollment form of this
                                            student?</label>
                                            
                                    </div>
                                </div>


                                <div class="a" style="float:right;">
                                    <button type="submit" class="btn btn-primary"
                                        style="float:right;font-family:poppins;background-color:green;border-color:green;border-radius:20px">Downloads</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
$(document).ready(function() {
    // sa button
    $('.btn-download').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        // // sa modal
        $('.id').val(id).trigger('change');
        // Call Modal
        $('#download_info').modal('show');
    });
});
</script>