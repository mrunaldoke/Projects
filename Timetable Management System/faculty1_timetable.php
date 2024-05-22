<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // AJAX request to fetch timetable data from display_timetable.php
    $url = "http://localhost/display_timetable.php"; // Update URL accordingly
    $data = array('username' => $username);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // Process the response
    if ($result !== FALSE) {
        // Display the timetable
        echo $result;
    } else {
        echo "Error fetching timetable data.";
    }
} else {
    echo "You are not logged in.";
}
?>
