function geraReport(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/recebimentoColeta_report?" + data;         
    window.open(url, "Reports", "width=1024,height=800");
    return false;
}

$(document).ready(function () {
	$('.report').click(function(){
		$('#frmRecbColeta').submit(geraReport($('#frmRecbColeta')));
		return false;
	})
});