<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>Haloo, Selamat Datang</h3>
				<p>bla bla bla!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo $url; ?>" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Masukkan Username Anda" title="" name="username" class="form-control">
                                <?php echo form_error('username'); echo $this->session->flashdata('pesan1'); ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="" placeholder="******" name="password" class="form-control">
                                <?php echo form_error('password'); echo $this->session->flashdata('pesan2'); ?>
                            </div>
                            <?php 
                                if ($this->uri->segment(3) == 'pelanggan') {
                                    echo "<input type='hidden' name='akses' value='pelanggan' readonly>" ;
                                }
                            ?>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © <?php echo date('Y') ?>. All rights reserved. Template by <a href="https://www.instagram.com/haibilll/">Colorlib</a></p>
			</div>
		</div>   
  </div>