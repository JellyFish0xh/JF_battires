<!DOCTYPE html>
<html lang="en">
        <?php
            include("inc/header.php");
            if(isset($_GET["page"])){
                if($_GET["page"]=="Abu")
                {
                    include("pages/aboutus.php");
                }
                elseif($_GET["page"]=="opr"){
                    include("pages/products.php");
                }
                elseif($_GET["page"]=="Cotus"){
                    include("pages/contactus.php");
                }
                elseif($_GET["page"]=="cart"){
                    echo "cart";
                }
                elseif($_GET["page"]=="profile"){
                    echo "profile";
                }
            }
            else
            {
                include("pages/home.php");
            }
        include("inc/footer.php");
        ?>
</body>
</html>