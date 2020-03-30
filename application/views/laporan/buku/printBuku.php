<div class="page-header text-primary" style="text-align: center;">
  <h2 id="indicators"><?= "Buku Besar ".$dataakun['kode_akun']." ".$dataakun['nama']." "; ?></h2>
  <h4>CV Bandung Barat</h4>
  <h5 class="mb-3 line-head"><?= "Bulan ".bulan($this->uri->segment(4))." ".$this->uri->segment(5)." "; ?></h5>
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