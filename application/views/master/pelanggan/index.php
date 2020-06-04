<?php $this->libs->rowOpen($judul, $menu) ?>
<br>
<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "id", "nama", "whatsapp", "alamat"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; foreach ($hasil as $data) : ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++ ?></td>
                        <td><?php echo $data['kode_pelanggan'] . "-" . jumlahAngka($data['id_pelanggan']) ?></td>
                        <td><?php echo $data['nama_pelanggan'] ?></td>
                        <td><?php echo noHp($data['no_wa']) ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->libs->rowClose(); ?>