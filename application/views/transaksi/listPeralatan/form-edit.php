<?php $this->libs->rowOpen($judul, $menu); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('peralatan', ''); ?>
                <input class="form-control" type="text" value="<?php echo $hasil['nama_peralatan'] ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('nominal', 'required'); ?>
                <input class="form-control" type="text" name="nominal" placeholder="Contoh: 65000" onkeypress="return numeric(event)" value="<?php echo $hasil['nominal']; ?>">
                <?php echo form_error('nominal'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
