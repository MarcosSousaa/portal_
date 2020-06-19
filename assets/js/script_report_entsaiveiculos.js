function geraReport(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/entsaiveiculos_report?" + data;       
    window.open(url, "Reports", "width=1024,height=800");
    return false;
}
$(document).ready(function () {
	$('.report').click(function(){
		$('#frmEntSaiVeiculos').submit(geraReport($('#frmEntSaiVeiculos')));
		return false;
	})
});

