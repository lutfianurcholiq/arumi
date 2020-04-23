<div class="edu-accordion-area mg-b-15">
    <div class="container-fluid">
        <?php $this->libs->rowOpen($judul, ''); ?>
            <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                <div class="alert-title">
                    <h2 style="color: cornflowerblue"><?php echo $pesanan['kode_pesanan']."-".jumlahAngka($pesanan['id_pesanan'])." ".$pesanan['nama_pelanggan'] ?></h2>
                    <p><?php echo "Dipesan pada tanggal ".shortdate_indo($pesanan['tanggal']) ?></p>
                </div>
                <div class="panel-group edu-custon-design" id="accordion">
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#jadwalkan">
                            <div class="panel-heading accordion-head">
                                <h4 class="panel-title" style="color: white">
                                    Pilih Komunitas !
                                </h4>
                            </div>
                        </a>
                        <div id="jadwalkan" class="panel-collapse panel-ic collapse in">
                            <div class="panel-body admin-panel-content">
                                <form action="<?php echo $url ?>" method="POST">
                                    <?php $this->libs->inputOpen('komunitas', 'required'); ?>
                                        <select class="form-control chosen-select" name="komunitas_id">
                                            <option selected="" disabled="">Contoh: Sidodadi</option>
                                            <?php 
                                                foreach ($komunitas as $data) {
                                                    echo "<option value = ".$data['id_komunitas'].">".$data['nama_komunitas']."</option>";
                                                }
                                            ?>
                                        </select>
                                        <?php echo form_error('komunitas_id'); ?>
                                    <?php $this->libs->inputClose(); ?>
                                    
                                    <input class="form-control" type="hidden" name="pesanan_id" value="<?php echo $pesanan['id_pesanan'] ?>" readonly>
                                    <input class="form-control" type="hidden" name="pelanggan_id" value="<?php echo $pesanan['pelanggan_id'] ?>" readonly>
                                    <?php $this->load->view('transaksi/pesanan/table-db'); ?>
                                    <?php $this->libs->buttonSubmit($tabel); ?>
                                </form>
                            </div>
                         </div>
                    </div>
                    <?php foreach ($hasil as $data) : ?>
                        <div class="panel panel-default">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $data['produk_id'] ?>">
                                <div class="panel-heading accordion-head">
                                    <h4 class="panel-title" style="color: white">
                                        <?php echo $data['nama_produk']; ?>
                                    </h4>
                                </div>
                            </a>
                            <div id="collapse<?php echo $data['produk_id'] ?>" class="panel-collapse panel-ic collapse">
                                <div class="panel-body admin-panel-content">
                                    <p><?php echo "Qty: ".$data['jumlah']." ".$data['satuan'] ?></p>
                                    <p><?php echo "Harga (per produk): ".rp($data['harga']) ?></p>
                                    <p><?php echo "Total: ".rp($data['subtotal']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        <?php $this->libs->rowClose(); ?>
    </div>
</div>