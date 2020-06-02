<style>
    .bottom {
        border-bottom: 1px solid black;
    }
    .top {
        border-top: 1px solid black;
    }
</style>

<table class="table border-table">
    <tbody>
        
        <tr>
            <td>Modal Awal</td>
            <td></td>
            <td><?php echo rp($modal['modal']) ?></td>
        </tr>
        <?php 
            $labaKotor          = $pendapatan['pendapatan'] - $hpp['hpp'];
            $biaya_adm          = 0;
            $biaya_operasional  = 0; 
            foreach ($beban as $data) {
                if ($data['nama_biaya'] == 'Biaya Operasional') {
                    $biaya_operasional += $data['total'];
                }
                else {
                    $biaya_adm += $data['total'];
                }
            }
            $totalBiaya     = $biaya_operasional + $biaya_adm;
            $labaBersih     = $labaKotor - $totalBiaya; 

            $kenaikanModal  = $labaBersih - $prive['prive'];
            $modalAkhir     = $modal['modal'] + $kenaikanModal
        ?>
        <tr>
            <td>Laba Bersih</td>
            <td><?php echo rp($labaBersih) ?></td>
            <td></td>
        </tr>
        <tr>
            <td>Prive</td>
            <td class="bottom"><?php echo "(".rp($prive['prive']).")" ?></td>
            <td></td>
        </tr>
        <tr>
            <td>Kenaikan Modal</td>
            <td></td>
            <td class="bottom"><?php echo rp($kenaikanModal) ?></td>
        </tr>
        <tr>
            <td>Modal Akhir</td>
            <td></td>
            <td><?php echo rp($modalAkhir) ?></td>
        </tr>
        
    </tbody>
</table>