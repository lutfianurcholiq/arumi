<?php $this->load->view('laporan/buku/form'); $this->libs->rowOpen('', ''); ?>
    <div class="product-status-wrap">
        <center>
            <h4><?php echo $judul." ".$akun['nama_coa'] ?></h4>
            <h4>Arumi</h4>
            <h5><?php echo "Periode Bulan " . bulan($bulan) . " Tahun " . $year; ?></h5>
        </center>
        <div id="toolbar"> </div>
    </div>

<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["tanggal", "keterangan", "reff", "debit", "kredit", "saldo"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php

                    echo "  <tr>
                                <td>01-".$bulan."-".$year."</td>
                                <td>Saldo Awal</td>
                                <td style='text-align: center'>-</td>
                                <td style='text-align: right'>-</td>
                                <td style='text-align: right'>-</td>
                                <td style='text-align: right'>".rp($saldo['total'])."</td>
                            </tr>";

                    foreach($hasil as $data){
                        echo "
                        <tr>
                            <td>".shortdate_indo($data['tanggal'])."</td>
                            <td>".$data['nama_coa']."</td>";
                        if($data['posisi'] == 'Debit'){
                            if($akun['header_coa'] == 1 OR $akun['header_coa'] == 5 OR $akun['header_coa'] == 6 OR $akun['kode_coa'] == '312') {
                                $saldo['total'] += $data['nominal'];
                            }
                            else{
                                $saldo['total'] -= $data['nominal'];
                            }
                        echo "
                            <td style='text-align: center;'>".$data['coa_id']."</td>
                            <td style='text-align: right;'>".rp($data['nominal'])."</td>
                            <td style='text-align: right'>-</td>
                            <td style='text-align: right;'>".rp($saldo['total'])."</td>";
                        }
                        else{
                            if($akun['header_coa'] == 2 OR $akun['header_coa'] == 4 OR $akun['kode_coa'] == '311') {
                                $saldo['total'] += $data['nominal'];
                            }
                            else{
                                $saldo['total'] -= $data['nominal']; 
                            }
                            echo "
                                <td style='text-align: center;'>".$data['coa_id']."</td>
                                <td style='text-align: right'>-</td>
                                <td style='color: red; text-align: right;' >".rp($data['nominal'])."</td>
                                <td style='text-align: right;' >".rp($saldo['total'])."</td>
                            </tr>";
                        }
                    } 
                ?>  
            </tbody>
            <tr>
				<td style="text-align: center;" colspan="5"><b>Saldo Akhir</b></td>
				<td style="text-align: right;"><b><?= rp($saldo['total']); ?></b></td>
			</tr>
        </table>
    </div>
</div>
<?php $this->libs->rowClose(); ?>