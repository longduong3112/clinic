<?php
include './mvc/controller/source.php';
$p = new Mclass;
$username = $password = '';
$error = ['username' => '', 'password' => '', 'all' => ''];
if(isset($_POST['signin'])):
	if(!empty($_POST['username'])):
		$username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
		$checkUser = $p->exist_user($username);
		if($checkUser):
			if($checkUser['password'] == md5($_POST['password'])):
				// sử dụng cookie 20p
				setcookie('username', $username,strtotime("+20 minutes"));
				header('location:index.php');
			else:
				$error['all'] = "Thông tin không chính xác.";	
			endif;	
		else:
			$error['all'] = "Thông tin không chính xác.";	
		endif;	
	else:
		$error['username'] = "Không được để trống.";	
	endif;
	//kiểm tra password
	if(!empty($_POST['password'])):
	else:
		$error['password'] = "Không được để trống.";	
	endif;	
endif;	
?>


<?php
include './mvc/view/header.php';
?>

	

<div class="container" >
	<div class="row mt-12 mb-3" >
		
		</div>
	</div>	
	
	<div class="row" style="background-image: url('./images/jpg'); width: auto;" >
		<div class="col"></div>
		<div class="col">
	
		<br>
		<br>
			<form action="signin.php" class="card p-4" method="POST">
			<center class="font-weight-bold " style="font-size:25px" >Đăng Nhập</center>
				<p class="m-0 p-0 text-danger"><?php echo $error['all']; ?></p>	
				<div class="form-group">
			    <label class="font-weight-bolder" style="font-size:16px;">Tên tài khoản :</label><span class="text-danger"><?php echo $error['username']; ?></span>
			    <input type="text" class="form-control" name="username">
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder" style="font-size:16px;">Mật khẩu:</label><span class="text-danger"><?php echo $error['password']; ?></span>
			    <input type="password" class="form-control" name="password">
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<div class="checkbox" width="50%">
				    <label class="inline"><input type="checkbox"> Ghi nhớ đăng nhập</label>
				  	</div>
				</div>
			  	<div class="col">
			  		
			  	</div>
			  </div>	  	
			  <button type="submit" class="btn btn-danger" name="signin" style="font-size:16px;">Đăng nhập</button>
			</form>
		</div>
		<div class="col"></div>
	</div>
<br>
<div class="text-center">
<a href="signup.php" class="btn btn-secondary"> Tạo tài khoản</a>
</div>
<br>
