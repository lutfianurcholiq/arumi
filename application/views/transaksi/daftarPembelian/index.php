<?php 
  $this->bo->tittleMenu($judul, $menu, $icon); 
  #echo $this->session->flashdata('pesan');
  $this->bo->rowOpen(12);
?>

<button class="btn btn-outline-info" type="button" data-toggle="modal" data-target="#tambah">
  <a data-toggle="tooltip" data-placement="top" data-original-title="Pilih Pemasok">
    <i class="fa fa-fw fa-plus text"></i>
    Tambah
  </a>
</button> <br><br>

<div class="tile-body text-primary">
  <table class="table table-hover table-bordered" id="sampleTable">
    <thead>
      <tr>
        <th style="width: 14%;"># Pembelian</th>
        <th>Pemasok</th>
        <th style="width: 10%;">Tanggal</th>
        <th>Total</th>
        <th style="width: 16%;">Status</th>
        <th style="text-align: center;">Tambah / Detail</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($hasil as $data) : ?>
        <tr>
          <td><?php echo $data["namaId"]."-".jumlahAngka($data['id']); ?></td>
          <td><?php echo $data['namaPemasok']; ?></td>
          <td><?php echo shortdate_indo($data['tanggal']); ?></td>
          <td><?php echo rp($data['total']); ?></td>
          <td><?php echo $data['status']; ?></td>
      <?php if ($data['status'] == 'Menunggu') : ?>
          <td align="center"> <a href="<?php echo site_url('pembelian/lihatPembelian/'.$data['id']); ?>" class="btn btn-sm btn-outline-primary" >&nbsp;<i class="icon fa fa-fw fa-check"></i></a> </td>
      <?php else : ?>
          <td align="center"> <a href="<?php echo site_url('pembelian/detailPembelian/'.$data['id']); ?>" class="btn btn-sm btn-outline-info" target="_blank">&nbsp;<i class="icon fa fa-fw fa-info"></i></a> </td>
      <?php endif; endforeach; ?>
    </tbody>
  </table>
</div>
<?php $this->bo->rowClose();  ?>


<!--div class="bs-component">
  <div class="modal" id="notif">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger">PERINGATAN !!</h5>
        </div>
        
        <div class="modal-body">
          <p style="font-size: 24px;">
            <?php #echo "Terdapat pembelian <b>".$pembelian['kode']."-".$pembelian['kode_pembelian']." </b>dari pemasok <b>".$pembelian['nama']."</b> yang belum selesai."; ?>
          </p>
        </div>
        <div class="modal-footer">
           <?php #echo $this->bo->button6(); ?>   
        </div>
      </div>
    </div>
  </div>
</div-->