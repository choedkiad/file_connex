<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 

         $today=date("Y-m-d H:i:s");
         $listing=$_GET['listing'];
         $code=$_GET['code'];
         $check_p=$_GET['check_p'];
         $calExpireDate=date ("Y-m-d", strtotime("+15 day", strtotime($today)));
         $project_id_deal_check=$_GET['project_id_deal_check'];

             $sql="SELECT * FROM dbo_create_deal where create_deal_code='$code' LIMIT 1 ";  
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


             $create_deal_attention_2=$rs['create_deal_attention_2'];
             $create_deal_type_2=$rs['create_deal_type_2'];
             $create_deal_budget_start_2=$rs['create_deal_budget_start_2'];
             $create_deal_budget_end_2=$rs['create_deal_budget_end_2'];
             $project_id_2=$rs['project_id_2'];
             $zone_id_2=$rs['zone_id_2'];
             $station_id_2=$rs['station_id_2'];
             $create_deal_bedroom_2=$rs['create_deal_bedroom_2'];
             $create_deal_bathroom_2=$rs['create_deal_bathroom_2']; 
             $create_deal_sqm_start_2=$rs['create_deal_sqm_start_2'];
             $create_deal_sqm_end_2=$rs['create_deal_sqm_end_2'];
             $create_deal_select_floor_2=$rs['create_deal_select_floor_2'];
             $create_deal_floor_2=$rs['create_deal_floor_2'];
             $create_deal_rent_till_2=$rs['create_deal_rent_till_2'];
             $create_deal_open_room_2=$rs['create_deal_open_room_2'];
             $create_deal_nationality_2=$rs['create_deal_nationality_2'];
             $create_deal_duration_2=$rs['create_deal_duration_2'];
             $create_deal_pet_friendly_2=$rs['create_deal_pet_friendly_2'];
             $create_deal_pet_friendly_type_2=$rs['create_deal_pet_friendly_type_2'];
             $create_deal_search_from_2=$rs['create_deal_search_from_2'];
             $create_deal_sale_2=$rs['create_deal_sale_2'];
  
             if($create_deal_attention_2!='0'){
                   
                   $create_deal_attention=$create_deal_attention_2;
                   $create_deal_type=$create_deal_type_2;
                   $create_deal_budget_start=$create_deal_budget_start_2;
                   $create_deal_budget_end=$create_deal_budget_end_2;
                   $project_id=$project_id_2;
                   $zone_id=$zone_id_2;
                   $station_id=$station_id_2;
                   $create_deal_bedroom=$create_deal_bedroom_2;
                   $create_deal_bathroom=$create_deal_bathroom_2; 
                   $create_deal_sqm_start=$create_deal_sqm_start_2;
                   $create_deal_sqm_end=$create_deal_sqm_end_2;
                   $create_deal_select_floor=$create_deal_select_floor_2;
                   $create_deal_floor=$create_deal_floor_2;
                   $create_deal_rent_till=$create_deal_rent_till_2;
                   $create_deal_open_room=$create_deal_open_room_2;
                   $create_deal_nationality=$create_deal_nationality_2;
                   $create_deal_duration=$create_deal_duration_2;
                   $create_deal_pet_friendly=$create_deal_pet_friendly_2;
                   $create_deal_pet_friendly_type=$create_deal_pet_friendly_type_2;

             }


         if($project_id_deal_check!=''){  
                 $project_id=$project_id_deal_check;
         } 


             $source_code_c=$rs['source_code'];
             $contact_code_c=$rs['contact_code'];

		     $sql_project="SELECT * FROM type_project where project_id='$project_id' LIMIT 1 ";  
		     $result_project=$conn->query($sql_project);
		     $rs_project=$result_project->fetch_assoc();
         
                 $project_id_check=$rs_project['project_id'];
                 $project_name_en_check=$rs_project['project_name_en'];
        		     $project_train_station=$rs_project['project_train_station'];
        		     $zone_id_s=$rs_project['zone_id'];

                 $project_proppit_latitude=$rs_project['project_proppit_latitude'];
                 $project_proppit_longitude=$rs_project['project_proppit_longitude'];

                 $latitude_make=$project_proppit_latitude;
                 $longitude_make=$project_proppit_longitude;
 
 
    if($create_deal_attention=='3'){  $create_deal_attention='2';  }
 
 if($listing=='1'){


	    
    if($create_deal_budget_end=='0' ){
             $create_deal_budget_end=999999999999;
    }

    if($create_deal_sqm_end=='0'  ){
             $create_deal_sqm_end=999999999999;     
    }

    if($create_deal_sqm_start=='0'){
             $create_deal_sqm_start=0;     
    }else{            
    } 

   // เลือกชั้น ต่ำกว่า สูงกว่า

    if($create_deal_select_floor=='1'){
          
          $select_floor=" and data.ex_list_floor<=$create_deal_floor   ";

    }else if($create_deal_select_floor=='2'){

          $select_floor=" and data.ex_list_floor>=$create_deal_floor   ";

    }else{
          $select_floor=" ";
    }
    // END เลือกชั้น ต่ำกว่า สูงกว่า


     /////////////// พื้นที่ต่ำสุด ////////////////

     if($create_deal_sqm_start!=''){
           $s_sqm_low=" and data.ex_list_sqm>=$create_deal_sqm_start  ";
     }else{   $s_sqm_low="";  }


     /////////////// พื้นที่สูงสุด ////////////////

     if($create_deal_sqm_end!=''){
           $s_sqm_maximum="  and  data.ex_list_sqm<=$create_deal_sqm_end ";
     }else{   $s_sqm_maximum="";  }

     /////////////// ราคาต่ำสุด ////////////////

     if($create_deal_budget_start!=''){
           $s_price_low="  and  data.ex_list_price>=$create_deal_budget_start ";
     }else{   $s_price_low="";  }


     /////////////// ราคาสูงสุด //////////////// 

     if($create_deal_budget_end!=''){
           $s_price_maximum=" and data.ex_list_price<=$create_deal_budget_end  ";
     }else{   $s_price_maximum="";  }


     /////////////// จำนวนห้องนอน ////////////////

     if($create_deal_bedroom!=''){ 
            $s_bedroom=" and data.ex_list_bedroom='$create_deal_bedroom' ";  
     }else{    $s_bedroom="";  }


   /////////////// จำนวนห้องน้ำ  ////////////////

     if($create_deal_bathroom!=''){ 
            $s_bathroom=" and data.ex_list_bathroom='$create_deal_bathroom' ";  
     }else{    $s_bathroom="";  }


     /////////////// ประเภท ดีล ขายเช่า ////////////////

     if($create_deal_attention!=''){ 
            $s_deal="  and data.ex_list_deal_type='$create_deal_attention'  ";  
     }else{    $s_deal="";  } 


     /////////////// ประเภท คอนโด ทาวน์เฮ็าส์ ////////////////

     if($create_deal_type!=''){
            $s_type=" and data.ex_list_listing_type='$create_deal_type' "; 
     }else{    $s_type="";  }

  
    if($create_deal_search_from==1){

          $project_check=" and data.project_id='$project_id'   ";
 

    }else if($create_deal_search_from==2){   

               $project_check=" and data.ex_list_train_station='$station_id'    "; 

    }else if($create_deal_search_from==3){   

               $project_check=" and data.zone_id='$zone_id'      ";
          
    }else{

         if($project_id!=''){

               $project_check=" and data.project_id='$project_id'     ";

         }else{

               $project_check=" and data.ex_list_train_station='$station_id'    ";
         } 
    }



               $search_all_s2="           
                          (
                          data.ex_list_listing_status='' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal  $select_floor $s_type  
                          )  
                          or
                          (
                          data.ex_list_listing_status='1'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal  $select_floor $s_type  
                          )                 
                          or
                          (
                          data.ex_list_listing_status='3'  and data.ex_list_rent_till_date<='$calExpireDate'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )            
                          or
                          (
                          data.ex_list_listing_status='7'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='8'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='9' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='10'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='11'                           
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='12'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='13' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='14' 
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='15' and data.ex_list_rent_till_date<='$calExpireDate'
                          $s_sqm_low  $s_sqm_maximum  $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check  $s_bedroom   $s_bathroom  $s_deal   $select_floor $s_type  
                          )
                             ";



 }else if($listing=='2'){



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

 


     /////////////// ราคาต่ำสุด ////////////////

     if($create_deal_budget_start!=''){
           $s_price_low="  and  data.ex_list_price>=$create_deal_budget_start ";
     }else{   $s_price_low="";  }


     /////////////// ราคาสูงสุด //////////////// 

     if($create_deal_budget_end!=''){
           $s_price_maximum=" and data.ex_list_price<=$create_deal_budget_end_s  ";
     }else{   $s_price_maximum="";  }


     /////////////// จำนวนห้องนอน ////////////////

     if($create_deal_bedroom!=''){ 
            $s_bedroom=" and data.ex_list_bedroom='$create_deal_bedroom' ";  
     }else{    $s_bedroom="";  }


   /////////////// จำนวนห้องน้ำ  ////////////////

     if($create_deal_bathroom!=''){ 
            $s_bathroom=" and data.ex_list_bathroom='$create_deal_bathroom' ";  
     }else{    $s_bathroom="";  }


     /////////////// ประเภท ดีล ขายเช่า ////////////////

     if($create_deal_attention!=''){ 
            $s_deal="  and data.ex_list_deal_type='$create_deal_attention'  ";  
     }else{    $s_deal="";  } 


     /////////////// ประเภท คอนโด ทาวน์เฮ็าส์ ////////////////

     if($create_deal_type!=''){
            $s_type=" and data.ex_list_listing_type='$create_deal_type' "; 
     }else{    $s_type="";  }



    $create_deal_bedroom='';
 
    $create_deal_bathroom='';
    $select_floor=""; 




   // ชเลือกชั้น ต่ำกว่า สูงกว่า
 /*
    if($create_deal_select_floor=='1'){
          
          $select_floor=" data.ex_list_floor<=$create_deal_floor and  ";

    }else if($create_deal_select_floor=='2'){

          $select_floor=" data.ex_list_floor>=$create_deal_floor and  ";

    }else{
          $select_floor="  ";  
    } */

 
    if($create_deal_search_from==1 or $create_deal_search_from==0){

       if($project_train_station!='0' and $project_train_station!=''){

           $project_check_2=" and data.ex_list_train_station='$project_train_station'   ";

       }else{    

            if($project_id!='' and $project_id!='0' ){
               
                  $project_check_2=" and data.zone_id='$zone_id_s'   ";                  

            
            }else{

                  
                  $project_check_2="and data.ex_list_train_station='-'  ";

            }
       }

    }else if($create_deal_search_from==2){  

               $project_check_2=" and data.ex_list_train_station='$station_id'   ";
     

    }else if($create_deal_search_from==3){ 

               $project_check_2=" and data.zone_id='$zone_id'    "; 
    }


                 $search_all_s2="           
                          (
                          data.ex_list_listing_status='' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )  
                          or
                          (
                          data.ex_list_listing_status='1'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )                 
                          or
                          (
                          data.ex_list_listing_status='3'  and data.ex_list_rent_till_date<='$calExpireDate'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )            
                          or
                          (
                          data.ex_list_listing_status='7'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='8'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='9' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='10'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='11'                           
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='12'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='13' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='14' 
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                          or
                          (
                          data.ex_list_listing_status='15' and data.ex_list_rent_till_date<='$calExpireDate'
                          $s_price_low  $s_price_maximum and data.ex_list_close='0'  
                          $project_check_2   $s_deal  $select_floor $s_type  
                          )
                             ";


 }

 
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
          echo "project_id : ".$project_id."<br>";   

        echo $search_all_s2."<br>";  


                $set_s_text=" data.ex_list_date_update DESC , data.ex_list_premium DESC ,data.ex_list_img_score DESC ";

           $sql_data2="SELECT Distinct data.project_id FROM dbo_data_excel_listing AS data  
                    
                    where $search_all_s2  order by $set_s_text    ";  
           $result_data2 = $conn->query($sql_data2);
 
               while($rs_listing=$result_data2->fetch_assoc()) { $num++;

                     $project_id=$rs_listing['project_id'];

                    echo $project_id."<br>";

                  if($project_id!='0'){


                         $sql_project="SELECT project_name_en , project_train_station , zone_id , project_total_floors ,project_map , project_listing_count , 
                                              project_completed , project_latitude , project_longitude , project_proppit_latitude , project_proppit_longitude
                                       FROM type_project WHERE project_id='$project_id' ";  
                         $result_project= $conn->query($sql_project);
                         $rs_project=$result_project->fetch_assoc();

                  }
              } */
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
      function initMap() {
      var mapOptions = {
        center: {lat: <?php echo $latitude_make;?>, lng: <?php echo $longitude_make;?>},
        zoom: 15,
      }
        
      var maps = new google.maps.Map(document.getElementById("map"),mapOptions);


<?php
			 
 
 
  
			 
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
	  
			  

			    $set_s_text=" data.ex_list_date_update DESC , data.ex_list_premium DESC ,data.ex_list_img_score DESC ";

			     $sql_data2="SELECT Distinct data.project_id FROM dbo_data_excel_listing AS data  
                    
                    where $search_all_s2  order by $set_s_text    ";  
			     $result_data2 = $conn->query($sql_data2);
 
			         while($rs_listing=$result_data2->fetch_assoc()) { $num++;

			               $project_id=$rs_listing['project_id'];



                  if($project_id!='0'){


                         $sql_project="SELECT project_name_en , project_train_station , zone_id , project_total_floors ,project_map , project_listing_count , 
                                              project_completed , project_latitude , project_longitude , project_proppit_latitude , project_proppit_longitude
                                       FROM type_project WHERE project_id='$project_id' ";  
                         $result_project= $conn->query($sql_project);
                         $rs_project=$result_project->fetch_assoc();


    			               $project_name=$rs_project['project_name'];
                         $project_name_en=$rs_project['project_name_en'];
    			               $project_train_station=$rs_project['project_train_station'];
    			               $zone_id=$rs_project['zone_id'];
    			               $project_total_floors=$rs_project['project_total_floors'];
    			               $project_map=$rs_project['project_map'];
    			               $project_listing_count=$rs_project['project_listing_count'];

    			               $project_latitude=$rs_project['project_latitude'];
    			               $project_longitude=$rs_project['project_longitude'];
    			               $project_proppit_latitude=$rs_project['project_proppit_latitude'];
    			               $project_proppit_longitude=$rs_project['project_proppit_longitude'];

                         $project_completed=$rs_project['project_completed'];

                         if($project_completed!=''){
                              $project_completed=$rs_project['project_completed']+543;
                         }else{
                              $project_completed="ไม่ระบุ";
                         }
                           
                           $sql_img="SELECT * FROM type_project_img where project_id='$project_id' order by project_img_no ASC LIMIT 1"; 
                           $result_img=$conn->query($sql_img); 
                           $rs_img=$result_img->fetch_assoc();

                               $project_img_folder=$rs_img['project_img_folder'];
                               $project_img_name=$rs_img['project_img_name'];
                               $project_img_id=$rs_img['project_img_id']; 

                               if($project_img_name!=''){ 

                                   $project_img_folder="../../images/project/$project_id/mini_w300/".$project_img_name; 

                               }else{ // ถ้าไม่มีภาพ ให้ใช้ภาพของ Listing

                                   $project_img_folder="../../images/noimages.jpg"; 
                               }
                  }

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
			             
			             if($zone_name!=''){ $project_zone2=$zone_name;}

			             if($zone_id=='0') { $project_zone2="0";}
  

			           $latitude_s=$project_proppit_latitude;
			           $longitude_s=$project_proppit_longitude;

			           if($project_proppit_latitude!=''){
			           	      $project_latitude=$project_proppit_latitude;
			           }

			           if($project_proppit_longitude!=''){
			           	      $project_longitude=$project_proppit_longitude;
			           }
          

              if($project_latitude!=''){

                if($project_id==$project_id_check){  $check_deal='1';
 ?>

                    var marker<?php echo $project_id;?> = new google.maps.Marker({
                       position: new google.maps.LatLng(<?php echo $project_latitude;?>, <?php echo $project_longitude;?>),
                       map: maps,
                       title: '<?php echo "Project : ".$project_name_en;?>',
                       icon: 'https://connex.in.th/backend/img/map-marker-icon_pin.png'  
                    });

                    var info<?php echo $project_id;?> = new google.maps.InfoWindow({
                      content : "<a href='../page/listing_deal_buyer.php?code=<?php echo $code;?>&project=<?php echo $project_id;?>&check_p=2&d_check=1&listing=2'  ><img src='<?php echo $project_img_folder;?>' alt='--' style='width: 100%; height: 130px;'> <br> </a> <br> <b>Project : </b> <?php echo $project_name_en;?><br> <b>จำนวนชั้น : </b> <?php echo $project_total_floors;?> <br><b>ปีที่สร้าง : </b> <?php echo $project_completed;?> <br> <b>สถานีรถไฟฟ้า : </b><?php echo $project_train_station;?> <br> <b>โซน : </b><?php echo $project_zone2 ;?><br><a href='../page/listing_deal_buyer.php?code=<?php echo $code;?>&project=<?php echo $project_id;?>&check_p=<?php echo $listing;?>&d_check=1&listing=2'  >คลิกเข้าชม Listing ในโครงการนี้</a> "
                    });

                    google.maps.event.addListener(marker<?php echo $project_id;?>  , 'click', function() {
                      info<?php echo $project_id;?>.open(maps, marker<?php echo $project_id;?> );
                    });
  
<?php           }else{  ?>

                    var marker<?php echo $project_id;?> = new google.maps.Marker({
                       position: new google.maps.LatLng(<?php echo $project_latitude;?>, <?php echo $project_longitude;?>),
                       map: maps,
                       title: '<?php echo "Project : ".$project_name_en;?>',
                       icon: 'https://connex.in.th/backend/img/map-marker-icon.png'  
                    });

                    var info<?php echo $project_id;?> = new google.maps.InfoWindow({
                      content : "<a href='../page/listing_deal_buyer.php?code=<?php echo $code;?>&project=<?php echo $project_id;?>&check_p=2&d_check=1&listing=2'  ><img src='<?php echo $project_img_folder;?>' alt='--' style='width: 100%; height: 130px;'> <br> </a> <br> <b>Project : </b> <?php echo $project_name_en;?><br> <b>จำนวนชั้น : </b> <?php echo $project_total_floors;?> <br><b>ปีที่สร้าง : </b> <?php echo $project_completed;?> <br> <b>สถานีรถไฟฟ้า : </b><?php echo $project_train_station;?> <br> <b>โซน : </b><?php echo $project_zone2 ;?><br><a href='../page/listing_deal_buyer.php?code=<?php echo $code;?>&project=<?php echo $project_id;?>&check_p=<?php echo $listing;?>&d_check=1&listing=2'  >คลิกเข้าชม Listing ในโครงการนี้</a> "
                    });

                    google.maps.event.addListener(marker<?php echo $project_id;?>  , 'click', function() {
                      info<?php echo $project_id;?>.open(maps, marker<?php echo $project_id;?> );
                    });

 <?php
                }		

             }
			   
			    }  
 
           if($check_deal!=1 and $latitude_make!=''){ ?>

                    var marker<?php echo $project_id_check;?> = new google.maps.Marker({
                       position: new google.maps.LatLng(<?php echo $latitude_make;?>, <?php echo $longitude_make;?>),
                       map: maps,
                       title: '<?php echo "Project : ".$project_name_en_check;?>',
                       icon: 'https://connex.in.th/backend/img/map-marker-icon_pin.png'  
                    });

                    var info<?php echo $project_id_check;?> = new google.maps.InfoWindow({
                      content : "   <b>Project : </b> <?php echo $project_name_en_check;?>  "
                    });

                    google.maps.event.addListener(marker<?php echo $project_id_check;?>  , 'click', function() {
                      info<?php echo $project_id_check;?>.open(maps, marker<?php echo $project_id_check;?> );
                    });

<?php      }


          ?>
    }
</script>

 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI0mXvBUiE73pO0F22BJ2N6asExHtxWSc&callback=initMap" async defer></script>


