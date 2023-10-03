 
<meta http-equiv="refresh" content="10;url=https://connex.in.th/backend/excel4/up_img_listing.php"/>
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

     $sql= "SELECT ex_list_listing_code FROM dbo_data_excel_listing where listing_img_name='' order by ex_list_date_update DESC  LIMIT 50  "; 
     $result=$conn->query($sql);  
 

     if($result->num_rows > 0) {
        // output data of each row
         while($rs=$result->fetch_assoc()) {  


              $ex_list_listing_code=$rs['ex_list_listing_code'];
          

              $sql_img="SELECT ex_list_listing_code,listing_img_folder,listing_img_name,listing_img_no 
                        FROM dbo_data_excel_listing_img 
                        WHERE ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC LIMIT 1  ";
              $result_img=$conn->query($sql_img); 
              $rs_img=$result_img->fetch_assoc();

              if($result_img->num_rows > 0) {

                  $listing_img_folder=$rs_img['listing_img_folder'];
                  $listing_img_name=$rs_img['listing_img_name'];
              }else{

                  $listing_img_folder='';
                  $listing_img_name='no';

              }              

                  $sql_1= "UPDATE dbo_data_excel_listing SET 
                                  listing_img_folder='".$listing_img_folder."',
                                  listing_img_name='".$listing_img_name."'
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_1);   

                
 
                echo  " CX: ".$ex_list_listing_code." listing_img_folder : ".$listing_img_folder." listing_img_name : ".$listing_img_name."<br>";                 

 
 
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/
         }

     }
       
?>