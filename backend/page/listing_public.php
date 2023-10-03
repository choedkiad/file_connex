<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 

         $id=$_GET['id'];
         $today=date("Y-m-d H:i:s");
         $status=$_POST['status'];
         $USER_ID=$_SESSION['USER_ID'];


         if($status=='1'){
         
         $code=$_POST['code'];
         $id_s=$_POST['id'];
         $ex_list_listing_status=$_POST['ex_list_listing_status'];
         $ex_list_rent_till=$_POST['ex_list_rent_till'];
         $record_remark=$_POST['record_remark'];


         $record_note="ดำเนินการแก้ไข/อัพเดท สถานะ Listing";

                      $sql = "UPDATE dbo_data_excel_listing SET  
                                ex_list_listing_status='".$ex_list_listing_status."',
                                ex_list_rent_till='".$ex_list_rent_till."',
                                ex_list_rent_till_note='".$record_remark."', 
                                ex_list_date_update='".$today."' 
                                WHERE ex_list_listing_code='".$id_s."' "; 


                           $sql_1="INSERT INTO dbo_record ( ex_list_id,record_note, ex_list_listing_status , ex_list_rent_till, record_remark,  record_date , record_user_id  )

                           VALUES ( '$id_s','$record_note', '$ex_list_listing_status', '$ex_list_rent_till' , '$record_remark' , '$today' , '$USER_ID')";
                            mysqli_query($conn, $sql_1);  


                      if ($conn->query($sql) === TRUE) { ?>
                       
                       <script>
                           close();   // Closes the new window
                        </script>
  
                 <?php             
                      } else {
                     
                           echo '<script type="text/javascript">alert("Error");</script>';
                           echo "Error updating record: " . $conn->error;   
                      }


         }else{

	         $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
	         $result_list= $conn->query($sql_list); 
	        // output data of each row
	         $rs_listing=$result_list->fetch_assoc();


	         $ex_list_public=$rs_listing['ex_list_public'];
           $ex_list_premium=$rs_listing['ex_list_premium'];
           $ex_list_boostpost=$rs_listing['ex_list_boostpost'];
           $ex_list_owner_tel=$rs_listing['ex_list_owner_tel'];
	         $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
 

        }
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
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ดำเนินการแก้ไขสถานะ Listing  </h3>

           
          </div>

<form method="post" id="form" enctype="multipart/form-data" action="" > 



                <input type="text" class="form-control" name="status"  value="1" hidden="hidden" >
                <input type="text" class="form-control" name="id"  value="<?php echo $rs_listing['ex_list_listing_code'];?>" hidden="hidden" >
          <!-- /.card-header -->
          <div class="card-body" >
            <div class="row">
              <div class="col-md-3"> 
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">รหัสทรัพย์ : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="code" name="code" placeholder="" value="<?php echo $rs_listing['ex_list_listing_code'];?>" disabled="disabled" >
                    </div>
                  </div> 
              </div>

                <div class="col-md-3">
                  <div class="card-tools"> 
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch1" name="ex_list_public" value="1" <?php if($ex_list_public=='1'){ ?>checked="checked" <?php } ?> >
                      <label class="custom-control-label" for="customSwitch1">อนุมัติเปิดใช้งาน</label> 
                    </div> 
                  </div> 
                </div>
                <div class="col-md-3">
                  <div class="card-tools"> 
                    <div class="custom-control custom-switch">
                       <input type="checkbox" class="custom-control-input" id="customSwitch2" name="ex_list_premium" value="1" <?php if($ex_list_premium=='1'){ ?>checked="checked"<?php } ?> >
                       <label class="custom-control-label" for="customSwitch2">Premium ประกาศ</label>
                    </div> 
                  </div> 
                </div>
                <div class="col-md-3">
                  <div class="card-tools"> 
                    <div class="custom-control custom-switch">
                       <input type="checkbox" class="custom-control-input" id="customSwitch3" name="ex_list_boostpost" value="1" <?php if($ex_list_boostpost=='1'){ ?>checked="checked"<?php } ?> >
                       <label class="custom-control-label" for="customSwitch3">Boost Post ประกาศ</label>
                    </div> 
                  </div> 
                </div>
                <div class="col-md-3">
                  <div class="card-tools"> 
                    <div class="custom-control custom-switch">
                       <input type="checkbox" class="custom-control-input" id="customSwitch4" name="ex_list_owner_tel" value="1" <?php if($ex_list_owner_tel=='0'){ ?>checked="checked"<?php } ?> >
                       <label class="custom-control-label" for="customSwitch4">เปิดให้เห็นเบอร์ Owner</label>
                    </div> 
                  </div> 
                </div>
                <div class="col-3">
                </div>

              <div class="col-md-6" id="p_ex_list_rent_till"  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">หมายเหตุ : </label>
                    <div class="col-sm-7">
                      <div class="input-group">
                         
                        <input type="text" class="form-control"  name="record_remark" id="record_remark"  value="<?php echo $record_remark;?>" >
                      </div>
 

                    </div> 
                  </div>  
              </div>
              <div class="col-md-12"> 
                  <div class="form-group row">
                      <center><input type="submit" class="btn btn-primary" value="บันทึกข้อมูล"></center>
                    
                  </div> 
              </div>


            <div class="card"  >
              <div class="card-header">
                <h3 class="card-title">ประวัติการอัพเดทข้อมูล</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead style="font-size: 12px;">
                    <tr>
                      <th>Day Update</th>
                      <th>สถานะ</th>
                      <th>เช่าถึงวันที่</th>
                      <th>#</th> 
                      <th>หมายเหตุ</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php


                 $sql_record="SELECT * FROM dbo_record where ex_list_id='$id' and record_note LIKE '%อัพเดท สถานะ Listing%' order by record_date DESC ";
                 $result_record= $conn->query($sql_record); 
                // output data of each row
                 while($rs_record=$result_record->fetch_assoc()){

                  $record_date=$rs_record['record_date'];
                  $ex_list_listing_status=$rs_record['ex_list_listing_status'];
                  $ex_list_rent_till=$rs_record['ex_list_rent_till'];
                  $record_user_id=$rs_record['record_user_id'];
                  $record_remark=$rs_record['record_remark'];

                  if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; }
                  else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; }
                  else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented"; }
                  else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold (by Connex)"; }
                  else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold (by Others)"; }

                 $sql_="SELECT * FROM dbo_register where register_id ='$record_user_id' ";
                 $result_= $conn->query($sql_); 
                // output data of each row
                 $rs_=$result_->fetch_assoc();
                  
                 $register_name=$rs_['register_name']; 

          ?>
                    <tr data-widget="expandable-table" aria-expanded="false" style="font-size: 12px;">
                      <td><?php echo $record_date;?></td>
                      <td><?php echo $ex_list_listing_status;?></td>
                      <td><?php echo $ex_list_rent_till;?></td>
                      <td><?php echo $register_name;?></td>
                      <td><?php echo $record_remark;?></td>
                    </tr>
           <?php } ?>         
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            </div>
          </div>

      </form>
               
            


         </div>
      </div>
    </section>


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