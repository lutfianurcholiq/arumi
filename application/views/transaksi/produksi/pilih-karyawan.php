<?php 
    $this->load->view('transaksi/produksi/form-btkl');
    $this->libs->rowOpen('', ''); 
    if ($hasil != NULL) :
?>
    <div class="add-product">
        <a href="#InformationproModalftblack" class='Primary mg-b-10' data-toggle="modal"><i class="fa fa-hand-paper-o"></i> Klik</a>
    </div><br><br>
    <?php endif; ?>
    
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
            <?php
                $thead = ["no", "karyawan", "jumlah hari masuk", "gaji", 'total gaji', 'aksi']; 
                $this->libs->thead($thead);
            ?>
            <tbody>
            <?php $no = 0; foreach ($hasil as $data) : $no++; ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nama_karyawan']; ?></td>
                    <td><?php echo $data['hari_masuk']." hari"; ?></td>
                    <td><?php echo rp($data['gaji']); ?></td>
                    <td><?php echo rp($data['subgaji']); ?></td>
                    <td>
                        <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?= site_url('produksi/updateBtkl/'.$data['no']); ?>'" >
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?= site_url('produksi/deleteBtkl/'.$this->uri->segment(3).'/'.$data['no']); ?>'">
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