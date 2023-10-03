<?
   

  session_start();  

  require '../config.php';
            

$data = '<?xml version="1.0" encoding="utf-8"?>'."\n";
$data .= '<listings>'."\n";

          $i=0;

		 $sql="SELECT * FROM dbo_data_excel_listing where ex_list_public='1' order by ex_list_id  ASC";  
		 $result = $conn->query($sql);

		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs_listing=$result->fetch_assoc()) {   $i++;

    		  
         
         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
         $ex_list_email_address=$rs_listing['ex_list_email_address'];
         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
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
         $ex_list_latitude=$rs_listing['ex_list_latitude'];
         $ex_list_longitude=$rs_listing['ex_list_longitude'];
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
         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
         $project_id=$rs_listing['project_id'];
         $ex_list_date_update=$rs_listing['ex_list_date_update'];
         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         
      if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' 
      or $_SESSION['STATUS_ID']==$ex_list_contact ){   
         if($ex_list_contact_name!=''){ $ex_list_contact_name="Owner Name : ".$ex_list_contact_name." Tel : ".$ex_list_contact_tel;}
     }else{ $ex_list_contact_name="-"; }
         
         if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status";  }
         else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
            
          if($ex_list_price!=''){ $ex_list_price=number_format($ex_list_price);}else{$ex_list_price="ยังไม่ระบุราคา";}


          if($ex_list_deal_type=='1'){ $ex_list_deal_type="sale";}else{$ex_list_deal_type="rent";}

          if($ex_list_sqm!='' or $ex_list_sqm=='0'){  $ex_list_sqm=$ex_list_sqm; }
        
          if($ex_list_bedroom>0){$ex_list_bedroom=$ex_list_bedroom;}else{ $ex_list_bedroom=$ex_list_bedroom; }
          if($ex_list_bathroom>0){$ex_list_bathroom=$ex_list_bathroom;}else{ $ex_list_bathroom=$ex_list_bathroom; }

      /////////// type_project ////////////////
             $sql_project="SELECT * FROM type_project where project_id='$project_id' ";  
             $result_project= $conn->query($sql_project);
             $rs_project=$result_project->fetch_assoc();

             $project_id=$rs_project['project_id'];
             $project_type=$rs_project['project_type'];
             $project_train_station=$rs_project['project_train_station'];
             $project_name=$rs_project['project_name'];
             $project_name_en=$rs_project['project_name_en'];
             $project_alley=$rs_project['project_alley'];
             $project_road=$rs_project['project_road'];
             $project_subdistrict=$rs_project['project_subdistrict'];
             $project_district=$rs_project['project_district'];
             $project_province=$rs_project['project_province'];
             $project_train_station=$rs_project['project_train_station'];
             $project_facilities=$rs_project['project_facilities'];
             $project_facilities_en=$rs_project['project_facilities_en'];
             $project_nearby_places=$rs_project['project_nearby_places'];
             $project_zone=$rs_project['project_zone'];

             $project_latitude=$rs_project['project_latitude'];
             $project_longitude=$rs_project['project_longitude'];

             if($project_latitude!=''){
                          $ex_list_latitude=$project_latitude;
                          $ex_list_longitude=$project_longitude;
             }



        if($project_id!=''){ 

               $ex_list_project=$rs_project['project_name']." | ".$rs_project['project_name_en'];
      /////////// End type_project ////////////////

               $ex_list_listing_type=$project_type; 

      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name_en'];   $ex_list_listing_type_th=$rs_ass['name'];  }
      ////////// End type_asset ////////////////



      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$project_province' "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $provinces_in_thai=$rs_p['provinces_in_thai'];
                $provinces_in_english=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$project_district' "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $districts_in_thai=$rs_d['districts_in_thai'];
                $districts_in_english=$rs_d['districts_in_english'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$project_subdistrict' "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $subdistricts_in_thai=$rs_s['subdistricts_in_thai'];
                $subdistricts_in_english=$rs_s['subdistricts_in_english'];
                $zip_code=$rs_s['zip_code'];

               if($province_id=='1'){
                     
                     $address_th=$project_alley." ".$project_road." แขวง".$subdistricts_in_thai." ".$districts_in_thai." ".$provinces_in_thai." ".$zip_code;

                     $address_en=$subdistricts_in_english." , ".$districts_in_english.", ".$provinces_in_english." ".$zip_code;

               }else{

                      $address_th=$project_alley." ".$project_road." ตำบล".$subdistricts_in_thai." อำเภอ".$districts_in_thai." จังหวัด".$provinces_in_thai." ".$zip_code;

                      $address_en=$subdistricts_in_english." , ".$districts_in_english.", ".$provinces_in_english." ".$zip_code;
               }

      /////////// type_project //////////////// 

      /////////// End type_project ////////////////

 



      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
      /////////// End type_train_station ////////////////
 
      //////////////    ////////////////////////////
             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $ex_list_contact=$rs_register['register_name']." | ".$rs_register['register_email'];

         }

         $detail_th=$ex_list_heading."<b><b>"."\n\n";
         $detail_th.='รายละเอียด'."<b>"."\n";
         $detail_th.='โครงการ : '."<b>".$project_name."\n";
         $detail_th.='ที่ตั้ง : '."<b>".$address_th."\n";
         $detail_th.='พิกัด : '."<b>".$ex_list_googlmap."\n";
         $detail_th.='รหัสทรัพย์ : '."<b><b>".$ex_list_listing_code."\n\n";

         $detail_th.='ราคา : '."<b><b>".$ex_list_price."\n\n";
         
         $detail_th.='ประเภท : '."<b>".$ex_list_listing_type_th."\n";
         $detail_th.='จำนวนชั้น : '."<b>".$ex_list_total_floors."\n";
         $detail_th.='ตั้งอยู่ชั้น : '."<b>".$ex_list_floor."\n";

  if($rs_ass['id']=='1'){ 
         $detail_th.='พื้นที่ใช้สอย : '.$ex_list_sqm."<b>"."\n";
  }else{
         $detail_th.='เนื้อที่ดิน :  '.$ex_list_listing_type."<b>"."\n";   
         $detail_th.='พื้นที่ใช้สอย : '.$ex_list_sqm."<b>"."\n"; 
  } 

         $detail_th.='ห้องนอน : '.$ex_list_bedroom."<b>"."\n";
         $detail_th.='ห้องน้ำ :  '.$ex_list_bathroom."<b>"."\n";
         $detail_th.='ทิศ :  '.$ex_list_direction."<b><b>"."\n\n";

         $detail_th.='ทำเลดี สถานที่ใกล้เคียง :  '."<b>"."\n";
         $detail_th.=$ex_list_nearby_places."<b><b>"."\n\n";

         $detail_th.='สิ่งอำนวยความสะดวก :  '."<b>"."\n"; 
         $detail_th.=$project_facilities."<b><b>"."\n\n";

         $detail_en=$ex_list_heading_en."<b>"."\n";
         $detail_en.='Description'."<b>"."\n";
         $detail_en.='Project :'.$project_name_en."<b>"."\n";
         $detail_en.='Location area : '.$address_en."<b>"."\n";
         $detail_en.='Listing ID : '.$ex_list_listing_code."<b><b>"."\n";

         $detail_en.='Price :  '.$ex_list_listing_code."<b>"."\n";
         $detail_en.='Property type :  '.$ex_list_listing_code."<b>"."\n";
         $detail_en.='No of floors : '.$ex_list_total_floors."<b>"."\n";
         $detail_en.='Floor :  '.$ex_list_floor."<b>"."\n";
         $detail_en.='Usable area : '.$ex_list_sqm."<b>"."\n";
         $detail_en.='No. of Bedroom : '.$ex_list_bedroom."<b>"."\n";
         $detail_en.='No. of Bathroom : '.$ex_list_bathroom."<b>"."\n\n";
         $detail_en.='Nearby Places '."<b>"."\n";
         $detail_en.=$ex_list_nearby_places_en."<b>"."\n\n";
         $detail_en.='Common Facilities : '."<b>"."\n";
         $detail_en.=$project_facilities_en."<b>"."\n";


$data .= '<listing>'."\n";

$data .= '<reference_id><![CDATA['.$ex_list_listing_code.']]></reference_id>'."\n";
$data .= '<contact>'."\n";
$data .= '<phone><![CDATA[+66990199900]]></phone>'."\n";
$data .= '<whatsapp><![CDATA[+66990199900]]></whatsapp>'."\n";
$data .= '<line><![CDATA[@connexproperty]]></line>'."\n";
$data .= '<facebook><![CDATA[hello.connexproperty]]></facebook>'."\n";
$data .= '<skype><![CDATA[hello.messenger]]></skype>'."\n";
$data .= '<viber><![CDATA[hello.messenger]]></viber>'."\n";
$data .= '<email><![CDATA[athiwat.a@connexproperty.co.th]]></email>'."\n";
$data .= '<name><![CDATA[Connex Property]]></name>'."\n";
$data .= '</contact>'."\n";

$data .= '<titles>'."\n";
$data .= '<title lang="en"><![CDATA['.$ex_list_heading_en.']]></title>'."\n";
$data .= '<title lang="th"><![CDATA['.$ex_list_heading.']]></title>'."\n";
$data .= '</titles>'."\n";

$data .= '<descriptions>'."\n";
$data .= '<description lang="en"><![CDATA['.$detail_en.']]></description>'."\n";
$data .= '<description lang="th"><![CDATA['.$detail_th.']]></description>'."\n";
$data .= '</descriptions>'."\n";

$data .= '<prices>'."\n";
$data .= '<price currency="THB" operation="'.$ex_list_deal_type.'"  >'.$ex_list_price.'</price>'."\n";
$data .= '</prices>'."\n";

$data .= '<propertyType><![CDATA['.$ex_list_listing_type.']]></propertyType>'."\n";

$data .= '<project><![CDATA['.$project_name_en.']]></project>'."\n";
$data .= '<coordinates>'."\n";
$data .= '<latitude><![CDATA['.$ex_list_latitude.']]></latitude>'."\n";
$data .= '<longitude><![CDATA['.$ex_list_longitude.']]></longitude>'."\n";
$data .= '</coordinates>'."\n";

$data .= '<year><![CDATA[]]></year>'."\n";

$data .= '<contract_term><![CDATA[]]></contract_term>'."\n";

$data .= '<bedrooms><![CDATA['.$ex_list_bedroom.']]></bedrooms>'."\n";

$data .=  '<bathrooms><![CDATA['.$ex_list_bathroom.']]></bathrooms>'."\n";

$data .= '<floor><![CDATA['.$ex_list_floor.']]></floor>'."\n";

$data .= '<furnished><![CDATA[FULLY]]></furnished>'."\n";

if($rs_ass['id']=='1'){ 

$data .= '<floorArea unit="sqm">'.$ex_list_sqm.'</floorArea>'."\n";

}else{

$data .= '<plotArea unit="sqm">'.$ex_list_sqm.'</plotArea>'."\n";

}


$data .= '<pictures>'."\n";

              $sql_list_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC";
              $result_list_img = $conn->query($sql_list_img);  
              while($rs_list_img=$result_list_img->fetch_assoc()){

                 $listing_img_folder=$rs_list_img['listing_img_folder'];
                 $listing_img_name=$rs_list_img['listing_img_name'];
                 $ex_list_listing_code=$rs_list_img['ex_list_listing_code'];

                 if($listing_img_folder!=''){   

                 	$st = $listing_img_folder;  
                    $listing_img_folder = str_replace("../../","",$st,$count);

                       $listing_img_name="https://connex.in.th/images/listing/".$listing_img_folder.$listing_img_name;
                 }else{   
                       $listing_img_name="https://connex.in.th/images/listing/".$ex_list_listing_code."/".$listing_img_name;  
                 }


$data .= '<url><![CDATA['.$listing_img_name.']]></url>'."\n";

              }

$data .= '</pictures>'."\n";

if($ex_list_premium=='1'){

$data .= '<is_boosted>TRUE</is_boosted>'."\n";

}else{

$data .= '<is_boosted>FALSE</is_boosted>'."\n";

}


$data .= '</listing>'."\n"; //เวลา
                 

            }
        }


$data .= '</listings>'."\n";

$f = fopen( '../rss.xml' , 'w' ); //ส่วนของการสร้างไฟล์ XML
fputs( $f , $data );
fclose( $f );
?>
