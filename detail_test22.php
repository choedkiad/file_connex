<!DOCTYPE html>

<?php   session_start();  ?>
<?php   include ("./include/config.php"); ?>
<?php   include ("./setting.php");

       $todate=date("YmdHis");

       $baseUrl = BASE_URL;  

       $myurl="$baseUrl/property/".$lang."/".$id;

       $part="../../../../";

       $url_th="$baseUrl/property/th/".$id;
       $url_en="$baseUrl/property/en/".$id;

		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }
 
      

		 $sql_listing="SELECT * FROM dbo_data_excel_listing    WHERE ex_list_listing_code='".$id."' and ex_list_close='0'  ";
		 $result_listing=$conn->query($sql_listing); 
    	  // output data of each row
      if($result_listing->num_rows > 0) {

         $rs_listing=$result_listing->fetch_assoc();
         
         $project_id=$rs_listing['project_id'];
         $project_id_check=$rs_listing['project_id'];
         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_heading=$rs_listing['ex_list_heading'];
	       $ex_list_heading_en=$rs_listing['ex_list_heading_en'];
         $ex_list_project=$rs_listing['ex_list_project'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
         $ex_list_address=$rs_listing['ex_list_subdistrict']." ".$rs_listing['ex_list_district']." ".$rs_listing['ex_list_province'];
         $ex_list_train_station=$rs_listing['ex_list_train_station'];
         $ex_list_googlmap=$rs_listing['ex_list_googlmap'];
         $ex_list_number_buildings=$rs_listing['ex_list_number_buildings'];
         $ex_list_floor=$rs_listing['ex_list_floor'];
         $ex_list_view=$rs_listing['ex_list_view'];
         $ex_list_wa=$rs_listing['ex_list_wa'];
         $ex_list_ngan=$rs_listing['ex_list_ngan'];
         $ex_list_rai=$rs_listing['ex_list_rai'];
         $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
         $ex_list_rai_check=$rs_listing['ex_list_rai']."ไร่ - ".$rs_listing['ex_list_ngan']."งาน - ".$rs_listing['ex_list_wa']."ตารางวา";
         $ex_list_sqm=$rs_listing['ex_list_sqm'];
         $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
         $ex_list_bedroom_check=$rs_listing['ex_list_bedroom'];
         $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
         $ex_list_other_room=$rs_listing['ex_list_other_room'];
         $ex_list_parking=$rs_listing['ex_list_parking'];
         $ex_list_furniture=$rs_listing['ex_list_furniture'];
         $ex_list_pets=$rs_listing['ex_list_pets'];
         $ex_list_direction=$rs_listing['ex_list_direction'];
         $ex_list_strengths=$rs_listing['ex_list_strengths'];
       
         $ex_list_nearby_places=$rs_listing['ex_list_nearby_places'];
         $ex_list_details=$rs_listing['ex_list_details'];
         $ex_list_price=$rs_listing['ex_list_price'];
         $ex_list_listing_score=$rs_listing['ex_list_listing_score'];
         $ex_list_price_score=$rs_listing['ex_list_price_score']; 
         $ex_list_province=$rs_listing['ex_list_province'];
         $ex_list_district=$rs_listing['ex_list_district']; 
         $ex_list_subdistrict=$rs_listing['ex_list_subdistrict']; 
         $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];
      	 $ex_list_furniture_id=$rs_listing['ex_list_furniture_id'];
         $ex_list_date_update=$rs_listing['ex_list_date_update'];
         $ex_list_video=$rs_listing['ex_list_video'];

      	 $ex_list_latitude=$rs_listing['ex_list_latitude'];
      	 $ex_list_longitude=$rs_listing['ex_list_longitude'];
         $zone_id=$rs_listing['zone_id'];
         $ex_list_img_number=$rs_listing['ex_list_img_number'];
        

         $year=substr($ex_list_date_update,0 , 4 );
         $month=substr($ex_list_date_update,5 , 2 );
         $day=substr($ex_list_date_update,8 , 2 );
         
         $area_th=$ex_list_rai."-".$ex_list_ngan."-".$ex_list_wa." ตร.ว.";
         $area_en=$ex_list_rai."-".$ex_list_ngan."-".$ex_list_wa." Sq.wah. ";
 

  // สำหรับที่ดินเท่านั้น

        if($ex_list_rai!='0' and $ex_list_ngan!='0' and $ex_list_wa!='0'){  

                   $area_th_2=$ex_list_rai." ไร่ ".$ex_list_ngan." งาน ".$ex_list_wa." ตร.ว.";
                   $area_en_2=$ex_list_rai." Rai ".$ex_list_ngan." Ngan ".$ex_list_wa." Sq.wah. "; 

        }else if($ex_list_rai=='0' and $ex_list_ngan!='0' and $ex_list_wa!='0'){

                   $area_th_2=$ex_list_ngan." งาน ".$ex_list_wa." ตร.ว.";
                   $area_en_2=$ex_list_ngan." Ngan ".$ex_list_wa." Sq.wah. ";   

        }else if($ex_list_rai=='0' and $ex_list_ngan=='0' and $ex_list_wa!='0'){

                   $area_th_2=$ex_list_wa." ตร.ว.";
                   $area_en_2=$ex_list_wa." Sq.wah. ";  

        }else if($ex_list_rai!='0' and $ex_list_ngan=='0' and $ex_list_wa=='0'){

                   $area_th_2=$ex_list_rai." ไร่ ";
                   $area_en_2=$ex_list_rai." Rai "; 

        }else if($ex_list_rai=='0' and $ex_list_ngan!='0' and $ex_list_wa=='0'){

                   $area_th_2=$ex_list_ngan." งาน ";
                   $area_en_2=$ex_list_ngan." Ngan "; 

        }else if($ex_list_rai!='0' and $ex_list_ngan!='0' and $ex_list_wa=='0'){
                   $area_th_2=$ex_list_rai." ไร่ ".$ex_list_ngan." งาน ";
                   $area_en_2=$ex_list_rai." Rai ".$ex_list_ngan." Ngan "; 

        }else{
 

        } 


         if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." ตร.ม."; $ex_list_sqm_en=$ex_list_sqm." sqm";}




		 if($ex_list_deal_type=='1'){
			      $ex_list_deal_type_th="ขาย";  $ex_list_deal_type_en="SALE"; 
		 }else{
			      $ex_list_deal_type_th="ให้เช่า"; $ex_list_deal_type_en="RENT";
		 }




		
    if($ex_list_furniture_id!=''){ 

	    //เฟอร์นิเจอร์

		$sql_furniture="SELECT * FROM type_furniture where furniture_id=$ex_list_furniture_id  order by furniture_id ASC"; 
		$result_furniture=$conn->query($sql_furniture);
	
		$rs_furniture=$result_furniture->fetch_assoc();

			 $furniture_id=$rs_furniture['furniture_id'];
			 $furniture_name=$rs_furniture['furniture_name']; 
			 $furniture_name_en=$rs_furniture['furniture_name_en'];
				 
			 $furniture_name_th=$furniture_name;
			 $furniture_name_en=$furniture_name_en; 
		 

	}	


         $sql_project= "SELECT *  FROM  type_project AS pj WHERE  pj.project_id='$project_id' LIMIT 1 "; 
         $result_project=$conn->query($sql_project); 
         $rs_project= $result_project->fetch_assoc();


        if($project_id!='' and $project_id!='0'){
     
    			  $project_province=$rs_project['project_province'];
            $project_type=$rs_project['project_type'];
      			$project_district=$rs_project['project_district']; 
      			$project_subdistrict=$rs_project['project_subdistrict'];  
      			$project_latitude=$rs_project['project_latitude'];  
      			$project_longitude=$rs_project['project_longitude'];  
		        $project_name=$rs_project['project_name'];
		        $project_name_en=$rs_project['project_name_en'];
    			  $project_proppit_latitude=$rs_project['project_proppit_latitude'];
    			  $project_proppit_longitude=$rs_project['project_proppit_longitude'];
    			  $project_total_floors=$rs_project['project_total_floors']; 
            $ex_list_train_station=$rs_project['project_train_station']; 
	          $project_completed=$rs_project['project_completed'];
	          $project_unit=$rs_project['project_unit'];
	          $project_developer=$rs_project['project_developer']; 
            $search_p_id=$rs_project['search_p_id'];
     

    				$latitude=$project_latitude;
    				$longitude=$project_longitude;

    				
    				if($ex_list_listing_type=='1' or $ex_list_total_floors=='' or $ex_list_total_floors=='0'){
                                
                                  
    					$ex_list_total_floors_th=$project_total_floors." ชั้น";  
    					$ex_list_total_floors_en=$project_total_floors.""; 
    		 
            } 

                  $str_dev="SELECT * FROM dbo_developer where developer_id='$project_developer'  "; 
                  $result_dev=$conn->query($str_dev);  
                  $rs_dev=$result_dev->fetch_assoc(); 

                  $developer_name=$rs_dev['developer_name'];
                  $developer_name_en=$rs_dev['developer_name_en'];
     
         }

 

      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$project_province' "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province_th=$rs_p['provinces_in_thai'];
                $project_province_en=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$project_district' "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district_th=$rs_d['districts_in_thai'];
                $project_district_en=$rs_d['districts_in_english'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$project_subdistrict' "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $project_subdistrict_th=$rs_s['subdistricts_in_thai'];
                $project_subdistrict_en=$rs_s['subdistricts_in_english'];
                $zip_code=$rs_s['zip_code'];
               
                if($project_alley_en!=''){  $project_alley_en=" ".$project_alley_en; }
                if($project_road_en!=''){ $project_road_en=" , ".$project_road_en;}

 

      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$ex_list_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
             $tr_group=$rs_train['tr_group'];
  
             if($station_name!=''){ 

                      $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];  
                      $ex_list_train_station_th=$tr_group."-".$rs_train['station_name'];
                      $ex_list_train_station_en=$tr_group."-".$rs_train['station_name_en'];
                                  }
      /////////// End type_train_station ////////////////


     if($ex_list_listing_type!='1'){

           if($ex_list_total_floors!='' and $ex_list_total_floors!='0') {

                        $ex_list_floor=$ex_list_total_floors;
           }else{
                        $ex_list_floor=$project_total_floors;
           }
            
     } 


			if($project_proppit_latitude!=''){

				$latitude=$project_proppit_latitude;
				$longitude=$project_proppit_longitude; 

			}else if($project_latitude!=''){

				$latitude=$project_latitude;
				$longitude=$project_longitude;

			}else{
				$latitude=$ex_list_latitude;
				$longitude=$ex_list_longitude;	
			}

      /////////// type_asset ////////////////
				$sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
				$result_ass= $conn->query($sql_ass);
				$rs_ass=$result_ass->fetch_assoc();

				if($rs_ass['id']!=''){ $type_th=$rs_ass['name'];   $type_en=$rs_ass['name_en'];}
      ////////// End type_asset ////////////////


               if($project_province=='1'){
                     
				           if($project_alley_en==''){ }else{  $project_road_en=$project_road_en." , "; }
				               
                     $address=" ".$project_alley." ".$project_road." แขวง".$project_subdistrict_th." ".$project_district_th." ".$project_province_th." ".$zip_code;

                     $address_en="".$project_alley_en."".$project_road_en."".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code;

               }else{

                      $address= " ".$project_alley." ".$project_road." ตำบล".$project_subdistrict_th." อำเภอ".$project_district_th." จังหวัด".$project_province_th." ".$zip_code;

                      $address_en= "".$project_alley_en."".$project_road_en."  ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code; 
               }
 
                      $address_near= "".$project_subdistrict_th." , ".$project_district_th." , ".$project_province_th; 
                      $address_near_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en;


      		 $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no ASC ";
      		 $result_img = $conn->query($sql_img); 
             $rowcount_img=$result_img->num_rows;
          	  // output data of each row  
             $sum_count=$rowcount_img-4;
       

      		 while($rs_img=$result_img->fetch_assoc()){  $img++;


      	       if($img<=4){

                                  $img_folder=$rs_img['listing_img_folder']; 
                                 // $image_name=$rs_img['listing_img_name']; 
                                  $image_name=$rs_img['listing_img_webp']; 

  
                       if($img==1){  

                                    if($img_folder!=''){ 
                                             $img_folder=$img_folder."webp/";   
                                             $img_folders=$img_folder;
                                    }else{ 
                                             $img_folder=$baseUrl.'/images/listing/'.$id.'/webp/'; $img_folders="";                                       
                                    }

                               $img_list1=$img_folder.$image_name;    
      						             $img_list1=str_replace(" ","%20",$img_list1);



                        }else if($img==2){

                                    if($img_folder!=''){ 
                                             $img_folder=$img_folder."webp/mini_w500/";   
                                             $img_folders=$img_folder;
                                    }else{ 
                                             $img_folder=$baseUrl.'/images/listing/'.$id.'/webp/mini_w500/'; $img_folders="";                                       
                                    }
                               $img_list2=$img_folder.$image_name;   
      						             $img_list2=str_replace(" ","%20",$img_list2);   

                        }else if($img==3){

                                    if($img_folder!=''){ 
                                             $img_folder=$img_folder."webp/mini_w500/";   
                                             $img_folders=$img_folder;
                                    }else{ 
                                             $img_folder=$baseUrl.'/images/listing/'.$id.'/webp/mini_w500/'; $img_folders="";                                       
                                    }

                               $img_list3=$img_folder.$image_name; 
      						             $img_list3=str_replace(" ","%20",$img_list3);    
                        }else if($img==4){

                                    if($img_folder!=''){ 
                                             $img_folder=$img_folder."webp/mini_w500/";   
                                             $img_folders=$img_folder;
                                    }else{ 
                                             $img_folder=$baseUrl.'/images/listing/'.$id.'/webp/mini_w500/'; $img_folders="";                                       
                                    }

                               $img_list4=$img_folder.$image_name;    
      						             $img_list4=str_replace(" ","%20",$img_list4);
                        }

                  }

               }
   


         $img_pro=0;

         $sql_img="SELECT *  FROM type_project_img where project_id='$project_id' order by project_img_no ASC"; 
         $result_img=$conn->query($sql_img); 
         while($rs_img=$result_img->fetch_assoc()){  $img_pro++;

             $project_img_folder=$rs_img['project_img_folder'];
             $project_img_name=$rs_img['project_img_name'];
             $project_img_id=$rs_img['project_img_id']; 
            
            if($img_pro=='1'){
                 if($project_img_id!=''){ $project_img_folder1="../../images/project/$project_id/no_watermark/".$project_img_name;  
                                          $project_img_max300_folder1="../../images/project/$project_id/mini_w300/".$project_img_name;  }
                 else{ $project_img_folder1=$project_img_folder1;  }
            }
            if($img_pro=='2'){
                 if($project_img_id!=''){ $project_img_folder2="../../images/project/$project_id/no_watermark/".$project_img_name; }
                 else{ $project_img_folder2=$project_img_folder1;  }
            }
            if($img_pro=='3'){
                 if($project_img_id!=''){ $project_img_folder3="../../images/project/$project_id/no_watermark/".$project_img_name; }
                 else{ $project_img_folder3=$project_img_folder1;  }
            }
            if($img_pro=='4'){
                 if($project_img_id!=''){ $project_img_folder4="../../images/project/$project_id/no_watermark/".$project_img_name; }
                 else{ $project_img_folder4=$project_img_folder1;  }
            }
         }


       if($img_list1==''){
            $img_list1=$project_img_folder1;
       }
       if($img_list2==''){
            $img_list2=$project_img_folder2;
       }
       if($img_list3==''){
            $img_list3=$project_img_folder3;
       }
       if($img_list4==''){
            $img_list4=$project_img_folder4;
       }


	    if($lang=='th'){

       if($ex_list_date_update=='0000-00-00 00:00:00'){

             $date_update="9 กันยายน 2565";

       }else{
              $year=$year+543;
              switch ($month)
              {
                case "00" : $month="00"; break;
                case "01" : $month="ม.ค."; break;
                case "02" : $month="ก.พ."; break;
                case "03" : $month="มี.ค."; break;
                case "04" : $month="เม.ย."; break;
                case "05" : $month="พ.ค."; break;
                case "06" : $month="มิ.ย."; break;
                case "07" : $month="ก.ค."; break;
                case "08" : $month="ส.ค."; break;
                case "09" : $month="ก.ย."; break;
                case "10" : $month="ต.ค."; break;
                case "11" : $month="พ.ย."; break;
                case "12" : $month="ธ.ค."; break;
              }
             $date_update=$day." ".$month." ".$year;
      }
 
          $url_project_name_en=str_replace(" ","-",$project_name ,$count);     
          $url_project_name_en=str_replace(",","",$url_project_name_en ,$count);              
          $url_project_name_en=strtolower($url_project_name_en); 

          $link_pro="$baseUrl/search/th/all/$project_type/$search_p_id/all/all/all/$url_project_name_en/1";

          $url_share=$url_th;
    			$addres=$address;
    			$ex_list_deal_type_lang=$ex_list_deal_type_th; 
    			$name_type_lang=$type_th; 
    			$furniture_name_lang=$furniture_name_th;
    			$project_name=$project_name;
    			$province_name=$project_province_th; 
          $area=$area_th;
          $area_2=$area_th_2;
          $train_station=$ex_list_train_station;
         
         if($developer_name!=''){   $developer_name=$developer_name; }else{  $developer_name='ไม่ระบุ'; }

     if($ex_list_bedroom!='' and $ex_list_bedroom=='0'){     $ex_list_bedroom="สตูดิโอ";   }
    			

         // โครงการ <<เดอะ แคปิตอล เอกมัย – ทองหล่อ>> เป็นโครงการประเภท <<คอนโด>> <<8 ชั้น>> มีทั้งหมด <<329 ยูนิต>> ตั้งอยู่ในทำเลพื้นที่ << แขวงบางกะปิ เขต ห้วยขวาง กรุงเทพ 10310 >> <<ใกล้สถานี MRT ห้วยขวาง>> <<สร้างเสร็จเมื่อปี พ.ศ. 2562>> 
        // <<The Capital Ekkamai – Thonglor>> is a <<Condo>> project located in <<Bangkapi, Huaykwang, Bangkok>>, <<close to MRT Huaykwang>>. It has <<329 units>> across <<8 floors>>. <<The building was completed in 2015>>
       
          if($ex_list_listing_type!='' and $ex_list_listing_type=='1') {

             if($project_id!='' and $project_id!='0'){ $ab_project=" โครงการ ".$project_name." เป็นโครงการประเภท ".$type_th." ".$project_total_floors." ชั้น "; }           
          
             if($project_total_unit!='' and $project_total_unit!='0'){ $ab_unit=" มีทั้งหมด ".$project_total_unit." ยูนิต"; } 
             if($ex_list_train_station!='' and $ex_list_train_station!='0'){ $ab_station=" ใกล้สถานี ".$ex_list_train_station." "; } 
             if($ex_list_completed!='' and $ex_list_completed!='0'){ $ab_completed=" สร้างเสร็จเมื่อปี พ.ศ. ".$ex_list_completed." "; } 

        
        			$about=$ab_project.$ab_unit." ตั้งอยู่ในทำเลพื้นที่ ".$addres.$ab_station.$ab_completed;

         }
    		
    			$settings_title=$ex_list_heading ;
    			$settings_description=$ex_list_heading." ".$about ;
    			$settings_keyword='';
    

           $heading_h1=$ex_list_deal_type_th." ".$type_th." ".$project_name." ".$furniture_name_th." ".$ex_list_train_station_th; 

    			if($project_name==''){ $project_name=$na_title;	}

  

	    }else if($lang=='en'){


       if($ex_list_date_update=='0000-00-00 00:00:00'){

             $date_update="9 September 2022";

       }else{

            switch ($month)
            {
              case "00" : $month="00"; break;
              case "01" : $month="January"; break;
              case "02" : $month="February"; break;
              case "03" : $month="March"; break;
              case "04" : $month="April"; break;
              case "05" : $month="May"; break;
              case "06" : $month="June"; break;
              case "07" : $month="July"; break;
              case "08" : $month="August "; break;
              case "09" : $month="September"; break;
              case "10" : $month="October"; break;
              case "11" : $month="November"; break;
              case "12" : $month="December"; break;
            }
           $date_update=$day." ".$month." ".$year;

        }

          $url_project_name_en=str_replace(" ","-",$project_name_en ,$count);     
          $url_project_name_en=str_replace(",","",$url_project_name_en ,$count);              
          $url_project_name_en=strtolower($url_project_name_en); 

          $link_pro="$baseUrl/search/en/all/$project_type/$search_p_id/all/all/all/$url_project_name_en/1";
          $url_share=$url_en;
    			$addres=$address_en; 
    			$ex_list_deal_type_lang=$ex_list_deal_type_en;
    			$name_type_lang=$type_en; 
    			$furniture_name_lang=$furniture_name_en;
    			$project_name=$project_name_en;
    			$province_name=$project_province_en; 
          $area=$area_en;
          $area_2=$area_en_2;
          $train_station=$ex_list_train_station_en;

          if($developer_name_en!=''){   $developer_name=$developer_name_en; }else{  $developer_name=$na_title; }

          if($ex_list_bedroom!='' and $ex_list_bedroom=='0'){     $ex_list_bedroom="Studio";   } 

    			$settings_title=$ex_list_heading_en;
    			$settings_description=$ex_list_heading_en;
    			$settings_keyword='';

    			if($project_name==''){ $project_name=$na_title;	}


        // <<The Capital Ekkamai – Thonglor>> is a <<Condo>> project located in <<Bangkapi, Huaykwang, Bangkok>>, <<close to MRT Huaykwang>>. It has <<329 units>> across <<8 floors>>. <<The building was completed in 2015>>
 
       
          if($ex_list_listing_type!='' and $ex_list_listing_type=='1') {

             if($project_id!='' and $project_id!='0'){ $ab_project=" ".$project_name." is a ".$type_en." "; }           
          
             if($project_total_unit!='' and $project_total_unit!='0'){ $ab_unit=" It has ".$project_total_unit." units"; } 
             if($project_total_floors!='' and $project_total_floors!='0'){ $ab_floors=" across ".$project_total_floors." floors."; }
             if($ex_list_train_station_en!='' and $ex_list_train_station_en!='0'){ $ab_station=" close to  ".$ex_list_train_station_en.". "; } 
             if($ex_list_completed!='' and $ex_list_completed!='0'){ $ab_completed=" The building was completed in ".$ex_list_completed." "; } 

        
              $about=$ab_project.$ab_unit." project located in  ".$addres.$ab_station.$ab_floors.$ab_completed;

         }

        /* 
           $heading_h1=str_replace(", ".$project_subdistrict_en,"",$ex_list_heading_en,$count);
           $heading_h1=str_replace(", ".$project_district_en,"",$heading_h1,$count);
           $heading_h1=str_replace(", ".$project_province_en,"",$heading_h1,$count);
           $heading_h1=str_replace(", ".$ex_list_listing_code,"",$heading_h1,$count);  */

                $heading_h1=$ex_list_deal_type_en." ".$type_en." ".$project_name_en." ".$furniture_name_en." ".$ex_list_train_station_en; 

 

	    }


      if($device=="pc"){

          $area_size_title_h=$area_size_title;

      }else{
          $area_size_title_h='';
      }
 
  
   }else{  // check ว่า มี CX นี้ไหม
     
      echo("<script> top.location.href='https://www.connex.in.th/error/$lang'</script>"); 

  }

 ?>


<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo $part;?>css/bootstrap.css" />
 <?php if($device=="pc"){ ?> 
    <link href="<?php echo $part;?>css/main.css?v=<?php echo $todate;?>" rel="stylesheet" type="text/css" />   
<!--    <link rel="preload" onload="this.rel = 'stylesheet'" href="<?php echo $part;?>css/main.css?v=<?php echo $todate;?>" as="style">-->
 <?php }else{ ?>
    <link href="<?php echo $part;?>css/main_mobile.css?v=<?php echo $todate;?>" rel="stylesheet" type="text/css" />   
 <?php } ?>
    <link rel="icon" type="image/x-icon" href="<?php echo  $baseUrl;?>/images/logo_icon.webp"> 
    <link rel="preload" onload="this.rel = 'stylesheet'" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" as="style">
    <!--<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>  -->
	  <title><?php echo $settings_title;?> </title>
    <meta name="author" content="Connex Property">
    <!--<meta name="keywords" content="ขายบ้านเดี่ยว,ขายคอนโดมิเนียม,ขายทาวน์โฮม,ขายที่ดิน">-->
    <meta name="description" content="<?php echo $settings_description;?> | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ">	

   <link rel="canonical" href="<?php echo $myurl;?> " />
   <meta property="og:locale" content="en_US" />
   <meta property="og:type" content="website" />
   <meta property="og:title" content="<?php echo $settings_title;?>" />
   <meta property="og:description" content="<?php echo $settings_description;?>" />
   <meta property="og:url" content="<?php echo $myurl;?>" />
   <meta property="og:site_name" content="Connex Property ขายบ้าน คอนโด" />
   <meta property="og:image" content="<?php echo $img_list1;?>" />
   <meta name="twitter:card" content="Connex Property ขายบ้าน คอนโด" />
   <meta name="twitter:description" content="<?php echo $settings_description;?>" />
   <meta name="twitter:title" content="<?php echo $settings_title;?>" />
   <meta name="twitter:image" content="<?php echo $img_list1;?>" />
  <!-- 
    <link rel="preload" onload="this.rel = 'stylesheet'" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" as="style">
    <link rel="preload" onload="this.rel = 'stylesheet'" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" as="style">-->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" />
    <link href="<?php echo $part;?>css/slideshow.css?v=<?php echo $todate;?>" rel="stylesheet" type="text/css" />  
</head>
<body>

   <?php include("./include/menu.php");?>

	<main>

		<div class="map-nav">
			 <?php echo $link_home;?> /  <?php echo $province_name;?> / <span><?php echo $project_name;?></span>
		</div>  

 


		<section class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-xl-10">
					<div class="col-xl-12">
						<div class="row top-detail">
							<div class="col-lg-6">
								<h1><?php echo $heading_h1;?></h1>
								<h6>Unit ID: <?php echo $ex_list_listing_code;?></h6>
           <!--
								<span>
									<i class="fal fa-star" style="color:#ffe747;"></i>
									<i class="fal fa-star"></i>
									<i class="fal fa-star"></i>
									<i class="fal fa-star"></i>
									<i class="fal fa-star"></i>
                </span> -->

                  <img src="../../../images/star.webp" style="width: 15px; height: 15px;" alt="คะแนน" >
                  <img src="../../../images/star.webp" style="width: 15px; height: 15px;" alt="คะแนน">
                  <img src="../../../images/star.webp" style="width: 15px; height: 15px;" alt="คะแนน">
                  <img src="../../../images/star.webp" style="width: 15px; height: 15px;" alt="คะแนน">
                  <img src="../../../images/star.webp" style="width: 15px; height: 15px;" alt="คะแนน">
									 
								
								<h4><?php echo $addres;?> </h4>
							</div>
							<div class="col-lg-6 optix mb-x" >


          <!-- ที่ดิน -->
         <?php if($ex_list_listing_type=='12'){ ?> 

              <?php if($ex_list_listing_type!='' and $ex_list_listing_type!='1'){ ?>
                      <div  >
                        <center>
                          <table style="width: 200px;">
                            <tr>
                               <td width="60"><img style="width: 60px; height: 60px;" src="<?php echo $part;?>images/55.webp" alt="<?php echo $area_2;?>" title="<?php echo $area_2;?>" ></td>
                               <td><h5  style="margin-top: 10px;">  <span><?php echo $area_2;?></span> </h5></td>
                            </tr>
                          </table> 
                        </center>
                      </div>
                <?php } ?>

         <?php }else{ ?>
  

    								<div><center>
    									<img src="<?php echo $part;?>images/22.webp" alt="<?php echo $bedroom_title;?>" title="<?php echo $bedroom_title;?>">
    									<h5><?php if($ex_list_bedroom_check!='0'){ echo $bedroom_title; }?> <span><?php echo $ex_list_bedroom;?></span></h5></center>
    								</div>

     
    								<div>
                      <center>
      									<img src="<?php echo $part;?>images/11.webp" alt="<?php echo $bathroom_title;?>" title="<?php echo $bathroom_title;?>"  >
      									<h5><?php echo $bathroom_title;?> <span><?php echo $ex_list_bathroom;?></span></h5>
                      </center>
    								</div> 
        

    			        <?php if($ex_list_train_station!=''){ ?>
                    <!--
    								<div>
    									<img src="<?php echo $part;?>images/33.png" alt="">
    									<center><h5>รถไฟฟ้า <span>1</span></h5></center>
    								</div>-->
    				    <?php } ?>
    				           

            <?php if($ex_list_listing_type!='' and $ex_list_listing_type!='1'){ ?>
    								<div>
                      <center>
      									<img src="<?php echo $part;?>images/66.webp" alt="<?php echo $parking_title;?>" title="<?php echo $parking_title;?>"  >
      									<h5><?php echo $parking_title;?> <span><?php echo $ex_list_parking;?></span></h5>
                      </center>
    								</div>
                  <?php } ?>

    				 <?php if($ex_list_floor!='0' and $ex_list_floor!='' and $ex_list_listing_type=='1'){ ?>
    								<div>
    									<center>
                        <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $parking_title;?>" title="<?php echo $parking_title;?>" >
    									  <h5><?php echo $floors_title;?> <span><?php echo $ex_list_floor;?></span></h5>
                      </center>
    								</div>
    					<?php }else if($ex_list_floor!='0' and $ex_list_floor!=''){  ?>
                    <div>
                      <center>
                        <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_total_title;?>" title="<?php echo $floors_total_title;?>">
                        <h5><?php echo $floors_total_title;?> <span><?php echo $ex_list_floor;?></span></h5>
                      </center>
                    </div>
              <?php } ?>

            <?php if($ex_list_listing_type!='' and $ex_list_listing_type!='1'){ ?>
                    <div>
                      <center>
                        <img src="<?php echo $part;?>images/55.webp" alt="<?php echo $area_land_title;?>" title="<?php echo $area_land_title;?>">
                        <h5><?php echo $area_land_title;?> <span><?php echo $area;?></span> </h5>
                      </center>
                    </div>
              <?php } ?>

    					<?php if($ex_list_sqm!='0' and $ex_list_sqm!='' ) {  ?>
    								<div>
    									<center>
                        <img src="<?php echo $part;?>images/88.webp" alt="<?php echo $area_size_title_h;?>" title="<?php echo $area_size_title_h;?>">
    									  <h5><?php echo $area_size_title_h;?> <span><?php echo $ex_list_sqm;?></span><?php echo $sqm_title;?></h5>
                      </center>
    								</div>
             <?php } ?>  

       <?php } ?>

							</div>
						</div>
					</div>
 
					<div class="row">
						<div class="col-xl-9 pr-0 pr-mn">

							<div class="rent-sell">
								<a href="#">
									<div class="label-rent">
										<div>
											<span><?php echo $ex_list_deal_type_lang;?></span>
											<!--<span>30 <br> ยูนิต</span> -->
										</div> 
										<p>฿<?php echo number_format($ex_list_price);?></p> 
									</div>
								</a> 
								<!--
								<a href="#">
									<div class="label-rent">
										<div>
											<span>ขาย</span>
											<span>30 <br> ยูนิต</span>
										</div> 
										<h1>฿6,900,000</h1> 
									</div>
								</a>
							    -->
							</div> 


            <link rel="stylesheet" href="<?php echo $part;?>css/w4.css?v=<?php echo $todate;?>">


 
             <div id="id01" class="w3-modal" >
       <?php if($device=='pc'){?>
                <div class="w3-modal-content w3-animate-top w3-card-4" style="max-width: 300px; z-index: 30000;" >
       <?php }else{ ?>
                <div class="w3-modal-content w3-animate-top w3-card-4" style="max-width: 100%;  z-index: 30000;">
       <?php } ?>
                  <header class="w3-container w3-teal"> 
                    <span onclick="document.getElementById('id01').style.display='none'" 
                    class="w3-button w3-display-topright"><img src="../../../images/x.webp" alt="ปิด" title="ปิด"></span>
                    <h2><?php echo $share_link_title;?></h2>
                  </header>
                  <div class="w3-container">
                        <table style="margin-top: 10px; width: 100%;">
                          <tr>
                             <td>  
                                 <center><div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url_share;?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><img src="../../../images/sc2.webp"  style="padding: 5px; width:70px;" alt="facebook" title="facebook" ></a></a></div></center>
                             </td>
                             <td>
                                 <center><a href="https://social-plugins.line.me/lineit/share?url=<?php echo $url_share;?>"><img src="../../../images/sc1.webp" style="padding: 5px; width:70px;" alt="line" title="line" ></a></center>                                 
                             </td> 
                          </tr>
   

                        </table>

                        <table style="width: 100%;margin-bottom: 10px;">
                          <tr>
                             <td style="padding: 5px;">  
                                  <SCRIPT LANGUAGE="JavaScript">
                                       function copyit(field){
                                      var temp=document.getElementById(field);
                                      temp.focus();
                                      temp.select();
                                      document.execCommand("copy");
                                    }
                                    </SCRIPT> 
                                   <input type="text" class="form-control"  id="url" style="width: 100%;"  onfocus="javascript:this.select();" value="<?php echo $url_share;?>"  > 
                             </td>
                          </tr>
                           <tr>
                             <td style="padding: 5px;">
                                 <center><button href="#" rel="noopener"  class="btn btn-unit" onclick="copyit('url');" ><?php echo $copy_link_title;?></button></center>                                 
                             </td> 
                          </tr>
                        </table>
                                
                                   
                  </div>
                </div>
             </div>
  
 

							<button class="btn btn-share" id="myBtn" onclick="document.getElementById('id01').style.display='block'"  ><?php echo $share_title;?> <i class="fal fa-share-alt"></i></button>
							 
							<!--<a href="#" class="btn btn-print">พิมพ์ <i class="fal fa-print"></i></a>-->

							<div class="img-view"  > 
                  <img src="<?php echo $img_list1;?>" class="img-view-1" alt="<?php echo $settings_title;?>" title="<?php echo $settings_title;?>"  >
              </div>
            
      <?php if($device=='m'){ ?> 

              <a href="#" class="btn btn-enquirenow" onclick="document.getElementById('id02').style.display='block'"><?php echo $unit_interested_title;?></a>

      <?php } ?>

							<div class="box-view">
								<!--
								<div class="box-view-type" data-tab="view360">
									<div style="background: url(<?php echo $part;?>images/v3.png);">
										<img src="images/360.png" alt="">
									</div>
									<h3>ดูภาพ 360 เสมือนจริง</h3>
								</div>-->
								<div class="box-view-type" data-tab="streetview"  id="button_street">
                  <div><img src="../../../images/streetview.webp" alt="<?php echo $street_view_title;?>" title="<?php echo $street_view_title;?>" ></div> 
									<h3><?php echo $street_view_title;?></h3>
								</div>
								<div class="box-view-type" data-tab="localtion"  id="button_map"> 
                  <div><img src="../../../images/location_map.webp" alt="<?php echo $location_map_title;?>" title="<?php echo $location_map_title;?>" ></div> 
									<h3><?php echo $location_map_title;?></h3>
								</div> 

							</div>

						</div>
						<div class="col-xl-3 img-view-sub"  >
							<div style="cursor: pointer;" >
                   <img src="<?php echo $img_list2;?>" class="img_r1"   alt="<?php echo $settings_title;?>" title="<?php echo $settings_title;?>"  >
              </div>
							<div style="cursor: pointer;" >
                   <img src="<?php echo $img_list3;?>"  alt="<?php echo $settings_title;?>" title="<?php echo $settings_title;?>" >
              </div>
							<div style="cursor: pointer;" >
                   <img src="<?php echo $img_list4;?>" class="img_r2"  alt="<?php echo $settings_title;?>" title="<?php echo $settings_title;?>" >
                <a href="#"><!--<p>+ <?php echo $sum_count;?> images</p>--></a>
              </div>
						</div>
					</div>
 



					<div class="col-xl-12">
						<div class="row top-detail">
							<div class="col-lg-6 d-none"> </div>
                 <div class="col-lg-6 optix pc-x">

          <!-- ที่ดิน -->
        <?php if($ex_list_listing_type=='12'){ ?>  


              <?php if($ex_list_listing_type!='' and $ex_list_listing_type!='1'){ ?>
                      <div  >
                        <center>
                          <table style="width: 200px;">
                            <tr>
                               <td width="50"><img style="width: 50px; height: 50px;" src="<?php echo $part;?>images/55.webp" alt="<?php echo $area_2;?>" title="<?php echo $area_2;?>" ></td>
                               <td><h5  style="margin-top: 10px;">  <span><?php echo $area_2;?></span> </h5></td>
                            </tr>
                          </table> 
                        </center>
                      </div>
                <?php } ?>

               


        <?php }else{ ?>
            <!-- อื่นๆ -->
 
                      <div><center>
                        <img src="<?php echo $part;?>images/22.webp" alt="<?php echo $bedroom_title;?>" title="<?php echo $bedroom_title;?>" >
                        <h5><?php if($ex_list_bedroom_check!='0'){ echo $bedroom_title; }?> <span><?php echo $ex_list_bedroom;?></span></h5></center>
                      </div>
                      <div>
                        <center>
                          <img src="<?php echo $part;?>images/11.webp" alt="<?php echo $bathroom_title;?>" title="<?php echo $bathroom_title;?>" >
                          <h5><?php echo $bathroom_title;?> <span><?php echo $ex_list_bathroom;?></span></h5>
                        </center>
                      </div> 

                    <?php if($ex_list_train_station!=''){ ?>
                      <!--
                      <div>
                        <img src="<?php echo $part;?>images/33.png" alt="">
                        <center><h5>รถไฟฟ้า <span>1</span></h5></center>
                      </div>-->
                  <?php } ?>
                         


              <?php if($ex_list_listing_type!='' and $ex_list_listing_type!='1'){ ?>
                      <div>
                        <center>
                          <img src="<?php echo $part;?>images/66.webp" alt="<?php echo $parking_title;?>" title="<?php echo $parking_title;?>" >
                          <h5><?php echo $parking_title;?> <span><?php echo $ex_list_parking;?></span></h5>
                        </center>
                      </div>
                    <?php } ?>

              <?php if($ex_list_listing_type!='' and $ex_list_listing_type!='1'){ ?>
                      <div>
                        <center>
                          <img src="<?php echo $part;?>images/55.webp" alt="<?php echo $area_2;?>" title="<?php echo $area_2;?>" >
                          <h5>  <span><?php echo $area_2;?></span> </h5>
                        </center>
                      </div>
                <?php } ?>

               
               <?php if($ex_list_floor!='0' and $ex_list_floor!='' and $ex_list_listing_type=='1'){ ?>
                      <div>
                        <center>
                          <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_title;?>" title="<?php echo $floors_title;?>">
                          <h5><?php echo $floors_title;?> <span><?php echo $ex_list_floor;?></span></h5>
                        </center>
                      </div>
                <?php }else if($ex_list_floor!='0' and $ex_list_floor!=''){  ?>
                      <div>
                        <center>
                          <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_total_title;?>" title="<?php echo $floors_total_title;?>">
                          <h5><?php echo $floors_total_title;?> <span><?php echo $ex_list_floor;?></span></h5>
                        </center>
                      </div>
                <?php } ?>

                <?php if($ex_list_sqm!='0' and $ex_list_sqm!='' ) {  ?>
                      <div>
                        <center>
                          <img src="<?php echo $part;?>images/88.webp" alt="<?php echo $sqm_title;?>" title="<?php echo $sqm_title;?>">
                          <h5><?php echo $area_size_title_h;?> <span><?php echo $ex_list_sqm;?></span><?php echo $sqm_title;?></h5>
                        </center>
                      </div>
               <?php } ?>  


        <?php } ?>

							</div>
						</div>
					</div>
				
					<div class="row main-description">
						<div class="col-xl-9">
        
   <?php if($about!=''){ ?>
							<h2><?php echo $about_title;?></h2>
							<h6>
								<?php echo $about;?> 
 
							</h6>

    <?php } ?>
							<!--
							<h2>Room feature </h2>
							<div class="col-xl-12">
								<div class="row">
									<div class="col-md-4 col-6 room-feature">
										<img src="images/rr1.png" alt="">Corner Unit
									</div>
									<div class="col-md-4 col-6 room-feature">
										<img src="images/rr2.png" alt="">Balcony
									</div>
									<div class="col-md-4 col-6 room-feature">
										<img src="images/rr3.png" alt="">Full Western Kitchen
									</div>
									<div class="col-md-4 col-6 room-feature">
										<img src="images/rr4.png" alt="">Fully Renovated
									</div>
									<div class="col-md-4 col-6 room-feature">
										<img src="images/rr5.png" alt="">Renovated Kitchen
									</div>
									<div class="col-md-4 col-6 room-feature">
										<img src="images/rr6.png" alt="">Washing Machine
									</div>
									<div class="col-md-4 col-6 room-feature">
										<img src="images/rr7.png" alt="">Oven
									</div>
									<div class="col-md-4 col-6 room-feature">
										<img src="images/rr8.png" alt="">TV
									</div> 
								</div>
							</div>-->

							<h2><?php echo $information_title;?></h2>
							<div class="col basic-information">
								<div class="row">
									<div class="col-6 pr-5">
										
										<h4>
											<?php echo $property_type_title;?>
											<br>
											<span><?php echo $name_type_lang;?></span>
										</h4>

										<h4>
										    <?php echo $bed_title;?>
											<br>
											<span><?php echo $ex_list_bedroom;?></span>
										</h4>
										<h4>
											<?php echo $area_size_title;?>
											<br>
											<span><?php echo $ex_list_sqm;?> <?php echo $sqm_title;?></span>
										</h4>

                    <h4>
                        <?php echo $price_score_title;?>
                      <br>
                      <span>฿<?php echo number_format($ex_list_price);?></span>
                    </h4>

                <?php if($furniture_name_lang!=''){?>
										<h4>
											<?php echo $furniture_title;?>
											<br>
											<span><?php echo $furniture_name_lang;?></span>
										</h4>
							  <?php } ?>
										<!--
										<h4>
											Unit Type
											<br>
											<span>1 Bedroom</span>
										</h4>
										<h4>
											CAM Fee 9
											<br>
											<span>฿1,519/mo</span>
										</h4>-->
										<h4>
											<?php echo $date_list_title;?>
											<br>
											<span><?php echo $date_update;?></span>
										</h4>
										 
									</div>
									<div class="col-6 pr-5">
                    <h4>
                      <?php echo $listing_title;?>
                      <br>
                      <span><?php echo $ex_list_listing_code;?></span>
                    </h4>
                    <h4>
                        <?php echo $bath_title;?>
                      <br>
                      <span><?php echo $ex_list_bathroom;?></span>
                    </h4>

 

              <?php if($ex_list_listing_type!='' and $ex_list_listing_type!='1'){ ?> 
                   <h4>
                        <?php echo $area_land_title;?>
                      <br>
                      <span><?php echo $area;?></span>
                   </h4> 
                
                <?php } ?>   


                    <h4>

               <?php if($ex_list_floor!='0' and $ex_list_floor!='' and $ex_list_listing_type=='1'){  
                           echo $floors_title;
                     }else{
                           echo $floors_total_title;                
                     }

                ?>
                      <br>
                  <?php if($ex_list_floor!='0' and $ex_list_floor!=''){ ?>
                      <span><?php echo $ex_list_floor;?></span>
                  <?php }else{ ?>
                           <span><?php echo $na_title;?></span>
                  <?php } ?>
                    </h4> 

                    <h4>
                      <?php echo $developer_title;?>
                      <br>
                  <?php if($project_developer!='0' and $project_developer!=''){ ?>
                      <span><?php echo $developer_name;?></span>
                  <?php }else{ ?>
                           <span><?php echo $na_title;?></span>
                  <?php } ?>
                    </h4> 




										<!-- 
										<h4>
											Condo Ownership
											<br>
											<span>Foreign Quota</span>
										</h4> 
										<h4>
											View(s)
											<br>
											<span>City View</span>
										</h4> -->
                   <!--
										<h4>
											Listed By
											<br>
											<span>Developer</span>
										</h4> -->
									</div>
								</div>
							</div>


   <?php if($ex_list_video!=''){  

                      $ex_list_video=substr($ex_list_video,-11); 
    ?>          
              <h2><?php echo $video_title;?></h2>
              <iframe width="100%" height="500" src="//www.youtube.com/embed/<?php echo $ex_list_video;?> " frameborder="0" allowfullscreen></iframe>

    <?php } ?>

                            
		  <?php if($project_id!='' and $project_id!='0'){ 




        ?>

							<h2><?php echo $project_detail_title;?></h2>

							<div class="project-detail">
								<a href="<?php echo $link_pro;?>" target="_black"> 
                   <img src="<?php echo $project_img_max300_folder1;?>" class="img" alt="<?php echo $project_name;?>" title="<?php echo $project_name;?>" > 
							  </a>
								<ul class="text">
						 
									<li><p><?php echo $project_title;?> : </p> <p><a href="<?php echo $link_pro;?>" target="_black"><span><strong><?php echo $project_name;?></strong></span></a></p></li>
									 
									<li><p><?php echo $developer_title;?> : </p> <p><strong><?php if($project_developer!=''){ echo $developer_name; }else{ echo $na_title;}?></strong> </p></li>
									
									<li><p><?php echo $floors_total_title;?> : </p> <p><strong><?php if($project_total_floors!=''){ echo $project_total_floors; } ?></strong></p></li>
									<li><p><?php echo $unit_title;?> : </p> <p><strong><?php if($project_unit!='0' and $project_unit!=''){ echo $project_unit; }else{ echo $na_title; } ?></strong></p></li> 
									<li><p><?php echo $train_station_title;?> : </p> <p><strong><?php if($station_name!=''){ echo $train_station; }else{ echo $na_title;}?> </strong></p></li>
									<li><p><?php echo $location_title;?> : </p> <p><strong><?php echo $addres;?></strong></p></li>
                  <li><p><?php echo $completed_title;?> :</p> <p><strong><?php if($project_completed!=''){ echo $project_completed; }else{ echo $na_title;}?></strong></p></li>  
								</ul>
							</div>
      <?php } ?>
   
		

						</div>
						
						<div class="col-xl-2">
							<div class="information">
								<h3><?php echo $more_information_title;?></h3>
                <form  name="form" action="../../include/process_contact.php"  enctype="multipart/form-data" method="post" >

                <input type="text" class="form-control-textbox" id="name" hidden  value="<?php echo $id;?>" name="listing_code"  >
                <input type="text" class="form-control-textbox" id="name" hidden  value="detail" name="contact_page" >

                <input type="text" class="form-control-textbox" id="name" hidden  value="<?php echo $myurl;?>" name="contact_url" >

                <input type="text" class="form-control-textbox" id="name" hidden  value="<?php echo $heading_h1;?>" name="contact_heading" >

									<div class="form-group row">
										<div class="col-lg-6 pr-1">
											<input type="text" class="form-control"  placeholder="<?php echo $name_contact_title;?>" name="contact_name" required >
										</div>
										<div class="col-lg-6 pl-1">
											<input type="text" class="form-control" placeholder="<?php echo $lastname_contact_title;?>" name="contact_last" required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-lg-12">
											<input type="email" class="form-control" placeholder="<?php echo $email_contact_title;?>" name="contact_email" required>
										</div> 
									</div>
									<div class="form-group row">
										<div class="col-lg-12">
											<input type="text" class="form-control" placeholder="<?php echo $tel_contact_title;?>" name="contact_tel" required>
										</div> 
									</div>
									<div class="form-group row">
										<div class="col-lg-12">
											<textarea name="contact_detail" id="" cols="30" class="form-control" placeholder="<?php echo $message_contact_title;?>"  ></textarea>
										</div> 
									</div>
                   <script> // กำหนดปุ่มเป็น disable ไว้ ต้องทำ reCHAPTCHA ก่อนจึงกดได้
                          function makeaction(){
                                document.getElementById('submit').disabled = false;  
                          }
                    </script>
                  <center><div class="g-recaptcha" data-callback="makeaction"  data-sitekey="6LfQtnglAAAAAPWamZXtjcYnsHfZRmwDKVRtcn-r"></div></center>
                  <button  type="submit" class="btn" id="submit" name="btn_submit" disabled><?php echo $send_message_title;?></button>

									
									<h2><?php echo $or_title;?></h2>

									
									<a href="tel:0990199900" class="btn btn-social"> <img src="<?php echo $part;?>images/dd1.webp" alt="เบอร์ติดต่อ" title="เบอร์ติดต่อ" > +66 99-019-9900</a> 
									<a href="https://line.me/ti/p/@connexproperty" target="_black" class="btn btn-social"> <img src="<?php echo $part;?>images/dd2.webp" alt="LINE " title="LINE"> @connexproperty</a> 
									<a href="https://m.me/177735605724407" class="btn btn-social"> <img src="<?php echo $part;?>images/dd3.webp" alt="FB Messenger " title="FB Messenger"> FB Messenger</a>
									<a href="https://wa.me/+66990199900" class="btn btn-social"> <img src="<?php echo $part;?>images/dd4.webp" alt="WhatsApp " title="WhatsApp"> WhatsApp</a>
									
								</form>
							</div>
						</div>
 

 
					</div> 
				</div>
			</div>
		</section>


<!--
    <section class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-10">
          <div class="col-xl-12">

            <div class="col-12" >

                           
              <h2>Location map</h2> 
             
   
              <div id="map"></div>


              </div> 
          </div>
        </div>
      </div>
    </section>-->

<?php 


    if($ex_list_bedroom_check=='1' or $ex_list_bedroom_check=='0'){
          $bed_checks='0';
    }else{
          $bed_checks='1'; 
    }
 
    $sql = "SELECT *  FROM dbo_data_excel_listing AS data 

             WHERE data.ex_list_listing_type='$ex_list_listing_type_check' and data.ex_list_public='1' and data.project_id='$project_id' and data.ex_list_deal_type='$ex_list_deal_type'  and 
                   data.ex_list_bedroom='$ex_list_bedroom_check' and $bed_checks='1' and  data.ex_list_listing_code!='$ex_list_listing_code' and   data.ex_list_close='0' or

                   data.ex_list_listing_type='$ex_list_listing_type_check' and data.ex_list_public='1' and data.project_id='$project_id' and data.ex_list_deal_type='$ex_list_deal_type'  and 
                   data.ex_list_bedroom='1' and $bed_checks='0' and data.ex_list_listing_code!='$ex_list_listing_code' and   data.ex_list_close='0' or

                   data.ex_list_listing_type='$ex_list_listing_type_check' and data.ex_list_public='1' and data.project_id='$project_id' and data.ex_list_deal_type='$ex_list_deal_type'  and 
                   data.ex_list_bedroom='0' and $bed_checks='0'and  data.ex_list_listing_code!='$ex_list_listing_code'  and   data.ex_list_close='0'

             order by data.ex_list_premium DESC, data.ex_list_listing_code DESC LIMIT 20";

    $result=$conn->query($sql); 
    $rowcount=mysqli_num_rows($result);

    if($rowcount>0){

?>
    <section class="sec-home-detail">
      <div class="container-fluid">
        
        <h3><?php echo $unit_project_a_title." ".$project_name ;?> </h3> 

        <div class="row justify-content-center">
          <div class="col-xl-11">  
  
            <ul id="item3" class="item3"> 
 
 <?php   

        // output data of each row
         while($rs = $result->fetch_assoc()){      $n++;  
              
              $ex_list_heading=$rs['ex_list_heading'];
              $ex_list_heading_en=$rs['ex_list_heading_en'];
              $ex_list_listing_code=$rs['ex_list_listing_code'];
              $ex_list_price=$rs['ex_list_price'];
              $ex_list_bedroom=$rs['ex_list_bedroom'];
              $ex_list_bedroom_check=$rs['ex_list_bedroom'];
              $ex_list_bathroom=$rs['ex_list_bathroom']; 
              $ex_list_deal_type=$rs['ex_list_deal_type'];
              $ex_list_parking=$rs['ex_list_parking'];
              $ex_list_sqm=$rs['ex_list_sqm'];
              $ex_list_listing_type=$rs['ex_list_listing_type'];
              $ex_list_floor=$rs['ex_list_floor'];
              $ex_list_project=$rs['ex_list_project'];
              $ex_list_parking=$rs['ex_list_parking']; 
              $project_id=$rs['project_id'];

              $ex_list_subdistrict=$rs['ex_list_subdistrict'];
              $ex_list_district=$rs['ex_list_district'];
              $ex_list_province=$rs['ex_list_province'];
               
              $ex_list_rai=$rs['ex_list_rai'];
              $ex_list_ngan=$rs['ex_list_ngan'];
              $ex_list_wa=$rs['ex_list_wa'];

              $listing_img_folder=$rs['listing_img_folder'];
              $listing_img_name=$rs['listing_img_name'];

             $ex_list_rai=$ex_list_rai* 400; 
             $ex_list_ngan=$ex_list_ngan* 100;   
             $ex_list_wa=$ex_list_rai+$ex_list_ngan+$ex_list_wa;

              $ex_list_pric=number_format($ex_list_price); 

              if($ex_list_deal_type=='ขาย' or $ex_list_deal_type=='1'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="SALE"; $sale_text="ขาย"; }
              else if($ex_list_deal_type=='เช่า' or $ex_list_deal_type=='2'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="RENT";   $sale_text="เช่า"; }
              
                    $listing_img_name=str_replace(".jpg",".webp",$listing_img_name); 
                    $listing_img_name=str_replace(".JPG",".webp",$listing_img_name);   
                    $listing_img_name=str_replace(".JPEG",".webp",$listing_img_name); 
                    $listing_img_name=str_replace(".jpeg",".webp",$listing_img_name);
                    $listing_img_name=str_replace(".png",".webp",$listing_img_name);   
                    $listing_img_name=str_replace(".PNG",".webp",$listing_img_name); 
               
                     if($listing_img_folder!=''){   

                           $img_name_list=$listing_img_folder."webp/mini_w500/".$listing_img_name;
                           $img_name_list=str_replace(" ","%20",$img_name_list);

                     }else if($listing_img_name!=''){   
                           $img_name_list="../../images/listing/".$ex_list_listing_code."/webp/mini_w500/".$listing_img_name;  
                           $img_name_list=str_replace(" ","%20",$img_name_list);
                            
                     }else{  $img_name_list="../../images/noimages.jpg" ;  $test1 = "000"; 

                     }  

 

                 if($ex_list_listing_type=='1'){ 
                          $area_land_title='';
                          $sqm_title=$sqm_title; 
                          $list_sqm=$ex_list_sqm;
                 }else{ 
                          $area_land_title=$area_land_title;
                          $sqm_title=$sqw_title;
                          $list_sqm=$ex_list_wa;
                 }
 

         if($lang=='th'){
                       
            $address=$address_near;
            $project_name=$project_name;
            $alt_heading=$ex_list_heading;
            $type_name=$type_th;
            $sale_text=$sale_text;
            $area_text=$area_th;
               if($ex_list_bedroom==0){ $ex_list_bedroom='สตูดิโอ'; }
         }else{

            $address=$address_near_en;
            $project_name=$project_name_en;
            $alt_heading=$ex_list_heading_en;
            $type_name=$type_en;
            $sale_text=$sale_text_en;
            $area_text=$area_en;

               if($ex_list_bedroom==0){ $ex_list_bedroom='Studio'; }
         }  

               if($n<=20  ){  
 ?>


              <li>
                <a href="<?php echo  $part;?>property/<?php echo $lang;?>/<?php echo $ex_list_listing_code;?>">
                  <div class="condo-card-detail">
                    <div class="cover"> 
                        <img src="<?php echo $img_name_list;?>"  class="coverimg" alt="<?php echo $alt_heading;?>" title="<?php echo $alt_heading;?>" >
                    </div>
                    <div class="detail">
                      <h4>฿<?php echo $ex_list_pric;?> <span><?php echo $type_name;?>  </span> </h4>
        
                      <h5><?php echo $project_name;?> <span><?php echo $sale_text;?></span></h5>
        
                      <h6><?php echo $address;?></h6>
                    </div>
                    <div class="option">
                      <table>
                        <tr> 
                           <td>
                                <img src="<?php echo $part;?>images/22.webp" alt="<?php echo $bedroom_title;?>" title="<?php echo $bedroom_title;?>" >
                                <h6><?php if($ex_list_bedroom_check==0){ ?><span><?php  echo $ex_list_bedroom; ?> </span> 
                                  <?php }else{ echo $bedroom_title;?> <span><?php echo $ex_list_bedroom;?> </span> <?php } ?></h6>
                           </td>
                            
                           <td>
                                <img src="<?php echo $part;?>images/11.webp" alt="<?php echo $bathroom_title;?>" title="<?php echo $bathroom_title;?>" >
                                <h6><?php echo $bathroom_title;?> <span><?php echo $ex_list_bathroom;?> </span></h6>
                           </td>
                      <?php if($ex_list_listing_type==1){?>
                           <td>
                                <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_title;?>" title="<?php echo $floors_title;?>" >
                                <h6><?php echo $floors_title;?> <span><?php echo $ex_list_floor;?></span></h6>
                           </td>
                      <?php }else{ ?>
                           <td>
                                <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_total_title;?>" title="<?php echo $floors_total_title;?>">
                                <h6><?php echo $floors_total_title;?> <span><?php echo $ex_list_floor;?></span></h6>
                           </td>
                      <?php } ?>   
                           <td>
                                <img src="<?php echo $part;?>images/88.webp" alt="<?php echo $area_land_title;?>" title="<?php echo $area_land_title;?>">
                                <h6><?php echo $area_land_title;?> <span><?php echo $list_sqm;?></span> <?php echo $sqm_title;?></h6>
                           </td>
                        </tr>
                      </table>

                        <center>
                                  <a  class="btn btn-unit" onclick="document.getElementById('id02').style.display='block'" ><?php echo $unit_interested_title;?></a>
                                  <a href="<?php echo $part;?>property/<?php echo $lang;?>/<?php echo $ex_list_listing_code;?>" class="btn btn-des"><?php echo $details_title;?></a>
                              </center>
                    </div>
                        
                  </div>
                </a>
              </li>
           
   <?php        }
        } ?>



            </ul> 
          </div>
        </div>
      </div> 

    </section>

<?php } ?>


             <div id="id02" class="w3-modal" style="padding-top:10px;" >

       <?php if($device=='pc'){?>
                <div class="w3-modal-content w3-animate-top w3-card-4" style="max-width: 400px;">
       <?php }else{ ?>
                <div class="w3-modal-content w3-animate-top w3-card-4" style="max-width: 100%; ">
       <?php } ?>

                  <header class="w3-container w3-teal"> 
                    <span onclick="document.getElementById('id02').style.display='none'" 
                    class="w3-button w3-display-topright"> <img src="../../../images/x.webp"></span><!--&times;-->
                    <h2><?php echo $more_information_title;?></h2>
                  </header>
                  <div class="w3-container">
              
                    <div class="col-xl-12" style="margin-top: 10px;margin-bottom: 10px;">
                      <div class="information2">
                       
                        <form  name="form"  action="../../include/process_contact.php"  enctype="multipart/form-data" method="post" >

                        <input type="text" class="form-control-textbox" id="name" hidden  value="<?php echo $id;?>" name="listing_code" >
                        <input type="text" class="form-control-textbox" id="name" hidden  value="detail" name="contact_page" >

                        <input type="text" class="form-control-textbox" id="name" hidden  value="<?php echo $myurl;?>" name="contact_url" >

                        <input type="text" class="form-control-textbox" id="name" hidden  value="<?php echo $heading_h1;?>" name="contact_heading" >

                          <div class="form-group row">
                            <div class="col-lg-6 pr-1">
                              <input type="text" class="form-control"  placeholder="<?php echo $name_contact_title;?>" name="contact_name" required >
                            </div>
                            <div class="col-lg-6 pl-1">
                              <input type="text" class="form-control" placeholder="<?php echo $lastname_contact_title;?>" name="contact_last" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-12">
                              <input type="email" class="form-control" placeholder="<?php echo $email_contact_title;?>" name="contact_email" required>
                            </div> 
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-12">
                              <input type="text" class="form-control" placeholder="<?php echo $tel_contact_title;?>" name="contact_tel" required>
                            </div> 
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-12">
                              <textarea name="contact_detail" id="" cols="30" class="form-control" placeholder="<?php echo $message_contact_title;?>"  ></textarea>
                            </div> 
                          </div>
                         <script> // กำหนดปุ่มเป็น disable ไว้ ต้องทำ reCHAPTCHA ก่อนจึงกดได้
                          function makeaction(){
                                document.getElementById('submit').disabled = false;  
                          }
                          </script>
                          <center><div class="g-recaptcha" data-callback="makeaction"  data-sitekey="6LfQtnglAAAAAPWamZXtjcYnsHfZRmwDKVRtcn-r"></div></center>
                          <button  type="submit" id="submit" name="btn_submit" class="btn" disabled><?php echo $send_message_title;?></button>
  
                          <a href="tel:0990199900" class="btn btn-social"> <img src="<?php echo $part;?>images/dd1.webp" alt="เบอร์ติดต่อ" title="เบอร์ติดต่อ" > +66 99-019-9900</a> 
                          <a href="https://line.me/ti/p/@connexproperty" target="_black" class="btn btn-social"> <img src="<?php echo $part;?>images/dd2.webp" alt="LINE" title="LINE"> @connexproperty</a> 
                          <a href="https://m.me/177735605724407" class="btn btn-social"> <img src="<?php echo $part;?>images/dd3.webp" alt="FB Messenger" title="FB Messenger"> FB Messenger</a>
                          <a href="https://wa.me/+66990199900" class="btn btn-social"> <img src="<?php echo $part;?>images/dd4.webp" alt="WhatsApp" title="WhatsApp"> WhatsApp</a>
                          
                        </form>
                      </div>
                    </div>                   
                                   
                  </div>
                </div>
             </div>

 
<?php


 
 /*

   $sql = "SELECT data.ex_list_heading, data.ex_list_listing_code , data.ex_list_bedroom, data.ex_list_deal_type , data.ex_list_bathroom , data.ex_list_price ,
                  data.ex_list_project , data.ex_list_sqm , data.ex_list_floor , data.project_id , data.ex_list_listing_type  , 
                  data.ex_list_subdistrict , data.ex_list_district  , data.ex_list_province  ,  pj.project_proppit_latitude , 
                  pj.project_id , pj.project_name , pj.project_name_en , pj.project_subdistrict , pj.project_district , pj.project_province
         FROM dbo_data_excel_listing AS data
         LEFT JOIN type_project AS pj  On data.project_id=pj.project_id  

          WHERE data.ex_list_listing_type='1' and data.ex_list_public='1' and data.project_id!='$project_id' and pj.zone_id='$zone_id' and data.ex_list_deal_type='$ex_list_deal_type'
          order by pj.project_id DESC , data.ex_list_premium DESC,data.ex_list_img_score DESC , data.ex_list_listing_code DESC LIMIT 12";*/

/*
if($ex_list_listing_type=='1' or $ex_list_listing_type=='5' or $ex_list_listing_type=='7' or $ex_list_listing_type=='8' or $ex_list_listing_type=='9' or $ex_list_listing_type=='10' or $ex_list_listing_type=='11'  or $ex_list_listing_type=='12'  ){  //เฉาะคอนโดมิเนียม



     $sql_project="SELECT  Distinct pj.project_proppit_latitude ,  pj.project_id , pj.project_name , pj.project_name_en , pj.project_subdistrict , pj.project_district , 
                           pj.project_province ,  pj.project_type , pj.project_listing_count
          FROM  type_project AS pj  
          LEFT JOIN dbo_data_excel_listing AS data  On data.project_id=pj.project_id  
          WHERE pj.project_id!='$project_id' and pj.zone_id='$zone_id' and pj.project_name!='' and pj.project_type='$ex_list_listing_type' and pj.project_listing_count_public>=2 and
                data.ex_list_listing_type='$ex_list_listing_type_check' and data.ex_list_public='1' and data.ex_list_deal_type='$ex_list_deal_type'  and 
                data.ex_list_bedroom='$ex_list_bedroom_check' and $bed_checks='1' or

                pj.project_id!='$project_id' and pj.zone_id='$zone_id' and pj.project_name!='' and pj.project_type='$ex_list_listing_type' and pj.project_listing_count_public>=2 and
                data.ex_list_listing_type='$ex_list_listing_type_check' and data.ex_list_public='1' and data.ex_list_deal_type='$ex_list_deal_type'  and 
                data.ex_list_bedroom='1' and $bed_checks='0' or
   
                pj.project_id!='$project_id' and pj.zone_id='$zone_id' and pj.project_name!='' and pj.project_type='$ex_list_listing_type' and pj.project_listing_count_public>=2 and
                data.ex_list_listing_type='$ex_list_listing_type_check' and data.ex_list_public='1' and data.ex_list_deal_type='$ex_list_deal_type'  and 
                data.ex_list_bedroom='0' and $bed_checks='0'
   


          order by pj.project_listing_count DESC  LIMIT 12 ";
     $result_project=$conn->query($sql_project); 
     $rowcount_project=mysqli_num_rows($result_project);

}else if($ex_list_listing_type=='2' or $ex_list_listing_type=='3' or $ex_list_listing_type=='4' or $ex_list_listing_type=='6'){ 


     $sql_project="SELECT  pj.project_proppit_latitude ,  pj.project_id , pj.project_name , pj.project_name_en , pj.project_subdistrict , pj.project_district , 
                           pj.project_province ,  pj.project_type , pj.project_listing_count_public
          FROM  type_project AS pj  
          WHERE pj.project_id!='$project_id' and pj.zone_id='$zone_id' and pj.project_name!='' and pj.project_type='2' and pj.project_listing_count_public!='0' or 
                pj.project_id!='$project_id' and pj.zone_id='$zone_id' and pj.project_name!='' and pj.project_type='3' and pj.project_listing_count_public!='0' or
                pj.project_id!='$project_id' and pj.zone_id='$zone_id' and pj.project_name!='' and pj.project_type='4' and pj.project_listing_count_public!='0' 
          order by pj.project_listing_count_public DESC LIMIT 12 ";
     $result_project=$conn->query($sql_project); 
     $rowcount_project=mysqli_num_rows($result_project);

}
 */

        // output data of each row
 



if($ex_list_listing_type=='1' or $ex_list_listing_type=='5' or $ex_list_listing_type=='7' or $ex_list_listing_type=='8' or $ex_list_listing_type=='9' or $ex_list_listing_type=='10' or $ex_list_listing_type=='11'  or $ex_list_listing_type=='12'  ){  //เฉาะคอนโดมิเนียม

      $sql="SELECT * FROM dbo_data_excel_listing AS data 

          WHERE   data.ex_list_listing_type='$ex_list_listing_type_check' and data.ex_list_public='1'  and data.ex_list_deal_type='$ex_list_deal_type' and 
                  data.project_id!='$project_id' and data.zone_id='$zone_id'  and 
                  data.ex_list_bedroom='$ex_list_bedroom_check' and $bed_checks='1' and  data.ex_list_listing_code!='$ex_list_listing_code' and   data.ex_list_close='0'
                  or 
                  data.ex_list_listing_type='$ex_list_listing_type_check' and data.ex_list_public='1' and data.ex_list_deal_type='$ex_list_deal_type' and 
                  data.project_id!='$project_id' and data.zone_id='$zone_id'  and 
                  data.ex_list_bedroom='1' and $bed_checks='0' and data.ex_list_listing_code!='$ex_list_listing_code' and   data.ex_list_close='0'
                  or 
                  data.ex_list_listing_type='$ex_list_listing_type_check' and data.ex_list_public='1'  and data.ex_list_deal_type='$ex_list_deal_type' and 
                  data.project_id!='$project_id' and data.zone_id='$zone_id'  and 
                  data.ex_list_bedroom='0' and $bed_checks='0' and data.ex_list_listing_code!='$ex_list_listing_code'   and   data.ex_list_close='0'

          order by  data.ex_list_premium DESC,data.ex_list_img_score DESC , data.ex_list_listing_code ASC LIMIT 12";


}else if($ex_list_listing_type=='2' or $ex_list_listing_type=='3' or $ex_list_listing_type=='4' or $ex_list_listing_type=='6'){ 

         $sql="SELECT * FROM dbo_data_excel_listing AS data 

         WHERE   data.ex_list_listing_type='$ex_list_listing_type_check' and data.ex_list_public='1' and data.zone_id='$zone_id' and data.project_id!='$project_id'   and 
                  data.ex_list_listing_code!='$ex_list_listing_code' and   data.ex_list_close='0'
         order by  data.ex_list_premium DESC,data.ex_list_img_score DESC , data.ex_list_listing_code ASC LIMIT 12";

}

     $result = $conn->query($sql); 
     $rowcount=mysqli_num_rows($result);

     if($rowcount>=1){
   
 ?>

    <section class="sec-home-detail_2"  >

      <div class="container-fluid">
        
        <h3><?php echo $unit_project_b_title;?> </h3>

        

        <div class="row justify-content-center">
          <div class="col-xl-11">  
  
            <ul id="item4" class="item4"> 
 
 <?php   
 /*
      while($rs_project= $result_project->fetch_assoc()){    

       $project_id_2=$rs_project['project_id']; */ 


        // output data of each row
         while($rs = $result->fetch_assoc()){     $n2++;  //ยูนิตในโครงการใกล้เคียงกัน
                
              $ex_list_heading=$rs['ex_list_heading'];
              $ex_list_listing_code=$rs['ex_list_listing_code'];
              $ex_list_price=$rs['ex_list_price'];
              $ex_list_bedroom=$rs['ex_list_bedroom'];
              $ex_list_bedroom_check=$rs['ex_list_bedroom'];
              $ex_list_bathroom=$rs['ex_list_bathroom']; 
              $ex_list_deal_type=$rs['ex_list_deal_type'];
              $ex_list_parking=$rs['ex_list_parking'];
              $ex_list_sqm=$rs['ex_list_sqm'];
              $ex_list_floor=$rs['ex_list_floor'];
              $ex_list_listing_type=$rs['ex_list_listing_type'];
              $ex_list_project=$rs['ex_list_project'];
              $ex_list_parking=$rs['ex_list_parking'];
              $project_name=$rs['project_name'];
              $project_name_en=$rs['project_name_en'];
              $project_id=$rs['project_id'];

              $ex_list_subdistrict=$rs['ex_list_subdistrict'];
              $ex_list_district=$rs['ex_list_district'];
              $ex_list_province=$rs['ex_list_province'];
 
              $ex_list_rai=$rs['ex_list_rai'];
              $ex_list_ngan=$rs['ex_list_ngan'];
              $ex_list_wa=$rs['ex_list_wa'];

              $listing_img_folder=$rs['listing_img_folder'];
              $listing_img_name=$rs['listing_img_name'];

              $ex_list_rai=$ex_list_rai* 400; 
              $ex_list_ngan=$ex_list_ngan* 100;   
              $ex_list_wa=$ex_list_rai+$ex_list_ngan+$ex_list_wa;
              
              $ex_list_pric=number_format($ex_list_price); 

              if($ex_list_deal_type=='ขาย' or $ex_list_deal_type=='1'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="SALE"; $sale_text="ขาย"; }
              else if($ex_list_deal_type=='เช่า' or $ex_list_deal_type=='2'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="RENT";   $sale_text="เช่า"; }
               
                    $listing_img_name=str_replace(".jpg",".webp",$listing_img_name); 
                    $listing_img_name=str_replace(".JPG",".webp",$listing_img_name);   
                    $listing_img_name=str_replace(".JPEG",".webp",$listing_img_name); 
                    $listing_img_name=str_replace(".jpeg",".webp",$listing_img_name);
                    $listing_img_name=str_replace(".png",".webp",$listing_img_name);   
                    $listing_img_name=str_replace(".PNG",".webp",$listing_img_name); 

                     if($listing_img_folder!=''){   

                           $img_name_list=$listing_img_folder."webp/mini_w500/".$listing_img_name;
                           $img_name_list=str_replace(" ","%20",$img_name_list);

                     }else if($listing_img_name!=''){   

                           $img_name_list="../../images/listing/".$ex_list_listing_code."/webp/mini_w500/".$listing_img_name;  
                           $img_name_list=str_replace(" ","%20",$img_name_list);
                            
                     }else{ 

                            $img_name_list="../../images/noimages.jpg" ;  $test1 = "000"; 

                     }  


               $sql_project= "SELECT *  FROM  type_project AS pj WHERE  pj.project_id='$project_id' LIMIT 1 "; 
               $result_project=$conn->query($sql_project); 
               $rs_project= $result_project->fetch_assoc();


              if($project_id!=''){

                     $project_name=$rs_project['project_name'];
                     $project_name_en=$rs_project['project_name_en'];
                     $ex_list_subdistrict=$rs_project['project_subdistrict'];
                     $ex_list_district=$rs_project['project_district'];
                     $ex_list_province=$rs_project['project_province']; 

              }

                 if($ex_list_listing_type=='1'){ 
                          $area_land_title='';
                          $sqm_title=$sqm_title; 
                          $list_sqm=$ex_list_sqm;
                 }else{ 
                          $area_land_title=$area_land_title;
                          $sqm_title=$sqw_title;
                          $list_sqm=$ex_list_wa;
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



               if($province_id=='1'){
                     
                     $address="".$project_subdistrict." , ".$project_district." , ".$project_province;
                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en;

               }else{

                     $address="".$project_subdistrict." , ".$project_district." , ".$project_province;
                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en; 
               }
              

         if($lang=='th'){
                       
            $address=$address;
            $project_name=$project_name;
            $alt_heading=$ex_list_heading;
            $type_name=$type_th;
            $sale_text=$sale_text;
            $area_text=$area_th;
               if($ex_list_bedroom==0){ $ex_list_bedroom='สตูดิโอ'; }

         }else{

            $address=$address_en;
            $project_name=$project_name_en;
            $alt_heading=$ex_list_heading_en;
            $type_name=$type_en;
            $sale_text=$sale_text_en;
            $area_text=$area_en;
                 if($ex_list_bedroom==0){ $ex_list_bedroom='Studio'; }
         }  
           

               if($n2<=12 ){   

  
             
 ?>


                    <li><link rel="prerender" href="<?php echo $part;?>property/<?php echo $lang;?>/<?php echo $ex_list_listing_code;?>">
                       <a href="<?php echo $part;?>property/<?php echo $lang;?>/<?php echo $ex_list_listing_code;?>">
                        <div class="condo-card-detail">
                             
                            <div class="cover" > 
                               <img src="<?php echo $img_name_list;?>" class="coverimg" alt="<?php echo $alt_heading;?>" title="<?php echo $alt_heading;?>" >
                            </div>
                          <div class="detail">
                            <h4>฿<?php echo $ex_list_pric;?> <span><?php echo $type_name;?></span> </h4>
              
                            <h5><?php echo $project_name;?> <span><?php echo $sale_text;?></span></h5>
              
                            <h6><?php echo $address;?></h6>
                          </div>
                          <div class="option">
                              <table>
                                <tr> 
                                   <td>
                                        <img src="<?php echo $part;?>images/22.webp" alt="<?php echo $bedroom_title;?>" title="<?php echo $bedroom_title;?>">
                                        <h6><?php if($ex_list_bedroom_check==0){ ?><span><?php  echo $ex_list_bedroom; ?> </span> 
                                          <?php }else{ echo $bedroom_title;?> <span><?php echo $ex_list_bedroom;?> </span> <?php } ?></h6>
                                   </td>
                                          
                                   <td>
                                        <img src="<?php echo $part;?>images/11.webp" alt="<?php echo $bathroom_title;?>" title="<?php echo $bathroom_title;?>">
                                        <h6><?php echo $bathroom_title;?> <span><?php echo $ex_list_bathroom;?> </span></h6>
                                   </td>
                        <?php if($ex_list_listing_type==1){?>
                                   <td>
                                        <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_title;?>" title="<?php echo $floors_title;?>">
                                        <h6><?php echo $floors_title;?> <span><?php echo $ex_list_floor;?></span></h6>
                                   </td>
                              <?php }else{ ?>
                                   <td>
                                        <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_total_title;?>" title="<?php echo $floors_total_title;?>">
                                        <h6><?php echo $floors_total_title;?> <span><?php echo $ex_list_floor;?></span></h6>
                                   </td>
                              <?php } ?>   

                                   <td>
                                        <img src="<?php echo $part;?>images/88.webp" alt="<?php echo $sqm_title;?>" title="<?php echo $sqm_title;?>">
                                        <h6><?php echo $area_land_title;?> <span><?php echo $list_sqm;?></span> <?php echo $sqm_title;?></h6>
                                   </td>
                                </tr>
                              </table>

                              <center>
                                  <a href="#" class="btn btn-unit" onclick="document.getElementById('id02').style.display='block'"><?php echo $unit_interested_title;?></a>
                                  <a href="<?php echo $part;?>property/<?php echo $lang;?>/<?php echo $ex_list_listing_code;?>" class="btn btn-des"><?php echo $details_title;?></a>
                              </center>
                          </div>
                              
                        </div>
                      </a> 
                    </li>
           
   <?php           }
           
        } ?>

            </ul> 
          </div>
        </div>
      </div> 

    </section>

  <?php   
  }  ?>

 

<?php



    $sql="SELECT  * FROM   type_project AS pj  
           WHERE pj.project_id!='$project_id_check' and pj.zone_id='$zone_id' and pj.project_name!='' and pj.project_type='$ex_list_listing_type' and pj.project_listing_count_public!='0' 
           order by pj.project_listing_count DESC  LIMIT 6  ";

     $result = $conn->query($sql); 
     $rowcount2=mysqli_num_rows($result);

     if($rowcount2>=1){

?>

		<section class="bg-last-box">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-xl-10">
						<div class="row main-description"> 
							<div class="col-12"> 
								
								<h2><?php echo $near_project_title;?> </h2> 



<!-- --------------------PC-----------------  -->
 <?php if($device=="pc"){ ?> 


								<div class="row mb-x">
									<div class="col-lg-3 pl-4 pr-4 ">
										<div class="add-project">
											<div class="img"></div> 
											<h3><?php echo $project_title;?></h3>
											<h3 ><?php echo $location_title;?></h3>
											<h3><?php echo $unit_title;?></h3>
											<h3 ><?php echo $floors_total_title;?></h3>
								      <h3><?php echo $train_station_title;?></h3>
                      <h3><?php echo $developer_title;?></h3>
											<h3><?php echo $completed_title;?></h3>
											
										</div>
									</div>
 
									<div class="col-lg-9 pl-4 pr-4">
                    <!--
										<div class="view-project">
											<div class="img" style="background: url(<?php echo $project_img_folder;?>);"></div>
											<h3><strong><?php echo $project_title;?></strong> <?php echo $project_name;?></h3>
											<h4><strong> </strong><?php echo  $address;?></h4> 
											<h4><strong></strong><?php if($project_unit!='' and $project_unit!='0'){ echo $project_unit; }else{ echo $na_title; } ?></h4>
											<h4><strong> </strong> <?php if($project_total_floors!=''){ echo $project_total_floors; }else{echo $na_title;  } ?></h4>
											<h4><strong></strong> <?php if($station_name!=''){ echo $train_station; }else{ echo $na_title;}?></h4>
                      <h4><strong></strong> <?php if($project_developer!=''){ echo $developer_name; }else{ echo $na_title;}?></h4>
											<h4><strong></strong><?php if($project_completed!=''){ echo $project_completed; }else{ echo $na_title; } ?> </h4>
										</div>-->


    <section class="sec-project-detail"  >

      <div class="container-fluid">

        <div class="row justify-content-center">
          <div class="col-xl-12">  
  
            <ul id="item5" class="item5"> 

<?php

        // output data of each row
         while($rs = $result->fetch_assoc()){      $n3++;      

   if($project_id!='' and $project_id!='0'){

	      $project_id=$rs['project_id']; 
	      $project_type=$rs['project_type'];
	      $project_province=$rs['project_province'];
	      $project_district=$rs['project_district']; 
	      $project_subdistrict=$rs['project_subdistrict'];  
	      $project_latitude=$rs['project_latitude'];  
	      $project_longitude=$rs['project_longitude'];  
	      $project_name=$rs['project_name'];
	      $project_name_en=$rs['project_name_en'];
	      $project_proppit_latitude=$rs['project_proppit_latitude'];
	      $project_proppit_longitude=$rs['project_proppit_longitude'];
	      $project_total_floors=$rs['project_total_floors']; 
	      $ex_list_train_station=$rs['project_train_station']; 
        $project_completed=$rs['project_completed'];
        $project_unit=$rs['project_unit'];
        $project_developer=$rs['project_developer'];
        $search_p_id=$rs['search_p_id'];
        $project_img_name=$rs['project_img_name'];
        $project_img_webp=$rs['project_img_webp'];

         if($lang=='th'){
                    $url_name=str_replace(" ","-",$project_name ,$count);   
         }else{
                    $url_name=str_replace(" ","-",$project_name_en ,$count);   
         }
                    $url_name=strtolower($url_name); 

         $link_pro="$baseUrl/search/$lang/all/$project_type/$search_p_id/all/all/all/$url_name/1";


          if($ex_list_listing_type=='1' or $ex_list_total_floors=='' or $ex_list_total_floors=='0'){
                              
                                
            $ex_list_total_floors_th=$project_total_floors." ชั้น";  
            $ex_list_total_floors_en=$project_total_floors.""; 
       
           } 
     }
 

              $str_dev="SELECT * FROM dbo_developer where developer_id='$project_developer'  "; 
              $result_dev=$conn->query($str_dev);  
              $rs_dev=$result_dev->fetch_assoc(); 

              $developer_name=$rs_dev['developer_name'];
              $developer_name_en=$rs_dev['developer_name_en'];


 

             if($project_img_name!='no' ){ 

                 $project_img_folder="../../images/project/$project_id/webp/mini_w500/".$project_img_webp; 

             }else{ // ถ้าไม่มีภาพ ให้ใช้ภาพของ Listing

                  $project_img_folder="../../images/noimages.jpg"; 

             }


               
                     if($listing_img_folder!=''){   

                           $img_name_list=$listing_img_folder."".$listing_img_name;
                           $img_name_list=str_replace(" ","%20",$img_name_list);

                     }else if($listing_img_name!=''){   

                           $img_name_list="../../images/listing/".$ex_list_listing_code."/".$listing_img_name;  
                           $img_name_list=str_replace(" ","%20",$img_name_list);
                            
                     }else{ 

                            $img_name_list="../../images/noimages.jpg" ;  $test1 = "000"; 

                     }  

              if($project_id!=''){

                    $ex_list_subdistrict=$rs['project_subdistrict'];
                    $ex_list_district=$rs['project_district'];
                    $ex_list_province=$rs['project_province']; 

              }

        /////////// type_asset ////////////////
          $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
          $result_ass= $conn->query($sql_ass);
          $rs_ass=$result_ass->fetch_assoc();

          if($rs_ass['id']!=''){ $type_th=$rs_ass['name'];   $type_en=$rs_ass['name_en'];}
        ////////// End type_asset ////////////////
 
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



               if($province_id=='1'){
                     
                     $address=" ".$project_subdistrict." ".$project_district." ".$project_province;
                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en;

               }else{

                     $address=" ".$project_subdistrict." ".$project_district." ".$project_province;
                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en; 
               }



         if($lang=='th'){
                       
            $address=$address;
            $project_name=$project_name;
            $type_name=$type_th;
            $sale_text=$sale_text;
            $area_text=$area_th;

                if($developer_name!=''){   $developer_name=$developer_name; }else{  $developer_name='ไม่ระบุ'; }


         }else{

            $address=$address_en;
            $project_name=$project_name_en;
            $type_name=$type_en;
            $sale_text=$sale_text_en;
            $area_text=$area_en;

                if($developer_name_en!=''){   $developer_name=$developer_name_en; }else{  $developer_name='N/A'; }
         }  

          
 ?>

                    <li >
                      <div class="project2-card-detail">
                        <div class="view-project2">
                          <link rel="prerender" href="<?php echo $link_pro;?>">
                          <a href="<?php echo $link_pro;?>" target="_black">
                            <div class="img" >
                               <img src="<?php echo $project_img_folder;?>" class="img-project" alt="<?php echo $project_name;?>" title="<?php echo $project_name;?>" >
                            </div></a>
                          <div class="h3s"><strong></strong> <?php echo $project_name;?></div>
                          <h4><strong> </strong><?php echo  $address;?></h4> 
                          <h4><strong></strong><?php if($project_unit!='' and $project_unit!='0'){ echo $project_unit; }else{ echo $na_title; } ?></h4>
                          <h4><strong> </strong> <?php if($project_total_floors!=''){ echo $project_total_floors; }else{echo $na_title;  } ?></h4>
                          <h4><strong></strong> <?php if($station_name!=''){ echo $train_station; }else{ echo $na_title;}?></h4>
                          <h4><strong></strong> <?php if($project_developer!=''){ echo $developer_name; }else{ echo $na_title;}?></h4>
                          <h4><strong></strong><?php if($project_completed!=''){ echo $project_completed; }else{ echo $na_title; } ?> </h4>
                        </div>
                      </div>
                    </li>
     <?php    
        } ?>   
 

            </ul> 
          </div>
        </div>
      </div> 

    </section>

 



									</div> <!-- //col-lg-9 -->

 

								</div>

<!-- --------------------END PC-----------------  -->

  <?php }else{ ?> 
<!-- --------------------Mobile-----------------  -->								
								<div class="row pc-x">  
									<div class="col-12">   
										<div id="itemx4" class="carousel slide" data-ride="carousel"> 
											<div class="carousel-inner">


<?php

        // output data of each row
         while($rs = $result->fetch_assoc()){      $n4++;  
              
 
   if($project_id!='' and $project_id!='0'){

        $project_id=$rs['project_id']; 
        $project_type=$rs['project_type']; 
        $project_province=$rs['project_province'];
        $project_district=$rs['project_district']; 
        $project_subdistrict=$rs['project_subdistrict'];  
        $project_latitude=$rs['project_latitude'];  
        $project_longitude=$rs['project_longitude'];  
        $project_name=$rs['project_name'];
        $project_name_en=$rs['project_name_en'];
        $project_proppit_latitude=$rs['project_proppit_latitude'];
        $project_proppit_longitude=$rs['project_proppit_longitude'];
        $project_total_floors=$rs['project_total_floors']; 
        $ex_list_train_station=$rs['project_train_station']; 
        $project_completed=$rs['project_completed'];
        $project_unit=$rs['project_unit'];
        $project_img_name=$rs['project_img_name'];
        $project_developer=$rs['project_developer'];

         $search_p_id=$rs['search_p_id'];
 
         if($lang=='th'){
                    $url_name=str_replace(" ","-",$project_name ,$count);   
         }else{
                    $url_name=str_replace(" ","-",$project_name_en ,$count);   
         }
                    $url_name=strtolower($url_name); 

         $link_pro="$baseUrl/search/$lang/all/$project_type/$search_p_id/all/all/all/$url_name/1";

        
          if($ex_list_listing_type=='1' or $ex_list_total_floors=='' or $ex_list_total_floors=='0'){
                              
                                
            $ex_list_total_floors_th=$project_total_floors." ชั้น";  
            $ex_list_total_floors_en=$project_total_floors.""; 
       
           } 
     }
 

              $str_dev="SELECT * FROM dbo_developer where developer_id='$project_developer'  "; 
              $result_dev=$conn->query($str_dev);  
              $rs_dev=$result_dev->fetch_assoc(); 

              $developer_name=$rs_dev['developer_name'];
              $developer_name_en=$rs_dev['developer_name_en'];


 
             if($project_img_name!=''){ 

                 $project_img_folder="../../images/project/$project_id/no_watermark/".$project_img_name; 

             }else{ // ถ้าไม่มีภาพ ให้ใช้ภาพของ Listing
 
                  $project_img_folder="../../images/noimages.jpg"; 

             }


               
                     if($listing_img_folder!=''){   

                           $img_name_list=$listing_img_folder."".$listing_img_name;
                           $img_name_list=str_replace(" ","%20",$img_name_list);

                     }else if($listing_img_name!=''){   

                           $img_name_list="../../images/listing/".$ex_list_listing_code."/".$listing_img_name;  
                           $img_name_list=str_replace(" ","%20",$img_name_list);
                            
                     }else{ 

                            $img_name_list="../../images/noimages.jpg" ;  $test1 = "000"; 

                     }  

              if($project_id!=''){

                    $ex_list_subdistrict=$rs['project_subdistrict'];
                    $ex_list_district=$rs['project_district'];
                    $ex_list_province=$rs['project_province']; 

              }

        /////////// type_asset ////////////////
          $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
          $result_ass= $conn->query($sql_ass);
          $rs_ass=$result_ass->fetch_assoc();

          if($rs_ass['id']!=''){ $type_th=$rs_ass['name'];   $type_en=$rs_ass['name_en'];}
        ////////// End type_asset ////////////////
 
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



               if($province_id=='1'){
                     
                     $address=" ".$project_subdistrict." ".$project_district." ".$project_province;
                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en;

               }else{

                     $address=" ".$project_subdistrict." ".$project_district." ".$project_province;
                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en; 
               }



         if($lang=='th'){
                       
            $address=$address;
            $project_name=$project_name;
            $type_name=$type_th;
            $sale_text=$sale_text;
            $area_text=$area_th;

                if($developer_name!=''){   $developer_name=$developer_name; }else{  $developer_name='ไม่ระบุ'; }


         }else{

            $address=$address_en;
            $project_name=$project_name_en;
            $type_name=$type_en;
            $sale_text=$sale_text_en;
            $area_text=$area_en;

                if($developer_name_en!=''){   $developer_name=$developer_name_en; }else{  $developer_name='N/A'; }
         }  

                if($n4<=12  ){   
   
 ?> 

												<div class="carousel-item <?php if($n4==1){?> active <?php } ?>">
													<div class="view-project">
                            <link rel="prerender" href="<?php echo $link_pro;?>">
														<a href="<?php echo $link_pro;?>" target="_black">
                              <div class="img" >
                                  <img src="<?php echo $project_img_folder;?>" class="img-project" alt="<?php echo $project_name;?>" title="<?php echo $project_name;?>" > 
                              </div></a>
														<h3><?php echo $project_title;?> <?php echo $project_name;?></h3>
														<h4><strong><?php echo $location_title;?></strong><br><?php echo  $address;?></h4> 
							                            <h4><strong><?php echo $unit_title;?></strong><br><?php if($project_unit!='' and $project_unit!='0'){ echo $project_unit; }else{ echo $na_title; } ?></h4>
							                            <h4><strong><?php echo $floors_total_title;?></strong><br> <?php if($project_total_floors!=''){ echo $project_total_floors; }else{echo $na_title;  } ?></h4>
							                            <h4><strong><?php echo $train_station_title;?></strong><br> <?php if($station_name!=''){ echo $train_station; }else{ echo $na_title;}?></h4>
							                            <h4><strong><?php echo $developer_title;?></strong><br> <?php if($project_developer!=''){ echo $developer_name; }else{ echo $na_title;}?></h4>
							                            <h4><strong><?php echo $completed_title;?></strong><br><?php if($project_completed!=''){ echo $project_completed; }else{ echo $na_title; } ?> </h4>
													</div>
												</div>  
    <?php        }
            } ?>

											</div> 
											<a class="carousel-control-prev" href="#itemx4" data-slide="prev">
												<span class="carousel-control-prev-icon"></span>
											</a>
											<a class="carousel-control-next" href="#itemx4" data-slide="next">
												<span class="carousel-control-next-icon"></span>
											</a>
										</div>
									</div>
								</div>
   <?php } ?>
<!-- --------------------Mobile-----------------  -->       


							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


<?php } ?>   
		
	</main>

 <?php include("./include/footer.php"); ?>

 <!-- Model View -->

	<div class="modal fade" id="viewImg" style="z-index: 100002;padding-right: 0px !important;">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header" > 

					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link photo" href="#photo" role="tab" data-toggle="tab"><?php echo $photo_title;?></a>
						</li>
						<li class="nav-item">
							<a class="nav-link streetview" href="#streetview" role="tab" data-toggle="tab"><?php echo $street_view_title;?></a>
						</li>
						<li class="nav-item">
							<a class="nav-link localtion" href="#localtion" role="tab" data-toggle="tab"><?php echo $location_map_title;?></a>
						</li>
					</ul>

					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">   
					<div class="tab-content">

            <div role="tabpanel" class="tab-pane fade" id="photo">  
              <div class="w-100 text-center">
                <button class="btn" id="btn-photo"><i class="fas fa-th"></i> View all photos</button> 
              </div>  
  
              <div class="col p-0 ">
                <div class="d-flx-combo w-100 carouselx active"> 
                  <!--<p class="des-photo">45 Tudor City Place, Unit 901 | $599,000 | 1 Bed | 2 Baths </p>-->
                  <!--<div class="btn-span"> 
                    <span class="item-span">1 </span>&nbsp;of&nbsp;<span class="count-item"> 17</span>
                  </div>-->

                  <div class="range-img">
                    <div>
                      <button id="minus">-</button>
                      <input id="range" type="range" min="1" max="2" step="0.1"  value="1">
                      <button id="plus">+</button>
                    </div>
                    <button id="compress-alt"><i class="far fa-compress-alt"></i></button>
                  </div>
                  
                  <div id="slideshow" class="fullscreen">
                    <!-- Below are the images in the gallery -->

<?php 
 
    if($ex_list_img_number!='0'){
            
             $img_no=0;

             $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no ASC ";
             $result_img = $conn->query($sql_img); 
                // output data of each row 
             $url_img_listing = [];


             while($rs_img=$result_img->fetch_assoc()){  $img_no++; $i++;
             
                  $img_folder=$rs_img['listing_img_folder']; 
                  $image_name=$rs_img['listing_img_webp']; 

                  if($img_folder!=''){ 
                        $img_folder=$img_folder.'webp/'.$image_name;  
                        $img_folders=$img_folder;
                  }else{ 
                        $img_folder='../../../../images/listing/'.$id.'/webp/'.$image_name; 
                        $img_folders="";
                                         
                  }

                      $url_img_listing[$i]=$img_folder;  
          ?>

                    <div id="img-<?php echo $img_no;?>" data-img-id="<?php echo $img_no;?>" class="img-wrapper <?php if($img_no=='1'){?>active<?php }?>"  >
                         <img src="<?php echo $img_folder;?>" class="img-wrapper-1 active" id="img-<?php echo $img_no;?>" data-img-id="<?php echo $img_no;?>"  alt="<?php echo $settings_title;?>" title="<?php echo $settings_title;?>"  >
                    </div> 


      <?php }
   
 


       ?>
            
                    <!-- Below are the thumbnails of above images -->
                    <div class="thumbs-container bottom">
                      <div id="prev-btn" class="prev">
                        <i class="fa fa-chevron-left"></i>
                      </div>
            
                      <ul class="thumbs">

               <?php $img=0;
                     foreach ($url_img_listing as $url_img_lists) {  $img++; ?>

                        <li data-thumb-id="<?php echo $img;?>" class="thumb <?php if($img=='1'){ ?> active<?php }?>"  >
                            <img src="<?php echo $url_img_lists;?>" alt="<?php echo $settings_title;?>" title="<?php echo $settings_title;?>"   class="thumb-1">
                        </li>
               <?php } ?>

                      </ul>
            
                      <div id="next-btn" class="next">
                        <i class="fa fa-chevron-right"></i>
                      </div>
                    </div>
 <?php    
   } ?>

                  </div>
                </div>
                <div class="all-viewx">
                  <div class="col">
                    <div class="row">

               <?php $img=0;
                     foreach ($url_img_listing as $url_img_lists) {  $img++;  ?>
                      <div class="col-4 p-1">  
                        <img id="<?php echo $img;?>" src="<?php echo $url_img_lists;?>" alt="<?php echo $settings_title;?>" title="<?php echo $settings_title;?>" class="img-fluid d-block m-auto">
                      </div>  
               <?php } ?>

                    </div>
                  </div>
                </div>
              </div> 
            </div>
						<div role="tabpanel" class="tab-pane fade" id="streetview"> 
						
<?php if($device=="m"){ ?>

        <style type="text/css">

            html, body {

                height: 100%;
                margin: 0;
                padding: 0;
            }

            #pano {

                height:500px;
                width: 100%;
            }    

        </style>

<?php }else if($device=="pc"){ ?>  

        <style type="text/css">

            html, body {

                height: 100%;
                margin: 0;
                padding: 0;
            }

            #pano {

                height:800px;
                width: 100%;
            }    

        </style>

<?php } ?>    

        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

                 <div id="pano"></div>
                 <div id="map"></div>

						</div>
						<div role="tabpanel" class="tab-pane fade" id="localtion" > 
  
<?php if($device=="m"){ ?>

   <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map2 {
        height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html {
        height: 100%;
        margin: 0;
        padding: 0;
    text-align: center;
      }

      #map2 {
        height: 500px;
        width:100%;
      }
    </style>

<?php }else if($device=="pc"){ ?>   

   <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map2 {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html {
        height: 100%;
        margin: 0;
        padding: 0;
    text-align: center;
      }

      #map2 {
        height: 800px;
        width:100%;
      }
    </style>

<?php } ?>            
        
        <div id="map2"></div>        

        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
 

 


              
                  <script>
                      function initMap() {
                      var mapOptions = {
                        center: {lat: <?php echo $latitude;?>, lng: <?php echo $longitude;?>},
                        zoom: 18,
                      }
                        
                      var maps = new google.maps.Map(document.getElementById("map2"),mapOptions);
                      
                      var marker = new google.maps.Marker({
                         position: new google.maps.LatLng(<?php echo $latitude;?>, <?php echo $longitude;?>),
                         map: maps,
                         title: '<?php echo $project_name;?>',
                         icon: '../../../images/pin_map.webp',
                      });
                      

                      var info = new google.maps.InfoWindow({
                        content : '<div style="font-size: 25px;color: red"><?php echo $project_name." ";?></div>'
                      });

                      google.maps.event.addListener(marker, 'click', function() {
                        info.open(maps, marker);
                        content : '<div style="font-size: 25px;color: red"><?php echo $project_name." ";?></div>'
                      });
 


                      const fenway = { lat: <?php echo $latitude;?>, lng: <?php echo $longitude;?> };  

                        const map = new google.maps.Map(document.getElementById("map"), {

                            center: fenway,

                            zoom: 14,

                        });

                        const panorama = new google.maps.StreetViewPanorama(

                            document.getElementById("pano"),

                            {

                                position: fenway,

                                pov: {

                                    heading: 34,

                                    pitch: 10,

                                },

                            }

                        );

                        map.setStreetView(panorama);


                    }
                  </script>
     

                  
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI0mXvBUiE73pO0F22BJ2N6asExHtxWSc&callback=initMap&libraries=&v=weekly" async defer></script>

 
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>


<script type="text/javascript">
  
      $(function(){
        const key = 'abcdefg';
        
        $('#content').on('click','#button_map',function(){
         $('#localtion').empty().append(key+'active map');
        });
        
        $('#content').on('click','#button_street',function(){
        $('#streetview').empty().append(key+'active street');
        });
      });


</script>
   

    <!-- 
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
     
 
            
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"  ></script>
 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js"></script>


  
  <script src="<?php echo $part;?>js/gallery.js"></script>



  <script>
    
    

    $(document).ready(function() { 
      $(".carousel-indicators li").css("display","none");  
      $(".carousel-indicators li:nth-child(n+1):nth-child(-n+7)").css("display","block");   
      $(".prevx").css("display","none");    
      $('.count-item').text($('.thumbs-container .thumbs li').length);
      $('.item-span').text(1); 
    });

    $(".thumbs-container .thumbs li").click(function (event) {  
      var itemxspan = $(this).attr("data-thumb-id");    
      $('.item-span').text(itemxspan);   
    });

    $("#next-btn").click(function (event) {
      var itemxspan = $(".thumbs-container .thumbs li.active").attr("data-thumb-id");     
      $('.item-span').text(itemxspan);   
    });
    $("#prev-btn").click(function (event) {
      var itemxspan = $(".thumbs-container .thumbs li.active").attr("data-thumb-id");     
      $('.item-span').text(itemxspan);   
    });
    


    $("#minus").click(function (event) {
      zoom("out");
    });

    $("#plus").click(function (event) {
      zoom("in");
    });

    $("#range").on('input change', function (event) {
      $('#output').text($(event.currentTarget).val()); 
      $("#slideshow .img-wrapper .img-wrapper-1").css("transform", "scale("+$(event.currentTarget).val()+")"); 
  
      if ($(event.currentTarget).val() == 1) {
        $(".range-img #compress-alt").removeClass("active"); 
        $(".carousel-control-prev").css("display", "flex"); 
        $(".carousel-control-next").css("display", "flex"); 
      } else {
        $(".range-img #compress-alt").addClass("active"); 
        $(".carousel-control-prev").css("display", "none"); 
        $(".carousel-control-next").css("display", "none"); 
      }  
    }); 
     
    function zoom(direction) {
      var slider = $("#range");
      var step = parseFloat(slider.attr('step'), 1);
      var currentSliderValue = parseFloat(slider.val(), 1);
      var newStepValue = currentSliderValue + step;

      if (direction === "out") {
        newStepValue = currentSliderValue - step;
      } else {
        newStepValue = currentSliderValue + step;
      } 
      slider.val(newStepValue).change(); 

      if (newStepValue == 1) {
        $(".range-img #compress-alt").removeClass("active"); 
      } else {
        $(".range-img #compress-alt").addClass("active"); 
      } 
    };

    $("#compress-alt").click(function (event) {
      $('#range').val(1);
      $("#slideshow .img-wrapper .img-wrapper-1").css("transform", "scale(1)"); 
      $(".range-img #compress-alt").removeClass("active"); 
    });


    $('.carousel').carousel({
      interval: 5000000
    })

    $('.box-view .box-view-type').click(function() {    
      $('#viewImg').modal('show'); 
      $('#viewImg ul li .nav-link').removeClass('active');
      $('#viewImg ul li .nav-link.'+$(this).attr("data-tab")).addClass('active');    
      $('#viewImg .tab-content .tab-pane').removeClass('in active');
      $('#viewImg .tab-content .tab-pane#'+$(this).attr("data-tab")).addClass('in active show');

      
    });

    $('.img-view').click(function() {     
      $('#viewImg').modal('show'); 
      $(".all-viewx").removeClass("active"); 
      $(".carouselx").addClass("active");

      $('#viewImg .nav .nav-item a').removeClass('active');
      $('#viewImg .nav .nav-item a.photo').addClass('active'); 
      $('#viewImg .tab-content .tab-pane').removeClass('in active');
      $('#viewImg .tab-content .tab-pane#photo').addClass('in active show');

      $("#slideshow .img-wrapper").removeClass("active");
      $("#slideshow .img-wrapper:nth-child("+1+")").addClass("active");

      $(".thumbs-container .thumbs li").removeClass("active");
      $(".thumbs-container .thumbs li:nth-child("+1+")").addClass("active");  

      
    });

    $('.img-view-sub div img').click(function() {    
      $('#viewImg').modal('show'); 
      $('#viewImg .nav .nav-item a').removeClass('active');
      $('#viewImg .nav .nav-item a.photo').addClass('active'); 
      $('#viewImg .tab-content .tab-pane').removeClass('in active');
      $('#viewImg .tab-content .tab-pane#photo').addClass('in active show');   


      $("#slideshow .img-wrapper .img-wrapper-1").removeClass("active");
      $("#slideshow .img-wrapper .img-wrapper-1:nth-child("+1+")").addClass("active");

      $(".thumbs-container .thumbs li").removeClass("active");
      $(".thumbs-container .thumbs li:nth-child("+1+")").addClass("active"); 
    });


    var ctx = document.getElementById("doughnut");
      var doughnut = new Chart(ctx, {
      type: 'doughnut',
      data: { 
        datasets: [{
        label: '# of Tomatoes',
        data: [75, 25],
        backgroundColor: [
          '#1F4D8E',
          '#FFB800', 
        ], 
        borderWidth: 0
        }]
      },
      options: {
        //cutoutPercentage: 40,
        responsive: false,

      }
    });
 
    $('.btn-sel').click(function() { 
      $(".btn-sel").removeClass("active");
      $(this).addClass("active");
    });

    $(document).scroll(function() {
      if ( $(document).scrollTop() < 900 ) { 
        $(".information").removeClass("active");
      } 
      else if ( $(document).scrollTop() >= 900 && $(document).scrollTop() <= 2000 ) {
        $(".information").addClass("active"); 
      }
      else if ( $(document).scrollTop() >= 2000 ) { 
        $(".information").removeClass("active");
      }
    });

    $('#btn-photo').click(function() { 
      $(".carouselx").removeClass("active");
      $(".all-viewx").addClass("active"); 
      $("#btn-photo").hide();  
    });

    $('.all-viewx .col-4 img').click(function() { 
      $(".all-viewx").removeClass("active"); 
      $(".carouselx").addClass("active");
      $("#btn-photo").show();  

      $("#slideshow .img-wrapper").removeClass("active");
      $("#slideshow .img-wrapper:nth-child("+$(this).attr('id')+")").addClass("active"); 
      
      $(".thumbs-container .thumbs li").removeClass("active");
      $(".thumbs-container .thumbs li:nth-child("+$(this).attr('id')+")").addClass("active");
      
      $('.item-span').text($(this).attr('id'));   
      
    });
 
   
  </script>

 



  <script>
    $('.deal-type li').click(function() {
      $('.deal-type li').removeClass("active");
      $(this).addClass("active");
    });
    // $('.social-con').click(function() { 
    //  $(this).toggleClass("active");
    // }); 
    
    $('.social-con').click(function() {
      $( this ).toggleClass( "active", 500, "easeInSine" );
      $(".social-con button i").toggleClass("fa-comment-lines fa-times"); 
    });

    $(document).ready(function() { 

      $('#item2').lightSlider({
        item:4,
        loop:false,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [
          {
            breakpoint:1900,
            settings: {
              item:4,
              slideMove:1,
              slideMargin:6,
            }
          }, 
          {
            breakpoint:1200,
            settings: {
              item:3,
              slideMove:1,
              slideMargin:6,
            }
          }, 
          {
            breakpoint:800,
            settings: {
              item:2,
              slideMove:1,
              slideMargin:6,
            }
          }, 
          {
            breakpoint:480,
            settings: {
              item:1,
              slideMove:1
            }
          }
        ]
      });  

          $('#item3').lightSlider({
        item:4,
        loop:false,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [ 
          {
            breakpoint:3500,
            settings: {
              item:4 
            }
          }, 
          {
            breakpoint:2100,
            settings: {
              item:4 
            }
          },
          {
            breakpoint:1700,
            settings: {
              item:4 
            }
          },   
          {
            breakpoint:1500,
            settings: {
              item:2
            }
          },
          {
            breakpoint:1450,
            settings: {
              item:2
            }
          },
          {
            breakpoint:800,
            settings: {
              item:2 
            }
          }, 
          {
            breakpoint:480,
            settings: {
              item:1,
              slideMove:1
            }
          } 
        ]
      });  
      $('#item4').lightSlider({
        item:4,
        loop:false,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [ 
          {
            breakpoint:3500,
            settings: {
              item:4 
            }
          }, 
          {
            breakpoint:2100,
            settings: {
              item:4 
            }
          },
          {
            breakpoint:1700,
            settings: {
              item:4
            }
          },   
          {
            breakpoint:1500,
            settings: {
              item:2
            }
          },
          {
            breakpoint:1450,
            settings: {
              item:2
            }
          },
          {
            breakpoint:800,
            settings: {
              item:2 
            }
          }, 
          {
            breakpoint:480,
            settings: {
              item:1,
              slideMove:1
            }
          } 
        ]
      });  
      $('#item5').lightSlider({
        item:3,
        loop:false,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [ 
          {
            breakpoint:3500,
            settings: {
              item:4 
            }
          }, 
          {
            breakpoint:2100,
            settings: {
              item:3 
            }
          },
          {
            breakpoint:1700,
            settings: {
              item:3 
            }
          },   
          {
            breakpoint:1500,
            settings: {
              item:2
            }
          },
          {
            breakpoint:1450,
            settings: {
              item:2
            }
          },
          {
            breakpoint:800,
            settings: {
              item:2 
            }
          }, 
          {
            breakpoint:480,
            settings: {
              item:1,
              slideMove:1
            }
          } 
        ]
      });  
      $('#item7').lightSlider({
        item:4,
        loop:false,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [
          {
            breakpoint:1900,
            settings: {
              item:4,
              slideMove:1,
              slideMargin:6,
            }
          }, 
          {
            breakpoint:1200,
            settings: {
              item:3,
              slideMove:1,
              slideMargin:6,
            }
          }, 
          {
            breakpoint:800,
            settings: {
              item:2,
              slideMove:1,
              slideMargin:6,
            }
          }, 
          {
            breakpoint:480,
            settings: {
              item:1,
              slideMove:1
            }
          }
        ]
      });  
      $('#item9').lightSlider({
        item:2,
        loop:false,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [
          {
            breakpoint:1900,
            settings: {
              item:2,
              slideMove:1,
              slideMargin:6,
            }
          }, 
          {
            breakpoint:1200,
            settings: {
              item:2,
              slideMove:1,
              slideMargin:6,
            }
          }, 
          {
            breakpoint:800,
            settings: {
              item:1,
              slideMove:1,
              slideMargin:6,
            }
          }, 
          {
            breakpoint:480,
            settings: {
              item:1,
              slideMove:1
            }
          }
        ]
      });   
    });

    $('#item_box2.carousel').carousel({
      interval: 500000,
      wrap: false 
    })
     
  </script>


</body>
</html>
 
     <?php
include("../../../../include/cache/cache-kit.php");  // เรียกใช้ไฟล์ php class
$cache_active = true;  // กำหนดให้ทำการ cache
$cache_folder = '../../../../include/cache/';  // กำหนดไฟลเดอร์ที่ไว้เก็บไฟล์ cache
?>
<?php    
function callback($buffer) {    // ฟังก์ชันสำหรับเก็บค่า html ไว้ในตัวแปร
     return $buffer;   
}    
?> 
<?php
$page_cache = acmeCache::fetch('page_cache', 100000); 
// ทำการ cache หน้าเว็บไซต์ใหม่ ไว้ในตัวแปร $page_cache ทุกๆ 10 วินาที สามารถกำหนดเป็นค่าอื่นได้
if(!$page_cache){  // ตรวจสอบว่าถ้าไม่มีข้อมูลที่ cache ไว้ ให้ทำการเก็บค่า html ไว้สำหรับบันทึก cache
  ob_start("callback");  // เริ่มต้นการบันทึก html



?>
    <?php 
  $page_cache=ob_get_contents(); // เก็บข้อมูล html ไว้ในตัวแปร $page_cache
  ob_end_flush();  // ตำแหน่งสิ้นสุด 
  acmeCache::save('page_cache',$page_cache); // ทำการบันทึก html จากตัวแปร $page_cache ไว้ใน cache ชื่อ page_cache
}else{
  echo $page_cache;  // แสดงข้อมูลที่ทำการ cache
  echo "Cache Data"; // สำหรับทดสอบว่า เป็นข้อมูลที่ได้จากการ cache หรือไม่
 
?>

<?php } ?>

