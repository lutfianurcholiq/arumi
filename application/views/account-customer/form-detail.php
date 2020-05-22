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
                                for ($qty = $hasil['min']; $qty <= $hasil['max']; $qty++) {
                                    echo " <option value='$qty'>$qty</option>";
                                }
                            ?>
                        </select>
                        <b>Pilih Rasa</b>
                        <select class="js-example-basic-single" id="rasa" name="" style="width: 50%" onchange="choose()">
                            <option selected data-harga="0">Pilih rasa</option>
                            <!-- <option>Original</option> -->
                            <?php
                                $id_produk = $hasil['id_produk'];
                                $sql = "SELECT rasa, harga_rasa
                                                FROM rasa a 
                                                JOIN produk_rasa b ON a.id_rasa = b.rasa_id
                                                WHERE b.produk_id = '$id_produk'";
                                $rasa = $this->db->query($sql)->result_array();
                                foreach ($rasa as $r) {
                                    echo " <option data-harga=".rp($r['harga_rasa'])." >" . $r['rasa'] . "</option>";
                                }
                            ?>
                        </select>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <b>Harga Rasa</b>
                                <input type="text" id="hargavalue" class="form-control" readonly>
                            </div>
                            <!-- <div class="col-md-6 mb-3">
                                <b>Harga Kue</b>
                                <input type="text" name="form-control" value="Tes" readonly>
                            </div> -->
                        </div>
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