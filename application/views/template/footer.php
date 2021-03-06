    <!-- jquery -->
    <script src="<?= base_url('assets/js/vendor/jquery-1.12.4.min.js') ?>"></script>
    <!-- bootstrap JS -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- wow JS -->
    <script src="<?= base_url('assets/js/wow.min.js') ?>"></script>
    <!-- price-slider JS -->
    <script src="<?= base_url('assets/js/jquery-price-slider.js') ?>"></script>
    <!-- meanmenu JS -->
    <script src="<?= base_url('assets/js/jquery.meanmenu.js') ?>"></script>
    <!-- owl.carousel JS -->
    <script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>
    <!-- sticky JS -->
    <script src="<?= base_url('assets/js/jquery.sticky.js') ?>"></script>
    <!-- scrollUp JS -->
    <script src="<?= base_url('assets/js/jquery.scrollUp.min.js') ?>"></script>
    <!-- mCustomScrollbar JS -->
    <script src="<?= base_url('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/scrollbar/mCustomScrollbar-active.js') ?>"></script>
    <!-- metisMenu JS -->
    <script src="<?= base_url('assets/js/metisMenu/metisMenu.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/metisMenu/metisMenu-active.js') ?>"></script>
    <!-- timeline JS  -->
    <script src="<?= base_url('assets/js/timeline/timeline.js'); ?>"></script>
    <!-- dataTable JS  -->
    <script src="<?= base_url('shop-assets/js/dataTables/jquery.dataTables.js'); ?>"></script>
    <script src="<?= base_url('shop-assets/js/dataTables/dataTables.bootstrap4.js'); ?>"></script>
    <!--  editable JS -->
    <script src="<?= base_url('assets/js/editable/jquery.mockjax.js') ?>"></script>
    <script src="<?= base_url('assets/js/editable/mock-active.js') ?>"></script>
    <script src="<?= base_url('assets/js/editable/select2.js') ?>"></script>
    <script src="<?= base_url('assets/js/editable/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/editable/bootstrap-datetimepicker.js') ?>"></script>
    <script src="<?= base_url('assets/js/editable/bootstrap-editable.js') ?>"></script>
    <script src="<?= base_url('assets/js/editable/xediable-active.js') ?>"></script>
    <!-- Inputan JS -->
    <script src="<?= base_url('assets/js/input/field.js') ?>"></script>
    <!-- notification JS -->
    <script src="<?= base_url('assets/js/notifications/Lobibox.js') ?>"></script>
    <script src="<?= base_url('assets/js/notifications/notification-active.js') ?>"></script>
    <!-- datapicker JS  -->
    <script src="<?= base_url('assets/js/datapicker/bootstrap-datepicker.js') ?>"></script>
    <script src="<?= base_url('assets/js/datapicker/datepicker-active.js') ?>"></script>
    <!-- chosen JS -->
    <script src="<?= base_url('assets/js/chosen/chosen.jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/chosen/chosen-active.js') ?>"></script>
    <!-- select2 JS  -->
    <script src="<?= base_url('assets/js/select2/select2.full.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/select2/select2-active.js') ?>"></script>
    <!-- Chart JS -->
    <script src="<?= base_url('assets/js/chart/jquery.peity.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/peity/peity-active.js') ?>"></script>
    <!-- tab JS -->
    <script src="<?= base_url('assets/js/tab.js') ?>"></script>
    <!-- plugins JS -->
    <script src="<?= base_url('assets/js/plugins.js') ?>"></script>
    <!-- main JS -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <script>
        $(document).ready(function () {
            $('.dataTables').DataTable();


            $('#pesan-sukses').fadeIn().delay(4000).fadeOut()

            var date = new Date();
            date.setDate(date.getDate());

            $('#calendar').datepicker({ 
                format: "yyyy/mm/dd",
                startDate: date,
                minDate: 0,
            });
        })
    </script>
</body>

</html>