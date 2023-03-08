
<div class="container">
    <div class="row">
    <div class="py-4 px-0 bg-white text-white mb-3">
                                        <div class="py-2 px-2 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">brands</strong></div>
                                        <ul class="list-unstyled small text-muted lg-1 font-weight-bold">
                                            <?php
                                            $allbrands=$conn->query("Select * from brand");
                                            while($brand=$allbrands->fetch_assoc()){?>
                                                <li class="mb-1 "><a class="text-dark" href="index.php?page=opr&brand_id=<?=$brand["id"]?>"><?=$brand["brand"]?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                    <?php
                                if(isset($_GET["pagenum"])){
                                    $page=(($_GET["pagenum"]-1)*3);
                                }
                                else
                                {
                                    $page=0;
                                }
                                if(isset($_GET["brand_id"]))
                                {
                                    $id = $_GET["brand_id"];
                                    $allproducts =$conn->query("SELECT * FROM products where brand=$id limit 3 OFFSET $page");
                                    $link ="index.php?page=opr&brand_id=$id";
                                    $allrows= $conn->query("SELECT * FROM products where brand=$id");
                                }
                                else
                                {
                                    $allproducts =$conn->query("SELECT * FROM products limit 3 OFFSET $page");
                                    $link ="index.php?page=opr";
                                    $allrows= $conn->query("SELECT * FROM products");
                                }
                                while($product = $allproducts->fetch_assoc())
                                {
                                    $pro_id = $product["id"];
                                    ?>
                                    <div class="card mx-auto my-4" style="width: 18rem;">
                                        <img style="width:286px;height: 286px;" class="card-img-top" src="images/Products Image/<?php
                                        $pro_imgs = $conn->query("SELECT * FROM products_img where product_id=$pro_id limit 1")->fetch_assoc();
                                        echo $pro_imgs["Images"];
                                        ?>">
                                        <div class="card-body bg-dark">
                                            <h5 class="card-text text-white"><?php
                                            $brand_id = $product["brand"];
                                            $cat_id =$product["category"];                            $brand_name=$conn->query("SELECT * FROM brand where id=$brand_id")->fetch_assoc();
                                            $category_name=$conn->query("SELECT * FROM category where id=$cat_id")->fetch_assoc();
                                            echo $brand_name["brand"]." ".$category_name["name"];
                                            ?></h5>
                                            <h6 class="card-text text-white"><?=$product["Price"]?></h6>
                                        </div>
                                        <div class="card-body bg-dark">
                                        <a href="index.php?pro_id=<?= $pro_id?>" class="card-link" data-ur1313m3t="true"><button class="btn btn-success">شراء</button></a>
                                        </div>
                                    </div>
                                <?php } ?>
    </div>
    <div>
        <?php
                $rows = mysqli_num_rows($allrows);
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                for($i=1;$i<=ceil($rows/3);$i++){?>
                    <li class="page-item"><a class="page-link" href="<?php echo $link."&pagenum=$i" ?>"><?=$i?></a></li>
                <?php }?>
            </ul>
    </nav>
    </div>
</div>