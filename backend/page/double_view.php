

<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 

         $id=$_GET['id'];
         $today=date("Y-m-d H:i:s");
         $double=$_GET['double'];
         $USER_ID=$_SESSION['USER_ID'];


         if($id!=''){
         


?>

   <!-- daterange picker -->
  <link rel="stylesheet" href="../template/plugins/daterangepicker/daterangepicker.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../template/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="../template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../template/plugins/ekko-lightbox/ekko-lightbox.css">




    <!-- Main content -->
    <div class="content" style="padding: 10px;">

	               <div class="card-header"> 
	                  <h5 class="card-title" >โพสต์ที่คาดว่าจะซ้ำ</h5>
	                </div>   
		                <table class="table table-bordered table-hover">
		                  <thead>
		                    <tr style="font-size: 14px;">
		                      <th>No</th>
		                      <th>IMG</th>
		                      <th>ผู้เพิ่มข้อมูล</th>
		                      <th>วันที่เพิ่มข้อมูล</th>
		                      <th>Status</th>
		                      <th>Type</th>
		                      <th>Deal</th>
		                      <th>Project</th>
		                      <th>House No.</th>
		                      <th>Room</th> 
		                      <th>ชั้น </th>  
		                      <th>พื้นที่ใช้ </th>  
		                      <th>Price</th>
		                      <th>Owner</th> 
		                        
		                    </tr>
		                  </thead>
		       

<?php
				          $sql_data_check="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id'   "; 
				          $result_data_check=$conn->query($sql_data_check); 

				          $num=$result_data_check->num_rows;
				 
				           $no=0;
				        
				           if($result_data_check->num_rows > 0) {    //L2
                              
                            $rs_listing=$result_data_check->fetch_assoc();


				       
				                   $ex_list_house_number=$rs_listing['ex_list_house_number'];
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
				                   $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
				                   $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
				                   $ex_list_rent_till_date=$rs_listing['ex_list_rent_till'];
				                   $project_id=$rs_listing['project_id'];
				                   $ex_list_date_update=$rs_listing['ex_list_date_update'];
				                   $ex_list_date_create=$rs_listing['ex_list_date_create'];
				                   $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
				                   $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en'];                  

				  
				                   $ex_list_contact_tel_show=$ex_list_contact_tel." ,".$ex_list_contact_tel1_2." ,".$ex_list_contact_tel1_3." ,".$ex_list_contact_tel1_4." ,".$ex_list_contact_tel_2." ,".$ex_list_contact_tel2_2." ,".$ex_list_contact_tel2_3." ,".$ex_list_contact_tel2_4." ,";



				/*

				    if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' 
				      or $_SESSION['STATUS_ID']==$ex_list_contact ){   
				         if($ex_list_contact_name!=''){ $ex_list_contact_name="Owner Name : ".$ex_list_contact_name." Tel : ".$ex_list_contact_tel;}
				     }else{ $ex_list_contact_name="-"; }  */
				         
			
				            
				          if($ex_list_price!=''){ $ex_list_price=number_format($ex_list_price);}else{$ex_list_price="ยังไม่ระบุราคา";}


				          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

				          if($ex_list_sqm!='' or $ex_list_sqm=='0'){  $ex_list_sqm=$ex_list_sqm."ตร.ม."; }
				        
				          if($ex_list_bedroom>0){$ex_list_bedroom_c=$ex_list_bedroom."bed";}else{ $ex_list_bedroom_c=$ex_list_bedroom; }
				          if($ex_list_bathroom>0){$ex_list_bathroom_c=$ex_list_bathroom."bath";}else{ $ex_list_bathroom_c=$ex_list_bathroom; }

				      /////////// type_project ////////////////
				             $sql_project="SELECT project_name ,project_id, project_name_en , project_type FROM type_project where project_id='$project_id' ";  
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
  

				      /////////// type_train_station ////////////////
				             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
				             $result_train= $conn->query($sql_train);
				             $rs_train=$result_train->fetch_assoc(); 

				             $station_name=$rs_train['station_train'];
				             $station_name_en=$rs_train['station_name_en'];
				  
				             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
				      /////////// End type_train_station ////////////////
				  
				         }else{

				               $ex_list_project=$ex_list_listing_name." | ".$ex_list_listing_name_en;

				         }        


				      /////////// type_asset ////////////////
				             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
				             $result_ass= $conn->query($sql_ass);
				             $rs_ass=$result_ass->fetch_assoc();

				             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];}
				      ////////// End type_asset ////////////////

				      //////////////    ////////////////////////////
				             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact' ";  
				             $result_register= $conn->query($sql_register);
				             $rs_register=$result_register->fetch_assoc(); 

				             $ex_list_contact=$rs_register['register_name'];     


              $sql_list_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no ASC";
              $result_list_img = $conn->query($sql_list_img);  
              $rs_list_img=$result_list_img->fetch_assoc(); 

                 $listing_img_folder=$rs_list_img['listing_img_folder'];
                 $listing_img_name=$rs_list_img['listing_img_name'];

              if($listing_img_name!=''){

                 if($listing_img_folder!=''){   
                       $listing_img_name=$listing_img_folder.$listing_img_name;
                 }else{   
                       $listing_img_name="../../images/listing/".$ex_list_listing_code."/".$listing_img_name;  
                 }
              }else{
                      $listing_img_name="../../images/noimages.jpg";  

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

				$year=substr($ex_list_date_create,0 , 4 );
				$month=substr($ex_list_date_create,5 , 2 );
				$day=substr($ex_list_date_create,8 , 2 );

				$time=substr($ex_list_date_create,11 , 5 );
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

				 $ex_list_date_create=$day." ".$month." ".$year." ".$time;


          ?>


		                  <tbody> 

                                      <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px;">                  
                                           <td><center style="width: 50px;"><a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_blank"><?php echo $ex_list_listing_code;?></a></center></td>
                                          <td ><img src="<?php echo $listing_img_name;?>" style="width: 100px;" ></td>  
                                          <td ><center style="width: 50px;"><?php echo $ex_list_contact;?></center></td>  
                                          <td ><center style="width: 80px;"><?php if($ex_list_date_create!='00 00 543 00:00'){echo $ex_list_date_create;}else{ echo "ไม่ระบุวันสร้าง";}?></center></td>  
                                          <td><center style="width: 50px; " >
                                                 
                                          <b style="color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('../page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   >

							 
							                      <?php echo $ex_list_listing_status.$expire_check;  ?>
							                       <?php if($ex_list_listing_status_check=='3'){ ?> <br><?php echo $ex_list_rent_till; } ?>
							                           </a>
							                       </b>                                  
                                          </center></td>
                                          <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                                          <td><center style="width: 30px;"><?php echo $ex_list_deal_type;?></center></td>
                                          <td > <center style="width: 150px; " ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_project;?></a></center></td> 
                                          <td><center style="width: 50px; " ><?php echo $ex_list_house_number;?></center></td>
                                          <td><?php echo $ex_list_bedroom_c. "<br/>".$ex_list_bathroom_c;?></td>
                                          <td><?php echo $ex_list_floor;?></td>
                                          <td><?php echo $ex_list_sqm;?></td>     
                                          <td>
                                            <?php echo $ex_list_price;?></td>   
                                         
                                          <td><center style="width: 100px; " ><?php echo $ex_list_contact_name." ".$ex_list_contact_tel_show;?> </center></td>                              
                                     </tr>
		                   </tbody>
                        </table>

                 <?php  }  ?>

               

	               <div class="card-header"> 
	                  <h5 class="card-title" >CX ที่ซ้ำ</h5>
	                </div>   
		                <table class="table table-bordered table-hover">
		                  <thead>
		                    <tr style="font-size: 14px;">
		                      <th>No</th>
		                      <th>IMG</th>
		                      <th>ผู้เพิ่มข้อมูล</th>
		                      <th>วันที่เพิ่มข้อมูล</th>
		                      <th>Status</th>
		                      <th>Type</th>
		                      <th>Deal</th>
		                      <th>Project</th>
		                      <th>House No.</th>
		                      <th>Room</th> 
		                      <th>ชั้น </th>  
		                      <th>พื้นที่ใช้ </th>  
		                      <th>Price</th>
		                      <th>Owner</th>  
		                               
		                    </tr>
		                  </thead>
		     


<?php
				          $sql_data_check="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$double'   "; 
				          $result_data_check=$conn->query($sql_data_check); 

				          $num=$result_data_check->num_rows;
				 
				           $no=0;
				        
				           if($result_data_check->num_rows > 0) {    //L2

                            $rs_listing=$result_data_check->fetch_assoc();


				       
				                   $ex_list_house_number=$rs_listing['ex_list_house_number'];
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
				                   $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
				                   $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
				                   $ex_list_rent_till_date=$rs_listing['ex_list_rent_till'];
				                   $project_id=$rs_listing['project_id'];
				                   $ex_list_date_update=$rs_listing['ex_list_date_update'];
				                   $ex_list_close=$rs_listing['ex_list_close'];
				                   $ex_list_date_create=$rs_listing['ex_list_date_create'];
				                   $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
				                   $ex_list_listing_name_en=$rs_listing['ex_list_listing_name_en'];
				  
				                   $ex_list_contact_tel_show=$ex_list_contact_tel." ,".$ex_list_contact_tel1_2." ,".$ex_list_contact_tel1_3." ,".$ex_list_contact_tel1_4." ,".$ex_list_contact_tel_2." ,".$ex_list_contact_tel2_2." ,".$ex_list_contact_tel2_3." ,".$ex_list_contact_tel2_4." ,";



				/*

				    if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' 
				      or $_SESSION['STATUS_ID']==$ex_list_contact ){   
				         if($ex_list_contact_name!=''){ $ex_list_contact_name="Owner Name : ".$ex_list_contact_name." Tel : ".$ex_list_contact_tel;}
				     }else{ $ex_list_contact_name="-"; }  */
				         
					            
				          if($ex_list_price!=''){ $ex_list_price=number_format($ex_list_price);}else{$ex_list_price="ยังไม่ระบุราคา";}


				          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

				          if($ex_list_sqm!='' or $ex_list_sqm=='0'){  $ex_list_sqm=$ex_list_sqm."ตร.ม."; }
				        
				          if($ex_list_bedroom>0){$ex_list_bedroom_c=$ex_list_bedroom."bed";}else{ $ex_list_bedroom_c=$ex_list_bedroom; }
				          if($ex_list_bathroom>0){$ex_list_bathroom_c=$ex_list_bathroom."bath";}else{ $ex_list_bathroom_c=$ex_list_bathroom; }

				      /////////// type_project ////////////////
				             $sql_project="SELECT project_name ,project_id, project_name_en , project_type FROM type_project where project_id='$project_id' ";  
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
  


				      /////////// type_train_station ////////////////
				             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
				             $result_train= $conn->query($sql_train);
				             $rs_train=$result_train->fetch_assoc(); 

				             $station_name=$rs_train['station_train'];
				             $station_name_en=$rs_train['station_name_en'];
				  
				             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
				      /////////// End type_train_station ////////////////
				 

				         }else{

				               $ex_list_project=$ex_list_listing_name." | ".$ex_list_listing_name_en;

				         }      

				      /////////// type_asset ////////////////
				             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
				             $result_ass= $conn->query($sql_ass);
				             $rs_ass=$result_ass->fetch_assoc();

				             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];}
				      ////////// End type_asset ////////////////


				      //////////////    ////////////////////////////
				             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact' ";  
				             $result_register= $conn->query($sql_register);
				             $rs_register=$result_register->fetch_assoc(); 

				             $ex_list_contact=$rs_register['register_name'];


              $sql_list_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$double' order by listing_img_no ASC";
              $result_list_img = $conn->query($sql_list_img);  
              $rs_list_img=$result_list_img->fetch_assoc(); 

                 $listing_img_folder=$rs_list_img['listing_img_folder'];
                 $listing_img_name=$rs_list_img['listing_img_name'];

              if($listing_img_name!=''){

                 if($listing_img_folder!=''){   
                       $listing_img_name=$listing_img_folder.$listing_img_name;
                 }else{   
                       $listing_img_name="../../images/listing/".$ex_list_listing_code."/".$listing_img_name;  
                 }
              }else{
                      $listing_img_name="../../images/noimages.jpg";  

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


				$year=substr($ex_list_date_create,0 , 4 );
				$month=substr($ex_list_date_create,5 , 2 );
				$day=substr($ex_list_date_create,8 , 2 );

				$time=substr($ex_list_date_create,11 , 5 );
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

				 $ex_list_date_create=$day." ".$month." ".$year." ".$time;

				            ?>


		                  <tbody> 

                                      <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px; <?php if($ex_list_close=='1'){ echo "text-decoration: line-through;";}?>" >                  
                                           <td><center style="width: 50px;"><a href="../?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_blank"><?php echo $ex_list_listing_code;?></a>
                                           <?php if($ex_list_close=='1'){?><span class="badge badge-danger">Delete</span> <?php } ?>
                                           </center></td>                                           
                                          <td ><img src="<?php echo $listing_img_name;?>" style="width: 100px;" ></td>  
                                          <td ><center style="width: 50px;"><?php echo $ex_list_contact;?></center></td>  
                                          <td ><center style="width: 80px;"><?php if($ex_list_date_create!='00 00 543 00:00'){echo $ex_list_date_create;}else{ echo "ไม่ระบุวันสร้าง";}?></center></td>  
                                          <td><center style="width: 50px; " >
                                                 
                                          <b style="color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('../page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   >

							 
							                      <?php echo $ex_list_listing_status.$expire_check;  ?>
							                       <?php if($ex_list_listing_status_check=='3'){ ?> <br><?php echo $ex_list_rent_till; } ?>
							                           </a>
							                       </b>                                  
                                          </center></td>
                                          <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                                          <td><center style="width: 30px;"><?php echo $ex_list_deal_type;?></center></td>
                                          <td > <center style="width: 150px; " ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_project;?></a></center></td> 
                                          <td><center style="width: 50px; " ><?php echo $ex_list_house_number;?></center></td>
                                          <td><?php echo $ex_list_bedroom_c. "<br/>".$ex_list_bathroom_c;?></td>
                                          <td><?php echo $ex_list_floor;?></td>
                                          <td><?php echo $ex_list_sqm;?></td>     
                                          <td><a onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
                                            <?php echo $ex_list_price;?></a></td>   
                                         
                                          <td><center style="width: 100px; " ><?php echo $ex_list_contact_name." ".$ex_list_contact_tel_show;?> </center></td>                              
                                     </tr>
		                   </tbody>
                        </table>

                 <?php  }  ?>


 
    </div>


  <?php } ?>










   <script type="text/javascript">

        $("#p_ex_list_rent_till").hide();.
        

$(document).ready(function(){
 

$("#ex_list_listing_status").change(function(){
      var ex_list_listing_type = $("#ex_list_listing_status").val();
 
      if(ex_list_listing_type == "3"){

        $("#p_ex_list_rent_till").show();
 
          document.getElementById("ex_list_rent_till").disabled = false;
        //$("#txt_box").val("");
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */
      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */
        $("#p_ex_list_rent_till").hide();
      }
    });

    </script>




  
<script src="../template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../template/plugins/moment/moment.min.js"></script>
<script src="../template/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../template/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../template/dist/js/adminlte.min.js"></script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>