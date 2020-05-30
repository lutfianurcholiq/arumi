function choose() {
	var harga
	rasa_id 	=	document.getElementById('rasa').value
	harga 		=	$("#rasa option:selected").data('harga')
	harga1 		=	$("#rasa option:selected").data('harga1')
	document.getElementById('hargavalue').value = harga
	document.getElementById('harga').value = harga1
}