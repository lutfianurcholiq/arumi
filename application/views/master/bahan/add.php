<?php $this->libs->rowOpen($judul, $menu); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('nama bahan', 'required'); ?>
                <input class="form-control" type="text" name="nama_bahan" placeholder="Contoh: Tepung Terigu" onkeypress="return alphabet(event)" value="<?php echo set_value('nama_bahan'); ?>">
                <?php echo form_error('nama_bahan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('satuan', 'required'); ?>
                <input class="form-control" type="text" name="satuan" placeholder="Contoh: kg" onkeypress="return alphabet(event)" value="<?php echo set_value('satuan'); ?>">
                <?php echo form_error('satuan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('harga', 'required'); ?>
                <input class="form-control" type="text" name="harga" placeholder="Contoh: 15000" onkeypress="return numeric(event)" value="<?php echo set_value('harga'); ?>">
                <?php echo form_error('harga'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('keterangan', 'required'); ?>
                <select class="form-control" name="keterangan">
                    <option selected="" disabled="">Contoh: Bahan Baku</option>
                    <option value="Bahan Baku">Bahan Baku</option>
                    <option value="Bahan Penolong">Bahan Penolong</option>
                </select>
                <?php echo form_error('keterangan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
