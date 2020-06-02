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
                $thead = ["no", "kode", "nama", "whatsapp", "gaji", "alamat", "aksi"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; foreach ($hasil as $data) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['kode_karyawan'] . "-" . jumlahAngka($data['id_karyawan']) ?></td>
                        <td><?php echo $data['nama_karyawan'] ?></td>
                        <td><?php echo noHp($data['no_wa']) ?></td>
                        <td><?php echo rp($data['gaji']) ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td style="text-align: center;">
                            <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('karyawan/update/' . $data['id_karyawan']) ?>'">
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