<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>Selamat Datang</h3>
				<p>Inilah mahakarya saya!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo $url; ?>" id="loginForm" method="POST">
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
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © <?php echo date('Y') ?>. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
			</div>
		</div>   
  </div>