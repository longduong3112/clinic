<?php
include './controller-mb/source-mb.php';
$p = new Mclass_mb;
$username = $password = '';
$error = ['username' => '', 'password' => '', 'all' => ''];
if(isset($_POST['signin'])):
	if(!empty($_POST['username'])):
		$username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
		$checkDoctor = $p->exist_doctor($username);
		if($checkDoctor):
			if($checkDoctor['password'] == md5($_POST['password'])):
				//
				setcookie('username-doctor', $username, strtotime("+30 minutes"));
				setcookie('id_doctor', $checkDoctor['id_doctor'], strtotime("+30 minutes"));
				header('location:./info_doctor.php');
			else:
				$error['all'] = "Không hợp lệ.";	
			endif;	
		else:
			$error['all'] = "Incorrect username and password.";	
		endif;	
	else:
		$error['username'] = "Empty value.";	
	endif;
	//kiểm tra password
	if(!empty($_POST['password'])):
	else:
		$error['password'] = "Empty value.";	
	endif;	
endif;
?>
<div class="container-fluid" >
	<div class="row mt-12 mb-2">
		
		</div>
	</div>	
	
	<div class="row" style="height:450px; width: auto;" >
		<div class="col"></div>
		<div class="col">
	
		<br>
		<br>
			<form action="index.php" class="card p-3" method="POST">
				<h4 class="font-weight-bold " style="text-align:center; font-family:Times New Roman; color:gray;">Đăng Nhập</h4>
				<p class="m-0 p-0 text-danger"><?php echo $error['all']; ?></p>	
				<div class="form-group">
			    <label class="font-weight-bolder" style=" font-family:Times New Roman; color:gray;">Tài khoản:</label><span class="text-danger"><?php echo $error['username']; ?></span>
			    <input type="text" class="form-control" name="username">
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder" style=" font-family:Times New Roman; color:gray;">Mật khẩu:</label><span class="text-danger"><?php echo $error['password']; ?></span>
			    <input type="password" class="form-control" name="password">
			  </div>
			  <br>
			  <div class="row">
			  	<div class="col">
			  		<div class="checkbox" width="50%">
				   
				  	</div>
				</div>
			  </div>	  	
			  <button type="submit" class="btn btn-danger" name="signin" >Đăng nhập</button>
			</form>
		</div>
		<div class="col"></div>
		<div style="position: absolute;left: 790px;top: 460px;"><a href="../index.php" class="btn btn-secondary">Trở về trang chủ</a></div>
	</div>
</div>