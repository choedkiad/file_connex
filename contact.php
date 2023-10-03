<!DOCTYPE html>

<?php   session_start();  ?>
<?php   include ("./include/config.php"); ?>
<?php   include ("./setting.php");  

    $today=date("YmdHis");
    $lang=$_GET['lang'];

	 $myurl="https://connex.in.th/contact/".$lang ;
	 $part="../../../";
 
    $url_th="https://connex.in.th/contact/th";
    $url_en="https://connex.in.th/contact/en";



 
	    if($lang=='th'){
              
              $title="ติดต่อเรา";
              $settings_title="ติดต่อเรา | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";
              $settings_keyword="ติดต่อเรา | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";
              $settings_description="ติดต่อเรา | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";

              $img_list=$part."images/r1.webp";
              
              $contact_title_1="หากคุณมีคำถามใด ๆ  <br> โปรดอย่าลังเลที่จะส่งข้อความถึงเรา ";
              $office_title="สำนักงานของเรา";
              $company_title="บริษัท คอนเน็ค พร็อพเพอร์ตี้ จํากัด";
              $location_title="588 หมู่ที่ 4 ตำบลบางขุนกอง อำเภอบางกรวย จ.นนทบุรี 11130";


	    }else if($lang=='en'){

              $title="Contact Us";
              $settings_title="Contact Us | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";
              $settings_keyword="Contact Us | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";
              $settings_description="Contact Us | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";

              $img_list=$part."images/r1.webp";
              

              $contact_title_1="It you have any questions , Please feel Free to contact us !";
              $office_title="Our Office";
              $company_title="CONNEX PROPERTY CO., LTD.";
              $location_title="588 Bang Khun Kong , Bang Kruai , Nonthaburi 11130";


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
    <link rel="icon" type="image/x-icon" href="<?php echo $part;?>images/logo_icon.webp"> 
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
			<a href="<?php echo $part;?>" class="link_nav" ><?php echo $link_home;?></a> / <?php echo $title;?>
		</div> 

		<section class="sec-contact" >
			<div class="container-fluid"> 

	         	<h1 ><?php echo $title;?></h1>

				<div class="row justify-content-center">
					<div class="col-xl-10"> 
						<div class="row">
							<div class="col-xl-7 col-sm-12" >
								<div class="contact_img">
								   <img src="<?php echo $part;?>images/contact.webp?v=22" class="contact_img_1" alt="connex property" title="connex property" > 
								</div>
							</div>
							<div class="col-xl-5 col-sm-12" > 
                                 <div class="contact_text">
                                 	 <img src="<?php echo $part;?>images/logo_contact.webp" class="contact_logo"  alt="connex property" title="connex property"   style="width: 100%;"  >
                                 	 <h2>CONNEX PROPERTY <br> สนใจซื้อ-ขายบ้าน ปรึกษาฟรี! <br>ทีมงานมืออาชีพ</h2>
						             <div class="row">

						         <?php if($device=='pc'){ ?> 

				  			            <div class="col-4 contact_tel" target="_black"  >
				  			            	<a href="tel:0990199900" target="_black" class="link_nav">
				  			            		<img src="<?php echo $part;?>images/icon/icon_tel.webp?v=22" alt="เบอร์โทรศัพท์" title="เบอร์โทรศัพท์" >
				  			            	  099-019-9900</a>  
				  			            </div> 
				  			            <div class="col-4 contact_tel_2">
				  			                <a href="https://www.facebook.com/connexprop" target="_black" class="link_nav">
				  			                	<img src="<?php echo $part;?>images/icon/icon_facebook.webp?v=22" alt="Facebook" title="Facebook" >
				  			                   connex property</a> </div>
				  			            <div class="col-4 contact_tel_2">				  			            	 
                                            <a href="https://wa.me/+66990199900" target="_black" class="link_nav">
				  			                    <img src="<?php echo $part;?>images/icon/icon_whatapp.webp?v=22" alt="" title="" > 
				  			                    +66 99 019 9900</a></div>
				  			            <div class="col-4 contact_tel">
				  			                <a href="https://line.me/R/ti/p/@636paefg" target="_black" class="link_nav">
				  			                	<img src="<?php echo $part;?>images/icon/icon-line.webp?v=22" alt="" title="" > 
				  			                   @connex property </a></div> 
				  			            <div class="col-4 contact_tel_2">
				  			                <a href="https://www.instagram.com/connex.property/?igshid=MzRlODBiNWFlZA%3D%3D" target="_black" class="link_nav">
				  			                	<img src="<?php echo $part;?>images/icon/icon-ig.webp?v=22" alt="" title="" > 
				  			                   connex.property </a></div> 
				  			            <div class="col-4 contact_tel_2">
				  			                <a href="https://www.tiktok.com/@connexproperty_" target="_black" class="link_nav">
				  			                	<img src="<?php echo $part;?>images/icon/icon_tiktok.webp?v=22" alt="" title="" > @connexproperty_ </a></div>  
                                  <?php }else{ ?> 

				  			            <div class="col-6 contact_tel" target="_black"  >
				  			            	<a href="tel:0990199900" target="_black" class="link_nav">
				  			            		<img src="<?php echo $part;?>images/icon/icon_tel.webp?v=22" alt="เบอร์โทรศัพท์" title="เบอร์โทรศัพท์" >
				  			            	  099-019-9900</a>  
				  			            </div> 
				  			            <div class="col-6 contact_tel_2">
				  			                <a href="https://www.facebook.com/connexprop" target="_black" class="link_nav">
				  			                	<img src="<?php echo $part;?>images/icon/icon_facebook.webp?v=22" alt="Facebook" title="Facebook" >
				  			                   connex property</a> </div>
				  			            <div class="col-6 contact_tel">				  			            	 
                                            <a href="https://wa.me/+66990199900" target="_black" class="link_nav">
				  			                    <img src="<?php echo $part;?>images/icon/icon_whatapp.webp?v=22" alt="" title="" > 
				  			                    +66 99 019 9900</a></div>
				  			            <div class="col-6 contact_tel_2">
				  			                <a href="https://line.me/R/ti/p/@636paefg" target="_black" class="link_nav">
				  			                	<img src="<?php echo $part;?>images/icon/icon-line.webp?v=22" alt="" title="" > 
				  			                   @connex property </a></div> 
				  			            <div class="col-6 contact_tel">
				  			                <a href="https://www.instagram.com/connex.property/?igshid=MzRlODBiNWFlZA%3D%3D" target="_black" class="link_nav">
				  			                	<img src="<?php echo $part;?>images/icon/icon-ig.webp?v=22" alt="" title="" > 
				  			                   connex.property </a></div> 
				  			            <div class="col-6 contact_tel_2">
				  			                <a href="https://www.tiktok.com/@connexproperty_" target="_black" class="link_nav">
				  			                	<img src="<?php echo $part;?>images/icon/icon_tiktok.webp?v=22" alt="" title="" > @connexproperty_ </a></div> 

                                  <?php } ?>

						             </div>

                                 </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <?php if($device=='m'){ ?> 

		<section style="padding: 10px;">
		 
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-xl-10"> 
						 
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242.14148055974744!2d100.44005344709603!3d13.82319843120943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b9fbb28ff65%3A0xf868e8e79796307f!2sConnex%20Property!5e0!3m2!1sen!2sth!4v1664531480817!5m2!1sen!2sth" width="100%" height="464" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>

		</section>

    <?php } ?>

		<section style="padding: 10px;">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-xl-10">  
						<div class="contact-main">
							<div class="row">


								<div class="col-lg-6 col-12 pr-5">
						           <form  name="form"  action="../../include/process_contact.php"  enctype="multipart/form-data" method="post" >
										<h3><?php echo $contact_title_1;?> </h3>

										  <div class="form-group">
										    <label ><?php echo $name_contact_title;?></label>
										    <input type="text" class="form-control"  placeholder="" name="contact_name" required >
										   <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
										  </div>
                                          <input type="text" class="form-control-textbox" id="name" hidden  value="contact" name="contact_page" >
										  <div class="form-group">
										    <label ><?php echo $email_contact_title;?></label>
										    <input type="text" class="form-control" placeholder=""    name="contact_email">
										   <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
										  </div>
                                         
										  <div class="form-group">
										    <label ><?php echo $tel_contact_title;?></label>
										    <input type="tel" class="form-control" placeholder="" name="contact_tel" OnKeyPress="return chkNumbertel(this)" >
										   <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
										  </div>						 
										 

										<!--
										<select class="form-control">
											<option value="">คุณคือ?</option>
											<option value="">คุณคือ?</option>
											<option value="">คุณคือ?</option>
											<option value="">คุณคือ?</option>
										</select>-->
										 
										  <div class="form-group">
										    <label ><?php echo $topic_title;?></label>
										    <input type="text" class="form-control" placeholder="" name="contact_heading">
										  </div>

										  <div class="form-group">
										    <label ><?php echo $message_contact_title;?></label>
										    <textarea name="contact_detail"   cols="30"  class="form-control" placeholder=""></textarea>
										  </div> 

										 <script> // กำหนดปุ่มเป็น disable ไว้ ต้องทำ reCHAPTCHA ก่อนจึงกดได้
										  function makeaction(){
										        document.getElementById('submit').disabled = false;  
										  }
										  </script>
										  <div class="g-recaptcha" data-callback="makeaction"  data-sitekey="6LfQtnglAAAAAPWamZXtjcYnsHfZRmwDKVRtcn-r"></div>


										<button class="btn" type="submit" id="submit" name="btn_submit" disabled><?php echo $send_message_title;?></button>

									     
									</form>
								</div>
					    <?php if($device=='pc'){ ?> 
								<div class="col-lg-6 col-12 pl-5">
									<div class="contact-description">
										<h3><?php echo $office_title;?></h3>
                                        <hr>
										<h4><?php echo $company_title;?></h4>

										<h5> <img src="<?php echo $part;?>images/pin_drop.webp" alt="ปักหมุด"> <?php echo $location_title;?> </h5>
										<h5> <img src="<?php echo $part;?>images/phone_in_talk.webp" alt="เบอร์โทรศัพท์"> <a href="tel:0990199900"> 099-019-9900</a> </h5>
										<h5> <img src="<?php echo $part;?>images/mail.webp" alt="อีเมล์"> <a href="mailto:info@connexproperty.co.th"> info@connexproperty.co.th</a>  </h5>

										<br> <br>

										 
                                     <!--
										<br> <br>
                              
										<h4><?php echo $contact_us_title;?></h4>

										<a href="https://lin.ee/DXeU6rG">
											<img src="<?php echo $part;?>images/Line_black.svg" alt=""> 
										</a>
										<a href="https://www.facebook.com/connexprop"> 
											<img src="<?php echo $part;?>images/Facebook_black.svg" alt=""> 
										</a> -->
										<!--
										<a href="#"> 
											<img src="<?php echo $part;?>images/Youtube_black.svg" alt=""> 
										</a>
										<a href="#"> 
											<img src="<?php echo $part;?>images/Twitter_black.svg" alt="">
										</a> -->


									</div>

 
							 
						 
				           		      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242.14148055974744!2d100.44005344709603!3d13.82319843120943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b9fbb28ff65%3A0xf868e8e79796307f!2sConnex%20Property!5e0!3m2!1sen!2sth!4v1664531480817!5m2!1sen!2sth" width="100%" height="464" frameborder="0" style="border:0" allowfullscreen></iframe>
				          

								</div>
					    <?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <?php if($device=='m'){ ?> 


		<section style="padding: 10px;">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-xl-10">  
						<div class="contact-main">
							<div class="row">  
								<div class="col-lg-12 col-12 pl-5">
									<div class="contact-description">
										<h3><?php echo $office_title;?></h3>
                                        <hr>
										<h4><?php echo $company_title;?></h4>

										<h5> <img src="<?php echo $part;?>images/pin_drop.webp" alt="ปักหมุด"> <?php echo $location_title;?> </h5>
										<h5> <img src="<?php echo $part;?>images/phone_in_talk.webp" alt="เบอร์โทรศัพท์"> <a href="tel:0990199900"> 099-019-9900</a> </h5>
										<h5> <img src="<?php echo $part;?>images/mail.webp" alt="อีเมล์"> info@connexproperty.co.th  </h5>
  
  										 
									</div>
								</div> 

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <?php } ?>


    <?php if($device=='pc'){ ?> 
<!--
		<section style="padding: 10px;">
		 
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-xl-10"> 
						 
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242.14148055974744!2d100.44005344709603!3d13.82319843120943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b9fbb28ff65%3A0xf868e8e79796307f!2sConnex%20Property!5e0!3m2!1sen!2sth!4v1664531480817!5m2!1sen!2sth" width="100%" height="464" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>

		</section>
-->
	<?php } ?>
		
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


  function chkNumbertel(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9')) return false;
  ele.onKeyPress=vchar;
  }

</script>
	 
</body>
</html>
