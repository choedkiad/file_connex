 <?php

 

if( $_SESSION['STATUS_ID']!='4' and $_SESSION['STATUS_ID']!='5'){
           
           echo("<script> top.location.href='./'</script>"); 

}
   

      ///////// ROW LISTING ////////////
        $sql_list_code="SELECT ex_list_id , ex_list_listing_code FROM dbo_data_excel_listing where ex_list_close='1' order by ex_list_listing_code DESC";
        $result_list_code = $conn->query($sql_list_code); 
        // output data of each row 
        $num_listing=mysqli_num_rows($result_list_code);

 


 
 
if($_GET['page_no']==''){
   echo("<script> top.location.href='?page=listing_del&p=$p&page_no=1'</script>");   
}
 $sub_text_1= substr($_SERVER['REQUEST_URI'],-9);

$page_no= substr($sub_text_1,7);  

$page_no = str_replace("=","",$page_no,$count);

//echo $page_no." ".$cate_id;


?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="#"  >
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $num_listing;?></h3>

                  <p style="margin-left: 20px;">Listing ที่ลบ </p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                
              </div>
            </a>
          </div>

 

          <div class="col-md-12">
            <!-- general form elements -->
 
              <!-- /.card-header -->
              <!-- form start -->
              <!--
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5"></div>         
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=create_listing&status=create" class="btn btn-block btn-primary btn-lg" onclick="showAndHide()" id="link_check" > เพิ่มทรัพย์ในระบบ</a>
                    </div>
                </div> 
        
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title  p-3"><?php echo $title;?></h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link <?php if($p==''){?>active<?php } ?>" href="?page=listing_del"  >Listing All</a></li>
                  <li class="nav-item"><a href="?page=listing_del&p=public" class="nav-link <?php if($p=='public'){?>active<?php } ?>"   >Listing (Public)</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p=='draft'){?>active<?php } ?>" href="?page=listing_del&p=draft"  >Listing (Draft)</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p=='premium'){?>active<?php } ?>" href="?page=listing_del&p=premium"  >Listing (Premium)</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p=='boost_post'){?>active<?php } ?>" href="?page=listing_del&p=boost_post"  >Listing (Boost Post)</a></li>
                   
                </ul>    
              </div> -->

 


 

 <style>
div.scroll {width:100%; max-height: 600px; overflow-x:auto;}
table, th , tr, td {
 
  padding-top: 2px;
  padding-bottom: 2px;
  padding-right: 3px;
  padding-left: 3px;
  border: 1px solid #000;
  font-size: 12px;
  text-align: center;

  
}
</style>


 
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
 
 <div class="scroll">
              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table   class="" style="font-size: 10px;" >
                  <thead>
                  <tr   >
          
                    <th>No</th>
                    <th>#</th>  
                    <th>ผู้ลบ</th>    
                    <th>เหตุผลในการลบ</th>                  
                    <th>Status</th>
                    <th>Type</th>
                    <th>Deal</th>
                    <th>Project</th> 
                    <th>House No.</th>
                    <th>Floor</th>
              
                    <th>Room</th>  
                    <th>พื้นที่ (ตร.ม.) </th>  
                    <th>Price</th>  
                    <th>BTS</th> 
                    <th>Zone</th>
                    <th>Image</th>
                    <th>Approve</th>
                    <th>Del</th>
                    
                    <!--
                    <th>ภาพประกอบ</th>
                    <th>พื้นที่ดิน</th>
                    <th>MAP</th>
                    <th>Contactติดต่อ</th>
                    <th>ทิศ</th> -->
                 
                  </tr>
                  </thead>
                  <tbody>
   <?php
                        // Check connection
 





     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }

     $no=0;


   if($sqm_low==''){  $sqm_low=0;  } else{}
   if($sqm_maximum==''){  $sqm_maximum=1000;  }  else{}
   if($price_low==''){  $price_low=0;  } 
   if($price_maximum==''){  $price_maximum=9999999999;  } 



if($p==''){

    if (isset($page_no) && $page_no!="" && $page_no!="l") {
    $page_no = $page_no;
    } else {
        $page_no = 1;
        }

    $total_records_per_page = 100;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 

/*
SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers
ON Orders.CustomerID=Customers.CustomerID; */



 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM dbo_data_excel_listing AS data 
                    LEFT JOIN type_project AS pj  On data.project_id=pj.project_id  
                    LEFT JOIN type_train_station AS ts On pj.project_train_station=ts.station_id 

                    where  data.ex_list_close='1'

                          ");
    

    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1
 

     $sql="SELECT data.ex_list_listing_code ,  data.ex_list_house_number , data.ex_list_listing_status ,
                  data.ex_list_rent_till, data.ex_list_listing_type , data.ex_list_zone , data.ex_list_public ,
                  data.ex_list_premium,data.ex_list_contact_name , data.ex_list_contact_name_2 , data.ex_list_contact_tel_2,data.ex_list_price, data.ex_list_contact_tel,  
                  data.ex_list_deal_type , data.ex_list_house_number , data.ex_list_bedroom ,data.ex_list_bathroom ,data.ex_list_close_date,
                  data.ex_list_sqm, data.project_id , data.ex_list_date_update , data.ex_list_floor , data.ex_list_heading , 
                  data.ex_list_heading_en , data.ex_list_contact , data.ex_list_zone ,  pj.project_id , pj.project_train_station , pj.project_name , pj.project_name_en  , pj.project_alley , pj.project_road , pj.project_type , pj.project_zone ,
                  ts.station_name,ts.station_name_en

                   FROM dbo_data_excel_listing AS data 
                    LEFT JOIN type_project AS pj  On data.project_id=pj.project_id  
                    LEFT JOIN type_train_station AS ts On pj.project_train_station=ts.station_id 

                    where  data.ex_list_close='1'


                    order by data.ex_list_close_date  DESC  ,data.ex_list_listing_code  DESC   LIMIT $offset, $total_records_per_page ";  
     $result = $conn->query($sql); 
 
}


     if($result->num_rows > 0) {
        // output data of each row
         while($rs_listing=$result->fetch_assoc()) {
         
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
         $ex_list_details=$rs_listing['ex_list_details'];
         $ex_list_heading=$rs_listing['ex_list_heading'];
         $ex_list_price=$rs_listing['ex_list_price'];
         $ex_list_common_fee=$rs_listing['ex_list_common_fee'];
         $ex_list_contact=$rs_listing['ex_list_contact'];
         $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
         $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
         $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
         $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_location_en=$rs_listing['ex_list_location_en'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
         $project_id=$rs_listing['project_id'];
         $ex_list_date_update=$rs_listing['ex_list_date_update'];
         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];

         $ex_list_close_date=$rs_listing['ex_list_close_date'];
  
  

 $year=substr($ex_list_close_date,0 , 4 );
$month=substr($ex_list_close_date,5 , 2 );
$day=substr($ex_list_close_date,8 , 2 );

$time=substr($ex_list_close_date,11 , 5 );
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
case "07" : $month="ก.ค"; break;
case "08" : $month="ส.ค."; break;
case "09" : $month="ก.ย."; break;
case "10" : $month="ต.ค."; break;
case "11" : $month="พ.ย."; break;
case "12" : $month="ธ.ค."; break;
}
 $ex_list_close_date=$day." ".$month." ".$year." ".$time;

         
    if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' 
      or $_SESSION['STATUS_ID']==$ex_list_contact ){   

         if($ex_list_contact_name!='' or $ex_list_contact_tel!=''){ $ex_list_contact_name="Owner 1 : ".$ex_list_contact_name." Tel : ".$ex_list_contact_tel." | Owner 2 : ".$ex_list_contact_name_2." Tel : ".$ex_list_contact_tel_2;}
     }else{ $ex_list_contact_name="-"; }
         
         if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status";  }
         else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
            
          if($ex_list_price!=''){ $ex_list_price=number_format($ex_list_price);}else{$ex_list_price="ยังไม่ระบุ";}


          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

          if($ex_list_sqm!='' or $ex_list_sqm=='0'){  $ex_list_sqm=$ex_list_sqm; }
        
          if($ex_list_bedroom>0){$ex_list_bedroom=$ex_list_bedroom."นอน";}else{ $ex_list_bedroom=$ex_list_bedroom; }
          if($ex_list_bathroom>0){$ex_list_bathroom=$ex_list_bathroom."น้ำ";}else{ $ex_list_bathroom=$ex_list_bathroom; }

      /////////// type_project ////////////////

          /*
             $sql_project="SELECT * FROM type_project where project_id='$project_id' ";  
             $result_project= $conn->query($sql_project);
             $rs_project=$result_project->fetch_assoc();*/

             $project_id=$rs_listing['project_id'];
             $project_type=$rs_listing['project_type'];
             $project_train_station=$rs_listing['project_train_station'];
             $project_name=$rs_listing['project_name'];
             $project_name_en=$rs_listing['project_name_en'];
             $project_alley=$rs_listing['project_alley'];
             $project_road=$rs_listing['project_road'];
             $project_subdistrict=$rs_listing['project_subdistrict'];
             $project_district=$rs_listing['project_district'];
             $project_province=$rs_listing['project_province'];
             $project_facilities=$rs_listing['project_facilities'];
             $project_nearby_places=$rs_listing['project_nearby_places'];
             $project_zone=$rs_listing['project_zone'];

             if($project_zone!='') {
                  $ex_list_zone=$project_zone;
             }

         



        if($project_id!=''){ 

              /* $ex_list_project=$project_name." | ".$project_name_en;*/
               $ex_list_project=$project_name_en;
      /////////// End type_project ////////////////

               $ex_list_listing_type=$project_type; 


      /////////// type_asset ////////////////
             $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code' ";  
             $result_img= $conn->query($sql_img);
             $rs_img=$result_img->fetch_assoc();

             
      ////////// End type_asset ////////////////


      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
            /* if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}*/
            if($station_name!=''){ $ex_list_train_station=$rs_train['station_train'];}
      /////////// End type_train_station ////////////////
  

         }


                   $record_id="";
                   $record_user_id="";
                   $record_remark="";
                   $ex_list_contact_userdel="";
             
             $check_del_note="ทำการลบ Listing :";

      ///////////   ////////////////
             $sql_record="SELECT * FROM dbo_record where  record_note LIKE '%$check_del_note%' and ex_list_id='$ex_list_listing_code' order by record_id DESC ";  
             $result_record= $conn->query($sql_record);  

             $num_record=$result_record->num_rows > 0;
             $rs_record=$result_record->fetch_assoc(); 

 

                   if($rs_record['record_id']!=''){



                   $record_user_id=$rs_record['record_user_id'];
                   $record_remark=$rs_record['record_remark'];
                              
                          //////////////    ////////////////////////////
                             $sql_register1="SELECT * FROM dbo_register where register_id='$record_user_id' ";  
                             $result_register1= $conn->query($sql_register1);
                             $rs_register1=$result_register1->fetch_assoc(); 



                             $ex_list_contact_userdel=$rs_register1['register_name']; 
                   }
      
             

               //////////////    ////////////////////////////
             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $ex_list_contact=$rs_register['register_name']." | ".$rs_register['register_email'];
 
             $no++;   

     ?> 
                  <tr style="font-size: 10px; " style="width: 100%;"  >
             
                    <td    >


                  <center style="width: 70px; " >

                    <a target="_blank" href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" title="<?php echo "UPDATEข้อมูล : ".$ex_list_date_update." | ผู้เพิ่มข้อมูล : ".$ex_list_contact;?>" >
                      <?php echo $ex_list_listing_code;?> </a>
                                            
                        
                  </center>
                  
                    </td>
                     
                    <td>
                    <center style="width: 60px; margin-top: 2px; " >
                        
                      <a href="include/process.php?page=create_listing_restore&status=del&id=<?php echo $ex_list_listing_code;?>"><img src="img/icon/restore.png" width="15" title="ยกเลิกการลบ listing นี้"  ></a>&nbsp;&nbsp;&nbsp;
                        <a href="include/process.php?page=create_listing&status=del&id=<?php echo $ex_list_listing_code;?>"><img src="img/icon/png/trash-2x.png" width="15" onclick="return confirm('คุณแน่ใจที่จะลบ Listing : <?php echo $ex_list_listing_code;?>');"  ></a>
                         &nbsp;&nbsp;&nbsp;
                         </center>
                    </td>
                    <td>
                         <center style="width: 100px; margin-top: 2px; " >
                          <?php echo $ex_list_contact_userdel;?>
                         </center>
                    </td>
                    <td>
                         <center style="width: 150px; margin-top: 2px; " >
                          <?php echo $record_remark;?>
                         </center>
                    </td>
                    <td ><center class="grab" style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"  >

 
                      <?php echo $ex_list_listing_status;?>
                        <br><?php echo $ex_list_rent_till;?>
                      </a>
                      
                    </center></td>
                     
                    <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                    <td><center style="width: 50px;"><?php echo $ex_list_deal_type;?></center></td>
                    <td > <center style="width: 200px; " class="grab" ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_project;?></a></center> 

                    </td> <!--
                    <td > <center style="width: 200px; " class="grab" ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_heading;?></a></center> 

                    </td>  -->
                    <td><center style="width: 50px; " ><?php echo $ex_list_house_number;?></center></td>
                    <td><center style="width: 50px; "><?php echo $ex_list_floor;?></center></td>
                    <td><center style="width: 100px; " ><?php echo $ex_list_bedroom." | ".$ex_list_bathroom;?></center></td>
                    <td><center style="width: 50px; " ><?php echo $ex_list_sqm;?></center></td>     
                    <td><center style="width: 80px; " ><a class="grab" onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
                      <?php echo $ex_list_price;?></a></center></td>   
                   
                    <td><center style="width: 120px; "><?php echo $ex_list_train_station;?></center></td> 
                    <td><center style="width: 320px; " ><?php echo $ex_list_zone;?></center></td> 
                    <td>
                       <?php if($rs_img['ex_list_listing_code']!=''){ ?>
                                  
                                  <img src="../../images/icon/icon-true.png" width="15" >

                       <?php }else{ ?>
                                   <img src="../../images/icon/icon-no.png" width="15" > 
                       <?php } ?>
                    </td>
                    <td><center style="width: 60px; "><?php if($ex_list_public=='1'){?>
                               <span class="badge badge-success"><?php echo "Public";?></span> 
                                                       <?php }else{?>
                                <span class="badge badge-danger"><?php echo "Draft";?></span> <?php }?><br>
 
                                  

                      </center></td> 
                    <td><center style="width: 120px;">
                       <?php if($ex_list_close_date=='00 00 543 00:00'){ echo "ยังไม่ระบุ"; }else{ echo $ex_list_close_date; }?>
                      
                       </center>

                    </td> 
 

                    <!--
                    <td>
              <?php 
 
                  $sql_list_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC";
                  $result_list_img = $conn->query($sql_list_img);  
                  $rs_list_img=$result_list_img->fetch_assoc();

                     $listing_img_folder=$rs_list_img['listing_img_folder'];
                     $listing_img_name=$rs_list_img['listing_img_name'];
                   

                     if($listing_img_folder!=''){   
                           $listing_img_name=$listing_img_folder.$listing_img_name;
                     }else if($listing_img_folder=='' and $listing_img_name!=''){   
                           $listing_img_name="../../images/listing/".$ex_list_listing_code."/".$listing_img_name;  
                     }else{ $listing_img_name="../../images/noimages.jpg"; }   

                 ?> 
                        <img src="<?php echo $listing_img_name;  ?>" style="width: 100px;" > 
                    

                     </a> 

                    </td>
                    <td><?php echo $ex_list_rai."-".$ex_list_ngan."-".$ex_list_wa." ";?></td>   
                    <td><a target="_black" href="<?php echo $rs['ex_list_googlmap'];?>"  ><img src="img/icon_googlemap.png" style="width: 10px;"></a></td>
                    <td><?php echo $ex_list_contact;?></td>
                    
                    <td><?php echo "ทิศ".$ex_list_direction;?></td> -->
                 

 
                  </tr>  
      <?php 
             }
         }  ?>

 
                  </tbody>
          
                </table>
              </div>
              <!-- /.card-body -->
   

</div>


<center>
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
 
             

 
                            <div class="card-footer clearfix" style="width: 100%;">
                                <ul class="pagination pagination-sm m-0 float-right">
                                  <!--
                                    <li class="page-item" ><a href="#" class='page-link'>Prev</a></li>-->
    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$previous_page'"; } ?> class='page-link'>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 30){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link' >$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$counter' class='page-link' >$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 30){
        
    if($page_no <= 30) {         
     for ($counter = 1; $counter < 4; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$counter' class='page-link'>$counter</a></li>";
                }
        }
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        echo "<li class='page-item'><a href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$second_last' class='page-link'>$second_last</a></li>";
        echo "<li class='page-item'><a href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$total_no_of_pages' class='page-link'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li class='page-item'><a href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=1' class='page-link'>1</a></li>";
        echo "<li class='page-item'><a href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=2' class='page-link'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='??page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$counter' class='page-link'>$counter</a></li>";
                }                  
       }
       echo "<li class='page-item'><a class='page-link'>...</a></li>";
       echo "<li class='page-item'><a href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$second_last' class='page-link' >$second_last</a></li>";
       echo "<li class='page-item'><a href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$total_no_of_pages' class='page-link' >$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li class='page-item'><a href='?&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=1' class='page-link'>1</a></li>";
        echo "<li class='page-item'><a href='?&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=2' class='page-link'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='?&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$counter' class='page-link'>$counter</a></li>";
                }                   
                }
            }
    }
?>
  <!--  
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$next_page'"; } ?> class='page-link'>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li class='page-item'><a href='?page=listing_del&search=$search&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&page_no=$total_no_of_pages' class='page-link' >Last &rsaquo;&rsaquo;</a></li>";
        } ?>-->
                                    <li class='page-item'><a href="#" class='page-link'>Next</a></li>
                                </ul>
                            </div>













             
        </div>
      </div>
    </section>








