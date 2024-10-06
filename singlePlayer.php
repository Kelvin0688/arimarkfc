<?php
$db = mysqli_connect('localhost', 'root', '', 'arimarkfc');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['id'])) {
    die("Player ID not specified.");
}

$player_id = intval($_GET['id']);

$query = "
    SELECT id, name, position, age, nationality, weight, height, strong_foot, under, description, photo FROM players WHERE id = ?
    UNION
    SELECT id, name, position, age, nationality, weight, height, strong_foot, under, description, photo FROM u13 WHERE id = ?
    UNION
    SELECT id, name, position, age, nationality, weight, height, strong_foot, under, description, photo FROM u15 WHERE id = ?
";

$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, "iii", $player_id, $player_id, $player_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    die("Player not found.");
}

$player = mysqli_fetch_assoc($result);

mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($player['name']); ?></title>
    <link rel="icon" type="image/png" href="public/arimark.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/singlePlayer.css">
</head>
<body>
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
        <body>
            <header class="about-header">
                <div class="header-content">
                    <div class="container">
                        <h1 class="mb-3"><?php echo htmlspecialchars($player['name']); ?> - Player Profile</h1> 
                        <h5>Career and Achievements of <?php echo htmlspecialchars($player['name']); ?></h5>
                    </div>
                </div>
            </header>
        
            <div class="container">
        
                <!-- Player Profile Section -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- Breadcrumbs -->
                        <nav style="margin-top: 20px;">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="players.php">Players</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($player['name']); ?></li>
                            </ol>
                        </nav>
                        <div class="card" style="border:none; box-shadow:0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="public/<?php echo htmlspecialchars($player['photo']); ?>" alt="Player Image" class="profile-img">
                                    </div>
                                    <div class="col-md-8">
                                        <h4 class="mt-3"><?php echo htmlspecialchars($player['name']); ?></h4>
                                        <p><strong>Position:</strong> <?php echo htmlspecialchars($player['position']); ?></p>
                                        <p><strong>Age:</strong> <?php echo htmlspecialchars($player['age']); ?></p>
                                        <p><strong>Nationality:</strong> <?php echo htmlspecialchars($player['nationality']); ?></p>
                                        <p><strong>Height:</strong> <?php echo htmlspecialchars($player['height']); ?> cm</p>
                                        <p><strong>Weight:</strong> <?php echo htmlspecialchars($player['weight']); ?> kg</p>
                                        <p><strong>Strong Foot:</strong> <?php echo htmlspecialchars($player['strong_foot']); ?></p>
                                        <p><strong>Team Category:</strong> <?php echo htmlspecialchars($player['under']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- Biography Section -->
                        <div class="card mb-5" style="border:none; box-shadow:0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="card-body">
                                <p><?php echo nl2br(htmlspecialchars($player['description'])); ?></p>
                            </div>
                        </div>
                    </div>
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
      </script>
</body>
</html>