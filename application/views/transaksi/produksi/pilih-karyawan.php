<?php 
    $this->load->view('transaksi/produksi/form-btkl');
    $this->libs->rowOpen('', ''); 
    if ($hasil != NULL) :
?>
    <div class="add-product">
        <a href="#InformationproModalftblack" class='Primary mg-b-10' data-toggle="modal"><i class="fa fa-hand-paper-o"></i> Klik</a>
    </div> <br><br>
    <?php endif; ?>
    
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
            <table class="table table-bordered table-hover dataTables">
                <?php
                    $thead = ["no", "karyawan", "jumlah hari masuk", "gaji", 'total gaji', 'aksi']; 
                    $this->libs->thead($thead);
                ?>
                <tbody>
                <?php $no = 1; $total = 0; foreach ($hasil as $data) :  ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['nama_karyawan'] ?></td>
                        <td><?php echo $data['hari_masuk']." hari" ?></td>
                        <td style="text-align: right;"><?php echo rp($data['gaji']) ?></td>
                        <td style="text-align: right;"><?php echo rp($data['subgaji']) ?></td>
                        <td style="text-align: center;">
                            <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?= site_url('produksi/deleteBtkl/'.$this->uri->segment(3).'/'.$data['no']); ?>'">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                <?php  $total += $data['subgaji']; endforeach; ?>
                </tbody>
                <tr>
                    <td style="text-align: center;" colspan="4"><b>Total Seluruh Gaji</b></td>
                    <td style="text-align: right;"><b><?php echo rp($total) ?></b></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="6"><b><?php echo "30% dari Total seluruh gaji digunakan untuk Biaya Overhead Pabrik." ?></b></td>
                </tr>
            </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>