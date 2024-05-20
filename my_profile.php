<?php include_once "header.php" ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">My Profile</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="javascript:void(0)" id="update_profile_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="update_profile_first_name">First Name</label>
                                    <input type="text" class="form-control" id="update_profile_first_name" value="<?= $student['first_name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="update_profile_middle_name">Middle Name</label>
                                    <input type="text" class="form-control" id="update_profile_middle_name" value="<?= $student['middle_name'] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="update_profile_last_name">Last Name</label>
                                    <input type="text" class="form-control" id="update_profile_last_name" value="<?= $student['last_name'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="update_profile_student_number">Student Number</label>
                                    <input type="text" class="form-control" id="update_profile_student_number" value="<?= $student['student_number'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="update_profile_email">Email</label>
                                    <input type="email" class="form-control" id="update_profile_email" value="<?= $student['email'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="update_profile_mobile_number">Mobile Number</label>
                                    <input type="number" class="form-control" id="update_profile_mobile_number" value="<?= $student['mobile_number'] ?>" maxlength="11" required>
                                    <small class="text-danger d-none" id="error_update_profile_mobile_number">Invalid Mobile Number format</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="update_profile_school_branch">School Branch</label>
                                    <select id="update_profile_school_branch" class="form-select" required>
                                        <option value selected disabled></option>
                                        <?php if ($school_branches) : ?>
                                            <?php foreach ($school_branches as $school_branch) : ?>
                                                <option value="<?= $school_branch["name"] ?>" <?= $student['school_branch'] == $school_branch["name"] ? "selected" : null ?>><?= $school_branch["name"] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="update_profile_course">Course</label>
                                    <select id="update_profile_course" class="form-select" required>
                                        <option value selected disabled></option>
                                        <option value="BSIT" <?= $student['course'] == "BSIT" ? "selected" : null ?>>BS Information Technology</option>
                                        <option value="BSA" <?= $student['course'] == "BSA" ? "selected" : null ?>>BS Agriculture</option>
                                        <option value="BSC" <?= $student['course'] == "BSC" ? "selected" : null ?>>BS Criminology</option>
                                        <option value="BSBA" <?= $student['course'] == "BSBA" ? "selected" : null ?>>BS Business Administration</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="update_profile_year">Year</label>
                                    <select id="update_profile_year" class="form-select" required>
                                        <option value selected disabled></option>
                                        <option value="1" <?= $student['year'] == "1" ? "selected" : null ?>>1st Year</option>
                                        <option value="2" <?= $student['year'] == "2" ? "selected" : null ?>>2nd Year</option>
                                        <option value="3" <?= $student['year'] == "3" ? "selected" : null ?>>3rd Year</option>
                                        <option value="4" <?= $student['year'] == "4" ? "selected" : null ?>>4th Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="update_profile_section">Section</label>
                                    <input type="text" class="form-control text-center" id="update_profile_section" value="<?= $student['section'] ?>" maxlength="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="update_profile_address">Address</label>
                                    <textarea class="form-control" id="update_profile_address" required><?= $student['address'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="update_profile_id" value="<?= $student['login_id'] ?>">

                                <button type="submit" class="btn btn-primary float-end px-3" id="update_profile_submit">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php" ?>