<?php
include 'conn.php';

if(isset($_POST['name'])){
    $n = $_POST['name'];
    echo $n;
}

#extract from db
$sql = "SELECT * FROM tt;";
$result = mysqli_query($conn, $sql);
$checkresult = mysqli_num_rows($result);

if($checkresult > 0)
{
    echo "<table border=1>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>";
        echo $row['sub'];
        echo "</td>";
        echo "<td>";
        echo $row['sub'];
        echo "</td>";
        echo "<td>";
        echo $row['sub'];
        echo "</td>";
        echo "<td>";
        echo $row['sub'];
        echo "</td>";
        echo "<td>";
        echo $row['sub'];
        echo "</td>";
        echo "<td>";
        echo $row['sub'];
        echo "</td>";
        echo "<td>";
        echo $row['sub'];
        echo "</td>";
        echo "<td>";
        echo $row['time'];
        echo "</td>";
        echo "</tr>";
    };
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="update.php">
        <input type="text" name="sub" placeholder="sub">
        <input type="number" name="ind">
        <input type="submit" name="submit">
    </form>
</body>
</html>