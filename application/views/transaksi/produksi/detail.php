<?php $this->libs->rowOpen($judul, ''); ?>
    <div class="product-status-wrap">
        <div id="toolbar"> 
            <h5><?php echo "Kode produksi: ".$hasil['kode_produksi']."-".jumlahAngka($hasil['id_produksi'])."  
            <br> Mulai produksi: ".shortdate_indo($hasil['mulai'])." <br> Selesai produksi: ".shortdate_indo($hasil['selesai']) ?></h5>

        </div>
    </div>

    <div class="add-product">
        <a href="<?php echo $tabel; ?>" class="Primary mg-b-10"><i class="fas fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;Kembali</a>
    </div>

<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <?php $this->load->view('laporan/biaya/tabel')  ?>
    </div>
</div>
<?php $this->libs->rowClose(); ?>