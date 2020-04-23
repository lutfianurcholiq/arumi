<?php $this->libs->rowOpen($judul, $menu); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">

            <?php $this->libs->inputOpen('biaya', ''); ?>
                <select class="form-control" name="nama_biaya">
                    <option selected="" value="<?php echo $hasil['nama_biaya']; ?>"><?php echo $hasil['nama_biaya']; ?></option>
                    <?php if($hasil['nama_biaya'] == 'Biaya Operasional') : ?>
                        <option value="Biaya Administrasi & Umum">Biaya Administrasi & Umum</option>
                        <option value="Biaya Produksi">Biaya Produksi</option>
                    <?php elseif($hasil['nama_biaya'] == 'Biaya Administrasi & Umum'): ?>
                        <option value="Biaya Produksi">Biaya Produksi</option>
                        <option value="Biaya Operasional">Biaya Operasional</option>
                    <?php else : ?>
                        <option value="Biaya Administrasi & Umum">Biaya Administrasi & Umum</option>
                        <option value="Biaya Operasional">Biaya Operasional</option>
                    <?php endif; ?>
                </select>
                <?php echo form_error('nama_biaya'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('coa', ''); ?>
                <select class="form-control" name="kode_coa">
                    <option selected="" value="<?php echo $hasil['kodeCoa']; ?>"><?php echo $hasil['kodeCoa']." ".$hasil['nama_coa']; ?></option>
                    <?php 
                        foreach($coa as $data) {
                            if($hasil['kodeCoa'] != $data['kode_coa']) {
                                echo '<option value='.$data["kode_coa"].'>'.$data["kode_coa"].' '.$data["nama_coa"].'</option>'; 
                            }
                        }
                    ?>
                </select>
                <?php echo form_error('kode_coa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('keterangan', ''); ?>
                <textarea class="form-control" type="text" name="keterangan" rows="3" placeholder="Contoh: Biaya untuk bayar sesuatu.."><?php echo $hasil["keterangan"]; ?></textarea>
                <?php echo form_error('keterangan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>
