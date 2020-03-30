<div class="page-header text-primary" style="text-align: center;">
  <h2 id="indicators">Jurnal Umum</h2>
  <h4>CV Bandung Barat</h4>
  <h5 class="mb-3 line-head"><?php echo "Periode ".shortdate_indo($awal)." sampai ".shortdate_indo($akhir)."";?></h5>
</div>
<div class="tile-body text-primary">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
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
        foreach($hasil as $data){
            echo    "<tr>";
            if($data['posisi'] == 'Debit'){
      ?>
        <td><span class="text-hide"><?= $data['no']; ?></span> <?= shortdate_indo($data['tanggal']); ?></td>
      <?php              
          echo "
                  <td>".$data['nama']." ".$data['keterangan']."</td>
                  <td align='center'>".$data['kode_akun']."</td>
                  <td align = 'right'>".rp($data['nominal'])."</td>
                  <td align = 'right'>-</td>";
              $debit += $data['nominal']; 
        } elseif($data['posisi'] == 'Kredit'){
            echo "
                  <td><span class='text-hide'>".$data['no']."</span></td>
                  <td>$spasi".$data['nama']." ".$data['keterangan']."</td>
                  <td align='center'>".$data['kode_akun']."</td>
                  <td align = 'right'>-</td>
                  <td align = 'right'>".rp($data['nominal'])."</td>
                </tr>";
                $kredit += $data['nominal'];
          }
        }
      ?>
        <tr>
          <th style="text-align: center;" colspan="3">Total</th>
          <th style="text-align: right;"><?= rp($debit);?></th>
          <th style="text-align: right;"><?= rp($kredit);?></th>
        </tr>  
    </tbody>
  </table>
</div>