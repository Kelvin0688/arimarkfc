<?php
// Database connection
$db = mysqli_connect('localhost', 'root', '', 'arimarkfc');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch event details from the database
$id = $_GET['id'];
$query = "SELECT * FROM event WHERE id = $id";
$result = mysqli_query($db, $query);
$event = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARIMARK FC | EVENTS</title>
    <link rel="icon" type="image/png" href="public/arimark.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/singleEvent.css">
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
        <main>
            <section class="event-section py-5">
                    <div class="container">
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-10">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="events.php">Events</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($event['title']); ?></li>
                                    </ol>
                                </nav>
                                <img src="./admin/uploads/<?php echo htmlspecialchars($event['image']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($event['title']); ?>">
                            </div>
                        </div>
                        <h1 class="text-center mb-3"><?php echo htmlspecialchars($event['title']); ?></h1>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card" style="border:none; box-shadow:0 4px 8px rgba(0, 0, 0, 0.1);">
                                    <div class="card-body">
                                        <p class="card-text"><small class="text-muted">Date: <?php echo date('F j, Y', strtotime($event['date'])); ?></small></p>
                                        <p class="card-text"><small class="text-muted">Location: <?php echo htmlspecialchars($event['location']); ?></small></p>
                                        <p class="card-text"><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        </main>
        
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