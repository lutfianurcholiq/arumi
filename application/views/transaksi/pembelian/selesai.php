<?php foreach ($detail as $data) : ?>
  <?php echo $this->bo->modalOpenOther('Pengecekan Terakhir'); ?>
        <div class="modal-body">
          <form action="<?php echo site_url('pembelian/selesaiPembelian'); ?>" method="POST">
            <b>Selesaikan transaksi pembelian ?</b>
            <?php $no = 0; $total = 0; foreach ($detail as $data) : $no++; ?> 
                  <table>
                    <tr>
                      <td>
                        <input type="hidden" name="idBarang[]" value="<?php echo $data['idBarang']; ?>" readonly="">
                      </td>
                      <td>
                        <input type="hidden" name="jumlah[]" value="<?php echo $data['jumlah']; ?>" readonly="">
                      </td>
                      <td>
                        <input type="hidden" name="harga[]" value="<?php echo $data['hargaBeli']; ?>" readonly="">
                      </td>
                      <td>
                        <input type="hidden" name="subtotal[]" value="<?php echo $data['subtotal']; ?>" readonly="">
                      </td>
                    </tr>
                  </table>
            <?php $total += $data['subtotal']; endforeach; ?>

            <input type="hidden" name="no" value="<?php echo $no; ?>" readonly="readonly">
				    <input type="hidden" name="total" value="<?php echo $total; ?>" readonly="readonly">
				    <input type="hidden" name="idPembelian" value="<?php echo $beli['id']; ?>" readonly="readonly">
            <br>
            <div class="ln_solid"></div>

            <div class="text-right">
              <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-close"></i>Tidak</button>
              &nbsp;&nbsp;&nbsp;
              <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fa fa-fw fa-lg fa-check"></i>Ya</button>
            </div>
          </form>
        </div>
  <?php echo $this->bo->modalClose(); ?>   
<?php endforeach; ?>