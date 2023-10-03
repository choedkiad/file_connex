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

      $check_date=$year."-".$month."-".$date;


      $date_start=$year."-".$month."-".$date." 00:00:00";

      $date=substr($date_end,0, 2 );
      $month=substr($date_end,3 , 2);
      $year=substr($date_end,6 , 4);

      $date_end=$year."-".$month."-".$date." 23:59:59";;
  
   
?> 

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
              <form method="post" id="form" enctype="multipart/form-data" action="?page=report_availabletorented" class=" form-inline"> 
              
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



<?php if($check==1){ ?>

<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
 
 
              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table id="example1" class="table table-bordered table-striped"  style="font-size: 10px;" >
                  <thead>
                  <tr   >
          
                    <th>No</th>
                    <th>Code</th> 
                    <th>Image</th>   
                    <th>Status</th>
                    <th>Type</th>
                    <th>Deal</th>
                    <!--<th>Project</th> -->
                    <th>Update</th> 

 
                  </tr>
                  </thead>
                  <tbody>
	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;



		 $sql="SELECT DISTINCT ex_list_id FROM dbo_record where 
		                                  record_date >='$date_start' and record_date<='$date_end' and ex_list_listing_status='3' and ex_list_deal_type='2' or 
                                          record_date >='$date_start' and record_date<='$date_end' and ex_list_listing_status='4' or
                                          record_date >='$date_start' and record_date<='$date_end' and ex_list_listing_status='5' or
                                          record_date >='$date_start' and record_date<='$date_end' and ex_list_listing_status='6' or
                                          record_date >='$date_start' and record_date<='$date_end' and ex_list_listing_status='12' or
                                          record_date >='$date_start' and record_date<='$date_end' and ex_list_listing_status='13' or
                                          record_date >='$date_start' and record_date<='$date_end' and ex_list_listing_status='14' or
                                          record_date >='$date_start' and record_date<='$date_end' and ex_list_listing_status='15' 


            order by record_date  DESC ";  
		 $result = $conn->query($sql);



		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs_record=$result->fetch_assoc()) { 

           $ex_list_ids=$rs_record['ex_list_id'];


 /*
           $sql_a="SELECT * FROM dbo_record AS record
                   LEFT JOIN dbo_data_excel_listing AS data  On record.ex_list_id=data.ex_list_listing_code  
                   LEFT JOIN type_project AS pj  On data.project_id=pj.project_id        
                   where record.ex_list_listing_status='1'  and  record.ex_list_id='$ex_list_id'          
                   order by record.record_date DESC";   */

            $sql_record="SELECT DISTINCT ex_list_id FROM dbo_record AS record    
                   where record.ex_list_listing_status='1'  and  record.ex_list_id='$ex_list_ids'          
                   order by record.record_date DESC LIMIT 1 "; 
           $result_record= $conn->query($sql_record); 
           $rs_record=$result_record->fetch_assoc();

           $ex_list_id=$rs_record['ex_list_id'];

           if($ex_list_id!=''){





           $sql_a="SELECT * FROM dbo_data_excel_listing AS data  
                   where ex_list_listing_code='$ex_list_id'             
                   order by ex_list_listing_code DESC ";
           $result_a= $conn->query($sql_a);
           $rs_listing=$result_a->fetch_assoc();
 


           $ex_list_check=$rs_listing['ex_list_id'];


         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
         $ex_list_img_number=$rs_listing['ex_list_img_number'];
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
         $ex_list_date_update=$rs_listing['ex_list_date_update'];
         $project_id=$rs_listing['project_id'];
    /*     
   
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
 
 
 
 
         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];
         $ex_list_proppit=$rs_listing['ex_list_proppit'];
         $ex_list_owner_tel=$rs_listing['ex_list_owner_tel'];
         $ex_list_checkpost=$rs_listing['ex_list_checkpost'];
         $ex_list_living=$rs_listing['ex_list_living'];
*/
         $ex_list_img_score=$rs_listing['ex_list_img_score'];
         $ex_list_close=$rs_listing['ex_list_close'];
         
         if($ex_list_close=='1'){ ?>

            <style type="text/css">
              td{
                background-color: #FF202B;
                color: #FFFFFF;
                font-weight:bold;
              }
            </style>     

   <?php }else{  ?>

            <style type="text/css">
              td{
                background-color: #FFFFFF;
                color: #000000;
                font-weight:bold;
              }
            </style>     
                 
   <?php }


         if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  }
         else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; $stauts_list_color="#ff0000"; }
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
         else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
         }
       /*     
          if($ex_list_price!=''){ $ex_list_price=number_format($ex_list_price);}else{$ex_list_price="ยังไม่ระบุ";}

*/
          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

          if($ex_list_sqm!='' or $ex_list_sqm=='0'){  $ex_list_sqm=$ex_list_sqm; }
        
          if($ex_list_bedroom>0){$ex_list_bedroom=$ex_list_bedroom."นอน";}else{ $ex_list_bedroom=$ex_list_bedroom; }
          if($ex_list_bathroom>0){$ex_list_bathroom=$ex_list_bathroom."น้ำ";}else{ $ex_list_bathroom=$ex_list_bathroom; }

      /////////// type_project ////////////////
 
          /*
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
             $zone_id=$rs_project['zone_id'];
*/
             if($zone_id!='') {
                  $ex_list_zone=$zone_id;
             } 

             if($zone_id=='0'){  $ex_list_zone="ไม่ระบุโซน"; }

         /*
             if($ex_list_listing_type!='' or $ex_list_listing_type!='0'){

                   $ex_list_listing_type=$project_type;
             }
*/

        if($project_id!=''){ 

              /* $ex_list_project=$project_name." | ".$project_name_en;*/
               $ex_list_project=$project_name_en;
      /////////// End type_project ////////////////

 


        }else{
            
            if($ex_list_listing_name!='') {

                 $ex_list_project=$ex_list_listing_name;
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

 

        if($ex_list_id==$ex_list_listing_code){            $no++;

     ?> 
                  <tr style="font-size: 10px; margin: -20px; "  >
             
                    <td > <?php echo $no;?>  </td>

                    <td><a target="_blank" href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>"    >
                      <?php echo $ex_list_listing_code;?> </a></td> 
            
                    <td>
                       <?php if($ex_list_img_number!='0'){ ?>
                                  
                                  <img src="../../images/icon/icon-true.png" width="15" >

                       <?php }else{ ?>
                                   <img src="../../images/icon/icon-no.png" width="15" > 
                       <?php } ?>
                    </td>     
                        
                    <td><center style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   >

 
                      <?php echo $ex_list_listing_status;?>
                       <?php if($ex_list_listing_status_check=='3'){ ?> <br><?php echo $ex_list_rent_till; } ?>
                      </a>
                      
                    </center></td>
                    <td><center style="width: 50px;"><?php echo $ex_list_listing_type;?></center></td>
                    <td><center style="width: 50px;"><?php echo $ex_list_deal_type;?></center></td>
                    <!--<th><center style="width: 200px; " ><a title="<?php echo $ex_list_contact_name_s;?>" style="cursor:pointer;"  ><?php echo "".$ex_list_project;?></a></center></th> -->
                    <td><?php if($ex_list_date_update=='00 00 543 00:00'){ echo "ยังไม่ระบุ"; }else{ echo $ex_list_date_update; }?></td> 
                   
                     

           
 
                  </tr>  
      <?php       }

                }
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