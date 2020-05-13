<?php

	function udahLogin() {
        $ci = get_instance();
        if ($ci->session->userdata('username') || $ci->uri->segment(2) == '_login') {
            redirect('beranda');
        }
    }
	
	function rp($a) {
		if(!is_numeric($a))return NULL;
		$jumlah_desimal ="2";
		$pemisah_desimal =",";
		$pemisah_ribuan =".";
		$angka = "Rp.". number_format($a, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
		return $angka;
	}

    function jumlahAngka($angka) {
        $jumlah = strlen($angka);
        switch ($jumlah) {
            case 1: return "000".$angka; break;
            case 2: return "00".$angka; break;
            case 3: return "0".$angka; break;
            default: return $angka; break;
        }
    }

    function flashdata($message) {
        $ci    = get_instance();
        $notif =  $ci->session->set_flashdata('sukses', "<div id='pesan-sukses' class='alert alert-success alert-st-one' role='alert'>
                                                            <p class='message-mg-rt message-alert-none'><strong>Sukses!</strong> $message.</p>
                                                        </div>");
        return $notif;
    }

    function noWa($inputan) {
        $ambil = substr($inputan, 0);
		$sisa  = substr($inputan, 1, 11);
		$nol   = str_replace($ambil, "62", $inputan);
        $wa    = $nol.$sisa;
        return $wa;
    }

    function noHp($inputan) {
        $ambil1 = substr($inputan, 0); # ambil 6
        $ambil2 = substr($inputan, 1); # ambil 2
		$sisa  = substr($inputan, 2, 11);
		$nol   = str_replace($ambil1, "0", $inputan);
        $hp    = $nol.$sisa;
        return $hp;
    }

    function idModal($id_modal) {
        switch ($id_modal) {
			case 'modal-selesai':
				return $id_modal = 'modal-selesai';
            break;
            case 'modal-btkl':
				return $id_modal = 'modal-btkl';
			break;
			default:
				return $id_modal;
			break;
		}
    }

    function space($text) { # untuk spasi di jurnal
        $spasi = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        return $spasi.$text;
    }

	function shortdate_indo($tgl) {
        $ubah		=	gmdate($tgl, time()+60*60*8);
        $pecah		=	explode("-",$ubah);
        $tanggal	=	$pecah[2];
        $bulan		=	short_bulan($pecah[1]);
        $tahun		=	$pecah[0];
        return $tanggal.'-'.$bulan.'-'.$tahun;
    }
    
    function potongan($nominal) {
        $potongan = 0.1;
        return $nominal * $potongan;
    }

    function total($nominal) {
        $potongan = $nominal * 0.1;
        return $nominal - $potongan;
    }

    function short_bulan($bln) {
        switch ($bln) {
            case 1: return $bln = "01"; break;
            case 2: return $bln = "02"; break;
            case 3: return $bln = "03"; break;
            case 4: return $bln = "04"; break;
            case 5: return $bln = "05"; break;
            case 6: return $bln = "06"; break;
            case 7: return $bln = "07"; break;
            case 8: return $bln = "08"; break;
            case 9: return $bln = "09"; break;
            case 10: return $bln = "10"; break;
            case 11: return $bln = "11"; break;
            case 12: return $bln = "12"; break;
        }
    }

    function bulan($bulan) {
        $nama_bulan = "";
        switch ($bulan) {
            case '01' :
            case 'January':
                return $nama_bulan = 'Januari';
            break;
            case '02' :
            case 'February':
                return $nama_bulan = 'Februari';
            break;
            case '03' :
            case 'March':
                return $nama_bulan = 'Maret';
            break;
            case '04' :
            case 'April':
                return $nama_bulan = 'April';
            break;
            case '05' :
            case 'May':
                return $nama_bulan = 'Mei';
            break;
            case '06' :
            case 'June':
                return $nama_bulan = 'Juni';
            break;
            case '07' :
            case 'July':
                return $nama_bulan = 'Juli';
            break;
            case '08' :
            case 'August':
                return $nama_bulan = 'Agustus';
            break;
            case '09' :
            case 'September':
                return $nama_bulan = 'September';
            break;
            case '10' :
            case 'October':
                return $nama_bulan = 'Oktober';
            break;
            case '11' :
            case 'November':
                return $nama_bulan = 'November';
            break;
            case '12' :
            case 'December':
                return $nama_bulan = 'Desember';
            break;
            default:
                return $nama_bulan = 'Salah';
            break;
        }        
    }

?>