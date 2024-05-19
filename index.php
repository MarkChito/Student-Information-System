<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "model.php";

$model = new Model();

if (isset($_SESSION["user_id"])) {
    $sql = "SELECT * FROM `users` WHERE `id` = '" . $_SESSION["user_id"] . "'";
    $user = $model->fetch($sql);

    if ($user["user_type"] == "admin") {
        $page = "dashboard";
    } else {
        header("location: my_profile");
    }
} else {
    $page = "login";
}

include_once $page . ".php";
