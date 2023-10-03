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


<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

  <?php

   $date_today=date("Y-m-d H:i:s");
   $check=$_POST['check'];
   $p=$_GET['p'];

   if($check!='') {  

   $date_start=$_POST['date_start'];
   $date_end=$_POST['date_end'];

   $check_start=$_POST['date_start'];
   $check_end=$_POST['date_end']; 

      $date=substr($date_start,0, 2 );
      $month=substr($date_start,3 , 2);
      $year=substr($date_start,6 , 4);

      $date_start=$year."-".$month."-".$date;

      $date=substr($date_end,0, 2 );
      $month=substr($date_end,3 , 2);
      $year=substr($date_end,6 , 4);

      $date_end=$year."-".$month."-".$date;
  
  
     echo("<script> top.location.href='../backend/report/report_excel_living_insider.php?date_start=$date_start&date_end=$date_end&check=$check'</script>");   

?> 


<div class="loader"></div>

<?php 
   }


if($p=='1'){
 
 
    $date_start=$_GET['date_start'];
    $date_end=$_GET['date_end'];


      $date=substr($date_start,8, 2 );
      $month=substr($date_start,5 , 2);
      $year=substr($date_start,0 , 4);

      $check_start=$date."/".$month."/".$year;

      $date=substr($date_end,8, 2 );
      $month=substr($date_end,5 , 2);
      $year=substr($date_end,0 , 4);

      $check_end=$date."/".$month."/".$year;


      $date_up=" and  report_account_date>='$date_start' and  report_account_date <='$date_end' ";         

}else{

      $calExpireDate=date ("Y-m-d", strtotime("-30 day", strtotime($date_today)));
      $today_check=date("Y-m-d");

      $date_up=" report_account_date>='$calExpireDate' and  report_account_date <='$today_check' "; 
}
 

 
 

 

  ?>

  
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
              <form method="post" id="form" enctype="multipart/form-data" action="?page=download_file_excel" class=" form-inline"> 
              
              <input type="text" class="form-control" style="width: 100%;" name="p"  value="<?php echo $p;?>" hidden="hidden" >
              <input type="text" class="form-control" style="width: 100%;" name="check"  value="1" hidden="hidden" >
                
              <div class="card-body">

               <div class="container-fluid">
                <div class="row">
     
    
                  <div class="col-md-4">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">Date เริ่มต้น : </label>
                        <div class="col-sm-7">
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date_start" value="<?php echo $check_start;?>" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                       </div>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-5 col-form-label">Date ปลายทาง : </label>
                        <div class="col-sm-7">
                          <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="date_end" value="<?php echo $check_end;?>" />
                              <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                       </div>
                     </div>
                  </div>

                  <!--
                  <div class="col-md-3">
                     <div class="form-group">
                      <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date_end" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                     </div>
                  </div>
                  -->
 
            

                  <div class="col-md-4"> 
                     <center><button type="submit" class="btn btn-primary">Search</button>
                          <a class="btn btn-primary" href="?page=download_file_excel">clear</a>
                     </center>

                  </div>


                </div>
              </div>



                </div>
                <!-- /.card-body -->

                 
                  
                
              </form>
            </div>
            <!-- /.card -->  

      <div class="container-fluid">
          <div class="row" style="padding: 10px;">

            <div class="card col-md-6" >
                
                <center>
                  <!-- <h3 class="card-title">Listing สำหรับเว็บไซต์ DDproperty</h3> -->
                  <img src="img/ddproperty.jpg" height="80">
                </center>
           

              <div class="row ">
              
                 <div class="col-md-6" style="padding: 10px;"> 
                   <a href="report/<?php echo $date_start."-".$date_end.".zip";?>"  class="btn btn-block btn-danger" target="_black"   >ดาวน์โหลดไฟล์ภาพ</a>
                </div>
                 <div class="col-md-6" style="padding: 10px;"> 
                   <a href="report/<?php echo "ddproperty_".$date_start."-".$date_end.".xls?".$date_today;?>"  class="btn btn-block btn-danger" target="_black"   >ดาวน์โหลดไฟล์ Excel</a>
                </div>
              </div>
            </div>

            <div class="card col-md-6" >

                <center>
                  <!-- <h3 class="card-title">Listing สำหรับเว็บไซต์ Living insider</h3>-->
                  <img src="img/living.jpg" height="80">
                </center>

              <div class="row "> 
                 <div class="col-md-6" style="padding: 10px;"> 
                   <a href="report/<?php echo "living_insider_".$date_start."-".$date_end.".xls?".$date_today;?>"  class="btn btn-block btn-danger" target="_black"   >ดาวน์โหลดไฟล์ Excel</a>
                </div>
                <div class="col-md-6" style="padding: 10px;"> 
                   <a onclick="window.open('report/manual_living.php', '_blank', 'location=yes,height=650,width=600,scrollbars=yes,status=yes');"style="cursor:pointer;" >วิธีการดาวน์โหลด และเปลี่ยนนามสกุล คลิกชม</a>
                </div>
              </div>
            </div> 

          </div>
      </div>


      <div class="card-body" style="margin: 5px;">


                  <table class="table table-bordered">
                    <thead>
                      <tr> 
                        <th style="width: 50px;" rowspan="2" >#</th>  
                        <th style="width: 80px;" rowspan="2" >Date</th>  
                        <th style="width: 300px;" colspan="3" >Listing (Public)</th>   
                      </tr> 
                    </thead>
                    <tbody>

      
    <?php 

            $begin = $calExpireDate;
            $end   = $today_check;

            for($i = $begin; $i <= $end; $i->modify('+1 day')){

                   $i->format("Y-m-d");
 
               $sql_report="SELECT  sum(listing_public) as listing_public  , sum(create_listing_public) as create_listing_public 
                            FROM report_account  WHERE  $date_up order by  report_account_date DESC";  
               $result_report= $conn->query($sql_report);   
               $rs_report=$result_report->fetch_assoc();

                       $no++;

                       $report_account_date=$rs_report['report_account_date'];  
                       $listing_public=$rs_report['listing_public']; 
                       $create_listing_public=$rs_report['create_listing_public']; 
                       $num_listing_all=$create_listing-$delete_listing;
                       $update_listing_public=$listing_public+$create_listing_public;


                          $date_a_d=substr($report_account_date,8, 2 );           
                          $month_a_d=substr($report_account_date,5 , 2);
                          $year_a_d=substr($report_account_date,0 , 4 );
                          $report_account_date_s=$year_a_d."-".$month_a_d."-".$date_a_d." 00:00:00";
                          $report_account_date_e=$year_a_d."-".$month_a_d."-".$date_a_d." 23:59:59"; 

      ?> 

                          <tr style="font-size: 15px;">
                            <td><?php echo $no;?></td>
                            <td><a href="?page=portfolio_listing&p=listing_all&date_start=<?php echo $report_account_date_s;?>&date_end=<?php echo $report_account_date_e;?>&tab=listing_create" target="_black"><?php echo $report_account_date;?></td> 
                            <td><center><?php if($update_listing_public!=0){ echo number_format($update_listing_public); }else{ echo "-";}?></center> </td> 
                             
                          </tr>

         <?php } ?>

                    </tbody>
                 </table>
      
      </div>



<?php if($p==2){ ?>

<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
 
 
              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table id="example1" class="table table-bordered table-striped"  style="font-size: 10px;" >
                  <thead>
                  <tr   >
          
                    <th>id</th>
                    <th>Username</th>
                    <th>ขาย/ให้เช่า/ขายดาวน์</th>
                    <th>ประเภทอสังหา</th>
                    <th>รหัสทรัพย์ </th>
                    <th>หัวข้อยาว </th>
                    <th>หัวข้อสั้น</th>  
                    <th>ราคา </th>  
                    <th>เนื้อหา</th>   
                    <th>จังหวัด</th> 
                    <th>เขต/อำเภอ</th> 
                    <th>แขวง/ตำบล</th> 
                    <th>ถนน</th> 
                    <th>ซอย</th> 
                    <th>สถานที่ใกล้เคียง</th> 
                    <th>ชื่อโครงการ ไทย</th> 
                    <th>ชื่อโครงการ ENG</th>
                    <th>อาคาร</th>
                    <th>พื้นที่ ตรม.</th>
                    <th>ห้องนอน</th>
                    <th>ห้องน้ำ</th>
                    <th>ชั้นที่</th>
                    <th>จำนวนชั้นทั้งหมด</th>
                    <th>พิเศษ</th>
                    <th>วิวคอนโด</th>
                    <th>ภาค</th>
                    <th>พิ้นที่ ตารางวา</th>
                    <th>พื้นที่ งาน</th>
                    <th>พื้นที่ไร่</th>
                    <th>พื้นที่ตารางวา รวม</th>
                    <th>พื้นที่ใช้สอย</th> 
                    <th>หัวข้อ ENG </th>
                    <th>เนื้อหา ENG</th>
                    <th>พื้นที่ LIVINGINSIDER</th> 
                  </tr>
                  </thead>
                  <tbody>
	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;

		 $sql="SELECT * FROM dbo_data_excel_listing where ex_list_public_date LIKE '%$date_all%' order by ex_list_public_date  DESC";  
		 $result = $conn->query($sql);



		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs_listing=$result->fetch_assoc()) { $no++;
         

         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
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
         $ex_list_heading_en=$rs_listing['ex_list_heading_en'];
         $ex_list_price=$rs_listing['ex_list_price'];
         $ex_list_common_fee=$rs_listing['ex_list_common_fee'];
         $ex_list_contact=$rs_listing['ex_list_contact'];
         $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
         $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
         $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
         $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
         $ex_list_contact_name_2=$rs_listing['ex_list_contact_name_2']; 
         $ex_list_contact_tel_2=$rs_listing['ex_list_contact_tel_2'];
         $ex_list_contact_email_2=$rs_listing['ex_list_contact_email_2'];
         $ex_list_contact_lineid_2=$rs_listing['ex_list_contact_lineid_2'];
         $ex_list_remark=$rs_listing['ex_list_remark'];
         $zone_id=$rs_listing['zone_id'];
         $ex_list_googlmap=$rs_listing['ex_list_googlmap'];
         $type_strengths_id=$rs_listing['type_strengths_id'];
         $ex_list_room_id=$rs_listing['ex_list_room_id'];
         $ex_list_furniture_id=$rs_listing['ex_list_furniture_id'];


         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];


         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $project_id=$rs_listing['project_id'];


         


         $area_th=$ex_list_rai." ไร่ - ".$ex_list_ngan." งาน - ".$ex_list_wa." วา";
         $area_en=$ex_list_rai." - ".$ex_list_ngan." - ".$ex_list_wa." ";

         if($ex_list_sqm!=''){ $ex_list_sqm_th=$ex_list_sqm." ตร.ม."; $ex_list_sqm_en=$ex_list_sqm." sqm";}
         if($ex_list_bedroom!=''){ 
                 if($ex_list_bedroom=='0'){  $ex_list_bedroom_th="Studio"; $ex_list_bedroom_en="Studio"; 
                 }else{  $ex_list_bedroom_th=$ex_list_bedroom." ห้อง";    $ex_list_bedroom_en=$ex_list_bedroom." Room"; }
         }
         if($ex_list_bathroom!=''){ $ex_list_bathroom_th=$ex_list_bathroom." ห้อง";  $ex_list_bathroom_en=$ex_list_bathroom." Room";   }
         if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
         if($ex_list_total_floors!=''){ $ex_list_total_floors_th=$ex_list_total_floors." ชั้น";  $ex_list_total_floors_en=$ex_list_total_floors."";}

        if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";  $ex_list_deal_type_en="FOR SELL"; }else{$ex_list_deal_type="เช่า"; $ex_list_deal_type_en="FOR RENT";}

        if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']==$ex_list_contact ){ $ex_list_house_number=$ex_list_house_number; }else{ $ex_list_house_number=" "; }
 

         $sql_projects="SELECT * FROM type_project where project_id='$project_id' order by project_id  ASC"; 
         $result_projects=$conn->query($sql_projects);
         $rs_projects= $result_projects->fetch_assoc();
         
         $project_type=$rs_projects['project_type'];
         $project_name=$rs_projects['project_name'];
         $project_name_en=$rs_projects['project_name_en'];
         $project_alley=$rs_projects['project_alley'];
         $project_alley_en=$rs_projects['project_alley_en'];
         $project_road=$rs_projects['project_road'];
         $project_road_en=$rs_projects['project_road_en'];
         $project_subdistrict=$rs_projects['project_subdistrict'];
         $project_district=$rs_projects['project_district'];
         $project_province=$rs_projects['project_province'];
         $project_train_station=$rs_projects['project_train_station'];
         $project_facilities=$rs_projects['project_facilities'];
         $project_nearby_places=$rs_projects['project_nearby_places'];
         $project_nearby_places_en=$rs_projects['project_nearby_places_en'];
         $project_facilities_en=$rs_projects['project_facilities_en'];
         $project_zone=$rs_projects['project_zone'];
         $project_facilities_icon=$rs_projects['project_facilities_icon'];
         $project_map=$rs_projects['project_map'];
         $project_total_floors=$rs_projects['project_total_floors'];

         $zone_id=$rs_projects['zone_id'];

         if($rs_projects['project_id']!=''){  // project_id NO
        
                 $ex_list_listing_type=$project_type;
                 $ex_list_alley=$project_alley;
                 $ex_list_road=$project_road;
                 $ex_list_subdistrict=$project_subdistrict;
                 $ex_list_district=$project_district;
                 $ex_list_province=$project_province; 
                 $ex_list_train_station=$project_train_station;
                 $ex_list_nearby_places=$project_nearby_places;
                 $ex_list_facilities=$project_facilities;
                 $ex_list_zone=$project_zone;
                 $ex_list_googlmap=$project_map;
                 $ex_list_listing_type_check=$project_type;

                 if($ex_list_listing_type=='1' or $ex_list_total_floors=='' or $ex_list_total_floors=='0'){
                            
                              
                                        $ex_list_total_floors_th=$project_total_floors." ชั้น";  
                                        $ex_list_total_floors_en=$project_total_floors.""; 
                             
                 } 

            }  // END project_id NO


               

                 $ex_list_project=$project_name." | ".$project_name_en; 

 


      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$ex_list_province' "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province=$rs_p['provinces_in_thai'];
                $project_province_en=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];
                $geography_id=$rs_p['geography_id'];

                $sql_geo="SELECT * FROM sys_geography WHERE id='$geography_id' "; 
                $result_geo=$conn->query($sql_geo);
                $rs_geo=$result_geo->fetch_assoc();

                $name_th=$rs_geo['name_th'];


      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$ex_list_district' "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district=$rs_d['districts_in_thai'];
                $project_district_en=$rs_d['districts_in_english'];

                $project_district = str_replace("เขต","",$project_district,$count);


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$ex_list_subdistrict' "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $project_subdistrict=$rs_s['subdistricts_in_thai'];
                $project_subdistrict_en=$rs_s['subdistricts_in_english'];
                $zip_code=$rs_s['zip_code'];

                $project_subdistrict = str_replace("แขวง","",$project_subdistrict,$count);
               
                if($project_alley_en!=''){  $project_alley_en=" ".$project_alley_en; }
                if($project_road_en!=''){ $project_road_en=" , ".$project_road_en;}

    if($_SESSION['STATUS_ADS']=='1'){  
               $ex_list_house_number="";

     }

               if($province_id=='1'){
                     
                     $address=$ex_list_house_number." ".$project_alley." ".$project_road." แขวง".$project_subdistrict." เขต".$project_district." ".$project_province." ".$zip_code;

                     $address_en=$ex_list_house_number."".$project_alley_en."".$project_road_en." , ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code;

               }else{

                       $address=$ex_list_house_number." ".$project_alley." ".$project_road." ตำบล".$project_subdistrict." อำเภอ".$project_district." จังหวัด".$project_province." ".$zip_code;

                      $address_en=$ex_list_house_number."".$project_alley_en."".$project_road_en." , ".$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en." ".$zip_code; 
               }


      /////////// type_project //////////////// 

      /////////// End type_project ////////////////


      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];   $ex_list_listing_type_en=$rs_ass['name_en']; }
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
             $tr_group=$rs_train['tr_group'];
  
             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];  
                                        
                                        $ex_list_train_station_en=$tr_group."-".$rs_train['station_name_en'];
                                  }
      /////////// End type_train_station ////////////////
  

        //////////////    ////////////////////////////
             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $ex_list_contacts=$rs_register['register_name']." | ".$rs_register['register_email'];

 

      /////////// type_zone ////////////////
             $sql_zone="SELECT * FROM type_zone where zone_id='$zone_id' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc();

             $zone_name=$rs_zone['zone_name'];
             $zone_name_en=$rs_zone['zone_name_en'];


             if($zone_name!=''){ $ex_list_zone=$zone_name;    $ex_list_zone_en=$zone_name_en;    }


        
 

        $type_room_id = explode(',', $ex_list_room_id);

         $sql_room="SELECT * FROM type_room order by room_id  ASC"; 
         $result_room=$conn->query($sql_room);
     
         while($rs_room=$result_room->fetch_assoc()) { 

                $room_id=$rs_room['room_id'];
                $room_title=$rs_room['room_title'];
                $room_title_en=$rs_room['room_title_en'];
                  
                 if (in_array($room_id, $type_room_id)){
                        

                       $room_title2=$room_title; 
                       $room_title_en2=$room_title_en;                      
                 }
           }


     /////////// //////////  ex_list_contract_type  //////////////////            

            if($ex_list_contract_type=='1'){ $ex_list_contract_type="Exclusive";}else if($ex_list_contract_type=='2'){ $ex_list_contract_type="Open"; }else if($ex_list_contract_type=='3'){ $ex_list_contract_type="No Contract"; }else{$ex_list_contract_type="ไม่ระบุ";}

 

                 $ex_list_heading_shot=$ex_list_deal_type.$ex_list_listing_type." ".$project_name ;


            $detail="รายละเอียด "."<br>";
            $detail.="โครงการ : ".$ex_list_project." <br> ";
            $detail.="ที่ตั้ง : ".$address." <br>";
            $detail.="พิกัด : ".$ex_list_googlmap." <br>";
       
       if($ex_list_train_station!='' and $ex_list_train_station!='0'){                           
            $detail.="สถานีรถไฟฟ้า : ".$ex_list_train_station." <br><br>";
         }         
            $detail.="รหัสทรัพย์ : ".$ex_list_listing_code." <br>";
            $detail.="ราคา".$ex_list_deal_type." : ".number_format($ex_list_price)." <br><br>";
            $detail.="ประเภท : ".$ex_list_listing_type." <br>";
            $detail.="จำนวนชั้น : ".$ex_list_total_floors_th." <br>";

        if($ex_list_listing_type_check=='1'){ 
            $detail.="ตั้งอยู่ชั้นที่ : ".$ex_list_floor." <br>";
        }
        if($ex_list_listing_type_check!='1'){ 
            $detail.="พื้นที่ : ".$area_th." <br>";
        }
            $detail.="พื้นที่ใช้สอย : ".$ex_list_sqm_th." <br>";
            $detail.="ห้องนอน : ".$ex_list_bedroom_th." <br>";
            $detail.="ห้องน้ำ : ".$ex_list_bathroom_th." <br>";
            $detail.="ห้องอื่นๆ : ".$ex_list_other_room." <br>";
        if($ex_list_parking!=''){
            $detail.="ที่จอดรถ : ".$ex_list_parking." <br>";
        }
        if($ex_list_direction!=''){
            $detail.="ทิศ : ".$ex_list_direction." <br><br>";
        }


        if($type_strengths_id!=''){  
            
        }
  
           $selected_type_strengths_id = explode(',', $type_strengths_id);

           $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
           $result_strengths=$conn->query($sql_strengths);
                   
           while($rs_strengths=$result_strengths->fetch_assoc()) { 
                  $strengths_id=$rs_strengths['strengths_id'];
                  $strengths_name=$rs_strengths['strengths_name'];
                  $strengths_name_en=$rs_strengths['strengths_name_en'];
               if (in_array($strengths_id, $selected_type_strengths_id)){ 

                     $detail.="จุดเด่น :".$strengths_name."<br>";
              }

           }

        if($ex_list_details!=''){

            $detail.="รายละเอียดเพิ่มเติม :  <br>";
            $detail.=nl2br($ex_list_furniture)." <br><br>";
        }

        if($ex_list_furniture_id!=''){
        
            $detail.="เฟอร์นิเจอร์ :  <br>";
            if($ex_list_furniture!=''){  $detail.="เฟอร์นิเจอร์ : ".nl2br($ex_list_furniture)." <br>"; }

               $selected_furniture_id = explode(',', $ex_list_furniture_id);
               $sql_furniture="SELECT * FROM type_furniture order by furniture_id ASC"; 
               $result_furniture=$conn->query($sql_furniture);
                   
               while($rs_furniture=$result_furniture->fetch_assoc()) { 

                $furniture_id=$rs_furniture['furniture_id'];
                $furniture_name=$rs_furniture['furniture_name']; 
                $furniture_name_en=$rs_furniture['furniture_name_en'];
                                
                    if (in_array($furniture_id, $selected_furniture_id)){ 
                          $detail.="-".$furniture_name." <br>"; 
                    }
               }   

        }


            $detail.="สิ่งอำนวยความสะดวก : " ." <br>";
            $detail.=nl2br($ex_list_facilities)." <br><br>";
            $detail.="ทำเลดี สถานที่ใกล้เคียง :  <br>";
            $detail.=nl2br($ex_list_nearby_places)." <br>";
            $detail.="โซนพื้นที่ :   <br>";
            $detail.= $ex_list_zone." <br><br>";
            $detail.="**บริการปรึกษาสินเชื่อฟรี! ดอกเบี้ยพิเศษ และ วงเงินกู้สูงสุด 90-100% ของราคาประเมิน** <br>";
            $detail.="สอบถามข้อมูลเพิ่มเติม ติดต่อ <br>";
            $detail.="CONNEX PROPERTY สนใจซื้อ-ขายบ้าน ปรึกษาฟรี! ทีมงานมืออาชีพ  <br>";
            $detail.="Call: 099-019-9900  <br>";
            $detail.="Facebook: Connex Property <br>";
            $detail.="LINE OA: @connexproperty <br>";
            $detail.=" Whatsapp: +66 99 019 9900 <br>";
            $detail.="https://connex.in.th/ <br>";
  

            $detail_en="Description "."<br>";
            $detail_en.="Project : ".$project_name_en." <br>";
            $detail_en.="Location area: ".$address_en." <br>";
            $detail_en.="GPS : ".$ex_list_googlmap." <br>";
       
       if($ex_list_train_station!='' and $ex_list_train_station!='0'){                           
            $detail_en.="Station : ".$ex_list_train_station_en." <br><br>";
         }         
            $detail_en.="Listing ID : ".$ex_list_listing_code." <br>";
            $detail_en.=$ex_list_deal_type_en." : ".number_format($ex_list_price)." ฿ <br><br>";
            $detail_en.="Property type : ".$ex_list_listing_type_en." <br>";
            $detail_en.="No of floors : ".$ex_list_total_floors_en." <br>";

        if($ex_list_listing_type_check=='1'){ 
            $detail_en.="Floor : ".$ex_list_floor." <br>";
        }
        if($ex_list_listing_type_check!='1'){ 
            $detail_en.="Area : ".$area_en." <br>";
        }
            $detail_en.="Usable area  : ".$ex_list_sqm_en." <br>";
            $detail_en.="No. of Bedroom ".$ex_list_bedroom_en." <br>";
            $detail_en.="No. of Bathroom : ".$ex_list_bathroom_en." <br>";
            $detail_en.="Other : ".$ex_list_other_room." <br>";
        if($ex_list_parking!=''){
            $detail_en.="Parking : ".$ex_list_parking." <br>";
        }
        if($ex_list_direction!=''){
            $detail_en.="Direction : ".$ex_list_direction." <br><br>";
        }


        if($type_strengths_id!=''){  
            
        }
  
           $selected_type_strengths_id = explode(',', $type_strengths_id);

           $sql_strengths="SELECT * FROM type_strengths order by strengths_id ASC"; 
           $result_strengths=$conn->query($sql_strengths);
                   
           while($rs_strengths=$result_strengths->fetch_assoc()) { 
                  $strengths_id=$rs_strengths['strengths_id'];
                  $strengths_name=$rs_strengths['strengths_name'];
                  $strengths_name_en=$rs_strengths['strengths_name_en'];
               if (in_array($strengths_id, $selected_type_strengths_id)){ 

                     $detail_en.="Highlights :".$strengths_name_en."<br>";
              }

           }

        if($ex_list_details!=''){

            $detail_en.="รายละเอียดเพิ่มเติม :  <br>";
            $detail_en.=nl2br($ex_list_furniture)." <br><br>";
        }

        if($ex_list_furniture_id!=''){
        
            $detail.="Furniture :  <br>";
            if($ex_list_furniture!=''){  $detail.="เฟอร์นิเจอร์ : ".nl2br($ex_list_furniture)." <br>"; }

               $selected_furniture_id = explode(',', $ex_list_furniture_id);
               $sql_furniture="SELECT * FROM type_furniture order by furniture_id ASC"; 
               $result_furniture=$conn->query($sql_furniture);
                   
               while($rs_furniture=$result_furniture->fetch_assoc()) { 

                $furniture_id=$rs_furniture['furniture_id'];
                $furniture_name=$rs_furniture['furniture_name']; 
                $furniture_name_en=$rs_furniture['furniture_name_en'];
                                
                    if (in_array($furniture_id, $selected_furniture_id)){ 
                          $detail_en.="-".$furniture_name_en." <br>"; 
                    }
               }   

        }


            $detail_en.="Common Facilities : " ." <br>";
            $detail_en.=nl2br($project_facilities_en)." <br><br>";
            $detail_en.="Nearby Facilities :  <br>";
            $detail_en.=nl2br($project_nearby_places_en)." <br>";
            $detail_en.="Zone :   <br>";
            $detail_en.= $ex_list_zone_en." <br><br>";
            $detail_en.="**Free consultation! seeking to buy/sell/rent properties in Thailand** <br>";
            $detail_en.="Interested please contact :<br>";
            $detail_en.="CONNEX PROPERTY | Connect you to your wished property  <br>";
            $detail_en.="Call: 099-019-9900  <br>";
            $detail_en.="Facebook: Connex Property <br>";
            $detail_en.="LINE OA: @connexproperty <br>";
            $detail_en.=" Whatsapp: +66 99 019 9900 <br>";
            $detail_en.="https://connex.in.th/ <br>";
            

            $ex_list_nearby_places=nl2br($ex_list_nearby_places);



     ?> 
                  <tr style="font-size: 10px; margin: -20px; " >
             
                    <td> 
                          <?php echo $no;?>  
                    </td>
                    <td ><?php echo "connex";?></td> 
                    <td ><?php echo $ex_list_deal_type;?></td>
                    <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                    <td> <?php echo $ex_list_listing_code;?> </td>
                    <td><center style="width: 30px;"><?php echo $ex_list_heading;?></center></td>
                    <td><center style="width: 30px;"><?php echo $ex_list_heading_shot;?></center></td>
                    <td><center style="width: 30px;"><?php echo $ex_list_price;?></center></td>
                    <td><center style="width: 180px;"><?php echo $detail;?></center></td>
                    <td> <?php echo $project_province;?> </td>
                    <td> <?php echo $project_district;?> </td>
                    <td> <?php echo $project_subdistrict;?> </td>
                    <td> <?php echo $ex_list_road;?> </td>
                    <td> <?php echo $ex_list_alley;?> </td>
                    <td> <?php echo nl2br($ex_list_nearby_places);?> </td>
                    <td> <?php echo $project_name;?> </td>
                    <td> <?php echo $project_name_en;?> </td>
                    <td>   </td>
                    <td> <?php echo $ex_list_sqm;?> </td>
                    <td> <?php echo $ex_list_bedroom;?> </td>
                    <td> <?php echo $ex_list_bathroom;?> </td>
                    <td> <?php echo $ex_list_floor;?> </td>
                    <td> <?php echo $project_total_floors;?> </td>
                    <td>   </td>
                    <td>   </td>
                    <td> <?php echo $name_th;?> </td>
                    <td> <?php echo $ex_list_wa;?> </td>
                    <td> <?php echo $ex_list_ngan;?> </td>
                    <td> <?php echo $ex_list_rai;?> </td>
                    <td> <?php echo $ex_list_wa;?> </td>
                    <td> <?php echo $ex_list_sqm;?> </td>
                    <td> <?php echo $ex_list_heading_en;?> </td>
                    <td> <?php echo $detail_en;?> </td>
                    <td> <?php echo $ex_list_zone;?> </td> 
                    
                     

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
    </section>

 

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
        format: 'DD/MM/YYYY'
    });


    //Date picker
    $('#reservationdate2').datetimepicker({
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