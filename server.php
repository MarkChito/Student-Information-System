<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('Asia/Manila');

$current_date = date('Y-m-d H:i:s');

require_once "model.php";

$model = new Model();

if (isset($_POST["login"])) {
    $response = false;

    $username = $model->escapeString($_POST["username"]);
    $password = $model->escapeString($_POST["password"]);

    $sql = "SELECT * FROM `users` WHERE `username` = '" . $username . "'";
    $user = $model->fetch($sql);

    if ($user) {
        $db_password = $user["password"];

        if (password_verify($password, $db_password)) {
            $_SESSION["user_id"] = $user["id"];

            $response = true;
        }
    }

    echo json_encode($response);
}

if (isset($_POST["register"])) {
    $response = false;

    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $student_number = $_POST["student_number"];
    $email = $_POST["email"];
    $mobile_number = $_POST["mobile_number"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    $section = $_POST["section"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $errors = 0;

    $sql = "SELECT * FROM `students` WHERE `student_number` = '" . $student_number . "'";
    $student_info = $model->fetch($sql);

    if ($student_info) {
        $response = "error_student_number";

        $errors++;
    }

    $sql_2 = "SELECT * FROM `users` WHERE `username` = '" . $username . "'";
    $user_info = $model->fetch($sql_2);

    if ($user_info) {
        $response = "error_username";

        $errors++;
    }

    if ($errors == 0) {
        if ($middle_name) {
            $middle_initial = strtoupper(substr($middle_name, 0, 1));

            $name = "$first_name $middle_initial. $last_name";
        } else {
            $name = "$first_name $last_name";
        }

        $user_data = array(
            "name" => $name,
            "username" => $username,
            "password" => password_hash($password, PASSWORD_BCRYPT),
        );

        $model->insert("users", $user_data);

        $sql_3 = "SELECT * FROM `users` WHERE `username` = '" . $username . "'";
        $user_info_2 = $model->fetch($sql_3);

        $login_id = $user_info_2["id"];

        $student_data = array(
            "login_id" => $login_id,
            "first_name" => $first_name,
            "middle_name" => $middle_name,
            "last_name" => $last_name,
            "student_number" => $student_number,
            "email" => $email,
            "mobile_number" => $mobile_number,
            "course" => $course,
            "year" => $year,
            "section" => strtoupper($section),
            "address" => $address,
        );

        $model->insert("students", $student_data);

        $_SESSION["notification"] = array(
            "type" => "alert-success",
            "message" => "Student data has been saved",
        );
    }

    echo json_encode($response);
}

if (isset($_POST["logout"])) {
    $response = true;

    $_SESSION["notification"] = array(
        "type" => "alert-success",
        "message" => "You had been signed out",
    );

    unset($_SESSION["user_id"]);

    echo json_encode($response);
}