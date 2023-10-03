   <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
   
  <link rel="stylesheet" href="template/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="template/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="template/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">

  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-12">
            <!-- general form elements -->
 
              <!-- /.card-header -->
              <!-- form start -->

            <div class="card card-primary" style="padding: 10px;">
              <div class="card-header">
                <h3 class="card-title">ค้นหา</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" id="form" enctype="multipart/form-data" action="include/process_search.php?page=upload_file_excel_check&p=<?php echo $p;?>" class=" form-inline"> 
              
              <input type="text" class="form-control" style="width: 100%;" name="p"  value="<?php echo $p;?>" hidden="hidden" >
                
              <div class="card-body">

               <div class="container-fluid">
                <div class="row">
     
 
                  <div class="col-md-3">
                     <div class="form-group">
                      <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">พื้นที่สูงสุด : </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" style="width: 100%;" name="sqm_maximum"  value="<?php echo $sqm_maximum;?>">
                        </div>
                      </div>
                  </div>
                  
 
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">ราคาต่ำสุด : </label>
                        <div class="col-sm-6">

                          <input type="text" class="form-control" style="width: 100%;" name="price_low"  value="<?php echo $price_low;?>"  >
   
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">ราคาสูงสุด : </label>
                        <div class="col-sm-6"> 

                          <input type="text" class="form-control" style="width: 100%;" name="price_maximum"  value="<?php echo $price_maximum;?>"  >
                        </div>
                      </div>
                  </div>

                  <div class="col-md-12"><br>
                     <center><button type="submit" class="btn btn-primary">Search</button>
                          <a class="btn btn-primary" href="?page=upload_file_excel_check&p=<?php echo $p;?>">clear</a>
                     </center>

                  </div>


                </div>
              </div>



                </div>
                <!-- /.card-body -->

                 
                  
                
              </form>
            </div>
            <!-- /.card -->  

<?php if($date!=''){ ?>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>


 
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
 
 
              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table id="example1" class="table table-bordered table-striped"  style="font-size: 10px;" >
                  <thead>
                  <tr   >
          
                    <th>Timestamp</th>
                    <th>Email Address</th>
                    <th>ประเภทสัญญา</th>
                    <th>รหัสสัญญา</th>
                    <th>ประเภทดีล </th>
                    <th>รหัสทรัพย์ </th>
                    <th>ประเภททรัพย์</th>  
                    <th>โครงการ </th>  
                    <th>ซอย</th>   
                    <th>ถนน</th> 
                    <th>ตำบล</th> 
                    <th>อำเภอ</th> 
                    <th>จังหวัด</th> 
                    <th>สถานีรถไฟฟ้า</th> 
                    <th>Google map link</th> 
                    <th>จำนวนอาคารในโครงการ</th> 
                    <th>ทร้พย์ตั้งอยู่ชั้นที่</th>
                    <th>วิว</th>
                    <th>จำนวนชั้นทั้งหมด</th>
                    <th>พื้นที่ดิน - ไร่</th>
                    <th>พื้นที่ดิน - งาน</th>
                    <th>พื้นที่ดิน - ตารางวา</th>
                    <th>บ้านเลขที่</th>
                    <th>พื้นที่ใช้สอย (ตรม.)</th>
                    <th>ห้องนอน</th>
                    <th>ห้องน้ำ</th>
                    <th>ห้องอื่นๆ ระบุ (ถ้ามี)</th>
                    <th>ที่จอดรถ (คัน)</th>
                    <th>เฟอร์นิเจอร์</th>
                    <th>อนุญาติให้เลี้ยงสัตว์</th>
                    <th>ทิศ</th> 
                    <th>จุดเด่น </th>
                    <th>รูปภาพ Gdrive Link</th>
                    <th>วีดีโอ Gdrive Link</th>
                    <th>สิ่งอำนวยความสะดวก (เลือกได้มากกว่า 1 ข้อ)</th>
                    <th>สถานที่ใกล้เคียง </th>
                    <th>รายละเอียดเพิ่มเติม </th>
                    <th>หัวข้อประกาศ</th>
                    <th>ราคา asking (บาท)</th>
                    <th>ค่าส่วนกลาง (บาท/ปี)</th>
                    <th>ชื่อ-สกุล</th>
                    <th>เบอร์โทร</th>
                    <th>LINE ID</th>
                    <th>Email</th>
                    <th>Remark</th>
                    <th>ทรัพย์ตั้งอยู่ที่อาคาร</th>
                    <th>โซน</th>
                    <th>คะแนนสภาพทรัพย์ </th>
                    <th>คะแนนราคาทรัพย์ </th>
                    <th>ที่ตั้ง</th>
                    <th>โครงการภาษาไทย</th>
                    <th>ผู้ติดต่อ</th>
                    <th>เบอร์โทรผู้ติดต่อ</th>
                    <th>LINE ผู้ติดต่อ</th>
                    <th>Whatsapp ผู้ติดต่อ</th>
                    <th>Project</th>
                    <th>Location area</th>
                    <th>Mass Transit</th>
                    <th>Property Type</th>
                    <th>Land area (sqm)</th>
                    <th>Facing</th>
                    <th>Nearby Facilities</th>
                    <th>Common Facilities</th>
                    <th>Additional Info</th>
                    <th>Contact Person</th>
                    <th>Heading</th>
                    <th>Listing status</th>
                    <th>Rent till</th>
                    <th>Negotiated price</th>
                    <th>Run</th> 
                  </tr>
                  </thead>
                  <tbody>
	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;

		 $sql="SELECT * FROM dbo_data_excel_listing order by ex_list_id  DESC";  
		 $result = $conn->query($sql);

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
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
         $ex_list_negotiated_price=$rs_listing['ex_list_negotiated_price'];
         $ex_list_run=$rs_listing['ex_list_run'];
         $project_id=$rs_listing['project_id'];
         $ex_list_date_update=$rs_listing['ex_list_date_update'];
         $ex_list_date_create=$rs_listing['ex_list_date_create'];
         $ex_list_location_en=$rs_listing['ex_list_location_en'];
         $ex_list_train_station_en=$rs_listing['ex_list_train_station_en'];
         $ex_list_land_area=$rs_listing['ex_list_land_area'];
         $ex_list_facing=$rs_listing['ex_list_facing'];
         $ex_list_nearby_places_en=$rs_listing['ex_list_nearby_places_en'];
         $ex_list_common_facilities=$rs_listing['ex_list_common_facilities'];
         $ex_list_heading_en=$rs_listing['ex_list_heading_en'];
         
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


          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

          if($ex_list_sqm!='' or $ex_list_sqm=='0'){  $ex_list_sqm=$ex_list_sqm."ตร.ม."; }
        
          if($ex_list_bedroom>0){$ex_list_bedroom=$ex_list_bedroom."bed";}else{ $ex_list_bedroom=$ex_list_bedroom; }
          if($ex_list_bathroom>0){$ex_list_bathroom=$ex_list_bathroom."bath";}else{ $ex_list_bathroom=$ex_list_bathroom; }

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
             $project_facilities=$rs_project['project_facilities'];
             $project_nearby_places=$rs_project['project_nearby_places'];
             $project_zone=$rs_project['project_zone'];
             $project_nearby_places_en=$rs_project['project_nearby_places_en'];
         



        if($project_id!=''){ 

               $ex_list_project=$rs_project['project_name']." | ".$rs_project['project_name_en'];
      /////////// End type_project ////////////////

               $ex_list_listing_type=$project_type; 

               $ex_list_nearby_places_en=$project_nearby_places_en;
               
               $ex_list_common_facilities=$project_facilities_en;
 

      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$project_province' "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $ex_list_province=$rs_p['provinces_in_thai'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$project_district' "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $ex_list_district=$rs_d['districts_in_thai'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$project_subdistrict' "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $ex_list_subdistrict=$rs_s['subdistricts_in_thai'];
                $zip_code=$rs_s['zip_code'];



      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];  $ex_list_type_en=$rs_ass['name_en'];  }
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];

             $ex_list_train_station_en=$station_name_en;     

             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
      /////////// End type_train_station ////////////////
 
      //////////////    ////////////////////////////
             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $ex_list_contact=$rs_register['register_name'];




         }

      /////////// //////////  ex_list_email_address  //////////////////
             $sql_re_list_email="SELECT * FROM dbo_register where register_id='$ex_list_email_address' ";  
             $result_re_list_email= $conn->query($sql_re_list_email);
             $rs_re_list_email=$result_re_list_email->fetch_assoc(); 

             $ex_list_email_address=$rs_re_list_email['register_email']; 
             $ex_list_tel=$rs_re_list_email['register_tel']; 
             $ex_list_whatsapp=$rs_re_list_email['register_whatsapp']; 
             $ex_list_line=$rs_re_list_email['register_line']; 


     /////////// //////////  ex_list_contract_type  //////////////////            

            if($ex_list_contract_type=='1'){ $ex_list_contract_type="Exclusive";}else if($ex_list_contract_type=='2'){ $ex_list_contract_type="Open"; }else if($ex_list_contract_type=='3'){ $ex_list_contract_type="No Contract"; }else{$ex_list_contract_type="ไม่ระบุ";}
     

 
        		 $no++;   




     ?> 
                  <tr style="font-size: 10px; margin: -20px; " >
             
                    <td>
                      <center style="width: 50px; " > 
                          <?php echo $ex_list_date_create;?> 
                      </center>

                    </td>
                    <td ><?php echo $ex_list_email_address;?></td>
                    <td><center style="width: 50px;"><?php echo $ex_list_contract_type;?></center></td>
                    <td> <?php echo $ex_list_contract_code;?> </td>
                    <td><center style="width: 30px;"><?php echo $ex_list_deal_type;?></center></td>
                    <td><center style="width: 30px;"><?php echo $ex_list_listing_code;?></center></td>
                    <td><center style="width: 30px;"><?php echo $ex_list_listing_type;?></center></td>
                    <td><center style="width: 180px;"><?php echo $ex_list_project;?></center></td>
                    <td> <?php echo $ex_list_alley;?> </td>
                    <td> <?php echo $ex_list_road;?> </td>
                    <td> <?php echo $ex_list_subdistrict;?> </td>
                    <td> <?php echo $ex_list_district;?> </td>
                    <td> <?php echo $ex_list_province;?> </td>
                    <td> <?php echo $ex_list_train_station;?> </td>
                    <td> <?php echo $ex_list_googlmap;?> </td>
                    <td> <?php echo $ex_list_number_buildings;?> </td>
                    <td> <?php echo $ex_list_floor;?> </td>
                    <td> <?php echo $ex_list_view;?> </td>
                    <td> <?php echo $ex_list_total_floors;?> </td>
                    <td> <?php echo $ex_list_rai;?> </td>
                    <td> <?php echo $ex_list_ngan;?> </td>
                    <td> <?php echo $ex_list_wa;?> </td>
                    <td> <?php echo $ex_list_house_number;?> </td>
                    <td> <?php echo $ex_list_sqm;?> </td>
                    <td> <?php echo $ex_list_bedroom;?> </td>
                    <td> <?php echo $ex_list_bathroom;?> </td>
                    <td> <?php echo $ex_list_other_room;?> </td>
                    <td> <?php echo $ex_list_parking;?> </td>
                    <td> <?php echo $ex_list_furniture;?> </td>
                    <td> <?php echo $ex_list_pets;?> </td>
                    <td> <?php echo $ex_list_direction;?> </td>
                    <td> <?php echo $ex_list_strengths;?> </td>
                    <td> <?php echo $ex_list_gdrive_th;?> </td>
                    <td> <?php echo $ex_list_gdrive_en;?> </td>
                    <td> <?php echo $ex_list_facilities;?> </td>
                    <td> <?php echo $ex_list_nearby_places;?> </td>
                    <td> <?php echo $ex_list_details;?> </td>
                    <td> <?php echo $ex_list_heading;?> </td>
                    <td> <?php echo $ex_list_price;?> </td>
                    <td> <?php echo $ex_list_common_fee;?> </td>
                    <td> <?php echo $ex_list_contact_name;?> </td>
                    <td> <?php echo "'".$ex_list_contact_tel;?> </td>
                    <td> <?php echo $ex_list_contact_lineid;?> </td>
                    <td> <?php echo $ex_list_contact_email;?> </td>
                    <td> <?php echo $ex_list_remark;?> </td>
                    <td> <?php echo $ex_list_located;?> </td>
                    <td> <?php echo $ex_list_zone;?> </td>
                    <td> <?php echo $ex_list_listing_score;?> </td>
                    <td> <?php echo $ex_list_price_score;?> </td>
                    <td> <?php echo $ex_list_location;?> </td>
                    <td> <?php echo $ex_list_project_th;?> </td>
                    <td> <?php echo $ex_list_contact;?> </td>
                    <td> <?php echo $ex_list_tel;?> </td>
                    <td> <?php echo $ex_list_line;?> </td>
                    <td> <?php echo $ex_list_whatsapp;?> </td>
                    <td> <?php echo $ex_list_project_en;?> </td>
                    <td> <?php echo $ex_list_location_en;?> </td>
                    <td> <?php echo $ex_list_train_station_en;?> </td>
                    <td> <?php echo $ex_list_type_en;?> </td>
                    <td> <?php echo $ex_list_land_area;?> </td>
                    <td> <?php echo $ex_list_facing;?> </td>
                    <td> <?php echo $ex_list_nearby_places_en;?> </td>
                    <td> <?php echo $ex_list_common_facilities;?> </td>
                    <td>  </td>
                    <td> <?php echo $ex_list_contact;?> </td>
                    <td> <?php echo $ex_list_heading_en;?> </td>
                    <td> <?php echo $ex_list_listing_status;?> </td>
                    <td> <?php echo $ex_list_rent_till;?> </td>
                    <td> <?php echo $ex_list_negotiated_price;?> </td>
                    <td> <?php echo $ex_list_run;?> </td>
                     

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
     <?php } ?>

             
        </div>
      </div>
    </section>
<!-- DataTables  & Plugins -->
<script src="template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="template/plugins/jszip/jszip.min.js"></script>
<script src="template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="template/plugins/moment/moment.min.js"></script>
<script src="template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.js"></script>
 
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="template/dist/js/pages/dashboard.js"></script>

<!-- Select2 -->
<script src="template/plugins/select2/js/select2.full.min.js"></script>


<!-- Ekko Lightbox -->
<!--<script src="template/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<script src="template/plugins/bs-stepper/js/bs-stepper.min.js"></script> -->
<!-- dropzonejs -->

<!--<script src="template/plugins/dropzone/min/dropzone.min.js"></script> -->
<!-- AdminLTE App -->
<!--<script src="template/dist/js/adminlte.min.js"></script> -->
 



<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

 

<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="template/plugins/moment/moment.min.js"></script>
<script src="template/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="template/plugins/dropzone/min/dropzone.min.js"></script>

<script src="template/dist/js/adminlte.min.js"></script>


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
    $('#datemask2').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
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