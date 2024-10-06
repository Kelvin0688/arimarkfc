<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'arimarkfc');
// $db = mysqli_connect('fdb1030.awardspace.net', '4509051_arimarkfc', 'vikelNCta_??!ssiiaawaq111', '4509051_arimarkfc');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, password) 
                          VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
      array_push($errors, "Username is required");
  }
  if (empty($password)) {
      array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
      $password = md5($password); // Hash the password
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('Location: index.php'); // Redirect to index.php
          exit(); // Ensure no further code is executed
      } else {
          array_push($errors, "Wrong username/password combination");
      }
  }
}
// Register Player
if (isset($_POST['reg_player'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $position = mysqli_real_escape_string($db, $_POST['position']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $nationality = mysqli_real_escape_string($db, $_POST['nationality']);
  $weight = mysqli_real_escape_string($db, $_POST['weight']);
  $height = mysqli_real_escape_string($db, $_POST['height']);
  $strong_foot = mysqli_real_escape_string($db, $_POST['strong_foot']);
  $under = mysqli_real_escape_string($db, $_POST['under']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $photo = $_FILES['photo']['name'];
  $target = "uploads/" . basename($photo);

  if (empty($name) || empty($position) || empty($age) || empty($nationality) || empty($weight) || empty($height) || empty($strong_foot) || empty($under) || empty($description) || empty($photo)) {
      array_push($errors, "All fields are required");
  }

  if (count($errors) == 0) {
      if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
          $query = "INSERT INTO players (name, position, age, nationality, weight, height, strong_foot, under, description, photo) 
                    VALUES ('$name', '$position', '$age', '$nationality', '$weight', '$height', '$strong_foot', '$under', '$description', '$photo')";
          mysqli_query($db, $query);
          $_SESSION['success'] = "Player registered successfully";
          header('location: view-players.php');
      } else {
          array_push($errors, "Failed to upload photo");
      }
  }
}

// Update Player
if (isset($_POST['update_player'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $position = mysqli_real_escape_string($db, $_POST['position']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $nationality = mysqli_real_escape_string($db, $_POST['nationality']);
  $weight = mysqli_real_escape_string($db, $_POST['weight']);
  $height = mysqli_real_escape_string($db, $_POST['height']);
  $strong_foot = mysqli_real_escape_string($db, $_POST['strong_foot']);
  $under = mysqli_real_escape_string($db, $_POST['under']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $photo = $_FILES['photo']['name'];
  $target = "uploads/" . basename($photo);

  if (empty($name) || empty($position) || empty($age) || empty($nationality) || empty($weight) || empty($height) || empty($strong_foot) || empty($under) || empty($description)) {
      array_push($errors, "All fields are required");
  }

  if (count($errors) == 0) {
      if (!empty($photo)) {
          if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
              $query = "UPDATE players SET name='$name', position='$position', age='$age', nationality='$nationality', weight='$weight', height='$height', strong_foot='$strong_foot', under='$under', description='$description', photo='$photo' WHERE id=$id";
          } else {
              array_push($errors, "Failed to upload photo");
          }
      } else {
          $query = "UPDATE players SET name='$name', position='$position', age='$age', nationality='$nationality', weight='$weight', height='$height', strong_foot='$strong_foot', under='$under', description='$description' WHERE id=$id";
      }
      if (count($errors) == 0) {
          mysqli_query($db, $query);
          $_SESSION['success'] = "Player updated successfully";
          header('location: view-players.php');
      }
  }
}

// Delete Player
if (isset($_GET['delete_player'])) {
  $id = $_GET['delete_player'];
  $query = "DELETE FROM players WHERE id=$id";
  if (mysqli_query($db, $query)) {
      $_SESSION['success'] = "Player deleted successfully";
  } else {
      $_SESSION['error'] = "Failed to delete player";
  }
  header('location: view-players.php');
}

// Fetch all players
$query = "SELECT * FROM players";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $players[] = $row;
}

// Fetch player for editing
if (isset($_GET['edit_player'])) {
  $id = $_GET['edit_player'];
  $query = "SELECT * FROM players WHERE id=$id";
  $result = mysqli_query($db, $query);
  $player = mysqli_fetch_assoc($result);
}

 
// REGISTER U-15 PLAYER
if (isset($_POST['reg_u15'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $position = mysqli_real_escape_string($db, $_POST['position']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $nationality = mysqli_real_escape_string($db, $_POST['nationality']);
  $weight = mysqli_real_escape_string($db, $_POST['weight']);
  $height = mysqli_real_escape_string($db, $_POST['height']);
  $strong_foot = mysqli_real_escape_string($db, $_POST['strong_foot']);
  $under = mysqli_real_escape_string($db, $_POST['under']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $photo = $_FILES['photo']['name'];
  $target = "uploads/" . basename($photo);

  if (empty($name) || empty($position) || empty($age) || empty($nationality) || empty($weight) || empty($height) || empty($strong_foot) || empty($under) || empty($description) || empty($photo)) {
      array_push($errors, "All fields are required");
  }

  if (count($errors) == 0) {
      if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
          $query = "INSERT INTO u15 (name, position, age, nationality, weight, height, strong_foot, under, description, photo) 
                    VALUES ('$name', '$position', '$age', '$nationality', '$weight', '$height', '$strong_foot', '$under', '$description', '$photo')";
          mysqli_query($db, $query);
          $_SESSION['success'] = "Player registered successfully";
          header('location: view-u15.php');
      } else {
          array_push($errors, "Failed to upload photo");
      }
  }
}

// Update Player
if (isset($_POST['update_u15'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $position = mysqli_real_escape_string($db, $_POST['position']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $nationality = mysqli_real_escape_string($db, $_POST['nationality']);
  $weight = mysqli_real_escape_string($db, $_POST['weight']);
  $height = mysqli_real_escape_string($db, $_POST['height']);
  $strong_foot = mysqli_real_escape_string($db, $_POST['strong_foot']);
  $under = mysqli_real_escape_string($db, $_POST['under']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $photo = $_FILES['photo']['name'];
  $target = "uploads/" . basename($photo);

  if (empty($name) || empty($position) || empty($age) || empty($nationality) || empty($weight) || empty($height) || empty($strong_foot) || empty($under) || empty($description)) {
      array_push($errors, "All fields are required");
  }

  if (count($errors) == 0) {
      if (!empty($photo)) {
          if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
              $query = "UPDATE u15 SET name='$name', position='$position', age='$age', nationality='$nationality', weight='$weight', height='$height', strong_foot='$strong_foot', under='$under', description='$description', photo='$photo' WHERE id=$id";
          } else {
              array_push($errors, "Failed to upload photo");
          }
      } else {
          $query = "UPDATE u15 SET name='$name', position='$position', age='$age', nationality='$nationality', weight='$weight', height='$height', strong_foot='$strong_foot', under='$under', description='$description' WHERE id=$id";
      }
      if (count($errors) == 0) {
          mysqli_query($db, $query);
          $_SESSION['success'] = "Player updated successfully";
          header('location: view-u15.php');
      }
  }
}

// Delete Player
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $query = "DELETE FROM u15 WHERE id=$id";
  if (mysqli_query($db, $query)) {
      $_SESSION['success'] = "Player deleted successfully";
  } else {
      $_SESSION['error'] = "Failed to delete player";
  }
  header('location: view-u15.php');
}

// Fetch all players
$query = "SELECT * FROM u15";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $u15players[] = $row;
}

// Fetch player for editing
if (isset($_GET['edit15'])) {
  $id = $_GET['edit15'];
  $query = "SELECT * FROM u15 WHERE id=$id";
  $result = mysqli_query($db, $query);
  $player = mysqli_fetch_assoc($result);
}

// REGISTER U-13 PLAYER
if (isset($_POST['reg_u13'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $position = mysqli_real_escape_string($db, $_POST['position']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $nationality = mysqli_real_escape_string($db, $_POST['nationality']);
  $weight = mysqli_real_escape_string($db, $_POST['weight']);
  $height = mysqli_real_escape_string($db, $_POST['height']);
  $strong_foot = mysqli_real_escape_string($db, $_POST['strong_foot']);
  $under = mysqli_real_escape_string($db, $_POST['under']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $photo = $_FILES['photo']['name'];
  $target = "uploads/" . basename($photo);

  if (empty($name) || empty($position) || empty($age) || empty($nationality) || empty($weight) || empty($height) || empty($strong_foot) || empty($under) || empty($description) || empty($photo)) {
      array_push($errors, "All fields are required");
  }

  if (count($errors) == 0) {
      if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
          $query = "INSERT INTO u13 (name, position, age, nationality, weight, height, strong_foot, under, description, photo) 
                    VALUES ('$name', '$position', '$age', '$nationality', '$weight', '$height', '$strong_foot', '$under', '$description', '$photo')";
          mysqli_query($db, $query);
          $_SESSION['success'] = "Player registered successfully";
          header('location: view-u13.php');
      } else {
          array_push($errors, "Failed to upload photo");
      }
  }
}

// Update Player
if (isset($_POST['update_u13'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $position = mysqli_real_escape_string($db, $_POST['position']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $nationality = mysqli_real_escape_string($db, $_POST['nationality']);
  $weight = mysqli_real_escape_string($db, $_POST['weight']);
  $height = mysqli_real_escape_string($db, $_POST['height']);
  $strong_foot = mysqli_real_escape_string($db, $_POST['strong_foot']);
  $under = mysqli_real_escape_string($db, $_POST['under']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $photo = $_FILES['photo']['name'];
  $target = "uploads/" . basename($photo);

  if (empty($name) || empty($position) || empty($age) || empty($nationality) || empty($weight) || empty($height) || empty($strong_foot) || empty($under) || empty($description)) {
      array_push($errors, "All fields are required");
  }

  if (count($errors) == 0) {
      if (!empty($photo)) {
          if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
              $query = "UPDATE u13 SET name='$name', position='$position', age='$age', nationality='$nationality', weight='$weight', height='$height', strong_foot='$strong_foot', under='$under', description='$description', photo='$photo' WHERE id=$id";
          } else {
              array_push($errors, "Failed to upload photo");
          }
      } else {
          $query = "UPDATE u13 SET name='$name', position='$position', age='$age', nationality='$nationality', weight='$weight', height='$height', strong_foot='$strong_foot', under='$under', description='$description' WHERE id=$id";
      }
      if (count($errors) == 0) {
          mysqli_query($db, $query);
          $_SESSION['success'] = "Player updated successfully";
          header('location: view-u13.php');
      }
  }
}

// Delete Player
if (isset($_GET['delete13'])) {
  $id = $_GET['delete13'];
  $query = "DELETE FROM u13 WHERE id=$id";
  if (mysqli_query($db, $query)) {
      $_SESSION['success'] = "Player deleted successfully";
  } else {
      $_SESSION['error'] = "Failed to delete player";
  }
  header('location: view-u13.php');
}

// Fetch all players
$query = "SELECT * FROM u13";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $u13players[] = $row;
}

// Fetch player for editing
if (isset($_GET['edit13'])) {
  $id = $_GET['edit13'];
  $query = "SELECT * FROM u13 WHERE id=$id";
  $result = mysqli_query($db, $query);
  $player = mysqli_fetch_assoc($result);
}

// Register Event
if (isset($_POST['reg_event'])) {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $image = $_FILES['image']['name'];
  $target = "uploads/" . basename($image);

  if (empty($title) || empty($date) || empty($location) || empty($description) || empty($image)) {
      array_push($errors, "All fields are required");
  }

  if (count($errors) == 0) {
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
          $query = "INSERT INTO event (title, date, location, description, image) 
                    VALUES ('$title', '$date', '$location', '$description', '$image')";
          mysqli_query($db, $query);
          $_SESSION['success'] = "Event registered successfully";
          header('location: view-events.php');
      } else {
          array_push($errors, "Failed to upload image");
      }
  }
}

// Update Event
if (isset($_POST['update_event'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $image = $_FILES['image']['name'];
  $target = "uploads/" . basename($image);

  if (empty($title) || empty($date) || empty($location) || empty($description)) {
      array_push($errors, "All fields are required");
  }

  if (count($errors) == 0) {
      if (!empty($image)) {
          if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
              $query = "UPDATE event SET title='$title', date='$date', location='$location', description='$description', image='$image' WHERE id=$id";
          } else {
              array_push($errors, "Failed to upload image");
          }
      } else {
          $query = "UPDATE event SET title='$title', date='$date', location='$location', description='$description' WHERE id=$id";
      }
      if (count($errors) == 0) {
          mysqli_query($db, $query);
          $_SESSION['success'] = "Event updated successfully";
          header('location: view-events.php');
      }
  }
}

// Delete Event
if (isset($_GET['delete_event'])) {
  $id = $_GET['delete_event'];
  $query = "DELETE FROM event WHERE id=$id";
  if (mysqli_query($db, $query)) {
      $_SESSION['success'] = "Event deleted successfully";
  } else {
      $_SESSION['error'] = "Failed to delete event";
  }
  header('location: view-events.php');
}

// Fetch all events
$query = "SELECT * FROM event";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $events[] = $row;
}

// Fetch event for editing
if (isset($_GET['edit_event'])) {
  $id = $_GET['edit_event'];
  $query = "SELECT * FROM event WHERE id=$id";
  $result = mysqli_query($db, $query);
  $event = mysqli_fetch_assoc($result);
}

// register Staff
// if (isset($_POST['reg_staff'])) {
//   // Receive all input values from the form
//   $name = mysqli_real_escape_string($db, $_POST['name']);
//   $position = mysqli_real_escape_string($db, $_POST['position']);
//   $number = mysqli_real_escape_string($db, $_POST['number']);
//   $photo = $_FILES['photo']['name'];
//   $target = "uploads/" . basename($photo);

//   // Form validation: ensure that the form is correctly filled
//   if (empty($name)) { array_push($errors, "Name is required"); }
//   if (empty($position)) { array_push($errors, "Position is required"); }
//   if (empty($number)) { array_push($errors, "Number is required"); }
//   if (empty($photo)) { array_push($errors, "Photo is required"); }

//   // Finally, register staff if there are no errors in the form
//   if (count($errors) == 0) {
//       $query = "INSERT INTO staff (name, position, number, photo) 
//                 VALUES ('$name', '$position', '$number', '$photo')";
//       mysqli_query($db, $query);

//       // Check if the uploads directory exists, if not create it
//       if (!is_dir('uploads')) {
//           mkdir('uploads', 0777, true);
//       }

//       if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
//           header('location: view-staff.php');
//           $success = "Staff registered successfully";
//       } else {
//           array_push($errors, "Failed to upload photo");
//       }
//   }
// }

// Fetch staff data if edit is requested
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($db, "SELECT * FROM staff WHERE id=$id");
    $staff = mysqli_fetch_array($result);
}

// Delete staff if delete is requested
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($db, "DELETE FROM staff WHERE id=$id");
    header('location: view-staff.php');
    exit();
}

// Check if the form is submitted for adding, updating, or deleting
if (isset($_POST['reg_staff'])) {
    // Add new staff
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $position = mysqli_real_escape_string($db, $_POST['position']);
    $number = mysqli_real_escape_string($db, $_POST['number']);
    $photo = $_FILES['photo']['name'];
    $target = "uploads/" . basename($photo);

    if (empty($name)) { array_push($errors, "Name is required"); }
    if (empty($position)) { array_push($errors, "Position is required"); }
    if (empty($number)) { array_push($errors, "Number is required"); }
    if (empty($photo)) { array_push($errors, "Photo is required"); }

    if (count($errors) == 0) {
        // Check for duplicate entries
        $duplicate_check_query = "SELECT * FROM staff WHERE name='$name' AND position='$position' AND number='$number' LIMIT 1";
        $result = mysqli_query($db, $duplicate_check_query);
        $staff = mysqli_fetch_assoc($result);

        if ($staff) { // if staff exists
            array_push($errors, "Staff member already exists");
        } else {
            $query = "INSERT INTO staff (name, position, number, photo) VALUES ('$name', '$position', '$number', '$photo')";
            mysqli_query($db, $query);

            if (!is_dir('uploads')) {
                mkdir('uploads', 0777, true);
            }

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
                header('location: view-staff.php');
                exit();
            } else {
                array_push($errors, "Failed to upload photo");
            }
        }
    }
} elseif (isset($_POST['update_staff'])) {
    // Update existing staff
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $position = mysqli_real_escape_string($db, $_POST['position']);
    $number = mysqli_real_escape_string($db, $_POST['number']);
    $photo = $_FILES['photo']['name'];
    $target = "uploads/" . basename($photo);

    if (empty($name)) { array_push($errors, "Name is required"); }
    if (empty($position)) { array_push($errors, "Position is required"); }
    if (empty($number)) { array_push($errors, "Number is required"); }
    if (empty($photo)) { array_push($errors, "Photo is required"); }

    if (count($errors) == 0) {
        $query = "UPDATE staff SET name='$name', position='$position', number='$number', photo='$photo' WHERE id=$id";
        mysqli_query($db, $query);

        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            header('location: view-staff.php');
            exit();
        } else {
            array_push($errors, "Failed to upload photo");
        }
    }
}

// Count the number of players
$player_count_query = "SELECT COUNT(*) AS count FROM players";
$player_count_result = mysqli_query($db, $player_count_query);
$player_count = mysqli_fetch_assoc($player_count_result)['count'];

// Count the number of events
$event_count_query = "SELECT COUNT(*) AS count FROM event";
$event_count_result = mysqli_query($db, $event_count_query);
$event_count = mysqli_fetch_assoc($event_count_result)['count'];

// Count the number of staff
$staff_count_query = "SELECT COUNT(*) AS count FROM staff";
$staff_count_result = mysqli_query($db, $staff_count_query);
$staff_count = mysqli_fetch_assoc($staff_count_result)['count'];


  ?>