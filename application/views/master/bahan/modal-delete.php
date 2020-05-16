<?php 
    foreach ($hasil as $data) :
    $modal = 'InformationproModalftblack'.$data['id_bahan'];
    $this->libs->modalOpenOther($modal); 
?>
    <div class="modal-body">
        <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
        <h2><?php echo $data['kode_bahan']."-".jumlahAngka($data['id_bahan'])." ".$data['nama_bahan'] ?></h2>
        <p>Yakin nih mau dihapus ?</p>
    </div>
    <div class="modal-footer footer-modal-admin info-md">
        <a href="<?php echo site_url('bahan/delete/'.$data['id_bahan']) ?>">Ya, yakin</a>
    </div>
<?php $this->libs->modalClose(); endforeach; ?>