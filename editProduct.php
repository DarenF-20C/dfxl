<?php
include("config.php");
if (isset($_GET['id'])){
	$ID=$_GET['id'];
	$sql="select * from products where ID='".$ID."'";
	$result=$conn->query($sql);

	$conn->close();
}
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/b45dca3e06.js" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->


<head>
	<title>Edit Product Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>


<body>
<form action="products.php" method="POST">
	<?php
            if ($result->num_rows > 0){
                while ($row  = $result->fetch_assoc()){
                    $ID=$row['ID'];
					$title=$row['title'];
                    $category=$row['category'];  
                    $price=$row['price'];
                    $quantity=$row['quantity'];
                    $size=$row['size'];
							
	?>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Product Edit</h3>
			</div>



			<div class="card-body">
				<form>
					<div class="input-group form-group"><!--ID read only-->
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-asterisk"></i></span>
						</div>
						<input name="ID" type="text" class="form-control" placeholder="ID" value="<?php echo $ID;?>" readonly>
          </div><!--ID read only-->
          
					<div class="input-group form-group"><!--Title-->
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="far fa-file-alt"></i></span>
						</div> 
						<input name="title" type="text" class="form-control" placeholder="Title" value="<?php echo $title;?>">
          </div><!--Title-->
          
          <div class="input-group form-group"><!--Category-->
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-tshirt"></i></span>
						</div> 
					<select class="form-control" name="category">
			          <option selected="">Category</option>
			          <option value="Shirt" <?php if($category=='Shirt'){echo 'selected';}?>>Shirt</option>
			          <option value="T-shirt" <?php if($category=='T-shirt'){echo 'selected';}?>>T-shirt</option>
					  <option value="Sweatshirt" <?php if($category=='Sweatshirt'){echo 'selected';}?>>Sweatshirt</option>
					  <option value="Hooded" <?php if($category=='Hooded'){echo 'selected';}?>>Hooded</option>
					  <option value="Jacket" <?php if($category=='Jacket'){echo 'selected';}?>>Jacket</option>
					  <option value="Sportshirt" <?php if($category=='Sportshirt'){echo 'selected';}?>>SportShirt</option>
		        	</select>
          </div><!--Category-->
          
					<div class="input-group form-group"><!--Price-->
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
						</div> 
						<input name="price" type="text" class="form-control" placeholder="Price" value="<?php echo $price;?>">
          </div><!--Price-->          

					<div class="input-group form-group"><!--Quantity-->
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-infinity"></i></span>
						</div> 
						<input name="quantity" type="text" class="form-control" placeholder="Quantity" value="<?php echo $quantity;?>">
          </div><!--Quantity--> 

          <div class="form-group input-group"> <!--Size-->
    	      <div class="input-group-prepend">
		          <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
		        </div>
            <select class="form-control" name="size" >
			    <option value="XS" <?php if($category=='XS'){echo 'selected';}?>>XS</option>
                <option value="S" <?php if($category=='S'){echo 'selected';}?>>S</option>
                <option value="M" <?php if($category=='M'){echo 'selected';}?>>M</option>
				<option value="L" <?php if($category=='L'){echo 'selected';}?>>L</option>
		    </select>
          </div> <!--Size-->

					<div class="form-group"> <!--edit-->
						<input type="submit" value="Edit" class="btn float-right login_btn">
					</div><!--edit-->
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Display Product?<a href="http://localhost/groupassignment/products.php">Product List</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

 }
}           
?>
</form>  
</body>
