<?php $this->libs->rowOpen($judul, $menu); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('nominal', 'required'); ?>
                <input class="form-control" type="text" name="nominal" placeholder="Contoh: 150.000" onkeypress="return numeric(event)" value="<?php echo set_value('nominal'); ?>">
                <?php echo form_error('nominal'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('bahan baku', ''); ?>
                <input class="form-control" type="text" value="<?php echo rp($hasil['bahan_baku']) ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('bahan penolong', ''); ?>
                <input class="form-control" type="text" value="<?php echo rp($hasil['bahan_penolong']) ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('tenaga kerja', ''); ?>
                <input class="form-control" type="text" value="<?php echo rp($hasil['tenaga_kerja']) ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <input type="hidden" name="id_produksi" value="<?php echo $hasil['id_produksi'] ?>">
            
            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
