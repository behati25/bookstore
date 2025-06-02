<?php 
include 'database.php';
$message = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $role = 'user';

    if ($password !== $confirm) {
        $message = "Passwords do not match!";
    } else {
        $check = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $check->bind_param("ss", $username, $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $message = "Username or email already exists.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, password, name, email, role) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $username, $hashedPassword, $name, $email, $role);

            if ($stmt->execute()) {
                $success = "<strong>REGISTERED SUCCESSFULLY!</strong>";
            } else {
                $message = "Error: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('bookcover.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .register-container {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 40px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 450px;
    }

    .register-container h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      color: #2c3e50;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #2c3e50;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #1abc9c;
    }

    .message {
      color: red;
      text-align: center;
      margin-bottom: 15px;
    }

    .success {
      color: green;
      text-align: center;
      margin-bottom: 15px;
      font-weight: bold;
    }

    .login-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .login-link a {
      color: #3498db;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="register-container">
  <h2>Register</h2>

  <?php if ($message): ?>
    <p class="message"><?= $message ?></p>
  <?php elseif ($success): ?>
    <p class="success"><?= $success ?></p>
  <?php endif; ?>

  <form method="POST" autocomplete="off">
    <div class="form-group">
      <label for="name">Full Name:</label>
      <input type="text" name="name" id="name" autocomplete="off" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" autocomplete="off" required>
    </div>

    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" autocomplete="off" required>
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" autocomplete="new-password" required>
    </div>

    <div class="form-group">
      <label for="confirm_password">Confirm Password:</label>
      <input type="password" name="confirm_password" id="confirm_password" autocomplete="new-password" required>
    </div>

    <button type="submit">Register</button>
  </form>

  <div class="login-link">
    <p>Already have an account? <a href="login.php">Login</a></p>
  </div>
</div>

</body>
</html>