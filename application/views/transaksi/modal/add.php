<?php $this->libs->rowOpen($judul, $menu); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('nominal', 'required'); ?>
                <input id="rupiah0" class="form-control" type="text" name="nominal" placeholder="Contoh: 500.000" onkeypress="return numeric(event)" value="<?php echo set_value('kode_coa'); ?>">
                <?php echo form_error('nominal'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('keterangan', ''); ?>
                <textarea class="form-control" type="text" name="keterangan" rows="3" placeholder="Contoh: Tuan Lutfi menyetor modal"></textarea>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>