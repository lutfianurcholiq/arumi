<?php 
  $this->koran->tittleMenu($judul, $menu, $icon); 
  echo $this->session->flashdata('pesan');
  $this->koran->rowOpen(12); 
?>
<div class="tile-body text-primary">
  <table class="table table-hover table-bordered" id="sampleTable">
    <thead>
      <tr>
        <th>Produk</th>
        <th style="text-align: center;">Produksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($hasil as $data) {
          echo "<tr>
                  <td>".$data['kode']."-".jumlahAngka($data['kode_produk'])." ".$data['nama']."</td>";
      ?>
                  <td align="center">
                    <a href="<?= site_url('produksi/hitung/'.$data['kode_produk']); ?>" class="btn btn-sm btn-outline-success" >&nbsp;&nbsp;<i class="icon fa fa-fw fa-plus"></i></a>
                </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?= $this->koran->rowClose();  ?>