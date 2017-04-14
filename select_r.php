<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carpooldb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$_a = $_POST['StartLoc'];
$b = $_POST['EndLoc'];
$c = $_POST['JDate'];

$sql = 'select * from journey where j_start = '. $a. ' and j_finish='. $b' and j_date='. $c;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["j_fare"]."</td><td>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
