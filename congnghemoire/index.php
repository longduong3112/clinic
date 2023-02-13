
<?php include('link/controller/source.php');?>

<?php
include_once('link/controller/cf.php');
$query1 = "SELECT * FROM tin_tuc";
          $tt_run= mysqli_query($con,$query1);
		  ?>

<?php

if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='index.php'</script>";
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		 $(".rslides").responsiveSlides();
	})
</script>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BookingCare.vn</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <Style>
      .ht__cat__thumb img{
        width: 380px;
        height: 170px;
      }
      .fr__product__inner a{
        color: #0B0B61;
        font-size:20px; 
        padding-left: 2px;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;

       
      }
      .htc__best__product__details a{
        font-size:18px;
      }
      </style>

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <style>
        #map {
    position: absolute;
    width: 100%;
    height: 50%;
    background-color: aquamarine;
  }
  
    </style>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header" style="background-color:#EDF2F0;">
                <div class="container">
                    <div class="row">
                        <div class="menu menu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a href="index.php"><h2>BookingCare</h2></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop">
                                            <a href="index.php#chuyenkhoa" style="color:black;">Chuyên Khoa</a></li>
                                        <li class="drop">
                                            <a href="index.php#cosoyte" style="color:black;">Cơ Sở Y Tế</a>
                                        </li>
                                        <li class="drop">
                                            <a href="index.php#tuvan" style="color:black;">Bác Sĩ</a>
                                        </li> 
                                        <li class="drop">
                                            <a href="make_appointment.php" style="color:black;">Đặt Hẹn</a>
                                        </li> 
                                        <li class="drop">
                                            <a href="index.php#goikham" style="color:black;">Gói khám</a>
                                        </li>
                                        <li class="drop">
                                            <?php if(isset($_COOKIE['username'])): ?>
                                                <a href="info_Patient.php" style="color:black;">Thông Tin</a>
                                                <?php else: ?>
                                                <a href="signin.php" style="color:black;">Đăng Nhập</a>
                                                <?php endif; ?>  
                                        </li>

                                    </ul>
                                            
                                             
 

                              
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                </div>
                            </div>
                            <div class="qoute" style="position: absolute; right: 70px; top: 25px;">
                                    <a href="../congnghemoire/chat/login.php"><h3><b><img src="./images/qm.jpg" style="width:30px;"> Chat trực tuyến</b></h3></a>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="" style="background-image: url('images/bg3.png'); background-size:100%; height: 500px;">

        </div>      
         <!-- End Category Area -->
       <!-- Start Product Area -->
       <section class="ftr__product__area ptb--100"  id="chuyenkhoa">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2">
                            <h2 class="title__line" style="color:#0B243B">Chuyên khoa phổ biến</h2></br>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="product__wrap clearfix">

                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/khoa/coxuongkhop.php">
                                        <img src="images/coxuongkhop.jpg" alt="product images">
                                    </a>
                                </div>
                              <br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/khoa/coxuongkhop.php">Cơ xương khớp</a></h4>
                                    <span> &nbsp;Chuyên khoa Cơ xương khớp Việt Nam</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/khoa/thankinh.php">
                                        <img src="images/thankinh.jpg" alt="product images">
                                    </a>
                                </div>
                              <br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/khoa/thankinh.php">Thần kinh</a></h4>
                                    <span> &nbsp;Chuyên khoa Thần kinh Việt Nam</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/khoa/tieuhoa.php">
                                        <img src="images/tieuhoa.jpg" alt="product images">
                                    </a>
                                </div>
                              <br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/khoa/tieuhoa.php" >Tiêu hóa</a></h4>
                                    <span> &nbsp;Chuyên khoa Tiêu hóa Việt Nam</span>
                                   <br>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/khoa/timmach.php">
                                        <img src="images/timmach.png" alt="product images">
                                    </a>
                                </div>
                                <Br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/khoa/timmach.php">Tim mạch</a></h4>
                                    <span> &nbsp;Chuyên khoa Tim mạch Việt Nam</span>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- End Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/khoa/taimuihong.php">
                                        <img src="images/taimuihong.jpg" alt="product images">
                                    </a>
                                </div>
                              <br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/khoa/taimuihong.php">Tai mũi họng</a></h4>
                                    <span> &nbsp;Chuyên khoa Tai mũi họng Việt Nam</span>
                                </div>
                            </div>
                        </div>
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/khoa/cotsong.php">
                                        <img src="images/cotsong.png" alt="product images">
                                    </a>
                                </div>
                              <br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/khoa/cotsong.php">Cột sống</a></h4>
                                    <span> &nbsp;Chuyên khoa Cột sống Việt Nam</span>
                                </div>
                            </div>
                        </div>
                       
                        <!-- End Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/khoa/yhoccotruyen.php">
                                        <img src="images/yhoccotruyen.jpg" alt="product images">
                                    </a>
                                </div>
                                <br>
                              
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/khoa/yhoccotruyen.php">Y học Cổ truyền</a></h4>
                                    <span> &nbsp;Chuyên khoa Y học Cổ truyền Việt Nam</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/khoa/dalieu.php">
                                        <img src="images/dalieu.jpg" alt="product images">
                                    </a>
                                </div>
                                <br>
                              
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/khoa/dalieu.php">Da liễu</a></h4>
                                    <span> &nbsp;Chuyên khoa Da liễu Việt Nam</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftr__product__area ptb--100" style="background-color:#EDF2F0;"  id="cosoyte">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2">
                            <h2 class="title__line" style="color:#0B243B">Cơ sở y tế</h2></br>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="product__wrap clearfix">

                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/cosoyte/govap.php">
                                        <img src="images/benhvien/govap.png" alt="product images">
                                    </a>
                                </div>
                              <br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/cosoyte/govap.php">Bệnh viện Gò Vấp</a></h4>
                                    <span>58 Nguyễn Văn Bảo, P14, Quận Gò Vấp</br>Hotline: 1900 4191</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/cosoyte/thuduc.php">
                                        <img src="images/benhvien/thuduc.png" alt="product images">
                                    </a>
                                </div>
                              <br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/cosoyte/thuduc.php">Bệnh viện Thủ Đức</a></h4>
                                    <span>34 Tô Ngọc Vân, P4, Quận Thủ Đức</br>Hotline: 1900 8161</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/cosoyte/tanbinh.php">
                                        <img src="images/benhvien/tanbinh.png" alt="product images">
                                    </a>
                                </div>
                              <br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/cosoyte/tanbinh.php" >Bệnh viện Tân Bình</a></h4>
                                    <span>86 Hoàng Hoa Thám, P8, Quận Tân Bình</br>Hotline: 1900 1891</span>
                                   <br>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/cosoyte/binhthanh.php">
                                        <img src="images/benhvien/binhthanh.png" alt="product images">
                                    </a>
                                </div>
                                <Br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/cosoyte/binhthanh.php">Bệnh viện Bình Thạnh</a></h4>
                                    <span>67 Phan Đăng Lưu, P9, Quận Bình Thạnh</br>Hotline: 1900 1926</span>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- End Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/cosoyte/quan10.php">
                                        <img src="images/benhvien/quan10.png" alt="product images">
                                    </a>
                                </div>
                              <br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/cosoyte/quan10.php">Bệnh viện Quận 10</a></h4>
                                    <span>14 Sư Vạn Hạnh, P7, Quận 10</br>Hotline: 1900 1241</span>
                                </div>
                            </div>
                        </div>
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/cosoyte/quan5.php">
                                        <img src="images/benhvien/quan5.png" alt="product images">
                                    </a>
                                </div>
                              <br>
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/cosoyte/quan5.php"> Bệnh viện Quận 5</a></h4>
                                    <span>54 Hai Bà Trưng, P9, Quận 5</br>Hotline: 1900 3411</span>
                                </div>
                            </div>
                        </div>
                       
                        <!-- End Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/cosoyte/tanphu.php">
                                        <img src="images/benhvien/tanphu.png" alt="product images">
                                    </a>
                                </div>
                                <br>
                              
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/cosoyte/tanphu.php">Bệnh viện Tân Phú</a></h4>
                                    <span>32 Trường Chinh, P5, Quận Tân Phú</br>Hotline: 1900 6711</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="../congnghemoire/cosoyte/quan12.php">
                                        <img src="images/benhvien/quan12.png" alt="product images">
                                    </a>
                                </div>
                                <br>
                              
                                <div class="fr__product__inner">
                                    <h4><a href="../congnghemoire/cosoyte/quan12.php">Bệnh viện Quận 12</a></h4>
                                    <span>47 Trung Mỹ Tây, P13, Quận 12</br>Hotline: 1900 1941</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>     
        <section class="top__rated__area bg__white pt--100 pb--110"  id="tuvan">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line"style="color:#0B243B;text-align:right;margin-right:100px;">Nhận cuộc gọi tư vấn cùng BookingCare</h2>
                            <h5 class="title__line"style="color:#0B243B;text-align:right;margin-right:230px;">Chúng tôi sẽ liên hệ với bạn sớm nhất!</h5>
                        </div>
                    </div>
                </div>
                <div class="row mt--20">
                   
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="htc__best__product">
                            <img src="images/side1.jpg" alt="product images" style="height:170 px;"></br></br>
                            <img src="images/side2.jpg" alt="product images" style="height:170 px;">
                        </div>
                    </div>
                    <?php


?>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="htc__best__product">
                            
                            <div id="htc__best__product__details" style="width:800px; height:600px; ">
                    <form name="contactus" method="post">
                      <div>
                        <span><label>Họ và Tên:</label></span> <br>
                        <span><input type="text" name="fullname" required="true" value=""></span>
                      </div>
                      <br>
                      <div>
                        <span><label>Email liên hệ:</label></span><br>
                        <span><input type="email" name="emailid" required="ture" value=""></span>
                      </div>
                      <br>
                      <div>
                         <span><label>Số điện thoại:</label></span><br>
                        <span><input type="text" name="mobileno" required="true" value=""></span>
                      </div>
                      <br>
                      <div>
                        <span><label>Mô tả triệu chứng:</label></span><br>
                        <span><textarea name="description" required="true" style="background-color:white;"></textarea></span>
                      </div>
                      <br>
                     <div  style="margin-left:350px;">
                         <button type="submit" name="submit" class="btn btn-danger" name="signin" style="font-size:16px;">Nhận tư vấn</button>
                    </div>
                    </form>
                    
                    
                    
                    
                    </div>
                    </div>
                    </div>				
                    </div>
                    
                    
                    
                    </div>
                                 
                
                </div>
            </div>
        </section>
        
    </div>
  
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
   
    <script src="js/bootstrap.min.js"></script>
   
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
   
    <script src="js/waypoints.min.js"></script>
    
    <script src="js/main.js"></script>
           
            <br>
        <div class="container text-center">
      
        </div>
        </br>
        <div class="container text-center">
      
        <br>
        </div>
       







</script>


</body>

</html>
<section class="htc__category__area ptb--100" style="background-color:#EDF2F0;" id="goikham">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2">
                            <h2 id="title__line" style="color:#0B243B"> Cẩm nang sức khỏe</h2></br>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                         <!---->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="../congnghemoire/camnang/khamchuyenkhoa.php">
                                            <img src="https://vietluat.vn/wp-content/uploads/2020/03/thanh-lap-cong-ty-phong-kham-2.jpg" alt="product images" style="width:200px;">
                                        </a>
                                    </div>
                                    <br>
                                    <div class="fr__product__inner"style="margin-left: 10px;">
                                        <h4><a href="../congnghemoire/camnang/khamchuyenkhoa.php" style="font-weight:bold;">Khám chuyên khoa</a></h4>
                                       
                                    </div>
                                </div>
                            </div>
                          <!---->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="../congnghemoire/camnang/khamtuxa.php">
                                            <img src="data:image/jpeg;base64,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" alt="product images" style="width:200px;">
                                        </a>
                                    </div>
                                    
                                    <div class="fr__product__inner" style="margin-left: 40px;">
                                    <br>
                                        <h4><a href="../congnghemoire/camnang/khamctuxa.php"style="font-weight:bold;">Khám từ xa</a></h4>
                                       
                                    </div>
                                </div>
                            </div>
                           <!---->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="../congnghemoire/camnang/khamtongquat.php">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQK4BTh-2iSg9zXCFF8XwPnyN1JEg4dZHFIjA&usqp=CAU" alt="product images" style="width:200px;">
                                        </a>
                                    </div>
                                   
                                    <div class="fr__product__inner"style="margin-left: 25px;">
                                      <br>
                                        <h4><a href="../congnghemoire/camnang/khamtongquat.php" style="font-weight:bold;">Khám tổng quát</a></h4>
                                        
                                    </div>
                                </div>
                            </div>
                           <!---->
                           <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="../congnghemoire/camnang/xetnghiemyhoc.php">
                                            <img src="data:image/jpeg;base64,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" alt="product images" style="width:200px;">
                                        </a>
                                    </div>
                                   
                                    <div class="fr__product__inner"style="margin-left: 25px;">
                                      <br>
                                        <h4><a href="../congnghemoire/camnang/xetnghiemyhoc.php" style="font-weight:bold;">Xét nghiệm y học</a></h4>
                                        
                                    </div>
                                </div>
                            </div>
                          <!----> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
 <div id="news"></br></br></br>
        <div class="container">
        <div class="section__title--2">
                <h2 id="title__line" style="color:#0B243B">Tin tức nổi bật tuần qua</h2></br>
        </div>
          <div class="row">
              

          <?php 
          

                while ($row=mysqli_fetch_assoc($tt_run)) 
                { ?>   
            <div class="col-md-4">
              <div class="news-box">
                <div class="news-box-up">
                  <a href="<?php echo  "tin-tucct.php?id=".$row['id']; ?>" class="news-box-img"  style="width:250px;">
                    <?php echo '<img src="director/view-dr/image/'.$row['img'].'" alt="Image">' ?></a>
                </div>
                <div class="news-box-down">
                  <a href="<?php echo "tin-tucct.php?id=".$row['id']; ?>"><?php echo $row['TuaDe']; ?></a>
                </div>
              </div>
            </div>
           <?php     
          
                                                    } 
                                                ?>
            
            
          </div>
        </div>
      </div>
      <BR>
      <BR>
      
      <bR>

        <!-- google map api -->
        <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIEbYqZBlASKiunTbZrSZGo4zWcZrjTzc&libraries=places&callback=showMap" async defer></script>
    <script type="text/javascript">
        var bando= null;
        var lat = 0;
        var long = 0 ;
        const dakota = {lat: 10.8222053 , lng: 106.6874994};
        // var infowindow = null;
       function showMap() {
            // infowindow = new google.maps.Infowindow();
            window.navigator.geolocation.getCurrentPosition(function(pos){
            lat = pos.coords.latitude;
            long = pos.coords.longitude;
            console.log(lat, long);
            bando = new google.maps.Map(document.getElementById("map"), {
                center: { lat:lat, lng:long },
                zoom:15
            });
            var cp = new google.maps.Marker({
                position: { lat:lat , lng:long },
                map: bando
            });

            var cp1 = new google.maps.Marker({
                position: dakota,
                map: bando
            });
    
             let directionsService = new google.maps.DirectionsService();
             let directionsRenderer = new google.maps.DirectionsRenderer();
             directionsRenderer.setMap(bando); // Existing map object displays directions
        // Create route from existing points used for markers
        const route = {
           origin: { lat:lat, lng:long } ,
             destination:dakota,
             travelMode: 'DRIVING'
         }

         directionsService.route(route,
             function(response, status) { 
             if (status !== 'OK') {
                 window.alert('Directions request failed due to ' + status);
                 return;
             } else {
                 directionsRenderer.setDirections(response); 
                 var directionsData = response.routes[0].legs[0];
                 if (!directionsData) {
                 window.alert('Directions request failed');
                 return;
                }
                 else {
                 document.getElementById('msg').innerHTML += " Driving distance is " + directionsData.distance.text + " (" + directionsData.duration.text + ").";
                 }
          }
            });
        });
        
}
    </script>
 
