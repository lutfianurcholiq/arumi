<!-- <div class="edu-accordion-area mg-b-15">    
    <div class="container-fluid"> -->
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
                                    Jadwalkan !
                                </h4>
                            </div>
                        </a>
                        <div id="jadwalkan" class="panel-collapse panel-ic collapse in">
                            <div class="panel-body admin-panel-content" style="background-color: ghostwhite;">
                                <form action="<?php echo $url ?>" method="POST">
                                    <?php $this->libs->inputOpen('mulai produksi', 'required'); ?>
                                        <input class="form-control" id="calendar" type="text" name="mulai_produksi" data-provide="datepicker" placeholder="Pilih tanggal produksi">
                                        <?php echo form_error('mulai_produksi'); ?>
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
                                        <?php echo $data['nama_produk']." ".$data['rasa'] ?>
                                    </h4>
                                </div>
                            </a>
                            <div id="collapse<?php echo $data['produk_id'] ?>" class="panel-collapse panel-ic collapse">
                                <div class="panel-body admin-panel-content" style="background-color: ghostwhite;">
                                    <p><?php echo "Qty: ".$data['jumlah']." ".$data['satuan'] ?></p>
                                    <p><?php echo "Harga (per produk): ".rp($data['harga']) ?></p>
                                    <p><?php echo "Total: ".rp($data['subtotal']) ?></p>
                                    <p>Bill of Material: </p>
                                    <table class="table table-bordered table-hover" style="background-color: white;">
                                        <?php
                                            $thead = ["no", "bahan", "jumlah"]; 
                                            $this->libs->thead($thead);
                                            $produk_id = $data['produk_id'];
                                            $this->db->select('*');
                                            $this->db->from('bahan a');
                                            $this->db->join('detail_bb b', 'a.id_bahan = b.bahan_id');
                                            $this->db->join('produk c', 'b.produk_id = c.id_produk');
                                            $this->db->where('c.id_produk', $produk_id);
                                            $bom = $this->db->get()->result_array();
                                        ?>
                                        <tbody>
                                            <?php $no = 1; foreach ($bom as $b) : ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no++ ?></td>
                                                    <td><?php echo $b['nama_bahan'] ?></td>
                                                    <td><?php echo $b['jumlah']." ".$b['satuan']  ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        <?php $this->libs->rowClose(); ?>
    <!-- </div>
</div> -->