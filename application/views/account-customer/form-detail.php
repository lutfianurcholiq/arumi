<section class="single_product_details_area d-flex align-items-center">
    <div class="single_product_thumb clearfix">
        <div class="product_thumbnail_slides owl-carousel">
            <img src="<?php echo base_url($hasil['foto']) ?>" alt="" style="height: 20%">
            <img src="<?php echo base_url($hasil['foto']) ?>" alt="" style="height: 20%">
        </div>
    </div>
    <div class="single_product_desc clearfix">
        <span>pesan</span>
        <a href="">
            <h2><?php echo $hasil['nama_produk'] ?></h2>
        </a>
        <p class="product-price"><?php echo rp($hasil['harga']) ?></p>
        <p class="product-desc"><?php echo $hasil['deskripsi'] ?></p>
        <form action="<?php echo $url ?>" method="post">
            <div class="row">
                <div class="col-md-12">
                    <b>Qty</b>
                    <select class="js-example-basic-single" name="jumlah" style="width: 50%">
                        <?php
                            for ($qty= $hasil['min'] ; $qty <= $hasil['max'] ; $qty++) { 
                                echo " <option value='$qty'>$qty</option>";
                            }
                        ?>
                    </select>
                    <b>Rasa</b>
                    <select class="js-example-basic-single" name="jumlah" style="width: 50%">
                        <option value="">Pilih rasa</option>
                        <?php
                            for ($qty= $hasil['min'] ; $qty <= $hasil['max'] ; $qty++) { 
                                echo " <option value='$qty'>Belum</option>";
                            }
                        ?>
                    </select>
                    <input type="hidden" name="produk_id" value="<?php echo $this->uri->segment(3) ?>" readonly>
                </div>
            </div>
            <div class="cart-fav-box d-flex align-items-center">
                <button type="submit" class="btn essence-btn">Tambah</button>
                <div class="product-favourite ml-4">
                    <a href="<?php echo site_url('pelangganBeranda') ?>" class="favme fa fa-home"></a>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="<?php echo base_url("shop-assets/js/jquery/jquery-2.2.4.min.js"); ?>"></script>
<script src="<?= base_url('shop-assets/js/select2.min.js') ?>"></script>
<script>
    $('.js-example-basic-single').select2()
</script>