<?php include('server.php') ?>
<?php

// Fetch events from the database
$query = "SELECT * FROM event";
$results = mysqli_query($db, $query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Registration Form</title>
    <link rel="icon" type="image/png" href="../public/arimark.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">

    <style>
        body {
            background-image: url('back.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            background: #004d40;
            color: #fff;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            text-align: center;
            margin-bottom: 30px;
        }
        .event-card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            border: none;
            cursor: pointer;

            
        }
        .event-card a{
            text-decoration: none;
        }
        .event-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .event-card img {
            height: 200px;
            object-fit: cover;
        }
        .event-card-body {
            padding: 20px;
        }
        .event-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: #004969;
        }
        .event-info {
            color: #6c757d;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
    <main class="container col-md-12 ml-sm-auto col-lg-12 px-md-4 py-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Player</li>
                </ol>
            </nav>
            <div id="content">    
                <div class="container mt-5">
                    <h1>All Events</h1>
                    <div class="row">
                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                            <div class="col-lg-4 col-md-6 mb-4 animate__animated" data-animate="animate__fadeInLeft">
                                <div class="card event-card">
                                    <a href="singleEvent.php?id=<?php echo $row['id']; ?>">
                                        <img src="uploads/<?php echo $row['image']; ?>" alt="Event Image" class="card-img-top img-fluid">
                                        <div class="card-body event-card-body">
                                            <h5 class="event-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                            <p class="event-info">Date: <?php echo htmlspecialchars($row['date']); ?></p>
                                            <p class="event-info">Location: <?php echo htmlspecialchars($row['location']); ?></p>
                                            <p class="event-info">Description: <?php echo htmlspecialchars($row['description']); ?></p>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <a href="add-event.php?edit_event=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="server.php?delete_event=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>

                                </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq8dK0e2dS2e40Pib8PBjpYolDkhI0vgrjpvmKfFCLpKJJ6BxH" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq8dK0e2dS2e40Pib8PBjpYolDkhI0vgrjpvmKfFCLpKJJ6BxH" crossorigin="anonymous"></script>
</body>
</html>
