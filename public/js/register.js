$(document).ready(function() {
	//出生日期的表单内容年份原始数据
	for (i = 1995; i > 1969; i--) {
		$('#born').append($('<option />').val(i).html(i));
	}




});
