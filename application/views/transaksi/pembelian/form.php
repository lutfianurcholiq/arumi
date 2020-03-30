<?php $this->bo->tittleMenu($judul, $menu, $icon); ?>
<div class="row">

  <?php if($detail == NULL) : ?>
    <div class="col-md-6">
  <?php  else : ?>
    <div class="col-md-4">
  <?php endif; ?>

    <div class="tile">
      <h6 class="tile-title line-head text-info" style="font-size: 17px; "><?php echo "".$beli['namaId']."-".jumlahAngka($beli['idPemasok'])." ".$beli['namaPemasok'].""; ?></h6>
      <div class="tile-body">
        <form id="<?php echo $validator; ?>" action="<?php echo $url; ?>" method="post">

          <input class='form-control col-md-12' type='hidden' name='id' value='<?php echo $beli['id']; ?>'>
          
          <?php $this->bo->inputOpen('Barang', 'required'); ?>
            <select class="form-control" id="exampleSelect1" name="idBarang" style="width: 100%;">
              <option selected="" disabled="">Pilih barang yang akan dibeli</option>
              <?php 
                foreach ($barang as $data) {
                  if ($data['idPembelian'] == NULL) {
                    echo "<option value = ".$data['id'].">".$data['namaBarang']."</option>";
                  } else {}
                }
              ?>
            </select>
          <?php $this->bo->inputClose(); ?>

          <?php $this->bo->inputOpen('Harga Beli', 'required'); ?>
            <input class="form-control col-md-12" type="text" id="rupiah0" name="hargaBeli" placeholder="Contoh: 10.000" onkeypress="return hanyaAngka(event)" value="<?php echo set_value('harga'); ?>">
          <?php $this->bo->inputClose(); ?>

          <?php $this->bo->inputOpen('Jumlah', 'required'); ?>
            <input class="form-control col-md-12" type="text" name="jumlah" placeholder="Contoh: 75" onkeypress="return hanyaAngka(event)" value="<?php echo set_value('jumlah'); ?>">
          <?php $this->bo->inputClose(); ?>
          
          <?php if ($beli['status'] == 'Menunggu') : $this->bo->buttonBack($kembali); endif; ?>
        </form>
      </div>
    </div>
  </div>

  <?php if($detail != NULL) { ?>
  <div class="col-md-8">
    <div class="tile">
      <h3 class="tile-title line-head text-info">Detail Pembelian</h3>
      <div class="tile-body">
        <table class="table table-hover table-bordered">
          <thead>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Harga Beli</th>
            <th>Subtotal</th>
            <?php if ($beli['status'] == 'Menunggu') : ?>
            <th style="text-align: center;">Pilihan</th>
            <?php endif; ?>
          </thead>
          <tbody>
            <?php
              $total = 0;
              foreach ($detail as $data) :
                echo "<tr>
                        <td>".$data['namaBarang']."</td>
                        <td align='center'>".$data['jumlah']."</td>       
                        <td align='right'>".rp($data['hargaBeli'])."</td>
                        <td align='right'>".rp($data['subtotal'])."</td>";
                $total += $data['subtotal'];
                if ($beli['status'] == 'Menunggu') : ?>
                      <td align="center">
                          <a href="<?php echo site_url('pembelian/formUbahPembelian/'.$beli['id'].'/'.$data['idBarang']); ?>" class="btn btn-sm btn-outline-warning">&nbsp;&nbsp;<i class="fa fa-fw fa-pencil"></i></a>
                          &nbsp;
                          <a href="#hapus<?php echo $data['idBarang']; ?>" class="btn btn-sm btn-outline-danger" data-toggle="modal">&nbsp;&nbsp;<i class="fa fa-fw fa-trash"></i></a>
                      </td>
                <?php endif; ?>  
                    </tr>
            <?php endforeach; ?>

            <tr>
              <td colspan="3" align="center"><b>Total</b></td>
              <td align="right"><b><?php echo rp($total); ?></b></td>
              <?php 
                if ($beli['status'] == 'Menunggu') : 
                  echo "<td></td>";
                endif;
              ?> 
            </tr>
          </tbody>
        </table>

        <?php if ($beli['status'] == 'Menunggu') : ?>
          <a href="#modal" class="btn btn-outline-info" data-toggle="modal"><i class="fa fa-fw fa-save"></i> Selesai</a>
        <?php endif; ?>

      </div>
    </div>
  </div>
  <?php } ?>
</div>