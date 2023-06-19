<?php

require '../config.php';

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM airline";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?>                                 