<?php $this->libs->rowOpen($judul, $menu); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">

            <?php $this->libs->inputOpen('biaya', 'required'); ?>
                <select class="form-control chosen-select" name="nama_biaya">
                    <option selected="" disabled="">Contoh: Biaya Operasional</option>
                    <option value="Biaya Operasional">Biaya Operasional</option>
                    <option value="Biaya Administrasi & Umum">Biaya Administrasi & Umum</option>
                    <option value="Biaya Produksi">Biaya Produksi</option>
                </select>
                <?php echo form_error('nama_biaya'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('coa', 'required'); ?>
                <select class="form-control chosen-select" name="kode_coa">
                    <option selected="" disabled="">Contoh: 511 Iklan</option>
                    <?php 
                        foreach ($coa as $data) {
                            echo "<option value = ".$data['kode_coa'].">".$data['kode_coa']." ".$data['nama_coa']."</option>";
                        }
                    ?>
                </select>
                <?php echo form_error('kode_coa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('keterangan', 'required'); ?>
                <textarea class="form-control" type="text" name="keterangan" rows="3" placeholder="Contoh: Biaya untuk bayar sesuatu.."><?php echo set_value("keterangan"); ?></textarea>
                <?php echo form_error('keterangan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
