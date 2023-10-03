 
 <meta http-equiv="refresh" content="10;url=https://connex.in.th/backend/excel4/up_log_listing.php"/> 
 <?php


$servername = "localhost";
$username = "sirivala_connex1";
$password = "fORnIOTKuc";
$dbname = "sirivala_connex1";  


$date_1=date("Y-m-d H:i:s");
  

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

     $sql= "SELECT * FROM dbo_data_excel_listing where check_point!='7777'  and ex_list_close='0' order by ex_list_date_update ASC  LIMIT 50  "; 
     $result=$conn->query($sql);  
 

     if($result->num_rows > 0) {
        // output data of each row
         while($rs_listing=$result->fetch_assoc()) {  
 
         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
         $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
         $ex_list_email_address=$rs_listing['ex_list_email_address'];
         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];
         $project_id=$rs_listing['project_id'];
         $ex_list_alley=$rs_listing['ex_list_alley'];
         $ex_list_road=$rs_listing['ex_list_road'];
         $ex_list_subdistrict=$rs_listing['ex_list_subdistrict'];
         $ex_list_district=$rs_listing['ex_list_district'];
         $ex_list_province=$rs_listing['ex_list_province'];
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
         $ex_list_details_en=$rs_listing['ex_list_details_en'];
         $ex_list_heading=$rs_listing['ex_list_heading'];
         $ex_list_heading_en=$rs_listing['ex_list_heading_en'];
         $ex_list_price=$rs_listing['ex_list_price'];
         $ex_list_common_fee=$rs_listing['ex_list_common_fee'];
         $ex_list_contact=$rs_listing['ex_list_contact'];
         $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
         $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
         $ex_list_contact_tel1_2=$rs_listing['ex_list_contact_tel1_2'];
         $ex_list_contact_tel1_3=$rs_listing['ex_list_contact_tel1_3'];
         $ex_list_contact_tel1_4=$rs_listing['ex_list_contact_tel1_4']; 
         $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
         $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
         $ex_list_contact_fb=$rs_listing['ex_list_contact_fb'];
         $ex_list_contact_whatsapp=$rs_listing['ex_list_contact_whatsapp'];
         $ex_list_contact_name_2=$rs_listing['ex_list_contact_name_2']; 
         $ex_list_contact_tel_2=$rs_listing['ex_list_contact_tel_2'];
         $ex_list_contact_tel2_2=$rs_listing['ex_list_contact_tel2_2'];
         $ex_list_contact_tel2_3=$rs_listing['ex_list_contact_tel2_3'];
         $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4'];
         $ex_list_contact_email_2=$rs_listing['ex_list_contact_email_2'];
         $ex_list_contact_lineid_2=$rs_listing['ex_list_contact_lineid_2'];
         $ex_list_remark=$rs_listing['ex_list_remark'];
         $ex_list_contact_fb_2=$rs_listing['ex_list_contact_fb_2'];
         $ex_list_contact_whatsapp_2=$rs_listing['ex_list_contact_whatsapp_2'];
         $zone_id=$rs_listing['zone_id'];
         $ex_list_googlmap=$rs_listing['ex_list_googlmap'];
         $type_strengths_id=$rs_listing['type_strengths_id'];
         $ex_list_room_id=$rs_listing['ex_list_room_id'];
         $ex_list_furniture_id=$rs_listing['ex_list_furniture_id'];
         $ex_list_other=$rs_listing['ex_list_other'];
         $ex_list_video=$rs_listing['ex_list_video'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
         $ex_list_living_date=$rs_listing['ex_list_living_date'];
         $ex_list_living=$rs_listing['ex_list_living']; 
         $ex_list_common_facilities=$rs_listing['ex_list_common_facilities']; 
         $ex_list_nearby_places_en=$rs_listing['ex_list_nearby_places_en'];
         $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
         $ex_list_proppit_date=$rs_listing['ex_list_proppit_date'];
         $ex_list_proppit=$rs_listing['ex_list_proppit'];
         $ex_list_boostpost_date=$rs_listing['ex_list_boostpost_date'];
         $ex_list_premium_date=$rs_listing['ex_list_premium_date'];
         $ex_list_public_date=$rs_listing['ex_list_public_date'];
         $ex_list_bargain_date=$rs_listing['ex_list_bargain_date'];
         $ex_list_rent_till_note=$rs_listing['ex_list_rent_till_note'];
         $ex_list_no_images=$rs_listing['ex_list_no_images'];
         $ex_list_pm_waiting=$rs_listing['ex_list_pm_waiting'];
         $ex_list_img_score=$rs_listing['ex_list_img_score'];
         $ex_list_listing_score=$rs_listing['ex_list_listing_score'];

         $ex_list_img_number=$rs_listing['ex_list_img_number'];

         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];
 
         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
        
         $ex_list_bargain=$rs_listing['ex_list_bargain'];
         $ex_list_pm_status=$rs_listing['ex_list_pm_status'];
         $ex_list_contact=$rs_listing['ex_list_contact'];
 

         $sql_log_number="SELECT * FROM dbo_log_listing where ex_list_listing_code='$ex_list_listing_code'  order by create_date  DESC LIMIT 1 "; 
         $result_log_number=$conn->query($sql_log_number);
         //$count_log_number=$result_log_number->num_rows;   
         $rs_log_number=$result_log_number->fetch_assoc();

         $log_number=$rs_log_number['log_number'];

          if($log_number!=''){
                  $count_log_number=$log_number+1;
          }else{
                  $count_log_number='1';
          }
    

                if($count_log_number=='1'){
 
                     $sql_log_listing="INSERT INTO dbo_log_listing  ( ex_list_listing_code , listing_name , listing_name_en ,contract_type , listing_type ,deal_type   ,house_number ,alley ,road , sqm , rai , ngan , wa , wa_count , parking , bedroom , bathroom , heading , heading_en , other_room , floor , total_floors  , pets , direction , type_strengths_id  , nearby_places , nearby_places_en , facilities ,  facilities_en , details , details_en , subdistrict , district , province , station_id , zone_id , project_id , latitude , longitude , video , number_buildings  , view , price  , common_fee, list_contact , furniture_id , contact_name  , contact_tel , contact_tel1_2 , contact_tel1_3 , contact_tel1_4 , contact_email , contact_lineid , contact_whatsapp , contact_fb , contact_name_2 , contact_tel_2 , contact_tel2_2 , contact_tel2_3 , contact_tel2_4 , contact_lineid_2 , contact_email_2 , contact_whatsapp_2 , contact_fb_2 , listing_status ,rent_till , room_id , remark , listing_score , img_score , img_number , list_bargain , bargain_date , pm_status , pm_waiting , no_images , public , public_date , premium , premium_date , boostpost , boostpost_date , proppit ,  proppit_date , living , living_date ,  create_date , log_number , USER_ID   )
                       VALUES ('$ex_list_listing_code','$ex_list_listing_name','$ex_list_listing_name_en','$ex_list_contract_type' , '$ex_list_listing_type','$ex_list_deal_type','$ex_list_house_number','$ex_list_alley','$ex_list_road','$ex_list_sqm' , '$ex_list_rai' , '$ex_list_ngan' , '$ex_list_wa' , '$ex_list_wa_count' , '$ex_list_parking','$ex_list_bedroom','$ex_list_bathroom' , '$ex_list_heading' , '$ex_list_heading_en' ,'$ex_list_other_room','$ex_list_floor' , '$ex_list_total_floors','$ex_list_pets','$ex_list_direction' , '$type_strengths_id' , '$ex_list_nearby_places' , '$ex_list_nearby_places_en' , '$ex_list_facilities' , '$ex_list_common_facilities' ,'$ex_list_details' , '$ex_list_details_en' ,'$ex_list_subdistrict','$ex_list_district','$ex_list_province','$ex_list_train_station' , '$zone_id' , '$project_id' , '$ex_list_latitude' , '$ex_list_longitude' , '$ex_list_video' , '$ex_list_number_buildings'  , '$ex_list_view' , '$ex_list_price','$ex_list_common_fee','$ex_list_contact', '$ex_list_furniture_id' ,'$ex_list_contact_name','$ex_list_contact_tel' ,'$ex_list_contact_tel1_2' ,'$ex_list_contact_tel1_3' ,'$ex_list_contact_tel1_4' ,'$ex_list_contact_email' ,'$ex_list_contact_lineid' ,'$ex_list_contact_fb' , '$ex_list_contact_whatsapp' , '$ex_list_contact_name_2' , '$ex_list_contact_tel_2' , '$ex_list_contact_tel2_2' , '$ex_list_contact_tel2_3' , '$ex_list_contact_tel2_4' , '$ex_list_contact_lineid_2' , '$ex_list_contact_email_2' , '$ex_list_contact_whatsapp_2' , '$ex_list_contact_fb_2' , '$ex_list_listing_status','$ex_list_rent_till ', '$ex_list_room_id' , '$ex_list_remark' , '$ex_list_listing_score' , '$ex_list_img_score' , '$ex_list_img_number' , '$ex_list_bargain'  , '$ex_list_bargain_date' , '$ex_list_pm_status' , 'ex_list_pm_waiting' , '$ex_list_no_images' , '$ex_list_public' , '$ex_list_public_date' , '$ex_list_premium' , '$ex_list_premium_date' , '$ex_list_boostpost' , '$ex_list_boostpost_date' , '$ex_list_proppit'  , '$ex_list_proppit_date'  , '$ex_list_living' , '$ex_list_living_date' , '$date_1' , '$count_log_number' , '$ex_list_contact'   )"; 
                     mysqli_query($conn, $sql_log_listing);  
 

 
                    echo  "Up CX: ".$ex_list_listing_code." : ".$ex_list_heading." House Number : ".$ex_list_house_number."<br>";

                }else{

                    echo  "None CX: ".$ex_list_listing_code." : ".$ex_list_heading." House Number : ".$ex_list_house_number."<br>";       
                }                
 
                     $sql_number= "UPDATE dbo_data_excel_listing SET 
                                  check_point='7777'
                                  WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                    $conn->query($sql_number); 
                
 
           
     /*
          }else{  $no1++; 

                      echo   $listing_code." Project : ".$project."<br>";
         }*/
         }

     }
       
?>