 


  <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="template/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">


	 <?php
												// Check connection
      $project_get_id=$_GET['project'];
      $p_check=$_GET['p_check'];
      $date_=date("Y-m-d H:i:s");
      $id=$_GET['id'];

      $check_p=$_GET['check_p'];
      $calExpireDate=date ("Y-m-d", strtotime("+15 day", strtotime($today)));

      $status_calendar=$_GET['status_calendar'];

      if($p_check==''){

          echo("<script> top.location.href='https://connex.in.th/backend/?page=create_deal_buyer&status=create&p_check=create_buyer'</script>"); 

      }

    
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

 
        if($status=='create'){

 
           
        	
        }else{
           
 

        }

      ?>


<script language="JavaScript">
	function resutName(strCusName)
	{
			frmMain.txtID.value = strCusName.split("|")[0];
			frmMain.txtName.value = strCusName.split("|")[1];
	}
</script>

 


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->



 <?php if($p_check=='subdeal'){ 


         $sql="SELECT * FROM dbo_subdeal AS subdeal 
                 LEFT JOIN dbo_create_deal AS deal  ON deal.create_deal_code=subdeal.create_deal_code  
                 LEFT JOIN dbo_buyer_contact AS buyer ON buyer.buyer_contact_code=deal.buyer_contact_code 
               WHERE subdeal.subdeal_code='$id' ";  

         $result=$conn->query($sql);
         $rs=$result->fetch_assoc(); 


         $buyer_contact_prefix=$rs['buyer_contact_prefix'];
         $buyer_contact_name=$rs['buyer_contact_name'];
         $buyer_contact_lastname=$rs['buyer_contact_lastname'];
         $buyer_contact_nickname=$rs['buyer_contact_nickname'];
         $buyer_contact_tel=$rs['buyer_contact_tel'];
         $buyer_contact_line=$rs['buyer_contact_line'];
         $buyer_contact_fb=$rs['buyer_contact_fb'];
         $buyer_contact_email=$rs['buyer_contact_email'];
         $buyer_contact_whatsapp=$rs['buyer_contact_whatsapp'];
         $buyer_contact_remark=$rs['buyer_contact_remark'];
        
         $ex_list_listing_code=$rs['ex_list_listing_code'];



        if($buyer_contact_prefix=='1'){ $icon_profile="icon_men.png";  }else if($buyer_contact_prefix=='2'){ $icon_profile="icon_women.png"; } else{ $icon_profile="icon_women.png";  }
      
         $buyer_contact_name=$buyer_contact_prefix." ".$buyer_contact_name."  ".$buyer_contact_lastname;

  ?>  



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="img/<?php echo $icon_profile;?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $buyer_contact_name;?></h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>TEL : </b> <a class="float-right"><?php echo $buyer_contact_tel;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>LINE : </b> <a class="float-right"><?php echo $buyer_contact_line;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>WHATAPP : </b> <a class="float-right"><?php echo $buyer_contact_whatsapp;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>E-MAIL : </b> <a class="float-right"><?php echo $buyer_contact_email;?></a>
                  </li>
                </ul>

                <a href="?page=create_deal_buyer&status=edit&p_check=create_buyer&code=<?php echo $code;?>" class="btn btn-primary btn-block"><b>แก้ไขข้อมูล</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Remark</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 

                <p class="text-muted">
                  <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                  <?php echo $buyer_contact_remark;?>
                </p>

                <hr>
 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-10">

              <div class="row"> 
                <div class="col-md-3">
                   <a href="javascript:history.back(1)" type="button" class="btn btn-block btn-success">กลับไปหน้า DEAL</a>
                </div>
              </div><br>

            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#deal" data-toggle="tab">SUB DEAL</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Note Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Sub Deal</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">


                  <div class="active tab-pane" id="deal">

    
                 <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                  <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">
                  <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                  <input type="text" class="form-control" name="p_check"  value="calendar" hidden="hidden" >
                  <input type="text" class="form-control" name="id"  value="<?php echo $id;?>" hidden="hidden">

              <?php if($status_calendar!=''){ ?>

                  <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">
                  <input type="text" class="form-control" name="id_calendar"  value="<?php echo $id_calendar;?>" hidden="hidden">

              <?php } ?> 



                    <div class="row">

                      <div class="col-md-4"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-4 col-form-label">LISTING : </label>
                            <div class="col-sm-8">  
                                    <input type="text" class="form-control"  disabled="disabled"  value="<?php echo $ex_list_listing_code;?>" >  
                            </div> 
                          </div> 
                      </div> 
                      <div class="col-md-9"> 
                           
                      </div> 
                     
                      <div class="col-md-8" > 
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">นัดหมาย : </label>
                          <div class="col-sm-10">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                  <label class="btn btn-success active">
                                    <input type="radio" name="s_calendar_status" id="option_b1" autocomplete="off" value="1" checked> นำเสนอ Listing
                                  </label>
                                  <label class="btn btn-success">
                                    <input type="radio" name="s_calendar_status" id="option_b2" autocomplete="off" value="2"> นัดชมทรัพย์
                                  </label>
                                  <label class="btn btn-success">
                                    <input type="radio" name="s_calendar_status" id="option_b3" autocomplete="off" value="3"> นัดทำสัญญา
                                  </label>
                                  <label class="btn btn-success">
                                    <input type="radio" name="s_calendar_status" id="option_b3" autocomplete="off" value="4"> นัดส่งมอบกุญแจ
                                  </label>
                                </div>
                           </div>
                        </div> 
                      </div>
                      <div class="col-md-4" >  
                      </div> 
                      <div class="col-md-4"> 
                           <div class="form-group row">
                            <label for="inputEmail4" class="col-sm-4 col-form-label">ลงวันที่ : </label>
                            <div class="col-sm-8"> 
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="s_calendar_date"  placeholder="โปรดกรอกตาม format ให้ถูกต้อง 01/01/2022"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask />
                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>

                            </div> 
                          </div> 
                      </div> 
 
                       <div class="col-md-12" > 
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-1 col-form-label">Remark : </label>
                            <div class="col-sm-11"> 
                              <textarea class="form-control" rows="5" placeholder="Enter ..." id="s_calendar_note" name="s_calendar_note"><?php echo $s_calendar_note;?></textarea>
                            </div>
                          </div> 
                       </div>

                       <div class="col-md-6"> 
                          <div class="form-group row">
                            <input type="text" class="form-control" name="create_deal_user" hidden="hidden" value="<?php echo $_SESSION['USER_ID']; ?>">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">ผู้เพิ่มข้อมูล : </label>
                            <div class="col-sm-9"><input type="text" class="form-control"  disabled="disabled"  value="<?php echo $_SESSION['USER_ID'];?>"> </div>
                            
                          </div> 
                      </div>

                      <div class="col-12" id="buyer_contact_submit" >
                       
                    
                           <center>
                               <input type="submit" class="btn btn-danger" value="บันทึก Calendar">
                               <a href="" class="btn btn-danger" >ยกเลิก SUB DEAL นี้</a>
                           </center>
                         
                        <!-- /.form-group -->
                      </div>

                    </div>



                    </form>
                  </div>
                  <!-- /.tab-pane -->


                  <div class="tab-pane" id="activity">
                   
                    <!-- Post -->
                    <div class="post clearfix">            
             
                      <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data" action="include/process.php" >

                        <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden" >
                        <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                        <input type="text" class="form-control" name="p_check"  value="create_note_deal" hidden="hidden" >
                        <input type="text" class="form-control" name="id"  value="<?php echo $code;?>" hidden="hidden" >

                        <div class="input-group input-group-sm mb-0">
                          <textarea class="form-control form-control-sm" rows="5" placeholder="โปรดกรอกสิ่งที่ต้องการ Note โดยละเอียด" id="deal_note_message" name="deal_note_message"><?php echo $deal_note_message;?></textarea>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

  
                   
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->






    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

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


          <div class="col-md-0">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                     
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                 
              </div>
            </div>
          </div>
          <!-- /.col -->


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

 <?php } ?>


        <script type="text/javascript">
          
 

           $("#contact_deal_status_1").hide();
           $("#contact_deal_status_2").hide();
           $("#contact_deal_status_3").hide();
 


        </script>


   <script type="text/javascript">
$(document).ready(function(){
 

    $("#create_deal_attention").change(function(){
      var create_deal_attention = $("#create_deal_attention").val();
     
      if(create_deal_attention=="1"){

        $("#create_deal_duration_p").hide();
 
        /*
        $("#p1").hide();
        $("#p_floor").show();
        //$("#txt_box").val(""); */
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */

 

      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */ 
    
      }
    });
});
</script>

  


 
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
<!-- AdminLTE for demo purposes -->
 
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


<!-- jQuery -->
 
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

<?php 

    $sql="SELECT * FROM dbo_subdeal_calendar WHERE subdeal_code='$id' ";  

    $result=$conn->query($sql);
    $count=$result->num_rows ;

    while($rs=$result->fetch_assoc()){ $i++;
     
         $s_calendar_status=$rs['s_calendar_status'];
         $s_calendar_note=$rs['s_calendar_note'];
         $s_calendar_date=$rs['s_calendar_date'];
         $s_calendar_create=$rs['s_calendar_create'];
         $s_calendar_time_start=$rs['s_calendar_time_start'];
         $s_calendar_time_end=$rs['s_calendar_time_end'];

          $pm_am_1=substr($s_calendar_time_start,-2); 
          $time_start_1=substr($s_calendar_time_start,0 , 2 );
          $time_start_1 = str_replace(":","",$time_start_1,$count);

          if($pm_am_1=="AM"){

            
          }else if($pm_am_2=="PM"){

            $time_start_1=$time_start_1+12;
          }


          $pm_am_2=substr($s_calendar_time_end,-2); 
          $time_end_1=substr($s_calendar_time_end,0 , 2 );
          $time_end_1 = str_replace(":","",$time_end_1,$count);




          $year=substr($s_calendar_date,0 , 4 );
          $month=substr($s_calendar_date,5 , 2 );
          $day=substr($s_calendar_date,8 , 2 );

          $time=substr($s_calendar_date,11 , 5 );

          $month_2=$month-1;

         if($s_calendar_status=='1'){

              $title="นำเสนอ Listing".$s_calendar_date;

         }else if($s_calendar_status=='2'){

              $title="นัดชมทรัพย์".$s_calendar_date;

         }else if($s_calendar_status=='2'){

              $title="นัดทำสัญญา".$s_calendar_date;

         }

 ?>

        {
          title          : '<?php echo $title;?>',
          start          : new Date(<?php echo $year;?>,<?php echo $month_2;?>, <?php echo $day;?>),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        } 
<?php  if($i!=$count){ echo ","; }
     } ?>

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
        'color'           : '#fff'
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