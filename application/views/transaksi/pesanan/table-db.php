<!-- <table> -->
    <?php
        // $thead = ["no", "id pesanan", "id produk", "id bahan", "jumlah", "harga", "subtotal"]; 
        // $this->libs->thead($thead);
        $no = 0; foreach ($bom as $data) : $no++
    ?>
    <!-- <tr> -->
        <input type="hidden" name="no" value="<?= $no; ?>" readonly>
        <input type="hidden" name="pesanan_id" value="<?= $pesanan['id_pesanan']; ?>" readonly>
        <input type="hidden" name="produk_id[]" value="<?= $data['produk_id']; ?>" readonly>
        <input type="hidden" name="bahan_id[]" value="<?= $data['bahan_id']; ?>" readonly>
        <input type="hidden" name="jumlah[]" value="<?= $data['jumlah']; ?>" readonly>
        <input type="hidden" name="harga[]" value="<?= $data['harga']; ?>" readonly>
        <input type="hidden" name="subtotal[]" value="<?= $data['subtotal']; ?>" readonly>
    <!-- </tr> -->
    <?php endforeach; ?>
<!-- </table> -->