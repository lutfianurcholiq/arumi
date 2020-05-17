<?php 
    $this->load->view('transaksi/produksi/form-bp');
    $this->libs->rowOpen('', ''); 
?>
    <div class="add-product">
        <a href="#InformationproModalftblack" class='Primary mg-b-10' data-toggle="modal"><i class="fa fa-hand-paper-o"></i> Klik</a>
    </div><br>
    
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
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
                    <td><?php echo rp($data['harga_bahan']); ?></td>
                    <td><?php echo rp($data['subtotal']); ?></td>
                    <td>
                        <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?= site_url('produksi/updateBp/'.$data['no']); ?>'" >
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        &nbsp;
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