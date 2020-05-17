<?php $this->libs->rowOpen('', ''); ?>
<div class="sparkline10-list mt-b-30">
    <!-- <div class="sparkline10-hd">
        <div class="main-sparkline10-hd">
            <h1>Bla bla bla</h1>
        </div>
    </div> -->
    <div class="sparkline10-graph">
        <div class="basic-login-form-ad">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="basic-login-inner inline-basic-form">
                        <form action="<?php echo $url; ?>" method="POST">
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <select class="form-control chosen-select" name="coa">
                                            <option selected="" disabled="">Pilih CoA</option>
                                            <?php
                                                foreach ($coa as $data) {
                                                    echo "<option value = " . $data['kode_coa'] . ">" . $data['nama_coa'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                        <?php echo form_error('coa'); ?>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <select class="form-control chosen-select" name="bulan">
                                            <option value="">Pilih Bulan</option>
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
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <select class="form-control chosen-select" name="tahun">
                                            <option selected="" disabled="">Pilih Tahun</option>
                                            <?php 
                                                foreach ($tahun as $data) {
                                                    echo "<option value=".$data['tahun'].">".$data['tahun']."</option>";
                                                    
                                                }
                                            ?>
                                        </select>
                                        <?php echo form_error('tahun'); ?>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                    <div class="login-horizental lg-hz-mg"><button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->libs->rowClose(); ?>