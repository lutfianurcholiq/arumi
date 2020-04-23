<?php $this->libs->rowOpen($judul, $menu); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('kode coa', ''); ?>
                <input class="form-control" type="text" value="<?php echo $hasil['kode_coa']; ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('nama coa', 'required'); ?>
                <input class="form-control" type="text" name="nama_coa" placeholder="Contoh: Persediaan" onkeypress="return alphabet(event)" value="<?php echo $hasil['nama_coa']; ?>">
                <?php echo form_error('nama_coa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
