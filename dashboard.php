<?php include_once "header.php"; ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><?= count($model->fetchAll("SELECT `id` FROM `students` WHERE `course` = 'BSBA'")) ?></h1>
                    <h6 class="text-white">BS Business Administration</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><?= count($model->fetchAll("SELECT `id` FROM `students` WHERE `course` = 'BSA'")) ?></h1>
                    <h6 class="text-white">BS Agriculture</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-hover">
                <div class="box bg-primary text-center">
                    <h1 class="font-light text-white"><?= count($model->fetchAll("SELECT `id` FROM `students` WHERE `course` = 'BSIT'")) ?></h1>
                    <h6 class="text-white">BS Information Technology</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><?= count($model->fetchAll("SELECT `id` FROM `students` WHERE `course` = 'BSC'")) ?></h1>
                    <h6 class="text-white">BS Criminology</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Latest Registered Students</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Date Registered</th>
                                    <th>Student Number</th>
                                    <th>Name</th>
                                    <th>School Branch</th>
                                    <th>Course</th>
                                    <th>Year and Section</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($students) : ?>
                                    <?php foreach ($students as $student) : ?>
                                        <tr>
                                            <td><?= (new DateTime($student["created_at"]))->format("F j, Y h:i A") ?></td>
                                            <td><?= $student["student_number"] ?></td>
                                            <td><?= $model->fetch("SELECT * FROM `users` WHERE `id` = '" . $student["login_id"] . "'")["name"] ?></td>
                                            <td><?= $student["school_branch"] ?></td>
                                            <td><?= $student["course"] ?></td>
                                            <td><?= $student["year"] ?>-<?= $student["section"] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php" ?>