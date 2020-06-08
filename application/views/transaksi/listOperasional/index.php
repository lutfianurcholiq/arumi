<?php 
    echo $this->session->flashdata('sukses');
    $this->load->view('transaksi/listOperasional/form-operasional');
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
            <table class="table table-bordered table-hover dataTables">
                <?php
                    $thead = ["no", "beban", "nominal", "aksi"]; 
                    $this->libs->thead($thead);
                ?>
                <tbody>
                    <?php $no = 1; $total = 0; foreach ($hasil as $data) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['nama_coa'] ?></td>
                            <td style="text-align: right;"><?php echo rp($data['nominal']) ?></td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?= site_url('listOperasional/update/'.$this->uri->segment(3).'/'.$data['no']) ?>'" >
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?= site_url('listOperasional/delete/'.$this->uri->segment(3).'/'.$data['no']) ?>'">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    <?php $total += $data['nominal']; endforeach; ?>
                </tbody>
                <tr>
                    <td style="text-align: center;" colspan="2"><b>Total</b></td>
                    <td style="text-align: right;"><?php echo "<b>".rp($total)."</b>" ?></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>