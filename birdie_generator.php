<?php
$token = '';
$use_image = false;
$pressd = array();

// 預設 class
$recoed['name'] = '';
$recoed['canvas'] = 'empty';
$recoed['image'] = 'empty';
$recoed['birdie'] = 'one';
$recoed['eye'] = 'one';
$recoed['blusher'] = 'one';
$recoed['beak'] = 'one';
$recoed['wing'] = 'one';



if (!empty($_GET['k']) && $_GET['k'] != '')
{
	$token = base64_decode($_GET['k']);
	$token_array = explode("-", $token);
	if (count($token_array) == count($recoed)) {
		foreach ($token_array as $key => $value) {
			$part_style = explode("_", $value);
			if ($part_style[0] == 'canvas' && $part_style[1] == 'image') {
				$use_image = true;
			}
			$recoed[$part_style[0]] = $part_style[1];
		}
	} else {
		header("Location:http://www.google.com");
	}
}
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!-- <link rel="shortcut icon" href="favicon.ico"> -->
<link rel="stylesheet"  type="text/css" href="css/normalize.css" />
<link rel="stylesheet"  type="text/css" href="css/style.css" />
<title>胖啾啾產生器</title>
</head>
<body>
   <div class="enter">
      <h2>胖啾啾產生器</h2>
      <label>你的特製啾啾名字</label>
      <input type="text" placeholder="輸入你的啾啾名字" id="input_name">
      <a id="enter_btn" href="javascript:;">開始製作</a>
      <p id="remind">請輸入名字，啾咪！</p>
   </div>

   <div class="canvas_area">
   	<h2 id="birdie_name"><?php echo $recoed['name'];?></h2>
		<div id="canvas" class="<?php echo $recoed['canvas'];?>">
			<div id="birdie" class="<?php echo $recoed['birdie'];?>"></div>
			<div id="eye" class="<?php echo $recoed['eye'];?>"></div>
			<div id="blusher" class="<?php echo $recoed['blusher'];?>"></div>
			<div id="beak" class="<?php echo $recoed['beak'];?>"></div>
			<div id="wing" class="<?php echo $recoed['wing'];?>"></div>
		</div>
		<div class="selector_area">
			<div class="birdie_selector">
				<span>body</span>
				<ul>
					<li>
						<a href="javascript:;" onclick="change('birdie','one')">1</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('birdie','two')">2</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('birdie','three')">3</a>
					</li>
				</ul>
			</div>
			<div class="eye_selector">
				<span>eye</span>
				<ul>
					<li>
						<a href="javascript:;" onclick="change('eye','one')">1</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('eye','two')">2</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('eye','three')">3</a>
					</li>
				</ul>
			</div>
			<div class="beak_selector">
				<span>beak</span>
				<ul>
					<li>
						<a href="javascript:;" onclick="change('beak','one')">1</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('beak','two')">2</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('beak','three')">3</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('beak','four')">4</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('beak','five')">5</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('beak','six')">6</a>
					</li>
				</ul>
			</div>
			<div class="wing_selector">
				<span>wing</span>
				<ul>
					<li>
						<a href="javascript:;" onclick="change('wing','one')">1</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('wing','two')">2</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('wing','three')">3</a>
					</li>
				</ul>
			</div>
			<div class="blusher_selector">
				<span>blusher</span>
				<ul>
					<li>
						<a href="javascript:;" onclick="change('blusher','one')">1</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('blusher','two')">2</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('blusher','remove')">remove</a>
					</li>
				</ul>
			</div>
			<div class="canvas_selector">
				<span>background</span>
				<ul>
					<li>
						<a href="javascript:;" onclick="change('canvas','one')">1</a>
					</li>
					<li>
						<a href="javascript:;" onclick="change('canvas','two')">2</a>
					</li>
					<!-- 上傳檔案 -->
					<li>
						<input type="file" id="pic_upload" name="pic_upload" class="file_upload" value="add">
					</li>
				</ul>
			</div>
		</div>
	</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/ajaxfileupload.js"></script>
<script type="text/javascript" src="js/fileupload.js"></script>
<script type="text/javascript" src="js/birdie.js"></script>
<script type="text/javascript">
$(document).ready(function(){
<?php
if ( !empty($_GET['k']) && $_GET['k'] != '')
{
	echo '$(".enter").hide();$(".canvas_area").show();';
	if ($use_image) {
		echo '$("#canvas").css("background-image", "' . $recoed['image'] . '");';
	};
}
?>
});
</script>
</body>
</html>
