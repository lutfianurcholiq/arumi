<?php $this->libs->rowOpen($judul, $menu); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('kas bulan ini', ''); ?>
                <input class="form-control" type="text" value="<?php echo rp($kas['kas']); ?>" readonly>
                <input class="form-control" type="hidden" name="kas" value="<?php echo $kas['kas']; ?>" readonly>
            <?php $this->libs->inputClose(); ?>
            
            <?php $this->libs->inputOpen('nominal', 'required'); ?>
                <input id="rupiah0" class="form-control" type="text" name="nominal" placeholder="Contoh: 500.000" onkeypress="return numeric(event)" value="<?php echo set_value('kode_coa'); ?>">
                <?php echo form_error('nominal'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('keterangan', ''); ?>
                <textarea class="form-control" type="text" name="keterangan" rows="3" placeholder="Contoh: Nyona Adel mengambil uang untuk keperluan biaya kuliah anaknya"></textarea>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>