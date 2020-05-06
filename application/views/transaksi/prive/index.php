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
                    $thead = ["no", "nominal", "tanggal", "keterangan"]; 
                    $this->libs->thead($thead);
                ?>
                <tbody>
                    <?php foreach ($hasil as $data) : ?>
                        <tr>
                            <td><?php echo $data['id_prive']; ?></td>
                            <td><?php echo rp($data['nominal']); ?></td>
                            <td><?php echo shortdate_indo($data['tanggal']); ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>