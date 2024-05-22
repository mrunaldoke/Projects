<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Timetable</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('dashboard.jpg'); /* Adjust the path to your background image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff; /* Set text color to white for better readability */
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            border-radius: 10px;
        }
        h2 {
            text-align: center;
        }
        form {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        button:focus {
            outline: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #fff;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Generate Timetable</h2>
        <form method="post">
            <label for="course">Course:</label>
            <input type="text" id="course" name="course" value="Electronics and Computer"><br><br>
            <label for="theory-subjects">Theory Subjects (comma-separated):</label>
            <input type="text" id="theory-subjects" name="theory-subjects" value="ML,CC,STQA,WSN,EME"><br><br>
            <label for="practical-subjects">Practical Subjects (comma-separated):</label>
            <input type="text" id="practical-subjects" name="practical-subjects" value="MLL,CCL,STQAL,SHD,Project"><br><br>
            <button type="submit">Generate Timetable</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Function to generate a random timetable based on the provided constraints
            function generateTimetable($course, $theorySubjects, $practicalSubjects) {
                $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                $timetable = [];

                // Shuffle the practical subjects to avoid repetition
                shuffle($practicalSubjects);

                // Select a random theory subject for all days
                $randomTheorySubject = $theorySubjects[array_rand($theorySubjects)];

                foreach ($days as $day) {
                    // Shuffle the theory subjects for each day
                    shuffle($theorySubjects);
                    
                    // Take five theory subjects for each day
                    $theorySubjectsForDay = array_slice($theorySubjects, 0, 5);

                    // Take one practical subject for each day
                    $practical = array_shift($practicalSubjects);

                    // Add the subjects to the timetable for the current day
                    $timetable[$day] = [
                        ['time' => '8:45 AM - 9:40 AM', 'subject' => $theorySubjectsForDay[0]],
                        ['time' => '9:40 AM - 10:35 AM', 'subject' => $theorySubjectsForDay[1]],
                        ['time' => '10:35 AM - 10:50 AM', 'subject' => 'Short Break'],
                        ['time' => '10:50 AM - 11:45 AM', 'subject' => $theorySubjectsForDay[2]],
                        ['time' => '11:45 AM - 12:40 PM', 'subject' => $theorySubjectsForDay[3]],
                        ['time' => '12:40 PM - 01:40 PM', 'subject' => 'Lunch Break'],
                        ['time' => '01:40 PM - 02:35 PM', 'subject' => $practical],
                        ['time' => '02:35 PM - 03:30 PM', 'subject' => $practical],
                        ['time' => '03:30 PM - 03:40 PM', 'subject' => 'Short Break'],
                        ['time' => '03:40 PM - 04:30 PM', 'subject' => $theorySubjectsForDay[4]],
                    ];
                }

                return $timetable;
            }

            // Get form data
            $course = isset($_POST['course']) ? $_POST['course'] : "";
            $theorySubjects = isset($_POST['theory-subjects']) ? explode(',', $_POST['theory-subjects']) : [];
            $practicalSubjects = isset($_POST['practical-subjects']) ? explode(',', $_POST['practical-subjects']) : [];

            $timetable = generateTimetable($course, $theorySubjects, $practicalSubjects);

            // Output the timetable
            foreach ($timetable as $day => $schedule) {
                echo "<h2>$day</h2>";
                echo "<table border='1'>";
                echo "<thead><tr><th>Time</th><th>Subject</th></tr></thead>";
                echo "<tbody>";
                foreach ($schedule as $entry) {
                    echo "<tr><td>{$entry['time']}</td><td>{$entry['subject']}</td></tr>";
                }
                echo "</tbody></table><br>";
            }
        }
        ?>
    </div>
</body>
</html>
