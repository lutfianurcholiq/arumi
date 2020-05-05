<?php $this->load->view('laporan/buku/form'); $this->libs->rowOpen('', ''); ?>
    <div class="product-status-wrap">
        <center>
            <h4><?php echo $judul." ".$akun['nama_coa'] ?></h4>
            <h4>Arumi</h4>
            <h5><?php echo "Periode bulan " . bulan($bulan) . " tahun " . $taun; ?></h5>
        </center>
        <div id="toolbar"> </div>
    </div>

<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table border-table">
            <?php
                $thead = ["tanggal", "keterangan", "reff", "debit", "kredit", "saldo"];
                $this->libs->thead($thead);
            ?>
            <tbody>
            <?php
                $saldo = 0;

                foreach($hasil as $data){
                    echo "
                    <tr>
                        <td>".shortdate_indo($data['tanggal'])."</td>
                        <td>".$data['nama_coa']."</td>";
                    if($data['posisi'] == 'Debit'){
                        if($akun['header_coa'] == 1 OR $akun['header_coa'] == 5 OR $akun['header_coa'] == 6){
                            $saldo += $data['nominal'];
                        }
                        else{
                            $saldo -= $data['nominal'];
                        }
                    echo "
                        <td>".$data['coa_id']."</td>
                        <td>".rp($data['nominal'])."</td>
                        <td>-</td>
                        <td>".rp($saldo)."</td>";
                    }else{
                        if($akun['header_coa'] == 2 OR $akun['header_coa'] == 4 OR $akun['header_coa'] == 3){
                            $saldo += $data['nominal'];
                        }
                        else{
                            if ($saldo == 0) {
                                $saldo = $data['nominal'];   
                            }
                            else {
                                $saldo -= $data['nominal'];                    }
                            }
                        echo "
                            <td>".$data['coa_id']."</td>
                            <td>-</td>
                            <td style='color: tomato;' >".rp($data['nominal'])."</td>
                            <td style='color: tomato;' >".rp($saldo)."</td>
                        </tr>";
                    }
                } 
            ?>  
            </tbody>
        </table>
    </div>
</div>
<?php $this->libs->rowClose(); ?>