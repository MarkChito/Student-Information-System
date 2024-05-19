<?php include_once "header.php"; ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Manage School Branches</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <button class="btn btn-primary" id="btn_new_school_branch">New School Branch</button>
                </nav>
            </div>
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
                                    <th>Branch Name</th>
                                    <th>Address</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($school_branches) : ?>
                                    <?php foreach ($school_branches as $school_branch) : ?>
                                        <tr>
                                            <td><?= $school_branch["name"] ?></td>
                                            <td><?= $school_branch["address"] ?></td>
                                            <td class="text-center">
                                                <i class="fas fa-edit text-primary me-1 edit_branch" branch_id="<?= $school_branch["id"] ?>" role="button"></i>
                                                <i class="fas fa-trash-alt text-danger delete_branch" branch_id="<?= $school_branch["id"] ?>" role="button"></i>
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