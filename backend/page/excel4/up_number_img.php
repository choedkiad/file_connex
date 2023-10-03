 
<meta http-equiv="refresh" content="10;url=https://connex.in.th/backend/excel4/up_number_img.php"/>
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


     $sql="SELECT Distinct ex_list_listing_code FROM dbo_data_excel_listing_img where listing_img_check='0' order by listing_img_id ASC LIMIT 20 ";  
     $result = $conn->query($sql);

     if($result->num_rows > 0) {
        // output data of each row
         while($rs_img=$result->fetch_assoc()) {  


              $ex_list_listing_code=$rs_img['ex_list_listing_code'];
         
                $sql_img_2= "SELECT ex_list_listing_code FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code'  "; 
                $result_img_2=$conn->query($sql_img_2); 
                $num=$result_img_2->num_rows;
                       

                  $sql_1= "UPDATE dbo_data_excel_listing SET 
                                  ex_list_img_number='".$num."'
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_1);   

                  $sql_2= "UPDATE dbo_data_excel_listing_img SET 
                                  listing_img_check='1'
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_2);   
 
                echo  " CX: ".$ex_list_listing_code." จำนวนภาพ ".$num."<br>";                 

 
 
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/
         }

     }
       
?>