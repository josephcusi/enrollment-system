<!-- Modal -->

<div class="modal fade" id="shwreq" style="display: none; font-family: Poppins;">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Section Room</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?=site_url('req_cred')?>" method="post">
                        <input type="hidden" class="form-control subject_gradess" name="subject_gradess">
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label>Credential to be requested</label>
                                <input type="hidden" class="form-control id" name="id">
                                <input type="hidden" class="form-control lrn" name="lrn">
                                <select class="form-control" id="inputGender" name="cred">
                                    <option type="text" class="form-control" style="font-family: Poppins;"
                                        id="inputGender">COG
                                    </option>
                                    <option type="text" class="form-control" style="font-family: Poppins;"
                                        id="inputGender">COE
                                    </option>
                                    <option type="text" class="form-control" style="font-family: Poppins;"
                                        id="inputGender">TOR
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Year level</label>
                                <select class="form-control" id="inputGender" name="year_level">
                                    <?php foreach($stud_year as $year):?>
                                    <option type="text" class="form-control" style="font-family: Poppins;"
                                        id="inputGender"><?= $year['year_level']?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="inputgrade">Semester</label>
                                <select class="form-control" id="inputGender" name="semester">
                                    <option type="text" class="form-control" style="font-family: Poppins;"
                                        id="inputGender">1st Semester
                                    </option>
                                    <option type="text" class="form-control" style="font-family: Poppins;"
                                        id="inputGender">2nd Semester
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Print</button>
                        </div>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
$(document).ready(function() {
    // sa button
    $('.btn-print-credentials').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const lrn = $(this).data('lrn');
        // // sa modal
        $('.id').val(id);
        $('.lrn').val(lrn).trigger('change');
        // Call Modal
        $('#shwreq').modal('show');
    });
});
</script>