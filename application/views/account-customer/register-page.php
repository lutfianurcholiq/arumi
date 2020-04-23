<div class="error-pagewrap">
<div class="error-page-int">
    <div class="text-center custom-login">
        <h3>Registration</h3>
        <p>bla bla bla!</p>
    </div>
    <div class="content-error">
        <div class="hpanel">
            <div class="panel-body">
                <form action="<?php echo $url; ?>" method="POST">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Nama <span class='text-danger'>*</span></label>
                            <input class="form-control" name="nama_pelanggan" placeholder="Contoh: Angelina Jolie" value="<?php echo set_value('nama_pelanggan'); ?>" onkeypress="return alphabet(event)">
                            <?php echo form_error('nama_pelanggan'); ?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>No WA <span class='text-danger'>*</span></label>
                            <input class="form-control" name="no_wa" placeholder="Contoh: 087830661966" value="<?php echo set_value('no_wa'); ?>" onkeypress="return numeric(event)">
                            <?php echo form_error('no_wa'); ?>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Alamat <span class='text-danger'>*</span></label>
                            <textarea class="form-control" type="text" name="alamat" rows="3" placeholder="Contoh: Jl Kepanjin Sumenep No 98"><?php echo set_value('alamat'); ?></textarea>
                            <?php echo form_error('alamat'); ?>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Username <span class='text-danger'>*</span></label>
                            <input class="form-control" name="username" placeholder="Contoh: Uchiha_Madara">
                            <?php echo form_error('username'); ?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Password <span class='text-danger'>*</span></label>
                            <input type="password" class="form-control" name="password" placeholder="**********">
                            <?php echo form_error('password'); ?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Repeat Password <span class='text-danger'>*</span></label>
                            <input type="password" class="form-control" name="repassword" placeholder="**********">
                            <?php echo form_error('repassword'); ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-default" onclick="window.location.href='<?php echo site_url('landing'); ?>'">Kembali</button>
                        <button type="submit" class="btn btn-success loginbtn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center login-footer">
        <p>Copyright © <?php echo date('Y') ?>. All rights reserved. Template by <a href="https://www.instagram.com/haibilll/">Colorlib</a></p>
    </div>
</div>
</div>