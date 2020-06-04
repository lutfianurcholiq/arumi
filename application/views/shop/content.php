<body>
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <nav class="classy-navbar" id="essenceNav">
                <a class="nav-brand" href="<?php echo site_url('pelangganBeranda') ?>"><img style="width:200px; height: 50px;" src="<?php echo base_url("assets/img/logo/logo.png"); ?>" alt=""></a>
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <div class="classy-menu">
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div> <br>
                    <div class="classynav">
                        <ul>
                            <li><a style="color: cornflowerblue"><?php echo "Hai ".$this->session->userdata('nama').".." ?></a></li>
                        </ul>
                        <ul>
                            <li><a href="<?php echo site_url('riwayat') ?>">Pesanan</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="header-meta d-flex clearfix justify-content-end">
                <div class="user-login-info">
                    <a href="<?php echo site_url('welcome/logout'); ?>"><img src="<?php echo base_url('shop-assets/img/core-img/on-off-button.svg') ?>" alt=""></a>
                </div>
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="<?php echo base_url('shop-assets/img/core-img/bag.svg') ?>" alt=""> <span><?php echo $pesanan ?></span></a>
                </div>
            </div>
        </div>
    </header>
    <div class="cart-bg-overlay"></div>
    <div class="right-side-cart-area">
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="<?php echo base_url(); ?>shop-assets/img/core-img/bag.svg" alt=""><span><?php echo $pesanan ?></a>
        </div>
        <div class="cart-content d-flex">
            <div class="cart-list">
                <?php 
                    $total = 0;
                    if($pesanan != 0) :
                        foreach($list as $data) : 
                ?>
                    <div class="single-cart-item">
                        <a href="<?php echo site_url('pemesanan/remove/'.$data['produk_id'].'/'.$this->session->userdata('pelanggan_id')) ?>" class="product-image">
                            <img src="<?php echo base_url($data['foto']) ?>" class="cart-thumb" alt="">
                            <div class="cart-item-desc">
                                <span class="product-remove">
                                    <i class="fa fa-close"></i>
                                </span>
                                <h6><?php echo $data['nama_produk'] ?></h6>
                                <p class="size"><?php echo "Jumlah: ".$data['jumlah'] ?></p>
                                <p class="color"><?php echo "Harga: ".rp($data['harga']) ?></p>
                                <p class="color"><?php echo $data['rasa'].": ".rp($data['harga_rasa']) ?></p>
                                <p class="price"><?php echo "Subtotal: ".rp($data['subtotal']) ?></p>
                            </div>
                        </a>
                    </div>
                <?php 
                        $total += $data['subtotal'];
                        endforeach; 
                    endif;
                ?>
            </div>
            <div class="cart-amount-summary">
                <?php if($pesanan == 0 || $pesanan == NULL) : ?>
                    <img src="<?php echo base_url('shop-assets/img/shop.gif') ?>">
                    <h2>Yuk pesan kue biar keranjangmu ga kosong.</h2>
                <?php else : ?>
                    <h2>Pesanan mu</h2>
                    <ul class="summary-table">
                        <li><span>pemesan:</span> <span><?php echo $this->session->userdata('nama') ?></span></li>
                        <li><span>total:</span> <span><?php echo rp($total) ?></span></li>
                    </ul>
                    <div class="checkout-btn mt-100">
                        <a href="<?php echo site_url('pemesanan/checkout/'.$total) ?>" class="btn essence-btn">Pesan Sekarang</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php echo $contents; ?>