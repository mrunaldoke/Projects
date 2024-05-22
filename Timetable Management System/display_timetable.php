<?php
session_start();

// Check if timetable exists in session and is not null
if (isset($_SESSION['timetable']) && $_SESSION['timetable'] !== null) {
    $timetable = $_SESSION['timetable'];
} else {
    // Redirect back to the form page if timetable is not found or null
    header("Location: generate_timetable.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Timetable</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('yellow.jpg'); /* Replace 'yellow.jpg' with the path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333; /* Set text color */
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff; /* Set title color */
        }
        h3 {
            color: #333; /* Set subtitle color */
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 10px; /* Rounded corners for the table */
            overflow: hidden; /* Hide overflow content */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold; /* Make column headers bold */
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9; /* Alternate row background color */
        }
    </style>

</head>
<body>
    <div class="container">
        <h2>Weekly Timetable</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 9; $i++): ?>
                    <tr>
                        <td><?php echo $timetable['Monday'][$i]['time']; ?></td>
                        <td><?php echo $timetable['Monday'][$i]['subject']; ?> (<?php echo $timetable['Monday'][$i]['faculty']; ?>)</td>
                        <td><?php echo $timetable['Tuesday'][$i]['subject']; ?> (<?php echo $timetable['Tuesday'][$i]['faculty']; ?>)</td>
                        <td><?php echo $timetable['Wednesday'][$i]['subject']; ?> (<?php echo $timetable['Wednesday'][$i]['faculty']; ?>)</td>
                        <td><?php echo $timetable['Thursday'][$i]['subject']; ?> (<?php echo $timetable['Thursday'][$i]['faculty']; ?>)</td>
                        <td><?php echo $timetable['Friday'][$i]['subject']; ?> (<?php echo $timetable['Friday'][$i]['faculty']; ?>)</td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
