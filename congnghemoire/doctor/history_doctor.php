<?php
if(!$_COOKIE['username-doctor']):
	header('location:index.php');
endif;
 include './controller-mb/source-mb.php';
 $p = new Mclass_mb;
 $id_doctor = $_COOKIE['id_doctor'];
 $lichsuchua = $p->show_lichsu_chuabenh($id_doctor);
 // print_r($benhan);	
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
<div class="container-fluid" style="margin-left:50px;">
<h2 style="margin-left:170px;">Lịch sử khám bệnh</h2>
<table class="table table-hover text-center">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Bệnh nhân</th>
      <th scope="col">Thời gian khám</th>
      <th scope="col">Ngày khám</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Chi tiết</th>
   
    </tr>
  </thead>
  <tbody>
  	<?php	
	 
	         if(($lichsuchua)):
		foreach ($lichsuchua as $key => $val) { 	
			$key++;
			$user = $p->show_info_byid($val['id_user']);
			$array_ngayhen = explode('_',$val['ngayhen']);
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
      <td><?php echo $user['address'] ;?></td>
      <td>
      <button class="btn btn-danger py-1 px-3">Xem</button>
      </td>
     
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
<?php
include './view-mb/sidebar_end.php';
?>

