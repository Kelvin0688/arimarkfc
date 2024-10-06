<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Staff</title>
    <link rel="icon" type="image/png" href="../public/arimark.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">

    <style>
        body {
            background-image: url('back.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .team4 {
            font-family: "Montserrat", sans-serif;
            color: #444546;
            font-weight: 300;
        }
        
        .team4 h1, .team4 h2, .team4 h3, .team4 h4, .team4 h5, .team4 h6 {
            color: #3e4555;
        }
        
        .team4 .font-weight-medium {
            font-weight: 500;
        }
        
        .team4 h5 {
            line-height: 22px;
            font-size: 18px;
        }
        
        .team4 .subtitle {
            color: #8d97ad;
            line-height: 24px;
            font-size: 13px;
        }
        
        .team4 ul li a {
            color: #8d97ad;
            padding-right: 15px;
            -webkit-transition: 0.1s ease-in;
            -o-transition: 0.1s ease-in;
            transition: 0.1s ease-in;
        }
        
        .team4 ul li a:hover {
            -webkit-transform: translate3d(0px, -5px, 0px);
            transform: translate3d(0px, -5px, 0px);
            color: #316ce8;
        } 

        .small-img {
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
    <main class="container col-md-12 ml-sm-auto col-lg-12 px-md-4 py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Staff</li>
            </ol>
        </nav>
        <div id="content">
            <div class="container mt-5">
                <div class="row">
                    <?php
                    $results = mysqli_query($db, "SELECT * FROM staff");
                    while ($row = mysqli_fetch_array($results)) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="text-center animate__animated" data-animate="animate__zoomIn">
                                <img src="uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>" class="img-fluid rounded-circle mb-3 small-img">
                                <div class="pt-2">
                                    <h5 class="mt-4 font-weight-medium mb-0"><?php echo $row['name']; ?></h5>
                                    <h6 class="subtitle mb-3"><?php echo $row['position']; ?></h6>
                                    <p class="text-center"><?php echo $row['number']; ?></p>
                                    <div class="mt-2">
                                        <a href="add-staff.php?edit=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Update</a>
                                        <a href="add-staff.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this staff member?');">Delete</a>
                                    </div>
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
