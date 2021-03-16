<?php
include("config.php");


if(isset($_POST['ID'])){ 	

    $ID=$_POST['ID'];
    $title=$_POST['title'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $size=$_POST['size'];
    $sql="update products set title='$title',category='$category',price='$price',quantity='$quantity',size='$size' where ID='$ID'";

    $result=$conn->query($sql);

}

if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
    $sql="delete from products where ID='$delete'";
    $result=$conn->query($sql);   
}


$keyword="";
if(isset($_POST['search'])){
    $search=$_POST['search'];  
    $keyword=" where title like '%$search%' or category like '%$search%'";
}

if(isset($_POST['priceFrom'])){
    $priceFrom=$_POST['priceFrom'];  
    $priceTo=$_POST['priceTo'];  
    $keyword=" where price > '$priceFrom' and price <'$priceTo'";
}

$sql = "SELECT ID,title,price,image,size,category,quantity FROM products".$keyword;
$result = $conn->query($sql);

?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!-- MDB icon -->
<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styleProduct.css">

    <div class="container">
            <img src="uploads/logo2.png" height="150px" width="150px"/>                            
            <a href="insertProduct.php"><button type="button"  class="btn btn-outline-success btn-rounded" data-mdb-ripple-color="dark" style="float:right;"> Insert New Product</button></a>                            
    </div>



<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                    <tr>
                        <td colspan="5">
                            <form action="products.php" class="form-inline md-form mr-auto mb-4" method="POST">
                                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-rounded btn-primary" type="submit">Search</button>
                            </form>
                        </td>
                        <th>
                            <form action="products.php" class="form-inline md-form mr-auto mb-4" method="POST">
                                <input class="form-control mr-sm-2" type="text" name="priceFrom" size="7" placeholder="10"> - 
                                <input class="form-control mr-sm-2" type="text" name="priceTo" size="7" placeholder="999"> 
                                <button class="btn btn-rounded btn-primary" type="submit">Search</button>
                            </form>

                        </th>    
                    </tr>

                    
                    <table class="table table-hover" >

                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Category</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
                              
                              $ID=$row['ID'];
                              $title=$row['title'];
                              $price=$row['price'];
                              $quantity=$row['quantity'];
                              $size=$row['size']; 
                              $category=$row['category'];
                              $image=$row['image'];    
                    ?>
                        <tr>
                            
                            <td><img src="<?php echo $image; ?>" width="100" height="100"/></td>
                            <td><?php echo $title;?></td>
                            <td><?php echo $category;?></td>
                            <td><?php echo $quantity;?></td>
                            <td class="text-right"><?php echo $price;?></td>
                            <td class="text-right"><a href="editProduct.php?id=<?php echo $ID; ?>" ><button type="button" class="btn btn-outline-info btn-sm">Edit</button></a>
                            <a href="products.php?delete=<?php echo $ID; ?>" onclick="return confirm('Confirm delete?')"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a></td>
                        </tr>
                    <?php

                            }
                        }           
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>