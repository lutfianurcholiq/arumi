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
                $thead = ["no", "gambar", "kode", "nama", "satuan", "harga", "aksi"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; foreach ($hasil as $data) : ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++ ?></td>
                        <td style="text-align: center;"><img src="<?php echo base_url($data['foto']) ?>" alt=""></td>
                        <td><?php echo $data['kode_produk'] . "-" . jumlahAngka($data['id_produk']) ?></td>
                        <td><?php echo $data['nama_produk'] ?></td>
                        <td><?php echo $data['satuan'] ?></td>
                        <td style="text-align: right;"><?php echo rp($data['harga']) ?></td>
                        <td style="text-align: center;">
                            <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('produk/update/' . $data['id_produk']) ?>'">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                            &nbsp; &nbsp;
                            <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('addRasa/create/' . $data['id_produk']) ?>'">
                                <i class="fas fa-mortar-pestle" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->libs->rowClose(); ?>