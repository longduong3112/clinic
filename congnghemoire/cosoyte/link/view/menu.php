<div></div> <!--Hoàn tất-->
<style type="text/css"> 
  #menu{
    margin-top: 10px;
    width: 100%;
  }
  #menu ul{
    list-style-type: none;
    background: #ffffff;
    color: #404040;
    text-align: left;
    font-family: 'Times New Roman', Times, serif;
    font-size: 16px;
    z-index: 5;
    margin-left:  80px;
    border: 1px solid white;
  }
  #menu li{
    display: inline-block;
    width: 160px;
    line-height: 40px;
    margin-left: -5px;
    position: relative;
    text-align: center;   
  }
  .mb-0 a{
    color: #404040;
    text-decoration: none;
    display: block;
    border: 1px solid white;
    background-color: #416696;
    color: white;
  }
  .mb-0 a:hover{
    text-decoration: none;  
    color: #1273eb;
  }
  .menucon{
    display:none;
    position:absolute;
  }
  .menucon li{
    display:block;
    margin-left: 0 !important;
  }
  #menu li:hover .menucon{
    display:block;
  }
</style>
  <div id="menu">
    <ul class="mb-0" style="width=100%">
        <li><a href="index.php">TRANG CHỦ</a></li>
			  <li><a href="index.php">CHUYÊN KHOA</a></li>
			  <li><a href="index.php">CƠ SỞ Y TẾ</a></li>
        <li><a href="index.php">BÁC SĨ</a></li>
        <li class=""><a href="makeAppointmentStep1.php">ĐẶT HẸN</a></li>
        <li class=""><a href="index.php#bacsy2">GÓI KHÁM</a></li>
        <?php if(isset($_COOKIE['username'])): ?>
            <a href="info_Patient.php" style="color:black;">THÔNG TIN</a>
        <?php else: ?>
            <a href="signin.php" style="color:black;">ĐĂNG NHẬP</a>
        <?php endif; ?>  
  </div>
  