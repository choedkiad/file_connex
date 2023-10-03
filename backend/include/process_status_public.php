<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 
/*
 ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);  */

 include '../config.php'; 
 include '../setting.php'; 

         $id=$_GET['id'];
         $today=date("Y-m-d H:i:s");
         $status_1=$_GET['status'];
         $USER_ID=$_SESSION['USER_ID'];

         $calExpireDate=date ("Y-m-d", strtotime("-30 day", strtotime($today)));
         $calExpireDate=$calExpireDate." 00:00:00";

         if($id!='' and $status_1=='public' and $_SESSION['STATUS_DRAFT']=='1'){

           $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
           $result_list= $conn->query($sql_list); 
           $rs_list=$result_list->fetch_assoc();


           $ex_list_public=$rs_list['ex_list_public'];
       

           if($ex_list_public=='1'){ $status=0; $record_note="กำหนดPost เป็นDarft"; }else{ $status=1; $record_note="กำหนดPost เป็นPublic"; }
    
                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_public='".$status."', 
                                ex_list_public_date='".$today."' 
                                WHERE ex_list_listing_code='".$id."' "; 
                      mysqli_query($conn, $sql);  

                      $sql_1="INSERT INTO dbo_record ( ex_list_id, record_note, record_remark ,  record_date , record_user_id  )

                           VALUES ( '$id', '$record_note', '$status' ,  '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  

                        if($status=='1'){

                              $sql2= "UPDATE dbo_data_excel_listing SET   
                                        ex_list_living='1',
                                        ex_list_living_date='".$today."' 
                                        WHERE ex_list_listing_code='".$id."' "; 

                                        $record_note="เปิด Living Insider";
                              $conn->query($sql2);

                              $sql_2="INSERT INTO dbo_record ( ex_list_id, record_note, record_remark ,  record_date , record_user_id  )

                                   VALUES ( '$id', '$record_note', '$status' ,  '$today' , '$USER_ID')";
                                    mysqli_query($conn, $sql_2);  

                        } 
                 
                    /// เช็ค ส่งห้องใหม่ใน DEAL ที่เกี่ยวข้อง  ///


                   $project_id=$rs_list['project_id'];
                   $station_id=$rs_list['ex_list_train_station'];
                   $zone_id=$rs_list['zone_id'];
                   $ex_list_price=$rs_list['ex_list_price'];
                   $ex_list_deal_type=$rs_list['ex_list_deal_type'];
                   $ex_list_sqm=$rs_list['ex_list_sqm'];
                   $ex_list_bedroom=$rs_list['ex_list_bedroom'];
                   $ex_list_bathroom=$rs_list['ex_list_bathroom'];
                   $ex_list_floor=$rs_list['ex_list_floor']; 
                   $ex_list_listing_type=$rs_list['ex_list_listing_type']; 
                   $price_all=number_format($ex_list_price);

                   $sql_project="SELECT * FROM type_project where project_id='$project_id' ";
                   $result_project= $conn->query($sql_project);  
                   $rs_project=$result_project->fetch_assoc();

                   $project_name_en=$rs_project['project_name_en'];  

                   if($ex_list_listing_type!=''){
                         $listing_type=" create_deal_type_2='$ex_list_listing_type' and ";
                   }else{
                         $listing_type=" create_deal_type_2='99999' and   ";
                   }

                   if($ex_list_bedroom=='0' or $ex_list_bedroom=='1'){
                         $bed_0='0';
                         $bed_1='1'; 
                   }else{
                         $bed_0=$ex_list_bedroom;
                         $bed_1=$ex_list_bedroom;                                    
                   }
                   
                   if($project_name_en!=''){

                        $project_name_en=$rs_project['project_name_en']; 
                        $station_id=$rs_project['project_train_station'];
                        $zone_id=$rs_project['zone_id'];
                   }    

                   if($project_id!='0'){
                         $s_project_2=" project_id_2='$project_id' and project_id_2!='0' and ";
                         $s_project=" project_id='$project_id' and project_id!='0' and ";
                   }else{
                         $s_project_2=" project_id_2='99999999999' and";
                         $s_project=" project_id='99999999999' and";
                   } 

                   if($station_id!='0'){
                         $s_station_2=" station_id_2='$station_id' and  station_id_2!='0' and  ";
                         $s_station=" station_id='$station_id' and  station_id!='0' and";
                   }else{
                         $s_station_2=" station_id_2='99999999999' and";
                         $s_station=" station_id='99999999999' and";   
                   }  

                   if($zone_id!='0'){
                         $s_zone_2=" zone_id_2='$zone_id' and zone_id_2!='0' and";
                         $s_zone=" zone_id='$zone_id' and zone_id!='0' and";
                   }else{
                         $s_zone_2=" zone_id_2='99999999999' and";
                         $s_zone=" zone_id='99999999999' and";     
                   }   

 
                         $s_deal_create=" create_deal_create>='$calExpireDate' and";              
                   
                         $s_bedroom_2=" create_deal_bedroom_2 LIKE  '%$ex_list_bedroom%' and  create_deal_bedroom_2!='' and ";
                         $s_bedroom=" create_deal_bedroom LIKE '%$ex_list_bedroom%' and  create_deal_bedroom!='' and  ";
 
                   
                   if($ex_list_sqm!=''){
                         //$s_sqm_2="create_deal_sqm_end_2<=$ex_list_sqm and  create_deal_sqm_start_2>=0 and";
                         //$s_sqm="create_deal_sqm_end<=$ex_list_sqm and  create_deal_sqm_start>=0 and ";
                   } 

                   if($ex_list_price!='0'){
                        // $s_budget_2=" create_deal_budget_end_2<=$ex_list_price and  create_deal_budget_start_2>=0 and";
                        // $s_budget=" create_deal_budget_end<=$ex_list_price and  create_deal_budget_start>=0 and";
                   }
  
                  
                  for ($i = -1; $i <= 7; $i++) {
                     
                    if($i==0){
                       $sql_room=" 
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_project_2  create_deal_bedroom_2='$bed_0' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i' 
                              )
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_project_2  create_deal_bedroom_2='$bed_1' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i'  
                              )                         
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_project_2  create_deal_bedroom_2='' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i'  
                              )        
                              or

                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_project  create_deal_bedroom='$bed_0' and $s_sqm_2 $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_project  create_deal_bedroom='$bed_1' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_project  create_deal_bedroom='' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )

                              or

                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_station_2  create_deal_bedroom_2='$bed_0' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i'
                              )
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_station_2  create_deal_bedroom_2='$bed_1' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i' 
                              )
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_station_2  create_deal_bedroom_2='' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i' 
                              )                                            

                              or

                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_station  create_deal_bedroom='$bed_0' and $s_sqm_2 $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_station  create_deal_bedroom='$bed_1' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_station  create_deal_bedroom='' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )                     

                              or

                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_zone_2  create_deal_bedroom_2='$bed_0' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i'
                              )
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_zone_2  create_deal_bedroom_2='$bed_1' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i' 
                              )
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_zone_2  create_deal_bedroom_2='' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i' 
                              )                        

                              or

                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_zone  create_deal_bedroom='$bed_0' and $s_sqm_2 $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_zone  create_deal_bedroom='$bed_1' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_zone  create_deal_bedroom='' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )

                        ";


                    }else{


                       $sql_room="  
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_project_2  create_deal_bedroom_2='$bed_0' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i' 
                              )
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_project_2  create_deal_bedroom_2='$bed_1' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i'  
                              )                         
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_project_2  create_deal_bedroom_2='' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i'  
                              )        
                              or

                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_project  create_deal_bedroom='$bed_0' and $s_sqm_2 $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_project  create_deal_bedroom='$bed_1' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_project  create_deal_bedroom='' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )

                              or

                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_station_2  create_deal_bedroom_2='$bed_0' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i'
                              )
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_station_2  create_deal_bedroom_2='$bed_1' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i' 
                              )
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_station_2  create_deal_bedroom_2='' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i' 
                              )                                            

                              or

                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_station  create_deal_bedroom='$bed_0' and $s_sqm_2 $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_station  create_deal_bedroom='$bed_1' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_station  create_deal_bedroom='' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )                     

                              or

                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_zone_2  create_deal_bedroom_2='$bed_0' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i'
                              )
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_zone_2  create_deal_bedroom_2='$bed_1' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i' 
                              )
                              or
                              (
                              create_deal_attention_2='$ex_list_deal_type' and create_deal_attention_2!='0' and $listing_type
                              $s_zone_2  create_deal_bedroom_2='' and $s_sqm_2 $s_budget_2 $s_deal_create contact_deal_win='$i' 
                              )                        

                              or

                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_zone  create_deal_bedroom='$bed_0' and $s_sqm_2 $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_zone  create_deal_bedroom='$bed_1' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                              (
                              create_deal_attention='$ex_list_deal_type' and create_deal_attention_2='0' and $listing_type
                              $s_zone  create_deal_bedroom='' and $s_sqm $s_budget $s_deal_create contact_deal_win='$i'  
                              )
                              or
                        ".$sql_room;

                    }
 
                  };

 

                          if($ex_list_deal_type=='1'){ $deal_type="ขาย";  $deal_type_en="For Sale"; }else{$deal_type="เช่า"; $deal_type_en="For Rent";}

                          if($lang=='1'){

                              if($ex_list_bedroom=='0'){ $ex_list_bedroom='สตูดิโอ';}
                               $cx_list='รหัสทรัพย์ : '.$id;
                               $price="ราคา".$deal_type.' : '.$price_all;
                               $floor='ตั้งอยู่ชั้นที่ : '.$ex_list_floor;
                               $sqm='พื้นที่ใช้สอย (sqm) : '.$ex_list_sqm;
                               $bedroom='ห้องนอน : '.$ex_list_bedroom;
                               $bathroom='ห้องน้ำ : '.$ex_list_bathroom;
                               $url="https://connex.in.th/property/th/".$id;

                          }else{

                              if($ex_list_bedroom=='0'){ $ex_list_bedroom='Studio';}
                               $cx_list='Listing ID : '.$id;
                               $price=$deal_type_en.' : '.$price_all;
                               $floor='Floor :  '.$ex_list_floor;
                               $sqm='Usable area (sqm) :  '.$ex_list_sqm;
                               $bedroom='No. of Bedroom : '.$ex_list_bedroom;
                               $bathroom='No. of Bathroom : '.$ex_list_bathroom;
                               $url="https://connex.in.th/property/en/".$id;

                          }


?>

                     <table border="1" width="100%">
                     <tr>
                        <td>DEAL</td>
                        <td>ขาย/เช่า</td>               
                        <td>BUDGET</td>
                        <td>SQM</td>
                        <td>bed</td>
                        <td>PROJECT</td>
                        <td>Station</td>
                        <td>Zone</td>
                        <td></td>
                        <td></td>
                     </tr>

<?php 
                   //echo $sql_room;
 
         
                       $sql_deal="SELECT * FROM dbo_create_deal  WHERE 
                                   $sql_room
                                 ";  
                       $result_deal = $conn->query($sql_deal);
                       while($rs_deal=$result_deal->fetch_assoc()) { 

                                 $create_deal_code=$rs_deal['create_deal_code'];
                                 $deal_sale=$rs_deal['create_deal_sale'];
                                 $subdeal_code='';
 
                                 $sql_subdeal="SELECT * FROM dbo_subdeal  WHERE  ex_list_listing_code='$id' and create_deal_code='$create_deal_code' ";  
                                 $result_subdeal= $conn->query($sql_subdeal);
                                 $rs_subdeal=$result_subdeal->fetch_assoc(); 
                                 
                                 $subdeal_code=$rs_subdeal['subdeal_code'];
                            
                            if($subdeal_code==''){

                                 $title=$rs_deal['create_deal_title'];
                                 $create_deal_attention=$rs_deal['create_deal_attention'];
                                 $create_deal_attention_2=$rs_deal['create_deal_attention_2'];
                                 $create_deal_search_from=$rs_deal['create_deal_search_from'];
                                 $create_deal_budget_start=$rs_deal['create_deal_budget_start'];
                                 $create_deal_budget_end=$rs_deal['create_deal_budget_end'];
                                 $create_deal_sqm_start=$rs_deal['create_deal_sqm_start'];
                                 $create_deal_sqm_end=$rs_deal['create_deal_sqm_end'];
                                 $project_id=$rs_deal['project_id']; 
                                 $station_id=$rs_deal['station_id']; 
                                 $zone_id=$rs_deal['zone_id']; 
                                 $create_deal_bedroom=$rs_deal['create_deal_bedroom'];  
                                 $contact_deal_win=$rs_deal['contact_deal_win'];  
                                 $create_deal_create=$rs_deal['create_deal_create'];  

                                 $create_deal_budget_start_2=$rs_deal['create_deal_budget_start_2'];
                                 $create_deal_budget_end_2=$rs_deal['create_deal_budget_end_2'];
                                 $create_deal_sqm_start_2=$rs_deal['create_deal_sqm_start_2'];
                                 $create_deal_sqm_end_2=$rs_deal['create_deal_sqm_end_2'];
                                 $project_id_2=$rs_deal['project_id_2']; 
                                 $station_id_2=$rs_deal['station_id_2']; 
                                 $zone_id_2=$rs_deal['zone_id_2'];
                                 $create_deal_bedroom_2=$rs_deal['create_deal_bedroom_2'];  
                    
                                 $auto_offer=$rs_deal['auto_offer'];


                                 if($create_deal_attention_2!='0'){

                                     $create_deal_attention=$create_deal_attention_2;
                                     $create_deal_budget_start=$create_deal_budget_start_2;
                                     $create_deal_budget_end=$create_deal_budget_end_2;
                                     $create_deal_sqm_start=$create_deal_sqm_start_2;
                                     $create_deal_sqm_end=$create_deal_sqm_end_2;
                                     $project_id=$project_id_2; 
                                     $station_id=$station_id_2;
                                     $zone_id=$zone_id_2;
                                     $create_deal_bedroom=$create_deal_bedroom_2;

                                 }
                                 if($create_deal_budget_end=='0'){ $create_deal_budget_end=$ex_list_price;  }
                                 if($create_deal_sqm_end=='0'){ $create_deal_sqm_end='99999';  }
                               
                               $budget_30per=$create_deal_budget_end*0.3;
                               $budget_min=$create_deal_budget_end-$budget_30per;
                               $budget_max=$create_deal_budget_end+$budget_30per;
                              

                               if($project_id!='0'){  
                                     $sql_project="SELECT * FROM type_project  WHERE project_id='$project_id'  ";  
                                     $result_project=$conn->query($sql_project);
                                     $rs_project=$result_project->fetch_assoc(); 

                                     $project_id=$rs_project['project_name_en'];

                               }
                               if($station_id!='0'){  
                                     $sql_station="SELECT * FROM type_train_station  WHERE station_id='$station_id'  ";  
                                     $result_station = $conn->query($sql_station);
                                     $rs_station=$result_station->fetch_assoc(); 

                                     $station_id=$rs_station['station_train'];
                               }
                               if($zone_id!='0'){  
                                     $sql_zone="SELECT * FROM type_zone  WHERE zone_id='$zone_id'  ";  
                                     $result_zone= $conn->query($sql_zone);
                                     $rs_zone=$result_zone->fetch_assoc(); 

                                     $zone_id=$rs_zone['zone_name'];
                               }
 
                              if($budget_min<=$ex_list_price and $budget_max>=$ex_list_price and $create_deal_sqm_start<=$ex_list_sqm and $create_deal_sqm_end>=$ex_list_sqm){

                                      $check_budget="true";
                             
                          ?>
                      
                        <tr>
                        <td><?php echo $create_deal_code;?></td>
                        <td><?php echo $create_deal_attention;?></td>               
                        <td><?php echo $create_deal_budget_start."-".$create_deal_budget_end;?></td>
                        <td><?php echo $create_deal_sqm_start."-".$create_deal_sqm_end;?></td>
                        <td><?php echo $create_deal_bedroom;?></td>
                        <td><?php echo $project_id;?></td>
                        <td><?php echo $station_id;?></td>
                        <td><?php echo $zone_id;?></td>
                        <td><?php echo $budget_min."-".$budget_max;?></td>
                        <td><?php echo $check_budget;?></td>
                        <td><?php echo $create_deal_create;?></td>
                        </tr>
<?php
             
                        $offer_auto=$auto_offer+1;
              
                        $sql_deal_offer="UPDATE dbo_create_deal SET 
                                auto_offer='".$offer_auto."'                                
                                WHERE create_deal_code='".$create_deal_code."' "; 
                            mysqli_query($conn, $sql_deal_offer);
            
                   
                      $sql="SELECT * FROM dbo_subdeal where create_deal_code='$create_deal_code' order by subdeal_id DESC ";
                      $result=$conn->query($sql);  
                      $rs=$result->fetch_assoc();

                      $count=$result->num_rows;
                      
                      $count=$count+1; 

                      if($count=='1'){ $subdeal_color='#ffc947'; }
                      else if($count=='2'){ $subdeal_color='#ffdeb6'; }
                      else if($count=='3'){ $subdeal_color='#e6ffa2'; }
                      else if($count=='4'){ $subdeal_color='#a2ffe8'; }
                      else if($count=='5'){ $subdeal_color='#a2a2ff';  }
                      else if($count=='6'){ $subdeal_color='#f1a2ff'; }
                      else if($count=='7'){ $subdeal_color='#ffa2b4'; }
                      else if($count=='8'){ $subdeal_color='#66FF00'; }
                      else if($count=='9'){ $subdeal_color='#F4A460';}
                      else if($count=='10'){ $subdeal_color='#FFFF00'; }
                      else if($count=='11'){ $subdeal_color='#00BFFF'; }
                      else if($count=='12'){ $subdeal_color='#FF8C00'; }
                      else if($count=='13'){ $subdeal_color='#FFA500'; }
                      else if($count=='14'){ $subdeal_color='#F5F5DC'; }
                      else if($count=='15'){ $subdeal_color='#E6E6FA'; }


                      $count=$create_deal_code."-".$count;     

                      $time_s=date("H:i");
                      $time_e = date('H:i', strtotime('+60 minutes', strtotime($today)));
                      $s_record_note='นำเสนอห้องอัตโนมัติ';

             
                      $sql_1="INSERT INTO dbo_subdeal (subdeal_id  , subdeal_code, create_deal_code , ex_list_listing_code , subdeal_status, user_id, subdeal_create_date , color , auto_offer    )
                        VALUES ('','$count', '$create_deal_code' , '$id' , '1' , '$USER_ID', '$today' , '$subdeal_color' ,'1' )";
                      mysqli_query($conn, $sql_1);  

                   
 
                      $sql_2="INSERT INTO dbo_subdeal_calendar (s_calendar_id , s_calendar_status,  subdeal_code , create_deal_code, s_calendar_date , s_calendar_time_start , s_calendar_time_end , ex_list_listing_code , s_calendar_note ,  s_calendar_create , user_id ,auto_offer  )
                              VALUES ('', '1' , '$count' , '$create_deal_code'  , '$today' , '$time_s' , '$time_e'  , '$id' , '$s_record_note' , '$today' , '$USER_ID' , '1' )";
                      mysqli_query($conn, $sql_2);  

 
                       $sql_3="INSERT INTO dbo_subdeal_calendar_record (s_record_id  , s_record_status, subdeal_code , create_deal_code , s_record_date , s_record_time_start , s_record_time_end , ex_list_listing_code ,  s_record_note , s_record_create , user_id , s_record_check  ,auto_offer   )
                              VALUES ('', '1' , '$count', '$create_deal_code' , '$today' , '$time_s' , '$time_e'  , '$id' , '$s_record_note'  , '$today' , '$USER_ID' ,'1', '1' )";
                      mysqli_query($conn, $sql_3);  
                  

                             $url_detail="https://connex.in.th/link.php?owner=$id"; 
                             $url_shot="https://connex.in.th/link.php?deal=$create_deal_code";

                                // เซลล์ที่ ส่งงานให้
                                $sql="SELECT * FROM dbo_register where register_id='$deal_sale'   ";
                                $result=$conn->query($sql);  
                                $rs=$result->fetch_assoc();    

                                $register_notify=$rs['register_notify'];  
                                //$register_notify='sc7I0MXhKWbai7p6WgtUHxx7tepSDBHRHM1gW22Mpvs';  

                             /* --------------  */
   

$text_line= "
*****นำเสนอห้อง*****
Deal Name : ".$title."
รหัส Deal : ".$create_deal_code."
ผู้นำเสนอ : ".$_SESSION['NAME_ID']." (Auto)
เวลา : ".$today."

Deal Activity : ".$url_shot."
_________________________
Owner Detail : ".$url_detail."
Remark : นำเสนอห้องอัตโนมัติ
_________________________

".$project_name_en."

".$cx_list."

".$price."

".$floor."
".$sqm."
".$bedroom."
".$bathroom."

" .$url;

 
  
                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);
                            date_default_timezone_set("Asia/Bangkok");

                            $sToken = $register_notify;
                            $sMessage = $text_line;

                            
                            $chOne = curl_init(); 
                            curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                            curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
                            curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
                            curl_setopt( $chOne, CURLOPT_POST, 1); 
                            curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
                            $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                            curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                            $result = curl_exec( $chOne ); 
 
                            //Result error 

                       
                            if(curl_error($chOne)) 
                            { 
                              echo 'error:' . curl_error($chOne); 
                            } 
                            else { 
                              $result_ = json_decode($result, true); 
                              echo "status : ".$result_['status']; echo "message : ". $result_['message'];
                            } 
                            curl_close( $chOne ); 

 
//////////////////// COPY /////////////////////

                            $register_notify='sc7I0MXhKWbai7p6WgtUHxx7tepSDBHRHM1gW22Mpvs'; 
                            
                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);
                            date_default_timezone_set("Asia/Bangkok");

                            $sToken = $register_notify;
                            $sMessage = $text_line;

                            
                            $chOne = curl_init(); 
                            curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                            curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
                            curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
                            curl_setopt( $chOne, CURLOPT_POST, 1); 
                            curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
                            $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                            curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                            $result = curl_exec( $chOne ); 
 
                            //Result error 

                       
                            if(curl_error($chOne)) 
                            { 
                              echo 'error:' . curl_error($chOne); 
                            } 
                            else { 
                              $result_ = json_decode($result, true); 
                              echo "status : ".$result_['status']; echo "message : ". $result_['message'];
                            } 
                            curl_close( $chOne );    

                            }
                       }

                   }
  ?>

                       </table>

 <?php


                    /// เช็ค NEW Listing ใหม่ในDEAL  ///
     
/*
                       $date=date("Y-m-d H:i:s");
                       $status=$_POST['status'];
                       $USER_ID=$_SESSION['USER_ID'];
                       $calExpireDate=date ("Y-m-d", strtotime("+15 day", strtotime($today))); 



                   $sql_listing_check="SELECT listing.project_id , listing.ex_list_listing_code , listing.ex_list_sqm  , listing.ex_list_price  , listing.ex_list_bedroom , listing.ex_list_listing_status , listing.ex_list_rent_till_date , listing.ex_list_deal_type , listing.ex_list_listing_type  , pj.project_train_station, pj.zone_id  
                         FROM dbo_data_excel_listing AS listing
                         LEFT JOIN type_project AS pj on listing.project_id=pj.project_id
                         where listing.ex_list_listing_code='$id'  ";
                   $result_listing_check = $conn->query($sql_listing_check); 
                      // output data of each row
                   $rs_listing = $result_listing_check->fetch_assoc();

                       $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
                       $project_id=$rs_listing['project_id'];
                       $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
                       $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
                       $ex_list_price=$rs_listing['ex_list_price'];
                       $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
                       $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
                       $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];
                       $ex_list_number_buildings=$rs_listing['ex_list_number_buildings'];
                       $ex_list_floor=$rs_listing['ex_list_floor'];
                       $ex_list_sqm=$rs_listing['ex_list_sqm'];
                       $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
                       $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
 
                       $zone_id=$rs_listing['zone_id'];

                       $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
                       $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
                       $project_train_station=$rs_listing['project_train_station'];

                       if($ex_list_bedroom=='0'){ $ex_list_bedroom=''; }
                  /*

                       echo "project_id : ".$project_id."<br>";
                       echo "ex_list_sqm : ".$ex_list_sqm."<br>";
                       echo "ex_list_price : ".$ex_list_price."<br>";
                       echo "ex_list_bedroom : ".$ex_list_bedroom."<br>";
                       echo "ex_list_listing_status : ".$ex_list_listing_status."<br>";
                       echo "ex_list_deal_type : ".$ex_list_deal_type."<br>";
                       echo "ex_list_listing_type : ".$ex_list_listing_type."<br>";
                       echo "project_train_station : ".$project_train_station."<br>";    */     
                   
                   ////////// Project ///////////
                 /*  
                       $sql_deal="SELECT * FROM dbo_create_deal  WHERE  
                                   project_id='$project_id' and
                                   create_deal_budget_start<=$ex_list_price and  create_deal_budget_end>=$ex_list_price and
                                   create_deal_bedroom='$ex_list_bedroom' and $ex_list_listing_status='1' and
                                   create_deal_attention LIKE '%$ex_list_deal_type%' and 
                                   create_deal_type LIKE '%$ex_list_listing_type%' and create_deal_search_from='1'
                                   or
                                   project_id='$project_id'  and
                                   create_deal_budget_start<=$ex_list_price and  create_deal_budget_end>=$ex_list_price and
                                   create_deal_bedroom='$ex_list_bedroom' and $ex_list_listing_status='3' and $ex_list_rent_till_date<=$calExpireDate and 
                                   create_deal_attention LIKE '%$ex_list_deal_type%' and 
                                   create_deal_type LIKE '%$ex_list_listing_type%'  and create_deal_search_from='1'
                                   or
                                   project_id='$project_id' and
                                   create_deal_budget_start<=$ex_list_price and  create_deal_budget_end>=$ex_list_price and
                                   create_deal_bedroom='$ex_list_bedroom' and $ex_list_listing_status='7' and
                                   create_deal_attention LIKE '%$ex_list_deal_type%' and 
                                   create_deal_type LIKE '%$ex_list_listing_type%' and create_deal_search_from='1'

                                   ";  
                        $result_deal = $conn->query($sql_deal);

                      if($result_deal->num_rows > 0) { //num_rows
                      // output data of each row
                           while($rs_deal=$result_deal->fetch_assoc()) { $i++;


                                 $create_deal_code=$rs_deal['create_deal_code'];
                                 $create_deal_search_from=$rs_deal['create_deal_search_from'];
                                 $create_deal_budget_start=$rs_deal['create_deal_budget_start'];
                                 $create_deal_budget_end=$rs_deal['create_deal_budget_end'];
                                 $create_deal_sqm_start=$rs_deal['create_deal_sqm_start'];
                                 $create_deal_sqm_end=$rs_deal['create_deal_sqm_end'];

                                  $sql_1="INSERT INTO dbo_listing_new_deal_check ( listing_new_deal_check_id ,ex_list_listing_code , project_id , station_id , zone_id , listing_new_deal_check_status , listing_new_deal_check_view, create_deal_code, create_deal_search_from , listing_new_deal_check_date   )
               
                                  VALUES ( '','$ex_list_listing_code' , '$project_id' , '$project_train_station' , '$zone_id' , '1', '1' , '$create_deal_code' , '$create_deal_search_from' , '$date' )";
                                   mysqli_query($conn, $sql_1);   

                                   echo "create_deal_budget_start : ".$create_deal_budget_start."<=".$ex_list_price."<br>"; 
                                   echo "create_deal_budget_end : ".$create_deal_budget_end.">=".$ex_list_price."<br>"; 
                                   echo "create_deal_sqm_start : ".$create_deal_sqm_start."<=".$ex_list_sqm."<br>"; 
                                   echo "create_deal_sqm_end : ".$create_deal_sqm_end.">=".$ex_list_sqm."<br>"; 
                           }

                      }
                    

                     if($project_train_station!=''){ // Check สถานีรถไฟฟ้า ว่ามีหรือไม่


                         $sql_deal_2="SELECT * FROM dbo_create_deal AS deal   
                                     LEFT JOIN type_project AS pj on deal.project_id=pj.project_id
                                     WHERE
                                     pj.project_train_station='$project_train_station' and
                                     deal.create_deal_budget_start<=$ex_list_price and  deal.create_deal_budget_end>=$ex_list_price and
                                     $ex_list_listing_status='1' and
                                     deal.create_deal_attention LIKE '%$ex_list_deal_type%' and 
                                     deal.create_deal_type='$ex_list_listing_type' and deal.create_deal_search_from='1'
                                     or     
                                     pj.project_train_station='$project_train_station' and              
                                     deal.create_deal_budget_start<=$ex_list_price and  deal.create_deal_budget_end>=$ex_list_price and
                                     $ex_list_listing_status='3' and $ex_list_rent_till_date<=$calExpireDate and 
                                     deal.create_deal_attention LIKE '%$ex_list_deal_type%' and 
                                     deal.create_deal_type='$ex_list_listing_type' and deal.create_deal_search_from='1'
                                     or 
                                     pj.project_train_station='$project_train_station' and                  
                                     deal.create_deal_budget_start<=$ex_list_price and  deal.create_deal_budget_end>=$ex_list_price and
                                     $ex_list_listing_status='7' and
                                     deal.create_deal_attention LIKE '%$ex_list_deal_type%' and 
                                     deal.create_deal_type='$ex_list_listing_type' and deal.create_deal_search_from='1'

                                     ";  
                          $result_deal = $conn->query($sql_deal_2);

                        if($result_deal->num_rows > 0) { //num_rows
                        // output data of each row
                             while($rs_deal=$result_deal->fetch_assoc()) { $i++;

                                   $create_deal_code=$rs_deal['create_deal_code'];
                                   $create_deal_search_from=$rs_deal['create_deal_search_from'];

                                    $sql_2="INSERT INTO dbo_listing_new_deal_check ( listing_new_deal_check_id ,ex_list_listing_code, project_id  , station_id , zone_id , listing_new_deal_check_status , listing_new_deal_check_view, create_deal_code, create_deal_search_from , listing_new_deal_check_date   )
                 
                                    VALUES ( '','$ex_list_listing_code' , '$project_id' , '$project_train_station' , '$zone_id' , '2', '1' , '$create_deal_code' , '$create_deal_search_from' , '$date' )";
                                     mysqli_query($conn, $sql_2);   
                                  
                                     echo "create_deal_budget_start : ".$create_deal_budget_start."<=".$ex_list_price."<br>"; 
                                     echo "create_deal_budget_end : ".$create_deal_budget_end.">=".$ex_list_price."<br>"; 
                                     echo "create_deal_sqm_start : ".$create_deal_sqm_start."<=".$ex_list_sqm."<br>"; 
                                     echo "create_deal_sqm_end : ".$create_deal_sqm_end.">=".$ex_list_sqm."<br>"; 
                 
                             }

                        }

                   ////////// END Project ///////////

                    } */

                    /// END เช็ค NEW Listing ใหม่ในDEAL  ///



                     // if ($conn->query($sql_list) === TRUE) { ?>
                        
         
                       <script>
                           close();    
                        </script>   
  
                 <?php /*            
                      } else {
                     
                         //  echo '<script type="text/javascript">alert("Error");</script>';
                          // echo "Error updating record: " . $conn->error;   
                      } */

         } 



         if($id!='' and $status_1=='premium' and $_SESSION['STATUS_PREMIUM']=='1'){

           $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
           $result_list= $conn->query($sql_list); 
          // output data of each row
           $rs_list=$result_list->fetch_assoc();


           $ex_list_premium=$rs_list['ex_list_premium'];
          
           
             if($ex_list_premium=='1'){ $status=0;  $record_note="ปิด Premium"; }else{ $status=1; $record_note="เปิด Premium"; }
    
                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_premium='".$status."',
                                ex_list_premium_date='".$today."'
                                WHERE ex_list_listing_code='".$id."' "; 


                      $sql_1="INSERT INTO dbo_record ( ex_list_id, record_note, record_remark ,  record_date , record_user_id  )

                           VALUES ( '$id', '$record_note', '$status' ,  '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  


                      if ($conn->query($sql) === TRUE) { ?>
                       
                       <script>
                           close();   // Closes the new window
                        </script>
  
                 <?php             
                      } else {
                     
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;   
                      }


         } 

 


         if($id!='' and $status_1=='boostpost' and $_SESSION['STATUS_BOOSTPOST']=='1'){

           $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
           $result_list= $conn->query($sql_list); 
          // output data of each row
           $rs_list=$result_list->fetch_assoc();


           $ex_list_boostpost=$rs_list['ex_list_boostpost'];
          
           
             if($ex_list_boostpost=='1'){ $status=0; $record_note="ปิด Boost Proppit"; }else{ $status=1; $record_note="เปิด Boost Proppit"; }
    
                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_boostpost='".$status."',
                                ex_list_boostpost_date='".$today."'
                                WHERE ex_list_listing_code='".$id."' "; 
                   

                      $sql_1="INSERT INTO dbo_record ( ex_list_id, record_note, record_remark ,  record_date , record_user_id  )

                           VALUES ( '$id', '$record_note', '$status' ,  '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  


                      if ($conn->query($sql) === TRUE) { ?>
                       
                       <script>
                           close();   // Closes the new window
                        </script>
  
                 <?php             
                      } else {
                     
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;   
                      }


         } 


 


         if($id!='' and $status_1=='proppit' and $_SESSION['STATUS_BOOSTPOST']=='1'){

           $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
           $result_list= $conn->query($sql_list); 
          // output data of each row
           $rs_list=$result_list->fetch_assoc();


           $ex_list_proppit=$rs_list['ex_list_proppit'];
          
           
             if($ex_list_proppit=='1'){ $status=0; $record_note="ปิด Proppit"; }else{ $status=1; $record_note="เปิด Proppit"; }
    
                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_proppit='".$status."',
                                ex_list_proppit_date='".$today."'
                                WHERE ex_list_listing_code='".$id."' "; 
                   

                      $sql_1="INSERT INTO dbo_record ( ex_list_id , record_note, record_remark , record_date , record_user_id )

                           VALUES ( '$id', '$record_note', '$status' , '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  


                      if ($conn->query($sql) === TRUE) { ?>
                       
                       <script>
                           close();   // Closes the new window
                        </script>
  
                 <?php             
                      } else {
                     
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;   
                      }


         } 

         if($id!='' and $status_1=='propertyhub' and $_SESSION['STATUS_BOOSTPOST']=='1'){

           $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
           $result_list= $conn->query($sql_list); 
          // output data of each row
           $rs_list=$result_list->fetch_assoc();


           $ex_list_propertyhub=$rs_list['ex_list_propertyhub'];
          
           
             if($ex_list_propertyhub=='1'){ $status=0; $record_note="ปิด Propertyhub"; }else{ $status=1; $record_note="เปิด Propertyhub"; }
    
                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_propertyhub='".$status."',
                                ex_list_propertyhub_date='".$today."'
                                WHERE ex_list_listing_code='".$id."' "; 
                   

                      $sql_1="INSERT INTO dbo_record ( ex_list_id , record_note, record_remark , record_date , record_user_id )

                           VALUES ( '$id', '$record_note', '$status' , '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  


                      if ($conn->query($sql) === TRUE) { ?>
                       
                       <script>
                           close();   // Closes the new window
                        </script>
  
                 <?php             
                      } else {
                     
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;   
                      }


         } 



         if($id!='' and $status_1=='propertyhub_boost' and $_SESSION['STATUS_BOOSTPOST']=='1'){

           $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
           $result_list= $conn->query($sql_list); 
          // output data of each row
           $rs_list=$result_list->fetch_assoc();


           $ex_list_propertyhub_boost=$rs_list['ex_list_propertyhub_boost'];
          
           
             if($ex_list_propertyhub_boost=='1'){ $status=0; $record_note="ปิด Boost Propertyhub"; }else{ $status=1; $record_note="เปิด Boost Propertyhub"; }
    
                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_propertyhub_boost='".$status."',
                                ex_list_propertyhub_boost_date='".$today."'
                                WHERE ex_list_listing_code='".$id."' "; 
                   

                      $sql_1="INSERT INTO dbo_record ( ex_list_id , record_note, record_remark , record_date , record_user_id )

                           VALUES ( '$id', '$record_note', '$status' , '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  


                      if ($conn->query($sql) === TRUE) { ?>
                       
                       <script>
                           close();   // Closes the new window
                        </script>
  
                 <?php             
                      } else {
                     
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;   
                      }


         } 

         if($id!='' and $status_1=='living' and $_SESSION['STATUS_BOOSTPOST']=='1'){

           $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
           $result_list= $conn->query($sql_list); 
          // output data of each row
           $rs_list=$result_list->fetch_assoc();


           $ex_list_living=$rs_list['ex_list_living'];
          
           
             if($ex_list_living=='1'){ $status=0; $record_note="ปิด Living Insider"; }else{ $status=1; $record_note="เปิด Living Insider"; }
    
                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_living='".$status."',
                                ex_list_living_date='".$today."'
                                WHERE ex_list_listing_code='".$id."' "; 
                   

                      $sql_1="INSERT INTO dbo_record ( ex_list_id , record_note, record_remark , record_date , record_user_id )

                           VALUES ( '$id', '$record_note', '$status' , '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  


                      if ($conn->query($sql) === TRUE) { ?>
                       
                       <script>
                           close();   // Closes the new window
                        </script>
  
                 <?php             
                      } else {
                     
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;   
                      }


         } 


         if($id!='' and $status_1=='checkpost'){

           $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
           $result_list= $conn->query($sql_list); 
          // output data of each row
           $rs_list=$result_list->fetch_assoc();


           $ex_list_checkpost=$rs_list['ex_list_checkpost'];
          
           
             if($ex_list_checkpost=='1'){ $status=0; $record_note="ดำเนินการยกเลิกการPost ในเว็บอื่น"; }else{ $status=1;  $record_note="ดำเนินการPost ในเว็บอื่นแล้ว"; }
    
                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_checkpost='".$status."',
                                ex_list_checkpost_date='".$today."'
                                WHERE ex_list_listing_code='".$id."' "; 
       

                      $sql_1="INSERT INTO dbo_record ( ex_list_id, record_note, record_remark ,  record_date , record_user_id  )

                           VALUES ( '$id', '$record_note', '$status' ,  '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  



                      if ($conn->query($sql) === TRUE) { ?>
                       
                       <script>
                           close();   // Closes the new window
                        </script>
  
                 <?php             
                      } else {
                     
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;   
                      }


         } 

         if($id!='' and $status_1=='tel'){

            
           
                $record_note="คลิกดูเบอร์ Owner";   


                      $sql_1="INSERT INTO dbo_record ( ex_list_id, record_note, record_remark ,  record_date , record_user_id  )

                           VALUES ( '$id', '$record_note', '$status' ,  '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  

                  ?>
                       
                       <script>
                           close();   // Closes the new window
                        </script>
  
                 <?php             
                   


         } 


         if($id!='' and $status_1=='double'){

                      

                              $sql= "UPDATE dbo_data_excel_listing SET   
                                           ex_list_close='0',
                                           ex_list_double_status='0',
                                           ex_list_double_no='4' 
                                        WHERE ex_list_listing_code='".$id."' "; 

                                        $record_note="ยืนยัน listing ไม่ซ้ำ";
                             
                             
                              $sql_2="INSERT INTO dbo_record ( ex_list_id, record_note, record_remark ,  record_date , record_user_id  )

                                   VALUES ( '$id', '$record_note', '$status' ,  '$today' , '$USER_ID')";
                                    mysqli_query($conn, $sql_2);  

                       


                      if ($conn->query($sql) === TRUE) {  

                            echo '<script type="text/javascript">alert("ดำเนินการอนุมัตโพสต์เรียบร้อยแล้ว");</script>';
                            echo("<script> top.location.href='../?page=upload_file_excel_check&p=double&page_no=1'</script>"); 
                      } else {
                     
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;   
                      }

         }

 
?>


 
  