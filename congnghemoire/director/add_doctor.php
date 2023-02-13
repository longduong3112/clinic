<?php
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$username = $fullname = '';
$error = ['username' => '', 'password' => '', 'fullname' => '','id_khoa'=>'', 'working_address'=>''];
if(isset($_POST['add'])):

	if(!empty($_POST['username'])):
			$username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
			$existDoctor = $p->exist_doctor($username);
			if($existDoctor):
				$error['username'] = ' Tên tài khoản đã tồn tại. Vui lòng chọn tên khác!'; 	
			endif;	
	else:
			$error['username'] = ' Tài khoản không có giá trị sử dụng!';
	endif;

	if(!empty($_POST['password'])):
			$password = mysqli_real_escape_string($p->connDB(), $_POST['password']);
			if( strlen($password) < 2 && strlen($password) >= 30){ 
				$error['password'] = " Invalid password!";
			}else {
			$password = md5($password);
			}	
	else:
			$error['password'] = ' Empty value.';
	endif;

	if(!empty($_POST['fullname'])):
			$fullname = mysqli_real_escape_string($p->connDB(), $_POST['fullname']);	
	else:
			$error['fullname'] = ' Empty value.';
	endif;

	if(!empty($_POST['id_khoa'])):
			$id_khoa = mysqli_real_escape_string($p->connDB(), $_POST['id_khoa']);	
	else:
			$error['id_khoa'] = ' Empty value.';
	endif;

	if(!empty($_POST['working_address'])):
			$working_address = mysqli_real_escape_string($p->connDB(), $_POST['working_address']);	
	else:
			$error['working_address'] = ' Empty value.';
	endif;

	//kiểm tra tất cả dữ liệu
	if(!array_filter($error)):
		$sql = "insert into doctor(username, password, fullname,id_khoa, working_address, account) values('$username', '$password', '$fullname', '$id_khoa', '$working_address','active')";
		if($p->multipleFunc($sql)):
			header('location:manage_doctor.php');
			endif;
	endif;	
endif;	
?>
<?php
include './view-dr/header.php';
 include './view-dr/sidebar_start.php';
?>
<div class="container" style="width:1100px;">
	<div class="row justify-content-center" >
		<div class="col-6" >
			<form action="add_doctor.php" method="POST" class="card p-3">
			<center><div style="color: black; font-size:25px;">THÊM BÁC SĨ</div></center><br>
				<div class="form-group" >
				    <label class="font-weight-bolder">Tên tài khoản:</label><span class="text-danger"><?php echo $error['username']; ?></span>
				    <input type="text" class="form-control" name="username" required="required" value="<?php echo $username;?>">
				</div>
				<div class="form-group">
				    <label class="font-weight-bolder">Mật khẩu: </label><span class="text-danger"><?php echo $error['password']; ?></span>
				    <input type="password" class="form-control" name="password" required="required">
				</div>
				<div class="form-group">
				    <label class="font-weight-bolder">Họ và tên: </label><span class="text-danger"><?php echo $error['fullname']; ?></span>
				    <input type="text" class="form-control" name="fullname" required="required" value="<?php echo $fullname;?>">
				</div>
				
					<div class="form-group">
						<span class="text-danger"><?php echo $error['id_khoa']; ?></span>
						<select class="custom-select custom-select-sm" name="id_khoa">
						  <option>Chọn chuyên khoa</option>
						  <option value="1"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '1'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Cơ xương khớp</option>
						  <option value="2"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '2'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Thần kinh</option>
						 <option value="3"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '3'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Tiêu hóa</option>
						  <option value="4"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '4'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Tim mạch</option>
						  <option value="5"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '5'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Tai mũi họng</option>
						  <option value="6"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '6'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Cột sống</option>
						  <option value="7"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '7'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Y học cổ truyền</option>
						  <option value="8"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '8'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Da liễu</option>
						</select>
					</div>
					<div class="form-group">
						<span class="text-danger"><?php echo $error['working_address']; ?></span>
						<select class="custom-select custom-select-sm" name="working_address">
						  <option>Chọn cơ sở làm việc</option>
						  <option value="govap"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'govap'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Quận Gò Vấp</option>
						  <option value="binhthanh"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'binhthanh'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Quận Bình Thạnh</option>
						  <option value="thuduc"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'thuduc'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Quận Thủ Đức</option>
						  <option value="tanbinh"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'tanbinh'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Quận Tân Bình</option>
						  <option value="tanphu"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'tanphu'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Quận Tân Phú</option>
						  <option value="quan5"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'quan5'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Quận 5</option>
						  <option value="quan10"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'quan10'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Quận 10</option>
						  <option value="quan12"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'quan12'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Quận 12</option>
						</select>
					</div>
				
				<button class="btn btn-danger mx-3 my-2" name="add">Thêm tài khoản</button>
			</form>
		</div>
	</div>
</div>
<?php
include './view-dr/sidebar_end.php';?>
<br>
