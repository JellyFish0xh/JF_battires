<?php
    include("../DB/connect.php");
    $length = count($_FILES["img"]["name"]);
    $last_id = 0;
    $stat = false;
    $pro_name = $_POST["pro_name"];
    $brand_val = $_POST["brand_name"];
    $cat_val = $_POST["cat_name"];
    $amount = $_POST["amount"];
    $price = $_POST["price"];
    if($conn->query("INSERT INTO `products`(`Name`, `brand`, `category`, `Price`, `amount`) VALUES ('$pro_name','$brand_val','$cat_val','$price','$amount')")){
        $last_id = $conn->insert_id;
    }
    for($x=0;$x<$length;$x++)
    {
        if($_FILES["img"]["error"][$x]==0)
        {
            $filename = $_FILES["img"]["name"][$x];
            $exts = ["jpg","jpeg","png"];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $name = pathinfo($filename,PATHINFO_FILENAME);
            if(in_array($ext,$exts))
            {
                $size = $_FILES["img"]["size"][$x];
                if($size<1024*1024){
                    $_FILES["img"]["name"][$x]=$name.time().rand(0,9999).".".$ext;
                    $ffilename=$_FILES["img"]["name"][$x];
                    if($conn->query("INSERT INTO `products_img`(`product_id`, `Images`) VALUES ('$last_id','$ffilename')")){
                        move_uploaded_file($_FILES["img"]["tmp_name"][$x],"../../images/Products_Image/$ffilename");
                    }
                }
                else{echo "size is too large try img under 5 mb";}
            }
            else{
                echo "ext is not valid";
            }
        }
        else{
            echo "file not uploaded";
        }

    }
?>