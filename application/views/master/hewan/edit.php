<?php $this->bo->rowOpen('Edit '.$judul); ?>
  <form action="<?php echo $url;?>" method="post">

  <input class="form-control col-md-12" type="hidden" name="id" value="<?php echo $hasil['id']; ?>">

  <?php $this->bo->inputOpen('Nama Pelanggan', 'required'); ?>
    <input class="form-control col-md-12" type="text" name="namaPelanggan" placeholder="Ex: Kobe Bryant" value="<?php echo $hasil['namaPelanggan']; ?>" onkeypress="return hanyaHuruf(event)">
     <?php echo form_error('namaPelanggan'); ?>
  <?php $this->bo->inputClose(); ?>

  <?php $this->bo->inputOpen('No HP', 'required'); ?>
    <input class="form-control col-md-12" type="text" name="noHp" placeholder="Ex: 087830443499" value="<?php echo $hasil['noHp']; ?>" onkeypress="return hanyaAngka(event)">
    <?php echo form_error('noHp'); ?>
  <?php $this->bo->inputClose(); ?>

  <?php $this->bo->inputOpen('Alamat', 'required'); ?>
    <textarea class="form-control col-md-12" type="text" name="alamat" rows="3" placeholder="Ex: www.example.co.id"><?php echo $hasil['alamat']; ?></textarea>
  <?php $this->bo->inputClose(); ?>

  <?php $this->bo->inputOpen('Status', ''); ?>
    <select class="form-control custom-select-value" name="status">
      <option selected="" value="<?php $hasil['status']; ?>"><?php echo $hasil['status']; ?></option>
      <?php if($hasil['status'] == 'Aktif') : ?>
        <option value="Non-Aktif">Non-Aktif</option>
      <?php else : ?>
        <option value="Aktif">Aktif</option>
      <?php endif; ?>
    </select>
  <?php $this->bo->inputClose(); ?>

  <?php $this->bo->buttonSubmit($back); ?>

  </form>
<?php $this->bo->rowClose(); ?>