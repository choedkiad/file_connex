

<style type="text/css">
    

    div.dataTables_wrapper div.dataTables_filter input {
      margin-left: 10px;
      display: inline-block;
      width: 300px;
    }

    div.dataTables_wrapper div.dataTables_filter{

      text-align: left;
    }
</style>


<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>


	 <?php
if($_SESSION['OWNER_TEL']=='1'){  
   echo("<script> top.location.href='?page=deal_buyer&page_no=1'</script>");  
}



     
      $date_=date("Y-m-d H:i:s");
      $calExpireDate=date ("Y-m-d", strtotime("+15 day", strtotime($date_)));

      $check_date=date("Y-m-d H:i:s");
    											// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;
		 $sql="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$listing'  order by ex_list_id  DESC LIMIT 1";
		 $result = $conn->query($sql); 
    	  // output data of each row
         $rs_listing = $result->fetch_assoc();

         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_type_first=$rs_listing['ex_list_listing_type_first'];
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
         $ex_list_view=$rs_listing['ex_list_view'];
         $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
         $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
         $ex_list_other_room=$rs_listing['ex_list_other_room'];
         $ex_list_parking=$rs_listing['ex_list_parking'];
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

         $ex_list_facilities=$rs_listing['ex_list_facilities'];
         $ex_list_common_facilities=$rs_listing['ex_list_common_facilities'];
         $ex_list_nearby_places=$rs_listing['ex_list_nearby_places'];
         $ex_list_nearby_places_en=$rs_listing['ex_list_nearby_places_en'];
         $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];

         $ex_list_rent_till_note=$rs_listing['ex_list_rent_till_note'];
         $ex_list_no_images=$rs_listing['ex_list_no_images'];

         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];


         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $project_id=$rs_listing['project_id'];

         $ex_list_bargain=$rs_listing['ex_list_bargain'];
         $ex_list_bargain_date=$rs_listing['ex_list_bargain_date'];
         $ex_list_pm_status=$rs_listing['ex_list_pm_status'];
         $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
         $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en'];

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

        if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";  $ex_list_deal_type_en="FOR SELL"; }else{$ex_list_deal_type="เช่า"; $ex_list_deal_type_en="FOR RENT";}

        if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']==$ex_list_contact ){ $ex_list_house_number=$ex_list_house_number; }else{ $ex_list_house_number=" "; }
 
         if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  }
         else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
         else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }

         $sql_projects="SELECT * FROM type_project where project_id='$project_id' order by project_id  ASC  LIMIT 1"; 
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




             if($rs_projects['project_id']!=''){  // project_id NO
        
 
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
 
                 $ex_list_common_facilities=$project_facilities_en;
                 $ex_list_nearby_places_en=$project_nearby_places_en;
                 $zone_id=$rs_projects['zone_id'];

                 if($ex_list_listing_type=='1' or $ex_list_total_floors=='' or $ex_list_total_floors=='0'){
                            
                              
                                        $ex_list_total_floors_th=$project_total_floors." ชั้น";  
                                        $ex_list_total_floors_en=$project_total_floors.""; 
                             
                 } 

                 $ex_list_project=$project_name." | ".$project_name_en; 

            }else{  // END project_id NO

                 $ex_list_project=$ex_list_listing_name." | ".$ex_list_listing_name_en; 

            }

  
                if($ex_list_listing_type_check=='1' or $ex_list_listing_type_check=='13' or $ex_list_listing_type_check=='7'){ // คอนโด
                        
                        $status_type_check='1';

                }else if($ex_list_listing_type_check=='2' or $ex_list_listing_type_check=='3' or $ex_list_listing_type_check=='4' or $ex_list_listing_type_check=='5' or $ex_list_listing_type_check=='6'){ // อาคารพาณิชย์ บ้าน ที่ดิน 
                
                        $status_type_check='2';

                }else if($ex_list_listing_type_check=='12' ){ // ที่ดิน
                
                        $status_type_check='3';

                }       
 


      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$ex_list_province' "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province=$rs_p['provinces_in_thai'];
                $project_province_en=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$ex_list_district' "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district=$rs_d['districts_in_thai'];
                $project_district_en=$rs_d['districts_in_english'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$ex_list_subdistrict' "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $project_subdistrict=$rs_s['subdistricts_in_thai'];
                $project_subdistrict_en=$rs_s['subdistricts_in_english'];
                $zip_code=$rs_s['zip_code'];
               
                if($project_alley_en!=''){  $project_alley_en=" ".$project_alley_en; }
                if($project_road_en!=''){ $project_road_en=" , ".$project_road_en;}

    if($_SESSION['STATUS_ADS']=='1'){  
        
               $ex_list_house_number="";

     }



     $ex_list_house_number="";

               if($province_id=='1'){
                     
                     $address=$ex_list_house_number." ".$project_alley." ".$project_road." แขวง".$project_subdistrict." ".$project_district." ".$project_province." ".$zip_code;

                     $address_en=$ex_list_house_number."".$project_alley_en."".$project_road_en." , ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code;

               }else{

                       $address=$ex_list_house_number." ".$project_alley." ".$project_road." ตำบล".$project_subdistrict." อำเภอ".$project_district." จังหวัด".$project_province." ".$zip_code;

                      $address_en=$ex_list_house_number."".$project_alley_en."".$project_road_en." , ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code; 
               }



      /////////// type_project //////////////// 

      /////////// End type_project ////////////////


      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];   $ex_list_listing_type_en=$rs_ass['name_en']; }
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////
             $sql_train="SELECT  *  FROM type_train_station where station_id='$ex_list_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
             $tr_group=$rs_train['tr_group'];
  
             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];  
                                        
                                        $ex_list_train_station_en=$tr_group."-".$rs_train['station_name_en'];
                                  }
      /////////// End type_train_station ////////////////
  

        /////////// type_direction ทิศ ////////////////
             $sql_direction="SELECT  *  FROM type_direction where direction_id='$ex_list_direction' ";  
             $result_direction= $conn->query($sql_direction);
             $rs_direction=$result_direction->fetch_assoc(); 

             $direction_name_th=$rs_direction['direction_name_th'];
             $direction_name_en=$rs_direction['direction_name_en']; 
   
      /////////// End type_direction ////////////////



        //////////////    ////////////////////////////
             $sql_register="SELECT  *  FROM dbo_register where register_id='$ex_list_contact' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $name_r=$rs_register['register_name'];
             $last_r=$rs_register['register_lastname'];
             $nickname_r=$rs_register['register_nickname'];

             $ex_list_contacts=$name_r." ($nickname_r)";


         if($ex_list_bargain!='' or $ex_list_bargain!='0'){
            
                 $sql_register="SELECT  *  FROM dbo_register where register_id='$ex_list_bargain' ";  
                 $result_register= $conn->query($sql_register);
                 $rs_register=$result_register->fetch_assoc(); 

                 $name_r=$rs_register['register_name'];
                 $last_r=$rs_register['register_lastname'];
                 $nickname_r=$rs_register['register_nickname'];

                 $ex_list_bargain_name=$name_r." ($nickname_r)";

         } 


      

      /////////// type_zone ////////////////
             $sql_zone="SELECT  *  FROM type_zone where zone_id='$zone_id' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc();

             $zone_name=$rs_zone['zone_name'];
             $zone_name_en=$rs_zone['zone_name_en'];


             if($zone_name!=''){ $ex_list_zone=$zone_name;    $ex_list_zone_en=$zone_name_en;    }


        else{  }
 

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

 
      /////////// Check เบอร์ Owner ////////////////
             $sql_owner="SELECT * FROM dbo_contact_owner where  ex_owner_tel_1='$ex_list_contact_tel' or ex_owner_tel_1='$ex_list_contact_tel1_2'
                         or ex_owner_tel_1='$ex_list_contact_tel1_3' or ex_owner_tel_1='$ex_list_contact_tel1_4' or ex_owner_tel_1='$ex_list_contact_tel_2'   
                         or ex_owner_tel_1='$ex_list_contact_tel2_2' or ex_owner_tel_1='$ex_list_contact_tel2_3' or ex_owner_tel_1='$ex_list_contact_tel2_4' ";  
             $result_owner= $conn->query($sql_owner);
             

             if($result_owner->num_rows > 0) { 
                     $owner_ex='lock';
                     $owner='1';
             }  
            
      /////////// End Check เบอร์ Owner  ////////////////
            if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' ){ 
                     $owner_ex='';
            }

      ?>


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6"  >
              <h3 class="d-inline-block d-sm-none"><?php echo $rs['ex_list_heading'];?></h3>
 
              <div class="col-12"   > 
                <div class="row">  
  
                     
                
               

                  <br><br>
        <?php  
    /*
             $OpenDir=opendir("../images/listing/$ex_list_listing_code");
             $File=readdir($OpenDir); 
    
             if($File!=''){

                			$allowed_types=array('jpg','jpeg','gif','png');
                			$dir    ="../images/listing/$ex_list_listing_code/";
                			$files1 = scandir($dir);
                			foreach($files1 as $key=>$value){
                			    if($key>1){
                			        $file_parts = explode('.',$value);
                			        $ext = strtolower(array_pop($file_parts));

                			        if(in_array($ext,$allowed_types)){  

                                  $file_img=$dir.$value;

                        ?>
                                  <div class="col-sm-6">
                                    <a href="#" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                      <img src="<?php echo $dir.$value;?>" class="img-fluid mb-2" alt="white sample"/> 
                                    </a>
                                  </div>

                           
                      <?php   } 
                           }
                       } 
             }else{

                      $url_dir=$ex_list_listing_code." New";
                      $allowed_types=array('jpg','jpeg','gif','png');
                      $dir    ="../images/listing/".$url_dir."/";
                      $files1 = scandir($dir);
                      foreach($files1 as $key=>$value){
                          if($key>1){
                              $file_parts = explode('.',$value);
                              $ext = strtolower(array_pop($file_parts));

                              if(in_array($ext,$allowed_types)){
                        ?>
                                  <div class="col-sm-6">
                                    <a href="#" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                      <img src="<?php echo $dir.$value;?>" class="img-fluid mb-2" alt="white sample"/> 
                                    </a>
                                  </div>
                      <?php   } 
                           }
                       } 

             }  */
   
                ?>
              <?php 

              $sql_list_img="SELECT  *   FROM dbo_data_excel_listing_img where ex_list_listing_code='$listing' order by listing_img_no ASC";
              $result_list_img = $conn->query($sql_list_img);  
              while($rs_list_img=$result_list_img->fetch_assoc()){ $i++; 

                 $listing_img_folder=$rs_list_img['listing_img_folder'];
                 $listing_img_name=$rs_list_img['listing_img_name'];
                 $ex_list_listing_code=$rs_list_img['ex_list_listing_code'];

                 if($listing_img_folder!=''){   
                       $listing_img_name=$listing_img_folder.$listing_img_name;
                 }else{   
                       $listing_img_name="../../images/listing/".$ex_list_listing_code."/".$listing_img_name;  
                 }

                 ?> 
                          <div class="col-sm-6"><center><?php echo $i;?></center>
                              <a href="<?php echo $listing_img_name;?>?v=<?php echo $check_date;?>" target="_blank">
                                 <img src="<?php echo $listing_img_name;?>?v=<?php echo $check_date;?>" class="img-fluid mb-2" alt="<?php echo $ex_list_heading;?>" width="100%"  /> 
                              </a>
                          </div>
        <?php } ?>

              <?php 
        
      

 
          $sql_img="SELECT * FROM type_project_img where project_id='$project_id' and $project_id!='0' order by project_img_no ASC"; 
          $result_img=$conn->query($sql_img);

 
          while($rs_img=$result_img->fetch_assoc()) {   

             $project_img_folder=$rs_img['project_img_folder'];
             $project_img_name=$rs_img['project_img_name'];
             $project_img_id=$rs_img['project_img_id'];

             if($project_img_folder==''){ $project_img_folder="../../images/project/$project_id/"; }

                if($project_img_id!=''){
     ?>  
               <div class="col-md-6" style="margin: 0px;"> 
                 <a  href="<?php echo $project_img_folder.$project_img_name;?>?v=<?php echo $check_date;?>" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery" target="_blank">
                      <center> 
                          <img src="<?php echo $project_img_folder.$project_img_name;?>?v=<?php echo $check_date;?>" width="100%">
                      </center>
                  </a>
               </div>   
    <?php      }
           }  ?>

    
                 </div>
              </div>

 
          
            </div>
                
  
            <div class="col-12 col-sm-6">
 
<SCRIPT LANGUAGE="JavaScript">
   function copyit(field){
  var temp=document.getElementById(field);
  temp.focus();
  temp.select();
  document.execCommand("copy");
}
</SCRIPT> 
 
 
 

 

                           <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">เบอร์</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>


       <?php if($_SESSION['STATUS_ID']==2 or $_SESSION['STATUS_ID']==3 or $_SESSION['STATUS_ID']==4
                or $_SESSION['STATUS_ID']==5 
                or $_SESSION['USER_ID']==$ex_list_contact
                or $status_type_check==1 and $_SESSION['POSITION']==1
                or $status_type_check==2 and $_SESSION['POSITION']==2   ){ ?> 
                       

                           <?php if($_SESSION['STATUS_ADS']!='1' and $owner_ex!='lock' ){ ?>                              
                                

                                <div class="modal-body">
                                         <div class="row" id="p1" style="font-size: 18px;">
                                          <div class="col-12 col-sm-12">
                                              <?php if($owner=='1'){ ?><p style="color: red;"><b>Exclusive Owner</b></p> 

                                                 
                                               <?php } ?>
                                              <h4>Owner/เจ้าของบ้าน คนที่1 </h4>
                                              <b>ผู้ติดต่อ : </b><?php echo $ex_list_contact_name;?><br>
                                              <b>เบอร์ติดต่อ : </b>
<?php 

$useragent=$_SERVER['HTTP_USER_AGENT'];

$status_="/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i";

if(preg_match('$status',substr($useragent,0,4))){ ?>

                             <?php if($ex_list_contact_tel!=''){ ?> <a href="tel:<?php echo $ex_list_contact_tel;?>"><?php echo $ex_list_contact_tel;?></a> 
                                   <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a> <?php } ?> 
                             <?php if($ex_list_contact_tel1_2!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel1_2;?>"><?php echo $ex_list_contact_tel1_2;?></a> 
                                   <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel1_2;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>  
                              <?php } ?>
                             <?php if($ex_list_contact_tel1_3!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel1_2;?>"><?php echo $ex_list_contact_tel1_3;?></a> 
                                   <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel1_3;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                              <?php } ?>
                             <?php if($ex_list_contact_tel1_4!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel1_2;?>"><?php echo $ex_list_contact_tel1_4;?></a> 
                                   <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel1_4;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                              <?php } ?>


<?php }else{ ?>

                             <?php if($ex_list_contact_tel!=''){ ?>  <?php echo $ex_list_contact_tel;?> 
                                   <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a> <?php } ?> 
                             <?php if($ex_list_contact_tel1_2!=''){ ?> ,  <?php echo $ex_list_contact_tel1_2;?> 
                                   <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel1_2;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>  
                              <?php } ?>
                             <?php if($ex_list_contact_tel1_3!=''){ ?> ,  <?php echo $ex_list_contact_tel1_3;?> 
                                   <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel1_3;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                              <?php } ?>
                             <?php if($ex_list_contact_tel1_4!=''){ ?> ,  <?php echo $ex_list_contact_tel1_4;?> 
                                   <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel1_4;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                              <?php } ?>

<?php } ?>


                                              <br>
                                              <b>LINE ผู้ติดต่อ : </b><?php echo $ex_list_contact_lineid;?><br>
                                              <b>Whatsapp</b> <?php echo $ex_list_contact_whatsapp;?><br>
                                              <b>E-Mail : </b><?php echo $ex_list_contact_email;?><br>
                                              <b>FB : </b><?php echo $ex_list_contact_fb;?><br> 
                                          </div> 
                                          <div class="col-12 col-sm-12"><br> 
                                              <h4>Owner/เจ้าของบ้าน คนที่2 </h4>
                                              <b>ผู้ติดต่อ : </b><?php echo $ex_list_contact_name_2;?><br>
                                              <b>เบอร์ติดต่อ : </b> 

<?php 

$status_="/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i";

if(preg_match('$status',substr($useragent,0,4))){ ?>


                             <?php if($ex_list_contact_tel_2!=''){ ?> <a href="tel:<?php echo $ex_list_contact_tel_2;?>"><?php echo $ex_list_contact_tel_2;?></a> 
                                    <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel_2;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                             <?php } ?> 
                             <?php if($ex_list_contact_tel2_2!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel2_2;?>"><?php echo $ex_list_contact_tel2_2;?></a> 
                                    <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel2_2;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                             <?php } ?>
                             <?php if($ex_list_contact_tel2_3!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel2_3;?>"><?php echo $ex_list_contact_tel2_3;?></a> 
                                    <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel2_3;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                             <?php } ?>
                             <?php if($ex_list_contact_tel2_4!=''){ ?> , <a href="tel:<?php echo $ex_list_contact_tel2_4;?>"><?php echo $ex_list_contact_tel2_4;?></a> 
                                    <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel2_4;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                             <?php } ?>

<?php }else{ ?>

                             <?php if($ex_list_contact_tel_2!=''){ ?>  <?php echo $ex_list_contact_tel_2;?>
                                    <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel_2;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                             <?php } ?> 
                             <?php if($ex_list_contact_tel2_2!=''){ ?> , <?php echo $ex_list_contact_tel2_2;?>
                                    <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel2_2;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                             <?php } ?>
                             <?php if($ex_list_contact_tel2_3!=''){ ?> , <?php echo $ex_list_contact_tel2_3;?>
                                    <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel2_3;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                             <?php } ?>
                             <?php if($ex_list_contact_tel2_4!=''){ ?> , <?php echo $ex_list_contact_tel2_4;?>
                                    <a href="?page=upload_file_excel_check&search=<?php echo $ex_list_contact_tel2_4;?>&page_no=1" target="_black">  <img src="img/icon/png/magnifying-glass-3x.png" width="15"></a>
                             <?php } ?>

<?php } ?>



                                              <br>
                                              <b>LINE ผู้ติดต่อ : </b><?php echo $ex_list_contact_lineid_2;?><br>
                                              <b>Whatsapp</b> <?php echo $ex_list_contact_whatsapp_2;?><br>
                                              <b>E-Mail : </b><?php echo $ex_list_contact_email_2;?><br>
                                              <b>FB : </b><?php echo $ex_list_contact_fb_2;?><br> 
                                          </div>         
                                          

                                        </div> 

                                   <?php if($ex_list_other!=''){ ?><br> 

                                           <b>ข้อมูลอ้างอิง : </b> <span style="color: red;"> <?php echo $ex_list_other;?></span>

                                   <?php } ?>

                                   <?php if($ex_list_rent_till_note!=''){ ?><br> 

                                        <b>Remark (status) : </b> <span style="color: red;"> <?php echo $ex_list_rent_till_note;?></span> 

                                   <?php } ?>
                                    
                                    <?php if($ex_list_remark!=''){ ?>
                                                <br><b>Remark : </b><?php echo $ex_list_remark;?>  
                                    <?php } ?>

                                </div>


                            <?php }else{ ?>

                                <div class="modal-body">
                                    <div class="row" id="p1" style="font-size: 18px;">
                                        <div class="col-12 col-sm-12">
                                              
                                              <p>โปรดคลิกปุ่มด้านล่าง เพื่อให้ทีมงานสต๊อกติดต่อห้องให้ หากต้องการติดต่อ owner ท่านนี้</p>
                                              <a onclick="window.open('page/owner_listing_view.php?id=<?php echo $listing;?>', '_blank', 'location=yes,height=500,width=500,scrollbars=yes,status=yes');"style="cursor:pointer;"  class="btn btn-danger"  >คลิกให้สต็อกติดต่อห้องให้</a>
                                        </div>      

                                    </div> 
                                </div>

                            <?php } ?>

       <?php } ?> 
                                <div class="modal-footer justify-content-between">
                                   
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->


                 <!--<input type="button" value="แสดงข้อมูล Owner" onclick="showMessage()">-->
                  <div class="col-12 col-sm-12">  

                         <a href="page/listing_download_img.php?listing=<?php echo $listing;?>"  class="btn btn-danger" target="_black"   >โหลดภาพ</a>    
         
      <?php if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' 
                           or $_SESSION['STATUS_ID']=='5' 
                           or $_SESSION['USER_ID']==$ex_list_contact 
                           or $status_type_check=='1' and $_SESSION['POSITION']=='1' 
                           or $status_type_check=='2' and $_SESSION['POSITION']=='2'  ){ //เช็คสิทธิ์ ?>


   
                         
            <?php if($_SESSION['STATUS_DRAFT']=='1'){ ?> 
                         <a href="page/listing_download_img.php?listing=<?php echo $listing;?>&no=1"  class="btn btn-danger" target="_black"   >ภาพไม่มีลายน้ำ</a>
             <?php } ?>  
 
                         <a href="?page=create_listing&status=edit&id=<?php echo $listing;?>&check=view" target="_blank" class="btn btn-primary  " ><i class="fas fa-plus"></i> แก้ไขข้อมูล</a>   
       

               <?php if($device=='m'){ //ดูเบอร์ผ่าน โทรศัพท์ ?>  


                             <a href="page/owner.php?id=<?php echo $listing;?>" class="btn btn-success " target="_blank"  >  เบอร์ติดต่อ Owner</a>    


                <?php }else{  //ดูเบอร์ผ่าน PC ?>



                         <?php  if($owner_ex!='lock'){   ?> 

                                      <a href="#" class="btn btn-success " data-toggle="modal" data-target="#modal-default" onclick="window.open('include/process_status_public.php?id=<?php echo $listing;?>&status=tel', '_blank', 'location=yes,height=1,width=1,scrollbars=yes,status=yes');"  >  เบอร์ติดต่อ Owner</a> 
                                  
                            <?php }else{ ?> 

                                      <a href="#" class="btn btn-success " data-toggle="modal" data-target="#modal-default" >  เบอร์ติดต่อ Owner</a> 

                             <?php }  ?>
                                       

                <?php } ?>




            

      <?php }//เช็คสิทธิ์  ?>                      


              <a onclick="window.open('page/deal_listing_view.php?id=<?php echo $listing;?>', '_blank', 'location=yes,height=750,width=900,scrollbars=yes,status=yes');"style="cursor:pointer;"  class="btn btn-danger"  >นำเสนอห้อง</a>
                                 </div> 
                 <br>


             <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="ff" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">ภาษาไทย</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">English</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                   

                    <div class="row"  >

             <?php if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' ){  ?>

                        <div class="col-sm-12">             
                             <p><input type="text"  id="url" style="width: 100%;"  onfocus="javascript:this.select();" value="https://connex.in.th/property/th/<?php echo $ex_list_listing_code;?>"  > </p>
                        </div>
                        
                        <div class="col-sm-4">      
                             <a href="#" rel="noopener"   class="btn btn-default" onclick="copyit('url');" ><i class="fas fa-print"></i> Copy link</a>
                             <a href="page/upload_file_excel_check_view_print.php?listing=<?php echo $listing;?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> 
                        </div>

             <?php }else if($_GET['deal']=='view'){  ?>
 

                        <div class="col-sm-12">             
                             <p><input type="text"  id="url" style="width: 100%;"  onfocus="javascript:this.select();" value="https://connex.in.th/property/th/<?php echo $ex_list_listing_code;?>"  > </p>
                        </div>
                        
                        <div class="col-sm-6">      
                             <a href="#" rel="noopener"   class="btn btn-default" onclick="copyit('url');" ><i class="fas fa-print"></i> Copy link</a>
                             <a href="page/upload_file_excel_check_view_print.php?listing=<?php echo $listing;?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> 
                        </div>

             <?php } ?>




                        <div class="col-sm-6">     
                              <?php if($ex_list_pm_status=='2'){   $ex_list_bargain_date  ?>     
                                     <span class="right badge badge-danger">ห้อง PM</span>
                                     <span style="font-size: 14px;"><?php echo " วันอนุมัติ : ".$ex_list_bargain_date;?></span>
                              <?php  } ?>   

                              <?php if($ex_list_no_images=='1'){ ?> 
                                     <br><b style="color: red; "> <i class="fa fa-window-close" aria-hidden="true"></i> ไม่อนุญาตให้โพสต์รูปภาพในห้อง </b>   
                              <?php  } ?>         

                              <?php if($ex_list_listing_type_first=='1'){ ?>     
                                     <br><span class="right badge badge-success">มือ1</span> 
                              <?php  } ?>   

                        </div> 
                    </div> 

                      <h3 class="my-3"><?php echo $ex_list_heading;?></h3>
                

                      <hr>
                      <h4>รายละเอียด</h4>
                      <p>
                   <?php if($project_id!='0' ) { ?>

                        <b>โครงการ : </b> <?php echo $ex_list_project;?><br>

                    <?php }else{ ?>
                        
                        <b>ชื่อเรียกทรัพย์ : </b> <?php echo $ex_list_project;?><br>

                    <?php } ?>

                        <b>ที่ตั้ง :  </b> <?php echo $address;?><br>
                        <b>พิกัด :  </b><a href="<?php echo $ex_list_googlmap;?>" target="_black"><?php echo $ex_list_googlmap;?></a><br>
                       
            <?php if($ex_list_video!='' and $ex_list_video!='0'){ ?>
                        <b>วีดีโอ :  </b><a href="<?php echo $ex_list_video;?>" target="_black"><?php echo $ex_list_video;?></a><br>

            <?php } ?>
                        
            <?php if($ex_list_train_station!='' and $ex_list_train_station!='0'){ ?>
                        <b>สถานีรถไฟฟ้า :  </b><?php echo $ex_list_train_station;?><br><br>

            <?php } ?>
                        <b>รหัสทรัพย์ :   </b><?php echo $ex_list_listing_code;?><br>

                        <b>สถานะ :   </b><b style="color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   >

 
                      <?php echo $ex_list_listing_status.$expire_check;  ?>
                       <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <?php echo $ex_list_rent_till; } ?>
                           </a>
                       </b><br>
 

                        <br>
                        <b>ราคา<?php echo $ex_list_deal_type;?> :  </b><?php echo number_format($ex_list_price);?> บาท <br><br>
                        <b>ประเภท  :   </b><?php echo $ex_list_listing_type;?> <?php if($room_title2!=''){ echo "(".$room_title2.")"; } ?> <br>
           <?php if($ex_list_listing_type_check!='12'){  ?>
                        <b>จำนวนชั้น :   </b><?php echo $ex_list_total_floors_th;?> <br>
           <?php } ?>  
           <?php if($ex_list_listing_type_check=='1'){  ?>      
                        <b>ตั้งอยู่ชั้นที่ :   </b><?php echo $ex_list_floor;?><br>
           <?php } ?>

             <?php if($ex_list_listing_type_check!='1'){  ?>

                         <b>พื้นที่ :   </b><?php echo $area_th;?><br>
            <?php } ?>
             <?php if($ex_list_listing_type_check!='12'){  ?>
                        <b>พื้นที่ใช้สอย : </b><?php echo $ex_list_sqm_th;?><br>
                        <b>ห้องนอน :   </b><?php echo $ex_list_bedroom_th;?><br>
                        <b>ห้องน้ำ :  </b><?php echo $ex_list_bathroom_th;?><br>
            <?php } ?>
            <?php if($ex_list_other_room!='' and $ex_list_other_room!='0'){ ?>            
                        <b>ห้องอื่นๆ :  </b><?php echo $ex_list_other_room;?><br>
            <?php } ?>
            <?php if($ex_list_parking!='' and $ex_list_parking!='0'){ ?>
                        <b>ที่จอดรถ : </b><?php echo $ex_list_parking;?><br>
            <?php } ?>
            <?php if($ex_list_direction!=''){ ?>
                        <b>ทิศ : </b><?php echo $direction_name_th;?><br>
            <?php } ?>            

                      
 
                      </p>



      <?php if($type_strengths_id!=''){ ?>

                        <h4>จุดเด่น</h4>
              <?php 

                       $selected_type_strengths_id = explode(',', $type_strengths_id);

                       $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
                       $result_strengths=$conn->query($sql_strengths);
                   
                       while($rs_strengths=$result_strengths->fetch_assoc()) { 

                              $strengths_id=$rs_strengths['strengths_id'];
                              $strengths_name=$rs_strengths['strengths_name'];
                              $strengths_name_en=$rs_strengths['strengths_name_en'];
                               
                               if (in_array($strengths_id, $selected_type_strengths_id)){ 
                                    
                                    echo "-".$strengths_name."<br>";
                              }
                         }

                  echo "<br>";   
              }
             ?>
        


        <?php if($ex_list_details!='' and $ex_list_details!='0'){ ?>

                        <h4>รายละเอียดเพิ่มเติม</h4>
                        <p><?php echo nl2br($ex_list_details);?></p> 
        <?php } ?>

                  
         <?php if($ex_list_furniture_id!=''){ ?>
                        <h4>เฟอร์นิเจอร์</h4>
  
              <?php 

                       $selected_furniture_id = explode(',', $ex_list_furniture_id);

                       $sql_furniture="SELECT * FROM type_furniture order by furniture_id ASC"; 
                       $result_furniture=$conn->query($sql_furniture);
                   
                       while($rs_furniture=$result_furniture->fetch_assoc()) { 

                              $furniture_id=$rs_furniture['furniture_id'];
                              $furniture_name=$rs_furniture['furniture_name']; 
                              $furniture_name_en=$rs_furniture['furniture_name_en'];
                                
                               if (in_array($furniture_id, $selected_furniture_id)){ 
                                    
                                    echo "-".$furniture_name."<br>";
                              }
                         }
                   echo "<br>";  
               } ?>
               
          <?php if($ex_list_facilities!='' and $ex_list_facilities!='0'){ ?>

                       <h4>สิ่งอำนวยความสะดวก</h4>
                    <?php echo nl2br($ex_list_facilities)."<br>";
                         
                       /*
                       $selected_typeid = array($project_facilities_icon);*/

                       $selected_typeid = explode(',', $project_facilities_icon);

                       $sql_facilitate="SELECT * FROM type_facilitate order by facilitate_id ASC"; 
                       $result_facilitate=$conn->query($sql_facilitate);
                   
                       while($rs_facilitate=$result_facilitate->fetch_assoc()) { 

                              $facilitate_id=$rs_facilitate['facilitate_id'];
                              $facilitate_icon=$rs_facilitate['facilitate_icon'];
                              $facilitate_name=$rs_facilitate['facilitate_name'];
                              $facilitate_name_en=$rs_facilitate['facilitate_name_en'];
                                
                               if (in_array($facilitate_id, $selected_typeid)){ 
                                    
                                    echo "-".$facilitate_name."<br>";
                              }
                         }
                    echo "<br>";  
                }  
                                ?>
                                     
                                 

                                   <h4>ทำเลดี สถานที่ใกล้เคียง</h4>
                                <?php echo nl2br($ex_list_nearby_places);?><br><br> 

                                <h4>โซนพื้นที่</h4>
                                <?php echo $ex_list_zone;?><br><br> 
 

                           <?php if($_SESSION['STATUS_ADS']=='1' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' ){ ?>

                               <p><b>**บริการปรึกษาสินเชื่อฟรี! ดอกเบี้ยพิเศษ และ วงเงินกู้สูงสุด 90-100% ของราคาประเมิน** </b><br>
                                          สอบถามข้อมูลเพิ่มเติม ติดต่อ  <br>
                                           

                                          CONNEX PROPERTY สนใจซื้อ-ขายบ้าน ปรึกษาฟรี! ทีมงานมืออาชีพ  <br>
                                          Call: 099-019-9900 <br>
                                          Facebook: Connex Property<br>
                                          LINE OA: @connexproperty<br>
                                          Whatsapp: +66 99 019 9900<br>
                                          <a href="https://connex.in.th/"> https://connex.in.th/</a>
                                </p>
                            <?php } ?>


                  <?php if($_SESSION['STATUS_ADS']!='1'){ ?>  


                      <?php if($ex_list_rent_till_note!=''){ ?> 

                         <b>Remark (status) : </b> <span style="color: red;"> <?php echo $ex_list_rent_till_note;?></span> <br>

                      <?php } ?>
                        
                         <b>Remark : </b><?php echo $ex_list_remark;?><br><br>

                       <?php } ?>
                                



                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">


             <?php if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' ){  ?>
                    <div class="col-sm-12">             
                         <p><input type="text"  id="url2" style="width: 100%;"  onfocus="javascript:this.select();" value="https://connex.in.th/property/en/<?php echo $ex_list_listing_code;?>"  > </p>
                    </div>
                    
                    <div class="col-sm-12">      
                       <a href="#" rel="noopener"   class="btn btn-default" onclick="copyit('url2');" ><i class="fas fa-print"></i> Copy link</a>
                      <a href="page/upload_file_excel_check_view_print.php?listing=<?php echo $listing;?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>                       
                    </div> 

             <?php }else if($_GET['deal']=='view'){  ?>
                
                    <div class="col-sm-12">             
                         <p><input type="text"  id="url2" style="width: 100%;"  onfocus="javascript:this.select();" value="https://connex.in.th/property/en/<?php echo $ex_list_listing_code;?>"  > </p>
                    </div>
                    
                    <div class="col-sm-12">      
                       <a href="#" rel="noopener"   class="btn btn-default" onclick="copyit('url2');" ><i class="fas fa-print"></i> Copy link</a>
                      <a href="page/upload_file_excel_check_view_print.php?listing=<?php echo $listing;?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>                       
                    </div>   
             <?php } ?>

                       
                     <h3 class="my-3"><?php echo $ex_list_heading_en;?></h3>

                      <hr>
                      <h4>Description</h4>
                      <p>
                   <?php if($project_id!='0' ) { ?>
                        <b>Project : </b> <?php echo $project_name_en;?><br>
                   <?php }else{ ?>
                        <b>Listing Name : </b> <?php echo $ex_list_listing_name_en;?><br>
                   <?php } ?> 

                        <b>Location area: </b> <?php echo $address_en;?><br>
                        <b>GPS : </b><a href="<?php echo $ex_list_googlmap;?>" target="_black"><?php echo $ex_list_googlmap;?></a><br>

            <?php if($ex_list_video!='' and $ex_list_video!='0'){ ?>
                        <b>video :  </b><a href="<?php echo $ex_list_video;?>" target="_black"><?php echo $ex_list_video;?></a><br>

            <?php } ?>
            <?php if($ex_list_train_station!='' and $ex_list_train_station!='0'){ ?> 
                        <b>Station :  </b><?php echo $ex_list_train_station_en;?><br><br>
            <?php } ?>
                        <b>Listing ID :  </b><?php echo $ex_list_listing_code;?><br>
                        <b>Status :   </b><b style="color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   >

 
                      <?php echo $ex_list_listing_status.$expire_check;  ?>
                       <?php if($ex_list_listing_status_check=='3'){ ?> <br><?php echo $ex_list_rent_till; } ?>
                           </a>
                       </b><br>
                        <br>
                        <b><?php echo $ex_list_deal_type_en;?> :  </b><?php echo number_format($ex_list_price);?> ฿ <br><br>
                        <b>Property type :    </b><?php echo $ex_list_listing_type_en;?> <?php if($room_title_en2!=''){ echo "(".$room_title_en2.")"; } ?><br>
           <?php if($ex_list_listing_type_check!='12'){  ?>
                        <b>No of floors :  </b><?php echo $ex_list_total_floors_en;?><br>
            <?php } ?>
            <?php if($ex_list_listing_type_check=='1'){  ?>  
                        <b>Floor :  </b><?php echo $ex_list_floor;?><br>
             <?php } ?>
             <?php if($ex_list_listing_type_check!='1'){  ?>

                         <b>Area :   </b><?php echo $area_en;?><br>
            <?php } ?>
             <?php if($ex_list_listing_type_check!='12'){  ?>
                        <b>Usable area : </b><?php echo $ex_list_sqm_en;?><br>
                        <b>No. of Bedroom :   </b><?php echo $ex_list_bedroom_en;?><br>
                        <b>No. of Bathroom :  </b><?php echo $ex_list_bathroom_en;?><br>
            <?php } ?>
            <?php if($ex_list_other_room!=''){ ?>         
                        <b>Other :  </b><?php echo $ex_list_other_room;?><br> 
            <?php } ?> 
            <?php if($ex_list_parking!='' and $ex_list_parking!='0'){ ?>
                        <b>Parking : </b><?php echo $ex_list_parking;?><br>
            <?php } ?>
            <?php if($ex_list_direction!=''){ ?>
                        <b>Direction : </b><?php echo $direction_name_en;?><br>
            <?php } ?>      

                      </p>
                 
      <?php if($type_strengths_id!=''){ ?>

                        <h4>Highlights : </h4>
              <?php 

                       $selected_type_strengths_id = explode(',', $type_strengths_id);

                       $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
                       $result_strengths=$conn->query($sql_strengths);
                   
                       while($rs_strengths=$result_strengths->fetch_assoc()) { 

                              $strengths_id=$rs_strengths['strengths_id'];
                              $strengths_name=$rs_strengths['strengths_name'];
                              $strengths_name_en=$rs_strengths['strengths_name_en'];
                               
                               if (in_array($strengths_id, $selected_type_strengths_id)){ 
                                    
                                    echo "-".$strengths_name_en."<br>";
                              }
                         }
                   echo "<br>";   
              }
             ?>  


        <?php if($ex_list_details_en!='' and $ex_list_details_en!='0'){ ?>

                        <h4>Other details</h4>
                        <p><?php echo nl2br($ex_list_details_en);?></p> 
        <?php } ?>
        
         <?php if($ex_list_furniture_id!=''){ ?>
                        <h4>Furniture</h4>
                                
  
              <?php 

                       $selected_furniture_id = explode(',', $ex_list_furniture_id);

                       $sql_facilitate="SELECT * FROM type_furniture order by furniture_id ASC"; 
                       $result_facilitate=$conn->query($sql_facilitate);
                   
                       while($rs_facilitate=$result_facilitate->fetch_assoc()) { 

                              $furniture_id=$rs_facilitate['furniture_id'];
                              $furniture_name=$rs_facilitate['furniture_name']; 
                              $furniture_name_en=$rs_facilitate['furniture_name_en'];
                                
                               if (in_array($furniture_id, $selected_furniture_id)){ 
                                    
                                    echo "-".$furniture_name_en."<br>";
                              }
                         }
                     echo "<br>";        
                 } ?>           
     

         <?php if($ex_list_common_facilities!='' and $ex_list_common_facilities!='0'){ ?>
                       <h4>Common Facilities</h4>
                    <?php echo nl2br($ex_list_common_facilities)."<br>";
                         
                       /*
                       $selected_typeid = array($project_facilities_icon);*/

                       $selected_typeid = explode(',', $project_facilities_icon);

                       $sql_facilitate="SELECT * FROM type_facilitate order by facilitate_id ASC"; 
                       $result_facilitate=$conn->query($sql_facilitate);
                   
                       while($rs_facilitate=$result_facilitate->fetch_assoc()) { 

                              $facilitate_id=$rs_facilitate['facilitate_id'];
                              $facilitate_icon=$rs_facilitate['facilitate_icon'];
                              $facilitate_name=$rs_facilitate['facilitate_name'];
                              $facilitate_name_en=$rs_facilitate['facilitate_name_en'];
                                
                               if (in_array($facilitate_id, $selected_typeid)){ 
                                    
                                    echo "-".$facilitate_name_en."<br>";
                              }
                         }
                          echo "<br>";  
                }
                                ?>
                                        
                            
                                   <h4>Nearby Facilities</h4>
                                <?php echo nl2br($ex_list_nearby_places_en);?><br><br>  

                                <h4>Zone</h4>
                                <?php echo $ex_list_zone_en;?><br> <br> 
                          
                          <?php if($_SESSION['STATUS_ADS']=='1'  or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' ){ ?>

                               <p><b>**Free consultation! seeking to buy/sell/rent properties in Thailand** </b><br>
                                          Interested please contact : <br>
                                           
                                          CONNEX PROPERTY | Connect you to your wished property  <br>
                                          Call: 099-019-9900 <br>
                                          Facebook: Connex Property<br>
                                          LINE OA: @connexproperty<br>
                                          Whatsapp: +66 99 019 9900<br>
                                          <a href="https://connex.in.th/"> https://connex.in.th/</a>
                                </p>
                            <?php } ?>

                
                        

                  </div>
                   
                </div>
              </div>
              <!-- /.card -->
            </div>         
                
         

                   

                   <!--
                    <div class="mt-4 product-share">
                      <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                      </a>
                      <a href="#" class="text-gray">
                        <i class="fab fa-twitter-square fa-2x"></i>
                      </a>
                      <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                      </a>
                      <a href="#" class="text-gray">
                        <i class="fas fa-rss-square fa-2x"></i>
                      </a>
                    </div> -->


                  

                  
               <div class="col-sm-12">
                  <div class="row">


                    <div class="col-12 col-sm-6">
                    
                                <h4>ผู้เพิ่มข้อมูล</h4>
                              <?php echo $ex_list_contacts;?>
                       
                    </div> 

        <?php if($ex_list_pm_status!=''){ 

                 $sql_pm="SELECT * FROM dbo_listing_pm 
                          where ex_list_listing_code='$listing' and ex_list_bargain='$ex_list_bargain' and ex_list_pm_status='2'  LIMIT 1";
                 $result_pm= $conn->query($sql_pm); 
                 $rs_pm=$result_pm->fetch_assoc();
 
                 if($rs_pm['listing_pm_id']!=''){
         ?>   
                    <div class="col-12 col-sm-6">                 
                              <h4>ผู้ติดต่อ</h4>
                              <?php echo $ex_list_bargain_name;?>                                                      
                    </div> 
        <?php     }
              } ?>
                    
                    <div class="col-12 col-sm-12">                 
                           <hr>                                                
                    </div> 

  <?php if($_SESSION['STATUS_DRAFT']=='1'){ ?> 
                    <div class="col-12 col-sm-4">
                      <div class="card-tools"> 
                        <div class="custom-control custom-switch">
                          <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch<?php echo $ex_list_listing_code;?>" name="ex_list_owner_tel" value="1" <?php if($ex_list_public=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=public', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"   >
                            <label class="custom-control-label" for="customSwitch<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" >อนุมัติเปิดใช้งาน</label>
                        </div> 
                      </div> 
                    </div> 
  <?php } ?>
                
  <?php if($_SESSION['STATUS_PREMIUM']=='1'){ ?> 
                    <div class="col-12 col-sm-4">
                      <div class="card-tools"> 
                        <div class="custom-control custom-switch">
                          <center>
                           <input type="checkbox" class="custom-control-input" id="customSwitch2" name="ex_list_premium" value="1" <?php if($ex_list_premium=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=premium', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"   >
                           <label class="custom-control-label" for="customSwitch2">Premium ประกาศ</label>
                         </center>
                        </div> 
                      </div> 
                    </div>
<?php } ?>     

  <?php if($_SESSION['STATUS_BOOSTPOST']=='1' ){ ?>  
                    <div class="col-12 col-sm-4">
                      <div class="card-tools"> 
                        <div class="custom-control custom-switch">
                           <input type="checkbox" class="custom-control-input" id="customSwitch3" name="ex_list_boostpost" value="1"  <?php if($ex_list_boostpost=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=boostpost', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"    >
                           <label class="custom-control-label" for="customSwitch3">Boost Post ประกาศ</label>
                        </div> 
                      </div> 
                    </div> 
<?php }?>   

<!--
                    <div class="col-6">
                      <div class="card-tools"> 
                        <div class="custom-control custom-switch">
                          <center>
                           <input type="checkbox" class="custom-control-input" id="customSwitch4" name="ex_list_owner_tel" value="1" <?php if($ex_list_owner_tel=='0'){ ?>checked="checked"<?php } ?> >
                           <label class="custom-control-label" for="customSwitch4">เปิดให้เห็นเบอร์ Owner</label>
                          </center>
                        </div> 
                      </div> 
                    </div>

                   --> 
                  </div>
                </div>

            </div>
          </div>
           
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-12:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


  <script type="text/javascript">
$(document).ready(function(){
 

    $("#customSwitch9").change(function(){
      var customSwitch9 = $("#customSwitch9").val();
  
      if(customSwitch9 == "1"){

        $("#p1").show();
        //$("#txt_box").val("");
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */
      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */
        $("#p1").hide();
      }
        
    });
</script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>     


<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>