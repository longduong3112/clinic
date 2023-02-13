<?php
session_start();
error_reporting(0);
include('include/config.php');
if(!$_COOKIE['username-doctor']):
	header('location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>BookingCare.vn</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
		<?php include('./view-mb/header.php');?>


<?php include('./view-mb/sidebar_start.php');?>
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-12">
<h2 style="margin-left:350px;">Hồ sơ bệnh nhân</h2>
</div>
<style>
	  body{
    font-family:times;
  }
  </style>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12" style="margin-left:30px;"><br>
<form action="add-patient.php" style="margin-left:700px;">
    <button class="btn btn-danger" type="submit">Thêm bệnh nhân</button>
</form>
<br>	
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">STT</th>
<th>Tên bệnh nhân</th>
<th>Số điện thoại</th>
<th>Giới tính </th>
<th>Ngày tạo phiếu khám</th>
<th>Hoạt động cuối</th>
<th>Cập nhật thông tin</th>
</tr>
</thead>
<tbody>
<?php
$id_doctor=$_SESSION['id'];
$sql=mysqli_query($con,"select * from tblpatient where id_doctor ='$id_doctor' ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['PatientName'];?></td>
<td><?php echo $row['PatientContno'];?></td>
<td><?php echo $row['PatientGender'];?></td>
<td><?php echo $row['CreationDate'];?></td>
<td><?php echo $row['UpdationDate'];?>
</td>
<td>

<a href="edit-patient.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-edit" style="margin-left:20px;"></i> Chỉnh sửa</a> 

</td>
</tr>
<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
	</body>
</html>
<br>
<br>


