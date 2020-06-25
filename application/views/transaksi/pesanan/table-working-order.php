<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "pesanan", "pelanggan", "total", "tanggal pesanan", "status", "aksi"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; foreach ($work as $data) :  ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['kode_pesanan'] . "-" . jumlahAngka($data['id_pesanan']) ?></td>
                        <td><?php echo $data['nama_pelanggan'] ?></td>
                        <td style="text-align: right;"><?php echo rp($data['total']) ?></td>
                        <td><?php echo shortdate_indo($data['tanggal']) ?></td>
                        <td><?php echo $data['status'] ?></td>
                        <?php if ($data['status'] == 'Dikirim ke Komunitas') : ?>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#InformationproModalftblack<?php echo $data['id_pesanan'] ?>">
                                    <i class="fas fa-hand-holding-heart" aria-hidden="true"></i>
                                </button>
                                &nbsp; &nbsp;
                                <button type="button" class="btn btn-info" onclick="window.location.href='<?= site_url('pesanan/infoKomunitas/'.$data['id_pesanan']) ?>'">
                                    <i class="fas fa-info" aria-hidden="true"></i>
                                </button>
                            </td>
                        <?php elseif ($data['status'] == 'Diproduksi') : ?>
                            <td>
                                <a href="<?php echo site_url('produksi'); ?>">
                                    Lihat menu Jadwal Produksi
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>