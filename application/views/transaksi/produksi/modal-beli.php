<?php $this->libs->modalOpenOther('InformationproModalftblack'); ?>
    <div class="modal-body">
        <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
        <h2>Information!</h2>
        <p>Yakin ingin membeli?</p>
    </div>
    <?php
        $this->db->where('id_produksi', $this->uri->segment(3));
        $id_pesanan = $this->db->get('produksi')->row()->pesanan_id;

        $this->db->where('pesanan_id', $id_pesanan);
        $bom = $this->db->get('bom')->result_array();
        $total = 0;
        foreach ($bom as $b) :
            $total += $b['subtotal'];
        endforeach;
    ?>
    <div class="modal-footer footer-modal-admin info-md">
        <a href="<?php echo site_url('produksi') ?>">Kembali</a>
        <a href="<?php echo site_url('produksi/stepOne/'.$this->uri->segment(3).'/'.$total) ?>">Yakin</a>
    </div>
<?php $this->libs->modalClose(); ?>