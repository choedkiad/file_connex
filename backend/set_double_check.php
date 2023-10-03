 
<meta http-equiv="refresh" content="5;url=https://connex.in.th/backend/set_double_check.php">   


<?php


$servername = "localhost";
$username = "sirivala_connex1";
$password = "fORnIOTKuc";
$dbname = "sirivala_connex1";  
 
$date=date("Y-m-d H:i:s");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

date_default_timezone_set('Asia/Bangkok');

    $list_no=0;


    $sql="SELECT * FROM dbo_data_excel_listing where ex_list_close!='1' and  check_project!='70' order by ex_list_listing_code  ASC  "; 
    $result=$conn->query($sql); 
    while($rs=$result->fetch_assoc()){   $list_no++;
       

       if($list_no<=50){   //list_no 
                    
                    $project=$rs['project_id'];

                    $id=$rs['ex_list_listing_code'];
                    $ex_list_price=$rs['ex_list_price'];
                    $ex_list_house_number=$rs['ex_list_house_number'];
                    $ex_list_contact_tel=$rs['ex_list_contact_tel'];
                    $ex_list_contact_tel1_2=$rs['ex_list_contact_tel1_2'];
                    $ex_list_contact_tel1_3=$rs['ex_list_contact_tel1_3'];
                    $ex_list_contact_tel1_4=$rs['ex_list_contact_tel1_4'];
                    $ex_list_contact_tel_2=$rs['ex_list_contact_tel_2'];
                    $ex_list_contact_tel2_2=$rs['ex_list_contact_tel2_2'];
                    $ex_list_contact_tel2_3=$rs['ex_list_contact_tel2_3'];
                    $ex_list_contact_tel2_4=$rs['ex_list_contact_tel2_4']; 
                    $ex_list_bedroom=$rs['ex_list_bedroom']; 
                    $ex_list_deal_type=$rs['ex_list_deal_type']; 
                    $ex_list_sqm=$rs['ex_list_sqm']; 
                    $ex_list_floor=$rs['ex_list_floor'];  

                    $check_list_price=$ex_list_price;
                    $check_list_house_number=$ex_list_house_number; 
                    $check_list_contact_tel=$ex_list_contact_tel;
                    $check_list_contact_tel1_2=$ex_list_contact_tel1_2;
                    $check_list_contact_tel1_3=$ex_list_contact_tel1_3;
                    $check_list_contact_tel1_4=$ex_list_contact_tel1_4;
                    $check_list_contact_tel_2=$ex_list_contact_tel_2;
                    $check_list_contact_tel2_2=$ex_list_contact_tel2_2;
                    $check_list_contact_tel2_3=$ex_list_contact_tel2_3;
                    $check_list_contact_tel2_4=$ex_list_contact_tel2_4;
                    $check_list_bedroom=$ex_list_bedroom; 
                    $check_list_deal_type=$ex_list_deal_type;
                    $check_list_sqm=$ex_list_sqm;
       
                    $floor=$ex_list_floor;
             
                   $per_sqm=$check_list_sqm*5/100;
                   $per_1=$check_list_sqm+$per_sqm;
                   $per_2=$check_list_sqm-$per_sqm;
                   
                   $check_list_house_number = str_replace(" ","",$check_list_house_number,$count1);  
               
                    $check_n_r=strpos($check_list_house_number,"/");

                    $number_r_1=substr($check_list_house_number,0 , $check_n_r);
                    $number_r_2=substr($check_list_house_number,$check_n_r ,15 );

                    $number_r_2=str_replace(" ","",$number_r_2,$count); 








         $sql_data_check="SELECT * FROM dbo_data_excel_listing where  project_id='$project' and ex_list_deal_type='$check_list_deal_type' and ex_list_listing_code!='$id'  "; 
         $result_data_check=$conn->query($sql_data_check); 

         $num=$result_data_check->num_rows;
 
         $no=0;
        
           if($result_data_check->num_rows > 0) {    //L2
                


		 	    while($rs_listing=$result_data_check->fetch_assoc()){   $no++;  //L3
  
			                   $ex_list_floor=$rs_listing['ex_list_floor'];
			                   $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
			                   $ex_list_sqm=$rs_listing['ex_list_sqm'];
			                   $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
			                   $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
			                   $ex_list_contact_tel1_2=$rs_listing['ex_list_contact_tel1_2'];
			                   $ex_list_contact_tel1_3=$rs_listing['ex_list_contact_tel1_3'];
			                   $ex_list_contact_tel1_4=$rs_listing['ex_list_contact_tel1_4'];
			                   $ex_list_contact_tel_2=$rs_listing['ex_list_contact_tel_2'];
			                   $ex_list_contact_tel2_2=$rs_listing['ex_list_contact_tel2_2'];
			                   $ex_list_contact_tel2_3=$rs_listing['ex_list_contact_tel2_3'];
			                   $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4'];     
			                   $ex_list_deal_type=$rs_listing['ex_list_deal_type'];  
			                   $ex_list_listing_status=$rs_listing['ex_list_listing_status'];  
			                   $ex_list_price=$rs_listing['ex_list_price']; 

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
			                   $ex_list_zone=$rs_listing['ex_list_zone'];
			                   $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
			                   $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
			                   $project_id=$rs_listing['project_id'];
			                   $ex_list_date_update=$rs_listing['ex_list_date_update'];


			                   $ex_list_contact_tel_show=$ex_list_contact_tel;




					         if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status";  }
					         else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
					         else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
					         else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; $stauts_list_color="#ff0000"; }
					         else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
					         else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
					            
					          if($ex_list_price!=''){ $ex_list_price=number_format($ex_list_price);}else{$ex_list_price="ยังไม่ระบุราคา";}


					          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

					          if($ex_list_sqm!='' or $ex_list_sqm=='0'){  $ex_list_sqm=$ex_list_sqm."ตร.ม."; }
					        
					          if($ex_list_bedroom>0){$ex_list_bedroom_c=$ex_list_bedroom."bed";}else{ $ex_list_bedroom_c=$ex_list_bedroom; }
					          if($ex_list_bathroom>0){$ex_list_bathroom_c=$ex_list_bathroom."bath";}else{ $ex_list_bathroom_c=$ex_list_bathroom; }

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
					             $project_nearby_places=$rs_project['project_nearby_places'];
					             $project_zone=$rs_project['project_zone'];        



					        if($project_id!=''){ 

					               $ex_list_project=$rs_project['project_name']." | ".$rs_project['project_name_en'];
					      /////////// End type_project ////////////////

					               $ex_list_listing_type=$project_type; 

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
					  
					             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
					      /////////// End type_train_station ////////////////
					 
					      //////////////    ////////////////////////////
					             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact' ";  
					             $result_register= $conn->query($sql_register);
					             $rs_register=$result_register->fetch_assoc(); 

					             $ex_list_contact=$rs_register['register_name']." | ".$rs_register['register_email'];

					         }              
					                      $ex_list_house_number = str_replace(" ","",$ex_list_house_number,$count2);  

					                       $house_number_n_r=strpos($ex_list_house_number,"/");

					                        if($ex_list_house_number!=''){
					                           $house_number_r_1=substr($ex_list_house_number,0 , $house_number_n_r);
					                           $house_number_r_2=substr($ex_list_house_number,$house_number_n_r+1 ,15);

					                           $house_number_r_2 = str_replace(" ","",$house_number_r_2,$count3);  

					                        }
					                        $ex_list_sqm=$rs_listing['ex_list_sqm'];



  

                      if($house_number_r_2==$number_r_2 and  $check_list_house_number!='' and $check_list_house_number!='-' and  $check_list_house_number!='_'){  //L4

                           if( $check_list_contact_tel==$ex_list_contact_tel and $check_list_contact_tel!='' 
                              or $check_list_contact_tel==$ex_list_contact_tel1_2 and $check_list_contact_tel!='' 
                              or $check_list_contact_tel==$ex_list_contact_tel1_3 and $check_list_contact_tel!='' 
                              or $check_list_contact_tel==$ex_list_contact_tel1_4 and $check_list_contact_tel!='' 
                              or $check_list_contact_tel==$ex_list_contact_tel_2 and $check_list_contact_tel!=''
                              or $check_list_contact_tel==$ex_list_contact_tel2_2 and $check_list_contact_tel!=''
                              or $check_list_contact_tel==$ex_list_contact_tel2_3 and $check_list_contact_tel!=''
                              or $check_list_contact_tel==$ex_list_contact_tel2_4 and $check_list_contact_tel!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel1_2  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel1_3  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel1_4  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel_2  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_2  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_3  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_4  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel_2  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_2  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_3  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_2==$ex_list_contact_tel2_4  and $check_list_contact_tel1_2!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel1_2  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel1_3  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel1_4  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel_2  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel2_2  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel2_3  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_3==$ex_list_contact_tel2_4  and $check_list_contact_tel1_3!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel1_2  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel1_3  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel1_4  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel_2  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel2_2  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel2_3  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel1_4==$ex_list_contact_tel2_4  and $check_list_contact_tel1_4!=''
                              or $check_list_contact_tel_2==$ex_list_contact_tel1_2 and $check_list_contact_tel_2!='' 
                              or $check_list_contact_tel_2==$ex_list_contact_tel1_2 and $check_list_contact_tel_2!='' 
                              or $check_list_contact_tel_2==$ex_list_contact_tel1_3 and $check_list_contact_tel_2!='' 
                              or $check_list_contact_tel_2==$ex_list_contact_tel1_4 and $check_list_contact_tel_2!='' 
                              or $check_list_contact_tel_2==$ex_list_contact_tel_2 and $check_list_contact_tel_2!=''
                              or $check_list_contact_tel_2==$ex_list_contact_tel2_2 and $check_list_contact_tel_2!=''
                              or $check_list_contact_tel_2==$ex_list_contact_tel2_3 and $check_list_contact_tel_2!=''
                              or $check_list_contact_tel_2==$ex_list_contact_tel2_4 and $check_list_contact_tel_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel1_2  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel1_3  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel1_4  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel_2  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel2_2  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel2_3  and $check_list_contact_tel2_2!=''
                              or $check_list_contact_tel2_2==$ex_list_contact_tel2_4  and $check_list_contact_tel2_2!='' 
                              or $check_list_contact_tel2_3==$ex_list_contact_tel  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel1_2  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel1_3  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel1_4  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel_2  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel2_2  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel2_3  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_3==$ex_list_contact_tel2_4  and $check_list_contact_tel2_3!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel1_2  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel1_3  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel1_4  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel_2  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel2_2  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel2_3  and $check_list_contact_tel2_4!=''
                              or $check_list_contact_tel2_4==$ex_list_contact_tel2_4  and $check_list_contact_tel2_4!=''

                             
                            ) {  $no++;   //L5
                                      
                                 echo "1.".$house_number_r_2."/".$number_r_2;
                      ?>    
                  
                  
 
                              <center style="font-size: 25px;" ><?php echo $list_no;?> <a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_blank"><?php echo $id;?> ซ้ำ <?php echo $ex_list_listing_code;?></a> <br></center>

                            <?php
                                 
 
                                      $sql_1= "UPDATE dbo_data_excel_listing SET  
                                            ex_list_close='1',
                                            check_project='70',
                                        	ex_list_close_date='".$date."'
                                            WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                                      $conn->query($sql_1); 



                           $record_note="ทำการลบ Listing : ".$ex_list_listing_code;
                           $record_remark="ลบโดยระบบ listing ซ้ำกับ : ".$id;

 

                           $sql_2="INSERT INTO dbo_record (ex_list_id,record_note , record_date , record_user_id , record_remark)

                           VALUES ('$ex_list_listing_code' , '$record_note' , '$date' , '99' , '$record_remark')";
                           mysqli_query($conn, $sql_2);  


                            ?>



                      <?php }else if($floor==$ex_list_floor and $ex_list_bedroom==$check_list_bedroom){ $no++;    ?>
 
                              <center style="font-size: 25px;" ><?php echo $list_no;?> <a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_blank"><?php echo $id;?> ซ้ำ <?php echo $ex_list_listing_code;?></a> <br></center>


                            <?php  echo "2.".$house_number_r_2."/".$number_r_2;

                             
                                      $sql_1= "UPDATE dbo_data_excel_listing SET  
                                            ex_list_close='1',
                                            check_project='70',
                                        	ex_list_close_date='".$date."'
                                            WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                                      $conn->query($sql_1); 



                           $record_note="ทำการลบ Listing : ".$ex_list_listing_code;
                           $record_remark="ลบโดยระบบ listing ซ้ำกับ : ".$id;

 

                           $sql_2="INSERT INTO dbo_record (ex_list_id,record_note , record_date , record_user_id , record_remark)

                           VALUES ('$ex_list_listing_code' , '$record_note' , '$date' , '99' , '$record_remark')";
                           mysqli_query($conn, $sql_2);   
 
                            ?>                              

                       <?php } //L5?>
          
             <?php } else if($floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel and $check_list_contact_tel!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel1_2 and $check_list_contact_tel!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel1_3 and $check_list_contact_tel!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel1_4 and $check_list_contact_tel!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel_2 and $check_list_contact_tel!=''  and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel2_2 and $check_list_contact_tel!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel2_3 and $check_list_contact_tel!=''  and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel==$ex_list_contact_tel2_4 and $check_list_contact_tel!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel  and $check_list_contact_tel1_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel1_2  and $check_list_contact_tel1_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel1_3  and $check_list_contact_tel1_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel1_4 and $check_list_contact_tel1_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel_2  and $check_list_contact_tel1_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel2_2  and $check_list_contact_tel1_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel2_3  and $check_list_contact_tel1_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_2==$ex_list_contact_tel2_4 and $check_list_contact_tel1_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel  and $check_list_contact_tel1_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel1_2  and $check_list_contact_tel1_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel1_3  and $check_list_contact_tel1_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel1_4 and $check_list_contact_tel1_3!=''  and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel_2  and $check_list_contact_tel1_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel2_2  and $check_list_contact_tel1_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel2_3  and $check_list_contact_tel1_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_3==$ex_list_contact_tel2_4 and $check_list_contact_tel1_3!=''    and $house_number_r_2==$number_r_2 


                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel  and $check_list_contact_tel1_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel1_2  and $check_list_contact_tel1_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel1_3  and $check_list_contact_tel1_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel1_4 and $check_list_contact_tel1_4!=''  and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel_2  and $check_list_contact_tel1_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel2_2  and $check_list_contact_tel1_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel2_3  and $check_list_contact_tel1_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel1_4==$ex_list_contact_tel2_4 and $check_list_contact_tel1_4!=''  and $house_number_r_2==$number_r_2 


                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel  and $check_list_contact_tel_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel1_2  and $check_list_contact_tel_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel1_3  and $check_list_contact_tel_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel1_4 and $check_list_contact_tel_2!=''  and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel_2  and $check_list_contact_tel_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel2_2  and $check_list_contact_tel_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel2_3  and $check_list_contact_tel_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel_2==$ex_list_contact_tel2_4 and $check_list_contact_tel_2!='' and $house_number_r_2==$number_r_2 


                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel  and $check_list_contact_tel2_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel1_2  and $check_list_contact_tel2_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel1_3  and $check_list_contact_tel2_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel1_4 and $check_list_contact_tel2_2!=''  and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel_2  and $check_list_contact_tel2_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel2_2  and $check_list_contact_tel2_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel2_3  and $check_list_contact_tel2_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_2==$ex_list_contact_tel2_4 and $check_list_contact_tel2_2!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel  and $check_list_contact_tel2_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel1_2  and $check_list_contact_tel2_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel1_3  and $check_list_contact_tel2_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel1_4 and $check_list_contact_tel2_2!=''  and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel_2  and $check_list_contact_tel2_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel2_2  and $check_list_contact_tel2_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel2_3  and $check_list_contact_tel2_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_3==$ex_list_contact_tel2_4 and $check_list_contact_tel2_3!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel  and $check_list_contact_tel2_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel1_2  and $check_list_contact_tel2_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel1_3  and $check_list_contact_tel2_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel1_4 and $check_list_contact_tel2_4!=''  and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel_2  and $check_list_contact_tel2_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel2_2  and $check_list_contact_tel2_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel2_3  and $check_list_contact_tel2_4!='' and $house_number_r_2==$number_r_2 

                             or $floor==$ex_list_floor and $ex_list_sqm>$per_2 and  $ex_list_sqm<$per_1 and 
                                $check_list_contact_tel2_4==$ex_list_contact_tel2_4 and $check_list_contact_tel2_4!=''  and $house_number_r_2==$number_r_2 

                            ){  $no++;   //L4 

 	                        echo "3.".$house_number_r_2."/".$number_r_2;
      ?>
                              <center style="font-size: 25px;" ><?php echo $list_no;?> <a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_blank"><?php echo $id;?> ซ้ำ <?php echo $ex_list_listing_code;?></a> <br></center>


                            <?php  
                                      $sql_1= "UPDATE dbo_data_excel_listing SET  
                                            ex_list_close='1',
                                            check_project='70',
                                        	ex_list_close_date='".$date."'
                                            WHERE ex_list_listing_code='".$ex_list_listing_code."'";
                                      $conn->query($sql_1); 

 
                           $record_note="ทำการลบ Listing : ".$ex_list_listing_code;
                           $record_remark="ลบโดยระบบ listing ซ้ำกับ : ".$id; 
 

                           $sql_2="INSERT INTO dbo_record (ex_list_id,record_note , record_date , record_user_id , record_remark)

                           VALUES ('$ex_list_listing_code' , '$record_note' , '$date' , '99' , '$record_remark')";
                           mysqli_query($conn, $sql_2);  
 
                            ?> 

            <?php }   
                  
             }// END L3
         ?>


           <?php if($num==$no){ ?>

 
                <h6 class="card-title" style="font-size: 25px;" ><center><?php echo $list_no;?> ไม่พบ Listing ซ้ำกำลังดำเนินการบันทึกข้อมูล  <?php echo $id;?> <br></center> </h6>
   

            <?php } ?>

  
               

<?php    }else{  //L2  ?>

 
                <h6 class="card-title" style="font-size: 25px;" ><center><?php echo $list_no;?> ไม่พบ Listing ซ้ำกำลังดำเนินการบันทึกข้อมูล <?php echo $id;?> <br></center> </h6>
  

<?php    } // END L2 
                  
                                 
                             $sql_s= "UPDATE dbo_data_excel_listing SET  
                                      check_project='70' 
                                      WHERE ex_list_listing_code='".$id."'";
                             $conn->query($sql_s);  


      }  //END //list_no 
 
			    
  }


?>