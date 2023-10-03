 
 <?php


$servername = "localhost";
$username = "sirivala_connex1";
$password = "fORnIOTKuc";
$dbname = "sirivala_connex1";  

 
 isset( $_SESSION['USER_ID'] ) ? $USER_ID = $_SESSION['USER_ID'] : $USER_ID = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


?>

<style>
table, th, td {
  border: 1px solid;
  padding: 5px;
  text-align: center;
}
</style>
         
         <table style="border-style: solid;">
                  <tr   >
                    <th>#</th>                        
                    <th>Status</th>
                    <th>Note เช่า</th>
                    <th>Type</th>
                    <th>Deal</th>
                    <th>Project TH</th>   
                    <th>Project EN</th>                  
                    <th>House No.</th>
                    <th>ซอย</th>
                    <th>ตำบล</th>
                    <th>อำเภท</th>
                    <th>จังหวัด</th>
                    <th>Floor</th>              
                    <th>ห้องนอน</th>  
                    <th>ห้องน้ำ</th> 
                    <th>พื้นที่ (ตร.ม.) </th>  
                    <th>ไร่ </th>  
                    <th>งาน </th>  
                    <th>วา </th> 
                    <th>ที่จอดรถ </th> 
                    <th>เฟอร์นิเจอร์ </th> 
                    <th>Price</th>
                    <th>BTS</th> 
                    <th>Owner1</th> 
                    <th>เบอร์โทร1</th> 
                    <th>เบอร์โทร2</th> 
                    <th>เบอร์โทร3</th>  
                    <th>เบอร์โทร4</th> 
                    <th>LINE </th>  
                    <th>E-MAIL </th>   
                    <th>whatsapp</th> 
                    <th>fb </th>     
                    <th>Owner2</th> 
                    <th>เบอร์โทร1</th> 
                    <th>เบอร์โทร2</th> 
                    <th>เบอร์โทร3</th>  
                    <th>เบอร์โทร4</th>
                    <th>LINE2 </th>  
                    <th>E-MAIL2 </th>  
                    <th>whatsapp</th> 
                    <th>fb </th>    
                    <th>remark </th>      
                    <th>Approve</th>
                    <th>Update</th>
                    
                    <!--
                    <th>ภาพประกอบ</th>
                    <th>พื้นที่ดิน</th>
                    <th>MAP</th>
                    <th>Contactติดต่อ</th>
                    <th>ทิศ</th> -->
                 
                  </tr>

           

<?php
 
  
  
     $sql_data_check="SELECT * FROM dbo_data_excel_listing as listing
                       LEFT JOIN type_project AS pj  On listing.project_id=pj.project_id  
                where  listing.ex_list_close='0' order by  listing.ex_list_listing_code ASC   "; 
     $result_data_check=$conn->query($sql_data_check); 

     $num=$result_data_check->num_rows;

     $no=0;  $no1=0;
     
 
           if($result_data_check->num_rows > 0) {   

                while($rs_listing=$result_data_check->fetch_assoc()){ $no++;  


         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
         $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
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
         $ex_list_contact_check=$rs_listing['ex_list_contact'];
         $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
         $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
         $ex_list_contact_tel1_2=$rs_listing['ex_list_contact_tel1_2'];
         $ex_list_contact_tel1_3=$rs_listing['ex_list_contact_tel1_3'];
         $ex_list_contact_tel1_4=$rs_listing['ex_list_contact_tel1_4'];
         $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
         $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
         $ex_list_contact_name_2=$rs_listing['ex_list_contact_name_2'];
         $ex_list_contact_tel_2=$rs_listing['ex_list_contact_tel_2'];
         $ex_list_contact_tel2_2=$rs_listing['ex_list_contact_tel2_2'];
         $ex_list_contact_tel2_3=$rs_listing['ex_list_contact_tel2_3'];
         $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4'];
         $ex_list_contact_email_2=$rs_listing['ex_list_contact_email_2'];
         $ex_list_contact_lineid_2=$rs_listing['ex_list_contact_lineid_2'];
         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_location_en=$rs_listing['ex_list_location_en'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
         $project_id=$rs_listing['project_id'];
         $ex_list_date_update=$rs_listing['ex_list_date_update'];
         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];
         $ex_list_proppit=$rs_listing['ex_list_proppit'];
         $ex_list_owner_tel=$rs_listing['ex_list_owner_tel'];
         $ex_list_checkpost=$rs_listing['ex_list_checkpost'];
         $ex_list_living=$rs_listing['ex_list_living'];
         $ex_list_close=$rs_listing['ex_list_close'];
         $ex_list_double_cx=$rs_listing['ex_list_double_cx'];


                           if($ex_list_deal_type=='1'){
                                $ex_list_deal_type='ขาย';
                           }else{
                                $ex_list_deal_type='เช่า';
                           }


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


          if($ex_list_price!=''){ $ex_list_price=number_format($ex_list_price);}else{$ex_list_price="ยังไม่ระบุ";}


          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

          if($ex_list_sqm!='' or $ex_list_sqm=='0'){  $ex_list_sqm=$ex_list_sqm; }
        

         $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
         $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";



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
             $zone_id=$rs_listing['zone_id'];

             if($zone_id!='') {
                  $ex_list_zone=$zone_id;
             } 

             if($zone_id=='0'){  $ex_list_zone="ไม่ระบุโซน"; }

         
             if($ex_list_listing_type!='' or $ex_list_listing_type!='0'){

                   $ex_list_listing_type=$project_type;
             }


        if($project_id!=''){ 

              /* $ex_list_project=$project_name." | ".$project_name_en;*/
               $ex_list_project=$project_name_en;
      /////////// End type_project ////////////////
 
        }else{
            
            if($ex_list_listing_name!='') {

                 $ex_list_project=$project_name;
                 $project_name_en=$project_name_en;
            }else{
                 $ex_list_project="ไม่ระบุโครงการ";
            }

        } 

     /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////

         if($project_train_station!=''  ){    
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

         
               
         }else{
             $sql_train="SELECT * FROM type_train_station where station_id='$ex_list_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc();           
         }

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
            /* if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}*/
            if($station_name!=''){ $ex_list_train_station=$rs_train['station_train'];} else{  $ex_list_train_station='';}


      /////////// End type_train_station ////////////////


      /////////// type_zone ////////////////
             $sql_zone="SELECT * FROM type_zone where zone_id='$zone_id' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc();

             $zone_name=$rs_zone['zone_name'];
             $zone_name_en=$rs_zone['zone_name_en'];


             if($zone_name!=''){ $ex_list_zone=$zone_name;    $ex_list_zone_en=$zone_name_en;    }




                     ?>  
        

                            <th>#</th>                        
                    <th>Status</th>
                    <th>วันที่เช่า</th>
                    <th>Note เช่า</th>
                    <th>Type</th>
                    <th>Deal</th>
                    <th>Project TH</th>   
                    <th>Project EN</th>                  
                    <th>House No.</th>
                    <th>ซอย</th>
                    <th>ตำบล</th>
                    <th>อำเภท</th>
                    <th>จังหวัด</th>
                    <th>Floor</th>              
                    <th>ห้องนอน</th>  
                    <th>ห้องน้ำ</th> 
                    <th>พื้นที่ (ตร.ม.) </th>  
                    <th>ไร่ </th>  
                    <th>งาน </th>  
                    <th>วา </th> 
                    <th>ที่จอดรถ </th> 
                    <th>เฟอร์นิเจอร์ </th> 
                    <th>Price</th>
                    <th>BTS</th> 
                    <th>Owner1</th> 
                    <th>เบอร์โทร1</th> 
                    <th>เบอร์โทร2</th> 
                    <th>เบอร์โทร3</th>  
                    <th>เบอร์โทร4</th> 
                    <th>LINE </th>  
                    <th>E-MAIL </th>   
                    <th>whatsapp</th> 
                    <th>fb </th>     
                    <th>Owner2</th> 
                    <th>เบอร์โทร1</th> 
                    <th>เบอร์โทร2</th> 
                    <th>เบอร์โทร3</th>  
                    <th>เบอร์โทร4</th>
                    <th>LINE2 </th>  
                    <th>E-MAIL2 </th>  
                    <th>whatsapp</th> 
                    <th>fb </th>    
                    <th>remark </th>  
                    <th>Zone </th>      
                    <th>Approve</th>
                    <th>Update</th>
                                 <tr>
                                     <td><?php echo $ex_list_listing_code;?></td> <!-- #  -- >
                                     <td><?php echo $ex_list_listing_status;?></td>    <!-- # Status -- >
                                     <td> <?php if($ex_list_listing_status_check=='3'){ ?> <br><?php echo $ex_list_rent_till; } ?></td>  <!-- # วันที่เช่า -- >
                                     <td> <?php echo $ex_list_rent_till_note; ?></td>  <!-- # Note เช่า -- >
                                     <td><?php echo $ex_list_listing_type;?></td>     <!-- # Type-- >                                 
                                     <td><?php echo $ex_list_deal_type;?></td>   <!-- # Deal-- >        
                                     <td><?php echo $ex_list_project;?></td>   <!-- Project TH-- >    
                                     <td><?php echo $project_name_en;?></td>   <!-- Project EN -- >                               
                                     <td><?php echo $ex_list_house_number;?></td> <!-- House No.-- >      
                                     <td><?php echo $ex_list_alley;?></td> <!-- ซอย-- > 
                                     <td><?php echo $ex_list_alley;?></td> <!-- ตำบล-- >   
                                     <td><?php echo $ex_list_alley;?></td> <!-- อำเภท-- >      
                                     <td><?php echo $ex_list_alley;?></td> <!-- จังหวัด-- >   
                                     <td><?php echo $ex_list_floor;?></td><!-- Floor-- >  
                                     <td><?php echo $ex_list_bedroom;?></td><!-- ห้องนอน-- >  
                                     <td><?php echo $ex_list_bathroom;?></td><!-- ห้องน้ำ-- >  
                                     <td><?php echo $ex_list_sqm;?></td><!-- พื้นที่ (ตร.ม.) -- >  
                                     <td><?php echo $ex_list_wa;?></td><!-- ไร่ -- >  
                                     <td><?php echo $ex_list_ngan;?></td><!-- งาน-- >  
                                     <td><?php echo $ex_list_rai;?></td><!-- วา -- >  
                                     <td><?php echo $ex_list_parking;?></td><!--ที่จอดรถ -- > 
                                     <td><?php echo $ex_list_parking;?></td><!--เฟอร์นิเจอร์ -- > 
                                     <td><?php echo $ex_list_price;?></td><!--Price -- >  
                                     
                                     <td><?php echo $ex_list_train_station;?></td> <!--Price -- > 
                                     <td><?php echo $ex_list_contact_name;?></td>
                                     <td><?php echo "'".$ex_list_contact_tel;?></td>
                                     <td><?php echo "'".$ex_list_contact_tel1_2;?></td>
                                     <td><?php echo "'".$ex_list_contact_tel1_3;?></td>
                                     <td><?php echo "'".$ex_list_contact_tel1_4;?></td>
                                     <td><?php echo $ex_list_contact_lineid;?></td>
                                     <td><?php echo $ex_list_contact_email;?></td>
                                     <td><?php echo $ex_list_contact_name_2;?></td>
                                     <td><?php echo "'".$ex_list_contact_tel_2;?></td>
                                     <td><?php echo "'".$ex_list_contact_tel2_2;?></td>
                                     <td><?php echo "'".$ex_list_contact_tel2_3;?></td>
                                     <td><?php echo "'".$ex_list_contact_tel2_4;?></td>
                                     <td><?php echo "'".$ex_list_contact_lineid_2;?></td>
                                     <td><?php echo "'".$ex_list_contact_email_2;?></td>
                                     <td><?php echo $ex_list_zone;?></td><!--Zone -- > 
                                     <td>                        
                                      <?php if($ex_list_public=='1'){?>
                               <span class="badge badge-success"><?php echo "Public";?></span> 
                                                       <?php }else{?>
                                <span class="badge badge-danger"><?php echo "Draft";?></span> 
                       <?php }?></td>
                                     <td><?php echo $ex_list_date_update;?></td>

                                 </tr>
                    

         <?php    
                 
              }
       }
           
       
?>


</table>