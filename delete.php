<?php 
$ID = $_GET['id'];

include('config.php');
$query = "DELETE FROM tbl_product WHERE p_id=$ID";
$result = mysqli_query($con,$query);
if($result){
echo"<script>
window.location.href ='fetch.php';
</script>";
}

?>