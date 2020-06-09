<?php $this->libs->rowOpen($judul, $menu); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">

            <?php $this->libs->inputOpen('keterangan', 'required'); ?>
                <textarea class="form-control" type="text" name="keterangan" rows="3" placeholder="Contoh: Mau bayar beban kuliah rina.."><?php echo set_value("keterangan"); ?></textarea>
                <?php echo form_error('keterangan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
