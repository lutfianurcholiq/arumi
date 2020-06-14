<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "karyawan", "gaji", "jumlah hari masuk", "subtotal"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <!-- <?php foreach ($hasil as $data) : ?>
                    <tr>
                        <td><?php echo $data['id_operasional']; ?></td>
                        <td><?php echo $data['kode_operasional'] . "-" . jumlahAngka($data['id_operasional']); ?></td>
                        <td style="text-align: right;"><?php echo rp($data['total']); ?></td>
                        <td><?php echo shortdate_indo($data['tanggal']); ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                    </tr>
                <?php endforeach; ?> -->
            </tbody>
        </table>
    </div>
</div>