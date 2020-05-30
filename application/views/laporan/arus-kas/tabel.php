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
            <td><b>Arus Kas dari Aktivitas Operasi:</b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo space('Kas diterima dari Pelanggan') ?></td>
            <td><?php echo rp($kas_pendapatan['pendapatan']) ? rp($kas_pendapatan['pendapatan']) : rp(0) ?></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo space('Dikurangi Pembayaran Beban') ?></td>
            <td class="bottom">(<?php echo rp($kas_beban['beban']) ? rp($kas_beban['beban']) : rp(0) ?>)</td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo space('Arus Kas bersih dari Aktivitas Operasi') ?></td>
            <td></td>
            <td>
                <?php 
                    $operasi = $kas_pendapatan['pendapatan'] - $kas_beban['beban']; 
                    echo rp($operasi);
                ?>
            </td>
        </tr>
        <tr>
            <td><b>Arus Kas dari Aktivitas Investasi:</b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo space('Pembayaran Kas untuk pembelian peralatan') ?></td>
            <td></td>
            <td>(<?php echo rp($kas_peralatan['peralatan']) ? rp($kas_peralatan['peralatan']) : rp(0) ?>)</td>
        </tr>
        <tr>
            <td><b>Arus Kas dari Aktivitas Pendanaan:</b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo space('Kas diterima dari Pemilik Investasi') ?></td>
            <td><?php echo rp($kas_modal['modal']) ? rp($kas_modal['modal']) : rp(0) ?></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo space('Dikurangi penarikan kas oleh Pemilik Investasi') ?></td>
            <td class="bottom"><?php echo rp($kas_prive['prive']) ? rp($kas_prive['prive']) : rp(0) ?></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo space('Arus Kas bersih dari Aktivitas Pendanaan') ?></td>
            <td></td>
            <td class="bottom">
                <?php 
                    $pendanaan = $kas_modal['modal'] - $kas_prive['prive']; 
                    echo rp($pendanaan);
                ?>
            </td>
        </tr>
        <tr>
            <td><b>Arus Kas bersih dari saldo kas <?php echo date('t')." ".bulan($bulan) . " " . $taun ?></b></td>
            <td></td>
            <td>
                <?php 
                    $saldo = ($operasi - $kas_peralatan['peralatan']) + $pendanaan;
                    echo rp($saldo);
                ?>
            </td>
        </tr>
    </tbody>
</table>