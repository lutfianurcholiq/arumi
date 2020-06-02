<?php 
    echo $this->session->flashdata('sukses');
    $this->libs->rowOpen($judul, $menu); 
?>
    <div class="add-product">
        <?php $this->libs->buttonAdd($form); ?>
    </div> <br>
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
            <table class="table table-bordered table-hover dataTables">
                <?php
                    $thead = ["no", "kode", "nama", "satuan", "harga", "keterangan", "aksi"]; 
                    $this->libs->thead($thead);
                ?>
                <tbody>
                    <?php $no = 1; foreach ($hasil as $data) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['kode_bahan'] . "-" . jumlahAngka($data['id_bahan']) ?></td>
                            <td><?php echo $data['nama_bahan'] ?></td>
                            <td><?php echo $data['satuan'] ?></td>
                            <td style="text-align: right;"><?php echo rp($data['harga']) ?></td>
                            <td><?php echo $data['keterangan'] ?></td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('bahan/update/'.$data['id_bahan']) ?>'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#InformationproModalftblack<?= $data['id_bahan'] ?>">
                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>