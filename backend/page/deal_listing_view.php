<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 

         $id=$_GET['id'];
         $today=date("Y-m-d H:i:s");
         isset( $_POST['status'] ) ? $status = $_POST['status'] : $status = ""; 
         $USER_ID=$_SESSION['USER_ID'];

 


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

  <style>
div.scroll {width:100%; max-height: 400px; overflow-x:auto;}
 
</style>


<style type="text/css">
    

    div.dataTables_wrapper div.dataTables_filter input {
      margin-left: 10px;
      display: inline-block;
      width: 300px;
    }

    div.dataTables_wrapper div.dataTables_filter{

      text-align: left;
    }
</style>
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div >
          <div class="card-header">
            <h1 >นำเสนอห้อง</h1>

           
          </div>
 
 <script language="JavaScript">

  function fncSubmit()
{ 
        var e = document.getElementById('submit');
        e.style.display = "none";  
} 
</script>

                                <div  style="width: 100%;">
                                   <div class="row" style="font-size: 18px; padding: 20px;">

                           <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="../include/process.php" onSubmit="JavaScript:return fncSubmit();"  >

                            <input type="text" class="form-control" name="page"  value="view_create_subdeal" hidden="hidden">
                            <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                            <input type="text" class="form-control" name="p_check"  value="cancel_deal" hidden="hidden" >  
                            <input type="text" class="form-control" name="listing"  value="<?php echo $id;?>" hidden="hidden">
                                      <input type="text" class="form-control" name="deal_sale"  value="<?php echo $_SESSION['USER_ID'];?>" hidden="hidden">

                                     <div class="col-md-12" > 
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">เลือกภาษา : </label>
                                          <div class="col-sm-9"> 
                                                 <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                 <label class="btn btn-success">
                                                    <input type="radio" name="lang" id="option_a2" autocomplete="on" value="2" required="" checked="checked"> EN
                                                  </label>
                                                  <label class="btn btn-success">
                                                    <input type="radio" name="lang" id="option_a3" autocomplete="off" value="1" required=""  > TH
                                                  </label>
                                                  
                                                  
                                                   
                                                </div>
                                          </div>
                                        </div> 
                                     </div>                                
                      
                                       <div class="col-md-12" > 
                                          <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">ระบุ Remark : </label>
                                            <div class="col-sm-9"> 
                                              <textarea class="form-control" rows="2" placeholder="Enter ..." id="s_record_note" name="s_record_note" ></textarea>
                                            </div>
                                          </div> 
                                       </div>

                                   <div class="scroll">

                                      <div class="col-md-12" > 
                                          <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-12 col-form-label">เลือกดีลที่ต้องการเสนอ : </label>
                                            <div class="col-sm-12"> 
                               
                                                  <!-- /.card-header -->
                                                  <div class="card-body" style="margin: 0px; padding: 0px;">
                                                    <table id="example3" class="table table-bordered table-striped" style=" width: 100%;" >
                                                      <thead>
                                                      <tr  style="font-size: 12px;"   > 
                                                        <th>#</th>
                                                        <th>Code</th> 
                                                        <th>Title</th>
                                                        <th>Bed</th>
                                                        <th>Attention</th>
                                                        <th>Budget</th>
                                                        <th>Area</th> 
                                                        <th>Project</th>
                                                        <th>Zone</th>
                                                        <th>BTS</th> 
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                            
                                        <?php $i=0;

                                                     /*
                                            $sql="SELECT * FROM dbo_create_deal As deal 
                                                  LEFT JOIN dbo_subdeal AS sub On (deal.create_deal_code=sub.create_deal_code)
                                                  WHERE  

                                                      deal.create_deal_sale='$USER_ID' and $STATUS_ID='1' and deal.contact_deal_win!='8' and deal.contact_deal_win!='9' and deal.check_deal='0' and  sub.ex_list_listing_code!='$listing' or
                                                       $STATUS_ID='4' and deal.contact_deal_win!='8' and deal.contact_deal_win!='9' and deal.check_deal='0' and  sub.ex_list_listing_code!='$listing' or  
                                                       $STATUS_ID='3' and deal.contact_deal_win!='8' and deal.contact_deal_win!='9' and deal.check_deal='0' and  sub.ex_list_listing_code!='$listing' or 
                                                       $STATUS_ID='2' and deal.contact_deal_win!='8' and deal.contact_deal_win!='9' and deal.check_deal='0' and  sub.ex_list_listing_code!='$listing'
                                                  
                                                  order by deal.create_deal_create DESC";  
                                            $result = $conn->query($sql);

                                            */

/*
 ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);*/


         
                                                    $allsubdeal=array();
                                                    $sql_subdeal="SELECT create_deal_code FROM dbo_subdeal 
                                                                WHERE ex_list_listing_code='$id'  ";  
                                                    $result_subdeal=$conn->query($sql_subdeal);  
                                                    while($rs_subdeal=$result_subdeal->fetch_assoc()) {  
                                                       
                     
                                                         array_push($allsubdeal, $rs_subdeal['create_deal_code']);    
 
                                                    }   
                                                    $subdeal="'".implode("','" , $allsubdeal)."'";
 
                                            $sql="SELECT * FROM dbo_create_deal 
                                                  WHERE   
                                                       create_deal_sale='$USER_ID' and $STATUS_ID='1' and contact_deal_win!='8' and contact_deal_win!='9' and check_deal='0' and create_deal_code NOT IN($subdeal) or
                                                       $STATUS_ID='4' and contact_deal_win!='8' and contact_deal_win!='9' and check_deal='0' and create_deal_code NOT IN($subdeal) or  
                                                       $STATUS_ID='3' and contact_deal_win!='8' and contact_deal_win!='9' and check_deal='0' and create_deal_code NOT IN($subdeal) or 
                                                       $STATUS_ID='2' and contact_deal_win!='8' and contact_deal_win!='9' and check_deal='0' and create_deal_code NOT IN($subdeal)
                                                     
                                                  order by create_deal_create DESC"; 
                                             
                                        
                                            $result = $conn->query($sql);
                                            //$count=$result->num_rows;
                                             
                                            
                                                  // output data of each row
                                                while($rs_deal=$result->fetch_assoc()) { $i++;

                                                    $create_deal_code=$rs_deal['create_deal_code']; 

                                                    /*if(!in_array( $create_deal_code , $allsubdeal)) { */


                                                     $create_deal_title=$rs_deal['create_deal_title'];
                                                     $create_deal_attention=$rs_deal['create_deal_attention'];
                                                     $create_deal_bedroom=$rs_deal['create_deal_bedroom'];
                                                     $create_deal_budget_start=$rs_deal['create_deal_budget_start'];
                                                     $create_deal_budget_end=$rs_deal['create_deal_budget_end'];
                                                     $zone_id=$rs_deal['zone_id'];
                                                     $station_id=$rs_deal['station_id'];
                                                     $project_id=$rs_deal['project_id'];

                                                     $create_deal_attention_2=$rs_deal['create_deal_attention_2'];
                                                     $create_deal_type_2=$rs_deal['create_deal_type_2'];
                                                     $project_id_2=$rs_deal['project_id_2'];
                                                     $zone_id_2=$rs_deal['zone_id_2'];
                                                     $station_id_2=$rs_deal['station_id_2'];
                                                     $create_deal_bedroom_2=$rs_deal['create_deal_bedroom_2'];  
                                                     $create_deal_sqm_start_2=$rs_deal['create_deal_sqm_start_2'];
                                                     $create_deal_sqm_end_2=$rs_deal['create_deal_sqm_end_2'];
                                                     $create_deal_budget_start_2=$rs_deal['create_deal_budget_start_2'];
                                                     $create_deal_budget_end_2=$rs_deal['create_deal_budget_end_2'];                                                   

                                                     if($create_deal_attention_2!='0'){           
                                                           $project_id=$project_id_2;
                                                           $zone_id=$zone_id_2;
                                                           $station_id=$station_id_2; 
                                                           $create_deal_bedroom=$create_deal_bedroom_2; 
                                                           $create_deal_sqm_start=$create_deal_sqm_start_2;
                                                           $create_deal_sqm_end=$create_deal_sqm_end_2;
                                                           $create_deal_budget_start=$create_deal_budget_start_2;
                                                           $create_deal_budget_end=$create_deal_budget_end_2;
                                                           $create_deal_attention=$create_deal_attention_2; 

                                                     }       

                                                     if($create_deal_attention=='1'){
                                                          $attention="ขาย";
                                                     }else if($create_deal_attention=='2'){
                                                          $attention="เช่า";
                                                     }else{
                                                          $attention="ต่อสัญญา";
                                                     }

                                                   // project 
                                                    $sql_project_2="SELECT * FROM type_project WHERE project_id='$project_id' ";
                                                    $result_project_2= $conn->query($sql_project_2);  
                                                    $rs_project_2=$result_project_2->fetch_assoc(); 


                                                    isset( $rs_project_2['project_name'] ) ? $project_name = $rs_project_2['project_name'] : $project_name = "";
                                                    isset( $rs_project_2['project_name_en'] ) ? $project_name_en = $rs_project_2['project_name_en'] : $project_name_en = "";

                                                    $project_name=$project_name." | ".$project_name_en;

                                                   // Zone 
                                                    $sql_zone_2="SELECT * FROM type_zone WHERE zone_id='$zone_id' ";
                                                    $result_zone_2= $conn->query($sql_zone_2);  
                                                    $rs_zone_2=$result_zone_2->fetch_assoc();  
                                                    
                                                    isset( $rs_zone_2['zone_name'] ) ? $zone_name = $rs_zone_2['zone_name'] : $zone_name = "";

                                                    // train_station 
                                                    $sql_station_2="SELECT * FROM type_train_station WHERE station_id='$station_id' "; 
                                                    $result_station_2= $conn->query($sql_station_2);  
                                                    $rs_station_2=$result_station_2->fetch_assoc(); 
 
                                                    isset( $rs_station_2['station_train'] ) ? $station_train = $rs_station_2['station_train'] : $station_train = "";

                                                    if($create_deal_bedroom=='0' and $create_deal_bedroom!=''){
                                                             $bed='Studio';

                                                    }else if($create_deal_bedroom!='0' and $create_deal_bedroom!=''){
                                                             $bed=$create_deal_bedroom."b";
                                                    }else{
                                                             $bed="ไม่ระบุ";
                                                    } 

                                                       $budget=$create_deal_budget_start."-".$create_deal_budget_end;
                                                       $sql=$create_deal_sqm_start."-".$create_deal_sqm_end;


                                                       $budget_per=$create_deal_budget_end*0.3;
                                                       $budget_per1=$create_deal_budget_end-$budget_per;  
                                                       $budget_per2=$create_deal_budget_end+$budget_per;

                                                       $budget_per1=$budget_per1."-".$budget_per2;   
   
                                       ?>
   

                                                       <tr style="font-size: 12px;" > 
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                              <input class="custom-control-input" type="checkbox" id="customCheckbox<?php echo $i;?>" value="<?php echo $create_deal_code;?>" name="code[]" >
                                                              <label for="customCheckbox<?php echo $i;?>" class="custom-control-label"> </label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $create_deal_code;?></td>
                                                        <td><?php echo $create_deal_title;?></td>
                                                        <td><?php echo $bed;?></td>
                                                        <td><?php echo $attention;?></td>
                                                        <td><?php echo $budget;?><br> <?php echo $budget_per1;?></td>
                                                        <td><?php echo $sql;?></td>
                                                        <td><?php echo $project_name;?></td>
                                                        <td><?php echo $zone_name;?></td>
                                                        <td><?php echo $station_train;?></td>         
                                                      </tr>  
                                        <?php      
                                                    // }
                                                                                                  
                                                 } ?>

                                                    </tbody>
                                              
                                                  </table>
                                                </div>
                                              </div>
                                                   
                                            </div>
                                          </div> 

                                       </div>


                                       </div>
                                    

                                      <div class="col-12" style="padding-top:-20px;" > 
                                    
                                           <center>
                                               <input type="submit" class="btn btn-success" id="submit" id="submit" value="นำเสนอดีล">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้านี้</button>
                                           </center> 
                                        <!-- /.form-group -->
                                      </div>

                             </form>
                                </div>
      
                                <div class="modal-footer justify-content-between">
                                   
                                </div>
                          
                              <!-- /.modal-content -->
                
         </div>
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

<!-- DataTables  & Plugins -->
<script src="../template/plugins/datatables/jquery.dataTables.min.js?v=1"></script>
<script src="../template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!--
<script src="template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="template/plugins/jszip/jszip.min.js"></script>
<script src="template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="template/plugins/pdfmake/vfs_fonts.js"></script> -->

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

<!-- Select2 -->
<script src="../template/plugins/select2/js/select2.full.min.js"></script>


<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-12:eq(0)');
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
