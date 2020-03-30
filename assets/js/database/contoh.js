"use strict"

var id = 0

$(document).ready(function () {
	$('#loading-simpan, #loading-ubah, #pesan-error, #pesan-sukses').hide()

	// Fungsi ini akan dipanggil ketika tombol edit diklik
	$('#view').on('click', '.btn-form-ubah', function () { // Ketika tombol dengan class btn-form-ubah pada div view di klik
		id = $(this).data('id') // Set variabel id dengan id yang kita set pada atribut data-id pada tag button edit
		$('#btn-simpan').hide() // Sembunyikan tombol simpan
        $('#btn-ubah').show() // Munculkan tombol ubah 
		$('#status').show()
		// Set judul modal dialog menjadi Form Ubah Data
		$('#modal-title').html('Ubah data pelanggan')
		var tr            = $(this).closest('tr') // Cari tag tr paling terdekat
		var namaPelanggan = tr.find('.namaPelanggan-value').val()
		var noHp          = tr.find('.noHp-value').val()
		var alamat        = tr.find('.alamat-value').val()
		$('#namaPelanggan').val(namaPelanggan) // Set value dari textbox nama yang ada di form
		$('#noHp').val(noHp) // Set value dari textbox nama yang ada di form
		$('#alamat').val(alamat) // Set value dari textbox nama yang ada di form
	})

	$('#btn-tambah').click(function () { // Ketika tombol tambah diklik
		$('#btn-ubah').hide() // Sembunyikan tombol ubah
		$('#btn-simpan').show() // Munculkan tombol simpan
		$('#status').hide()
		// Set judul modal dialog menjadi Form Simpan Data
		$('#modal-title').html('Simpan data pelanggan')
    })
    
	$('#btn-simpan').click(function () { // Ketika tombol simpan di klik
        $('#loading-simpan').show() // Munculkan loading simpan
		$.ajax({
			url: base_url + 'pelanggan/tambahPelanggan', // URL tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: $("#form-modal form").serialize(), // Ambil semua data yang ada didalam tag form
			dataType: 'json',
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType('application/jsoncharset=UTF-8')
				}
			},
			success: function (response) { // Ketika proses pengiriman berhasil
				$('#loading-simpan').hide() // Sembunyikan loading simpan
				if (response.status == 'sukses') { // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
					$('#view').html(response.html)
					/*
					 * Ambil pesan suksesnya dan set ke div pesan-sukses
					 * Lalu munculkan div pesan-sukes nya
					 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
					 */
                    $('#form-modal').modal('hide')
                    Lobibox.notify('success', {
                        size: 'mini',
                        msg: 'Data berhasil disimpan.'
                    }).show()
				} else { // Jika statusnya = gagal
					/*
					 * Ambil pesan errornya dan set ke div pesan-error
					 * Lalu munculkan div pesan-error nya
					 */
                    $('.namaPelanggan').html(response.namaPelanggan)
                    $('.noHp').html(response.noHp)
                    $('.alamat').html(response.alamat)
				}
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText) // munculkan alert
			}
		})
	})

	$('#btn-ubah').click(function () { // Ketika tombol ubah di klik
		$('#loading-ubah').show() // Munculkan loading ubah
		$.ajax({
			url: base_url + 'siswa/ubah/' + id, // URL tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: $("#form-modal form").serialize(), // Ambil semua data yang ada didalam tag form
			dataType: 'json',
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType('application/jsoncharset=UTF-8')
				}
			},
			success: function (response) { // Ketika proses pengiriman berhasil
				$('#loading-ubah').hide() // Sembunyikan loading ubah
				if (response.status == 'sukses') { // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
					$('#view').html(response.html)
					/*
					 * Ambil pesan suksesnya dan set ke div pesan-sukses
					 * Lalu munculkan div pesan-sukes nya
					 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
					 */
					$('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut()
					$('#form-modal').modal('hide') // Close / Tutup Modal Dialog
				} else { // Jika statusnya = gagal
					/*
					 * Ambil pesan errornya dan set ke div pesan-error
					 * Lalu munculkan div pesan-error nya
					 */
					$('#pesan-error').html(response.pesan).show()
				}
			}
		})
    })
    
	$('#form-modal').on('hidden.bs.modal', function (e) { // Ketika Modal Dialog di Close / tertutup
		$('#form-modal input, #form-modal select, #form-modal textarea').val('') // Clear inputan menjadi kosong
	})
})
