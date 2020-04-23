<?php $this->libs->rowOpen($judul, $menu); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">

            <?php $this->libs->inputOpen('qty', 'required'); ?>
                <input class="form-control" type="text" name="qty" placeholder="Contoh: Tepung Terigu" value="1">
                <?php echo form_error('qty'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
