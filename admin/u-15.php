<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

    <style>
        /* body {
            background-color: #f8f9fa;
        } */
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
            background: grey;
            color: #fff;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
    <main class="container col-md-12 ml-sm-auto col-lg-12 px-md-4 py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add/Update Player</li>
            </ol>
        </nav>
        <div id="content">    
            <div class="container">
                <div class="form-container">
                    <div class="form-header">
                        <h2><?php echo isset($_GET['edit']) ? 'Update' : 'Add'; ?> U-15 Player</h2>
                    </div>
                    <?php if (count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $error): ?>
                                <p><?php echo $error; ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                    <form action="u-15.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo isset($player['id']) ? $player['id'] : ''; ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($player['name']) ? $player['name'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select class="form-control" id="position" name="position" required>
                                <option value="">Select position</option>
                                <option value="Goalkeeper" <?php echo isset($player['position']) && $player['position'] == 'Goalkeeper' ? 'selected' : ''; ?>>Goalkeeper</option>
                                <option value="Defender" <?php echo isset($player['position']) && $player['position'] == 'Defender' ? 'selected' : ''; ?>>Defender</option>
                                <option value="Midfielder" <?php echo isset($player['position']) && $player['position'] == 'Midfielder' ? 'selected' : ''; ?>>Midfielder</option>
                                <option value="Forward" <?php echo isset($player['position']) && $player['position'] == 'Forward' ? 'selected' : ''; ?>>Forward</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?php echo isset($player['age']) ? $player['age'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nationality" class="form-label">Nationality</label>
                            <select class="form-control" id="nationality" name="nationality" required>
                                <option value="Ghanaian" <?php echo isset($player['nationality']) && $player['nationality'] == 'Ghanaian' ? 'selected' : ''; ?>>Ghanaian</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (kg)</label>
                            <input type="number" class="form-control" id="weight" name="weight" value="<?php echo isset($player['weight']) ? $player['weight'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Height (cm)</label>
                            <input type="number" class="form-control" id="height" name="height" value="<?php echo isset($player['height']) ? $player['height'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="strong_foot" class="form-label">Strong Foot</label>
                            <select class="form-control" id="strong_foot" name="strong_foot" required>
                                <option value="">Select Strong Foot</option>
                                <option value="Left Footed" <?php echo isset($player['strong_foot']) && $player['strong_foot'] == 'Left Footed' ? 'selected' : ''; ?>>Left Footed</option>
                                <option value="Right Footed" <?php echo isset($player['strong_foot']) && $player['strong_foot'] == 'Right Footed' ? 'selected' : ''; ?>>Right Footed</option> 
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="under" class="form-label">Team Category</label>
                            <select class="form-control" id="under" name="under" required>
                                <option value="">Under?</option> 
                                <option value="U-15" <?php echo isset($player['under']) && $player['under'] == 'U-15' ? 'selected' : ''; ?>>U-15</option> 
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo isset($player['description']) ? $player['description'] : ''; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo" <?php echo isset($player['photo']) ? '' : 'required'; ?>>
                            <?php if (isset($player['photo'])): ?>
                                <img src="uploads/<?php echo $player['photo']; ?>" alt="Player Photo" width="100" height="100">
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary" name="<?php echo isset($player['id']) ? 'update_u15' : 'reg_u15'; ?>">
                            <?php echo isset($player['id']) ? 'Update Player' : 'Register Player'; ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq8dK0e2dS2e40Pib8PBjpYolDkhI0vgrjpvmKfFCLpKJJ6BxH" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq8dK0e2dS2e40Pib8PBjpYolDkhI0vgrjpvmKfFCLpKJJ6BxH" crossorigin="anonymous"></script>
</body>
</html>
