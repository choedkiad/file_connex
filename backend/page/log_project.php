 <?php 

  session_start();  
 

     if(  $_SESSION['STATUS_ID']=='4'   or $_SESSION['STATUS_ID']=='5' ){

     }else{ 
           echo("<script> top.location.href='../'</script>");  
     }

   $p=$_GET['p'];
   $search=$_GET['search'];
   $station=$_GET['station'];
   $zone=$_GET['zone'];
   $deal=$_GET['deal'];
   $heading=$_GET['heading'];
   $type=$_GET['type']; 
   $project=$_GET['project'];
   $today=date('Y-m-d');

/*
 ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);  
*/

  
   $url_list="?page=log_project&search=$search&p=$p&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&project=$project&type=$type&deal=$deal&bedroom=$bedroom&house_number=$house_number&list_floor=$list_floor&list_bts=$list_bts&listing_status=$listing_status&bargain=$bargain&score_img=$score_img&sort_data=$sort_data";

   ///////////////   ////////////////

   if($project==''){
          $project='';
   }

   /////////////// ประเภท คอนโด ทาวน์เฮ็าส์ ////////////////

   if($type!=''){
          $s_type=" and  project.project_type='$type'  "; 
   }else{    $s_type="";  }

   /////////////// สถานนีรถไฟฟ้า ////////////////

   if($station!=''){ 
          $s_station=" and project.station_id='$station'  ";  
   }else{    $s_station="";  $station=''; }

   /////////////// โซนที่ตั้ง  ////////////////
 
    if($zone!=''){ 
          $s_zone=" and project.zone_id='$zone' ";  
   }else{    $s_zone="";  }




   if($sort_data=='1'){
      $sort="data.price ASC , ";
   }else if($sort_data=='2'){
      $sort="data.price DESC , ";
   }else if($sort_data=='3'){
      $sort="data.sqm ASC , ";
   }else if($sort_data=='4'){
      $sort="data.sqm DESC , ";
   }else if($sort_data=='5'){
      $sort="data.floor ASC , ";
   }else if($sort_data=='6'){
      $sort="data.floor DESC , ";
   }else{
      $sort='';
   }


   if($search!=''){ 
   }else{    $search="";  }

   $check_s=substr($project,0 , 1);

  
 
 
 ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
<style>
    .alias {cursor: alias;}
    .all-scroll {cursor: all-scroll;}
    .auto {cursor: auto;}
    .cell {cursor: cell;}
    .context-menu {cursor: context-menu;}
    .col-resize {cursor: col-resize;}
    .copy {cursor: copy;}
    .crosshair {cursor: crosshair;}
    .default {cursor: default;}
    .e-resize {cursor: e-resize;}
    .ew-resize {cursor: ew-resize;}
    .grab {cursor: -webkit-grab; cursor: grab;}
    .grabbing {cursor: -webkit-grabbing; cursor: grabbing;}
    .help {cursor: help;}
    .move {cursor: move;}
    .n-resize {cursor: n-resize;}
    .ne-resize {cursor: ne-resize;}
    .nesw-resize {cursor: nesw-resize;}
    .ns-resize {cursor: ns-resize;}
    .nw-resize {cursor: nw-resize;}
    .nwse-resize {cursor: nwse-resize;}
    .no-drop {cursor: no-drop;}
    .none {cursor: none;}
    .not-allowed {cursor: not-allowed;}
    .pointer {cursor: pointer;}
    .progress {cursor: progress;}
    .row-resize {cursor: row-resize;}
    .s-resize {cursor: s-resize;}
    .se-resize {cursor: se-resize;}
    .sw-resize {cursor: sw-resize;}
    .text {cursor: text;}
    .url {cursor: url(myBall.cur),auto;}
    .w-resize {cursor: w-resize;}
    .wait {cursor: wait;}
    .zoom-in {cursor: zoom-in;}
    .zoom-out {cursor: zoom-out;}
</style>

 <?php
 
if($_GET['page_no']==''){
   echo("<script> top.location.href='?page=log_project&p=$p&page_no=1'</script>");   
}
 $sub_text_1= substr($_SERVER['REQUEST_URI'],-9);

$page_no= substr($sub_text_1,6);  
 
$page_no = str_replace("=","",$page_no,$count); 
$page_no = str_replace("o","",$page_no,$count); 
//echo $page_no." ".$cate_id;

?>

               <script>
    function showAndHide() {
        var link_check = document.getElementById("link_check");
        link_check.style.display = "none"; 
    }
</script>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-12">
            <!-- general form elements -->
 
              <!-- /.card-header -->
              <!-- form start -->
         
        
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title  p-3"><?php echo $title;?></h3>
                <ul class="nav nav-pills ml-auto p-2" style="font-size: 14px;">
                  <li class="nav-item"><a class="nav-link" href="?page=log_listing"  >Log Listing</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p==''){?>active<?php } ?>" href="?page=log_project"  >Log Project</a></li>
             
                </ul>    
              </div>


            <div class="card card-primary" style="padding: 10px;">
              <div class="card-header">
                <h3 class="card-title">ค้นหา</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" id="form" enctype="multipart/form-data" action="include/process_search.php?page=log_project&p=<?php echo $p;?>"   > 
              
              <input type="text" class="form-control" style="width: 100%;" name="p"  value="<?php echo $p;?>" hidden="hidden" >
              <input type="text" class="form-control" style="width: 100%;" name="page"  value="<?php echo $page;?>" hidden="hidden" >
                    
              <div class="card-body">

               <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4 col-sm-12">
                      <div class="form-group row">
                        <label class="col-sm-12 col-form-label">ค้นหา : </label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" style="width: 100%;" name="search"  value="<?php echo $search;?>"  >
                        </div>
                      </div>
                  </div>

                  <div class="col-md-4 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">ประเภทอสังหาฯ : </label>
                        <div class="col-sm-12">
                                  <select class="form-control select2bs4" name="type" id="type"  style="width: 100%;">
                                      <option value=""  
                                    <?php if($type==''){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option> 
      <?php                          
       $sql_type="SELECT * FROM type_asset order by id   ASC"; 
       $result_type=$conn->query($sql_type);
 
           while($rs_type=$result_type->fetch_assoc()) {      ?> 

                                    <option value="<?php echo $rs_type['id'];?>" 
                                    <?php if($rs_type['id']==$type){?> selected="selected"  <?php } ?>  >
                                         <?php echo $rs_type['name'];?> 
                                      </option> 
      <?php }  ?>
                                  </select>
                        </div>
                      </div>
                  </div> 
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">รถไฟฟ้า  : </label>
                        <div class="col-sm-12">
                            
                                <div class="form-group">
                                  
                                  <select class="form-control select2bs4"  name="station" id="station"  style="width: 100%;">
                                      <option value=""  
                                    <?php if($station==""){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option> 
        
        <?php  
              $strSQL = "SELECT  search_s_id , station_id ,station_name , station_name_en ,tr_group , search_s_id FROM type_train_station  "; 
              $result=$conn->query($strSQL); 
             
              while($rs_station2= $result->fetch_assoc())  {   

                     $station_id=$rs_station2['station_id'];              
                     $station_name=$rs_station2['station_name'];
                     $station_name_en=$rs_station2['station_name_en'];  
                     $tr_group=$rs_station2['tr_group'];  
                     $search_s_id=$rs_station2['search_s_id'];
                     
                     $name_text="สถานีรถไฟฟ้า : ".$tr_group."-".$station_name." | ".$station_name_en;  
             
                ?> 
                                    <option value="<?php echo $station_id;?>" 
                                    <?php if($station==$station_id){?> selected="selected"  <?php } ?>  >
                                         <?php echo $name_text;?>
                                    </option>  
        <?php }    ?>
                                  </select>
                                </div>


                        </div>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">โซน  : </label>
                        <div class="col-sm-12">
                            
                                <div class="form-group">
                                  
                                  <select class="form-control select2bs4"  name="zone" id="zone"  style="width: 100%;">
                                      <option value=""  
                                    <?php if($zone==""){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option> 
       

      <?php 
 

              $strSQL = "SELECT zone_id,search_z_id,zone_name,zone_name_en FROM type_zone  "; 
              $result=$conn->query($strSQL); 
             
              while($rs_zone2= $result->fetch_assoc())  {   

                     $zone_id=$rs_zone2['zone_id'];              
                     $zone_name=$rs_zone2['zone_name'];
                     $zone_name_en=$rs_zone2['zone_name_en'];  
                     $search_id_2=$rs_zone2['search_z_id'];
                     
                     $zone_name_text="โซน : ".$zone_name." | zone : ".$zone_name_en;  
             
                ?> 
                                    <option value="<?php echo $zone_id;?>" 
                                    <?php if($zone==$zone_id){?> selected="selected"  <?php } ?>  >
                                         <?php echo $zone_name_text;?>
                                    </option> 
        <?php }    ?>

     
                                  </select>
                                </div>


                        </div>
                      </div>
                  </div>                             
                  <br><br> 
                 
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">เรียงลำดับ : </label>
                        <div class="col-sm-12"> 
                                  <select class="form-control select" name="sort_data" id="sort_data"  style="width: 100%;">
                                    <option value="" selected>ยังไม่ระบุ</option>    
                                    <option value="1"<?php if($sort_data=='1'){ ?>  selected <?php } ?>>เรียงราคา น้อย -> มาก</option>  
                                    <option value="2"<?php if($sort_data=='2'){ ?>  selected <?php } ?>>เรียงราคา มาก -> น้อย</option>  
                                    <option value="3"<?php if($sort_data=='3'){ ?>  selected <?php } ?>>เรียงพื้นที่ น้อย -> มาก</option>  
                                    <option value="4"<?php if($sort_data=='4'){ ?>  selected <?php } ?>>เรียงพื้นที่ มาก-> น้อย</option> 
                                    <option value="5"<?php if($sort_data=='5'){ ?>  selected <?php } ?>>เรียงชั้น มาก-> น้อย</option> 
                                    <option value="6"<?php if($sort_data=='6'){ ?>  selected <?php } ?>>เรียงชั้น น้อย -> มาก</option>  
                                  </select>
              

                        </div>
                      </div>
                  </div>

            

     
                  <!--
                  <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">สถานีรถไฟฟ้า : </label>
                        <div class="col-sm-9">  
                                <select class="select2" multiple="multiple"  name="list_bts[]"  data-placeholder="Select a State" style="width: 100%;">
         <?php                          
       $sql_type_train="SELECT * FROM type_train_station order by station_id  ASC"; 
       $result_type_train=$conn->query($sql_type_train);

       if($result_type_train->num_rows > 0) { 
           while($rs_type_train=$result_type_train->fetch_assoc()) {      ?> 


                                  <option value="<?php echo $rs_type_train['station_code'];?>"><?php echo $rs_type_train['station_train'];?></option> 
      <?php }
       } ?>
                                </select> 
                        </div>
                      </div>
                  </div>-->
 

                  <div class="col-md-12"  ><br>
                     <center><button type="submit" class="btn btn-primary">Search Data</button> &nbsp;&nbsp;&nbsp;
                          <a class="btn btn-primary" href="?page=log_project&p=<?php echo $p;?>">Clear Data</a>
                     </center>

                  </div>


                </div>
              </div>



                </div>
                <!-- /.card-body -->

                 
                  
                
              </form>
            </div>
            <!-- /.card -->
 

 <style>
div.scroll {width:100%; max-height: 600px; overflow-x:auto;}
table, th , tr, td {
 
  padding-top: 2px;
  padding-bottom: 2px;
  padding-right: 3px;
  padding-left: 3px;
  border: 1px solid #000;
  font-size: 12px;
  text-align: center;

  
}
</style>


 
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
 
 <div class="scroll">

 

              <!-- /.card-header -->
              <div class="card-body" style="margin: 5px;">
                <table   class="" style="font-size: 10px;" >
                  <thead>
                  <tr   > 
                    <th>No</th>  
                    <th>#</th>     
                    <th>Name</th>
                    <th>ประเภท</th>
                    <th>UNIT</th>
                    <th>จำนวนชั้น</th>
                    <th>สถานีรถไฟฟ้า</th>    
                    <th>โซน</th> 
                    <th>Developer</th>  
                    <th>สร้างเสร็จ</th> 
                    <th>การเปลี่ยนแปลง</th>                  
                    <th>ผู้แก้ไข</th>
                    <th>Update</th>  
                  </tr>
                  </thead>
                  <tbody>
   <?php
                        // Check connection
 





     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }
 

 

 if (isset($page_no) && $page_no!="" && $page_no!="l") {
    $page_no = $page_no;
    } else {
        $page_no = 1;
        }

if($p=='delete'){
    $total_records_per_page = 50;
}else{
    $total_records_per_page = 50;
}

    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 





   if($_SESSION['STATUS_ID']=='1'){
        
        if(is_numeric($search)=='1'){ $search="----"; }

   }else{ 
 
   }
 

   $calExpireDate=date ("Y-m-d", strtotime("+15 day", strtotime($today)));
 
 

           

    if($p==''){ 

          $list_project=" project.project_id!='' ";   
          $number_desc=" project.create_date  DESC "; 

    }


/////////////// เรียงลำดับ sort_data //////////////// 
/*
   if($sort_data!=''){

         if($sort_data=='1'){

                   $number_desc=" data.ex_list_price ASC ";

         }else if($sort_data=='2'){

                   $number_desc=" data.ex_list_price DESC ";

         }else if($sort_data=='3'){

                   $number_desc=" data.ex_list_sqm ASC ";

         }else if($sort_data=='4'){

                   $number_desc=" data.ex_list_sqm DESC ";

         }
   }*/
/////////////////////////////////////


if($p=='' or $p=='public' or $p=='draft' or $p=='boost_post' or $p=='premium' or $p=='rent_till' or $p=='no_status'  or $p=='delete' or $p=='double' or $p=='pm_listing' or $p=='proppit' or $p=='proppit_feed'){ 


       

               $search_all_s="           
                          ( 
                            $list_project  $s_type  $s_station $s_zone and project.project_name LIKE '%$search%' 
                          )  
                          or  
                         (
                            $list_project  $s_type  $s_station $s_zone and project.project_name_en LIKE '%$search%'  
                          )   
                             ";

 
 
 /*
SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers
ON Orders.CustomerID=Customers.CustomerID; */



 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM dbo_log_project AS project   
                    where $search_all_s
                     ");
    

    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1
       
     
     if($page_no=='1'){

         $no=0;      
     }else{
         $no=($page_no-1)*50; 
     }
     

     $sql="SELECT *   FROM dbo_log_project AS project  
                    
                    where $search_all_s
                         
                    order by $number_desc   LIMIT $offset, $total_records_per_page ";  
     $result = $conn->query($sql);


 


}else if($p=='draft'){ 

}else if($p=='premium'){
  
 /*
}else if($p=='boost_post'){



     $sql="SELECT data.ex_list_listing_code ,  data.ex_list_house_number , data.ex_list_listing_status ,
                  data.ex_list_rent_till, data.ex_list_listing_type , data.ex_list_zone , data.ex_list_public ,
                  data.ex_list_premium,data.ex_list_contact_name,data.ex_list_price, data.ex_list_contact_tel,
                  data.ex_list_deal_type , data.ex_list_house_number , data.ex_list_bedroom ,data.ex_list_bathroom ,
                  data.ex_list_sqm, data.project_id, data.ex_list_date_update ,  pj.project_id , pj.project_train_station , pj.project_name , pj.project_name_en , pj.project_name_en , pj.project_alley , pj.project_road , pj.project_type ,
                  ts.station_name,ts.station_name_en FROM dbo_data_excel_listing where ex_list_boostpost='1' order by ex_list_id  DESC";  
     $result = $conn->query($sql);*/

}else if($p=='boost_post'){
 


}
 

 //echo $search_all_s;

// echo $search_all_s;
        // output data of each row
         while($rs_project=$result->fetch_assoc()) {
         
         $log_id=$rs_project['log_id'];
         $project_id=$rs_project['project_id'];
         $project_type=$rs_project['project_type'];
         $project_name=$rs_project['project_name'];
         $project_name_en=$rs_project['project_name_en'];
         $project_alley=$rs_project['project_alley'];
         $project_road=$rs_project['project_road'];
         $project_subdistrict=$rs_project['project_subdistrict'];
         $project_district=$rs_project['project_district'];
         $project_province=$rs_project['project_province'];
         $station_id=$rs_project['station_id'];
         $zone_id=$rs_project['zone_id'];
         $project_developer=$rs_project['project_developer'];
         $project_unit=$rs_project['project_unit'];
         $project_completed=$rs_project['project_completed'];
         $project_map=$rs_project['project_map'];
         $project_latitude=$rs_project['project_latitude'];
         $project_longitude=$rs_project['project_longitude'];
         $search_p_id=$rs_project['search_p_id'];
         $project_number_buildings=$rs_project['project_number_buildings'];
         $project_total_floors=$rs_project['project_total_floors'];
         $project_facilities=$rs_project['project_facilities'];
         $project_facilities_en=$rs_project['project_facilities_en'];
         $project_facilities_icon=$rs_project['project_facilities_icon'];   
         $project_nearby_places=$rs_project['project_nearby_places'];
         $project_nearby_places_en=$rs_project['project_nearby_places_en'];
         $create_date=$rs_project['create_date'];
 
         $log_number=$rs_project['log_number'];  
         $USER_ID=$rs_project['USER_ID'];    

         $log_number=$log_number-1;
         $check_message='';
    
         if($log_number!='0'){  
    
               $sql_listing_2="SELECT * FROM dbo_log_project where project_id='$project_id' and  log_number='$log_number' LIMIT 1  "; 
               $result_listing_2=$conn->query($sql_listing_2);
               $rs_listing_2= $result_listing_2->fetch_assoc(); 

                 $project_id_s=$rs_listing_2['project_id'];
                 $project_type_s=$rs_listing_2['project_type']; 
                 $project_name_s=$rs_listing_2['project_name'];
                 $project_name_en_s=$rs_listing_2['project_name_en'];
                 $project_alley_s=$rs_listing_2['project_alley'];
                 $project_road_s=$rs_listing_2['project_road'];
                 $project_subdistrict_s=$rs_listing_2['project_subdistrict'];
                 $project_district_s=$rs_listing_2['project_district'];
                 $project_province_s=$rs_listing_2['project_province'];
                 $station_id_s=$rs_listing_2['station_id']; 
                 $zone_id_s=$rs_listing_2['zone_id'];
                 $project_developer_s=$rs_listing_2['project_developer'];
                 $project_unit_s=$rs_listing_2['project_unit'];
                 $project_map_2_s=$rs_listing_2['project_map'];
                 $project_completed_s=$rs_listing_2['project_completed'];
                 $project_latitude_s=$rs_listing_2['project_latitude'];
                 $project_longitude_s=$rs_listing_2['project_longitude'];
                 $project_number_buildings_s=$rs_listing_2['project_number_buildings'];
                 $project_total_floors_s=$rs_listing_2['project_total_floors'];
                 $project_facilities_s=$rs_listing_2['project_facilities'];        
                 $project_facilities_en_s=$rs_listing_2['project_facilities_en'];
                 $project_facilities_icon_s=$rs_listing_2['project_facilities_icon']; 
                 $project_nearby_places_s=$rs_listing_2['project_nearby_places']; 
                 $project_nearby_places_en_s=$rs_listing_2['project_nearby_places_en']; 

/*
               $project_id_s=$rs_project['project_id'];              
               $project_name=$rs_project['project_name'];
               $project_name_en=$rs_project['project_name_en'];                  

               $search_id=$rs_project['search_p_id'];*/

                 if($project_name!=$project_name_s or $project_name_en!=$project_name_en_s){ $name_message="ชื่อ , ";  }else{ $name_message=""; }
                 if($project_alley!=$project_alley_s){ $alley_message="ซอย , ";  }else{ $alley_message=""; }
                 if($project_type!=$project_type_s){ $type_message="ประเภทดีล , ";  }else{ $type_message=""; }
                 if($project_road!=$project_road_s){ $road_message="ถนน , ";  }else{ $road_message=""; }
                 if($project_unit!=$project_unit_s){ $unit_message="จำนวนUnit , ";  }else{ $unit_message=""; }
                 if($project_total_floors!=$project_total_floors_s){ $total_floors_message="จำนวนชั้น ,";  }else{ $total_floors_message=""; }
                 if($project_number_buildings!=$project_number_buildings_s){ $buildings_message="จำนวนอาคาร , ";  }else{ $buildings_message=""; }
                 if($bedroom!=$bedroom_s){ $bedroom_message="จำนวนห้อง , ";  }else{ $bedroom_message=""; }
                 if($station_id!=$station_id_s){ $station_message="สถานีรถไฟฟ้า , ";  }else{ $station_message=""; }
                 if($project_developer!=$project_developer_s){ $developer_message="เจ้าของโครงการ , ";  }else{ $developer_message=""; }
                 if($zone_id!=$zone_id_s){ $zone_message="โซน , ";  }else{ $zone_message=""; }
                 if($project_facilities!=$project_facilities_s or $project_facilities_en!=$project_facilities_en_s){ $acilities_message="สิ่งอำนวยความสะดวก , ";  }else{ $acilities_message=""; }

                 $check_message=$name_message."".$type_message."".$alley_message."".$road_message."".$unit_message."".$total_floors_message."".$buildings_message."".$developer_message."".$station_message."".$zone_message."".$acilities_message;
                 
              

          } 
 

    
  $year=substr($create_date,0 , 4 );
  $month=substr($create_date,5 , 2 );
  $day=substr($create_date,8 , 2 );

  $time=substr($create_date,11 , 5 );
  $year=$year+543;

  switch ($month)
  {
    case "00" : $month="00"; break;
    case "01" : $month="ม.ค."; break;
    case "02" : $month="ก.พ."; break;
    case "03" : $month="มี.ค."; break;
    case "04" : $month="เม.ย."; break;
    case "05" : $month="พ.ค."; break;
    case "06" : $month="มิ.ย."; break;
    case "07" : $month="ก.ค."; break;
    case "08" : $month="ส.ค."; break;
    case "09" : $month="ก.ย."; break;
    case "10" : $month="ต.ค."; break;
    case "11" : $month="พ.ย."; break;
    case "12" : $month="ธ.ค."; break;
  }

   $create_date=$day." ".$month." ".$year." ".$time;


 $expire_check="";
         
   

          if($zone_id!=''){
        
      /////////// type_zone ////////////////
             $sql_zone="SELECT zone_name FROM type_zone where zone_id='$zone_id' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc();

             $zone_name=$rs_zone['zone_name'];
             if($zone_name!=''){ $zone_id=$zone_name;   }
            
      ////////// End type_zone ////////////////


          }
 

      /////////// type_asset ////////////////
             $sql_ass="SELECT id , name FROM type_asset where id='$project_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $project_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////

          if($station_id!=''  ){    
             $sql_train="SELECT station_train ,station_name_en  FROM type_train_station where station_id='$station_id' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 


             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
          }

            if($station_name!=''){ $station_id=$station_name; }else{  $station_id='ไม่มี';}
  
            /* if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}*/

      /////////// End type_train_station ////////////////
              
  
          if($project_developer!=''  ){    

             $sql_developer="SELECT developer_name ,developer_name_en  FROM dbo_developer where developer_id ='$project_developer' ";  
             $result_developer=$conn->query($sql_developer);
             $rs_developer=$result_developer->fetch_assoc(); 


             $developer_name=$rs_developer['developer_name'];
             $developer_name_en=$rs_developer['developer_name_en'];

             if($developer_name!=''){  $project_developer=$developer_name;  }

          }else{
                 $project_developer='ไม่ระบุ';
          }

            

            if($USER_ID!=''){ 

                   //////////////    ////////////////////////////
                 $sql_register="SELECT register_name ,register_email , register_nickname FROM dbo_register where register_id='$USER_ID' ";  
                 $result_register= $conn->query($sql_register);
                 $rs_register=$result_register->fetch_assoc(); 

                 $name_r=$rs_register['register_name'];
                 $last_r=$rs_register['register_lastname'];
                 $nickname_r=$rs_register['register_nickname'];

                 $ex_list_contact=$name_r." ($nickname_r)";

             }
  
      /////////// ทำการลบ Listing  ////////////////
   
  
     ?> 



                  <div class="modal fade" id="modal-default<?php echo $log_id;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">ดำเนินการ Restore Project : <br><?php echo $project_name;?> นี้หรือไม่ </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                         
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <a href="include/process.php?page=log_project&id=<?php echo $log_id;?>" class="btn btn-primary">Restore</a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

 
     
                  <tr style="font-size: 10px; " style="width: 100%;"  >

           <?php if($p=='boost_post' or $p=='premium' or $p=='proppit'  or $p=='proppit_feed'){     $no++; ?>
                   <td><?php echo $no;?></td>
           <?php } ?>
                    <td> 
                        <center style="width: 70px; " ><a target="_blank" href="?page=log_project_view&id=<?php echo $log_id;?>" title=" "  > <?php echo $project_id;?> </a> </center>

                    </td>     
                    <td> 
                          <center style="width: 50px; font-size: 11px;  "> 
                                  <a href="#"   data-toggle="modal" data-target="#modal-default<?php echo $log_id;?>" data-toggle="modal" data-target="#modal-default<?php echo $log_id;?>" ><i class="fa fa-history" style="font-size:20px;color: blue;" ></i></a>
                          </center> 
                    </td>  

                    <td><center style="width: 200px; " ><?php echo $project_name;?></center></td>
                    <td><center style="width: 50px; " ><?php echo $project_type;?></center></td>
                    <td><center style="width: 50px; " ><?php echo $project_unit;?></center></td>
                    <td><center style="width: 50px; " ><?php echo $project_total_floors;?></center></td>
                    <td><center style="width: 100px; " ><?php echo $station_id;?></center></td>   
                    <td><center style="width: 250px; " ><?php echo $zone_id;?></center></td> 
                    <td><center style="width: 200px; " ><?php echo $project_developer;?></center></td>                       
                    <td><center style="width: 100px; " ><?php echo $project_completed;?></center></td>  
                    <td><center style="width: 200px;color: red; " ><?php echo $check_message;?></center></td>                   
                    <td><center style="width: 120px;"><?php echo $ex_list_contact;?></center></td>
                    <td><center style="width: 120px;">
                       <?php if($create_date=='00 00 543 00:00'){ echo "ยังไม่ระบุ"; }else{ 
                                       echo $create_date;  
                             }?>
                        </center>
                    </td>
              
                    
               
 
                  </tr>  
      <?php } ?>

 
                  </tbody>
          
                </table>
              </div>
              <!-- /.card-body -->
            </div>


</div>


<center>
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
 
             

 
                            <div class="card-footer clearfix" style="width: 100%;">
                                <ul class="pagination pagination-sm m-0 float-right">
                                  <!--
                                    <li class="page-item" ><a href="#" class='page-link'>Prev</a></li>-->
    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='$url_list&page_no=$previous_page'"; } ?> class='page-link'>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 30){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link' >$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_list&page_no=$counter' class='page-link' >$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 30){
        
    if($page_no <= 30) {         
     for ($counter = 1; $counter < 25; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_list&page_no=$counter' class='page-link'>$counter</a></li>";
                }
        }
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        echo "<li class='page-item'><a href='$url_list&page_no=$second_last' class='page-link'>$second_last</a></li>";
        echo "<li class='page-item'><a href='$url_list&page_no=$total_no_of_pages' class='page-link'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 10 && $page_no < $total_no_of_pages - 10) {         
        echo "<li class='page-item'><a href='$url_list&page_no=1' class='page-link'>1</a></li>";
        echo "<li class='page-item'><a href='$url_list&page_no=2' class='page-link'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_list&page_no=$counter' class='page-link'>$counter</a></li>";
                }                  
       }
       echo "<li class='page-item'><a class='page-link'>...</a></li>";
       echo "<li class='page-item'><a href='$url_list&page_no=$second_last' class='page-link' >$second_last</a></li>";
       echo "<li class='page-item'><a href='$url_list&page_no=$total_no_of_pages' class='page-link' >$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li class='page-item'><a href='$url_list&page_no=1' class='page-link'>1</a></li>";
        echo "<li class='page-item'><a href='$url_list&page_no=2' class='page-link'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";

        for ($counter = $total_no_of_pages - 10; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                }else{
           echo "<li class='page-item'><a href='$url_list&page_no=$counter' class='page-link'>$counter</a></li>";
                }                   
                }
            }
    }
?>
  
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='$url_list&page_no=$next_page'"; } ?> class='page-link'>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li class='page-item'><a href='$url_list&page_no=$total_no_of_pages' class='page-link' >Last &rsaquo;&rsaquo;</a></li>";
        } ?>
                                    <!--<li class='page-item'><a href="#" class='page-link'>Next</a></li>-->
                                </ul>
                            </div>
 

 



             
        </div>
      </div>
    </section>


  
