<div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
    <div class="order-details-confirmation">
        <div class="cart-page-heading">
            <h5>Pesanan <?php echo $order['kode_pesanan'] . "-" . jumlahAngka($order['id_pesanan']) ?></h5>
            <p>Detail Pesanan</p>
        </div>
        <table class="table table-hover" style="font-size: 13px;">
            <?php
                $thead = ["produk", "jumlah", "harga", "subtotal"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php
                    $total = 0;
                    foreach ($hasil as $data) {
                        echo "
                                <tr>
                                    <td>" . $data['nama_produk'] . "</td>
                                    <td>" . $data['jumlah'] . " " . $data['satuan'] . "</td>
                                    <td align='right'>" . rp($data['harga']) . "</td>
                                    <td align='right'>" . rp($data['subtotal']) . "</td>
                                </tr>";
                        $total += $data['subtotal'];
                    }
                ?>
                <tr>
                    <td align="center" colspan="3"><b>Total</b></td>
                    <td align="right"><b><?php echo rp($total) ?></b></td>
                </tr>
            </tbody>
        </table> <br>
        <form action="<?php echo $url; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_pesanan" value="<?php echo $order['id_pesanan'] ?>" readonly> 
            <input type="hidden" name="total" value="<?php echo $order['total'] ?>" readonly>
            <div class="col-12 mb-3">
                <label for="company">Upload Bukti Bayar <span style="color: red; font-weight: bold">*</span></label>
                <input type="file" class="form-control" name="foto">
                <?php echo form_error('foto') ?>
                <br> 
                <button type="submit" class="btn essence-btn"> Bayar</button>
            </div>
        </form>
        <p>Bayar sekarang kemudian pesanan anda akan ditangani<br>oleh bagian produksi Arumi Cake.</p>
    </div>
</div>