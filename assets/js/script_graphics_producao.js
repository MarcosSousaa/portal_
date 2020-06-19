function geraGrafico(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/graphics/producao_graphics?" + data;     
    window.open(url, "graphics", "width=1024,height=800");
    return false;
}
$(document).ready(function () {
	$('.grafico').click(function(){
		$('#graficoProducao').submit(geraGrafico($('#graficoProducao')));
		return false;
	});
	
});