
<?php
require_once('lib/connect.php');
require_once('config/config.php');

$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

$methodType = $_SERVER['REQUEST_METHOD'];

// If ($methodType === 'POST')
if(isset($_POST['username'], $_POST['score'])){

    $tableName = $_POST['tableName'];
    $username = $_POST['username'];
    $score = $_POST['score'];
    //$record = $_POST['record'];

    $sql = "INSERT INTO $tableName (username, score, created) VALUES ('$username', '$score', CURDATE())";
    mysqli_query($conn, $sql);
        
}

if($methodType === 'GET'){
    //$tableName = 'breakout';
    $tableName = $_GET['tableName'];
    //$sql = "SELECT * FROM 'breakout'";
    //$result = mysqli_query($conn, $sql);
    $result = $conn->query("SELECT * FROM $tableName ORDER BY score DESC LIMIT 10");

    if(isset($_GET['output'])){

        if($tableName == 'breakout'){
            echo "<table id='leaderTable'><tr><th>Username</th><th>Score</th><th>Date</th></tr>";

            while($row = mysqli_fetch_array($result)){
                echo "<tr><td>" . $row['username'] . "</td><td>" . $row['score'] . "</td><td>" . $row['created'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            $temp = $_GET['temp'];
            while($row = mysqli_fetch_array($result)){
                // echo $row['username'] . "\t" . $row['score'] . "\t" . $row['created'] . "\n";
                if ($temp == "name"){
                    echo $row['username'] . "\n";
                } else if ($temp == "score"){
                    echo $row['score'] . "\n";
                } else if ($temp == "date"){
                    echo $row['created'] . "\n"; 
                }
            }
        }   
    }
}    
?>