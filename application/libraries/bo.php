<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bo {

	public function tittleMenu($judul, $menu, $icon) {
		echo "	<div class='app-title'>
					<div>
				    	<h1><i class='fa $icon'></i> $judul</h1>
				  	</div>
				  	<ul class='app-breadcrumb breadcrumb side'>
				    	<li class='breadcrumb-item'><i class='fa fa-home fa-lg'></i></li>
				    	<li class='breadcrumb-item'>$menu</li>
				    	<li class='breadcrumb-item active'><a href='#'>$judul</a></li>
				  	</ul>
				</div>";
	}
	public function rowOpen($judul) {
		echo 	"<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
					<div class='sparkline12-list'>
						<div class='sparkline12-hd'>
							<div class='main-sparkline12-hd'>
								<h1>$judul</h1>
							</div>
						</div>
						<div class='sparkline12-graph'>
							<div class='basic-login-form-ad'>
								<div class='row'>
									<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
										<div class='all-form-element-inner'>";
	}
	public function rowClose() {
		echo 	"						</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";
	}
	public function inputOpen($nama, $field) {
		echo "<div class='form-group-inner'>
				<div class='row'>
					<div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>";
		if ($field == '') {
			echo "<label class='login2 pull-right pull-right-pro'>$nama</label>";	
		} else { # $field == 'required'
			echo "<label class='login2 pull-right pull-right-pro'>$nama <span class='text-danger'>*</span></label>";	
		}
		echo "	</div>
			<div class='col-lg-9 col-md-9 col-sm-9 col-xs-12'>";
	}
	public function inputPasswordOpen($nama) {
		echo "	<div class='form-group row'>
				    <label class='control-label col-md-2'><strong>$nama</strong></label>
				    <div class='input-group col-md-10'>";	
	}		
    public function inputPasswordClose() {
	    echo "		<div class='input-group-prepend'><span class='input-group-text'><i class='fa fa-eye'></i></span></div>
					</div>
	    		</div>";
    }
	public function inputClose() {
		echo "			</div>
					</div>
				</div>";	
	}
	public function inputEdit($id) {
		echo "	<input class='form-control col-md-12' type='hidden' name='id' value='$id'>
				<input class='form-control col-md-12' type='hidden' name='aksi' value='edit'>	";
	}
	public function modalOpen() {
		echo "	<div id='form-modal' class='modal modal-edu-general default-popup-WarningModal fade' role='dialog'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header header-color-modal bg-color-1'>
								<h4 id='modal-title' class='modal-title'></h4>
								<div class='modal-close-area modal-close-df'>
									<a class='close' data-dismiss='modal' href='#'><i class='fa fa-close'></i></a>
								</div>
							</div>";
	}
	public function modalOpenOther($judul) {
		echo "	<div class='bs-component'>
					<div class='modal' id='modal'>
				    	<div class='modal-dialog modal-sm' role='document'>
				    		<div class='modal-content'>
				        		<div class='modal-header'>
				          			<h5 class='modal-title'>$judul</h5>
				        		</div>";
	}
	public function modalClose() {
		echo 	"		</div>
  					</div>
				</div>";
	}
	public function buttonModal() {
		echo "	<div class='modal-footer'>
					<div id='loading-simpan' class='pull-left'>
                        <b>Sedang menyimpan...</b>
                    </div>

					<button type='button' id='btn-simpan' class='btn btn-custon-four btn-success'><i class='fa fa-fw fa-lg fa-check'></i>Simpan</button>
					<button type='button' id='btn-ubah' class='btn btn-custon-four btn-primary'><i class='fa fa-fw fa-lg fa-check'></i>Ubah</button>
				</div>";
	}
	public function buttonSubmit($url) {
		echo "	<div class='form-group-inner'>
					<div class='login-btn-inner'>
						<div class='row'>
							<div class='col-lg-3'></div>
							<div class='col-lg-9'>
								<div class='login-horizental cancel-wp pull-left form-bc-ele'>
									<a class='btn btn-custon-four btn-default' href='$url'><i class='fa fa-fw fa-lg fa-times-circle'></i>Kembali</a>
									&nbsp;&nbsp;
									<button type='submit' class='btn btn-custon-four btn-primary'><i class='fa fa-fw fa-lg fa-check-circle'></i>Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>";
	}
}