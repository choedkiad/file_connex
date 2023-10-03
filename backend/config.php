 <?php
 /*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sirivala_connex1";  */

const BASE_URL = 'https://connex.in.th';
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sirivala_connex1";  

 
 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

date_default_timezone_set('Asia/Bangkok');


/*
session_start();

ini_set('session.cookie_lifetime',43200);
ini_set('session.gc_maxlifetime',43200);
ini_set('session.cache_expire',43200);
 
@session_start();
*/


?> 