<table class="table">
    <tr>
        <th colspan="6" style="text-align: center;">Arumi Cake Rancaekek<br>Jl.Rancaekek Bandung</th>
    </tr>
    <tr>
        <th style="width: 15%">No order</th>
        <th style="width: 5%; text-align: right">:</th>
        <th><?php echo $order['kode_pesanan'] . "-" . jumlahAngka($order['id_pesanan']) ?></th>
        <th style="text-align: right">Nama Pemesan</th>
        <th style="width: 5%; text-align: right">:</th>
        <th><?php echo $order['nama_pelanggan'] ?></th>
    </tr>
    <tr>
        <th style="width: 15%">Tanggal pesan</th>
        <th style="width: 5%; text-align: right">:</th>
        <th><?php echo shortdate_indo($order['tanggal']) ?></th>
        <th style="text-align: right">No WA</th>
        <th style="width: 5%; text-align: right">:</th>
        <th><?php echo noHp($order['no_wa']) ?></th>
    </tr>
</table>