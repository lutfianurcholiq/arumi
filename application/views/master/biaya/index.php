<?php 
  echo $this->session->flashdata('sukses');
  $this->libs->rowOpen($judul, $menu); 
?>

  <div class="add-product">
    <?php $this->libs->buttonAdd($form); ?>
  </div>
  <div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
      <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
        <?php
          $thead = ["no", "kode", "nama", "keterangan", "aksi"]; 
          $this->libs->thead($thead);
        ?>
        <tbody>
          <?php $no = 1; foreach ($hasil as $data) : ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['kode_coa']. " ". $data['nama_coa']; ?></td>
              <td><?php echo $data['nama_biaya']; ?></td>
              <td><?php echo $data['keterangan']; ?></td>
              <td>
                <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('biaya/update/'.$data['id_biaya']); ?>'">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
								</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $this->libs->rowClose(); ?>