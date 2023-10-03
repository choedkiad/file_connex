<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 


if($_SESSION['USER_ID']==""){  

  
             echo '<script type="text/javascript">alert("คุณไม่ได้เข้าสู่ระบบ หรืออาจจะหลุดออกจากระบบ โปรด Log In ใหม่อีกครั้ง");</script>';
             echo("<script> top.location.href='../page/login.php'</script>"); 

 }


         $id=$_GET['id'];
         $today=date("Y-m-d H:i:s");
         $status=$_POST['status'];
         $USER_ID=$_SESSION['USER_ID'];

 
         $sql="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id'  LIMIT 1";
         $result = $conn->query($sql); 
            // output data of each row
         $rs_listing=$result->fetch_assoc();


         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
?>
 
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>

 
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
 


  <!-- Select2 -->
  <link rel="stylesheet" href="../template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
 
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
 
          <div class="card-header">
            <h3 >แจ้งสต๊อกติดต่อห้องให้</h3>

           
          </div>
 
 <script>
    function checkSubmit() {
        var e = document.getElementById('submit');
        e.style.display = "none";
    }
</script>

 

                                <div  style="width: 100%;">
                                   <div   style="font-size: 18px; padding: 10px;">

                           <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="../include/process.php" onsubmit="return checkSubmit()" >

                            <input type="text" class="form-control" name="page"  value="owner_listing_view" hidden="hidden">
                            <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                            <input type="text" class="form-control" name="p_check"  value="cancel_deal" hidden="hidden" >  
                            <input type="text" class="form-control" name="listing"  value="<?php echo $id;?>" hidden="hidden"  >
                            <input type="text" class="form-control" name="ex_list_deal_type"  value="<?php echo $ex_list_deal_type;?>" hidden="hidden">
                            <input type="text" class="form-control" name="ex_list_listing_status"  value="<?php echo $ex_list_listing_status;?>" hidden="hidden">
                            <input type="text" class="form-control" name="ex_list_rent_till"  value="<?php echo $ex_list_rent_till;?>" hidden="hidden">

                                      <input type="text" class="form-control" name="deal_sale"  value="<?php echo $_SESSION['USER_ID'];?>" hidden="hidden"> 

                                       <div class="col-md-12 col-sm-12" > 
                                          <div class="form-group row">
                                            <label for="inputEmail3" class="col-md-3 col-sm-3 col-form-label">ระบุ Deal : </label>
                                            <div class="col-md-12 col-sm-12"> 
                                                  <select class="form-control select2bs4"  name="create_deal_code"  id="create_deal_code"  style="width: 100%;" required="" >  
                                                       <option value="0"   >ไม่ระบุ</option>  
                                            <?php 
 

                                                   $sql="SELECT * FROM dbo_create_deal WHERE create_deal_sale='$USER_ID' and $STATUS_ID='1' and contact_deal_win!='8' and contact_deal_win!='9' and check_deal='0'   
                                                     
                                                  order by create_deal_create DESC"; 

                                                 $result = $conn->query($sql);
                                                 //$count=$result->num_rows;
                                             
                                            
                                                  // output data of each row
                                                  while($rs_deal=$result->fetch_assoc()) { $i++;

                                                    $create_deal_code=$rs_deal['create_deal_code']; 
                                                    $create_deal_title=$rs_deal['create_deal_title'];
                                             ?>

                                                       <option value="<?php echo $create_deal_code;?>" ><?php echo $create_deal_title;?></option>  

                                            <?php } ?>
                                    
                                                  </select>   
                                            </div>
                                          </div> 
                                       </div>
                                       <div class="col-md-12 col-sm-12" > 
                                          <div class="form-group row">
                                            <label for="inputEmail3" class="col-md-3 col-sm-3 col-form-label">ระบุ Remark : </label>
                                            <div class="col-md-12 col-sm-12"> 
                                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_record_note" name="s_record_note" style="width: 100%;" required="" ></textarea>
                                            </div>
                                          </div> 
                                       </div>
                                       
                                       <div class="col-md-12 col-sm-12" > 
                                           โปรดเลือก Deal เสมอ ทางทีมสต๊อกจะได้ทราบว่าเป็น Deal ไหน กรณีห้องไม่ว่าง หรือติดต่อไม่ได้ จะได้นำเสนอห้องอื่นๆ 

                                       </div>

                                      <div class="col-12" style="padding-top:-20px;" > 
                                    
                                           <center>
                                               <input type="submit" id="submit"  class="btn btn-success" value="แจ้งสต๊อก"> 
                                           </center> 
                                        <!-- /.form-group -->
                                      </div>  

                             </form>
                                </div>
      
                                <div class="modal-footer justify-content-between">
                                   
                                </div>
                          
                              <!-- /.modal-content -->
     
      </div>
    </section>
 


<!-- jQuery -->
<script src="../template/plugins/jquery/jquery.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>



<script src="../template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../template/plugins/jszip/jszip.min.js"></script>
<script src="../template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../template/plugins/pdfmake/vfs_fonts.js"></script> 
<script src="../template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../emplate/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<!--
<script src="template/plugins/moment/moment.min.js"></script>
<script src="template/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="../template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../template/dist/js/adminlte.js"></script>
 
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--
<script src="template/dist/js/pages/dashboard.js"></script>-->
 
 





<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
