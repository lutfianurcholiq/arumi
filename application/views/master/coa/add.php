<?php $this->libs->rowOpen($judul, $menu); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('kode coa', 'required'); ?>
                <input class="form-control" type="text" name="kode_coa" placeholder="Contoh: 111" onkeypress="return numeric(event)" value="<?php echo set_value('kode_coa'); ?>">
                <?php echo form_error('kode_coa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('nama', 'required'); ?>
                <input class="form-control" type="text" name="nama_coa" placeholder="Contoh: Kas" onkeypress="return alphabet(event)" value="<?php echo set_value('nama_coa'); ?>">
                <?php echo form_error('nama_coa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
