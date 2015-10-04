<?php

// 照片處理
$rename_img = "";
$resize_ori_Img = "";
if( !empty($_FILES['pic_upload']) )
{
	if ($_FILES['pic_upload']['error'] > 0)
	{
		$upload_Error = $_FILES['pic_upload']['error'];
	}
	else
	{
		$img_type = explode(".",$_FILES["pic_upload"]["name"]);
		$rename_img = time().'.'.$img_type[1];
		$tmp_file = 'uploads/'.$rename_img;
		move_uploaded_file($_FILES['pic_upload']['tmp_name'], $tmp_file);
	}
	$returnData = array('status' => 'success',
						'img' => $tmp_file
						);
	echo json_encode($returnData); 
}
else{
	$returnData = array('status'=>'fail');
	echo json_encode($returnData); 
}
?>