<!--Insert Into for Supplier_tbl-->
<?php

$mysqli = new mysqli('localhost', 'root', '', 'inventorydb') or die(mysqli_error($mysqli));
$CompName = "";
$ContactNo = "";
$CompAddress = "";

if (isset($_POST['btnSave'])){
    $CompName = $_POST['CompName'];
    $ContactNo = $_POST['ContactNo'];
    $CompAddress = $_POST['CompAddress'];   

    $mysqli->query("INSERT INTO supplier_tbl (Supp_Company, Supp_Contact_No, Supp_Address) VALUES ('$CompName','$ContactNo','$CompAddress')")
    or die($mysqli->error());

    header("location: index.php");

}
 if(isset($_GET['edit'])){
$id = $_GET['edit'];
$result = mysqli->query("SELECT * FROM supplier_tbl WHERE Supplier_ID = $id") or die ($mysqli->error());
if(count($result)==1){
    $row = $result->fetch_array();
    $CompName = $row['CompName'];
    $ContactNo = $row['ContactNo'];
    $CompAddress = $row ['CompAddress'];

    header("location: index.php");
}
 }
     
 
