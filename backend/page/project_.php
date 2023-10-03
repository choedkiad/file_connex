 <?php 

  session_start();  
 
 

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

  
   $url_list="?page=project&search=$search&p=$p&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&project=$project&type=$type&deal=$deal&bedroom=$bedroom&house_number=$house_number&list_floor=$list_floor&list_bts=$list_bts&listing_status=$listing_status&bargain=$bargain&score_img=$score_img&sort_data=$sort_data";

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
   

            <div class="card card-primary" style="padding: 10px;">
              <div class="card-header">
                <h3 class="card-title">ค้นหา</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" id="form" enctype="multipart/form-data" action="include/process_search.php?page=project&p=<?php echo $p;?>"   > 
              
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
                 <!--
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
                  </div> -->

            

     
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
                    <th>Proppit TH</th>
                    <th>ประเภท</th>
                    <th>UNIT</th>
                    <th>จำนวนชั้น</th>
                    <th>สถานีรถไฟฟ้า</th>    
                    <th>โซน</th> 
                    <th>Developer</th>  
                    <th>สร้างเสร็จ</th>  
                    <th>Listing All (SALE)</th>  
                    <th>Listing All (RENT)</th> 
                    <th>Listing PUBLIC (SALE)</th>  
                    <th>Listing PUBLIC (RENT)</th> 
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


if($p=='' ){ 


       

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



 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM type_project AS project   
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
     

     $sql="SELECT *   FROM type_project AS project  
                    
                    where $search_all_s
                         
                    order by $number_desc   LIMIT $offset, $total_records_per_page ";  
     $result = $conn->query($sql);


 


} 
 

 //echo $search_all_s;

// echo $search_all_s;
        // output data of each row
         while($rs_listing=$result->fetch_assoc()) {
         
         
         $project_id=$rs_listing['project_id'];
         $project_type=$rs_listing['project_type'];
         $project_name=$rs_listing['project_name'];
         $project_name_en=$rs_listing['project_name_en'];
         $project_proppit_name=$rs_listing['project_proppit_name'];
         $project_proppit_name_en=$rs_listing['project_proppit_name_en'];
         $project_alley=$rs_listing['project_alley'];
         $project_alley_en=$rs_listing['project_alley_en'];
         $project_road=$rs_listing['project_road'];
         $project_road_en=$rs_listing['project_road_en'];
         $project_subdistrict=$rs_listing['project_subdistrict'];
         $project_district=$rs_listing['project_district'];
         $project_province=$rs_listing['project_province'];
         $project_listing_count=$rs_listing['project_listing_count'];
         $project_listing_count_sale=$rs_listing['project_listing_count_sale'];
         $project_listing_count_rent=$rs_listing['project_listing_count_rent'];
         $project_listing_count_public=$rs_listing['project_listing_count_public'];
         $project_listing_count_public_sale=$rs_listing['project_listing_count_public_sale'];
         $project_listing_count_public_rent=$rs_listing['project_listing_count_public_rent'];
         $project_number_buildings=$rs_listing['project_number_buildings'];
         $project_train_station=$rs_listing['project_train_station'];
         $project_number_buildings=$rs_listing['project_number_buildings'];
         $project_total_floors=$rs_listing['project_total_floors'];
         $project_facilities=$rs_listing['project_facilities'];
         $project_facilities_en=$rs_listing['project_facilities_en'];
         $project_nearby_places=$rs_listing['project_nearby_places'];
         $project_nearby_places_en=$rs_listing['project_nearby_places_en'];
         $project_zone=$rs_listing['project_zone'];
         $project_common_fee=$rs_listing['project_common_fee'];
         $project_map=$rs_listing['project_map'];
         $project_latitude=$rs_listing['project_latitude'];
         $project_longitude=$rs_listing['project_longitude'];
         $project_living_project_list=$rs_listing['project_living_project_list'];
         $project_developer=$rs_listing['project_developer'];
         $project_total_floors=$rs_listing['project_total_floors'];
         $project_unit=$rs_listing['project_unit'];
         $project_completed=$rs_listing['project_completed']; 
         $register_id_update=$rs_listing['register_id_update']; 

         $project_name=$project_name." | ".$project_name_en;
         $project_proppit_name=$project_proppit_name." | ".$project_proppit_name_en;

         $project_proppit_latitude=$rs_listing['project_proppit_latitude'];
         $project_proppit_longitude=$rs_listing['project_proppit_longitude'];
         $project_map=$rs_listing['project_map'];
           

        $sql_img="SELECT * FROM type_project_img where project_id='".$project_id."' ";  
        $result_img = $conn->query($sql_img);
        $num=$result_img->num_rows;
   

         $zone_id=$rs_listing['zone_id'];
                      
   
      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$project_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $project_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////


      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$project_province' "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province=$rs_p['provinces_in_thai'];
                $project_province_en=$rs_p['provinces_in_english'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$project_district' "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district=$rs_d['districts_in_thai'];
                $project_district_en=$rs_d['districts_in_english'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$project_subdistrict' "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();

                $project_subdistrict=$rs_s['subdistricts_in_thai'];
                $project_subdistrict_en=$rs_s['subdistricts_in_english'];
                $zip_code=$rs_s['zip_code'];



      //////////////// dbo_developer ////////////////
                $sql_devel="SELECT * FROM dbo_developer WHERE developer_id='$project_developer' "; 
                $result_devel=$conn->query($sql_devel);
                $rs_devel=$result_devel->fetch_assoc();

                $developer_name=$rs_devel['developer_name']; 
                $developer_name_en=$rs_devel['developer_name_en']; 



               // $address=$project_alley." ".$project_road." ตำบล".$project_subdistrict." อำเภอ".$project_district." จังหวัด".$project_province." ".$zip_code;

      /////////// type_project //////////////// 

             if($project_id!=''){ $ex_list_project=$rs_project['project_name']." | ".$rs_project['project_name_en'];}
      /////////// End type_project ////////////////


      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
             if($station_name!=''){ $project_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
      /////////// End type_train_station ////////////////
  



        /////////// zone id ////////////////
             $sql_zone="SELECT * FROM type_zone where zone_id='$zone_id' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc(); 

             $zone_name=$rs_zone['zone_name'];
             $zone_name_en=$rs_zone['zone_name_en'];
             
             if($zone_name!=''){ $project_zone=$rs_zone['zone_name'];  $project_zone=$zone_name_en; }

             if($zone_id=='0') { $project_zone="0";}

    
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
          
            

            if($USER_ID!=''){ 

                   //////////////    ////////////////////////////
                 $sql_register="SELECT register_name ,register_email , register_nickname FROM dbo_register where register_id='$register_id_update' ";  
                 $result_register= $conn->query($sql_register);
                 $rs_register=$result_register->fetch_assoc(); 

                 $name_r=$rs_register['register_name'];
                 $last_r=$rs_register['register_lastname'];
                 $nickname_r=$rs_register['register_nickname'];

                 $ex_list_contact=$name_r." ($nickname_r)";

             } 
   
  
     ?> 



                  <div class="modal fade" id="modal-default<?php echo $project_id;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">ดำเนินการจะลบ Project : <br><?php echo $project_name;?> นี้หรือไม่ </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                         
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <a href="include/process.php?page=create_project&status=del&id=<?php echo $project_id;?>" class="btn btn-primary">DELETE</a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
 
     
                  <tr style="font-size: 10px; " style="width: 100%;"  >
 
                    <td> 
                        <center style="width: 70px; " >
                              <a href="?page=create_project&status=edit&id=<?php echo $project_id;?>">
                                <i class="fa fa-pencil" style="font-size:20px;color: black;"></i></a>&nbsp;
                              <a href="#"   data-toggle="modal" data-target="#modal-default<?php echo $project_id;?>" data-toggle="modal" data-target="#modal-default<?php echo $project_id;?>" ><i class="fa fa-trash" style="font-size:20px; color: black;" ></i></a>
                               
                         </center> 
                    </td>      
                    <td><center style="width: 200px; " ><?php echo $project_name;?></center></td>
                    <td><center style="width: 200px; " ><?php echo $project_proppit_name;?></center></td>
                    <td><center style="width: 50px; " ><?php echo $project_type;?></center></td>
                    <td><center style="width: 50px; " ><?php echo $project_unit;?></center></td>
                    <td><center style="width: 50px; " ><?php echo $project_total_floors;?></center></td>
                    <td><center style="width: 100px; " ><?php echo $project_train_station;?></center></td>   
                    <td><center style="width: 250px; " ><?php echo $project_zone;?></center></td> 
                    <td><center style="width: 200px; " ><?php echo $developer_name;?></center></td>                       
                    <td><center style="width: 100px; " ><?php echo $project_completed;?></center></td>  
                    <td><center style="width: 50px; " ><?php echo $project_listing_count_sale;?></center></td>    
                    <td><center style="width: 50px; " ><?php echo $project_listing_count_rent;?></center></td>  
                    <td><center style="width: 50px; " ><?php echo $project_listing_count_public_sale;?></center></td>  
                    <td><center style="width: 50px; " ><?php echo $project_listing_count_public_rent;?></center></td>                 
                    <td><center style="width: 120px;"><?php echo $ex_list_contact;?></center></td>
                    <td>
                       <?php if($create_date=='00 00 543 00:00'){ echo "ยังไม่ระบุ"; }else{ 
                                       echo $create_date;  
                             }?>
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


  
