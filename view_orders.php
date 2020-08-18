<?php
$title="Branch Management";
$selected="order";
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
                    <h1 class="page-header">Orders </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Receipt No</th>
                                        <th>Status</th>
                                        <th>Change Order Status</th>
                                        <th>Delivery Status</th>
                                        <th>Change Delivery Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include './php/sql_connect.php';



                                    $sql="SELECT C.f_name,C.l_name,I.name,P.quantity,P.receipt_number,P.status, P.d_status, P.id FROM customer as C JOIN item as I JOIN pending_order as P on P.customer_id=C.id AND P.item_id = I.id ORDER BY P.id DESC;";
                                    $result=mysqli_query($conn,$sql);
                                    $count = 1;
                                    while($row = mysqli_fetch_assoc($result)) {

                                        ?>


                                        <tr>
                                            <td><?php echo  $count ?></td>
                                            <td><?php echo  $row["f_name"]." ".$row['l_name']?></td>
                                            <td><?php echo  $row["name"]?></td>
                                            <td><?php echo  $row["quantity"]?></td>
                                            <td><?php echo  $row["receipt_number"]?></td>
                                            <td>
                                              <?php echo  $row["status"]?>
                                              <i class="fa <?php if($row["status"] == "APPROVED") echo "fa-check-circle"; else if ($row["status"]=="PENDING") echo "fa-hourglass-2";else echo "fa-remove";?> fa-fw" </i>
                                            </td>
                                            <td>
                                              <button class="btn btn-block <?php if($row["status"] == "PENDING") echo "btn-info"; else echo "btn-active"?> btn-small" onclick="changeOrderStatusTo('PENDING', <?php echo $row['id'] ?>)">Pending</button>
                                              <button class="btn btn-block <?php if($row["status"] == "APPROVED") echo "btn-info"; else echo "btn-active"?> btn-small" onclick="changeOrderStatusTo('APPROVED', <?php echo $row['id'] ?>)"  >Approved</button>
                                            </td>
                                            <td><?php echo  $row["d_status"]?></td>
                                            <td>
                                              <button class="btn btn-block <?php if($row["d_status"] == "PAYMENT_CONFIRMATION") echo "btn-info"; else echo "btn-active"?> btn-small" onclick="changeDeliveryStatusTo('PAYMENT_CONFIRMATION', <?php echo $row['id'] ?>)">Payment Confirm</button>
                                              <button class="btn btn-block <?php if($row["d_status"] == "SHIPPED") echo "btn-info"; else echo "btn-active"?> btn-small" onclick="changeDeliveryStatusTo('SHIPPED', <?php echo $row['id'] ?>)"  >Shipped</button>
                                              <button class="btn btn-block <?php if($row["d_status"] == "IN_TRANSIT") echo "btn-info"; else echo "btn-active"?> btn-small" onclick="changeDeliveryStatusTo('IN_TRANSIT', <?php echo $row['id'] ?>)">In Transit</button>
                                              <button class="btn btn-block <?php if($row["d_status"] == "DELIVERED") echo "btn-info"; else echo "btn-active"?> btn-small" onclick="changeDeliveryStatusTo('DELIVERED', <?php echo $row['id'] ?>)">Delivered</button>
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
