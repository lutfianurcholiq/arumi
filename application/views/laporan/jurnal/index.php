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
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="false" data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                <?php
                    $thead = ["tanggal", "keterangan", "reff", "debit", "kredit"];
                    $this->libs->thead($thead);
                ?>
                <tbody>
                    <?php 
                        $kredit = 0; $debit  = 0; $no = 0;
                        foreach ($hasil as $data) :
                            $no++;
                            echo "<tr>";
                            if ($data['posisi'] == 'Debit') :
                    ?>
                        <td><?php echo shortdate_indo($data['tanggal']); ?></td>
                        <td><?php echo $data['nama_coa']; ?></td>
                        <td><?php echo $data['coa_id']; ?></td>
                        <td><?php echo rp($data['nominal']); ?></td>
                        <td> </td>
                    <?php $debit += $data['nominal'];  else : ?>
                        <td></td>
                        <td><?php echo space($data['nama_coa']); ?></td>
                        <td><?php echo $data['coa_id']; ?></td>
                        <td> </td>
                        <td><?php echo rp($data['nominal']); ?></td>
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