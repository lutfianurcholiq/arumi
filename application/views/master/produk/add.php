<?php $this->libs->rowOpen($judul, $menu); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST" enctype="multipart/form-data">
            <?php $this->libs->inputOpen('nama produk', 'required'); ?>
                <input class="form-control" type="text" name="nama_produk" placeholder="Contoh: Kue Lemper" onkeypress="return alphabet(event)" value="<?php echo set_value('nama_produk'); ?>">
                <?php echo form_error('nama_produk'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('satuan', 'required'); ?>
                <input class="form-control" type="text" name="satuan" placeholder="Contoh: pcs" onkeypress="return alphabet(event)" value="<?php echo set_value('satuan'); ?>">
                <?php echo form_error('satuan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('harga', 'required'); ?>
                <input class="form-control" type="text" name="harga" placeholder="Contoh: 500" onkeypress="return numeric(event)" value="<?php echo set_value('harga'); ?>">
                <?php echo form_error('harga'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('min', ''); ?>
                <input class="form-control" type="text" name="min" placeholder="Contoh: 1" onkeypress="return numeric(event)" value="1">
                <?php echo form_error('min'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('max', 'required'); ?>
                <input class="form-control" type="text" name="max" placeholder="Contoh: 50" onkeypress="return numeric(event)" value="<?php echo set_value('max'); ?>">
                <?php echo form_error('max'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('deskripsi', 'required'); ?>
                <textarea class="form-control" type="text" name="deskripsi" rows="3" placeholder="Contoh: Kue yang sangat enak, gurih dan lembut di bibir.."></textarea>
                <?php echo form_error('deskripsi'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('foto', 'required'); ?>
                <input class="form-control" type="file" name="foto" >
                <?php echo form_error('foto'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
