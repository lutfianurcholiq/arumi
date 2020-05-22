<?php $this->libs->rowOpen($produk['nama_produk'], $judul); ?>
    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
            <?php $this->libs->inputOpen('rasa', 'required'); ?>
                <select class="form-control chosen-select" name="id_rasa">
                    <option selected="" disabled="">Contoh: Barbeque</option>
                    <?php
                        foreach ($rasa as $data) {
                            if ($data['produk_id'] == NULL) {
                                echo "<option value = " . $data['id_rasa'] . ">" . $data['rasa'] . "</option>";
                            }
                        }
                    ?>
                </select>
                <?php echo form_error('id_rasa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->buttonSubmit01($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>