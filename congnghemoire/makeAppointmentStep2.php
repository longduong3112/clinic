<?php
session_start();
	if(!$_COOKIE['username']):
		header('location:signin.php');	
	endif;
	include './mvc/controller/source.php';
?>
<?php
include './mvc/view/header.php';
$p = new Mclass;
if(isset($_POST['next'])):
	$id_khoa = $_POST['id_khoa'] ?? ' ';
	$working_address = $_POST['working_address'] ?? ' ';
	$_SESSION['trieuchung'] = $_POST['trieuchung'] ?? ' ';
	$doctors = $p->show_doctor($id_khoa, $working_address);
endif;	
?>
<style>
	.col-3 a{
		background-color: white;
		
		
	}
	body{
		font-family:Times;
		
	}
	</style>
<div class="container">
	<h3 class="font-weight-bolder text-center mt-4">CHỌN BÁC SĨ</h3><br>
	<div class="row">
		<?php if(isset($doctors)):
			foreach ($doctors as $doctor) { ?>
		<?php 
			if($doctor['working_address'] == 'govap'):
				$working_address = 'Quận Gò Vấp'; 
			elseif($doctor['working_address'] == 'binhthanh'):
				$working_address = 'Quận Bình Thạnh';
			elseif($doctor['working_address'] == 'thuduc'):
				$working_address = 'Quận Thủ Đức';
			elseif($doctor['working_address'] == 'tanbinh'):
				$working_address = 'Quận Tân Bình';
			elseif($doctor['working_address'] == 'tanphu'):
				$working_address = 'Quận Tân Phú';
			elseif($doctor['working_address'] == 'quan5'):
				$working_address = 'Quận 5';	
			elseif($doctor['working_address'] == 'quan10'):
				$working_address = 'Quận 10';	
			elseif($doctor['working_address'] == 'quan12'):
				$working_address = 'Quận 12';	
			endif;
			if($doctor['gioitinh'] == 'Male'):
				$gioitinh = "Nam";
			else:
				$gioitinh = "Nữ";
			endif;		
		?>		
		<div class="col-3">
			<div class="card">
			  <div class="card-body">
			    <h5 class="card-title font-weight-bolder text-center"><?php echo $doctor['fullname'];?></h5>
			    <!--<p class="text-center"><img src="./mvc/view/image/anh_dai_dien/hh.jpg" width="100px" height="100px"></p>-->
				<p class="text-center"><?php echo '<img src="'.$doctor['image'].'" />';?></p>
			   	<p class="card-text"><span class="font-weight-bolder">Chuyên khoa: </span><?php echo $p->show_chuyen_khoa($doctor['id_doctor']) ;?></p>
			   	<p class="card-text"><span class="font-weight-bolder">Tuổi: </span><?php echo $doctor['age'] ;?></p>
			   	<p class="card-text"><span class="font-weight-bolder">Giới tính: </span><?php echo $gioitinh ;?></p>
				<p class="card-text"><span class="font-weight-bolder">Số điện thoại: </span><?php echo $doctor['sdt'] ;?></p>
			   	<p class="card-text"><span class="font-weight-bolder">Cơ sở làm việc: </span><?php echo $working_address ;?></p>
			   	<div class="row">
			   	<form action="makeAppointmentStep3.php" method="POST">
			   		<input type="hidden" name="id_doctor" value="<?php echo $doctor['id_doctor']; ?>">
			   		<input type="hidden" name="trieuchung" value="<?php echo $_POST['trieuchung'];?>">	
			   		<div class="col-12" style="margin-left:60px"><button class="btn btn-danger" type="submit" name="next">Lựa chọn</button></div>
				</form> 
			   	</div> 
			  </div>
			</div>
		</div>
		<?php } ;?>
		<?php else:
		echo "Không có bác sĩ nào.Vui lòng quay lại."; ?>
		<?php endif; ?>
	</div>
	<!-- div thẻ row -->
</div>