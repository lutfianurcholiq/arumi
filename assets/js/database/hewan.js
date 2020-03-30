var id = 0

$(document).ready(function () {
    "use strict"
	$('#loading-simpan').hide()

	$('#view').on('click', '.btn-form-ubah', function () { 
		id = $(this).data('id') 
		$('#btn-simpan').hide() 
        $('#btn-ubah').show() 
		$('#modal-title').html('Ubah data hewan')
		var tr         = $(this).closest('tr')
		var namaHewan  = tr.find('.namaHewan-value').val()
		var jenis      = tr.find('.jenis-value').val()
		var keterangan = tr.find('.keterangan-value').val()
		$('#namaHewan').val(namaHewan)
		$('#jenis').val(jenis) 
		$('#keterangan').val(keterangan) 
	})

	$('#btn-tambah').click(function () { 
		$('#btn-ubah').hide()
		$('#btn-simpan').show() 
		
		$('#modal-title').html('Simpan data hewan')
    })
    
	$('#btn-simpan').click(function () { 
        $('#loading-simpan').show() 
		$.ajax({
			url: base_url + 'hewan/create', 
			type: 'POST', 
			data: $("#form-modal form").serialize(), 
			dataType: 'json',
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType('application/jsoncharset=UTF-8')
				}
			},
			success: function (response) {
				$('#loading-simpan').hide() 
				if (response.status == 'sukses') { 
					$('#view').html(response.html)
                    $('#form-modal').modal('hide')
                    Lobibox.notify('success', {
                        size: 'mini',
                        msg: 'Data berhasil disimpan.'
                    }).show()
                } 
                else {
                    $('.namahewan').html(response.namahewan)
                    $('.jenis').html(response.jenis)
                    $('.keterangan').html(response.keterangan)
				}
			},
			error: function (xhr, ajaxOptions, thrownError) { 
				alert(xhr.responseText) 
			}
		})
	})

	$('#btn-ubah').click(function () { 
		$('#loading-ubah').show() 
		$.ajax({
			url: base_url + 'hewan/update/' + id,
			type: 'POST', 
			data: $("#form-modal form").serialize(),
			dataType: 'json',
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType('application/jsoncharset=UTF-8')
				}
			},
			success: function (response) { 
				$('#loading-ubah').hide() 
				if (response.status == 'sukses') { 
					$('#view').html(response.html)
					$('#form-modal').modal('hide')
					Lobibox.notify('success', {
                        size: 'mini',
                        msg: 'Data berhasil diubah.'
                    }).show() 
				} else { 
					$('#pesan-error').html(response.pesan).show()
				}
			}
		})
    })
    
	$('#form-modal').on('hidden.bs.modal', function (e) { 
		$('#form-modal input, #form-modal select, #form-modal textarea').val('') 
	})
})
