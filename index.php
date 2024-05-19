<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user_id"])) {
    $page = "dashboard";
} else {
    $page = "login";
}

include_once $page . ".php";
