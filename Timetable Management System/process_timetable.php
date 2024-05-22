<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function generateTimetable($course, $theorySubjects, $practicalSubjects, $theoryFaculties, $practicalFaculties) {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $timetable = [];

        foreach ($days as $day) {
            $theoryData = array_combine($theorySubjects, $theoryFaculties);
            $practicalData = array_combine($practicalSubjects, $practicalFaculties);

            shuffleAssoc($theoryData);
            shuffleAssoc($practicalData);

            $theorySubjectsForDay = array_keys($theoryData);
            $theoryFacultiesForDay = array_values($theoryData);
            $practicalSubjectsForDay = array_keys($practicalData);
            $practicalFacultiesForDay = array_values($practicalData);

            $timetable[$day] = [
                ['time' => '8:45 AM - 9:40 AM', 'subject' => $theorySubjectsForDay[0], 'faculty' => $theoryFacultiesForDay[0]],
                ['time' => '9:40 AM - 10:35 AM', 'subject' => $theorySubjectsForDay[1], 'faculty' => $theoryFacultiesForDay[1]],
                ['time' => '10:35 AM - 10:50 AM', 'subject' => 'Short Break', 'faculty' => ''],
                ['time' => '10:50 AM - 11:45 AM', 'subject' => $theorySubjectsForDay[2], 'faculty' => $theoryFacultiesForDay[2]],
                ['time' => '11:45 AM - 12:40 PM', 'subject' => $theorySubjectsForDay[3], 'faculty' => $theoryFacultiesForDay[3]],
                ['time' => '12:40 PM - 01:40 PM', 'subject' => 'Lunch Break', 'faculty' => ''],
                ['time' => '01:40 PM - 02:35 PM', 'subject' => $practicalSubjectsForDay[0], 'faculty' => $practicalFacultiesForDay[0]],
                ['time' => '02:35 PM - 03:30 PM', 'subject' => $practicalSubjectsForDay[0], 'faculty' => $practicalFacultiesForDay[0]],
                ['time' => '03:30 PM - 03:40 PM', 'subject' => 'Short Break', 'faculty' => ''],
                ['time' => '03:40 PM - 04:30 PM', 'subject' => $theorySubjectsForDay[4], 'faculty' => $theoryFacultiesForDay[4]],
            ];
        }

        return $timetable;
    }

    function shuffleAssoc(&$array) {
        $keys = array_keys($array);
        shuffle($keys);
        $newArray = [];
        foreach($keys as $key) {
            $newArray[$key] = $array[$key];
        }
        $array = $newArray; 
        return true;
    }

    $course = isset($_POST['course']) ? $_POST['course'] : "";
    $theorySubjects = isset($_POST['theory-subjects']) ? explode(',', $_POST['theory-subjects']) : [];
    $practicalSubjects = isset($_POST['practical-subjects']) ? explode(',', $_POST['practical-subjects']) : [];
    $theoryFaculties = isset($_POST['theory-faculties']) ? explode(',', $_POST['theory-faculties']) : [];
    $practicalFaculties = isset($_POST['practical-faculties']) ? explode(',', $_POST['practical-faculties']) : [];

    $timetable = generateTimetable($course, $theorySubjects, $practicalSubjects, $theoryFaculties, $practicalFaculties);

    $_SESSION['timetable'] = $timetable;

    header("Location: display_timetable.php");
    exit;
}
?>
