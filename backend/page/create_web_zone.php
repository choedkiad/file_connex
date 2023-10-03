<style type="text/css">
  .fstToggleBtn {
  font-size: 14px;
  display: block;
  position: relative;
  box-sizing: border-box;
  padding: 5px;
  width: 300px;
  cursor: pointer; }
  
</style>
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
           

         $sql_zone_g="SELECT * FROM type_zone_group where zone_g_id='$id' ";
         $result_zone_g= $conn->query($sql_zone_g); 
        // output data of each row
         $rs_zone_g=$result_zone_g->fetch_assoc();

         $zone_g_name=$rs_zone_g['zone_g_name'];
         $zone_g_name_en=$rs_zone_g['zone_g_name_en'];
         $zone_g_url=$rs_zone_g['zone_g_url'];
         $zone_g_url_en=$rs_zone_g['zone_g_url_en'];
         $zone_g_meta_title=$rs_zone_g['zone_g_meta_title'];
         $zone_g_meta_keyword=$rs_zone_g['zone_g_meta_keyword'];
         $zone_g_meta_description=$rs_zone_g['zone_g_meta_description'];
         $zone_g_meta_title_en=$rs_zone_g['zone_g_meta_title_en'];
         $zone_g_meta_keyword_en=$rs_zone_g['zone_g_meta_keyword_en'];
         $zone_g_meta_description_en=$rs_zone_g['zone_g_meta_description_en'];
         $zone_g_highlight=$rs_zone_g['zone_g_highlight'];
         $zone_g_number=$rs_zone_g['zone_g_number'];
         $register_id=$rs_zone_g['register_id'];
         $zone_g_lang=$rs_zone_g['zone_g_lang'];
         
          
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
            
            <?php if($list_id!=''){ ?>
               <input type="text" class="form-control" name="list_id"  value="<?php echo $_GET['list_id'];?>" hidden="hidden" >
            <?php } ?>
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
            <h3 class="card-title"></h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อโซน : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="zone_g_name" name="zone_g_name" placeholder="" value="<?php echo $zone_g_name;?>" required>
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อโซนภาษาอังกฤษ : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="zone_g_name_en" name="zone_g_name_en" placeholder="" value="<?php echo $zone_g_name_en;?>"  required >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ลำดับ : </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="zone_g_number" name="zone_g_number" placeholder="" value="<?php echo $zone_g_number;?>"  required >
                    </div>
                  </div> 
              </div>
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ภาพหน้าปก : </label>
                    <div class="col-sm-4">

                      <input type="file" class="form-control" id="files" name="filUpload" placeholder=""   >
                    </div>
                  </div> 
              </div>
              <!-- /.col -->
              <div class="col-md-12"> 
                  <div class="form-group row"> 
                    <label for="inputEmail3" class="col-sm-2 col-form-label">  </label>
                    <div class="col-sm-4"> 
                      <div class="card-tools"> 
                        <div class="custom-control custom-switch" style="margin-top:10px; ">
                           
                           <input type="checkbox" class="custom-control-input" id="customSwitch4" name="zone_g_highlight" value="1" <?php if($zone_g_highlight=='1'){ ?>checked="checked"<?php } ?> >
                           <label class="custom-control-label" for="customSwitch4">โชว์หน้าแรก</label>
                         
                        </div> 
                      </div> 

                    </div>
                  </div> 
              </div> 

            </div>
            <!-- /.row -->

      
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer"></div>
        </div>
        <!-- /.card -->

  

       <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">SEO Landing Page ภาษาไทย</h3>
 
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

              
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">URL : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="zone_g_url" name="zone_g_url" placeholder="" value="<?php echo $zone_g_url;?>"  >
                    </div>
                  </div> 
              </div> 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Title : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="zone_g_meta_title" name="zone_g_meta_title" placeholder="" value="<?php echo $zone_g_meta_title;?>"  >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Keyword : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="zone_g_meta_keyword" name="zone_g_meta_keyword" placeholder="" value="<?php echo $zone_g_meta_keyword;?>"    >
                    </div>
                  </div> 
              </div>
  
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Description : </label>
                    <div class="col-sm-10"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="zone_g_meta_description" name="zone_g_meta_description"><?php echo $zone_g_meta_description;?></textarea>
                    </div> 
                  </div>  
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


       <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">SEO Landing Page ภาษาอังกฤษ</h3>
 
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">URL : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="zone_g_url_en" name="zone_g_url_en" placeholder="" value="<?php echo $zone_g_url_en;?>"  >
                    </div>
                  </div> 
              </div> 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Title : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="zone_g_meta_title" name="zone_g_meta_title" placeholder="" value="<?php echo $zone_g_meta_title;?>"  >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Keyword : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="zone_g_meta_keyword" name="zone_g_meta_keyword" placeholder="" value="<?php echo $zone_g_meta_keyword;?>"    >
                    </div>
                  </div> 
              </div>
  
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Description : </label>
                    <div class="col-sm-10"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="zone_g_meta_description" name="zone_g_meta_description"><?php echo $zone_g_meta_description;?></textarea>
                    </div> 
                  </div>  
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
       


       <script>/*
      function cek_db(){
        var id = $("#project").val();
        $.ajax({
          url : 'script/auto_proses.php',
          data : "project="+id,
        }).success(function (data){
          var json = data,
          obj = JSON.parse(json);
          $('#ex_list_listing_type').val(obj.project_type);
          $('#ex_list_alley').val(obj.project_alley);
          $('#ex_list_road').val(obj.project_road);
 		  $('#provinces').val(obj.project_province);
 		  $('#amphures').val(obj.project_district);
 		  $('#districts').val(obj.project_subdistrict);
 		  $('#ex_list_train_station').val(obj.project_train_station);
 		  $('#ex_list_number_buildings').val(obj.project_number_buildings);
 		  $('#ex_list_road').val(obj.project_road);
 		  $('#ex_list_floor').val(obj.project_total_floors);
 		  $('#ex_list_rai').val(obj.project_rai);
 		  $('#ex_list_ngan').val(obj.project_ngan);
 		  $('#ex_list_wa').val(obj.project_wa);
 		  $('#ex_list_facilities').val(obj.project_facilities);
 		  $('#ex_list_nearby_places').val(obj.project_nearby_places);
 		  $('#ex_list_zone').val(obj.project_zone); 
 


        }) 
      }  */
      </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- 
      <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  -->


 


            <div class="row">
 
   <!-- /.col -->
            </div>
            <!-- /.row -->


          </div>
          <!-- /.card-body -->
          <div class="card-footer">
             
          </div>
        </div>
        <!-- /.card -->


 
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
              <div class="col-12">
               
            
                   <center><input type="submit" class="btn btn-primary" value="บันทึก และเพิ่มภาพ"></center>
                 
                <!-- /.form-group -->
              </div>
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


</form>