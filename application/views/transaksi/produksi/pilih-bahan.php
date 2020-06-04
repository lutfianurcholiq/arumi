<?php 
    $this->load->view('transaksi/produksi/form-bp');
    $this->libs->rowOpen('', ''); 
?>
    <div class="add-product">
        <a href="#InformationproModalftblack" class='Primary mg-b-10' data-toggle="modal"><i class="fa fa-hand-paper-o"></i> Klik</a>
    </div>
    <br> <br>
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "bahan", "kebutuhan", "harga", 'subtotal', 'aksi']; 
                $this->libs->thead($thead);
            ?>
            <tbody>
            <?php $no = 0; foreach ($hasil as $data) : $no++; ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nama_bahan']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                    <td style="text-align: right;"><?php echo rp($data['harga_bahan']); ?></td>
                    <td style="text-align: right;"><?php echo rp($data['subtotal']); ?></td>
                    <td style="text-align: center;">
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?= site_url('produksi/deleteBp/'.$this->uri->segment(3).'/'.$data['no']); ?>'">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>