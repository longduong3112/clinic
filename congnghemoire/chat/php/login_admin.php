<?php 
    session_start();
    include_once "config.php";
    $user_name = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($user_name) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '{$user_name}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $status = "Online";
                $sql2 = mysqli_query($conn, "UPDATE user SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }else{
                    echo "Làm ơn thử lại!";
                }
            }else{
                echo "Username hoặc password không chính xác!";
            }
        }else{
            echo "$user_name - Username không tồn tại!";
        }
    }else{
        echo "All input fields are required!";
    }
?>