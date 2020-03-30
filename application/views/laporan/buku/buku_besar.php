<?php  $this->koran->tittleMenu($judul, $menu, $icon); $this->koran->rowOpen(12);  ?>
<div class="tile-body text-primary">
  <form action="<?= $url; ?>" method="post" class="row text-primary">

    <?= $this->koran->inputOpenFormRow('Akun', 4); ?>
      <select class="form-control" id="exampleSelect1" name="kode_akun" style="width: 100%;">
        <option selected="" disabled="">Pilih Akun</option>
        <?php 
          foreach ($coa as $data) {
            echo "<option value = ".$data['kode_akun'].">".$data['nama']."</option>";
            
          }
        ?>
      </select>
      <?= form_error('kode_akun'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpenFormRow('Bulan', 3); ?>
      <select class="form-control" name="bulan" style="width: 100%;">
        <option value="">Pilih bulan</option>
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select>
      <?php echo form_error('bulan'); ?>
    <?= $this->koran->inputClose(); ?>

    <?= $this->koran->inputOpenFormRow('Tahun', 2); ?>
      <select class="form-control" id="exampleSelect1" name="tahun" style="width: 100%;">
        <option selected="" disabled="">Pilih Tahun</option>
        <?php 
          foreach ($tahun as $data) {
            echo "<option value=".$data['tahun'].">".$data['tahun']."</option>";
            
          }
        ?>
      </select>
      <?php echo form_error('tahun'); ?>
    <?= $this->koran->inputClose(); ?>

    <div class="form-group col-md-4 align-self-end">
      <button type="submit" class="btn btn-outline-info"><i class="fa fa-fw fa-lg fa-search"></i>Cari</button>
      &nbsp;&nbsp;
      <?php if (isset($hasil)) { ?>
        <a href="<?= site_url('keuangan/printBukuBesar/'.$_POST['kode_akun'].'/'.$_POST['bulan'].'/'.$_POST['tahun']); ?>" class="btn btn-outline-secondary" target="_BLANK"> <i class="fa fa-fw fa-lg fa-print"></i>Cetak</a>
      <?php } ?>
    </div>
  </form>
</div>
<?= 
  $this->koran->rowClose(); 
  if(isset($hasil)) {
  $this->koran->rowOpen(12);
?>

<div class="page-header" style="text-align: center;">
  <h2 id="indicators"><?= "Buku Besar ".$dataakun['kode_akun']." ".$dataakun['nama']." "; ?></h2>
  <h4>CV Bandung Barat</h4>
  <h5 class="mb-3 line-head"><?= "Bulan ".bulan($_POST['bulan'])." ".$_POST['tahun']." "; ?></h5>
</div>

<div class="tile-body">
  <table class="table table-hover table-bordered" id="sampleTable">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th style="text-align: center;">Reff</th>
        <th style="text-align: center;">Debit</th>
        <th style="text-align: center;">Kredit</th>
        <th style="text-align: center;">Saldo</th>
      </tr>
    </thead>
    <tbody>
      <?php
        error_reporting(0);
        /*echo "
          <tr>
            <td></td>
            <td>Saldo Awal</td>
            <td align='right'>-</td>
            <td align='right'>-</td>
            <td align='right'></td>
            <td align='right'></td>
          </tr>";*/
          foreach($hasil as $data){
            echo "
              <tr>
                <td>".shortdate_indo($data['tanggal'])."</td>
                <td>".$data['nama']." ".$data['keterangan']."</td>";
            if($data['posisi'] == 'Debit'){
              if($dataakun['header_akun'] == 1 or $dataakun['header_akun'] == 5 or $dataakun['header_akun'] == 6){
                $saldo['total'] += $data['nominal'];
              }else{
                $saldo['total'] -= $data['nominal'];
              }
              echo "
                <td align='right'>-</td>
                <td align='right'>".rp($data['nominal'])."</td>
                <td align='right'>-</td>
                <td align='right'>".rp($saldo['total'])."</td>";
            }else{
              if($dataakun['header_akun'] == 2 or $dataakun['header_akun'] == 4 or $dataakun['header_akun'] == 3){
                $saldo['total'] += $data['nominal'];
              }else{
                if ($saldo['total'] == 0) {
                  $saldo['total'] = $data['nominal'];   
                }
                else {
                  $saldo['total'] -= $data['nominal'];                    }
                }
              echo "
                <td align='right'>-</td>
                <td align='right'>-</td>
                <td style='color: tomato;' align='right'>".rp($data['nominal'])."</td>
                <td style='color: tomato;' align='right'>".rp($saldo['total'])."</td>
              </tr>";
            }
          } 
      ?>  
    </tbody>
    <tr>
      <td align="center" colspan="5"><b>Saldo Akhir</b></td>
      <td align="right"><b><?= rp($saldo['total']); ?></b></td>
    </tr>
  </table>
</div>
<?php } ?>
<?= $this->koran->rowClose(); ?>