$(document).ready(function(){
	$.ajax({
		type: 'POST',
		url: 'seleccionar/gimnasios_select.php',
		data: {'peticion': 'gimnasios_select'}
	})
	.done(function(lista_gimnasios){
		$('#lista_gimnasios').html(lista_gimnasios)
	})
	.fail(function(){
		alert('Hay un error al cargar los gimnasios')
	})
})