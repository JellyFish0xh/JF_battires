<?php
    include("../admin/DB/connect.php");
    if($_POST["fun"]=="smsg"){
        $name = $_POST["name"];
        $Email = $_POST["Email"];
        $Msg = $_POST["Msg"];
        if($conn->query("INSERT INTO `messages`(`Sender_name`, `message`, `email`, `statues`) VALUES ('$name','$Email','$Msg','0')")){
            echo "message sent";
        }
        else{
            echo $conn->error;
        }
    }
    else{
        echo "error no functions is found";
    }
?>