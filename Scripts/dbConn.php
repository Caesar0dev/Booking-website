<?php
//setting variables used to connect to the database
$host = "localhost";
$username = "shaneluc_admin";
$password = "lucys123";
$dbname = "shaneluc_garageBooking";
//establishing connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

//checks the db connection and kills it if any errors present
if ($mysqli->connect_error) {
    exit('There was an error connecting to the database');
}


