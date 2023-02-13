<?php
session_start();
error_reporting(0);
include('include/cf.php');
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
if(isset($_GET['del']))
	{
		mysqli_query($con,"delete from doctor where id = '".$_GET['id']."'");
        $_SESSION['msg']="data deleted !!";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>BookingCare.vn</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<?php
include './view-dr/header.php';
include './view-dr/sidebar_start.php';
?>
<style>
	body{
    font-family:times;
    }
</style><br>
<center><h3 style="color: black;">DANH SÁCH HẸN TƯ VẤN</h3></center><br>
<div class="app-content">
	<div class="main-content" style="margin-left:100px; width:1200px"">
	<div class="wrap-content container" id="container">
<!---->
	<section id="page-title">
	<div class="row">
		<div class="col-sm-12">
		</div>
		</div>
	</section><br>
<!---->
	<div class="container-fluid container-fullw bg-white">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" id="sample-table-1">
				<thead class="table-info" style="background-color:#A9A9A9">
				<tr>
					<th class="center">STT</th>
					<th style="text-align:center;" width="200px;">Tên người dùng</th>
					<th style="text-align:center;">E-mail</th>
					<th style="text-align:center;" width="150px;">Số điện thoại </th>
					<th width="350px;" style="text-align:center;">Mô tả triệu chứng</th>
					<th style="text-align:center;" width="100px;">Trạng thái</th>
				</tr>
				</thead>
				<tbody>
<?php
$sql=mysqli_query($con,"select * from tblcontactus where IsRead is null");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

				<tr>
					<td class="center"><?php echo $cnt;?>.</td>
					<td class="hidden-xs"><?php echo $row['fullname'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['contactno'];?></td>
					<td><?php echo $row['message'];?></td>
					<td>Đang xử lý</td>
						</tr>
						<?php 
						    $cnt=$cnt+1;
						}
						?>
						</tbody>
						</table></div></div></div></div></div>
<!---->
</div></div></div>
</body>
</html>
