<?php $this->libs->rowOpen($rasa['rasa'], $judul); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('bahan', 'required'); ?>
                <select class="form-control chosen-select" name="id_bahan">
                    <option selected="" disabled="">Contoh: Pasta Tomat</option>
                    <?php
                        foreach ($bahan as $data) {
                            if ($data['rasa_id'] == NULL) {
                                echo "<option value = " . $data['id_bahan'] . ">" . $data['nama_bahan'] . "</option>";
                            }
                        }
                    ?>
                </select>
                <?php echo form_error('id_bahan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit01($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>