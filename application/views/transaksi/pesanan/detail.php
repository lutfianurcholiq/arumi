<?php 
    $text = $info['kode_pesanan']."-".jumlahAngka($info['id_pesanan']);
    $this->libs->rowOpen($text, $judul); 
?>

    <div class="add-product">
        <a href="<?php echo $tabel; ?>" class="Primary mg-b-10"><i class="fas fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;Kembali</a>
    </div> <br>
    <div class="product-status-wrap">
        <div class="details-blog-dt blog-sig-details-dt courses-info mobile-sm-d-n">
            <span><a href="#"><i class="fa fa-user"></i> <b>Pelanggan:</b> <?php echo $info['nama_pelanggan'] ?></a></span>
        </div>
    </div>
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                 $thead = ["no", "produk", "harga", "jumlah", "satuan",  "subtotal"]; 
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; $total = 0; foreach ($hasil as $data) : ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++ ?></td>
                        <td><?php echo $data['nama_produk']." ".$data['rasa'] ?></td>
                        <td style="text-align: right;"><?php echo rp($data['harga']) ?></td>
                        <td style="text-align: right;"><?php echo $data['jumlah'];?></td>
                        <td style="text-align: center;"><?php echo $data['satuan'];?></td>
                        <td style="text-align: right;"><?php echo rp($data['subtotal']) ?></td>
                    </tr>
                <?php
                    $total += $data['subtotal'];
                    endforeach; 
                ?>
            </tbody>
                <tr>
                    <td colspan="5" style="text-align: center;"><b>Total</b></td>
                    <td style="text-align: right;"><b><?php echo rp($total) ?></b></td>
                </tr>
        </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>