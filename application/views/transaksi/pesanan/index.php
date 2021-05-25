<?php
    echo $this->session->flashdata('sukses');
    $this->libs->rowOpen($judul, $menu);
?>
<div class="admintab-wrap edu-tab1 mg-t-30">
    <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
        <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Pesanan Baru</a>
        </li>
        <li><a data-toggle="tab" href="#TabDetails"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Pesanan Diolah</a>
        </li>
        <li><a data-toggle="tab" href="#TabPlan"><span class="edu-icon edu-analytics-bridge tab-custon-ic"></span>Pesanan Selesai</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="TabProject" class="tab-pane in active custon-tab-style1">
            <?php $this->load->view('transaksi/pesanan/table-new-order') ?>
        </div>
        <div id="TabDetails" class="tab-pane custon-tab-style1">
            <?php $this->load->view('transaksi/pesanan/table-working-order') ?>
        </div>
        <div id="TabPlan" class="tab-pane custon-tab-style1">
            <?php $this->load->view('transaksi/pesanan/table-finish-order') ?>
        </div>      
    </div>
</div>
<?php $this->libs->rowClose(); ?>