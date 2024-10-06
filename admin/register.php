<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register an Admin</title>
  <link rel="icon" type="image/png" href="../public/arimark.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #000;
      font-family: Arial, sans-serif;
    }
    
    .container {
      background-color: #fff;
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
      padding: 30px;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .header {
      background-color: #004969;
      padding: 20px;
      border-radius: 10px 10px 0 0;
      color: #fff;
      text-align: center;
      margin-bottom: 30px;
    }

    .header h2 {
      margin: 0;
      font-size: 24px;
    }

    form {
      width: 100%;
    }

    .input-group {
      margin-bottom: 15px;
    }

    .input-group label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .btn {
      width: 100%;
      background-color: #004969;
      color: #fff;
      border: none;
      padding: 10px;
      font-size: 18px;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background-color: #468b8a;
    }

    p {
      text-align: center;
      margin-top: 20px;
    }

    p a {
      color: #5F9EA0;
      text-decoration: none;
      font-weight: bold;
    }

    .error, .success {
      margin-bottom: 20px;
      padding: 10px;
      text-align: left;
      border-radius: 5px;
    }

    .error {
      background-color: #f2dede;
      border: 1px solid #a94442;
      color: #a94442;
    }

    .success {
      background-color: #004969;
      border: 1px solid #3c763d;
      color: #3c763d;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2>Register Arimark Admin</h2>
    </div>
    <form method="post" action="register.php">
      <?php include('errors.php'); ?>
      <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
      </div>
      <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
      </div>
      <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
      </div>
      <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>
  </div>
</body>
</html>
