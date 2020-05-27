<?php 
    echo $this->session->flashdata('sukses');
    $this->load->view('transaksi/listPeralatan/form-peralatan');
    $this->libs->rowOpen('', '');
?>
    <?php if ($hasil == NULL) : ?>
        <div class="add-product1">
            <a href="#modal-alert" class='Primary mg-b-10' data-toggle="modal"><i class="fas fa-exclamation-circle"></i> Simpan</a>
    <?php else : ?>
        <div class="add-product">
            <a href="#modal-selesai" class='Primary mg-b-10' data-toggle="modal"><i class="fa fa-check"></i> Simpan</a>
    <?php endif; ?>    
        </div> <br><br>
    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                <?php
                    $thead = ["no", "peralatan", "nominal", "aksi"]; 
                    $this->libs->thead($thead);
                ?>
                <tbody>
                <?php $no = 0; $total = 0; foreach ($hasil as $data) : $no++; ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_peralatan']; ?></td>
                        <td><?php echo rp($data['nominal']); ?></td>
                        <td>
                            <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?= site_url('listPeralatan/update/'.$this->uri->segment(3).'/'.$data['no']); ?>'" >
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?= site_url('listPeralatan/delete/'.$this->uri->segment(3).'/'.$data['no']); ?>'">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                <?php $total += $data['nominal']; endforeach; ?>
                    <tr>
                        <td colspan="2"><b>Total</b></td>
                        <td><?php echo "<b>".rp($total)."</b>" ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>