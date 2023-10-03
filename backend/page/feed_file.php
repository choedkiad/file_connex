


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>
              <!-- /.card-header --> 
              <!-- form start -->
              <form action="include/process.php" method="post" enctype="multipart/form-data" name="form1">
         
                <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">

              <div class="col-md-12"><br>

                 <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-4 col-form-label">เลือกข้อมูล : </label>
                     <div class="col-sm-8">
                        <select class="form-control select2bs4"  name="check_excel" style="width: 100%;" required> 
                          <option value="">ไม่เลือก</option>  
                          <option value="1">เชื่อมโยง Post Proppit XML</option>   
                          <option value="2">เชื่อมโยง Post Propertyhub json</option> 
                        </select>
                     </div>  
                  </div> 

                  <!--
                  <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-4 col-form-label">เลือกข้อมูล : </label>
                     <div class="col-sm-8">
                        <select class="form-control select2bs4"  name="code_id" style="width: 100%;" required> 
                          <option value="">ไม่เลือก</option>
      
                          <option value="1">1</option> 
             
                        </select>
                   </div>
                  </div>-->

                  <br>
                  <center><a href="rss_proppit.xml" target="_black">ไฟล์ XML Proppit Feed</a></center>
                  <center><a href="rss_propertyhub.json" target="_black">ไฟล์ JSON Propertyhub Feed</a></center>
              </div>

           
                <!-- /.card-body --> 
                <div class="card-footer">
                  <center> 
                    <input type="submit" value="คลิกอัพโหลดไฟล์ขึ้นระบบ" class="btn btn-primary" name="submit"></center>


                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
      </div>
    </section>




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>
              <!-- /.card-header --> 
              <!-- form start -->
            
              <div class="col-md-12"> 


        <table border="1">
           <tr>
               <td>ลำดับ</td>
               <td>CX</td>
               <td>Status</td>
               <td>Type</td>
               <td>Project</td> 
               <td>จำนวนห้องนอน</td>
               <td>พื้นที่</td>
               <td>ชั้นที่</td>
               <td>สถานีBTS MRT</td>
               <td>ราคา</td>
               <td>boost</td>
           </tr>


<?php 



		 $sql="SELECT * FROM dbo_data_excel_listing
               WHERE  ex_list_boostpost='1' and ex_list_close='0' or ex_list_proppit='1' and ex_list_close='0'  
               order by ex_list_boostpost DESC , ex_list_boostpost_date DESC , ex_list_proppit DESC , ex_list_proppit_date DESC , ex_list_date_update DESC  LIMIT 2000  ";  
		 $result = $conn->query($sql);

		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs_listing=$result->fetch_assoc()) {   $i++;

         

         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
       
         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];
         $ex_list_boostpost_date=$rs_listing['ex_list_boostpost_date'];
         $ex_list_proppit=$rs_listing['ex_list_proppit'];
         $ex_list_proppit_date=$rs_listing['ex_list_proppit_date'];

         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $project_id=$rs_listing['project_id'];
         $ex_list_no_images=$rs_listing['ex_list_no_images'];
         $ex_list_sqm=$rs_listing['ex_list_sqm'];
         $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
         $ex_list_price_check=$rs_listing['ex_list_price'];
         $ex_list_floor=$rs_listing['ex_list_floor'];
         $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
         $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
         $ex_list_house_number=$rs_listing['ex_list_house_number'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_train_station=$rs_listing['ex_list_train_station'];


         if($ex_list_listing_status=='' or $ex_list_listing_status=='0'){ $ex_list_listing_status="No Status"; $stauts_list_color="#000";  }
         else if($ex_list_listing_status=='1'){ $ex_list_listing_status="Available"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='2'){ $ex_list_listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
         else if($ex_list_listing_status=='3'){ $ex_list_listing_status="Rented";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
         else if($ex_list_listing_status=='4'){ $ex_list_listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='5'){ $ex_list_listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='6'){ $ex_list_listing_status="own use"; $stauts_list_color="#ff0000"; }
         else if($ex_list_listing_status=='7'){ $ex_list_listing_status="unknown"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='8'){ $ex_list_listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='9'){ $ex_list_listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='10'){ $ex_list_listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='11'){ $ex_list_listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='12'){ $ex_list_listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='13'){ $ex_list_listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='14'){ $ex_list_listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; }
         else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till;  }


     /////////// type_project ////////////////
          
          if($project_id!='0'){
         
             $sql_project="SELECT * FROM type_project where project_id='$project_id' ";  
             $result_project= $conn->query($sql_project);
             $rs_project=$result_project->fetch_assoc();

             $project_id=$rs_project['project_id'];
             $project_type=$rs_project['project_type'];
             $project_train_station=$rs_project['project_train_station'];
             $project_name=$rs_project['project_name'];
             $project_name_en=$rs_project['project_name_en']; 
             $project_total_floors=$rs_project['project_total_floors']; 


             $ex_list_project=$project_name_en;
             

               if($zone_id!='') {
                    $ex_list_zone=$zone_id;
               } 

               if($zone_id=='0'){  $ex_list_zone="ไม่ระบุโซน"; }

           
               if($ex_list_listing_type!='' or $ex_list_listing_type!='0'){ 
                     $ex_list_listing_type=$project_type;
               }

               if($project_train_station!=''){
                    $ex_list_train_station=$project_train_station;
               }else{}

          }else{

              if($ex_list_listing_name!='') {

                   $ex_list_project=$ex_list_listing_name;
              }else{
                   $ex_list_project="ไม่ระบุโครงการ";
              }

          }

            if($ex_list_floor=='' and $ex_list_listing_type_check!='1' and $ex_list_listing_type_check!='13' ){   
                if($ex_list_listing_type_check!='1' and $ex_list_total_floors!='' and  $ex_list_total_floors!='0' and $ex_list_listing_type_check!='13'){

                        $ex_list_floor=$ex_list_total_floors;  
                }
             
                if($ex_list_listing_type_check!='1' and $ex_list_total_floors=='' or  $ex_list_listing_type_check!='1' and $ex_list_total_floors=='0' and $ex_list_listing_type_check!='13'){ 
                         $ex_list_floor=$project_total_floors;  
                 } 
            }


      /////////// type_asset ////////////////
             $sql_ass="SELECT id , name FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////


         if($ex_list_boostpost=='1'){ 
                    $check_id='1';
                    $date_boost=$ex_list_boostpost_date; 
         }else{ 
                    $check_id='0';
                    $date_boost=$ex_list_boostpost_date; 
         }

          if($ex_list_train_station!=''  ){    
             $sql_train="SELECT station_train ,station_name_en  FROM type_train_station where station_id='$ex_list_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 


             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
          }


  
            /* if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}*/
            if($station_name!=''){ $ex_list_train_station=$rs_train['station_train'];} else{  $ex_list_train_station='';}
          ?>
           <tr>
               <td><?php echo $i;?></td>
               <td><?php echo $ex_list_listing_code;?></td>
               <td><?php echo $ex_list_listing_status;?></td> 
               <td><?php echo $ex_list_listing_type;?></td>
               <td><?php echo $ex_list_project;?></td> 
               <td><?php echo $ex_list_bedroom;?></td>
               <td><?php echo $ex_list_sqm;?></td>
               <td><?php echo $ex_list_floor;?></td>
               <td><?php echo $station_name;?></td> 
               <td><?php echo $ex_list_price_check;?></td>
               <td><?php echo $check_id;?></td>
           </tr>
 
           

          <?php

    }

  }

    ?>             
        </table>


              </div>

           
            </div>
            <!-- /.card -->
        </div>
      </div>
    </section>





 <script>
$(function () {
  bsCustomFileInput.init();
});
</script>