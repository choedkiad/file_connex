<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>


<div class="loader"></div>


<?php


  session_start();  

  require '../config.php';

   /*
 ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL); */


date_default_timezone_set('Asia/Bangkok');

   $date_start=$_GET['date_start'];
   $date_end=$_GET['date_end'];

   if($date_start!=''){
 
 /*
      $month=substr($date_start,5 , 2);
      $year=substr($date_start,0 , 4 ); 
      $date=substr($date_start,8, 2 );
*/
      $date_start_check=$date_start." 00:00:00";
      $date_end_check=$date_end." 23:59:59";
  
/** Error reporting */
/*
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
date_default_timezone_set('Asia/Bangkok'); */

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Create a first sheet, representing sales data
$objPHPExcel->setActiveSheetIndex(0);

 

 $objPHPExcel->getActiveSheet()->setCellValue('A1','*Action');
 $objPHPExcel->getActiveSheet()->setCellValue('B1','*SKU(รหัสสำหรับ เอาไว้อ้างอิงสำหรับเพิ่ม หรือแก้ไข)');
 $objPHPExcel->getActiveSheet()->setCellValue('C1','*building_type');
 $objPHPExcel->getActiveSheet()->setCellValue('D1','*PostType');
 $objPHPExcel->getActiveSheet()->setCellValue('E1','*PostFrom');
 $objPHPExcel->getActiveSheet()->setCellValue('F1','PostAcceptAgent');
 $objPHPExcel->getActiveSheet()->setCellValue('G1','*Zone ID');
 $objPHPExcel->getActiveSheet()->setCellValue('H1','*Project ID');
 $objPHPExcel->getActiveSheet()->setCellValue('I1','*Title TH');
 $objPHPExcel->getActiveSheet()->setCellValue('J1','*Content TH');
 $objPHPExcel->getActiveSheet()->setCellValue('K1','Title EN');
 $objPHPExcel->getActiveSheet()->setCellValue('L1','Content EN');
 $objPHPExcel->getActiveSheet()->setCellValue('M1','*Price');
 $objPHPExcel->getActiveSheet()->setCellValue('N1','AreaSize(สำหรับคอนโด,บ้าน)');
 $objPHPExcel->getActiveSheet()->setCellValue('O1','Area_rai(*จำนวนไร่ สำหรับที่ดิน)');
 $objPHPExcel->getActiveSheet()->setCellValue('P1','Area_ngan(จำนวนงาน สำหรับที่ดิน)');
 $objPHPExcel->getActiveSheet()->setCellValue('Q1','Area_wa(จำนวนวา สำหรับที่ดิน)'); 
 $objPHPExcel->getActiveSheet()->setCellValue('R1','Floor(*ชั้นที่ จำนวนชั้น สำหรับคอนโด,บ้าน)');
 $objPHPExcel->getActiveSheet()->setCellValue('S1','Room(*จำนวนห้อง สำหรับคอนโด,บ้าน)');
 $objPHPExcel->getActiveSheet()->setCellValue('T1','Bathroom(*จำนวนห้องน้ำ สำหรับคอนโด,บ้าน)');
 $objPHPExcel->getActiveSheet()->setCellValue('U1','pet_allowed(อนุญาต เลี้ยงสัตว์)');
 $objPHPExcel->getActiveSheet()->setCellValue('V1','fq(โควต้าต่างชาติ)');
 $objPHPExcel->getActiveSheet()->setCellValue('W1','youtube(ใส่ link youtube)');
 $objPHPExcel->getActiveSheet()->setCellValue('X1','latitude (บ้าน/ที่ดิน เท่านั้น)');
 $objPHPExcel->getActiveSheet()->setCellValue('Y1','longitude (บ้าน/ที่ดิน เท่านั้น)');
 $objPHPExcel->getActiveSheet()->setCellValue('Z1','Picture1(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AA1','Picture2(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AB1','Picture3(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AC1','Picture4(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AD1','Picture5(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AE1','Picture6(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AG1','Picture7(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AF1','Picture8(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AH1','Picture9(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AI1','Picture10(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AJ1','Picture11(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AK1','Picture12(URL รูปภาพ)');
 $objPHPExcel->getActiveSheet()->setCellValue('AL1','Useful space[พื้นที่ใช้สอย]');
 $objPHPExcel->getActiveSheet()->setCellValue('AM1','Income Avg./Year');
 $objPHPExcel->getActiveSheet()->setCellValue('AN1','Email');
 $objPHPExcel->getActiveSheet()->setCellValue('AO1','Line ID');
 $objPHPExcel->getActiveSheet()->setCellValue('AP1','Tel');
 $objPHPExcel->getActiveSheet()->setCellValue('AQ1','คะแนนภาพประกอบ');

                                         // Check connection
 
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }

         $no=0;  $no2=1;

         $sql="SELECT * FROM dbo_data_excel_listing where  ex_list_living_date >='$date_start_check' and ex_list_living_date<='$date_end_check'  and ex_list_living='1' order by ex_list_living_date  DESC";  
         $result = $conn->query($sql);



         if($result->num_rows > 0) {
          // output data of each row
             while($rs_listing=$result->fetch_assoc()) { $no++;  $no2++;
         
              
               $ex_list_project="";
               $address="";
               $ex_list_googlmap="";
               $ex_list_train_station="";
               $ex_list_total_floors_th="";
               $ex_list_floor="";
               $ex_list_sqm_th="";
               $ex_list_bedroom_th="";
               $ex_list_bathroom_th="";
               $ex_list_parking="";
               $ex_list_total_floors_en="";
               $ex_list_floor="";
               $ex_list_sqm_en="";
               $ex_list_bedroom_en="";
               $ex_list_bathroom_en="";
               $ex_list_other_room="";
               $ex_list_direction="";
               $ex_list_heading="";
               $ex_list_sqm="";
               $ex_list_heading_en="";
               $detail_en="";
               $ex_list_zone="";
               $ex_list_img_score_name="";
               $img_list1="";
               $img_list2="";
               $img_list3="";
               $img_list4="";
               $img_list5="";
               $img_list6="";
               $img_list7="";
               $img_list8="";
               $img_list9="";
               $img_list10="";
               $img_list11="";
               $img_list12="";
 
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

         $ex_list_common_facilities=$rs_listing['ex_list_common_facilities'];  //สิ่งอำนวยความสะดวก เวอร์ชั่น EN
         $ex_list_nearby_places_en=$rs_listing['ex_list_nearby_places_en']; //สถานที่ใกล้เคียง เวอร์ชั่น EN 
         $ex_list_details=$rs_listing['ex_list_details'];
         $ex_list_details_en=$rs_listing['ex_list_details_en'];
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
         $ex_list_video=$rs_listing['ex_list_video'];

         $ex_list_latitude=$rs_listing['ex_list_latitude'];
         $ex_list_longitude=$rs_listing['ex_list_longitude'];

         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_boostpost=$rs_listing['ex_list_boostpost']; 

         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $project_id=$rs_listing['project_id'];
         $ex_list_img_score=$rs_listing['ex_list_img_score'];
         $ex_list_no_images=$rs_listing['ex_list_no_images'];
      
         if($ex_list_img_score=='1'){ 
                $ex_list_img_score_name='(แย่)';   $stauts_img_color="#ff0000";
         }else if($ex_list_img_score=='2'){
                $ex_list_img_score_name='(ปานกลาง)';  $stauts_img_color="#ffa200";
         }else if($ex_list_img_score=='3'){
                $ex_list_img_score_name='(ดี)';  $stauts_img_color="#42d700";
         }else if($ex_list_img_score=='4'){
                $ex_list_img_score_name='(ดีมาก)';  $stauts_img_color="#42d700";
         }else{
                $ex_list_img_score_name='ไม่ระบุ';   $stauts_img_color="#000";
         } 
          
         




            $no5=0;

     if($ex_list_no_images!='1'){ // เช็คว่าโพสต์ภาพได้

            $sql_list_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC";
            $result_list_img = $conn->query($sql_list_img);  
            while($rs_list_img=$result_list_img->fetch_assoc()){ $no5++; 

                 $listing_img_folder=$rs_list_img['listing_img_folder'];
                 $listing_img_name=$rs_list_img['listing_img_name'];
                 $ex_list_listing_code=$rs_list_img['ex_list_listing_code'];

                 if($listing_img_folder!=''){   

                       $listing_img_folder = str_replace("../","",$listing_img_folder,$count);  
                       $listing_img_name="https://connex.in.th/".$listing_img_folder.$listing_img_name;
                 }else{   
                       $listing_img_name="https://connex.in.th/images/listing/".$ex_list_listing_code."/".$listing_img_name;  
                 }
                    
                  if($no5==1){ 
                         $img_list1=$listing_img_name;                    
                  }else if($no5==2){
                         $img_list2=$listing_img_name;    
                  }else if($no5==3){
                         $img_list3=$listing_img_name;    
                  }else if($no5==4){
                         $img_list4=$listing_img_name;    
                  }else if($no5==5){
                         $img_list5=$listing_img_name;    
                  }else if($no5==6){
                         $img_list6=$listing_img_name;    
                  }else if($no5==7){
                         $img_list7=$listing_img_name;    
                  }else if($no5==8){
                         $img_list8=$listing_img_name;    
                  }else if($no5==9){
                         $img_list9=$listing_img_name;    
                  }else if($no5==10){
                         $img_list10=$listing_img_name;    
                  }else if($no5==11){
                         $img_list11=$listing_img_name;    
                  }else if($no5==12){
                         $img_list12=$listing_img_name;    
                  }


                  

            }  

     }else{ // เช็คว่าโพสต์ภาพไม่ได้ให้เอาภาพโครงการไปโพสต์

               $sql_img="SELECT * FROM type_project_img where project_id='$project_id' order by project_img_no ASC"; 
               $result_img=$conn->query($sql_img); 
               while($rs_img=$result_img->fetch_assoc()){  $no5++;

                    $project_img_folder=$rs_img['project_img_folder'];
                    $project_img_name=$rs_img['project_img_name'];
                    $project_img_id=$rs_img['project_img_id']; 


                     if($project_img_folder==''){ $project_img_folder="https://connex.in.th/images/project/$project_id/"; }   

                     $listing_img_name=$project_img_folder.$project_img_name; 


                    if($no5==1){ 
                           $img_list1=$listing_img_name;                    
                    }else if($no5==2){
                           $img_list2=$listing_img_name;    
                    }else if($no5==3){
                           $img_list3=$listing_img_name;    
                    }else if($no5==4){
                           $img_list4=$listing_img_name;    
                    }else if($no5==5){
                           $img_list5=$listing_img_name;    
                    }else if($no5==6){
                           $img_list6=$listing_img_name;    
                    }else if($no5==7){
                           $img_list7=$listing_img_name;    
                    }else if($no5==8){
                           $img_list8=$listing_img_name;    
                    }else if($no5==9){
                           $img_list9=$listing_img_name;    
                    }else if($no5==10){
                           $img_list10=$listing_img_name;    
                    }else if($no5==11){
                           $img_list11=$listing_img_name;    
                    }else if($no5==12){
                           $img_list12=$listing_img_name;    
                    }
              }
          
     }


            if($ex_list_listing_type=='1'){ 

                      $ex_list_latitude='';
                      $ex_list_longitude='';
                 
                 if($ex_list_bedroom=='0'){
                      $ex_list_bedroom='1';
                 }


                if($ex_list_floor=='12A' or $ex_list_floor=='12a' ){
                       $ex_list_floor='13';
                } 
            }


         if($ex_list_listing_type_check=='6' or $ex_list_listing_type_check=='5'){ $list_sqm_2=$ex_list_sqm;}else{  $list_sqm_2=""; }

         $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
         $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

         if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." ตร.ม."; $ex_list_sqm_en=$ex_list_sqm." sqm";}
         if($ex_list_bedroom!=''){ 
                 if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio"; $ex_list_bedroom_en="Studio"; 
                 }else{  $ex_list_bedroom_th=$ex_list_bedroom." ห้อง";    $ex_list_bedroom_en=$ex_list_bedroom." Room"; }
         }
         if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom." ห้อง";  $ex_list_bathroom_en=$ex_list_bathroom." Room";   }
         if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
         if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น";  $ex_list_total_floors_en=$ex_list_total_floors."";}

        if($ex_list_deal_type=='1'){ $ex_list_deal_type_title="ขาย"; $ex_list_deal_types="buy/sell";  $ex_list_deal_type_en="FOR SELL"; }else{$ex_list_deal_type_title="เช่า"; $ex_list_deal_type_en="FOR RENT"; $ex_list_deal_types="rent";}


 

         $sql_projects="SELECT * FROM type_project where project_id='$project_id' order by project_id  ASC"; 
         $result_projects=$conn->query($sql_projects);
         $rs_projects= $result_projects->fetch_assoc();
         
         $project_type=$rs_projects['project_type'];
         $project_name=$rs_projects['project_name'];
         $project_name_en=$rs_projects['project_name_en'];
         $project_alley=$rs_projects['project_alley'];
         $project_alley_en=$rs_projects['project_alley_en'];
         $project_road=$rs_projects['project_road'];
         $project_road_en=$rs_projects['project_road_en'];
         $project_subdistrict=$rs_projects['project_subdistrict'];
         $project_district=$rs_projects['project_district'];
         $project_province=$rs_projects['project_province'];
         $project_train_station=$rs_projects['project_train_station'];
         $project_facilities=$rs_projects['project_facilities'];
         $project_nearby_places=$rs_projects['project_nearby_places'];
         $project_nearby_places_en=$rs_projects['project_nearby_places_en'];
         $project_facilities_en=$rs_projects['project_facilities_en'];
         $project_zone=$rs_projects['project_zone'];
         $project_facilities_icon=$rs_projects['project_facilities_icon'];
         $project_map=$rs_projects['project_map'];
         $project_total_floors=$rs_projects['project_total_floors'];
         $project_living_zone_list=$rs_projects['project_living_zone_list'];
         $project_living_project_list=$rs_projects['project_living_project_list'];

         $project_latitude=$rs_projects['project_latitude'];
         $project_longitude=$rs_projects['project_longitude'];
 

         if($rs_projects['project_id']!=''){  // project_id NO
        
                /* $ex_list_listing_type=$project_type;*/
                 $ex_list_alley=$project_alley;
                 $ex_list_road=$project_road;
                 $ex_list_subdistrict=$project_subdistrict;
                 $ex_list_district=$project_district;
                 $ex_list_province=$project_province; 
                 $ex_list_train_station=$project_train_station;
                 $ex_list_nearby_places=$project_nearby_places;
                 $ex_list_facilities=$project_facilities;
                 $ex_list_zone=$project_zone;
                 $ex_list_googlmap=$project_map;
               /*  $ex_list_listing_type_check=$project_type; */


                 $ex_list_latitude=$project_latitude;
                 $ex_list_longitude=$project_longitude;

                 if($ex_list_listing_type=='1' or $ex_list_total_floors=='' or $ex_list_total_floors=='0'){
                            
                              
                                        $ex_list_total_floors_th=$project_total_floors." ชั้น";  
                                        $ex_list_total_floors_en=$project_total_floors.""; 
                             
                 } 



                $ex_list_common_facilities=nl2br($project_facilities_en);
                $ex_list_common_facilities=str_replace("<br />","",$project_facilities_en,$count);  

                $ex_list_nearby_places_en=nl2br($project_nearby_places_en);
                $ex_list_nearby_places_en=str_replace("<br />","",$project_nearby_places_en,$count);  




            }  // END project_id NO


         $sql_projects="SELECT * FROM type_project where project_id='$project_id' order by project_id  ASC"; 
         $result_projects=$conn->query($sql_projects);
         $rs_projects= $result_projects->fetch_assoc();       

                 $ex_list_project=$project_name." | ".$project_name_en; 

          if($project_id!='0'){

                 $zone_id=$rs_projects['zone_id'];

           }


         $sql_zone="SELECT * FROM type_zone where zone_id='$zone_id' "; 
         $result_zone=$conn->query($sql_zone);
         $rs_zone=$result_zone->fetch_assoc();
         
         $zone_living_id=$rs_zone['zone_living_id']; 
        
         if($zone_living_id!=''){
                 $zone_living_id=$rs_zone['zone_living_id']; 
          }

                


      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$ex_list_province' "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province=$rs_p['provinces_in_thai'];
                $project_province_en=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];
                $geography_id=$rs_p['geography_id'];

                $sql_geo="SELECT * FROM sys_geography WHERE id='$geography_id' "; 
                $result_geo=$conn->query($sql_geo);
                $rs_geo=$result_geo->fetch_assoc();

                $name_th=$rs_geo['name_th'];


      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$ex_list_district' "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district=$rs_d['districts_in_thai'];
                $project_district_en=$rs_d['districts_in_english'];

                $project_district = str_replace("เขต","",$project_district,$count);
                $project_district = str_replace(" ","",$project_district,$count);


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$ex_list_subdistrict' "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $project_subdistrict=$rs_s['subdistricts_in_thai'];
                $project_subdistrict_en=$rs_s['subdistricts_in_english'];
                $zip_code=$rs_s['zip_code'];

                $project_subdistrict = str_replace("แขวง","",$project_subdistrict,$count);
               
                if($project_alley_en!=''){  $project_alley_en=" ".$project_alley_en; }
                if($project_road_en!=''){ $project_road_en=" , ".$project_road_en;}

    if($_SESSION['STATUS_ADS']=='1'){  
               $ex_list_house_number="";

     }

               if($province_id=='1'){
                     
                     $address=" ".$project_alley." ".$project_road." แขวง".$project_subdistrict." เขต".$project_district." ".$project_province." ".$zip_code;

                     $address_en="".$project_alley_en."".$project_road_en." , ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code;

               }else{

                       $address=" ".$project_alley." ".$project_road." ตำบล".$project_subdistrict." อำเภอ".$project_district." จังหวัด".$project_province." ".$zip_code;

                      $address_en="".$project_alley_en."".$project_road_en." , ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code; 
               }


      /////////// type_project //////////////// 

      /////////// End type_project ////////////////


      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type_1=$rs_ass['name'];  $ex_list_listing_types=$rs_ass['name_living_en'];  $ex_list_listing_type_en=$rs_ass['name_en']; }
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$ex_list_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
             $tr_group=$rs_train['tr_group'];
  
             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];  
                                        
                                        $ex_list_train_station_en=$tr_group."-".$rs_train['station_name_en'];
                                  }
      /////////// End type_train_station ////////////////
  

        //////////////    ////////////////////////////
             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $ex_list_contacts=$rs_register['register_name']." | ".$rs_register['register_email'];


      

      /////////// type_zone ////////////////
             $sql_zone="SELECT * FROM type_zone where zone_id='$zone_id' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc();

             $zone_name=$rs_zone['zone_name'];
             $zone_name_en=$rs_zone['zone_name_en'];


             if($zone_name!=''){ $ex_list_zone=$zone_name;    $ex_list_zone_en=$zone_name_en;    }


        
 

        $type_room_id = explode(',', $ex_list_room_id);

         $sql_room="SELECT * FROM type_room order by room_id  ASC"; 
         $result_room=$conn->query($sql_room);
     
         while($rs_room=$result_room->fetch_assoc()) { 

                $room_id=$rs_room['room_id'];
                $room_title=$rs_room['room_title'];
                $room_title_en=$rs_room['room_title_en'];
                  
                 if (in_array($room_id, $type_room_id)){
                        

                       $room_title2=$room_title; 
                       $room_title_en2=$room_title_en;                      
                 }
           }


     /////////// //////////  ex_list_contract_type  //////////////////            

            if($ex_list_contract_type=='1'){ $ex_list_contract_type="Exclusive";}else if($ex_list_contract_type=='2'){ $ex_list_contract_type="Open"; }else if($ex_list_contract_type=='3'){ $ex_list_contract_type="No Contract"; }else{$ex_list_contract_type="ไม่ระบุ";}

 

                 $ex_list_heading_shot=$ex_list_deal_type_title.$ex_list_listing_type_1." ".$project_name ;


            $detail="รหัสทรัพย์ : ".$ex_list_listing_code."\n";
       if($project_id!='' and $project_id!='0'){
            $detail.="โครงการ : ".$ex_list_project."\n";
       }
            $detail.="ที่ตั้ง : ".$address."\n";
            $detail.="พิกัด : ".$ex_list_googlmap."\n";
       
       if($ex_list_train_station!='' and $ex_list_train_station!='0'){                           
            $detail.="สถานีรถไฟฟ้า : ".$ex_list_train_station."\n\n";
         }  
            $detail.="ราคา".$ex_list_deal_type_title." : ".number_format($ex_list_price)."\n\n";
            $detail.="ประเภท : ".$ex_list_listing_type_1."\n";

         if($ex_list_listing_type!='12') {   
            $detail.="จำนวนชั้น : ".$ex_list_total_floors_th."\n";
         }

        if($ex_list_listing_type_check=='1'){ 
            $detail.="ตั้งอยู่ชั้นที่ : ".$ex_list_floor."\n";
        }
        if($ex_list_listing_type_check!='1'){ 
            $detail.="พื้นที่ : ".$area_th."\n";
        }

         if($ex_list_listing_type!='12') { 
            $detail.="พื้นที่ใช้สอย : ".$ex_list_sqm_th."\n";
            $detail.="ห้องนอน : ".$ex_list_bedroom_th."\n";
            $detail.="ห้องน้ำ : ".$ex_list_bathroom_th."\n";
            $detail.="ห้องอื่นๆ : ".$ex_list_other_room."\n";
         }
        if($ex_list_parking!=''){
            $detail.="ที่จอดรถ : ".$ex_list_parking."\n";
        }
        if($ex_list_direction!=''){
            $detail.="ทิศ : ".$ex_list_direction."\n";
        }

        $detail.="\n";

        if($type_strengths_id!=''){  

             $detail.="จุดเด่น :"."\n";
            
        }
  
           $selected_type_strengths_id = explode(',', $type_strengths_id);

           $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
           $result_strengths=$conn->query($sql_strengths);
                   
           while($rs_strengths=$result_strengths->fetch_assoc()) { 
                  $strengths_id=$rs_strengths['strengths_id'];
                  $strengths_name=$rs_strengths['strengths_name'];
                  $strengths_name_en=$rs_strengths['strengths_name_en'];
               if (in_array($strengths_id, $selected_type_strengths_id)){ 

                     $detail.="-".$strengths_name."\n";
              }

           }

        if($ex_list_details!=''){

                $ex_list_details=nl2br($ex_list_details);
                $ex_list_details=str_replace("<br />","",$ex_list_details,$count);           

            $detail.="\n รายละเอียดเพิ่มเติม :\n";
            $detail.=$ex_list_details."\n";
        }else{
            $detail.="\n";   
        }



        if($ex_list_furniture_id!=''){

                $ex_list_furniture=nl2br($ex_list_furniture);
                $ex_list_furniture=str_replace("<br />","",$ex_list_furniture,$count);  
               
               $detail.="เฟอร์นิเจอร์ :"."\n";
 
            if($ex_list_furniture!=''){  $detail.="".$ex_list_furniture."\n"; }

               $selected_furniture_id = explode(',', $ex_list_furniture_id);
               $sql_furniture="SELECT * FROM type_furniture order by furniture_id ASC"; 
               $result_furniture=$conn->query($sql_furniture);
                   
               while($rs_furniture=$result_furniture->fetch_assoc()) { 

                $furniture_id=$rs_furniture['furniture_id'];
                $furniture_name=$rs_furniture['furniture_name']; 
                $furniture_name_en=$rs_furniture['furniture_name_en'];
                                
                    if (in_array($furniture_id, $selected_furniture_id)){ 
                          $detail.="-".$furniture_name."\n"; 
                    }
               }   

        }
                $ex_list_facilities=nl2br($ex_list_facilities);
                $ex_list_facilities = str_replace("<br />","",$ex_list_facilities,$count);                

                $ex_list_nearby_places=nl2br($ex_list_nearby_places);
                $ex_list_nearby_places=str_replace("<br />","",$ex_list_nearby_places,$count);

            $detail.=" \n";
            $detail.="สิ่งอำนวยความสะดวก :"."\n";
            $detail.=$ex_list_facilities."\n\n";
            $detail.="ทำเลดี สถานที่ใกล้เคียง :\n";
            $detail.=$ex_list_nearby_places."\n\n";
            $detail.="โซนพื้นที่ :\n";
            $detail.= $ex_list_zone."\n\n";
            $detail.="บริการปรึกษาสินเชื่อฟรี! ดอกเบี้ยพิเศษ และ วงเงินกู้สูงสุด 90-100% ของราคาประเมิน\n";
            $detail.="สอบถามข้อมูลเพิ่มเติม ติดต่อ\n";
            $detail.="CONNEX PROPERTY สนใจซื้อ-ขายบ้าน ปรึกษาฟรี! ทีมงานมืออาชีพ\n";
            $detail.="Call: 099-019-9900\n";
            $detail.="Facebook: Connex Property\n";
            $detail.="LINE OA: @connexproperty\n";
            $detail.=" Whatsapp: +66 99 019 9900\n";
            $detail.=" Wechat ID : wxid_idbemm7t5gbj22 \n";
            $detail.="https://connex.in.th/\n";
  

            $detail_en="Listing ID : ".$ex_list_listing_code." \n";
       if($project_id!='' and $project_id!='0'){
            $detail_en.="Project : ".$project_name_en."\n";
        }
            $detail_en.="Location area: ".$address_en."\n";
            $detail_en.="GPS : ".$ex_list_googlmap." \n";
       
       if($ex_list_train_station!='' and $ex_list_train_station!='0'){                           
            $detail_en.="Station : ".$ex_list_train_station_en." \n";
         }         
            $detail_en.=$ex_list_deal_type_en." : ".number_format($ex_list_price)." ฿\n\n";
            $detail_en.="Property type : ".$ex_list_listing_type_en."\n";

         if($ex_list_listing_type!='12') {   
            $detail_en.="No of floors : ".$ex_list_total_floors_en."\n";
         }

        if($ex_list_listing_type_check=='1'){ 
            $detail_en.="Floor : ".$ex_list_floor."\n";
        }
        if($ex_list_listing_type_check!='1'){ 
            $detail_en.="Area : ".$area_en."\n";
        }

         if($ex_list_listing_type!='12') { 
            $detail_en.="Usable area  : ".$ex_list_sqm_en."\n";
            $detail_en.="No. of Bedroom : ".$ex_list_bedroom_en."\n";
            $detail_en.="No. of Bathroom : ".$ex_list_bathroom_en."\n";
            $detail_en.="Other : ".$ex_list_other_room."\n";
         }
        if($ex_list_parking!=''){
            $detail_en.="Parking : ".$ex_list_parking."\n";
        }
        if($ex_list_direction!=''){
            $detail_en.="Direction : ".$ex_list_direction."\n";
        }

            $detail_en.="\n";

        if($type_strengths_id!=''){  

           $detail_en.="Highlights :"."\n";

        }
  
           $selected_type_strengths_id = explode(',', $type_strengths_id);

           $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
           $result_strengths=$conn->query($sql_strengths);
                   
           while($rs_strengths=$result_strengths->fetch_assoc()) { 
                  $strengths_id=$rs_strengths['strengths_id'];
                  $strengths_name=$rs_strengths['strengths_name'];
                  $strengths_name_en=$rs_strengths['strengths_name_en'];
               if (in_array($strengths_id, $selected_type_strengths_id)){ 

                     $detail_en.="-".$strengths_name_en."\n";
              }

           }


        if($ex_list_details!=''){

                $ex_list_details_en=nl2br($ex_list_details_en);
                $ex_list_details_en=str_replace("<br />",'',$ex_list_details_en,$count);  

            $detail_en.="\n Other details :\n";
            $detail_en.=$ex_list_details_en."\n";
        }else{
            $detail_en.="\n"; 
        }

        if($ex_list_furniture_id!=''){
        
            $detail_en.="Furniture :"."\n";
            if($ex_list_furniture!=''){  


                $ex_list_furniture=nl2br($ex_list_furniture);
                $ex_list_furniture=str_replace("<br />","",$ex_list_furniture,$count); 

                
             }

               $selected_furniture_id = explode(',', $ex_list_furniture_id);
               $sql_furniture="SELECT * FROM type_furniture order by furniture_id ASC"; 
               $result_furniture=$conn->query($sql_furniture);
                   
               while($rs_furniture=$result_furniture->fetch_assoc()) { 

                $furniture_id=$rs_furniture['furniture_id'];
                $furniture_name=$rs_furniture['furniture_name']; 
                $furniture_name_en=$rs_furniture['furniture_name_en'];
                                
                    if (in_array($furniture_id, $selected_furniture_id)){ 
                          $detail_en.="-".$furniture_name_en."\n"; 
                    }
               }   

        }
            $detail_en.="\n";




            $detail_en.="Common Facilities : " ."\n";
            $detail_en.=$ex_list_common_facilities."\n\n";
            $detail_en.="Nearby Facilities :\n";
            $detail_en.=$ex_list_nearby_places_en."\n\n";
            $detail_en.="Zone :\n";
            $detail_en.= $ex_list_zone_en."\n\n";
            $detail_en.="Free consultation! seeking to buy/sell/rent properties in Thailand\n";
            $detail_en.="Interested please contact :\n";
            $detail_en.="CONNEX PROPERTY | Connect you to your wished property\n";
            $detail_en.="Call: 099-019-9900\n";
            $detail_en.="Facebook: Connex Property\n";
            $detail_en.="LINE OA: @connexproperty\n";
            $detail_en.=" Whatsapp: +66 99 019 9900\n";
            $detail_en.=" Wechat ID : wxid_idbemm7t5gbj22 \n";
            $detail_en.="https://connex.in.th/\n";

 
            if($ex_list_sqm=='0'){
                  $ex_list_sqm='';
            }

      
            if($ex_list_listing_type=='1'){

                   $ex_list_floor=$ex_list_floor;
                  $ex_list_rai='';
                  $ex_list_ngan='';
                  $ex_list_wa='';
            }

            $sum_rai=$ex_list_rai*400;
            $sum_ngan=$ex_list_ngan*100;
            $sum_wa_all=$sum_rai+$sum_ngan+$ex_list_wa;

            if($ex_list_listing_type=='2' or $ex_list_listing_type=='3'  or $ex_list_listing_type=='4'  or $ex_list_listing_type=='5'  or $ex_list_listing_type=='6'  ){

                   $ex_list_floor=$ex_list_total_floors;

                 if($ex_list_floor=='0' and $ex_list_floor==''){
                      $ex_list_floor=$project_total_floors;
                 }

            }

            if($ex_list_pets!='' and $ex_list_pets!='0' ){
                    $ex_list_pets='allow';
            }else{
                    $ex_list_pets='';
            }
             
            if($ex_list_video!=''){

            }






             if($project_living_project_list==''){
                   $project_living_project_list='0';
             }

  

 $objPHPExcel->getActiveSheet()->setCellValue('A'.$no2,"New/Update");
 $objPHPExcel->getActiveSheet()->setCellValue('B'.$no2,$ex_list_listing_code);
 $objPHPExcel->getActiveSheet()->setCellValue('C'.$no2,$ex_list_listing_types);
 $objPHPExcel->getActiveSheet()->setCellValue('D'.$no2,$ex_list_deal_types);
 $objPHPExcel->getActiveSheet()->setCellValue('E'.$no2,"agent");
 $objPHPExcel->getActiveSheet()->setCellValue('F'.$no2,'');
 $objPHPExcel->getActiveSheet()->setCellValue('G'.$no2,$zone_living_id);
 $objPHPExcel->getActiveSheet()->setCellValue('H'.$no2,$project_living_project_list);
 $objPHPExcel->getActiveSheet()->setCellValue('I'.$no2,$ex_list_heading);
 $objPHPExcel->getActiveSheet()->setCellValue('J'.$no2,$detail);
 $objPHPExcel->getActiveSheet()->setCellValue('K'.$no2,$ex_list_heading_en);
 $objPHPExcel->getActiveSheet()->setCellValue('L'.$no2,$detail_en);
 $objPHPExcel->getActiveSheet()->setCellValue('M'.$no2,$ex_list_price);

         if($ex_list_listing_type!='1') {
 $objPHPExcel->getActiveSheet()->setCellValue('N'.$no2,$sum_wa_all);
         }else{
 $objPHPExcel->getActiveSheet()->setCellValue('N'.$no2,$ex_list_sqm);
         }
 $objPHPExcel->getActiveSheet()->setCellValue('O'.$no2,$ex_list_rai);
 $objPHPExcel->getActiveSheet()->setCellValue('P'.$no2,$ex_list_ngan);
 $objPHPExcel->getActiveSheet()->setCellValue('Q'.$no2,$ex_list_wa); 
 $objPHPExcel->getActiveSheet()->setCellValue('R'.$no2,$ex_list_floor);
 $objPHPExcel->getActiveSheet()->setCellValue('S'.$no2,$ex_list_bedroom);
 $objPHPExcel->getActiveSheet()->setCellValue('T'.$no2,$ex_list_bathroom);
 $objPHPExcel->getActiveSheet()->setCellValue('U'.$no2,$ex_list_pets);
 $objPHPExcel->getActiveSheet()->setCellValue('V'.$no2,'');
 $objPHPExcel->getActiveSheet()->setCellValue('W'.$no2,$ex_list_video);
 $objPHPExcel->getActiveSheet()->setCellValue('X'.$no2,$ex_list_latitude);
 $objPHPExcel->getActiveSheet()->setCellValue('Y'.$no2,$ex_list_longitude);
 $objPHPExcel->getActiveSheet()->setCellValue('Z'.$no2,$img_list1);
 $objPHPExcel->getActiveSheet()->setCellValue('AA'.$no2,$img_list2);
 $objPHPExcel->getActiveSheet()->setCellValue('AB'.$no2,$img_list3);
 $objPHPExcel->getActiveSheet()->setCellValue('AC'.$no2,$img_list4);
 $objPHPExcel->getActiveSheet()->setCellValue('AD'.$no2,$img_list5);
 $objPHPExcel->getActiveSheet()->setCellValue('AE'.$no2,$img_list6);
 $objPHPExcel->getActiveSheet()->setCellValue('AG'.$no2,$img_list7);
 $objPHPExcel->getActiveSheet()->setCellValue('AF'.$no2,$img_list8);
 $objPHPExcel->getActiveSheet()->setCellValue('AH'.$no2,$img_list9);
 $objPHPExcel->getActiveSheet()->setCellValue('AI'.$no2,$img_list10);
 $objPHPExcel->getActiveSheet()->setCellValue('AJ'.$no2,$img_list11);
 $objPHPExcel->getActiveSheet()->setCellValue('AK'.$no2,$img_list12);
 $objPHPExcel->getActiveSheet()->setCellValue('AL'.$no2,$list_sqm_2);
 $objPHPExcel->getActiveSheet()->setCellValue('AM'.$no2,'');
 $objPHPExcel->getActiveSheet()->setCellValue('AN'.$no2, "info@connexproperty.co.th");
 $objPHPExcel->getActiveSheet()->setCellValue('AO'.$no2,"@connexproperty");
 $objPHPExcel->getActiveSheet()->setCellValue('AP'.$no2,"0990199900");
 $objPHPExcel->getActiveSheet()->setCellValue('AQ'.$no2,$ex_list_img_score_name);

     }
  } 

               unset($ex_list_project,$address,$ex_list_googlmap,$ex_list_train_station,$ex_list_total_floors_th,$ex_list_floor,$ex_list_sqm_th,$ex_list_bedroom_th,$ex_list_bathroom_th,$ex_list_parking ,$ex_list_total_floors_en , $ex_list_floor, $ex_list_sqm_en , $ex_list_bedroom_en , $ex_list_bathroom_en , $ex_list_other_room , $ex_list_direction , $ex_list_img_score_name , $img_list1 , $img_list2 , $img_list3 , $img_list4 , $img_list5 , $img_list6 , $img_list7 , $img_list8 , $img_list9 , $img_list10 , $img_list11 , $img_list12);


 
               $img_list1="";
               $img_list2="";
               $img_list3="";
               $img_list4="";
               $img_list5="";
               $img_list6="";
               $img_list7="";
               $img_list8="";
               $img_list9="";
               $img_list10="";
               $img_list11="";
               $img_list12="";



/*


$objPHPExcel->getActiveSheet()->setCellValue('B2',$str_header);
$objPHPExcel->getActiveSheet()->setCellValue('C2','');
$objPHPExcel->getActiveSheet()->mergeCells('B2:C2');

$objPHPExcel->getActiveSheet()->setCellValue('B3',$str_sub_header);
$objPHPExcel->getActiveSheet()->setCellValue('C3','');
$objPHPExcel->getActiveSheet()->mergeCells('B3:C3');

$objPHPExcel->getActiveSheet()->setCellValue('B4','ลำดับที่');
$objPHPExcel->getActiveSheet()->setCellValue('C4','บริการของเรา');

//$objPHPExcel->getActiveSheet()->setCellValue('B2', 'รหัสสมาชิก')->setCellValue('C2', 'ชื่อสมาชิก');

for($i=1;$i<=9;$i++){
$objPHPExcel->getActiveSheet()->setCellValue('B' . (4+$i), $i);
}

$objPHPExcel->getActiveSheet()->setCellValue('C5','รับทำเว็บไซต์');
$objPHPExcel->getActiveSheet()->getHyperlink('C5')->setUrl('https://www.siamfocus.com/web-programming.php');

$objPHPExcel->getActiveSheet()->setCellValue('C6','รับพัฒนาโปรแกรม');
$objPHPExcel->getActiveSheet()->getHyperlink('C6')->setUrl('https://www.siamfocus.com/application-program.php');

$objPHPExcel->getActiveSheet()->setCellValue('C7','บริการ Network Server และ Hotspot');
$objPHPExcel->getActiveSheet()->getHyperlink('C7')->setUrl('https://www.siamfocus.com/network-hotspot.php');

$objPHPExcel->getActiveSheet()->setCellValue('C8','สอนทำเว็บ WordPress,สอน PHP');
$objPHPExcel->getActiveSheet()->getHyperlink('C8')->setUrl('https://www.siamfocus.com/asp-php-wordpress.php');

$objPHPExcel->getActiveSheet()->setCellValue('C9','รับดูแลเว็บ+ที่ปรึกษาเว็บ');
$objPHPExcel->getActiveSheet()->getHyperlink('C9')->setUrl('https://www.siamfocus.com/consultant.php');

$objPHPExcel->getActiveSheet()->setCellValue('C10','ทำเว็บขายของ');
$objPHPExcel->getActiveSheet()->getHyperlink('C10')->setUrl('https://www.siamfocus.com/shop-online.php');

$objPHPExcel->getActiveSheet()->setCellValue('C11','รับจดโดเมน+โฮสติ้ง');
$objPHPExcel->getActiveSheet()->getHyperlink('C11')->setUrl('https://www.siamfocus.com/domain-hosting.php');

$objPHPExcel->getActiveSheet()->setCellValue('C12','ลงโฆษณาเฟสบุค');
$objPHPExcel->getActiveSheet()->getHyperlink('C12')->setUrl('https://www.siamfocus.com/facebook-ads.php');

$objPHPExcel->getActiveSheet()->setCellValue('C13','ลงโฆษณา Google');
$objPHPExcel->getActiveSheet()->getHyperlink('C13')->setUrl('https://www.siamfocus.com/google-ads.php');


// Set column widths
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);

//Style
$styleRedBold = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'FF0000'),
        'size'  => 10,
        'name'  => ''
    ));
$styleBold = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 10,
        'name'  => ''
    ));
$styleBlue = array(
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '003cff'),
        'size'  => 10,
        'name'  => ''
    ));

$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(10);
$objPHPExcel->getActiveSheet()->getStyle('A1:AH1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objPHPExcel->getActiveSheet()->getStyle('A1:AH1')->applyFromArray($styleRedBold);

$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(140);
$objPHPExcel->getActiveSheet()->getStyle('B2:C2'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
$objPHPExcel->getActiveSheet()->getStyle('B2:C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objPHPExcel->getActiveSheet()->getStyle('B2:C2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
$objPHPExcel->getActiveSheet()->getStyle('B3:C3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B3:C3'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
$objPHPExcel->getActiveSheet()->getStyle('B3:C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objPHPExcel->getActiveSheet()->getStyle('B3:C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('B3:C3')->applyFromArray($styleRedBold);

$objPHPExcel->getActiveSheet()->getStyle('B4:C4')->applyFromArray($styleBold);
$objPHPExcel->getActiveSheet()->getStyle('B4:C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

//$objPHPExcel->getActiveSheet()->getStyle('C3:C13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('B5:B13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C5:C13')->applyFromArray($styleBlue);


$gdImage = imagecreatefromjpeg('website_line.jpg');
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Line@siamfocus');
$objDrawing->setDescription('Line@siamfocus');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(170);
$objDrawing->setCoordinates('B15');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());*/

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', "living_insider_".$date_start."-".$date_end.".xls"));

// Echo done
print "อ้างอิงจาก https://github.com/PHPOffice/PHPExcel";
print '<script>';
print 'window.open("living_insider_".$date_start."-".$date_end.".xls");';
print '</script>';


$check=$_GET['check'];
 /*
 echo("<script> top.location.href='../?page=download_file_excel&p=1&date_start=$date_all&check=$check'</script>"); */
 
    echo("<script> top.location.href='../../backend/report/report_excel_ddproperty.php?date_start=$date_start&date_end=$date_end&check=$check'</script>");  
 
}
?>