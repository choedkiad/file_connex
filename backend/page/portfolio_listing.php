 
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
div.scroll {width:100%; max-height: 600px; overflow-x:auto;}

th{
  background-color: #4F80C0;
  padding: 10px;
  font-size: 18px;
  color: #fff;
}
table, th , tr, td {
 
  padding: 8px;
  text-align: left;
  border: 1px solid #000;
  font-size: 14px;
  text-align: center;

  
}
tr:nth-child(even){background-color: #f2f2f2}
tr:hover {background-color: #f5f5f5}
</style>



<?php

    $USER_ID=$_SESSION['USER_ID'];
    $date_time=date("Y-m-d H:i:s");

    $sql="SELECT * FROM dbo_register where register_id='$USER_ID'  order by register_id ASC"; 
    $result = $conn->query($sql);
    $rs= $result->fetch_assoc();

    $register_name=$rs['register_name'];
    $register_email=$rs['register_email'];

  $check=$_POST['check'];
  $date_update_start=$_POST['date_update_start'];
  $register_status=$_POST['register_status'];
  $date_update_end=$_POST['date_update_end'];
  $register_lcok=$_POST['register_lcok'];


  $p=$_GET['p']; 
  $tab=$_GET['tab'];  
  isset( $_GET['update'] ) ? $update = $_GET['update'] : $update = ""; 

 
 if($update=='1'){
     

     /////////////////////////// อัพเดทข้อมูล /////////////////////////////
 
        $today=date("Y-m-d");

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0' and register_id='$USER_ID' LIMIT 1   "; 
        $result_register=$conn->query($sql_register);

       if($result_register->num_rows > 0) {

         $rs_register=$result_register->fetch_assoc(); 
            
            $register_id=$rs_register['register_id'];
            $register_name=$rs_register['register_name'];
            $register_lastname=$rs_register['register_lastname'];
            $register_nickname=$rs_register['register_nickname'];

  
            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;

            $sql_record_1= "SELECT DISTINCT  ex_list_id  FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' "; 
            $result_record_1=$conn->query($sql_record_1);
            $rs_record_1=$result_record_1->fetch_assoc();
            $count_record_1=$result_record_1->num_rows;


             $sql_record_2= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
                                        WHERE ex_list_date_create LIKE '%$today%'  and  ex_list_contact='$register_id'    "; 
             $result_record_2=$conn->query($sql_record_2);
             $rs_record_2=$result_record_2->fetch_assoc();
             $count_record_2=$result_record_2->num_rows;
      /* 
            $sql_record_2= "SELECT DISTINCT  ex_list_id  FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%ทำการเพิ่ม Listing%' and record_remark='1' "; 
            $result_record_2=$conn->query($sql_record_2);
            $rs_record_2=$result_record_2->fetch_assoc(); 
            $count_record_2=$result_record_2->num_rows; */


            $sql_record_3= "SELECT DISTINCT  ex_list_id  FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%คลิกดูเบอร์ Owner%' and record_remark='tel' "; 
            $result_record_3=$conn->query($sql_record_3);
            $rs_record_3=$result_record_3->fetch_assoc();
            $count_record_3=$result_record_3->num_rows;

            $sql_record_4= "SELECT DISTINCT  ex_list_id FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%เพิ่มภาพประกอบ รหัสทรัพย์%'   "; 
            $result_record_4=$conn->query($sql_record_4);
            $rs_record_4=$result_record_4->fetch_assoc();
            $count_record_4=$result_record_4->num_rows;
 

            $sql_record_5= "SELECT DISTINCT  ex_list_id  FROM dbo_record 
                           WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='1' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='3' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='4' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='5' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='6' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='15' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' "; 
            $result_record_5=$conn->query($sql_record_5);
            $rs_record_5=$result_record_5->fetch_assoc();
            $count_record_5=$result_record_5->num_rows;


           //  Update  Listing ที่ได้ public ไม่รวมที่สร้าง
            $sql_record_6= "SELECT DISTINCT  record.ex_list_id  
                            FROM dbo_record AS record
                            LEFT JOIN dbo_data_excel_listing AS listing ON (record.ex_list_id=listing.ex_list_listing_code)
                            WHERE listing.ex_list_public_date LIKE '%$today%' and record.record_date LIKE '%$today%' and record.record_user_id='$register_id'  and 
                                  record.record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%'   "; 
            $result_record_6=$conn->query($sql_record_6);            
            $count_record_6=$result_record_6->num_rows; 
            while($rs_record_6=$result_record_6->fetch_assoc()){

                 $ex_list_id=$rs_record_6['ex_list_id'];
      

                  $sql_record_sum= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
                                  WHERE ex_list_public_date LIKE '%$today%'  and  ex_list_contact='$register_id' and ex_list_public='1'  and  ex_list_listing_code='$ex_list_id'   "; 
                  $result_record_sum=$conn->query($sql_record_sum);
                  $rs_record_sum=$result_record_sum->fetch_assoc();
                  $count_record_sum=$result_record_sum->num_rows;
                              
                        $count_record_6=$count_record_6-$count_record_sum;
 
            } 
 


            $sql_record_8= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
                            WHERE ex_list_public_date LIKE '%$today%'  and  ex_list_contact='$register_id' and ex_list_public='1' and ex_list_close='0'  "; 
            $result_record_8=$conn->query($sql_record_8);
            $rs_record_8=$result_record_8->fetch_assoc();
            $count_record_8=$result_record_8->num_rows;

          //จำนวนโดนลบ LISTING
            $sql_record_9= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
                            WHERE ex_list_date_create LIKE '%$today%'  and  ex_list_contact='$register_id'  and ex_list_close='1'  "; 
            $result_record_9=$conn->query($sql_record_9);
            $rs_record_9=$result_record_9->fetch_assoc();
            $count_record_9=$result_record_9->num_rows;

          //จำนวนการสร้าง Deal
            $sql_record_10= "SELECT   create_deal_code FROM   dbo_create_deal  
                            WHERE create_deal_create LIKE '%$today%'  and  user_id='$register_id'  "; 
            $result_record_10=$conn->query($sql_record_10);
            $rs_record_10=$result_record_10->fetch_assoc();
            $count_record_10=$result_record_10->num_rows;

          //จำนวนที่เสนอห้อง   
            $sql_record_11= "SELECT  subdeal_code  FROM   dbo_subdeal  
                            WHERE subdeal_create_date LIKE '%$today%'  and  user_id='$register_id' "; 
            $result_record_11=$conn->query($sql_record_11);
            $rs_record_11=$result_record_11->fetch_assoc();
            $count_record_11=$result_record_11->num_rows;


            if($count_account!='0'){

                     $sql_update= "UPDATE report_account SET   
                                        edit_listing='".$count_record_1."',
                                        create_listing='".$count_record_2."',
                                        see_number='".$count_record_3."',
                                        upload_images='".$count_record_4."',
                                        contact_listing='".$count_record_5."',
                                        listing_public='".$count_record_6."',
                                        create_listing_public='".$count_record_8."',
                                        delete_listing='".$count_record_9."',
                                        create_deal='".$count_record_10."',
                                        create_subdeal='".$count_record_11."',
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, edit_listing , create_listing , see_number , upload_images , contact_listing , listing_public, create_listing_public , delete_listing , create_deal , create_subdeal , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record_1'  , '$count_record_2'  , '$count_record_3'  , '$count_record_4' , '$count_record_5' , '$count_record_6' , '$count_record_8' , '$count_record_9' , '$count_record_10' , '$count_record_11' , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }


          echo("<script> top.location.href='?page=portfolio_listing'</script>");     

      } 


    /////////////////////////////////////////////////////////  
 }


 if($check=='1'){


  if($date_update_start==''){ 

        $date_update_start_u="01-01-2022 00:00:00";

  } 

  if($date_update_end==''){ 

        $date_update_end_u="01-01-2050 00:00:00";

  } 

    if($date_update_start!='' and $date_update_end!=''){
        $month_u=substr($date_update_start,3 , 2);
        $year_u=substr($date_update_start,6 , 4 ); 
        $date_u=substr($date_update_start,0, 2 );
        $date_update_start_u=$year_u."-".$month_u."-".$date_u." 00:00:00";


        $month_u=substr($date_update_end,3 , 2);
        $year_u=substr($date_update_end,6 , 4 ); 
        $date_u=substr($date_update_end,0, 2 );
        $date_update_end_u=$year_u."-".$month_u."-".$date_u." 23:59:59";

    }

 }


 
  $p_post=$_POST['p'];
  $tab_post=$_POST['tab'];


   if($p_post!=''){

      echo("<script> top.location.href='./?page=portfolio_listing&p=listing_all&date_start=$date_update_start_u&date_end=$date_update_end_u&tab=$tab_post'</script>"); 

  }


                   if($date_update_start!=''){    
                         $date_up=" and  report_account_date>='$date_update_start_u' and  report_account_date <='$date_update_end_u' ";   
                   }else{

                   } 
 
                  


 if($p!=''){

      $date_update_start=$_GET['date_update_start'];
      $date_update_end=$_GET['date_update_end'];

      $date_update_start_u=substr($date_update_start,0 , 10)." 00:00:00";
      $date_update_end_u=substr($date_update_end,0 , 10)." 23:59:59";


 } 
 
               
 
?>


<?php

if($p==''){  



               $sql_report="SELECT sum(see_number) as see_number , sum(edit_listing) as edit_listing , sum(contact_listing) as contact_listing  , sum(listing_public) as listing_public 
                               , sum(upload_images) as upload_images , sum(delete_listing) as delete_listing , sum(create_listing) as create_listing , sum(create_listing_public) as create_listing_public , sum(create_deal) as create_deal , sum(create_subdeal) as create_subdeal 
                               FROM report_account  WHERE register_id='$USER_ID' ";  
               $result_report= $conn->query($sql_report); 
               $rs_report= $result_report->fetch_assoc();

               $see_number=$rs_report['see_number']; 
               $edit_listing=$rs_report['edit_listing'];
               $listing_public=$rs_report['listing_public'];
               $contact_listing=$rs_report['contact_listing'];
               $upload_images=$rs_report['upload_images'];
               $delete_listing=$rs_report['delete_listing'];
               $create_listing=$rs_report['create_listing'];
               $create_listing_public=$rs_report['create_listing_public'];
               $create_deal=$rs_report['create_deal'];
               $create_subdeal=$rs_report['create_subdeal'];
              ///  ///             
             
              $num_listing_all=$create_listing-$delete_listing;
              $update_listing_public=$listing_public+$create_listing_public;



  ?> 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-12">
            <h4>USER : <?php echo $register_name." | ".$register_email."<br>"."ข้อมูลอัพเดทล่าสุด : ".$date_time;?></h4>

         </div>

 
          <div class="col-lg-3 col-6">
           
            <a href="#"  >
              <div class="small-box bg-success">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $create_listing;?></h3>

                  <p style="margin-left: 20px;">Listing ที่คุณเพิ่ม</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                
              </div>
            </a>
          </div>


          <div class="col-lg-3 col-6">
          
            <a href="#"  >
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $delete_listing;?></h3>

                  <p style="margin-left: 20px;">Listing ถูกลบ</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                
              </div>
            </a>
          </div> 
 

          <div class="col-lg-3 col-6">
          
            <a href="#"  >
              <div class="small-box bg-success">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $upload_images;?></h3>

                  <p style="margin-left: 20px;">upload ภาพ</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                
              </div>
            </a>
          </div> 

          <div class="col-lg-3 col-6">
          
            <a href="#"  >
              <div class="small-box bg-success">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $create_deal;?></h3>

                  <p style="margin-left: 20px;">สร้าง Deal</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                
              </div>
            </a>
          </div> 


          <div class="col-lg-3 col-6">
          
            <a href="#"  >
              <div class="small-box bg-success">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $create_subdeal;?></h3>

                  <p style="margin-left: 20px;">นำเสนอห้อง</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                
              </div>
            </a>
          </div>          

          <div class="col-lg-3 col-6">
          
            <a href="#"  >
              <div class="small-box bg-success">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $edit_listing;?></h3>

                  <p style="margin-left: 20px;">ติดต่อ</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                
              </div>
            </a>
          </div>          
          <div class="col-lg-3 col-6">
          
            <a href="#"  >
              <div class="small-box bg-success">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $contact_listing;?></h3>

                  <p style="margin-left: 20px;">ติดต่อได้</p>
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
              -->
        
            <div class="card"> 
              <div class="card-header">
                <div class="card-body">

             <form method="post" id="form" enctype="multipart/form-data" action="./?page=portfolio_listing" class=" form-inline"> 
              
                <input type="text" class="form-control" style="width: 100%;" name="page"  value="portfolio_listing" hidden="hidden" >
                <input type="text" class="form-control" style="width: 100%;" name="check"  value="1" hidden="hidden" >  


                    <div class="container-fluid">
                      <div class="row">    


                        <div class="col-md-3">
                           <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Date วันเริ่ม : </label>
                              <div class="col-sm-7">
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date_update_start" value="<?php echo $date_update_start;?>" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                             </div>  
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Date วันสิ้นสุด : </label>
                              <div class="col-sm-7">
                                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="date_update_end" value="<?php echo $date_update_end;?>" />
                                    <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                             </div>  
                           </div>
                        </div>

                   
                        <br><br>
                        <div class="col-md-12"> 

                            <div class="col-md-12"> 
                             <center><button type="submit" class="btn btn-primary">Search</button>
                                  <a class="btn btn-primary" href="?page=portfolio_listing">clear</a>
                             </center>

                          </div>

                        </div>
                      </div>
                    </div>
              

                 </div>
              </div>
           </div>
            <!-- /.card -->  
        </form>
    </div>
  </div>
</div>


   
  <?php if($date_update_start!=''){ ?>


                  <table class="table table-bordered">
                    <thead>
                      <tr> 
                        <th style="width: 50px;" rowspan="2" >#</th>  
                        <th style="width: 80px;" rowspan="2" >Date</th> 
                        <th style="width: 300px;" colspan="3" >Listing</th>
                        <th style="width: 80px;" rowspan="2" >upload ภาพ</th>     
                        <th style="width: 200px;" colspan="2" >DEAL</th>  
                        <th style="width: 80px;" rowspan="2"   >ดูเบอร์</th>
                        <th style="width: 80px;" colspan="2" >การติดต่อ</th>
                        <th style="width: 300px;" colspan="3" >Listing (Public)</th>   
                      </tr>
                      <tr> 
                        <th style="width: 80px">เพิ่ม Listing</th>
                        <th style="width: 60px">ถูกลบ</th>
                        <th style="width: 80px">เหลือ Listing</th>
                        <th style="width: 75px">สร้าง Deal</th>
                        <th style="width: 85px">นำเสนอห้อง</th>
                        <th style="width: 80px;" >ติดต่อ</th>
                        <th style="width: 80px;" >ติดต่อได้</th>
                        <th style="width: 80px">Listingที่ได้</th>
                        <th style="width: 80px">ในระบบ</th>
                        <th style="width: 80px">นอกระบบ</th>
                      </tr>
                    </thead>
                    <tbody>
         
    <?php 

               $sql_report="SELECT report_account_date , see_number ,   edit_listing ,  contact_listing  ,  listing_public ,  upload_images , delete_listing , create_listing ,  create_listing_public ,  create_deal , create_subdeal 
                            FROM report_account  WHERE register_id='$USER_ID' $date_up order by  report_account_date DESC";  
               $result_report= $conn->query($sql_report);  
 

                 while($rs_report= $result_report->fetch_assoc()) {  $no++;

                       $report_account_date=$rs_report['report_account_date']; 
                       $see_number=$rs_report['see_number']; 
                       $edit_listing=$rs_report['edit_listing'];
                       $listing_public=$rs_report['listing_public'];
                       $contact_listing=$rs_report['contact_listing'];
                       $upload_images=$rs_report['upload_images'];
                       $delete_listing=$rs_report['delete_listing'];
                       $create_listing=$rs_report['create_listing'];
                       $create_listing_public=$rs_report['create_listing_public'];
                       $create_deal=$rs_report['create_deal'];
                       $create_subdeal=$rs_report['create_subdeal'];
                      ///  ///             
                     
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
                            <td><center><?php if($create_listing!=0){ echo number_format($create_listing); }else{ echo "-";}?> </center></td>
                            <td><center><?php if($delete_listing!=0){ echo number_format($delete_listing); }else{ echo "-";}?></center> </td>
                            <td><center><?php if($num_listing_all!=0){ echo number_format($num_listing_all); }else{ echo "-";}?></center> </td> 
                            <td><center><?php if($upload_images!=0){ echo number_format($upload_images); }else{ echo "-";}?></center> </td> 
                            <td><center><?php if($create_deal!=0){ echo number_format($create_deal); }else{ echo "-";}?></center> </td> 
                            <td><center><?php if($create_subdeal!=0){ echo number_format($create_subdeal); }else{ echo "-";}?></center> </td>  
                            <td><center><?php if($see_number!=0){ echo number_format($see_number); }else{ echo "-";}?></center> </td> 
                            <td><center><?php if($edit_listing!=0){ echo number_format($edit_listing); }else{ echo "-";}?></center> </td> 
                            <td><center><?php if($contact_listing!=0){ echo number_format($contact_listing); }else{ echo "-";}?></center> </td> 
                            <td><center><?php if($update_listing_public!=0){ echo number_format($update_listing_public); }else{ echo "-";}?></center> </td> 
                            <td><center><?php if($listing_public!=0){ echo number_format($listing_public); }else{ echo "-";}?></center> </td> 
                            <td><center><?php if($create_listing_public!=0){ echo number_format($create_listing_public); }else{ echo "-";}?></center> </td> 
                          </tr>

               <?php } ?>

                    </tbody>
                 </table>
    

    <?php } ?>
 

        </div>
      </div>
    </div>
</section>


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
  


<?php }else if($p=='listing_all'){ 

    $date_start=$_GET['date_start'];
    $date_end=$_GET['date_end'];
 

    if($date_start!='' and $date_end!=''){

        $year_u=substr($date_start,0 , 4 ); 
        $month_u=substr($date_start,5 , 2);
        $date_u=substr($date_start,8, 2 );
        $date_start=$year_u."-".$month_u."-".$date_u." 00:00:00";

        $date_start_u=$date_u."/".$month_u."/".$year_u;

        $year_u=substr($date_end,0 , 4 ); 
        $month_u=substr($date_end,5 , 2);
        $date_u=substr($date_end,8, 2 );
        $date_end=$year_u."-".$month_u."-".$date_u." 23:59:59";

        $date_end_u=$date_u."/".$month_u."/".$year_u;
    }


      if($date_start!=''){    

               $date_up=" and  report_account_date>='$date_start' and  report_account_date <='$date_end' ";   
              
              if($tab=='listing_create'){
                  $date_record=" and  ex_list_date_create>='$date_start' and  ex_list_date_create <='$date_end' "; 
              }else if($tab=='create_deal'){
                  $date_record=" and  create_deal_create>='$date_start' and  create_deal_create <='$date_end' ";        
              }else if($tab=='create_subdeal'){
                  $date_record=" and  subdeal.subdeal_create_date>='$date_start' and  subdeal.subdeal_create_date <='$date_end' ";    
              }else if($tab=='create_listing_public'){
                  $date_record=" and  ex_list_public_date>='$date_start' and  ex_list_public_date <='$date_end' ";  
              }else{
                  $date_record=" and  record_date>='$date_start' and  record_date <='$date_end' "; 
              }
      }else{

      } 
  

              ///  ///
               $sql_report="SELECT sum(see_number) as see_number , sum(edit_listing) as edit_listing , sum(contact_listing) as contact_listing  , sum(listing_public) as listing_public 
                               , sum(upload_images) as upload_images , sum(delete_listing) as delete_listing , sum(create_listing) as create_listing , sum(create_listing_public) as create_listing_public , sum(create_deal) as create_deal , sum(create_subdeal) as create_subdeal 
                               FROM report_account  WHERE register_id='$USER_ID' $date_up ";  
               $result_report= $conn->query($sql_report); 
               $rs_report= $result_report->fetch_assoc();

               $see_number=$rs_report['see_number']; 
               $edit_listing=$rs_report['edit_listing'];
               $listing_public=$rs_report['listing_public'];
               $contact_listing=$rs_report['contact_listing'];
               $upload_images=$rs_report['upload_images'];
               $delete_listing=$rs_report['delete_listing'];
               $create_listing=$rs_report['create_listing'];
               $create_listing_public=$rs_report['create_listing_public'];
               $create_deal=$rs_report['create_deal'];
               $create_subdeal=$rs_report['create_subdeal'];
                             ///  ///             
             
              $num_listing_all=$create_listing-$delete_listing;
              $update_listing_public=$listing_public+$create_listing_public;
 
 
             if($tab=='listing_create'){


                    $sql="SELECT ex_list_listing_code , ex_list_heading , ex_list_deal_type , ex_list_date_create ,ex_list_price , ex_list_listing_status , ex_list_rent_till , ex_list_remark , ex_list_close 
                          FROM   dbo_data_excel_listing  WHERE  ex_list_contact='$USER_ID' $date_record ";
                    $result_record= $conn->query($sql);  


             }else if($tab=='listing_upimage'){

                    $sql_record= "SELECT DISTINCT ex_list_id  FROM dbo_record WHERE record_user_id='$USER_ID' and record_note LIKE '%เพิ่มภาพประกอบ รหัสทรัพย์%'   $date_record "; 
                    $result_record=$conn->query($sql_record);                    

              }else if($tab=='edit_listing'){

                    $sql_record= "SELECT DISTINCT ex_list_id  FROM dbo_record WHERE record_user_id='$USER_ID' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%'  $date_record "; 
                    $result_record=$conn->query($sql_record);                    

              }else if($tab=='contact_listing'){

                    $sql_record= "SELECT DISTINCT ex_list_id  FROM dbo_record 
                           WHERE record_user_id='$USER_ID' and ex_list_listing_status='1' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record  or 
                                 record_user_id='$USER_ID' and ex_list_listing_status='3' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record  or 
                                 record_user_id='$USER_ID' and ex_list_listing_status='4' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record  or 
                                 record_user_id='$USER_ID' and ex_list_listing_status='5' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record  or 
                                 record_user_id='$USER_ID' and ex_list_listing_status='6' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record  or 
                                 record_user_id='$USER_ID' and ex_list_listing_status='15' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' $date_record "; 
                    $result_record=$conn->query($sql_record);                    

              }else if($tab=='create_deal'){

                    $sql_record= "SELECT * FROM  dbo_create_deal WHERE user_id='$USER_ID'  $date_record "; 
                    $result_record=$conn->query($sql_record);                    

              }else if($tab=='create_subdeal'){

                    $sql_record="SELECT * FROM  dbo_subdeal AS subdeal
                                 LEFT JOIN dbo_create_deal AS deal ON (subdeal.create_deal_code=deal.create_deal_code)
                                 WHERE subdeal.user_id='$USER_ID'  $date_record "; 
                    $result_record=$conn->query($sql_record);      

              }else if($tab=='create_listing_public'){

                    $sql="SELECT ex_list_listing_code , ex_list_heading , ex_list_deal_type , ex_list_date_create ,ex_list_price , ex_list_listing_status , ex_list_rent_till , ex_list_remark , ex_list_close , ex_list_public_date
                          FROM   dbo_data_excel_listing  WHERE  ex_list_contact='$USER_ID' $date_record ";
                    $result_record= $conn->query($sql);                  

             }



  ?>



 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 10px;">
 
          <div class="col-lg-12 col-12">
                  <h4>USER : <?php echo $register_name." | ".$register_email;?></h4> 
          </div>
          <div class="col-md-12">



            <div class="card">
              <div class="card-header">
                <div class="card-body"> 

                  <form method="post" id="form" enctype="multipart/form-data" action="./?page=portfolio_listing" class=" form-inline"> 
              
                <input type="text" class="form-control" style="width: 100%;" name="page"  value="portfolio_listing" hidden="hidden" >
                <input type="text" class="form-control" style="width: 100%;" name="p"  value="<?php echo $p;?>" hidden="hidden" >
                <input type="text" class="form-control" style="width: 100%;" name="tab"  value="<?php echo $tab;?>" hidden="hidden" >   
                <input type="text" class="form-control" style="width: 100%;" name="check"  value="1" hidden="hidden" >  

               <div class="container-fluid">
                <div class="row">    


                  <div class="col-md-4">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Date วันเริ่ม : </label>
                        <div class="col-sm-8">
                          <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date_update_start" value="<?php echo $date_start_u;?>" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                       </div>  
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Date วันสิ้นสุด : </label>
                        <div class="col-sm-8">
                          <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="date_update_end" value="<?php echo $date_end_u;?>" />
                              <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                       </div>  
                     </div>
                  </div>
           
               
                  <br><br>
                  <div class="col-md-12"> 

                      <div class="col-md-12"> 
                       <center><button type="submit" class="btn btn-primary">Search</button>
                            <a class="btn btn-primary" href="?page=portfolio_listing">clear</a>
                       </center>

                    </div>

                  </div>
                </div>
              </div>
              

                 </div>
              </div>
           </div>


            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a href="?page=portfolio_listing&p=listing_all&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=listing_create" class="nav-link <?php if($tab=='listing_create'){?>active<?php } ?>" >  เพิ่ม Listing 
                         <?php if($create_listing!='0'){ echo "(".$create_listing.")";} ?>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?page=portfolio_listing&p=listing_all&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=listing_upimage" class="nav-link <?php if($tab=='listing_upimage'){?>active<?php } ?>" >upload ภาพ
                         <?php if($upload_images!='0'){ echo "(".$upload_images.")";} ?>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="?page=portfolio_listing&p=listing_all&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=create_deal" class="nav-link <?php if($tab=='create_deal'){?>active<?php } ?>" >สร้าง Deal
                         <?php if($create_deal!='0'){ echo "(".$create_deal.")";} ?>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="?page=portfolio_listing&p=listing_all&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=create_subdeal" class="nav-link <?php if($tab=='create_subdeal'){?>active<?php } ?>" >นำเสนอห้อง
                         <?php if($create_subdeal!='0'){ echo "(".$create_subdeal.")";} ?>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="?page=portfolio_listing&p=listing_all&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=edit_listing" class="nav-link <?php if($tab=='edit_listing'){?>active<?php } ?>" >ติดต่อOwner (Listing) 
                         <?php if($edit_listing!='0'){ echo "(".$edit_listing.")";} ?>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?page=portfolio_listing&p=listing_all&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=contact_listing" class="nav-link <?php if($tab=='contact_listing'){?>active<?php } ?>" >ติดต่อOwnerได้ (Listing) 
                         <?php if($contact_listing!='0'){ echo "(".$contact_listing.")";} ?>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="?page=portfolio_listing&p=listing_all&date_start=<?php echo $date_start;?>&date_end=<?php echo $date_end;?>&tab=create_listing_public" class="nav-link <?php if($tab=='create_listing_public'){?>active<?php } ?>" >Listing นอกระบบ (Public) 
                         <?php if($create_listing_public!='0'){ echo "(".$create_listing_public.")";} ?>
                    </a>
                  </li>
                  <!--
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">ติดต่อได้</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab2" data-toggle="pill" href="#custom-tabs-one-profile2" role="tab" aria-controls="custom-tabs-one-profile2" aria-selected="false">Listingที่ได้ (public) </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab3" data-toggle="pill" href="#custom-tabs-one-profile3" role="tab" aria-controls="custom-tabs-one-profile3" aria-selected="false">Listingที่ได้ (เฉพาะในระบบ)</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab4" data-toggle="pill" href="#custom-tabs-one-profile4" role="tab" aria-controls="custom-tabs-one-profile4" aria-selected="false">Listingที่ได้ (นอกระบบ)</a>
                  </li> -->
                  <!--
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Messages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                  </li>-->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
 
   <div class="scroll">
        
    <?php if($tab=='listing_create' or $tab=='listing_upimage' or $tab=='edit_listing' or $tab=='contact_listing' or $tab=='create_listing_public'  ){  ?>

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 5px;">#</th> 
                        <th style="width: 8px">Listing Code</th>
                        <th style="width: 5px">Deal</th>
                        <th style="width: 40px">Price</th>
                        <th style="width: 400px;">Heading</th>
                        <th style="width: 10px">IMG</th>
                        <th style="width: 40px">Staus</th> 
 
                        <th style="width: 100px">
               <?php if($tab=='create_listing_public'){ 
                            echo "Public Date"; 
                     }else{
                            echo "Update Date"; 
                     }
               ?>

                        </th> 



                      </tr>
                    </thead>
                    <tbody>
           


     <?php 




                          // Check connection
   
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
 

       if($result_record->num_rows > 0) {
          // output data of each row
           while($rs=$result_record->fetch_assoc()) {
               
               $ex_list_id=$rs['ex_list_id'];


              if($tab!='listing_create' and $tab!='create_listing_public'){

                    $sql="SELECT ex_list_listing_code , ex_list_heading , ex_list_deal_type , ex_list_date_create ,ex_list_price , ex_list_listing_status , ex_list_rent_till , ex_list_remark , ex_list_close , ex_list_date_update FROM dbo_data_excel_listing where ex_list_listing_code='$ex_list_id' ";
                    $result= $conn->query($sql);  
                    $rs=$result->fetch_assoc();
 
              }
     
                   $ex_list_listing_status=$rs['ex_list_listing_status'];
                   $ex_list_listing_status_check=$rs['ex_list_listing_status'];
                   $ex_list_deal_type=$rs['ex_list_deal_type'];
                   $ex_list_remark=$rs['ex_list_remark']; 
                   $ex_list_date_create=$rs['ex_list_deal_type']; 
                   $ex_list_heading=$rs['ex_list_heading']; 
                   $ex_list_rent_till=$rs['ex_list_rent_till'];
                   $ex_list_price=$rs['ex_list_price'];
                   $ex_list_close=$rs['ex_list_close'];
                   $ex_list_id=$rs['ex_list_listing_code'];
                   $ex_list_public_date=$rs['ex_list_public_date'];
                   $ex_list_date_update=$rs['ex_list_date_update'];

                   if($ex_list_heading==''){ $ex_list_heading='';}
                   
                   $expire_check='';
            
                 if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  }
                 else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
                 else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
                 else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                                  //เช็ควันหมดอายุ
                                                 if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; 
                                                        $expire_check=' <span class="right badge badge-danger">New</span>';  
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
                 else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                                  //เช็ควันหมดอายุ
                                                 if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; 
                                                          $expire_check=' <span class="right badge badge-danger">New</span>';  
                                                  }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 
                                                           
                                                 }

                if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

                      ///////////   ////////////////
                 $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_id' ";  
                 $result_img= $conn->query($sql_img);
                 $num_img=mysqli_num_rows($result_img); 

                   $no++;   
  
       ?>  
                      <tr <?php if($ex_list_close=='1'){ ?>style="background-color: #990F02; color: #fff;" <?php } ?>  >
                        <td><?php echo $no;?></td>
                        <td><a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_id;?>" target="_black"><?php echo $ex_list_id;?></a></td>
                        <td><center><?php echo $ex_list_deal_type;?></center> </td>
                        <td><?php echo number_format($ex_list_price);?></td>
                        <td><?php echo $ex_list_heading;?></td>
                        <td>
                       <?php if($num_img!=''){ ?>
                                  
                                  <img src="../../images/icon/icon-true.png" width="15" >

                       <?php }else{ ?>
                                   <img src="../../images/icon/icon-no.png" width="15" > 
                       <?php } ?>
                        </td>
                        <td style="color:<?php echo $stauts_list_color;?>"><center ><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_id;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   > 
                                  <?php echo $ex_list_listing_status.$expire_check;  ?>
                                   <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <br><?php echo $ex_list_rent_till; } ?>
                                  </a>
                            </center>

                        </td>  
                        <td style="width: 80px"><center>
                         <?php if($tab=='create_listing_public'){ 
                                      echo $ex_list_public_date;
                               }else{
                                     echo $ex_list_date_update;
                               } ?>          
                             </center></td>  
                      </tr>

            
            <!-- /.col -->
        <?php }
          } ?>

 
                 
                    </tbody>
                  </table>

 <?php } ?>



 <?php if($tab=='create_deal'){  ?>


                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 50px;">#</th>    
                        <th style="width: 80px;">CODE</th>                    
                        <th style="width: 280px;">ชื่อลูกค้า</th>
                        <th>ความต้องการ</th> 
                        <th>Budget </th> 
                        <th>Process</th>
                        <th>เสนอห้อง</th>    
                        <th>workload</th> 
                        <th>วันที่สร้าง </th>  
                        <th>วันที่อัพเดท </th>    
                      </tr>
                    </thead>
                    <tbody>
           


     <?php  
                          // Check connection
   
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
 

       if($result_record->num_rows > 0) {
          // output data of each row
           while($rs=$result_record->fetch_assoc()) {   $no++;    
 
               $create_deal_id=$rs['create_deal_id'];
               $create_deal_code=$rs['create_deal_code'];
               $create_deal_title=$rs['create_deal_title'];   
               $create_deal_attention=$rs['create_deal_attention'];
               $create_deal_type=$rs['create_deal_type'];     
               $buyer_contact_code=$rs['buyer_contact_code'];  
               $create_deal_sale=$rs['create_deal_sale'];  
               $contact_deal_win=$rs['contact_deal_win'];  
               $create_deal_budget_start=$rs['create_deal_budget_start']; 
               $create_deal_budget_end=$rs['create_deal_budget_end']; 
               $stock_offer=$rs['stock_offer']; 
               $sale_offer=$rs['sale_offer']; 
               $workload=$rs['workload']; 
               $create_deal_create=$rs['create_deal_create']; 
               $create_deal_update=$rs['create_deal_update']; 
               $message_stock_id=$rs['message_stock_id']; 

               $sum_offer=$stock_offer+$sale_offer;

               $budget=number_format($create_deal_budget_start)." - ".number_format($create_deal_budget_end);

               $color_text="color: #000;";
               $bg="background-color: #fff;"; 


               if($workload=='0'){
                      $workload_text="ไม่ระบุ"; $workload_bg_icon="#3949ab;"; $workload_text_color="#fff;"; 
               }else if($workload=='1'){
                      $workload_text="In Progress";  $workload_bg_icon="#fcecd2;";  $workload_text_color="#000;"; 
               }else if($workload=='2'){
                      $workload_text="Active";  $workload_bg_icon="#ffce7f;";  $workload_text_color="#000;"; 
               }else if($workload=='3'){
                      $workload_text="Closing";  $workload_bg_icon="#fe9805;";  $workload_text_color="#fff;"; 
               }else if($workload=='4'){
                      $workload_text="Close Won";  $workload_bg_icon="#158000;";  $workload_text_color="#fff;";  
               }else if($workload=='5'){
                      $workload_text="Close Lost "; $workload_bg_icon="#fe0505;";  $workload_text_color="#fff;";  
               }


               if($create_deal_attention==''){ //ซื้อ

                   if($contact_deal_win=='1'){ $deal_status="15"; $status_name="เสนอห้อง"; $status_icon="float-center badge"; $bg_icon="#5e92c2;"; $text_color="#fff;"; }
                   else if($contact_deal_win=='2'){ $deal_status="30"; $status_name="นัดชมทรัพย์"; $status_icon="float-center badge"; $bg_icon="#17a2b8;";$text_color="#fff;"; } 
                   else if($contact_deal_win=='3'){ $deal_status="45"; $status_name="ชมทรัพย์แล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;";$text_color="#fff;"; }
                   else if($contact_deal_win=='10'){ $deal_status="50"; $status_name="จองแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='4'){ $deal_status="60"; $status_name="นัดเซ็นสัญญา"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='5'){ $deal_status="70"; $status_name="เซ็นสัญญาแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='6'){ $deal_status="80"; $status_name="นัดโอน"; $status_icon="float-center badge"; $bg_icon="#ffd966;"; $text_color="#fff;";}
                   else if($contact_deal_win=='7'){ $deal_status="90"; $status_name="โอนแล้ว"; $status_icon="float-center badge"; $bg_icon="#ffd966;"; $text_color="#fff;";}
                   else if($contact_deal_win=='8'){ $deal_status="100"; $status_name="Close Won"; $status_icon="float-center badge"; $bg_icon="#806000;"; $text_color="#fff;";  $bg="background-color: #d8f5c6;";   } 
                   else if($contact_deal_win=='9'){ $deal_status="100"; $status_name="Close Lost"; $status_icon="float-center badge"; $bg_icon="#e51c23;"; $text_color="#fff;"; $bg="background-color: #f5c6cc;";      } 
                   else{  $deal_status="1"; $status_name="ไม่มีข้อมูลเสนอห้อง"; $status_icon="float-center badge bg-danger"; }

               }else{ //เช่า

                   if($contact_deal_win=='1'){ $deal_status="15"; $status_name="เสนอห้อง"; $status_icon="float-center badge"; $bg_icon="#5e92c2;"; $text_color="#fff;";}
                   else if($contact_deal_win=='2'){ $deal_status="30"; $status_name="นัดชมทรัพย์"; $status_icon="float-center badge";  $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='3'){ $deal_status="45"; $status_name="ชมทรัพย์แล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='10'){ $deal_status="50"; $status_name="จองแล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='4'){ $deal_status="60"; $status_name="นัดเซ็นสัญญา"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='5'){ $deal_status="80"; $status_name="เซ็นสัญญาแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";} 
                   else if($contact_deal_win=='8'){ $deal_status="100"; $status_name="Close Won"; $status_icon="float-center badge"; $bg_icon="#806000;"; $text_color="#fff;"; $bg="background-color: #d8f5c6;";  } 
                   else if($contact_deal_win=='9'){ $deal_status="100"; $status_name="Close Lost"; $status_icon="float-center badge";$bg_icon="#e51c23;"; $text_color="#fff;"; $bg="background-color:  #f5c6cc;";  } 
                   else{  $deal_status="1"; $status_name="ไม่มีข้อมูลเสนอห้อง"; $status_icon="float-center badge bg-danger"; }

               }

               if($create_deal_attention=='1'){ 
                     $attention="ซื้อ"; 
               }else if($create_deal_attention=='2'){  
                     $attention="เช่า"; 
               }
                   
                   $expire_check=''; 
                    
  
       ?>  
                      <tr  style="font-size: 15px; <?php echo $bg.$color_text;?>  " >
                          <td><center><?php echo $no;?></center></td> 
                          <td><a href="<?php echo $deal_buyer_url;?>"><?php echo $create_deal_code;?></a></td> 
                          <td style="text-align: left;"><?php echo $create_deal_title;?> <?php if($buyer_contact_status=='1'){  }else if($buyer_contact_status=='2'){  echo " (Agent)"; }else{  } ?></td>
                          <td><?php echo $attention;?></td>
                          <td><?php echo $budget;?></td> 
                          
                            <td class="project_progress" style="padding: 5px;">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $deal_status;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $deal_status;?>%">
                                    </div>
                                </div>
                                <small style="font-size: 15px;">
                                    <center><span  class="<?php echo $status_icon;?>" style="background-color: <?php echo $bg_icon;?> color:<?php echo $text_color;?>"><?php echo $status_name;?></span></center>
                                </small>
                            </td>
                            <td style="text-align: center;"  >
                                <?php echo $sum_offer;?>
                            </td>  
                            
                            <td style="text-align: center;font-size: 16px;" >
       
                    <?php if( $_SESSION['STATUS_ID']=='1' and $_SESSION['STATUS_HEAD']=='1' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?> 

                                <button type="button" class="float-center badge" style=" background-color: <?php echo $workload_bg_icon;?>; color: <?php echo $workload_text_color;?>;"  data-toggle="modal" data-target="#modal-default<?php echo $create_deal_code;?>">
                                          <?php echo $workload_text;?> 
                                </button>

                    <?php }else{ ?>
                                <button type="button" class="float-center badge" style=" background-color: <?php echo $workload_bg_icon;?>; color: <?php echo $workload_text_color;?>;"  data-toggle="modal" >
                                          <?php echo $workload_text;?> 
                                </button>
                    <?php } ?>
                                
                            </td>
                            <td><?php echo $create_deal_create;?></td>   
                            <td><?php echo $create_deal_update;?></td>
                  
                      </tr>

            
            <!-- /.col -->
        <?php }
          } ?>

 
                 
                    </tbody>
                  </table>


 <?php } ?>



 <?php if($tab=='create_subdeal'){  ?>


                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 50px;">#</th>    
                        <th style="width: 140px;">CX ที่นำเสนอ</th>   
                        <th style="width: 100px;">CODE DEAL</th>                  
                        <th style="width: 300px;">ชื่อลูกค้า</th>
                        <th>ความต้องการ</th> 
                        <th>Budget </th> 
                        <th>Process</th>  
                        <th>workload</th> 
                        <th>วันที่นำเสนอห้อง </th>    
                      </tr>
                    </thead>
                    <tbody>
           


     <?php  
                          // Check connection
   
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
 

       if($result_record->num_rows > 0) {
          // output data of each row
           while($rs=$result_record->fetch_assoc()) {   $no++;    
 
               $ex_list_listing_code=$rs['ex_list_listing_code'];
               $create_deal_id=$rs['create_deal_id'];
               $create_deal_code=$rs['create_deal_code'];
               $create_deal_title=$rs['create_deal_title'];   
               $create_deal_attention=$rs['create_deal_attention'];
               $create_deal_type=$rs['create_deal_type'];     
               $buyer_contact_code=$rs['buyer_contact_code'];  
               $create_deal_sale=$rs['create_deal_sale'];  
               $contact_deal_win=$rs['contact_deal_win'];  
               $create_deal_budget_start=$rs['create_deal_budget_start']; 
               $create_deal_budget_end=$rs['create_deal_budget_end']; 
               $stock_offer=$rs['stock_offer']; 
               $sale_offer=$rs['sale_offer']; 
               $workload=$rs['workload']; 
               $subdeal_create_date=$rs['subdeal_create_date'];  
               $message_stock_id=$rs['message_stock_id']; 

               $sum_offer=$stock_offer+$sale_offer;

               $budget=number_format($create_deal_budget_start)." - ".number_format($create_deal_budget_end);

               $color_text="color: #000;";
               $bg="background-color: #fff;"; 


               if($workload=='0'){
                      $workload_text="ไม่ระบุ"; $workload_bg_icon="#3949ab;"; $workload_text_color="#fff;"; 
               }else if($workload=='1'){
                      $workload_text="In Progress";  $workload_bg_icon="#fcecd2;";  $workload_text_color="#000;"; 
               }else if($workload=='2'){
                      $workload_text="Active";  $workload_bg_icon="#ffce7f;";  $workload_text_color="#000;"; 
               }else if($workload=='3'){
                      $workload_text="Closing";  $workload_bg_icon="#fe9805;";  $workload_text_color="#fff;"; 
               }else if($workload=='4'){
                      $workload_text="Close Won";  $workload_bg_icon="#158000;";  $workload_text_color="#fff;";  
               }else if($workload=='5'){
                      $workload_text="Close Lost "; $workload_bg_icon="#fe0505;";  $workload_text_color="#fff;";  
               }


               if($create_deal_attention==''){ //ซื้อ

                   if($contact_deal_win=='1'){ $deal_status="15"; $status_name="เสนอห้อง"; $status_icon="float-center badge"; $bg_icon="#5e92c2;"; $text_color="#fff;"; }
                   else if($contact_deal_win=='2'){ $deal_status="30"; $status_name="นัดชมทรัพย์"; $status_icon="float-center badge"; $bg_icon="#17a2b8;";$text_color="#fff;"; } 
                   else if($contact_deal_win=='3'){ $deal_status="45"; $status_name="ชมทรัพย์แล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;";$text_color="#fff;"; }
                   else if($contact_deal_win=='10'){ $deal_status="50"; $status_name="จองแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='4'){ $deal_status="60"; $status_name="นัดเซ็นสัญญา"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='5'){ $deal_status="70"; $status_name="เซ็นสัญญาแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='6'){ $deal_status="80"; $status_name="นัดโอน"; $status_icon="float-center badge"; $bg_icon="#ffd966;"; $text_color="#fff;";}
                   else if($contact_deal_win=='7'){ $deal_status="90"; $status_name="โอนแล้ว"; $status_icon="float-center badge"; $bg_icon="#ffd966;"; $text_color="#fff;";}
                   else if($contact_deal_win=='8'){ $deal_status="100"; $status_name="Close Won"; $status_icon="float-center badge"; $bg_icon="#806000;"; $text_color="#fff;";  $bg="background-color: #d8f5c6;";   } 
                   else if($contact_deal_win=='9'){ $deal_status="100"; $status_name="Close Lost"; $status_icon="float-center badge"; $bg_icon="#e51c23;"; $text_color="#fff;"; $bg="background-color: #f5c6cc;";      } 
                   else{  $deal_status="1"; $status_name="ไม่มีข้อมูลเสนอห้อง"; $status_icon="float-center badge bg-danger"; }

               }else{ //เช่า

                   if($contact_deal_win=='1'){ $deal_status="15"; $status_name="เสนอห้อง"; $status_icon="float-center badge"; $bg_icon="#5e92c2;"; $text_color="#fff;";}
                   else if($contact_deal_win=='2'){ $deal_status="30"; $status_name="นัดชมทรัพย์"; $status_icon="float-center badge";  $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='3'){ $deal_status="45"; $status_name="ชมทรัพย์แล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='10'){ $deal_status="50"; $status_name="จองแล้ว"; $status_icon="float-center badge"; $bg_icon="#17a2b8;"; $text_color="#fff;";}
                   else if($contact_deal_win=='4'){ $deal_status="60"; $status_name="นัดเซ็นสัญญา"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";}
                   else if($contact_deal_win=='5'){ $deal_status="80"; $status_name="เซ็นสัญญาแล้ว"; $status_icon="float-center badge"; $bg_icon="#1f4e78;"; $text_color="#fff;";} 
                   else if($contact_deal_win=='8'){ $deal_status="100"; $status_name="Close Won"; $status_icon="float-center badge"; $bg_icon="#806000;"; $text_color="#fff;"; $bg="background-color: #d8f5c6;";  } 
                   else if($contact_deal_win=='9'){ $deal_status="100"; $status_name="Close Lost"; $status_icon="float-center badge";$bg_icon="#e51c23;"; $text_color="#fff;"; $bg="background-color:  #f5c6cc;";  } 
                   else{  $deal_status="1"; $status_name="ไม่มีข้อมูลเสนอห้อง"; $status_icon="float-center badge bg-danger"; }

               }

               if($create_deal_attention=='1'){ 
                     $attention="ซื้อ"; 
               }else if($create_deal_attention=='2'){  
                     $attention="เช่า"; 
               }
                   
                   $expire_check=''; 
                    
  
       ?>  
                      <tr  style="font-size: 15px; <?php echo $bg.$color_text;?>  " >
                          <td><center><?php echo $no;?></center></td> 
                          <td><a href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" target="_black"><?php echo $ex_list_listing_code;?></a></td>
                          <td><a href="<?php echo $deal_buyer_url;?>"><?php echo $create_deal_code;?></a></td> 
                          <td style="text-align: left;"><?php echo $create_deal_title;?> <?php if($buyer_contact_status=='1'){  }else if($buyer_contact_status=='2'){  echo " (Agent)"; }else{  } ?></td>
                          <td><?php echo $attention;?></td>
                          <td><?php echo $budget;?></td> 
                          
                            <td class="project_progress" style="padding: 5px;">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $deal_status;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $deal_status;?>%">
                                    </div>
                                </div>
                                <small style="font-size: 15px;">
                                    <center><span  class="<?php echo $status_icon;?>" style="background-color: <?php echo $bg_icon;?> color:<?php echo $text_color;?>"><?php echo $status_name;?></span></center>
                                </small>
                            </td> 
                            
                            <td style="text-align: center;font-size: 16px;" >
       
                    <?php if( $_SESSION['STATUS_ID']=='1' and $_SESSION['STATUS_HEAD']=='1' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?> 

                                <button type="button" class="float-center badge" style=" background-color: <?php echo $workload_bg_icon;?>; color: <?php echo $workload_text_color;?>;"  data-toggle="modal" data-target="#modal-default<?php echo $create_deal_code;?>">
                                          <?php echo $workload_text;?> 
                                </button>

                    <?php }else{ ?>
                                <button type="button" class="float-center badge" style=" background-color: <?php echo $workload_bg_icon;?>; color: <?php echo $workload_text_color;?>;"  data-toggle="modal" >
                                          <?php echo $workload_text;?> 
                                </button>
                    <?php } ?>
                                
                            </td>
                            <td><?php echo $subdeal_create_date;?></td>    
                  
                      </tr>

            
            <!-- /.col -->
        <?php }
          } ?>

 
                 
                    </tbody>
                  </table>


 <?php } ?>
 

     </div>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
 
 
  



                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile2" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab2">

 


                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile3" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab3"> 


 



                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile4" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab4"> 

 


                  </div>





                </div>
              </div>
              <!-- /.card -->
            </div>



            <div class="card">
              <div class="card-header">
                <div class="card-body">


               <div class="container-fluid">
                <div class="row">
     
    
             
                </div>
              </div>



                </div>
                <!-- /.card-body -->
              </div>
            </div>          
          </div>
        </div>

      </div>
    </section>




<?php } ?>

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