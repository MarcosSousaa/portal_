function geraReport(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/veiculos_report?" + data;      
    window.open(url, "Reports", "width=1024,height=800");
    return false;
}

$(document).ready(function () {
	$('.report').click(function(){
		$('#frmVeiculos').submit(geraReport($('#frmVeiculos')));
		return false;
	})
});