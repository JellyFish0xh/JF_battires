<?php
// last products
    $last_pros = $conn->query("SELECT * FROM products order by id desc limit 3");
    $x = true;
?>
<div class="container">
        <div>
            <div id="carouselExampleCaptions" class="carousel slide Jwidth mx-auto " data-ride="carousel">
                <ol class="carousel-indicators bg-dark">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="slider_title">
                        <center><h3>Top Products</h3></center>
                    </div>
                        <?php
                            foreach($last_pros as $lpro){?>
                                <div class="carousel-item <?php if($x){echo "active";$x=false;}?>">
                                <?php
                                    $id = $lpro["id"];
                                    $pro_img=$conn->query("SELECT Images FROM products_img where product_id=$id")->fetch_assoc();
                                ?>
                                <img src="images/Products Image/<?= $pro_img["Images"]?>" class="d-block w-100">
                                <br>
                                <br>
                                <div class="carousel-caption d-none d-md-block text-dark">
                                    <h5>
                                        <?php
                                            $c_id=$lpro["category"];
                                            $b_id=$lpro["brand"];
                                            $brand_name = $conn->query("SELECT brand from brand where id=$b_id")->fetch_assoc();
                                            $cat_name = $conn->query("SELECT name from category where id=$c_id")->fetch_assoc();
                                            ?>
                                        <a href="pro.php?cat_id=<?= $c_id ?>&brand_id=<?= $b_id?>">
                                        <?php
                                            echo $brand_name["brand"]." ".$cat_name["name"];
                                        ?>
                                    </a></h5>
                                </div>
                            </div>
                            <?php } ?>
                    </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
        <br><br>
            <div class="mx-auto">
                <center>
                    <h1>Browse By Brand</h1>
                </center>
                <div class="row">
                        <?php
                            $allbrands =$conn->query("SELECT * FROM brand");
                            foreach($allbrands as $brand)
                            {?>
                                <div class="card mx-auto my-4" style="width: 18rem;">
                                    <img style="width:286px;height: 286px;" src="images/Brand logo/<?= $brand["brand_image"]?>" class="card-img-top" alt="...">
                                    <div class="card-body bg-dark">
                                        <h5 class="card-text text-white"><?=$brand["brand"]?></h5>
                                        <h6 class="card-text text-white"><?=$brand["description"]?></h6>
                                    </div>
                                    <div class="card-body bg-dark">
                                        <a href="index.php?page=opr&brand_id=<?=$brand["id"]?>" class="card-link" data-ur1313m3t="true">عرض المنتجات</a>
                                    </div>
                                </div>
                            <?php } ?>
                </div>
            </div>
        </div>