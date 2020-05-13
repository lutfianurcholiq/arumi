<?php 
  echo $this->session->flashdata('sukses');
  $this->load->view('bom/form-bahan');
  $this->libs->rowOpen('', ''); 
?>
  <div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
      <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
        <?php
          $thead = ["no", "bahan", "jumlah", "aksi"]; 
          $this->libs->thead($thead);
        ?>
        <tbody>
        <?php $no = 0; foreach ($hasil as $data) : $no++; ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $data['nama_bahan']; ?></td>
              <td><?php echo $data['jumlah']." ".$data['satuan_bahan']; ?></td>
              <td>
                <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?= site_url('bom/update/'.$this->uri->segment(3).'/'.$data['no']); ?>'" >
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
                &nbsp;
                <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='<?= site_url('bom/delete/'.$this->uri->segment(3).'/'.$data['no']); ?>'">
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