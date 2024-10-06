<?php
    // Database connection
    include('server.php'); // Assumes this file connects to your database

    // Fetch events from the database
    $query = "SELECT title, date FROM event";  // You can customize this query based on the columns you need
    $result = mysqli_query($db, $query);

    $events = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = array(
            'title' => $row['title'],
            'start' => $row['date'], // FullCalendar expects the date in the 'start' field
        );
    }

    // Output JSON for FullCalendar
    echo json_encode($events);
?>
