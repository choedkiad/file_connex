<!DOCTYPE html>


<?php   session_start();  ?>
<?php   include ("./include/config.php"); ?>
<?php   include ("./setting.php"); 

    $today=date("YmdHis");

    $part="../../../";
    $myurl="https://connex.in.th/zone/".$lang."/".$id."/";

    $myurl_check="https://connex.in.th/zone/".$lang."/".$id."/".$page_no;



		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }




	    if($lang=='th'){

			 $sql_zone="SELECT * FROM type_zone_group where zone_g_url='".$id."' ";
			 $result_zone=$conn->query($sql_zone); 
	    	  // output data of each row
	         $rs_zone=$result_zone->fetch_assoc();
              
              $heading_title="โครงการเด่นใน ";
              $title_zone=$rs_zone['zone_g_name'];
              $settings_title=$rs_zone['zone_g_meta_title'];
              $settings_keyword=$rs_zone['zone_g_meta_keyword'];
              $settings_description=$rs_zone['zone_g_meta_description'];

              $img_list=$part."images/zone_group/".$rs_zone['zone_g_image'];

	    }else{

			 $sql_zone="SELECT * FROM type_zone_group where zone_g_url_en='".$id."' ";
			 $result_zone=$conn->query($sql_zone); 
	    	  // output data of each row
	         $rs_zone=$result_zone->fetch_assoc();

              $heading_title="Project in ";
              $title_zone=$rs_zone['zone_g_name_en'];
              $settings_title=$rs_zone['zone_g_meta_title_en'];
              $settings_keyword=$rs_zone['zone_g_meta_keyword_en'];
              $settings_description=$rs_zone['zone_g_meta_description_en'];

              $img_list=$part."images/zone_group/".$rs_zone['zone_g_image'];

	    }


         $zone_g_id=$rs_zone['zone_g_id'];
         $zone_g_name=$rs_zone['zone_g_name'];
         $zone_g_url=$rs_zone['zone_g_url'];
         $zone_g_url_en=$rs_zone['zone_g_url_en'];

	    $url_th="https://connex.in.th/zone/th/".$zone_g_url."/".$page_no;
	    $url_en="https://connex.in.th/zone/en/".$zone_g_url_en."/".$page_no;



	    if($settings_title!=''){

              $settings_title=$settings_title;
              $settings_keyword=$settings_keyword;
              $settings_description=$settings_description;

	    }else{

              $settings_title="ขาย ให้เช่า เซ้งคอนโด บ้าน ที่ดิน ย่าน".$title_zone." | Connex Property";
              $settings_keyword=$title_zone." , ขายคอนโด".$title_zone.",ขายทาวน์เฮ้าส์" ;
              $settings_description=$settings_description." | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";

	    }


?>
<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <?php if($device=="pc"){ ?> 
    <link href="<?php echo $part;?>css/main.css?v=<?php echo $today;?>" rel="stylesheet" type="text/css" />   
 <?php }else{ ?>
    <link href="<?php echo $part;?>css/main_mobile.css?v=<?php echo $today;?>" rel="stylesheet" type="text/css" />   
 <?php } ?>
    <link rel="icon" type="image/x-icon" href="<?php echo  $part;?>images/logo_icon.png"> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>  
	   <title><?php echo $settings_title;?> </title>
    <meta name="author" content="Connex Property">
    <meta name="keywords" content="<?php echo $settings_keyword;?>">
    <meta name="description" content="<?php echo $settings_description;?> ">	

    <link rel="canonical" href="<?php echo $myurl_check;?> " />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $settings_title;?>" />
    <meta property="og:description" content="<?php echo $settings_description;?>" />
    <meta property="og:url" content="<?php echo $myurl_check;?>" />
    <meta property="og:site_name" content="Connex Property ขายบ้าน คอนโด" />
    <meta property="og:image" content="<?php echo $img_list;?>" />
    <meta name="twitter:card" content="Connex Property ขายบ้าน คอนโด" />
    <meta name="twitter:description" content="<?php echo $settings_description;?>" />
    <meta name="twitter:title" content="<?php echo $settings_title;?>" />
    <meta name="twitter:image" content="<?php echo $img_list;?>" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">


  <style type="text/css">
    
    .col{
    position: relative;
    width: 100%;
    padding-right: 5px;
    padding-left: 5px;
  </style>

</head>
<body>

<?php 

 if($_GET['page_no']==''){
	echo("<script> top.location.href='zone/$lang/$id/1'</script>");   
 }

 $page_no=$_GET['page_no']; 
   /*   
 $page_no= substr($_GET['page_no'],6);  

 $page_no = str_replace("=","",$page_no,$count); 
 $page_no = str_replace("o","",$page_no,$count); */
 //echo $page_no." ".$cate_id;
 
 
 ?>

   <?php include("./include/menu.php");?>

	<main>

		<div class="map-nav">
			<?php echo $title_zone;?>
		</div>
  
		<div class="social-con">
			<a href="#">
				<img src="<?php echo $part;?>images/sc1.png" alt="">
			</a>
			<a href="#">
				<img src="<?php echo $part;?>images/sc2.png" alt="">
			</a>
			<a href="#">
				<img src="<?php echo $part;?>images/sc3.png" alt="">
			</a>
			<a href="#">
				<img src="<?php echo $part;?>images/sc4.png" alt="">
			</a>
			<button><i class="fas fa-comment-lines"></i></button>
		</div>

		<section class="category-sec">
			<div class="col-xl-11 col-lg-12">
				<div class="row">
					<div class="col-xl-12 col-lg-12">
						<h1 class="h1x"><?php echo $heading_title;?> <span><?php echo $title_zone;?></span></h1>


              <form method="post" id="form" enctype="multipart/form-data" action="<?php echo $part."include/process_search.php";?>"  > 
              
                <input type="text" class="form-control" style="width: 100%;" name="id"  value="<?php echo $id;?>" hidden="hidden" >
                <input type="text" class="form-control" style="width: 100%;" name="page"  value="search" hidden="hidden" >
                <input type="text" name="lang" id="" value="<?php echo $lang ; ?>" hidden="hidden" >
             <!--   <input type="text" class="form-control" style="width: 100%;" name="set_s"  value="<?php if($set_s==''){ echo "1";}else{ echo $set_s;}?>" hidden="hidden" >-->

            <div class="row">
              <div class="col">
                <select class="selectpicker" title="<?php echo $project_title;?>" data-show-subtext="true" data-live-search="true" name="project_s" id="project_s" width="100%" onchange="cek_db()"  > 
                   <option value="0" >--<?php echo $all_title;?>--</option> 
            <?php

              $strSQL = "SELECT pj.project_id  , pj.project_name , pj.project_name_en FROM type_project AS pj  where pj.project_name!=''   "; 
              $result=$conn->query($strSQL); 
             
              while($rs_project = $result->fetch_assoc())
              {   

                 $g++;

                     $project_id_s=$rs_project['project_id'];              
                     $project_name=$rs_project['project_name'];
                     $project_name_en=$rs_project['project_name_en'];
                     $project_latitude=$rs_project['project_proppit_latitude'];
                     $project_longitude=$rs_project['project_proppit_longitude'];
                     
                      $project_name_text=$project_name." | ".$project_name_en;  
             
                ?> 
                  <option value="<?php echo $project_id_s;?>" <?php if($project_s==$project_id_s){?> selected="selected" <?php } ?> ><?php echo $project_name_text;?></option> 
     
            <?php  
              }  ?>
                   
                </select>
              </div>

              <div class="col">
                <select class="selectpicker" title="<?php echo $property_type_title;?>" data-show-subtext="true" data-live-search="true" name="type_s" id="type_s" width="100%"> 
                  <option value="0">--<?php echo $all_title;?>--</option> 
        <?php 
                $str_asset="SELECT * FROM type_asset order by id ASC "; 
                $result_asset=$conn->query($str_asset); 
               
                while($rs_asset=$result_asset->fetch_assoc()) { 

                  $asset_id=$rs_asset['id'];
                  $asset_name=$rs_asset['name'];
                  $asset_name_en=$rs_asset['name_en'];

                      if($lang=='th'){ $asset_name=$asset_name;  }else{ $asset_name=$asset_name_en;  }

                ?>
                          <option value="<?php echo $asset_id;?>" id="type_s" <?php if($type_s==$asset_id){?> selected="selected" <?php } ?>  ><?php echo $asset_name;?></option> 

               <?php } ?>
                </select>
              </div>
 


              <div class="col">
                <select class="selectpicker form-control" title="<?php echo $deal_title;?>" data-show-subtext="true" data-live-search="true" name="deal_s" id="deal_s" width="100%"> 
                  <option value="">--<?php echo $all_title;?>--</option> 
                  <option value="1" <?php if($deal_s=="1"){?> selected="selected" <?php } ?>><?php echo $buy_title;?></option> 
                  <option value="2" <?php if($deal_s=="2"){?> selected="selected" <?php } ?>><?php echo $rent_title;?></option> 
                </select> 
              </div>
              <div class="col">
                <select class="selectpicker form-control" title="<?php echo $room_title;?>" data-show-subtext="true" data-live-search="true" name="room_s" id="room_s" width="100%"> 
                  <option value="" >--<?php echo $all_title;?>--</option> 
                  
       <?php for($x = 0; $x <= 10; $x++) { ?>
                  <option value="<?php echo $x;?>" <?php if($room_s=='$x'){ ?>selected="selected" <?php } ?>><?php if($x==0){ echo "Studio"; }else{ echo $x." ".$bedroom_title; } ?>
                    
                  </option>  
      <?php  } ?>      
                </select>
              </div>
              <div class="col">
                <select class="selectpicker form-control" title="<?php echo $size_title;?>" data-show-subtext="true" data-live-search="true" name="size_s" id="sel1" width="100%"> 
                  <option value="">--<?php echo $all_title;?>--</option> 
     <?php
              $str_size="SELECT * FROM type_size order by size_id  ASC "; 
              $result_size=$conn->query($str_size); 
               
              while($rs_size=$result_size->fetch_assoc()) {  

                $size_id=$rs_size['size_id'];
                $size_title=$rs_size['size_title'];
      ?>
                  <option value="<?php echo $size_id;?>" <?php if($size_id=="$size_s"){?> selected="selected" <?php } ?>><?php echo $size_title;?></option> 
      <?php } ?>
                </select>
              </div>
              <div class="col">
                <select class="selectpicker form-control" title="<?php echo $price_s_title;?>" data-show-subtext="true" data-live-search="true" name="price_s" id="sel1" width="100%"> 
 
                  <option value="">--<?php echo $all_title;?>--</option> 
      <?php
                $str_price_range="SELECT * FROM type_price_range order by price_range_id  ASC "; 
                $result_price_range=$conn->query($str_price_range); 
               
                while($rs_price_range=$result_price_range->fetch_assoc()) { 

                  $price_range_id=$rs_price_range['price_range_id'];
                  $price_range_text=$rs_price_range['price_range_text'];  

                ?>
                  <option value="<?php echo $price_range_id;?>" <?php if($price_range_id=="$price_s"){?> selected="selected" <?php } ?>><?php echo $price_range_text;?></option>  

          <?php } ?>
                </select>
              </div>         
              <div class="col">             
                <select class="selectpicker form-control" title="<?php echo $sort_s_title;?> " data-show-subtext="true" data-live-search="true"  name="sort_s" id="sel1"  > 
                  <option value=""><?php echo $sort_s_title_0;?></option> 
                  <option value="1" <?php if($_SESSION['sort_s']=="1"){ ?> selected="selected" <?php } ?>><?php echo $sort_s_title_1;?></option> 
                  <option value="2" <?php if($_SESSION['sort_s']=="2"){ ?> selected="selected" <?php } ?>><?php echo $sort_s_title_2;?></option> 
                </select>
              </div>
              <div class="col" style="width: 100px;">
                 <a href="https://connex.in.th/search/<?php echo $lang;?>/0/0/0/0/0/s/0/1"  ><label style="cursor:pointer;">  คืนค่าเริ่มต้น </label></a>
              </div>
                 
              <div class="col">
                 <input type="submit" class="btn btn-des" value="Search">  
              </div>
              <div class="col">
                 <a href="#" class="btn search-detail">ค้นหาแบบละเอียด</a> 
              </div>
            </div>
            
          </div>
          



        </form>


				<div class="row">

<?php   
  
  if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }

$no=0;


if($sqm_low==''){  $sqm_low=0;  } else{}
if($sqm_maximum==''){  $sqm_maximum=100000;  }  else{}
if($price_low==''){  $price_low=0;  } 
if($price_maximum==''){  $price_maximum=9999999999;  } 
if($bedroom==''){  $bedroom="";  } 


if (isset($page_no) && $page_no!="" && $page_no!="l") {
$page_no = $page_no;
} else {
   $page_no = 1;
   }

$total_records_per_page = 15;
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2"; 


  
 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM dbo_data_excel_listing AS data
 LEFT JOIN type_project AS pj ON data.project_id=pj.project_id  
 LEFT JOIN type_zone AS zone ON pj.zone_id=zone.zone_id  

 where (zone.zone_g_id='$zone_g_id' and  data.ex_list_public='1'  ) ");


    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1


$sql="SELECT data.ex_list_listing_name , data.ex_list_heading , data.ex_list_heading_en, data.ex_list_listing_code , data.ex_list_bedroom, data.ex_list_deal_type , data.ex_list_bathroom , 
		data.ex_list_price , data.ex_list_project , data.ex_list_sqm , data.ex_list_floor , data.project_id , data.ex_list_listing_type  , 
		data.ex_list_subdistrict , data.ex_list_district  , data.ex_list_province  , data.ex_list_latitude , data.ex_list_longitude  ,
		pj.project_id , pj.project_name , pj.project_name_en  , pj.project_latitude , pj.project_longitude , pj.project_proppit_latitude , pj.project_proppit_longitude,
		pj.project_subdistrict , pj.project_district , pj.project_province
FROM dbo_data_excel_listing AS data
LEFT JOIN type_project AS pj ON data.project_id=pj.project_id  
LEFT JOIN type_zone AS zone ON pj.zone_id=zone.zone_id  

 where  (zone.zone_g_id='$zone_g_id' and  data.ex_list_public='1'  )
		               

 order by data.ex_list_premium DESC ,data.ex_list_img_score DESC ,  data.ex_list_public_date DESC  LIMIT $offset, $total_records_per_page ";  
$result = $conn->query($sql);



if($result->num_rows > 0) {
	// output data of each row
	 while($rs=$result->fetch_assoc()) { $num++;


              $ex_list_heading=$rs['ex_list_heading'];
              $ex_list_heading_en=$rs['ex_list_heading_en'];
              $ex_list_listing_code=$rs['ex_list_listing_code'];
              $ex_list_price=$rs['ex_list_price'];
              $ex_list_bedroom=$rs['ex_list_bedroom'];
              $ex_list_bathroom=$rs['ex_list_bathroom']; 
              $ex_list_deal_type=$rs['ex_list_deal_type'];
              $ex_list_parking=$rs['ex_list_parking'];
              $ex_list_sqm=$rs['ex_list_sqm'];
              $ex_list_floor=$rs['ex_list_floor'];
              $ex_list_project=$rs['ex_list_project'];
              $ex_list_parking=$rs['ex_list_parking'];
              $ex_list_listing_type=$rs['ex_list_listing_type'];
              $project_name=$rs['project_name'];
              $project_name_en=$rs['project_name_en'];
              $project_id=$rs['project_id'];
              $ex_list_listing_name=$rs['ex_list_listing_name'];
              $ex_list_listing_name_en=$rs['ex_list_listing_name'];

              $ex_list_subdistrict=$rs['ex_list_subdistrict'];
              $ex_list_district=$rs['ex_list_district'];
              $ex_list_province=$rs['ex_list_province'];

              $ex_list_latitude=$rs['ex_list_latitude'];
              $ex_list_longitude=$rs['ex_list_longitude'];

			 $project_latitude=$rs['project_latitude'];
			 $project_longitude=$rs['project_longitude'];

			 $project_proppit_latitude=$rs['project_proppit_latitude'];
			 $project_proppit_longitude=$rs['project_proppit_longitude'];


              $ex_list_rai=$rs['ex_list_rai'];
              $ex_list_ngan=$rs['ex_list_ngan'];
              $ex_list_wa=$rs['ex_list_wa'];


		       $ex_list_rai=$ex_list_rai* 400; 
		       $ex_list_ngan=$ex_list_ngan* 100;   

		       $ex_list_wa=$ex_list_rai+$ex_list_ngan+$ex_list_wa;

			 if($project_proppit_latitude!=''){

						 $project_latitude=$project_proppit_latitude;
						 $project_longitude=$project_proppit_longitude;

			 }else if($project_proppit_latitude=='' and $project_latitude!=''){
                  

						 $project_latitude=$project_latitude;
						 $project_longitude=$project_longitude;

			 }else{


						 $project_latitude=$ex_list_latitude;
						 $project_longitude=$ex_list_longitude;

			 }
 


              
              $price=number_format($ex_list_price); 

              if($ex_list_deal_type=='ขาย' or $ex_list_deal_type=='1'){    $sale_text_th="ขาย"; $sale_text_en="FOR SELL";}
              else if($ex_list_deal_type=='เช่า' or $ex_list_deal_type=='2'){   $sale_text_th="เช่า";   $sale_text_en="FOR SELL";}
              
              $sql_img="SELECT ex_list_listing_code,listing_img_folder,listing_img_name,listing_img_no 
                        FROM dbo_data_excel_listing_img 
                        WHERE ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC  ";
		      $result_img=$conn->query($sql_img); 
		      $rs_img=$result_img->fetch_assoc();

		      $listing_img_folder=$rs_img['listing_img_folder'];
		      $listing_img_name=$rs_img['listing_img_name'];
               
                     if($listing_img_folder!=''){   

                           $img_name_list="https://connex.in.th/".$listing_img_folder."".$listing_img_name;

					   
							$img_name_list=str_replace(" ","%20",$img_name_list);

                     }else if($listing_img_name!=''){   
                           $img_name_list=$part."images/listing/".$ex_list_listing_code."/".$listing_img_name;  

						   $img_name_list=str_replace(" ","%20",$img_name_list);
                            
                     }else{  $img_name_list=$part."images/noimages.jpg" ;  $test1 = "000"; 

                     }  



              if($project_id!='' and $project_id!='0'){

              	     $ex_list_subdistrict=$rs['project_subdistrict'];
                     $ex_list_district=$rs['project_district'];
                     $ex_list_province=$rs['project_province'];

               
               // TEXT ปักหมุด GOOGLE MAP
		    	    if($lang=='th'){ 

		    	    	$project_name_text=$type_th." | โครงการ : ".$project_name." | ราคา : ".$price." บาท &nbsp;&nbsp;&nbsp;";  
		                $project_name_text="<a href='https://connex.in.th/property/th/$ex_list_listing_code' target='_blank' >$project_name_text</a>"; 
		                     
		    	     }else{ 

		    	     	$project_name_text=$type_en." | Project : ".$project_name_en." | Price : ".$price."    Baht &nbsp;&nbsp;&nbsp;"; 
		                $project_name_text="<a href='https://connex.in.th/property/en/$ex_list_listing_code' target='_blank' >$project_name_text</a>"; 

		    	     }


              }else{

 

 
              	     $ex_list_subdistrict=$rs['ex_list_subdistrict'];
                     $ex_list_district=$rs['ex_list_district'];
                     $ex_list_province=$rs['ex_list_province'];

               // TEXT ปักหมุด GOOGLE MAP
		    	    if($lang=='th'){ 

		    	    	$project_name_text=$type_th." | ".$ex_list_listing_name." | ราคา : ".$price." บาท &nbsp;&nbsp;&nbsp;";  
		                $project_name_text="<a href='https://connex.in.th/property/th/$ex_list_listing_code' target='_blank' >$project_name_text</a>"; 
		                     
		    	     }else{ 

		    	     	$project_name_text=$type_en." | ".$ex_list_listing_name." | Price : ".$price."    Baht &nbsp;&nbsp;&nbsp;"; 
		                $project_name_text="<a href='https://connex.in.th/property/en/$ex_list_listing_code' target='_blank' >$project_name_text</a>"; 

		    	     }

              }


                 if($ex_list_listing_type=='1'){ 
                          $area_land_title='';
                          $sqm_title=$sqm_title; 
                          $list_sqm=$ex_list_sqm;
                 }else{ 
                          $area_land_title=$area_land_title;
                          $sqm_title=$sqw_title;
                          $list_sqm=$ex_list_wa;
                 }


	  /////////// type_asset ////////////////
		  $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
		  $result_ass= $conn->query($sql_ass);
		  $rs_ass=$result_ass->fetch_assoc();

		  if($rs_ass['id']!=''){ $type_th=$rs_ass['name'];   $type_en=$rs_ass['name_en']; }
	                                                         
	  ////////// End type_asset ////////////////

     

	        if($num==1){
	               $zone_project='["'.$project_name_text.'",'.$project_latitude.','.$project_longitude.']';

	               $latitude_s=$project_latitude;
	               $longitude_s=$project_longitude;

	        }else{
	               $zone_project=$zone_project.',["'.$project_name_text.'",'.$project_latitude.','.$project_longitude.']';
	        }
			  



     ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$ex_list_province' "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province=$rs_p['provinces_in_thai'];
                $project_province_en=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$ex_list_district' "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district=$rs_d['districts_in_thai'];
                $project_district_en=$rs_d['districts_in_english'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$ex_list_subdistrict' "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $project_subdistrict=$rs_s['subdistricts_in_thai'];
                $project_subdistrict_en=$rs_s['subdistricts_in_english'];
                $zip_code=$rs_s['zip_code'];



               if($province_id=='1'){
                     
                     $address= " แขวง".$project_subdistrict." ".$project_district." ".$project_province;

                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en;

               }else{

                       $address=" ตำบล".$project_subdistrict." อำเภอ".$project_district." จังหวัด".$project_province;

                      $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en; 
               }
           

            if($lang=='th'){
                 
 
                 $heading=$ex_list_heading;
                
                 $code=$ex_list_listing_code;
                
                if($project_id!='' and $project_id!='0'){ 


                    $project=$project_name;

                }else{

                    $project=$ex_list_listing_name;  

                }


                 $deal=$sale_text_th;
                 $address=$address;
				 $type=$type_th;

            }else{
                 
 

                if($project_id!='' and $project_id!='0'){ 


                    $project=$project_name_en;

                }else{
                	
                    $project=$ex_list_listing_name;

                }

                 $heading=$ex_list_heading_en;
              
                 $code=$ex_list_listing_code;
                 $deal=$sale_text_en;
                 $address=$address_en;
				 $type=$type_en;
            }

            if($num<=15 and $num=='3'){
 ?>


					<div class="col-xl-6 col-map">
						<div class="div-map"> 
							<div class="map-arr"></div>
                             <div id="map"></div>
						</div>
					</div>


 <?php 

            }else if($num<=15 and $num!='3'){ 
?>

					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
						
						<a href="<?php echo $part;?>property/<?php echo $_SESSION['lang'];?>/<?php echo $ex_list_listing_code;?>">
							<div class="condo-card">
							<div class="cover" style="background: url(<?php echo $img_name_list;?>);"> 
							</div>
							<div class="detail">
								<h4>฿<?php echo $price;?> <span><?php echo $type;?></span> </h4>
	
								<h5><?php echo $project;?> <span></span></h5>
	
								<h6><?php echo $address;?></h6>
							</div>
							<div class="option">
											<ul>
											    <li>
													<img src="<?php echo $part;?>images/22.png" alt="">
													<h6><?php echo $bedroom_title;?> <span><?php echo $ex_list_bedroom;?> </span></h6>
												</li>
												<li>
													<img src="<?php echo $part;?>images/11.png" alt="">
													<h6><?php echo $bathroom_title;?> <span><?php echo $ex_list_bathroom;?> </span></h6>
												</li>
										<!--		
												<li>
													<img src="images/33.png" alt="">
													<h6>รถไฟฟ้า <span>1</span></h6>
												</li>
												<li>
													<img src="images/44.png" alt="">
													<h6>ก่อสร้าง <span>เสร็จ</span></h6>
												</li>-->
												<!--
												<li>
													<img src="images/55.png" alt="">
													<h6>ที่ดิน <span>29</span> ตร.ว.</h6>
												</li> -->
												<!--
												<li>
													<img src="images/66.png" alt="">
													<h6>ที่จอดรถ <span><?php echo $ex_list_parking;?></span></h6>
												</li> -->
												<li>
													<img src="<?php echo $part;?>images/77.png" alt="">
													<h6><?php echo $floors_total_title;?> <span><?php echo $ex_list_floor;?></span></h6>
												</li>
												<li>
													<img src="<?php echo $part;?>images/88.png" alt="">
													<h6><?php echo $area_land_title;?> <span><?php echo $list_sqm;?></span> <?php echo $sqm_title;?></h6>
												</li>
											</ul>
							</div>
						</div>
						</a>
					</div>   
   <?php    } 
        }
}	
		?>

 	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html {
        height: 100%;
        margin: 0;
        padding: 0;
		text-align: center;
      }

      #map {
        height: 100%;
        width:100%;
      }
    </style>
   
  

<script>

		var locations = [
		 <?php echo $zone_project;?>
		];

      function initMap() {
			var mapOptions = {
			  center: {lat: <?php echo $latitude_s;?>, lng: <?php echo $longitude_s;?> },
			  zoom: 14,
			}
				
			var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
			
			var marker, i, info;

			for (i = 0; i < locations.length; i++) {  

				marker = new google.maps.Marker({
				   position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				   map: maps,
				   title: locations[i][0]
				});

				info = new google.maps.InfoWindow();

			  google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
				  info.setContent(locations[i][0]);
				  info.open(maps, marker);
				}
			  })(marker, i));

			}

		}
    </script>
  



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCFd7z_EUVLuusR62GaRWlZcAvEn0zR44&callback=initMap" async defer></script>

 	


					<div class="col-12 text-center mt-5 numx">
						<ul class="number-page">
			
			
			<?php if($page_no >1){  $last_page=$page_no-1;
				    echo "<li ><a href='$myurl$last_page' ><i class='far fa-angle-left';></i></a></li>";
			       } ?>
       
 	<?php 
    if ($total_no_of_pages <= 14){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a  >$counter</a></li>";  
                }else{
           echo "<li ><a href='$myurl$counter'   >$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 10) {         
     for ($counter = 1; $counter < 10; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a >$counter</a></li>";  
                }else{
           echo "<li ><a href='$myurl$counter'>$counter</a></li>";
                }
        }
        echo "<li ><a >...</a></li>";
        echo "<li ><a href='$myurl$second_last' >$second_last</a></li>";
        echo "<li ><a href='$myurl$total_no_of_pages' >$total_no_of_pages</a></li>";
        }

     elseif($page_no > 10 && $page_no < $total_no_of_pages - 10) {   
		$num_1='1'; $num_2='2';
		
        echo "<li ><a href='$myurl$num_1' >1</a></li>";
        echo "<li ><a href='$myurl$num_2'>2</a></li>";
        echo "<li ><a >...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a >$counter</a></li>";  
                }else{
           echo "<li ><a href='$myurl$counter'>$counter</a></li>";
                }                  
       }
       echo "<li ><a >...</a></li>";
       echo "<li ><a href='$myurl$second_last' >$second_last</a></li>";
       echo "<li ><a href='$myurl$total_no_of_pages'   >$total_no_of_pages</a></li>";      
            }
        
        else { $num_1='1'; $num_2='2'; $num_3='3'; $num_4='4'; 
        echo "<li ><a href='$myurl$num_1' >1</a></li>";
        echo "<li ><a href='$myurl$num_2' >2</a></li>";
		echo "<li ><a href='$myurl$num_3' >3</a></li>";
		echo "<li ><a href='$myurl$num_4' >4</a></li>";
        echo "<li ><a >...</a></li>";

        for ($counter = $total_no_of_pages - 10; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a >$counter</a></li>";  
                }else{
           echo "<li ><a href='$myurl$counter'  >$counter</a></li>";
                }                   
                }
            }
    }
?>
  
				  <li <?php if($page_no >= $total_no_of_pages){ echo "class='active disabled'"; } ?>>
					<a <?php if($page_no < $total_no_of_pages) { echo "href='$myurl$next_page'"; } ?> ><i class="far fa-angle-right"></i></a>
				 </li>

 
							
						</ul>
						<h6><?php echo $page_no." of ".$total_no_of_pages; ?>	</h6>
					</div>

				</div>
				 
				
			</div>
		</section>
 
<!--
		<section class="sec-home8">
			<div class="container-fluid"> 
				<div class="row justify-content-center">
					<div class="col-xl-10"> 
						<div class="row">
							<div class="col-xl-6">
								<div class="row">
									<div class="col-6 mb-5">
										<img src="images/r1.png" alt="" class="img-fluid m-auto d-block">
									</div>
									<div class="col-6 mb-5">
										<img src="images/r2.png" alt="" class="img-fluid m-auto d-block">
									</div>
									<div class="col-6">
										<img src="images/r3.png" alt="" class="img-fluid m-auto d-block">
									</div>
									<div class="col-6">
										<img src="images/r4.png" alt="" class="img-fluid m-auto d-block">
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<h1>ผลงานที่ผ่าน  <span>/  past work  </span></h1>
								<h6>Amet minim mollit non deserunt ullamco est...</h6>
								<p>
									Maxwell's equations—the foundation of classical electromagnetism—describe light as a wave that moves with a characteristic velocity. The modern view is that light needs no medium of transmission, but Maxwell and his contemporaries were convinced that light waves were propagated in a medium, analogous to sound propagating in air, and ripples propagating on the surface of a pond. This hypothetical medium was called the luminiferous aether, at rest relative to the "fixed stars" and through which the Earth moves. Fresnel's partial ether dragging hypothesis ruled out the measurement of first-order (v/c) effects, and although observations of second-order effects (v2/c2) were possible in principle, Maxwell thought they were too small to be detected with then-current technology.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="sec-home9">
			<div class="container-fluid">  
				<h1> ความประทับใจจากลูกค้า <b>/</b> <span>testimonial</span></h1>

				<div class="row justify-content-center">
					<div class="col-xl-10  ">
						<ul id="item9" class="item9">
							<li> 
								<div class="testimonial">
									<img src="images/user.png" alt="">
									<h4>Nulla facilisi. Mauris eu nunc sit amet orci euismod pretium eget at dui.</h4>
									<h6>Nullam sit amet</h6>
								</div> 
							</li>
							<li> 
								<div class="testimonial">
									<img src="images/user.png" alt="">
									<h4>Nulla facilisi. Mauris eu nunc sit amet orci euismod pretium eget at dui.</h4>
									<h6>Nullam sit amet</h6>
								</div> 
							</li>

							<li> 
								<div class="testimonial">
									<img src="images/user.png" alt="">
									<h4>Nulla facilisi. Mauris eu nunc sit amet orci euismod pretium eget at dui.</h4>
									<h6>Nullam sit amet</h6>
								</div> 
							</li>

							<li> 
								<div class="testimonial">
									<img src="images/user.png" alt="">
									<h4>Nulla facilisi. Mauris eu nunc sit amet orci euismod pretium eget at dui.</h4>
									<h6>Nullam sit amet</h6>
								</div> 
							</li>


						</ul>
					</div>
				</div>
 
			</div>
		</section>-->
 

		
	</main>


   <?php include("./include/footer.php"); ?>


	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

	<script>
		$('.deal-type li').click(function() {
			$('.deal-type li').removeClass("active");
			$(this).addClass("active");
		});

		$('.social-con').click(function() {
			$( this ).toggleClass( "active", 500, "easeInSine" );
			$(".social-con button i").toggleClass("fa-comment-lines fa-times"); 
		});

		$(".map-arr").click(function() {
            $(".map-arr").toggleClass("active"); 
            $(".col-map").toggleClass("active");
            $(".category-sec .col-xl-3").toggleClass("active");
            $(".category-sec .numx").toggleClass("active");

        }); 

		$(document).ready(function() {  
			$('#item9').lightSlider({
				item:2,
				loop:false,
				slideMove:1,
				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
				speed:600,
				responsive : [
					{
						breakpoint:1900,
						settings: {
							item:2,
							slideMove:1,
							slideMargin:6,
						}
					}, 
					{
						breakpoint:1200,
						settings: {
							item:2,
							slideMove:1,
							slideMargin:6,
						}
					}, 
					{
						breakpoint:800,
						settings: {
							item:1,
							slideMove:1,
							slideMargin:6,
						}
					}, 
					{
						breakpoint:480,
						settings: {
							item:1,
							slideMove:1
						}
					}
				]
			});   
		});

	</script>
		<?php
	
	mysqli_close($conn);
	$conn->free_result();  ?>
</body>
</html>
