         <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Products Data</h6>
        <button class="btn btn-dark my-3" data-toggle="modal" data-target="#Insert_modal">Insert</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Images</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $products=$conn->query("SELECT * FROM `products` ");
                        while($row=$products->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?= $row["Name"] ?></td>
                        <td>
                            <?php
                                $brand_id = $row["brand"];
                                $brand_name = $conn->query("SELECT brand FROM brand where id=$brand_id")->fetch_assoc();
                                echo $brand_name["brand"];
                            ?>
                        </td>
                        <td>
                            <?php
                                $cat_id = $row["category"];
                                $cat_name = $conn->query("SELECT name FROM category where id=$cat_id")->fetch_assoc();
                                echo $cat_name["name"];
                            ?>
                        </td>
                        <td><?= $row["Price"] ?></td>
                        <td><?= $row["amount"] ?></td>
                        <td>
                            <?php
                                $pro_id = $row["id"];
                                $pro_imgs=$conn->query("SELECT Images FROM products_img where product_id=$pro_id");
                                while($img=$pro_imgs->fetch_assoc()){
                            ?>
                                <img style="width:100px;display:inline" src="../images/Products Image/<?php echo $img["Images"]?>" alt="">
                            <?php } ?>
                        </td>
                        <td>
                                <a href="" class="btn btn-danger btn-circle btn-sm tableicons mx-3">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle btn-sm mx-3">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- insert modal -->
<div class="modal fade" id="Insert_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert new Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="insert_product">
            <div class="form-group" enctype="multipart/form-data">
                <input name="pro_name" type="text" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group">
                <select name="brand_name" class="form-control" id="exampleFormControlSelect1">
                    <?php
                        $all_brands_name =$conn->query("SELECT * FROM `brand`");
                        while($brand_name=$all_brands_name->fetch_assoc()){
                    ?>
                    <option value="<?=$brand_name["id"]?>"><?=$brand_name["brand"]?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select name="cat_name" class="form-control" id="exampleFormControlSelect1">
                    <?php
                        $all_cat_name =$conn->query("SELECT * FROM `category`");
                        while($cat=$all_cat_name->fetch_assoc()){
                    ?>
                    <option value="<?=$cat["id"]?>"><?=$cat["name"]?></option>
                    <?php } ?>
                </select>
            </div>
            <div name="amount" class="form-group">
                <input type="number" class="form-control" placeholder="Amount">
            </div>
            <div class="form-group">
                <input type="file" name="img[]" class="form-control" placeholder="Images"  accept="image/*" multiple>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary send_pro">Insert</button>
            </div>
      </form>
    </div>
  </div>
</div>
<script src="js/insert_pro.js"></script>