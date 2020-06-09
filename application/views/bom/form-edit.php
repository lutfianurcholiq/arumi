<?php $this->libs->rowOpen($produk['nama_produk'], $judul); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('bahan', ''); ?>
                <input class="form-control" type="text" value="<?php echo $hasil['nama_bahan']; ?>" readonly>
                <input class="form-control" type="hidden" name="id_bahan" value="<?php echo $hasil['bahan_id']; ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('jumlah', 'required'); ?>
                <input class="form-control" type="text" name="jumlah" placeholder="Contoh: 4" onkeypress="return numeric(event)" value="<?php echo $hasil['jumlah']; ?>">
                <?php echo form_error('jumlah'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
