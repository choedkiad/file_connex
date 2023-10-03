<!DOCTYPE html>


<?php   session_start();  ?>
<?php   include ("./include/config.php"); ?>
<?php   include ("./setting.php");

       $todate=date("YmdHis");

       $myurl="https://connex.in.th/property/".$lang."/".$id;

       $part="../../../../";

       $url_th="https://connex.in.th/consignment/th";
       $url_en="https://connex.in.th/consignment/en";

        

	    if($lang=='th'){

    			$settings_title="บริการของเรา – ฝากขาย/เช่า อสังหาริมทรัพย์ของคุณโดยไม่มีค่าใช้จ่าย!" ;
    			$settings_description="โมษณาบนแพลทฟอร์มอสังหาฯ ชั้นนำ เช่น DDProperty, Dotproperty, Hipflat, Livinginsider และอื่นๆอีกมากว่า 10 ช่องทาง ดูแลการขายโดยทีมงานมืออาชีพ";
    			$settings_keyword='ฝากขาบ้าน,ฝากขายคอนโดมิเนียม,บริการหาคอนโด';
                   

    			$heading_text_h1="บริการของเรา – ฝากขาย/เช่า ทรัพย์ของคุณโดยไม่มีค่าใช้จ่าย!";      
    			$heading_text_h2="ฝากทรัพย์กับ Connex Property ผู้เชี่ยวชาญด้านอสังหาริมทรัพย์ในประเทศไทย";       

    			$heading_text1="ได้ลูกค้าอย่างรวดเร็ว";
    			$heading_text2="เราดูแลตั้งแต่ต้นจนจบ ";
    			$heading_text3="ทีมงานมืออาชีพ";
    			$heading_text4="ไม่มีค่าใช่จ่าย";
 

    			$heading_detail1_1="โมษณาบนแพลทฟอร์มอสังหาฯ ชั้นนำ เช่น DDProperty, Dotproperty, Hipflat, Livinginsider และอื่นๆอีกมากกว่า 10 ช่องทาง*";
    			$heading_detail1_2="เข้าถึงฐานผู้ติดตามของเราบน social media มากกว่า 2 แสนราย";

    	 
    			$heading_detail2="ดูแลการขายโดยทีมงานมืออาชีพที่ผ่านการฝึกอบรมเรื่องการขายและการบริการมาเป็นอย่างดี";
 
    	 
    			$heading_detail5="ทีมงานผู้เชี่ยวชาญของเราจะคอยช่วยเหลือตลอดกระบวนการตั้งแต่ การตั้งราคา, การถ่ายรูปทรัพย์, การคัดกรองลูกค้า, การเจรจาต่อรอง, การทำสัญญา, จนกระทั่งการส่งมอบทรัพย์สิน";

 
    			$heading_detail6="บริการทั้งหมดของเราไม่มีค่าใช้จ่ายจนกว่าจะขาย/เช่าสำเร็จ โดยคิดค่าคอมมิชชั่นของเราเป็นไปตามอัตรามาตรฐานของอุตสาหกรรม";

    			$policy_detail1="ข้าพเจ้าได้ศึกษาและรับทราบนโยบายความเป็นส่วนตัวที่บริษัทกำหนดแล้ว และยินยอมให้บริษัทเก็บรวบรวม ใช้ และเปิดเผย ข้อมูลส่วนบุคคลของข้าพเจ้าที่ได้ให้ไว้
กับบริษัท หรือที่อยู่ในความครอบครองของบริษัท ตาม <a href='https://connex.in.th/policy/th/1' target='_black' >นโยบายความเป็นส่วนตัวของบริษัท</a> เพื่อวัตถุประสงค์ต่อไปนี้";
    			$policy_detail2="ให้ข้อมูล จัดทำ และติดต่อท่านเกี่ยวกับผลิตภัณฑ์ บริการ กิจกรรม การสำรวจความคิดเห็น จัดส่งของสัมมนาคุณ และแจ้งข่าวสารโปรโมชั่นต่าง ๆ ของบริษัท";
    			$policy_detail3="ใช้ในการดำเนินกิจการ ประเมินผล และปรับปรุงธุรกิจ เพื่อพัฒนาคุณภาพสินค้าและบริการ";
    			$policy_detail4="ใช้ในการทำวิจัยและสำรวจตลาด วัดผลและบริหารประสิทธิภาพในการทำโฆษณาและการตลาด รวมถึงวิเคราะห์ผลิตภัณฑ์ บริการ และเว็บไซต์ของบริษัท";

	    }else if($lang=='en'){ 

    			$settings_title="Our Services for Owners – List your Property for free!" ;
    			$settings_description="Access to 200k+ followers on our social media platform Publication on leading online real estate platform " ;
    			$settings_keyword='Our Services , Property';

    			$heading_text_h1="Our Services for Owners – List your Property for free!";      
    			$heading_text_h2="Market your real estate with Connex Property, a leading real estate expert in Thailand";       
     			$heading_text1="Rent out and Sell Fast";
    			$heading_text2="End-to-end solution";
    			$heading_text3="Professional team";
    			$heading_text4="Success-based service fee";


    			$heading_detail1_1="Access to 200k+ followers on our social media platform ";
    			$heading_detail1_2="Publication on leading online real estate platform i.e., DDProperty, Dotproperty, Hipflat, Livinginsider, and 10+ more channels* ";
    	 
    			$heading_detail2="• Your property is overseen by professional sale team that are well-trained and promised to offer outstanding customer services ";
 
    	 
    			$heading_detail5="• Our market-expert consultant will manage entire process, from setting appropriate price, marketing your product, screening customer, showing the property, till contracting and  property transfer.   ";

 
    			$heading_detail6="• No upfront cost, no hidden fees. You only pay a standard market commission if we successfully find you tenant/buyer. ";

    			$policy_detail1="I have studied and acknowledged the privacy policy specified by the company and consent to the company collecting, using and disclosing My personal data that I have provided to the Company or in the possession of the company according to <a href='https://connex.in.th/policy/en/1' target='_black'>Privacy Notice of Connex</a> for the following purposes.";
    			$policy_detail2="To contact and inform about products, services, events, get the feedback, deliver the reward, and promotion news.";
    			$policy_detail3="To operate and improve the quality of product and service.";
    			$policy_detail4="For marketing survey and research: product, service, advertise, and product evaluation.";

	    }else{

	    	      echo("<script> top.location.href='https://www.connex.in.th/error/th'</script>"); 
	    }


               $sql_list_code="SELECT consig_code , consig_id  FROM dbo_consignment order by consig_id DESC";
               $result_list_code = $conn->query($sql_list_code); 
              // output data of each row
               $rs_code=$result_list_code->fetch_assoc();

               $consig_code=$rs_code['consig_code'];


               $a = str_replace("C-","",$consig_code,$count);

               if($a<1){ 
                 $a = '1';
               }else{
                 $a=$a+1;
               }
       

               $code = sprintf("C-%'05d",$a); 

?> 

<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo  $part;?>css/bootstrap.css" />

 <?php if($device=="pc"){ ?> 
    <link href="<?php echo $part;?>css/main.css?v=<?php echo $todate;?>" rel="stylesheet" type="text/css" />   
    <link rel="stylesheet" href="https://connex.in.th/css/bootstrap-select.css?v=<?php echo $today;?>" />
 <?php }else{ ?>
    <link href="<?php echo $part;?>css/main_mobile.css?v=<?php echo $todate;?>" rel="stylesheet" type="text/css" />  
    <link rel="stylesheet" href="https://connex.in.th/css/bootstrap-select-mobile.css?v=<?php echo $today;?>" />
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
   <meta property="og:image" content="<?php echo $img_list1;?>" />
   <meta name="twitter:card" content="Connex Property ขายบ้าน คอนโด" />
   <meta name="twitter:description" content="<?php echo $settings_description;?>" />
   <meta name="twitter:title" content="<?php echo $settings_title;?>" />
   <meta name="twitter:image" content="<?php echo $img_list1;?>" />

  <?php include("./include/code_pixel.php");?>
  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
 

	<link rel="stylesheet" href="<?php echo $part;?>css/image-uploader.min.css">

</head>
<body>


   <?php include("include/menu.php");?>

	<main>

		<div class="map-nav">
			<a href="<?php echo $part;?>" class="link_nav"><?php echo $link_home;?></a> / <?php echo $deposit_title;?>
		</div>
  
 

		<section class="benefits">
			<div class="container-fluid">
				<div class="row justify-content-around">
					<div class="col-xl-10">
						<h1><?php echo $heading_text_h1;?></h1>
						<h3 style="margin-bottom: 40px;"><?php echo $heading_text_h2;?></h3>
						<div class="row" style="margin-bottom: 50px;">
							<div class="col-lg-6 pr-4">
		
								 
								<div class="bene-box-2">									 
									<div>
										<img src="<?php echo $part;?>images/icon/consignment_02.webp" alt="<?php echo $heading_text1;?>" title="<?php echo $heading_text1;?>" class="img-fluid m-auto d-block">
									</div>
									<h4><?php echo $heading_text1;?></h4> 
									<ul>
									  <li><?php echo $heading_detail1_1;?></li>
									  <li><?php echo $heading_detail1_2;?></li> 
									</ul>
								</div>

								<div class="bene-box-2"> 
									<div>
										<img src="<?php echo $part;?>images/icon/consignment_03.webp" alt="<?php echo $heading_text3;?>" title="<?php echo $heading_text3;?>" class="img-fluid m-auto d-block">
									</div> 
									<h4><?php echo $heading_text3;?></h4>									
									<ul>
									  <li><?php echo $heading_detail2;?></li> 
									</ul>
								</div> 

							</div>
							<div class="col-lg-6 pl-4">
								<div class="bene-box-2">									
									<div>
										<img src="<?php echo $part;?>images/icon/consignment_05.webp" alt="<?php echo $heading_text2;?>" title="<?php echo $heading_text2;?>"  class="img-fluid m-auto d-block">
									</div>
									<h4><?php echo $heading_text2;?></h4>
									<ul>
									  <li><?php echo $heading_detail5;?></li> 
									</ul>
								</div>

								<div class="bene-box-2">									
									<div>
										<img src="<?php echo $part;?>images/icon/consignment_06.webp" alt="<?php echo $heading_text4;?>" title="<?php echo $heading_text4;?>" class="img-fluid m-auto d-block">
									</div> 
									<h4><?php echo $heading_text4;?></h4>					 
									<ul>
									  <li><?php echo $heading_detail6;?></li> 
									</ul>
								</div> 
							</div>
							<!--
							<div class="col-lg-6 pr-4">
								<div class="bene-box">
									<div>
										<img src="<?php echo $part;?>images/b3.png" alt="" class="img-fluid m-auto d-block">
									</div>
									<h4>Simple and easyFree listing</h4>
									<h5>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</h5>
								</div>
							</div>
							<div class="col-lg-6 pl-4">
								<div class="bene-box">
									<div>
										<img src="<?php echo $part;?>images/b4.png" alt="" class="img-fluid m-auto d-block">
									</div>
									<h4>Rent out and sell fast</h4>
									<h5>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</h5>
								</div>
							</div>
							<div class="col-lg-6 pr-4">
								<div class="bene-box">
									<div>
										<img src="<?php echo $part;?>images/b5.png" alt="" class="img-fluid m-auto d-block">
									</div>
									<h4>No risk</h4>
									<h5>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</h5>
								</div>
							</div>
							<div class="col-lg-6 pl-4">
								<div class="bene-box">
									<div>
										<img src="<?php echo $part;?>images/b6.png" alt="" class="img-fluid m-auto d-block">
									</div>
									<h4>100% rental and sale experts</h4>
									<h5>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</h5>
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="form-dep">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-xl-10">
						<div class="dep-box">
							<h1 class="mb-4"><?php echo $deposit_title;?></h1>
							<form action="../../include/process_consignment.php" enctype="multipart/form-data" method="post" id="form1" onsubmit="return checkInput()"  >

                             	<input type="text" class="form-control-textbox" id="name" hidden  value="1" name="consignment" >
                             	<input type="text" class="form-control-textbox" id="name" hidden  value="<?php echo $code;?>" name="code"  >

								<div class="form-group mb-4">
									<div class="col">
										<div class="row">
											<div class="custom-control custom-checkbox mr-5">
												<input class="custom-control-input chk-th" type="radio" id="prefix2" name="prefix_consig" checked="checked">
												<label for="prefix2" class="custom-control-label "><?php echo $mr_title;?></label>
											</div>
											<div class="custom-control custom-checkbox mr-5">
												<input class="custom-control-input chk-th" type="radio" id="prefix3" name="prefix_consig">
												<label for="prefix3" class="custom-control-label "><?php echo $mrs_title;?></label>
											</div>
											<div class="custom-control custom-checkbox mr-5">
												<input class="custom-control-input chk-th" type="radio" id="prefix4" name="prefix_consig">
												<label for="prefix4" class="custom-control-label "><?php echo $miss_title;?></label>
											</div>
										</div>
									</div>
								</div>
                                <div class="form-group row">

								
									<div class="col-lg-3">
										<label><?php echo $name_contact_title;?></label>
										<input type="text" class="form-control" name="name_consig" id="name_consig" placeholder="<?php echo $name_contact_title;?>"  required>
									</div>
									<div class="col-lg-3">
										<label><?php echo $lastname_contact_title;?></label>
										<input type="text" class="form-control" name="surname_consig" placeholder="<?php echo $lastname_contact_title;?>" required >
									</div>
									<div class="col-lg-3">
										<label><?php echo $tel_contact_title;?></label>
										<input type="text" class="form-control" minlength="9" name="tel_consig" placeholder="<?php echo $tel_contact_title;?>"  required >
									</div>
									<div class="col-lg-3">
										<label><?php echo $email_contact_title;?></label>
										<input type="email" class="form-control" name="email_consig" placeholder="<?php echo $email_contact_title;?>"   >
									</div>
									<div class="col-lg-3">
										<label><?php echo $line_contact_title;?></label>
										<input type="text" class="form-control" name="line_consig" placeholder="<?php echo $line_contact_title;?>"   >
									</div>
								</div>

								<h3><?php echo $property_details;?></h3>

								<div class="form-group row"> 


									<div class="col-lg-3" id="p_type_consig"  >
										<label><?php echo $property_type_title;?></label>
										<select class="selectpicker form-control" title=" <?php echo $property_type_consignment_title;?>" data-show-subtext="true" data-live-search="true" name="type_consig" id="type_consig" width="100%"> 
                                             <!-- <option value="" <?php if($type==''){?> selected="selected"  <?php } ?>  >ไม่ระบุ</option> -->
											      <?php                          
											       $sql_type="SELECT * FROM type_asset order by id   ASC"; 
											       $result_type=$conn->query($sql_type);

											       if($result_type->num_rows > 0) { 
											           while($rs_type=$result_type->fetch_assoc()) { 

                                                          if($lang=='th'){
                                                                 $type_name=$rs_type['name'];
                                                          }else{
                                                                 $type_name=$rs_type['name_en'];
                                                          }                  

                                                    ?> 

								                                      <option value="<?php echo $rs_type['id'];?>" ><?php echo $type_name;?>  </option> 
											      <?php }
											      } ?>
									 
										</select>
									</div> 
									<div class="col-lg-3">
										<label><?php echo $deal_title;?></label>
										<select class="selectpicker form-control" title="<?php echo $deal_consignment_title;?>" data-show-subtext="true" data-live-search="true" name="deal_consig" id="deal_consig" width="100%" placeholder="<?php echo $sale_price_title;?>"> 
		                                     <option value="3" <?php if($deal=='3'){?> selected="selected" <?php } ?>><?php echo $sale_rent_title;?></option> 
		                                     <option value="1" <?php if($deal=='1'){?> selected="selected" <?php } ?>><?php echo $sale_title;?></option> 
		                                     <option value="2" <?php if($deal=='2'){?> selected="selected" <?php } ?>><?php echo $rent_title;?></option> 
										</select>
									</div> 

									<div class="col-lg-3" id="sale_consig" >
										<label><?php echo $sale_price_title;?></label>
										<input type="text" class="form-control" name="sale_consig"  placeholder="<?php echo $sale_price_consignment_title;?>"> 
									</div> 
									<div class="col-lg-3" id="rent_consig">
										<label><?php echo $rent_price_title;?></label>
										<input type="text" class="form-control" name="rent_consig"   placeholder="<?php echo $rent_price_title;?>"> 
									</div> 	
 

								 
								</div>

								<div class="form-group row"> 

									<div class="col-lg-4">
										<label><?php echo $project_title;?></label>

		                                  <select class="selectpicker form-control" title="<?php echo $project_title;?>" name="project_consig" id="project_consig" data-show-subtext="true" data-live-search="true"  width="100%"   >
	                                      <option value=""  ><?php echo $not_specified;?></option> 
									      <?php                          
									       $sql_project="SELECT * FROM type_project order by project_id  DESC"; 
									       $result_project=$conn->query($sql_project);

									       if($result_project->num_rows > 0) { 
									           while($rs_project = $result_project->fetch_assoc()) {    
									      ?> 
			                                     <option value="<?php echo $rs_project['project_id'];?>" 
			                              <?php if($rs_project['project_id']==$project){?> selected="selected"  <?php } ?> name="project_consig" id="project_consig"  >
			                                         <?php echo $rs_project['project_name']." | ".$rs_project['project_name_en'];?>
			                             
			                                     </option> 
									      <?php }
									      } ?>
	                                      </select>
										 
									</div> 
									<div class="col-lg-6" id="project_consig_2" >
										<label>(<?php echo $please_specify_here_title;?>)</label>
                                        <input type="text" class="form-control"  name="project_consig_2"  placeholder="">
									</div>


                                </div>

								<div class="form-group row"> 
 
									<div class="col-lg-3" id="alley_consig" >
										<label><?php echo $alley_title;?></label>
										<input type="text" class="form-control" placeholder="" name="alley_consig" > 
									</div> 
									<div class="col-lg-3" id="road_consig" >
										<label><?php echo $road_title;?></label>
										<input type="text" class="form-control" placeholder="" name="road_consig" > 
									</div> 
									<div class="col-lg-3"  id="subdistricts_consig">
										<label><?php echo $subdistricts_title;?></label>

										<select class="selectpicker form-control" title="<?php echo $subdistricts_title;?>" data-show-subtext="true" data-live-search="true" name="subdistricts" id="sel1" width="100%"> 
											 <option value="">--- <?php echo $not_specified;?> ---</option> 
						    <?php  
						     $sql_sub="SELECT * FROM subdistricts order by id  ASC"; 
						     $result_sub=$conn->query($sql_sub);

						     if($result_sub->num_rows > 0) { 
						          while($rs_sub=$result_sub->fetch_assoc()) { 

                                        $id_sub=$rs_sub['id'];  
						                $title_th=$rs_sub['subdistricts_in_thai'];  
						                $title_en=$rs_sub['subdistricts_in_english']; 
						                $title=$title_th." | ".$title_en; 
						    ?>  
						                      <option value="<?php echo $id_sub;?>"  ><?php echo $title;?></option> 
						  <?php    }
						        }  ?>
                      
										</select>
									</div> 
									<div class="col-lg-3" id="districts_consig">
										<label><?php echo $districts_title;?></label>

										<select class="selectpicker form-control" title="<?php echo $districts_title;?>" data-show-subtext="true" data-live-search="true" name="districts" id="sel1" width="100%"> 
											 <option value="">--- <?php echo $not_specified;?> ---</option> 
						    <?php  
						     $sql_districts="SELECT * FROM districts order by id  ASC"; 
						     $result_districts=$conn->query($sql_districts);

						     if($result_districts->num_rows > 0) { 
						          while($rs_districts=$result_districts->fetch_assoc()) { 

                                        $id_districts=$rs_districts['id'];  
						                $title_th=$rs_districts['districts_in_thai'];  
						                $title_en=$rs_districts['districts_in_english']; 
						                $title=$title_th." | ".$title_en; 
						    ?>  
						                      <option value="<?php echo $id_districts;?>"  ><?php echo $title;?></option> 
						  <?php    }
						        }  ?>
                      
										</select>
									</div> 

									<div class="col-lg-3" id="provinces_consig">
										<label><?php echo $provinces_title;?></label>

										<select class="selectpicker form-control" title="<?php echo $provinces_title;?>" data-show-subtext="true" data-live-search="true" name="provinces" id="sel1" width="100%"> 
											 <option value="">--- <?php echo $not_specified;?> ---</option> 
						    <?php  
						     $sql_provinces="SELECT * FROM provinces order by id  ASC"; 
						     $result_provinces=$conn->query($sql_provinces);

						     if($result_provinces->num_rows > 0) { 
						          while($rs_provinces=$result_provinces->fetch_assoc()) { 

                                        $id_provinces=$rs_provinces['id'];  
						                $title_th=$rs_provinces['provinces_in_thai'];  
						                $title_en=$rs_provinces['provinces_in_english']; 
						                $title=$title_th." | ".$title_en; 
						    ?>  
						                      <option value="<?php echo $id_provinces;?>"  ><?php echo $title;?></option> 
						  <?php    }
						        }  ?>
                      
										</select>
									</div>  
                                </div>
  
								<div class="form-group row"> 

 
									 
									<div class="col-lg-3" id="p_sqm_consig"> 
										<label><?php echo $area_size_c_title;?></label>
										<input type="text" class="form-control" placeholder="" name="sqm_consig">
									</div> 
									<div class="col-lg-3" id="p_rai_consig" > 
										<label><?php echo $area_land_c_title;?></label>
										

										 <div class="form-group row"> 
									           <div class="col-lg-4"><input type="text" class="form-control" placeholder="<?php echo $rai_consig_title;?>" name="rai_consig"></div>
                                               <div class="col-lg-4"><input type="text" class="form-control" placeholder="<?php echo $ngan_consig_title;?>" name="ngan_consig"></div>
                                               <div class="col-lg-4"><input type="text" class="form-control" placeholder="<?php echo $wa_consig_title;?>" name="wa_consig"></div>
										 </div>
									</div> 
								 
									<div class="col-lg-3">
										<label><?php echo $unit_number_title;?></label>
										<input type="text" class="form-control" placeholder="" name="house_number_consig" > 
									</div> 
									<div class="col-lg-3" id="p_floor" >
										<label><?php echo $floors_title;?></label>
										<input type="text" class="form-control" placeholder="" name="floor_consig" > 
									</div> 
									<div class="col-lg-3" id="p_total_floors" >
										<label><?php echo $floors_total_title;?></label>
										<input type="text" class="form-control" placeholder="" name="total_floors_consig" > 
									</div>
									<div class="col-lg-3">
										<label><?php echo $bedroom_title;?></label>
										   
										   <div id="room_s_checks_condo">
					                          <select class="selectpicker form-control" title="<?php echo $room_consignment_title;?>" data-show-subtext="true" data-live-search="true" name="room_s" id="room_s_checks_condo" width="100%"   > 
					                            <option value=""  >--<?php echo $all_title;?>--</option> 
					                            
					                 <?php for($x=0; $x <= 30; $x++) { ?>
					                            <option value="<?php echo $x;?>" <?php if($room_s==$x and $room_s!=''){ ?>selected="selected" <?php } ?> ><?php if($x==0){ echo "Studio"; }else{ echo $x." ".$bedroom_title; } ?>
					                              
					                            </option>  
					                <?php  } ?>      
					                          </select>
					                        </div>

					                        <div id="room_s_checks_home">

										      <select class="selectpicker form-control" title="<?php echo $room_consignment_title;?>" data-show-subtext="true" data-live-search="true" name="room_s_2" id="room_s_checks_home" width="100%"   > 
							                            <option value="" >--<?php echo $all_title;?>--</option> 
							                            
							                 <?php for($x = 1; $x <= 100; $x++) { ?>
							                            <option value="<?php echo $x;?>" <?php if($room_s==$x){ ?>selected="selected" <?php } ?>><?php echo $x." ".$bedroom_title;?>
							                              
							                            </option>  
							                <?php  } ?>      
							                   </select>
							                </div>
									</div> 
									<div class="col-lg-3">
										<label><?php echo $bathroom_title;?></label>

										    <select class="selectpicker form-control" title="<?php echo $bathroom_consignment_title;?>" data-show-subtext="true" data-live-search="true" name="bathroom_consig"   width="100%"   > 
							                            <option value="" >--<?php echo $all_title;?>--</option> 
							                            
							                 <?php for($x = 1; $x <= 100; $x++) { ?>
							                            <option value="<?php echo $x;?>" <?php if($room_s==$x){ ?>selected="selected" <?php } ?>><?php echo $x." ".$bathroom_title;?>
							                              
							                            </option>  
							                <?php  } ?>      
							                </select>

									</div>  
									<div class="col-lg-3">
										<label><?php echo $carpark_title;?></label>

										    <select class="selectpicker form-control" title="<?php echo $car_park_consignment_title;?>" data-show-subtext="true" data-live-search="true" name="parking_consig"   width="100%"   > 
							                            <option value="" >--<?php echo $all_title;?>--</option> 
							                            
							                 <?php for($x = 1; $x <= 10; $x++) { ?>
							                            <option value="<?php echo $x;?>" <?php if($room_s==$x){ ?>selected="selected" <?php } ?>><?php echo $x." คัน ";?>
							                              
							                            </option>  
							                <?php  } ?>      
							                </select>

									</div>  
									 
						 
									<div class="col-lg-3">
										<label><?php echo $furniture_title;?></label>
										<select class="selectpicker form-control" title="<?php echo $furniture_title;?>" data-show-subtext="true" data-live-search="true" name="furniture_consig" id="sel1" width="100%"> 
											 <option value="">--- <?php echo $not_specified;?> ---</option> 
						    <?php  
						     $sql_furniture="SELECT * FROM type_furniture order by furniture_id   ASC"; 
						     $result_furniture=$conn->query($sql_furniture);

						     if($result_furniture->num_rows > 0) { 
						          while($rs_furniture=$result_furniture->fetch_assoc()) { 

                                        $furniture_id=$rs_furniture['furniture_id'];  

                                        if($lang=='th'){
							                $furniture_name=$rs_furniture['furniture_name'];  
							            }else if($lang=='en'){
							                $furniture_name=$rs_furniture['furniture_name_en']; 
							            }
						                
						    ?>  
						                      <option value="<?php echo $furniture_id;?>"  ><?php echo $furniture_name;?></option> 
						  <?php    }
						        }  ?>
                      
										</select>
									</div>  
									<div class="col-lg-3">
										<label><?php echo $pet_friendly_title;?></label>
										<select class="selectpicker form-control" title="<?php echo $pet_friendly_title;?>" data-show-subtext="true" data-live-search="true" name="pet_consig" id="sel1" width="100%"> 
											 <option value="">--- <?php echo $not_specified;?> ---</option>  
						                     <option value="0"  ><?php echo $not_allowed_title;?></option> 
						                     <option value="1"  ><?php echo $allow_title;?></option>  
										</select>
									</div> 	

									<div class="col-lg-4">
										<label>Google Map</label>
										<input type="text" class="form-control" name="map_consig" id="map_consig" placeholder="<?php echo $googlemap_consignment_title;?>"> 
									</div> 	
									<div class="col-lg-4">
										<label>Link Video Youtube</label>
										<input type="text" class="form-control" name="youtube_consig" id="youtube_consig" placeholder="<?php echo $youtube_consignment_title;?>"> 
									</div> 

									
								</div>
 

								<div class="form-group row"> 
									<div class="col-lg-12">
										<label><?php echo $additional_information_title;?></label>
										<textarea name="" id="" cols="30" class="form-control" name="other_consig"></textarea>
									</div>  
								</div>

								<div class="form-group row"> 
									<div class="col-lg-12">
										<label><?php echo $upload_photos_title;?></label>
										<div class="input-field"> 
											<div class="input-images-1" style="padding-top: .5rem;"></div>
										</div>
									</div>  
								</div>

								<div class="form-group">
									<h6>
										<?php echo $policy_detail1;?>
									</h6>
								</div>
								<div class="form-group boxg">
									<ul>
										<li>
											<?php echo $policy_detail2;?>
										</li>
										<li>
											<?php echo $policy_detail3;?>
										</li>
										<li>
											<?php echo $policy_detail4;?>
										</li>
									</ul>
								</div>
                             
								<div class="form-group row">
									<div class="col-lg-4"> 
										<div class="custom-control custom-checkbox mr-5">
											<input class="custom-control-input chk-th" type="checkbox" id="prefix1" name="confirm" required="">
											<label for="prefix1" class="custom-control-label "><?php echo $consent_title;?></label>
										</div>  
									</div>
								</div>

								<div class="col-lg-12 text-center">
									<h6><?php echo $please_confirm_title;?></h6>
								
									 
                                     <input type="submit" class="btn"  value="Submit" >
                                     <!--
									 <button type="button" class="btn"  id="submit-form">Submit</button>-->
								</div>


							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
  
 
		<script> 
		  function checkInput() { 
		    var name_consig = document.getElementById('name_consig'); 
		    var confirm = document.getElementById('confirm'); 
		    if( name_consig.value == "" ) { 
		      alert('กรุณากรอกชื่อ'); 
		      return false; 
		    }else if(confirm== "" ){
		      alert('กรุณายื่นยัน'); 
		      return false; 
		    }else{
		    	$( "#form1" )[0].submit();   
		    } 
		  } 
		</script> 



		<section class="sec-home10">
			<div class="container-fluid">   

  <?php if($lang=='en'){ ?> 
        <h2>Our Partners</h2>
 <?php }else{ ?> 
        <h2> พาร์ทเนอร์ <b>/</b> <span>Our Partners </span></h2>
  <?php } ?> 
				<div class="row justify-content-around">
					<div class="col-xl-9 mt-5">
						<div class="row">
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/ddproperty.webp" alt="ddproperty" title="ddproperty" width="100%" > 
							</div>
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/propit.webp" alt="propit" title="propit" width="100%" > 
							</div>
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/dotproperty.webp" alt="dotproperty" title="dotproperty" width="100%"  > 
							</div>
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/hipflat.webp" alt="hipflat" title="hipflat" width="100%"  > 
							</div>
							<div class="col">  
             

								<img src="<?php echo $part;?>images/partner/thaihometown.webp" alt="Thaihometown" title="Thaihometown" width="100%"  >
 
							</div>							
		 
							<div class="col"> 
								<img src="<?php echo $part;?>images/partner/living-insider.webp" alt="living-insider" title="living-insider" width="100%" > 
							</div>
							<div class="col"> 
								<img src="<?php echo $part;?>images/partner/baanfinder.webp" alt="Baanfinder" title="Baanfinder" width="100%" > 
							</div>
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/trovit.webp" alt="trovit" title="trovit" width="100%"  > 
							</div>
							
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/baania.webp" alt="Baania" title="Baania"  width="100%" > 
							</div>
					    </div>

					   
					    <br>
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
