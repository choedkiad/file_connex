<!DOCTYPE html>


<?php   session_start();  ?>
<?php   include ("./include/config.php"); ?>
<?php   include ("./setting.php"); 

    $today=date("YmdHis");

    $part="../../../";
    $myurl="https://connex.in.th/content/".$lang."/";

    $myurl_check="https://connex.in.th/content/".$lang."/".$page_no;

    $url_th="https://connex.in.th/content/th/".$page_no;
    $url_en="https://connex.in.th/content/en/".$page_no;


        $img_list="https://connex.in.th/images/bg1.webp";


		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		

	    if($lang=='th'){
              
              $title_content="บทความ";
              $settings_title="บทความ  บ้าน คอนโด ทาวน์โฮม ทาวน์เฮ้าส์ ที่ดิน | Connex Property";
              $settings_keyword="บทความ";
              $settings_description="บทความ ข่าวสาร เกียวกับอสังหาริมทรัพย์ บ้าน คอนโด ทาวน์โฮม ทาวน์เฮ้าส์ ที่ดิน โดย Connex Property";



	    }else{

              $title_content="News";
              $settings_title="News";
              $settings_keyword="News";
              $settings_description="News";



	    }

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
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo  $part;?>css/bootstrap.css?v=<?php echo $today;?>" />

 <?php if($device=="pc"){ ?> 
    <link href="<?php echo  $part;?>css/main.css?v=<?php echo $today;?>" rel="stylesheet" type="text/css" />   
    
 <?php }else{ ?>
    <link href="<?php echo  $part;?>css/main_mobile.css?v=<?php echo $today;?>" rel="stylesheet" type="text/css" />     
 <?php } ?>
   
    <link rel="icon" type="image/x-icon" href="<?php echo  $part;?>images/logo_icon.webp"> 
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

  <?php include("./include/code_pixel.php");?>
  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

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
 
			<a href="<?php echo $part;?>" class="link_nav"><?php echo $link_home;?></a> / <?php echo $title_content;?>
		</div>



		<section class="sec-home1">
			<div class="container-fluid">
				<div class="home1">
					<h1><?php echo $title_content;?></h1>
					<h3><?php echo $new_des;?></h3>

 
        <!-- <form method="post" id="form1" enctype="multipart/form-data" action="../../include/process_search.php "  > -->

					<!-- <input type="text" name="search_s" id="" class="form-control" placeholder="<?php echo $search_title;?> "> -->

    

 
				</div>

   

			</div>
		</section>  





		<section class="sec-content-slides"> 
			<div class="container-fluid">	
				<div class="row justify-content-center">
					<div class="col-xl-10">  
						<ul id="item3" class="item3">

 
 <?php   

         $sql="SELECT * FROM dbo_data_content  order by data_content_date DESC  ";  
         $result = $conn->query($sql); 
    	  // output data of each row
         while($rs= $result->fetch_assoc()){       
              

              $data_content_id=$rs['data_content_id'];
              $data_content_title=$rs['data_content_title'];
              $data_content_detail=$rs['data_content_detail'];
              $data_content_meta_title=$rs['data_content_meta_title'];
              $data_content_meta_keyword=$rs['data_content_meta_keyword'];
              $data_content_meta_description=$rs['data_content_meta_description'];
              $data_content_img=$rs['data_content_img']; 
              $data_content_url=$rs['data_content_url'];
              $data_content_date=$rs['data_content_date'];
              $data_content_highlight=$rs['data_content_highlight'];
              
              $data_content_title_en=$rs['data_content_title_en'];
              $data_content_detail_en=$rs['data_content_detail_en'];
              $data_content_meta_title_en=$rs['data_content_meta_title_en'];
              $data_content_meta_keyword_en=$rs['data_content_meta_keyword_en'];
              $data_content_meta_description_en=$rs['data_content_meta_description_en'];
              $data_content_img_en=$rs['data_content_img_en']; 
              $data_content_url_en=$rs['data_content_url_en'];
 

            if($lang=='th'){
                 
 
                 $heading=$data_content_title; 
                 $detail=$data_content_meta_description; 
                 $url=$data_content_url;
     
                 $img_name_list="../../images/content/".$data_content_img;
             

            }else{

                 $img_name_list="../../images/content/".$data_content_img;
	             $settings_title=$rs_zone['data_content_title_en'];
                 $url=$data_content_url_en;

                 $heading=$data_content_title_en; 
                 $detail=$data_content_meta_description_en; 
                 $img_name_list="../../images/content/".$data_content_img;


            }
 
 ?>


							<li>
								<a href="<?php echo $part;?>content_view/<?php echo $lang;?>/<?php echo $url;?>">
									<div class="content-slides-card">
										<div class="cover" >  
							            	<img src="<?php echo $img_name_list;?>" class="coverimg" alt="<?php echo $heading;?>" title="<?php echo $heading;?>" >

										</div>
										<!--
										<div class="detail">
											<div class="detail_1"><?php echo $heading;?></div>
				 
										</div>-->
										 
									</div>
								</a>
							</li>
					 
   <?php } ?>

						</ul> 
					</div>
				</div>
			</div>
	    </section> 



		<section class="content-sec"  > 

			<div class="col-xl-9">
				<div class="row">
					<div class="col-xl-8">
						<h1 class="h1x">  <span><?php echo $title_content;?></span></h1>


            
					<!--
					<div class="col-xl-4 col-lg-4 text-right">
						<span class="mb-x"><br><br></span>

						<select class="selectpicker form-control mt-4 detailx" title="เรียงตาม: เราแนะนำ" data-show-subtext="true" data-live-search="true" name="sel1" id="sel1"  > 
							<option>เพิ่มเติม</option> 
							<option>เพิ่มเติม</option> 
							<option>เพิ่มเติม</option> 
							<option>เพิ่มเติม</option> 
							<option>เพิ่มเติม</option> 
						</select>
					</div>-->
				    </div>
      


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


  
 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM dbo_data_content  order by data_content_date DESC ");


    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1


$sql="SELECT * FROM dbo_data_content  order by data_content_date DESC  LIMIT $offset, $total_records_per_page ";  
$result = $conn->query($sql);



if($result->num_rows > 0) {
	// output data of each row
	 while($rs=$result->fetch_assoc()) { $num++;

              $data_content_id=$rs['data_content_id'];
              $data_content_title=$rs['data_content_title'];
              $data_content_detail=$rs['data_content_detail'];
              $data_content_meta_title=$rs['data_content_meta_title'];
              $data_content_meta_keyword=$rs['data_content_meta_keyword'];
              $data_content_meta_description=$rs['data_content_meta_description'];
              $data_content_img=$rs['data_content_img']; 
              $data_content_url=$rs['data_content_url'];
              $data_content_date=$rs['data_content_date'];
              $data_content_highlight=$rs['data_content_highlight'];
              
              $data_content_title_en=$rs['data_content_title_en'];
              $data_content_detail_en=$rs['data_content_detail_en'];
              $data_content_meta_title_en=$rs['data_content_meta_title_en'];
              $data_content_meta_keyword_en=$rs['data_content_meta_keyword_en'];
              $data_content_meta_description_en=$rs['data_content_meta_description_en'];
              $data_content_img_en=$rs['data_content_img_en']; 
              $data_content_url_en=$rs['data_content_url_en'];
 

            if($lang=='th'){
                 
 
                 $heading=$data_content_title; 
                 $detail=$data_content_meta_description; 
                 $url=$data_content_url;
     
                 $img_name_list="../../images/content/".$data_content_img;
             

            }else{

                 $img_name_list="../../images/content/".$data_content_img;
	             $settings_title=$rs_zone['data_content_title_en'];
                 $url=$data_content_url_en;

                 $heading=$data_content_title_en; 
                 $detail=$data_content_meta_description_en; 
                 $img_name_list="../../images/content/".$data_content_img;


            }
        
 ?>

					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
						
						<a href="<?php echo $part;?>content_view/<?php echo $lang;?>/<?php echo $url;?>">
							<div class="content-card">
							<div class="cover"> 
								<img src="<?php echo $img_name_list;?>" class="cover-img" alt="<?php echo $heading;?>" title="<?php echo $heading;?>" >
							</div>
							<div class="detail"><br>
								<!--<h4>฿<?php echo $price;?> <span><?php echo $type;?></span> </h4>-->
	
								<h5><?php echo $heading;?><span></span></h5>
                         		<h6><?php echo $detail;?></h6>							 
							</div>
							 
						</div>
						</a>
					</div>   
   <?php   
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






	<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
	 
	<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


	<script>
		$('.deal-type li').click(function() {
			$('.deal-type li').removeClass("active");
			$(this).addClass("active");
		});
		// $('.social-con').click(function() { 
		// 	$(this).toggleClass("active");
		// }); 
		
        document.body.style.visibility = "visible";

		$('.social-con').click(function() {
			$( this ).toggleClass( "active", 500, "easeInSine" );
			$(".social-con button i").toggleClass("fa-comment-lines fa-times"); 
		});

		$(document).ready(function() { 

			$('#item2').lightSlider({
				item:4,
				loop:false,
				slideMove:1,
				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
				speed:600,
				responsive : [
					{
						breakpoint:1900,
						settings: {
							item:4,
							slideMove:1,
							slideMargin:6,
						}
					}, 
					{
						breakpoint:1200,
						settings: {
							item:3,
							slideMove:1,
							slideMargin:6,
						}
					}, 
					{
						breakpoint:800,
						settings: {
							item:2,
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

        	$('#item3').lightSlider({
				item:3,
				loop:false,
				slideMove:1,
				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
				speed:600,
				responsive : [ 
					{
						breakpoint:3500,
						settings: {
							item:4 
						}
					}, 
					{
						breakpoint:2100,
						settings: {
							item:3 
						}
					},
					{
						breakpoint:1700,
						settings: {
							item:3 
						}
					},   
					{
						breakpoint:1500,
						settings: {
							item:2
						}
					},
					{
						breakpoint:1450,
						settings: {
							item:2
						}
					},
					{
						breakpoint:800,
						settings: {
							item:2 
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
			$('#item4').lightSlider({
				item:3,
				loop:false,
				slideMove:1,
				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
				speed:600,
				responsive : [ 
					{
						breakpoint:3500,
						settings: {
							item:4 
						}
					}, 
					{
						breakpoint:2100,
						settings: {
							item:3 
						}
					},
					{
						breakpoint:1700,
						settings: {
							item:3 
						}
					},   
					{
						breakpoint:1500,
						settings: {
							item:2
						}
					},
					{
						breakpoint:1450,
						settings: {
							item:2
						}
					},
					{
						breakpoint:800,
						settings: {
							item:2 
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
			$('#item5').lightSlider({
				item:3,
				loop:false,
				slideMove:1,
				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
				speed:600,
				responsive : [ 
					{
						breakpoint:3500,
						settings: {
							item:4 
						}
					}, 
					{
						breakpoint:2100,
						settings: {
							item:3 
						}
					},
					{
						breakpoint:1700,
						settings: {
							item:3 
						}
					},   
					{
						breakpoint:1500,
						settings: {
							item:2
						}
					},
					{
						breakpoint:1450,
						settings: {
							item:2
						}
					},
					{
						breakpoint:800,
						settings: {
							item:2 
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
			$('#item7').lightSlider({
				item:4,
				loop:false,
				slideMove:1,
				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
				speed:600,
				responsive : [
					{
						breakpoint:1900,
						settings: {
							item:4,
							slideMove:1,
							slideMargin:6,
						}
					}, 
					{
						breakpoint:1200,
						settings: {
							item:3,
							slideMove:1,
							slideMargin:6,
						}
					}, 
					{
						breakpoint:800,
						settings: {
							item:2,
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

		$('#item_box2.carousel').carousel({
			interval: 500000,
			wrap: false 
		})
		 
	</script>
 

		<?php
	
	mysqli_close($conn);
	$conn->free_result();  ?>
</body>
</html>
