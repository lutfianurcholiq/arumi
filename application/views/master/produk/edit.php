<?php $this->libs->rowOpen($judul, $menu); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST" enctype="multipart/form-data">
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

            <?php $this->libs->inputOpen('min', 'required'); ?>
                <input class="form-control" type="text" name="min" placeholder="Contoh: 1" onkeypress="return numeric(event)" value="<?php echo $hasil['min'] ?>">
                <?php echo form_error('min'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('max', 'required'); ?>
                <input class="form-control" type="text" name="max" placeholder="Contoh: 50" onkeypress="return numeric(event)" value="<?php echo $hasil['max'] ?>">
                <?php echo form_error('max'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('deskripsi', 'required'); ?>
                <textarea class="form-control" type="text" name="deskripsi" rows="3" placeholder="Contoh: Kue yang sangat enak, gurih dan lembut di bibir.."> <?php echo $hasil['deskripsi'] ?></textarea>
                <?php echo form_error('deskripsi'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('foto', ''); ?>
                <input class="form-control" type="file" name="foto" >
                <input class="form-control" type="hidden" name="foto_lama" value="<?php echo $hasil['foto']; ?>" readonly>
                <?php echo form_error('foto'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
