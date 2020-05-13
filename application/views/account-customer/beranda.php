<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="breadcumb_area bg-img" style="background-image: url(shop-assets/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>produk arumi</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <input type="text" class="form-control search-product" placeholder="Cari produk..">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="shop_grid_product_area">
                    <div class="row containerItems">
                        <?php foreach ($hasil as $data) : ?>
                            <div data-search="<?php echo strtolower($data['nama_produk']) ?>" class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-wrapper" >
                                        <div class="product-img">
                                            <img src="<?php echo base_url($data['foto']) ?>" alt="">
                                        </div>
                                        <div class="product-description">
                                            <span>pesan</span>
                                            <h6><?php echo $data['nama_produk'] ?></h6>
                                            <p class="product-price"><?php echo rp($data['harga']) ?></p>
                                            <div class="hover-content">
                                                <div class="add-to-cart-btn">
                                                    <?php if ($data['pesanan_id'] == NULL) : ?>
                                                        <a href="<?php echo site_url('pemesanan/index/'.$data['id_produk'] ) ?>" class="btn essence-btn">klik</a>
                                                    <?php else : ?>
                                                        <a href="<?php echo site_url('pemesanan/see/'.$data['id_produk'] ) ?>" class="btn essence-btn">lihat</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </div> -->
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

</section>
<!-- ##### New Arrivals Area End ##### -->