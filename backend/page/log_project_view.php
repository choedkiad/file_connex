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
   
           

         $sql_project="SELECT * FROM dbo_log_project where log_id='$id' ";
         $result_project= $conn->query($sql_project); 
        // output data of each row
         $rs_project=$result_project->fetch_assoc();

         $project_name=$rs_project['project_name'];
         $project_name_en=$rs_project['project_name_en'];
         $project_alley=$rs_project['project_alley'];
         $project_alley_en=$rs_project['project_alley_en'];
         $project_type=$rs_project['project_type'];
         $project_road=$rs_project['project_road'];
         $project_road_en=$rs_project['project_road_en'];
         $districts=$rs_project['project_subdistrict'];
         $amphures=$rs_project['project_district'];
         $provinces=$rs_project['project_province'];
         $project_train_station=$rs_project['project_train_station'];
         $project_number_buildings=$rs_project['project_number_buildings'];
         $project_view=$rs_project['project_view'];

         $project_total_floors=$rs_project['project_total_floors'];
 
         $project_facilities=$rs_project['project_facilities'];
         $project_facilities_en=$rs_project['project_facilities_en'];
         $project_facilities_icon=$rs_project['project_facilities_icon'];
         $project_nearby_places=$rs_project['project_nearby_places'];
         $project_nearby_places_en=$rs_project['project_nearby_places_en'];
         $project_zone=$rs_project['project_zone'];
         $project_zone_en=$rs_project['project_zone_en'];
         $project_common_fee=$rs_project['project_common_fee'];
         $project_map=$rs_project['project_map'];

         $project_developer=$rs_project['project_developer'];
         $project_unit=$rs_project['project_unit'];
         $project_completed=$rs_project['project_completed']; 

         $project_googlmap=$rs_project['project_googlmap'];
         $project_latitude=$rs_project['project_latitude'];
         $project_longitude=$rs_project['project_longitude'];
         $project_longitude=$rs_project['project_longitude'];
         $zone_id=$rs_project['zone_id'];

         $project_proppit_name=$rs_project['project_proppit_name'];
         $project_proppit_name_en=$rs_project['project_proppit_name_en'];
         $project_proppit_latitude=$rs_project['project_proppit_latitude'];
         $project_proppit_longitude=$rs_project['project_proppit_longitude'];

         $project_living_zone_list=$rs_project['project_living_zone_list'];
         $project_living_project_list=$rs_project['project_living_project_list'];
          
       

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
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อโครงการภาษาไทย : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="project_name" name="project_name" placeholder="" value="<?php echo $project_name;?>" required>
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อโครงการภาษาอังกฤษ : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="project_name_en" name="project_name_en" placeholder="" value="<?php echo $project_name_en;?>"  required >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-3">

                   <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-4 col-form-label">ประเภททรัพย์ : </label>
                     <div class="col-sm-8">
	                  <select class="form-control"  name="project_type"  id="project_type"  style="width: 100%;" required >

	                    <option value="">ไม่เลือก</option> 
    <?php  
		 $sql_type_asset="SELECT * FROM type_asset order by id  ASC"; 
		 $result_type_asset=$conn->query($sql_type_asset);

		 if($result_type_asset->num_rows > 0) { 
    		 while($rs_type = $result_type_asset->fetch_assoc()) {   
        
         $type_id=$rs_type['id'];
         $type_code=$rs_type['code'];
    ?> 
	                    <option value="<?php echo $type_id;?>" id="project_type" name="project_type" readonly <?php if($project_type==$type_id){?> selected <?php } ?> ><?php echo $rs_type['name'];?></option> 
	<?php    }
	      }     ?>
	                   
	                  </select>
	                 </div>
                  </div> 
              </div>
   
 
              <!-- /.col -->
 
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ซอย : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="project_alley" id="project_alley" placeholder="" value="<?php echo $project_alley;?>"   >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ซอย (EN) : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="project_alley_en" id="project_alley_en" placeholder="" value="<?php echo $project_alley_en;?>"   >
                    </div>
                  </div> 
              </div>

              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">ถนน : </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="project_road" name="project_road" placeholder="" value="<?php echo $project_road;?>" >
                    </div>
                  </div> 
              </div> 

              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ถนน (EN) : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="project_road_en" name="project_road_en" placeholder="" value="<?php echo $project_road_en;?>" >
                    </div>
                  </div> 
              </div>
  
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">จังหวัด </label>
                    <div class="col-sm-10"> 
	                  <select class="form-control select_or" name="provinces" id="provinces" style="width: 100%;" required >

	                    <option value="">ยังไม่เลือก</option> 
    <?php  
		 $sql_province="SELECT * FROM provinces order by id  ASC"; 
		 $result_province=$conn->query($sql_province);

		 if($result_type_asset->num_rows > 0) { 
    		 while($rs_province= $result_province->fetch_assoc()) {      $province_id=$rs_province['id'];
    ?> 
 
	                    <option value="<?php echo $rs_province['id'];?>" <?php if($provinces==$province_id){?> selected <?php } ?> ><?php echo $rs_province['provinces_in_thai'];?></option> 

	<?php    }
	      }  ?>
                      
	                  </select>

                    </div>
                  </div> 
              </div> 
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">อำเภอ </label>
                    <div class="col-sm-10"> 
	                  <select class="form-control select_or"  name="amphures" id="amphures" style="width: 100%;" required> 
	                    <option value="">ยังไม่เลือก</option>  
    <?php  
		 $sql_province="SELECT * FROM districts order by id  ASC"; 
		 $result_province=$conn->query($sql_province);

		 if($result_type_asset->num_rows > 0) { 
    		 while($rs_province= $result_province->fetch_assoc()) {    $districts_id=$rs_province['id'];
    ?> 
 
	                    <option value="<?php echo $rs_province['id'];?>"  <?php if($amphures==$districts_id){?> selected <?php } ?> ><?php echo $rs_province['districts_in_thai'];?></option> 

	<?php    }
	      }  ?>
                      </select>

                    </div>
                  </div> 
              </div> 
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ตำบล </label>
                    <div class="col-sm-10"> 
	                  <select class="form-control select_or"  name="districts" id="districts" style="width: 100%;" required> 
	                    <option value="">ยังไม่เลือก</option> 
    <?php  
		 $sql_province="SELECT * FROM subdistricts order by id  ASC"; 
		 $result_province=$conn->query($sql_province);

		 if($result_type_asset->num_rows > 0) { 
    		 while($rs_province= $result_province->fetch_assoc()) {   $districts_id=$rs_province['id'];
    ?> 
 
	                    <option value="<?php echo $rs_province['id'];?>" <?php if($districts==$districts_id){?> selected <?php } ?>  ><?php echo $rs_province['subdistricts_in_thai'];?></option> 

	<?php    }
	      }  ?>
	                  </select>
  
                    </div>
                  </div> 
              </div>


              <div class="col-md-8"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">สถานีรถไฟฟ้า : </label>
                    <div class="col-sm-9"> 
	                  <select class="form-control select_or"  name="project_train_station" id="project_train_station" style="width: 100%;"> 
	                    <option value="0" <?php if($project_train_station==''){?> selected <?php } ?> >ไม่เลือก</option>    
    <?php  

     $sql_train_station="SELECT * FROM type_train_station  "; 
     $result_train_station=$conn->query($sql_train_station);

     if($result_train_station->num_rows > 0) { 
         while($rs_train=$result_train_station->fetch_assoc()) {   

                $station_id=$rs_train['station_id'];
    ?> 
 
                      <option value="<?php echo $rs_train['station_id'];?>" <?php if($station_id==$project_train_station){?> selected <?php } ?>  ><?php echo $rs_train['station_code']." ".$rs_train['station_train']." | ".$rs_train['station_name_en'];?></option> 

  <?php   }
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
                    <label for="inputEmail3" class="col-sm-5 col-form-label">จำนวนอาคาร: </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="project_number_buildings" name="project_number_buildings" placeholder="" value="<?php echo $project_number_buildings;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-3"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">จำนวนชั้น : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="project_total_floors" name="project_total_floors" placeholder="" value="<?php echo $project_total_floors;?>" >
                    </div>
                  </div> 
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ค่าส่วนกลาง : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="project_common_fee" name="project_common_fee" placeholder="" value="<?php echo $project_common_fee;?>" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">โซนพื้นที่ : </label>
                    <div class="col-sm-10"> 
                    <select class="form-control select_or"  name="zone_id" id="zone_id" style="width: 100%;" required> 
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
 
                      <option value="<?php echo $rs_zone['zone_id'];?>" <?php if($zone_id_s==$zone_id){?> selected <?php } ?>  ><?php echo $zone_name." | ".$zone_name_en;?></option> 

  <?php   }
      }  ?>

                    </select>(เลือกโซนด้วย)


            <?php echo $project_zone;?>
                    </div>
                  </div>  
              </div>
 
 

              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">สถานที่ใกล้เคียง : </label>
                    <div class="col-sm-9"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="project_nearby_places" name="project_nearby_places" required><?php echo $project_nearby_places;?></textarea>
                    </div>
                  </div> 
              </div>
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">สถานที่ใกล้เคียง เวอร์ชั่น EN : </label>
                    <div class="col-sm-9"> 
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="project_nearby_places_en" name="project_nearby_places_en" required><?php echo $project_nearby_places_en;?></textarea>

 
                    </div>
                  </div> 
              </div>
                
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label">Google MAP Link : </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputEmail3" name="project_map" placeholder="" value="<?php echo $project_map;?>" minlength="20" required  >
                    </div> 
                  </div>  
              </div> <!--
              <div class="col-md-6"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Google MAP Iframe : </label>
                    <div class="col-sm-8">
                       
                      <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_showmap" name="ex_list_showmap" ><?php echo $ex_list_showmap;?></textarea>
                    </div> 
                  </div>  
              </div> -->
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ละติจูด : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="project_latitude" placeholder="" value="<?php echo $project_latitude;?>" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ลองติจูด : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="project_longitude" placeholder="" value="<?php echo $project_longitude;?>" >
                    </div> 
                  </div>  
              </div>   

              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">จำนวน UNIT : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="project_unit" placeholder="" value="<?php echo $project_unit;?>" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">สร้างเสร็จเมื่อ : </label>
                    <div class="col-sm-8"> 
                        <select class="form-control select_or" name="project_completed" id="project_completed" style="width: 100%;" > 
                           <option value="">ยังไม่เลือก</option> 

                 <?php 
                    $year=date("Y");
                    $year=$year+8; 
                       for($x=1980; $x <= $year; $x++) {   $x_thai=$x+543;     ?>
                            <option value="<?php echo $x;?>" <?php if($project_completed==$x){ ?>selected <?php } ?> ><?php echo $x." | ".$x_thai;?></option> 
                 <?php } ?>  
                        </select>

                    </div> 
                  </div>  
              </div>   
 

              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">เจ้าของโครงการ </label>
                    <div class="col-sm-8"> 
                    <select class="form-control select_or" name="project_developer" id="project_developer" style="width: 100%;" required >

                      <option value="0">ยังไม่เลือก</option> 
    <?php  
     $sql_dev="SELECT * FROM dbo_developer order by developer_id ASC"; 
     $result_dev=$conn->query($sql_dev);

     if($result_dev->num_rows > 0) { 
         while($rs_dev=$result_dev->fetch_assoc()) {      

                $province_id=$rs_dev['developer_id'];
                $developer_name=$rs_dev['developer_name'];
                $developer_name_en=$rs_dev['developer_name_en'];
    ?> 
 
                      <option value="<?php echo $province_id;?>" <?php if($province_id==$project_developer){?> selected <?php } ?> ><?php echo $developer_name." | ".$developer_name_en;?></option> 

  <?php    }
        }  ?>
                      
                    </select>

                    </div>
                  </div> 
              </div> 

              <!-- /.col -->
            </div>
            <!-- /.row -->


       <!-- Select2bs4 -->
           <script> 
                $('.select_or').fastselect(); 
            </script> 


      
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer"></div>
        </div>
        <!-- /.card -->

 






       <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">สิ่งอำนวยความสะดวก :</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div>


<style type="text/css">
  
* {
 
}
body {
 
}
ul.facilities{
position: relative;
display: flex;
justify-content: center;
align-items: center;
flex-wrap: wrap;
border-radius: 10px;
padding: 10px;
width: 100%;
 
box-shadow: -2px -2px 5px white, 3px 3px 5px rgba(0, 0, 0, 0.1);
}
ul.facilities li  {
position: relative;
list-style: none;
text-align: center;
margin: 5px;
}
ul.facilities li label {
position: relative;
cursor: pointer;
}
ul.facilities li label input[type="checkbox"] {
position: absolute;
opacity: 0;
}
ul.facilities li label :checked ~ .icon-box {
box-shadow: inset -2px -2px 5px white, inset 3px 3px 5px rgba(0, 0, 0, 0.1);
border:solid;
}
ul.facilities li label :checked ~ .icon-box .fa {
transform: scale(0.95);
}
ul.facilities li label .icon-box {
width: 120px;
height: 120px;
background: #ebf5fc;
display: flex;
justify-content: center;
align-items: center;
box-shadow: -2px -2px 5px white, 3px 3px 5px rgba(0, 0, 0, 0.1);
border-radius: 10px;
}
ul.facilities li label .icon-box .fa {
font-size: 16px;
color: #6a9bd8;
}
/* --------Social Icons-------- */
/* Color Variables */
/* Social Icon Mixin */
.social-icons {
display: flex;
position: absolute;
bottom: 20px;
right: 20px;
}
.social-icon {
display: flex;
align-items: center;
justify-content: center;
position: relative;
width: 20px;
height: 20px;
margin: 0 0.7rem;
border-radius: 50%;
cursor: pointer;
font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
font-size: 16px;
text-decoration: none;
transition: all 0.15s ease;
}
.social-icon:hover {
color: #fff;
}
.social-icon:hover .tooltip {
visibility: visible;
opacity: 1;
transform: translate(-50%, -150%);
}
.social-icon:active {
box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.5) inset;
}
.social-icon--twitter {
background: #2b97f1;
color: #fff;
}
.social-icon--twitter .tooltip {
background: #2b97f1;
color: currentColor;
}
.social-icon--twitter .tooltip:after {
border-top-color: #2b97f1;
}
.social-icon--codepen {
background: #000;
color: #fff;
}
.social-icon--codepen .tooltip {
background: #000;
color: currentColor;
}
.social-icon--codepen .tooltip:after {
border-top-color: #000;
}
.social-icon i {
position: relative;
top: 1px;
}
/* Tooltips */
.tooltip {
display: block;
position: absolute;
top: 0;
left: 50%;
padding: 0.4rem 0.6rem;
border-radius: 40px;
font-size: 16px;
font-weight: bold;
opacity: 0;
pointer-events: none;
text-transform: uppercase;
transform: translate(-50%, -100%);
transition: all 0.3s ease;
z-index: 1;
}
.tooltip:after {
display: block;
position: absolute;
bottom: 1px;
left: 50%;
width: 0;
height: 0;
content: "";
border: solid;
border-width: 10px 10px 0 10px;
border-color: transparent;
transform: translate(-50%, 100%);
}

</style>

      

          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
               <div class="col-md-6" style="padding: 10px;">  
                  <div class="form-group row">
 
                    <label for="inputEmail3" class="col-sm-3 col-form-label">เพิ่มเติม TH : </label>
                    <div class="col-sm-9"> 
                        <textarea class="form-control" rows="5" placeholder="Enter ..." id="project_facilities" name="project_facilities"><?php echo $project_facilities;?></textarea>
                    </div>                     
                  </div> 
               </div>
               <div class="col-md-6" style="padding: 10px;">  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">เพิ่มเติม EN : </label>
                    <div class="col-sm-9"> 
                        <textarea class="form-control" rows="5" placeholder="Enter ..." id="project_facilities_en" name="project_facilities_en"><?php echo $project_facilities_en;?></textarea>
                    </div>    
                    
                  </div> 
               </div>
               <div class="col-md-12" style="padding: 10px;">   

                <?php 

                // ตัวแปร $programming_array เก็บค่า Array ที่เป็นภาษาที่ใช้เขียนโปรแกรม
//$programming_array = array('php', 'c++', 'vb','java', 'c#', 'perl');
 
           $selected_typeid = explode(',', $project_facilities_icon);
  
?> 

                  <ul class="facilities" id="facilities" >
    <?php  
         $sql_facilitate="SELECT * FROM type_facilitate order by facilitate_id ASC"; 
         $result_facilitate=$conn->query($sql_facilitate);
     
         while($rs_facilitate=$result_facilitate->fetch_assoc()) {  
                
                $facilitate_id=$rs_facilitate['facilitate_id'];
                $facilitate_icon=$rs_facilitate['facilitate_icon'];
                $facilitate_name=$rs_facilitate['facilitate_name'];
    ?>
                    <li >
                      <label>
                        <input type="checkbox" name="project_facilities_icon[]" value="<?php echo $facilitate_id;?>"   

                        <?php if (in_array($facilitate_id, $selected_typeid)){ ?> checked <?php } ?> >
                        <div class="icon-box">
                          <center>
                            <?php echo $facilitate_name;?><br>
                            <img src="../images/facilities/<?php echo $facilitate_icon;?>" >
                           </center>
                        </div>
                      </label>
                    </li> 
    <?php } ?>

                  </ul>

               </div> 
   <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>





       <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Proppit (ส่วนนี้เจ้าหน้าที่ Admin กรอกให้เอง)</h3>
 
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อโครงการภาษาไทย : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="project_proppit_name" name="project_proppit_name" placeholder="" value="<?php echo $project_proppit_name;?>"  >
                    </div>
                  </div> 
              </div>
 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อโครงการภาษาอังกฤษ : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="project_proppit_name_en" name="project_proppit_name_en" placeholder="" value="<?php echo $project_proppit_name_en;?>"    >
                    </div>
                  </div> 
              </div>
  
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ละติจูด : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="project_proppit_latitude" placeholder="" value="<?php echo $project_proppit_latitude;?>" >
                    </div> 
                  </div>  
              </div>
              <div class="col-md-4"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">ลองติจูด : </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" name="project_proppit_longitude" placeholder="" value="<?php echo $project_proppit_longitude;?>" >
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
            <h3 class="card-title">Living Insider (ส่วนนี้เจ้าหน้าที่ Admin กรอกให้เอง)</h3>
 
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row"> 
              <div class="col-md-12"> 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">PROJECT ID : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="project_living_project_list" name="project_living_project_list" placeholder="" value="<?php echo $project_living_project_list;?>"    >
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



    <?php include('script/script_listing_project.php');?>

 


         <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">ภาพส่วนกลาง</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
         
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row"> 


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
            
    <?php  
     $sql_img="SELECT * FROM type_project_img where project_id='$id' order by project_img_no ASC"; 
     $result_img=$conn->query($sql_img);

 
          while($rs_img=$result_img->fetch_assoc()) {   

             $project_img_folder=$rs_img['project_img_folder'];
             $project_img_name=$rs_img['project_img_name'];
             $project_img_id=$rs_img['project_img_id'];

             if($project_img_folder==''){ $project_img_folder="../../images/project/$id/"; }
     ?>  
               <div class="col-md-3" style="padding: 10px;"> 
                  <center>
                      <img src="<?php echo $project_img_folder.$project_img_name;?>" width="100%">
                  </center>
               </div>   
    <?php }  ?>

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
         
 
          <!-- /.card-body -->
         
        </div>
        <!-- /.card -->

 
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

