<?php
    echo $this->session->flashdata('sukses');
    $this->libs->rowOpen($judul, $menu);
?>

<div class="add-product">
    <?php $this->libs->buttonAdd($form); ?>
</div>
<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
            <?php
                $thead = ["no", "kode", "nama", "harga", "aksi"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php foreach ($hasil as $data) : ?>
                    <tr>
                        <td><?php echo $data['id_peralatan']; ?></td>
                        <td><?php echo $data['kode_peralatan'] . "-" . jumlahAngka($data['id_peralatan']); ?></td>
                        <td><?php echo $data['nama_peralatan']; ?></td>
                        <td><?php echo rp($data['harga']); ?></td>
                        <td>
                            <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('peralatan/update/' . $data['id_peralatan']); ?>'">
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