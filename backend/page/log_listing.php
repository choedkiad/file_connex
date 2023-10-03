 <?php 

  session_start();  
 

     if(  $_SESSION['STATUS_ID']=='4'   or $_SESSION['STATUS_ID']=='5' ){

     }else{ 
           echo("<script> top.location.href='../'</script>");  
     }

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
   $listing_status=$_GET['listing_status'];
   $tel=$_GET['tel'];
   $score_img=$_GET['score_img'];
   $sort_data=$_GET['sort_data'];
   $today=date('Y-m-d');

  
   $url_list="?page=log_listing&search=$search&p=$p&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&project=$project&type=$type&deal=$deal&bedroom=$bedroom&house_number=$house_number&list_floor=$list_floor&list_bts=$list_bts&listing_status=$listing_status&bargain=$bargain&score_img=$score_img&sort_data=$sort_data";

   ///////////////   ////////////////

   if($project==''){
          $project='';
   }

   /////////////// ประเภท คอนโด ทาวน์เฮ็าส์ ////////////////

   if($type!=''){
          $s_type=" and data.listing_type='$type' "; 
   }else{    $s_type="";  }

   /////////////// จำนวนห้องนอน ////////////////

   if($bedroom!=''){ 
          $s_bedroom=" and data.bedroom='$bedroom' ";  
   }else{    $s_bedroom="";  }

   /////////////// ประเภท ดีล ขายเช่า ////////////////

   if($deal!=''){ 
          $s_deal="  and data.deal_type='$deal'  ";  
   }else{    $s_deal="";  }

   /////////////// Status Availible , Rented ////////////////

   if($listing_status!=''){ 
          $s_listing_status="  and  data.listing_status='$listing_status'  ";  
   }else{    $s_listing_status="";  }


   /////////////// เลขที่ห้อง / บ้าน ////////////////

   if($house_number!=''){
          $s_house_number=" and  data.house_number='$house_number'  "; 
   }else{    $s_house_number="";  }

   /////////////// ชั้นที่ ////////////////

   if($list_floor!=''){
          $s_list_floor=" and data.floor='$list_floor'  "; 
   }else{    $s_list_floor="";  }


   /////////////// คะแนนภาพ ////////////////

   if($score_img!=''){
         $s_score_img=" and data.img_score='$score_img' ";
   }else{   $s_score_img="";  }

   //////////////////////////////////////////////


   /////////////// พื้นที่ต่ำสุด ////////////////

   if($sqm_low!=''){
         $s_sqm_low=" and data.sqm>=$sqm_low  ";
   }else{   $s_sqm_low="";  }


   /////////////// พื้นที่สูงสุด ////////////////

   if($sqm_maximum!=''){
         $s_sqm_maximum="  and  data.sqm<=$sqm_maximum ";
   }else{   $s_sqm_maximum="";  }

   /////////////// ราคาต่ำสุด ////////////////

   if($price_low!=''){
         $s_price_low="  and  data.price>=$price_low ";
   }else{   $s_price_low="";  }


   /////////////// ราคาสูงสุด //////////////// 

   if($price_maximum!=''){
         $s_price_maximum=" and data.price<=$price_maximum  ";
   }else{   $s_price_maximum="";  }


   /////////////// list_boostpost ////////////////  


   if($list_boostpost!=''){
         $s_list_boostpost=" and data.boostpost='$list_boostpost'";
   }else{
         $s_list_boostpost=""; 
   }
 

   /////////////// list_premium ////////////////  

   
   if($list_premium!=''){
         $s_list_premium=" and data.premium='$list_premium' ";
   }else{
         $s_list_premium=""; 
   }
 

   /////////////// list_public ////////////////  

   
   if($list_public!=''){
         $s_list_public=" and  data.public='$list_public' ";
   }else{
         $s_list_public=""; 
   }

 

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
                $search_project_s=" and  data.station_id='$station_id' "; 
                
                $project_check="ts.search_s_id='$project' and "; 
        }else{

           $project_check="  "; 
           $search_project_s ='';
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
 
if($_GET['page_no']==''){
   echo("<script> top.location.href='?page=log_listing&p=$p&page_no=1'</script>");   
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
                  <li class="nav-item"><a class="nav-link <?php if($p==''){?>active<?php } ?>" href="?page=log_listing"  >Log Listing</a></li>
                  <li class="nav-item"><a class="nav-link" href="?page=log_project"  >Log Project</a></li>
             
                </ul>    
              </div>


            <div class="card card-primary" style="padding: 10px;">
              <div class="card-header">
                <h3 class="card-title">ค้นหา</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" id="form" enctype="multipart/form-data" action="include/process_search.php?page=log_listing&p=<?php echo $p;?>" class=" form-inline"> 
              
              <input type="text" class="form-control" style="width: 100%;" name="p"  value="<?php echo $p;?>" hidden="hidden" >
              <input type="text" class="form-control" style="width: 100%;" name="page"  value="<?php echo $page;?>" hidden="hidden" >
                    
              <div class="card-body">

               <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">ค้นหา : </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;" name="search"  value="<?php echo $search;?>"  >
                        </div>
                      </div>
                  </div>
                 
                  <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">โครงการ / โซน / รถไฟฟ้า  : </label>
                        <div class="col-sm-9">
                            
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
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">ประเภทอสังหาฯ : </label>
                        <div class="col-sm-6">
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
             
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">ประเภทดิล : </label>
                        <div class="col-sm-6"> 
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
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Status : </label>
                        <div class="col-sm-6"> 
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
                  <div class="col-md-3 col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">จำนวนห้องนอน : </label>
                        <div class="col-sm-6"> 

                          <input type="text" class="form-control" style="width: 100%;" name="bedroom" value="<?php echo $bedroom;?>"  >
                        </div>
                      </div>
                  </div> 
                  <!--
                  <div class="col-md-3 col-sm-6">
                  </div>   -->         
                  <br><br>
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">พื้นที่ต่ำสุด : </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" style="width: 100%;" name="sqm_low"  value="<?php echo $sqm_low;?>"  >
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">พื้นที่สูงสุด : </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" style="width: 100%;" name="sqm_maximum"  value="<?php echo $sqm_maximum;?>">
                        </div>
                      </div>
                  </div>
                  
 
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">ราคาต่ำสุด : </label>
                        <div class="col-sm-6">

                          <input type="text" class="form-control" style="width: 100%;" name="price_low"  value="<?php echo $price_low;?>"  >
   
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">ราคาสูงสุด : </label>
                        <div class="col-sm-6"> 

                          <input type="text" class="form-control" style="width: 100%;" name="price_maximum"  value="<?php echo $price_maximum;?>"  >
                        </div>
                      </div>
                  </div>
                  <br><br>
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">เลขที่บ้าน/ห้อง : </label>
                        <div class="col-sm-6"> 

                          <input type="text" class="form-control" style="width: 100%;" name="house_number"  value="<?php echo $house_number;?>"  >
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">ชั้น : </label>
                        <div class="col-sm-6"> 

                          <input type="text" class="form-control" style="width: 100%;" name="list_floor"  value="<?php echo $list_floor;?>"  >
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">คะแนนรูปภาพ : </label>
                        <div class="col-sm-6"> 
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
       

                 
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">เรียงลำดับ : </label>
                        <div class="col-sm-6"> 
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

            

       <?php if($p=='pm_listing'){?>

                  <br><br>
                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">ผู้ติดต่อ : </label>
                        <div class="col-sm-6">
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
 

                  <div class="col-md-12"  ><br>
                     <center><button type="submit" class="btn btn-primary">Search Data</button> &nbsp;&nbsp;&nbsp;
                          <a class="btn btn-primary" href="?page=log_listing&p=<?php echo $p;?>">Clear Data</a>
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
                    <th>Restore</th>
                    <!--<th>Image</th> -->   
                    <th>Status</th>
                    <th>Type</th>
                    <th>Deal</th>
                    <th>Project</th> 
                  
                   <!--<td>Head</td>  -->
                    <th>House No.</th>
                    <th>Floor</th>
              
                    <th>Room</th>  
                    <th>พื้นที่ (ตร.ม.) </th>  
                    <th>Price</th>
   
                    <th>Owner</th>    
                    <th>BTS</th>  
                    <th>การเปลี่ยนแปลง</th>
                    <th>ผู้แก้ไข</th> 
              <?php if($p=='proppit' or $p=='boost_post'){ ?>  
                    <th>Proppit Date</th> 
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
          $list_close=" data.id!=''  ";
          $number_desc=" $sort data.create_date  DESC "; 

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


          if($search==''){

               $search_all_s="           
                          (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum  
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s   
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          

                          )    ";

          }else{

               $search_all_s="           
                          (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum  and
                          data.heading LIKE '%$search%'    
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s   
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                       

                          )  
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.heading_en LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number   
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                             
                          )  
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.ex_list_listing_code LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                         
                          )  
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.contact_tel LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number 
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                       
                          )  
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.contact_tel1_2 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number 
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                         
                          )  
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.contact_tel1_3 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number 
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                             
                          ) 
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.contact_tel1_4 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number   
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                           
                          )
                          or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.contact_tel_2 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number 
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                            
                          )  
                           or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.contact_tel2_2 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                          
                          ) 
                           or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.contact_tel2_3 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number 
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                            
                          )
                           or  
                         (
                          $list_close $s_sqm_low  $s_sqm_maximum  $s_price_low $s_price_maximum and
                          data.contact_tel2_4 LIKE '%$search%'   
                          $s_bedroom  $s_deal  $s_type  $s_listing_status  $s_house_number  
                          $s_list_boostpost $s_list_premium $s_list_public $search_project_s    
                          $s_list_floor $s_score_img $list_public $list_boostpost $list_premium 
                           
                          )    

                             ";

          }

 
 
 /*
SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers
ON Orders.CustomerID=Customers.CustomerID; */



 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM dbo_log_listing AS data  
         
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
     

     $sql="SELECT *   FROM dbo_log_listing AS data  
                    
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
 

// echo $search_all_s;
        // output data of each row
         while($rs_listing=$result->fetch_assoc()) {

         $id=$rs_listing['id'];      
         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $listing_name=$rs_listing['listing_name'];
         $deal_type=$rs_listing['deal_type'];
         $listing_type=$rs_listing['listing_type'];
         $listing_type_check=$rs_listing['listing_type'];
         $station_id=$rs_listing['station_id'];
         $floor=$rs_listing['floor'];
         $total_floors=$rs_listing['total_floors'];
         $house_number=$rs_listing['house_number'];
         $sqm=$rs_listing['sqm'];
         $bedroom=$rs_listing['bedroom'];
         $bathroom=$rs_listing['bathroom'];
         $price=$rs_listing['price'];
         $price_check=$rs_listing['price'];
         $list_contact=$rs_listing['list_contact'];
         $list_contact_check=$rs_listing['list_contact'];
         $contact_name=$rs_listing['contact_name'];
         $contact_tel=$rs_listing['contact_tel'];
         $contact_tel1_2=$rs_listing['contact_tel1_2'];
         $contact_tel1_3=$rs_listing['contact_tel1_3'];
         $contact_tel1_4=$rs_listing['contact_tel1_4'];
         $contact_email=$rs_listing['contact_email'];
         $contact_lineid=$rs_listing['contact_lineid'];
         $contact_name_2=$rs_listing['contact_name_2'];
         $contact_tel_2=$rs_listing['contact_tel_2'];
         $contact_tel2_2=$rs_listing['contact_tel2_2'];
         $contact_tel2_3=$rs_listing['contact_tel2_3'];
         $contact_tel2_4=$rs_listing['contact_tel2_4'];
         $contact_email_2=$rs_listing['contact_email_2'];
         $contact_lineid_2=$rs_listing['contact_lineid_2'];
         $zone_id=$rs_listing['zone_id'];
         $listing_status=$rs_listing['listing_status'];
         $listing_status_check=$rs_listing['listing_status'];
         $rent_till=$rs_listing['rent_till'];
         $project_id=$rs_listing['project_id'];
         $create_date=$rs_listing['create_date'];
         $public=$rs_listing['public'];
         $premium=$rs_listing['premium'];
         $boostpost=$rs_listing['boostpost'];
         $proppit=$rs_listing['proppit'];
         $owner_tel=$rs_listing['owner_tel'];
         $living=$rs_listing['living'];
         $bargain_date=$rs_listing['bargain_date'];
         $img_score=$rs_listing['img_score'];
         $rent_till=$rs_listing['rent_till'];
         $list_bargain=$rs_listing['list_bargain'];
         $pm_waiting=$rs_listing['pm_waiting'];
         $img_number=$rs_listing['img_number'];
         $proppit_date=$rs_listing['proppit_date'];
         $boostpost_date=$rs_listing['boostpost_date'];
         $details=$rs_listing['details'];
         $details_en=$rs_listing['details_en'];
         $log_number=$rs_listing['log_number'];  
         $log_remark=$rs_listing['log_remark'];
         $USER_ID=$rs_listing['USER_ID'];    

         $log_number=$log_number-1;
         $check_message='';

               $sql_listing_2="SELECT * FROM dbo_log_listing where ex_list_listing_code='$ex_list_listing_code'
                               and id!='$id' and log_remark=''
                               and create_date<'$create_date' order by create_date DESC LIMIT 1  "; 
               $result_listing_2=$conn->query($sql_listing_2);
               $rs_listing_2= $result_listing_2->fetch_assoc();   
 
           if($result_listing_2->num_rows > 0) {

                 $deal_type_s=$rs_listing_2['deal_type'];
                 $listing_type_s=$rs_listing_2['listing_type']; 
                 $station_id_s=$rs_listing_2['station_id'];
                 $floor_s=$rs_listing_2['floor'];
                 $total_floors_s=$rs_listing_2['total_floors'];
                 $house_number_s=$rs_listing_2['house_number'];
                 $sqm_s=$rs_listing_2['sqm'];
                 $bedroom_s=$rs_listing_2['bedroom'];
                 $bathroom_s=$rs_listing_2['bathroom'];
                 $price_s=$rs_listing_2['price']; 
                 $list_contact_s=$rs_listing_2['list_contact'];
                 $contact_name_s=$rs_listing_2['contact_name'];
                 $contact_tel_s=$rs_listing_2['contact_tel'];
                 $contact_tel1_2_s=$rs_listing_2['contact_tel1_2'];
                 $contact_tel1_3_s=$rs_listing_2['contact_tel1_3'];
                 $contact_tel1_4_s=$rs_listing_2['contact_tel1_4'];
                 $contact_email_s=$rs_listing_2['contact_email'];
                 $contact_lineid_s=$rs_listing_2['contact_lineid'];
                 $contact_name_2_s=$rs_listing_2['contact_name_2'];
                 $contact_tel_2_s=$rs_listing_2['contact_tel_2'];
                 $contact_tel2_2_s=$rs_listing_2['contact_tel2_2'];
                 $contact_tel2_3_s=$rs_listing_2['contact_tel2_3'];
                 $contact_tel2_4_s=$rs_listing_2['contact_tel2_4'];
                 $contact_email_2_s=$rs_listing_2['contact_email_2'];
                 $contact_lineid_2_s=$rs_listing_2['contact_lineid_2'];
                 $zone_id_s=$rs_listing_2['zone_id'];
                 $listing_status_s=$rs_listing_2['listing_status']; 
                 $rent_till_s=$rs_listing_2['rent_till'];
                 $project_id_s=$rs_listing_2['project_id'];
                 $create_date_s=$rs_listing_2['create_date'];
                 $public_s=$rs_listing_2['public'];
                 $premium_s=$rs_listing_2['premium'];
                 $boostpost_s=$rs_listing_2['boostpost'];
                 $proppit_s=$rs_listing_2['proppit'];
                 $owner_tel_s=$rs_listing_2['owner_tel'];
                 $img_number_s=$rs_listing_2['img_number'];
                 $details_s=$rs_listing_2['details'];
                 $details_en_s=$rs_listing_2['details_en'];
/*
               $project_id_s=$rs_project['project_id'];              
               $project_name=$rs_project['project_name'];
               $project_name_en=$rs_project['project_name_en'];                  

               $search_id=$rs_project['search_p_id'];*/

                 if($price!=$price_s){ $price_message="ราคา , ";  }else{ $price_message=""; }
                 if($contact_tel!=$contact_tel_s or $contact_tel1_2!=$contact_tel1_2_s or
                    $contact_tel1_3!=$contact_tel1_3_s or $contact_tel1_4!=$contact_tel1_4_s or
                    $contact_tel_2!=$contact_tel_2_s or $contact_tel2_2!=$contact_tel2_2_s or 
                    $contact_tel2_3!=$contact_tel2_3_s or $contact_tel2_4!=$contact_tel2_4_s){ $tel_message="เบอร์ติดต่อ , ";  }else{ $tel_message=""; }
                 if($deal_type!=$deal_type_s){ $deal_message="ประเภทดีล , ";  }else{ $deal_message=""; }
                 if($floor!=$floor_s){ $floor_message="ชั้นที่ , ";  }else{ $floor_message=""; }
                 if($house_number!=$house_number_s){ $house_message="บ้านเลขที่ ,";  }else{ $house_message=""; }
                 if($sqm!=$sqm_s){ $sqm_message="พื้นที่ใช้สอย , ";  }else{ $sqm_message=""; }
                 if($bedroom!=$bedroom_s){ $bedroom_message="จำนวนห้อง , ";  }else{ $bedroom_message=""; }
                 if($listing_status!=$listing_status_s){ $listing_status_message="สถานะ , ";  }else{ $listing_status_message=""; }
                 if($project_id!=$project_id_s){ $project_message="โครงการ , ";  }else{ $project_message=""; }
                 if($zone_id!=$zone_id_s){ $zone_message="โซน , ";  }else{ $zone_message=""; }
                 if($details!=$details_s or $details_en!=$details_en_s){ $details_message="รายละเอียดเพิ่มเติม , ";  }else{ $details_message=""; }

                 $check_message=$price_message."".$tel_message."".$deal_message."".$floor_message."".$house_message."".$bedroom_message."".$listing_status_message."".$project_message."".$zone_message."".$details_message;

         }else{  $check_message='';  }
                 
              
         if($log_remark!=''){    
                   
                   if($log_remark=='createimg'){ $log_remark='เพิ่มภาพ'; }else{ $log_remark='ลบภาพ'; }
                 $check_message=$log_remark." (".$img_number.")" ;

               $listing_name=$rs_listing_2['listing_name'];
               $deal_type=$rs_listing_2['deal_type'];
               $listing_type=$rs_listing_2['listing_type'];
               $listing_type_check=$rs_listing_2['listing_type'];
               $station_id=$rs_listing_2['station_id'];
               $floor=$rs_listing_2['floor'];
               $total_floors=$rs_listing_2['total_floors'];
               $house_number=$rs_listing_2['house_number'];
               $sqm=$rs_listing_2['sqm'];
               $bedroom=$rs_listing_2['bedroom'];
               $bathroom=$rs_listing_2['bathroom'];
               $price=$rs_listing_2['price'];
               $price_check=$rs_listing_2['price'];
               $list_contact=$rs_listing_2['list_contact'];
               $list_contact_check=$rs_listing_2['list_contact'];
               $contact_name=$rs_listing_2['contact_name'];
               $contact_tel=$rs_listing_2['contact_tel'];
               $contact_tel1_2=$rs_listing_2['contact_tel1_2'];
               $contact_tel1_3=$rs_listing_2['contact_tel1_3'];
               $contact_tel1_4=$rs_listing_2['contact_tel1_4'];
               $contact_email=$rs_listing_2['contact_email'];
               $contact_lineid=$rs_listing_2['contact_lineid'];
               $contact_name_2=$rs_listing_2['contact_name_2'];
               $contact_tel_2=$rs_listing_2['contact_tel_2'];
               $contact_tel2_2=$rs_listing_2['contact_tel2_2'];
               $contact_tel2_3=$rs_listing_2['contact_tel2_3'];
               $contact_tel2_4=$rs_listing_2['contact_tel2_4'];
               $contact_email_2=$rs_listing_2['contact_email_2'];
               $contact_lineid_2=$rs_listing_2['contact_lineid_2'];
               $zone_id=$rs_listing_2['zone_id'];
               $listing_status=$rs_listing_2['listing_status'];
               $listing_status_check=$rs_listing_2['listing_status'];
               $rent_till=$rs_listing_2['rent_till'];
               $project_id=$rs_listing_2['project_id']; 
               $public=$rs_listing_2['public'];
               $premium=$rs_listing_2['premium'];
               $boostpost=$rs_listing_2['boostpost'];
               $proppit=$rs_listing_2['proppit'];
               $owner_tel=$rs_listing_2['owner_tel'];
               $living=$rs_listing_2['living'];
               $bargain_date=$rs_listing_2['bargain_date'];
               $img_score=$rs_listing_2['img_score'];
               $rent_till=$rs_listing_2['rent_till'];
               $list_bargain=$rs_listing_2['list_bargain'];
               $pm_waiting=$rs_listing_2['pm_waiting']; 
               $proppit_date=$rs_listing_2['proppit_date'];
               $boostpost_date=$rs_listing_2['boostpost_date'];


          }
         
         if($img_score=='1'){ 
                $ex_list_img_score_name='(แย่)';   $stauts_img_color="#ff0000";
         }else if($img_score=='2'){
                $ex_list_img_score_name='(ปานกลาง)';  $stauts_img_color="#ffa200";
         }else if($img_score=='3'){
                $ex_list_img_score_name='(ดี)';  $stauts_img_color="#42d700";
         }else if($img_score=='4'){
                $ex_list_img_score_name='(ดีมาก)';  $stauts_img_color="#42d700";
         }else{
                $ex_list_img_score_name='ไม่ระบุ';   $stauts_img_color="#000";
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
         
    if($_SESSION['STATUS_ID']=='2' or $_SESSION['STATUS_ID']=='3' or $_SESSION['STATUS_ID']=='4'   or $_SESSION['STATUS_ID']=='5'
      or $_SESSION['STATUS_ID']==$ex_list_contact ){  $ex_list_contact_name_s=''; 

         if($ex_list_contact_name!='' or $ex_list_contact_tel!='' or $ex_list_contact_lineid!='' or $ex_list_contact_email!=''){ $ex_list_contact_name_s="Owner 1 : ".$ex_list_contact_name." Tel : ".$ex_list_contact_tel.",".$ex_list_contact_tel1_2.",".$ex_list_contact_tel1_3.",".$ex_list_contact_tel1_4." Line : ".$ex_list_contact_lineid." E-Mail : ".$ex_list_contact_email." | Owner 2 : ".$ex_list_contact_name_2." Tel : ".$ex_list_contact_tel_2.",".$ex_list_contact_tel2_2.",".$ex_list_contact_tel2_3.",".$ex_list_contact_tel2_4." Line : ".$ex_list_contact_lineid_2." E-Mail : ".$ex_list_contact_email_2; }
     }else{ $ex_list_contact_name_s="-"; }
         
         if($listing_status=='' or $listing_status=='0'){ $listing_status="No Status"; $stauts_list_color="#000";  }
         else if($listing_status=='1'){ $listing_status="Available"; $stauts_list_color="#42d700"; }
         else if($listing_status=='2'){ $listing_status="Contracted ไม่ล็อคสิทธิ"; $stauts_list_color="#42d700"; }
         else if($listing_status=='3'){ $listing_status="Rented";  $rent_till=$rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($ex_list_rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
         else if($listing_status=='4'){ $listing_status="Sold(by Connex)";  $stauts_list_color="#ff0000"; }
         else if($listing_status=='5'){ $listing_status="Sold(by Others)"; $stauts_list_color="#ff0000"; }
         else if($listing_status=='6'){ $listing_status="own use"; $stauts_list_color="#ff0000"; }
         else if($listing_status=='7'){ $listing_status="unknown"; $stauts_list_color="#000cff"; }
         else if($listing_status=='8'){ $listing_status="ไม่รับสาย"; $stauts_list_color="#000cff"; }
         else if($listing_status=='9'){ $listing_status="ไม่สะดวกคุย"; $stauts_list_color="#000cff"; }
         else if($listing_status=='10'){ $listing_status="ปิดเครื่อง"; $stauts_list_color="#000cff"; }
         else if($listing_status=='11'){ $listing_status="สายไม่ว่าง"; $stauts_list_color="#000cff"; }
         else if($listing_status=='12'){ $listing_status="เบอร์ผิด"; $stauts_list_color="#000cff"; }
         else if($listing_status=='13'){ $listing_status="ไม่รับ agent"; $stauts_list_color="#000cff"; }
         else if($listing_status=='14'){ $listing_status="ยังไม่ปล่อยขาย/เช่า"; $stauts_list_color="#000cff"; }
         else if($listing_status=='15'){ $listing_status="Under Renovation";  $ex_list_rent_till=$ex_list_rent_till; 
                                          //เช็ควันหมดอายุ
                                         if($rent_till_date<=$calExpireDate){ $stauts_list_color="#ffa200"; $expire_check=' <span class="right badge badge-danger">New</span>';  
                                          }else{  $stauts_list_color="#ff0000";  $expire_check=''; } 

                                                   
                                         }
            
          if($price!=''){ $price=number_format($price);}else{$price="ยังไม่ระบุ";}


          if($deal_type=='1'){ $deal_type="ขาย";}else{$deal_type="เช่า";}

          if($sqm!='' or $sqm=='0'){  $sqm=$sqm; }
        
          if($bedroom>0){$bedroom=$bedroom."นอน";}else{ $bedroom=$bedroom; }
          if($bathroom>0){$bathroom=$bathroom."น้ำ";}else{ $bathroom=$bathroom; }

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
                    $zone_id=$zone_id;
               } 

               if($zone_id=='0'){  $zone_id="ไม่ระบุโซน"; }

           
               if($listing_type!='' or $listing_type!='0'){ 
                     $listing_type=$project_type;
               }

               if($project_train_station!=''){
                    $station_id=$project_train_station;
               }else{}

          }else{

              if($ex_list_listing_name!='') {

                   $ex_list_project=$ex_list_listing_name;
              }else{
                   $ex_list_project="ไม่ระบุโครงการ";
              }

          }

     


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
             $sql_ass="SELECT id , name FROM type_asset where id='$listing_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['id']!=''){ $listing_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////


      /////////// type_train_station ////////////////

          if($station_id!=''  ){    
             $sql_train="SELECT station_train ,station_name_en  FROM type_train_station where station_id='$station_id' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

          }

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
            /* if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}*/
            if($station_name!=''){ $station_id=$rs_train['station_train'];} else{  $station_id='';}


      /////////// End type_train_station ////////////////
              

            if($ex_list_floor=='' and $listing_type_check!='1' and $listing_type_check!='13' ){   
                if($listing_type_check!='1' and $ex_list_total_floors!='' and  $ex_list_total_floors!='0' and $listing_type_check!='13'){

                        $ex_list_floor=$ex_list_total_floors;  
                }
             
                if($listing_type_check!='1' and $ex_list_total_floors=='' or  $listing_type_check!='1' and $ex_list_total_floors=='0' and $listing_type_check!='13'){ 
                         $ex_list_floor=$project_total_floors;  
                 } 
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



                  <div class="modal fade" id="modal-default<?php echo $id;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">ดำเนินการ Restore Listing : <?php echo $ex_list_listing_code;?> นี้หรือไม่ </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                         
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <a href="include/process.php?page=log_listing&id=<?php echo $id;?>" class="btn btn-primary">Restore</a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

 
     
                  <tr style="font-size: 10px; " style="width: 100%;"  >
 
                    <td >  
                        <center style="width: 70px; " > 
                          <?php if($log_remark==''){ ?>
                              <a target="_blank" href="?page=log_listing_view&listing=<?php echo $ex_list_listing_code;?>&id=<?php echo $id;?>" title=" "  > <?php echo $ex_list_listing_code;?> </a> 
                        <?php }else{  echo $ex_list_listing_code; }  ?>
                        </center> 
                    </td>  
                    <td  >
                       <?php if($log_remark==''){ ?>
                              <center style="width: 50px; font-size: 11px; color: <?php echo $stauts_img_color;?>"> 
                                  <a href="#"   data-toggle="modal" data-target="#modal-default<?php echo $id;?>" data-toggle="modal" data-target="#modal-default<?php echo $id;?>" ><i class="fa fa-history" style="font-size:20px;color: blue;" ></i></a>
                              </center>
                        <?php } ?>
                    </td>
                    <!--
                    <td > 
                      <a onclick="window.open('page/listing_img.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" style="cursor:pointer;" >
                       <?php if($img_number!='0'){ ?>
                                  
                                  <i class="fa fa-check-circle" style="font-size:20px;color: green;" title="<?php echo "จำนวนภาพ : ".$img_number;?>"></i>

                       <?php }else{ ?>
                                   <i class="fa fa-times-circle" style="font-size:20px;color: red;"></i>
                       <?php } ?></a> 
                    </td> -->
                    
                    <td ><center style="width:80px;color: <?php echo $stauts_list_color;?>;"><a onclick="window.open('page/listing_status.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=650,width=520,scrollbars=yes,status=yes');"style="cursor:pointer;"   >

 
                      <?php echo $listing_status.$expire_check;  ?>
                       <?php if($listing_status_check=='3' or $listing_status_check=='15'){ ?> <br><?php echo $rent_till; } ?>
                      </a>
                      
                    </center></td>
                         
                    <td><center style="width: 50px;"><?php echo $listing_type;?></center></td>
                    <td><center style="width: 50px;"><?php echo $deal_type;?></center></td>
                    <td > <center style="width: 200px; " ><a title="<?php echo $ex_list_contact_name_s;?>" style="cursor:pointer;"  ><?php echo "".$ex_list_project;?></a></center> 

                    </td>  
                   
                    <!--<td > <center style="width: 200px; " class="grab" ><a title="<?php echo $ex_list_contact_name;?>"><?php echo "".$ex_list_heading;?></a></center> 

                    </td>  -->
                    <td><center style="width: 50px; " ><?php echo $house_number;?></center></td>
                    <td><center style="width: 50px; "><?php echo $floor;?></center></td>
                    <td><center style="width: 100px; " ><?php echo $bedroom." | ".$bathroom;?></center></td>
                    <td><center style="width: 50px; " ><?php echo $sqm;?></center></td>     
                    <td><center style="width: 80px; " ><a  onclick="window.open('page/listing_prices.php?id=<?php echo $ex_list_listing_code;?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" style="cursor:pointer;"  >
                      <?php echo $price;?></a></center></td>   
      
           
                    <td><center style="width: 80px; " ><a title="<?php echo $ex_list_contact_name_s;?>" style="cursor:pointer;" ><?php echo $contact_name;?></a></center></td> 
                    <td><center style="width: 120px; "><?php echo $station_id;?></center></td> 
                    <!--<td><center style="width: 320px; " ><?php echo $ex_list_zone;?></center></td> --> 
           
                    <td><center style="width: 120px; color: red;"><?php echo $check_message;?></center> </td> 
                    <td><center style="width: 120px;"><?php echo $ex_list_contact;?></center> </td>    
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


  
