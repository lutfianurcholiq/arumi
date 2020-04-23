<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Produk Arumi</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                    <?php foreach ($hasil as $data) : ?>
                        <div class="single-product-wrapper">
                            <div class="product-img">
                                <img src="<?php echo base_url($data['foto']) ?>" alt="">
                            </div>
                            <div class="product-description">
                                <?php if ($data['pesanan_id'] == NULL) : ?>
                                    <span>pesan</span>
                                    <h6><?php echo $data['nama_produk'] ?></h6>
                                    <p class="product-price"><?php echo rp($data['harga']) ?></p>
                                    <div class="hover-content">
                                        <div class="add-to-cart-btn">
                                            <a href="<?php echo site_url('pemesanan/index/'.$data['id_produk'] ) ?>" class="btn essence-btn">klik</a>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <span>sudah di keranjang</span>
                                    <h6><?php echo $data['nama_produk'] ?></h6>
                                    <p class="product-price"><?php echo rp($data['harga']) ?></p>
                                    <div class="hover-content">
                                        <div class="add-to-cart-btn">
                                            <a href="<?php echo site_url('pemesanan/see/'.$data['id_produk'] ) ?>" class="btn essence-btn">lihat</a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- ##### New Arrivals Area End ##### -->