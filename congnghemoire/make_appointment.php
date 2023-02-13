<?php
	if(!$_COOKIE['username']):
		header('location:signin.php');	
	endif;
	include './mvc/controller/source.php';
  include './mvc/view/header.php';
?>
<style>
   body{
     font-family: 'Times New Roman', Times, serif;
   }
</style>
<div class="container" ><br>
	<div class="row mt-5" ><br><br>
		<div class="col-5" style="margin-left:350px;">
			<form action="makeAppointmentStep2.php" method="POST">
				<h3 class="font-weight-bold text-center" style="color:black;">ĐẶT LỊCH KHÁM</h3>
				<div class="form-group mt-4">
            <label class="font-weight-bolder" style="font-size:18px;">Chuyên khoa: </label>
              <select class="form-control" name="id_khoa">
                <option value="1">Cơ xương khớp</option>
                <option value="2">Thần kinh</option>
                <option value="3">Tiêu hóa</option>
                <option value="4">Tim mạch</option>
                <option value="5">Tai mũi họng</option>
                <option value="6">Cột sống</option>
                <option value="7">Y học cổ truyền</option>
                <option value="8">Da liễu</option>
              </select>
              <small class="form-text text-muted">
                <p class="m-0"> - Với đội ngũ y bác sĩ dày dặn kinh nghiệm, BookingCare cam kết sẽ mang đến cho bạn trải nghiệm tuyệt vời nhất.</p>
              </small>
        </div>
	      <div class="form-group mb-4">
            <label class="font-weight-bolder" style="font-size:18px;">Cơ sở khám bệnh: </label>
              <select class="form-control" name="working_address">
                <option value="govap">58 Nguyễn Văn Bảo, Phường 14, Quận Gò Vấp</option>
                <option value="quan5">54 Hai Bà Trưng, Phường 9, Quận 5</option>
                <option value="thuduc">34 Tô Ngọc Vân, Phường 4, Quận Thủ Đức</option>
                <option value="tanbinh">86 Hoàng Hoa Thám, Phường 8, Quận Tân Bình</option>
                <option value="binhthanh">67 Phan Đăng Lưu, Phường 9, Quận Bình Thạnh</option>
                <option value="quan10">14 Sư Vạn Hạnh, Phường 7, Quận 10</option>
                <option value="tanphu">32 Trường Chinh, Phường 5, Quận Tân Phú</option>
                <option value="quan12">47 Trung Mỹ Tây, Phường 13, Quận 12</option>
              </select>
        </div>
        <div class="form-group">
            <label class="font-weight-bolder" style="font-size:18px;">Triệu chứng bệnh:</label>
              <textarea class="form-control" name ='trieuchung' rows="3" required="required" placeholder="Vui lòng ghi rõ triệu chứng để được đội ngũ y bác sĩ tư vấn chính xác nhất cho bạn"></textarea>
        </div>      
        <div class="text-center mt-4"><button type="submit" name="next" class="btn btn-danger">Đặt Hẹn</button></div>
		  </form>
</div>
</div>
</div>