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
                $thead = ["no", "id", "nama", "whatsapp", "aksi"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; foreach ($hasil as $data) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['kode_komunitas'] . "-" . jumlahAngka($data['id_komunitas']) ?></td>
                        <td><?php echo $data['nama_komunitas'] ?></td>
                        <td><?php echo noHp($data['no_wa']) ?></td>
                        <!-- <td><?php echo $data['alamat'] ?></td> -->
                        <td style="text-align: center;">
                            <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('komunitas/update/' . $data['id_komunitas']) ?>'">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->libs->rowClose(); ?>