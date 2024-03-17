<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File and Image Upload</title>
</head>
<body>
    <h1>File And Image Upload</h1>
    <fieldset>
        <legend>Image Upload</legend>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="pname" placeholder="Enter your product name"><br><br>
        <input type="number" name="pprice" placeholder="Enter your product price"><br><br>
        <input type="number" name="pqty" placeholder="Enter your product quantity"><br><br>
        <input type="file" name="pimg"><br><br>
        <input type="submit" value="Done" name="btnproduct"><br><br>
    </form>
    </fieldset>
    <?php 
    include("config.php");
    if(isset($_POST["btnproduct"])){
    // echo"<pre>";
    // print_r($_FILES["pimg"]);
    // echo"</pre>";
    $name = $_POST["pname"];
    $price = $_POST["pprice"];
    $qty = $_POST["pqty"];
    $img_name = $_FILES["pimg"]["name"];
    $img_tmp = $_FILES["pimg"]["tmp_name"];
    $img_type = $_FILES["pimg"]["type"];
    $img_name = $_FILES["pimg"]["size"];
    $folder = "images/".$img_name;
    move_uploaded_file( $img_tmp, $folder);
    $query = "INSERT INTO `tbl_product`(`p_name`, `p_price`, `p_qty`, `p_img`) VALUES ('$name',$price,$qty,'$folder')";
    $result = mysqli_query($con ,$query);
    if($result){
        echo "Product add Succesfully";
    }
    }
    ?>
</body>
</html>