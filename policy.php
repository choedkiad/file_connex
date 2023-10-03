<!DOCTYPE html>


<?php   session_start();  ?>
<?php   include ("./include/config.php"); ?>
<?php   include ("./setting.php");

       $todate=date("YmdHis");

       $myurl="https://connex.in.th/property/".$lang."/".$id;

       $part="../../../../";

       $url_th="https://connex.in.th/policy/th/$page";
       $url_en="https://connex.in.th/policy/en/$page"; 
 
            

            if($page=='1'){ 

               $sql_page="SELECT *  FROM dbo_web_page where page_id='3' ";
               $result_page= $conn->query($sql_page); 
              // output data of each row
               $rs=$result_page->fetch_assoc();

               $page_title=$rs['page_title'];
               $page_title_en=$rs['page_title_en'];
               $page_detail=$rs['page_detail'];
               $page_detail_en=$rs['page_detail_en'];

    		   $heading_title="ประกาศเกี่ยวกับความเป็นส่วนตัว";    

            }else if($page=='2'){ 

               $sql_page="SELECT *  FROM dbo_web_page where page_id='4' ";
               $result_page= $conn->query($sql_page); 
              // output data of each row
               $rs=$result_page->fetch_assoc();

               $page_title=$rs['page_title'];
               $page_title_en=$rs['page_title_en'];
               $page_detail=$rs['page_detail'];
               $page_detail_en=$rs['page_detail_en'];

    		   $heading_title="นโยบายการใช้คุกกี้";   

            }


	    if($lang=='th'){

    			$settings_title=$page_title ;
    			$settings_description=$ex_list_heading ;
    			$settings_keyword='';
             
            
    			$heading_1=$page_title ;   
    			$heading_title1="ประกาศความเป็นส่วนตัว";       
    			$heading_title2="นโยบายการใช้คุกกี้";   
    			$detail=$page_detail;

	    }else{ 

    			$settings_title=$page_title_en;
    			$settings_description=$ex_list_heading ;
    			$settings_keyword='';


    			$heading_1=$page_title_en;    
                $heading_title1="PRIVACY NOTICE ";        
    			$heading_title2="COOKIE POLICY";   
     			$detail=$page_detail_en;


	    }

 

?>

<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo $part;?>css/bootstrap.css" />
 <?php if($device=="pc"){ ?> 
    <link href="<?php echo $part;?>css/main.css?v=<?php echo $todate;?>" rel="stylesheet" type="text/css" />   
 <?php }else{ ?>
    <link href="<?php echo $part;?>css/main_mobile.css?v=<?php echo $todate;?>" rel="stylesheet" type="text/css" />   
 <?php } ?> 

    <link rel="icon" type="image/x-icon" href="<?php echo $part;?>images/logo-1.png"> 
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
   <meta property="og:image" content="<?php echo $img_list1;?>" />
   <meta name="twitter:card" content="Connex Property ขายบ้าน คอนโด" />
   <meta name="twitter:description" content="<?php echo $settings_description;?>" />
   <meta name="twitter:title" content="<?php echo $settings_title;?>" />
   <meta name="twitter:image" content="<?php echo $img_list1;?>" />


  <?php include("./include/code_pixel.php");?>
  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

	<link rel="stylesheet" href="<?php echo $part;?>css/image-uploader.min.css">

</head>
<body>


   <?php include("include/menu.php");?>

	<main>

		<div class="map-nav">
			หน้าหลัก / <?php echo $heading_1;?>
		</div>
  
 

 

		<section class="form-dep">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-xl-10">
						<div class="dep-box">

								<div class="form-group mb-4">
						
									<div class="tab-policy">
										<ul>
											<li <?php if($page=='1'){ ?> class="active" <?php } ?>>
												<a href="https://connex.in.th/policy/<?php echo $lang;?>/1"><?php echo $heading_title1;?></a>
											</li>
											<li  <?php if($page=='2'){ ?> class="active" <?php } ?>>
												<a href="https://connex.in.th/policy/<?php echo $lang;?>/2"><?php echo $heading_title2;?></a>
											</li>
											 
										</ul>
									</div>
								 
								
								</div>				
							<h1 class="mb-4"><?php echo $heading_1;?></h1>
							<form action="../../include/process_consignment.php"   >

                             	<input type="text" class="form-control-textbox" id="name" hidden  value="1" name="consignment" >
                             	<input type="text" class="form-control-textbox" id="name" hidden  value="<?php echo $code;?>" name="code"  >

								<div class="form-group mb-4">
						
									<div class="col-lg-12">
										<?php echo $detail;?>
									</div>
								
								
								</div>

							 
								<div class="col-lg-12 text-center">
								 
                                     <!--
									 <button type="button" class="btn"  id="submit-form">Submit</button>-->
								</div>


							</form>
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

	<script src="../../../js/image-uploader.min.js"></script> 
	
 
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

		/*	
		$('#prefix1').click(function() { 
			$( "#form1" )[0].submit();   
		});*/
				

		$(function () {

			$('.input-images-1').imageUploader();      

			$('form').on('submit', function (event) {

				// Stop propagation
				event.preventDefault();
				event.stopPropagation();

				// Get some vars
				let $form = $(this),
					$modal = $('.modal');

				// Set name and description
				$modal.find('#display-name span').text($form.find('input[id^="name"]').val());
				$modal.find('#display-description span').text($form.find('input[id^="description"]').val());

				// Get the input file
				let $inputImages = $form.find('input[name^="images"]');
				if (!$inputImages.length) {
					$inputImages = $form.find('input[name^="photos"]')
				}

				// Get the new files names
				let $fileNames = $('<ul>');
				for (let file of $inputImages.prop('files')) {
					$('<li>', {text: file.name}).appendTo($fileNames);
				}

				// Set the new files names
				$modal.find('#display-new-images').html($fileNames.html());

				// Get the preloaded inputs
				let $inputPreloaded = $form.find('input[name^="old"]');
				if ($inputPreloaded.length) {

					// Get the ids
					let $preloadedIds = $('<ul>');
					for (let iP of $inputPreloaded) {
						$('<li>', {text: '#' + iP.value}).appendTo($preloadedIds);
					}

					// Show the preloadede info and set the list of ids
					$modal.find('#display-preloaded-images').show().html($preloadedIds.html());

				} else {

					// Hide the preloaded info
					$modal.find('#display-preloaded-images').hide();

				}

				// Show the modal
				$modal.css('visibility', 'visible');
			});

			// Input and label handler
			$('input').on('focus', function () {
				$(this).parent().find('label').addClass('active')
			}).on('blur', function () {
				if ($(this).val() == '') {
					$(this).parent().find('label').removeClass('active');
				}
			});

		 
		});
 
		


	</script>






   <script type="text/javascript">
$(document).ready(function(){
 

    $("#project_consig").change(function(){
      var project_consig = $("#project_consig").val();
     
      if(project_consig!=""){

        $("#project_consig_2").hide();
        $("#alley_consig").hide();	
        $("#road_consig").hide();	
        $("#subdistricts_consig").hide();	
        $("#districts_consig").hide();	
        $("#provinces_consig").hide();	
         /*
        $("#p1").hide();
        $("#p_floor").show();
        //$("#txt_box").val(""); */
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */
      }else{

        $("#project_consig_2").show();	
        $("#alley_consig").show();	
        $("#road_consig").show();	
        $("#subdistricts_consig").show();	
        $("#districts_consig").show();	
        $("#provinces_consig").show();	

      }
    });

 

    $("#type_consig").change(function(){
      var type_s = $("#type_consig").val();
     
      if(type_s=="1"){

        $("#p_sqm_consig").show();
        $("#p_rai_consig").hide();
        $("#p_floor").show(); 
        $("#p_total_floors").hide();
        $("#room_s_checks_home").hide();
        $("#room_s_checks_condo").show();
         /*
        $("#p1").hide();
        $("#p_floor").show();
        //$("#txt_box").val(""); */
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */

      }else if(type_s=="2"){

        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();   
        $("#p_floor").hide();
        $("#p_total_floors").show();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s=="3"){

        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();
        $("#p_floor").hide();
        $("#p_total_floors").show();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s=="4"){

        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();
        $("#p_floor").hide();
        $("#p_total_floors").show();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s=="5"){     

        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s=="6"){   

        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s=="7"){   

        $("#p_sqm_consig").show();
        $("#p_rai_consig").show(); 
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s=="8"){   

        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s=="9"){   

        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s=="10"){   

        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s=="11"){   

        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s=="12"){   

        $("#p_sqm_consig").hide();
        $("#p_rai_consig").show();
        $("#room_s_checks_home").show();
        $("#room_s_checks_condo").hide();

      }else if(type_s==""){  

        $("#room_s_checks_condo").show();
        $("#room_s_checks_home").hide();
        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();
 

      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */ 
        $("#p_sqm_consig").show();
        $("#p_rai_consig").show();
        $("#room_s_checks_home").hide();

      }
    });


 


    $("#deal_consig").change(function(){
      var deal_consig = $("#deal_consig").val();
     
      if(deal_consig=="1"){
        $("#sale_consig").show();
        $("#rent_consig").hide();

      }else if(deal_consig=="2"){
        $("#sale_consig").hide();
        $("#rent_consig").show();

      }else if(deal_consig=="3"){
        $("#sale_consig").show();
        $("#rent_consig").show();

      }else{
        $("#sale_consig").show();
        $("#rent_consig").show();	
      }
    });


         $("#room_s_checks_home").hide();
         $("#p_type_consig").show();   
         $("#p_floor").show()
         $("#p_total_floors").hide();
});





</script>

 

</body>
</html>
