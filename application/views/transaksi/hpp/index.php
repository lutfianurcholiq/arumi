<?php 
    echo $this->session->flashdata('sukses');
    $this->libs->rowOpen($judul, $menu); 
?>
    <br>
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
            <table class="table table-bordered table-hover dataTables">
                <?php
                    $thead = ["no", "pesanan", "pelanggan", "total", "tanggal pesanan", "status", "aksi"];
                    $this->libs->thead($thead);
                ?>
                <tbody>
                    <?php $no = 1; foreach ($hasil as $data) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['kode_pesanan'] . "-" . jumlahAngka($data['id_pesanan']) ?></td>
                            <td><?php echo $data['nama_pelanggan'] ?></td>
                            <td style="text-align: right;"><?php echo rp($data['total']) ?></td>
                            <td><?php echo shortdate_indo($data['tanggal']) ?></td>
                            <td><?php echo $data['status'] ?></td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('hpp/create/'.$data['id_pesanan']) ?>'">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-info" onclick="window.location.href='<?= site_url('hpp/create/'.$data['id_pesanan']) ?>'">
                                    <i class="fa fa-info" aria-hidden="true"></i>
                                </button>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>