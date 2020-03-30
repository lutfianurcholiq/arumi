<?php 
  $this->koran->tittleMenu($judul, $menu, $icon); 
  $this->koran->rowOpen(12);
?>
<div class="tile-body text-primary">
	<?= "<h4> Detail Pembelian ".$this->uri->segment(3)." :</h4><br>"; ?>
					<table class="table table-hover table-bordered">
				        <thead>
				        	<th>Bahan</th>
				            <th>Jenis Bahan</th>
				            <th>Jumlah</th>
				            <th>Harga Beli</th>
				            <th>Subtotal</th>
				        </thead>
				        <tbody>
				            <?php
				            $total = 0;
				              	foreach ($detail as $data) {
					                echo "<tr>
					                        <td>".$data['nama']."</td>
					                        <td>".$data['keterangan']."</td>";
					                if ($data['kode_bahan'] == '1') {
					                  echo "<td align='center'>".$data['input_jumlah']." rim</td>";
					                }
					                else{
					                  echo "<td align='center'>".$data['jumlah']." ".$data['satuan']."</td>";
					                }
					                echo  "        
					                        <td align='right'>".rp($data['harga_beli'])."</td>
					                        <td align='right'>".rp($data['subtotal'])."</td>";
					                $total += $data['subtotal'];
				            	}
				            ?>
					            <tr>
					              <td colspan="4" align="center"><b>Total</b></td>
					              <td align="right"><b><?= rp($total); ?></b></td> 
					            </tr>
				          	</tbody>
				        </table>
		        </div>
<?= $this->koran->rowClose();  ?>