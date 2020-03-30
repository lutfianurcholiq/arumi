<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="product-status-wrap">
    <h4><i class="<?php echo $icon; ?>"></i> <?php echo $judul; ?></h4>
    <div id="toolbar">
      Data-data <?php echo $judul; ?>:
    </div>
    <div class="add-product">
      <a href="#" id="btn-tambah" class="Primary mg-b-10" data-toggle="modal" data-target="#form-modal"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</a>
    </div>

    <div id="view">
      <?php $this->load->view('master/pelanggan/list', $hasil); ?>
    </div>
  </div>
</div>

<?php $this->bo->modalOpen(); ?>
  <form>

    <div class="modal-body">

      <?php $this->bo->inputOpen('Nama', 'required'); ?>
        <input class="form-control" type="text" id="namaPelanggan" name="namaPelanggan" placeholder="Contoh: Bunga Citra Lestari" onkeypress="return hanyaHuruf(event)">
        <span class="namaPelanggan"></span>
      <?php $this->bo->inputClose(); ?>

      <?php $this->bo->inputOpen('No HP', 'required'); ?>
        <input class="form-control" type="text" id="noHp" name="noHp" placeholder="Contoh: 0878501234566" onkeypress="return hanyaAngka(event)">
        <span class="noHp"></span>
      <?php $this->bo->inputClose(); ?>

      <?php $this->bo->inputOpen('Alamat', 'required'); ?>
        <textarea class="form-control" type="text" id="alamat" name="alamat" rows="3" placeholder="Contoh: Jl Kepanjin"></textarea>
        <span class="alamat"></span>
      <?php $this->bo->inputClose(); ?>

    </div>

    <?php $this->bo->buttonModal(); ?>
  </form>
<?php $this->bo->modalClose(); ?>
