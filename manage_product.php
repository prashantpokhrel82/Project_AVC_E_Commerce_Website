<?php
$title="Branch Management";
$selected="inventory";
session_start();
    //$selected="dashboard";
include 'header.php';
?>

<div id="wrapper">

    <!-- Navigation -->

    <?php require 'navigation.php';?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Inventory Management </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include './php/sql_connect.php';



                                    $sql="SELECT * FROM item";
                                    $result=mysqli_query($conn,$sql);
                                    $count = 1;
                                    while($row = mysqli_fetch_assoc($result)) {

                                        ?>


                                        <tr>
                                            <td><?php echo  $count ?></td>
                                            <td><?php echo  $row["name"]?></td>
                                            <td><?php echo  $row["price"]?></td>
                                            <td><?php echo  $row["description"]?></td>
                                            <td>
                                                <a><i class="fa fa-edit fa-fw" onclick="edit_product('<?php echo  $row['id']?>','<?php echo  $row['name']?>','<?php echo  $row['price']?>','<?php echo  $row['description']?>')"></i></a>
                                                <a><i class="fa fa-remove fa-fw" onclick="remove_product(<?php echo  $row['id']?>)"></i></a>
                                            </td>

                                        </tr>


                                        <?php
                                        $count=$count+1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                </div>

            </div>

            <div class="row" id="edit_branch_area">
                <div class="col-lg-5">
                    <div class="container">
                      <form>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="product_name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Price</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" id="product_price">
                        </div>

                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-5">
                      <textarea class="form-control" rows="5" id="product_description"></textarea>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-3 offset-md-3 col-sm-10">
                        <button class="btn btn-primary" onclick="update_product()">Update</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

            </div>



        </div>
    </div>
</div>




<?php include 'footer.php';?>
