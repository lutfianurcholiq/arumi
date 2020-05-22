<?php $this->libs->rowOpen($judul, $menu); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('nama', 'required'); ?>
                <input class="form-control" type="text" name="nama_rasa" placeholder="Contoh: Black Forest" onkeypress="return alphabet(event)" value="<?php echo $hasil['rasa']; ?>">
                <?php echo form_error('nama_rasa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('harga', 'required'); ?>
                <input class="form-control" type="text" name="harga_rasa" placeholder="Contoh: 35.000" onkeypress="return numeric(event)" value="<?php echo $hasil['harga_rasa']; ?>">
                <?php echo form_error('harga_rasa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>