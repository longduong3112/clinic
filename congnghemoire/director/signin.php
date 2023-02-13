<?php
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$username = $password = '';
$error = ['username' => '', 'password' => '', 'all' => ''];
if(isset($_POST['signin'])):
	if(!empty($_POST['username'])):
		$username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
		$checkDirector = $p->exist_director($username);
		if($checkDirector):
			if($checkDirector['password'] == $_POST['password']):
				// 
				setcookie('username-director', $username, strtotime("+20 minutes"));
				setcookie('id_director', $checkDirector['id_director'], strtotime("+20 minutes"));
				header('location:./info_director.php');
			else:
				$error['all'] = "Không hợp lệ";	
			endif;	
		else:
			$error['all'] = "Sai thông tin đăng nhập";	
		endif;	
	else:
		$error['username'] = "Lỗi.";	
	endif;
	//kiểm tra password
	if(!empty($_POST['password'])):
	else:
		$error['password'] = "Lỗi.";	
	endif;	
endif;
?>
<div class="container" >
	<div class="row mt-3 mb-2">
		
		</div>
	</div>	
	
	<div class="row" style="height:450px; width: auto;" >
		<div class="col"></div>
		<div class="col">
			<br>
			<br>
			<form action="index.php" class="card p-3" method="POST">
				<center class="font-weight-bold " style="font-size:25px; font-family:Times New Roman; color:gray;">Đăng Nhập</center>
				<p class="m-0 p-0 text-danger"><?php echo $error['all']; ?></p>	
				<div class="form-group">
			    <label class="font-weight-bolder" style=" font-family:Times New Roman; color:gray;">Tài khoản:</label><span class="text-danger"><?php echo $error['username']; ?></span>
			    <input type="text" class="form-control" name="username">
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder" style=" font-family:Times New Roman; color:gray;">Mật khẩu:</label><span class="text-danger"><?php echo $error['password']; ?></span>
			    <input type="password" class="form-control" name="password">
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<div class="checkbox" width="50%">
				   
				  	</div>
				</div>
			  	
			  </div>	  	
			  <button type="submit" class="btn btn-danger" name="signin">Đăng nhập</button>
			</form>
		</div>
		<div class="col"></div>
		<div style="position: absolute;left: 790px;top: 460px;"><a href="../index.php" class="btn btn-secondary">Trở về trang chủ</a></div>
	</div>
</div>
