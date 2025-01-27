<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $branch = $_POST['branch'];
    $rank = $_POST['rank'];

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

        // Prepare SQL query based on branch and rank
        $query = "SELECT college_name, branch_name, opening_rank, closing_rank 
                  FROM colleges 
                  WHERE branch_name = :branch 
                  AND opening_rank <= :rank 
                  AND closing_rank >= :rank";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':branch', $branch);
        $stmt->bindParam(':rank', $rank);
        $stmt->execute();

        // Display the result
        echo "<h2>Results for $fname</h2>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr><th>College Name</th><th>Branch</th><th>ORank</th><th>CRank</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['college_name']}</td>";
            echo "<td>{$row['branch_name']}</td>";
            echo "<td>{$row['opening_rank']}</td>";
            echo "<td>{$row['closing_rank']}</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $pdo = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>AP EAPCET</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('assets/images/background.jpg');
	  background-size:cover;
      background-repeat: no-repeat;
      background-position:center center;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <h1 class="mt-4 text-center">AP EAPCET PREDICTOR</h1>
    <div class="row">
      <div class="col-lg-12">
        <form action="result.php" method="post" class="mt-4">
          <div class="form-group col-md-4">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Your name.." required>
          </div>
          <div class="form-group col-md-4">
            <label for="branch">Branch:</label>
            <select class="form-control" name="branch">
              <option value="All">All</option>
              <option value="CSE">CSE</option>
              <option value="ECE">ECE</option>
              <option value="ME">ME</option>
              <option value="EE/EEE">EE/EEE</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="rank">Rank:</label>
            <input type="number" class="form-control" id="rank" name="rank" placeholder="xxxx" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>   
  <center><div class="mt-4">
                            <p class="text-muted"><a href="admin/index.php">Go to Admin Panel</a></p>
                        </div></center>
  <div class="mt-4"></div>
  <br>
  </br>
    <br>
  </br>
    <br>
  </br>
      <br>
  </br>    <br>
  </br>
  <footer>
    <p class="text-center">&copy; College Predictor. All Rights Reserved.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
