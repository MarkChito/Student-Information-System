<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function base_url()
{
    return "http://localhost/Student-Information-System/";
}

require_once "model.php";

$model = new Model();

$model->initialize_database();

$sql = "SELECT * FROM `school_branches` ORDER BY `name` ASC";
$school_branches = $model->fetchAll($sql);
?>

<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Student Information System</title>

    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/logo.png">
    <link href="./dist/css/style.min.css" rel="stylesheet">
    <link href="./dist/css/custom-style.css" rel="stylesheet">
    <link href="./assets/extra-libs/sweetalert/css/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark" style="min-height: 100vh;">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform" style="width: 450px;">
                    <div class="alert text-center d-none" id="login_alert">Invalid Username or Password</div>
                    <div class="text-center pt-3 pb-3">
                        <span class="db">
                            <img src="./assets/images/logo-white.png" style="width: 150px;" alt="" class="mb-3">
                            <h1 class="text-white">Student Information System</h1>
                        </span>
                    </div>
                    <form class="form-horizontal mt-3" id="login_form" action="javascript:void(0)">
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" id="login_username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" id="login_password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3">
                                        <button class="btn btn-success text-white w-100 btn-lg" id="login_submit" type="submit">Login</button>
                                    </div>
                                </div>

                                <p class="text-white">Need an Account? <a href="javascript:void(0)" id="btn_register">Register</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="register_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create an Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="javascript:void(0)" id="register_form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="register_first_name">First Name</label>
                                    <input type="text" class="form-control" id="register_first_name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="register_middle_name">Middle Name <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="register_middle_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="register_last_name">Last Name</label>
                                    <input type="text" class="form-control" id="register_last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="register_student_number">Student Number</label>
                                    <input type="text" class="form-control" id="register_student_number" required>
                                    <small class="text-danger d-none" id="error_register_student_number">Invalid Student Number format</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="register_email">Email Address</label>
                                    <input type="email" class="form-control" id="register_email" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="register_mobile_number">Mobile Number</label>
                                    <input type="number" class="form-control" id="register_mobile_number" required>
                                    <small class="text-danger d-none" id="error_register_mobile_number">Invalid Mobile Number format</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="register_school_branch">School Branch</label>
                                    <select id="register_school_branch" class="form-select" required>
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
                                    <label for="register_course">Course</label>
                                    <select id="register_course" class="form-select" required>
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
                                    <label for="register_year">Year</label>
                                    <select id="register_year" class="select2 form-select shadow-none" required>
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
                                    <label for="register_section">Section</label>
                                    <input type="text" id="register_section" class="form-control" required>
                                    <small class="text-danger d-none" id="error_register_section">Section must be A, B, C, etc</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="register_address">Address</label>
                                    <textarea id="register_address" rows="2" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="register_username">Username</label>
                                    <input type="text" class="form-control" id="register_username" required>
                                    <small class="text-danger d-none" id="error_register_username">Username is already in use</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="register_password">Password</label>
                                    <input type="password" class="form-control" id="register_password" required>
                                    <small class="text-danger d-none" id="error_register_password">Passwords do not match</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="register_confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="register_confirm_password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="register_submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/extra-libs/sweetalert/js/sweetalert2.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            const server = "server.php";
            const base_url = "<?= base_url() ?>";
            const notification = <?= isset($_SESSION["notification"]) ? json_encode($_SESSION["notification"]) : json_encode(null) ?>;
            const school_branches = <?= $school_branches ? json_encode($school_branches) : json_encode(null) ?>;

            remove_alert();

            if (notification) {
                show_alert(notification.type, notification.message);
            }

            $(".preloader").fadeOut();

            $("#login_form").submit(function() {
                const username = $("#login_username").val();
                const password = $("#login_password").val();

                remove_alert();

                $("#login_submit").text("Please wait..");
                $("#login_submit").attr("disabled", true);

                var formData = new FormData();

                formData.append('username', username);
                formData.append('password', password);

                formData.append('login', true);

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
                        } else {
                            $("#login_alert").removeClass("d-none");
                            $("#login_alert").addClass("alert-danger");
                            $("#login_alert").text("Invalid Username or Password");

                            $("#login_submit").text("Login");
                            $("#login_submit").removeAttr("disabled");
                        }
                    },
                    error: function(_, _, error) {
                        console.error(error);
                    }
                });
            })

            $("#btn_register").click(function() {
                if (school_branches) {
                    $("#register_modal").modal("show");
                } else {
                    Swal.fire({
                        title: "Oops...",
                        text: "School branches are empty. Please contact your administrator.",
                        icon: "error"
                    });
                }
            })

            $("#register_form").submit(function() {
                const first_name = $("#register_first_name").val();
                const middle_name = $("#register_middle_name").val();
                const last_name = $("#register_last_name").val();
                const student_number = $("#register_student_number").val();
                const email = $("#register_email").val();
                const mobile_number = $("#register_mobile_number").val();
                const school_branch = $("#register_school_branch").val();
                const course = $("#register_course").val();
                const year = $("#register_year").val();
                const section = $("#register_section").val();
                const address = $("#register_address").val();
                const username = $("#register_username").val();
                const password = $("#register_password").val();
                const confirm_password = $("#register_confirm_password").val();

                let errors = 0;

                if ((student_number.length != 8) || !(student_number.length >= 3 && student_number.charAt(2) === '-')) {
                    $("#error_register_student_number").text("Invalid Student Number format");
                    $("#error_register_student_number").removeClass("d-none");
                    $("#register_student_number").addClass("is-invalid");

                    errors++;
                }

                if ((mobile_number.length != 11) || (!mobile_number.startsWith("09"))) {
                    $("#error_register_mobile_number").removeClass("d-none");
                    $("#register_mobile_number").addClass("is-invalid");

                    errors++;
                }

                if (section.length != 1) {
                    $("#error_register_section").removeClass("d-none");
                    $("#register_section").addClass("is-invalid");

                    errors++;
                }

                if (password != confirm_password) {
                    $("#error_register_password").removeClass("d-none");
                    $("#register_password").addClass("is-invalid");
                    $("#register_confirm_password").addClass("is-invalid");

                    errors++;
                }

                if (errors == 0) {
                    $("#register_submit").text("Please wait..");
                    $("#register_submit").attr("disabled", true);

                    var formData = new FormData();

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
                    formData.append('username', username);
                    formData.append('password', password);

                    formData.append('register', true);

                    $.ajax({
                        url: server,
                        data: formData,
                        type: 'POST',
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (!response.error_student_number && !response.error_username) {
                                location.href = base_url;
                            } else {
                                if (response.error_student_number) {
                                    $("#error_register_student_number").text("Student Number is already in use");
                                    $("#error_register_student_number").removeClass("d-none");
                                    $("#register_student_number").addClass("is-invalid");
                                }

                                if (response.error_username) {
                                    $("#error_register_username").removeClass("d-none");
                                    $("#register_username").addClass("is-invalid");
                                }

                                $("#register_submit").text("Login");
                                $("#register_submit").removeAttr("disabled");
                            }
                        },
                        error: function(_, _, error) {
                            console.error(error);
                        }
                    });
                }
            })

            $("#register_student_number").keydown(function() {
                $("#error_register_student_number").addClass("d-none");
                $("#register_student_number").removeClass("is-invalid");
            })

            $("#register_mobile_number").keydown(function() {
                $("#error_register_mobile_number").addClass("d-none");
                $("#register_mobile_number").removeClass("is-invalid");
            })

            $("#register_section").keydown(function() {
                $("#error_register_section").addClass("d-none");
                $("#register_section").removeClass("is-invalid");
            })

            $("#register_username").keydown(function() {
                $("#error_register_username").addClass("d-none");
                $("#register_username").removeClass("is-invalid");
            })

            $("#register_password").keydown(function() {
                $("#error_register_password").addClass("d-none");
                $("#register_password").removeClass("is-invalid");
                $("#register_confirm_password").removeClass("is-invalid");
            })

            $("#register_confirm_password").keydown(function() {
                $("#error_register_password").addClass("d-none");
                $("#register_password").removeClass("is-invalid");
                $("#register_confirm_password").removeClass("is-invalid");
            })

            function remove_alert() {
                $("#login_alert").addClass("d-none");

                $("#login_alert").removeClass("alert-success");
                $("#login_alert").removeClass("alert-warning");
                $("#login_alert").removeClass("alert-info");
                $("#login_alert").removeClass("alert-danger");
            }

            function show_alert(type, message) {
                $("#login_alert").removeClass("d-none");
                $("#login_alert").addClass(type);
                $("#login_alert").text(message);
            }
        })
    </script>

</body>

</html>

<?php unset($_SESSION["notification"]) ?>