 <?php 

  session_start();  
 

   $p=$_GET['p'];
   $search=$_GET['search'];
   $type=$_GET['type'];
   $bedroom=$_GET['bedroom'];
   $deal=$_GET['deal'];
   $heading=$_GET['heading'];
   $sqm_low=$_GET['sqm_low'];
   $sqm_maximum=$_GET['sqm_maximum'];
   $price_low=$_GET['price_low'];
   $price_maximum=$_GET['price_maximum'];
   $house_number=$_GET['house_number'];
   $$list_bts=$_GET['list_bts'];
   $list_floor=$_GET['list_floor'];
   $project=$_GET['project'];
   $bargain=$_GET['bargain'];
   $request_pm=$_GET['request_pm'];
   $listing_status=$_GET['listing_status'];
   $tel=$_GET['tel'];
   $score_img=$_GET['score_img'];
   $sort_data=$_GET['sort_data'];
   $today=date('Y-m-d');

  
   $url_list="?page=upload_file_excel_check&search=$search&p=$p&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&project=$project&type=$type&deal=$deal&bedroom=$bedroom&house_number=$house_number&list_floor=$list_floor&list_bts=$list_bts&listing_status=$listing_status&bargain=$bargain&request_pm=$request_pm&score_img=$score_img&sort_data=$sort_data";

   ///////////////   ////////////////

   if($project==''){
          $project='';
   }

   /////////////// ประเภท คอนโด ทาวน์เฮ็าส์ ////////////////

   if($type!=''){
          $s_type=" and data.ex_list_listing_type='$type' "; 
   }else{    $s_type="";  }

   /////////////// จำนวนห้องนอน ////////////////

   if($bedroom!=''){ 
          $s_bedroom=" and data.ex_list_bedroom='$bedroom' ";  
   }else{    $s_bedroom="";  }

   /////////////// ประเภท ดีล ขายเช่า ////////////////

   if($deal!=''){ 
          $s_deal="  and data.ex_list_deal_type='$deal'  ";  
   }else{    $s_deal="";  }

   /////////////// Status Availible , Rented ////////////////

   if($listing_status!=''){ 
          $s_listing_status="  and  data.ex_list_listing_status='$listing_status'  ";  
   }else{    $s_listing_status="";  }


   /////////////// เลขที่ห้อง / บ้าน ////////////////

   if($house_number!=''){
          $s_house_number=" and  ex_list_house_number='$house_number'  "; 
   }else{    $s_house_number="";  }

   /////////////// ชั้นที่ ////////////////

   if($list_floor!=''){
          $s_list_floor=" and ex_list_floor='$list_floor'  "; 
   }else{    $s_list_floor="";  }


   /////////////// คะแนนภาพ ////////////////

   if($score_img!=''){
         $s_score_img=" and data.ex_list_img_score='$score_img' ";
   }else{   $s_score_img="";  }

   //////////////////////////////////////////////


   /////////////// พื้นที่ต่ำสุด ////////////////

   if($sqm_low!=''){
         $s_sqm_low=" and data.ex_list_sqm>=$sqm_low  ";
   }else{   $s_sqm_low="";  }


   /////////////// พื้นที่สูงสุด ////////////////

   if($sqm_maximum!=''){
         $s_sqm_maximum="  and  data.ex_list_sqm<=$sqm_maximum ";
   }else{   $s_sqm_maximum="";  }

   /////////////// ราคาต่ำสุด ////////////////

   if($price_low!=''){
         $s_price_low="  and  data.ex_list_price>=$price_low ";
   }else{   $s_price_low="";  }


   /////////////// ราคาสูงสุด //////////////// 

   if($price_maximum!=''){
         $s_price_maximum=" and data.ex_list_price<=$price_maximum  ";
   }else{   $s_price_maximum="";  }


   /////////////// list_boostpost ////////////////  


   if($list_boostpost!=''){
         $s_list_boostpost=" and ex_list_boostpost='$list_boostpost'";
   }else{
         $s_list_boostpost=""; 
   }
 

   /////////////// list_premium ////////////////  

   
   if($list_premium!=''){
         $s_list_premium=" and ex_list_premium='$list_premium' ";
   }else{
         $s_list_premium=""; 
   }
 

   /////////////// list_public ////////////////  

   
   if($list_public!=''){
         $s_list_public=" and  data.ex_list_public='$list_public' ";
   }else{
         $s_list_public=""; 
   }

 

   if($sort_data=='1'){
      $sort="data.ex_list_price ASC , ";
   }else if($sort_data=='2'){
      $sort="data.ex_list_price DESC , ";
   }else if($sort_data=='3'){
      $sort="data.ex_list_sqm ASC , ";
   }else if($sort_data=='4'){
      $sort="data.ex_list_sqm DESC , ";
   }else if($sort_data=='5'){
      $sort="data.ex_list_floor ASC , ";
   }else if($sort_data=='6'){
      $sort="data.ex_list_floor DESC , ";
   }else if($sort_data=='7'){
      $sort="data.ex_list_date_update DESC , ";
   }else if($sort_data=='8'){
      $sort="data.ex_list_date_update ASC , ";
   }


   if($search!=''){ 
   }else{    $search="";  }

   $check_s=substr($project,0 , 1);

        if($check_s=="p"){

                $strSQL = "SELECT project_id , project_latitude ,project_longitude , project_proppit_latitude , project_proppit_longitude , project_subdistrict , 
                          project_district ,project_province , project_name_en 
                          FROM type_project where search_p_id='$project' LIMIT 1  "; 
                $result=$conn->query($strSQL);  
                $rs_project = $result->fetch_assoc();

                $project_id=$rs_project['project_id']; 
                $search_project_s=" and  data.project_id='$project_id'   ";


                $project_check="pj.search_p_id='$project'   "; 

        }else if($check_s=="z"){


                $strSQL = "SELECT zone_id FROM type_zone where search_z_id='$project'   LIMIT 1  "; 
                $result=$conn->query($strSQL);  
                $rs_zone=$result->fetch_assoc();

                $zone_id=$rs_zone['zone_id']; 
                $search_project_s=" and  data.zone_id='$zone_id' ";

                $project_check="zone.search_z_id='$project' and "; 

        }else if($check_s=="s"){ 
 

                $strSQL = "SELECT station_id  FROM type_train_station where search_s_id='$project'  LIMIT 1   "; 
                $result=$conn->query($strSQL);  
                $rs_station=$result->fetch_assoc();

                $station_id=$rs_station['station_id']; 
                $search_project_s=" and  data.ex_list_train_station='$station_id' "; 
                
                $project_check="ts.search_s_id='$project' and "; 
        }else{

           $project_check="  "; 
        }
 
 
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

if($_SESSION['OWNER_TEL']=='1'){  
   echo("<script> top.location.href='?page=deal_buyer&page_no=1'</script>");  
}
 
if($_GET['page_no']==''){
   echo("<script> top.location.href='?page=upload_file_excel_check&p=$p&page_no=1'</script>");   
}
 $sub_text_1= substr($_SERVER['REQUEST_URI'],-9);
/*
$page_no= substr($sub_text_1,6); */ 
$page_no = $_GET['page_no'];
/*
 echo $sub_text_1." - ".$page_no." - ".$cate_id; */

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
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5"></div>         
                    <div class="col-md-2" style="padding: 10px;">
                         <a href="?page=create_listing&status=create" class="btn btn-block btn-primary btn-lg" onclick="showAndHide()" id="link_check" > เพิ่มทรัพย์ในระบบ</a>
                    </div>
                </div> 
        
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title  p-3"><?php echo $title;?></h3>
                <ul class="nav nav-pills ml-auto p-2" style="font-size: 14px;">
                  <li class="nav-item"><a class="nav-link <?php if($p==''){?>active<?php } ?>" href="?page=upload_file_excel_check"  >Listing All</a></li>
                  <li class="nav-item"><a href="?page=upload_file_excel_check&p=public" class="nav-link <?php if($p=='public'){?>active<?php } ?>"   >Listing (Public)</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p=='draft'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=draft"  >Listing (Draft)</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p=='premium'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=premium"  >Listing (Premium)</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p=='proppit'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=proppit"  >Proppit</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p=='boost_post'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=boost_post"  >Proppit (Boost)</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p=='proppit_feed'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=proppit_feed"  >Proppit Feed</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p=='propertyhub'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=propertyhub"  >Propertyhub</a></li>
                  <li class="nav-item"><a class="nav-link <?php if($p=='propertyhub_boost'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=propertyhub_boost"  >Propertyhub  (Boost)</a></li>
                  <!--<li class="nav-item"><a class="nav-link <?php if($p=='living'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=living"  >Living Insider</a></li> -->
                  <li class="nav-item"><a class="nav-link <?php if($p=='rent_till'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=rent_till"  >Listing (ใกล้ครบกำหนดเช่า)</a></li> 
                  <li class="nav-item"><a class="nav-link <?php if($p=='no_status'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=no_status"  >No Status</a></li> 
  <?php if( $_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?>         
                  <li class="nav-item"><a class="nav-link <?php if($p=='delete'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=delete"  >Listing (Delete)</a></li>
  <?php } ?>        
  <?php if( $_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?>
                  <li class="nav-item"><a class="nav-link <?php if($p=='double'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=double"  >ตรวจสอบ Listing ซ้ำ</a></li>  
  <?php } ?>

                    <li class="nav-item"><a class="nav-link <?php if($p=='pm_listing'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=pm_listing"  >PM Listing</a></li> 
                    <li class="nav-item"><a class="nav-link <?php if($p=='first_hand'){?>active<?php } ?>" href="?page=upload_file_excel_check&p=first_hand"  >ทรัพย์มือหนึ่ง</a></li>
                </ul>    
              </div>


            <div class="card card-primary" style="padding: 10px;">
              <div class="card-header">
                <h3 class="card-title">ค้นหา</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" id="form" enctype="multipart/form-data" action="include/process_search.php?page=upload_file_excel_check&p=<?php echo $p;?>" class=" form-inline"> 
              
              <input type="text" class="form-control" style="width: 100%;" name="p"  value="<?php echo $p;?>" hidden="hidden" >
                
              <div class="card-body">

               <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                      <div class="form-group row"> 
                        <b class="col-md-12 col-sm-12 col-form-label"   >ค้นหา :  </b>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" style="width: 100%;" name="search"  value="<?php echo $search;?>"  >
                        </div>
                      </div>
                  </div>
                 
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <b class="col-md-12 col-sm-12 col-form-label"   >โครงการ / โซน / รถไฟฟ้า  : </b>
                        <div class="col-sm-12">
                            
                                <div class="form-group">
                                  
                                  <select class="form-control select2bs4"  name="project" id="project"  style="width: 100%;">
                                      <option value=""  
                                    <?php if($project==""){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option> 
      <?php                         
       $sql_project="SELECT search_p_id , project_name , project_name_en FROM type_project order by project_id  DESC"; 
       $result_project=$conn->query($sql_project);
 
           while($rs_project = $result_project->fetch_assoc()) {   


                     $project_id_s=$rs_project['project_id'];              
                     $project_name=$rs_project['project_name'];
                     $project_name_en=$rs_project['project_name_en'];                  

                     $search_id=$rs_project['search_p_id'];
                     
                      $project_name_text="โครงการ : ".$project_name." | Project : ".$project_name_en; 

      ?> 
                                    <option value="<?php echo $search_id;?>"  <?php if($search_id==$project){?> selected="selected"  <?php } ?>  > <?php echo $project_name_text;?> </option> 
     <?php } ?>

      <?php 

   if($p!='delete'){

              $strSQL = "SELECT zone_id,search_z_id,zone_name,zone_name_en FROM type_zone  "; 
              $result=$conn->query($strSQL); 
             
              while($rs_zone2= $result->fetch_assoc())  {   

                     $zone_id=$rs_zone2['zone_id'];              
                     $zone_name=$rs_zone2['zone_name'];
                     $zone_name_en=$rs_zone2['zone_name_en'];  
                     $search_id_2=$rs_zone2['search_z_id'];
                     
                     $zone_name_text="โซน : ".$zone_name." | zone : ".$zone_name_en;  
             
                ?> 
                                    <option value="<?php echo $search_id_2;?>" 
                                    <?php if($search_id_2==$project){?> selected="selected"  <?php } ?>  >
                                         <?php echo $zone_name_text;?>
                                    </option> 
        <?php }   
    } ?>

        <?php 

   if($p!='delete'){

              $strSQL = "SELECT  search_s_id ,station_name , station_name_en ,tr_group , search_s_id FROM type_train_station  "; 
              $result=$conn->query($strSQL); 
             
              while($rs_station2= $result->fetch_assoc())  {   

                     $station_id =$rs_station2['station_id'];              
                     $station_name=$rs_station2['station_name'];
                     $station_name_en=$rs_station2['station_name_en'];  
                     $tr_group=$rs_station2['tr_group'];  
                     $search_s_id=$rs_station2['search_s_id'];
                     
                     $name_text="สถานีรถไฟฟ้า : ".$tr_group."-".$station_name." | ".$station_name_en;  
             
                ?> 
                                    <option value="<?php echo $search_s_id;?>" 
                                    <?php if($search_s_id==$project){?> selected="selected"  <?php } ?>  >
                                         <?php echo $name_text;?>
                                    </option>  
        <?php }  
    }  ?>
                                  </select>
                                </div>


                        </div>
                      </div>
                  </div>               
                  <br><br>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">ประเภทอสังหาฯ : </b>
                        <div class="col-sm-12">
                                  <select class="form-control select" name="type" id="type"  style="width: 100%;">
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
             
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">ประเภทดิล : </b>
                        <div class="col-sm-12"> 
                            <div class="form-group"> 
                                  <select class="form-control select" name="deal" id="deal"  style="width: 100%;">
                                    <option value="" <?php if($deal==''){?> selected="selected" <?php } ?>>ไม่ระบุ</option> 
                                     <option value="1" <?php if($deal=='1'){?> selected="selected" <?php } ?>>ขาย</option> 
                                     <option value="2" <?php if($deal=='2'){?> selected="selected" <?php } ?>>ให้เช่า</option> 
                                  </select>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">Status : </b>
                        <div class="col-sm-12"> 
                            <div class="form-group"> 
                                  <select class="form-control select" name="listing_status" id="listing_status"  style="width: 100%;">
                                    <option value="">ยังไม่ระบุ</option>  
                                    <option value="1" <?php if($listing_status=='1'){ ?>  selected <?php } ?>  >Available</option> 
                                    <option value="2" <?php if($listing_status=='2'){ ?>  selected <?php } ?> >Contracted ไม่ล็อคสิทธิ</option>  
                                    <option value="3" <?php if($listing_status=='3'){ ?>  selected <?php } ?> >Rented</option>   
                                    <option value="4" <?php if($listing_status=='4'){ ?>  selected <?php } ?> >Sold (by Connex)</option>  
                                    <option value="5" <?php if($listing_status=='5'){ ?>  selected <?php } ?> >Sold (by Others)</option>  
                                    <option value="6" <?php if($listing_status=='6'){ ?>  selected <?php } ?> >own use</option> 
                                    <option value="7" <?php if($listing_status=='7'){ ?>  selected <?php } ?> >unknown</option> 
                                    <option value="8" <?php if($listing_status=='8'){ ?>  selected <?php } ?> >ไม่รับสาย</option> 
                                    <option value="9" <?php if($listing_status=='9'){ ?>  selected <?php } ?> >ไม่สะดวกคุย</option> 
                                    <option value="10" <?php if($listing_status=='10'){ ?>  selected <?php } ?> >ปิดเครื่อง</option> 
                                    <option value="11" <?php if($listing_status=='11'){ ?>  selected <?php } ?> >สายไม่ว่าง</option> 
                                    <option value="12" <?php if($listing_status=='12'){ ?>  selected <?php } ?> >เบอร์ผิด</option> 
                                    <option value="13" <?php if($listing_status=='13'){ ?>  selected <?php } ?> >ไม่รับ agent</option> 
                                    <option value="14" <?php if($listing_status=='14'){ ?>  selected <?php } ?> >ยังไม่ปล่อยขาย/เช่า</option> 
                                    <option value="15" <?php if($listing_status=='15'){ ?>  selected <?php } ?> >Under Renovation</option> 
                                  </select>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">จำนวนห้องนอน : </b>
                        <div class="col-sm-12"> 

                          <input type="text" class="form-control" style="width: 100%;" name="bedroom" value="<?php echo $bedroom;?>"  >
                        </div>
                      </div>
                  </div> 
                  <!--
                  <div class="col-md-3 col-sm-6">
                  </div>   -->         
                  <br><br>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">พื้นที่ใช้สอย : </b>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" style="width: 100%;" name="sqm_low"  value="<?php echo $sqm_low;?>"  placeholder="พื้นที่ต่ำสุด"  >
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" style="width: 100%;" name="sqm_maximum"  value="<?php echo $sqm_maximum;?>" placeholder="พื้นที่สูงสุด" >
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">ราคา : </b>
                        <div class="col-sm-6"> 
                           <input type="text" class="form-control" style="width: 100%;" name="price_low"  value="<?php echo $price_low;?>" placeholder="ราคาต่ำสุด"  >
   
                        </div>
                        <div class="col-sm-6"> 
                           <input type="text" class="form-control" style="width: 100%;" name="price_maximum"  value="<?php echo $price_maximum;?>"  placeholder="ราคาสูงสุด" >
                        </div>

                      </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">เลขที่บ้าน/ห้อง : </b>
                        <div class="col-sm-12"> 

                          <input type="text" class="form-control" style="width: 100%;" name="house_number"  value="<?php echo $house_number;?>"  >
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">ชั้น : </b>
                        <div class="col-sm-12"> 

                          <input type="text" class="form-control" style="width: 100%;" name="list_floor"  value="<?php echo $list_floor;?>"  >
                        </div>
                      </div>
                  </div>          
                  <br><br> 
                
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">คะแนนรูปภาพ : </b>
                        <div class="col-sm-12"> 
                                  <select class="form-control select" name="score_img" id="score_img"  style="width: 100%;">
                                    <option value="" selected>ยังไม่ระบุ</option>  
                                    <option value="0" <?php if($score_img=='0'){ ?>  selected <?php } ?>>ยังไม่ให้คะแนน</option>  
                                    <option value="1"<?php if($score_img=='1'){ ?>  selected <?php } ?>>แย่</option>  
                                    <option value="2"<?php if($score_img=='2'){ ?>  selected <?php } ?>>ปานกลาง</option>  
                                    <option value="3"<?php if($score_img=='3'){ ?>  selected <?php } ?>>ดี</option>  
                                    <option value="4"<?php if($score_img=='4'){ ?>  selected <?php } ?>>ดีมาก</option>  
                                  </select>
              

                        </div>
                      </div>
                  </div>
       

                 
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">เรียงลำดับ : </b>
                        <div class="col-sm-12"> 
                                  <select class="form-control select" name="sort_data" id="sort_data"  style="width: 100%;">
                                    <option value="" selected>ยังไม่ระบุ</option>    
                                    <option value="1"<?php if($sort_data=='1'){ ?>  selected <?php } ?>>เรียงราคา น้อย -> มาก</option>  
                                    <option value="2"<?php if($sort_data=='2'){ ?>  selected <?php } ?>>เรียงราคา มาก -> น้อย</option>  
                                    <option value="3"<?php if($sort_data=='3'){ ?>  selected <?php } ?>>เรียงพื้นที่ น้อย -> มาก</option>  
                                    <option value="4"<?php if($sort_data=='4'){ ?>  selected <?php } ?>>เรียงพื้นที่ มาก-> น้อย</option> 
                                    <option value="5"<?php if($sort_data=='5'){ ?>  selected <?php } ?>>เรียงชั้น มาก-> น้อย</option> 
                                    <option value="6"<?php if($sort_data=='6'){ ?>  selected <?php } ?>>เรียงชั้น น้อย -> มาก</option>  
                                    <option value="7"<?php if($sort_data=='7'){ ?>  selected <?php } ?>>เรียงอัพเดท ล่าสุด -> เก่ากว่า</option> 
                                    <option value="8"<?php if($sort_data=='8'){ ?>  selected <?php } ?>>เรียงอัพเดท เก่ากว่า -> ล่าสุด</option> 
                                  </select>
              

                        </div>
                      </div>
                  </div>

            

       <?php if($p=='pm_listing'){?>

                  <br><br>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">ผู้ติดต่อ : </b>
                        <div class="col-sm-12">
                                  <select class="form-control select2bs4" name="bargain" id="bargain"  style="width: 100%;">
                                      <option value="" <?php if($bargain==''){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option> 
                                            <?php                          
                                             $sql_bargain="SELECT * FROM dbo_register WHERE register_lcok='0' order by register_id ASC"; 
                                             $result_bargain=$conn->query($sql_bargain);

                                         
                                                 while($rs_bargain=$result_bargain->fetch_assoc()) {   
                                                       $name_r=$rs_bargain['register_name'];
                                                       $last_r=$rs_bargain['register_lastname'];
                                                       $nickname_r=$rs_bargain['register_nickname']; 
 
                                                    ?> 

                                                       <option value="<?php echo $rs_bargain['register_id'];?>"  <?php if($rs_bargain['register_id']==$bargain){?> selected="selected"  <?php } ?>  >
                                                        <?php echo $name_r." ($nickname_r)";?></option> 
                                            <?php }  ?>
                                  </select>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-3 col-sm-12">
                    <div class="form-group row">
                        <b class="col-sm-12 col-form-label">สถานะ : </b>
                        <div class="col-sm-12">
                                  <select class="form-control select2bs4" name="request_pm" id="request_pm"  style="width: 100%;">
                                      <option value="" <?php if($request_pm==''){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option>   
                                          <option value="1"  <?php if($request_pm=='1'){?> selected="selected"  <?php } ?>  >เฉพาะผู้ขอ PM</option> 
                                           
                                  </select>
                        </div>
                      </div>
                  </div>
         <?php } ?>
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
 

                  <div class="col-md-12 col-sm-12"  ><br>
                     <center><button type="submit" class="btn btn-primary">Search Data</button> &nbsp;&nbsp;&nbsp;
                          <a class="btn btn-primary" href="?page=upload_file_excel_check&p=<?php echo $p;?>">Clear Data</a>
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
           <?php if($p=='boost_post' or $p=='premium' or $p=='proppit' or $p=='proppit_feed' or $p=='propertyhub'  ){?>
                    <th>#</th>
           <?php } ?>
                    <th>No</th>
           <?php if($p=='double'){?>
                    <th>CX ซ้ำ</th> 
                    <th>#</th>
                    <th>เทียบข้อมูล</th>     
                    <th>โพสต์</th>                  
           <?php } ?>

          <?php if($p!='double'){?>
                    <th>#</th> 
          <?php }?> 
           <?php if($p=='delete'){?>
                    <th>ผู้ลบ</th>
                    <th>เหตุผลในการลบ</th>  
           <?php } ?>

           <?php if($p=='draft' and $_SESSION['STATUS_DRAFT']=='1' or $p=='public' and $_SESSION['STATUS_DRAFT']=='1' or $p=='boost_post' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='premium' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='proppit' ){ ?>
                    <th>Public</th>
                    <th>Post แล้ว</th>
           <?php } ?> 
           <?php if($p=='draft' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='public' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='boost_post' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='premium' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='proppit' ){ ?>
                    <th>Premium</th>
           <?php } ?> 
           <?php if($p=='draft' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='public' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='boost_post' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='premium' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='proppit' ){ ?>
                    <th>Proppit</th>
                    <th>Boost Proppit</th>
                    <th>Living Insider</th>
           <?php } ?> 
           <?php if($p=='draft' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='public' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='boost_post' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='premium' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='propertyhub' ){ ?>
                    <th>Propertyhub</th> 
                    <th>Boost Propertyhub</th> 
           <?php } ?> 
                    <th>Image</th>     
                    <th>คุณภาพImg</th>       
                    <th>Status</th>
                    <th>Type</th>
                    <th>Deal</th>
                    <th>Project</th> 
                  
                   <!--<td>Head</td>  -->
                    <th>House No.</th>
                    <th>Floor</th>
              
                    <th>Room</th>  
                    <th>พื้นที่ ตร.ว. / ตร.ม. </th>  
                    <th>Price</th>
          <?php if($p=='pm_listing'){?>
                    <th>ราคาเก่า</th>                
                    <th>ผู้ติดต่อ</th>
          <?php }?> 
          <?php if($p=='pm_listing'){?>
                    <th>Status PM</th>  
          <?php } ?>  
                    <th>Owner</th>    
                    <th>BTS</th> 
                   <!-- <th>Zone</th>-->
                    <th>Approve</th>

                    <?php if( $p=='public' and $_SESSION['STATUS_DRAFT']=='1'){ ?>
                    <th>Update public</th>

                    <?php }else if( $p=='pm_listing'){ ?>
                    <th>วันที่เปลี่ยนแปลงราคา</th>
                    <?php }else{ ?>
                    <th>Update</th>

                    <?php } ?>
              <?php if($p=='proppit' or $p=='boost_post'){ ?>  
                    <th>Proppit Date</th> 
              <?php } ?>
              <?php if($p=='propertyhub' or $p=='boost_post'){ ?>  
                    <th>Propertyhub Date</th> 
              <?php } ?>         
                    <!--
                    <th>ภาพประกอบ</th>
                    <th>พื้นที่ดิน</th>
                    <th>MAP</th>
                    <th>Contactติดต่อ</th>
                    <th>ทิศ</th> -->
                 
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

          $list_public="";
          $list_boostpost="";
          $list_premium=""; 
          $list_close="  data.ex_list_close='0' and data.ex_list_double_status='0' ";
          $number_desc=" $sort data.ex_list_listing_code  DESC "; 

    }else if($p=='first_hand'){ 

          $list_public="";
          $list_boostpost="";
          $list_premium=""; 
          $list_close="  data.ex_list_close='0' and data.ex_list_double_status='0' and data.ex_list_listing_type_first='1' ";
          $number_desc=" $sort data.ex_list_listing_code  DESC "; 

    }else if($p=='public'){
          $list_public=" and data.ex_list_public='1' ";
          $list_boostpost="";
          $list_premium="";
          $list_close="  data.ex_list_close='0' and data.ex_list_double_status='0' ";
          $number_desc=" $sort data.ex_list_public_date   DESC ,data.ex_list_listing_code  DESC  ";

    }else if($p=='draft'){
          $list_public=" and data.ex_list_public='0'  ";
          $list_boostpost="";
          $list_premium="";
          $list_close="  data.ex_list_close='0' and data.ex_list_double_status='0' ";
          $number_desc=" $sort data.ex_list_date_update  DESC ";

    }else if($p=='boost_post'){
          $list_public="   ";
          $list_boostpost=" and data.ex_list_boostpost='1' ";
          $list_premium="";
          $list_close="  data.ex_list_close='0'  ";
          $number_desc=" $sort data.ex_list_boostpost_date DESC , data.ex_list_date_update  DESC ";

    }else if($p=='proppit'){
          $list_public="   ";
          $list_boostpost=" and data.ex_list_proppit='1' ";
          $list_premium="";
          $list_close="  data.ex_list_close='0' ";
          $number_desc=" $sort data.ex_list_proppit_date DESC , data.ex_list_date_update  DESC ";

    }else if($p=='proppit_feed'){
          $list_public="   ";
          $list_boostpost=" and data.ex_list_proppit='1' ";
          $list_boostpost2=" and data.ex_list_boostpost='1' ";
          $list_premium="";
          $list_close="  data.ex_list_close='0' ";
          $number_desc=" $sort data.ex_list_boostpost DESC ,  data.ex_list_boostpost_date DESC  ,  data.ex_list_proppit DESC , data.ex_list_proppit_date DESC   ,
                         data.ex_list_date_update  DESC ";

    }else if($p=='propertyhub'){
          $list_public="   ";
          $list_boostpost=" and data.ex_list_propertyhub='1' ";
          $list_premium="";
          $list_close="  data.ex_list_close='0' ";
          $number_desc=" $sort data.ex_list_propertyhub_date DESC , data.ex_list_date_update  DESC ";

   
    }else if($p=='premium'){
          $list_public=" and data.ex_list_public='1' ";
          $list_boostpost="";
          $list_premium=" and data.ex_list_premium='1' ";
          $list_close="  data.ex_list_close='0' and data.ex_list_double_status='0' ";
          $number_desc=" $sort data.ex_list_premium_date  DESC ";    

    }else if($p=='rent_till'){
 
          /*
          $check_rent_date="and data.ex_list_rent_till_date<=$calExpireDate and data.ex_list_rent_till_date!='0000-00-00' and data.ex_list_deal_type='2' "; */ 
       
          $deal='2';
          $s_listing_status="  and  data.ex_list_listing_status='3' ";
          $list_public="";
          $list_boostpost="";
          $list_close="  data.ex_list_close='0' and data.ex_list_double_status='0' ";
          $check_rent_date="and data.ex_list_rent_till_date!='0000-00-00' and data.ex_list_rent_till_date<='$calExpireDate'  ";
          $list_premium="";
          $number_desc=" $sort data.ex_list_rent_till_date  ASC ";   

    }else if($p=='no_status'){
 
          /*
          $check_rent_date="and data.ex_list_rent_till_date<=$calExpireDate and data.ex_list_rent_till_date!='0000-00-00' and data.ex_list_deal_type='2' "; */ 
       
          $list_public=" and data.ex_list_public='0'  ";
          $list_boostpost="";
          $list_premium="";
          $list_close="  data.ex_list_close='0' and data.ex_list_double_status='0' ";
          $list_status="and data.ex_list_listing_status='' ";
          $number_desc=" $sort data.ex_list_listing_code  DESC ";

    }else if($p=='delete'){
 
          /*
          $check_rent_date="and data.ex_list_rent_till_date<=$calExpireDate and data.ex_list_rent_till_date!='0000-00-00' and data.ex_list_deal_type='2' "; */ 
       
          $list_public="";
          $list_boostpost="";
          $list_premium="";
          $list_close="  data.ex_list_close='1' ";
     
          $number_desc=" $sort data.ex_list_close_date  DESC, data.ex_list_date_update  DESC  ";

    }else if($p=='double'){
 
          /*
          $check_rent_date="and data.ex_list_rent_till_date<=$calExpireDate and data.ex_list_rent_till_date!='0000-00-00' and data.ex_list_deal_type='2' "; */ 
       
          $list_public="";
          $list_boostpost="";
          $list_premium="";
          $list_close="  data.ex_list_close='0' and data.ex_list_double_status='1'  ";
         
          $number_desc=" $sort data.ex_list_date_update  DESC ";
  
    }else if($p=='pm_listing'){ 
 
          /*
          $check_rent_date="and data.ex_list_rent_till_date<=$calExpireDate and data.ex_list_rent_till_date!='0000-00-00' and data.ex_list_deal_type='2' "; */ 
       
          $list_public="";
          $list_boostpost="";
          $list_premium="";
   
       if($bargain!='' and $request_pm!=''){

          $list_close="  data.ex_list_close='0' and data.ex_list_pm_status!='0'   and data.ex_list_bargain='$bargain' and data.ex_list_request='$request_pm' ";

       }else if($bargain!=''){ 

          $list_close="  data.ex_list_close='0' and data.ex_list_pm_status!='0'   and data.ex_list_bargain='$bargain'  ";

       }else if($request_pm!=''){ 

          $list_close="  data.ex_list_close='0' and data.ex_list_pm_status!='0'   and data.ex_list_request='$request_pm'  ";    

       }else{  
          $list_close="  data.ex_list_close='0' and data.ex_list_pm_status!='0'   ";
       }
   
          $number_desc=" $sort data.ex_list_bargain_date  DESC ";
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


if($p=='' or $p=='public' or $p=='draft' or $p=='boost_post' or $p=='premium' or $p=='rent_till' or $p=='no_status'  or $p=='delete' or $p=='double' or $p=='pm_listing' or $p=='proppit' or $p=='proppit_feed' or $p=='propertyhub' or $p=='first_hand'){ 


          if($search==''){

               $search_all_s="           
                          (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum  
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s   
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date 

                          )    ";

          }else{

               $search_all_s="           
                          (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum  and
                          data.ex_list_heading LIKE '%$search%'    
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s   
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date 

                          )  
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_heading_en LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          )  
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_listing_code LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          )  
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_contact_tel LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          )  
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_contact_tel1_2 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          )  
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_contact_tel1_3 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          ) 
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_contact_tel1_4 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          )
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_contact_tel_2 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          )  
                           or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_contact_tel2_2 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          ) 
                           or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_contact_tel2_3 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          )
                           or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_contact_tel2_4 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          )    

                             ";

          }


          if($p=='proppit_feed'){
                 
                 $search_all_s="           
                           
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_listing_code LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          $check_rent_date   
                          )  
                          or 
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_listing_code LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  $list_status  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost2 $list_premium 
                          $check_rent_date   
                          ) 
                            
                              ";  
          }


          if($_SESSION['POSITION']=='1'){
            

          }
 
 /*
        }
SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers
ON Orders.CustomerID=Customers.CustomerID; */



 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM dbo_data_excel_listing AS data  
         
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
     

     $sql="SELECT data.ex_list_listing_code ,  data.ex_list_house_number , data.ex_list_listing_status , data.ex_list_boostpost,
                  data.ex_list_rent_till, data.ex_list_listing_type , data.ex_list_zone , data.ex_list_checkpost  , data.ex_list_public , data.ex_list_proppit , data.ex_list_propertyhub , data.ex_list_propertyhub_boost, data.ex_list_listing_type_first ,
                  data.ex_list_living , data.ex_list_living_date, data.ex_list_img_score, data.ex_list_bargain , data.ex_list_pm_waiting , data.ex_list_price_old , data.ex_list_price_changes , data.ex_list_rai , data.ex_list_ngan , data.ex_list_wa ,
                  data.ex_list_bargain_date , data.ex_list_img_number ,
                  data.ex_list_premium,data.ex_list_contact_name , data.ex_list_contact_name_2 , data.ex_list_contact_tel_2,
                  data.ex_list_price, data.ex_list_contact_tel , data.ex_list_contact_tel1_2 , data.ex_list_contact_tel1_3 , data.ex_list_contact_tel1_4 , data.ex_list_contact_tel2_2 , data.ex_list_contact_tel2_3 , data.ex_list_contact_tel2_4 ,data.ex_list_contact_lineid , data.ex_list_contact_email, data.ex_list_pm_status ,
                  data.ex_list_contact_lineid_2 , data.ex_list_contact_email_2, data.ex_list_listing_name_en, data.ex_list_train_station,
                  data.ex_list_deal_type , data.ex_list_house_number , data.ex_list_bedroom ,data.ex_list_bathroom , data.ex_list_double_cx, data.ex_list_double_no,
                  data.ex_list_sqm, data.project_id , data.ex_list_date_update , data.ex_list_floor , data.ex_list_heading , data.ex_list_close , data.ex_list_close_date , 
                  data.ex_list_heading_en , data.ex_list_contact , data.ex_list_zone_en , data.ex_list_contact_name ,data.ex_list_contact_tel ,  data.ex_list_total_floors, data.ex_list_public_date , 
                  data.ex_list_boostpost_date, data.ex_list_premium_date , data.ex_list_rent_till_date   , data.ex_list_proppit_date , data.ex_list_propertyhub_date
               

                   FROM dbo_data_excel_listing AS data   
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
 
        // output data of each row
         while($rs_listing=$result->fetch_assoc()) {
         
         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         //$ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_listing_name=$rs_listing['ex_list_listing_name_en'];

         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_type_first=$rs_listing['ex_list_listing_type_first'];
         //$ex_list_alley=$rs_listing['ex_list_alley'];
         /*$ex_list_road=$rs_listing['ex_list_road'];
         $ex_list_subdistrict=$rs_listing['ex_list_subdistrict'];
         $ex_list_district=$rs_listing['ex_list_district'];
         $ex_list_province=$rs_listing['ex_list_province'];*/
         $ex_list_train_station=$rs_listing['ex_list_train_station'];
         //$ex_list_googlmap=$rs_listing['ex_list_googlmap'];
         //$ex_list_number_buildings=$rs_listing['ex_list_number_buildings'];
         $ex_list_floor=$rs_listing['ex_list_floor'];
        // $ex_list_view=$rs_listing['ex_list_view'];
         $ex_list_total_floors=$rs_listing['ex_list_total_floors'];
         $ex_list_rai=$rs_listing['ex_list_rai'];
         $ex_list_ngan=$rs_listing['ex_list_ngan'];
         $ex_list_wa=$rs_listing['ex_list_wa']; 
         $ex_list_house_number=$rs_listing['ex_list_house_number'];
         $ex_list_sqm=$rs_listing['ex_list_sqm'];
        // $ex_list_view=$rs_listing['ex_list_view'];
         $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
         $ex_list_bathroom=$rs_listing['ex_list_bathroom'];
         //$ex_list_other_room=$rs_listing['ex_list_other_room'];
         //$ex_list_parking=$rs_listing['ex_list_parking'];
         //$ex_list_pets=$rs_listing['ex_list_pets'];
         //$ex_list_direction=$rs_listing['ex_list_direction'];
         //$ex_list_strengths=$rs_listing['ex_list_strengths'];
         //$ex_list_gdrive_th=$rs_listing['ex_list_gdrive_th'];
         /*$ex_list_gdrive_en=$rs_listing['ex_list_gdrive_en'];
         $ex_list_facilities=$rs_listing['ex_list_facilities'];
         $ex_list_nearby_places=$rs_listing['ex_list_nearby_places'];
         $ex_list_details=$rs_listing['ex_list_details'];
         $ex_list_heading=$rs_listing['ex_list_heading'];*/
         $ex_list_price=$rs_listing['ex_list_price'];
         $ex_list_price_check=$rs_listing['ex_list_price'];
         //$ex_list_common_fee=$rs_listing['ex_list_common_fee'];
         $ex_list_contact=$rs_listing['ex_list_contact'];
         $ex_list_contact_check=$rs_listing['ex_list_contact'];
         $ex_list_contact_name=$rs_listing['ex_list_contact_name'];
         $ex_list_contact_tel=$rs_listing['ex_list_contact_tel'];
         $ex_list_contact_tel1_2=$rs_listing['ex_list_contact_tel1_2'];
         $ex_list_contact_tel1_3=$rs_listing['ex_list_contact_tel1_3'];
         $ex_list_contact_tel1_4=$rs_listing['ex_list_contact_tel1_4'];
         $ex_list_contact_email=$rs_listing['ex_list_contact_email'];
         $ex_list_contact_lineid=$rs_listing['ex_list_contact_lineid'];
         $ex_list_contact_name_2=$rs_listing['ex_list_contact_name_2'];
         $ex_list_contact_tel_2=$rs_listing['ex_list_contact_tel_2'];
         $ex_list_contact_tel2_2=$rs_listing['ex_list_contact_tel2_2'];
         $ex_list_contact_tel2_3=$rs_listing['ex_list_contact_tel2_3'];
         $ex_list_contact_tel2_4=$rs_listing['ex_list_contact_tel2_4'];
         $ex_list_contact_email_2=$rs_listing['ex_list_contact_email_2'];
         $ex_list_contact_lineid_2=$rs_listing['ex_list_contact_lineid_2'];
         /*$ex_list_located=$rs_listing['ex_list_located'];
         $ex_list_location_en=$rs_listing['ex_list_location_en'];*/
         $ex_list_zone=$rs_listing['ex_list_zone'];
         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_listing_status_check=$rs_listing['ex_list_listing_status'];
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];
         $project_id=$rs_listing['project_id'];
         $ex_list_date_update=$rs_listing['ex_list_date_update'];
         $ex_list_public=$rs_listing['ex_list_public'];
         $ex_list_premium=$rs_listing['ex_list_premium'];
         $ex_list_boostpost=$rs_listing['ex_list_boostpost'];
         $ex_list_proppit=$rs_listing['ex_list_proppit'];
         $ex_list_propertyhub=$rs_listing['ex_list_propertyhub'];
         $ex_list_propertyhub_boost=$rs_listing['ex_list_propertyhub_boost'];

         $ex_list_owner_tel=$rs_listing['ex_list_owner_tel'];
         $ex_list_checkpost=$rs_listing['ex_list_checkpost'];
         $ex_list_living=$rs_listing['ex_list_living'];
         $ex_list_close=$rs_listing['ex_list_close'];
         $ex_list_double_cx=$rs_listing['ex_list_double_cx'];
         $ex_list_double_no=$rs_listing['ex_list_double_no'];
         $ex_list_bargain_date=$rs_listing['ex_list_bargain_date'];
         $ex_list_pm_status=$rs_listing['ex_list_pm_status'];

         $ex_list_img_score=$rs_listing['ex_list_img_score'];
         $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];

         $ex_list_bargain=$rs_listing['ex_list_bargain'];
         $ex_list_pm_waiting=$rs_listing['ex_list_pm_waiting'];
         $ex_list_price_old=$rs_listing['ex_list_price_old'];
         $ex_list_price_changes=$rs_listing['ex_list_price_changes'];
         $ex_list_img_number=$rs_listing['ex_list_img_number'];
         $ex_list_proppit_date=$rs_listing['ex_list_proppit_date'];
         $ex_list_boostpost_date=$rs_listing['ex_list_boostpost_date'];
         $ex_list_propertyhub_date=$rs_listing['ex_list_propertyhub_date'];

         $ex_list_price_old=number_format($ex_list_price_old);
         $ex_list_price_changes=number_format($ex_list_price_changes);
 
         if($ex_list_listing_type=='1' or $ex_list_listing_type=='13'){ 

               $type_listing_check_s='1'; 

         }else if($ex_list_listing_type=='2' or $ex_list_listing_type=='3' or $ex_list_listing_type=='4' or $ex_list_listing_type=='5' or $ex_list_listing_type=='6'){

               $type_listing_check_s='2';  

         } 

 

         
         if($ex_list_img_score=='1'){ 
                $ex_list_img_score_name='(แย่)';   $stauts_img_color="#ff0000";
         }else if($ex_list_img_score=='2'){
                $ex_list_img_score_name='(ปานกลาง)';  $stauts_img_color="#ffa200";
         }else if($ex_list_img_score=='3'){
                $ex_list_img_score_name='(ดี)';  $stauts_img_color="#42d700";
         }else if($ex_list_img_score=='4'){
                $ex_list_img_score_name='(ดีมาก)';  $stauts_img_color="#42d700";
         }else{
                $ex_list_img_score_name='ไม่ระบุ';   $stauts_img_color="#000";
         }


 if($p=='public'){
         $ex_list_date_update=$rs_listing['ex_list_public_date'];
 }


 if($p=='delete'){
         $ex_list_date_update=$rs_listing['ex_list_close_date'];
 }
 
 if($p=='pm_listing'){
         $ex_list_date_update=$ex_list_bargain_date;

 }

    
  $year=substr($ex_list_date_update,0 , 4 );
  $month=substr($ex_list_date_update,5 , 2 );
  $day=substr($ex_list_date_update,8 , 2 );

  $time=substr($ex_list_date_update,11 , 5 );
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

   $ex_list_date_update=$day." ".$month." ".$year." ".$time;


 $expire_check="";
         
    if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4'   or $_SESSION['STATUS_ID']=='5'
      or $_SESSION['STATUS_ID']==$ex_list_contact ){  $ex_list_contact_name_s=''; 

         if($ex_list_contact_name!='' or $ex_list_contact_tel!='' or $ex_list_contact_lineid!='' or $ex_list_contact_email!=''){ $ex_list_contact_name_s="Owner 1 : ".$ex_list_contact_name." Tel : ".$ex_list_contact_tel.",".$ex_list_contact_tel1_2.",".$ex_list_contact_tel1_3.",".$ex_list_contact_tel1_4." Line : ".$ex_list_contact_lineid." E-Mail : ".$ex_list_contact_email." | Owner 2 : ".$ex_list_contact_name_2." Tel : ".$ex_list_contact_tel_2.",".$ex_list_contact_tel2_2.",".$ex_list_contact_tel2_3.",".$ex_list_contact_tel2_4." Line : ".$ex_list_contact_lineid_2." E-Mail : ".$ex_list_contact_email_2; }
     }else{ $ex_list_contact_name_s="-"; }
         
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
         else if($ex_list_listing_status=='15'){ $ex_list_listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
            
          if($ex_list_price!=''){ $ex_list_price=number_format($ex_list_price);}else{$ex_list_price="ยังไม่ระบุ";}


          if($ex_list_deal_type=='1'){ $ex_list_deal_type="ขาย";}else{$ex_list_deal_type="เช่า";}

          if($ex_list_listing_type_check=='1' or $ex_list_listing_type_check=='13'){
                  $ex_list_sqm=$ex_list_sqm." ตร.ม.";
          }else{
                if($ex_list_rai!='0' or $ex_list_ngan!='0' or $ex_list_wa!='0'){  
                    if($ex_list_sqm=='0' or $ex_list_sqm==''){
                         $ex_list_sqm=$ex_list_rai."-".$ex_list_ngan."-".$ex_list_wa;
                    }else{
                         $ex_list_sqm=$ex_list_rai."-".$ex_list_ngan."-".$ex_list_wa." / ".$ex_list_sqm." ตร.ม."; 
                    }
                }else{
                    if($ex_list_sqm!='' or $ex_list_sqm=='0'){
                         $ex_list_sqm=$ex_list_sqm." ตร.ม.";
                    } 
                }
          }
        
          if($ex_list_bedroom>0){$ex_list_bedroom=$ex_list_bedroom."นอน";}else{ $ex_list_bedroom=$ex_list_bedroom; }
          if($ex_list_bathroom>0){$ex_list_bathroom=$ex_list_bathroom."น้ำ";}else{ $ex_list_bathroom=$ex_list_bathroom; }

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


             $ex_list_project=$project_name_en;
             

               if($zone_id!='') {
                    $ex_list_zone=$zone_id;
               } 

               if($zone_id=='0'){  $ex_list_zone="ไม่ระบุโซน"; }

           
               if($ex_list_listing_type=='0'){ 
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

     


          if($ex_list_zone!=''){
        
      /////////// type_zone ////////////////
             $sql_zone="SELECT zone_name FROM type_zone where zone_id='$ex_list_zone' ";  
             $result_zone= $conn->query($sql_zone);
             $rs_zone=$result_zone->fetch_assoc();

             $zone_name=$rs_zone['zone_name'];
             if($zone_name!=''){ $ex_list_zone=$zone_name;   }
            
      ////////// End type_zone ////////////////


          }
 

      /////////// type_asset ////////////////
             $sql_ass="SELECT id , name FROM type_asset where id='$ex_list_listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $ex_list_listing_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////

          if($ex_list_train_station!=''  ){    
             $sql_train="SELECT station_train ,station_name_en  FROM type_train_station where station_id='$ex_list_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

          }

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
            /* if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}*/
            if($station_name!=''){ $ex_list_train_station=$rs_train['station_train'];} else{  $ex_list_train_station='';}


      /////////// End type_train_station ////////////////
              

            if($ex_list_floor=='' and $ex_list_listing_type_check!='1' and $ex_list_listing_type_check!='13' ){   
                if($ex_list_listing_type_check!='1' and $ex_list_total_floors!='' and  $ex_list_total_floors!='0' and $ex_list_listing_type_check!='13'){

                        $ex_list_floor=$ex_list_total_floors;  
                }
             
                if($ex_list_listing_type_check!='1' and $ex_list_total_floors=='' or  $ex_list_listing_type_check!='1' and $ex_list_total_floors=='0' and $ex_list_listing_type_check!='13'){ 
                         $ex_list_floor=$project_total_floors;  
                 } 
            }
           


            if($ex_list_contact!=''){ 

                   //////////////    ////////////////////////////
                 $sql_register="SELECT register_name ,register_email , register_nickname FROM dbo_register where register_id='$ex_list_contact' ";  
                 $result_register= $conn->query($sql_register);
                 $rs_register=$result_register->fetch_assoc(); 

                 $name_r=$rs_register['register_name'];
                 $last_r=$rs_register['register_lastname'];
                 $nickname_r=$rs_register['register_nickname'];

                 $ex_list_contact=$name_r." ($nickname_r)";

             }


      /////////// ผู้ติดต่อ  ////////////////
 if($p=='pm_listing'){
         



        if($ex_list_pm_waiting!=''){

             $ex_list_pm_waiting_name="";

             $sql_register_1="SELECT register_name , register_lastname , register_nickname FROM dbo_register where register_id='$ex_list_pm_waiting' ";  
             $result_register_1= $conn->query($sql_register_1);
             $rs_register_1=$result_register_1->fetch_assoc(); 

             $name_r=$rs_register_1['register_name'];
             $last_r=$rs_register_1['register_lastname'];
             $nickname_r=$rs_register_1['register_nickname'];

             $ex_list_pm_waiting_name=$name_r." ($nickname_r)";

        }


        if($ex_list_bargain!=''){ 

               //////////////    ////////////////////////////
             $sql_register="SELECT register_name , register_lastname , register_nickname FROM dbo_register where register_id='$ex_list_bargain' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $name_r=$rs_register['register_name'];
             $last_r=$rs_register['register_lastname'];
             $nickname_r=$rs_register['register_nickname'];

             $ex_list_bargain_name=$name_r." ($nickname_r)";

        }else{
            $ex_list_bargain_name=$ex_list_pm_waiting_name;
        }


 }
      /////////// ผู้ติดต่อ  ////////////////

      /////////// ทำการลบ Listing  ////////////////

if($p=='delete'){
             $check_del_note="ทำการลบ Listing :";


             $sql_record="SELECT record_id , record_user_id,record_remark FROM dbo_record 
                         WHERE  record_note LIKE '%$check_del_note%' and ex_list_id='$ex_list_listing_code' order by record_id DESC LIMIT 1 ";  
             $result_record= $conn->query($sql_record);  

             $num_record=$result_record->num_rows > 0;
             $rs_record=$result_record->fetch_assoc(); 
 
 
                   if($rs_record['record_id']!=''){



                   $record_user_id=$rs_record['record_user_id'];
                   $record_remark=$rs_record['record_remark'];
                              
                          //////////////    ////////////////////////////
                             $sql_register1="SELECT register_name , register_lastname , register_nickname FROM dbo_register where register_id='$record_user_id' ";  
                             $result_register1= $conn->query($sql_register1);
                             $rs_register1=$result_register1->fetch_assoc(); 

                             $name_r=$rs_register1['register_name'];
                             $last_r=$rs_register1['register_lastname'];
                             $nickname_r=$rs_register1['register_nickname'];

                             $ex_list_contact_userdel=$name_r." ($nickname_r)";
                   }

   }

      /////////// END ทำการลบ Listing  ////////////////
 
           

     ?> 

   <?php if($p=='double'){    $no++;  ?>



                  <div class="modal fade" id="modal-danger<?php echo $ex_list_listing_code.$no;?>">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">

                          <form method="post" id="form" enctype="multipart/form-data" action="include/process.php" class=" form-inline"> 

                        <div class="modal-header">
                          <h4 class="modal-title">คุณมั่นใจจะลบ listing : <?php echo $ex_list_listing_code;?> นี้หรือไม่ โปรดระบุเหตุผลในการลบ</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">                           

                          <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                          
                          <input type="text" class="form-control" style="width: 100%;" name="p"  value="<?php echo $p;?>" hidden="hidden" >
                                  
                          <input type="text" class="form-control" name="page_del"  value="ex_list_close" hidden="hidden">

                          <input type="text" class="form-control" id="id" name="id" placeholder="" value="<?php echo $ex_list_listing_code;?>"  hidden="hidden">

                          <textarea class="form-control" id="note_del" name="note_del" rows="4" cols="50" style="width: 100%;" required minlength="5" ></textarea>
             
                        </div>
                        <div class="modal-footer justify-content-between">
                          
                          <button type="submit" class="btn btn-outline-light">ต้องการลบ</button>
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">ยกเลิกการลบ</button>
                        </div>

                      </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <div class="modal fade" id="modal-danger<?php echo $ex_list_double_cx.$no;?>">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">

                          <form method="post" id="form" enctype="multipart/form-data" action="include/process.php" class=" form-inline"> 

                        <div class="modal-header">
                          <h4 class="modal-title">คุณมั่นใจจะลบ listing : <?php echo $ex_list_double_cx;?> นี้หรือไม่ โปรดระบุเหตุผลในการลบ</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">                           

                          <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                          
                          <input type="text" class="form-control" style="width: 100%;" name="p"  value="<?php echo $p;?>" hidden="hidden" >
                                  
                          <input type="text" class="form-control" name="page_del"  value="ex_list_close" hidden="hidden">

                          <input type="text" class="form-control" id="id" name="id" placeholder="" value="<?php echo $ex_list_double_cx;?>"  hidden="hidden">

                          <textarea class="form-control" id="note_del" name="note_del" rows="4" cols="50" style="width: 100%;" required minlength="5" ></textarea>
             
                        </div>
                        <div class="modal-footer justify-content-between">
                          
                          <button type="submit" class="btn btn-outline-light">ต้องการลบ</button>
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">ยกเลิกการลบ</button>
                        </div>

                      </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->


   <?php } ?>


                  <tr style="font-size: 10px; " style="width: 100%;"  >

           <?php if($p=='boost_post' or $p=='premium' or $p=='proppit'  or $p=='proppit_feed' or $p=='propertyhub' or $p=='propertyhub_boost'){     $no++; ?>
                   <td><?php echo $no;?></td>
           <?php } ?>
                    <td    >


                  <center style="width: 120px; " >

                    <a target="_blank" href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_listing_code;?>" title="<?php echo "UPDATEข้อมูล : ".$ex_list_date_update." | ผู้เพิ่มข้อมูล : ".$ex_list_contact;?>"  >
                      <?php echo $ex_list_listing_code;?> </a>  

                <?php if($ex_list_pm_status=='2'){ ?>
                        &nbsp; <span class="badge badge-danger"><?php echo "PM";?></span> 
                <?php } ?>

                <?php if($ex_list_listing_type_first=='1'){ ?>
                        &nbsp; <span class="badge badge-success"><?php echo "มือ1";?></span> 
                <?php } ?>

                <?php if($p=='double'){ ?>
                           <br> <a href="?page=create_listing&status=edit&id=<?php echo $ex_list_listing_code;?>"  ><img src="img/icon/png/pencil-2x.png" width="15"  ></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="#"   data-toggle="modal" data-target="#modal-danger<?php echo $ex_list_listing_code.$no;?>" data-toggle="modal" data-target="#modal-danger<?php echo $ex_list_listing_code;?>" ><img src="img/icon/png/trash-2x.png" width="15"></a>


                <?php } ?>


                <?php if($ex_list_boostpost=='1' and $p=='proppit_feed'){ ?> 
                           <i class="fa fa-trophy" style="font-size:20px;color:#daa520;"></i>  
                <?php } ?>                                        
                                              
                  </center>
                  
                    </td>
           <?php if($p=='double'){   if($ex_list_double_no=='1'){ $ex_list_double_no='ซ้ำ';} else{ $ex_list_double_no='อาจซ้ำ'; }   ?>
                    <td><center style="width: 70px; " ><a target="_blank" href="?page=upload_file_excel_check_view&listing=<?php echo $ex_list_double_cx;?>"  ><?php echo $ex_list_double_cx;?></a>

                           <br> <a href="?page=create_listing&status=edit&id=<?php echo $ex_list_double_cx;?>"  ><img src="img/icon/png/pencil-2x.png" width="15"  ></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="#"   data-toggle="modal" data-target="#modal-danger<?php echo $ex_list_double_cx.$no;?>" data-toggle="modal" data-target="#modal-danger<?php echo $ex_list_double_cx;?>" ><img src="img/icon/png/trash-2x.png" width="15"></a>

                    </center></td>  
                    <td><center style="width: 70px; " ><?php echo $ex_list_double_no;?></center></td>  
                    <td><center style="width: 70px; " ><a  onclick="window.open('page/double_view.php?id=<?php echo $ex_list_listing_code;?>&double=<?php echo $ex_list_double_cx;?>', '_blank', 'location=yes,height=500,width=1500,scrollbars=yes,status=yes');" style="cursor:pointer;" ><i class="fa fa-sticky-note" aria-hidden="true"></i></a></center></td>  

                    <td>
              <?php if( $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?>    
                      <center style="width: 70px; " > 
                       
                          <center  ><a href="include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=double"><i class="fa fa-reply" aria-hidden="true"></i></a> </center>
                            <!--
                           <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch3<?php echo $ex_list_listing_code;?>" name="ex_list_double_status" value="0"  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=double', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"  >
                            <label class="custom-control-label" for="customSwitch3<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" > </label>

                          -->
                         
                        

              <?php } ?>

                   </td>  

           <?php } ?>



          <?php if($p!='double'){?>

                    <td>
                    <center style="width: 70px; margin-top: 2px; " >
                      <!--<a onclick="window.open('page/listing_save_portfolio.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" style="cursor:pointer;" >

                           <img src="img/icon/icon-save.png" title="บันทึก Listing" width="20"></a>-->

      
<?php if($ex_list_close=='0'){  //listing ยังไม่ถูกลบ  ?>



      <?php 
           if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5' ){  
  
      ?>                   



                  <div class="modal fade" id="modal-danger<?php echo $ex_list_listing_code;?>">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">

                          <form method="post" id="form" enctype="multipart/form-data" action="include/process.php" class=" form-inline"> 

                        <div class="modal-header">
                          <h4 class="modal-title">คุณมั่นใจจะลบ listing : <?php echo $ex_list_listing_code;?> นี้หรือไม่ โปรดระบุเหตุผลในการลบ</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">                           

                          <input type="text" class="form-control" name="user_id"  value="<?php echo $USER_ID;?>" hidden="hidden" >
                          
                          <input type="text" class="form-control" style="width: 100%;" name="p"  value="<?php echo $p;?>" hidden="hidden" >
                                  
                          <input type="text" class="form-control" name="page_del"  value="ex_list_close" hidden="hidden">

                          <input type="text" class="form-control" id="id" name="id" placeholder="" value="<?php echo $ex_list_listing_code;?>"  hidden="hidden">

                          <textarea class="form-control" id="note_del" name="note_del" rows="4" cols="50" style="width: 100%;" required minlength="5" ></textarea>
             
                        </div>
                        <div class="modal-footer justify-content-between">
                          
                          <button type="submit" class="btn btn-outline-light">ต้องการลบ</button>
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">ยกเลิกการลบ</button>
                        </div>

                      </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

 
                  

                      <a href="?page=create_listing&status=edit&id=<?php echo $ex_list_listing_code;?>"  ><i class="fa fa-pencil" style="font-size:20px;color: black;"></i></a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         

            <?php if($_SESSION['STATUS_ID']!='1'){ ?>
                      <a href="#"   data-toggle="modal" data-target="#modal-danger<?php echo $ex_list_listing_code;?>" data-toggle="modal" data-target="#modal-danger<?php echo $ex_list_listing_code;?>" ><i class="fa fa-trash" style="font-size:20px; color: black;" ></i>

            <?php } ?> 
             

         <?php }  
               

            if($_SESSION['USER_ID']==$ex_list_contact_check and $_SESSION['STATUS_ID']=='1'  ){ ?>
                   

                          <a href="?page=create_listing&status=edit&id=<?php echo $ex_list_listing_code;?>"   ><i class="fa fa-pencil" style="font-size:20px"></i></a>

       <?php }else if($type_listing_check_s=='1' and $_SESSION['POSITION']=='1'){ ?>

                          <a href="?page=create_listing&status=edit&id=<?php echo $ex_list_listing_code;?>"   ><i class="fa fa-pencil" style="font-size:20px"></i></a>


       <?php }else if($type_listing_check_s=='2' and $_SESSION['POSITION']=='2'){ ?>

                          <a href="?page=create_listing&status=edit&id=<?php echo $ex_list_listing_code;?>"   ><i class="fa fa-pencil" style="font-size:20px"></i></a>

       <?php } ?>


<?php }else{  //listing ถูกลบแล้ว ?> 


                      <a href="include/process.php?page=create_listing_restore&status=del&id=<?php echo $ex_list_listing_code;?>"><img src="img/icon/restore.png" width="15" title="ยกเลิกการลบ listing นี้"  ></a>&nbsp;&nbsp;&nbsp;
                         </a>


 <?php } ?>

  <!--
                 
                       <a href="#"><img src="img/icon/png/pencil-2x.png" width="15"  ></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#"><img src="img/icon/png/trash-2x.png" width="15" onclick="return confirm('คุณแน่ใจที่จะลบ Listing : <?php echo $ex_list_listing_code;?>');"   ></a> -->
     
                         </center>
                    </td>

 <?php } ?>


  <?php if($p=='delete'){  //listing ถูกลบแล้ว    ?> 

                    <td>
                         <center style="width: 100px; margin-top: 2px; " >
                          <?php echo $ex_list_contact_userdel;?>
                         </center>
                    </td>
                    <td>
                         <center style="width: 150px; margin-top: 2px; " >
                          <?php if($record_remark!=''){ echo $record_remark; }else{ echo "ลบอัตโนมัต (ซ้ำ"."<a target='_blank' href='?page=upload_file_excel_check_view&listing=$ex_list_double_cx'  >".$ex_list_double_cx."</a>)";} ?>
                         </center>
                    </td>

  <?php }    // END listing ถูกลบแล้ว ?> 


  <?php if($p=='draft' and $_SESSION['STATUS_DRAFT']=='1' or $p=='public' and $_SESSION['STATUS_DRAFT']=='1'  or $p=='boost_post' and $_SESSION['STATUS_BOOSTPOST']=='1'
            or $p=='premium' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='proppit'){ ?> 
                    <td>
                        <div class="custom-control custom-switch">
                          <center  >
                           <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch1<?php echo $ex_list_listing_code;?>" name="ex_list_owner_tel" value="1" <?php if($ex_list_public=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=public', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"  >
                            <label class="custom-control-label" for="customSwitch1<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" > </label>
                          </center>
                        </div>
                   </td>

                    <td>
                        <div class="custom-control custom-switch">
                          <center  >
                           <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch2<?php echo $ex_list_listing_code;?>" name="ex_list_checkpost" value="1" <?php if($ex_list_checkpost=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=checkpost', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"  >
                            <label class="custom-control-label" for="customSwitch2<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" > </label>
                          </center>
                        </div>
                   </td>
   <?php } ?> 
      
  <?php if($p=='draft' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='public' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='boost_post' and $_SESSION['STATUS_PREMIUM']=='1' 
            or $p=='premium' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='proppit'){ ?> 
                    <td>
                        <div class="custom-control custom-switch">
                          <center  >
                           <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch3<?php echo $ex_list_listing_code;?>" name="ex_list_owner_tel" value="1" <?php if($ex_list_premium=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=premium', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"  >
                            <label class="custom-control-label" for="customSwitch3<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" > </label>
                          </center>
                        </div>
                   </td>
   <?php } ?>


     <?php if($p=='draft' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='public' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='boost_post' and $_SESSION['STATUS_BOOSTPOST']=='1' 
              or $p=='premium' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='proppit'){ ?> 

                    <td>
                        <div class="custom-control custom-switch">
                          <center  >
                           <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch5<?php echo $ex_list_listing_code;?>" name="ex_list_owner_tel" value="1" <?php if($ex_list_proppit=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=proppit', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"  >
                            <label class="custom-control-label" for="customSwitch5<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" > </label>
                          </center>
                        </div>
                   </td>    
                    <td>
                        <div class="custom-control custom-switch">
                          <center  >
                           <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch4<?php echo $ex_list_listing_code;?>" name="ex_list_owner_tel" value="1" <?php if($ex_list_boostpost=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=boostpost', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"  >
                            <label class="custom-control-label" for="customSwitch4<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" > </label>
                          </center>
                        </div>
                   </td>
                    <td>
                        <div class="custom-control custom-switch">
                          <center  >
                           <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch6<?php echo $ex_list_listing_code;?>" name="ex_list_owner_tel" value="1" <?php if($ex_list_living=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=living', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"  >
                            <label class="custom-control-label" for="customSwitch6<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" > </label>
                          </center>
                        </div>
                   </td>
   <?php } ?>            

 


     <?php if($p=='draft' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='public' and $_SESSION['STATUS_BOOSTPOST']=='1' or $p=='boost_post' and $_SESSION['STATUS_BOOSTPOST']=='1' 
              or $p=='premium' and $_SESSION['STATUS_PREMIUM']=='1' or $p=='propertyhub'){ ?> 

                    <td>
                        <div class="custom-control custom-switch">
                          <center  >
                           <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch7<?php echo $ex_list_listing_code;?>" name="ex_list_owner_tel" value="1" <?php if($ex_list_propertyhub=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=propertyhub', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"  >
                            <label class="custom-control-label" for="customSwitch7<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" > </label>
                          </center>
                        </div>
                   </td>   

               
                    <td>
                        <div class="custom-control custom-switch">
                          <center  >
                           <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch8<?php echo $ex_list_listing_code;?>" name="ex_list_owner_tel" value="1" <?php if($ex_list_propertyhub_boost=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=propertyhub_boost', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"  >
                            <label class="custom-control-label" for="customSwitch8<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" > </label>
                          </center>
                        </div>
                   </td>
                       <!-- 
                    <td>
                        <div class="custom-control custom-switch">
                          <center  >
                           <input style="cursor:pointer;"  type="checkbox" class="custom-control-input" id="customSwitch6<?php echo $ex_list_listing_code;?>" name="ex_list_owner_tel" value="1" <?php if($ex_list_living=='1'){ ?>checked="checked"<?php } ?>  onclick="window.open('include/process_status_public.php?id=<?php echo $ex_list_listing_code;?>&status=living', '_blank', 'location=yes,height=10,width=10,scrollbars=yes,status=yes');"  >
                            <label class="custom-control-label" for="customSwitch6<?php echo $ex_list_listing_code;?>" style="cursor:pointer;" > </label>
                          </center>
                        </div>
                   </td>-->
   <?php } ?>   

                    <td  > 
                       <?php if($ex_list_img_number!='0'){ ?>
                                  
                                  <i class="fa fa-check-circle" style="font-size:20px;color: green;"></i>

                       <?php }else{ ?>
                                   <i class="fa fa-times-circle" style="font-size:20px;color: red;"></i>
                       <?php } ?>
 
                    </td>  
                    <td  ><center style="width: 50px; font-size: 11px; color: <?php echo $stauts_img_color;?>"> <?php echo $ex_list_img_score_name;?></center>
                    </td>
                    <td ><center style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   >

 
                      <?php echo $ex_list_listing_status.$expire_check;  ?>
                       <?php if($ex_list_listing_status_check=='3' or $ex_list_listing_status_check=='15'){ ?> <br><?php echo $ex_list_rent_till; } ?>
                      </a>
                      
                    </center></td>
                         
                    <td><center style="width: 80px;"><?php echo $ex_list_listing_type;?></center></td>
                    <td><center style="width: 50px;"><?php echo $ex_list_deal_type;?></center></td>
                    <td > <center style="width: 200px; " ><a title="<?php echo $ex_list_contact_name_s;?>" style="cursor:pointer;"  ><?php echo "".$ex_list_project;?></a></center> 

                    </td>  
                   
                    <!--<td > <center style="width: 200px; " class="grab" ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_heading;?></a></center> 

                    </td>  -->
                    <td><center style="width: 50px; " ><?php echo $ex_list_house_number;?></center></td>
                    <td><center style="width: 50px; "><?php echo $ex_list_floor;?></center></td>
                    <td><center style="width: 100px; " ><?php echo $ex_list_bedroom." | ".$ex_list_bathroom;?></center></td>
                    <td><center style="width: 100px; " >
                          
                           <?php echo $ex_list_sqm;?>
                             

                        </center></td>     
                    <td><center style="width: 80px; " ><a  onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" style="cursor:pointer;"  >
                      <?php echo $ex_list_price;?></a></center></td>   
          <?php if($p=='pm_listing'){?>
                    <td><center style="width: 80px; " ><?php echo $ex_list_price_old;?></center></td>  
                    <td><center style="width: 80px; " ><?php if($ex_list_pm_status=='1'){ echo $ex_list_pm_waiting_name; }else if($ex_list_pm_status=='2'){ echo $ex_list_bargain_name;  }else{   echo $ex_list_pm_waiting_name;  } ?></center></td> 
          <?php } ?>
          <?php if($p=='pm_listing'){?>
                    <td><center style="width: 60px; ">

                       <?php

                                    $sql_pm="SELECT * FROM dbo_listing_pm where ex_list_listing_code='$ex_list_listing_code'  order by ex_list_bargain_date DESC LIMIT 1 ";  
                                    $result_pm=$conn->query($sql_pm);   
                                    $rs_pm=$result_pm->fetch_assoc(); 

                                    $pm_count=$result_pm->num_rows > 0;

                                    $ex_list_pm_remark=$rs_pm['ex_list_pm_remark']; 
                                    $listing_pm_id=$rs_pm['listing_pm_id'];  
                                    $ex_list_manage_remark=$rs_pm['ex_list_manage_remark']; 
                                    $ex_list_price_remark=$rs_pm['ex_list_price']; 

                                    ?>




                                  <div class="modal fade" id="modal-default-<?php echo $ex_list_listing_code;?>">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">อนุมัติให้ <?php echo $ex_list_listing_code;?> เป็น PM Listing หรือไม่</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body"  style="font-size: 14px;text-align: left;" >
                                          <b>เหตุผลที่ต้องอนุมัติ Listing นี้เป็น PM Listing</b><br><br>
                                           <b>Note : </b> <?php echo $ex_list_pm_remark;?> 
                                             
                                                  <form method="post" id="form" enctype="multipart/form-data" action="include/process.php" > 

                                                         <input type="text" class="form-control" name="page"  value="pm_listing" hidden="hidden">
                                                         <input type="text" class="form-control" name="ex_list_listing_code"  value="<?php echo $ex_list_listing_code;?>" hidden="hidden">
                                                         <input type="text" class="form-control" name="ex_list_pm_waiting"  value="<?php echo $ex_list_pm_waiting;?>" hidden="hidden">
                                                         <input type="text" class="form-control" name="ex_list_bargain"  value="<?php echo $ex_list_bargain;?>" hidden="hidden">
                                                         <input type="text" class="form-control" name="ex_list_bargain_date"  value="<?php echo $ex_list_bargain_date;?>" hidden="hidden">
                                                         <input type="text" class="form-control" name="ex_list_price"  value="<?php echo $ex_list_price_check;?>" hidden="hidden">

                                                         <?php if($pm_count>0){ ?>
                                                                  <input type="text" class="form-control" name="edit"  value="edit" hidden="hidden">
                                                                  <input type="text" class="form-control" name="listing_pm_id"  value="<?php echo $listing_pm_id ;?>" hidden="hidden">
                                                         <?php }   ?>
                                                         <div class="row"> 


                                           <?php  if($ex_list_pm_status=='1'){  ?>

                                                 <?php if($_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?>

                                                            <div class="col-md-12"> 
                                                                <div class="form-group row">
                                                                  <label for="inputEmail3" class="col-sm-4 col-form-label"> เลือกสถานะการอนุมัติ </label>
                                                                  <div class="col-sm-8"> 
                                                                  <select class="form-control select2bs4"  name="ex_list_pm_status" id="ex_list_pm_status" style="width: 100%;" required> 
                                                                    <option value="1" <?php if($ex_list_pm_status=='1'){ ?>  selected <?php } ?> >รออนุมัติ</option> 
                                                                    <option value="2" <?php if($ex_list_pm_status=='2'){ ?>  selected <?php } ?> >อนุมัติ</option> 
                                                                    <option value="3" <?php if($ex_list_pm_status=='3'){ ?>  selected <?php } ?> >ไม่อนุมัติ</option> 
                                                                  </select>

                                                                  </div>
                                                                </div> 
                                                            </div>



                                                            <div class="col-md-12"> 
                                                                <div class="form-group row">
                                                                  <label for="inputEmail3" class="col-sm-4 col-form-label"> เหตุผล </label>
                                                                  <div class="col-sm-8"> 
                                                                        <textarea class="form-control" rows="5" placeholder="Enter ..." id="ex_list_manage_remark"  name="ex_list_manage_remark"  ></textarea>

                                                                  </div>
                                                                </div> 
                                                            </div>

                                                            
                                                            <div class="col-md-12"> 
                                                                 <center>
                                                                      <input type="submit"  class="btn btn-primary" value="Yes" >  
                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                 </center>
                                                            </div> 

                                                    <?php } ?>

                                             <?php }else{ ?>

                                                            <div class="col-md-12"> 
                                                                <div class="form-group row">
                                                                  <div class="col-sm-12"> 
                                                                    <hr>
                                                                     <b>สถานะการอนุมัติ : </b> &nbsp;
                                                                    <?php if($ex_list_pm_status=='1'){ ?>  
                                                                              <b class="badge badge-warning"> <?php echo "รออนุมัติ";?></b> 
                                                                     <?php }else if($ex_list_pm_status=='2'){ ?>
                                                                              <b class="badge badge-success" > <?php echo "อนุมัติ";?></b>  
                                                                     <?php }else{  ?> 
                                                                              <b class="badge badge-danger" > <?php echo "ไม่อนุมัติ";?></b> 
                                                                     <?php } ?> 
                                                                  </div>
                                                                </div> 
                                                            </div>

                                                            <div class="col-md-12"> 
                                                                <div class="form-group row">
                                                                  <div class="col-sm-12"> 
                                                                     <b>เหตุผล : </b> &nbsp;
                                                                      <?php echo " ".$ex_list_manage_remark; ?> 
                                                                  </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-12"> 
                                                                <div class="form-group row">
                                                                  <div class="col-sm-12"> 
                                                                     <b>แนบราคา : </b> &nbsp;
                                                                      <?php echo number_format($ex_list_price_remark); ?> 
                                                                  </div>
                                                                </div> 
                                                            </div>

                                                             
                                             <?php } ?>
                                                          </div>

                                                  </form>
                     

                                        </div>
                                        <div class="modal-footer justify-content-between">                                          
                                          
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                  <!-- /.modal -->

                      <?php  if($ex_list_pm_status=='1'){  ?> 
                              <button type="button" class="badge badge-warning" data-toggle="modal" data-target="#modal-default-<?php echo $ex_list_listing_code;?>"> <?php echo "รออนุมัติ";?></button> 
                      <?php  }else if($ex_list_pm_status=='2'){?>
                               <button type="button" class="badge badge-success" data-toggle="modal" data-target="#modal-default-<?php echo $ex_list_listing_code;?>"> <?php echo "อนุมัติ";?></button> 
                       <?php }else{?>
                                <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#modal-default-<?php echo $ex_list_listing_code;?>"><?php echo "ไม่อนุมัติ";?></button> 
                       <?php }?></a>

                    </center></td> 
          <?php } ?>  
                    <td><center style="width: 80px; " ><a title="<?php echo $ex_list_contact_name_s;?>" style="cursor:pointer;" ><?php echo $ex_list_contact_name;?></a></center></td> 
                    <td><center style="width: 120px; "><?php echo $ex_list_train_station;?></center></td> 
                    <!--<td><center style="width: 320px; " ><?php echo $ex_list_zone;?></center></td> -->

                    <td><center style="width: 60px; ">

                      <a onclick="window.open('page/listing_public.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"  style="cursor:pointer;"  >

                        <?php if($ex_list_public=='1'){?>
                                <span class="badge badge-success"><?php echo "Public";?></span> 
                                                       <?php }else{?>
                                <span class="badge badge-danger"><?php echo "Draft";?></span> 
                       <?php }?></a>
 
                                  

                      </center></td> 
                    <td><center style="width: 120px;">
                       <?php if($ex_list_date_update=='00 00 543 00:00'){ echo "ยังไม่ระบุ"; }else{ 
                                       echo $ex_list_date_update; 
                                 
                             }?>
                      
                       </center>

                    </td> 
                    
              <?php if($p=='proppit'){ ?>   

                    <td><center style="width: 120px;"><?php echo $ex_list_proppit_date;?></center></td>

              <?php }else if($p=='propertyhub'){ ?>   

                    <td><center style="width: 120px;"><?php echo $ex_list_propertyhub_date;?></center></td>
 
              <?php }else if($p=='boost_post'){ ?>

                    <td><center style="width: 120px;"><?php echo $ex_list_boostpost_date;?></center></td>

              <?php } ?>  
 
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
     for ($counter = 1; $counter < 30; $counter++){       
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

     elseif($page_no > 30 && $page_no < $total_no_of_pages - 30) {         
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
        echo "<li class='page-item'><a href='$url_list&page_no=3' class='page-link'>3</a></li>";
        echo "<li class='page-item'><a href='$url_list&page_no=4' class='page-link'>4</a></li>";
        echo "<li class='page-item'><a href='$url_list&page_no=5' class='page-link'>5</a></li>";
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


  
