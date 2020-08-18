<?php
$title="Add Product";
$selected="inventory";
session_start();
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
                    <h1 class="page-header">Inventory Management - Add Product </h1>
                </div>
            </div>

            <div class="container">
              <form method="POST" action="./php/product_add.php" enctype='multipart/form-data'>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product Name</label>
                  <div class="col-sm-5">
                    <input type="text" name="name" class="form-control" id="input_product_name" placeholder="Enter product name here. eg- Jacket" required>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Price</label>
              <div class="col-sm-5">
                <input type="number" name="price" class="form-control" id="input_price" placeholder="Enter Price Here">
              </div>

            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-5">
                <textarea class="form-control" rows="5" name="description" id="input_description"></textarea>
                </div>
            </div>
            <!--add image-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Upload Image</label>
              <div class="col-sm-5">
                <input type="file" name="photo" class="form-control" id = "image">
                <!-- <input type="hidden" name="image_url" class="btn-secondary" id = "image_url" value="getImageURL()"> -->

                <!--<input type="number" class="form-control" id="input_price" placeholder="Enter Price Here">-->
                </div>
            </div>

        <div class="form-group row">
          <div class="offset-sm-3 offset-md-3 col-sm-10">
          <!--<button class="btn btn-primary" onclick="add_product()">Add</button>-->
          <input type="submit" name="submit" value="Add">
        </div>
    </div>
</form>
</div>


</div>
</div>

</div>
<script>
getImageURL(){
  var imageURL = document.getElementById('imageURL').value;
  return imageURL;
}
</script>

<?php require 'footer.php';?>
