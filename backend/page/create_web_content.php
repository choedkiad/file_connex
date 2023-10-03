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
          <script src="https://connex.in.th/backend/ckeditor/ckeditor.js?v=111"></script>


        <link rel="stylesheet" href="dist/fastselect.css">
        <script src="dist/fastselect.standalone.js"></script>
	 <?php
												// Check connection
    
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }
 
 
        if($status=='create'){

   
 
     
        	
        }else{
           

         $sql="SELECT * FROM dbo_data_content where data_content_id ='$id' ";
         $result= $conn->query($sql); 
        // output data of each row
         $rs=$result->fetch_assoc();

         $data_content_title=$rs['data_content_title'];
         $data_content_detail=$rs['data_content_detail'];
         $data_content_meta_title=$rs['data_content_meta_title'];
         $data_content_meta_keyword=$rs['data_content_meta_keyword'];
         $data_content_meta_description=$rs['data_content_meta_description'];
         $data_content_url=$rs['data_content_url'];
         $data_content_img=$rs['data_content_img'];
         $data_content_date=$rs['data_content_date'];
         $data_content_highlight=$rs['data_content_highlight']; 
         $register_id=$rs['register_id']; 

         $data_content_title_en=$rs['data_content_title_en'];
         $data_content_detail_en=$rs['data_content_detail_en'];
         $data_content_url_en=$rs['data_content_url_en'];
         $data_content_meta_title_en=$rs['data_content_meta_title_en'];
         $data_content_meta_keyword_en=$rs['data_content_meta_keyword_en'];
         $data_content_meta_description_en=$rs['data_content_meta_description_en'];
         $data_content_highlight_en=$rs['data_content_highlight_en'];
          
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">หัวเรื่อง : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="data_content_title" name="data_content_title" placeholder="" value="<?php echo $data_content_title;?>" required>
                    </div>
                  </div> 
              </div>


              <div class="col-md-12"> 

                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title">
                        เนื้อหา
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body"> 
                      <textarea cols="80" class="ckeditor" name="data_content_detail" id="txtMessage" rows="10">
                              <?php echo $data_content_detail;?>

                      </textarea>
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
                           
                           <input type="checkbox" class="custom-control-input" id="customSwitch4" name="data_content_highlight" value="1" <?php if($data_content_highlight=='1'){ ?>checked="checked"<?php } ?> >
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
                      <input type="text" class="form-control" id="data_content_url" name="data_content_url" placeholder="" value="<?php echo $data_content_url;?>"  >
                    </div>
                  </div> 
              </div>

              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Title : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="data_content_meta_title" name="data_content_meta_title" placeholder="" value="<?php echo $data_content_meta_title;?>"  >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Keyword : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="data_content_meta_keyword" name="data_content_meta_keyword" placeholder="" value="<?php echo $data_content_meta_keyword;?>"    >
                    </div>
                  </div> 
              </div>
  
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Description : </label>
                    <div class="col-sm-10"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="data_content_meta_description" name="data_content_meta_description"><?php echo $data_content_meta_description;?></textarea>
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
  
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Topic : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="data_content_title_en" name="data_content_title_en" placeholder="" value="<?php echo $data_content_title_en;?>" required >
                    </div>
                  </div> 
              </div>


              <div class="col-md-12"> 

                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title">
                        Detail
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body"> 
                      <textarea cols="80" class="ckeditor" name="data_content_detail_en" id="txtMessage2" rows="10">
                              <?php echo $data_content_detail_en;?>

                      </textarea>
                    </div> 
                  </div> 

              </div>
   
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Images : </label>
                    <div class="col-sm-4">

                      <input type="file" class="form-control" id="files" name="filUpload_en" placeholder=""   >
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
                           
                           <input type="checkbox" class="custom-control-input" id="customSwitch4" name="data_content_highlight_en" value="1" <?php if($data_content_highlight_en=='1'){ ?>checked="checked"<?php } ?> >
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
            <h3 class="card-title">SEO Landing Page ภาษาอังกฤษ</h3>
 
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">URL : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="data_content_url_en" name="data_content_url_en" placeholder="" value="<?php echo $data_content_url_en;?>"  >
                    </div>
                  </div> 
              </div>
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Title : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="data_content_meta_title_en" name="data_content_meta_title_en" placeholder="" value="<?php echo $data_content_meta_title_en;?>"  >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Keyword : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="data_content_meta_keyword_en" name="data_content_meta_keyword_en" placeholder="" value="<?php echo $data_content_meta_keyword_en;?>"    >
                    </div>
                  </div> 
              </div>
  
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Description : </label>
                    <div class="col-sm-10"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="data_content_meta_description_en" name="data_content_meta_description_en"><?php echo $data_content_meta_description_en;?></textarea>
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


    <!-- /.content -->
  <script type="text/javascript">
  //<![CDATA[
   CKEDITOR.replace( 'txtMessage',{
  language : 'en',
    width : '100%',
  height : '500',
  filebrowserBrowseUrl : 'https://connex.in.th/backend/ckfinder/ckfinder.html',
  filebrowserImageBrowseUrl : 'https://connex.in.th/backend/ckfinder/ckfinder.html?Type=Images',
  filebrowserFlashBrowseUrl : 'https://connex.in.th/backend/ckfinder/ckfinder.html?Type=Flash',
  filebrowserUploadUrl : 'https://connex.in.th/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
  filebrowserImageUploadUrl : 'https://connex.in.th/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
  filebrowserFlashUploadUrl : 'https://connex.in.th/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
  } );

   CKEDITOR.replace( 'txtMessage2',{
  language : 'en',
    width : '100%',
  height : '500',
  filebrowserBrowseUrl : 'https://connex.in.th/backend/ckfinder/ckfinder.html',
  filebrowserImageBrowseUrl : 'https://connex.in.th/backend/ckfinder/ckfinder.html?Type=Images',
  filebrowserFlashBrowseUrl : 'https://connex.in.th/backend/ckfinder/ckfinder.html?Type=Flash',
  filebrowserUploadUrl : 'https://connex.in.th/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
  filebrowserImageUploadUrl : 'https://connex.in.th/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
  filebrowserFlashUploadUrl : 'https://connex.in.th/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
  } );
  //]]>
</script>



<!-- Summernote -->
<!--
<script src="https://connex.in.th/backend/template/plugins/summernote/summernote-bs4.min.js"></script>
 
<script src="https://connex.in.th/backend/template/plugins/codemirror/codemirror.js"></script>
<script src="https://connex.in.th/backend/template/plugins/codemirror/mode/css/css.js"></script>
<script src="https://connex.in.th/backend/template/plugins/codemirror/mode/xml/xml.js"></script>
<script src="https://connex.in.th/backend/template/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script> -->
<!-- AdminLTE for demo purposes -->
 
<!-- Page specific script -->
<!--
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>-->
 
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