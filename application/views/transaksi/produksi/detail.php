<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#biayaProduksi">Biaya Produksi</a></li>
                        <li ><a href="#bahanBaku">Bahan Baku</a></li>
                        <li ><a href="#tenagaKerja">Tenaga Kerja</a></li>
                        <li ><a href="#bahanPenolong">Bahan Penolong</a></li>
                        <li ><a href="#oh">OH</a></li>
                    </ul>
                    <div class="add-product">
                        <a href="<?php echo $tabel; ?>" class="Primary mg-b-10"><i class="fas fa-table" aria-hidden="true"></i>&nbsp;&nbsp;Kembali</a>
                    </div>
                    <div class="product-status-wrap">
                        <div class="details-blog-dt blog-sig-details-dt courses-info mobile-sm-d-n">
                            <span><a href="#"><i class="fa fa-list"></i> <b>Kode Produksi:</b> <?php echo $hasil['kode_produksi'] . "-" . jumlahAngka($hasil['id_produksi']) ?></a></span>
                            <span><a href="#"><i class="far fa-calendar-alt"></i> <b>Mulai Produksi:</b> <?php echo shortdate_indo($hasil['mulai']) ?></a></span>
                            <span><a href="#"><i class="far fa-calendar-check"></i> <b>Selesai Produksi:</b> <?php echo shortdate_indo($hasil['selesai']) ?></a></span>
                        </div>
                    </div>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="biayaProduksi">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php $this->load->view('transaksi/produksi/biaya-produksi')  ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="bahanBaku">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php $this->load->view('transaksi/produksi/bahan-baku')  ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="tenagaKerja">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php $this->load->view('transaksi/produksi/tenaga-kerja')  ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="bahanPenolong">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php $this->load->view('transaksi/produksi/bahan-penolong')  ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="oh">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php $this->load->view('transaksi/produksi/oh')  ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>