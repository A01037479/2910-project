
<?php
require_once('lib/connect.php');
require_once('config/config.php');

$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

$methodType = $_SERVER['REQUEST_METHOD'];

If ($methodType === 'POST'){
    if(isset($_POST['username'], $_POST['score'])){

        $tableName = htmlspecialchars($_POST['tableName']);
        $username = htmlspecialchars($_POST['username']);
        $score = htmlspecialchars($_POST['score']);

        $sql = "INSERT INTO $tableName (username, score, created) VALUES ('$username', '$score', CURDATE())";
        mysqli_query($conn, $sql);
            
    }
}

if($methodType === 'GET'){

    $tableName = $_GET['tableName'];
    //$sql = "SELECT * FROM 'breakout'";
    //$result = mysqli_query($conn, $sql);
    $result = $conn->query("SELECT * FROM $tableName ORDER BY score DESC LIMIT 10");

    if(isset($_GET['output'])){    

        if($tableName == 'breakout'){
            echo "<table id='leaderTable'><tr><th>Username</th><th>Score</th><th>Date</th></tr>";

            while($row = mysqli_fetch_array($result)){
                
                $escaped = array(
                    'username' => htmlspecialchars($row['username']),
                    'score' => htmlspecialchars($row['score']),
                );

                echo "<tr><td>" . $escaped['username'] . "</td><td>" . $escaped['score'] . "</td><td>" . $row['created'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            $temp = mysqli_real_escape_string($conn, $_GET['temp']);
            while($row = mysqli_fetch_array($result)){

                $escaped = array(
                    'username' => htmlspecialchars($row['username']),
                    'score' => htmlspecialchars($row['score']),
                );
                
                if ($temp == "name"){
                    echo $escaped['username'] . "\n";
                } else if ($temp == "score"){
                    echo $escaped['score'] . "\n";
                } else if ($temp == "date"){
                    echo $row['created'] . "\n"; 
                }
            }
        }   
    }
}    
?>