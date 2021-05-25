<?php 
    $info = ucwords("pesanan ".$pesanan['kode_pesanan']."-".jumlahAngka($pesanan['id_pesanan']) );
    $this->libs->rowOpen($info, $judul); ?>
    <div class="add-product">
        <a href="<?php echo $tabel; ?>" class="Primary mg-b-10"><i class="fas fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;Kembali</a>
    </div>
<br>
<div class="sparkline13-graph">
    <section class="intro">
        <div class="container">
            <h1><?php echo $pesanan['nama_pelanggan'] ?></h1>
            <br>
            <h4 style="text-align: left; color:white">Nama produk&nbsp: <?php echo $pesanan['nama_produk'];?></h4>
            <h4 style="text-align: left; color:white">Tanggal&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo shortdate_indo($pesanan['tanggal']) ?></h4>
            <h4 style="text-align: left; color:white">Toping&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $pesanan['rasa']?></h4>
            <h4 style="text-align: left; color:white">Jumlah &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $pesanan['jumlah'] ?></h4>
        </div>
    </section>

    <section class="timeline">
        <ul>
            <?php
                foreach ($hasil as $data) {
                    echo "  <li>
                                <div style='color: white'>
                                    <time>".shortdate_indo($data['tanggal'])." ".$data['jam']."</time>
                                    ".$data['keterangan']."
                                </div>
                            </li>";
                }
            ?>
        </ul>
    </section>
</div>
<?php $this->libs->rowClose(); ?>