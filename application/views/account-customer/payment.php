<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="breadcumb_area bg-img" style="background-image: url(shop-assets/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>CHECKOUT</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="checkout_area section-padding-80"> -->
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-page-heading mb-30">
                            <h5>Alamat Pengiriman:</h5>
                        </div>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="company">Nama Penerima</label>
                                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama') ?>">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="company">No WA</label>
                                    <input type="text" class="form-control" value="<?php echo noHp($this->session->userdata('no_wa')) ?>">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Alamat</label>
                                    <textarea class="form-control"><?php echo $this->session->userdata('alamat') ?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Pesanan <?php echo $order['kode_pesanan']."-".jumlahAngka($order['id_pesanan']) ?></h5>
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
                                                <td>".$data['nama_produk']."</td>
                                                <td>".$data['jumlah']." ".$data['satuan']."</td>
                                                <td align='right'>".rp($data['harga'])."</td>
                                                <td align='right'>".rp($data['subtotal'])."</td>
                                            </tr>";
                                        $total += $data['subtotal'];
                                    }
                                ?>
                                <tr>
                                    <td align="center" colspan="3"><b>Total</b></td>
                                    <td align="right"><b><?php echo rp($total) ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <a href="<?php echo site_url('bayar/pay/'.$order['id_pesanan'].'/'.$order['total']) ?>" class="btn essence-btn">Bayar</a>
                        <p>Bayar sekarang kemudian pesanan anda akan ditangani<br>oleh bagian produksi Arumi Cake.</p>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</section>