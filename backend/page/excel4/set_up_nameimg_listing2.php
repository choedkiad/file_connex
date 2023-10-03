 
 <meta http-equiv="refresh" content="3;url=https://connex.in.th/backend/excel4/set_up_nameimg_listing2.php"/> 
 <?php


$servername = "localhost";
$username = "sirivala_connex1";
$password = "fORnIOTKuc";
$dbname = "sirivala_connex1";  


$date_1=date("Y-m-d H:i:s");
 
$date_random=date("YmdHis");

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

     $sql= "SELECT ex_list_listing_code FROM dbo_data_excel_listing where 
                check_point!='654' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code!=''  
                order by ex_list_listing_code DESC  LIMIT 15 "; 
     $result=$conn->query($sql);  
 

     if($result->num_rows > 0) {
        // output data of each row
         while($rs=$result->fetch_assoc()) {  


              $ex_list_listing_code=$rs['ex_list_listing_code'];


 
              $sql_list_img="SELECT  *   FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code'  order by listing_img_no ASC";
              $result_list_img = $conn->query($sql_list_img);  
              $rs_list_img=$result_list_img->fetch_assoc(); 

                 $listing_img_folder=$rs_list_img['listing_img_folder'];
                 $listing_img_name_check=$rs_list_img['listing_img_name'];
                 $listing_img_name_check=$rs_list_img['listing_img_name'];
                 $ex_list_listing_code=$rs_list_img['ex_list_listing_code'];
                 $listing_img_no=$rs_list_img['listing_img_no'];
                 $listing_img_id=$rs_list_img['listing_img_id'];
 
                 $listing_img_name_1=$rs_list_img['listing_img_name'];
                 $listing_img_webp=$rs_list_img['listing_img_webp'];

                  $sql_1= "UPDATE dbo_data_excel_listing SET 
                                  listing_img_name='$listing_img_name_1', 
                                  listing_img_webp='$listing_img_webp', 
                                  check_point='654'
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_1);   

                 
                echo  " CX : ".$ex_list_listing_code." ".$folder_webp." img_name : ".$listing_img_name_1." webp: ".$listing_img_webp."<br>";                  
 
         }

     }
       
?>