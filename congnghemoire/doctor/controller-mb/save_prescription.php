<?php 

include '../../mvc/controller/source.php';
$p = new Mclass;
if(isset($_POST['xacnhan'])):
	$id_phieukham = $_POST['id_phieukham'];
	$chidan = $_POST['chidan'];
	$sql_chidan = "update phieukham set chidan = '$chidan' where id_phieukham = '$id_phieukham' ";
	$p->multipleFunc($sql_chidan);
	header('location:../processappointment.php');

endif;	

?>