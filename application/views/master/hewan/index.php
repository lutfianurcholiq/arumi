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
      <?php $this->load->view('master/hewan/list', $hasil); ?>
    </div>
  </div>
</div>

<?php $this->bo->modalOpen(); ?>
  <form>

    <div class="modal-body" style="text-align: left;">

      <?php $this->bo->inputOpen('Nama', 'required'); ?>
        <input class="form-control" type="text" id="namaHewan" name="namaHewan" placeholder="Contoh: Bunga Citra Lestari" onkeypress="return hanyaHuruf(event)">
        <span class="namaHewan"></span>
      <?php $this->bo->inputClose(); ?>

      <?php $this->bo->inputOpen('Jenis', 'required'); ?>
        <select id="jenis" name="jenis" class="form-control chosen-select" tabindex="-1">
          <option value="" disabled="" selected="">Contoh: Herbivora</option>
          <option value="Herbivora">Herbivora</option>
          <option value="Karnivora">Karnivora</option>
          <option value="Omnivora">Omnivora</option>
        </select>
        <span class="jenis"></span>
      <?php $this->bo->inputClose(); ?>

      <?php $this->bo->inputOpen('Keterangan', 'required'); ?>
        <textarea class="form-control" type="text" id="keterangan" name="keterangan" rows="3" placeholder="Contoh: Jl Kepanjin"></textarea>
        <span class="keterangan"></span>
      <?php $this->bo->inputClose(); ?>

    </div>

    <?php $this->bo->buttonModal(); ?>
  </form>
<?php $this->bo->modalClose(); ?>
