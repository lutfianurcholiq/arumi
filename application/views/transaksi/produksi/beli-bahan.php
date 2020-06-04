<?php 
    $this->libs->rowOpen($judul, ucwords('tahap pertama')); 
    if ($produksi['status'] == 'Belum Dibeli') :
?>
    <div class="add-product">
		<a href="#InformationproModalftblack" class='Primary mg-b-10' data-toggle="modal"><i class='fa fa-hand-paper-o' aria-hidden='true'></i> Klik</a>
    </div>
    <?php elseif($produksi['status'] == 'Sudah Dibeli') : ?>
    <div class="add-product">
		<a href="<?= site_url('produksi/btkl/'.$this->uri->segment(3)); ?>" class='Primary mg-b-10' data-toggle="modal"><i class='fa fa-users' aria-hidden='true'></i> BTKL</a>
    </div>
    <?php
        endif;
        $this->db->where('id_produksi', $this->uri->segment(3));
        $id_pesanan = $this->db->get('produksi')->row()->pesanan_id;
        
        foreach ($produk as $p) :
    ?> 
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
            <br>
            <?php echo "<h5 style='color: cornflowerblue'>Bahan ".$p['nama_produk']." ".$p['rasa']."</h5>" ?>
            <table class="table table-bordered table-hover dataTables">
                <?php
                    $thead = ["no", "bahan", "komposisi (BOM)", "pesanan", "beli", "harga", "subtotal"]; 
                    $this->libs->thead($thead);

                    $id_produk = $p['produk_id'];
                    $sql = "SELECT 
                          DISTINCT c.nama_bahan, b.jumlah, e.jumlah qty, b.harga, e.jumlah * b.jumlah beli, (e.jumlah * b.jumlah) * b.harga subtotal,
                                   c.satuan, a.satuan satuan_produk
                            FROM produk a 
                            JOIN detail_bb b ON a.id_produk = b.produk_id
                            JOIN bahan c ON b.bahan_id = c.id_bahan
                            JOIN bom d ON d.produk_id = a.id_produk
                            JOIN detail_pesanan e ON d.pesanan_id = e.pesanan_id
                           WHERE e.pesanan_id = '$id_pesanan' 
                             AND id_produk = '$id_produk' 
                             AND a.id_produk = e.produk_id";
                    $bahan = $this->db->query($sql)->result_array();
                ?>
                <tbody>
                    <?php 
                        $no = 0; $total = 0;
                        foreach ($bahan as $b) : 
                        $no++;
                        $total += $b['subtotal'];
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $b['nama_bahan'] ?></td>
                        <td><?php echo $b['jumlah']." ".$b['satuan'] ?></td>
                        <td><?php echo $b['qty']." ".$b['satuan_produk'] ?></td>
                        <td><?php echo $b['beli']." ".$b['satuan'] ?></td>
                        <td style="text-align: right;"><?php echo rp($b['harga']) ?></td>
                        <td style="text-align: right;"><?php echo rp($b['subtotal']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <td style="text-align: center;" colspan="6"><b><?php echo "Total ".$p['nama_produk'] ?></b></td>
                    <td style="text-align: right;"><b><?php echo rp($total) ?></b></td>
                </tr>
            </table>
        </div>
    </div>
<?php 
    endforeach;
    $this->libs->rowClose(); 
?>