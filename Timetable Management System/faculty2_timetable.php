<?php
session_start();

// Check if timetable exists in session
if (isset($_SESSION['timetable'])) {
    $timetable = $_SESSION['timetable'];
} else {
    header("Location: generate_timetable.php");
    exit;
}

// Filter timetable for Faculty 2
$username = 'faculty2'; // Change the faculty username as needed
$filteredTimetable = filterTimetableForFaculty($timetable, $username);

// Function to filter timetable for the logged-in faculty
function filterTimetableForFaculty($timetable, $faculty) {
    $filteredTimetable = [];
    foreach ($timetable as $day => $schedule) {
        $filteredSchedule = array_filter($schedule, function($entry) use ($faculty) {
            return $entry['faculty'] === $faculty;
        });
        if (!empty($filteredSchedule)) {
            $filteredTimetable[$day] = $filteredSchedule;
        }
    }
    return $filteredTimetable;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty 2 Timetable</title>
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
        <h2>Faculty 2 Timetable</h2>
        <?php foreach ($filteredTimetable as $day => $schedule): ?>
            <h3><?php echo $day; ?></h3>
            <table border="1">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Subject</th>
                        <th>Faculty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($schedule as $entry): ?>
                        <tr>
                            <td><?php echo $entry['time']; ?></td>
                            <td><?php echo $entry['subject']; ?></td>
                            <td><?php echo $entry['faculty']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    </div>
</body>
</html>
