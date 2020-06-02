<?php
    echo $this->session->flashdata('sukses');
    $this->load->view('master/addRasa/form-rasa');
    $this->libs->rowOpen('', '');
?>
<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "rasa", "aksi"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 0; foreach ($hasil as $data) : $no++; ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['rasa']; ?></td>
                        <td style="text-align: center;">
                            <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?= site_url('addRasa/delete/' . $this->uri->segment(3) . '/' . $data['no']) ?>'">
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