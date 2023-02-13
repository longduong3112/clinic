<?php
session_start();
error_reporting(0);
include('include/config.php');
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
?>
<?php

?>
 <?php

include './view-dr/header.php';
include './view-dr/sidebar_start.php';
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-left:160px">ĐĂNG TIN TỨC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="tin_tuc_codesa.php" method="POST" enctype=multipart/form-data>

        <div class="modal-body">   
           <div class="form-group">
                <label>Tiêu đề</label> 
                <input type="text" name="tua_de" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Hình Đại Diện</label>
                <input type="file" name="image"  id="anh" class="form-control" required >
            </div>       
           
            <div class="form-group">
                <label>Nội Dung</label>
                <textarea name="tin_tuc" id="tt" rows="15"  class="form-control" required></textarea>                
            </div>           
            <div class="form-group">
                <label>Đường dẫn URL</label>
                <input type="text" name="url" class="form-control" required>
            </div>
			<div class="form-group">
                <label>Tin Tức</label>
                <input type="text" name="ten_url" class="form-control" required>
            </div> 
			<div class="form-group">
                <label>Phát Hành</label>
                <input type="text" name="ngay_dang" readonly class="form-control" required value="<?php echo date("d-m-Y");?>" >
            </div>
            
        </div>
        <div class="modal-footer">           
            <button type="submit" name="add_tt" class="btn btn-danger py-2">Đăng tin</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid" style="width:1300px;">

 <?php 
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
          echo '
          <div class="alert alert-success">
            '.$_SESSION['success'].'
          </div>'
          ;
          unset($_SESSION['success']);
        }

        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
          echo '
          <div class="alert alert-danger">
            '.$_SESSION['status'].'
          </div>';
          unset($_SESSION['status']);
        }
?>
<!-- DataTales Example -->
<div style="margin-left:100px;">
  <div class="py-12" >
  <center><h3 style="color: black;">QUẢN LÝ TIN TỨC</h3></center>  
          
  </div>
        <div class="card-body"  style="width:100%;">      
         <div class="ta ">

        <?php  
          
          $query = "SELECT * FROM tin_tuc order by id desc";
          $query_run= mysqli_query($con,$query);
        ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <div class="row">
          <form action="" method="post" >
            <div class="col-sm-12 col-md-12">
            <div id="dataTable_filter" class="dataTables_filter" style="padding-bottom:20px;">            
              <button style="background-color:red lighten-1; color:white;" type="button" id="add_button" class="btn btn-danger" data-toggle="modal" data-target="#addadminprofile">
                  Đăng tin tức
              </button>
              <!--<label for="search" >Tìm kiếm<input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="Hôm nay..." aria-controls="dataTable">
              </label> -->           
            </div>
          </div>           
          </form>         
        </div>
        <thead align="center" class="table-info" style="background-color:#A9A9A9">
          <tr>
           <th>STT </th>
           <th>Tiêu Đề </th>
           <th style="width: 300px">Nội Dung </th>
           <th style="width: 250px">Hình Đại Diện</th>                    
		   <th>Đường dẫn URL</th>
			  <th>Tin Tức</th>
			<th style="width: 150px">Phát hành</th>  
                       
           <th style="width: 155px"> </th>
           <th> </th>           
          </tr>
        </thead>
        <tbody>

        <?php 
        if(mysqli_num_rows($query_run)>0)
        {
          $serial_number=0;
         
          while ($row=mysqli_fetch_assoc($query_run)) 
          {
             $serial_number++;
            
            ?>      
            <tr>
                  <th><?php echo $serial_number; ?> </th>
                  <th><?php echo $row['TuaDe']; ?></th>
                  <td> <?php echo $row['TinTuc']; ?></td>
                  <td> <?php echo '<img src="view-dr/image/'.$row['img'].'" width="150px;" height="150px" alt="Image">' ?></td>
                
                  <td> <?php echo $row['url']; ?></td>
				<td> <?php echo $row['ten_url']; ?></td>
				<td> <?php echo $row['NgayDang']; ?></td>
                  
      
                  <td>
                      <form action="news_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                          <button style="background-color:red lighten-1; color:white;" type="submit" name="edit_btn" class="btn btn-danger px-2">Chỉnh sửa</button><!--data-toggle="modal" data-target="#modalUpdatenews" -->                   
                      </form>                     
                  </td>
                  <td>
                      <form action="tin_tuc_codesa.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Xóa</button>
                      </form>
                  </td>
              </tr>
      <?php     
          }
        }
        else{
          echo "No record found";
        } 
      ?>
          
      
        
        </tbody>
      </table>
<!---->
          <div class="modal fade" id="modalUpdatenews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="margin-left:150px;"><b>CẬP NHẬT TIN TỨC</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
<!---->
<form action="tin_tuc_codesa.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
				                <label>Tiêu Đề</label>
				                <input type="text" name="edit_tuade" value="<?php echo $row['TuaDe'] ?>" class="form-control" >
            				</div>
							<div class="form-group">
				                <label>Nội Dung</label>

				                 <textarea name="edit_tintuc" id="tt" rows="15"  class="form-control"><?php echo $row['TinTuc'] ?></textarea> 	
            				</div>
            				<div class="form-group">
				                <label>Hình Đại Diện</label>
								<br>
								
				                <input type="file" name="edit_image" value="" class="form-control" required><?php echo "view-dr/image/".$row['img']." " ?><br><img src=anh_nhan_vien/<?php echo $row['img']?> />	</input> 
				            </div>				           
				             <div class="form-group">
				                <label>Đường dẫn URL</label>
				                <input type="text" name="edit_url" value="<?php echo $row['url'] ?>" class="form-control" >
				            </div>
							<div class="form-group">
				                <label>Tin Tức</label>
				                <input type="text" name="edit_ten_url" value="<?php echo $row['ten_url'] ?>" class="form-control" >
				            </div>
							<button type="submit" name="update_btn" class="btn btn-danger"> Cập nhật</button>
							<a href="news.php" class="btn btn-secondary"> Đóng</a>	
						</form>              
                </div>
<!---->
    </div>
  </div>
</div></div>
 <?php 