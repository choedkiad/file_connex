 
<meta http-equiv="refresh" content="3;url=https://connex.in.th/backend/excel4/up_copy_img_listing.php"/> 
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

     $sql= "SELECT ex_list_listing_code FROM dbo_data_excel_listing where listing_img_folder!='' and ex_list_close='0' order by ex_list_listing_code ASC  LIMIT 4  "; 
     $result=$conn->query($sql);  
 

     if($result->num_rows > 0) {
        // output data of each row
         while($rs=$result->fetch_assoc()) {  

              $ex_list_listing_code=$rs['ex_list_listing_code'];

             date_default_timezone_set('Asia/Bangkok');  
             mkdir("../../images/listing/$ex_list_listing_code"); 
             mkdir("../../images/listing/$ex_list_listing_code/mini_w300"); 
             mkdir("../../images/listing/$ex_list_listing_code/mini_w100"); 
             mkdir("../../images/listing/$ex_list_listing_code/no_watermark"); 

             mkdir("../../images/listing/$ex_list_listing_code/webp"); 
             mkdir("../../images/listing/$ex_list_listing_code/webp/mini_w100");
             mkdir("../../images/listing/$ex_list_listing_code/webp/mini_w500");

              
              echo $ex_list_listing_code."<br>";
          

              $sql_img="SELECT ex_list_listing_code,listing_img_folder,listing_img_name , listing_img_webp,listing_img_no 
                        FROM dbo_data_excel_listing_img 
                        WHERE ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC   ";
              $result_img=$conn->query($sql_img); 

              if($result_img->num_rows > 0) {
                while($rs_img=$result_img->fetch_assoc()) {  

                  $listing_img_folder=$rs_img['listing_img_folder'];
                  $listing_img_name=$rs_img['listing_img_name'];
                  $listing_img_webp=$rs_img['listing_img_webp'];

                    if($listing_img_folder!=''){                         
                           
                           $img_folder='../../images/listing/'.$ex_list_listing_code.'/'; 

                           copy($listing_img_folder."".$listing_img_name  , $img_folder."".$listing_img_name);
                           copy($listing_img_folder."no_watermark/".$listing_img_name  , $img_folder."no_watermark/".$listing_img_name);
                           copy($listing_img_folder."mini_w300/".$listing_img_name  , $img_folder."mini_w300/".$listing_img_name);
                           copy($listing_img_folder."mini_w100/".$listing_img_name  , $img_folder."mini_w100/".$listing_img_name);
                           copy($listing_img_folder."webp/".$listing_img_webp  , $img_folder."webp/".$listing_img_webp);
                           copy($listing_img_folder."webp/mini_w100/".$listing_img_webp  , $img_folder."webp/mini_w100/".$listing_img_webp);
                           copy($listing_img_folder."webp/mini_w500/".$listing_img_webp  , $img_folder."webp/mini_w500/".$listing_img_webp); 

                    } else{ 
                                      

                    } 
                }
              }  
 
                  $sql_1= "UPDATE dbo_data_excel_listing_img SET 
                                  listing_img_folder=''
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_1);   

                  $sql_2= "UPDATE dbo_data_excel_listing SET 
                                  listing_img_folder=''
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_2);   
 
                
 
                echo  " CX: ".$ex_list_listing_code." listing_img_folder : ".$listing_img_folder." listing_img_name : ".$listing_img_name."<br>";                 

 
 
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/
         }

     }
       
?>