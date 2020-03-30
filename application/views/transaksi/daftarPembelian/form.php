<?php $this->bo->modalOpen($judul); ?>
  <form id="<?php echo $validator; ?>" action="<?php echo $url; ?>" method="post">

    <div class="modal-body">

      <?php $this->bo->inputOpen('Tanggal', ''); ?>
        <input class="form-control col-md-12" type="text" name="" value="<?php echo date("d-m-Y"); ?>" readonly>
      <?php $this->bo->inputClose(); ?>

      <?php echo $this->bo->inputOpen('Pemasok', 'required'); ?>
        <select class="form-control" id="exampleSelect1" name="idPemasok" style="width: 100%;">
          <option selected="" disabled="">Pilih Pemasok</option>
          <?php 
            foreach ($pemasok as $data) :
                echo "<option value=".$data['id'].">".$data['namaPemasok']."</option>";
            endforeach;
          ?>
        </select>
      <?php echo $this->bo->inputClose(); ?>

    </div> 

    <?php $this->bo->buttonModal(); ?>

  </form>
<?php $this->bo->modalClose(); ?>