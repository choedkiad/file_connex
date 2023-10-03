 


	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;
		 $sql="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$listing'  order by ex_list_id  DESC";
		 $result = $conn->query($sql); 
    	  // output data of each row
     $rs = $result->fetch_assoc();

         $ex_list_listing_code=$rs['ex_list_listing_code'];
 
      ?>


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
                  
                  <p><strong>COPY ให้ลูกค้า </strong> https://connex.in.th/listing/<?php echo $ex_list_listing_code;?></p>

        <?php  

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

             }
                ?>
 
                </div>
              </div>




         

              </div>
          
            </div>
                
  
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $rs['ex_list_heading'];?></h3>
        

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
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->




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