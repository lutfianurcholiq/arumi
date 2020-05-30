<?php 
    $info = $detail['kode_pesanan']."-".jumlahAngka($detail['id_pesanan']);
    $this->libs->rowOpen($info, $judul); 
?>

    <div class="add-product">
        <a href="<?php echo $tabel; ?>" class="Primary mg-b-10"><i class="fas fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;Kembali</a>
    </div>
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
            <?php
                $thead = ["no", "produk", "harga", "jumlah", "subtotal"]; 
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 0; $total = 0; foreach ($hasil as $data) : $no++ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_produk']; ?></td>
                        <td><?php echo rp($data['harga']); ?></td>
                        <td><?php echo $data['jumlah']; ?></td>
                        <td><?php echo rp($data['subtotal']); ?></td>
                    </tr>
                <?php
                    $total += $data['subtotal'];
                    endforeach; 
                ?>
                <tr>
                    <td colspan="4"><b>Total</b></td>
                    <td><b><?php echo rp($total) ?></b></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>