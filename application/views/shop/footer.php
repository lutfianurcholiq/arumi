    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy; Arumi Cake <script>document.write(new Date().getFullYear());</script>
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <script src="<?php echo base_url("shop-assets/js/jquery/jquery-2.2.4.min.js"); ?>"></script>
    <script src="<?php echo base_url("shop-assets/js/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("shop-assets/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("shop-assets/js/e-search.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/input/auto-choose.js"); ?>"></script>
    <!-- dataTable JS  -->
    <script src="<?= base_url('shop-assets/js/dataTables/jquery.dataTables.js'); ?>"></script>
    <script src="<?= base_url('shop-assets/js/dataTables/dataTables.bootstrap4.js'); ?>"></script>
    <!-- select2 JS  -->
    <script src="<?php echo base_url("shop-assets/js/plugins.js"); ?>"></script>
    <script src="<?php echo base_url("shop-assets/js/classy-nav.min.js"); ?>"></script>
    <script src="<?php echo base_url("shop-assets/js/active.js"); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dataTables').DataTable();
        })
        $('input.form-control.search-product').search(function(){
        })
    </script>
</body>

</html>