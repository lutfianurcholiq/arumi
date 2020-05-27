<?php 
    $menu = $beli['kode']. "-" . jumlahAngka($beli['id']); 
    $this->libs->rowOpen($menu, ucwords('pembelian peralatan')); 
?>

    <div class="sparkline13-graph">
        <form action="<?php echo $url; ?>" method="POST">
        
            <?php $this->libs->inputOpen('peralatan', 'required'); ?>
                <select class="form-control chosen-select" name="id_peralatan">
                    <option selected="" disabled="">Contoh: Mixer</option>
                    <?php
                        foreach ($peralatan as $data) {
                            if ($data['transaksi_id'] == NULL) {
                                echo "<option value = " . $data['id_peralatan'] . "> " . $data['nama_peralatan'] . "</option>";
                            }
                        }
                    ?>
                </select>
                <?php echo form_error('id_peralatan'); ?>
            <?php $this->libs->inputClose(); ?>

            <?php $this->libs->inputOpen('nominal', 'required'); ?>
                <input class="form-control" type="text" name="nominal" placeholder="Contoh: 50000" onkeypress="return numeric(event)" value="<?php echo set_value('nominal'); ?>">
                <?php echo form_error('nominal'); ?>
            <?php $this->libs->inputClose(); ?>

        <?php $this->libs->buttonSubmit01($tabel); ?>
        </form>
    </div>
<?php $this->libs->rowClose(); ?>