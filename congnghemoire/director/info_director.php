<?php
if(!$_COOKIE['username-director']):
	header('location:index.php'); 
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$username = $_COOKIE['username-director']; 
$director = $p->show_info_director($_COOKIE['id_director']);

if(isset($_POST['update'])):
    $fullname = mysqli_real_escape_string($p->connDB(), $_POST['fullname']);
    $gioitinh = mysqli_real_escape_string($p->connDB(), $_POST['gioitinh']);
    $age = mysqli_real_escape_string($p->connDB(), $_POST['age']);
    $sdt = mysqli_real_escape_string($p->connDB(), $_POST['sdt']);
    $address = mysqli_real_escape_string($p->connDB(), $_POST['address']);
    $sql = "update director 
            set fullname = '$fullname', gioitinh = '$gioitinh', age = '$age', sdt = '$sdt', address = '$address' 
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_director.php');
    else:
      echo 'Cập nhật không thành công!';  
    endif;        
  endif;

  if(isset($_POST['change_image'])):
    $name_image = mysqli_real_escape_string($p->connDB(), $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], './view-dr/image/anh_dai_dien' . '/' . $name_image);
    $sql = "update director
            set image = '$name_image'
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_director.php');
    endif;      
  endif;	
?>
<?php
include './view-dr/header.php';
include './view-dr/sidebar_start.php';
?>
<br>
<br>
<h3 style="margin-left: 250px;"><b>Thông tin cá nhân</b></h3>
<div class="container" style=" padding-top:30px; margin-left: 150px;">
	<div class="row">
          <div class="col-2"></div>
          <div class="col-3 text-center" style="margin-left:-150px;">
            
            <img src="./view-dr/image/anh_dai_dien/<?php echo $director['image'] == true ? $director['image'] :'demo_avatar.jpeg';?>" width="150px" height="150px">
            <button class="btn btn-danger" style="margin-top: 20px;"><a href ="#" data-toggle="modal" data-target="#change_image" style="color: white;">Thay đổi</a></button>
            <div class="modal fade" id="change_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form action="info_director.php" method="POST" enctype="multipart/form-data">
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
          <?php if($director): ?> 
          <div class="col-3"">
            <p class="font-weight-bolder">Họ và Tên:</p>
            <p class="font-weight-bolder">Giới tính:</p>
            <p class="font-weight-bolder">Tuổi:</p>
            <p class="font-weight-bolder">Số điện thoại:</p>  
            <p class="font-weight-bolder">Địa chỉ:</p>
          </div>
          <div class="col-3" style="width:300px;">
            <p><?php echo $director['fullname']; ?></p>
            <p><?php echo $director['gioitinh'] == false ? 'Chưa cung cấp': $director['gioitinh']; ?></p>
            <p><?php echo $director['age'] == false ? 'Chưa cung cấp': $director['age']; ?></p>
            <p><?php echo $director['sdt']; ?></p>
            <p><?php echo $director['address']; ?></p> 
          </div>
          <?php endif;?>
          <div class="col-4"></div> 
        </div>
        <div class="row m-4">
          <div class="col text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#modalUpdate">Thay đổi thông tin</button></div>
          <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="margin-left:150px;"><b>Cập nhật thông tin</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="info_director.php" method="POST">
                    <div class="form-group">
                      <label class="font-weight-bolder">Họ và tên: </label>
                      <input type="text" class="form-control" name="fullname" value="<?php echo $director['fullname']; ?>">
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
                      <input type="number" class="form-control" name="age" value="<?php echo $director['age'] == true ? $director['age'] : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="sdt"  minlength="8" maxlength="12" required="required" value="<?php echo $director['sdt']; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Địa chỉ: </label>
                      <input type="text" class="form-control" name="address" minlength="5" maxlength="80" required="required" value="<?php echo $director['address']; ?>">
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
include './view-dr/sidebar_end.php';
?>
<br>
