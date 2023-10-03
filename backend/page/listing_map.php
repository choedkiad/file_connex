<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 


         $listing=$_GET['listing'];
         $code=$_GET['code'];
         $check_p=$_GET['check_p'];
         $calExpireDate=date ("Y-m-d", strtotime("+15 day", strtotime($today)));


             $sql="SELECT * FROM dbo_create_deal where create_deal_code='$code' ";  
             $result=$conn->query($sql);
             $rs=$result->fetch_assoc();

             $buyer_id=$rs['buyer_contact_code'];
             $create_deal_title=$rs['create_deal_title'];
             $create_deal_attention=$rs['create_deal_attention'];
             $create_deal_type=$rs['create_deal_type'];
             $create_deal_budget_start=$rs['create_deal_budget_start'];
             $create_deal_budget_end=$rs['create_deal_budget_end'];
             $project_id=$rs['project_id'];
             $zone_id=$rs['zone_id'];
             $station_id=$rs['station_id'];
             $contact_deal_win=$rs['contact_deal_win'];
             $create_deal_bedroom=$rs['create_deal_bedroom'];
             $create_deal_bathroom=$rs['create_deal_bathroom'];
             $create_deal_sqm_start=$rs['create_deal_sqm_start'];
             $create_deal_sqm_end=$rs['create_deal_sqm_end'];
             $create_deal_select_floor=$rs['create_deal_select_floor'];
             $create_deal_floor=$rs['create_deal_floor'];
             $create_deal_rent_till=$rs['create_deal_rent_till'];
             $create_deal_open_room=$rs['create_deal_open_room'];
             $create_deal_nationality=$rs['create_deal_nationality'];
             $create_deal_duration=$rs['create_deal_duration'];
             $create_deal_pet_friendly=$rs['create_deal_pet_friendly'];
             $create_deal_pet_friendly_type=$rs['create_deal_pet_friendly_type'];
             $create_deal_search_from=$rs['create_deal_search_from'];
             $deal_status_assign_date=$rs['deal_status_assign_date'];
             $deal_status_contract_date=$rs['deal_status_contract_date'];
             $create_deal_remark=$rs['create_deal_remark'];
             $create_deal_sale=$rs['create_deal_sale'];
             $create_deal_create=$rs['create_deal_create'];
             $stock_offer=$rs['stock_offer'];
             $sale_offer=$rs['sale_offer'];

             $source_code_c=$rs['source_code'];
             $contact_code_c=$rs['contact_code'];

		     $sql_project="SELECT * FROM type_project where project_id='$project_id' ";  
		     $result_project=$conn->query($sql_project);
		     $rs_project=$result_project->fetch_assoc();

		     $project_train_station=$rs_project['project_train_station'];
		     $zone_id_s=$rs_project['zone_id'];

 


 
 if($listing=='1'){


		    if($create_deal_budget_end=='0'){

		             $create_deal_budget_end=99999999999;

		    }

		    if($create_deal_sqm_end=='0'){

		             $create_deal_sqm_end=99999999999;     

		    }

		    if($create_deal_sqm_start=='0'){

		             $create_deal_sqm_start=0;     

		    }else{
		            
		    } 

		   // เลือกชั้น ต่ำกว่า สูงกว่า

		    if($create_deal_select_floor=='1'){
		          
		          $select_floor=" data.ex_list_floor<=$create_deal_floor and  ";

		    }else if($create_deal_select_floor=='2'){

		          $select_floor=" data.ex_list_floor>=$create_deal_floor and  ";

		    }else{
		          $select_floor=" ";
		    }
		    // END เลือกชั้น ต่ำกว่า สูงกว่า
		  
		    if($create_deal_search_from==1){

		          $project_check=" data.project_id='$project_id' and  ";

		    }else if($create_deal_search_from==2){  

		         if($project_id!=''){

		               $project_check=" pj.project_train_station='$station_id' and   ";

		         }else{

		               $project_check=" data.ex_list_train_station='$station_id' and   ";
		         }

		    }else if($create_deal_search_from==3){

		         $project_check=" data.zone_id='$zone_id' and   ";

		    }else{

		         if($project_id!=''){

		               $project_check=" data.project_id='$project_id' and    ";

		         }else{

		               $project_check=" pj.project_train_station='$station_id' and    ";
		         }



		    }
 
 /*
   echo "project_id : ".$project_id."<br>";
   echo "create_deal_sqm_start : ".$create_deal_sqm_start."<br>";
    echo "create_deal_sqm_end : ".$create_deal_sqm_end."<br>";
    echo "create_deal_budget_start : ".$create_deal_budget_start."<br>";
    echo "create_deal_budget_end : ".$create_deal_budget_end."<br>";
    echo "create_deal_bedroom : ".$create_deal_bedroom."<br>";
    echo "create_deal_bathroom : ".$create_deal_bathroom."<br>";
    echo "create_deal_attention : ".$create_deal_attention."<br>";
    echo "ex_list_listing_type : ".$ex_list_listing_type."<br>";
    echo "create_deal_type : ".$create_deal_type."<br>";   */


    $set_s_text=" data.ex_list_date_update DESC , data.ex_list_premium DESC ,data.ex_list_img_score DESC ";

     $sql="SELECT Distinct data.project_id ,  pj.project_name , pj.project_name_en , pj.project_train_station , pj.zone_id , pj.project_total_floors , pj.project_map , pj.project_listing_count , pj.project_latitude , pj.project_longitude , pj.project_proppit_latitude , pj.project_proppit_longitude                       

                   FROM dbo_data_excel_listing AS data 
                    LEFT JOIN type_project AS pj  On data.project_id=pj.project_id  
                    LEFT JOIN type_train_station AS ts On pj.project_train_station=ts.station_id 
                    LEFT JOIN type_zone AS zone ON pj.zone_id=zone.zone_id  
                    LEFT JOIN type_zone_group AS zone_group ON zone_group.zone_g_id=zone.zone_g_id  
                    
                    where  
                        
                          data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end and  
                          data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end  and data.ex_list_close='0'   and 
                          $project_check   data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bedroom LIKE '%$create_deal_bathroom%'  and 
                          data.ex_list_deal_type LIKE '%$create_deal_attention%' and  data.ex_list_listing_status='14'  and
                          $select_floor data.ex_list_listing_type LIKE '%$create_deal_type%'
                        
                    order by $set_s_text   LIMIT 50 ";  
     $result = $conn->query($sql);

 
     if($result->num_rows > 0) { //num_rows
        // output data of each row
         while($rs_listing_1=$result->fetch_assoc()) { $num++;

               $project_id=$rs_listing_1['project_id'];
               $project_name=$rs_listing_1['project_name'];
               $project_name_en=$rs_listing_1['project_name_en'];
               $project_train_station=$rs_listing_1['project_train_station'];
               $zone_id=$rs_listing_1['zone_id'];
               $project_total_floors=$rs_listing_1['project_total_floors'];
               $project_map=$rs_listing_1['project_map'];
               $project_listing_count=$rs_listing_1['project_listing_count'];


			   $project_latitude=$rs_listing_1['project_latitude'];
			   $project_longitude=$rs_listing_1['project_longitude'];
			   $project_proppit_latitude=$rs_listing_1['project_proppit_latitude'];
			   $project_proppit_longitude=$rs_listing_1['project_proppit_longitude'];


       /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name_1=$rs_train['station_train'];
             $station_name_en_1=$rs_train['station_name_en'];
  
             if($station_name_1!=''){ $project_train_station_1=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
      /////////// End type_train_station ////////////////
  

        /////////// zone id ////////////////
             $sql_zone1="SELECT * FROM type_zone where zone_id='$zone_id' ";  
             $result_zone1= $conn->query($sql_zone1);
             $rs_zone1=$result_zone1->fetch_assoc(); 

             $zone_name=$rs_zone1['zone_name'];
             $zone_name_en=$rs_zone1['zone_name_en'];			     
      			 $zone_latitude=$rs_zone1['zone_latitude'];
      			 $zone_longitude=$rs_zone1['zone_longitude'];
             
             if($zone_name!=''){ $project_zone1=$rs_zone1['zone_name'];}

             if($zone_id=='0') { $project_zone1="0";}

        /////////// END zone id ////////////////


         $sql_img="SELECT * FROM type_project_img where project_id='$project_id' order by project_img_no ASC LIMIT 1"; 
         $result_img=$conn->query($sql_img); 
         $rs_img=$result_img->fetch_assoc();

             $project_img_folder=$rs_img['project_img_folder'];
             $project_img_name=$rs_img['project_img_name'];
             $project_img_id=$rs_img['project_img_id']; 

             if($project_img_name!=''){ 

                 $project_img_folder="../../images/project/$project_id/no_watermark/".$project_img_name; 

             }else{ // ถ้าไม่มีภาพ ให้ใช้ภาพของ Listing

                 $project_img_folder="../../images/noimages.jpg"; 
             }

			                          $project_name_text=" ".$project_name."";  
			                          $project_name_text="<a href='../page/listing_deal_buyer.php?code=$code&project=$project_id&check_p=1&d_check=1&listing=1'  ><img src='$project_img_folder' alt='--' style='width: 100%; height: 130px;'> <br></a> <br>  <b>โครงการ : </b> $project_name <br><b>Project : </b> $project_name_en <br> <b>จำนวนชั้น : </b>  $project_total_floors <br> <b>สถานีรถไฟฟ้า : </b>  $project_train_station_1 <br> <b>โซน : </b>  $project_zone1 <br> <br><a href='../page/listing_deal_buyer.php?code=$code&project=$project_id&check_p=1&d_check=1&listing=1'  >คลิกเข้าชม Listing ในโครงการนี้</a>";


			           $latitude_s=$zone_latitude;
			           $longitude_s=$zone_longitude;

			           if($project_proppit_latitude!=''){
			           	      $project_latitude=$project_proppit_latitude;
			           }

			           if($project_proppit_longitude!=''){
			           	      $project_longitude=$project_proppit_longitude;
			           }

	  
			          if($num==1){
			                 $zone_project='["'.$project_name_text.'",'.$project_latitude.','.$project_longitude.']';

			                 $latitude_s=$project_latitude;
			                 $longitude_s=$project_longitude;

			          }else{

			                 
			                 $zone_project=$zone_project.',["'.$project_name_text.'",'.$project_latitude.','.$project_longitude.']';
			          }

 

			      }
			    }




 }else  if($listing=='2'){

      


			    if($create_deal_budget_end=='0'){

			             $create_deal_budget_end_s=99999999999;

			    }else{
			             $budget_s=$create_deal_budget_end*30/100;
			             $create_deal_budget_end_s=$create_deal_budget_end+$budget_s;
			    }
			  
			    if($create_deal_sqm_end=='0'){

			             $create_deal_sqm_end_s=99999999999;     

			    }else{
			             $create_deal_sqm_end_s=$create_deal_sqm_end;     
			    }

			    if($create_deal_sqm_start=='0'){
			             $create_deal_sqm_start=0;   
			    }else{
			            
			    }

			 


			    $create_deal_bedroom='';
			 
			    $create_deal_bathroom='';
			    $select_floor=""; 

			  
			    if($create_deal_search_from==1 or $create_deal_search_from==0){

			       if($project_train_station!='0' or $project_train_station!=''){

			           $project_check_2=" pj.project_train_station='$project_train_station' and   ";

			       
			       }else{

			           $project_check_2=" data.ex_list_train_station='$project_train_station' and  ";
			       }

			    }else if($create_deal_search_from==2){ 

			         if($project_id!=''){

			               $project_check_2=" pj.project_train_station='$station_id' and   ";

			         }else{

			               $project_check_2=" data.ex_list_train_station='$station_id' and   ";
			         }

			    }else if($create_deal_search_from==3){

			         if($project_id!=''){

			               $project_check_2=" pj.zone_id='$zone_id' and   ";

			         }else{

			               $project_check_2=" data.zone_id='$zone_id' and     ";
			         }

			    }



			 

			 
			/*
			    echo "create_deal_sqm_start : ".$create_deal_sqm_start."<br>";
			    echo "create_deal_sqm_end : ".$create_deal_sqm_end."<br>";
			    echo "create_deal_budget_start : ".$create_deal_budget_start."<br>";
			    echo "create_deal_budget_end : ".$create_deal_budget_end."<br>";
			    echo "create_deal_bedroom : ".$create_deal_bedroom."<br>";
			    echo "create_deal_bathroom : ".$create_deal_bathroom."<br>";
			    echo "create_deal_attention : ".$create_deal_attention."<br>";
			    echo "ex_list_listing_type : ".$ex_list_listing_type."<br>";
			    echo "create_deal_type : ".$create_deal_type."<br>";
			*/ 
	 /*
			   echo "create_deal_search_from : ".$create_deal_search_from."<br>";
			   echo "create_deal_sqm_start : ".$create_deal_sqm_start."<br>";
			   echo "create_deal_sqm_end_s : ".$create_deal_sqm_end_s."<br>";
			   echo "create_deal_budget_start : ".$create_deal_budget_start."<br>";
			   echo "create_deal_budget_end_s : ".$create_deal_budget_end_s."<br>";
			   echo "create_deal_bedroom : ".$create_deal_bedroom."<br>";
			   echo "create_deal_bathroom : ".$create_deal_bathroom."<br>";
			   echo "project_check_2 : ".$project_check_2."<br>";
			   echo "select_floor : ".$select_floor."<br>";
			   echo "create_deal_type : ".$create_deal_type."<br>";
			    echo "code : ".$code."<br>";   
			    echo "project_id : ".$project_id."<br>";   */

			    $set_s_text=" data.ex_list_date_update DESC , data.ex_list_premium DESC ,data.ex_list_img_score DESC ";

			     $sql_data2="SELECT Distinct data.project_id ,  pj.project_name , pj.project_name_en , pj.project_train_station , pj.zone_id , pj.project_total_floors , pj.project_map  , pj.project_listing_count , pj.project_latitude , pj.project_longitude , pj.project_proppit_latitude , pj.project_proppit_longitude    
			               

			                   FROM dbo_data_excel_listing AS data 
			                    LEFT JOIN type_project AS pj  On data.project_id=pj.project_id  
			                    LEFT JOIN type_train_station AS ts On pj.project_train_station=ts.station_id 
			                    LEFT JOIN type_zone AS zone ON pj.zone_id=zone.zone_id  
			                    LEFT JOIN type_zone_group AS zone_group ON zone_group.zone_g_id=zone.zone_g_id  
			                    
			                    where 

			                         (
			                          data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
			                          data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
			                          data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
			                          data.ex_list_deal_type LIKE '%$create_deal_attention%' and  data.ex_list_listing_status='' and
			                          $project_check_2   pj.project_type LIKE '%$create_deal_type%'  

			                          or

			                          data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
			                          data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
			                          data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
			                          data.ex_list_deal_type LIKE '%$create_deal_attention%' and  data.ex_list_listing_status='1' and
			                          $project_check_2   data.ex_list_listing_type LIKE '%$create_deal_type%'  

			                          or

			                          data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
			                          data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
			                          data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
			                          data.ex_list_deal_type LIKE '%$create_deal_attention%' and data.ex_list_listing_status='3' and data.ex_list_rent_till_date<='$calExpireDate' and
			                          $project_check_2    data.ex_list_listing_type LIKE '%$create_deal_type%'  

			                          or

			                          data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
			                          data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
			                          data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
			                          data.ex_list_deal_type LIKE '%$create_deal_attention%' and data.ex_list_listing_status='7' and
			                          $project_check_2    data.ex_list_listing_type LIKE '%$create_deal_type%'  

                                or

                                data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
                                data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
                                data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
                                data.ex_list_deal_type LIKE '%$create_deal_attention%' and data.ex_list_listing_status='8' and
                                $project_check_2    data.ex_list_listing_type LIKE '%$create_deal_type%'  

                                or

                                data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
                                data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
                                data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
                                data.ex_list_deal_type LIKE '%$create_deal_attention%' and data.ex_list_listing_status='9' and
                                $project_check_2    data.ex_list_listing_type LIKE '%$create_deal_type%'  

                                or

                                data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
                                data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
                                data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
                                data.ex_list_deal_type LIKE '%$create_deal_attention%' and data.ex_list_listing_status='10' and
                                $project_check_2    data.ex_list_listing_type LIKE '%$create_deal_type%'  

                                or

                                data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
                                data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
                                data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
                                data.ex_list_deal_type LIKE '%$create_deal_attention%' and data.ex_list_listing_status='11' and
                                $project_check_2    data.ex_list_listing_type LIKE '%$create_deal_type%'  

                                or

                                data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
                                data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
                                data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
                                data.ex_list_deal_type LIKE '%$create_deal_attention%' and data.ex_list_listing_status='12' and
                                $project_check_2    data.ex_list_listing_type LIKE '%$create_deal_type%'  

                                or

                                data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
                                data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
                                data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
                                data.ex_list_deal_type LIKE '%$create_deal_attention%' and data.ex_list_listing_status='13' and
                                $project_check_2    data.ex_list_listing_type LIKE '%$create_deal_type%'  

                                or

                                data.ex_list_sqm>=$create_deal_sqm_start and  data.ex_list_sqm<=$create_deal_sqm_end_s and  
                                data.ex_list_price>=$create_deal_budget_start and  data.ex_list_price<=$create_deal_budget_end_s  and data.ex_list_close='0'   and 
                                data.ex_list_bedroom LIKE '%$create_deal_bedroom%' and data.ex_list_bathroom LIKE '%$create_deal_bathroom%'  and 
                                data.ex_list_deal_type LIKE '%$create_deal_attention%' and data.ex_list_listing_status='14' and
                                $project_check_2    data.ex_list_listing_type LIKE '%$create_deal_type%'  

			                         ) 
			                    order by $set_s_text   LIMIT 50 ";  
			     $result_data2 = $conn->query($sql_data2);




			 
			     if($result_data2->num_rows > 0) { //num_rows
			        // output data of each row
			         while($rs_listing=$result_data2->fetch_assoc()) { $num++;

			               $project_id=$rs_listing['project_id'];
			               $project_name=$rs_listing['project_name'];
                     $project_name_en=$rs_listing['project_name_en'];
			               $project_train_station=$rs_listing['project_train_station'];
			               $zone_id=$rs_listing['zone_id'];
			               $project_total_floors=$rs_listing['project_total_floors'];
			               $project_map=$rs_listing['project_map'];
			               $project_listing_count=$rs_listing['project_listing_count'];

			               $project_latitude=$rs_listing['project_latitude'];
			               $project_longitude=$rs_listing['project_longitude'];
			               $project_proppit_latitude=$rs_listing['project_proppit_latitude'];
			               $project_proppit_longitude=$rs_listing['project_proppit_longitude'];


			      /////////// type_train_station ////////////////
			             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
			             $result_train= $conn->query($sql_train);
			             $rs_train=$result_train->fetch_assoc(); 

			             $station_name=$rs_train['station_train'];
			             $station_name_en=$rs_train['station_name_en'];
			  
			             if($station_name!=''){ $project_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
			      /////////// End type_train_station ////////////////
			  

			        /////////// zone id ////////////////
			             $sql_zone="SELECT * FROM type_zone where zone_id='$zone_id' ";  
			             $result_zone= $conn->query($sql_zone);
			             $rs_zone=$result_zone->fetch_assoc(); 

			             $zone_name=$rs_zone['zone_name'];
			             $zone_name_en=$rs_zone['zone_name_en'];
			             $zone_latitude=$rs_zone['zone_latitude'];
			             $zone_longitude=$rs_zone['zone_longitude'];
			             
			             if($zone_name!=''){ $project_zone2=$rs_zone['zone_name'];}

			             if($zone_id=='0') { $project_zone2="0";}

				         $sql_img="SELECT * FROM type_project_img where project_id='$project_id' order by project_img_no ASC LIMIT 1"; 
				         $result_img=$conn->query($sql_img); 
				         $rs_img=$result_img->fetch_assoc();

				             $project_img_folder=$rs_img['project_img_folder'];
				             $project_img_name=$rs_img['project_img_name'];
				             $project_img_id=$rs_img['project_img_id']; 

				             if($project_img_name!=''){ 

				                 $project_img_folder="../../images/project/$project_id/no_watermark/".$project_img_name; 

				             }else{ // ถ้าไม่มีภาพ ให้ใช้ภาพของ Listing

				                 $project_img_folder="../../images/noimages.jpg"; 
				             }

                              


			                          $project_name_text=" ".$project_name."";  
			                          $project_name_text="<a href='../page/listing_deal_buyer.php?code=$code&project=$project_id&check_p=2&d_check=1&listing=2'  ><img src='$project_img_folder' alt='--' style='width: 100%; height: 130px;'> <br> </a> <br>  <b>โครงการ : </b> $project_name <br><b>Project : </b> $project_name_en <br> <b>จำนวนชั้น : </b>  $project_total_floors <br> <b>สถานีรถไฟฟ้า : </b>  $project_train_station <br> <b>โซน : </b>  $project_zone2 <br><a href='../page/listing_deal_buyer.php?code=$code&project=$project_id&check_p=2&d_check=1&listing=2'  >คลิกเข้าชม Listing ในโครงการนี้</a> ";


			           $latitude_s=$project_proppit_latitude;
			           $longitude_s=$project_proppit_longitude;

			           if($project_proppit_latitude!=''){
			           	      $project_latitude=$project_proppit_latitude;
			           }

			           if($project_proppit_longitude!=''){
			           	      $project_longitude=$project_proppit_longitude;
			           }

	  
			          if($num==1){
			                 $zone_project='["'.$project_name_text.'",'.$project_latitude.','.$project_longitude.']';

			                 $latitude_s=$project_latitude;
			                 $longitude_s=$project_longitude;

			          }else{

			                 
			                 $zone_project=$zone_project.',["'.$project_name_text.'",'.$project_latitude.','.$project_longitude.']';
			          }

 

			      }
			    }


    } // END listing 2
			                 ?> 
    




 <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html {
        height: 100%;
        margin: 0;
        padding: 0;
    text-align: center;
      }

      #map {
        height: 100%;
        width:100%;
      }
    </style>

<div id="map"></div>


    <script>

    var locations = [
     <?php echo $zone_project;?>
    ];

      function initMap() {
      var mapOptions = {
        center: {lat: <?php echo $latitude_s;?>, lng: <?php echo $longitude_s;?> },
        zoom: 15,
      }
        
      var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
      
      var marker, i, info;

      for (i = 0; i < locations.length; i++) {  

        marker = new google.maps.Marker({
           position: new google.maps.LatLng(locations[i][1], locations[i][2]),
           map: maps,
           title: locations[i][0]
        });

        info = new google.maps.InfoWindow();

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          info.setContent(locations[i][0]);
          info.open(maps, marker);
        }
        })(marker, i));

      }

    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCFd7z_EUVLuusR62GaRWlZcAvEn0zR44&callback=initMap" async defer></script>