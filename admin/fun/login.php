<?php
    $_POST["password"]=sha1($_POST["password"]);
    if($_POST["username"]!=""){
        include("../DB/connect.php");
        $username= $_POST["username"];
        $password= $_POST["password"];
        $admin_data = $conn->query("SELECT * FROM admins where username ='$username'");
        $rows = $rows = mysqli_num_rows($admin_data);
        $admin_data=$admin_data->fetch_assoc();
            if($rows>0)
            {
                if(!($password==$admin_data["password"])){
                    echo 2;
                }
                else{
                    $id = $admin_data["id"];
                    $value = $id+rand();
                    $conn->query("DELETE FROM `token` where id=$id");
                    $conn->query("INSERT INTO `token`(`id`, `token`) VALUES ('$id','$value')");
                    setcookie("usertoken", $value, time() + (86400 * 30), "/");
                    setcookie("userid", $id, time() + (86400 * 30), "/");
                    echo "3";
                }
            }
            else{
                echo 1;
            }
    }
    else {
        echo "no_data";
    }
?>