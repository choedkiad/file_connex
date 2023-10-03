  
 <meta http-equiv="refresh" content="5;url=https://connex.in.th/backend/excel4/set_img_nowebp.php"/> 
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


 
              $sql_list_img="SELECT Distinct ex_list_listing_code  FROM dbo_data_excel_listing_img 
                            WHERE listing_img_webp='' and listing_img_del='0' and listing_img_remark='' and ex_list_listing_code!=''   order by listing_img_id DESC LIMIT 4 ";
              $result_list_img = $conn->query($sql_list_img);  
              while($rs_list_img=$result_list_img->fetch_assoc()){ $i++;  

                 $id=$rs_list_img['ex_list_listing_code']; 


                     $sql= "SELECT ex_list_listing_code FROM dbo_data_excel_listing 
                            WHERE  ex_list_close='0' and  ex_list_listing_code='$id' "; 
                     $result=$conn->query($sql);  

                    if($result->num_rows > 0) {

                       $rs=$result->fetch_assoc(); 

                       $ex_list_listing_code=$rs['ex_list_listing_code'];
                 
                       echo  $i." CX : ".$ex_list_listing_code."<br>"; 

                          $sql_1= "UPDATE dbo_data_excel_listing SET  
                                          check_point='1234'
                                          WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                          $conn->query($sql_1);  

 
                          $sql_img= "UPDATE dbo_data_excel_listing_img SET  
                                          listing_img_remark='0'
                                          WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                          $conn->query($sql_img);  

                    }else{

                       echo  $i." CX : ".$id." ถูกลบแล้ว <br>";  

  
                          $sql_img= "UPDATE dbo_data_excel_listing_img SET  
                                          listing_img_remark='1'
                                          WHERE ex_list_listing_code='".$id."'";
                          $conn->query($sql_img);  

                    }    
         

             } 
 
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/

             
  

       
?>