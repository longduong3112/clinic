<?php
session_start();
error_reporting(0);
include('include/config.php');
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;



if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from user where id = '".$_GET['id']."'");
                  $_SESSION['msg']="data deleted !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bookingcare.vn</title>
		
		
	<body>
		<div id="app">		
		<?php include('view-dr/header.php');
include './view-dr/sidebar_start.php';?>
			<div class="app-content">
				
						
			
				<div class="main-content" style="margin-left:100px; width:1200px" >
					<div class="wrap-content container" id="container">
					
						<section id="page-title">
							<div class="row">
								<div class="col-sm-12">
								<h3 style="color: black;margin-left:370px;">QUẢN LÝ NGƯỜI DÙNG</h3><br>
							</div>
						</section>
					
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-14">
									
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-bordered text-center" id="sample-table-1">
										<thead class="table-info" style="background-color:#A9A9A9">
											<tr>
												<th class="center">STT</th>
												<th width="200px">Tên người dùng</th>
												<th width="200px">Địa chỉ</th>
												<th>Liên hệ</th>
												<th>Email </th>
												<th>Username</th>
												<th></th>	
											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select * from user");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['fullname'];?></td>
												<td><?php echo $row['address'];?></td>
												<td><?php echo $row['sdt'];?>
												</td>
												
												<td><?php echo $row['email'];?></td>
												<td><?php echo $row['username'];?></td>
												
												</td>
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							
													
	<a href="manage_user.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Xóa khỏi người dùng khỏi hệ thống?')" type="button" class="btn btn-danger" tooltip-placement="top" tooltip="Remove">Xóa</a>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
													
														</button>
														
													</div>
												</div></td>
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
							</div>
						</div>
						
