<?php 
    foreach ($hasil as $data) :
    $modal = 'InformationproModalftblack'.$data['id_pesanan'];
    $this->libs->modalOpenOther($modal); 
?>
    <div class="modal-body">
        <h2><?php echo $data['kode_pesanan']."-".jumlahAngka($data['id_pesanan'])." ".$data['nama_pelanggan'] ?></h2>
        <img src="<?php echo base_url('nota/'.$data['foto']) ?>" alt="">
        <p>Harga <?php echo rp($data['total']) ?></p>
        <p>Cek terlebih dahulu sebelum mengklik tombol</p>
    </div>
    <div class="modal-footer footer-modal-admin info-md">
        <a href="<?php echo site_url('pembayaran/reject/'.$data['id_pesanan']) ?>">Tolak</a>
        <a href="<?php echo site_url('pembayaran/okay/'.$data['id_pesanan'].'/'.$data['total']) ?>">Oke</a>
    </div>
<?php $this->libs->modalClose(); endforeach; ?>