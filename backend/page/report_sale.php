




 
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
          <div class="col-lg-12 col-12">
            <h4>USER : <?php echo $register_name." | ".$register_email;?></h4>

         </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="?page=portfolio_listing&del=0&user=<?php echo $user;?>&page_no=1"  >
              <div class="small-box bg-success">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $num_listing;?></h3>

                  <p style="margin-left: 20px;">Listing ที่คุณเพิ่ม (ไม่รวมที่ลบ)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                
              </div>
            </a>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="?page=portfolio_listing&del=1&user=<?php echo $user;?>&page_no=1"  >
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3  style="margin-left: 20px;"><?php echo $num_listing_del;?></h3>

                  <p style="margin-left: 20px;">Listing ที่คุณลบไป</p>
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
                <ul class="nav nav-pills ml-auto p-2" style="font-size: 14px;">
                  <li class="nav-item"><a class="nav-link <?php if($p==''){?>active<?php } ?>" href="?page=report_sale"  >รวม</a></li>
                  <li class="nav-item"><a href="?page=report_sale&p=look_tel" class="nav-link <?php if($p=='look_tel'){?>active<?php } ?>" >ดูเบอร์</a></li>
                </ul>    
              </div>

              
            <div class="card card-primary" style="padding: 10px;">
              <div class="card-header">
                <h3 class="card-title">ค้นหา</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" id="form" enctype="multipart/form-data" action="https://connex.in.th/backend/?page=portfolio_listing" class=" form-inline"> 
              
              <input type="text" class="form-control" style="width: 100%;" name="page"  value="portfolio_listing" hidden="hidden" >
              <input type="text" class="form-control" style="width: 100%;" name="check"  value="1" hidden="hidden" >
              <input type="text" class="form-control" style="width: 100%;" name="del"  value="<?php echo $del_get;?>" hidden="hidden" >
              <input type="text" class="form-control" style="width: 100%;" name="user_check"  value="<?php echo $user;?>" hidden="hidden" >
                
              <div class="card-body">

               <div class="container-fluid">
                <div class="row">
             
                  <div class="col-md-4">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">Date (วันเริ่มต้น): </label>
                        <div class="col-sm-6">
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date_start" value="<?php echo $date_start;?>" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                       </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-6 col-form-label">Date (วันสิ้นสุด): </label>
                        <div class="col-sm-6">
                          <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="date_end" value="<?php echo $date_end;?>" />
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
 
            
                  <br><br>
                  <div class="col-md-12"> 
                     <center><button type="submit" class="btn btn-primary">Search</button>
                          <a class="btn btn-primary" href="?page=portfolio_listing&user=<?php echo $user;?>">clear</a>
                     </center>

                  </div>


                </div>
              </div>



                </div>
                <!-- /.card-body --> 
                  
                
              </form>
            </div>
            <!-- /.card -->  
 
 

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


<?php if($p=='look_tel'){ ?>

 
 <div class="scroll">
              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table   class="" style="font-size: 10px;" >
                  <thead>
                  <tr >          
                    <th>No</th>
                    <th>ชื่อเซลล์</th>
                    <th>ดูเบอร์โทรศัพท์</th>        
                    <th>อัพเดท status</th>                    
                    <th>%การอัพเดท</th>                 
                  </tr>
                  </thead>
                  </tr>
                  </thead>
                  <tbody>
   <?php
                        // Check connection
 





     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }

     $no=0;

 



if($p==''){



 if (isset($page_no) && $page_no!="" && $page_no!="l") {
    $page_no = $page_no;
    } else {
        $page_no = 1;
        }

    $total_records_per_page = 200;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 


/*
SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers
ON Orders.CustomerID=Customers.CustomerID; */



 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM register_status AS register 

                    where  register_status='1' and register_lcok='0' LIKE '%$del_get%' ");
    

    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1
 

     $sql="SELECT * FROM dbo_register AS register where register_status='1' and register_lcok='0' 
           order by register_id  ASC   LIMIT $offset, $total_records_per_page ";  
     $result = $conn->query($sql);

} 
 

   $sumpage=$page_no-1;
   
   $sumpage=$sumpage*100;
   $no=$sumpage;

     if($result->num_rows > 0) {
        // output data of each row
         while($rs_register=$result->fetch_assoc()) {   
 

         $register_id=$rs_register['register_id'];
         $register_name=$rs_register['register_name'];
         $register_lastname=$rs_register['register_lastname'];
       

 if($p=='public'){
         $ex_list_date_update=$rs_listing['ex_list_public_date'];
 }

  
$year=substr($ex_list_date_update,0 , 4 );
$month=substr($ex_list_date_update,5 , 2 );
$day=substr($ex_list_date_update,8 , 2 );

$time=substr($ex_list_date_update,11 , 5 );
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




 $ex_list_date_create=$day_c." ".$month_c." ".$year_c." ".$time_c;

        
      /////////// type_zone ////////////////
             $sql_record="SELECT record_note FROM dbo_record where record_note LIKE '%คลิกดูเบอร์ Owner%' and  
                          record_user_id='$register_id' ";  
             $result_record= $conn->query($sql_record);
             $rs_record=$result_record->fetch_assoc();

             $count_see_number=$result_record->num_rows;
 
            
      ////////// End type_zone ////////////////

      /////////// type_zone ////////////////
             $sql_record="SELECT record_note FROM dbo_record where record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' and  
                          record_user_id='$register_id' and record_date >='$date_start_check' and record_date<='$date_end_check'  ";  
             $result_record= $conn->query($sql_record);
             $rs_record=$result_record->fetch_assoc();

             $count_see_number=$result_record->num_rows;
 
            
      ////////// End type_zone ////////////////




               //////////////    ////////////////////////////
             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $ex_list_contact=$rs_register['register_name']." | ".$rs_register['register_email'];
 
             $no++;   
 
       

     ?> 

                  <tr style="font-size: 10px; " style="width: 100%;"  >
                    <th><?php echo $no;?></th>
                    <td    > 

                  <center style="width: 70px; " >

                    <a target="_blank" href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" title="<?php echo "UPDATEข้อมูล : ".$ex_list_date_update." | ผู้เพิ่มข้อมูล : ".$ex_list_contact;?>"  >
                      <?php echo $ex_list_listing_code;?> </a>
                                           
                      
                        
                        
                  </center>
                  
                    </td>
          
 
                  </tr>  
      <?php 
             }
         }  ?>


              
 
                  </tbody>
          
                </table>
              </div>
              <!-- /.card-body -->
            </div>


</div>

 











             
        </div>
      </div>
    </section>

 