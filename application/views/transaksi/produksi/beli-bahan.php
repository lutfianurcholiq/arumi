<?php $this->libs->rowOpen($judul, $menu); ?>
    <div class="add-product">
		<a href="#InformationproModalftblack" class='Primary mg-b-10' data-toggle="modal"><i class='fa fa-hand-paper-o' aria-hidden='true'></i> Klik</a>
    </div>
    <?php
        $id_produksi = $this->uri->segment(3);
        $this->db->select('nama_produk, c.bahan_id, c.produk_id');
        $this->db->from('produksi a');
        $this->db->join('pesanan b', 'a.pesanan_id = b.id_pesanan');
        $this->db->join('bom c', 'b.id_pesanan = c.pesanan_id');
        $this->db->join('produk d', 'c.produk_id = d.id_produk');
        $this->db->where('id_produksi', $id_produksi);
        $this->db->group_by('c.produk_id');
        $produk = $this->db->get()->result_array();

        $this->db->where('id_produksi', $id_produksi);
        $id_pesanan = $this->db->get('produksi')->row()->pesanan_id;
        
        foreach ($produk as $p) :
    ?> 
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
            <br>
            <?php echo "<h5 style='color: cornflowerblue'>Bahan ".$p['nama_produk']."</h5>" ?>
            <table class="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
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
                    $bahan = $this->db->query($sql)->result_array()
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
                        <td><?php echo rp($b['harga']) ?></td>
                        <td><?php echo rp($b['subtotal']) ?></td>
                    </tr>
                    <?php 
                        endforeach; 
                    ?>
                    <tr>
                        <td colspan="6"><b><?php echo "Total ".$p['nama_produk'] ?></b></td>
                        <td><b><?php echo rp($total) ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php 
    endforeach;
    $this->libs->rowClose(); 
?>