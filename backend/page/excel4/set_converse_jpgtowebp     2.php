 
 <meta http-equiv="refresh" content="5;url=https://connex.in.th/backend/excel4/set_converse_jpgtowebp2.php"/> 
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

     $sql= "SELECT ex_list_listing_code FROM dbo_data_excel_listing 
           where check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-52916' or 
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-54815' or 
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-52917' or 
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-55741' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-55992' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-55742' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-55730' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-54798' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-05655' or
                 check_point!='888' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-55229' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-55123' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-55121' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-55993' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-54809' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-01710' or
                 check_point!='999' and ex_list_img_number!='0' and ex_list_close='0' and ex_list_listing_code='CX-55171' 




           order by ex_list_listing_code ASC  LIMIT 1 "; 
     $result=$conn->query($sql);  
 

     if($result->num_rows > 0) {
        // output data of each row
         while($rs=$result->fetch_assoc()) {  


              $ex_list_listing_code=$rs['ex_list_listing_code'];


 
              $sql_list_img="SELECT  *   FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code'  order by listing_img_no ASC";
              $result_list_img = $conn->query($sql_list_img);  
              while($rs_list_img=$result_list_img->fetch_assoc()){ $i++; 

                 $listing_img_folder=$rs_list_img['listing_img_folder'];
                 $listing_img_name_check=$rs_list_img['listing_img_name'];
                 $ex_list_listing_code=$rs_list_img['ex_list_listing_code'];
                 $listing_img_no=$rs_list_img['listing_img_no'];
                 $listing_img_id=$rs_list_img['listing_img_id'];

                 if($listing_img_folder!=''){   
                       $listing_img_name=$listing_img_folder.$listing_img_name_check;
                       $listing_folder=$listing_img_folder;
                 }else{   
                       $listing_img_name="../../images/listing/".$ex_list_listing_code."/".$listing_img_name_check; 
                       $listing_folder="../../images/listing/".$ex_list_listing_code."/"; 
                 }      

              mkdir($listing_folder."webp/");
              mkdir($listing_folder."webp/mini_w500/");
              mkdir($listing_folder."webp/mini_w100/");

              mkdir($listing_folder."mini_w100/");
              mkdir($listing_folder."mini_w300/");

                                               $img_folder_mini_w100=$listing_folder."mini_w100/";
                                               $img_folder_mini_w300=$listing_folder."mini_w300/";
  
                                            $width=100; //*** Fix Width & Heigh (Autu caculate) ***//
                                            $size=GetimageSize($listing_folder."$listing_img_name_check");
                                            $height=round($width*$size[1]/$size[0]);
                                            $images_orig = ImageCreateFromJPEG($listing_folder."$listing_img_name_check");
                                            $photoX = ImagesX($images_orig);
                                            $photoY = ImagesY($images_orig);
                                            $images_fin = ImageCreateTrueColor($width, $height);
                                            ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                                            ImageJPEG($images_fin,$img_folder_mini_w100."$listing_img_name_check");
                                            ImageDestroy($images_orig);
                                            ImageDestroy($images_fin);


                                            $width=500; //*** Fix Width & Heigh (Autu caculate) ***//
                                            $size=GetimageSize($listing_folder."$listing_img_name_check");
                                            $height=round($width*$size[1]/$size[0]);
                                            $images_orig = ImageCreateFromJPEG($listing_folder."$listing_img_name_check");
                                            $photoX = ImagesX($images_orig);
                                            $photoY = ImagesY($images_orig);
                                            $images_fin = ImageCreateTrueColor($width, $height);
                                            ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                                            ImageJPEG($images_fin,$img_folder_mini_w300."$listing_img_name_check");
                                            ImageDestroy($images_orig);
                                            ImageDestroy($images_fin);

              $name_webp=str_replace(".jpg",".webp",$listing_img_name_check); 
              $name_webp=str_replace(".JPG",".webp",$name_webp);   
              $name_webp=str_replace(".JPEG",".webp",$name_webp); 
              $name_webp=str_replace(".png",".webp",$name_webp);

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

              $file=$img_folder_mini_w300.$listing_img_name_check;
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

              $file=$img_folder_mini_w100.$listing_img_name_check;
              $image=  imagecreatefromjpeg($file);
              ob_start();
              imagejpeg($image,NULL,100);
              $cont=  ob_get_contents();
              ob_end_clean();
              imagedestroy($image);
              $content =  imagecreatefromstring($cont);
              imagewebp($content,$folder_webp);
              imagedestroy($content);

                  $sql_2= "UPDATE dbo_data_excel_listing_img SET  
                                  listing_img_webp='$name_webp'
                                  WHERE listing_img_id='".$listing_img_id."'";
                  $conn->query($sql_2); 


                  $sql_1= "UPDATE dbo_data_excel_listing SET  
                                  check_point='999'
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_1);   

                 
                echo  " CX : ".$ex_list_listing_code." img_folder : ".$folder_webp." img_name : ".$listing_img_name." webp: ".$name_webp."<br>";                 

             } 
 
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/

                  $sql_1= "UPDATE dbo_data_excel_listing SET  
                                  check_point='999'
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                  $conn->query($sql_1);  
                   

                echo  " CX : ".$ex_list_listing_code."  ไม่มีภาพ <br>";
 
         }

     }
       
?>