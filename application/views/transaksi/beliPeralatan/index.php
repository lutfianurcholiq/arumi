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
                    $thead = ["no", "kode", "total", "tanggal", "keterangan", "status", "aksi"]; 
                    $this->libs->thead($thead);
                ?>
                <tbody>
                    <?php $no = 1; foreach ($hasil as $data) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['kode']."-".jumlahAngka($data['id']) ?></td>
                            <td style="text-align: right;"><?php echo rp($data['total']) ?></td>
                            <td><?php echo shortdate_indo($data['tanggal']) ?></td>
                            <td><?php echo $data['keterangan'] ?></td>
                            <td><?php echo $data['status'] ?></td>
                            <td style="text-align: center;">
                                <?php if ($data['status'] == 'Baru Dibuat') : ?>
                                    <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('listPeralatan/create/'.$data['id']) ?>'">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                <?php elseif ($data['status'] == 'Sudah Dibayar') : ?>
                                    <button type="button" class="btn btn-info" onclick="window.location.href='<?= site_url('beliPeralatan/info/'.$data['id']) ?>'">
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
<?php $this->libs->rowClose(); ?>