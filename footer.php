<footer class="footer text-center">
    All Rights Reserved <a href="<?= base_url() ?>">Student Information System</a>.
</footer>
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

<script>
    jQuery(document).ready(function() {
        const server = "server.php";
        const base_url = "<?= base_url() ?>";

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
    })
</script>
</body>

</html>