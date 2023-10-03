<!DOCTYPE html>

<?php   session_start();  ?>
<?php   include ("./include/config.php"); ?>
<?php   include ("./setting.php");  

    $today=date("YmdHis");
    $lang=$_GET['lang'];

    $baseUrl = BASE_URL; 

	 $myurl="https://connex.in.th/sitemap/".$lang ;
	 $part="../../../";
 
    $url_th=$baseUrl."/sitemap/th";
    $url_en=$baseUrl."/sitemap/en";



 
	    if($lang=='th'){
              
              $title="แผนที่เว็บไซต์";
              $settings_title="แผนที่เว็บไซต์ | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";
              $settings_keyword="แผนที่เว็บไซต์ | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";
              $settings_description="แผนที่เว็บไซต์ | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";

              $head_sitemap1="หน้าหลักเว็บไซต์";
              $head_sitemap2="ประกาศ ขาย เช่า คอนโด บ้าน ที่ดิน ตามทำเล ทั่วประเทศ";
              $head_sitemap3="ประกาศ เช่า คอนโด ตามทำเล ทั่วประเทศ";
              $head_sitemap4="ประกาศ ขาย คอนโด ตามทำเล ทั่วประเทศ";
              $head_sitemap5="ประกาศ เช่า บ้าน ตามทำเล ทั่วประเทศ";
              $head_sitemap6="ประกาศ ขาย บ้าน ตามทำเล ทั่วประเทศ";
              $head_sitemap7="ขาย ให้เช่า คอนโด ใกล้รถไฟฟ้า";
              $head_sitemap8="ให้เช่า คอนโด ใกล้รถไฟฟ้า";
              $head_sitemap9="ขาย คอนโด ใกล้รถไฟฟ้า";

	    }else{

              $title="Sitemap";
              $settings_title="Sitemap | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";
              $settings_keyword="Sitemap | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";
              $settings_description="Sitemap | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";

              $img_list=$part."images/r1.png";
              

              $head_sitemap1="Main page";
              $head_sitemap2="Sell, Rent, Condo, House, Land, in Thailand";
              $head_sitemap3="Condo for rent by location";
              $head_sitemap4="Condo for sell by location";
              $head_sitemap5="House for rent by location";
              $head_sitemap6="House for sell by location";
              $head_sitemap7="Sell, Rent nearly BTS/MRT station";
              $head_sitemap8="Condo for Rent nearly BTS/MRT station";
              $head_sitemap9="Condo for Sell nearly BTS/MRT station";

	    }
 


?>

<style type="text/css">
.sitemap_bg{
 
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
  padding: 15px 100px;
  font-size: 12px; 
  background-color: #fff;
  font-family: SukhumvitSet-Bold;
  text-align: left;
  color: #000;
}
a:link ,a:visited ,a:hover ,a:active{
  color: #000;
}
.text_data{ 
   height: 20px;
}
</style>
<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo $part;?>css/bootstrap.css" />
    <link href="<?php echo  $part;?>css/main.css?v=<?php echo $today;?>" rel="stylesheet" type="text/css" />   
    <link rel="icon" type="image/x-icon" href="<?php echo $part;?>images/logo_icon.png"> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>  
	<title><?php echo $settings_title;?> </title>
    <meta name="author" content="Connex Property">
    <meta name="keywords" content="<?php echo $settings_keyword;?>">
    <meta name="description" content="<?php echo $settings_description;?> ">	

    <link rel="canonical" href="<?php echo $myurl;?> " />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $settings_title;?>" />
    <meta property="og:description" content="<?php echo $settings_description;?>" />
    <meta property="og:url" content="<?php echo $myurl;?>" />
    <meta property="og:site_name" content="Connex Property ขายบ้าน คอนโด" />
    <meta property="og:image" content="<?php echo $img_list;?>" />
    <meta name="twitter:card" content="Connex Property ขายบ้าน คอนโด" />
    <meta name="twitter:description" content="<?php echo $settings_description;?>" />
    <meta name="twitter:title" content="<?php echo $settings_title;?>" />
    <meta name="twitter:image" content="<?php echo $img_list;?>" />

  <?php include("./include/code_pixel.php");?>
  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>
<body>

   <?php include("./include/menu.php");?>

	<main class="main-bg">

		<div class="map-nav">
			<?php echo $link_home;?> / <?php echo $title;?>
		</div>
 

		<h1 class="h11"><?php echo $title;?></h1>
 
		<div class="sitemap_bg">
				<div class="row">
					<div class="col-xl-12 col-12">
						<h3><?php echo $head_sitemap1;?></h3>
						<hr>
					</div>
					<div class="col-xl-2 col-12"> 
					    <h4><a href="<?php echo $part;?><?php  if($lang=='en'){ echo "en"; } ?>"><?php echo $link_home;?></a></h4> 
					</div>
					<div class="col-xl-2 col-12">
					    <h4><a href="<?php echo $part;?>search/<?php echo $lang;?>/1/all/all/all/all/all/<?php echo $title_url_reset;?>/1"><?php echo $buy_title;?></h4>
						<div class="row">
                                    <?php

					                            $str_asset="SELECT id ,name ,name_en  FROM type_asset order by id ASC "; 
					                            $result_asset=$conn->query($str_asset);  
					                            while($rs_asset=$result_asset->fetch_assoc()) { 

					                              $asset_id=$rs_asset['id'];
					                              $asset_name=$rs_asset['name'];
					                              $asset_name_en=$rs_asset['name_en'];

					                                  if($lang=='th'){  
					                                       $asset_name=$asset_name;    
					                                  }else{ 
					                                      $asset_name=$asset_name_en;  
					                                  }
 

					                            $url=$baseUrl."/search/$lang/1/".$asset_id."/all/all/all/all/".$title_url_reset."/1";

					                            ?>
							 	<div class="col-xl-12 col-12 text_data">
							 		 <a href="<?php echo $url;?>" target="_black"><?php echo $asset_name;?></a>
							    </div>  
										  <?php } ?> 
						</div>
					</div>
					<div class="col-xl-2 col-12">
					    <h4><a href="<?php echo $part;?>search/<?php echo $lang;?>/2/all/all/all/all/all/<?php echo $title_url_reset;?>/1"><?php echo $rent_title;?></a></h4> 
						<div class="row">
                                    <?php

					                            $str_asset="SELECT id ,name ,name_en  FROM type_asset order by id ASC "; 
					                            $result_asset=$conn->query($str_asset);  
					                            while($rs_asset=$result_asset->fetch_assoc()) { 

					                              $asset_id=$rs_asset['id'];
					                              $asset_name=$rs_asset['name'];
					                              $asset_name_en=$rs_asset['name_en'];

					                                  if($lang=='th'){ 

					                                       $asset_name=$asset_name;   

					                                  }else{ 
					                                      $asset_name=$asset_name_en;  
					                                  }


					                            $url_station_name_en=str_replace(" ","-",$station_name_en ,$count);                   
					                            $url_station_name_en=strtolower($url_station_name_en); 

					                            $url=$baseUrl."/search/$lang/2/".$asset_id."/all/all/all/all/".$title_url_reset."/1";

					                            ?>
							 	<div class="col-xl-12 col-12 text_data">
							 		 <a href="<?php echo $url;?>" target="_black"><?php echo $asset_name;?></a>
							    </div>  
										  <?php } ?> 
						</div>
						
					</div>
					<div class="col-xl-2 col-12">
				         <h4><a href="<?php echo $part;?>consignment/<?php echo $lang;?>"><?php echo $sell_title;?></a></h4>
					</div>
					<div class="col-xl-2 col-12">
				         <h4><a href="<?php echo $part;?>content/<?php echo $lang;?>/1"><?php echo $new_title;?></a></h4>

					 

					</div> 
					<div class="col-xl-2 col-12">
				         <h4><a href="<?php echo $part;?>contact/<?php echo $lang;?>"><?php echo $contact_us_title;?></a></h4>
							 	<div class="col-xl-12 col-12 text_data">
							 		 <a href="https://www.facebook.com/connexprop" target="_black">FB Connex Property</a>
							    </div>
							 	<div class="col-xl-12 col-12 text_data">
							 		 <a href="https://line.me/R/ti/p/@636paefg" target="_black">Line Connex Property</a>
							    </div>
					</div> 
				</div> 
                <br><br> 
				<div class="row">
					<div class="col-xl-12 col-12">
						<h3><?php echo $head_sitemap2;?></h3>
						<hr>
					</div>

			   <?php 
					 $sql_zone="SELECT zone_g_id  ,zone_g_name ,zone_g_name_en ,search_g_id FROM type_zone_group order by zone_g_id ASC "; 
					 $result_zone=$conn->query($sql_zone);  
					 while($rs_zone=$result_zone->fetch_assoc()){ 

					      	$search_g_id=$rs_zone['search_g_id'];

	                    if($lang=='th'){
					      	$zone_name=$rs_zone['zone_g_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count); 
					      	$url=$baseUrl."/search/$lang/all/all/$search_g_id/all/all/all/".$url_zone."/1";
					    }else{
					      	$zone_name=$rs_zone['zone_g_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/all/all/$search_g_id/all/all/all/".$url_zone."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>"><?php echo $zone_name;?></a></p> 
					</div> 
			   <?php } ?> 


			   <?php 
					 $sql_zone="SELECT zone_id ,zone_name ,zone_name_en ,search_z_id FROM type_zone 
					           where zone_id>=46 order by zone_id ASC "; 
					 $result_zone=$conn->query($sql_zone);  
					 while($rs_zone=$result_zone->fetch_assoc()){ 

					      	$search_z_id=$rs_zone['search_z_id'];

	                    if($lang=='th'){
					      	$zone_name=$rs_zone['zone_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);    
                            $zone_name=iconv_substr($zone_name,0,100,'UTF-8');
					      	$url=$baseUrl."/search/$lang/all/all/$search_z_id/all/all/all/".$url_zone."/1";
					    }else{
					      	$zone_name=$rs_zone['zone_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/all/all/$search_z_id/all/all/all/".$url_zone."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>"><?php echo $zone_name;?></a></p> 
					</div> 
			   <?php } ?> 
				 
				</div>  
                <br><br>
				<div class="row">
					<div class="col-xl-12 col-12">
						<h3><?php echo $head_sitemap3;?></h3>
						<hr>
					</div>


			   <?php 
					 $sql_zone="SELECT zone_g_id  ,zone_g_name ,zone_g_name_en ,search_g_id FROM type_zone_group order by zone_g_id ASC "; 
					 $result_zone=$conn->query($sql_zone);  
					 while($rs_zone=$result_zone->fetch_assoc()){ 

					      	$search_g_id=$rs_zone['search_g_id'];


	                    if($lang=='th'){
					      	$zone_name="ให้เช่าคอนโด ".$rs_zone['zone_g_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/2/1/$search_g_id/all/all/all/".$url_zone."/1";
					    }else{
					      	$zone_name="Condo for Rent ".$rs_zone['zone_g_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/2/1/$search_g_id/all/all/all/".$url_zone."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>"><?php echo $zone_name;?></a></p> 
					</div> 
			   <?php } ?> 


			   <?php 
					 $sql_zone="SELECT zone_id ,zone_name ,zone_name_en ,search_z_id FROM type_zone 
					           where zone_id>=46 order by zone_id ASC "; 
					 $result_zone=$conn->query($sql_zone);  
					 while($rs_zone=$result_zone->fetch_assoc()){ 

					      	$search_z_id=$rs_zone['search_z_id'];

	                    if($lang=='th'){
					      	$zone_name="ให้เช่าคอนโด ".$rs_zone['zone_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/2/1/$search_z_id/all/all/all/".$url_zone."/1";
					    }else{
					      	$zone_name="Condo for Rent ".$rs_zone['zone_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/2/1/$search_z_id/all/all/all/".$url_zone."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>"><?php echo $zone_name;?></a></p> 
					</div> 
			   <?php } ?> 
				 
				</div>  
                <br><br>

				<div class="row">
					<div class="col-xl-12 col-12">
						<h3><?php echo $head_sitemap4;?></h3>
						<hr>
					</div>


			   <?php 
					 $sql_zone="SELECT zone_g_id  ,zone_g_name ,zone_g_name_en ,search_g_id FROM type_zone_group order by zone_g_id ASC "; 
					 $result_zone=$conn->query($sql_zone);  
					 while($rs_zone=$result_zone->fetch_assoc()){ 

					      	$search_g_id=$rs_zone['search_g_id'];

 
	                    if($lang=='th'){
					      	$zone_name="ขายคอนโด".$rs_zone['zone_g_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/1/1/$search_g_id/all/all/all/".$url_zone."/1";
					    }else{
					      	$zone_name="Condo for Sale ".$rs_zone['zone_g_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/1/1/$search_g_id/all/all/all/".$url_zone."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>"><?php echo $zone_name;?></a></p> 
					</div> 
			   <?php } ?> 

			   <?php 
					 $sql_zone="SELECT zone_id ,zone_name ,zone_name_en ,search_z_id FROM type_zone 
					            where zone_id>=46 order by zone_id ASC "; 
					 $result_zone=$conn->query($sql_zone);  
					 while($rs_zone=$result_zone->fetch_assoc()){ 

					      	$search_z_id=$rs_zone['search_z_id'];

	                    if($lang=='th'){
					      	$zone_name="ขายคอนโด".$rs_zone['zone_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/1/1/$search_z_id/all/all/all/".$url_zone."/1";
					    }else{
					      	$zone_name="Condo for Sale ".$rs_zone['zone_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/1/1/$search_z_id/all/all/all/".$url_zone."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>"><?php echo $zone_name;?></a></p> 
					</div> 
			   <?php } ?> 
				 
				</div> 
                <br><br>

				<div class="row">
					<div class="col-xl-12 col-12">
						<h3><?php echo $head_sitemap5;?></h3>
						<hr>
					</div>

			   <?php 
					 $sql_zone="SELECT zone_g_id  ,zone_g_name ,zone_g_name_en ,search_g_id FROM type_zone_group order by zone_g_id ASC "; 
					 $result_zone=$conn->query($sql_zone);  
					 while($rs_zone=$result_zone->fetch_assoc()){ 

					      	$search_g_id=$rs_zone['search_g_id'];

 
	                    if($lang=='th'){
					      	$zone_name="ให้เช่าบ้าน ".$rs_zone['zone_g_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/2/2/$search_g_id/all/all/all/".$url_zone."/1";
					    }else{
					      	$zone_name="House for Rent ".$rs_zone['zone_g_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/2/2/$search_g_id/all/all/all/".$url_zone."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>"><?php echo $zone_name;?></a></p> 
					</div> 
			   <?php } ?> 


			   <?php 
					 $sql_zone="SELECT zone_id ,zone_name ,zone_name_en ,search_z_id FROM type_zone 
					            where zone_id>=46 order by zone_id ASC "; 
					 $result_zone=$conn->query($sql_zone);  
					 while($rs_zone=$result_zone->fetch_assoc()){ 

					      	$search_z_id=$rs_zone['search_z_id'];

	                    if($lang=='th'){
					      	$zone_name="ให้เช่าบ้าน ".$rs_zone['zone_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/2/2/$search_z_id/all/all/all/".$url_zone."/1";
					    }else{
					      	$zone_name="House for Rent ".$rs_zone['zone_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/2/2/$search_z_id/all/all/all/".$url_zone."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>"><?php echo $zone_name;?></a></p> 
					</div> 
			   <?php } ?> 
				 
				</div>  
                <br><br>

				<div class="row">
					<div class="col-xl-12 col-12">
						<h3><?php echo $head_sitemap6;?></h3>
						<hr>
					</div>

			   <?php 
					 $sql_zone="SELECT zone_g_id  ,zone_g_name ,zone_g_name_en ,search_g_id FROM type_zone_group order by zone_g_id ASC "; 
					 $result_zone=$conn->query($sql_zone);  
					 while($rs_zone=$result_zone->fetch_assoc()){ 

					      	$search_g_id=$rs_zone['search_g_id'];
  
	                    if($lang=='th'){
					      	$zone_name="ขายบ้าน".$rs_zone['zone_g_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/1/1/$search_g_id/all/all/all/".$url_zone."/1";
					    }else{
					      	$zone_name="House for Sale ".$rs_zone['zone_g_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/1/1/$search_g_id/all/all/all/".$url_zone."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>" ><?php echo $zone_name;?></a></p> 
					</div> 
			   <?php } ?> 

			   <?php 
					 $sql_zone="SELECT zone_id ,zone_name ,zone_name_en ,search_z_id FROM type_zone 
					            where zone_id>=46 order by zone_id ASC "; 
					 $result_zone=$conn->query($sql_zone);  
					 while($rs_zone=$result_zone->fetch_assoc()){ 

					      	$search_z_id=$rs_zone['search_z_id'];

	                    if($lang=='th'){
					      	$zone_name="ขายบ้าน".$rs_zone['zone_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/1/1/$search_z_id/all/all/all/".$url_zone."/1";
					    }else{
					      	$zone_name="House for Sale ".$rs_zone['zone_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
					      	$url=$baseUrl."/search/$lang/1/1/$search_z_id/all/all/all/".$url_zone."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>" ><?php echo $zone_name;?></a></p> 
					</div> 
			   <?php } ?> 
				 
				</div> 
                <br><br>

				<div class="row">
					<div class="col-xl-12 col-12">
						<h3><?php echo $head_sitemap7;?></h3>
						<hr>
					</div>

			   <?php 
					 $sql_station="SELECT * FROM type_train_station order by station_id ASC "; 
					 $result_station=$conn->query($sql_station);  
					 while($rs_station=$result_station->fetch_assoc()){ 

					      	$search_s_id=$rs_station['search_s_id'];
					      	$tr_group=$rs_station['tr_group'];
					      	$station_name_en=$rs_station['station_name_en'];
					      	$station_name=$rs_station['station_name'];

	                    if($lang=='th'){
	                    	$tr_station=$tr_group."-".$station_name;
	                    	$tr_station_title="ขาย ให้เช่า คอนโด ใกล้ ".$tr_group." ".$station_name; 
                            $url_station=str_replace(" ","-",$tr_station ,$count);   
					      	$url=$baseUrl."/search/$lang/all/all/$search_s_id/all/all/all/".$url_station."/1";
					    }else{
					    	$tr_station=$tr_group."-".$station_name_en;
					    	$tr_station_title="Sale, Rent nearly ".$tr_group." ".$station_name_en; 
                            $url_station=str_replace(" ","-",$tr_station ,$count);   
					      	$url=$baseUrl."/search/$lang/all/all/$search_s_id/all/all/all/".$url_station."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black"  title="<?php echo $tr_station_title;?>"><?php echo $tr_station_title;?></a></p> 
					</div> 
			   <?php } ?> 
				 
				</div>  
                <br><br>

				<div class="row">
					<div class="col-xl-12 col-12">
						<h3><?php echo $head_sitemap8;?></h3>
						<hr>
					</div>

			   <?php 
					 $sql_station="SELECT * FROM type_train_station order by station_id ASC "; 
					 $result_station=$conn->query($sql_station);  
					 while($rs_station=$result_station->fetch_assoc()){ 

					      	$search_s_id=$rs_station['search_s_id'];
					      	$tr_group=$rs_station['tr_group'];
					      	$station_name_en=$rs_station['station_name_en'];
					      	$station_name=$rs_station['station_name'];

	                    if($lang=='th'){
	                    	$tr_station=$tr_group."-".$station_name;
	                    	$tr_station_title="ให้เช่า คอนโด ใกล้ ".$tr_group." ".$station_name; 
                            $url_station=str_replace(" ","-",$tr_station ,$count);   
					      	$url=$baseUrl."/search/$lang/2/1/$search_s_id/all/all/all/".$url_station."/1";
					    }else{
					    	$tr_station=$tr_group."-".$station_name_en;
					    	$tr_station_title="Condo for rent nearly ".$tr_group." ".$station_name_en; 
                            $url_station=str_replace(" ","-",$tr_station ,$count);   
					      	$url=$baseUrl."/search/$lang/2/1/$search_s_id/all/all/all/".$url_station."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $tr_station_title;?>"><?php echo $tr_station_title;?></a></p> 
					</div> 
			   <?php } ?> 
				 
				</div>  
                <br><br>

				<div class="row">
					<div class="col-xl-12 col-12 ">
						<h3><?php echo $head_sitemap9;?></h3>
						<hr>
					</div>

			   <?php 
					 $sql_station="SELECT * FROM type_train_station order by station_id ASC "; 
					 $result_station=$conn->query($sql_station);  
					 while($rs_station=$result_station->fetch_assoc()){ 

					      	$search_s_id=$rs_station['search_s_id'];
					      	$tr_group=$rs_station['tr_group'];
					      	$station_name_en=$rs_station['station_name_en'];
					      	$station_name=$rs_station['station_name'];

	                    if($lang=='th'){
	                    	$tr_station=$tr_group."-".$station_name;
	                    	$tr_station_title="ขาย คอนโด ใกล้ ".$tr_group." ".$station_name; 
                            $url_station=str_replace(" ","-",$tr_station ,$count);   
					      	$url=$baseUrl."/search/$lang/1/1/$search_s_id/all/all/all/".$url_station."/1";
					    }else{
					    	$tr_station=$tr_group."-".$station_name_en;
					    	$tr_station_title="Condo for Sale nearly ".$tr_group." ".$station_name_en; 
                            $url_station=str_replace(" ","-",$tr_station ,$count);   
					      	$url=$baseUrl."/search/$lang/1/1/$search_s_id/all/all/all/".$url_station."/1";
					    }
			    ?> 
					<div class="col-xl-3 col-12 text_data"> 
					      <p class="text_data"><a href="<?php echo $url;?>" target="_black" title="<?php echo $tr_station_title;?>"><?php echo $tr_station_title;?></a></p> 
					</div> 
			   <?php } ?> 
				 
				</div>  
                <br><br>

	    </div>
 
  



		
	</main>

 
   <?php include("./include/footer.php"); ?>



	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>

    $('.deal-type li').click(function() {
      $('.deal-type li').removeClass("active");
      $(this).addClass("active");
    });
    // $('.social-con').click(function() { 
    //  $(this).toggleClass("active");
    // }); 
    
    $('.social-con').click(function() {
      $( this ).toggleClass( "active", 500, "easeInSine" );
      $(".social-con button i").toggleClass("fa-comment-lines fa-times"); 
    });
</script>
	 
</body>
</html>
