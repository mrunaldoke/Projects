<?php
include 'conn.php';

$lecno = $_POST['lecno'];
$srno = $_POST['lecday'];
$newsub = $_POST['subnew'];

$sql = "UPDATE tt SET `".$lecno."` = '".$newsub."' WHERE srno = ".$srno.";" ;
$result = mysqli_query($conn, $sql);

header("Location:FOR_FACULTIES.php");