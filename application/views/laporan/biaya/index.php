<?php $this->load->view('laporan/biaya/form'); 
$this->libs->rowOpen('', ''); ?>
    <div class="product-status-wrap">
        <center>
            <h4><?php echo $menu." ".$judul ?></h4>
            <h4>Arumi</h4>
            <h5><?php echo "Periode bulan " . bulan($bulan) . " tahun " . $taun; ?></h5>
        </center>
        <div id="toolbar"> </div>
    </div>

<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <?php $this->load->view('laporan/biaya/tabel')  ?>
    </div>
</div>
<?php $this->libs->rowClose(); ?>