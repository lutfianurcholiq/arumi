<?php $this->libs->rowOpen($judul, $menu); ?>
    <br>
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
            <table class="table table-bordered table-hover dataTables">
                <?php
                    $thead = ["no", "produk", "aksi"]; 
                    $this->libs->thead($thead);
                ?>
                <tbody>
                    <?php foreach ($hasil as $data) : ?>
                        <tr>
                            <td><?php echo $data['id_produk']; ?></td>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('bom/create/'.$data['id_produk']); ?>'">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                &nbsp;&nbsp;
                                <button type="button" class="btn btn-info" onclick="window.location.href='<?= site_url('bom/info/'.$data['id_produk']); ?>'">
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