<?php include('server.php') ?>

<?php
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
    <title><?php echo htmlspecialchars($event['title']); ?></title>
    <link rel="icon" type="image/png" href="../public/arimark.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
   
        <style>
        body {
            background-image: url('back.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }            
        .event-header {
            position: relative; /* Added for positioning the video and content */
            height: 400px; /* Adjust as needed */
            width: 800px;
            color: #fdfdfd;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden; /* Added to hide overflowing video */
            background-size: cover;
        }

        .event-content {
            position: relative; /* Ensure the content stays on top of the video */
            z-index: 1; /* Make sure content is above the video */
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 90px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            z-index: 99;
            background-color: #004969;
            color: #e6e6e6;
        }
        .logo {
            height: 50px;
            width: 36px;
            margin: 0;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 11.5rem;
                padding: 0;
            }
        }

        .navbar {
            box-shadow: inset 0 -1px 0 rgba(255, 255, 255, 0.1);
            background-color: #004969;
            color: #e6e6e6;
        }

        @media (min-width: 767.98px) {
            .navbar {
                top: 0;
                position: sticky;
                z-index: 999;
            }
        }

        .sidebar .nav-link {
            color: #e6e6e6;
        }

    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div id="content"> 
        <main>
            <section class="event-section py-5">
                <div class="container">
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="add-event.php">Events</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($event['title']); ?></li>
                                </ol>
                            </nav>
                            <div class="text-center">
                                <img src="uploads/<?php echo htmlspecialchars($event['image']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($event['title']); ?>">
                            </div>
                        </div>
                    </div>
                    <h1 class="text-center mb-3"><?php echo htmlspecialchars($event['title']); ?></h1>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
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
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq8dK0e2dS2e40Pib8PBjpYolDkhI0vgrjpvmKfFCLpKJJ6BxH" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq8dK0e2dS2e40Pib8PBjpYolDkhI0vgrjpvmKfFCLpKJJ6BxH" crossorigin="anonymous"></script>
</body>
</html>
