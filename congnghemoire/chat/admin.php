
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
  
<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "headerr.php"; ?>
<style type="text/css">

body{
    background-color: #f4f7f6;
}
/* .card {
    background: white;
    transition: .5s;
    border: 0;
    margin-top: 50px;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
} */
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.people-list .users-list li {
    padding-top: 25px;
    list-style: none;
    border-radius: 3px
}

.people-list .users-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .users-list li.active {
    background: #efefef
}

.people-list .users-list li .name {
    font-size: 15px;
    color: black ;
}

.people-list .users-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}


.chat ul {
    padding: 0
}

.chat ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat ul li:last-child {
    margin-bottom: 0px
}

.chat .message-data {
    margin-bottom: 15px
}

.chat .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .my-message {
    background: #efefef
}

.chat .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px
}
.users-list{
  max-height: 350px;
  overflow-y: auto;
}
:is(.users-list, .chat-box)::-webkit-scrollbar{
  width: 0px;
}
.users-list a{
  padding-bottom: 10px;
  margin-bottom: 15px;
  padding-right: 15px;
  border-bottom-color: .f1f1f1;
}
.users-list a:last-child{
  margin-bottom: 0px;
  border-bottom: none;
}
.users-list a img{
  height: 40px;
  width: 40px;
}
.users-list a .details p{
  color: black;
}
.users-list a .status-dot{
  font-size: 12px;
  color: green;
  padding-left: 10px;
}
.users-list a .status-dot.offline{
  color: grey;
}
.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}
.typing-area{
  padding: 18px 30px;
  display: flex;
  justify-content: space-between;
}
.typing-area input{
  height: 45px;
  width: calc(100% - 58px);
  font-size: 16px;
  padding: 0 13px;
  border: 1px solid .e6e6e6;
  outline: none;
  border-radius: 5px 0 0 5px;
}
.typing-area button{
  color: black;
  width: 55px;
  border: none;
  outline: none;
  background: .333;
  font-size: 19px;
  cursor: pointer;
  opacity: 0.7;
  pointer-events: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.3s ease;
}
.typing-area button.active{
  opacity: 1;
  pointer-events: auto;
}
.chat-box{
  position: relative;
  min-height: 600px;
  max-height: 600px;
  overflow-y: auto;
  padding: 10px 30px 20px 30px;
  background: .f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
}
.chat-box .text{
  position: absolute;
  top: 45%;
  left: 50%;
  width: calc(100% - 50px);
  text-align: center;
  transform: translate(-50%, -50%);
}
@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="wrapper">
        <div class="card chat-app">
            <div id="plist" class="people-list">
            <div class="search" >
                <input type="text" >
                <button><i class="fas fa-search"></i></button>
            </div>
                
                <!-- list -->
                
                <ul class="users-list list-unstyled mt-2 mb-0">
                </ul>
               
            </div>
            
            <!-- chat area -->
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                        <?php 
                            $sql = mysqli_query($conn, "SELECT * FROM user WHERE unique_id = {$_SESSION['unique_id']}");
                            if(mysqli_num_rows($sql) > 0){
                            $row = mysqli_fetch_assoc($sql);
                            }
                        ?>
                        <h5><?php echo $row['fullname'] ?></h5>
                        <p style="color:green"><?php echo $row['status']; ?></p>
                        </div>
                        <div class="col-6"><a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout btn btn-danger">Thoát</a></div>
                        
                    </div>
                    
                </div>
            <!-- chat area -->
                            <?php 
                        $id_user = mysqli_real_escape_string($conn, $_GET['id_user']);
                        $sql = mysqli_query($conn, "SELECT * FROM user WHERE unique_id = {$id_user}");
                        if(mysqli_num_rows($sql) > 0){
                            $row = mysqli_fetch_assoc($sql);
                        }else{
                            header("location: chat_app.php");
                        }
                        ?>
                        <ul class="chat-box m-b-0">                            
                    </ul>
                
                <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id_user; ?>" hidden >
                <input type="text" name="message" class="input-field" autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
                </form>
                
            
        </div>
</div>
<script type="text/javascript"></script>
<script src="javascript/chat.js"></script>
<script src="javascript/admin.js"></script>

</body>
</html>