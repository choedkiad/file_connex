<?php


$servername = "localhost";
$username = "sirivala_connex1";
$password = "fORnIOTKuc";
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

$i=0; $i2=0;


		     $sql="SELECT * FROM dbo_data_excel_listing where ex_list_email_address!='' order by ex_list_listing_code ASC   " ;
         $result = $conn->query($sql);

        while($rs_listing=$result->fetch_assoc()) { $i++;

          $ex_list_email_address=$rs_listing['ex_list_email_address'];
        	$ex_list_listing_code=$rs_listing['ex_list_listing_code'];

       

 
               $sql = "UPDATE dbo_data_excel_listing SET  
                               ex_list_contact='".$ex_list_email_address."'   
                            WHERE ex_list_listing_code='".$ex_list_listing_code."' "; 
                mysqli_query($conn, $sql);  

         $sql_re="SELECT * FROM dbo_register where register_id=$ex_list_email_address order by register_id  ASC   " ;
         $result_re= $conn->query($sql_re); 
         $rs_res=$result_re->fetch_assoc();

         $register_name=$rs_res['register_name'];
         $register_email=$rs_res['register_email'];
          

                echo  $i." ID : ".$ex_list_listing_code." -- ".$ex_list_email_address." ".$register_name." ".$register_email."<br>";

  

        }






?>
