<script type="text/javascript" src="./script/script.js"></script>

<table class="table">
  <thead class="thead-dark">
    <tr>
			<th scope="col">S.N.</th>
			<th scope="col">Item Name</th>
			<th scope="col">Price</th>
			<th scope="col">Quantity</th>
			<th scope="col">Total</th>
			<th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>

<?php
	include 'sql_connect.php';

	session_start();
	//var_dump($_SESSION);
	//echo "this is awesome";

	$sum=0;

	$customerID=$_SESSION["customerID"];
	$sql="SELECT * FROM item JOIN cart ON item.id = cart.item_id WHERE customer_id=$customerID";
	$result=mysqli_query($conn,$sql);
	$count = 1;
	while($row = mysqli_fetch_assoc($result)) {
			//echo $row["name"]." ".$row["price"]." ".$row["quantity"]."<br>";

		$itemID=$row["item_id"];

	?>


	<tr>
		<th scope="row"><?php echo $count; ?></th>
		<td><?php echo  $row["name"]?></td>
		<td><?php echo  $row["price"]?></td>
		<td><?php echo  $row["quantity"]?></td>
		<td><?php echo  $row["price"]*$row["quantity"]?></td>
		<td><a href="" class="update" onclick="updateQty(<?php echo $itemID?>,<?php echo $customerID?>)">Update		</a><A HREF="" class="remove" onclick="removeItem(<?php echo $itemID?>,<?php echo $customerID?>)">Remove</A></td>
	</tr>
</tbody>





	<?php
	$count = $count + 1;
	$sum =$sum + $row["price"]*$row["quantity"];


	}


?>

<tr><th>Grand Total</th><th><?php echo  $sum?></th></tr>
</table>
