<?php $this->libs->rowOpen($produk['nama_produk'], $judul); ?>
<div class="add-product">
    <a href="<?php echo $tabel; ?>" class="Primary mg-b-10"><i class="fas fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;Kembali</a>
</div>
<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
            <?php
                $thead = ["no", "bahan", "jumlah"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 0; foreach ($hasil as $data) : $no++; ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_bahan']; ?></td>
                        <td><?php echo $data['jumlah'] . " " . $data['satuan_bahan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->libs->rowClose(); ?>