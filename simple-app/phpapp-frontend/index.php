<?php
    
    $host = "http://<IP>:5000/";
    $json = file_get_contents($host);
    
    $jsondata = json_decode($json);
    
    echo "User List";
    echo "----------------------------------------------------" . "<br>";

    foreach ($jsondata as $data) {
        echo "ID: " . $data->seq . "<br>";
        echo "FIRST NAME: " . $data->first . "<br>";
        echo "EMAIL: " . $data->email . "<br>";
        echo "---------------------------------" . "<br>";
    }
    echo "version 4";
?>
