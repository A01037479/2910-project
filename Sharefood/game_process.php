<?php
require_once('lib/connect.php');
require_once('config/config.php');

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
?>