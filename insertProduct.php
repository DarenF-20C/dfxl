<?php
include("config.php"); //step 3 import database connection file
if(isset($_POST['ID'])){ 	//step 4 received the data from HTML form
						// isset means if receive any data from the form it will run the code
	
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size 500000 around 500k
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
//receive data from Form
	$ID=$_POST['ID'];
	$title=$_POST['title'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	$size=$_POST['size'];
//define SQL
	$sql="insert into products values('$ID','$title','$category','$price','$target_file','$quantity','$size','1')";
//run SQL
	$result=$conn->query($sql);
//close connection
	$conn->close();
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/b45dca3e06.js" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Insert product page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Product Insert</h3>
			</div>
			<div class="card-body">
				<form action="insertProduct.php" method="POST" enctype="multipart/form-data"><!-- add for upload -->
					<div class="input-group form-group"><!--ID-->
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-asterisk"></i></span>
						</div>
						<input name= "ID" type="text" class="form-control" placeholder="ID">
          			</div><!--ID-->
          
					<div class="input-group form-group"><!--Title-->
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="far fa-file-alt"></i></span>
						</div> 
						<input name="title" type="text" class="form-control" placeholder="Title">
          			</div><!--Title-->
          
          			<div class="input-group form-group"><!--Category-->
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-tshirt"></i></span>
						</div> 
            		<select class="form-control" name="category">
			          <option selected="">Category</option>
			          <option value="Shirt">Shirt</option>
			          <option value="T-shirt">T-shirt</option>
					  <option value="Sweatshirt">Sweatshirt</option>
					  <option value="Hooded">Hooded</option>
					  <option value="Jacket">Jacket</option>
					  <option value="Sportshirt">Sportshirt</option>
		        	</select>
          			</div><!--Category-->
        
					<div class="input-group form-group"><!--Price-->
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
						</div> 
						<input name="price" type="text" class="form-control" placeholder="Price">
          			</div><!--Price-->          
          
          			<div class="form-group input-group"> <!--Image-->
    	      			<div class="input-group-prepend">
		          			<span class="input-group-text"><i class="fas fa-image"></i></span>
		        		</div>
            			<input name="fileToUpload" class="form-control"  type="file">
          			</div> <!--Image-->

					<div class="input-group form-group"><!--Quantity-->
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-infinity"></i></span>
						</div> 
						<input name="quantity" type="text" class="form-control" placeholder="Quantity">
          			</div><!--Quantity--> 

          			<div class="form-group input-group"> <!--Size-->
    	      			<div class="input-group-prepend">
		          			<span class="input-group-text"><i class="fas fa-user-friends"></i></span>
		        		</div>
            			<select class="form-control" name="size">
			    			<option selected="">Size</option>
			    			<option value="XS">XS</option>
                			<option value="S">S</option>
                			<option value="M">M</option>
                			<option value="L">L</option>
		    			</select>
          			</div> <!--Size-->

					<div class="form-group"> <!--insert-->
						<input type="submit" value="Insert" class="btn float-right login_btn">
					</div><!--insert-->
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

</body>
</html>