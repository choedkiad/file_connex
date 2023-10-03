<?php 

ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 

 ?>

	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;
		 $sql="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$listing'  order by ex_list_id  DESC";
		 $result = $conn->query($sql); 
    	  // output data of each row
     $rs_listing = $result->fetch_assoc();

         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
         $ex_list_email_address=$rs_listing['ex_list_email_address'];
         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
         $ex_list_project=$rs_listing['ex_list_project'];
         $ex_list_alley=$rs_listing['ex_list_alley'];
         $ex_list_road=$rs_listing['ex_list_road'];
         $ex_list_subdistrict=$rs_listing['ex_list_subdistrict'];
         $ex_list_district=$rs_listing['ex_list_district'];
         $ex_list_province=$rs_listing['ex_list_province'];
         $ex_list_train_station=$rs_listing['ex_list_train_station'];
         $ex_list_googlmap=$rs_listing['ex_list_googlmap'];
         $ex_list_number_buildings=$rs_listing['ex_list_number_buildings'];
         $ex_list_floor=$rs_listing['ex_list_floor'];
         $ex_list_view=$rs_listing['ex_list_view'];
         $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
         $ex_list_rai=$rs_listing['ex_list_rai'];
         $ex_list_ngan=$rs_listing['ex_list_ngan'];
         $ex_list_wa=$rs_listing['ex_list_wa'];
         $ex_list_house_number=$rs_listing['ex_list_house_number'];
         $ex_list_sqm=$rs_listing['ex_list_sqm'];
         $ex_list_view=$rs_listing['ex_list_view'];
         $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
         $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
         $ex_list_other_room=$rs_listing['ex_list_other_room'];
         $ex_list_parking=$rs_listing['ex_list_parking'];
         $ex_list_furniture=$rs_listing['ex_list_furniture'];
         $ex_list_pets=$rs_listing['ex_list_pets'];
         $ex_list_direction=$rs_listing['ex_list_direction'];
         $ex_list_strengths=$rs_listing['ex_list_strengths'];
         $ex_list_gdrive_th=$rs_listing['ex_list_gdrive_th'];
         $ex_list_gdrive_en=$rs_listing['ex_list_gdrive_en'];
         $ex_list_facilities=$rs_listing['ex_list_facilities'];
         $ex_list_nearby_places=$rs_listing['ex_list_nearby_places'];
         $ex_list_details=$rs_listing['ex_list_details'];
         $ex_list_heading=$rs_listing['ex_list_heading'];
         $ex_list_price=$rs_listing['ex_list_price'];
         $ex_list_common_fee=$rs_listing['ex_list_common_fee'];
         $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
         $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
         $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
         $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $project_id=$rs_listing['project_id'];
      ?>



<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONNEX PROPERTY</title>

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


</head>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo $rs['ex_list_heading'];?></h3>
 
              <div class="col-12">

              <div class="card-body">
                <div class="row">   
                  
 

                  <div class="col-sm-12"><p><strong>COPY ให้ลูกค้า </strong> https://connex.in.th/listing/<?php echo $ex_list_listing_code;?></p></div>

                  <br><br>
        <?php  
    /*
             $OpenDir=opendir("../images/listing/$ex_list_listing_code");
             $File=readdir($OpenDir); 
    
             if($File!=''){

                			$allowed_types=array('jpg','jpeg','gif','png');
                			$dir    ="../images/listing/$ex_list_listing_code/";
                			$files1 = scandir($dir);
                			foreach($files1 as $key=>$value){
                			    if($key>1){
                			        $file_parts = explode('.',$value);
                			        $ext = strtolower(array_pop($file_parts));

                			        if(in_array($ext,$allowed_types)){  

                                  $file_img=$dir.$value;

                        ?>
                                  <div class="col-sm-6">
                                    <a href="#" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                      <img src="<?php echo $dir.$value;?>" class="img-fluid mb-2" alt="white sample"/> 
                                    </a>
                                  </div>

                           
                      <?php   } 
                           }
                       } 
             }else{

                      $url_dir=$ex_list_listing_code." New";
                      $allowed_types=array('jpg','jpeg','gif','png');
                      $dir    ="../images/listing/".$url_dir."/";
                      $files1 = scandir($dir);
                      foreach($files1 as $key=>$value){
                          if($key>1){
                              $file_parts = explode('.',$value);
                              $ext = strtolower(array_pop($file_parts));

                              if(in_array($ext,$allowed_types)){
                        ?>
                                  <div class="col-sm-6">
                                    <a href="#" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                      <img src="<?php echo $dir.$value;?>" class="img-fluid mb-2" alt="white sample"/> 
                                    </a>
                                  </div>
                      <?php   } 
                           }
                       } 

             }  */
   
                ?>
              <?php 

              $sql_list_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$listing' order by listing_img_no ASC";
              $result_list_img = $conn->query($sql_list_img);  
              while($rs_list_img=$result_list_img->fetch_assoc()){

                 $listing_img_folder=$rs_list_img['listing_img_folder'];
                 $listing_img_name=$rs_list_img['listing_img_name'];
                 $ex_list_listing_code=$rs_list_img['ex_list_listing_code'];

                 if($listing_img_folder!=''){   
                       $listing_img_name=$listing_img_folder.$listing_img_name;
                 }else{   
                       $listing_img_name="../../images/listing/".$ex_list_listing_code."/".$listing_img_name;  
                 }

                 ?> 
                          <div class="col-sm-6">
                              <a href="#" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                 <img src="<?php echo $listing_img_name;?>" class="img-fluid mb-2" alt="white sample"/> 
                              </a>
                          </div>
        <?php } ?>

                 </div>
              </div>


  
         

              </div>
          
            </div>
                
  
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $ex_list_heading;?></h3>
        

              <hr>
              <h4>รายละเอียด</h4>
              <p>
              	<b>โครงการ : </b> <?php echo $rs['ex_list_project'];?><br>
              	<b>ที่ตั้ง :  </b> <?php echo $rs['ex_list_alley']." ".$rs['ex_list_road']." ตำบล".$rs['ex_list_subdistrict']." อำเภอ".$rs['ex_list_district']." จังหวัด".$rs['ex_list_province'];?><br>
              	<b>พิกัด :  </b><?php echo $rs['ex_list_googlmap'];?><br>
              	<b>สถานีรถไฟฟ้า :  </b><?php echo $rs['ex_list_train_station'];?><br>
              	<b>รหัสทรัพย์ :   </b><?php echo $rs['ex_list_listing_code'];?><br><br>
              	<b>ราคา<?php echo $rs['ex_list_deal_type'];?> :  </b><?php echo $rs['ex_list_price'];?> บาท <br><br>
              	<b>ประเภท  :   </b><?php echo $rs['ex_list_listing_type'];?><br>
              	<b>จำนวนชั้น :   </b><?php echo $rs['ex_list_number_buildings'];?><br>
              	<b>ตั้งอยู่ชั้น :   </b><?php echo $rs['ex_list_floor'];?><br>
              	<b>พื้นที่ใช้สอย : </b><?php echo $rs['ex_list_sqm'];?><br>
              	<b>ห้องนอน :   </b><?php echo $rs['ex_list_bedroom'];?><br>
              	<b>ห้องน้ำ :  </b><?php echo $rs['ex_list_bathroom'];?><br>
              	<b>ห้องอื่นๆ :  </b><?php echo $rs['ex_list_other_room'];?><br><br>

              </p>
               <h4>ทำเลดี สถานที่ใกล้เคียง</h4>
		        <?php echo nl2br($rs['ex_list_nearby_places']);?><br><br>
               

               <h4>สิ่งอำนวยความสะดวก</h4>
		        <?php echo nl2br($rs['ex_list_facilities']);?><br><br> 

		        <h4>ลูกค้า </h4>
		        <b>ผู้ติดต่อ : </b><?php echo $rs['ex_list_contact_name'];?><br>
		        <b>เบอร์ติดต่อ : </b><?php echo $rs['ex_list_contact_tel'];?><br>
                <b>LINE ผู้ติดต่อ : </b><?php echo $rs['ex_list_contact_lineid'];?><br>
                <b>E-Mail : </b><?php echo $rs['ex_list_contact_email'];?><br>
                <b>Remark : </b><?php echo $rs['ex_list_remark'];?><br><br> 

                <h4>ชื่อผู้ติดต่อ</h4>
		        <b>ผู้ติดต่อ : </b><?php echo $rs['ex_list_contact'];?><br>
		        <b>เบอร์ติดต่อ : </b><?php echo $rs['ex_list_tel'];?><br>
                <b>LINE ผู้ติดต่อ : </b><?php echo $rs['ex_list_line'];?><br>
                <b>Whatsapp ผู้ติดต่อ : </b><?php echo $rs['ex_list_whatsapp'];?><br>              

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
 
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->


<script>
  window.addEventListener("load", window.print());
</script>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>