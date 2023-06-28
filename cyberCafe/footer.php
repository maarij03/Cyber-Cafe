<div class="row">
    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © <?php echo date('Y'); ?>.<a href="https://www.yahoobaba.net" target="_blank">YahooBaba</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>
</div>
<input type="text" class="site-url" value="<?php echo $base_url; ?>" hidden>
    <!-- Jquery JS-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/animsition.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/action.js"></script>
    <script>
            $(document).ready( function () {
                $('#showData').DataTable({
                    order:['0']
                });
            });
    </script>
</body>
</html>
<!-- end document-->
