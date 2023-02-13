<?php
if(!$_COOKIE['username-doctor']):
	header('location:index.php');
endif;
include './controller-mb/source-mb.php';
$p = new Mclass_mb;
$username = $_COOKIE['username-doctor']; 
$doctor = $p->show_info_doctor($_COOKIE['id_doctor']);

if(isset($_POST['update'])):
    $fullname = mysqli_real_escape_string($p->connDB(), $_POST['fullname']);
    $gioitinh = mysqli_real_escape_string($p->connDB(), $_POST['gioitinh']);
    $age = mysqli_real_escape_string($p->connDB(), $_POST['age']);
    $sdt = mysqli_real_escape_string($p->connDB(), $_POST['sdt']);
    $address = mysqli_real_escape_string($p->connDB(), $_POST['address']);
    $sql = "update doctor 
            set fullname = '$fullname', gioitinh = '$gioitinh', age = '$age', sdt = '$sdt', address = '$address' 
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_doctor.php');
    else:
      echo 'Lỗi cập nhập.Xin thử lại.';  
    endif;        
  endif;

  if(isset($_POST['change_image'])):
    $name_image = mysqli_real_escape_string($p->connDB(), $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], 'view-mb/image/anh_dai_dien' . '/' . $name_image);
    $sql = "update doctor
            set image = '$name_image'
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_doctor.php');
    endif;       
  endif;	
?>
<?php 
include './view-mb/header.php';
include './view-mb/sidebar_start.php';
?>
<style>
	  body{
    font-family:times;
  }
  </style>
<div class="container"style="width: 900px;">
<h2 style="margin-left:300px;">Thông tin cá nhân</h2>
	<div class="row" style="padding-top: 20px;">
          <div class="col-2"></div>
          <div class="col-3 text-center">
            <img src="./view-mb/image/anh_dai_dien/<?php echo $doctor['image'] == true ? $doctor['image'] :'demo_avatar.jpeg';?>" width="150px" height="150px">
            <p><a href ="#" data-toggle="modal" data-target="#change_image">Thay đổi Ảnh đại diện</a></p>
            <div class="modal fade" id="change_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form action="info_doctor.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="file" class="form-control-file" name="image">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="change_image">Lưu thay đổi</button>
                    <a href='#' class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if($doctor): ?> 
          <div class="col-3">
            <p class="font-weight-bolder">Họ và Tên:</p>
            <p class="font-weight-bolder">Giới tính:</p>
            <p class="font-weight-bolder">Tuổi:</p>
            <p class="font-weight-bolder">Số điện thoại:</p>  
            <p class="font-weight-bolder">Địa chỉ:</p>
            <p class="font-weight-bolder">Chuyên khoa:</p>
            <p class="font-weight-bolder">Khu vực làm việc:</p>
          </div>
          <div class="col-4">
            <span class='font-italic font-weight-light'></span>
            <p><?php echo $doctor['fullname']; ?></p>
            <p><?php echo $doctor['gioitinh'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $doctor['gioitinh']; ?></p>
            <p><?php echo $doctor['age'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $doctor['age']; ?></p>
            <p><?php echo $doctor['sdt'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $doctor['sdt']; ?></p>
            <p><?php echo $doctor['address'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $doctor['address']; ?></p>
            <p><?php echo $p->show_chuyen_khoa($doctor['id_doctor']); ?></p>
            <p><?php
                  if($doctor['working_address']=='govap'):
                  echo 'Bệnh viện Gò Vấp';
                elseif($doctor['working_address'] =='binhthanh'):
                  echo 'Bệnh viện Bình Thạnh';
                else:
                  echo 'Bệnh viện Thủ Đức';    
                endif; 
             ?></p> 
          </div>
          <?php endif;?>
          <div class="col-2"></div> 
        </div>

        <div class="row m-4">
        <a style="margin-left:250px" href="http://localhost/congnghemoi/doctor/private_setup.php">
    <button class="btn btn-danger">Cập nhật tài khoản</button>
  </a> 
          <div class="col text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#modalUpdate">Thay Đổi Thông Tin</button></div>
          <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="info_doctor.php" method="POST">
                    <div class="form-group">
                      <label class="font-weight-bolder">Họ và Tên: </label>
                      <input type="text" class="form-control" name="fullname" value="<?php echo $doctor['fullname']; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Giới tính: </label>
                      <select class="form-control" name="gioitinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Tuổi: </label>
                      <input type="number" class="form-control" name="age" value="<?php echo $doctor['age'] == true ? $doctor['age'] : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="sdt"  minlength="8" maxlength="12" required="required" value="<?php echo $doctor['sdt']; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Địa chỉ: </label>
                      <input type="text" class="form-control" name="address" minlength="8" maxlength="80" required="required" value="<?php echo $doctor['address']; ?>">
                    </div>  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger" name="update">Lưu thay đổi</button>
                  <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
<?php
//include './view-mb/sidebar_end.php';
?>
<Br>

<?php
