<?php $this->libs->rowOpen($judul, $menu); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('nama', 'required'); ?>
                <input class="form-control" type="text" name="nama_komunitas" placeholder="Contoh: Roti O" onkeypress="return alphabet(event)" value="<?php echo $hasil['nama_komunitas']; ?>">
                <?php echo form_error('nama_komunitas'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('whatsapp', 'required'); ?>
                <input class="form-control" type="text" name="no_wa" placeholder="Contoh: 087830661966" onkeypress="return numeric(event)" value="<?php echo noHp($hasil['no_wa']); ?>">
                <?php echo form_error('no_wa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('alamat', 'required'); ?>
                <textarea class="form-control" type="text" name="alamat" rows="3" placeholder="Contoh: Jl. L. L. R.E. Martadinata No.140, Merdeka, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114"><?php echo $hasil['alamat']; ?></textarea>
                <?php echo form_error('alamat'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
