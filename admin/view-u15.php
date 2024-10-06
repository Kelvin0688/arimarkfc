<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Players - U15</title>
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
    </style>
</head>
<body style="background-image: url(back.png);">
<?php include 'navbar.php'; ?>
    <main class="container col-md-12 ml-sm-auto col-lg-12 px-md-4 py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View U-15 Players</li>
            </ol>
        </nav>
        <h1 class="h2">U-15 Players</h1>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Age</th>
                        <th scope="col">Nationality</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Height</th>
                        <th scope="col">Strong Foot</th>
                        <th scope="col">Under</th>
                        <th scope="col">Description</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($u15players as $u15player): ?>
                        <tr>
                            <td><?php echo $u15player['id']; ?></td>
                            <td><?php echo $u15player['name']; ?></td>
                            <td><?php echo $u15player['position']; ?></td>
                            <td><?php echo $u15player['age']; ?></td>
                            <td><?php echo $u15player['nationality']; ?></td>
                            <td><?php echo $u15player['weight']; ?></td>
                            <td><?php echo $u15player['height']; ?></td>
                            <td><?php echo $u15player['strong_foot']; ?></td>
                            <td><?php echo $u15player['under']; ?></td>
                            <td><?php echo $u15player['description']; ?></td>
                            <td><img src="uploads/<?php echo $u15player['photo']; ?>" alt="Player Photo" width="50" height="50"></td>
                            <td>
                                <a href="player.php?edit15=<?php echo $u15player['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                                <a href="view-players.php?delete15=<?php echo $u15player['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this player?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq8dK0e2dS2e40Pib8PBjpYolDkhI0vgrjpvmKfFCLpKJJ6BxH" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq8dK0e2dS2e40Pib8PBjpYolDkhI0vgrjpvmKfFCLpKJJ6BxH" crossorigin="anonymous"></script>
</body>
</html>
