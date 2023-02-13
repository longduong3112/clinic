<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages_chat LEFT JOIN user ON user.unique_id = messages_chat.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<li class="clearfix">
                                 <div class="message-data text-right">
                                <span class="message-data-time">'. $row['time'].'</span>
                                </div>
                                <div class="message other-message float-right">'. $row['msg'] .'</div>
                                 </li>';
                }else{
                    $output .= '<li class="clearfix">
                                <div class="message-data">
                                    <span class="message-data-time">'. $row['time'].'</span>
                                </div>
                                <div class="message my-message">'.$row['msg'].'</div>                                    
                                </li> ';
                }
            }
        }else{
            $output .= '<div class="text"></div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>