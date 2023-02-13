
	
<?php
session_start();
if(!$_COOKIE['username']):
	header('location:signin.php');	
endif;
include './mvc/controller/source.php';

$p = new Mclass;
$user = $p->show_info($_COOKIE['username']);
$doctor = $p->show_info_doctor($_SESSION['id_doctor']);
$array_ngayhen = explode('_', $_SESSION['ngayhen']);

?>

<?php
include './mvc/view/header.php';

?>
<div class="container">
	<h2 class="text-center mt-4 mb-5">ĐẶT LỊCH THÀNH CÔNG</h2>
	<div class="row justify-content-center">
		<div class="col-2 font-weight-bolder" style="font-family:tim;">
			<p>Bác sĩ:</p>
			<p>Ngày hẹn:</p>
			<p>Giờ hẹn:</p>
			<p>Người đặt:</p>
			<p>Triệu chứng:</p>
			<p>Email:</p>
			<p>Phí khám:</p>
		</div>
		<div class="col-3 text-right">
			<p><?php echo $doctor['fullname'];?></p>
			<p><?php echo date('j-m-Y', strtotime($array_ngayhen[1]));?></p>
			<p>
				<?php 
				if($array_ngayhen[0] == 1):
					echo "7:00 - 9:00";
				elseif($array_ngayhen[0] == 2):
					echo "9:00 - 11:00";
				elseif($array_ngayhen[0] == 3):
					echo "15:00 - 17:00";
				else:
					echo "17:00 - 19:00";	
				endif;
				?>
					
			</p>
			<p><?php echo $user['fullname'];?></p>
			<p><?php echo $_SESSION['trieuchung']; ?></p>
			<p><?php echo $user['email'];?></p>
			<p>Đang cập nhật</p>
		</div>
	</div>	
	<form action="http://localhost/congnghemoire/appointment.php" style="text-align:center;">
        <button class="btn btn-danger" type="submit">Xác nhận</button>
    </form>
</div>
</div>
