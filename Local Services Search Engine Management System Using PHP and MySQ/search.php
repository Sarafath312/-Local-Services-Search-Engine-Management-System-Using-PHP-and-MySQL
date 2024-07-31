<?php
include 'config.php';

$query = $_GET['query'];
$sql = "SELECT * FROM services WHERE name LIKE '%$query%' OR location LIKE '%$query%'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Search Results</h1>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='result'>";
                echo "<h2>" . $row['name'] . "</h2>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
