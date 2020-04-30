<?php 
    $menu = $beban['kode_operasional']. "-" . jumlahAngka($beban['id_operasional']); 
    $this->libs->rowOpen($menu, ucwords('list operasional')); 
?>

    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
        
            <?php $this->libs->inputOpen('coa', 'required'); ?>
                <select class="form-control chosen-select" name="id_coa">
                    <option selected="" disabled="">Contoh: 501 Beban Hidup</option>
                    <?php
                        foreach ($coa as $data) {
                            if ($data['operasional_id'] == NULL) {
                                echo "<option value = " . $data['kode_coa'] . ">" . $data['kode_coa'] . " " . $data['nama_coa'] . "</option>";
                            }
                        }
                    ?>
                </select>
                <?php echo form_error('id_coa'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('nominal', 'required'); ?>
                <input class="form-control" type="text" name="nominal" placeholder="Contoh: 50000" onkeypress="return numeric(event)" value="<?php echo set_value('nominal'); ?>">
                <?php echo form_error('nominal'); ?>
            <?php $this->libs->inputClose(); ?>

        <?php $this->libs->buttonSubmit01($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>