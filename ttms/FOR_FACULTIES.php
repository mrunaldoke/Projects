<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <div >
        <style opacity: 0.2;>
            body {
                background-image: url("soe2.png");
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
                
                
              }
              table{
                color:#fff;
              }
        </style>
    </div>

</head>


<body>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"></h4>
        <p>To accommodate the needs of all students, faculties have the flexibility to schedule their lectures at any
            time that works best for them and their students.</p>
        <hr>
        <p class="mb-0">Remember that each class session is designed to help students understand and master new
            concepts.</p>
    </div>
    <div>
        <table border="5" cellspacing="10" align="center" style="width: 80%; height: 650px;">

            <tr bgcolor="#664097">
            <td align="center">Days/Time
                <td>09:00-9:55
                <td>09:55-10:50
                <td>11:05-12:00
                <td>12:00-12:55
                <td>12:55-01:55
                <td>01:55-02:50
                <td>02:50-03:45
                <td>03:45-04:40
            </tr>
            <?php
include_once 'conn.php';

#extract from db
$sql = "SELECT * FROM tt;";
$result = mysqli_query($conn, $sql);
$checkresult = mysqli_num_rows($result);

if($checkresult > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr bgcolor='#7428D4'>";
        echo "<td align='center' bgcolor='#664097'>".$row['day']."
        <td align='center'>".$row['1']."
        <td align='center'>".$row['2']."<br>
        <td align='center'>".$row['3']."<br>
        <td align='center'>".$row['4']."<br>
        <td align='center'>".$row['break']."<br>
        <td align='center'>".$row['5']."<br>
        <td align='center'>".$row['6']."<br>
        <td align='center'>".$row['7']."
       </tr>";
        echo "</tr>";
    };
    echo "</table>";
}
?>
            <!-- <tr bgcolor="#7428D4">
                <td align="center" bgcolor="#664097">MONDAY
                <td align="center">MATHS
                <td align="center">ENGLISH<br>
                <td align="center">SCIENCE<br>
                <td align="center">HISTORY<br>
                <td rowspan="6" align="center" bgcolor="#CB9FED">R<br>E<br>C<br>E<br>S<br>S
                <td align="center">GEOGRAPHY<br>
                <td align="center">HINDI<br>
                <td align="center">CCA
            </tr>
            <tr bgcolor="#7428D4">
                <td align="center" bgcolor="#664097">TUESDAY
                <td align="center">MATHS
                <td align="center">ENGLISH<br>
                <td align="center">HINDI<br>
                <td align="center">HISTORY<br>

                <td align="center">GEOGRAPHY<br>
                <td align="center">MATHS<br>
                <td align="center">LIBRARY
            </tr>
            <tr bgcolor="#7428D4">
                <td align="center" bgcolor="#664097">WEDNESDAY
                <td align="center">MATHS
                <td align="center">GAMES<br>
                <td align="center">SCIENCE<br>
                <td align="center">HISTORY<br>

                <td align="center">ENGLISH<br>
                <td align="center">HINDI<br>
                <td align="center">LAB
            </tr>
            <tr bgcolor="#7428D4">
                <td align="center" bgcolor="#664097">THURSDAY
                <td align="center">MATHS
                <td align="center">ENGLISH<br>
                <td align="center">SCIENCE<br>
                <td align="center">MATHS<br>

                <td align="center">GEOGRAPHY<br>
                <td align="center">HINDI<br>
                <td align="center">CCA
            </tr>
            <tr bgcolor="#7428D4">
                <td align="center" bgcolor="#664097">FRIDAY
                <td align="center">MATHS
                <td align="center">LIBRARY<br>
                <td align="center">SCIENCE<br>
                <td align="center">ENGLISH<br>

                <td align="center">MATHS<br>
                <td align="center">HINDI<br>
                <td align="center">LAB
            </tr>
            <tr bgcolor="#7428D4">
                <td align="center" bgcolor="#664097">SATURDAY
                <td align="center">MATHS
                <td align="center">ENGLISH<br>
                <td align="center">SCIENCE<br>
                <td align="center">HISTORY<br>

                <td align="center">GAMES<br>
                <td align="center">YOGA<br>
                <td align="center">CCA
            </tr> -->
            <div class="btn-group" role="group" aria-label="Basic example" style="text-align: center;"></div>
                <a href="updateform.html"><button type="button" class="btn btn-info " style="margin-left: 800px; margin-right: 10px; margin-top: 5px;" >update</button></a>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="updateform.html"><button type="button" class="btn btn-info " style ="margin-top: 5px; ">Notify</button></a>
            
            
                
                

            </div>
            
    </div>


</body>

</html>