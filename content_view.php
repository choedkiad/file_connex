<!DOCTYPE html>

<?php   session_start();  ?>
<?php   include ("./include/config.php"); ?>
<?php   include ("./setting.php");

       $today=date("YmdHis");

       $myurl="https://connex.in.th/content_view/".$lang."/".$id;

       $part="../../";
 
 

		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		     $sql="SELECT * FROM dbo_data_content where data_content_url='".$id."' or data_content_url_en='".$id."'  ";
		     $result=$conn->query($sql); 
    	  // output data of each row
            if($result->num_rows > 0) {

	              $rs=$result->fetch_assoc(); 

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
               
                 $url_th="https://connex.in.th/content_view/th/".$data_content_url;
            	 $url_en="https://connex.in.th/content_view/en/".$data_content_url_en;       

	            if($lang=='th'){ 

	                 $heading=$data_content_title; 
	                 $detail=$data_content_detail; 
	                 $settings_title=$data_content_meta_title;
	                 $settings_keyword=$data_content_meta_keyword;
	                 $settings_description=$data_content_meta_description;
	     
	                 $img_name_list="../../images/content/".$data_content_img;

	            }else{ 
	            
	                 $heading=$data_content_title_en; 
	                 $detail=$data_content_detail_en; 
	                 $img_name_list="../../images/content/".$data_content_img;

	                 $settings_title=$data_content_meta_keyword_en;
	                 $settings_keyword=$data_content_meta_keyword_en;
	                 $settings_description=$data_content_meta_description_en;
	                 
	            }

	        }else{
                 echo("<script> top.location.href='https://www.connex.in.th/error/th'</script>"); 
	        }
 

 ?>

<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo $part;?>css/bootstrap.css?v=<?php echo $today;?>" />

 <?php if($device=="pc"){ ?> 
    <link href="<?php echo  $part;?>css/main.css?v=<?php echo $today;?>" rel="stylesheet" type="text/css" />   
    
 <?php }else{ ?>
    <link href="<?php echo  $part;?>css/main_mobile.css?v=<?php echo $today;?>" rel="stylesheet" type="text/css" />     
 <?php } ?>
    <link rel="icon" type="image/x-icon" href="<?php echo  $part;?>images/logo_icon.webp"> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>  
	  <title><?php echo $settings_title;?> </title>
    <meta name="author" content="Connex Property">
    <meta name="keywords" content="ขายบ้านเดี่ยว,ขายคอนโดมิเนียม,ขายทาวน์โฮม,ขายที่ดิน">
    <meta name="description" content="<?php echo $settings_description;?> | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ">	

   <link rel="canonical" href="<?php echo $myurl;?> " />
   <meta property="og:locale" content="en_US" />
   <meta property="og:type" content="website" />
   <meta property="og:title" content="<?php echo $settings_title;?>" />
   <meta property="og:description" content="<?php echo $settings_description;?>" />
   <meta property="og:url" content="<?php echo $myurl;?>" />
   <meta property="og:site_name" content="Connex Property ขายบ้าน คอนโด" />
   <meta property="og:image" content="<?php echo $img_name_list;?>" />
   <meta name="twitter:card" content="Connex Property ขายบ้าน คอนโด" />
   <meta name="twitter:description" content="<?php echo $settings_description;?>" />
   <meta name="twitter:title" content="<?php echo $settings_title;?>" />
   <meta name="twitter:image" content="<?php echo $img_name_list;?>" />
 

  <?php include("./include/code_pixel.php");?>
  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
	 

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" />
</head>
<body>

   <?php include("./include/menu.php");?>

	<main>

		<div class="map-nav">
			 <a href="<?php echo $part;?>" class="link_nav" ><?php echo $link_home;?></a> / <span><?php echo $heading;?></span>
		</div>  
<!--
		<div class="social-con">
			<a href="#">
				<img src="images/sc1.webp" alt="">
			</a>
			<a href="#">
				<img src="images/sc2.webp" alt="">
			</a>
			<a href="#">
				<img src="images/sc3.webp" alt="">
			</a>
			<a href="#">
				<img src="images/sc4.webp" alt="">
			</a>
		</div>

-->

		<section class="sec-home1">
			<div class="container-fluid">
				<div class="home1">
					<h1><?php echo $heading;?></h1>
					<!--<h3><?php echo $home_heading_h2;?></h3>-->

 
        <!-- <form method="post" id="form1" enctype="multipart/form-data" action="../../include/process_search.php "  > -->

					<!-- <input type="text" name="search_s" id="" class="form-control" placeholder="<?php echo $search_title;?> "> -->
 
 
				</div>

   

			</div>
		</section>  

		<section class="container-fluid" style="padding: 15px;">
			<div class="row justify-content-center">
				<div class="col-xl-10"> 
				
					<div class="row main-description">
						<div class="col-xl-9">
							<h2><?php echo $heading;?></h2>
                               <center><img style="width: 100%;" src="<?php echo $img_name_list;?>" alt="<?php echo $settings_title;?>" ></center>
                               <br>
							<p><?php echo $detail;?> </p>

 
 
							 
						</div>
						
						<div class="col-xl-3">
							<div class="information">
								<h3><?php echo $more_information_title;?></h3>

                          <form   action="../../include/process_contact.php"  enctype="multipart/form-data" method="post" >

			                <input type="text" class="form-control-textbox" id="name" hidden  value="detail" name="contact_page" >

			                <input type="text" class="form-control-textbox" id="name" hidden  value="<?php echo $myurl;?>" name="contact_url" >

			                <input type="text" class="form-control-textbox" id="name" hidden  value="<?php echo $metatitle;?>" name="contact_heading" >

									<div class="form-group row">
										<div class="col-lg-12">
											<input type="text" class="form-control"  placeholder="<?php echo $name_contact_title;?>" name="contact_name" required >
										</div> 
									</div>
									<div class="form-group row"> 
										<div class="col-lg-12">
											<input type="text" class="form-control" placeholder="<?php echo $lastname_contact_title;?>" name="contact_last" required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-lg-12">
											<input type="email" class="form-control" placeholder="<?php echo $email_contact_title;?>" name="contact_email" required>
										</div> 
									</div>
									<div class="form-group row">
										<div class="col-lg-12">
											<input type="text" class="form-control" placeholder="<?php echo $tel_contact_title;?>" name="contact_tel" required>
										</div> 
									</div>
									<div class="form-group row">
										<div class="col-lg-12">
											<textarea name="contact_detail" id="" cols="30" class="form-control" placeholder="<?php echo $message_contact_title;?>"  ></textarea>
										</div> 
									</div>
					 
                                      <button  type="submit" class="btn"><?php echo $send_message_title;?></button>
									
									<h2>หรือ</h2>

									
									<a href="tel:0990199900" class="btn btn-social"> <img src="<?php echo $part;?>images/dd1.webp" alt="เบอร์โทรศัพท์"> +66 99-019-9900</a> 
									<a href="https://line.me/ti/p/@connexproperty" target="_black" class="btn btn-social"> <img src="<?php echo $part;?>images/dd2.webp" alt="ไลน์"> @connexproperty</a> 
									<a href="https://m.me/177735605724407" class="btn btn-social"> <img src="<?php echo $part;?>images/dd3.webp" alt="FB Messenger"> FB Messenger</a>
									<a href="https://wa.me/+66990199900" class="btn btn-social"> <img src="<?php echo $part;?>images/dd4.webp" alt="WhatsApp"> WhatsApp</a>
									
								</form>
							</div>
						</div>
  
					</div> 
				</div>
			</div>
		</section>
 
		
	</main>

 <?php include("./include/footer.php"); ?>
 
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"  ></script>
 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js"></script>

	<script>
		$('.carousel').carousel({
			interval: 5000000
		})

		$('.box-view .box-view-type').click(function() {    
			$('#viewImg').modal('show'); 
			$('#viewImg ul li .nav-link').removeClass('active');
			$('#viewImg ul li .nav-link.'+$(this).attr("data-tab")).addClass('active');    
			$('#viewImg .tab-content .tab-pane').removeClass('in active');
			$('#viewImg .tab-content .tab-pane#'+$(this).attr("data-tab")).addClass('in active show');

			
		});

		$('.img-view').click(function() {     
			$('#viewImg').modal('show'); 

			$('#viewImg .nav .nav-item a').removeClass('active');
			$('#viewImg .nav .nav-item a.photo').addClass('active'); 
			$('#viewImg .tab-content .tab-pane').removeClass('in active');
			$('#viewImg .tab-content .tab-pane#photo').addClass('in active show');
		});

		$('.img-view-sub div').click(function() {    
			$('#viewImg').modal('show'); 
			$('#viewImg .nav .nav-item a').removeClass('active');
			$('#viewImg .nav .nav-item a.photo').addClass('active'); 
			$('#viewImg .tab-content .tab-pane').removeClass('in active');
			$('#viewImg .tab-content .tab-pane#photo').addClass('in active show');  
			$('#viewImg .carousel-inner .carousel-item').removeClass('active');
			$('#viewImg .carousel-inner .carousel-item#'+$(this).attr("data-num")).addClass('active'); 
		});


		var ctx = document.getElementById("doughnut");
			var doughnut = new Chart(ctx, {
			type: 'doughnut',
			data: { 
				datasets: [{
				label: '# of Tomatoes',
				data: [75, 25],
				backgroundColor: [
					'#1F4D8E',
					'#FFB800', 
				], 
				borderWidth: 0
				}]
			},
			options: {
				//cutoutPercentage: 40,
				responsive: false,

			}
		});
 
		$('.btn-sel').click(function() { 
			$(".btn-sel").removeClass("active");
			$(this).addClass("active");
		});

		$(document).scroll(function() {
			if ( $(document).scrollTop() < 900 ) { 
				$(".information").removeClass("active");
			} 
			else if ( $(document).scrollTop() >= 900 && $(document).scrollTop() <= 2000 ) {
				$(".information").addClass("active"); 
			}
			else if ( $(document).scrollTop() >= 2000 ) { 
				$(".information").removeClass("active");
			}
		});

 

 

	</script>
 

</body>
</html>
