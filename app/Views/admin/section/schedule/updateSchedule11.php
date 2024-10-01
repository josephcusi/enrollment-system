<div class="modal fade" id="updateSched11">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Schedule Maintenance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="">
                <form class="form-horizontal" action="<?= site_url('updateSched11');?>" method="post">
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
                        <div class="form-group col-sm-6 mx-auto">
                            <label for="inputSection">Subject</label>
                            <input class="form-control subs" disabled>
                            <input type="hidden" class="form-control subs" name="subject">
                            <input type="hidden" class="form-control strand_id" name="strand_id">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-sm-6 mx-auto">
                            <label for="monday" class="col-sm-6 col-form-label">Monday</label>
                            <input type="time" name="monOne" class="form-control mon_one" value="">
                            <span
                                class="text-danger"><?= isset($validation) ? display_error($validation, 'monOne') : '' ?></span>
                        </div>
                        <div class="form-group col-sm-6 mx-auto">

                            <label for="" class="col-sm-6 col-form-label"> <br></label>
                            <input type="time" name="monTwo" class="form-control mon_two" value="">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 mx-auto">
                            <label for="tuesday" class="col-sm-6 col-form-label">Tuesday</label>
                            <input type="time" name="tueOne" class="form-control tue_one" value="">

                        </div>
                        <div class="form-group col-sm-6 mx-auto">

                            <label for="" class="col-sm-6 col-form-label"> <br></label>
                            <input type="time" name="tueTwo" class="form-control tue_two" value="">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 mx-auto">
                            <label for="wednesday" class="col-sm-6. col-form-label">Wednesday</label>
                            <input type="time" name="wedOne" class="form-control wed_one" value="">

                        </div>
                        <div class="form-group col-sm-6 mx-auto">

                            <label for="" class="col-sm-6 col-form-label"> <br></label>
                            <input type="time" name="wedTwo" class="form-control wed_two" value="">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 mx-auto">
                            <label for="thursday" class="col-sm-6 col-form-label">Thursday</label>
                            <input type="time" name="thuOne" class="form-control thu_one" value="">

                        </div>
                        <div class="form-group col-sm-6 mx-auto">

                            <label for="" class="col-sm-6 col-form-label"> <br></label>
                            <input type="time" name="thuTwo" class="form-control thu_two" value="">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 mx-auto">
                            <label for="friday" class="col-sm-6 col-form-label">Friday</label>
                            <input type="time" name="friOne" class="form-control fri_one" value="">

                        </div>
                        <div class="form-group col-sm-6 mx-auto">

                            <label for="" class="col-sm-6 col-form-label"> <br></label>
                            <input type="time" name="friTwo" class="form-control fri_two" value="">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 mx-auto">
                            <label for="friday" class="col-sm-6 col-form-label">Saturday</label>
                            <input type="time" name="satOne" class="form-control sat_one" value="">

                        </div>
                        <div class="form-group col-sm-6 mx-auto">

                            <label for="" class="col-sm-6 col-form-label"> <br></label>
                            <input type="time" name="satTwo" class="form-control sat_two" value="">

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
$(document).ready(function() {
    // sa button
    $('.btn-section').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        // // sa modal
        $('.id').val(id);
        // Call Modal
        $('#addSchedule').modal('show');
    });
    $('.btn-update').on('click', function() {


        // data galing buton
        const id = $(this).data('id');
        const sub = $(this).data('sub');
        const teacher = $(this).data('teacher');
        const mon_one = $(this).data('mon_one');
        const mon_two = $(this).data('mon_two');
        const tue_one = $(this).data('tue_one');
        const tue_two = $(this).data('tue_two');
        const wed_one = $(this).data('wed_one');
        const wed_two = $(this).data('wed_two');
        const thu_one = $(this).data('thu_one');
        const thu_two = $(this).data('thu_two');
        const fri_one = $(this).data('fri_one');
        const fri_two = $(this).data('fri_two');
        const sat_one = $(this).data('sat_one');
        const sat_two = $(this).data('sat_two');
        const strand_id = $(this).data('strand_id');


        // // sa modal
        $('.id').val(id);
        $('.subs').val(sub);
        $('.strand_id').val(strand_id);
        $('.teacher').val(teacher);
        $('.mon_one').val(mon_one);
        $('.mon_two').val(mon_two);
        $('.tue_one').val(tue_one);
        $('.tue_two').val(tue_two);
        $('.wed_one').val(wed_one);
        $('.wed_two').val(wed_two);
        $('.thu_one').val(thu_one);
        $('.thu_two').val(thu_two);
        $('.fri_one').val(fri_one);
        $('.fri_two').val(fri_two);
        $('.sat_one').val(sat_one);
        $('.sat_two').val(sat_two).trigger('change');

        // Call Modal
        $('#updateSched11').modal('show');
    });
});
</script>