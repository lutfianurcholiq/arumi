<!-- <table> -->
    <?php
        // $thead = ["no", "id pesanan", "id produk", "id bahan", "jumlah", "harga", "subtotal"]; 
        // $this->libs->thead($thead);
        $no = 0; 
        $jumlah = 0;
        $subtotal = 0;
        foreach ($bom as $data) : $no++;
        $jumlah = $data['jumlah'] * $data['qty'];
        $subtotal = $jumlah * $data['harga'];
    ?>
    <tr>
        <td><input type="hidden" name="no" value="<?= $no; ?>" readonly></td>
        <td><input type="hidden" name="pesanan_id" value="<?= $pesanan['id_pesanan']; ?>" readonly></td>
        <td><input type="hidden" name="produk_id[]" value="<?= $data['produk_id']; ?>" readonly></td>
        <td><input type="hidden" name="bahan_id[]" value="<?= $data['bahan_id']; ?>" readonly></td>
        <td><input type="hidden" name="jumlah[]" value="<?= $jumlah; ?>" readonly></td>
        <td><input type="hidden" name="harga[]" value="<?= $data['harga']; ?>" readonly></td>
        <td><input type="hidden" name="subtotal[]" value="<?= $subtotal; ?>" readonly></td>
    </tr>
    <?php endforeach; ?>
<!-- </table> -->