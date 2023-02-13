<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM user WHERE NOT unique_id = {$outgoing_id} and attribute != 'tuvanvien' ";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "Không có bệnh nhân!";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data_admin.php";
    }
    echo $output;
?>