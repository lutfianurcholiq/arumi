<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
            <?php
                $thead = ["no", "pesanan", "pelanggan", "total", "tanggal pesanan", "status", "aksi"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 0; foreach ($work as $data) : $no++; ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['kode_pesanan'] . "-" . jumlahAngka($data['id_pesanan']); ?></td>
                        <td><?php echo $data['nama_pelanggan']; ?></td>
                        <td><?php echo rp($data['total']); ?></td>
                        <td><?php echo shortdate_indo($data['tanggal']); ?></td>
                        <?php if ($data['status'] == 'Dikirim ke Komunitas') : ?>
                            <td><?php echo $data['status']; ?></td>
                            <td>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#InformationproModalftblack<?php echo $data['id_pesanan'] ?>">
                                    <i class="fas fa-hand-holding-heart" aria-hidden="true"></i>
                                </button>
                            </td>
                        <?php elseif ($data['status'] == 'Diproduksi') : ?>
                            <td><?php echo $data['status']; ?></td>
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