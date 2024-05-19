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
    $response_error_student_number = array(
        "error_student_number" => false,
    );

    $response_error_username = array(
        "error_username" => false,
    );

    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $student_number = $_POST["student_number"];
    $email = $_POST["email"];
    $mobile_number = $_POST["mobile_number"];
    $school_branch = $_POST["school_branch"];
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
        $response_error_student_number = array(
            "error_student_number" => true,
        );

        $errors++;
    }

    $sql_2 = "SELECT * FROM `users` WHERE `username` = '" . $username . "'";
    $user_info = $model->fetch($sql_2);

    if ($user_info) {
        $response_error_username = array(
            "error_username" => true,
        );

        $errors++;
    }

    $response = array_merge($response_error_student_number, $response_error_username);

    if ($errors == 0) {
        if ($middle_name) {
            $middle_initial = strtoupper(substr($middle_name, 0, 1));

            $name = "$first_name $middle_initial. $last_name";
        } else {
            $name = "$first_name $last_name";
        }

        $user_data = array(
            "created_at" => $current_date,
            "name" => $name,
            "username" => $username,
            "password" => password_hash($password, PASSWORD_BCRYPT),
            "user_type" => "student",
        );

        $model->insert("users", $user_data);

        $sql_3 = "SELECT * FROM `users` WHERE `username` = '" . $username . "'";
        $user_info_2 = $model->fetch($sql_3);

        $login_id = $user_info_2["id"];

        $student_data = array(
            "created_at" => $current_date,
            "login_id" => $login_id,
            "first_name" => $first_name,
            "middle_name" => $middle_name,
            "last_name" => $last_name,
            "student_number" => $student_number,
            "email" => $email,
            "mobile_number" => $mobile_number,
            "school_branch" => $school_branch,
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

if (isset($_POST["update"])) {
    $response = false;

    $id = $_POST["id"];
    $old_student_number = $_POST["old_student_number"];
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $student_number = $_POST["student_number"];
    $email = $_POST["email"];
    $mobile_number = $_POST["mobile_number"];
    $school_branch = $_POST["school_branch"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    $section = $_POST["section"];
    $address = $_POST["address"];

    $sql = "SELECT * FROM `students` WHERE `student_number` = '" . $student_number . "'";
    $student_info = $model->fetch($sql);

    if (!(($student_number != $old_student_number) && $student_info)) {
        if ($middle_name) {
            $middle_initial = strtoupper(substr($middle_name, 0, 1));

            $name = "$first_name $middle_initial. $last_name";
        } else {
            $name = "$first_name $last_name";
        }

        $user_data = array(
            "created_at" => $current_date,
            "name" => $name,
        );

        $model->update("users", $user_data, "`id` = '" . $id . "'");

        $student_data = array(
            "created_at" => $current_date,
            "first_name" => $first_name,
            "middle_name" => $middle_name,
            "last_name" => $last_name,
            "student_number" => $student_number,
            "email" => $email,
            "mobile_number" => $mobile_number,
            "school_branch" => $school_branch,
            "course" => $course,
            "year" => $year,
            "section" => strtoupper($section),
            "address" => $address,
        );

        $model->update("students", $student_data, "`login_id` = '" . $id . "'");

        $_SESSION["notification"] = array(
            "type" => "alert-success",
            "message" => "Student data has been updated.",
        );

        $response = true;
    }

    echo json_encode($response);
}

if (isset($_POST["new_school_branch"])) {
    $name = $_POST["name"];
    $address = $_POST["address"];

    $data = array(
        "created_at" => $current_date,
        "name" => $name,
        "address" => $address,
    );

    $model->insert("school_branches", $data);

    $_SESSION["notification"] = array(
        "type" => "alert-success",
        "message" => "School Branch is added successfully.",
    );

    echo json_encode(true);
}

if (isset($_POST["update_school_branch"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["address"];

    $data = array(
        "created_at" => $current_date,
        "name" => $name,
        "address" => $address,
    );

    $model->update("school_branches", $data, "`id` = '" . $id . "'");

    $_SESSION["notification"] = array(
        "type" => "alert-success",
        "message" => "School Branch is updated successfully.",
    );

    echo json_encode(true);
}

if (isset($_POST["update_account"])) {
    $response = false;

    $id = $_POST["id"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = isset($_POST["password"]) ? $_POST["password"] : null;
    $old_username = $_POST["old_username"];
    $old_password = $_POST["old_password"];

    $sql = "SELECT * FROM `users` WHERE `username` = '" . $username . "'";
    $user = $model->fetch($sql);

    if (!(($username != $old_username) && $user)) {
        if ($password) {
            $password = password_hash($password, PASSWORD_BCRYPT);
        } else {
            $password = $old_password;
        }

        $data = array(
            "name" => $name,
            "username" => $username,
            "password" => $password,
        );

        $model->update("users", $data, "id = '" . $id . "'");

        $_SESSION["notification"] = array(
            "type" => "alert-success",
            "message" => "Account is updated successfully.",
        );

        $response = true;
    }

    echo json_encode($response);
}

if (isset($_POST["delete_student"])) {
    $id = $_POST["id"];

    $model->delete("users", "`id` = '" . $id . "'");
    $model->delete("students", "`login_id` = '" . $id . "'");

    $_SESSION["notification"] = array(
        "type" => "alert-success",
        "message" => "Student is successfuly deleted from the system.",
    );

    echo json_encode(true);
}

if (isset($_POST["delete_branch"])) {
    $id = $_POST["id"];

    $model->delete("school_branches", "`id` = '" . $id . "'");

    $_SESSION["notification"] = array(
        "type" => "alert-success",
        "message" => "School Branch is successfuly deleted from the system.",
    );

    echo json_encode(true);
}

if (isset($_POST["get_school_branch_data"])) {
    $id = $_POST["id"];

    $sql = "SELECT * FROM `school_branches` WHERE `id` = '" . $id . "'";
    $school_branch_data = $model->fetch($sql);

    echo json_encode($school_branch_data);
}

if (isset($_POST["get_student_data"])) {
    $id = $_POST["id"];

    $sql = "SELECT * FROM `students` WHERE `login_id` = '" . $id . "'";
    $student_data = $model->fetch($sql);

    echo json_encode($student_data);
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
