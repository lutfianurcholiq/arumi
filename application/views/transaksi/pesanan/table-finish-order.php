<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "pesanan", "pelanggan", "total", "tanggal pesanan", "status", "aksi"];
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
                                if ($data['komunitas_id'] == '0') {
                                    echo "Dikerjakan sendiri";
                                }else{
                                    echo "Dikerjakan Komunitas";
                                }
                            ?>
                        </td>
                        <?php if ($data['komunitas_id'] == '0') : ?>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-info" onclick="window.location.href='<?= site_url('pesanan/info/'.$data['id_pesanan']) ?>'">
                                    <i class="fas fa-info" aria-hidden="true"></i>
                                </button>
                            </td>
                        <?php else : ?>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-info" onclick="window.location.href='<?= site_url('pesanan/infoKomunitas/'.$data['id_pesanan']) ?>'">
                                    <i class="fas fa-info" aria-hidden="true"></i>
                                </button>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>