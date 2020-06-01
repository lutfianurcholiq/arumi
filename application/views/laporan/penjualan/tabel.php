<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
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
                        <td><?php echo rp($data['harga']) ?></td>
                        <td><?php echo $data['jumlah'] ?></td>
                        <td><?php echo rp($data['subtotal']) ?></td>
                    </tr>
                <?php $total += $data['subtotal']; endforeach; ?>
                <tr>
                    <td colspan="7"><b>Total</b></td>
                    <td><b><?php echo rp($total) ?></b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>