<?php $this->libs->rowOpen($judul, $menu); ?>

    <div class="sparkline13-graph">
        <div class="panel-body panel-csm">
            <?php 
                if ($this->session->userdata('level') == 'Owner') {
                    $this->load->view('dashboard-rina');
                } 
                elseif ($this->session->userdata('level') == 'Produksi') {
                    $this->load->view('dashboard-adel');
                }
                elseif ($this->session->userdata('level') == 'Karyawan') {
                    $this->load->view('dashboard-lutfi');
                }
            ?>
        </div>
    </div>
<?php $this->libs->rowClose(); ?>