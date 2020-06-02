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
            <td><?php echo space('Biaya Bahan Baku') ?></td>
            <td><?php echo $hasil ? rp($hasil['bahan_baku']) : rp(0) ?></td>
        </tr>
        <tr>
            <td><?php echo space('Biaya Bahan Penolong') ?></td>
            <td><?php echo $hasil ? rp($hasil['bahan_penolong']) : rp(0) ?></td>
        </tr>
        <tr>
            <td><?php echo space('Biaya Tenaga Kerja') ?></td>
            <td><?php echo $hasil ? rp($hasil['tenaga_kerja']) : rp(0) ?></td>
        </tr>
        <tr>
            <td><?php echo space('Biaya Overhead Pabrik') ?></td>
            <td class="bottom"><?php echo $hasil ? rp($hasil['oh']) : rp(0) ?> + </td>
        </tr>
        <tr>
            <td><b>Total Biaya Produksi</b></td>
            <td> <b>
                <?php
                    error_reporting(0);
                    $total = $hasil['bahan_baku'] + $hasil['bahan_penolong'] + $hasil['tenaga_kerja'] + $hasil['oh'];
                    echo rp($total); 
                ?></b>
            </td>
        </tr>
    </tbody>
</table>