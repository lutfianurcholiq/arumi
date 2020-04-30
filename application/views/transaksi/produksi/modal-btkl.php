<?php $this->libs->modalOpenOther('InformationproModalftblack'); ?>
    <div class="modal-body">
        <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
        <h2>Information!</h2>
        <p>Yakin nih mau lanjut tahap ketiga?</p>
    </div>
    <?php
        $total = 0;
        foreach ($hasil as $data) :
            $total += $data['subgaji'];
        endforeach;
    ?>
    <div class="modal-footer footer-modal-admin info-md">
        <a href="<?php echo site_url('produksi/stepTwo/'.$this->uri->segment(3).'/'.$total) ?>">Ya, yakin</a>
    </div>
<?php $this->libs->modalClose(); ?>