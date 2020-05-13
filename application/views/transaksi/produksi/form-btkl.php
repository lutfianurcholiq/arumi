<?php $this->libs->rowOpen($judul, ucwords('tahap kedua')); ?>
    <div class="alert-title">
        Anda sudah menyelesaikan tahap pertama
    </div>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">

            <?php $this->libs->inputOpen('karyawan', 'required'); ?>
                <select class="form-control chosen-select" name="id_karyawan">
                    <option selected="" disabled="">Contoh: Sulaiman</option>
                    <?php
                        foreach ($karyawan as $data) {
                            if ($data['produksi_id'] == NULL) {
                                echo "<option value = " . $data['id_karyawan'] . ">" . $data['nama_karyawan'] . "</option>";
                            }
                        }
                    ?>
                </select>
                <?php echo form_error('id_karyawan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('jumlah hari', 'required'); ?>
                <select class="form-control chosen-select" name="jumlah">
                    <option selected="" disabled="">Contoh: 2 hari</option>
                    <?php
                        for ($qty = 2 ; $qty <= 5 ; $qty++) { 
                            echo " <option value='$qty'>$qty hari</option>";
                        }
                    ?>
                </select>
                <?php echo form_error('jumlah'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit01($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>