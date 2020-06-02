<?php
    echo $this->session->flashdata('sukses');
    $this->libs->rowOpen($judul, $menu);
?> <br>
<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "kode produksi", "kode pesanan", "pelanggan", "mulai", "selesai", "aksi"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php foreach ($hasil as $data) : ?>
                    <tr>
                        <td><?php echo $data['id_produksi'] ?></td>
                        <td><?php echo $data['kode_produksi'] . "-" . jumlahAngka($data['id_produksi']) ?></td>
                        <td><?php echo $data['kode_pesanan'] . "-" . jumlahAngka($data['id_pesanan']) ?></td>
                        <td><?php echo $data['kode_pelanggan'] . "-" . jumlahAngka($data['id_pelanggan']) . " " . $data['nama_pelanggan'] ?></td>
                        <td><?php echo shortdate_indo($data['mulai']) ?></td>
                        <td><?php echo shortdate_indo($data['selesai']) ?></td>
                        <td>
                            <?php if ($data['status'] == 'Belum Dibeli') : ?>
                                <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('produksi/bbb/' . $data['id_produksi']) ?>'">
                                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                                </button>
                            <?php elseif ($data['status'] == 'Sudah Dibeli') : ?>
                                <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('produksi/btkl/' . $data['id_produksi']) ?>'">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </button>
                            <?php elseif ($data['status'] == 'Sudah Milih Karyawan') : ?>
                                <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('produksi/bp/' . $data['id_produksi']) ?>'">
                                    <i class="fa fa-cubes" aria-hidden="true"></i>
                                </button>
                            <?php elseif ($data['status'] == 'Sudah Jadi') : ?>
                                <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('produksi/info/' . $data['id_produksi']) ?>'">
                                    <i class="fa fa-receipt" aria-hidden="true"></i>
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->libs->rowClose(); ?>