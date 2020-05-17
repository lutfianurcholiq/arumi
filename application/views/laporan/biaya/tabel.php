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
            <td><b>Biaya Produksi:</b></td>
            <td></td>
        </tr>
        <tr>
            <td>Biaya Bahan Baku</td>
            <td><?php echo $bbb = $hasil['bahan_baku'] ? rp($hasil['bahan_baku']) : rp(0) ?></td>
        </tr>
        <tr>
            <td>Biaya Bahan Penolong</td>
            <td><?php echo $bp = $hasil['bahan_penolong'] ? rp($hasil['bahan_penolong']) : rp(0) ?></td>
        </tr>
        <tr>
            <td>Biaya Tenaga Kerja</td>
            <td class="bottom"><?php echo $btk = $hasil['tenaga_kerja'] ? rp($hasil['tenaga_kerja']) : rp(0) ?></td>
        </tr>
        <tr>
            <td><b>Total Biaya Produksi</b></td>
            <td> <b>
                <?php 
                    $total = $bbb + $bp + $bp;
                    echo rp($total); 
                ?></b>
            </td>
        </tr>
    </tbody>
</table>