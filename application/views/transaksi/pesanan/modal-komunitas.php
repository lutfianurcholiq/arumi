<?php 
    foreach ($work as $data) :
        $id_modal = "InformationproModalftblack". $data["id_pesanan"];
        $this->libs->modalOpenOther($id_modal);
?>
    <div class="modal-body">
        <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
        <h2>Information!</h2>
        <p>Udah beres belom?</p>
    </div>
    <div class="modal-footer footer-modal-admin info-md">
        <a href="<?php echo site_url('pesanan/receive/'.$data['id_pesanan']) ?>">Iya, ambil</a>
    </div>
<?php 
        $this->libs->modalClose();
    endforeach; 
?> 