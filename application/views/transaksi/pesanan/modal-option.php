<?php 
    foreach ($new as $data) :
        $id_modal = "InformationproModalftblack". $data["id_pesanan"];
        $this->libs->modalOpenOther($id_modal);
?>
    <div class="modal-body">
        <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
        <h2>Information!</h2>
        <p>Mau di buat sendiri apa lempar ke komunitas?</p>
    </div>
    <div class="modal-footer footer-modal-admin info-md">
        <a href="<?php echo site_url('pesanan/own/'.$data['id_pesanan']) ?>">Sendiri</a>
        <a href="<?php echo site_url('pesanan/throwing/'.$data['id_pesanan']) ?>">Ditawarkan</a>
    </div>
<?php 
        $this->libs->modalClose();
    endforeach; 
?> 