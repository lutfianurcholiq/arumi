<?php $this->libs->modalOpenOther('modal-selesai'); ?>
    <form action="<?php echo $modal; ?>" method="POST">
        <div class="modal-body">
            <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
            <h2>Information!</h2>
            <p>Klik Oke untuk melanjutkan aktvitas anda.</p>
            <table class="text-hide">
                <?php
                    $thead = ["no", "operasional id", "coa id", "nominal", "harga"];
                    $this->libs->thead($thead);
                    $total = 0; $no = 1;
                ?>
                <tbody>
                    <?php foreach ($hasil as $data) : ?>
                        <tr>
                            <td><input type="hidden" class="form-control" name="no" value="<?php echo $no++; ?>" readonly=""></td>
                            <td><input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $data['transaksi_id']; ?>" readonly=""></td>
                            <td><input type="hidden" class="form-control" name="id_peralatan[]" value="<?php echo $data['peralatan_id']; ?>" readonly=""></td>
                            <td><input type="hidden" class="form-control" name="nominal[]" value="<?php echo $data['nominal']; ?>" readonly=""></td>
                    
                            <?php $total += $data['nominal'];  ?>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="6"><input type="hidden" class="form-control" name="total" value="<?php echo $total; ?>" readonly=""></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer footer-modal-admin info-md">
			<button type="submit" class="btn btn-custon-four btn-success"><i class="fa fa-check"></i> Oke</button>
        </div>
    </form>
<?php $this->libs->modalClose(); ?>