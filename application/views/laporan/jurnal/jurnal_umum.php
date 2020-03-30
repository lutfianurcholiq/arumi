<?php  $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(12);  ?>
<div class="tile-body text-primary">
  <form action="<?= $url; ?>" method="post" class="row text-primary">

    <?= $this->koran->inputOpenFormRow('Tanggal Awal', 3); ?>
      <input class="form-control" type="date" name="tanggal_awal">
      <?= form_error('tanggal_awal'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpenFormRow('Tanggal Akhir', 3); ?>
      <input class="form-control" type="date" name="tanggal_akhir">
      <?= form_error('tanggal_akhir'); ?>
    <?= $this->koran->inputClose(); ?>

    <div class="form-group col-md-4 align-self-end">
      <button type="submit" class="btn btn-outline-info"><i class="fa fa-fw fa-lg fa-search"></i>Cari</button>
      &nbsp;&nbsp;
      <?php if ($awal == date('Y-m-d') && $akhir == date('Y-m-d')) { ?>
        <a href="<?= site_url('keuangan/printJurnalUmum/'.$awal.'/'.$akhir.'/0 '); ?>" class="btn btn-outline-secondary" target="_BLANK">
      <?php } else { ?>
        <a href="<?= site_url('keuangan/printJurnalUmum/'.$awal.'/'.$akhir.'/1 '); ?>" class="btn btn-outline-secondary" target="_BLANK">
      <?php } ?><i class="fa fa-fw fa-lg fa-print"></i>Cetak</a>
    </div>
  </form>
</div>
<?= 
  $this->koran->rowClose(); 
  $this->koran->rowOpen(12);
?>
<div class="page-header" style="text-align: center;">
  <h2 id="indicators">Jurnal Umum</h2>
  <h4>CV Bandung Barat</h4>
  <h5 class="mb-3 line-head"><?php echo "Periode ".shortdate_indo($awal)." sampai ".shortdate_indo($akhir)."";?></h5>
</div>
<div class="tile-body">
  <table class="table table-hover table-bordered" id="sampleTable">
    <thead>
      <tr>
        <th class="text-hide">No</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th style="text-align: center;">Reff</th>
        <th style="text-align: center;">Debit</th>
        <th style="text-align: center;">Kredit</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $kredit = 0; $debit  = 0;
        $spasi = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $no = 0;
        foreach($hasil as $data) {
          $no++;          
            echo    "<tr>
                        <td><span class='text-hide'>$no</span></td>";
            if($data['posisi'] == 'Debit'){
      ?>
        <td><?= shortdate_indo($data['tanggal']); ?></td>
      <?php              
          echo "
                  <td>".$data['nama']." ".$data['keterangan']."</td>
                  <td align='center'>".$data['kode_akun']."</td>
                  <td align = 'right'>".rp($data['nominal'])."</td>
                  <td align = 'right'>-</td>";
              $debit += $data['nominal']; 
        } else {
            echo "
                  <td></td>
                  <td>$spasi".$data['nama']." ".$data['keterangan']."</td>
                  <td align='center'>".$data['kode_akun']."</td>
                  <td align = 'right'>-</td>
                  <td align = 'right'>".rp($data['nominal'])."</td>
                </tr>";
                $kredit += $data['nominal'];
          }
        }
      ?>
    </tbody>
        <tr>
          <th style="text-align: center;" colspan="4">Total</th>
          <th style="text-align: right;"><?= rp($debit);?></th>
          <th style="text-align: right;"><?= rp($kredit);?></th>
        </tr>  
  </table>
</div>
<?= $this->koran->rowClose(); ?>