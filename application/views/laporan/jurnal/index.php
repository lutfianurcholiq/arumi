<?php 
    $this->load->view('laporan/jurnal/form'); 
    if ($hasil) :
?>
<div class="product-status-wrap">
    <center>
        <h4><?php echo $judul ?></h4>
        <h4>Arumi</h4>
        <h5><?php echo "Periode " . shortdate_indo($awal) . " sampai " . shortdate_indo($akhir) . ""; ?></h5>
    </center>
    <div id="toolbar"> </div>
</div>

    <div class="sparkline13-graph">
        <div class="datatable-dashv1-list custom-datatable-overright">
            <table class="table table-bordered table-hover dataTables">
                <?php
                    $thead = [" ", "tanggal", "keterangan", "reff", "debit", "kredit"];
                    $this->libs->thead($thead);
                ?>
                <tbody>
                    <?php 
                        $kredit = 0; $debit  = 0;
                        foreach ($hasil as $data) :
                            echo "<tr>
                                    <td><span class='text-hide'>".$data['no']."</span></td>";
                            if ($data['posisi'] == 'Debit') :
                    ?>
                        <td><?php echo shortdate_indo($data['tanggal']) ?></td>
                        <td><?php echo $data['nama_coa'] ?></td>
                        <td><?php echo $data['coa_id'] ?></td>
                        <td style="text-align: right;"><?php echo rp($data['nominal']) ?></td>
                        <td> </td>
                    <?php $debit += $data['nominal'];  else : ?>
                        <td></td>
                        <td><?php echo space($data['nama_coa']) ?></td>
                        <td><?php echo $data['coa_id'] ?></td>
                        <td> </td>
                        <td style="text-align: right;"><?php echo rp($data['nominal']) ?></td>
                    <?php $kredit += $data['nominal']; endif; echo "</tr>"; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php 
    $this->libs->rowClose(); 
    else :
        echo "<center><h3>Cari dulu.. baru aku muncul.</h3></center>";
    endif; 
?>