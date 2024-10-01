<div class="modal fade" id="year">
    <div class="modal-dialog" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Semester Maintenance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('updateYear'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-row">
                        <input type="hidden" name="id" class="form-control id">
                        <div class="form-group col-md-6">
                            <label for="year-range-input">Year</label>
                            <input type="text" id="year-range-input" name="year" pattern="[0-9]{4}-[0-9]{4}" maxlength="9" required
                                class="form-control yearModal" placeholder="Year">
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'section') : '' ?>
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputYearLevel">Semester</label>
                            <select class="form-control semester" id="studentStrand" name="semester">

                                <option type="text" class="form-control" id="year_level" placeholder="Year Level"
                                    value="1st Semester">1st Semester</option>
                                <option type="text" class="form-control" id="year_level" placeholder="Year Level"
                                    value="2nd Semester">2nd Semester</option>

                            </select>
                            <span class="text-danger">
                                <?= isset($validation) ? display_error($validation, 'year_level') : '' ?>
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
<!-- /.modal -->

<script>
var yearRangeInput = document.getElementById("year-range-input");
yearRangeInput.addEventListener("input", function() {
  var yearRange = yearRangeInput.value;
  var startYear = parseInt(yearRange.substring(0, 4));
  var endYear = parseInt(yearRange.substring(5, 9));
  if (isNaN(startYear) || isNaN(endYear) || startYear < 1900 || startYear > 2099 || endYear < 1900 || endYear > 2099 || startYear > endYear) {
    yearRangeInput.setCustomValidity("Please enter a valid range of years in the format XXXX-XXXX, where XXXX is a year between 1900 and 2099 and the start year is less than or equal to the end year");
  } else {
    yearRangeInput.setCustomValidity("");
  }
});
</script>
