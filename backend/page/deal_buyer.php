
<?php


    isset( $_GET['page_no'] ) ? $page_no = $_GET['page_no'] : $page_no = "";
 
    isset( $_POST['check_page'] ) ? $check_page = $_POST['check_page'] : $check_page = "";
    $search_buyer='';

    if($check_page=='deal_buyer'){
  
          isset( $_POST['search'] ) ? $search = $_POST['search'] : $search = "";
          isset( $_POST['create_deal_sale_s'] ) ? $create_deal_sale_s = $_POST['create_deal_sale_s'] : $create_deal_sale_s = "";
          isset( $_POST['contact_deal_win_s'] ) ? $contact_deal_win_s = $_POST['contact_deal_win_s'] : $contact_deal_win_s = "";
          isset( $_POST['workload_s'] ) ? $workload_s = $_POST['workload_s'] : $workload_s = "";
          isset( $_POST['deal_attention_s'] ) ? $deal_attention_s = $_POST['deal_attention_s'] : $deal_attention_s = "";
          isset( $_POST['source_code_s'] ) ? $source_code_s = $_POST['source_code_s'] : $source_code_s = "";
          isset( $_POST['contact_code_s'] ) ? $contact_code_s = $_POST['contact_code_s'] : $contact_code_s = "";
 
          echo("<script> top.location.href='?page=deal_buyer&search=$search&create_deal_sale_s=$create_deal_sale_s&contact_deal_win_s=$contact_deal_win_s&workload_s=$workload_s&deal_attention_s=$deal_attention_s&source_code_s=$source_code_s&contact_code_s=$contact_code_s&page_no=1'</script>"); 
      
    }else{
 

          isset( $_GET['search'] ) ? $search = $_GET['search'] : $search = "";
          isset( $_GET['create_deal_sale_s'] ) ? $create_deal_sale_s = $_GET['create_deal_sale_s'] : $create_deal_sale_s = "";
          isset( $_GET['contact_deal_win_s'] ) ? $contact_deal_win_s = $_GET['contact_deal_win_s'] : $contact_deal_win_s = "";
          isset( $_GET['workload_s'] ) ? $workload_s = $_GET['workload_s'] : $workload_s = "";
          isset( $_GET['deal_attention_s'] ) ? $deal_attention_s = $_GET['deal_attention_s'] : $deal_attention_s = "";
          isset( $_GET['source_code_s'] ) ? $source_code_s = $_GET['source_code_s'] : $source_code_s = "";
          isset( $_GET['contact_code_s'] ) ? $contact_code_s = $_GET['contact_code_s'] : $contact_code_s = "";

          $url_page_s="?page=deal_buyer&search=$search&create_deal_sale_s=$create_deal_sale_s&contact_deal_win_s=$contact_deal_win_s&workload_s=$workload_s&deal_attention_s=$deal_attention_s&source_code_s=$source_code_s&contact_code_s=$contact_code_s";

    }





?>


  <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="template/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://rawgit.com/dbrekalo/attire/master/dist/js/build.min.js"></script>

        <link rel="stylesheet" href="dist/fastselect.css">
        <script src="dist/fastselect.standalone.js"></script>





    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-12">
            <!-- general form elements -->
 
              <!-- /.card-header -->
              <!-- form start -->
                <div class="row">

       <?php if($status=='calendar'){  //deal_buyer ?>

                    <div class="col-md-5"></div>
                    <div class="col-md-3"></div>  
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=deal_buyer" class="btn btn-block btn-primary btn-lg" > Create deal ซื้อทรัพย์</a>
                    </div>     
                    
           <?php if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' ){  ?>    
                     <div class="col-md-2" style="padding: 10px;">
                               <a href="?page=deal_buyer&status=report_case" class="btn btn-block btn-primary btn-lg" >รายงาน</a>
                     </div>
             <?php } ?>

       <?php }else if($status==''){ ?>
    
     
            <?php if($_SESSION['STATUS_HEAD']=='1'){   ?>


                    <div class="col-md-4"></div>    
                    <div class="col-md-2" style="padding: 10px;"> 
                    </div>
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=deal_buyer&status=calendar" class="btn btn-block btn-primary btn-lg" > ปฏิทิน</a>
                    </div>
                     <div class="col-md-2" style="padding: 10px;">
                               <a href="?page=deal_buyer&status=report_case" class="btn btn-block btn-primary btn-lg" >รายงาน</a>
                     </div>
                     <div class="col-md-2" style="padding: 10px;">
                               <a href="?page=request_deal&status=create" class="btn btn-block btn-primary btn-lg" >คำขอเปิด Deal</a>
                     </div>

           <?php }else if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' ){  ?>  

                    <div class="col-md-4"></div>    
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=create_deal_buyer&status=create&step=1" class="btn btn-block btn-primary btn-lg" > เพิ่มข้อมูล</a>
                    </div>
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=deal_buyer&status=calendar" class="btn btn-block btn-primary btn-lg" > ปฏิทิน</a>
                    </div>
                     <div class="col-md-2" style="padding: 10px;">
                               <a href="?page=deal_buyer&status=report_case" class="btn btn-block btn-primary btn-lg" >รายงาน</a>
                     </div>
                     <div class="col-md-2" style="padding: 10px;">
                               <a href="?page=request_deal" class="btn btn-block btn-primary btn-lg" >คำขอเปิด Deal</a>
                     </div>
 

           <?php }else{ ?>

                    <div class="col-md-5"></div>
                    <div class="col-md-3"></div>     
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=request_deal&status=create" class="btn btn-block btn-primary btn-lg" > คำขอเปิด Deal </a>
                    </div>
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=deal_buyer&status=calendar" class="btn btn-block btn-primary btn-lg" > ปฏิทิน</a>
                    </div>
             <?php } ?>  
      


       <?php }else if($status=='report_case'){ ?>

                    <div class="col-md-5"></div>
                    <div class="col-md-3"></div>    
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=deal_buyer" class="btn btn-block btn-primary btn-lg" > Create deal ซื้อทรัพย์</a>
                    </div>         
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=create_listing&status=create" class="btn btn-block btn-primary btn-lg" onclick="showAndHide()" id="link_check" > เพิ่มทรัพย์ในระบบ</a>
                    </div>           
       <?php } ?>

 

                </div> 
        
    
  <?php if($status!='calendar' and $status!='report_case'){  //deal_buyer ?>


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
  font-size: 12px;
  text-align: center;

  
}
tr:nth-child(even){background-color: #f2f2f2}
tr:hover {background-color: #f5f5f5}
</style>



 <?php
 
if($_GET['page_no']==''){
   echo("<script> top.location.href='?page=deal_buyer&page_no=1'</script>");   
}
 $sub_text_1= substr($_SERVER['REQUEST_URI'],-9);

$page_no= substr($sub_text_1,6);  
 
$page_no = str_replace("=","",$page_no,$count); 
$page_no = str_replace("o","",$page_no,$count); 
//echo $page_no." ".$cate_id;




     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }

     $no=0;

   
 if (isset($page_no) && $page_no!="" && $page_no!="l") {
    $page_no = $page_no;
    } else {
        $page_no = 1;
        }

if($p=='delete'){
    $total_records_per_page = 30;
}else{
    $total_records_per_page = 30;
}

    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 

?>


<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>



            <div class="card card-primary" style="padding: 10px;">
              <div class="card-header">
                <h3 class="card-title">ค้นหา DEAL</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" id="form" enctype="multipart/form-data" action="" class=" form-inline"> 
              
              <input type="text" class="form-control" style="width: 100%;" name="check_page"  value="<?php echo $page;?>" hidden="hidden" >
                
              <div class="card-body">

               <div class="container-fluid">
                <div class="row" style="font-size: 13px;">
                                         <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group row">
                                              <label class="col-sm-2 col-form-label">ค้นหา : </label>
                                              <div class="col-sm-10">
                                                  <input type="text" class="form-control" style="width: 100%; height: 32px; " name="search"  value="<?php echo $search;?>"  >
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-group row">
                                              <label class="col-sm-4 col-form-label">ความสนใจ : </label>
                                              <div class="col-sm-8">
                                                  <select class="form-control select2bs4" name="deal_attention_s" id="deal_attention_s"  style="width: 100%;">
                                                     <option value="" <?php if($deal_attention_s=='' ){?> selected <?php } ?>>ไม่ระบุ</option>      
                                                     <option value="1" <?php if($deal_attention_s=='1'){?> selected <?php } ?>>ซื้อ</option>  
                                                     <option value="2" <?php if($deal_attention_s=='2'){?> selected <?php } ?>>เช่า</option> 
                                                     <option value="4" <?php if($deal_attention_s=='4'){?> selected <?php } ?>>ต่อสัญญา</option>   
                                                  </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-group row">
                                              <label class="col-sm-4 col-form-label">เลือกเซลล์ : </label>
                                              <div class="col-sm-8">
                                                  <select class="form-control select2bs4" name="create_deal_sale_s" id="create_deal_sale_s"  style="width: 100%;">
                                                      <option value="" <?php if($create_deal_sale_s==''){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option> 
                                                            <?php                          
                                                             $sql_register="SELECT * FROM dbo_register WHERE register_lcok='0' and register_status='1' or
                                                                            register_lcok='0' and register_status='4' 
                                                                            order by register_id ASC"; 
                                                             $result_register=$conn->query($sql_register);

                                                             if($result_register->num_rows > 0) { 
                                                                 while($rs_register=$result_register->fetch_assoc()) {      ?> 

                                                                       <option value="<?php echo $rs_register['register_id'];?>"  
                                                                        <?php if($rs_register['register_id']==$create_deal_sale_s){?> selected="selected" <?php } ?>  >
                                                                        <?php echo $rs_register['register_name']." ".$rs_register['register_lastname']." (".$rs_register['register_nickname'].")";?></option> 
                                                            <?php }
                                                            } ?>
                                                  </select>
                                              </div>
                                            </div>
                                          </div>
                                          <br><br> 
                                          <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group row">
                                              <label class="col-sm-3 col-form-label">Process : </label>
                                              <div class="col-sm-9">
                                                  <select class="form-control select2bs4" name="contact_deal_win_s" id="contact_deal_win_s"  style="width: 100%;">
                                                      <option value="" <?php if($contact_deal_win_s==''){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option> 
                                                      <option value="1" <?php if($contact_deal_win_s=='1'){?> selected="selected"  <?php } ?>  >เสนอห้อง</option>  
                                                      <option value="2" <?php if($contact_deal_win_s=='2'){?> selected="selected"  <?php } ?>  >นัดชมทรัพย์</option> 
                                                      <option value="3" <?php if($contact_deal_win_s=='3'){?> selected="selected"  <?php } ?>  >ชมทรัพย์แล้ว</option> 
                                                      <option value="10" <?php if($contact_deal_win_s=='10'){?> selected="selected"  <?php } ?> >จองแล้ว</option> 
                                                      <option value="4" <?php if($contact_deal_win_s=='4'){?> selected="selected"  <?php } ?>  >นัดเซ็นต์สัญญา</option>  
                                                      <option value="5" <?php if($contact_deal_win_s=='5'){?> selected="selected"  <?php } ?>  >เซ็นต์สัญญาแล้ว</option>  
                                                      <option value="6" <?php if($contact_deal_win_s=='6'){?> selected="selected"  <?php } ?>  >นัดโอน</option>  
                                                      <option value="7" <?php if($contact_deal_win_s=='7'){?> selected="selected"  <?php } ?>  >โอนแล้ว</option>  
                                                      <option value="8" <?php if($contact_deal_win_s=='8'){?> selected="selected"  <?php } ?>  >Close Won</option>  
                                                      <option value="9" <?php if($contact_deal_win_s=='9'){?> selected="selected"  <?php } ?>  >Close Lost</option>  
                                                  </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group row">
                                              <label class="col-sm-3 col-form-label">Workload : </label>
                                              <div class="col-sm-9">
                                                  <select class="form-control select2bs4" name="workload_s" id="workload_s"  style="width: 100%;">
                                                      <option value="" <?php if($workload_s==''){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option> 
                                                      <option value="1" <?php if($workload_s=='1'){?> selected="selected"  <?php } ?>  >In Progress</option>  
                                                      <option value="2" <?php if($workload_s=='2'){?> selected="selected"  <?php } ?>  >Active</option> 
                                                      <option value="3" <?php if($workload_s=='3'){?> selected="selected"  <?php } ?>  >Closing</option> 
                                                      <option value="4" <?php if($workload_s=='4'){?> selected="selected"  <?php } ?>  >Close Won</option> 
                                                      <option value="5" <?php if($workload_s=='5'){?> selected="selected"  <?php } ?>  >Close Lost</option>  
                                                  </select>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group row">
                                              <label class="col-sm-4 col-form-label">แหล่งที่มา : </label>
                                              <div class="col-sm-8">
                                                  <select class="form-control select2bs4"  name="source_code_s"  id="source_code_s"  style="width: 100%;">  
                                                       <option value="" <?php if($source_code_s==''){?> selected <?php } ?>>ไม่ระบุ</option>  
                                            <?php 
                                                   $strSQL = "SELECT * FROM type_source  "; 
                                                   $result=$conn->query($strSQL); 
                                                       
                                                   while($rs=$result->fetch_assoc()) { 

                                                         $source_code=$rs['source_code'];
                                                         $source_title=$rs['source_title'];
                                             ?>

                                                       <option value="<?php echo $source_code;?>" <?php if($source_code_s==$source_code){?> selected <?php } ?>><?php echo $source_title;?></option>  

                                            <?php } ?>
                                    
                                                  </select> 
                                              </div>
                                            </div>
                                          </div>
                                          <br><br>
                                          <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group row">
                                              <label class="col-sm-3 col-form-label">ติดต่อจาก : </label>
                                              <div class="col-sm-9">
                                                  <select class="form-control select2bs4"  name="contact_code_s"  id="contact_code_s"  style="width: 100%;">  
                                                       <option value="" <?php if($contact_code_s==''){?> selected <?php } ?>>ไม่ระบุ</option>  
                                            <?php 
                                                   $strSQL = "SELECT * FROM type_channel_contact  "; 
                                                   $result=$conn->query($strSQL); 
                                                       
                                                   while($rs=$result->fetch_assoc()) { 

                                                         $contact_code=$rs['contact_code'];
                                                         $contact_title=$rs['contact_title'];
                                             ?>

                                                       <option value="<?php echo $contact_code;?>" <?php if($contact_code_s==$contact_code){?> selected <?php } ?>><?php echo $contact_title;?></option>  

                                            <?php } ?>
                                    
                                                  </select>   
                                              </div>
                                            </div>
                                          </div>
                                  
               
                  <!--
                  <div class="col-md-3 col-sm-6">
                  </div>   -->         
                  <br><br>
             
 

                  <div class="col-md-12"  ><br>
                     <center><button type="submit" class="btn btn-primary">Search Data</button> &nbsp;&nbsp;&nbsp;
                          <a class="btn btn-primary" href="?page=deal_buyer&page_no=1">Clear Data</a>
                     </center>

                  </div>


                </div>
              </div>



                </div>
                <!-- /.card-body -->

                 
                  
                
              </form>
            </div>
            <!-- /.card -->




 <div class="scroll">

              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table   class="" style="font-size: 14px;" >

                  <thead>
                    <tr>     
                      <th style="width: 80px;">CODE</th>                    
                      <th style="width: 280px;">ชื่อลูกค้า</th>
                      <th>ความต้องการ</th> 
                      <th>Budget </th>   
                      <th>เซลล์ผู้ดูแล</th>
                      <th>Process</th>
                      <th>เสนอห้อง</th>   
                      <th>สต๊อกเสนอ</th> 
                      <th>มีห้องใหม่</th> 
                      <th>Requirements</th>
                      <th>workload</th> 
                      <th>วันที่สร้าง </th>  
                      <th>วันที่อัพเดท </th>          
                    </tr>
                  </thead>
                  <tbody>

  

   <?php
                        // Check connection
   
   if($search!=''){

         $sql_buyer="SELECT * FROM dbo_buyer_contact 
               WHERE buyer_contact_tel LIKE '%$search%' or buyer_contact_tel_2 LIKE '%$search%' or buyer_contact_tel_3 LIKE '%$search%' or buyer_contact_tel_4 LIKE '%$search%' 
                     or buyer_contact_line_id LIKE '%$search%' or buyer_contact_whatsapp LIKE '%$search%' 
                     or buyer_contact_code LIKE '%$search%'
               LIMIT 1";
         $result_buyer= $conn->query($sql_buyer);  
         $rs_buyer=$result_buyer->fetch_assoc();

         $buyer_contact_code=$rs_buyer['buyer_contact_code'];

         if($buyer_contact_code!=''){

              $search_buyer=" 
             or
             (
             deal.create_deal_sale='$USER_ID' and $STATUS_ID='1'  $search_deal_win  $search_deal_sale $search_workload  
             and deal.buyer_contact_code='$buyer_contact_code' $search_source $search_contact and deal.create_deal_attention LIKE '%$deal_attention_s%' 
             or
             $STATUS_ID!='1'  $search_deal_win  $search_deal_sale $search_workload 
             and deal.buyer_contact_code='$buyer_contact_code' $search_source $search_contact and deal.create_deal_attention LIKE '%$deal_attention_s%' 
             )      

               ";
         }

   }

   if($contact_deal_win_s==""){
           $search_deal_win="";
   }else{ 
           $search_deal_win=" and deal.contact_deal_win='$contact_deal_win_s' ";  
   }

   if($create_deal_sale_s==""){
           $search_deal_sale="";
   }else{
           $search_deal_sale=" and deal.create_deal_sale='$create_deal_sale_s' ";   
   }

   if($workload_s==""){
           $search_workload="";
   }else{
           $search_workload=" and deal.workload='$workload_s' ";
   }

   if($source_code_s==""){
           $search_source="";
   }else{
           $search_source=" and deal.source_code='$source_code_s' ";
   }

   if($contact_code_s==""){
           $search_contact="";
   }else{
           $search_contact=" and deal.contact_code='$contact_code_s' ";
   }


   if($_SESSION['STATUS_HEAD']=="1"){
         if($create_deal_sale_s==$USER_ID){
          
         }else{

             $i=0;

             $sql_register="SELECT * FROM dbo_register 
                   WHERE register_status_under='$USER_ID' or register_id='$USER_ID' ";
             $result_register= $conn->query($sql_register);  
             while($rs_register=$result_register->fetch_assoc()){ $i++;

                 if($i==1){  $num='';
                 }else{ $num =' or ';}
                 $register_sale=$rs_register['register_id'];
                 $sale_deal_register=$num." deal.create_deal_sale='$register_sale'
                   $search_deal_win  $search_deal_sale $search_workload and
                   deal.create_deal_title LIKE '%$search%' $search_buyer   $search_source $search_contact  and deal.create_deal_attention LIKE '%$deal_attention_s%' 
                      ";
                 $status_head=$status_head.$sale_deal_register;

             }

         }
   }else{
           $status_head="";
   }


   if($status_head!=''){
      
          $search_sql=$status_head ;

   }else{

          $search_sql=" 
             (   
             deal.create_deal_sale='$USER_ID' and $STATUS_ID='1'  $search_deal_win  $search_deal_sale $search_workload and
             deal.create_deal_title LIKE '%$search%' $search_buyer   $search_source $search_contact  and deal.create_deal_attention LIKE '%$deal_attention_s%'  
             or
             $STATUS_ID!='1'  $search_deal_win  $search_deal_sale $search_workload and
             deal.create_deal_title LIKE '%$search%' $search_buyer  $search_source $search_contact and deal.create_deal_attention LIKE '%$deal_attention_s%' 
             )
             or
             (
             deal.create_deal_sale='$USER_ID' and $STATUS_ID='1'  $search_deal_win  $search_deal_sale $search_workload and
             deal.create_deal_code LIKE '%$search%' $search_buyer  $search_source $search_contact and deal.create_deal_attention LIKE '%$deal_attention_s%' 
             or
             $STATUS_ID!='1'  $search_deal_win  $search_deal_sale $search_workload and
             deal.create_deal_code LIKE '%$search%' $search_buyer  $search_source $search_contact and deal.create_deal_attention LIKE '%$deal_attention_s%' 
             )
             $search_buyer
              
          ";

   }
 

     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }

     $no=0;
 
 

 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM dbo_create_deal  AS deal    
            
           WHERE 
             (   $search_sql  )
                     ");

    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1


     $sql="SELECT deal.create_deal_id , deal.create_deal_code , deal.create_deal_title , deal.create_deal_attention , deal.create_deal_type ,  deal.buyer_contact_code ,deal.create_deal_sale ,deal.contact_deal_win ,deal.create_deal_budget_start  , deal.create_deal_budget_end ,  deal.stock_offer , deal.sale_offer , deal.workload , deal.create_deal_create , deal.create_deal_update , deal.message_stock_id , deal.create_deal_attention_2 , deal.create_deal_budget_start_2 , deal.create_deal_budget_end_2  , deal.deal_date_remark , deal.create_deal_remark , deal.auto_offer
           FROM dbo_create_deal  AS deal  
            
           WHERE 
             (   $search_sql  )
       
             
           order by deal.create_deal_create DESC   LIMIT $offset, $total_records_per_page "; 
     $result = $conn->query($sql);


     if($result->num_rows > 0) {
        // output data of each row
         while($rs_deal=$result->fetch_assoc()) {    
         
         $create_deal_id=$rs_deal['create_deal_id'];
         $create_deal_code=$rs_deal['create_deal_code'];
         $create_deal_title=$rs_deal['create_deal_title'];   
         $create_deal_attention=$rs_deal['create_deal_attention'];
         $create_deal_type=$rs_deal['create_deal_type'];     
         $buyer_contact_code=$rs_deal['buyer_contact_code'];  
         $create_deal_sale=$rs_deal['create_deal_sale'];  
         $contact_deal_win=$rs_deal['contact_deal_win'];  
         $create_deal_budget_start=$rs_deal['create_deal_budget_start']; 
         $create_deal_budget_end=$rs_deal['create_deal_budget_end']; 
         $create_deal_remark=$rs_deal['create_deal_remark']; 
         $deal_date_remark=$rs_deal['deal_date_remark']; 

         $create_deal_budget_start_2=$rs_deal['create_deal_budget_start_2']; 
         $create_deal_budget_end_2=$rs_deal['create_deal_budget_end_2']; 
         $create_deal_attention_2=$rs_deal['create_deal_attention_2'];

         if($create_deal_attention_2!='0'){ 
             $create_deal_attention=$create_deal_attention_2;
             $create_deal_budget_start=$create_deal_budget_start_2;
             $create_deal_budget_end=$create_deal_budget_end_2;
         }

         $stock_offer=$rs_deal['stock_offer']; 
         $sale_offer=$rs_deal['sale_offer']; 
         $auto_offer=$rs_deal['auto_offer']; 
         $workload=$rs_deal['workload']; 
         $create_deal_create=$rs_deal['create_deal_create']; 

         $create_date_check=date ("Y-m-d H:i:s", strtotime("+15 minute", strtotime($create_deal_create)));

         $create_deal_update=$rs_deal['create_deal_update']; 
         $message_stock_id=$rs_deal['message_stock_id']; 

         $sum_offer=$stock_offer+$sale_offer+$auto_offer;

         $budget=number_format($create_deal_budget_start)." - ".number_format($create_deal_budget_end);

         $color_text="color: #000;";
         $bg="background-color: #fff;";




         $sql_offer="SELECT auto_offer FROM dbo_subdeal  WHERE create_deal_code='$create_deal_code' and check_auto_offer='0' ";  
         $result_offer= $conn->query($sql_offer);
         $count_offer=$result_offer->num_rows;
       
       /*
         $sql_deal_check="SELECT create_deal_code FROM dbo_listing_new_deal_check  WHERE create_deal_code='$create_deal_code' and listing_new_deal_check_view='1' ";  
         $result_deal_check= $conn->query($sql_deal_check);
         $count_new_deal=$result_deal_check->num_rows; */


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
         }else if($create_deal_attention=='4'){  
               $attention="ต่อสัญญา"; 
         }
 


      /////////// dbo_buyer_contact ////////////////
             $sql_buyer="SELECT buyer_contact_name ,buyer_contact_lastname , buyer_contact_status FROM dbo_buyer_contact where buyer_contact_code='$buyer_contact_code' ";  
             $result_buyer= $conn->query($sql_buyer);
             $rs_buyer=$result_buyer->fetch_assoc();


             isset( $rs_buyer['buyer_contact_name'] ) ? $buyer_contact_name = $rs_buyer['buyer_contact_name'] : $buyer_contact_name = "";
             isset( $rs_buyer['buyer_contact_lastname'] ) ? $buyer_contact_lastname = $rs_buyer['buyer_contact_lastname'] : $buyer_contact_lastname = "";
             isset( $rs_buyer['buyer_contact_status'] ) ? $buyer_contact_status = $rs_buyer['buyer_contact_status'] : $buyer_contact_status = "";
            

             $buyer_contact_name=$buyer_contact_name." ".$buyer_contact_lastname;
 
      ////////// End dbo_buyer_contact ////////////////
                      
   
      /////////// type_asset ////////////////
             $sql_ass="SELECT name FROM type_asset where id='$create_deal_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['name']!=''){ $create_deal_type=$rs_ass['name'];  }
      ////////// End type_asset ////////////////


      /////////// dbo_register ////////////////

        if($create_deal_sale!='0'){ 
          
             $sql_re="SELECT register_id ,register_name , register_nickname  FROM dbo_register where register_id='$create_deal_sale' ";  
             $result_re= $conn->query($sql_re);
             $rs_re=$result_re->fetch_assoc();

             $register_nickname=$rs_re['register_nickname'];

             if($rs_re['register_id']!=''){ $sale_name=$rs_re['register_name']."($register_nickname)";  } 
        }
      ////////// End dbo_register ////////////////




             $deal_buyer_url="?page=create_deal_buyer&status=edit&p_check=create_deal&code=$create_deal_code&d_check=1"; 
 
  
             $no++;   

     ?> 


         
             <div class="modal fade" id="modal-default<?php echo $create_deal_code;?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Workload Deal : <?php echo $create_deal_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    


                               <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                                  <input type="text" class="form-control" name="page"  value="deal_buyer" hidden="hidden">
                                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                                  <input type="text" class="form-control" name="p_check"  value="1" hidden="hidden" >  
                                  <input type="text" class="form-control" name="code"  value="<?php echo $create_deal_code;?>" hidden="hidden"> 
                                  <input type="text" class="form-control" name="url_check"  value="<?php echo $_SERVER['REQUEST_URI'];?>" hidden="hidden"> 
 

                                    <div class="row" style="font-size: 12px;  "    >

                                      <div class="col-md-12"> 
                                          <h5 style="text-align: center;font-size: 18px;"  ><b></b></h5>
                                           <div class="form-group row">
                                            <label for="inputEmail4" class="col-sm-3 col-form-label">เลือกสถานะ : </label>
                                            <div class="col-sm-9"> 

                                                  <select class="form-control select"  name="workload"  id="workload"  style="width: 100%;" required="">
                                                      <option value="0">ไม่เลือก</option>  
                                                      <option value="1">In Progress</option>  
                                                      <option value="2">Active</option>  
                                                      <option value="3">Closing</option>   
                                                      <option value="4">Close Won</option> 
                                                      <option value="5">Close Lost</option>  
                                                  </select>

                                            </div> 
                                          </div> 
                                      </div> 
                                       <hr>
                                       <center><h5>กรณีเลือก Close Lost ดำเนินการเลือกเหตุผล</h5></center>

                                       <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-12 col-form-label">เหตุผลของการยกเลิกดีล : </label>
                                          <div class="col-sm-12"> 
                                               <select class="form-control select"  name="contact_deal_cancel_status"  id="contact_deal_cancel_status"  style="width: 100%;" required="">

                                                  <option value="0">ไม่เลือก</option>  
                                                  <option value="1">1. เราไม่มีทรัพย์ที่ตรงตามความต้องการ</option>  
                                                  <option value="2">2. ติดต่อลูกค้าไม่ได้ตั้งแต่ครั้งแรก</option>  
                                                  <option value="3">3. ลูกค้าได้ทรัพย์กับเอเจนท์อื่น</option>   
                                                  <option value="4">4. ลูกค้าเปลี่ยนใจไม่ซื้อ/เช่า</option>   
                                                  <option value="5">5. เจ้าของเปลี่ยนใจไม่ซื้อ/เช่า</option>   
                                                  <option value="6">6. การเจรจาต่อรองระหว่างผู้ซื้อ/ผู้ขาย ไม่จบ</option>   
                                                  <option value="7">7. ลูกค้า shopping</option>   
                                                  <option value="8">8. ความต้องการลูกค้าเกินความจริง</option> 
                                                  <option value="9">9. คุยๆ อยู่แล้วหายไป</option> 
                                                  <option value="10">10. อื่นๆ ระบุ</option>  
                                                    
                                                </select>
                                          </div>
                                        </div> 
                                     </div>
               
                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">Remark : </label>
                                          <div class="col-sm-12"> 
                                            <textarea class="form-control" rows="5" placeholder="Enter ..." id="contact_deal_cancel_remark" name="contact_deal_cancel_remark"></textarea>
                                          </div>
                                        </div> 
                                     </div>
                                    
                                      <div class="col-12" >
                                       
                                    
                                           <center>
                                               <input type="submit" class="btn btn-warning" value="ใช่">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
                                           </center>
                                         
                                        <!-- /.form-group -->
                                      </div>

                                    </div>
                            
                                </form>



                    </div>
                    <div class="modal-footer justify-content-between">
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>



         
             <div class="modal fade" id="modal-requirements<?php echo $create_deal_code;?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Requirements : <?php echo $create_deal_code;?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body"> 

                         <div class="row" style="font-size: 16px;  "  > 
                            <div class="col-md-12"> 
                                 <?php echo nl2br($create_deal_remark);?>

                            </div>  
                          </div> 
                    </div>
                    <div class="modal-footer justify-content-between">
                          <?php echo "Date : ".$deal_date_remark;?>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
      

                    <tr style="font-size: 15px; <?php echo $bg.$color_text;?>  "   >  
   
                      <td><a href="<?php echo $deal_buyer_url;?>"><?php echo $create_deal_code;?></a></td> 
                      <td style="text-align: left;"><?php echo $create_deal_title;?> <?php if($buyer_contact_status=='1'){  }else if($buyer_contact_status=='2'){  echo " (Agent)"; }else{  } ?></td>
                      <td><?php echo $attention;?></td>
                      <td><?php echo $budget;?></td> 
                      <td  >

                        <?php if($create_deal_sale!='0'){ ?>
                              

                              <?php echo $sale_name;?>

                          <?php } ?>

                      </td>
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
                        <td style="text-align: center;" >
                            <?php echo $stock_offer;?>
                            <?php if($message_stock_id!='0'){ ?>
                                     <span class="right badge badge-danger">หาห้อง</span>
                            <?php } ?>
                        </td>  
                        <td style="text-align: center;" >
                            <?php if($count_offer>=1){ ?>
                                     <a href="?page=create_deal_buyer&status=edit&p_check=create_deal&code=<?php echo $create_deal_code;?>&d_check=4"><span class="right badge badge-danger"><?php echo $count_offer;?></span></a>
                            <?php } ?>
                        </td> 
                        <td style="text-align: center;" >
                           <?php if($deal_date_remark<=$create_date_check and   $deal_date_remark>=$create_deal_create){ ?>   
                                     <a href="#" data-toggle="modal" data-target="#modal-requirements<?php echo $create_deal_code;?>" title="<?php echo $create_deal_remark;?>" ><i class="fa fa-sticky-note"  style="font-size:20px;color: green;"   ></i></a>
                           <?php }else if($create_deal_remark==''){ ?> 

                           <?php }else{  ?>
                                     <a href="#" data-toggle="modal" data-target="#modal-requirements<?php echo $create_deal_code;?>" title="<?php echo $create_deal_remark;?>" ><i class="fa fa-sticky-note"  style="font-size:20px;color: red;"   ></i></a> 
                           <?php } ?> 
 
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
      <?php 
             }
         }  ?>

                  </tbody>

              </table>
          </div>

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
    <a <?php if($page_no > 1){ echo "href='?page=deal_buyer&search=$search&create_deal_sale_s=$create_deal_sale_s&contact_deal_win_s=$contact_deal_win_s&workload_s=$workload_s&deal_attention_s=$deal_attention_s&source_code_s=$source_code_s&contact_code_s=$contact_code_s&page_no=$previous_page'"; } ?> class='page-link'>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 30){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link' >$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_page_s&page_no=$counter' class='page-link' >$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 30){
        
    if($page_no <= 30) {         
     for ($counter = 1; $counter < 25; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_page_s&page_no=$counter' class='page-link'>$counter</a></li>";
                }
        }
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        echo "<li class='page-item'><a href='$url_page_s&page_no=$second_last' class='page-link'>$second_last</a></li>";
        echo "<li class='page-item'><a href='$url_page_s&page_no=$total_no_of_pages' class='page-link'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 10 && $page_no < $total_no_of_pages - 10) {         
        echo "<li class='page-item'><a href='$url_page_s&page_no=1' class='page-link'>1</a></li>";
        echo "<li class='page-item'><a href='$url_page_s&page_no=2' class='page-link'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_page_s&page_no=$counter' class='page-link'>$counter</a></li>";
                }                  
       }
       echo "<li class='page-item'><a class='page-link'>...</a></li>";
       echo "<li class='page-item'><a href='$url_page_s&page_no=$second_last' class='page-link' >$second_last</a></li>";
       echo "<li class='page-item'><a href='$url_page_s&page_no=$total_no_of_pages' class='page-link' >$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li class='page-item'><a href='$url_page_s&page_no=1' class='page-link'>1</a></li>";
        echo "<li class='page-item'><a href='$url_page_s&page_no=2' class='page-link'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";

        for ($counter = $total_no_of_pages - 10; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_page_s&page_no=$counter' class='page-link'>$counter</a></li>";
                }                   
                }
            }
    }
?>
  
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='$url_page_s&page_no=$next_page'"; } ?> class='page-link'>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li class='page-item'><a href='$url_page_s&page_no=$total_no_of_pages' class='page-link' >Last &rsaquo;&rsaquo;</a></li>";
        } ?>
                                    <!--<li class='page-item'><a href="#" class='page-link'>Next</a></li>-->
                                </ul>
                            </div>
 
      </center>

 

            <!-- jQuery -->
            <script src="template/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- SweetAlert2 -->
            <script src="template/plugins/sweetalert2/sweetalert2.min.js"></script>
            <!-- Toastr -->
            <script src="template/plugins/toastr/toastr.min.js"></script>
            <!-- AdminLTE App -->
            <script src="template/dist/js/adminlte.min.js"></script>


 


   <?php } //END deal_buyer ?>



  <?php if($status=='calendar'){  //calendar


           $status_activity=$_POST['status_activity'];
           $date_start=$_POST['date_start'];
           $date_end=$_POST['date_end'];

           if($status_activity!=''){
               
           }
   ?>



       
                     <form method="post" id="form"   enctype="multipart/form-data" action="?page=deal_buyer&status=calendar&id=<?php echo $id;?>" >
                          <!-- Main content -->
                        <section class="content">
                          <div class="container-fluid">
                            <div class="row">

                        
                              <div class="col-md-12">
                                <div class="sticky-top mb-3">
                                  <div class="card">
                                    <div class="card-header">
                                      <h4 class="card-title">รายชื่อเซลล์</h4>
                                    </div>
                                    <div class="card-body">
                                      <!-- the events -->
                                      <div id="external-events">
                                       
                                       <div class="row">


                                          <div class="col-12 col-sm-6 col-md-2 d-flex align-items-stretch" >
                                            <div class="card bg-light d-flex flex-fill"> 
                                              <div class="card-body pt-0" style="background-color: #000; color: #fff;">
                                                <div class="row" style="padding-top: 10px;" >
                                                  <div class="col-4" >
                                                       <a href="?page=deal_buyer&status=calendar"><img src="../../images/icon_men.png?v=1"  alt="user-avatar" style="width: 100%; "  > </a>
                                                  </div>
                                                  <div class="col-8" style="font-size: 14px;">
                                                       <a href="?page=deal_buyer&status=calendar">แสดงข้อมูลเซลล์ทั้งหมด  </a>

                                                  </div>
                                                  
                                                </div>
                                              </div>
                                           
                                            </div>
                                          </div> 
                                          
                          <?php  $sql="SELECT * FROM dbo_register AS register WHERE register_status='1' and register_lcok='0' ";  
                                  $result=$conn->query($sql);
                                  $count=$result->num_rows ;

                                  while($rs=$result->fetch_assoc()){    

                                    $register_id=$rs['register_id'];
                                    $register_name=$rs['register_name'];
                                    $register_email=$rs['register_email'];
                                    $register_color=$rs['register_color'];

                                    $sql_deal="SELECT * FROM dbo_create_deal AS deal WHERE create_deal_sale='$register_id' ";  
                                    $result_deal=$conn->query($sql_deal);
                                    $count_deal=$result_deal->num_rows ;

                           ?>

                                          <div class="col-12 col-sm-6 col-md-2 d-flex align-items-stretch" >
                                            <div class="card bg-light d-flex flex-fill"> 
                                              <div class="card-body pt-0" style="background-color: <?php echo $register_color;?>; color: #fff;">
                                                <div class="row" style="padding-top: 10px;" >
                                                  <div class="col-4" >
                                                       <a href="?page=deal_buyer&status=calendar&id=<?php echo $register_id;?>"><img src="../../images/icon_men.png?v=1"  alt="user-avatar" style="width: 100%; "  > </a>
                                                  </div>
                                                  <div class="col-8" style="font-size: 14px;">
                                                       <?php echo $register_name;?>  <br>
                                                       <!--<?php echo $register_email;?> <br> -->
                                                       จำนวนดีล : <?php echo $count_deal;?> 

                                                  </div>
                                                  
                                                </div>
                                              </div>
                                           
                                            </div>
                                          </div> 

                                  <?php } ?>


                                       </div>

                                      </div>
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                  
                                </div>
                              </div>




                              <!-- /.col -->
                              <div class="col-md-12">
                                <div class="sticky-top mb-3">
                                  <div class="card">
                                    <div class="card-header">
                                      <h4 class="card-title">ค้นหา</h4>
                                    </div>
                                    <div class="card-body">
                                      <!-- the events -->
                                      <div id="external-events">
                                       
                                       <div class="row">


                                          
                                         <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">เลือกกิจกรรม : </label>
                                                <div class="col-sm-8">
                                                          <select class="form-control select" name="status_activity" id="status_activity"  style="width: 100%;">
                                                              <option value=""    <?php if($status_activity==''){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option> 
                                                              <option value="2"   <?php if($status_activity=='2'){?> selected="selected"  <?php } ?>  >นัดชมทรัพย์</option>  
                                                              <option value="4"   <?php if($status_activity=='4'){?> selected="selected"  <?php } ?>  >นัดเซ็นสัญญา</option> 
                                                              <option value="6"   <?php if($status_activity=='6'){?> selected="selected"  <?php } ?>  >นัดโอน</option>  
                                                              <option value="0"   <?php if($status_activity=='0'){?> selected="selected"  <?php } ?>  >กิจกรรมอื่นๆ</option>  
                                                          </select>
                                                </div>
                                              </div>
                                          </div>

                                         <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">วันเริ่มต้น : </label>
                                                <div class="col-sm-8">
                                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="date_start"  placeholder="โปรดกรอก วันเดือนปี"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $date_start;?>" />
                                                               <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                                  <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                        </div> 
                                                </div>
                                              </div>
                                          </div>
                                         <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">วันที่สิ้นสุด : </label>
                                                <div class="col-sm-8">
                                                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="date_end" placeholder="โปรดกรอก วันเดือนปี"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $date_end;?>" />
                                                               <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                                                  <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                        </div> 
                                                </div>
                                              </div>
                                          </div>
                                          <div class="col-md-12"  ><br>
                                             <center><button type="submit" class="btn btn-primary">Search Data</button> &nbsp;&nbsp;&nbsp;
                                                  <a class="btn btn-primary" href="?page=deal_buyer&status=calendar">Clear Data</a>
                                             </center>

                                          </div>
                  
                                       </div>

                                      </div>
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                  
                                </div>
                              </div>
                              <!-- /.col -->


                              <div class="col-md-12">
                                <div class="card card-primary">
                                  <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                  </div>
                                  <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                              </div>
                              <!-- /.col -->
 

                            </div>
                            <!-- /.row -->
                          </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
  
                      </form>


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
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->



<!-- jQuery -->
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
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>


<!-- Bootstrap -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="template/plugins/moment/moment.min.js"></script>
<script src="template/plugins/fullcalendar/main.js"></script>




<!-- Page specific script -->
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
    $('#reservationdate1').datetimepicker({
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




<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [

<?php  $i=0;


    if($id!=''){
        $check_deal_sale="and deal.create_deal_sale='$id' ";
    }
   
    if($status_activity!=''){
        $check_status_activity=" and calendar.s_calendar_status='$status_activity'  ";
    }

    if($date_start!='' and $date_end!=''){   

        $year=substr($date_start,6 , 4 );
        $month=substr($date_start,3 , 2 );
        $day=substr($date_start,0 , 2 ); 
        $check_date_start=$year."-".$month."-".$day;

        $year=substr($date_end,6 , 4 );
        $month=substr($date_end,3 , 2 );
        $day=substr($date_end,0 , 2 ); 
        $check_date_end=$year."-".$month."-".$day;

        $check_date=" and calendar.s_calendar_date>='$check_date_start'  and calendar.s_calendar_date<='$check_date_end'  ";
    }

    $sql="SELECT * FROM dbo_subdeal_calendar AS calendar
          LEFT JOIN dbo_subdeal AS subdeal  On calendar.ex_list_listing_code=subdeal.ex_list_listing_code 
          LEFT JOIN dbo_create_deal AS deal On deal.create_deal_code=subdeal.create_deal_code   
          LEFT JOIN dbo_register AS register  On register.register_id=deal.create_deal_sale   

     WHERE calendar.s_calendar_status='0'  $check_deal_sale $check_status_activity $check_date or 
           calendar.s_calendar_status='2'  $check_deal_sale $check_status_activity $check_date or  
           calendar.s_calendar_status='4'  $check_deal_sale $check_status_activity $check_date or 
           calendar.s_calendar_status='6'  $check_deal_sale $check_status_activity $check_date ";  

    $result=$conn->query($sql);
    $count=$result->num_rows ;

    while($rs=$result->fetch_assoc()){ $i++;
     
         $s_calendar_status=$rs['s_calendar_status'];
         $create_deal_code=$rs['create_deal_code'];
         $subdeal_title=$rs['subdeal_title'];
         $s_calendar_note=$rs['s_calendar_note'];
         $s_calendar_date=$rs['s_calendar_date'];
         $s_calendar_time_start=$rs['s_calendar_time_start'];
         $s_calendar_time_end=$rs['s_calendar_time_end'];
         $s_calendar_create=$rs['s_calendar_create'];
         $ex_list_listing_code=$rs['ex_list_listing_code'];
         $s_calendar_title_status=$rs['s_calendar_title_status'];
         $register_name=$rs['register_name'];

         $register_color=$rs['register_color']; 
         $create_deal_title=$rs['create_deal_title'];
 
         $time_start_1=substr($s_calendar_time_start,0 , 2 );           
         $time_start_2=substr($s_calendar_time_start,3 , 2 );
 
         $time_end_1=substr($s_calendar_time_end,0 , 2 );
         $time_end_2=substr($s_calendar_time_end,3 , 2 );  

         $year=substr($s_calendar_date,0 , 4 );
         $month=substr($s_calendar_date,5 , 2 );
         $day=substr($s_calendar_date,8 , 2 );

    
          $month_2=$month-1;
 
               $color=$register_color;

        if($id!=''){

        }else{
              $color=$register_color;

              if($color==''){
                        $color="#000000";
              } 
         }

         if($s_calendar_status=='1'){

              $title_calendar="นำเสนอ_".$create_deal_title."_".$ex_list_listing_code."_".$register_name;
              $color_1="#000000";

         }else if($s_calendar_status=='2'){

              $title_calendar="นัดชมทรัพย์_".$create_deal_title."_".$ex_list_listing_code."_".$register_name;
              $color_1="#000000";

         }else if($s_calendar_status=='4'){

              $title_calendar="นัดเซ็นต์สัญญา_".$create_deal_title."_".$ex_list_listing_code."_".$register_name;
              $color_1="#000000";

         }else if($s_calendar_status=='6'){

              $title_calendar="ปิด Deal_".$create_deal_title."_".$ex_list_listing_code."_".$register_name;
              $color_1="#000000";
         }else{


              if($s_calendar_title_status=='1'){
                    $s_calendar_title_status='ถ่ายรูปห้อง';
              }else if($s_calendar_title_status=='2'){
                    $s_calendar_title_status='ตรวจเช็คห้อง';
              }else if($s_calendar_title_status=='3'){
                    $s_calendar_title_status='ส่งมอบห้อง';
              }else if($s_calendar_title_status=='4'){
                    $s_calendar_title_status='ย้ายออก';
              }else if($s_calendar_title_status=='5'){
                    $s_calendar_title_status='ขอใบปลอดหนี้';
              }else if($s_calendar_title_status=='6'){
                    $s_calendar_title_status='ติดต่อกรมที่ดิน';
              }else if($s_calendar_title_status=='7'){
                    $s_calendar_title_status='อื่นๆ';
              }


              $title_calendar=$s_calendar_title_status."_".$create_deal_title."_".$ex_list_listing_code."_".$register_name;
              $color_1="#000000";

         }

         $url="https://connex.in.th/backend/?page=create_deal_buyer&status=edit&p_check=create_deal&code=$create_deal_code&d_check=4"


 ?>

        {
          title          : '<?php echo $title_calendar;?>',
          start          : new Date(<?php echo $year;?>, <?php echo $month_2;?>, <?php echo $day;?> , <?php echo $time_start_1;?>,  <?php echo $time_start_2;?>),
          end            : new Date(<?php echo $year;?>, <?php echo $month_2;?>, <?php echo $day;?> , <?php echo $time_end_1;?>,  <?php echo $time_end_2;?>),
          allDay         : false,
          url            : '<?php echo $url;?>', 
          backgroundColor: '<?php echo $color;?>', //red
          borderColor    : '<?php echo $color;?>', //red
          color    : '<?php echo $color_1;?>' //red
          //allDay         : true
        } ,

<?php } ?>

        {
          title          : ' ',
          start          : new Date(1991,1, 11 , 11, 0 ),
          end            : new Date(1991,1, 11 , 11, 0 ),
          allDay         : false,
          url            : '#', 
          backgroundColor: '<?php echo $color;?>', //red
          borderColor    : '<?php echo $color;?>', //red
          color    : '<?php echo $color_1;?>' //red
          //allDay         : true
        } 


      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#000'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
 

   <?php } //END calendar ?>
 

  <?php if($status=='report_case'){  //report_case 
 
           $day_check=$_GET['day_check'];
 

   ?>


       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-12">
            <!-- general form elements -->
 
              <!-- /.card-header -->
              <!-- form start -->
    
        
                <div class="card">
                  <div class="card-header d-flex p-0">
                    <h3 class="card-title  p-3"><?php echo $title;?></h3>
                    <ul class="nav nav-pills ml-auto p-2" style="font-size: 14px;">
                      <li class="nav-item"><a class="nav-link <?php if($p==''){?>active<?php } ?>" href="?page=deal_buyer&status=report_case"  >Report รับเคส</a></li>
                      <li class="nav-item"><a href="?page=deal_buyer&status=report_case&p=report_case_won" class="nav-link <?php if($p=='report_case_won'){?>active<?php } ?>"   >Report Case Won</a></li> 
                      <li class="nav-item"><a href="?page=deal_buyer&status=report_case&p=report_conversion" class="nav-link <?php if($p=='report_conversion'){?>active<?php } ?>"   >Report Conversion </a></li>   
                      <li class="nav-item"><a href="?page=deal_buyer&status=report_case&p=report_see_number" class="nav-link <?php if($p=='report_see_number'){?>active<?php } ?>"   >Report ดูเบอร์</a></li>  
                  <?php if($_SESSION['USER_ID']=='1' or $_SESSION['USER_ID']=='6'){ ?>
                      <li class="nav-item"><a href="?page=deal_buyer&status=report_case&p=report_market" class="nav-link <?php if($p=='report_market'){?>active<?php } ?>"   >Report ช่องทางการตลาด</a></li>
                  <?php } ?>    
                    </ul>    
                  </div>
                </div>



       <form method="post" id="form" enctype="multipart/form-data" action="include/process_search.php?page=deal_buyer&p=<?php echo $p;?>"  >

            <div class="card card-primary" style="padding: 10px;">
              <div class="card-header">
                <h3 class="card-title">ค้นหา</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
 
                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">
                <input type="text" class="form-control" name="status"  value="<?php echo $_GET['status'];?>" hidden="hidden">
                <input type="text" class="form-control"  name="p"  value="<?php echo $p;?>" hidden="hidden" >




              <div class="card-body">

                 <div class="container-fluid">
                    <div class="row">
                 
      <?php if($p==''){ ?>                                 
                   
                                          <div class="col-12 col-sm-6 col-md-4"> 
                                               
                                               <div class="form-group row">
                                                <label for="inputEmail4" class="col-sm-4 col-form-label">เลือกจำนวนวัน : </label>
                                                <div class="col-sm-6"> 

                                                      <select class="form-control select"  name="day_check"  id="day_check"  style="width: 100%;" required="">
                                                          <option value="14" <?php if($day_check=='14'){ ?> selected <?php } ?> >14 วัน</option>  
                                                          <option value="30" <?php if($day_check=='30'){ ?> selected <?php } ?> >30 วัน</option>  
                                                          <option value="60" <?php if($day_check=='60'){ ?> selected <?php } ?>  >60 วัน</option>  
                                                          <option value="90" <?php if($day_check=='90'){ ?> selected <?php } ?>  >90 วัน</option>     
                                                      </select>

                                                </div> 
                                              </div> 
                                          </div> 

                      <!--
                      <div class="col-md-3 col-sm-6">
                      </div>   -->         
                      <br><br>
                 
     <?php } ?>     

     <?php if($p=='report_case_won' or $p=='report_conversion' or $p=='report_see_number' or $p=='report_market'){ // เช็ค report_case_won  report_conversion 

                   $date_start=$_GET['date_start'];
                   $date_end=$_GET['date_end']; 

                   $month_u=substr($date_start,5 , 2);
                   $year_u=substr($date_start,0 , 4 ); 
                   $date_u=substr($date_start,8, 2 );
                   $date_start_u=$date_u."/".$month_u."/".$year_u;

                   $month_u=substr($date_end,5 , 2);
                   $year_u=substr($date_end,0 , 4 ); 
                   $date_u=substr($date_end,8, 2 );
                   $date_end_u=$date_u."/".$month_u."/".$year_u; 

                   if($date_start!=''){ 

                       $date_search=" and  create_deal_create>='$date_start' and  create_deal_create<='$date_end' ";
                       $date_search_won=" and  sub_calendar.s_calendar_date>='$date_start' and  sub_calendar.s_calendar_date<='$date_end' ";   
                       $date_see_number=" and  report_account_date>='$date_start' and  report_account_date <='$date_end' ";  
                       
                        

                   }else{
         
                
                   } 

      ?>

             
                                         <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">วันเริ่มต้น : </label>
                                                <div class="col-sm-8">
                                                        <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate5" name="date_start"  placeholder="โปรดกรอก วันเดือนปี"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $date_start_u;?>" />
                                                               <div class="input-group-append" data-target="#reservationdate5" data-toggle="datetimepicker">
                                                                  <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                        </div> 
                                                </div>
                                              </div>
                                          </div>
                                         <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">วันที่สิ้นสุด : </label>
                                                <div class="col-sm-8">
                                                        <div class="input-group date" id="reservationdate6" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate6" name="date_end" placeholder="โปรดกรอก วันเดือนปี"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $date_end_u;?>" />
                                                               <div class="input-group-append" data-target="#reservationdate6" data-toggle="datetimepicker">
                                                                  <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                        </div> 
                                                </div>
                                              </div>
                                          </div>

     <?php } ?>     
                      <div class="col-md-12"  ><br>
                         <center><button type="submit" class="btn btn-primary">Search Data</button> &nbsp;&nbsp;&nbsp;
                              <a class="btn btn-primary" href="?page=deal_buyer&status=<?php echo $status;?>&p=<?php echo $p;?>">Clear Data</a>
                         </center>

                      </div>


                    </div>
                  </div>
 
                </div>
                <!-- /.card-body --> 





            </div>
            <!-- /.card -->
      </form>






 <style>
div.scroll {width:100%; max-height: 800px; overflow-x:auto; background-color: #fff;}
th{
  background-color: #4F80C0;
  padding: 10px;
  font-size: 18px;
  color: #fff;
}
table, th , tr, td {
 
  padding-top: 2px;
  padding-bottom: 2px;
  padding-right: 3px;
  padding-left: 3px;
  border: 1px solid #000;
  font-size: 14px;
  text-align: center;

  
}
</style>


<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>


<?php 

            if($p==''){ // เช็ค Report รับเคส

                 $today=date("Y-m-d H:i:s"); 

                 if($day_check!=''){ 
                         
                     $calExpireDate=date ("d-m", strtotime("-$day_check day", strtotime($today)));   
                     $sum_day=$day_check;

                 }else{
                     
                     $calExpireDate=date ("d-m", strtotime("-14 day", strtotime($today))); 
                     $sum_day=14;
                 }
  ?>

     <h3 class="card-title" style="padding: 10px;font-size: 20px;"><center>Report รับเคส</center></h3> 

     <div class="scroll">

              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">

                <table   class="" style="font-size: 14px;" >

                  <thead>
                    <tr>
                      <th style="width: 50px;">No</th>  
                      <th style="width: 230px;">รายชื่อเซลล์</th> 
                      <th style="width: 100px;">In Progress</th> 
                      <th style="width: 100px;">Active</th> 
                      <th style="width: 100px;">Closing</th> 
                      <th style="width: 100px;">รวม Case <br> (3 วันล่าสุด)</th> 
              <?php for ($x = 0; $x <= $sum_day; $x++) {  
                          $date_text=date ("d/m", strtotime("-$x day", strtotime($today))); 
                ?>
                      <th style="width: 50px;"><?php echo $date_text;?></th>   
              <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
 <?php     // Check connection 

       $sql="SELECT register_id ,register_name,register_lastname , register_nickname  FROM dbo_register 
             WHERE register_lcok='0' and register_status='1' or register_lcok='0' and register_status='4' and register_status_head='1' order by register_id ASC"; 
       $result = $conn->query($sql);

          // output data of each row
           while($rs = $result->fetch_assoc()) {  $i++;
               
               $register_name=$rs['register_name'];
               $register_lastname=$rs['register_lastname'];
               $register_nickname=$rs['register_nickname']; 
               $register_id=$rs['register_id'];
                
               $name=$register_name." ".$register_lastname." (".$register_nickname.")"; 

              /// In Progress ///
               $sql_in_process="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and workload='1' and contact_deal_win!='9' ";  
               $result_in_process= $conn->query($sql_in_process); 
               $count_in_process=$result_in_process->num_rows;
              ///  ///            

              /// Active ///
               $sql_active="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and workload='2' and contact_deal_win!='9' ";  
               $result_active= $conn->query($sql_active); 
               $count_active=$result_active->num_rows;
              ///  ///                

              /// Closing  ///
               $sql_closing="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and workload='3' and contact_deal_win!='9' ";  
               $result_closing= $conn->query($sql_closing); 
               $count_closing=$result_closing->num_rows;
              ///  ///  

              /// case  ///
               $today1=date("Y-m-d 00:00:00");
               $today2=date("Y-m-d H:i:s");
               $date_case=date ("Y-m-d 00:00:00", strtotime("-2 day", strtotime($today1))); 

               $sql_case="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and  create_deal_create>='$date_case' and create_deal_create<='$today2' ";  
               $result_case= $conn->query($sql_case); 
               $count_case=$result_case->num_rows;
              ///  ///  
     ?> 
                    <tr style="font-size: 10px; "   > 
                        <td><center><?php echo $i;?></center></td>  
                        <td > 
                          <center><?php echo $name;?></center>
                        </td> 
                        <td><center><?php if($count_in_process!='0'){ echo $count_in_process;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_active!='0'){ echo $count_active;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_closing!='0'){ echo $count_closing;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_case!='0'){ echo $count_case;}else{ echo "-";}?></center></td>  
      
                <?php for ($x = 0; $x <= $sum_day; $x++) { 

                            $date_text=date ("d/m", strtotime("-$x day", strtotime($today))); 
                            $date_check=date ("Y-m-d", strtotime("-$x day", strtotime($today))); 

                     $sql_deal="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and create_deal_create LIKE '%$date_check%' ";  
                     $result_deal= $conn->query($sql_deal); 
                     $count_deal_s=$result_deal->num_rows;
      
                  ?>
                        <td><center><?php if($count_deal_s!='0'){ echo $count_deal_s;}else{ echo "-";}?></center></td>   
                <?php } ?>


                      </tr>  
       <?php  }  ?>

<?php 
              /// In Progress ///
               $sql_in_process="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE  workload='1' and contact_deal_win!='9' ";  
               $result_in_process= $conn->query($sql_in_process); 
               $count_sum_in_process=$result_in_process->num_rows;
              ///  ///            

              /// Active ///
               $sql_active="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE   workload='2' and contact_deal_win!='9' ";  
               $result_active= $conn->query($sql_active); 
               $count_sum_active=$result_active->num_rows;
              ///  ///                

              /// Closing  ///
               $sql_closing="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE   workload='3' and contact_deal_win!='9' ";  
               $result_closing= $conn->query($sql_closing); 
               $count_sum_closing=$result_closing->num_rows;
              ///  ///  

              /// case  ///
              $sql_case="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_create>='$date_case' and create_deal_create<='$today2' ";  
              $result_case= $conn->query($sql_case); 
              $count_sum_case=$result_case->num_rows;      
              ///  ///  

  ?>
                       <tr style="background-color: #FF202B;color: #fff;font-weight:bold;">
                           <td></td>
                           <td>รวมทั้งหมด</td>
                           <td><center><?php if($count_sum_in_process!='0'){ echo $count_sum_in_process;}else{ echo "-";}?></center></td>
                           <td><center><?php if($count_sum_active!='0'){ echo $count_sum_active;}else{ echo "-";}?></center></td> 
                           <td><center><?php if($count_sum_closing!='0'){ echo $count_sum_closing;}else{ echo "-";}?></center></td> 
                  <?php   
                           $sql_case="SELECT create_deal_sale FROM dbo_create_deal 
                                       WHERE create_deal_create>='$date_case' and create_deal_create<='$today2' ";  
                           $result_case= $conn->query($sql_case); 
                           $count_sum_case=$result_case->num_rows;
                    ?>
                           <td><center><?php echo $count_sum_case;?></center></td>

                  <?php for ($x = 0; $x <= $sum_day; $x++) { 
     
                              $date_check=date ("Y-m-d", strtotime("-$x day", strtotime($today))); 

                           $sql_deal_sum="SELECT create_deal_sale FROM dbo_create_deal 
                                 WHERE create_deal_create LIKE '%$date_check%' ";  
                           $result_deal_sum= $conn->query($sql_deal_sum);
                           $count_deal_sum=$result_deal_sum->num_rows;
                    ?>
                          <td><center><?php if($count_deal_sum!='0'){ echo $count_deal_sum;}else{ echo "-";}?></center></td>   

                  <?php } ?>


                       </tr> 
                   </tbody>

              </table>
          </div>

    </div>   

       <?php } // END  เช็ค Report รับเคส ?>



       <?php if($p=='report_case_won'){ // เช็ค report_case_won 

 
        

        ?>




                              <h3 class="card-title" style="padding: 10px;font-size: 20px;"><center>Report Case Won</center></h3> 

 <div class="scroll">

              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">

                <table   class="" style="font-size: 14px;" >

                  <thead>
                    <tr>  
                      <th style="width: 230px;" rowspan="2" >รายชื่อเซลล์</th> 
                      <th style="width: 300px;" colspan="3" >รวมทั้งหมด</th> 
                      <th style="width: 300px;" colspan="3" >Sale</th>  
                      <th style="width: 300px;" colspan="3" >Rent</th>
                    </tr>
                    <tr>  
                      <th>Case Assign</th> 
                      <th>View</th> 
                      <th>Case Won</th>                      
                      <th>Case Assign</th> 
                      <th>View</th> 
                      <th>Case Won</th>                   
                      <th>Case Assign</th> 
                      <th>View</th> 
                      <th>Case Won</th>                   
                    </tr>

                  </thead>
                  <tbody>
 <?php     // Check connection 

       $sql="SELECT register_id ,register_name,register_lastname , register_nickname  FROM dbo_register 
             WHERE register_lcok='0' and register_status='1'  or register_lcok='0' and register_status='4' and register_status_head='1' order by register_id ASC"; 
       $result = $conn->query($sql);

       if($result->num_rows > 0) {
          // output data of each row
           while($rs = $result->fetch_assoc()) {  $i++;
               
               $register_name=$rs['register_name'];
               $register_lastname=$rs['register_lastname'];
               $register_nickname=$rs['register_nickname']; 
               $register_id=$rs['register_id'];
                
               $name=$register_name." ".$register_lastname." (".$register_nickname.")"; 

       

              /// Case Assign All ///
               $sql_case_assign_all="SELECT create_deal_sale FROM dbo_create_deal  WHERE create_deal_sale='$register_id' $date_search ";  
               $result_case_assign_all= $conn->query($sql_case_assign_all); 
               $count_case_assign_all=$result_case_assign_all->num_rows;
              ///  ///            


              /// View ALL ///
               $sql_view_all="SELECT DISTINCT sub_calendar.s_calendar_date , sub_calendar.create_deal_code 
                             FROM dbo_subdeal_calendar AS sub_calendar
                             LEFT JOIN dbo_create_deal  AS deal ON (deal.create_deal_code=sub_calendar.create_deal_code)
                             WHERE deal.create_deal_sale='$register_id' and sub_calendar.s_calendar_status='3'  $date_search_won ";  
               $result_view_all= $conn->query($sql_view_all); 
               $count_view_all=$result_view_all->num_rows;
              ///  ///     

              /// Case Won ALL ///
               $sql_case_won_all="SELECT  deal.create_deal_sale 
                            FROM dbo_create_deal AS deal
                            LEFT JOIN dbo_subdeal_calendar AS sub_calendar ON (deal.create_deal_code=sub_calendar.create_deal_code)
                           WHERE deal.create_deal_sale='$register_id' and sub_calendar.s_calendar_status='8' $date_search_won ";  
               $result_case_won_all= $conn->query($sql_case_won_all); 
               $count_case_won_all=$result_case_won_all->num_rows;
              ///  ///     
               


              /// Case Assign Sale ///
               $sql_case_assign_sale="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and create_deal_attention='1'  $date_search ";  
               $result_case_assign_sale= $conn->query($sql_case_assign_sale); 
               $count_case_assign_sale=$result_case_assign_sale->num_rows;
              ///  ///            

              /// View Sale ///
               $sql_view_sale="SELECT DISTINCT sub_calendar.s_calendar_date , sub_calendar.create_deal_code 
                             FROM dbo_subdeal_calendar AS sub_calendar
                             LEFT JOIN dbo_create_deal  AS deal ON (deal.create_deal_code=sub_calendar.create_deal_code)
                             WHERE deal.create_deal_sale='$register_id' and sub_calendar.s_calendar_status='3'  and deal.create_deal_attention='1' $date_search_won  ";  
               $result_view_sale= $conn->query($sql_view_sale); 
               $count_view_sale=$result_view_sale->num_rows;
              ///  ///     

              /// Case Won Sale ///
               $sql_case_won_sale="SELECT deal.create_deal_sale  
                           FROM dbo_create_deal AS deal
                           LEFT JOIN dbo_subdeal_calendar AS sub_calendar ON (deal.create_deal_code=sub_calendar.create_deal_code)
                           WHERE deal.create_deal_sale='$register_id' and sub_calendar.s_calendar_status='8'  and deal.create_deal_attention='1' $date_search_won  ";  
               $result_case_won_sale= $conn->query($sql_case_won_sale); 
               $count_case_won_sale=$result_case_won_sale->num_rows;
              ///  ///      

              /// Case Assign Rent ///
               $sql_case_assign_rent="SELECT create_deal_sale FROM dbo_create_deal 
                            WHERE create_deal_sale='$register_id' and create_deal_attention='2'  $date_search ";  
               $result_case_assign_rent= $conn->query($sql_case_assign_rent); 
               $count_case_assign_rent=$result_case_assign_rent->num_rows;
              ///  ///            

              /// View Rent ///
               $sql_view_rent="SELECT DISTINCT sub_calendar.s_calendar_date , sub_calendar.create_deal_code 
                             FROM dbo_subdeal_calendar AS sub_calendar
                             LEFT JOIN dbo_create_deal  AS deal ON (deal.create_deal_code=sub_calendar.create_deal_code)
                             WHERE deal.create_deal_sale='$register_id' and sub_calendar.s_calendar_status='3'  and deal.create_deal_attention='2' $date_search_won ";  
               $result_view_rent= $conn->query($sql_view_rent); 
               $count_view_rent=$result_view_rent->num_rows;
              ///  ///     

              /// Case Won Rent ///
               $sql_case_won_rent="SELECT deal.create_deal_sale   
                           FROM dbo_create_deal AS deal
                           LEFT JOIN dbo_subdeal_calendar AS sub_calendar ON (deal.create_deal_code=sub_calendar.create_deal_code)
                           WHERE deal.create_deal_sale='$register_id' and sub_calendar.s_calendar_status='8'  and deal.create_deal_attention='2'   $date_search_won  ";  
               $result_case_won_rent= $conn->query($sql_case_won_rent); 
               $count_case_won_rent=$result_case_won_rent->num_rows;
              ///  ///     
              
     
       
 
              ///  ///  
     ?> 
                    <tr style="font-size: 10px; " style="width: 100%;"  >  
                        <td > 
                          <center><?php echo $name;?></center>
                        </td> 
                        <td><center><?php if($count_case_assign_all!='0'){ echo $count_case_assign_all;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_view_all!='0'){ echo $count_view_all;}else{ echo "-";}?> </center></td>  
                        <td><center><?php if($count_case_won_all!='0'){ echo $count_case_won_all;}else{ echo "-";}?></center></td>                       
                        <td><center><?php if($count_case_assign_sale!='0'){ echo $count_case_assign_sale;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_view_sale!='0'){ echo $count_view_sale;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_case_won_sale!='0'){ echo $count_case_won_sale;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_case_assign_rent!='0'){ echo $count_case_assign_rent;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_view_rent!='0'){ echo $count_view_rent;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_case_won_rent!='0'){ echo $count_case_won_rent;}else{ echo "-";}?></center></td>   
                      </tr>  
        <?php  }
           } ?>

<?php 
              /// Case Assign All ///
               $sql_case_assign_all="SELECT create_deal_sale FROM dbo_create_deal  where create_deal_sale LIKE '%%' $date_search  ";  
               $result_case_assign_all= $conn->query($sql_case_assign_all); 
               $count_case_assign_all=$result_case_assign_all->num_rows;
              ///  ///            

              /// View ALL ///
               $sql_view_all="SELECT DISTINCT sub_calendar.s_calendar_date , sub_calendar.create_deal_code 
                             FROM dbo_subdeal_calendar AS sub_calendar
                             LEFT JOIN dbo_create_deal  AS deal ON (deal.create_deal_code=sub_calendar.create_deal_code)
                             WHERE sub_calendar.s_calendar_status='3'  $date_search_won";  
               $result_view_all= $conn->query($sql_view_all); 
               $count_view_all=$result_view_all->num_rows;
              ///  ///     

              /// Case Won ALL ///
               $sql_case_won_all="SELECT deal.create_deal_sale   
                             FROM dbo_create_deal AS deal
                             LEFT JOIN dbo_subdeal_calendar AS sub_calendar ON (deal.create_deal_code=sub_calendar.create_deal_code)
                             WHERE  sub_calendar.s_calendar_status='8'  $date_search_won ";  
               $result_case_won_all= $conn->query($sql_case_won_all); 
               $count_case_won_all=$result_case_won_all->num_rows;
              ///  ///     
              

              /// Case Assign Sale ///
               $sql_case_assign_sale="SELECT create_deal_sale FROM dbo_create_deal  WHERE   create_deal_attention='1'  $date_search ";  
               $result_case_assign_sale= $conn->query($sql_case_assign_sale); 
               $count_case_assign_sale=$result_case_assign_sale->num_rows;
              ///  ///            

              /// View Sale ///
               $sql_view_sale="SELECT DISTINCT sub_calendar.s_calendar_date , sub_calendar.create_deal_code 
                             FROM dbo_subdeal_calendar AS sub_calendar
                             LEFT JOIN dbo_create_deal  AS deal ON (deal.create_deal_code=sub_calendar.create_deal_code)
                             WHERE sub_calendar.s_calendar_status='3'  and deal.create_deal_attention='1' $date_search_won   ";  
               $result_view_sale= $conn->query($sql_view_sale); 
               $count_view_sale=$result_view_sale->num_rows;
              ///  ///     

              /// Case Won Sale ///
               $sql_case_won_sale="SELECT deal.create_deal_sale   
                             FROM dbo_create_deal AS deal
                             LEFT JOIN dbo_subdeal_calendar AS sub_calendar ON (deal.create_deal_code=sub_calendar.create_deal_code)
                             WHERE  sub_calendar.s_calendar_status='8'  and deal.create_deal_attention='1' $date_search_won ";  
               $result_case_won_sale= $conn->query($sql_case_won_sale); 
               $count_case_won_sale=$result_case_won_sale->num_rows;
              ///  ///     
              
             
              /// Case Assign Rent ///
               $sql_case_assign_rent="SELECT create_deal_sale FROM dbo_create_deal WHERE   create_deal_attention='1'  $date_search  ";  
               $result_case_assign_rent= $conn->query($sql_case_assign_rent); 
               $count_case_assign_rent=$result_case_assign_rent->num_rows;
              ///  ///            

              /// View Rent ///
               $sql_view_rent="SELECT DISTINCT sub_calendar.s_calendar_date , sub_calendar.create_deal_code 
                             FROM dbo_subdeal_calendar AS sub_calendar
                             LEFT JOIN dbo_create_deal  AS deal ON (deal.create_deal_code=sub_calendar.create_deal_code)
                             WHERE sub_calendar.s_calendar_status='3'  and deal.create_deal_attention='2' $date_search_won";  
               $result_view_rent= $conn->query($sql_view_rent); 
               $count_view_rent=$result_view_rent->num_rows;
              ///  ///     

              /// Case Won Rent ///
               $sql_case_won_rent="SELECT deal.create_deal_sale   
                             FROM dbo_create_deal AS deal
                             LEFT JOIN dbo_subdeal_calendar AS sub_calendar ON (deal.create_deal_code=sub_calendar.create_deal_code)
                             WHERE  sub_calendar.s_calendar_status='8'  and deal.create_deal_attention='2' $date_search_won ";  
               $result_case_won_rent= $conn->query($sql_case_won_rent); 
               $count_case_won_rent=$result_case_won_rent->num_rows;
              ///  ///     
              

  ?>
                       <tr style="background-color: #FF202B;color: #fff;font-weight:bold;"> 
                           <td>รวมทั้งหมด</td>
                        <td><center><?php if($count_case_assign_all!='0'){ echo $count_case_assign_all;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_view_all!='0'){ echo $count_view_all;}else{ echo "-";}?> </center></td>  
                        <td><center><?php if($count_case_won_all!='0'){ echo $count_case_won_all;}else{ echo "-";}?></center></td>                       
                        <td><center><?php if($count_case_assign_sale!='0'){ echo $count_case_assign_sale;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_view_sale!='0'){ echo $count_view_sale;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_case_won_sale!='0'){ echo $count_case_won_sale;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_case_assign_rent!='0'){ echo $count_case_assign_rent;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_view_rent!='0'){ echo $count_view_rent;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($count_case_won_rent!='0'){ echo $count_case_won_rent;}else{ echo "-";}?></center></td> 
                       </tr> 
                   </tbody>

              </table>
          </div>

    </div>   


      <?php } ?>


       <?php if($p=='report_conversion'){ // เช็ค report_conversion  

 
                   $date_start=$_GET['date_start'];
                   $date_end=$_GET['date_end']; 

                   $month_u=substr($date_start,5 , 2);
                   $year_u=substr($date_start,0 , 4 ); 
                   $date_u=substr($date_start,8, 2 );
                   $date_start_u=$date_u."/".$month_u."/".$year_u;

                   $month_u=substr($date_end,5 , 2);
                   $year_u=substr($date_end,0 , 4 ); 
                   $date_u=substr($date_end,8, 2 );
                   $date_end_u=$date_u."/".$month_u."/".$year_u;

                   $title="Report Conversion"; 

                   if($date_start!=''){ 

                       $date_search=" and  create_deal_create>='$date_start' and  create_deal_create<='$date_end' ";

                   }else{
         
                
                   } 



        ?>



                              <h3 class="card-title" style="padding: 10px;font-size: 20px;"><center>Report Conversion</center></h3> 

 <div class="scroll">

              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">

                <table   class="" style="font-size: 14px;" >

                  <thead>
                    <tr>  
                      <th style="width: 230px;" rowspan="2" >รายชื่อเซลล์</th> 
                      <th style="width: 300px;" colspan="3" >รวมทั้งหมด</th> 
                      <th style="width: 300px;" colspan="3" >Sale</th>  
                      <th style="width: 300px;" colspan="3" >Rent</th>
                    </tr>
                    <tr>  
                      <th>Case Assign</th>                       
                      <th>Case Won</th> 
                      <th>%</th>
                      <th>Case Assign</th>                     
                      <th>Case Won</th>
                      <th>%</th> 
                      <th>Case Assign</th> 
                      <th>Case Won</th> 
                      <th>%</th>
                    </tr>

                  </thead>
                  <tbody>
 <?php     // Check connection 

       $sql="SELECT register_id ,register_name,register_lastname , register_nickname  FROM dbo_register 
             WHERE register_lcok='0' and register_status='1'  or register_lcok='0' and register_status='4' and register_status_head='1' order by register_id ASC"; 
       $result = $conn->query($sql);

       if($result->num_rows > 0) {
          // output data of each row
           while($rs = $result->fetch_assoc()) {  $i++;
               
               $register_name=$rs['register_name'];
               $register_lastname=$rs['register_lastname'];
               $register_nickname=$rs['register_nickname']; 
               $register_id=$rs['register_id'];
                
               $name=$register_name." ".$register_lastname." (".$register_nickname.")"; 

              /// Case Assign All ///
               $sql_case_assign_all="SELECT create_deal_sale FROM dbo_create_deal  WHERE create_deal_sale='$register_id' $date_search ";  
               $result_case_assign_all= $conn->query($sql_case_assign_all); 
               $count_case_assign_all=$result_case_assign_all->num_rows;
              ///  ///             

              /// Case Won ALL ///
               $sql_case_won_all="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and contact_deal_win='8' $date_search ";  
               $result_case_won_all= $conn->query($sql_case_won_all); 
               $count_case_won_all=$result_case_won_all->num_rows;
              ///  ///     
              
                if($count_case_assign_all!='0'){
                    $per_all=($count_case_won_all/$count_case_assign_all)*100;
                }else{
                     $per_all='0';
                }


              /// Case Assign Sale ///
               $sql_case_assign_sale="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and create_deal_attention='1'  $date_search ";  
               $result_case_assign_sale= $conn->query($sql_case_assign_sale); 
               $count_case_assign_sale=$result_case_assign_sale->num_rows;
              ///  ///   

              /// Case Won Sale ///
               $sql_case_won_sale="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and contact_deal_win='8'  and create_deal_attention='1' $date_search ";  
               $result_case_won_sale= $conn->query($sql_case_won_sale); 
               $count_case_won_sale=$result_case_won_sale->num_rows;
              ///  ///     
              
                if($count_case_assign_sale!='0'){
                    $per_sale=($count_case_won_sale/$count_case_assign_sale)*100;
                }else{
                    $per_sale='0';
                }


              /// Case Assign Rent ///
               $sql_case_assign_rent="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and create_deal_attention='2'  $date_search ";  
               $result_case_assign_rent= $conn->query($sql_case_assign_rent); 
               $count_case_assign_rent=$result_case_assign_rent->num_rows;
              ///  ///      

              /// Case Won Rent ///
               $sql_case_won_rent="SELECT create_deal_sale FROM dbo_create_deal 
                           WHERE create_deal_sale='$register_id' and contact_deal_win='8'  and create_deal_attention='2'  $date_search ";  
               $result_case_won_rent= $conn->query($sql_case_won_rent); 
               $count_case_won_rent=$result_case_won_rent->num_rows;
              ///  ///     
              
                if($count_case_assign_rent!='0'){
                    $per_rent=($count_case_won_rent/$count_case_assign_rent)*100;
                }else{
                    $per_rent='0';
                }

 
              ///  ///  
     ?> 
                    <tr style="font-size: 10px; " style="width: 100%;"  >  
                        <td > 
                          <center><?php echo $name;?></center>
                        </td> 
                        <td><center><?php if($count_case_assign_all!='0'){ echo $count_case_assign_all;}else{ echo "-";}?></center></td>                    
                        <td><center><?php if($count_case_won_all!='0'){ echo $count_case_won_all;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($per_all==''){echo "0%"; }else{ echo number_format($per_all, 2 )."%"; } ?></center></td>  
                        <td><center><?php if($count_case_assign_sale!='0'){ echo $count_case_assign_sale;}else{ echo "-";}?></center></td>
                        <td><center><?php if($count_case_won_sale!='0'){ echo $count_case_won_sale;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($per_sale==''){echo "0%"; }else{ echo number_format($per_sale, 2 )."%"; } ?></center></td> 
                        <td><center><?php if($count_case_assign_rent!='0'){ echo $count_case_assign_rent;}else{ echo "-";}?></center></td>                     
                        <td><center><?php if($count_case_won_rent!='0'){ echo $count_case_won_rent;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($per_rent==''){echo "0%"; }else{ echo number_format($per_rent, 2 )."%"; } ?></center></td> 
                      </tr>  
        <?php  }
           } ?>

<?php 
              /// Case Assign All ///
               $sql_case_assign_all="SELECT create_deal_sale FROM dbo_create_deal  where create_deal_sale LIKE '%%' $date_search  ";  
               $result_case_assign_all= $conn->query($sql_case_assign_all); 
               $count_case_assign_all=$result_case_assign_all->num_rows;
              ///  ///            

              /// View ALL ///
               $sql_view_all="SELECT create_deal_sale FROM dbo_create_deal  WHERE  contact_deal_win='2' $date_search ";  
               $result_view_all= $conn->query($sql_view_all); 
               $count_view_all=$result_view_all->num_rows;
              ///  ///     

              /// Case Won ALL ///
               $sql_case_won_all="SELECT create_deal_sale FROM dbo_create_deal  WHERE   contact_deal_win='8'  $date_search ";  
               $result_case_won_all= $conn->query($sql_case_won_all); 
               $count_case_won_all=$result_case_won_all->num_rows;
              ///  ///     
              
                if($count_case_assign_all!='0'){
                    $per_all=($count_case_won_all/$count_case_assign_all)*100;
                }else{
                     $per_all='0';
                }


              /// Case Assign Sale ///
               $sql_case_assign_sale="SELECT create_deal_sale FROM dbo_create_deal  WHERE   create_deal_attention='1'  $date_search ";  
               $result_case_assign_sale= $conn->query($sql_case_assign_sale); 
               $count_case_assign_sale=$result_case_assign_sale->num_rows;
              ///  ///            

              /// View Sale ///
               $sql_view_sale="SELECT create_deal_sale FROM dbo_create_deal  WHERE   contact_deal_win='2' and create_deal_attention='1' $date_search ";  
               $result_view_sale= $conn->query($sql_view_sale); 
               $count_view_sale=$result_view_sale->num_rows;
              ///  ///     

              /// Case Won Sale ///
               $sql_case_won_sale="SELECT create_deal_sale FROM dbo_create_deal WHERE   contact_deal_win='8'  and create_deal_attention='1'  $date_search ";  
               $result_case_won_sale= $conn->query($sql_case_won_sale); 
               $count_case_won_sale=$result_case_won_sale->num_rows;
              ///  ///     
              
                if($count_case_assign_sale!='0'){
                    $per_sale=($count_case_won_sale/$count_case_assign_sale)*100;
                }else{
                    $per_sale='0';
                }


              /// Case Assign Rent ///
               $sql_case_assign_rent="SELECT create_deal_sale FROM dbo_create_deal WHERE   create_deal_attention='1'  $date_search  ";  
               $result_case_assign_rent= $conn->query($sql_case_assign_rent); 
               $count_case_assign_rent=$result_case_assign_rent->num_rows;
              ///  ///            

              /// View Rent ///
               $sql_view_rent="SELECT create_deal_sale FROM dbo_create_deal  WHERE  contact_deal_win='2' and create_deal_attention='2' $date_search ";  
               $result_view_rent= $conn->query($sql_view_rent); 
               $count_view_rent=$result_view_rent->num_rows;
              ///  ///     

              /// Case Won Rent ///
               $sql_case_won_rent="SELECT create_deal_sale FROM dbo_create_deal WHERE   contact_deal_win='8'  and create_deal_attention='2' $date_search ";  
               $result_case_won_rent= $conn->query($sql_case_won_rent); 
               $count_case_won_rent=$result_case_won_rent->num_rows;
              ///  ///     
              
                if($count_case_assign_rent!='0'){
                    $per_rent=($count_case_won_rent/$count_case_assign_rent)*100;
                }else{
                    $per_rent='0';
                }

  ?>
                       <tr style="background-color: #FF202B;color: #fff;font-weight:bold;"> 
                           <td>รวมทั้งหมด</td>
                          <td><center><?php if($count_case_assign_all!='0'){ echo $count_case_assign_all;}else{ echo "-";}?></center></td>                  
                          <td><center><?php if($count_case_won_all!='0'){ echo $count_case_won_all;}else{ echo "-";}?></td>  
                          <td><center><?php if($per_all==''){echo "0%"; }else{ echo number_format($per_all, 2 )."%"; } ?></center></td>  
                          <td><center><?php if($count_case_assign_sale!='0'){ echo $count_case_assign_sale;}else{ echo "-";}?></center></td>                           
                          <td><center><?php if($count_case_won_sale!='0'){ echo $count_case_won_sale;}else{ echo "-";}?></td>  
                          <td><center><?php if($per_sale==''){echo "0%"; }else{ echo number_format($per_sale, 2 )."%"; } ?></center></td> 
                          <td><center><?php if($count_case_assign_rent!='0'){ echo $count_case_assign_rent;}else{ echo "-";}?></center></td>                          
                          <td><center><?php if($count_case_won_rent!='0'){ echo $count_case_won_rent;}else{ echo "-";}?></center></td>  
                          <td><center><?php if($per_rent==''){echo "0%"; }else{ echo number_format($per_rent, 2 )."%"; } ?></center></td> 
 


                       </tr> 
                   </tbody>

              </table>
          </div>

    </div>   




      <?php } ?>



       <?php if($p=='report_see_number'){ // เช็ค report_conversion  

               $sql_update="SELECT * FROM report_account  order by report_account_id DESC LIMIT 1 ";  
               $result_update= $conn->query($sql_update); 
               $rs_update= $result_update->fetch_assoc();

               $report_account_update=$rs_update['report_account_update'];
        ?>



                              <h3 class="card-title" style="padding: 10px;font-size: 20px;"><center>Report ดูเบอร์ | Update : <?php echo $report_account_update;?></center></h3> 

 <div class="scroll">

              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">

                <table   class="" style="font-size: 14px;" >

                  <thead>
                    <tr>  
                      <th style="width: 230px;"   >รายชื่อเซลล์</th> 
                      <th style="width: 100px;"  >ดูเบอร์</th> 
                      <th style="width: 100px;"  >อัพเดทข้อมูล</th>  
                      <th style="width: 100px;"  >%</th>
                    </tr>
                     

                  </thead>
                  <tbody>
 <?php     // Check connection 

       $sql="SELECT register_id ,register_name,register_lastname , register_nickname  FROM dbo_register 
             WHERE register_lcok='0' and register_status='1'  or register_lcok='0' and register_status='4' and register_status_head='1' order by register_id ASC"; 
       $result = $conn->query($sql);

       if($result->num_rows > 0) {
          // output data of each row
           while($rs = $result->fetch_assoc()) {  $i++;
               
               $register_name=$rs['register_name'];
               $register_lastname=$rs['register_lastname'];
               $register_nickname=$rs['register_nickname']; 
               $register_id=$rs['register_id'];
                
               $name=$register_name." ".$register_lastname." (".$register_nickname.")"; 

              /// see number ///
               $sql_seenumber="SELECT sum(see_number) as see_number , sum(edit_listing) as edit_listing   FROM report_account  WHERE register_id='$register_id' $date_see_number ";  
               $result_seenumber= $conn->query($sql_seenumber); 
               $rs_see= $result_seenumber->fetch_assoc();

               $see_number=$rs_see['see_number']; 
               $edit_listing=$rs_see['edit_listing'];
              ///  ///             
 
                if($edit_listing!='0'){
                    if($see_number=='0'){ 
                         $per_see='0';
                    }else{
                         $per_see=($edit_listing/$see_number)*100;
                    }
 
                }else{
                    $per_see='0';
                }

                $see_number_all=$see_number+$see_number_all;
                $edit_listing_all=$edit_listing+$edit_listing_all;
   
     ?> 
                    <tr style="font-size: 10px; " style="width: 100%;"  >  
                        <td > 
                          <center><?php echo $name;?></center>
                        </td> 
                        <td><center><?php if($see_number!='0'){ echo number_format($see_number);}else{ echo "-";}?></center></td>                    
                        <td><center><?php if($edit_listing!='0'){ echo number_format($edit_listing);}else{ echo "-";}?></center></td>  
                          <td><center><?php if($per_see==''){echo "0%"; }else{ echo number_format($per_see, 2 )."%"; } ?></center></td>                     
                      </tr>  
        <?php  }
           } ?>

 
 <?php  
 
 
                if($edit_listing_all!='0'){
                    
                         $per_see=($edit_listing_all/$see_number_all)*100; 
 
                }else{
                    $per_see='0';
                }
  ?>
                     <tr   style="background-color: #FF202B;color: #fff;font-weight:bold;">  
                        <td > 
                          <center>รวมทั้งหมด</center>
                        </td> 
                        <td><center><?php if($see_number_all!='0'){ echo number_format($see_number_all);}else{ echo "-";}?></center></td>                    
                        <td><center><?php if($edit_listing_all!='0'){ echo number_format($edit_listing_all);}else{ echo "-";}?></center></td>  
                          <td><center><?php if($per_see==''){echo "0%"; }else{ echo number_format($per_see, 2 )."%"; } ?></center></td>                     
                      </tr> 
                   </tbody>

              </table>
          </div>

    </div>   


 



      <?php } ?>



       <?php if($p=='report_market' and $_SESSION['USER_ID']=='1' or $p=='report_market' and $_SESSION['USER_ID']=='6' ){ // เช็ค report_conversion   
 
        ?>



                              <h3 class="card-title" style="padding: 10px;font-size: 20px;"><center>Report Marketing</center></h3> 

 <div class="scroll">

              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">

                <table   class="" style="font-size: 14px;" >

                  <thead>
                    <tr>  
                      <th style="width: 100px;"   >รหัส DEAL</th> 
                      <th style="width: 100px;"   >ประเภททรัพย์</th> 
                      <th style="width: 100px;"   >ประเภทดีล</th> 
                      <th style="width: 100px;"   >ชื่อเซลล์</th> 
                      <th style="width: 300px;"   >ชื่อ DEAL</th> 
                      <th style="width: 150px;"   >CX ที่ลูกค้าเลือกมา</th> 
                      <th style="width: 150px;"   >ราคา</th> 
                      <th style="width: 150px;"  >ช่องทางการตลาด</th> 
                      <th style="width: 150px;"  >ภาษา</th> 
                      <th style="width: 200px;"  >วันที่สร้าง Deal</th>  
                    </tr>
                     

                  </thead>
                  <tbody>
 <?php     // Check connection 

       $sql="SELECT create_deal_code ,buyer_contact_code ,create_deal_title ,create_deal_attention ,source_code ,create_deal_create ,buyer_contact_listing_code ,
                    create_deal_type , create_deal_sale
             FROM dbo_create_deal AS deal
             WHERE   deal.create_deal_create>='$date_start' and  deal.create_deal_create<='$date_end'  order by deal.create_deal_create DESC"; 
       $result = $conn->query($sql);

       if($result->num_rows > 0) {
          // output data of each row
           while($rs = $result->fetch_assoc()) {  $i++;

               $create_deal_code=$rs['create_deal_code'];
               $buyer_contact_code=$rs['buyer_contact_code'];
               $create_deal_title=$rs['create_deal_title'];
               $create_deal_attention=$rs['create_deal_attention'];
               $source_code=$rs['source_code']; 
               $create_deal_create=$rs['create_deal_create'];  
               $buyer_contact_listing_code=$rs['buyer_contact_listing_code'];  
               $create_deal_type=$rs['create_deal_type'];  
               $create_deal_sale=$rs['create_deal_sale'];
                            
              /// dbo_buyer_contact ///
               $sql_buyer_contact="SELECT * FROM dbo_buyer_contact  WHERE buyer_contact_code='$buyer_contact_code' LIMIT 1  ";  
               $result_buyer_contact= $conn->query($sql_buyer_contact); 
               $rs_buyer_contact= $result_buyer_contact->fetch_assoc();
 
               /// dbo_data_excel_listing ///
               $sql_listing="SELECT ex_list_price FROM dbo_data_excel_listing  WHERE ex_list_listing_code='$buyer_contact_listing_code' LIMIT 1  ";  
               $result_listing= $conn->query($sql_listing); 
               $rs_listing= $result_listing->fetch_assoc();

               $ex_list_price=$rs_listing['ex_list_price'];


               $buyer_contact_language=$rs_buyer_contact['buyer_contact_language']; 

                
      /////////// dbo_buyer_contact ////////////////
             $sql_source="SELECT * FROM type_source where source_id='$source_code' LIMIT 1 ";  
             $result_source= $conn->query($sql_source);
             $rs_source=$result_source->fetch_assoc();

             $source_title=$rs_source['source_title']; 

             $buyer_contact_name=$buyer_contact_name." ".$buyer_contact_lastname;

             if($buyer_contact_language=='1'){
                    $title_lang="ภาษาไทย";
             }else{
                    $title_lang="ภาษาอังกฤษ";
             }

      /////////// type_asset ////////////////
             $sql_ass="SELECT name FROM type_asset where id='$create_deal_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['name']!=''){ $create_deal_type=$rs_ass['name'];  }
      ////////// End type_asset ////////////////

      /////////// dbo_register ////////////////
             $sql_re="SELECT register_id ,register_name , register_nickname  FROM dbo_register where register_id='$create_deal_sale' ";  
             $result_re= $conn->query($sql_re);
             $rs_re=$result_re->fetch_assoc();

             $register_nickname=$rs_re['register_nickname'];

             if($rs_re['register_id']!=''){ $sale_name=$rs_re['register_name']."($register_nickname)";  }
      ////////// End dbo_register ////////////////


             if($create_deal_attention=='1'){ $create_deal_attention_title="ขาย"; }else{ $create_deal_attention_title="เช่า";  }
 
      ////////// End dbo_buyer_contact ////////////////
              
   
     ?> 
                    <tr style="font-size: 10px; " style="width: 100%;"  >  
                        <td > 
                          <center><?php echo $create_deal_code;?></center>
                        </td> 
                        <td > <center><?php echo $create_deal_type;?></center> </td> 
                        <td > <center><?php if($create_deal_attention_title!='0'){ echo $create_deal_attention_title;}else{ echo "-";}?></center> </td> 
                        <td > <center><?php echo $sale_name;?></center> </td> 
                        <td><center><?php if($create_deal_title!='0'){ echo $create_deal_title;}else{ echo "-";}?></center></td>  
                        <td><center><a target="_blank" href="?page=upload_file_excel_check_view&listing=<?php echo $buyer_contact_listing_code;?>"    ><?php if($buyer_contact_listing_code!=''){ echo $buyer_contact_listing_code;}else{ echo "-";}?></a></center></td>         
                        <td><center><?php if($ex_list_price!='0'){ echo number_format($ex_list_price);}else{ echo "-";}?></center></td>              
                        <td><center><?php if($source_title!='0'){ echo $source_title;}else{ echo "-";}?></center></td>  
                        <td><center><?php if($title_lang!='0'){ echo $title_lang;}else{ echo "-";}?></center></td>    
                        <td><center><?php if($create_deal_create!='0'){ echo $create_deal_create;}else{ echo "-";}?></center></td>                     
                    </tr>  
        <?php  }
           } ?>

 
  
                   </tbody>

              </table>
          </div>

    </div>   

      <?php } ?>







        </div>
      </div>
    </section>




 
 

 

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
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
  
<!-- jQuery -->
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
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
 
<!-- Bootstrap -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="template/plugins/moment/moment.min.js"></script>
<script src="template/plugins/fullcalendar/main.js"></script>
 

 

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
    $('#reservationdate3').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    //Date picker
    $('#reservationdate4').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    //Date picker
    $('#reservationdate5').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    //Date picker
    $('#reservationdate6').datetimepicker({
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

 


  <?php } // END report_case ?>



  
    