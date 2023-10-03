<?php
   

  session_start();  
echo ini_get("memory_limit")."\n<br>"; 
ini_set("memory_limit","2048M");
echo ini_get("memory_limit")."\n <br>";

  require '../config.php';
 
$date_update=date("Y-m-d H:i:s");   

$time_check=date("d");   


 ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL); 

    $check_id="";  


$dt = new DateTime();
$time_check=$dt->format('Y-m-d\TH:i:s.').substr($dt->format('u'),0,3).'Z';

/*
    if($check_id=='-1'){
      

    }else if($check_id=='-2'){

       $img_no='2';

    }else if($check_id=='-3'){

       $img_no='3';

    }else if($check_id=='-4'){

       $img_no='4';

    }else if($check_id=='-5'){

       $img_no='5';

    } */


 /*
 if($check_id=='1'){
       
       $stat_x=0;
       $end_x=3;      
 
 }else if($check_id=='2'){

       $stat_x=4;
       $end_x=7;  

 }else if($check_id=='3'){

       $stat_x=8;
       $end_x=11;  

 }else if($check_id=='4'){

       $stat_x=12;
       $end_x=15;  

 } */
 

 


$data = '{ '."\n";
$data .= '"updatedAt" : " '.$time_check.'" , '."\n";
$data .= '"listingCount": 3500,'."\n";
$data .= '"listingData":  ['."\n";
  
 /////////////////////////////////////////////////////////////// FOR SALE  ///////////////////////////////////////////////////////////////
         
         $i=0;

         $sql="SELECT * FROM dbo_data_excel_listing
               WHERE  ex_list_propertyhub='1' and ex_list_close='0' and ex_list_listing_type='1'and ex_list_deal_type='1' and ex_list_floor!=''    
               order by ex_list_propertyhub_date DESC , ex_list_date_update DESC  LIMIT 1500  ";  
         $result = $conn->query($sql); 
         $count_num=$result->num_rows;

		 if($result->num_rows > 0) {  // result
    	  // output data of each row
    		 while($rs_listing=$result->fetch_assoc()) {   $i++;  // rs_listing

         
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
         $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
         $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en']; 

         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];
         $ex_list_proppit=$rs_listing['ex_list_proppit'];

         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $project_id=$rs_listing['project_id'];
         $ex_list_no_images=$rs_listing['ex_list_no_images'];
         $ex_list_img_number=$rs_listing['ex_list_img_number'];

         if($ex_list_boostpost=='1'){
                    
                    $check_id='';
                    
         }else{

                    $check_id='';

                   

         }
         


         $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
         $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

         if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." ตร.ม.";   $ex_list_sqm_en=$ex_list_sqm." sqm";   $ex_list_sqm_p=$ex_list_sqm;   }
         if($ex_list_bedroom!=''){ 
                 if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio"; $ex_list_bedroom_en="Studio"; 
                 }else{  $ex_list_bedroom_th=$ex_list_bedroom." ห้อง";    $ex_list_bedroom_en=$ex_list_bedroom." Room"; }
         }
         if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom." ห้อง";  $ex_list_bathroom_en=$ex_list_bathroom." Room";   }
         if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
         if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น";  $ex_list_total_floors_en=$ex_list_total_floors."";}

        if($ex_list_deal_type=='1'){ 
              $ex_list_deal_type="ขาย"; 
              $ex_list_deal_type_p='sale';  
              $ex_list_deal_type_en="FOR SELL"; 

              $deal_type_check="FOR_SALE";

         }else{

              $ex_list_deal_type="เช่า"; 
              $ex_list_deal_type_en="FOR RENT";  $ex_list_deal_type_p='rent'; 
              $deal_type_check="FOR_RENT";
         }
       
         if($ex_list_bedroom=='0'){
              $roomType="STUDIO";
         }else if($ex_list_bedroom=='1'){
              $roomType="ONE_BED_ROOM";
         }else if($ex_list_bedroom=='2'){
              $roomType="TWO_BED_ROOM";
         }else if($ex_list_bedroom=='3'){
              $roomType="THREE_BED_ROOM";
         }else if($ex_list_bedroom=='4'){
              $roomType="FOUR_BED_ROOM";
         }else if($ex_list_bedroom=='5'){
              $roomType="FIVE_BED_ROOM";
         }else if($ex_list_bedroom=='6'){
              $roomType="SIX_BED_ROOM";
         }
  

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
         $project_latitude=$rs_projects['project_latitude'];
         $project_longitude=$rs_projects['project_longitude'];

         $project_proppit_name=$rs_projects['project_proppit_name'];
         $project_proppit_name_en=$rs_projects['project_proppit_name_en'];
         $project_proppit_latitude=$rs_projects['project_proppit_latitude'];
         $project_proppit_longitude=$rs_projects['project_proppit_longitude'];

         $project_propertyhub_id=$rs_projects['project_propertyhub_id'];
         $project_propertyhub_name=$rs_projects['project_propertyhub_name'];

         $zone_id=$rs_projects['zone_id'];

         if($rs_projects['project_id']!=''){  // project_id NO
        
                 $ex_list_listing_type=$project_type;
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
                 $ex_list_latitude=$project_latitude;
                 $ex_list_longitude=$project_longitude;
                 $ex_list_listing_type_check=$project_type;



                 $ex_list_project=$project_name." | ".$project_name_en; 

                 if($ex_list_listing_type=='1' or $ex_list_total_floors=='' or $ex_list_total_floors=='0'){
                            
                              
                                        $ex_list_total_floors_th=$project_total_floors." ชั้น";  
                                        $ex_list_total_floors_en=$project_total_floors.""; 
                             
                 } 

            }  // END project_id NO


          if($project_id!='0'){ 

                 $ex_list_project=$project_name;
                 $ex_list_project_en=$project_name_en;


          }else{                 
                 $ex_list_project=$ex_list_listing_name;
                 $ex_list_project_en=$ex_list_listing_name_en;

                 $project_name_en=$ex_list_listing_name;
          }


          if($ex_list_latitude==''){

               $ex_list_latitude='13.771355';
               $ex_list_longitude='100.5958781';
          }
 
 
           if($ex_list_sqm_p==''){
               $ex_list_sqm_p='00';
           }


           if($ex_list_bedroom=='0'){

                 $ex_list_bedroom='1';
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
                     
                     $address=$project_alley." ".$project_road." แขวง".$project_subdistrict." เขต".$project_district." ".$project_province." ".$zip_code;

                     $address_en=$project_alley_en."".$project_road_en." , ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code;

               }else{

                       $address=$project_alley." ".$project_road." ตำบล".$project_subdistrict." อำเภอ".$project_district." จังหวัด".$project_province." ".$zip_code;

                      $address_en=$project_alley_en." ".$project_road_en." , ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code; 
               }
                     $address=trim($address);  
                     $address_en=trim($address_en); 
 

    if($ex_list_img_number!='0'){
            
             $img_no=0;
             $url_img_listing='';
             $url_img_listing = [];   

        if($ex_list_no_images!='1'){ // เช็คว่าโพสต์ภาพได้

             $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC ";
             $result_img = $conn->query($sql_img); 
                // output data of each row 


             while($rs_img=$result_img->fetch_assoc()){  $img_no++; $i++;
             
                  $img_folder=$rs_img['listing_img_folder']; 
                  $image_name=$rs_img['listing_img_name'];

                  $img_folder=str_replace("../../","https://connex.in.th/images/",$img_folder,$count);

                  if($img_folder!=''){ 
                        $img_folder=$img_folder.''.$image_name;  
                        $img_folders=$img_folder;
                  }else{ 
                        $img_folder='https://connex.in.th/images/listing/'.$ex_list_listing_code.'/'.$image_name; 
                        $img_folders="";
                                         
                  }
 
                       $url_img_listing[$i]=$img_folder;   

              } 
         }// END เช็คว่าโพสต์ภาพได้
         else{

             $sql_img_project="SELECT * FROM type_project_img where project_id='$project_id' order by project_img_no ASC "; 
             $result_img_project=$conn->query($sql_img_project); 
             while($rs_img_project=$result_img_project->fetch_assoc()){  $img_no++; $i++;

                 $project_img_folder=$rs_img_project['project_img_folder'];
                 $project_img_name=$rs_img_project['project_img_name'];
                 $project_img_id=$rs_img_project['project_img_id'];  

                 $img_folder="https://connex.in.th/images/project/$project_id/".$project_img_name; 

                           $url_img_listing[$i]=$img_folder;   
             }
         }

 
     }  



      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ 

                $ex_list_listing_type=$rs_ass['name'];   $ex_list_listing_type_en=$rs_ass['name_en'];   
                $name_propertyhub=$rs_ass['name_propertyhub'];

                 if($rs_ass['id']=='2') {

                     $ex_list_listing_type_p="house";   
                     $ex_list_listing_type_en="house";

                 }else if($rs_ass['id']=='4'){

                     $ex_list_listing_type_p="townhouse"; 
                     $ex_list_listing_type_en="townhouse"; 

                 }else{

                     $ex_list_listing_type_p=$ex_list_listing_type_en;                	
                 }


            }

            if($ex_list_listing_type!='1'){


                $ex_list_rai=$ex_list_rai*1600;
                $ex_list_ngan=$ex_list_ngan*400;
                $ex_list_wa=$ex_list_wa*4;

                $ex_list_sqm_p=$ex_list_rai+$ex_list_ngan+$ex_list_wa; 

            }
      ////////// End type_asset ////////////////


            if($ex_list_train_station!='0'){

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

 

             if($ex_list_direction!=''){

           /////////// ทิศ ////////////////

                 $sql_direction="SELECT * FROM  type_direction where direction_id='$ex_list_direction' ";  
                 $result_direction= $conn->query($sql_direction);
                 $rs_direction=$result_direction->fetch_assoc();

                 $direction_name_th=$rs_direction['direction_name_th'];
                 $direction_name_en=$rs_direction['direction_name_en'];

                 $direction=strtoupper($direction_name_en);

            }

 

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
 
             $ex_list_heading_shot=$ex_list_deal_type.$ex_list_listing_type." ".$project_name ;

 /////////////////////////// เนื้อหาข้อมูล ภาษาไทย ///////////////////////

        if($ex_list_project!=''){   
            $ex_list_project=trim($ex_list_project);
            $detail="โครงการ : ".$ex_list_project."<br />";
        }
            $detail.="ที่ตั้ง : ".$address."<br />";
            $detail.="พิกัด : ".$ex_list_googlmap."<br />";
       
       if($ex_list_train_station!='' and $ex_list_train_station!='0'){                           
            $detail.="สถานีรถไฟฟ้า : ".$ex_list_train_station."<br /><br />";
         }         
            $detail.="รหัสทรัพย์ : ".$ex_list_listing_code."<br />";
            $detail.="ราคา".$ex_list_deal_type." : ".number_format($ex_list_price)."<br /><br />";
            $detail.="ประเภท : ".$ex_list_listing_type."<br />";
            $detail.="จำนวนชั้น : ".$ex_list_total_floors_th."<br />";

        if($ex_list_listing_type_check=='1'){ 
            $detail.="ตั้งอยู่ชั้นที่ : ".$ex_list_floor."<br />";
        }
        if($ex_list_listing_type_check!='1'){ 
            $detail.="พื้นที่ : ".$area_th."<br />";
        }
            $detail.="พื้นที่ใช้สอย : ".$ex_list_sqm_th." <br />";
            $detail.="ห้องนอน : ".$ex_list_bedroom_th."<br />";
            $detail.="ห้องน้ำ : ".$ex_list_bathroom_th."<br />";
            $detail.="ห้องอื่นๆ : ".$ex_list_other_room."<br />";
        if($ex_list_parking!=''){
            $detail.="ที่จอดรถ : ".$ex_list_parking."<br />";
        }
        if($ex_list_direction!=''){
            $detail.="ทิศ : ".$ex_list_direction."<br />";
        }

        $detail.="<br />";

        if($type_strengths_id!=''){  

             $detail.="จุดเด่น : "."<br />";
            
        }
  
           $selected_type_strengths_id = explode(',', $type_strengths_id);

           $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
           $result_strengths=$conn->query($sql_strengths);
                   
           while($rs_strengths=$result_strengths->fetch_assoc()) { 
                  $strengths_id=$rs_strengths['strengths_id'];
                  $strengths_name=$rs_strengths['strengths_name'];
                  $strengths_name_en=$rs_strengths['strengths_name_en'];
               if (in_array($strengths_id, $selected_type_strengths_id)){ 

                     $detail.="-".$strengths_name."<br />";
              }

           }
 
            $detail.=" ";   
       


        if($ex_list_furniture_id!=''){


               
               $detail.="เฟอร์นิเจอร์ : "."<br />";
  

               $selected_furniture_id = explode(',', $ex_list_furniture_id);
               $sql_furniture="SELECT * FROM type_furniture order by furniture_id ASC"; 
               $result_furniture=$conn->query($sql_furniture);
                   
               while($rs_furniture=$result_furniture->fetch_assoc()) { 

                $furniture_id=$rs_furniture['furniture_id'];
                $furniture_name=$rs_furniture['furniture_name']; 
                $furniture_name_en=$rs_furniture['furniture_name_en'];
                                
                    if (in_array($furniture_id, $selected_furniture_id)){ 
                          $detail.="-".$furniture_name." <br />"; 

                    }
               }   
        }
               $detail.="<br />"; 

                $ex_list_facilities=nl2br($ex_list_facilities);
                $ex_list_facilities=str_replace("\n"," ",$ex_list_facilities,$count);                
                $ex_list_facilities=str_replace(chr(13)," ",$ex_list_facilities,$count);    
                $ex_list_facilities=str_replace("–","-",$ex_list_facilities,$count);  
                $ex_list_facilities=trim($ex_list_facilities);

                $ex_list_nearby_places=nl2br($ex_list_nearby_places);
                $ex_list_nearby_places=str_replace("\n"," ",$ex_list_nearby_places,$count);
                $ex_list_nearby_places=str_replace(chr(13)," ",$ex_list_nearby_places,$count);  
                $ex_list_nearby_places=str_replace("–","-",$ex_list_nearby_places,$count);  
                $ex_list_nearby_places=trim($ex_list_nearby_places);

            $detail.="สิ่งอำนวยความสะดวก : " ." <br />";
            $detail.=$ex_list_facilities." <br /><br />";
            $detail.="ทำเลดี สถานที่ใกล้เคียง :  <br />";
            $detail.=$ex_list_nearby_places." <br /><br />";
            $detail.="โซนพื้นที่ :   <br />";
            $detail.= $ex_list_zone." <br /><br />";
            $detail.="**บริการปรึกษาสินเชื่อฟรี! ดอกเบี้ยพิเศษ และ วงเงินกู้สูงสุด 90-100% ของราคาประเมิน** <br />";
            $detail.="สอบถามข้อมูลเพิ่มเติม ติดต่อ <br />";
            $detail.="CONNEX PROPERTY สนใจซื้อ-ขายบ้าน ปรึกษาฟรี! ทีมงานมืออาชีพ  <br />";
            $detail.="Call: 099-019-9900  <br />";
            $detail.="E-Mail: info@connexproperty.co.th  <br />";
            $detail.="Facebook: Connex Property <br />";
            $detail.="LINE OA: @connexproperty <br />";
            $detail.="Whatsapp: +66 99 019 9900 <br />";
            $detail.="Wechat ID : wxid_idbemm7t5gbj22 <br />";
            $detail.="https://connex.in.th/ <br />";
            $detail.="update : ".$date_update."<br />";

 /////////////////////////// END  เนื้อหาข้อมูล ภาษาไทย ///////////////////////


 /////////////////////////// เนื้อหาข้อมูล ภาษาอังกฤษ ///////////////////////
        if($ex_list_project_en!=''){   
            $ex_list_project_en=trim($ex_list_project_en);
            $detail_en="Project : ".$ex_list_project_en."<br />";
        }
            $detail_en.="Location area: ".$address_en."<br />";
            $detail_en.="GPS : ".$ex_list_googlmap." <br />";
       
       if($ex_list_train_station!='' and $ex_list_train_station!='0'){                           
            $detail_en.="Station : ".$ex_list_train_station_en." <br />";
         }         
            $detail_en.="Listing ID : ".$ex_list_listing_code." <br />";
            $detail_en.=$ex_list_deal_type_en." : ".number_format($ex_list_price)." ฿ <br /><br />";
            $detail_en.="Property type : ".$ex_list_listing_type_en." <br />";
            $detail_en.="No of floors : ".$ex_list_total_floors_en." <br />";

        if($ex_list_listing_type_check=='1'){ 
            $detail_en.="Floor : ".$ex_list_floor." <br />";
        }
        if($ex_list_listing_type_check!='1'){ 
            $detail_en.="Area : ".$area_en." <br />";
        }
            $detail_en.="Usable area  : ".$ex_list_sqm_en." <br />";
            $detail_en.="No. of Bedroom ".$ex_list_bedroom_en." <br />";
            $detail_en.="No. of Bathroom : ".$ex_list_bathroom_en." <br />";
            $detail_en.="Other : ".$ex_list_other_room." <br />";
        if($ex_list_parking!=''){
            $detail_en.="Parking : ".$ex_list_parking." <br />";
        }
        if($ex_list_direction!=''){
            $detail_en.="Direction : ".$ex_list_direction."<br />";
        }

            $detail_en.="<br />";

        if($type_strengths_id!=''){  

           $detail_en.="Highlights :"."<br />";

        }
  
           $selected_type_strengths_id = explode(',', $type_strengths_id);

           $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
           $result_strengths=$conn->query($sql_strengths);
                   
           while($rs_strengths=$result_strengths->fetch_assoc()) { 
                  $strengths_id=$rs_strengths['strengths_id'];
                  $strengths_name=$rs_strengths['strengths_name'];
                  $strengths_name_en=$rs_strengths['strengths_name_en'];
               if (in_array($strengths_id, $selected_type_strengths_id)){ 

                     $detail_en.="-".$strengths_name_en."<br />";
              }

           }
 
            $detail_en.="<br />"; 
     
        if($ex_list_furniture_id!=''){
        
            $detail_en.="Furniture :  "."<br />";
            if($ex_list_furniture!=''){  
 
 
             }

               $selected_furniture_id = explode(',', $ex_list_furniture_id);
               $sql_furniture="SELECT * FROM type_furniture order by furniture_id ASC"; 
               $result_furniture=$conn->query($sql_furniture);
                   
               while($rs_furniture=$result_furniture->fetch_assoc()) { 

                $furniture_id=$rs_furniture['furniture_id'];
                $furniture_name=$rs_furniture['furniture_name']; 
                $furniture_name_en=$rs_furniture['furniture_name_en'];
                                
                    if (in_array($furniture_id, $selected_furniture_id)){ 
                          $detail_en.="-".$furniture_name_en." <br />"; 
                    }
               }   

        }

               $detail_en.="<br />"; 

                $project_facilities_en=nl2br($project_facilities_en);
                $project_facilities_en=str_replace("\n"," ",$project_facilities_en,$count);                
                $project_facilities_en=str_replace(chr(13)," ",$project_facilities_en,$count);    
                $project_facilities_en=str_replace("–","-",$project_facilities_en,$count);  
                $project_facilities_en=trim($project_facilities_en);

                $project_nearby_places_en=nl2br($project_nearby_places_en);
                $project_nearby_places_en=str_replace("\n"," ",$project_nearby_places_en,$count);
                $project_nearby_places_en=str_replace(chr(13)," ",$project_nearby_places_en,$count);    
                $project_nearby_places_en=str_replace("–","-",$project_nearby_places_en,$count);  
                $project_nearby_places_en=trim($project_nearby_places_en);

            $detail_en.="Common Facilities : " ." <br />";
            $detail_en.=$project_facilities_en." <br /><br />";
            $detail_en.="Nearby Facilities :  <br />";
            $detail_en.=$project_nearby_places_en." <br /><br />";
            $detail_en.="Zone :   <br />";
            $detail_en.= $ex_list_zone_en." <br /><br />";
            $detail_en.="**Free consultation! seeking to buy/sell/rent properties in Thailand** <br />";
            $detail_en.="Interested please contact : <br />";
            $detail_en.="CONNEX PROPERTY | Connect you to your wished property  <br />";
            $detail_en.="Call: 099-019-9900  <br />";
            $detail_en.="E-Mail: info@connexproperty.co.th  <br />";
            $detail_en.="Facebook: Connex Property <br />";
            $detail_en.="LINE OA: @connexproperty <br />";
            $detail_en.=" Whatsapp: +66 99 019 9900 <br />";
            $detail_en.="Wechat ID : wxid_idbemm7t5gbj22 <br />";
            $detail_en.="https://connex.in.th/ <br /><br />";
            $detail_en.="update : ".$date_update."<br />";

 /////////////////////////// END เนื้อหาข้อมูล ภาษาอังกฤษ ///////////////////////


$data .= '{'."\n";
            $data.='  "refNo": "'.$ex_list_listing_code.'",'."\n";     
            $data.='  "propertyType": "'.$name_propertyhub.'",'."\n";   
            $data.='  "postType": "'.$deal_type_check.'",'."\n";
            $data.='  "status": "ACTIVE",'."\n";
            $data.='  "title": { '."\n";
            $data.='    "th": "🔥'.$ex_list_heading.'",'."\n";
            $data.='    "en": "🔥'.$ex_list_heading_en.'"'."\n";
            $data.='  }, '."\n";
            $data.='  "location": { '."\n";
            $data.='    "projectId": "'.$project_propertyhub_id.'",'."\n";   
            $data.='    "projectName": "'.$project_propertyhub_name.'",'."\n"; 
            $data.='    "homeAddress": "" ,'."\n"; 
            $data.='    "soi": "", '."\n"; 
            $data.='    "road": "", '."\n"; 
            $data.='    "provinceCode": "", '."\n";
            $data.='    "districtCode": "", '."\n";
            $data.='    "subDistrictCode": "", '."\n";     
            $data.='    "postCode": "", '."\n";
            $data.='   "lat": "", '."\n";
            $data.='   "lng": "" '."\n";
            $data.='  }, '."\n";
            $data.='  "onFloor": "'.$ex_list_floor.'",'."\n";
            $data.='  "landArea": null ,'."\n";
            $data.='  "floorArea": '.$ex_list_sqm.','."\n";
            $data.='  "roomType": "'.$roomType.'",'."\n"; 
            $data.='  "roomNumber": "",'."\n";
            $data.='  "roomHomeAddress": "",'."\n";
            $data.='  "numberOfBed": '.$ex_list_bedroom.','."\n";
            $data.='  "numberOfBath": '.$ex_list_bathroom.','."\n";
            $data.='  "numberOfFloor": null ,'."\n";
            $data.='  "facingDirection": "'.$direction.'",'."\n"; 
            $data.='  "price": { '."\n";

            $data.='    "forSale": { '."\n";
            $data.='      "priceType": "AMOUNT" , '."\n";
            $data.='      "price": '.$ex_list_price."\n"; 
            $data.='    } '."\n";

            $data.='  }, '."\n";
            $data.='  "detail": { '."\n";
            $data.='     "th": "'.$detail.'",'."\n";   
            $data.='     "en": "'.$detail_en.'"'."\n";   
            $data.='  }, '."\n";
            $data.='  "amenities": { '."\n";
            $data.='     "allowPet": false ,'."\n";
            $data.='     "hasAirCondition": false ,'."\n";
            $data.='     "hasRefrigerator": false ,'."\n";
            $data.='     "hasTV": false ,'."\n";
            $data.='     "hasWaterHeater": false ,'."\n";
            $data.='     "hasDigitalDoorLock": false ,'."\n";
            $data.='     "hasHotTub": false ,'."\n";
            $data.='     "hasKitchenHood": false ,'."\n";
            $data.='     "hasKitchenStove": false ,'."\n";
            $data.='     "hasWasher": false '."\n";
            $data.='  }, '."\n";
            $data.='  "pictures": { '."\n";
            $data.='     "listing": [ '."\n";

   $img=0;
  foreach ($url_img_listing as $url_img_lists) {  $img++; 
      if($img==1){
            $data.='       "'.$url_img_lists.'"';  
      }else{
            $data.=','."\n".'       "'.$url_img_lists.'"'; 
      } 
  }
            $data.='   ]'."\n";
            $data.=' }, '."\n";
            $data.=' "updatedAt" : "'.$time_check.'" ,'."\n";
            $data.=' "tagName" : ["CONNEX"]'."\n";
            $data.='} '."\n";
            $data.=', '."\n";

          } //END  result

      } //END  listing





 /////////////////////////////////////////////////////////////// FOR RENT  ///////////////////////////////////////////////////////////////

        $i2=0;
 

         $sql="SELECT * FROM dbo_data_excel_listing
               WHERE  ex_list_propertyhub='1' and ex_list_close='0' and ex_list_listing_type='1'and ex_list_deal_type='2'  and ex_list_floor!=''   
               order by ex_list_propertyhub_date DESC , ex_list_date_update DESC  LIMIT 2000  ";  
         $result = $conn->query($sql); 
         $count_num=$result->num_rows;

     if($result->num_rows > 0) {  // result
        // output data of each row
         while($rs_listing=$result->fetch_assoc()) {   $i2++;  // rs_listing

         
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
         $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
         $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en']; 

         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];
         $ex_list_proppit=$rs_listing['ex_list_proppit'];

         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $project_id=$rs_listing['project_id'];
         $ex_list_no_images=$rs_listing['ex_list_no_images'];
         $ex_list_img_number=$rs_listing['ex_list_img_number'];

         $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
         $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

         if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." ตร.ม.";   $ex_list_sqm_en=$ex_list_sqm." sqm";   $ex_list_sqm_p=$ex_list_sqm;   }
         if($ex_list_bedroom!=''){ 
                 if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio"; $ex_list_bedroom_en="Studio"; 
                 }else{  $ex_list_bedroom_th=$ex_list_bedroom." ห้อง";    $ex_list_bedroom_en=$ex_list_bedroom." Room"; }
         }
         if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom." ห้อง";  $ex_list_bathroom_en=$ex_list_bathroom." Room";   }
         if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
         if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น";  $ex_list_total_floors_en=$ex_list_total_floors."";}

        if($ex_list_deal_type=='1'){ 
              $ex_list_deal_type="ขาย"; 
              $ex_list_deal_type_p='sale';  
              $ex_list_deal_type_en="FOR SELL"; 

              $deal_type_check="FOR_SALE";

         }else{

              $ex_list_deal_type="เช่า"; 
              $ex_list_deal_type_en="FOR RENT";  $ex_list_deal_type_p='rent'; 
              $deal_type_check="FOR_RENT";
         }
       
         if($ex_list_bedroom=='0'){
              $roomType="STUDIO";
         }else if($ex_list_bedroom=='1'){
              $roomType="ONE_BED_ROOM";
         }else if($ex_list_bedroom=='2'){
              $roomType="TWO_BED_ROOM";
         }else if($ex_list_bedroom=='3'){
              $roomType="THREE_BED_ROOM";
         }else if($ex_list_bedroom=='4'){
              $roomType="FOUR_BED_ROOM";
         }else if($ex_list_bedroom=='5'){
              $roomType="FIVE_BED_ROOM";
         }else if($ex_list_bedroom=='6'){
              $roomType="SIX_BED_ROOM";
         }
  

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
         $project_latitude=$rs_projects['project_latitude'];
         $project_longitude=$rs_projects['project_longitude'];

         $project_proppit_name=$rs_projects['project_proppit_name'];
         $project_proppit_name_en=$rs_projects['project_proppit_name_en'];
         $project_proppit_latitude=$rs_projects['project_proppit_latitude'];
         $project_proppit_longitude=$rs_projects['project_proppit_longitude'];

         $project_propertyhub_id=$rs_projects['project_propertyhub_id'];
         $project_propertyhub_name=$rs_projects['project_propertyhub_name'];

         $zone_id=$rs_projects['zone_id'];

         if($rs_projects['project_id']!=''){  // project_id NO
        
                 $ex_list_listing_type=$project_type;
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
                 $ex_list_latitude=$project_latitude;
                 $ex_list_longitude=$project_longitude;
                 $ex_list_listing_type_check=$project_type;



                 $ex_list_project=$project_name." | ".$project_name_en; 

                 if($ex_list_listing_type=='1' or $ex_list_total_floors=='' or $ex_list_total_floors=='0'){
                            
                              
                                        $ex_list_total_floors_th=$project_total_floors." ชั้น";  
                                        $ex_list_total_floors_en=$project_total_floors.""; 
                             
                 } 

            }  // END project_id NO


          if($project_id!='0'){ 

                 $ex_list_project=$project_name;
                 $ex_list_project_en=$project_name_en;


          }else{                 
                 $ex_list_project=$ex_list_listing_name;
                 $ex_list_project_en=$ex_list_listing_name_en;

                 $project_name_en=$ex_list_listing_name;
          }


          if($ex_list_latitude==''){

               $ex_list_latitude='13.771355';
               $ex_list_longitude='100.5958781';
          }
 
 
           if($ex_list_sqm_p==''){
               $ex_list_sqm_p='00';
           }


           if($ex_list_bedroom=='0'){

                 $ex_list_bedroom='1';
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
                     
                     $address=$project_alley." ".$project_road." แขวง".$project_subdistrict." เขต".$project_district." ".$project_province." ".$zip_code;

                     $address_en=$project_alley_en."".$project_road_en." , ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code;

               }else{

                       $address=$project_alley." ".$project_road." ตำบล".$project_subdistrict." อำเภอ".$project_district." จังหวัด".$project_province." ".$zip_code;

                      $address_en=$project_alley_en." ".$project_road_en." , ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code; 
               }

                     $address=trim($address);  
                     $address_en=trim($address_en);  
 

    if($ex_list_img_number!='0'){
            
             $img_no=0;
             $url_img_listing='';
             $url_img_listing = [];       
                    
        if($ex_list_no_images!='1'){ // เช็คว่าโพสต์ภาพได้

             $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC ";
             $result_img = $conn->query($sql_img); 
                // output data of each row 



             while($rs_img=$result_img->fetch_assoc()){  $img_no++; $i++;
             
                  $img_folder=$rs_img['listing_img_folder']; 
                  $image_name=$rs_img['listing_img_name']; 
                  $img_folder=str_replace("../../","https://connex.in.th/images/",$img_folder,$count);

                  if($img_folder!=''){ 
                        $img_folder=$img_folder.''.$image_name;  
                        $img_folders=$img_folder;
                  }else{ 
                        $img_folder='https://connex.in.th/images/listing/'.$ex_list_listing_code.'/'.$image_name; 
                        $img_folders="";
                                         
                  }
 
                       $url_img_listing[$i]=$img_folder;   

              } 
         }// END เช็คว่าโพสต์ภาพได้
         else{


             $sql_img_project="SELECT * FROM type_project_img where project_id='$project_id' order by project_img_no ASC "; 
             $result_img_project=$conn->query($sql_img_project); 
             while($rs_img_project=$result_img_project->fetch_assoc()){  $img_no++; $i++;

                 $project_img_folder=$rs_img_project['project_img_folder'];
                 $project_img_name=$rs_img_project['project_img_name'];
                 $project_img_id=$rs_img_project['project_img_id'];  

                 $img_folder="https://connex.in.th/images/project/$project_id/".$project_img_name; 

                           $url_img_listing[$i]=$img_folder;   
             }
          
         }

     }  



      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ 

                $ex_list_listing_type=$rs_ass['name'];   $ex_list_listing_type_en=$rs_ass['name_en'];   
                $name_propertyhub=$rs_ass['name_propertyhub'];

                 if($rs_ass['id']=='2') {

                     $ex_list_listing_type_p="house";   
                     $ex_list_listing_type_en="house";

                 }else if($rs_ass['id']=='4'){

                     $ex_list_listing_type_p="townhouse"; 
                     $ex_list_listing_type_en="townhouse"; 

                 }else{

                     $ex_list_listing_type_p=$ex_list_listing_type_en;                  
                 }


            }

            if($ex_list_listing_type!='1'){


                $ex_list_rai=$ex_list_rai*1600;
                $ex_list_ngan=$ex_list_ngan*400;
                $ex_list_wa=$ex_list_wa*4;

                $ex_list_sqm_p=$ex_list_rai+$ex_list_ngan+$ex_list_wa; 

            }
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
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

 

             if($ex_list_direction!=''){

           /////////// ทิศ ////////////////

                 $sql_direction="SELECT * FROM  type_direction where direction_id='$ex_list_direction' ";  
                 $result_direction= $conn->query($sql_direction);
                 $rs_direction=$result_direction->fetch_assoc();

                 $direction_name_th=$rs_direction['direction_name_th'];
                 $direction_name_en=$rs_direction['direction_name_en'];

                 $direction=strtoupper($direction_name_en);

            }

 

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
 
             $ex_list_heading_shot=$ex_list_deal_type.$ex_list_listing_type." ".$project_name ;
        

 /////////////////////////// เนื้อหาข้อมูล ภาษาไทย ///////////////////////

        if($ex_list_project!=''){   
            $ex_list_project=trim($ex_list_project);   
            $detail="โครงการ : ".$ex_list_project."<br />";
        }else{
            $detail="".$ex_list_project."<br />";
        }
            $detail.="ที่ตั้ง : ".$address."<br />";
            $detail.="พิกัด : ".$ex_list_googlmap."<br />";
       
       if($ex_list_train_station!='' and $ex_list_train_station!='0'){                           
            $detail.="สถานีรถไฟฟ้า : ".$ex_list_train_station."<br /><br />";
         }         
            $detail.="รหัสทรัพย์ : ".$ex_list_listing_code."<br />";
            $detail.="ราคา".$ex_list_deal_type." : ".number_format($ex_list_price)."<br /><br />";
            $detail.="ประเภท : ".$ex_list_listing_type."<br />";
            $detail.="จำนวนชั้น : ".$ex_list_total_floors_th."<br />";

        if($ex_list_listing_type_check=='1'){ 
            $detail.="ตั้งอยู่ชั้นที่ : ".$ex_list_floor."<br />";
        }
        if($ex_list_listing_type_check!='1'){ 
            $detail.="พื้นที่ : ".$area_th."<br />";
        }
            $detail.="พื้นที่ใช้สอย : ".$ex_list_sqm_th." <br />";
            $detail.="ห้องนอน : ".$ex_list_bedroom_th."<br />";
            $detail.="ห้องน้ำ : ".$ex_list_bathroom_th."<br />";
            $detail.="ห้องอื่นๆ : ".$ex_list_other_room."<br />";
        if($ex_list_parking!=''){
            $detail.="ที่จอดรถ : ".$ex_list_parking."<br />";
        }
        if($ex_list_direction!=''){
            $detail.="ทิศ : ".$ex_list_direction."<br />";
        }

        $detail.="<br />";

        if($type_strengths_id!=''){  

             $detail.="จุดเด่น : "."<br />";
            
        }
  
           $selected_type_strengths_id = explode(',', $type_strengths_id);

           $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
           $result_strengths=$conn->query($sql_strengths);
                   
           while($rs_strengths=$result_strengths->fetch_assoc()) { 
                  $strengths_id=$rs_strengths['strengths_id'];
                  $strengths_name=$rs_strengths['strengths_name'];
                  $strengths_name_en=$rs_strengths['strengths_name_en'];
               if (in_array($strengths_id, $selected_type_strengths_id)){ 

                     $detail.="-".$strengths_name."<br />";
              }

           }
 
 
            $detail.=" ";   
  

        if($ex_list_furniture_id!=''){

               
               
               $detail.="เฟอร์นิเจอร์ : "."<br />";
 
           // if($ex_list_furniture!=''){  $detail.="".$ex_list_furniture." <br />"; }

               $selected_furniture_id = explode(',', $ex_list_furniture_id);
               $sql_furniture="SELECT * FROM type_furniture order by furniture_id ASC"; 
               $result_furniture=$conn->query($sql_furniture);
                   
               while($rs_furniture=$result_furniture->fetch_assoc()) { 

                $furniture_id=$rs_furniture['furniture_id'];
                $furniture_name=$rs_furniture['furniture_name']; 
                $furniture_name_en=$rs_furniture['furniture_name_en'];
                                
                    if (in_array($furniture_id, $selected_furniture_id)){ 
                          $detail.="-".$furniture_name." <br />"; 

                    }
               }   

        }
           
               $detail.="<br />"; 

                $ex_list_facilities=nl2br($ex_list_facilities);
                $ex_list_facilities=str_replace("\n"," ",$ex_list_facilities,$count);                
                $ex_list_facilities=str_replace(chr(13)," ",$ex_list_facilities,$count);    
                $ex_list_facilities=str_replace("–","-",$ex_list_facilities,$count);   
                $ex_list_facilities=trim($ex_list_facilities);

                $ex_list_nearby_places=nl2br($ex_list_nearby_places);
                $ex_list_nearby_places=str_replace("\n"," ",$ex_list_nearby_places,$count);
                $ex_list_nearby_places=str_replace(chr(13)," ",$ex_list_nearby_places,$count); 
                $ex_list_nearby_places=str_replace("–","-",$ex_list_nearby_places,$count); 
                $ex_list_nearby_places=trim($ex_list_nearby_places);

            $detail.="สิ่งอำนวยความสะดวก : " ." <br />";
            $detail.=$ex_list_facilities." <br /><br />";
            
            $detail.="ทำเลดี สถานที่ใกล้เคียง :  <br />";
            $detail.=$ex_list_nearby_places." <br /><br />"; 
            $detail.="โซนพื้นที่ :   <br />";
            $detail.= $ex_list_zone." <br /><br />";
            $detail.="**บริการปรึกษาสินเชื่อฟรี! ดอกเบี้ยพิเศษ และ วงเงินกู้สูงสุด 90-100% ของราคาประเมิน** <br />";
            $detail.="สอบถามข้อมูลเพิ่มเติม ติดต่อ <br />";
            $detail.="CONNEX PROPERTY สนใจซื้อ-ขายบ้าน ปรึกษาฟรี! ทีมงานมืออาชีพ  <br />";
            $detail.="Call: 099-019-9900  <br />";
            $detail.="E-Mail: info@connexproperty.co.th  <br />";
            $detail.="Facebook: Connex Property <br />";
            $detail.="LINE OA: @connexproperty <br />";
            $detail.="Whatsapp: +66 99 019 9900 <br />";
            $detail.="Wechat ID : wxid_idbemm7t5gbj22 <br />";
            $detail.="https://connex.in.th/ <br />";
            $detail.="update : ".$date_update."<br />";

 /////////////////////////// END  เนื้อหาข้อมูล ภาษาไทย ///////////////////////


 /////////////////////////// เนื้อหาข้อมูล ภาษาอังกฤษ ///////////////////////
        if($ex_list_project_en!=''){  
            $ex_list_project_en=trim($ex_list_project_en);
            $detail_en="Project : ".$ex_list_project_en."<br />";
        }else{
            $detail_en="".$ex_list_project_en."<br />"; 
        }
            $detail_en.="Location area: ".$address_en."<br />";
            $detail_en.="GPS : ".$ex_list_googlmap." <br />";
       
       if($ex_list_train_station!='' and $ex_list_train_station!='0'){                           
            $detail_en.="Station : ".$ex_list_train_station_en." <br />";
         }         
            $detail_en.="Listing ID : ".$ex_list_listing_code." <br />";
            $detail_en.=$ex_list_deal_type_en." : ".number_format($ex_list_price)." ฿ <br /><br />";
            $detail_en.="Property type : ".$ex_list_listing_type_en." <br />";
            $detail_en.="No of floors : ".$ex_list_total_floors_en." <br />";

        if($ex_list_listing_type_check=='1'){ 
            $detail_en.="Floor : ".$ex_list_floor." <br />";
        }
        if($ex_list_listing_type_check!='1'){ 
            $detail_en.="Area : ".$area_en." <br />";
        }
            $detail_en.="Usable area  : ".$ex_list_sqm_en." <br />";
            $detail_en.="No. of Bedroom ".$ex_list_bedroom_en." <br />";
            $detail_en.="No. of Bathroom : ".$ex_list_bathroom_en." <br />";
            $detail_en.="Other : ".$ex_list_other_room." <br />";
        if($ex_list_parking!=''){
            $detail_en.="Parking : ".$ex_list_parking." <br />";
        }
        if($ex_list_direction!=''){
            $detail_en.="Direction : ".$ex_list_direction."<br />";
        }

            $detail_en.="<br />";

        if($type_strengths_id!=''){  

           $detail_en.="Highlights :"."<br />";

        }
  
           $selected_type_strengths_id = explode(',', $type_strengths_id);

           $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
           $result_strengths=$conn->query($sql_strengths);
                   
           while($rs_strengths=$result_strengths->fetch_assoc()) { 
                  $strengths_id=$rs_strengths['strengths_id'];
                  $strengths_name=$rs_strengths['strengths_name'];
                  $strengths_name_en=$rs_strengths['strengths_name_en'];
               if (in_array($strengths_id, $selected_type_strengths_id)){ 

                     $detail_en.="-".$strengths_name_en."<br />";
              }

           } 
 
            $detail_en.="<br />"; 
  
 
        if($ex_list_furniture_id!=''){
        
            $detail_en.="Furniture :  "."<br />";
            if($ex_list_furniture!=''){  

  
                
             }

               $selected_furniture_id = explode(',', $ex_list_furniture_id);
               $sql_furniture="SELECT * FROM type_furniture order by furniture_id ASC"; 
               $result_furniture=$conn->query($sql_furniture);
                   
               while($rs_furniture=$result_furniture->fetch_assoc()) { 

                $furniture_id=$rs_furniture['furniture_id'];
                $furniture_name=$rs_furniture['furniture_name']; 
                $furniture_name_en=$rs_furniture['furniture_name_en'];
                                
                    if (in_array($furniture_id, $selected_furniture_id)){ 
                          $detail_en.="-".$furniture_name_en." <br />"; 
                    }
               }  
        }  

               $detail_en.="<br />"; 

                $project_facilities_en=nl2br($project_facilities_en);
                $project_facilities_en=str_replace("\n"," ",$project_facilities_en,$count);                
                $project_facilities_en=str_replace(chr(13)," ",$project_facilities_en,$count);    
                $project_facilities_en=str_replace("–","-",$project_facilities_en,$count);  
                $project_facilities_en=trim($project_facilities_en);

                $project_nearby_places_en=nl2br($project_nearby_places_en);
                $project_nearby_places_en=str_replace("\n"," ",$project_nearby_places_en,$count);
                $project_nearby_places_en=str_replace(chr(13)," ",$project_nearby_places_en,$count);  
                $project_nearby_places_en=str_replace("–","-",$project_nearby_places_en,$count);  
                $project_nearby_places_en=trim($project_nearby_places_en);

            $detail_en.="Common Facilities : " ." <br />";
            $detail_en.=$project_facilities_en." <br /><br />";
           
            $detail_en.="Nearby Facilities :  <br />";
            $detail_en.=$project_nearby_places_en." <br /><br />";  
            $detail_en.="Zone :   <br />";
            $detail_en.= $ex_list_zone_en." <br /><br />";
            $detail_en.="**Free consultation! seeking to buy/sell/rent properties in Thailand** <br />";
            $detail_en.="Interested please contact : <br />";
            $detail_en.="CONNEX PROPERTY | Connect you to your wished property  <br />";
            $detail_en.="Call: 099-019-9900  <br />";
            $detail_en.="E-Mail: info@connexproperty.co.th  <br />";
            $detail_en.="Facebook: Connex Property <br />";
            $detail_en.="LINE OA: @connexproperty <br />";
            $detail_en.=" Whatsapp: +66 99 019 9900 <br />";
            $detail_en.="Wechat ID : wxid_idbemm7t5gbj22 <br />";
            $detail_en.="https://connex.in.th/ <br /><br />";
            $detail_en.="update : ".$date_update."<br />";

 /////////////////////////// END เนื้อหาข้อมูล ภาษาอังกฤษ ///////////////////////
   
$data .= '{'."\n";
            $data.='  "refNo": "'.$ex_list_listing_code.'",'."\n";     
            $data.='  "propertyType": "'.$name_propertyhub.'",'."\n";   
            $data.='  "postType": "'.$deal_type_check.'",'."\n";
            $data.='  "status": "ACTIVE",'."\n";
            $data.='  "title": { '."\n";
            $data.='     "th": "🔥'.$ex_list_heading.'",'."\n";
            $data.='     "en": "🔥'.$ex_list_heading_en.'"'."\n";
            $data.='  }, '."\n";
            $data.='  "location": { '."\n";
            $data.='     "projectId": "'.$project_propertyhub_id.'",'."\n";   
            $data.='     "projectName": "'.$project_propertyhub_name.'",'."\n"; 
            $data.='     "homeAddress": "" ,'."\n"; 
            $data.='     "soi": "", '."\n"; 
            $data.='     "road": "", '."\n"; 
            $data.='     "provinceCode": "", '."\n";
            $data.='     "districtCode": "", '."\n";
            $data.='     "subDistrictCode": "", '."\n";     
            $data.='     "postCode": "", '."\n";
            $data.='     "lat": "", '."\n";
            $data.='     "lng": "" '."\n";
            $data.='  }, '."\n";
            $data.='  "onFloor": "'.$ex_list_floor.'",'."\n";
            $data.='  "landArea": null ,'."\n";
            $data.='  "floorArea": '.$ex_list_sqm.','."\n";
            $data.='  "roomType": "'.$roomType.'",'."\n"; 
            $data.='  "roomNumber": "",'."\n";
            $data.='  "roomHomeAddress": "",'."\n";
            $data.='  "numberOfBed": '.$ex_list_bedroom.','."\n";
            $data.='  "numberOfBath": '.$ex_list_bathroom.','."\n";
            $data.='  "numberOfFloor": null ,'."\n";
            $data.='  "facingDirection": "'.$direction.'",'."\n"; 
            $data.='  "price": { '."\n";    
            $data.='    "forRent": { '."\n";
            $data.='       "priceType": "AMOUNT" , '."\n";
            $data.='       "price": '.$ex_list_price.','."\n"; 
            $data.='       "advancePayment": { '."\n";
            $data.='           "type": "MONTH" , '."\n";
            $data.='           "month": 1  '."\n";
            $data.='       }, '."\n";
            $data.='       "deposit": { '."\n";
            $data.='           "type": "MONTH" , '."\n";
            $data.='           "month": 1  '."\n";
            $data.='       } '."\n";    
            $data.='    } '."\n";  
            $data.='  }, '."\n";
            $data.='  "detail": { '."\n";
            $data.='     "th": "'.$detail.'",'."\n";   
            $data.='     "en": "'.$detail_en.'"'."\n";   
            $data.='  }, '."\n";
            $data.='  "amenities": { '."\n";
            $data.='     "allowPet": false ,'."\n";
            $data.='     "hasAirCondition": false ,'."\n";
            $data.='     "hasRefrigerator": false ,'."\n";
            $data.='     "hasTV": false ,'."\n";
            $data.='     "hasWaterHeater": false ,'."\n";
            $data.='     "hasDigitalDoorLock": false ,'."\n";
            $data.='     "hasHotTub": false ,'."\n";
            $data.='     "hasKitchenHood": false ,'."\n";
            $data.='     "hasKitchenStove": false ,'."\n";
            $data.='     "hasWasher": false '."\n";
            $data.='  }, '."\n";
            $data.='  "pictures": { '."\n";
            $data.='     "listing": [ '."\n";

   $img=0;
  foreach ($url_img_listing as $url_img_lists) {  $img++; 
      if($img==1){
            $data.='         "'.$url_img_lists.'"';  
      }else{
            $data.=','."\n".'     "'.$url_img_lists.'"'; 
      } 
  }
            $data.='      ]'."\n";
            $data.='  }, '."\n";
            $data.='  "updatedAt" : "'.$time_check.'" ,'."\n";
            $data.='  "tagName" : ["CONNEX"]'."\n";
      if($i2==$count_num){
            $data.=' } '."\n";
      }else{
            $data.=' } '."\n";  
            $data.=' , '."\n";
      }
 

          } //END  result

      } //END  listing

$data.= ']'."\n";
$data.= '}'."\n"; 


 echo ini_get("memory_limit")."\n <br>";

$f = fopen( '../rss_propertyhub.json' , 'w' ); //ส่วนของการสร้างไฟล์ XML
fputs( $f , $data );
fclose( $f );



 echo '<script type="text/javascript">alert("Record Update successfully");</script>';
 echo("<script> top.location.href='../?page=feed_file'</script>"); 




?>
