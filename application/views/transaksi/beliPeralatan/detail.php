<?php 
    $info = $detail['kode']."-".jumlahAngka($detail['id']);
    $this->libs->rowOpen($info, $judul); 
?>

    <div class="add-product">
        <a href="<?php echo $tabel; ?>" class="Primary mg-b-10"><i class="fas fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;Kembali</a>
    </div> <br>
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "biaya operasional", "tanggal", "nominal"]; 
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 0; $total = 0; foreach ($hasil as $data) : $no++ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_peralatan']; ?></td>
                        <td><?php echo shortdate_indo($data['tanggal']); ?></td>
                        <td style="text-align: right;"><?php echo rp($data['nominal']); ?></td>
                    </tr>
                <?php
                    $total += $data['nominal'];
                    endforeach; 
                ?>
            </tbody>
                <tr>
                    <td style="text-align: center;" colspan="3"><b>Total</b></td>
                    <td style="text-align: right;"><b><?php echo rp($total) ?></b></td>
                </tr>
        </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>