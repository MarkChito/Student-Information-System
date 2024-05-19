<footer class="footer text-center">
    All Rights Reserved <a href="<?= base_url() ?>">Student Information System</a>.
</footer>
</div>

</div>

<!-- New School Branch Modal -->
<div class="modal fade" id="new_school_branch_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New School Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:void(0)" id="new_school_branch_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_school_branch_name">Branch Name</label>
                        <input type="text" class="form-control" id="new_school_branch_name" required>
                    </div>
                    <div class="form-group">
                        <label for="new_school_branch_address">Branch Address</label>
                        <textarea class="form-control" id="new_school_branch_address" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="new_school_branch_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Account Modals -->
<div class="modal fade" id="update_account_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:void(0)" id="update_account_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update_account_name">Name</label>
                        <input type="text" class="form-control" id="update_account_name" required>
                    </div>
                    <div class="form-group">
                        <label for="update_account_username">Username</label>
                        <input type="text" class="form-control" id="update_account_username" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="new_school_branch_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./assets/libs/jquery/dist/jquery.min.js"></script>
<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="./assets/extra-libs/sparkline/sparkline.js"></script>
<script src="./dist/js/waves.js"></script>
<script src="./dist/js/sidebarmenu.js"></script>
<script src="./dist/js/custom.min.js"></script>
<script src="./assets/libs/flot/excanvas.js"></script>
<script src="./assets/libs/flot/jquery.flot.js"></script>
<script src="./assets/libs/flot/jquery.flot.pie.js"></script>
<script src="./assets/libs/flot/jquery.flot.time.js"></script>
<script src="./assets/libs/flot/jquery.flot.stack.js"></script>
<script src="./assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="./assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="./dist/js/pages/chart/chart-page-init.js"></script>
<script src="./assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="./assets/extra-libs/sweetalert/js/sweetalert2.min.js"></script>

<script>
    jQuery(document).ready(function() {
        const server = "server.php";
        const base_url = "<?= base_url() ?>";
        const notification = <?= isset($_SESSION["notification"]) ? json_encode($_SESSION["notification"]) : json_encode(null) ?>;

        if (notification) {
            show_alert(notification.type, notification.message);
        }

        $('.datatable').DataTable({
            paging: true,
            searching: true,
            ordering: false,
            info: true,
            dom: 'Bfrtip'
        })

        $(".logout").click(function() {
            var formData = new FormData();

            formData.append('logout', true);

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
                    }
                },
                error: function(_, _, error) {
                    console.error(error);
                }
            });
        })

        $("#btn_new_school_branch").click(function() {
            $("#new_school_branch_modal").modal("show");
        })

        $("#new_school_branch_form").submit(function() {
            const name = $("#new_school_branch_name").val();
            const address = $("#new_school_branch_address").val();

            $("#new_school_branch_submit").text("Please wait...");
            $("#new_school_branch_submit").attr("disabled", true);

            var formData = new FormData();

            formData.append('name', name);
            formData.append('address', address);

            formData.append('new_school_branch', true);

            $.ajax({
                url: server,
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    location.href = base_url + "manage_school_branches";
                },
                error: function(_, _, error) {
                    console.error(error);
                }
            });
        })

        function show_alert(type, message) {
            let title = null;
            let text = null;
            let icon = null;

            if (type == "alert-success") {
                title = "Success!";
                icon = "success";
            }
            if (type == "alert-danger") {
                title = "Oops...";
                icon = "error";
            }

            Swal.fire({
                title: title,
                text: message,
                icon: icon
            });
        }
    })
</script>
</body>

</html>

<?php unset($_SESSION["notification"]) ?>