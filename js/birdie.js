$(document).ready(function()
{
	// 輸入名稱點擊
	$('#enter_btn').click(function(){
		var my_name = document.getElementById('input_name').value;
		if(my_name !== ""){
			document.getElementById('birdie_name').innerHTML = my_name;
			$('.enter').hide();
			$('.canvas_area').show();
		}
		else{
			$('#remind').show();
		};
	});
});

// 改樣式
function change( part,style )
{
	//console.log( part + " - " + style);
	$("#"+part).attr('class',style);
	
	if (part == "canvas") {
		$("#"+part).css("background-image", ""); 
	};
	changeURL()
}

// 修改網址
function changeURL() {
	var token = '';
	token += 'name_' + $('#birdie_name').html() + '-';
	token += 'canvas_' + $('#canvas').attr('class') + '-';
	if ($('#canvas').attr('class') == 'image') {
		token += 'image_' + $('#canvas').css('background-image') + '-';
	} else {
		token += 'image_' + "empty" + '-';
	}
	token += 'birdie_' + $('#birdie').attr('class') + '-';
	token += 'eye_' + $('#eye').attr('class') + '-';
	token += 'blusher_' + $('#blusher').attr('class') + '-';
	token += 'beak_' + $('#beak').attr('class') + '-';
	token += 'wing_' + $('#wing').attr('class');
	token = window.btoa(token);
	token = 'birdie_generator.php?k=' + token;
	window.history.pushState("", "", token);
}