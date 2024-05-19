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

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM `users` WHERE `id` = '" . $user_id . "'";
$user = $model->fetch($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Student Information System</title>

    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/logo.png">
    <link href="./dist/css/style.min.css" rel="stylesheet">
    <link href="./dist/css/custom-style.css" rel="stylesheet">
    <link href="./assets/libs/flot/css/float-chart.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="<?= base_url() ?>">
                        <b class="logo-icon ps-2">
                            <img src="./assets/images/logo-white.png" alt="homepage" class="light-logo" style="width: 35px;" />
                        </b>
                        <span class="logo-text">
                            Student Information
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-2"><?= $user["name"] ?></span>    
                            <img src="./assets/images/default_user.png" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user me-1 ms-1"></i>
                                    My Profile
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-settings me-1 ms-1"></i>
                                    Account Settings
                                </a>
                                <a class="dropdown-item logout" href="javascript:void(0)">
                                    <i class="fa fa-power-off me-1 ms-1"></i>
                                    Logout
                                </a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">