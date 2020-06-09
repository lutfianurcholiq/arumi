<?php $this->libs->rowOpen($judul, $menu); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('nama', 'required'); ?>
                <input class="form-control" type="text" name="nama_karyawan" placeholder="Contoh: Akhmad Yusril Nur Chaeni" onkeypress="return alphabet(event)" value="<?php echo $hasil['nama_karyawan']; ?>">
                <?php echo form_error('nama_karyawan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('whatsapp', 'required'); ?>
                <input class="form-control" type="text" name="no_wa" placeholder="Contoh: 087830661966" onkeypress="return numeric(event)" value="<?php echo noHp($hasil['no_wa']); ?>">
                <?php echo form_error('no_wa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('gaji', 'required'); ?>
                <input class="form-control" type="text" name="gaji" placeholder="Contoh: 2.700.000" onkeypress="return numeric(event)" value="<?php echo $hasil['gaji']; ?>">
                <?php echo form_error('gaji'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('alamat', 'required'); ?>
                <textarea class="form-control" type="text" name="alamat" rows="3" placeholder="Contoh: Jl Kepanjin"><?php echo $hasil['alamat']; ?></textarea>
                <?php echo form_error('alamat'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
