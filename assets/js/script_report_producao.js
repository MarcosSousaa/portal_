function geraReport(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/producao_report?" + data;     
    window.open(url, "Reports", "width=1024,height=800");
    return false;
}
function geraPdf(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/producao_pdf?" + data;  
    window.open(url, "Reports", "width=700,height=500");
    return false;
}
$(document).ready(function () {
	$('.pdf').click(function(){
		$('#frmProducao').submit(geraPdf($('#frmProducao')));
		return false;
	});

	$('.report').click(function(){
		$('#frmProducao').submit(geraReport($('#frmProducao')));
		return false;
	})
});