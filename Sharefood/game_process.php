<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<?php
require_once('lib/connect.php');
require_once('config/config.php');

$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

if(isset($_POST['username'], $_POST['score'])){
    $conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

        $tableName = $_POST['tableName'];
        $username = $_POST['username'];
        $score = $_POST['score'];

        $sql = "INSERT INTO $tableName (username, score) VALUES ('$username', '$score')";
        mysqli_query($conn, $sql);
        
} else {
    echo "Nothing is set";
}

$breakout = 'breakout';

$sql = "SELECT * FROM $breakout";

$result = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($result);

echo "<table>
<tr>
<th>Username</th>
<th>Score</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr><td>" . $row['username'] . "</td>";
    echo "<tr><td>" . $row['score'] . "</td></tr>";
}

echo "</table>";
//$array = mysqli_fetch_row($result);

echo json_encode($array);





?>