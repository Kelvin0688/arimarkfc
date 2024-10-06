<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="../public/arimark.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />


    <link rel="stylesheet" href="css/index.css">    
    <style>
        body {
            background-image: url('back.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        h1, h2, h3, h4, h5, h6, p, .recent-activity li, .card-title {
            font-weight: bold;
            font-family: Montserrat;
        }
    /* Card Styles */
        .card-players,
        .card-events,
        .card-staff {
            border-left: 5px solid;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-players {
            border-left-color: #0d6efd;
            background: linear-gradient(45deg, #0d6efd, #6cc1ff);
            color: white;
        }

        .card-events {
            border-left-color: #28a745;
            background: linear-gradient(45deg, #28a745, #85e085);
            color: white;
        }

        .card-staff {
            border-left-color: #ffc107;
            background: linear-gradient(45deg, #ffc107, #ffe680);
            color: white;
        }

        /* Hover Effects */
        .card-players:hover,
        .card-events:hover,
        .card-staff:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Icon Styles */
        .card-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 3rem;
            opacity: 0.2;
            transition: transform 0.3s ease;
        }

        .card:hover .card-icon {
            transform: rotate(20deg);
            opacity: 0.4;
        }

        /* Quick Add Cards */
        .quick-add-card {
            margin-bottom: 20px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .quick-add-card:hover {
            background: #f1f1f1;
            transform: translateY(-5px);
        }

        /* Media Queries for Smaller Screens */
        @media (max-width: 768px) {
            main {
                padding: 15px;
            }

            h1.h2 {
                font-size: 1.5rem;
            }

            .card-players .card-title,
            .card-events .card-title,
            .card-staff .card-title {
                font-size: 1.5rem;
            }

            .card-icon {
                font-size: 2.5rem;
            }

            .quick-add-card i {
                font-size: 1.5rem;
            }

            .quick-add-card .card-title {
                font-size: 1.2rem;
            }

            .breadcrumb-item a,
            .breadcrumb-item.active,
            .list-group-item {
                font-size: 0.9rem;
            }
        }
            #calendar {
                max-width: 900px;
                margin: 0 auto;
                border: 1px solid #e6e6e6;
            }

    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <main class="container col-md-12 ml-sm-auto col-lg-12 px-md-4 py-4">
        
        <div id="content">
            <h1 class="h2">Dashboard</h1>
            <!-- <p>Welcome back Admin to the Dashboard...!!!</p> -->
            <div class="row my-4">
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="card card-players" onclick="loadContent('view-players.php')">
                        <h5 class="card-header"><i class="fas fa-user"></i> Players</h5>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $player_count; ?></h5>
                            <i class="fas fa-users card-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="card card-events" onclick="loadContent('view-events.php')">
                        <h5 class="card-header"><i class="fas fa-calendar-alt"></i> Events</h5>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $event_count; ?></h5>
                            <i class="fas fa-calendar-check card-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="card card-staff" onclick="loadContent('view-staff.php')">
                        <h5 class="card-header"><i class="fas fa-user-tie"></i> Staff</h5>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $staff_count; ?></h5>
                            <i class="fas fa-user-friends card-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         

        <!-- Recent Activity -->
        <div class="row">
            <div class="recent-activity col-12 col-md-6 col-lg-12 mb-4">
                <div class="card">
                    <h5 class="card-header"><i class="fas fa-bell"></i> Recent Activity</h5>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            // Fetch the most recent player
                            $recent_player_query = "SELECT name FROM players ORDER BY id DESC LIMIT 1"; // Replace 'registration_date' with your correct column name
                            $recent_player_result = mysqli_query($db, $recent_player_query);
                            if ($recent_player_result && mysqli_num_rows($recent_player_result) > 0) {
                                $recent_player = mysqli_fetch_assoc($recent_player_result)['name'];
                                echo "<li class='list-group-item'><i class='fas fa-user-plus'></i> New Player Registered: $recent_player</li>";
                            }

                            // Fetch the most recent event
                            $recent_event_query = "SELECT title FROM event ORDER BY date DESC LIMIT 1"; // Assuming 'date' is correct for events
                            $recent_event_result = mysqli_query($db, $recent_event_query);
                            if ($recent_event_result && mysqli_num_rows($recent_event_result) > 0) {
                                $recent_event = mysqli_fetch_assoc($recent_event_result)['title'];
                                echo "<li class='list-group-item'><i class='fas fa-calendar-alt'></i> Upcoming Event: $recent_event</li>";
                            }

                            // Fetch the most recent staff member
                            $recent_staff_query = "SELECT name FROM staff ORDER BY id DESC LIMIT 1"; // Replace 'hire_date' with your correct column name
                            $recent_staff_result = mysqli_query($db, $recent_staff_query);
                            if ($recent_staff_result && mysqli_num_rows($recent_staff_result) > 0) {
                                $recent_staff = mysqli_fetch_assoc($recent_staff_result)['name'];
                                echo "<li class='list-group-item'><i class='fas fa-user-tie'></i> New Staff Member: $recent_staff</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6 col-lg-4 mb-4">
                <div id="calendar" style="background-color: white; padding: 20px; border-radius: 10px;"></div>
            </div> -->
        </div>
        <!-- Quick Actions -->
        <div class="row mb-4">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card quick-add-card" onclick="loadContent('player.php')">
                            <div class="card-body text-center">
                                <i class="fas fa-user-plus"></i>
                                <h5 class="card-title mt-2">Add New Player</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card quick-add-card" onclick="loadContent('add-event.php')">
                            <div class="card-body text-center">
                                <i class="fas fa-calendar-plus"></i>
                                <h5 class="card-title mt-2">Schedule Event</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card quick-add-card" onclick="loadContent('add-staff.php')">
                            <div class="card-body text-center">
                                <i class="fas fa-user-tie"></i>
                                <h5 class="card-title mt-2">Add New Staff</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="d-flex justify-content-center py-3" style="border-top: 1px solid #e6e6e6">
                    <span>Copyright © 2024 Arimark</span>
                </footer>

                <!-- FullCalendar Script -->
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        
                        // Ensure calendar element exists
                        if (calendarEl) {
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'dayGridMonth',
                                events: [
                                    {
                                        title: 'Test Event',
                                        start: '2024-09-17'  // Sample event
                                    }
                                ]
                            });
                            calendar.render();
                        }
                    });
                </script>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq8dK0e2dS2e40Pib8PBjpYolDkhI0vgrjpvmKfFCLpKJJ6BxH" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq8dK0e2dS2e40Pib8PBjpYolDkhI0vgrjpvmc" rossorigin="anonymous"></script>
    <!-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.js'></script> -->
