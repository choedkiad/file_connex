 
 <meta http-equiv="refresh" content="5;url=https://connex.in.th/backend/excel4/set_project_jpgtowebp.php"/> 
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

     $sql= "SELECT project_id  FROM type_project where  check_project!='188'   
            order by project_id ASC  LIMIT 30 "; 
     $result=$conn->query($sql);  
 

     if($result->num_rows > 0) {
        // output data of each row
         while($rs=$result->fetch_assoc()) {  


              $project_id=$rs['project_id'];

              $i=0;
 
              $sql_list_img="SELECT  *   FROM type_project_img where project_id='$project_id'  order by project_img_no ASC";
              $result_list_img = $conn->query($sql_list_img);  

              if($result_list_img->num_rows > 0) {

                while($rs_list_img=$result_list_img->fetch_assoc()){ $i++; 

                       $project_img_id=$rs_list_img['project_img_id'];
                       $project_img_name=$rs_list_img['project_img_name'];
                       $project_img_webp=$rs_list_img['project_img_webp']; 
                       $project_img_name_check=$rs_list_img['project_img_name'];

                       if($i==1){

                           $project_img_name_1=$rs_list_img['project_img_name']; 
                           $project_img_webp_1=$rs_list_img['project_img_webp']; 
                       }
        /*
                    $listing_folder="../../images/project/".$project_id."/"; 
                    $listing_img_name="../../images/project/".$project_id."/".$project_img_name_check;     

                    mkdir($listing_folder."webp/");
                    mkdir($listing_folder."webp/mini_w500/");
                    mkdir($listing_folder."webp/mini_w100/");
                    
                     $img_folder_mini_w100=$listing_folder."mini_w100/";
                     $img_folder_mini_w300=$listing_folder."mini_w300/";


                    $name_webp=str_replace(".jpg",".webp",$project_img_name); 
                    $name_webp=str_replace(".JPG",".webp",$name_webp);   
                    $name_webp=str_replace(".JPEG",".webp",$name_webp); 
                    $name_webp=str_replace(".jpeg",".webp",$name_webp);
                    $name_webp=str_replace(".png",".webp",$name_webp);   
                    $name_webp=str_replace(".PNG",".webp",$name_webp);    


                    $folder_webp=$listing_folder."webp/".$name_webp; 

                    $file=$listing_img_name;
                    $image=  imagecreatefromjpeg($file);
                    ob_start();
                    imagejpeg($image,NULL,100);
                    $cont=  ob_get_contents();
                    ob_end_clean();
                    imagedestroy($image);
                    $content =  imagecreatefromstring($cont);
                    imagewebp($content,$folder_webp);
                    imagedestroy($content);
        
                    $folder_webp=$listing_folder."webp/mini_w500/".$name_webp; 

                    $file=$img_folder_mini_w300.$project_img_name_check;
                    $image=  imagecreatefromjpeg($file);
                    ob_start();
                    imagejpeg($image,NULL,100);
                    $cont=  ob_get_contents();
                    ob_end_clean();
                    imagedestroy($image);
                    $content =  imagecreatefromstring($cont);
                    imagewebp($content,$folder_webp);
                    imagedestroy($content);
         
                    $folder_webp=$listing_folder."webp/mini_w100/".$name_webp; 

                    $file=$img_folder_mini_w100.$project_img_name_check;
                    $image=  imagecreatefromjpeg($file);
                    ob_start();
                    imagejpeg($image,NULL,100);
                    $cont=  ob_get_contents();
                    ob_end_clean();
                    imagedestroy($image);
                    $content =  imagecreatefromstring($cont);
                    imagewebp($content,$folder_webp);
                    imagedestroy($content);*/


                    $name_webp=str_replace(".jpg",".webp",$project_img_name); 
                    $name_webp=str_replace(".JPG",".webp",$name_webp);   
                    $name_webp=str_replace(".JPEG",".webp",$name_webp); 
                    $name_webp=str_replace(".jpeg",".webp",$name_webp);
                    $name_webp=str_replace(".png",".webp",$name_webp);   
                    $name_webp=str_replace(".PNG",".webp",$name_webp);  
 
                        $sql_2= "UPDATE type_project_img SET  
                                        project_img_webp='$name_webp'
                                        WHERE project_img_id='".$project_img_id."'";
                        $conn->query($sql_2); 
      
       
                        $sql_1= "UPDATE type_project SET  
                                        project_img_name='$project_img_name_1', 
                                        project_img_webp='$project_img_webp_1',
                                        check_project='188'
                                        WHERE project_id ='".$project_id."'";
                        $conn->query($sql_1);   

                       
                      echo  " Project : ".$project_id." img_name : ".$project_img_name." webp: ".$name_webp."<br>";                 

                   } 

  
 

            }

                      $sql_1= "UPDATE type_project SET  
                                      check_project='188'
                                      WHERE project_id ='".$project_id."'";
                      $conn->query($sql_1);  

                    echo  " Project : ".$project_id."  ไม่มีภาพ <br>";
 
         }

     }
       
?>