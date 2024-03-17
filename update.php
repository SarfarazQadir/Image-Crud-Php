<?php
$ID = $_GET["id"];
$NAME = $_GET["name"];
$PRICE = $_GET["price"];
$QTY = $_GET["qty"];
$IMG = $_GET["img"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE File and Image Upload</title>
</head>
<body>
    <h1>UPDATE File And Image Upload</h1>
    <fieldset>
        <legend>Update Image Upload</legend>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="pname" value="<?php echo$NAME ?>"><br><br>
            <input type="number" name="pprice" value="<?php echo$PRICE ?>"><br><br>
            <input type="number" name="pqty" value="<?php echo$QTY ?>"><br><br>
                <img src="<?php echo $IMG ?>" alt="" style="height:120px;width:140px;">
            <input type="file" name="pimg" ><br><br>
            <span id="selectedFileName"></span><br><br>
            <input type="submit" value="Done" name="updatebtnproduct"><br><br>
        </form>
    </fieldset>
    <?php 
   include("config.php");
   if(isset($_POST["updatebtnproduct"])){
       $name = $_POST["pname"];
       $price = $_POST["pprice"];
       $qty = $_POST["pqty"];
        $img_name = $_FILES["pimg"]["name"];
        $img_tmp = $_FILES["pimg"]["tmp_name"];
        $img_type = $_FILES["pimg"]["type"];
        $img_size = $_FILES["pimg"]["size"];        
        $folder = "images/".$img_name;
        move_uploaded_file($img_tmp,"images/".$img_name);
        $query = "UPDATE `tbl_product` SET `p_name`='$name', `p_price`= $price, `p_qty`= $qty, `p_img`= 'images/$img_name' WHERE p_id = $ID";
        $result = mysqli_query($con, $query);
        if($result){
            header("Location: fetch.php");
        } 
    }
    ?>
</body>
</html>
