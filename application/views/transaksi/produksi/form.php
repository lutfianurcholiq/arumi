<?= $this->koran->tittleMenu($judul, $menu, $icon); ?>
<div class="row text-primary">
  <div class="col-md-3">
    <div class="tile">
      <h6 class="tile-title line-head text-info" style="font-size: 17px; "><?= $produk['kode']."-".jumlahAngka($produk['kode_produk'])." ".$produk['nama']; ?></h6>
      <div class="tile-body">
        <form action="<?= $url; ?>" method="post">
          <?= $this->koran->inputOpen('Jumlah produksi'); ?>
            <input class="form-control col-md-12" type="text" name="jumlah" placeholder="Contoh: 75" onkeypress="return hanyaAngka(event)" value="<?= set_value('jumlah'); ?>">
            <?= form_error('jumlah'); ?>
          <?= $this->koran->inputClose(); ?>
          <?= $this->koran->inputOpen('Taksiran BOP'); ?>
            <input class="form-control col-md-12" id="rupiah0" type="text" name="taksiranBOP" placeholder="Contoh: 75.000" value="<?= set_value('taksiranBOP'); ?>">
            <?= form_error('taksiranBOP'); ?>
          <?= $this->koran->inputClose(); ?>
          <?= $this->koran->inputOpen('Taksiran jumlah produk yang dihasilkan'); ?>
            <input class="form-control col-md-12" type="text" name="taksiranJumlah" placeholder="Contoh: 75" onkeypress="return hanyaAngka(event)" value="<?= set_value('taksiranJumlah'); ?>">
            <?= form_error('taksiranJumlah'); ?>
          <?= $this->koran->inputClose(); ?>
          <input class="form-control col-md-12" type="hidden" name="kode_produk" value="<?= $produk['kode_produk'] ?>">
          <?= $this->koran->button4($back); ?>
        </form>
      </div>
    </div>
  </div>
  <?php if (isset($_POST['jumlah']) && isset($_POST['taksiranBOP']) && isset($_POST['taksiranJumlah'])) : ?>
  <?php if (substr($_POST['jumlah'], 0, 1) != '0' && substr($_POST['taksiranBOP'], 0, 1) != '0' && substr($_POST['taksiranJumlah'], 0, 1) != '0') : ?>
  <div class="col-md-9">
    <div class="tile">
      <h5 class="line-head text-info"><?= "Bahan Baku ".$produk['kode']."-".jumlahAngka($produk['kode_produk'])." ".$produk['nama']; ?></h5>
      <div class="tile-body">
        <table class="table table-hover table-bordered">
          <thead>
            <th>Bahan</th>
            <th>Komposisi</th>
            <th>Produksi</th>
            <th>Kebutuhan</th>
            <th>Harga</th>
            <th>Subtotal</th>
          </thead>
          <tbody>
            <?php
              $totalBBB = 0;
              foreach ($bbb as $data) { 
                echo "<tr>
                        <td>".$data['nama']."</td>
                        <td>".angka($data['jumlah'])." ".$data['satuan']."</td>
                        <td align='center'>".angka($_POST['jumlah'])."</td>";

                if ($data['kode_bahan'] == '1') {
                  $kebutuhan  = $_POST['jumlah'] * $data['jumlah'];
                  $harga      = $data['harga'] / 500;
                } 
                else {
                  $kebutuhan = $data['jumlah'];
                  $harga = $data['harga']; 
                }

                $subtotal   = $kebutuhan * $harga;
                $totalBBB   += $subtotal;

                if ($kebutuhan > $data['stok']) {
                  echo  " <td style='background-color : tomato; color: white; font-weight: bold;'>".angka($kebutuhan)." ".$data['satuan']."</td>";
                }
                else{
                  echo  " <td>".angka($kebutuhan)." ".$data['satuan']."</td>";
                }
                echo "  <td align='right'>".rp($harga)."</td>
                        <td align='right'>".rp($subtotal)."</td>
                      </tr>";
              } 
            ?>
            <tr>
              <th class="text-info" colspan="5">Biaya Bahan Baku</th>
              <th class="text-info" style="text-align: right;"><?= rp($totalBBB); ?></th>
            </tr>
          </tbody>
        </table>
      </div><br>
      <h5 class="line-head text-info"><?= "Tenaga Kerja ".$produk['kode']."-".jumlahAngka($produk['kode_produk'])." ".$produk['nama']; ?></h5>
      <div class="tile-body">
        <table class="table table-hover table-bordered">
          <thead>
            <th>Pekerjaan</th>
            <th style="width: 10px">Karyawan</th>
            <th>Tarif</th>
            <th>Subtotal</th>
          </thead>
          <tbody>
            <?php
              $totalBTK = 0; $subtotal = 0;
              foreach ($btk as $data) {
                $subtotal = $data['jumlah'] * $data['tarif']; 
                echo "<tr>
                        <td>".$data['nama']."</td>
                        <td>".$data['jumlah']." orang</td>
                        <td align='right'>".rp($data['tarif'])."</td>
                        <td align='right'>".rp($subtotal)."</td>
                      </tr>";
                $totalBTK += $subtotal;
              }
            ?>
            <tr>
              <th class="text-info" colspan="3">Biaya Tenaga Kerja</th>
              <th class="text-info" style="text-align: right;"><?= rp($totalBTK); ?></th>
            </tr>
          </tbody>
        </table>
      </div><br>
      <h5 class="text-info"><?= "Overhead Pabrik ".$produk['kode']."-".jumlahAngka($produk['kode_produk'])." ".$produk['nama']; ?></h5>
      <div class="tile-body">
        <table class="table table-hover table-bordered">
        <thead>
            <th>Bahan</th>
            <th>Komposisi</th>
            <th>Produksi</th>
            <th>Kebutuhan</th>
            <th>Harga</th>
            <th>Subtotal</th>
          </thead>
          <tbody>
            <?php
              $totalBPN = 0;
              foreach ($bop as $data) { 
                $subtotal   = $data['jumlah'] * $data['harga'];
                $totalBPN += $subtotal;
                echo "<tr>
                        <td>".$data['nama']."</td>
                        <td>".angka($data['jumlah'])." ".$data['satuan']."</td>
                        <td align='center'>".angka($_POST['jumlah'])."</td>";
                if ($data['jumlah'] > $data['stok']) {
                  echo  " <td style='background-color : tomato; color: white; font-weight: bold;'>".angka($data['jumlah'])." ".$data['satuan']."</td>";
                }
                else{
                  echo  " <td>".angka($data['jumlah'])." ".$data['satuan']."</td>";
                }
                echo "  <td align='right'>".rp($data['harga'])."</td>
                        <td align='right'>".rp($subtotal)."</td>
                      </tr>";
              } 
            ?>
            <tr>
              <th colspan="5">Biaya Bahan Penolong</th>
              <th style="text-align: right;"><?= rp($totalBPN); ?></th>
            </tr>
          </tbody>
        </table>
        <table class="table">
          <tr>
            <td align="center" style="border-bottom: 1px solid black"><b><?= rp(str_replace(".", "", $_POST['taksiranBOP'])); ?></b> (Taksiran BOP) </td>
            <?php 
              $produk   =   str_replace(".", "", $_POST['taksiranBOP']) / $_POST['taksiranJumlah'];
              $bop      =   $produk * $_POST['jumlah'];
              $totalBOP =   $totalBPN + $bop;
              $biaya_produksi = $totalBBB + $totalBTK + $totalBOP;
            ?>
            <td rowspan="2" style="font-weight: bold; vertical-align: middle;"><?= "=&nbsp;&nbsp;&nbsp;".rp($produk)."/produk"."&nbsp;&nbsp;&nbsp;(Tarif BOP per Satuan)"; ?></td>
          </tr>
          <tr>
            <td align="center"><b><?= $_POST['taksiranJumlah']; ?></b> (Taksiran Jumlah yang dihasilkan)</td>
          </tr>
        </table>
        <?= "X = ".rp($produk)." (Tarif BOP per Satuan) x ".$_POST['jumlah']." (Jumlah Produksi) = ".rp($bop); ?><br><br>
        <table class="table table-hover">
          <tr>
            <th>Biaya Bahan Penolong + X</th>
            <th style="text-align: right;"><?= rp($totalBPN)." + ".rp($bop); ?></th>
          </tr>
          <tr>
            <th class="text-info">Biaya Overhead Pabrik</th>
            <th class="text-info" style="text-align: right;"><?= rp($totalBOP); ?></th>
          </tr>
        </table>
      </div>
      <div class="text-right">
        <a href="#biayaProduksi" class="btn btn-outline-info" data-toggle="modal"><i class="fa fa-fw fa-lg fa-sticky-note-o"></i> Lihat Biaya</a>&nbsp;
        <?php
          if ($bahan['info'] == 'Kurang' && $bahan1['info'] == 'Kurang') {
            echo "<a href='#peringatan' class='btn btn-outline-success' data-toggle='modal'><i class='fa fa-fw fa-lg fa-close'></i> Produksi</a>";
          }
          else {
            echo "<a href='#produksi' class='btn btn-outline-success' data-toggle='modal'><i class='fa fa-fw fa-lg fa-check'></i> Produksi</a>";
          }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Peringatan -->
  <div id="peringatan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-danger" id="myModalLabel2">Peringatan !!</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: tomato;"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p style="text-align: center;">
            <img src="<?= base_url('/assets/img/alert.gif'); ?>" alt="alert" width="70">
          </p>
          <p style="font-weight: bold; font-size: 18px; text-align: center;">Terdapat bahan yang stoknya kurang..</p>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Peringatan -->
<!-- Modal Biaya Produksi -->
  <div id="biayaProduksi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-info" id="myModalLabel2">Biaya Produksi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: tomato;"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
           <table class="table table-hover">
             <tr>
                <th>Biaya Bahan Baku</th>
                <th style="text-align: right;"><?= rp($totalBBB); ?></th>
             </tr>
             <tr>
                <th>Biaya Tenaga Kerja</th>
                <th style="text-align: right;"><?= rp($totalBTK); ?></th>
             </tr>
             <tr>
                <th>Biaya Overhead Pabrik</th>
                <th style="text-align: right;"><?= rp($totalBOP); ?></th>
             </tr>
             <tr style="background-color: cornflowerblue; color: white;">
                <th>Biaya Produksi</th>
                <th style="text-align: right;"><?= rp($biaya_produksi); ?></th>
             </tr>
           </table>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Biaya Produksi -->

<!-- Modal Produksi -->
  <div id="produksi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel2" style="color: cornflowerblue;">Simpan Data Produksi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: tomato;"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('produksi/selesai'); ?>" method="POST">
            <b>Selesaikan produksi ?</b><br><br>
            <?php
              $id = $this->uri->segment(3);
              foreach ($bhn as $data) {
                if ($data['kode_bahan'] == '1') {
                  $kebutuhan  = $_POST['jumlah'] * $data['jumlah'];
                } 
                else {
                  $kebutuhan = $data['jumlah'];
                }
            ?>
            <input type="hidden" name="kode_bahan[]" value="<?= $data['kode_bahan']; ?>" readonly="">
            <input type="hidden" name="jumlah[]" value="<?= $kebutuhan; ?>" readonly="">
            <?php } ?>
            <input type="hidden" name="kode_produk" value="<?= $id; ?>" readonly="">
            <input type="hidden" name="jml" value="<?= $_POST['jumlah']; ?>" readonly="">
            <input type="hidden" name="bbb" value="<?= $totalBBB; ?>" readonly="">
            <input type="hidden" name="bahan_penolong" value="<?= $totalBPN; ?>" readonly="">
            <input type="hidden" name="btk" value="<?= $totalBTK; ?>" readonly="">
            <input type="hidden" name="bop" value="<?= $totalBOP; ?>" readonly="">
            <input type="hidden" name="biaya_produksi" value="<?= $biaya_produksi; ?>" readonly="">

            <div class="modal-footer text-right">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>&nbsp;
              <button type="submit" class="btn btn-outline-info">Iya</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Produksi -->
  <?php endif; ?>
<?php endif; ?>