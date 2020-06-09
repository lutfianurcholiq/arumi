<?php $this->libs->rowOpen($judul, $menu); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('nama bahan', 'required'); ?>
                <input class="form-control" type="text" name="nama_bahan" placeholder="Contoh: Tepung Terigu" onkeypress="return alphabet(event)" value="<?php echo $hasil['nama_bahan']; ?>">
                <?php echo form_error('nama_bahan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('satuan', 'required'); ?>
                <input class="form-control" type="text" name="satuan" placeholder="Contoh: kg" onkeypress="return alphabet(event)" value="<?php echo $hasil['satuan']; ?>">
                <?php echo form_error('satuan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('harga', 'required'); ?>
                <input class="form-control" type="text" name="harga" placeholder="Contoh: 7.500" onkeypress="return numeric(event)" value="<?php echo $hasil['harga']; ?>">
                <?php echo form_error('harga'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('keterangan', ''); ?>
                <select class="form-control" name="keterangan">
                    <option selected="" value="<?php echo $hasil['keterangan']; ?>"><?php echo $hasil['keterangan']; ?></option>
                    <?php if($hasil['keterangan'] == 'Bahan Penolong') : ?>
                        <option value="Bahan Baku">Bahan Baku</option>
                    <?php else : ?>
                        <option value="Bahan Penolong">Bahan Penolong</option>
                    <?php endif; ?>
                </select>
                <?php echo form_error('keterangan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
