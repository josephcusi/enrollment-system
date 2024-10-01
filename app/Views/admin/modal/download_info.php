<div class="modal fade" id="download_info">
    <div class="modal-dialog modal-md" style="font-family: poppins;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Download Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <div class="bs-stepper">
                        <div class="bs-stepper-content mx-auto" style="width:100%">
                            <div class="form-horizontal" style="font-family: poppins; text-align: center;">
                                <div class="form-group col-md-12">
                                    <input type="hidden" class="form-control id" name="id">
                                    <label for="section">Chose the file you want to download</label>
                                </div>
                            </div>
                                     <div class="modal-footer justify-content-between">
                                       
                            <div class="a" style="float: right;">
                                  <?php if(!empty($pre_enrolled[0]['user_section'])? $pre_enrolled[0]['user_section'] : null && $pre_enrolled[0]['state'] === "Enrolled"):?>
                                <button type="submit" class="btn btn-primary-tikol-cor"
                                    style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px;color:white;">Download COR</button>
                                                           <?php else:?>
                            <?php endif;?>
                            </div>
     
                             <div class="a" style="float: right;">
                                <button type="submit" class="btn btn-primary-tikol-form"
                                    style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px;color:white;">Download Enrollment Form</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert library -->

<script>
    $(document).ready(function() {
        $('.btn-download').on('click', function() {
            const download_id = $(this).data('download_id');
            
            console.log(download_id);
            
            $('.id').val(download_id).trigger('change');
            $('#download_info').modal('show');
        });

        $('.btn-primary-tikol-cor').on('click', function() {
            const id = $('.id').val(); // Get the id from the hidden input
            const stud_form_cor = 'stud_form_cor' 

            const formData = new FormData();
            formData.append('id', id);
            formData.append('stud_form_cor', stud_form_cor);

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/download_form';
            form.style.display = 'none';
            document.body.appendChild(form);

            for (const pair of formData.entries()) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = pair[0];
                input.value = pair[1];
                form.appendChild(input);
            }

            form.submit();

            setTimeout(function() {
                window.location.reload();
            }, 1000);
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.btn-download').on('click', function() {
            const download_id = $(this).data('download_id');
            
            $('.id').val(download_id).trigger('change');
            $('#download_info').modal('show');
        });

        $('.btn-primary-tikol-form').on('click', function() {
            const id = $('.id').val(); // Get the id from the hidden input

            const formData = new FormData();
            formData.append('id', id);

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/download_form';
            form.style.display = 'none';
            document.body.appendChild(form);

            for (const pair of formData.entries()) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = pair[0];
                input.value = pair[1];
                form.appendChild(input);
            }

            form.submit();

            setTimeout(function() {
                window.location.reload();
            }, 1000);
        });
    });
</script>
