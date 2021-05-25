<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
               $thead = ["no", "nama karyawan", "jumlah hari", "gaji","SubGaji"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; foreach ($btk as $data) : ; 
                    $total = 0;
                    $total += $data['tenaga_kerja'];?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++ ?></td>
                        <td><?php echo $data['nama_karyawan'] ?></td>
                        <td><?php echo $data['hari_masuk'] ?></td>
                        <td style="text-align: right;"><?php echo rp($data['gaji']) ?></td>
                        <td style="text-align: right;"><?php echo rp($data['subgaji']) ?></td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tr>
                <td colspan="4" style="text-align: center;"><b>Total</b></td>
                <td style="text-align: right;"><b><?php echo rp($total);?></b></td>
            </tr>
        </table>
    </div>
</div>