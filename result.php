<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width"/>
    <title>AP EAPCET Predictor - Results</title>
    
</head>

<body>
<div class="container">
   <center> <h1 class="logo cursive">
        AP EAPCET Predictor - Results
    </h1> </center>

    <center>
        <p class="intro">Congratulations <span>Your</span> are getting rank<br>We have some College Suggestions for you based on Last Year Cut-offs</p>
    </center>

   
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

        if ($rank == 0) {
            echo "<p>Please enter a valid rank (greater than 0).</p>";
        } else {
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

            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                echo "<center><h2>Results for $fname</h2></center>";
                echo "<div class='table-responsive'>";
                echo "<table class='table table-striped' style='width: 100%;'>";
                echo "<thead class='thead-dark'>";
                echo "<tr><th scope='col'>College Name</th><th scope='col'>Branch</th><th scope='col'>ORank</th><th scope='col'>CRank</th></tr>";
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
                echo "</div>";
            } else {
                echo "<p>No colleges found for the entered branch and rank.</p>";
            }
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $pdo = null;
}
?>
        </table>
    </div>

    
</div>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <center>
                    <p class="p-small"><b>Copyright All Rights Reserved<br>© AP EAPCET Predictor</b></p>
                </center>
            </div>
        </div>
    </div>
	<center> <div class="butt">
    <a href="index.php"><button>Go Back</button></a>
    <button onclick="printPage()">Print</button> 
	</div> </center>
	<script>
    function printPage() {
        window.print(); // Invoke the print dialog
    }
</script>
<style>
    @media print {
        .butt {
            display: none; /* Hide the button container when in print mode */
        }
    }
</style>

</div>
</div>
</body>
</html>
