<?php
require_once 'conn.php';

$Remove = $_REQUEST['del'];

$sql = "DELETE FROM users WHERE ID = :del";

$query = $conn->prepare($sql);

$query->bindParam(':del', $Remove, PDO::PARAM_STR);

$query->execute();

header('location:adminPage.php');


?>
