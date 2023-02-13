<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include_once "headerr.php"; ?>
<style>
  
  .form{
  padding: 25px 30px;
}
.form header{
  font-size: 25px;
  font-weight: 600;
  padding-bottom: 10px;
  border-bottom: 1px solid #e6e6e6;
}
.form form{
  margin: 20px 0;
}
.form form .error-text{
  color: #721c24;
  padding: 8px 10px;
  text-align: center;
  border-radius: 5px;
  background: #f8d7da;
  border: 1px solid #f5c6cb;
  margin-bottom: 10px;
  display: none;
}
.form form .name-details{
  display: flex;
}
.form .name-details .field:first-child{
  margin-right: 10px;
}
.form .name-details .field:last-child{
  margin-left: 10px;
}
.form form .field{
  display: flex;
  margin-bottom: 10px;
  flex-direction: column;
  position: relative;
}
.form form .field label{
  margin-bottom: 2px;
}
.form form .input input{
  height: 40px;
  width: 100%;
  font-size: 16px;
  padding: 0 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}
.form form .field input{
  outline: none;
}
.form form .image input{
  font-size: 17px;
}
.form form .button input{
  height: 45px;
  border: none;
  color: #fff;
  font-size: 17px;
  background: #333;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 13px;
}
.form form .field i{
  position: absolute;
  right: 15px;
  top: 70%;
  color: #ccc;
  cursor: pointer;
  transform: translateY(-50%);
}
.form form .field i.active::before{
  color: #333;
  content: "\f070";
}
.form .link{
  text-align: center;
  margin: 10px 0;
  font-size: 17px;
}
.form .link a{
  color: #333;
}
.form .link a:hover{
  text-decoration: underline;
}



</style>
<body>

<div class="container">
    <section class="form login">
      <center><header><h3 style="margin-top:10px;">Tu Van Vien</h3></header></center>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label style="text-align:left">Tài khoản: </label>
          <input type="text" name="username" placeholder="Nhập username" required>
        </div>
        <div class="field input">
          <label style="text-align:left;">Mật khẩu: </label>
          <input type="password" name="password" placeholder="Mật khẩu" required>
          <i class="fas fa-eye" style="padding-right:20px;"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Đăng nhập"><br>
          <a href="../chat/users.php">For user</a>
        </div>
      </form>
    </section>
  </div>
  
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login_admin.js"></script>
  <script src="javascript/admin.js"></script>
</body>
</html>
<!--
    
-->