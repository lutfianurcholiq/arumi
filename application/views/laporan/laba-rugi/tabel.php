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
            <td><b>Penjualan Bersih:</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo space('Penjualan') ?></td>
            <td></td>
            <td></td>
            <td><?php echo rp($pendapatan['pendapatan']) ?></td>
        </tr>
        <tr>
            <td><?php echo space('Retur Penjualan') ?></td>
            <td></td>
            <td></td>
            <td><?php echo rp(0) ?></td>
        </tr>
        <tr>
            <td><?php echo space('Potongan Penjualan') ?></td>
            <td></td>
            <td></td>
            <td><?php echo rp(0) ?></td>
        </tr>
        <tr>
            <td><?php echo space('Beban Angkut Penjualan') ?></td>
            <td></td>
            <td></td>
            <td class="bottom"><?php echo rp(0) ?></td>
        </tr>
        <tr>
            <td><?php echo space('Penjualan Bersih') ?></td>
            <td></td>
            <td></td>
            <td><?php echo rp($pendapatan['pendapatan']) ?></td>
        </tr>
        <tr>
            <td><b>Harga Pokok Penjualan:</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo space('Harga Pokok Penjualan') ?></td>
            <td></td>
            <td></td>
            <td class="bottom">(<?php echo rp($hpp['hpp']) ?>)</td>
        </tr>
        <tr>
            <td><b>Laba Kotor</b></td>
            <td></td>
            <td></td>
            <td>
                <?php 
                    $labaKotor = $pendapatan['pendapatan'] - $hpp['hpp'];
                    echo rp($labaKotor);
                ?>
            </td>
        </tr>
        <tr>
            <td><b>Biaya Operasional:</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php
            $biaya_operasional = 0;
            foreach ($beban as $data) {
                if ($data['nama_biaya'] == 'Biaya Operasional') {
                    echo "  <tr>
                                <td>" . space($data['nama_coa']) . "</td>
                                <td>" . rp($data['total']) . "</td>
                                <td></td>
                                <td></td>
                            </tr>";
                    $biaya_operasional += $data['total'];
                }
            }
        ?>
        <tr>
            <td><?php echo space('Total Biaya Operasional:') ?></td>
            <td class="top"></td>
            <td><?php echo rp($biaya_operasional) ?></td>
            <td></td>
        </tr>
        <tr>
            <td><b>Biaya Administrasi & Umum:</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php
            $biaya_adm  = 0;
            foreach ($beban as $data) {
                if ($data['nama_biaya'] == 'Biaya Administrasi & Umum') {
                    echo "  <tr>
                                <td>" . space($data['nama_coa']) . "</td>
                                <td>" . rp($data['total']) . "</td>
                                <td></td>
                                <td></td>
                            </tr>";
                    $biaya_adm += $data['total'];
                }
            }
            $total = $biaya_operasional + $biaya_adm;
        ?>
        <tr>
            <td><?php echo space('Total Biaya Administrasi & Umum:') ?></td>
            <td></td>
            <td class="bottom"><?php echo rp($biaya_adm) ?></td>
            <td></td>
        </tr>
        <tr>
            <td><b>Total Biaya Operasional dan Administrasi Umum:</b></td>
            <td></td>
            <td></td>
            <td class="bottom">(<?php echo rp($total) ?>)</td>
        </tr>
        <tr>
            <td><b>Laba Bersih</b></td>
            <td></td>
            <td></td>
            <td>
                <?php 
                    $labaBersih = $labaKotor - $total; 
                    echo rp($labaBersih); 
                ?> 
            </td>
        </tr>
    </tbody>
</table>