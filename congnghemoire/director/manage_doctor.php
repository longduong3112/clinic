<?php
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;

if(isset($_POST['on'])):
	$id_doctor = $_POST['id_doctor'];
	$sql = "update doctor set account = 'active' where id_doctor = '$id_doctor' ";
	$p->multipleFunc($sql);
endif;
if(isset($_POST['off'])):
	$id_doctor = $_POST['id_doctor'];
	$sql = "update doctor set account = 'unactive' where id_doctor = '$id_doctor' ";
	$p->multipleFunc($sql);
endif;	
//

$username = $fullname = $email = '';
$error = ['username' => '', 'password' => '', 'fullname' => '', 'email'=>'', 'id_khoa'=>'', 'working_address'=>''];
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

	if(!empty($_POST['email'])):
		    $email = mysqli_real_escape_string($p->connDB(), $_POST['email']);	
    else:
		    $error['email'] = ' Empty value.';
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
//


if(isset($_POST['search'])):

	if(!empty($_POST['chuyenkhoa'])):
		$chuyenkhoa = $_POST['chuyenkhoa'];
		$sql = "select * from doctor a join khoa b on a.id_khoa = b.id_khoa where b.name = '$chuyenkhoa' order by b.id_khoa asc,account asc";
		// order by b.id_khoa asc"
		if(!empty($_POST['account'])):
			$account = $_POST['account'];
			$sql = "select * from doctor a join khoa b on a.id_khoa = b.id_khoa where b.name = '$chuyenkhoa' and a.account = '$account' order by b.id_khoa asc,account asc";	
		endif;
		$alldoctors = $p->show_all_doctor($sql);	
	elseif(!empty($_POST['account'])):
		$account = $_POST['account'];
		$sql = "select * from doctor a join khoa b on a.id_khoa = b.id_khoa where a.account = '$account' order by b.id_khoa asc,account asc";	
		$alldoctors = $p->show_all_doctor($sql);
	else:
		$sql = "select * from doctor a join khoa b on a.id_khoa = b.id_khoa order by b.id_khoa asc,account asc";	
		$alldoctors = $p->show_all_doctor($sql);		
	endif;	
else:
	$sql = "select * from doctor a join khoa b on a.id_khoa = b.id_khoa order by b.id_khoa asc,account asc";	
	$alldoctors = $p->show_all_doctor($sql);					
endif;	
?>

<?php
include './view-dr/header.php';
include './view-dr/menu_dr.php';
include './view-dr/sidebar_start.php';

?>
<style>
	  body{
    font-family:times;
  }
  </style>
<br>

<h3 style="color: black;margin-left:500px;">QUẢN LÝ TÀI KHOẢN BÁC SĨ</h3><br>
<div class="container" style="margin-left:150px">
	<div class="row">
		<div class="col-7">
			<div class="row" >
			<form action="manage_doctor.php" method="POST" class="form-inline"></form>	
			</div>
		</div>
		<div class="col text-center" style="margin-left:100px; margin-bottom:10px;"><button class="btn btn-danger" data-toggle="modal" data-target="#modalAdddoctor">Thêm Bác Sĩ</button></div>
	</div>

	<div class="row">
		<table class="table table-bordered text-center">
		  <thead class="table-info" style="background-color:#A9A9A9">
		    <tr>
		      <th scope="col">STT</th>
			  <th scope="col">Họ và Tên</th>
		      <th scope="col">Chuyên khoa</th>
		      <th scope="col" style="width: 350px;">Cơ sở làm việc</th>
			  <th scope="col">Thông tin chi tiết</th>
		      <th scope="col">Mật khẩu</th>
			  <th scope="col">Thời gian thêm</th>
		    </tr>
		  </thead>
		  <tbody>
		<?php
			if(!empty($alldoctors)):
				foreach ($alldoctors as $key => $val) {
					$key++;
		?>			
		    <tr>
		      <th scope="row"><?php echo $key;?></th>
			  
		      <td><?php echo $val['fullname'];?></td>
		      <td><?php echo $val['nameF'];?></td>
		      <td><?php  
		      			if($val['working_address']=='govap'):
		      				echo 'Bệnh viện Quận Gò Vấp';
		      			elseif($val['working_address'] =='binhthanh'):
		      				echo 'Bệnh viện Quận Bình Thạnh';
						elseif($val['working_address'] =='tanbinh'):
							echo 'Bệnh viện Quận Tân Bình';
						elseif($val['working_address'] =='tanphu'):
							echo 'Bệnh viện Quận Tân Phú';
						elseif($val['working_address'] =='quan5'):
							echo 'Bệnh viện Quận 5';
						elseif($val['working_address'] =='quan10'):
							echo 'Bệnh viện Quận 10';
						elseif($val['working_address'] =='quan12'):
							echo 'Bệnh viện Quận 12';
		      			else:
		      				echo 'Bệnh viện Quận Thủ Đức';		
		  				endif;
		      ?><a href="#"><img src="./view-dr/image/edit1.jpg" width="25px" class="ml-1" data-toggle="modal" data-target="#editworkingaddress<?php echo $key;?>"></a></td>
		      <!-- Modal khu vực làm việc -->
				<div class="modal fade" id="editworkingaddress<?php echo $key;?>" tabindex="-1" role="dialog"  aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-sm">
				    <div class="modal-content">
				      <div class="modal-body">
				      	<p class="font-weight-bolder">Khu vực làm việc:</p>
				        <form action="./controller-dr/changeworkingaddress.php" method="POST">
				        	<input type="hidden" name="id_doctor" value="<?php echo $val['id_doctor'];?>">
				        	<select class="custom-select custom-select-sm" name="working_address">
				        		<?php 
				        			if($val['working_address'] == 'govap'):
				        				echo "selected";	
				        			endif;	
				        		?>
							  <option selected value="">Chọn khu vực làm việc</option>
							  <option value="thuduc"
							  <?php 
				        			if($val['working_address'] == 'thuduc'):
				        				echo "selected";	
				        			endif;	
				        		?>>Bệnh viện Quận Thủ Đức</option>
							  <option value="govap" 
							  <?php 
				        			if($val['working_address'] == 'govap'):
				        				echo "selected";	
				        			endif;	
				        		?>>Bệnh viện Quận Gò Vấp</option>
							  <option value="binhthanh"
							  <?php 
				        			if($val['working_address'] == 'binhthanh'):
				        				echo "selected";	
				        			endif;	
				        		?>>Bệnh viện Quận Bình Thạnh</option>
								<option value="tanphu"
							  <?php 
				        			if($val['working_address'] == 'tanphu'):
				        				echo "selected";	
				        			endif;	
				        		?>>Bệnh viện Quận Tân Phú</option>
								<option value="tanbinh"
							  <?php 
				        			if($val['working_address'] == 'tanbinh'):
				        				echo "selected";	
				        			endif;	
				        		?>>Bệnh viện Quận Tân Bình</option>
								<option value="quan5"
							  <?php 
				        			if($val['working_address'] == 'quan5'):
				        				echo "selected";	
				        			endif;	
				        		?>>Bệnh viện Quận 5</option>
								<option value="quan10"
							  <?php 
				        			if($val['working_address'] == 'quan10'):
				        				echo "selected";	
				        			endif;	
				        		?>>Bệnh viện Quận 10</option>
								<option value="quan12"
							  <?php 
				        			if($val['working_address'] == 'quan12'):
				        				echo "selected";	
				        			endif;	
				        		?>>Bệnh viện Quận 12</option>
							</select>
				      </div>
				      <div class="modal-footer">
				      		<button type="submit" class="btn btn-danger py-0" name="change">Xác nhận</button>
				      	</form>
				        <a href="#" type="button" class="btn btn-secondary py-0" data-dismiss="modal">Đóng</a>
				      </div>
				    </div>
				  </div>
				</div>
				<!---->
		      <td><button class="btn btn-danger py-1" data-toggle="modal" data-target="#xem<?php echo $key;?>">Xem thông tin</button>
		      	<div class="modal fade" id="xem<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content">
				      <div class="modal-body text-left">
				      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
						<center><h2>THÔNG TIN BÁC SĨ</h2></center>
				        <p><span class="font-weight-bolder">Họ và tên: </span><span><?php echo $val['fullname'];?></span></p>
				        <p><span class="font-weight-bolder">Tuổi: </span><span><?php echo $val['age'];?></span></p>
				        <p><span class="font-weight-bolder">Giới tính: </span><span><?php echo ($val['gioitinh'] == 'Male') ? 'Nam' : 'Nữ' ;?></span></p>
				        <p><span class="font-weight-bolder">Email: </span><span><?php echo $val['email'];?></span></p>
				        <p><span class="font-weight-bolder">Số điện thoại: </span><span><?php echo $val['sdt'];?></span></p>
				        <p><span class="font-weight-bolder">Địa chỉ nhà: </span><span><?php echo $val['address'];?></span></p>
				        <p><span class="font-weight-bolder">Chuyên khoa: </span><span><?php echo $p->show_chuyen_khoa($val['id_doctor']);?></span></p>
				        <p><span class="font-weight-bolder">Cơ sở làm việc: </span><span><?php 
				        if($val['working_address']=='govap'):
		      				echo 'Bệnh viện Quận Gò Vấp';
		      			elseif($val['working_address'] =='binhthanh'):
		      				echo 'Bệnh viện Quận Bình Thạnh';
						elseif($val['working_address'] =='tanbinh'):
							echo 'Bệnh viện Quận Tân Bình';
						elseif($val['working_address'] =='tanphu'):
							echo 'Bệnh viện Quận Tân Phú';
						elseif($val['working_address'] =='quan10'):
							echo 'Bệnh viện Quận 10';
						elseif($val['working_address'] =='quan5'):
							echo 'Bệnh viện Quận 5';
						elseif($val['working_address'] =='quan12'):
							echo 'Bệnh viện Quận 12';
		      			else:
		      				echo 'Bệnh viện Quận Thủ Đức';		
		  				endif;?></span></p>
				        <p><span class="font-weight-bolder">Ngày tạo: </span><span><?php echo date('H-i d-m-Y',strtotime($val['created_at']));?></span></p>
				        
				        
				      </div>
				      <div class="modal-footer">
				        <a href="#" class="btn btn-secondary py-1" data-dismiss="modal">Close</a>
				      </div>
				    </div>
				  </div>
				</div></td>
				<td><button class="btn btn-danger py-1" data-toggle="modal" data-target="#chitiet<?php echo $key;?>">Tạo mới</button>
		      	<div class="modal fade" id="chitiet<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content">
				      <div class="modal-body text-left">
				      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				       
				        <center><h2 style="color:red"> Thông báo</h2></center>
						<h5>Mật khẩu sau khi tạo mới là "congnghemoi"</h5>
				        <form action="./controller-dr/resetpasswordfordoctor.php" method="POST" id="formresetpass<?php echo $key;?>">
						    <p style="margin-left:370px;margin-top:20px;" class="" id="reset<?php echo $key;?>"><a href="#" class="btn btn-danger py-1">Xác nhận</a></p>
				        	<input type="hidden" name="id_doctor" value="<?php echo $val['id_doctor'];?>">
				        	<button type="submit" id='resetpassword<?php echo $key;?>' name="resetpassword" style="display: none"></button>
				        </form>
				        <script type="text/javascript">
				        	$("#reset<?php echo $key;?>").click(function(){
				        		$("#resetpassword<?php echo $key;?>").click();
				        	})
				        </script>  
				      </div>
				    </div>
				  </div>
				</div></td>
				<td><p><span class="font-weight-bolder"></span><span><?php echo date('H:i d-m-Y',strtotime($val['created_at']));?></span></p></td>
		      <div>	
		      	<?php
		      		if($val['account'] =='active'):
		      	?>
				<!-- end modal ON -->		
		      	<?php	
		      		endif; 
		      	?>
		      </div>
		    </tr>
		<?php	}
			endif; 
		?>    
		  </tbody>
		</table>
<!---->
          <div class="modal fade" id="modalAdddoctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="margin-left:170px;"><b>THÊM BÁC SĨ</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
				<form action="add_doctor.php" method="POST" class="card p-3">
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
				    <label class="font-weight-bolder">Email: </label><span class="text-danger"><?php echo $error['email']; ?></span>
				    <input type="text" class="form-control" name="email" required="" value="<?php echo $email;?>">
				</div>
				<div class="form-group">
					    <label class="font-weight-bolder">Chuyên khoa:</label>
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
					    <label class="font-weight-bolder">Cơ sở làm việc:</label>
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
          </div>
        </div>
<!---->
	</div>
</div>
<?php
include './view-dr/sidebar_end.php';
?>
