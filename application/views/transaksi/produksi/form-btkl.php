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
                <input class="form-control" type="text" name="jumlah" placeholder="Contoh: 1" onkeypress="return numeric(event)" value="<?php echo set_value('jumlah'); ?>">
                <?php echo form_error('jumlah'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>