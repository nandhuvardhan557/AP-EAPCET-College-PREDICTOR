<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'ap_eapcet_predictor';
$user = 'root';
$password = '';
// Function to authenticate user credentials
function authenticateUser($username, $enteredPassword, $pdo)
{
    $query = "SELECT * FROM admin_users WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);

    // Hash the entered password using MD5
    $hashedPassword = md5($enteredPassword);
    $stmt->bindParam(':password', $hashedPassword);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a PDO instance
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get user credentials from the login form
        $username = $_POST['username'];
        $enteredPassword = $_POST['password'];

        // Authenticate the user
        $user = authenticateUser($username, $enteredPassword, $pdo);

        if ($user) {
            // Store the username in the session
            $_SESSION['username'] = $username;

            // Redirect to the admin page if authentication is successful
            header("Location: admin.php");
            exit();
        } else {
            $loginError = "Invalid username or password";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AP EAPCET Predictor Admin</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-image: url('../assets/images/background3.jpg'); /* Replace with your image URL */
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container {
        text-align: center;
    }

    .logo {
        color: #bbb;
        font-size: 2em;
        margin-bottom: 20px;
    }

    .admin-form {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        width: 300px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    .error-message {
        color: red;
        margin-bottom: 16px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

</head>
<body>

<div class="container">
    <h1 class="logo cursive">Admin Login</h1>

    <div class="admin-form">
        <h2>Login</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <?php if (isset($loginError)) { ?>
                <p class="error-message"><?php echo $loginError; ?></p>
            <?php } ?>

            <button type="submit" name="submit">Login</button>
        </form>
		 <center><div class="mt-4">
                            <p class="text-muted"><a href="/project/index.php">Go to Home page </a></p>
                        </div></center>
  <div class="mt-4"></div>
    </div>
</div>

</body>
</html>
