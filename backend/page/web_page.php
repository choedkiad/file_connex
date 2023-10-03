<style type="text/css">
  .fstToggleBtn {
  font-size: 16px;
  display: block;
  position: relative;
  box-sizing: border-box;
  padding: 5px;
  width: 450px;
  cursor: pointer; }

  .col-form-label{
    font-size: 13px;
  }
  .custom-control-label , .select_or , .form-control{
    font-size: 13px;
  }
  
</style>

 <script language="JavaScript">
  function chkNumber(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != 'a')  && (vchar != 'A')) return false;
  ele.onKeyPress=vchar;
  }

  function chkNumber2(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
  ele.onKeyPress=vchar;
  }


  function chkNumber3(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '/')) return false;
  ele.onKeyPress=vchar;
  }
  function chkNumbertel(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9')) return false;
  ele.onKeyPress=vchar;
  }

</script>



        <script src="https://rawgit.com/dbrekalo/attire/master/dist/js/build.min.js"></script>

        <link rel="stylesheet" href="dist/fastselect.css">
        <script src="dist/fastselect.standalone.js"></script>
   <?php
                        // Check connection
      $project_get_id=$_GET['project_id'];
      $date_=date("Y-m-d H:i:s");

    
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }

 
        if($status=='create'){


         $user_id=$_SESSION['USER_ID'];

         $sql_list_check="SELECT ex_list_listing_code , ex_list_id , ex_list_heading , ex_list_contact 
                          FROM dbo_data_excel_listing 
                          WHERE ex_list_contact='$user_id' and ex_list_heading='' order by ex_list_listing_code DESC";
         $result_list_check=$conn->query($sql_list_check); 
        // output data of each row
         $rs_list_check=$result_list_check->fetch_assoc();

        
           if($rs_list_check['ex_list_listing_code']!=''){
                 
                 $listing_code=$rs_list_check['ex_list_listing_code'];
                   
                   echo("<script> top.location.href='?page=$page&status=edit&id=$listing_code&check_create=1'</script>"); 


           }else{


               $no=0;
               $sql_list_code="SELECT ex_list_listing_code , ex_list_id FROM dbo_data_excel_listing order by ex_list_listing_code DESC";
               $result_list_code = $conn->query($sql_list_code); 
              // output data of each row
               $rs_code=$result_list_code->fetch_assoc();

               $ex_list_listing_code=$rs_code['ex_list_listing_code'];


               $a = str_replace("CX-","",$ex_list_listing_code,$count);

               if($a<5000){ 
                 $a = '5000';
               }else{
                 $a=$a+1;
               }
       

               $code = sprintf("CX-%'05d",$a);

                       $sql="INSERT INTO dbo_data_excel_listing  ( ex_list_listing_code,ex_list_date_create , ex_list_contact)
                                      VALUES ('$code' , '$date_' , '$user_id' )"; 
                       mysqli_query($conn, $sql); 
                                              //สร้างโฟลเดอร์อัตโนมัติโดยตั้งชื่อตามว/ด/ป
                           date_default_timezone_set('Asia/Bangkok');  
                           mkdir("../images/listing/$code");
                           mkdir("../images/listing/$code/no_watermark");

                       $record_note="ทำการเพิ่ม Listing : ".$code; 
                        $sql_1="INSERT INTO dbo_record (ex_list_id,record_note, ex_list_listing_status , record_date , record_user_id , record_remark)

                                 VALUES ('$code' , '$record_note' ,'$ex_list_deal_type' , '$date_' , '$USER_ID' , '1')";
                                  mysqli_query($conn, $sql_1); 
                 




                        echo("<script> top.location.href='?page=$page&status=edit&id=$code&check_create=1'</script>"); 
           }
           
        }else{

        $check_create=$_GET['check_create'];
           

         $sql_list="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
         $result_list= $conn->query($sql_list); 
        // output data of each row
         $rs_listing=$result_list->fetch_assoc();
         
         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
         $ex_list_email_address=$rs_listing['ex_list_email_address'];
         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_name=$rs_listing['ex_list_listing_name'];
         $ex_list_project=$rs_listing['ex_list_project'];
         $ex_list_project_en=$rs_listing['ex_list_project_en'];
         $ex_list_alley=$rs_listing['ex_list_alley'];
         $ex_list_alley_en=$rs_listing['ex_list_alley_en'];
         $ex_list_road=$rs_listing['ex_list_road'];
         $ex_list_road_en=$rs_listing['ex_list_road_en'];
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
         $ex_list_room_id=$rs_listing['ex_list_room_id'];
         $ex_list_house_number=$rs_listing['ex_list_house_number'];
         $ex_list_sqm=$rs_listing['ex_list_sqm'];
         $ex_list_view=$rs_listing['ex_list_view'];
         $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
         $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
         $ex_list_other_room=$rs_listing['ex_list_other_room'];
         $ex_list_parking=$rs_listing['ex_list_parking'];
         $ex_list_furniture=$rs_listing['ex_list_furniture'];
         $ex_list_common_facilities=$rs_listing['ex_list_common_facilities'];
         $ex_list_nearby_places_en=$rs_listing['ex_list_nearby_places_en'];
         $ex_list_pets=$rs_listing['ex_list_pets'];
         $ex_list_direction=$rs_listing['ex_list_direction'];
         $ex_list_strengths=$rs_listing['ex_list_strengths'];
         $ex_list_gdrive_th=$rs_listing['ex_list_gdrive_th'];
         $ex_list_gdrive_en=$rs_listing['ex_list_gdrive_en'];
         $ex_list_facilities=$rs_listing['ex_list_facilities'];
         $ex_list_furniture_en=$rs_listing['ex_list_furniture_en'];
         $ex_list_nearby_places=$rs_listing['ex_list_nearby_places'];
         $ex_list_details=$rs_listing['ex_list_details'];
         $ex_list_details_en=$rs_listing['ex_list_details_en'];
         $ex_list_heading=$rs_listing['ex_list_heading'];
         $ex_list_heading_en=$rs_listing['ex_list_heading_en'];
         $ex_list_price=$rs_listing['ex_list_price'];
         $ex_list_negotiable=$rs_listing['ex_list_negotiable'];
         $ex_list_common_fee=$rs_listing['ex_list_common_fee'];
         $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
         $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
         $ex_list_contact_tel1_2=$rs_listing['ex_list_contact_tel1_2'];
         $ex_list_contact_tel1_3=$rs_listing['ex_list_contact_tel1_3'];
         $ex_list_contact_tel1_4=$rs_listing['ex_list_contact_tel1_4'];         
         $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
         $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
         $ex_list_contact_fb=$rs_listing['ex_list_contact_fb'];
         $ex_list_contact_name_2=$rs_listing['ex_list_contact_name_2'];
         $ex_list_contact_tel_2=$rs_listing['ex_list_contact_tel_2'];
         $ex_list_contact_tel2_2=$rs_listing['ex_list_contact_tel2_2'];
         $ex_list_contact_tel2_3=$rs_listing['ex_list_contact_tel2_3'];
         $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4'];
         $ex_list_contact_email_2=$rs_listing['ex_list_contact_email_2'];
         $ex_list_contact_lineid_2=$rs_listing['ex_list_contact_lineid_2'];
         $ex_list_contact_fb_2=$rs_listing['ex_list_contact_fb_2']; 
         $ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
         $ex_list_showmap=$rs_listing['ex_list_showmap'];
         $ex_list_remark=$rs_listing['ex_list_remark'];
         $ex_list_video=$rs_listing['ex_list_video'];
         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_latitude=$rs_listing['ex_list_latitude'];
         $ex_list_longitude=$rs_listing['ex_list_longitude'];  
         $type_strengths_id=$rs_listing['type_strengths_id'];  
         $ex_list_furniture_id=$rs_listing['ex_list_furniture_id']; 
         $ex_list_owner_tel=$rs_listing['ex_list_owner_tel'];  
         $ex_list_contact=$rs_listing['ex_list_contact'];      
         $ex_list_rent_till_note=$rs_listing['ex_list_rent_till_note'];  

         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];

         $ex_list_strengths=$rs_listing['ex_list_strengths'];
         $ex_list_strengths_en=$rs_listing['ex_list_strengths_en'];
         $zone_id=$rs_listing['zone_id'];
         
 


///////////////////////////////// เช็คผู้เพิ่ม listing /////////////

     

          if($ex_list_contact!='' and $ex_list_contact!="20"){ 

         $sql_user="SELECT * FROM dbo_register where register_id='$ex_list_contact' "; 
         $result_user=$conn->query($sql_user);
         $rs_user= $result_user->fetch_assoc();

              $ex_list_contact=$ex_list_contact;

              $name_contact=$rs_user['register_name']." | ".$rs_user['register_email'];


        }else{  $ex_list_contact=$_SESSION['USER_ID'];    

              $name_contact= $NAME_ID." - ".$EMAIL_ID;
        }

 

     


///////////////////////////////// END เช็คผู้เพิ่ม listing /////////////


        if($project_get_id!=''){ $project_id=$project_get_id; 
        }else{  $project_id=$rs_listing['project_id'];   }
 

         $sql_projects="SELECT * FROM type_project where project_id='$project_id' order by project_id  ASC"; 
         $result_projects=$conn->query($sql_projects);
         $rs_projects= $result_projects->fetch_assoc();
         
         $project_type=$rs_projects['project_type'];
         $project_name=$rs_projects['project_name'];
         $project_name_en=$rs_projects['project_name_en'];
         $project_alley=$rs_projects['project_alley'];
         $project_road=$rs_projects['project_road'];
         $project_total_floors=$rs_projects['project_total_floors'];
         $project_subdistrict=$rs_projects['project_subdistrict'];
         $project_district=$rs_projects['project_district'];
         $project_province=$rs_projects['project_province'];
         $project_train_station=$rs_projects['project_train_station'];
         $project_facilities=$rs_projects['project_facilities'];
         $project_facilities_icon=$rs_projects['project_facilities_icon'];
         $project_nearby_places=$rs_projects['project_nearby_places'];
         $project_zone=$rs_projects['project_zone'];
         $project_nearby_places_en=$rs_projects['project_nearby_places_en'];
         $project_facilities_en=$rs_projects['project_facilities_en'];
         $project_map=$rs_projects['project_map'];

             if($project_id!='0' and $project_id!=''){  // project_id NO
        
  
                 $ex_list_alley=$project_alley;
                 $ex_list_road=$project_road;
                 $ex_list_subdistrict=$project_subdistrict;
                 $ex_list_district=$project_district;
                 $ex_list_province=$project_province; 
                 $ex_list_train_station=$project_train_station;
                 $ex_list_facilities=$project_facilities;

                 $ex_list_nearby_places=$project_nearby_places;
                 $ex_list_zone=$project_zone;
                 if($project_map!=''){ $ex_list_googlmap=$project_map;   }else{  }
                 
                 $ex_list_listing_name=$project_name_en;
                 $ex_list_nearby_places_en=$project_nearby_places_en;
                 $ex_list_common_facilities=$project_facilities_en;
                 $zone_id=$rs_projects['zone_id'];

                if($ex_list_listing_type!='' or $ex_list_listing_type!='0'){

                   $ex_list_listing_type=$project_type;
                }

                 if($ex_list_listing_type=='1' or $ex_list_total_floors=='' or $ex_list_total_floors=='0'){
                            
                         $ex_list_total_floors=$project_total_floors; 
                             
                 }



             }  // END project_id NO

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

                <input type="text" class="form-control" name="check_create"  value="<?php echo $check_create;?>" hidden="hidden" >
 

            <?php if($status!=''){ ?>

                <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">
                <input type="text" class="form-control" name="id"  value="<?php echo $id;?>" hidden="hidden">

            <?php } ?>
 
               

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
      <!--  <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"> </h3>
          
              <div class="row">
                <div class="col-md-2"> <a href="?page=create_listing&status=create" class="btn btn-block btn-primary btn-lg" > เพิ่มทรัพย์ในระบบ</a></div>
                <div class="col-md-6"></div>





              </div> 

          </div>
         
        </div> -->
 <!-- /.card-header -->




        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default" style="padding: 5px;">
          <div class="card-header">
            <h3 class="card-title">หัวข้อประกาศ </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div> 
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">TH : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="ex_list_heading" name="ex_list_heading" placeholder="" value="<?php echo $ex_list_heading;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">EN : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="ex_list_heading_en" name="ex_list_heading_en" placeholder="" value="<?php echo $ex_list_heading_en;?>" >
                    </div>
                  </div> 
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body --> 
        </div>
        <!-- /.card -->

<!----- ----------------------------   -->


        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default" style="padding: 5px;">
          <div class="card-header">
            <h3 class="card-title">ข้อมูล Listing </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div> 
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-2"> 
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">รหัสทรัพย์ </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="code" name="code" placeholder="" value="<?php echo $rs_listing['ex_list_listing_code'];?>" disabled="disabled" >
                    </div>
                  </div> 
              </div>


              <div class="col-md-4"> 

                  <div class="form-group row">
                       <label for="inputEmail3" class="col-sm-2 col-form-label">โครงการ </label>
                       <div class="col-sm-10">
                      <select class="form-control select_or" name="project" id="project" onchange="cek_db()"   > 
                        <option value="0"  >ไม่มีโครงการที่เลือก</option>  
      <?php  
       $sql_type_asset="SELECT * FROM type_project order by project_id  ASC"; 
       $result_type_asset=$conn->query($sql_type_asset);

       if($result_type_asset->num_rows > 0) { 
           while($rs_type = $result_type_asset->fetch_assoc()) {   


      ?> 
                        <option   value="<?php echo $rs_type['project_id'];?>" 
                          <?php if($rs_type['project_id']==$project_id){?> selected <?php } ?>  >
                          <?php echo $rs_type['project_name']." | ".$rs_type['project_name_en'];?></option> 
    <?php    }
          }     ?>
                      </select>

                      </div>
                  </div> 
              </div>
              <div class="col-md-2"> 
                   <a href="?page=create_project&status=create&list_id=<?php echo $id;?>" class="btn btn-block bg-gradient-danger"> เพิ่มโครงการ</a>
              </div>

              <div class="col-md-4"> 
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Listing Name </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="ex_list_listing_name" name="ex_list_listing_name" placeholder="" value="<?php echo $rs_listing['ex_list_listing_name'];?>" required>
                    </div>
                  </div> 
              </div>

              <div class="col-md-3">

                   <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-5 col-form-label">ประเภททรัพย์   </label>
                     <div class="col-sm-7">
                    <select class="form-control select2bs4" name="ex_list_listing_type" id="ex_list_listing_type"  style="width: 100%;" required >

                      <option value="">ไม่เลือก</option> 
    <?php  
     $sql_type_asset="SELECT * FROM type_asset order by id  ASC"; 
     $result_type_asset=$conn->query($sql_type_asset);

     if($result_type_asset->num_rows > 0) { 
         while($rs_type = $result_type_asset->fetch_assoc()) {   
    ?> 
                      <option value="<?php echo $rs_type['id'];?>" id="ex_list_listing_type" name="ex_list_listing_type" readonly  <?php if($ex_list_listing_type==$rs_type['id']){ ?>  selected <?php } ?> ><?php echo $rs_type['name'];?></option> 
  <?php    }
        }     ?>
                     
                    </select>
                   </div>
                  </div> 
              </div>
   
   
              <div class="col-md-3" id="p_ex_list_room_id">

                   <div class="form-group row">
                   

    <?php  $st3=0; 
           $type_room_id = explode(',', $ex_list_room_id);

     $sql_room="SELECT * FROM type_room order by room_id  ASC"; 
     $result_room=$conn->query($sql_room);

         while($rs_room = $result_room->fetch_assoc()) {   $st3++;

          $room_id=$rs_room['room_id'];
          $room_title=$rs_room['room_title'];
          $room_title_en=$rs_room['room_title_en'];
    ?> 
      
                    <div class="col-sm-4" style="margin-top: 5px;"> 
                       <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="customroom_id<?php echo $st3;?>" name="ex_list_room_id[]" value="<?php echo $room_id ;?>"
                            <?php if (in_array($room_id, $type_room_id)){ ?> checked <?php } ?>  >
                            <label for="customroom_id<?php echo $st3;?>" class="custom-control-label"><?php echo $room_title_en;?></label>
                        </div>
                    </div> 
    <?php } ?>
                   
                  </div> 
              </div> 


              <div class="col-md-3">

                   <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-5 col-form-label">ประเภทดีล </label>
                     <div class="col-sm-7">
                    <select class="form-control select2bs4"  name="ex_list_deal_type" style="width: 100%;" required>

                      <option value="">ไม่เลือก</option>  
                      <option value="1" <?php if($ex_list_deal_type==1){ ?>  selected <?php } ?> >ขาย</option> 
                      <option value="2" <?php if($ex_list_deal_type==2){ ?>  selected <?php } ?> >เช่า</option> 
                     
                    </select>
                   </div>
                  </div> 
              </div> 

  

              <div class="col-md-3">

                   <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-4 col-form-label">ประเภทสัญญา </label>
                     <div class="col-sm-8">
                    <select class="form-control select2bs4"  name="ex_list_contract_type" style="width: 100%;" required> 
                      <option value="">ไม่เลือก</option>  
                      <option value="1" <?php if($ex_list_contract_type==1){ ?>selected <?php } ?> >Exclusive</option> 
                      <option value="2" <?php if($ex_list_contract_type==2){ ?>selected <?php } ?>>Open</option> 
                      <option value="3" <?php if($ex_list_contract_type==3){ ?>selected <?php } ?>>No Contract</option> 
                    </select>
                   </div>
                  </div> 
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-6 col-form-label"> สถานะ listing (ปัจจุบัน) </label>
                    <div class="col-sm-6"> 
                    <select class="form-control select2bs4"  name="ex_list_listing_status" id="ex_list_listing_status" style="width: 100%;" required> 
                      <option value="">ยังไม่ระบุ</option>  
                      <option value="1" <?php if($ex_list_listing_status=='1'){ ?>  selected <?php } ?>  >Available</option> 
                      <option value="2" <?php if($ex_list_listing_status=='2'){ ?>  selected <?php } ?> >Contracted ไม่ล็อคสิทธิ</option>  
                      <option value="3" <?php if($ex_list_listing_status=='3'){ ?>  selected <?php } ?> >Rented</option>   
                      <option value="4" <?php if($ex_list_listing_status=='4'){ ?>  selected <?php } ?> >Sold (by Connex)</option>  
                      <option value="5" <?php if($ex_list_listing_status=='5'){ ?>  selected <?php } ?> >Sold (by Others)</option>  
                      <option value="6" <?php if($ex_list_listing_status=='6'){ ?>  selected <?php } ?> >own use</option> 
                      <option value="7" <?php if($ex_list_listing_status=='7'){ ?>  selected <?php } ?> >unknown</option> 
                    </select>

                    </div>
                  </div> 
              </div>
                      <input type="text" class="form-control" id="ex_list_listing_status_check" name="ex_list_listing_status_check" placeholder="" value="<?php echo $rs_listing['ex_list_listing_status'];?>" hidden >
                      <input type="text" class="form-control" id="ex_list_rent_till_check" name="ex_list_rent_till_check" placeholder="" value="<?php echo $rs_listing['ex_list_rent_till'];?>" hidden >

                      <input type="text" class="form-control" id="ex_list_rent_till_note_check" name="ex_list_rent_till_note_check" placeholder="" value="<?php echo $rs_listing['ex_list_rent_till_note'];?>" hidden >

              <div class="col-md-4" id="p_ex_list_rent_till"  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ติดผู้เช่าถึง  </label>
                    <div class="col-sm-8">
                      

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" data-inputmask-alias="datetime" name="ex_list_rent_till" id="ex_list_rent_till"  value="<?php echo $ex_list_rent_till;?>" data-inputmask-inputformat="dd/mm/yyyy" placeholder="dd/mm/yyyy" data-mask   OnKeyPress="return chkNumber3(this)" maxlength="10"  >
                      </div>

                    </div>  
                  </div>  
              </div>  
              <div class="col-md-4"   > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Remark</label>
                    <div class="col-sm-9"> 

                      <div class="input-group"> 
                        <input type="text" class="form-control" name="ex_list_rent_till_note" id="ex_list_rent_till_note"  value="<?php echo $ex_list_rent_till_note;?>"     placeholder="สำหรับกรอกหมายเหตุของสถานะlisting  " >
                      </div>

                    </div>  
                  </div>  
              </div> 
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">บ้านเลขที่  </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_house_number" placeholder="" value="<?php echo $ex_list_house_number;?>" >

                      <a onclick="window.open('page/recommend.php?st=ex_list_house_number', '_blank', 'location=yes,height=300,width=520,scrollbars=yes,status=yes');" style="font-size: 12px;color: #ff0000;"><!--<b>วิธีการกรอกที่ถูกต้อง</b>--></a>
                    </div>
                  </div> 
              </div> 
              
 
              <div class="col-md-2" id="p_floor"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ชั้นที่</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ex_list_floor" name="ex_list_floor" placeholder="" value="<?php if($ex_list_floor!=''){ echo $ex_list_floor; }else{ echo "0";} ?>" OnKeyPress="return chkNumber(this)"  >
                      
                       <!--
                      <a onclick="window.open('page/recommend.php?st=ex_list_floor', '_blank', 'location=yes,height=300,width=520,scrollbars=yes,status=yes');" style="font-size: 12px;color: #ff0000;"><b>คลิกเพื่อดูวิธีการกรอกที่ถูกต้อง</b></a>-->
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-4" id="p1"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >ขนาดพื้นที่ </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="ex_list_rai" name="ex_list_rai" placeholder="ไร่" value="<?php echo $ex_list_rai;?>" OnKeyPress="return chkNumber2(this)" >
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="ex_list_ngan" name="ex_list_ngan" placeholder="งาน" value="<?php echo $ex_list_ngan;?>" OnKeyPress="return chkNumber2(this)" >
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="ex_list_wa" name="ex_list_wa" placeholder="ตร.ว." value="<?php echo $ex_list_wa;?>" OnKeyPress="return chkNumber2(this)" >
                    </div>
                  </div>  
              </div>
              <div class="col-md-3"  id="p_sqm"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-6 col-form-label">พื้นที่ใช้สอย </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_sqm" placeholder="" value="<?php if($ex_list_sqm!=''){ echo $ex_list_sqm; }else{echo "0";}?>  "   OnKeyPress="return chkNumber2(this)"    >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-3"  id="p_bed"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-7 col-form-label">ห้องนอน (studio=0) </label>
                    <div class="col-sm-5"> 
                     
                      <input type="text" class="form-control" id="ex_list_bedroom" name="ex_list_bedroom" placeholder="" value="<?php if($ex_list_bedroom!=''){ echo $ex_list_bedroom; }else{echo "0";}?>" OnKeyPress="return chkNumber2(this)"  > 
                      <!--
                      <a onclick="window.open('page/recommend.php?st=ex_list_bedroom', '_blank', 'location=yes,height=300,width=520,scrollbars=yes,status=yes');" style="font-size: 12px;color: #ff0000;"><b>คลิกเพื่อดูวิธีการกรอกที่ถูกต้อง</b></a> -->
                    </div> 
                  </div>  
              </div>
              <div class="col-md-2" id="p_bath"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">ห้องน้ำ </label>
                    <div class="col-sm-7">

 

                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_bathroom" placeholder="" value="<?php if($ex_list_bathroom!=''){ echo $ex_list_bathroom; }else{echo "0";}?> " OnKeyPress="return chkNumber2(this)"  >
                      <!--
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_bathroom" placeholder="" value="<?php echo $ex_list_bathroom;?>" > -->
                    </div> 
                  </div>  
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ราคา </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_price" placeholder="" value="<?php echo $ex_list_price;?>" OnKeyPress="return chkNumber2(this)" required >

                    </div> 
                  </div>  
              </div> 
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">ราคาต่อรองแล้ว </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_negotiable" placeholder="" value="<?php echo $ex_list_negotiable;?>" OnKeyPress="return chkNumber2(this)" >

                    </div> 
                  </div>  
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">ค่าส่วนกลาง </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_common_fee" placeholder="" value="<?php echo $ex_list_common_fee;?>"  OnKeyPress="return chkNumber2(this)" >
                    </div> 
                  </div>  
              </div>

              <div class="col-md-2"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-6 col-form-label">ที่จอดรถ </label>
                    <div class="col-sm-6">
                 
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_parking" placeholder="" value="<?php echo $ex_list_parking;?>" OnKeyPress="return chkNumber(this)" >
                    </div> 
                  </div>  
              </div>
              
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ห้องอื่นๆ </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_other_room" placeholder="" value="<?php echo $ex_list_other_room;?>" >
                    </div> 
                  </div>  
              </div>
               <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-6 col-form-label">อนุญาติให้เลี้ยงสัตว์ </label>
                    <div class="col-sm-6">
                    <select class="form-control select2bs4"  name="ex_list_pets" style="width: 100%;"> 
                      <option value="0" <?php if($ex_list_pets==0){ ?>  selected <?php } ?>>ไม่อนุญาต</option>  
                      <option value="1"<?php if($ex_list_pets==1){ ?>  selected <?php } ?>>อนุญาต</option>  
                    </select> 

                    
                    </div>
                  </div> 
              </div>
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">หมายเหตุ </label>
                    <div class="col-sm-6"> 
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_remark" placeholder="" value="<?php echo $ex_list_remark;?>" >
                    </div>
                    <div class="col-sm-4"> 
                      <a onclick="window.open('page/recommend.php?st=ex_list_remark', '_blank', 'location=yes,height=300,width=520,scrollbars=yes,status=yes');" style="font-size: 12px;color: #ff0000;"><b>คลิกเพื่อดูวิธีการกรอกที่ถูกต้อง</b></a>
                    </div>
                  </div> 
              </div> 
              <div class="col-md-8"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Zone </label>
                    <div class="col-sm-6"> 
                     
                    <select class="form-control select2bs4"  name="zone_id" id="zone_id" style="width: 100%;" required> 
                      <option value="">ไม่เลือก</option>    
    <?php  

     $sql_zone="SELECT * FROM type_zone  "; 
     $result_zone=$conn->query($sql_zone);

     if($result_zone->num_rows > 0) { 
         while($rs_zone=$result_zone->fetch_assoc()) {   

                $zone_id_s=$rs_zone['zone_id'];
                $zone_name=$rs_zone['zone_name'];
                $zone_name_en=$rs_zone['zone_name_en'];
    ?> 
 
                      <option value="<?php echo $rs_zone['zone_id'];?>" <?php if($zone_id_s==$zone_id){?> selected <?php } ?>  ><?php echo $zone_name;?></option> 

  <?php   }
      }  ?>

                    </select>(เลือกโซนด้วย)

       <!-- Select2bs4 -->
           <script> 
                $('.select_or').fastselect(); 
            </script> 


                    </div>
                    <div class="col-sm-4"> 
                     
                    </div>
                  </div> 
              </div> 

              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body --> 
        </div>
        <!-- /.card -->

<!---------------------------------------->




        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default" style="padding: 5px;">
          <div class="card-header">
            <h3 class="card-title">ที่อยู่ </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div> 
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <!-- /.col -->

              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ซอย  </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ex_list_alley" id="ex_list_alley" placeholder="" value="<?php echo $ex_list_alley;?>"   >
                    </div>
                  </div> 
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ซอย EN  </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ex_list_alley_en" id="ex_list_alley_en" placeholder="" value="<?php echo $ex_list_alley_en;?>"   >
                    </div>
                  </div> 
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ถนน  </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="ex_list_road" name="ex_list_road" placeholder="" value="<?php echo $ex_list_road;?>" >
                    </div>
                  </div> 
              </div> 
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ถนน EN  </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="ex_list_road_en" name="ex_list_road_en" placeholder="" value="<?php echo $ex_list_road_en;?>" >
                    </div>
                  </div> 
              </div>
  
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">จังหวัด  </label>
                    <div class="col-sm-9"> 
                    <select class="form-control select2bs4" name="provinces" id="provinces" style="width: 100%;" required >

                      <option value="0">ยังไม่เลือก</option> 
    <?php  
     $sql_province="SELECT * FROM provinces order by id  ASC"; 
     $result_province=$conn->query($sql_province);

     if($result_type_asset->num_rows > 0) { 
          while($rs_province= $result_province->fetch_assoc()) {   
    ?>  
                      <option value="<?php echo $rs_province['id'];?>" <?php if($ex_list_province==$rs_province['id']){ ?>  selected <?php } ?> ><?php echo $rs_province['provinces_in_thai'];?></option> 
  <?php    }
        }  ?>
                      
                    </select>

                    </div>
                  </div> 
              </div> 
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">อำเภอ  </label>
                    <div class="col-sm-9"> 
                    <select class="form-control select2bs4"  name="amphures" id="amphures" style="width: 100%;" required> 
                      <option value="0">ยังไม่เลือก</option>  
    <?php  
     $sql_province="SELECT * FROM districts order by id  ASC"; 
     $result_province=$conn->query($sql_province);

     if($result_type_asset->num_rows > 0) { 
         while($rs_province= $result_province->fetch_assoc()) {   
    ?> 
 
                      <option value="<?php echo $rs_province['id'];?>" <?php if($ex_list_district==$rs_province['id']){ ?>  selected <?php } ?> ><?php echo $rs_province['districts_in_thai'];?></option> 

  <?php    }
        }  ?>
                      </select>

                    </div>
                  </div> 
              </div> 
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ตำบล  </label>
                    <div class="col-sm-9"> 
                    <select class="form-control select2bs4"  name="districts" id="districts" style="width: 100%;" > 
                      <option value="0">ยังไม่เลือก</option> 
    <?php  
     $sql_province="SELECT * FROM subdistricts order by id  ASC"; 
     $result_province=$conn->query($sql_province);

     if($result_type_asset->num_rows > 0) { 
         while($rs_province= $result_province->fetch_assoc()) {   
    ?> 
 
                      <option value="<?php echo $rs_province['id'];?>" <?php if($ex_list_subdistrict==$rs_province['id']){ ?>  selected <?php } ?>   ><?php echo $rs_province['subdistricts_in_thai'];?></option> 

  <?php    }
        }  ?>
                    </select>
  
                    </div>
                  </div> 
              </div>




  


              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">รถไฟฟ้า  </label>
                    <div class="col-sm-9"> 
                    <select class="form-control"  name="ex_list_train_station" id="ex_list_train_station" style="width: 100%;" required > 
                      <option value="0">ไม่เลือก</option>    
    <?php  

     $sql_train_station="SELECT * FROM type_train_station  "; 
     $result_train_station=$conn->query($sql_train_station);

     if($result_train_station->num_rows > 0) { 
         while($rs_train=$result_train_station->fetch_assoc()) {   
    ?> 
 
                      <option value="<?php echo $rs_train['station_id'];?>" <?php if($ex_list_train_station==$rs_train['station_id']){ ?>  selected <?php } ?>   ><?php echo $rs_train['station_code']." สถานีรถไฟฟ้า".$rs_train['station_name']." ".$rs_train['station_name_en']." | ".$rs_train['station_train'];?></option> 

  <?php    }
        }  ?>

                    </select>

       <!-- Select2bs4 -->
           <script> 
                $('.select_or').fastselect(); 
            </script>
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">จำนวนอาคาร </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="ex_list_number_buildings" name="ex_list_number_buildings" placeholder="" value="<?php echo $ex_list_number_buildings;?>" >
                    </div>
                  </div> 
              </div>
              <!--
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">อาคาร : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ex_list_floor" name="ex_list_floor" placeholder="" value="<?php echo $ex_list_floor;?>" >
                    </div>
                  </div> 
              </div>-->
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">จำนวนชั้น  </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ex_list_total_floors" name="ex_list_total_floors" placeholder="" value="<?php echo $ex_list_total_floors;?>" >
                    </div>
                  </div> 
              </div>

 
 


              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">วิว  </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_view" placeholder="" value="<?php echo $ex_list_view;?>" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ทิศ  </label>
                    <div class="col-sm-9"> 
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_direction" placeholder="" value="<?php echo $ex_list_direction;?>" >
                    </div>
                  </div> 
              </div>



            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body --> 
        </div>
        <!-- /.card -->

<!----- ----------------------------   -->


        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default" style="padding: 5px;">
          <div class="card-header">
            <h3 class="card-title">จุดเด่น </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div> 
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <!-- /.col -->

              <div class="col-md-12"> 
                  <div class="form-group row">

    <?php  
           $type_strengths = explode(',', $type_strengths_id);

     $st=0;
 
     $sql_strengths="SELECT * FROM type_strengths  "; 
     $result_strengths=$conn->query($sql_strengths);

     if($result_strengths->num_rows > 0) { 
         while($rs_strengths=$result_strengths->fetch_assoc()) { $st++;  

          $strengths_name=$rs_strengths['strengths_name'];
          $strengths_name_en=$rs_strengths['strengths_name_en'];
          $strengths_id =$rs_strengths['strengths_id'];
    ?>  
                    <div class="col-sm-3"> 
     
                     <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox<?php echo $st;?>" name="type_strengths_id[]" value="<?php echo $strengths_id ;?>" <?php if (in_array($strengths_id, $type_strengths)){ ?> checked <?php } ?> >
                          <label for="customCheckbox<?php echo $st;?>" class="custom-control-label"><?php echo $strengths_name." | ".$strengths_name_en;?></label>
                      </div>
 

    <!--
                       <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_strengths" 
                      name="ex_list_strengths"><?php echo $ex_list_strengths;?></textarea> -->

                    </div>  
      <?php }
    } ?>
                  </div>  
              </div>
              <!--
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">จุดเด่น EN : </label>
                    <div class="col-sm-8"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_strengths_en" 
                      name="ex_list_strengths_en"><?php echo $ex_list_strengths_en;?></textarea>
                    </div> 
                  </div>  
              </div>

            -->


            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body --> 
        </div>
        <!-- /.card -->

 
   


<!----- ----------------------------   -->


        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default" style="padding: 5px; width: 100%;">
          <div class="card-header">
            <h3 class="card-title">เฟอร์นิเจอร์ </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div> 
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <!-- /.col -->
       
              <div class="col-md-12"> 
                  <div class="form-group row">
                  

                      <!--
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_furniture" 
                      name="ex_list_furniture"><?php echo $ex_list_furniture;?></textarea> -->

    <?php   $st1=0;
 
           $type_furniture = explode(',', $ex_list_furniture_id);

     $sql_furniture="SELECT * FROM type_furniture  "; 
     $result_furniture=$conn->query($sql_furniture);

     if($result_furniture->num_rows > 0) { 
         while($rs_furniture=$result_furniture->fetch_assoc()) { $st1++;  

          $furniture_name=$rs_furniture['furniture_name'];
          $furniture_name_en=$rs_furniture['furniture_name_en'];
          $furniture_id=$rs_furniture['furniture_id'];
    ?>      
                 <div class="col-sm-3"> 
                     <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customfurniture<?php echo $st1;?>" name="type_furniture_id[]" value="<?php echo $furniture_id ;?>"
                          <?php if (in_array($furniture_id, $type_furniture)){ ?> checked <?php } ?>  >
                          <label for="customfurniture<?php echo $st1;?>" class="custom-control-label"><?php echo $furniture_name." | ".$furniture_name_en;?></label>
                      </div>
                  </div> 
    <?php }
    } ?> 
                    
                  </div>  
              </div>    


            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body --> 
        </div>
        <!-- /.card -->

  <!--
              <div class="col-md-6"> 
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">เฟอร์นิเจอร์ เวอร์ชั่น EN : </label>
                        <div class="col-sm-8"> 


                          <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_furniture_en" 
                          name="ex_list_furniture_en"><?php echo $ex_list_furniture_en;?></textarea>
                        </div> 
                      </div>  
                </div>-->





        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default" style="padding: 5px; width: 100%;">
          <div class="card-header">
            <h3 class="card-title">เฟอร์นิเจอร์ </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div> 
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <!-- /.col -->
       


             <div class="col-md-12"> 
                <div class="row">

                  <div class="col-md-6"> 
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">สิ่งอำนวยความสะดวก : </label>
                        <div class="col-sm-8"> 
                          <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_facilities" 
                           name="ex_list_facilities" required><?php echo $ex_list_facilities;?></textarea>
                        </div>
                      </div> 
                   </div>
                    <div class="col-md-6"> 
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-form-label">สิ่งอำนวยความสะดวก เวอร์ชั่น EN : </label>
                          <div class="col-sm-8"> 
                            <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_common_facilities" 
                             name="ex_list_common_facilities" required><?php echo $ex_list_common_facilities;?></textarea>
                          </div>
                        </div> 
                     </div>

                </div>
              </div>

              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">สถานที่ใกล้เคียง : </label>
                    <div class="col-sm-8"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_nearby_places" name="ex_list_nearby_places" required><?php echo $ex_list_nearby_places;?></textarea>
                    </div>
                  </div> 
              </div>

              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">สถานที่ใกล้เคียง เวอร์ชั่น EN : </label>
                    <div class="col-sm-8"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_nearby_places_en" name="ex_list_nearby_places_en" required><?php echo $ex_list_nearby_places_en;?></textarea>
                    </div>
                  </div> 
              </div>


              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">รายละเอียดเพิ่มเติม : </label>
                    <div class="col-sm-8"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." name="ex_list_details"><?php echo $ex_list_details;?></textarea>
                    </div>
                  </div> 
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Description EN : </label>
                    <div class="col-sm-8"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." name="ex_list_details_en"><?php echo $ex_list_details_en;?></textarea>
                    </div>
                  </div> 
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Link Youtube : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_video" placeholder="" value="<?php echo $ex_list_video;?>" >
                    </div> 
                  </div>  
              </div> 
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Google MAP Link : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ex_list_googlmap" name="ex_list_googlmap" placeholder="" value="<?php echo $ex_list_googlmap;?>"  required>
                    </div> 
                  </div>  
              </div> 
 

              <!--
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Google MAP Iframe : </label>
                    <div class="col-sm-8">
                       
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_showmap" name="ex_list_showmap" ><?php echo $ex_list_showmap;?></textarea>
                    </div> 
                  </div>  
              </div>-->
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ละติจูด : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_latitude" placeholder="" value="<?php echo $ex_list_latitude;?>" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ลองติจูด : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_longitude" placeholder="" value="<?php echo $ex_list_longitude;?>" >
                    </div> 
                  </div>  
              </div>  <!-- 
               <div class="col-md-12"> 
                  <div class="form-group row">

                    <label for="inputEmail3" class="col-sm-3 col-form-label">เซลล์ผู้ดูแล : </label>
                    <div class="col-sm-9"> 
                    <select class="form-control select2bs4"  name="ass_list" style="width: 100%;"> 
                        <option value="0">ยังไม่ส่ง</option>  
                  <?php  
                   $sql_agency="SELECT * FROM dbo_register where register_status='1' order by register_id  ASC"; 
                   $rse_agency=$conn->query($sql_agency);

                   if($rse_agency
                    ->num_rows > 0) { 
                        while($rs_agency=$rse_agency->fetch_assoc()) {   
                   ?>  
                         <option value="<?php echo $rs_agency['register_id '];?>"  ><?php echo $rs_agency['register_name'];?> | <?php echo $rs_agency['register_email'];?></option> 

                <?php   }
                   }  ?>
                     
                    </select>

                    </div>
                  </div> 
              </div> -->


               <div class="col-md-12"> 
                  <div class="form-group row">
                    <input type="text" class="form-control" name="ex_list_contact" value="<?php echo $ex_list_contact ;?>"  hidden="hidden">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ผู้เพิ่มข้อมูล : </label>
                    <div class="col-sm-9"><input type="text" class="form-control"  disabled="disabled"  value="<?php echo $name_contact;?>"> </div>
                    
                  </div> 
              </div>



            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body --> 
        </div>
        <!-- /.card -->

  

         

<?php if($ex_list_listing_type=='1'){ ?>

   <script type="text/javascript">
        $("#p1").hide();
        $("#p_floor").show();
   </script> 
<?php }else if($ex_list_listing_type=='12'){ ?>
   <script type="text/javascript">
        $("#p_bed").hide();
        $("#p_bath").hide();
        $("#p_sqm").hide();
        $("#p_sqm").hide();
   </script> 
<?php }else{?>
   <script type="text/javascript">
 
   </script> 
<?php } ?>


   <script type="text/javascript">
$(document).ready(function(){
 

    $("#ex_list_listing_type").change(function(){
      var ex_list_listing_type = $("#ex_list_listing_type").val();
     
      if(ex_list_listing_type == "1"){

        $("#p1").hide();
        $("#p1").hide();
        $("#p_floor").show();
        //$("#txt_box").val("");
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */

      }else if(ex_list_listing_type == "12"){

        $("#p_bed").hide();
        $("#p_bath").hide();
        $("#p_sqm").hide();
        $("#p_floor").hide();

      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */
        $("#p1").show();
        $("#p_bed").show();
        $("#p_bath").show();
        $("#p_sqm").show(); 
        $("#p_floor").hide();
      }
    });

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



    $("#project").change(function(){
      var project = $("#project").val();
     
      if(project!= ""){

       

        //$("#txt_box").val("");
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */
      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */
      
      }
    });


    $("#ex_list_listing_type").change(function(){
      var ex_list_listing_type = $("#ex_list_listing_type").val();
 
      if(ex_list_listing_type == "1"){

        $("#p_ex_list_room_id").show();
 
          document.getElementById("ex_list_room_id").disabled = false;
        //$("#txt_box").val("");
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */
      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */
        $("#p_ex_list_room_id").hide();
      }
    });



});

 <?php  
 if($ex_list_listing_status=='3'){  ?>
              $("#p_ex_list_rent_till").show(); 
 <?php  }else{  ?>
              $("#p_ex_list_rent_till").hide();
  <?php } ?>  


</script>


       <script>
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
          $('#ex_list_listing_name').val(obj.project_name);
          $('#ex_list_train_station').val(obj.project_train_station);
          $('#ex_list_number_buildings').val(obj.project_number_buildings);
          $('#ex_list_road').val(obj.project_road); 
          $('#ex_list_facilities').val(obj.project_facilities);
          $('#ex_list_nearby_places').val(obj.project_nearby_places);
          $('#ex_list_zone').val(obj.project_zone); 
          $('#zone_id').val(obj.zone_id_project); 
        
          $('#ex_list_googlmap').val(obj.project_map); 
          $('#ex_list_common_facilities').val(obj.project_facilities_en);  
          $('#ex_list_nearby_places_en').val(obj.project_nearby_places_en);  
          $('#ex_list_total_floors').val(obj.project_total_floors); 
 

         var x_listing_type = $('#ex_list_listing_type').val();
            if(x_listing_type == "1"){
                  $("#p1").hide();

                  $("#p_ex_list_room_id").show();
          }else{
                 $("#p1").show();

                 $("#p_ex_list_room_id").hide();
          }

            if(id!= "0"){

              /*  document.getElementById("ex_list_listing_type").disabled = true;*/
                document.getElementById("ex_list_alley").disabled = true;
                document.getElementById("ex_list_road").disabled = true;
                document.getElementById("provinces").disabled = true;
                document.getElementById("amphures").disabled = true;
                document.getElementById("districts").disabled = true;
                document.getElementById("ex_list_listing_name").disabled = true;
                document.getElementById("ex_list_common_facilities").disabled = true;
                document.getElementById("ex_list_nearby_places_en").disabled = true;
                document.getElementById("ex_list_train_station").disabled = true;
                document.getElementById("ex_list_number_buildings").disabled = true;
                document.getElementById("ex_list_road").disabled = true;
                document.getElementById("ex_list_googlmap").disabled = true;
                document.getElementById("zone_id").disabled = true;
             
                document.getElementById("ex_list_facilities").disabled = true;
                document.getElementById("ex_list_nearby_places").disabled = true;
                document.getElementById("ex_list_zone").disabled = true;
                document.getElementById("ex_list_total_floors").disabled = false;
 

              }else{

              /*  document.getElementById("ex_list_listing_type").disabled = false; */
                document.getElementById("ex_list_alley").disabled = false;
                document.getElementById("ex_list_road").disabled = false;
                document.getElementById("provinces").disabled = false;
                document.getElementById("amphures").disabled = false;
                document.getElementById("districts").disabled = false;
                document.getElementById("ex_list_listing_name").disabled = false;
                document.getElementById("ex_list_common_facilities").disabled = false;
                document.getElementById("ex_list_nearby_places_en").disabled = false;
                document.getElementById("ex_list_train_station").disabled = false;
                document.getElementById("ex_list_number_buildings").disabled = false;
                document.getElementById("ex_list_road").disabled = false;
                document.getElementById("ex_list_googlmap").disabled = false;
                document.getElementById("zone_id").disabled = false;

                document.getElementById("ex_list_facilities").disabled = false;
                document.getElementById("ex_list_nearby_places").disabled = false;
                document.getElementById("ex_list_zone").disabled = false;
                document.getElementById("ex_list_total_floors").disabled = false;
 
              }

        })
      }
      

  <?php 
      if($rs_projects['project_id']!=''){ //  check project id

  ?>           


            /*    document.getElementById("ex_list_listing_type").disabled = true; */
                document.getElementById("ex_list_alley").disabled = true;
                document.getElementById("ex_list_road").disabled = true;
                document.getElementById("provinces").disabled = true;
                document.getElementById("amphures").disabled = true;
                document.getElementById("ex_list_listing_name").disabled = true;
                document.getElementById("ex_list_common_facilities").disabled = true;
                document.getElementById("ex_list_nearby_places_en").disabled = true;
                document.getElementById("districts").disabled = true;
                document.getElementById("ex_list_train_station").disabled = true;
                document.getElementById("ex_list_number_buildings").disabled = true;
                document.getElementById("ex_list_road").disabled = true;
                document.getElementById("ex_list_googlmap").disabled = true;
                document.getElementById("zone_id").disabled = true;
                document.getElementById("ex_list_total_floors").disabled = false;
                document.getElementById("ex_list_facilities").disabled = true;
                document.getElementById("ex_list_nearby_places").disabled = true;
                document.getElementById("ex_list_zone").disabled = true;
                
                
   <?php 
       }  //  END check project id


     ?>
      </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- 
      <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  -->



    <?php include('script/script_listing_project.php');?>


        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ข้อมูล Owner คนที่1</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div>


          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"  >Name : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_name" placeholder="" value="<?php echo $ex_list_contact_name;?>"
                     <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>  > 
                    </div> 
                  </div>  
              </div>
              <div class="col-md-9"> 
                  <div class="form-group row" >
                    <label for="inputEmail3" class="col-sm-1 col-form-label"  >Tel : </label>
                    <div class="col-sm-11">
                                 
                      <div class="form-group row">

                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_tel"     placeholder="เบอร์ที่1" value="<?php echo $ex_list_contact_tel;?>"  OnKeyPress="return chkNumbertel(this)" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>  > 
                          </div> 
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_tel1_2"    placeholder="เบอร์ที่2" value="<?php echo $ex_list_contact_tel1_2;?>" OnKeyPress="return chkNumbertel(this)" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>> 
                          </div> 
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_tel1_3"   placeholder="เบอร์ที่3" value="<?php echo $ex_list_contact_tel1_3;?>" OnKeyPress="return chkNumbertel(this)" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>> 
                          </div> 
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_tel1_4"   placeholder="เบอร์ที่4" value="<?php echo $ex_list_contact_tel1_4;?>" OnKeyPress="return chkNumbertel(this)" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>> 
                          </div> 

                      </div>

                    </div> 
                    
                  </div>  
              </div>
              <div class="col-md-3" > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"  >LINE : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_lineid" placeholder="" value="<?php echo $ex_list_contact_lineid;?>" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?> >
                    </div> 
                  </div>  
              </div>       
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label"  >E-MAIL : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_email" placeholder="" value="<?php echo $ex_list_contact_email;?>"  <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>>
                    </div> 
                  </div>  
              </div>   
              <div class="col-md-5"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >FB : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_fb" placeholder="" value="<?php echo $ex_list_contact_fb;?>"  <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>>
                    </div> 
                  </div>  
              </div> 
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer"> 
          </div>
        </div>
        <!-- /.card -->


        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ข้อมูล Owner คนที่2</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div>


          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-3" > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label"  >Name : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_name_2" placeholder="" value="<?php echo $ex_list_contact_name_2;?>" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>>
                    </div> 
                  </div>  
              </div>
              <div class="col-md-9"  > 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-1 col-form-label"  >Tel : </label>
                    <div class="col-sm-11">
                                 
                      <div class="form-group row">

                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_tel_2"  placeholder="เบอร์ที่1" value="<?php echo $ex_list_contact_tel_2;?>" OnKeyPress="return chkNumbertel(this)" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>> 
                          </div> 
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_tel2_2"    placeholder="เบอร์ที่2" value="<?php echo $ex_list_contact_tel2_2;?>" OnKeyPress="return chkNumbertel(this)" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>> 
                          </div> 
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_tel2_3"   placeholder="เบอร์ที่3" value="<?php echo $ex_list_contact_tel2_3;?>" OnKeyPress="return chkNumbertel(this)" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>> 
                          </div> 
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_tel2_4"   placeholder="เบอร์ที่4" value="<?php echo $ex_list_contact_tel2_4;?>" OnKeyPress="return chkNumbertel(this)" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>> 
                          </div> 

                      </div>

                    </div> 
                    
                  </div>  
              </div>


 
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">LINE : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_lineid_2" placeholder="" value="<?php echo $ex_list_contact_lineid_2;?>" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?> >
                    </div> 
                  </div>  
              </div>       
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">E-MAIL : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_email_2" placeholder="" value="<?php echo $ex_list_contact_email_2;?>" <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?> >
                    </div> 
                  </div>  
              </div>  
              <div class="col-md-5"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">FB : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="ex_list_contact_fb_2" placeholder="" value="<?php echo $ex_list_contact_fb_2;?>"  <?php if($STATUS_ID=='1'){ ?>  disabled <?php } ?>>
                    </div> 
                  </div>  
              </div>    
 
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer"> 
          </div>
        </div>
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ภาพประกอบ Listing</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

               <div class="col-md-3" style="padding: 10px;">  

                <a class="btn btn-block bg-gradient-danger" onclick="window.open('page/upload_images_create_listing.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=800,scrollbars=yes,status=yes');">อัพโหลดไฟล์ภาพ </a>
               </div>
               <div class="col-md-3" style="padding: 10px;">  

                <a href="?page=upload_file_excel_check_view&listing=<?php echo $id;?>" target="_blank" class="btn btn-block bg-gradient-success" >View Listing </a>
               </div>
 



            <!--  <img src="../../images/noimages.jpg" id="preview<?php echo $i;?>" style="width: 100%;">  -->
            <!--
  <div class="custom-file">  
                <input type="file" class="custom-file-input" name="filUpload[]" id="filUpload" accept="image/png, image/gif, image/jpeg" multiple  > 
                        <label class="custom-file-label" for="image">เลือกไฟล์</label>  

              </div> -->
<!--
        <script type="text/javascript">
          $("#image<?php echo $i;?>").on('change',function(){  
             var $this = $(this);  
             const input = $this[0]; 
             const fileName = $this.val().split("\\").pop();  
             $this.siblings(".custom-file-label").addClass("selected").html(fileName);  
             if (input.files && input.files[0]) {  
                 var reader = new FileReader();  
                 reader.onload = function (e) {  
                     $('#preview<?php echo $i;?>').attr('src', e.target.result).fadeIn('slow');  
                 }  
                 reader.readAsDataURL(input.files[0]);  
             }  
        });
           
        </script> -->
 
   <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row"> 

             <script type="text/javascript" src="js/jquery.js"></script>
 
<script type="text/javascript">
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"include/showdata_img_create_listing.php",
                data:"rev=<?php echo $id;?>",
                async:false,
                success:function(getData){
                    $("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },3000);    
});
</script>


      


               <div id="showData"></div>




            
    
   <!-- /.col -->
            </div>
            <!-- /.row -->


          </div>
          <!-- /.card-body -->
          <div class="card-footer">
             
          </div>
        </div>
        <!-- /.card -->
  

</form>

   

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

                <div class="col-3">
                </div>
                <!--
                <div class="col-2">
                  <div class="card-tools"> 
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch1" name="ex_list_public" value="1" <?php if($ex_list_public=='1'){ ?>checked="checked" <?php } ?> >
                      <label class="custom-control-label" for="customSwitch1">อนุมัติเปิดใช้งาน</label> 
                    </div> 
                  </div> 
                </div>-->
                <div class="col-3">
                  <div class="card-tools"> 
                    <div class="custom-control custom-switch">
                      <center>
                       <input type="checkbox" class="custom-control-input" id="customSwitch2" name="ex_list_premium" value="1" <?php if($ex_list_premium=='1'){ ?>checked="checked"<?php } ?> >
                       <label class="custom-control-label" for="customSwitch2">Premium ประกาศ</label>
                     </center>
                    </div> 
                  </div> 
                </div>
                <!--
                <div class="col-2">
                  <div class="card-tools"> 
                    <div class="custom-control custom-switch">
                       <input type="checkbox" class="custom-control-input" id="customSwitch3" name="ex_list_boostpost" value="1" <?php if($ex_list_boostpost=='1'){ ?>checked="checked"<?php } ?> >
                       <label class="custom-control-label" for="customSwitch3">Boost Post ประกาศ</label>
                    </div> 
                  </div> 
                </div>-->
                <div class="col-3">
                  <div class="card-tools"> 
                    <div class="custom-control custom-switch">
                      <center>
                       <input type="checkbox" class="custom-control-input" id="customSwitch4" name="ex_list_owner_tel" value="1" <?php if($ex_list_owner_tel=='1'){ ?>checked="checked"<?php } ?> >
                       <label class="custom-control-label" for="customSwitch4">เปิดให้เห็นเบอร์ Owner</label>
                      </center>
                    </div> 
                  </div> 
                </div>
                <div class="col-3">
                </div>
                
              <div class="col-12"> 
                   <center><input type="checkbox" id="check_copy" name="check_copy" value="1">
                    <label for="vehicle1"> คลิกเพื่อ Copy Listing นี้ โดยใช้รหัส CX ใหม่</label><br>
                    <input type="submit" class="btn btn-primary" value="บันทึก/อัพเดทข้อมูล"></center> 
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

