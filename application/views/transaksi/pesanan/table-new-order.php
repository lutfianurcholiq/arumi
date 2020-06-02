<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "pesanan", "pelanggan", "total", "tanggal pesanan", "status", "aksi"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; foreach ($new as $data) :  ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++ ?></td>
                        <td><?php echo $data['kode_pesanan'] . "-" . jumlahAngka($data['id_pesanan']) ?></td>
                        <td><?php echo $data['nama_pelanggan'] ?></td>
                        <td style="text-align: right;"><?php echo rp($data['total']) ?></td>
                        <td><?php echo shortdate_indo($data['tanggal']) ?></td>
                        <td><?php echo $data['status'] ?></td>
                        <td style="text-align: center;">
                            <?php if ($this->session->userdata('level') == "Produksi") : ?>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#InformationproModalftblack<?php echo $data['id_pesanan'] ?>">
                                    <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                                </button>
                            <?php elseif ($this->session->userdata('level') == "Karyawan") : ?>
                                <button type="button" class="btn btn-sm btn-info" onclick="window.location.href='<?= site_url('pesanan/info/'.$data['id_pesanan']) ?>'">
                                    <i class="fa fa-info" aria-hidden="true"></i>
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>