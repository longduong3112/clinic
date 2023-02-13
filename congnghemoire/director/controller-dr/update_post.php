<?php
	session_start();
	include './source-dr.php';
	$p = new Mclass_dr;
	if(isset($_POST['save'])):
   		$title = str_replace(" ' ", " \' ", $_POST['title']);
   		$content = str_replace(" ' ", " \' ", $_POST['editor']);
   		$id_tintuc = $_SESSION['id_tintuc'];
   		$sql = "update tintuc set title = '$title',content = '$content' where id_tintuc = '$id_tintuc' ";
   		if($p->multipleFunc($sql)):
   			header('location:../news_edit.php');
   		else:
   			echo 'Lỗi thao tác!';	
   		endif;
	endif;
?>