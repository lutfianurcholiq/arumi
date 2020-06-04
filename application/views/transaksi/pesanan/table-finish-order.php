<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "pesanan", "pelanggan", "total", "tanggal pesanan", "status"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; foreach ($finish as $data) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['kode_pesanan'] . "-" . jumlahAngka($data['id_pesanan']) ?></td>
                        <td><?php echo $data['nama_pelanggan'] ?></td>
                        <td style="text-align: right;"><?php echo rp($data['total']) ?></td>
                        <td><?php echo shortdate_indo($data['tanggal']) ?></td>
                        <td>
                            <?php
                                if ($data['status'] == 'Sudah Jadi') {
                                    echo "Siap Antar";
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>