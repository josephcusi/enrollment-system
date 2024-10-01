<div class="modal fade" id="new-reg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><strong>Baco Community College System Enrollment Terms and Conditions</strong></h5>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Scrollable modal -->
            <div class="modal-body">
            <p id="effective-date">Effective Date: <span id="current-date"></span></p>

                <p>By enrolling in the Baco Community College System, you agree to adhere to the following terms and conditions. Please read this document carefully before proceeding with your enrollment.</p>

                <h4><strong>1. Admission and Enrollment</strong></h4>
                <p>1.1. Eligibility: To enroll in Baco Community College System, you must meet the specified admission requirements as determined by the college.</p>
                <p>1.2. Application: You agree to provide accurate and complete information during the enrollment application process. Falsification of information may result in enrollment cancellation.</p>
                <p>1.3. Acceptance: Enrollment is subject to the discretion of the college, and the college reserves the right to accept or reject applicants.</p>

                <h4><strong>2. Academic Policies</strong></h4>
                <p>2.1. Course Registration: You are responsible for registering for courses in accordance with college policies and program requirements.</p>
                <p>2.2. Attendance: Regular attendance and participation in classes are required. Failure to attend may result in academic penalties.</p>
                <p>2.3. Academic Integrity: You must uphold academic integrity and avoid plagiarism, cheating, or any form of academic misconduct.</p>
                <p>2.3. Grades: Your academic performance will be evaluated based on grading policies established by the college.</p>

                <h4><strong>3. Code of Conduct</strong></h4>
                <p>3.1. Behavior: You must conduct yourself in a respectful and ethical manner, adhering to the college's code of conduct and policies regarding student behavior.</p>
                <p>3.2. Non-Discrimination: Discrimination or harassment of any form, including but not limited to race, gender, religion, or sexual orientation, will not be tolerated.</p>

                <h4><strong>4. Privacy and Data</strong></h4>
                <p>4.1. Student Records: The college may maintain student records in accordance with applicable laws and policies.</p>
                <p>4.2. Communication: You consent to receive college-related communications via email, phone, or other methods of contact.</p>

                <h4><strong>5. Changes to Terms and Conditions</strong></h4>
                <p>5.1. Amendments: The college reserves the right to update and amend these terms and conditions as needed. Any changes will be communicated to enrolled students.</p>

                <h4><strong>5. Termination of Enrollment</strong></h4>
                <p>5.1. Suspension or Termination: The college reserves the right to suspend or terminate your enrollment for violation of these terms and conditions or any other college policies.</p>
                <p>By enrolling in Baco Community College System, you acknowledge that you have read, understood, and agreed to abide by these terms and conditions.</p>
                <p>Please keep a copy of this document for your records.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="modal-ok" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<!-- Scrollable modal -->

<!-- /.modal -->
<!-- Your modal code -->

<!-- /.modal -->
<script>
    $(document).ready(function () {
        // Function to format the current date as 'Month Day, Year'
        function getCurrentDate() {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date().toLocaleDateString(undefined, options);
        }

        $("#new-reg").on("show.bs.modal", function () {
            // Update the current date when the modal is shown
            $("#current-date").text(getCurrentDate());
        });

        $("#modal-ok").click(function () {
            $("#termCon").prop("checked", true);
            $("#termConTwo").prop("checked", true);
            // I-check ang checkbox kapag na-click ang "OK" button sa modal
            $("#new-reg").modal("hide"); // Itago ang modal
        });
    });
</script>
<script>
    document.getElementById('termConTwo').addEventListener('click', function (event) {
        event.preventDefault();
    });
</script>
