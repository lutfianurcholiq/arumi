<?php 
    $info = ucwords("pesanan ".$pesanan['kode_pesanan']."-".jumlahAngka($pesanan['id_pesanan']) );
    $this->libs->rowOpen($info, $judul); ?>
<br>
<div class="sparkline13-graph">
    <section class="intro">
        <div class="container">
            <h1><?php echo $pesanan['nama_pelanggan'] ?></h1>
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