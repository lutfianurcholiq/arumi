<?php $this->libs->rowOpen($judul, ''); ?>
<div class="product-status-wrap">
    <div class="details-blog-dt blog-sig-details-dt courses-info mobile-sm-d-n">
        <span><a href="#"><i class="fa fa-list"></i> <b>Kode Produksi:</b> <?php echo $hasil['kode_produksi'] . "-" . jumlahAngka($hasil['id_produksi']) ?></a></span>
        <span><a href="#"><i class="far fa-calendar-alt"></i> <b>Mulai Produksi:</b> <?php echo shortdate_indo($hasil['mulai']) ?></a></span>
        <span><a href="#"><i class="far fa-calendar-check"></i> <b>Selesai Produksi:</b> <?php echo shortdate_indo($hasil['selesai']) ?></a></span>
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