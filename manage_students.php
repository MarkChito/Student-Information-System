<?php include_once "header.php"; ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Manage Students</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
                                    <th class="text-center">Action</th>
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
                                            <td class="text-center">
                                                <i class="fas fa-edit text-primary me-1 edit_student" user_id="<?= $student["login_id"] ?>" role="button"></i>
                                                <i class="fas fa-trash-alt text-danger delete_student" user_id="<?= $student["login_id"] ?>" role="button"></i>
                                            </td>
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