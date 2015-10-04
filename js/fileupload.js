$(document).ready(function() {

	//$('#pic_submit').click(function(){
	$('.canvas_selector').on('change','#pic_upload', function(){
		var ext = new Array();
		var filearr = new Array();
		ext = $('#pic_upload').val().split('.');
		filearr = ext[0].split('\\');
		if( !checkChinese(filearr[2]) ){
			alert('檔名不得為中文');
			return;
		}
		var filetype = ext[1].toLowerCase();
		if($.inArray(filetype, ['png','jpg','jpeg']) == -1) {
			alert('只允許上傳 JPG 或 PNG 影像檔');
			return;
		}
		if ( !checkpics() ) {
			alert('圖片請勿超過 5MB');
			return;
		}

		$('#canvas').attr('class','image');
		$.ajaxFileUpload({
			url: 'upload.php', 
			secureuri: false,
			fileElementId: 'pic_upload',
			dataType: 'json',
			success: function(data) {
				if( data['status'] == 'success' ) {
					$('#canvas').css("background-image", "url("+ data['img'] +")");
					changeURL()
				}
				else {
					alert('發生錯誤，請稍後再試。');
				}
			}
		});
	});
});
function checkpics(){
	var size = 0;

	if( navigator.userAgent.indexOf("MSIE") > -1) {
		var obj = new ActiveXObject("Scripting.FileSystemObject");
		size = obj.getFile(document.getElementById("pic_upload").value).size;
	}
	else if ( navigator.userAgent.indexOf("Firefox") > -1 
			 || navigator.userAgent.indexOf("Chrome") > -1 
			 || navigator.userAgent.indexOf(".NET") > -1 
			 ||  navigator.userAgent.indexOf("Safari") > -1 ) {
		size = document.getElementById("pic_upload").files.item(0).size;
	}
	else {
		return false;
	}
	
	if( size > 5000000 ){
		alert("上傳檔案不得超過 5MB ");
		return false;
	}
		return true;
}
function checkChinese( str ) {
	// 驗證是否有中文字
	var regExp = /^[\u4E00-\u9FA5]+$/;
	if ( regExp.test(str) ) {
		return false;
	}
    else {
		return true;
	}
}