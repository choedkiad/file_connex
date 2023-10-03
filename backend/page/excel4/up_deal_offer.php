  
 <?php


$servername = "localhost";
$username = "sirivala_connex1";
$password = "fORnIOTKuc";
$dbname = "sirivala_connex1";  


$date_1=date("Y-m-d H:i:s");
 
 isset( $_SESSION['USER_ID'] ) ? $USER_ID = $_SESSION['USER_ID'] : $USER_ID = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

        date_default_timezone_set('Asia/Bangkok');

        $todate=date("Y-m-d H:i:s");

     $sql= "SELECT create_deal_code  FROM dbo_create_deal where create_deal_create>='2023-05-26 00:00:00' and create_deal_create<='2023-05-31 23:59:59'  order by create_deal_code  ASC    "; 
     $result=$conn->query($sql);  
 

     if($result->num_rows > 0) {
        // output data of each row
         while($rs=$result->fetch_assoc()) {  

              
              $create_deal_code=$rs['create_deal_code'];


              $sql_offer= "SELECT auto_offer  FROM dbo_subdeal where auto_offer='1' and  create_deal_code='$create_deal_code'    "; 
              $result_offer=$conn->query($sql_offer); 
              $count_num=$result_offer->num_rows; 
        
       
 
               $sql_1= "UPDATE dbo_create_deal SET  
                        auto_offer='".$count_num."'
                        WHERE create_deal_code='".$create_deal_code."'";
               $conn->query($sql_1);   
 
 
                echo  " DEAL_CODE : ".$create_deal_code." จำนวน : ".$count_num."<br>";                 

 
 
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/
         }

     }
       
?>