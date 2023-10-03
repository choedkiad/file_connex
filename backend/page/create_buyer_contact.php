
  <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="template/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://rawgit.com/dbrekalo/attire/master/dist/js/build.min.js"></script>

        <link rel="stylesheet" href="dist/fastselect.css">
        <script src="dist/fastselect.standalone.js"></script>

        
	 <?php
												// Check connection
    
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }
 
 
        if($status=='create'){

          $list_id=$_GET['list_id'];
 
     
        	
        }else{
           

         $sql_buyer="SELECT * FROM dbo_buyer_contact where buyer_contact_id='$id' ";
         $result_buyer= $conn->query($sql_buyer); 
        // output data of each row
         $rs_buyer=$result_buyer->fetch_assoc();

         $buyer_contact_id =$rs_buyer['buyer_contact_id'];
         $buyer_contact_gender=$rs_buyer['buyer_contact_gender'];
         $buyer_contact_name=$rs_buyer['buyer_contact_name'];
         $buyer_contact_lastname=$rs_buyer['buyer_contact_lastname'];
         $buyer_contact_nickname=$rs_buyer['buyer_contact_nickname']; 
         $buyer_contact_tel=$rs_buyer['buyer_contact_tel'];
         $buyer_contact_line=$rs_buyer['buyer_contact_line'];
         $buyer_contact_fb=$rs_buyer['buyer_contact_fb'];
         $buyer_contact_email=$rs_buyer['buyer_contact_email'];
         $buyer_contact_whatsapp=$rs_buyer['buyer_contact_whatsapp'];
         $buyer_contact_note=$rs_buyer['buyer_contact_note'];
         $user_id=$rs_buyer['user_id']; 
         $buyer_contact_remark=$rs_buyer['buyer_contact_remark']; 
          
        }

      ?>


<script language="JavaScript">
	function resutName(strCusName)
	{
			frmMain.txtID.value = strCusName.split("|")[0];
			frmMain.txtName.value = strCusName.split("|")[1];
	}
</script>

<form method="post" id="form" enctype="multipart/form-data" action="include/process.php" > 

                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">
                 <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >           
 
            <?php if($status=='edit'){ ?>

                <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">
                <input type="text" class="form-control" name="id"  value="<?php echo $id;?>" hidden="hidden">

            <?php } ?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"> </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

             <div class="col-md-3"  <?php echo $check_hidden;?>  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ประเภท Contact : </label>
                    <div class="col-sm-8">
                        <select class="form-control select2bs4"  name="buyer_contact_status"  id="buyer_contact_status"  style="width: 100%;" required="">   
                             <option value="" <?php if($buyer_contact_status=='' ){?> selected <?php } ?>>ไม่ระบุ</option>   
                             <option value="1" <?php if($buyer_contact_status=='1' or $buyer_contact_status=='' ){?> selected <?php } ?>>ลูกค้า</option>  
                             <option value="2" <?php if($buyer_contact_status=='2'){?> selected <?php } ?>>agent</option>  
          
                        </select> 
                    </div>
                  </div> 
              </div>
              <div class="col-md-3" id="buyer_contact_wechat"  <?php echo $check_hidden;?>> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ความสนใจ : </label>
                    <div class="col-sm-8">
                        <select class="form-control select2bs4"  name="buyer_contact_attention"  id="buyer_contact_attention"  style="width: 100%;" required=""> 
                             <option value="" <?php if($buyer_contact_attention=='' ){?> selected <?php } ?>>ไม่ระบุ</option>      
                             <option value="1" <?php if($buyer_contact_attention=='1'){?> selected <?php } ?>>ซื้อ</option>  
                             <option value="2" <?php if($buyer_contact_attention=='2'){?> selected <?php } ?>>เช่า</option>  
                             <option value="3" <?php if($buyer_contact_attention=='3'){?> selected <?php } ?>>ซื้อและเช่า</option>            
                        </select> 
                    </div>
                  </div> 
              </div>
              <div class="col-md-6" id="buyer_contact_wechat"> 
                      <input type="text" class="form-control" id="create_deal_title" name="create_deal_title" placeholder="" value="<?php echo $create_deal_title;?>"  hidden >
              </div>
 
               <div class="col-md-3"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ชื่อเรียก : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="buyer_contact_line" name="buyer_contact_line" placeholder="โปรดกรอก ชื่อLine" value="<?php echo $buyer_contact_line;?>" required="" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">เบอร์ติดต่อ : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="buyer_contact_tel" name="buyer_contact_tel" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $buyer_contact_tel;?>" >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-3"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">เบอร์ติดต่อที่2 : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="buyer_contact_tel_2" name="buyer_contact_tel_2" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $buyer_contact_tel_2;?>" >
                    </div>
                  </div> 
              </div>

              <div class="col-md-3"   <?php echo $check_hidden;?>  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">เบอร์ติดต่อที่3 : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="buyer_contact_tel_3" name="buyer_contact_tel_3" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $buyer_contact_tel_3;?>" >
                    </div>
                  </div> 
              </div>

              <div class="col-md-3"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">เบอร์ติดต่อที่4 : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="buyer_contact_tel_4" name="buyer_contact_tel_4" placeholder="โปรดกรอกเบอร์โทรศัพท์" OnKeyPress="return chkNumbertel(this)" value="<?php echo $buyer_contact_tel_4;?>" >
                    </div>
                  </div> 
              </div>

              <div class="col-md-3"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">อีเมล์ : </label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="buyer_contact_email" name="buyer_contact_email" placeholder="โปรดกรอกอีเมล์" value="<?php echo $buyer_contact_email;?>" >
                    </div>
                  </div> 
              </div>

              <div class="col-md-3" id="buyer_contact_fb"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">FACEBOOK : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="buyer_contact_fb" name="buyer_contact_fb" placeholder="โปรดกรอก facebook"  value="<?php echo $buyer_contact_fb;?>" >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-3"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">LINE ID : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="buyer_contact_line_id" name="buyer_contact_line_id" placeholder="โปรดกรอก Line ID" value="<?php echo $buyer_contact_line_id;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"  <?php echo $check_hidden;?> > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">WHATSAPP : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="buyer_contact_whatsapp" name="buyer_contact_whatsapp" placeholder="โปรดกรอก Whatsapp"  OnKeyPress="return chkNumbertel(this)"  value="<?php echo $buyer_contact_whatsapp;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"  <?php echo $check_hidden;?>  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">WECHAT : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="buyer_contact_wechat" name="buyer_contact_wechat" placeholder="โปรดกรอก Wechat" value="<?php echo $buyer_contact_wechat;?>" >
                    </div>
                  </div> 
              </div> 


              <!-- /.col -->
            </div>
            <!-- /.row -->

      
            <!-- /.row -->
          </div>
          <!-- /.card-body -->

  
          <div class="card-header">
            <h3 class="card-title">ข้อมูลลูกค้าเพิ่มเติม </h3>

            <div class="card-tools">
 
            </div>
          </div>

          <div class="card-body">
            <div class="row">

              <div class="col-md-3"  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ชื่อ : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="buyer_contact_name" name="buyer_contact_name" placeholder="โปรดกรอกชื่อ" value="<?php echo $buyer_contact_name;?>"   >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"  id="buyer_contact_lastname" > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">นามสกุล : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="buyer_contact_lastname" name="buyer_contact_lastname" placeholder="โปรดกรอกนามสกุล" value="<?php echo $buyer_contact_lastname;?>"  >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"  id="buyer_contact_nickname" > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ชื่อเล่น : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="buyer_contact_nickname" name="buyer_contact_nickname" placeholder="โปรดกรอกชื่อเล่น" value="<?php echo $buyer_contact_nickname;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3" id="buyer_contact_gender"   > 
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">เพศ : </label>
                  <div class="col-sm-8">
                    <select class="form-control select"  name="buyer_contact_gender"  id="buyer_contact_gender"  style="width: 100%;">

                      <option value="0">ไม่เลือก</option>  
                      <option value="1" <?php if($buyer_contact_gender=='1'){?> selected <?php } ?>>ชาย</option>  
                      <option value="2" <?php if($buyer_contact_gender=='2'){?> selected <?php } ?>>หญิง</option>  
                    </select>
                   </div>
                </div> 
              </div>
              <div class="col-md-3"  id="buyer_contact_nationality" > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">สัญชาติ : </label>
                    <div class="col-sm-8">

                        <select class="form-control select2bs4"  name="buyer_contact_nationality"  id="buyer_contact_nationality"  style="width: 100%;">  
                            <option value="" <?php if($buyer_contact_nationality==''){?> selected <?php } ?> >ไม่เลือก</option>  
                  <?php 
                         $strSQL = "SELECT * FROM countries  "; 
                         $result=$conn->query($strSQL); 
                             
                         while($rs=$result->fetch_assoc()) { 

                               $alpha_3_code=$rs['alpha_3_code'];
                               $alpha_2_code=$rs['alpha_2_code'];
                               $en_short_name=$rs['en_short_name'];
                               $nationality=$rs['nationality'];
                   ?>

                             <option value="<?php echo $alpha_3_code ;?>" <?php if($alpha_3_code ==$buyer_contact_nationality){?> selected <?php } ?>><?php echo "".$nationality." | ".$en_short_name." - ".$alpha_2_code;?></option>  

                  <?php } ?>
          
                        </select> 
                    </div>
                  </div> 
              </div>
              <div class="col-md-3" id="buyer_contact_birthday"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ว/ด/ปี เกิด : </label>
                    <div class="col-sm-9">
                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="buyer_contact_birthday "  placeholder="โปรดกรอก วันเดือนปีเกิด"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask  />
                               <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                  <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                </div>
                        </div> 

                    </div>
                  </div> 
              </div>
              <div class="col-md-6" id="buyer_contact_gender"   > 
               
              </div>
              <div class="col-md-3" id="buyer_contact_gender"   > 
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">รายได้ต่อเดือน : </label>
                  <div class="col-sm-8">
                    <select class="form-control select"  name="buyer_monthly_income"  id="buyer_monthly_income"  style="width: 100%;">

                      <option value="0">ไม่เลือก</option>  
                      <option value="1" <?php if($buyer_monthly_income=='1'){?> selected <?php } ?>><20k</option>  
                      <option value="2" <?php if($buyer_monthly_income=='2'){?> selected <?php } ?>>20-50k</option>  
                      <option value="3" <?php if($buyer_monthly_income=='3'){?> selected <?php } ?>>50-80k</option>  
                      <option value="4" <?php if($buyer_monthly_income=='4'){?> selected <?php } ?>>80-100k</option>  
                      <option value="5" <?php if($buyer_monthly_income=='5'){?> selected <?php } ?>>>100k</option>  
                    </select>
                   </div>
                </div> 
              </div>
              <div class="col-md-4" id="buyer_contact_gender"   > 
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">วัตถุประสงค์การซื้อ : </label>
                  <div class="col-sm-8">
                    <select class="form-control select"  name="buyer_objective"  id="buyer_objective"  style="width: 100%;">

                      <option value="0">ไม่เลือก</option>  
                      <option value="1" <?php if($buyer_objective=='1'){?> selected <?php } ?>>อยู่อาศัย</option>  
                      <option value="2" <?php if($buyer_objective=='2'){?> selected <?php } ?>>ซื้อปล่อยเช่า</option>  
                      <option value="3" <?php if($buyer_objective=='3'){?> selected <?php } ?>>ขายทำกำไร </option>  
                      <option value="4" <?php if($buyer_objective=='4'){?> selected <?php } ?>>อื่นๆ</option>  
                    </select>
                   </div>
                </div> 
              </div>
              <div class="col-md-5"    > 
               
              </div>     
              <div class="col-md-6" id="buyer_contact_workplace_address"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">จุดหมายปลายทางหลัก  : </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="buyer_contact_workplace_address" name="buyer_contact_workplace_address" placeholder="โปรดกรอกสถานที่ทำงาน" value="<?php echo $buyer_contact_workplace_address;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3" id="buyer_contact_latitude"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ละติจูด : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="buyer_contact_latitude" name="buyer_contact_latitude" placeholder="โปรดกรอก ละติจูด" value="<?php echo $buyer_contact_latitude;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3" id="buyer_contact_longitude"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ลองจิจูด : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="buyer_contact_longitude" name="buyer_contact_longitude" placeholder="โปรดกรอก ลองจิจูด" value="<?php echo $buyer_contact_longitude;?>" >
                    </div>
                  </div> 
              </div>

              <div class="col-md-6" id="buyer_contact_google_map"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Map : </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="buyer_contact_google_map" name="buyer_contact_google_map" placeholder="โปรดกรอกเป็นลิงค์ Google Map" value="<?php echo $buyer_contact_google_map;?>" >
                    </div>
                  </div> 
              </div>



              <div class="col-12"  >
               
            
                   <center><input type="submit" class="btn btn-primary" value="บันทึกข้อมูล"></center>
                 
                <!-- /.form-group -->
              </div>


              <!-- /.col -->
            </div>
            <!-- /.row -->

      
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer"></div>
        </div>
        <!-- /.card -->

   
</form>

 
  

 
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

        <div class="card card-default">
         
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
 
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
         
        </div>
        <!-- /.card -->

 
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

