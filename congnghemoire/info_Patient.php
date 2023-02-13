<?php 
	if(!$_COOKIE['username']):
		header('location:index.php');	
	endif;
	include './mvc/controller/source.php';
  $p = new Mclass;
  $username = $_COOKIE['username']; 
  $user = $p->show_info($username);

  if(isset($_POST['update'])):
    $fullname = mysqli_real_escape_string($p->connDB(), $_POST['fullname']);
    $gioitinh = mysqli_real_escape_string($p->connDB(), $_POST['gioitinh']);
    $age = mysqli_real_escape_string($p->connDB(), $_POST['age']);
    $sdt = mysqli_real_escape_string($p->connDB(), $_POST['sdt']);
    $address = mysqli_real_escape_string($p->connDB(), $_POST['address']);
    $sql = "update user 
            set fullname = '$fullname', gioitinh = '$gioitinh', age = '$age', sdt = '$sdt', address = '$address' 
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_Patient.php');
    else:
      echo 'Lỗi cập nhập.Xin thử lại.';  
    endif;        
  endif;

  if(isset($_POST['change_image'])):
    $name_image = mysqli_real_escape_string($p->connDB(), $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], './mvc/view/image/anh_dai_dien' . '/' . $name_image);
    $sql = "update user
            set image = '$name_image'
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_Patient.php');
    endif;
    // print_r($_FILES['image']);
    // echo './mvc/view/image/anh_dai_dien' . '/' . $name_image;         
  endif;  
?>
 <?php
  include './mvc/view/header.php';

  include './mvc/view/sidebar_start.php';
?>

&emsp; 
          <!-- chỗ thêm content user nào  -->
<style>
  .row a {
    background-color: white;
    color:black;
  }
  body{
    font-family:times;
  }
  </style>
        <!-- info -->
        <center><h3>THÔNG TIN CÁ NHÂN</h3></center>
        <div class="row" style="padding-top: 70px; margin-left:30px;">
          <div class="col-2"></div>
          <div class="col-3 text-center" style="padding-right: 200px; ">
            <img src="./mvc/view/image/anh_dai_dien/<?php echo $user['image'] == true ? $user['image'] :'demo_avatar.jpeg';?>" width="150px" height="150px">
            <button class="btn btn-danger" style="width:100px; padding-top:5px; margin-top:15px; margin-left:20px;"><a href ="#" data-toggle="modal" data-target="#change_image">Thay đổi</a></button>
            <div class="modal fade" id="change_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form action="info_Patient.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="file" class="form-control-file" name="image">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="change_image">Cập nhật</button>
                    <a href='#' class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if($user): ?>        
          <div class="col-3">
            <p class="font-weight-bolder">Họ và Tên:</p>
            <p class="font-weight-bolder">Giới tính:</p>
            <p class="font-weight-bolder">Tuổi:</p>
            <p class="font-weight-bolder">Số điện thoại:</p>  
            <p class="font-weight-bolder">Địa chỉ:</p>
          </div>
          <div class="col-4.5 ">
            <p><?php echo $user['fullname']; ?></p>
            <p><?php echo $user['gioitinh'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $user['gioitinh']; ?></p>
            <p><?php echo $user['age'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $user['age']; ?></p>
            <p><?php echo $user['sdt'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $user['sdt']; ?></p>
            <p><?php echo $user['address'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $user['address']; ?></p> 
          </div>
          <?php endif;?>
          <div class="col-2"></div> 
        </div>

        <div class="row m-4">
          <div class="col text-center"><button style="margin-left:300px;" class="btn btn-danger" data-toggle="modal" data-target="#modalUpdate">Cập nhật thông tin</button></div>
          <form action="http://localhost/congnghemoi/private_setup.php" style="margin-right: 100px;">
              <button class="btn btn-danger" type="submit">Cập nhật tài khoản</button>
          </form>
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
                  <form action="info_Patient.php" method="POST">
                    <div class="form-group">
                      <label class="font-weight-bolder">Họ và tên: </label>
                      <input type="text" class="form-control" name="fullname" value="<?php echo $user['fullname']; ?>">
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
                      <input type="number" class="form-control" name="age" value="<?php echo $user['age'] == true ? $user['age'] : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="sdt"  minlength="8" maxlength="12" required="required" value="<?php echo $user['sdt']; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Địa chỉ: </label>
                      <input type="text" class="form-control" name="address" minlength="8" maxlength="80" required="required" value="<?php echo $user['address']; ?>">
                    </div>  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger" name="update">Cập nhật</button>
                  <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

</div>

<?php include './mvc/view/sidebar_end.php'; ?> 
