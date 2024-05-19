<footer class="footer text-center">
    All Rights Reserved <a href="<?= base_url() ?>">Student Information System</a>.
</footer>
</div>

</div>

<!-- New School Branch Modal -->
<div class="modal fade" id="new_school_branch_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New School Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:void(0)" id="new_school_branch_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_school_branch_name">Branch Name</label>
                        <input type="text" class="form-control" id="new_school_branch_name" required>
                    </div>
                    <div class="form-group">
                        <label for="new_school_branch_address">Branch Address</label>
                        <textarea class="form-control" id="new_school_branch_address" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="new_school_branch_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update School Branch Modal -->
<div class="modal fade" id="update_school_branch_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update School Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:void(0)" id="update_school_branch_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update_school_branch_name">Branch Name</label>
                        <input type="text" class="form-control" id="update_school_branch_name" required>
                    </div>
                    <div class="form-group">
                        <label for="update_school_branch_address">Branch Address</label>
                        <textarea class="form-control" id="update_school_branch_address" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="update_school_branch_id">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="update_school_branch_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Account Modal -->
<div class="modal fade" id="update_account_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:void(0)" id="update_account_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update_account_name">Name</label>
                        <input type="text" class="form-control" id="update_account_name" <?= $user["user_type"] != "admin" ? "disabled" : null ?> value="<?= $user["name"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="update_account_username">Username</label>
                        <input type="text" class="form-control" id="update_account_username" value="<?= $user["username"] ?>" required>
                        <small class="text-danger d-none" id="error_update_account_username">Username is already in use</small>
                    </div>
                    <div class="form-group">
                        <label for="update_account_password">Password</label>
                        <input type="password" class="form-control" id="update_account_password" placeholder="Password is hidden for security">
                        <small class="text-danger d-none" id="error_update_account_password">Passwords do not match</small>
                    </div>
                    <div class="form-group">
                        <label for="update_account_confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="update_account_confirm_password" placeholder="Password is hidden for security">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="update_account_id" value="<?= $user["id"] ?>">
                    <input type="hidden" id="update_account_old_username" value="<?= $user["username"] ?>">
                    <input type="hidden" id="update_account_old_password" value="<?= $user["password"] ?>">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="update_account_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Student Modal -->
<div class="modal fade" id="update_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update an Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:void(0)" id="update_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="update_first_name">First Name</label>
                                <input type="text" class="form-control" id="update_first_name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="update_middle_name">Middle Name <span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="update_middle_name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="update_last_name">Last Name</label>
                                <input type="text" class="form-control" id="update_last_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="update_student_number">Student Number</label>
                                <input type="text" class="form-control" id="update_student_number" required>
                                <small class="text-danger d-none" id="error_update_student_number">Invalid Student Number format</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="update_email">Email Address</label>
                                <input type="email" class="form-control" id="update_email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="update_mobile_number">Mobile Number</label>
                                <input type="number" class="form-control" id="update_mobile_number" required>
                                <small class="text-danger d-none" id="error_update_mobile_number">Invalid Mobile Number format</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="update_school_branch">School Branch</label>
                                <select id="update_school_branch" class="form-select" required>
                                    <option value selected disabled></option>
                                    <?php if ($school_branches) : ?>
                                        <?php foreach ($school_branches as $school_branch) : ?>
                                            <option value="<?= $school_branch["name"] ?>"><?= $school_branch["name"] ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="update_course">Course</label>
                                <select id="update_course" class="form-select" required>
                                    <option value selected disabled></option>
                                    <option value="BSIT">BS Information Technology</option>
                                    <option value="BSA">BS Agriculture</option>
                                    <option value="BSC">BS Criminology</option>
                                    <option value="BSBA">BS Business Administration</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="update_year">Year</label>
                                <select id="update_year" class="select2 form-select shadow-none" required>
                                    <option value selected disabled></option>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="4">4th Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="update_section">Section</label>
                                <input type="text" id="update_section" class="form-control" required>
                                <small class="text-danger d-none" id="error_update_section">Section must be A, B, C, etc</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="update_address">Address</label>
                                <textarea id="update_address" rows="2" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="update_id">
                    <input type="hidden" id="update_old_student_number">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="update_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./assets/libs/jquery/dist/jquery.min.js"></script>
<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="./assets/extra-libs/sparkline/sparkline.js"></script>
<script src="./dist/js/waves.js"></script>
<script src="./dist/js/sidebarmenu.js"></script>
<script src="./dist/js/custom.min.js"></script>
<script src="./assets/libs/flot/excanvas.js"></script>
<script src="./assets/libs/flot/jquery.flot.js"></script>
<script src="./assets/libs/flot/jquery.flot.pie.js"></script>
<script src="./assets/libs/flot/jquery.flot.time.js"></script>
<script src="./assets/libs/flot/jquery.flot.stack.js"></script>
<script src="./assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="./assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="./dist/js/pages/chart/chart-page-init.js"></script>
<script src="./assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="./assets/extra-libs/sweetalert/js/sweetalert2.min.js"></script>

<script>
    jQuery(document).ready(function() {
        const server = "server.php";
        const base_url = "<?= base_url() ?>";
        const notification = <?= isset($_SESSION["notification"]) ? json_encode($_SESSION["notification"]) : json_encode(null) ?>;

        if (notification) {
            show_alert(notification.type, notification.message);
        }

        $(document).on("click", ".delete_student", function() {
            const id = $(this).attr("user_id");

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData();

                    formData.append('id', id);

                    formData.append('delete_student', true);

                    $.ajax({
                        url: server,
                        data: formData,
                        type: 'POST',
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            location.href = base_url + "manage_students";
                        },
                        error: function(_, _, error) {
                            console.error(error);
                        }
                    });
                }
            });
        })

        $(document).on("click", ".delete_branch", function() {
            const id = $(this).attr("branch_id");

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData();

                    formData.append('id', id);

                    formData.append('delete_branch', true);

                    $.ajax({
                        url: server,
                        data: formData,
                        type: 'POST',
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            location.href = base_url + "manage_school_branches";
                        },
                        error: function(_, _, error) {
                            console.error(error);
                        }
                    });
                }
            });
        })

        $(document).on("click", ".edit_branch", function() {
            const id = $(this).attr("branch_id");

            var formData = new FormData();

            formData.append('id', id);

            formData.append('get_school_branch_data', true);

            $.ajax({
                url: server,
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#update_school_branch_id").val(id);
                    $("#update_school_branch_name").val(response.name);
                    $("#update_school_branch_address").val(response.address);

                    $("#update_school_branch_modal").modal("show");
                },
                error: function(_, _, error) {
                    console.error(error);
                }
            });
        })

        $(document).on("click", ".edit_student", function() {
            const id = $(this).attr("user_id");

            var formData = new FormData();

            formData.append('id', id);

            formData.append('get_student_data', true);

            $.ajax({
                url: server,
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#update_id").val(id);
                    $("#update_old_student_number").val(response.student_number);
                    $("#update_first_name").val(response.first_name);
                    $("#update_middle_name").val(response.middle_name);
                    $("#update_last_name").val(response.last_name);
                    $("#update_student_number").val(response.student_number);
                    $("#update_email").val(response.email);
                    $("#update_mobile_number").val(response.mobile_number);
                    $("#update_school_branch").val(response.school_branch);
                    $("#update_course").val(response.course);
                    $("#update_year").val(response.year);
                    $("#update_section").val(response.section);
                    $("#update_address").val(response.address);

                    $("#update_modal").modal("show");
                },
                error: function(_, _, error) {
                    console.error(error);
                }
            });
        })

        $("#update_form").submit(function() {
            const id = $("#update_id").val();
            const old_student_number = $("#update_old_student_number").val();
            const first_name = $("#update_first_name").val();
            const middle_name = $("#update_middle_name").val();
            const last_name = $("#update_last_name").val();
            const student_number = $("#update_student_number").val();
            const email = $("#update_email").val();
            const mobile_number = $("#update_mobile_number").val();
            const school_branch = $("#update_school_branch").val();
            const course = $("#update_course").val();
            const year = $("#update_year").val();
            const section = $("#update_section").val();
            const address = $("#update_address").val();

            let errors = 0;

            if ((student_number.length != 8) || !(student_number.length >= 3 && student_number.charAt(2) === '-')) {
                $("#error_update_student_number").text("Invalid Student Number format");
                $("#error_update_student_number").removeClass("d-none");
                $("#update_student_number").addClass("is-invalid");

                errors++;
            }

            if ((mobile_number.length != 11) || (!mobile_number.startsWith("09"))) {
                $("#error_update_mobile_number").removeClass("d-none");
                $("#update_mobile_number").addClass("is-invalid");

                errors++;
            }

            if (section.length != 1) {
                $("#error_update_section").removeClass("d-none");
                $("#update_section").addClass("is-invalid");

                errors++;
            }

            if (errors == 0) {
                $("#update_submit").text("Please wait..");
                $("#update_submit").attr("disabled", true);

                var formData = new FormData();

                formData.append('id', id);
                formData.append('old_student_number', old_student_number);
                formData.append('first_name', first_name);
                formData.append('middle_name', middle_name);
                formData.append('last_name', last_name);
                formData.append('student_number', student_number);
                formData.append('email', email);
                formData.append('mobile_number', mobile_number);
                formData.append('school_branch', school_branch);
                formData.append('course', course);
                formData.append('year', year);
                formData.append('section', section);
                formData.append('address', address);

                formData.append('update', true);

                $.ajax({
                    url: server,
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response) {
                            location.href = base_url + "manage_students";
                        } else {
                            $("#error_update_student_number").text("Student Number is already in use");
                            $("#error_update_student_number").removeClass("d-none");
                            $("#update_student_number").addClass("is-invalid");

                            $("#update_submit").text("Login");
                            $("#update_submit").removeAttr("disabled");
                        }
                    },
                    error: function(_, _, error) {
                        console.error(error);
                    }
                });
            }
        })

        $("#update_student_number").keydown(function() {
            $("#error_update_student_number").addClass("d-none");
            $("#update_student_number").removeClass("is-invalid");
        })

        $("#update_mobile_number").keydown(function() {
            $("#error_update_mobile_number").addClass("d-none");
            $("#update_mobile_number").removeClass("is-invalid");
        })

        $("#update_section").keydown(function() {
            $("#error_update_section").addClass("d-none");
            $("#update_section").removeClass("is-invalid");
        })

        $("#btn_update_account").click(function() {
            $("#update_account_modal").modal("show");
        })

        $("#update_account_form").submit(function() {
            const name = $("#update_account_name").val();
            const username = $("#update_account_username").val();
            const password = $("#update_account_password").val();
            const confirm_password = $("#update_account_confirm_password").val();
            const id = $("#update_account_id").val();
            const old_username = $("#update_account_old_username").val();
            const old_password = $("#update_account_old_password").val();

            let errors = 0;

            if ((password || confirm_password) && (password != confirm_password)) {
                $("#error_update_account_password").removeClass("d-none");
                $("#update_account_password").addClass("is-invalid");
                $("#update_account_confirm_password").addClass("is-invalid");

                errors++;
            }

            if (errors == 0) {
                $("#update_account_submit").text("Please wait...");
                $("#update_account_submit").attr("disabled", true);

                var formData = new FormData();

                formData.append('id', id);
                formData.append('name', name);
                formData.append('username', username);
                formData.append('password', password);
                formData.append('old_username', old_username);
                formData.append('old_password', old_password);

                formData.append('update_account', true);

                $.ajax({
                    url: server,
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response) {
                            location.href = location.href;
                        } else {
                            $("#error_update_account_username").removeClass("d-none");
                            $("#update_account_username").addClass("is-invalid");

                            $("#update_account_submit").text("Submit");
                            $("#update_account_submit").removeAttr("disabled");
                        }
                    },
                    error: function(_, _, error) {
                        console.error(error);
                    }
                });
            }
        })

        $("#update_account_username").keydown(function() {
            $("#error_update_account_username").addClass("d-none");
            $("#update_account_username").removeClass("is-invalid");
        })

        $("#update_account_password").keydown(function() {
            $("#error_update_account_password").addClass("d-none");
            $("#update_account_password").removeClass("is-invalid");
            $("#update_account_confirm_password").removeClass("is-invalid");
        })

        $("#update_account_confirm_password").keydown(function() {
            $("#error_update_account_password").addClass("d-none");
            $("#update_account_password").removeClass("is-invalid");
            $("#update_account_confirm_password").removeClass("is-invalid");
        })

        $('.datatable').DataTable({
            paging: true,
            searching: true,
            ordering: false,
            info: true,
            dom: 'Bfrtip'
        })

        $(".logout").click(function() {
            var formData = new FormData();

            formData.append('logout', true);

            $.ajax({
                url: server,
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response) {
                        location.href = base_url;
                    }
                },
                error: function(_, _, error) {
                    console.error(error);
                }
            });
        })

        $("#btn_new_school_branch").click(function() {
            $("#new_school_branch_modal").modal("show");
        })

        $("#new_school_branch_form").submit(function() {
            const name = $("#new_school_branch_name").val();
            const address = $("#new_school_branch_address").val();

            $("#new_school_branch_submit").text("Please wait...");
            $("#new_school_branch_submit").attr("disabled", true);

            var formData = new FormData();

            formData.append('name', name);
            formData.append('address', address);

            formData.append('new_school_branch', true);

            $.ajax({
                url: server,
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    location.href = base_url + "manage_school_branches";
                },
                error: function(_, _, error) {
                    console.error(error);
                }
            });
        })

        $("#update_school_branch_form").submit(function() {
            const id = $("#update_school_branch_id").val();
            const name = $("#update_school_branch_name").val();
            const address = $("#update_school_branch_address").val();

            $("#update_school_branch_submit").text("Please wait...");
            $("#update_school_branch_submit").attr("disabled", true);

            var formData = new FormData();

            formData.append('id', id);
            formData.append('name', name);
            formData.append('address', address);

            formData.append('update_school_branch', true);

            $.ajax({
                url: server,
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    location.href = base_url + "manage_school_branches";
                },
                error: function(_, _, error) {
                    console.error(error);
                }
            });
        })

        function show_alert(type, message) {
            let title = null;
            let text = null;
            let icon = null;

            if (type == "alert-success") {
                title = "Success!";
                icon = "success";
            }
            if (type == "alert-danger") {
                title = "Oops...";
                icon = "error";
            }

            Swal.fire({
                title: title,
                text: message,
                icon: icon
            });
        }
    })
</script>
</body>

</html>

<?php unset($_SESSION["notification"]) ?>