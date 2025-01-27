<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - AP EAPCET Predictor</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('../assets/images/background1.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.8); /* Add transparency by adjusting the alpha channel */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .logo {
            color: #zzz;
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }

        .admin-form {
            text-align: center;
        }

        h2 {
            color: #ffff;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #ffff;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        button:hover {
            background-color: #0056b3;
        }

        .butt {
            text-align: center;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
        }

        button, a button {
            display: inline-block;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="logo cursive">
            Admin - AP EAPCET Predictor
        </h1>

        <div class="admin-form">
            <h2>Add College Data</h2>
            <form method="post" action="">
                <label for="college_name">College Name:</label>
                <input type="text" name="college_name" required>

                <label for="branch_name">Branch Name:</label>
                <input type="text" name="branch_name" required>

                <label for="opening_rank">Opening Rank:</label>
                <input type="number" name="opening_rank" required>

                <label for="closing_rank">Closing Rank:</label>
                <input type="number" name="closing_rank" required>

                <button type="submit" name="submit">Add College Data</button>
            </form>
        </div>

        <div class="butt">
            <a href="/project/index.php"><button>Back to Home</button></a>
        </div>
    </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $host = 'localhost';
    $dbname = 'ap_eapcet_predictor';
    $user = 'root';
    $password = '';

    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert new college data into the colleges table
        $query = "INSERT INTO colleges (college_name, branch_name, opening_rank, closing_rank) 
                  VALUES (:college_name, :branch_name, :opening_rank, :closing_rank)";
        $stmt = $pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(':college_name', $_POST['college_name']);
        $stmt->bindParam(':branch_name', $_POST['branch_name']);
        $stmt->bindParam(':opening_rank', $_POST['opening_rank']);
        $stmt->bindParam(':closing_rank', $_POST['closing_rank']);

        // Execute the query
        $stmt->execute();

        echo "<script>alert('College data added successfully!');</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $pdo = null;
}
?>

</body>
</html>
