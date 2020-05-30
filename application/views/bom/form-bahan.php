<?php $this->libs->rowOpen($produk['nama_produk'], $judul); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
        <?php $this->libs->inputOpen('bahan', 'required'); ?>
            <select class="form-control chosen-select" name="id_bahan">
                <option selected="" disabled="">Contoh: Mentega</option>
                <?php
                    foreach ($bahan as $data) {
                        if ($data['produk_id'] == NULL) {
                            echo "<option value = " . $data['id_bahan'] . ">" . $data['nama_bahan'] . "</option>";
                        }
                    }
                ?>
            </select>
            <?php echo form_error('id_bahan'); ?>
        <?php $this->libs->inputClose(); ?>

        <?php $this->libs->inputOpen('jumlah', 'required'); ?>
            <input class="form-control" type="text" name="jumlah" placeholder="Contoh: 12" onkeypress="return numeric(event)" value="<?php echo set_value('jumlah'); ?>">
            <?php echo form_error('jumlah'); ?>
        <?php $this->libs->inputClose(); ?>

        <?php $this->libs->buttonSubmit01($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>