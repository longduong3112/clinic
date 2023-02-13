<?php
if(!$_COOKIE['username-doctor']):
	header('location:index.php');
endif;
 include './controller-mb/source-mb.php';
$p = new Mclass_mb;
 $id_doctor = $_COOKIE['id_doctor'];
 $lichhen = $p->show_lich_hen($id_doctor);	
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
<br>
<br>

<div class="container" style="margin-left:50px;">
<h2 style="margin-left:180px;">Lịch hẹn</h2>
	<table class="table table-hover text-center">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Bệnh nhân</th>
      <th scope="col">Thời gian</th>
      <th scope="col">Ngày khám</th>
   <th scope="col">Chi tiết</th>
    </tr>
  </thead>
  <tbody>
  	<?php	
	if(!empty($lichhen)):
		foreach ($lichhen as $key => $val) { 	
			$key++;
			$user = $p->show_info_byid($val['id_user']);
			$array_ngayhen = explode('_',$val['ngayhen']);
			$id_phieukham = $val['id_phieukham'];
			
			// echo $id_phieukham;
	?>		
    <tr>
      <th scope="row"><?php echo $key ;?></th>
      <td><?php echo $user['fullname'] ;?></td>
      <td>
      	<?php
      		if($array_ngayhen[0] == 1):
					echo "07:00 - 09:00 " ;
				elseif($array_ngayhen[0] == 2):
					echo "09:00 - 11:00 " ;
				elseif($array_ngayhen[0] == 3):
					echo "15:00 - 17:00 " ;
				else:
					echo "17:00 - 19:00 ";
				endif; 
      	?>
      </td>
      <td><?php echo date('j-m-Y', strtotime($array_ngayhen[1])) ;?></td>
     
      <td><button class="btn btn-danger py-1 px-3" data-toggle="modal" data-target="#xuly<?php echo $key;?>">Xem</button></td>
      <div class="modal fade" id="xuly<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" style="margin-left:130px">CHI TIẾT LỊCH HẸN</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
					<p><span class="font-weight-bolder">ID phiếu khám </span><span><?php echo $id_phieukham;?></span></p>
			        <p><span class="font-weight-bolder">Bệnh nhân: </span><span><?php echo $user['fullname'];?></span></p>
			        <p><span class="font-weight-bolder">Tuổi bệnh nhân: </span><span><?php echo $user['age'];?></span></p>
			        <p><span class="font-weight-bolder">Giới tính: </span><span><?php 
			        if($user['gioitinh'] == 'Male'):
			        	echo "Nam";
			        else:
			        	echo "Nữ";	
			        endif;
			        ?></span></p>
			        <p><span class="font-weight-bolder">Ca khám: </span><span><?php 
			        	if($array_ngayhen[0] == 1):
							echo "07:00 - 09:00 " ;
						elseif($array_ngayhen[0] == 2):
							echo "09:00 - 11:00 " ;
						elseif($array_ngayhen[0] == 3):
							echo "15:00 - 17:00 " ;
						else:
							echo "17:00 - 19:00 ";
						endif; 
			        ;?></span></p>
			        <p><span class="font-weight-bolder">Ngày khám: </span><span><?php echo date('j-m-Y',strtotime($array_ngayhen[1]));?></span></p>
			        <p><span class="font-weight-bolder">Địa chỉ : </span><span><?php echo $user['address'];?></span></p>
			        <p><span class="font-weight-bolder">Triệu chứng bệnh nhân kê khai: </span><span><?php echo $val['trieuchung'];?></span></p>
			        <form action="./controller-mb/save_prescription.php" method="POST">
			        <input type="hidden" name="id_phieukham" value="<?php echo $id_phieukham;?>">	
			      <div class="modal-footer">
			      	<button type="submit" name="xacnhan" class="btn btn-danger px-3 py-2">Xác nhận</button>
			      	</form>
			        <a href="#" class="btn btn-secondary px-3 py-2" data-dismiss="modal">Đóng</a>
			      </div>
			    </div>
			 </div>
		</div>
    </tr>
    <?php
			}
		else:
			echo '';	
		endif;
	?>
  </tbody>
</table>
</div>
	</div>
<?php
include './view-mb/sidebar_end.php';
?>
