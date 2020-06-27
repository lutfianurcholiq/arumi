<?php $this->libs->rowOpen($judul, $menu); ?>
<br>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">

            <?php $this->libs->inputOpen('bahan baku', ''); ?>
                <input class="form-control" type="text" value="<?php echo rp($hasil['bahan_baku']) ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('bahan penolong', ''); ?>
                <input class="form-control" type="text" value="<?php echo rp($hasil['bahan_penolong']) ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('tenaga kerja', ''); ?>
                <input class="form-control" type="text" value="<?php echo rp($hasil['tenaga_kerja']) ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('overhead pabrik', ''); ?>
                <input class="form-control" type="text" value="<?php echo rp($hasil['oh']) ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <?php
                $biaya_produksi = $hasil['bahan_baku'] + $hasil['bahan_penolong'] + $hasil['tenaga_kerja'] + $hasil['oh'];
            ?>

            <?php $this->libs->inputOpen('biaya produksi', ''); ?>
                <input class="form-control" type="text" value="<?php echo rp($biaya_produksi) ?>" readonly>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('harga pokok penjualan', 'required'); ?>
                <input class="form-control" type="text" value="<?php echo rp($biaya_produksi) ?>" readonly>
                <input class="form-control" type="hidden" name="nominal" value="<?php echo $biaya_produksi ?>" readonly>
            <?php $this->libs->inputClose(); ?>
            

            <input type="hidden" name="id_produksi" value="<?php echo $hasil['id_produksi'] ?>">
            
            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
