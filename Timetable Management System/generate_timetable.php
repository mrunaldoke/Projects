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
        <form method="post" action="process_timetable.php">
            <label for="course">Course:</label>
            <input type="text" id="course" name="course"><br><br>
            
            <label for="theory-subjects">Theory Subjects (comma-separated):</label>
            <input type="text" id="theory-subjects" name="theory-subjects"><br><br>
            
            <label for="practical-subjects">Practical Subjects (comma-separated):</label>
            <input type="text" id="practical-subjects" name="practical-subjects"><br><br>
            
            <label for="theory-faculties">Theory Faculties (comma-separated):</label>
            <input type="text" id="theory-faculties" name="theory-faculties"><br><br>
            
            <label for="practical-faculties">Practical Faculties (comma-separated):</label>
            <input type="text" id="practical-faculties" name="practical-faculties"><br><br>
            
            <button type="submit" id="generate_btn">Generate Timetable</button>
        </form>
    </div>
</body>
</html>
