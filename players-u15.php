<?php
$db = mysqli_connect('localhost', 'root', '', 'arimarkfc');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT id, name, position, age, nationality, weight, height, strong_foot, under, description, photo FROM u15";
$result = mysqli_query($db, $query);

$players = [];
while ($row = mysqli_fetch_assoc($result)) {
    $players[] = $row;
}

mysqli_close($db);

$positions = [
    'GoalKeepers' => [],
    'Defenders' => [],
    'Midfielders' => [],
    'Forwards' => []
];

foreach ($players as $player) {
    switch ($player['position']) {
        case 'Goalkeeper':
            $positions['GoalKeepers'][] = $player;
            break;
        case 'Defender':
            $positions['Defenders'][] = $player;
            break;
        case 'Midfielder':
            $positions['Midfielders'][] = $player;
            break;
        case 'Forward':
            $positions['Forwards'][] = $player;
            break;
    }
}


function displayPlayers($players, $positionClass) {
    if (empty($players)) {
        echo '<p>No players found in this category.</p>';
    } else {
        foreach ($players as $player) {
            echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-2">';
            echo '<a href="singlePlayer.php?id=' . $player['id'] . '">';
            echo '<div class="p-image' . $positionClass . '">'; // Updated
            echo '<img src="public/' . htmlspecialchars($player['photo']) . '" alt="" class="img-fluid">';
            echo '<h5 class="player-name mt-4">' . htmlspecialchars($player['name']) . '</h5>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARIMARK FC | U-15 PLAYERS</title>
    <link rel="icon" type="image/png" href="public/arimark.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link rel="stylesheet" href="css/players.css">
    <link rel="stylesheet" href="css/index.css">

</head>
<body style="background-image: url(./public/back.png);">
<!-- Preloader -->
<div id="preloader">
        <div class="preloader-inner">
            <div class="spinner"></div>
                <h6 class="text-center">AFC...</h6> <!-- Optional text -->
        </div>
    </div>
    <div id="content"> 
        <!-- nav -->
            <header id="topbar"></header>
            <header id="navbar"></header>
        <!-- end nav -->

        <!-- main -->
        <header class="about-header animate__animated" data-animate="animate__fadeInDown">
        <div class="header-content">
            <div class="container">
            <h1 class="mb-3">THE TEAM</h1> 
            <h5>Players with vision and mission</h5>
            </div>
        </div>
        </header>

        <nav id = "under-nav"></nav>

        <!-- player section -->

        <h1 class="text-center mt-4 mb-2">U-15</h1>

            <!-- Goalkeepers -->
            <div class="container mt-2 mb-5">
                <h2 class="position">GoalKeepers</h2>
                <div class="row">
                    <?php displayPlayers($positions['GoalKeepers'], ''); ?>
                </div>
                <hr style="margin-right: 60%; margin-left: 2%; color:#004969;">
            </div>

            <!-- Defenders -->
            <div class="container mt-2 mb-5">
                <h2>Defenders</h2>
                <div class="row">
                    <?php displayPlayers($positions['Defenders'], 'Def'); ?>
                </div>
                <hr style="margin-right: 60%; margin-left: 2%; color:#004969;">
            </div>

            <!-- Midfielders -->
            <div class="container mt-2 mb-5">
                <h2>Midfielders</h2>
                <div class="row">
                    <?php displayPlayers($positions['Midfielders'], 'Mid'); ?>
                </div>
                <hr style="margin-right: 60%; margin-left: 2%; color:#004969;">
            </div>

            <!-- Forwards -->
            <div class="container mt-2 mb-5">
                <h2>Forwards</h2>
                <div class="row">
                    <?php displayPlayers($positions['Forwards'], 'Stri'); ?>
                </div>
            </div>


        <!-- end main -->
        
        <!-- footer -->
            <footer id="footer"></footer>
        <!-- end footer -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/pageup.js"></script>

    <script>
    
    // Function to fetch and inject HTML component
    function fetchAndInjectComponent(url, containerId) {
      fetch(url)
        .then(response => response.text())
        .then(html => {
          document.getElementById(containerId).innerHTML = html;
        })
        .catch(error => console.error('Error fetching component:', error));
    }
    // Inject Navbar and footer
    fetchAndInjectComponent('navbar.php', 'navbar');
    fetchAndInjectComponent('topbar.php', 'topbar');
    fetchAndInjectComponent('footer.php', 'footer');
    fetchAndInjectComponent('unav.php', 'under-nav');


     // Intersection Observer for animations
     const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add(entry.target.getAttribute('data-animate'));
                observer.unobserve(entry.target);
            }
        });
    });

    // Observe elements with the animate__animated class
    document.querySelectorAll('.animate__animated').forEach(element => {
        observer.observe(element);
    });
      </script>
</body>
</html>