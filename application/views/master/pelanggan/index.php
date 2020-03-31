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
        <thead>
          <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>WhatsApp</th>
            <th>Alamat</th>
            <th>Pilihan</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($hasil as $data) : ?>
            <tr>
              <td><?php echo $data['id_pelanggan']; ?></td>
              <td><?php echo $data['kode_pelanggan'] . "-" . jumlahAngka($data['id_pelanggan']); ?></td>
              <td><?php echo $data['nama_pelanggan']; ?></td>
              <td><?php echo noHp($data['no_wa']); ?></td>
              <td><?php echo $data['alamat']; ?></td>
              <td>
                <button type="button" class="btn btn-default" onclick="window.location.href='<?= site_url('pelanggan/update/'.$data['id_pelanggan']); ?>'">
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