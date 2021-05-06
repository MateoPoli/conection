<?php

$servername = "localhost";
$username= "root";
$password="";

// REPLACE with your Database name
$dbname = "tutorial";

$api_key= $sensor = $location = $value1 = $value2 = $distance = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$api_key = test_input($_POST["api_key"]);
        $sensor = test_input($_POST["chipid"]);
        $location = test_input($_POST["temperatura"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO tabla(id, chipid, fecha, temperatura) 
        VALUES(NULL,'$sensor', CURRENT_TIMESTAMP, '$location')";
       
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
 

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
