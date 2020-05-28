<?php $this->libs->rowOpen($judul, $menu); ?>

    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                <?php
                    $thead = ["no", "produk", "aksi"]; 
                    $this->libs->thead($thead);
                ?>
                <tbody>
                    <?php foreach ($hasil as $data) : ?>
                        <tr>
                            <td><?php echo $data['id_produk']; ?></td>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td>
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