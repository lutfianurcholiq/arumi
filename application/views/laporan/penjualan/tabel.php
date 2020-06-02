<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "tanggal", "kode pesanan", "kode produk", "nama produk", "harga", "qty", "subtotal"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; $total = 0; foreach ($hasil as $data) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo shortdate_indo($data['tanggal']) ?></td>
                        <td><?php echo $data['kode_pesanan']."-".jumlahAngka($data['id_pesanan']) ?></td>
                        <td><?php echo $data['kode_produk']."-".jumlahAngka($data['id_produk']) ?></td>
                        <td><?php echo $data['nama_produk'] ?></td>
                        <td style="text-align: right;"><?php echo rp($data['harga']) ?></td>
                        <td><?php echo $data['jumlah'] ?></td>
                        <td style="text-align: right;"><?php echo rp($data['subtotal']) ?></td>
                    </tr>
                <?php $total += $data['subtotal']; endforeach; ?>
            </tbody>
            <tr>
                <td style="text-align: center;" colspan="7"><b>Total</b></td>
                <td style="text-align: right;"><b><?php echo rp($total) ?></b></td>
            </tr>
        </table>
    </div>
</div>