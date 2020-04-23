<?php $this->libs->rowOpen($judul, $menu); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('nama produk', 'required'); ?>
                <input class="form-control" type="text" name="nama_produk" placeholder="Contoh: Tepung Terigu" onkeypress="return alphabet(event)" value="<?php echo $hasil['nama_produk']; ?>">
                <?php echo form_error('nama_produk'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('satuan', 'required'); ?>
                <input class="form-control" type="text" name="satuan" placeholder="Contoh: pcs" onkeypress="return alphabet(event)" value="<?php echo $hasil['satuan']; ?>">
                <?php echo form_error('satuan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('harga', 'required'); ?>
                <input class="form-control" type="text" name="harga" placeholder="Contoh: 25000" onkeypress="return numeric(event)" value="<?php echo $hasil['harga']; ?>">
                <?php echo form_error('harga'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
