<?php $this->libs->modalOpenOther('InformationproModalftblack'); ?>
    <div class="modal-body">
        <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
        <h2>Information!</h2>
        <p>Mau di buat sendiri apa lempar ke komunitas?</p>
    </div>
    <div class="modal-footer footer-modal-admin info-md">
        <?php foreach ($new as $data) : ?>
            <a href="<?php echo site_url('pesanan/own/'.$data['id_pesanan']) ?>">Sendiri</a>
            <a href="<?php echo site_url('pesanan/throwing/'.$data['id_pesanan']) ?>">Lempar</a>
        <?php endforeach; ?>
    </div>
<?php $this->libs->modalClose(); ?>