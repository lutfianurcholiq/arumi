<?php $this->bo->tittleMenu($judul, $menu, $icon); $this->bo->rowOpen(6);  ?>
  <form id="<?php echo $validator; ?>" action="<?php echo $url; ?>" method="post">

    <input class="form-control col-md-12" type="hidden" name="id" value="<?php echo $beli['idPembelian']; ?>" readonly>
    <input class="form-control col-md-12" type="hidden" name="idBarang" value="<?php echo $beli['idBarang']; ?>" readonly>

  	<?php $this->bo->inputOpen('Kode Pembelian', ''); ?>
    	<input class="form-control col-md-12" type="text" value="<?php echo "".$beli['pembelian']."-".jumlahAngka($beli['idPembelian']).""; ?>" readonly>
    <?php $this->bo->inputClose(); ?>

    <?php $this->bo->inputOpen('Barang', ''); ?>
    	<input class="form-control col-md-12" type="text" value="<?php echo $beli['namaBarang']; ?>" readonly>
    <?php $this->bo->inputClose(); ?>

    <?php $this->bo->inputOpen('Harga', 'required'); ?>
      <input class="form-control col-md-12" type="text" id="rupiah0" name="hargaBeli" value="<?php echo $beli['hargaBeli']; ?>">
    <?php $this->bo->inputClose(); ?>

    <?php $this->bo->inputOpen('Jumlah', 'required'); ?>
      <input class="form-control col-md-12" type="text" name="jumlah" value="<?php echo $beli['jumlah']; ?>">
    <?php $this->bo->inputClose(); ?>

    <?php $this->bo->buttonBack($back); ?>
  </form>
<?php $this->bo->rowClose();  ?>  