<?php 
    $info = $detail['kode_operasional']."-".jumlahAngka($detail['id_operasional']);
    $this->libs->rowOpen($info, $judul); 
?>

    <div class="add-product">
        <a href="<?php echo $tabel; ?>" class="Primary mg-b-10"><i class="fas fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;Kembali</a>
    </div>
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
            <?php
                $thead = ["no", "biaya operasional", "nominal", "tanggal"]; 
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 0; $total = 0; foreach ($hasil as $data) : $no++ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_coa']; ?></td>
                        <td><?php echo rp($data['nominal']); ?></td>
                        <td><?php echo shortdate_indo($data['tanggal']); ?></td>
                    </tr>
                <?php
                    $total += $data['nominal'];
                    endforeach; 
                ?>
                <tr>
                    <td colspan="2"><b>Total</b></td>
                    <td><b><?php echo rp($total) ?></b></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>