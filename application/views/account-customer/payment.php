<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="breadcumb_area bg-img" style="background-image: url(./shop-assets/img/bg-img/breadcumb.jpg);">
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
    <br>
    <!-- <div class="checkout_area section-padding-80"> -->
        <div class="container">
            <div class="row">
                <?php if ($order['status'] == "Belum Bayar") : ?>
                <div class="col-12 col-md-4">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-page-heading mb-30">
                            <h5>Alamat Pengiriman:</h5>
                        </div>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="company">Nama Penerima</label>
                                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama') ?>" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="company">No WA</label>
                                    <input type="text" class="form-control" value="<?php echo noHp($this->session->userdata('no_wa')) ?>" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Alamat</label>
                                    <textarea class="form-control" readonly><?php echo $this->session->userdata('alamat') ?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <?php
                        $this->load->view('account-customer/form-bayar'); 
                    else : 
                        echo "Sudah bayar";
                    endif;
                ?>
            </div>
        </div>
    <!-- </div> -->
</section>