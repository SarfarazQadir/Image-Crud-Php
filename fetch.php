<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW IN TABLE PRODUCT DETAIL</title>
</head>
<body>
    <h1>SHOW IN TABLE PRODUCT DETAIL</h1>
    <table border="2" >
        <thead>
            <tr>
            <th>PRODUCT ID</th>
            <th>PRODUCT NAME</th>
            <th>PRODUCT PRICE</th>
            <th>PRODUCT QUANTITY</th>
            <th>PRODUCT IMAGE</th>
            <th colspan="2">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
<?php 
        include("config.php");
        $query = "SELECT * FROM tbl_product";
        $result = mysqli_query($con,$query);
        foreach($result as $row){
            echo"<tr>";
            echo "<td>$row[p_id]</td>";
            echo "<td>$row[p_name]</td>";
            echo "<td>$row[p_price]</td>";
            echo "<td>$row[p_qty]</td>";
            echo "<td>
            <img src='$row[p_img]' width='140' heigth='120'>
            </td>";
            echo "<td>
            <a href='delete.php?id=$row[p_id]'><button>DELETE</button></a>
            </td>";
            echo "<td>
            <a href='update.php?id=$row[p_id]&name=$row[p_name]&price=$row[p_price]&qty=$row[p_qty]&img=$row[p_img]'><button>UPDATE</button></a>
             </td>";
            echo"</tr>";
        }
?>            
        </tbody>
    </table>
</body>
</html>