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

$num=0;

 //////////////////////// SET จุดเด่น ////////////////////////////////////

		 $sql="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='CX-05005'  order by ex_list_id ASC   " ;
         $result = $conn->query($sql); 
         while($rs_listing=$result->fetch_assoc()) { $num++;

         
         if($num<=5){

   /*
         $sql="SELECT * FROM dbo_data_excel_listing   order by ex_list_id ASC   " ;
         $result = $conn->query($sql); 
         while($rs=$result->fetch_assoc()) {  */
            
            $ex_list_listing_code=$rs_listing['ex_list_listing_code'];  
        	$ex_list_furniture=$rs_listing['ex_list_furniture'];  
        	$ex_list_strengths=$rs_listing['ex_list_strengths']; 

            $ex_list_heading_en=$rs_listing['ex_list_heading_en']; 
            $type_strengths_id=$rs_listing['type_strengths_id']; 


         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
         $ex_list_email_address=$rs_listing['ex_list_email_address'];
         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];
         $ex_list_project=$rs_listing['ex_list_project'];
         $ex_list_alley=$rs_listing['ex_list_alley'];
         $ex_list_road=$rs_listing['ex_list_road'];
         $districts=$rs_listing['ex_list_subdistrict'];
         $amphures=$rs_listing['ex_list_district'];
         $provinces=$rs_listing['ex_list_province'];
         $ex_list_train_station=$rs_listing['ex_list_train_station'];
         $ex_list_googlmap=$rs_listing['ex_list_googlmap'];
         $ex_list_number_buildings=$rs_listing['ex_list_number_buildings'];
         $ex_list_floor=$rs_listing['ex_list_floor'];
         $ex_list_view=$rs_listing['ex_list_view'];
         $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
         $ex_list_rai=$rs_listing['ex_list_rai'];
         $ex_list_ngan=$rs_listing['ex_list_ngan'];
         $ex_list_wa=$rs_listing['ex_list_wa'];
         $ex_list_house_number=$rs_listing['ex_list_house_number'];
         $ex_list_sqm=$rs_listing['ex_list_sqm'];
         $ex_list_view=$rs_listing['ex_list_view'];
         $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
         $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
         $ex_list_other_room=$rs_listing['ex_list_other_room'];
         $ex_list_parking=$rs_listing['ex_list_parking'];
         $ex_list_furniture=$rs_listing['ex_list_furniture'];
         $ex_list_pets=$rs_listing['ex_list_pets'];
         $ex_list_direction=$rs_listing['ex_list_direction'];
         $ex_list_strengths=$rs_listing['ex_list_strengths'];
         $ex_list_gdrive_th=$rs_listing['ex_list_gdrive_th'];
         $ex_list_gdrive_en=$rs_listing['ex_list_gdrive_en'];
         $ex_list_facilities=$rs_listing['ex_list_facilities'];
         $ex_list_nearby_places=$rs_listing['ex_list_nearby_places'];
         $ex_list_details=$rs_listing['ex_list_details'];
         $ex_list_heading=$rs_listing['ex_list_heading'];
         $ex_list_heading_en=$rs_listing['ex_list_heading_en'];
         $ex_list_price=$rs_listing['ex_list_price'];
         $ex_list_common_fee=$rs_listing['ex_list_common_fee'];
         $ex_list_contact=$rs_listing['ex_list_contact'];
         $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
         $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
         $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
         $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
         $ex_list_contact_name_2=$rs_listing['ex_list_contact_name_2']; 
         $ex_list_contact_tel_2=$rs_listing['ex_list_contact_tel_2'];
         $ex_list_contact_email_2=$rs_listing['ex_list_contact_email_2'];
         $ex_list_contact_lineid_2=$rs_listing['ex_list_contact_lineid_2'];
         $ex_list_remark=$rs_listing['ex_list_remark'];
         $zone_id=$rs_listing['zone_id'];
         $ex_list_googlmap=$rs_listing['ex_list_googlmap'];
         $type_strengths_id=$rs_listing['type_strengths_id'];
         $ex_list_room_id=$rs_listing['ex_list_room_id'];
         $ex_list_furniture_id=$rs_listing['ex_list_furniture_id'];


         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];


         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $project_id=$rs_listing['project_id'];

         $strengths_id=$rs_listing['type_strengths_id'];
         $ex_list_room_id=$rs_listing['ex_list_room_id'];
         $furniture_id=$rs_listing['type_furniture'];
         

         $id=$ex_list_listing_code;


             

                      $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no DESC  ";
                      $result_img= $conn->query($sql_img); 
                        // output data of each row
                      while($rs_img=$result_img->fetch_assoc()){

                            $img_folder=$rs_img['listing_img_folder']; 
                            $image_name=$rs_img['listing_img_name']; 

                              if($img_folder!=''){ 
                                       $img_folder=$img_folder;   
                                       $img_folders=$img_folder;
                              } else{ 
                                       $img_folder='../../images/listing/'.$id.'/'; $img_folders="";
                                       

                             }

                                 mkdir($img_folder."mini_w100");
                                 mkdir($img_folder."mini_w300");
                                 $img_folder_mini_w100=$img_folder."mini_w100/";
                                 $img_folder_mini_w300=$img_folder."mini_w300/";

                                    

                              $width=100; //*** Fix Width & Heigh (Autu caculate) ***//
                              $size=GetimageSize($img_folder."no_watermark/$image_name");
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($img_folder."no_watermark/$image_name");
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $images_fin = ImageCreateTrueColor($width, $height);
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              ImageJPEG($images_fin,$img_folder_mini_w100."$image_name");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);


                              $width=300; //*** Fix Width & Heigh (Autu caculate) ***//
                              $size=GetimageSize($img_folder."no_watermark/$image_name");
                              $height=round($width*$size[1]/$size[0]);
                              $images_orig = ImageCreateFromJPEG($img_folder."no_watermark/$image_name");
                              $photoX = ImagesX($images_orig);
                              $photoY = ImagesY($images_orig);
                              $images_fin = ImageCreateTrueColor($width, $height);
                              ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                              ImageJPEG($images_fin,$img_folder_mini_w300."$image_name");
                              ImageDestroy($images_orig);
                              ImageDestroy($images_fin);
                           

                           echo $image_name."-".$img_folder."<br>";

                }


           }

        }





?>