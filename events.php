<?php
// Database connection
$db = mysqli_connect('localhost', 'root', '', 'arimarkfc');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch events from the database
$query = "SELECT * FROM event";
$results = mysqli_query($db, $query);
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
    <link rel="stylesheet" href="css/players.css">
    <link rel="stylesheet" href="css/events.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>
<body>
<div id="preloader">
        <div class="preloader-inner">
            <div class="spinner"></div>
                <h6 class="text-center">AFC...</h6>
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
            <h1 class="mb-3">Our Events</h1> 
            <h5>Here are our events</h5>
            </div>
        </div>
        </header>

        <main>
        <section id="events" class="event-section">
            <div class="container">
                <h2 class="text-center mt-5 mb-5 animate__animated" data-animate="animate__fadeInUp">Upcoming Events</h2>
                <div class="row mb-5">
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 mx-auto animate__animated" data-animate="animate__fadeInLeft">
                            <div class="card event-card">
                                <a href="singleEvent.php?id=<?php echo $row['id']; ?>">
                                    <div class="text-center">
                                        <img src="./admin/uploads/<?php echo $row['image']; ?>" alt="Event Image" class="card-img-top img-fluid">
                                    </div>
                                    <div class="card-body event-card-body">
                                        <h5 class="event-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                        <p class="event-info">Date: <?php echo htmlspecialchars($row['date']); ?></p>
                                        <p class="event-info">Location: <?php echo htmlspecialchars($row['location']); ?></p>
                                        <p class="event-info">
                                            Description: 
                                            <?php 
                                                $description = htmlspecialchars($row['description']); 
                                                echo strlen($description) > 20 ? substr($description, 0, 20) . '...' : $description;
                                            ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

        <!-- end main -->
        <button class="page-up-btn" id="pageUpBtn" onclick="scrollToTop()">↑</button>

        <!-- footer -->
        <footer id="footer"></footer>
        <!-- end footer -->
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/pageup.js"></script>

    <script>
    function fetchAndInjectComponent(url, containerId) {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                document.getElementById(containerId).innerHTML = html;
            })
            .catch(error => console.error('Error fetching component:', error));
    }

    fetchAndInjectComponent('navbar.php', 'navbar');
    fetchAndInjectComponent('topbar.php', 'topbar');
    fetchAndInjectComponent('footer.php', 'footer');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add(entry.target.getAttribute('data-animate'));
                observer.unobserve(entry.target);
            }
        });
    });

    document.querySelectorAll('.animate__animated').forEach(element => {
        observer.observe(element);
    });
    </script>
</body>
</html>
