<!--Insert Into for Supplier_tbl-->
<?php

$mysqli = new mysqli('localhost', 'root', '', 'inventorydb') or die(mysqli_error($mysqli));
$CustName = "";
$CustAddress = "";
$CustNumber = "";

if (isset($_POST['btnSave'])){
    $CustName = $_POST['CustName'];
    $CustAddress = $_POST['CustAddress'];
    $CustNumber = $_POST['CustNumber'];   

    $mysqli->query("INSERT INTO customer_tbl (Cust_Name, Cust_Address, Contact_Number) VALUES ('$CustName','$CustAddress','$CustNumber')")
    or die($mysqli->error());

    header("location: customer.php");

}
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = mysqli_query("SELECT * FROM customer_tbl where Customer_id = $id") or die ($mysqli->error());
    if(count($result)==1){
    $row = $result->fetch_array();
    $CustName = $row['CustName'];
    $CustAddress = $row['CustAddress'];
    $CustNumber = $row ['CustNumber'];

    header("location: customer.php");
}
 }
     
 
