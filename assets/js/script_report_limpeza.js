function geraReport(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/limpeza_report?" + data;         
    window.open(url, "Reports", "width=1024,height=800");
    return false;
}
function geraPdf(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/limpeza_pdf?" + data;  
    window.open(url, "Reports", "width=700,height=500");
    return false;
}
$(document).ready(function () {
	$('.pdf').click(function(){
		$('#frmLimpeza').submit(geraPdf($('#frmLimpeza')));
		return false;
	});

	$('.report').click(function(){
		$('#frmLimpeza').submit(geraReport($('#frmLimpeza')));
		return false;
	});

	/* FUNCAO PARA SELECIONAR OPTION DE ACORDO COM A ESCOLHA*/
	var maquinas = {
		EXT : ['EXT01','EXT02','EXT03','EXT04','EXT05'],
		DIS : ['REF01','REF02','REF03','REF04','REF05'],		
		ACA : ['REB01','REB02','REB03','REB04','REB05','REB06','REB07','RAC01','RAC02'],
		MIS : ['GRA01','GRA02','GRA03','MIS01','MIS02'],
		PRA : ['PRA01','PRA02'],
		IMP : ['IMP01','IMP02'],
		TUB : ['TUB08','TUB09','TUB10','TUB11','TUB12','TUB13','TUB14','TUB15','TUB16','EST01']
	};

	maquina = $('#maq option');
	$('#dep').on('change', function(event){
		var dep = this.value;
		maquina.each(function(index,el){
	 		// Verifica se a maquina atual existe na relação
      		// de maquians para o departamento selecionado
      		if(maquinas[dep].indexOf(el.value) == -1) // Não existe
      			$(el).prop('disabled', true); // Desabilita a acomodação
      		else // Existe
        		$(el).prop('disabled', false); // Habilita a acomodação
		});
	}).change();
});