<?php $this->libs->rowOpen($judul, ucwords('tahap ketiga')); ?>
    <div class="alert-title">
        Anda sudah menyelesaikan tahap kedua
    </div>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">

            <?php $this->libs->inputOpen('bahan', 'required'); ?> <select class="form-control chosen-select" name="id_bahan">
                <option selected="" disabled="">Contoh: Daun Pisang</option>
                <?php
                    foreach ($bahan as $data) { if ($data['produksi_id'] == NULL) {
                            echo "<option value = " . $data['id_bahan'] . ">" . $data['nama_bahan'] . "</option>";
                        }
                    }
                ?>
                </select>
                <?php echo form_error('id_bahan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('kebutuhan', 'required'); ?>
                <input class="form-control" type="text" name="jumlah" placeholder="Contoh: 1" onkeypress="return numeric(event)" value="<?php echo set_value('jumlah'); ?>">
                <?php echo form_error('jumlah'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>