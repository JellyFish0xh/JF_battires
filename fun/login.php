<?php
    include("../admin/DB/connect.php");
    $email=$_POST["email"];
    $password = sha1($_POST["password"]);
    $query="SELECT * FROM `users` WHERE E_mail='$email'";
    $user_data = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($user_data);
    $user_data = $user_data->fetch_assoc();
    if($email!=""){
        if($rows!=0){
            $password_db = $user_data["password"] ?? "";
            if($password_db==$password){
                $id = $user_data["id"];
                $token = $id+rand();
                $conn->query("DELETE FROM `user_token` where id=$id");
                $conn->query("INSERT INTO `user_token`(`id`, `token`) VALUES ('$id','$token')");
                setcookie("usertoken", $token, time() + (86400 * 30), "/");
                setcookie("userid", $id, time() + (86400 * 30), "/");
            }
            else{
                echo "wrong password";
            }
        }
        else{
            echo "no-data-found";
        }
    }
    else
    {
        echo "EnterData";
    }
?>