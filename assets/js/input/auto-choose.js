function choose() {
	var harga
	rasa_id 	=	document.getElementById('rasa').value
	harga 		=	$("#rasa option:selected").data('harga')
	document.getElementById('hargavalue').value = harga
}