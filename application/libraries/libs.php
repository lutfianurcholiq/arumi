<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class libs {

	public function tittleMenu($judul, $menu) {
		if ($judul != ucwords('beranda')) {
			$a  = "<li> $menu <span class='bread-slash'>/</span> </li>";
			$b = "<li> <span class='bread-blod'>$judul </span> </li>";
		} else {
			$a = "";
			$b = "";
		}
		echo "	<div class='breadcome-area'>
					<div class='container-fluid'>
						<div class='row'>
							<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
							<div class='breadcome-list single-page-breadcome'>
								<div class='row'>
								<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
									<div class='breadcome-heading'>
									</div>
								</div>
								<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
									<ul class='breadcome-menu'>
									<li>
										<a href='#'>Beranda</a> <span class='bread-slash'>/</span>
									</li>
									$a
									$b
									</ul>
								</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>";
	}
	public function rowOpen($judul, $menu) {
		if ($judul == ucwords('beranda')) {
			$menu  = '';
			$judul = '';
		}
		echo 	"<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
					<div class='product-status-wrap'>
						<h4>$menu $judul</h4>
						<div id='toolbar'> </div>";
	}
	public function rowClose() {
		echo 	"	</div>
				</div>";
	}
	public function inputOpen($nama, $field) {
		$nama = ucwords($nama);
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
	function thead($thead) {
        $th = count($thead); 
		echo "	<thead>
					<tr>";
        for ($i = 0; $i < $th; $i++) { 
			if ($thead[$i] == 'no') {
				echo "<th style='width: 5%; text-align: center;'>".ucwords($thead[$i])."</th>";
			} 
			elseif ($thead[$i] == 'aksi' OR $thead[$i] == 'header' OR $thead[$i] == 'kode coa') {
				echo "<th style='width: 10%; text-align: center;'>".ucwords($thead[$i])."</th>";
			} 
			else {
				echo "<th>".ucwords($thead[$i])."</th>";
			}
        }
		echo "		</tr>
				</thead>";
    }
	public function notify($msg) {
		echo "	<div class='alert alert-success'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					<strong>Sukses!</strong> $msg.
				</div>";
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
	public function modalOpenOther($id_modal) {
		idModal($id_modal);
		echo "	<div id='$id_modal' class='modal modal-edu-general fullwidth-popup-InformationproModal PrimaryModal-bgcolor' fade role='dialog'>
					<div class='modal-dialog'>
						<div class='modal-content'>
								<div class='modal-close-area modal-close-df'>
									<a class='close' data-dismiss='modal' href='#'><i class='fa fa-close'></i></a>
								</div>";
	}
	public function modalClose() {
		echo 	"		</div>
  					</div>
				</div>";
	}
	public function buttonModal() {
		echo "	<div class='modal-footer'>
					<button type='button' class='btn btn-custon-four btn-success'><i class='fa fa-fw fa-lg fa-check'></i>Simpan</button>
					<button type='button' class='btn btn-custon-four btn-primary'><i class='fa fa-fw fa-lg fa-check'></i>Ubah</button>
				</div>";
	}
	public function buttonSubmit($tabel) {
		echo "	<div class='form-group-inner'>
					<div class='login-btn-inner'>
						<div class='row'>
							<div class='col-lg-3'></div>
							<div class='col-lg-9'>
								<div class='login-horizental cancel-wp pull-left form-bc-ele'>
									<a class='btn btn-custon-four btn-default' href='$tabel' style='margin: 1px'><i class='fa fa-arrow-circle-left'></i> Kembali</a>
									&nbsp;&nbsp;
									<button type='submit' class='btn btn-custon-four btn-primary'><i class='fa fa-check-circle'></i> Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>";
	}
	public function buttonSubmit01($tabel) {
		echo "	<div class='form-group-inner'>
					<div class='login-btn-inner'>
						<div class='row'>
							<div class='col-lg-3'></div>
							<div class='col-lg-9'>
								<div class='login-horizental cancel-wp pull-left form-bc-ele'>
									<a class='btn btn-custon-four btn-default' href='$tabel' style='margin: 1px'><i class='fa fa-arrow-circle-left'></i> Kembali</a>
									&nbsp;&nbsp;
									<button type='submit' class='btn btn-custon-four btn-primary'><i class='fa fa-plus-circle'></i> Tambah</button>
								</div>
							</div>
						</div>
					</div>
				</div>";
	}
	public function buttonAdd($url) {
		echo "<a href='$url' id='btn-tambah' class='Primary mg-b-10'><i class='fa fa-plus' aria-hidden='true'></i> Tambah</a>";
	}
}