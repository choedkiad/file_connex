<!DOCTYPE html >
<html lang="en" >
<?php   session_start();
/*
ini_set("max_execution_time","0");
ini_set("memory_limit","9999M"); */
 $today=date("YmdHis");
 $_SESSION['price_min_c']='';
 $_SESSION['price_max_c']='';
 $_SESSION['size_min_c']='';
 $_SESSION['size_max_c']='';
 $_SESSION['type_s']='';
 $_SESSION['room_s']='';
?>

<?php   include ("include/config.php"); ?>
<?php   include_once ("setting.php"); 


        $part="../../../";
        $baseUrl = BASE_URL;  
        $img_list1="$baseUrl/images/bg1.webp";
        $url_th="$baseUrl/";
        $url_en="$baseUrl/en";

     //   isset( $_SESSION['deal'] ) ? $deal = $_SESSION['deal'] : $deal = "";
 
        if($_SESSION['deal']=='' or $_SESSION['deal']=='1'){
             $deal_s='1';
        }else{
             $deal_s='2';    
        }
 

	    if($lang=='en'){

	    	 $settings_title="Connex Property ขายบ้าน คอนโด ทาวน์โฮม ที่ดิน อสังหาฯทุกประเภทบ้าน";
             $url_content="$baseUrl/content/en";
             $pastwork_detail="Connex Property aims to connect people to their desired property. We want to empower people to buy/sell their property with ease, efficiency, and transparency. To achieve that, we use cutting-edge technology to create simple, certain buying/selling experience for our customers. We offer the best selection that matches individual customer's need. And, we have market-expert professionals that is well-trained to give reliable, insightful advice allowing our customers to make best-informed decision. As a result, we have succeeded in helping a huge number of customers achieve their property goals, be it buying, selling, or renting.  "; 

             $url_content="$baseUrl/content/en/1";


             //our service
             $out_service_title_1="Professional Team";
             $services_h2_2="Let us take care of you. Market your real estate with the leading real estate expert in Thailand.";
             $out_service_detail_1="Our market-expert consultants will assist you through the entire process from setting the right price, taking professional photo of property, qualifying potential customer, negotiating deal, executing contract, to handovering property.  ";

             $out_service_title_2="Free of Charge";
             $out_service_detail_2="Our services have no upfront, hidden fee. We charge a success-based commission fee according to industry standard.";

             $out_service_title_3="Experienced Sale Team";
             $out_service_detail_3="We have a network of agents that are well-trained and possess specific expertise. This will increase your possibility of closing the deal.";

             $out_service_title_4="Renovation Services";
             $out_service_detail_4="We offer refurbishment/renovation services to make your property looks attractive to customers.";

             $out_service_title_5="Multi-channel Marketing";
             $out_service_detail_5="We promote your property through multiple marketing channels both online and offline to make sure your property reach the target audience.";


             //testimonials


             $testimonials_title1=" “I'm very impressed with the level of service. The team act fast and really understand the needs of both buyer and seller. Really recommend.” ";
             $testimonials_title2=" “I'm impressed with the professionalism and degree of knowledge that the team has. They are able to convey complex issue like taxes and transaction fee in an easy-to-understand manner. Also, the team is very good at marketing, they bring in a continuous steam of customers and finally seal it. Impressed!” ";
             $testimonials_title3=" “The team takes care me step-by-step from start to finish, from taking photos and videos of my property, doing all the marketing stuff, until transferring the ownership. Buyer is happy, Seller is happy, really nothing to worry from our end.” ";
             $testimonials_title4=" “The team does everything they can to satisfy my needs. No matter how many houses I’m willing to visit they always fully cooperate. Thank you very much Connex team for finding my dream home.” ";
             $testimonials_title5=" “Great service and fast response. I will definitely come back to you in the future.” ";
             $testimonials_title6=" “Thank you Connex Property for successfully help me sell and rent my 2 properties. I have limited knowledge in this field but your professionalism really gives comfort in every step of the transactions. Thanks a lot team! ” ";
             $testimonials_title7=" “The team offered me a number of interesting property and guide me through the entire process including loan application which I initially worried about. Even after transfer, they are still with me to service whenever I need them. Really impressed!   ” ";

             $property_with_title="List your property with us";
 
       
	    }else if($lang==''){

	    	 $settings_title="Connex Property ขายบ้าน คอนโด ทาวน์โฮม ที่ดิน อสังหาฯทุกประเภทบ้าน";
	    	 $settings_keyword="ขายบ้านเดี่ยว,ขายคอนโดมิเนียม,ขายทาวน์โฮม,ขายที่ดิน";
	    	 $settings_description="Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ที่ดิน ทาวน์เฮ้าส์-ทาวน์โฮม อพาร์ทเม้นท์ให้เช่า พร้อม รีวิวโครงการบ้านและคอนโด โครงการใหม่ ครอบคลุมทุกอสังหาริมทรัพย์ ลงประกาศขาย-ให้เช่า";
             $url_en="$baseUrl/en";
             $url_content="$baseUrl/content/th/1";
             $lang='th';


             
             //our service
             $services_h2_2="ให้เราดูแลคุณ ฝากอสังหาริมทรัพย์ของท่านกับผู้เชี่ยวชาญแถวหน้าในประเทศไทย";
             $out_service_title_1="มีผู้เชี่ยวชาญคอยแนะนำ";
             $out_service_detail_1="ทีมงานผู้เชี่ยวชาญของเราจะคอยช่วยเหลือตลอดกระบวนการตั้งแต่ การตั้งราคา, การถ่ายรูปทรัพย์, การคัดกรองลูกค้า, การเจรจาต่อรอง, การทำสัญญา, จนกระทั่งการส่งมอบทรัพย์สิน";

             $out_service_title_2="ไม่มีค่าใช่จ่าย";
             $out_service_detail_2="บริการทั้งหมดของเราไม่มีค่าใช้จ่ายจนกว่าจะขาย/เช่าสำเร็จ โดยคิดค่าคอมมิชชั่นของเราเป็นไปตามอัตรามาตรฐานของอุตสาหกรรม";

             $out_service_title_3="ตัวแทนขายมืออาชีพ";
             $out_service_detail_3="เรามีเครือขายของตัวแทนขายที่ผ่านการอบรมเป็นอย่างดี มีความชำนาญเฉพาะทาง ซึ่งจะช่วยเพิ่มโอกาสในการปิดการขายทรัพย์ของท่านโดยเร็วที่สุด";

             $out_service_title_4="มีบริการรีโนเวท";
             $out_service_detail_4="เรามีบริการตกแต่งหรือรีโนเวทเพื่อให้ทรัพย์สินอยู่ในสภาพพร้อมขาย เพื่อเพิ่มแรงจูงใจในการตัดสินใจของลูกค้า";

             $out_service_title_5="การตลาดครอบคลุมทุกช่องทาง";
             $out_service_detail_5="เรามีเครือขายของตัวแทนขายที่ผ่านการอบรมเป็นอย่างดี มีความชำนาญเฉพาะทาง ซึ่งจะช่วยเพิ่มโอกาสในการปิดการขายทรัพย์ของท่านโดยเร็วที่สุด";


             $pastwork_detail="คอนเนกซ์ พร็อพเพอร์ตี้ ก่อตั้งขึ้นเพื่อเชื่อมโยงคุณลูกค้ากับอสังหาริมทรัพย์ที่ท่านต้องการ เรามุ่งมั่นที่จะทำให้การซื้อขายอสังหาริมทรัพย์เป็นเรื่องง่าย สะดวกรวดเร็ว และ โปร่งใส โดยนำเทคโนโลยีเข้ามาปรับปรุงประสบการณ์การซื้อขายอสังหาริมทรัพย์ของท่านให้เป็นเรื่องน่าจดจำ ได้รับการเสนอทรัพย์ที่ตรงใจ นอกจากนั้น ทีมงานผู้เชี่ยวชาญของเรายังเตรียมพร้อมที่จะคอยให้คำปรึกษาเชิงลึกแก่คุณลูกค้าเพื่อให้ท่านสามารถตัดสินใจครั้งสำคัญนี้ได้อย่างมีประสิทธิภาพสูงสุด ด้วยเหตุผลดังกล่าว เราจึงประสบความสำเร็จในการช่วยเหลือลูกค้าจำนวนมากให้สามารถบรรลุเป้าหมายไม่ว่าจะเป็นการซื้อ ขาย หรือ เช่าอสังหาริมทรัพย์ ได้สำเร็จ";
 

             $testimonials_title1=" “ประทับใจในการบริการมากครับ ติดต่อประสานงานต่างๆได้รวดเร็วเข้าใจความต้องการของผู้ซื้อ และผู้ขาย แก้ไขปัญหาต่างๆ ได้ทันใจแนะนำให้ใช้บริการของที่นี่เลยครับ” ";
             $testimonials_title2=" “พี่ประทับใจในความรู้จริงของน้องน้ำ สามารถถ่ายทอดเรื่องซับซ้อน ออกมาได้อย่างชัดเจนและเข้าใจง่าย นอกจากนั้นน้องยังติดตามหาลูกค้ามาชมบ้านของพี่อย่างต่อเนื่องจนสามารถปิดการขายได้ ถือเป็นผลงานที่น่าชื่นชมเป็นอย่างมาก” ";
             $testimonials_title3=" “ประทับใจมากครับ ทีมงานดูแลทุกขั้นตอนตั้งแต่ต้นจนจบ ตั้งแต่ถ่ายรูปบ้าน ทำการตลาด จนกระทั้งวันไปโอนที่กรมที่ดินก็สะดวกรวดเร็ว ผู้ซื้อสุขใจ ผู้ขายก็แฮปปี้ ทำให้เราไม่ต้องมากังวลในเรื่องจุกจิกต่างๆ เลย” ";
             $testimonials_title4=" “ใส่ใจผู้ซื้อมากค่ะ ถึงจะดูเยอะ หรือ เปรียบเทียบหลายหลังก็ไม่มีบ่น สุดท้ายบ้านที่เลือกไว้ก็ไม่ผิดหวัง ขอบคุณทีมงาน Connex มากๆค่ะที่หาบ้านดีๆให้” ";
             $testimonials_title5=" “บริการดี และ ดำเนินการรวดเร็ว ไว้มีโอกาสจะทักมาใช้บริการอีกแน่นอนครับ” ";
             $testimonials_title6=" “ขอบคุณคุณจูนและ Connex Property ที่ช่วยดูแลเรื่องการซื้อขายและเช่าให้ผมจนสำเร็จลุล่วงทั้ง 2 เคส โดยเฉพาะมือใหม่ที่ไม่มีความรู้และประสบการณ์อย่างผม ทำให้เรารู้สึกอุ่นใจในทุกขั้นตอน คอยให้คำปรึกษาตลอด ประทับใจมากๆ ครับ” ";
             $testimonials_title7=" “ประทับใจคุณจูน แนะนำตั้งแต่ต้นจนจบ ตั้งแต่เสนอห้องสวยๆ จัดการเรื่องสินเชื่อ จนกระทั้งส่งมอบห้อง หลังซื้อติดปัญหาอะไร คุณจูนและทีมงาน Connex ก็ยังช่วยเหลือตลอด น่ารักมากๆ แนะนำเลยค่ะ” ";

             $property_with_title="ฝากอสังหาริมทรัพย์กับเรา";

	    }else{
              echo("<script> top.location.href='https://www.connex.in.th/error/th'</script>");        
      }

        
        if($device=="pc"){ 

             $search_title="Search by location, station, project or unit ID";

        }else{

             $search_title="Search by location, station...";

        }
  
    include_once ("include/zone_group.php"); 
			  
?>
<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css?v=<?php echo $today;?>">-->
    <link rel="preload" href="css/bootstrap.css" as="style" />
    <link rel="stylesheet" href="css/bootstrap.css" />
 <?php if($device=="pc"){ ?> 

    <link rel="preload" href="css/main.css" as="style" />
    <link rel="preload" href="css/bootstrap-select-index.css" as="style" />
    <link rel="preload" href="css/select2.css" as="style" />

    <link href="css/main.css" rel="stylesheet" type="text/css" />   
    <link rel="stylesheet" href="css/bootstrap-select-index.css" />
    <link href="css/select2.css?v=<?php echo $today;?>" rel="stylesheet" />
 <?php }else{ ?>

    <link rel="preload" href="css/main_mobile.css" as="style" />
    <link rel="preload" href="css/bootstrap-select-index-mobile.css" as="style" />
    <link rel="preload" href="css/select2.css?v=<?php echo $today;?>" as="style" />

    <link href="css/main_mobile.css" rel="stylesheet" type="text/css" />   
    <link rel="stylesheet" href="css/bootstrap-select-index-mobile.css" />
    <link href="css/select2.css" rel="stylesheet" />
 <?php } ?>
    <link rel="preload" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" as="style" />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" as="style" />

    <link rel="icon" type="image/x-icon" href="images/logo_icon.webp"> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"  />  

	<title><?php echo $settings_title;?></title>
    <meta name="author" content="Connex Property"> 
    <meta name="description" content="<?php echo $settings_description;?>">	


   <link rel="canonical" href="<?php echo $baseUrl;?>" />
   <meta property="og:locale" content="en_US" />
   <meta property="og:type" content="website" />
   <meta property="og:title" content="<?php echo $settings_title;?>" />
   <meta property="og:description" content="<?php echo $settings_description;?>" />
   <meta property="og:url" content="<?php echo $baseUrl;?>" />
   <meta property="og:site_name" content="Connex Property ขายบ้าน คอนโด" />
   <meta property="og:image" content="<?php echo $img_list1;?>" />
   <meta name="twitter:card" content="Connex Property ขายบ้าน คอนโด" />
   <meta name="twitter:description" content="<?php echo $settings_description;?>" />
   <meta name="twitter:title" content="<?php echo $settings_title;?>" />
   <meta name="twitter:image" content="<?php echo $img_list1;?>" />
 

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" />

  <?php include("./include/code_pixel.php");?>

    <style>

.bootstrap-select .btn .filter-option-inner-inner{
  font-family: SukhumvitSet-Bold;  
  font-size: 20px;
  line-height: 30px; 
  color: #374757; 
  padding-top: 6px; 
}

element.style {
 
    top: 0px;
    left: 0px;
    transform: translate3d(-5px, 0px, 0px);
}

 

    </style>

</head>
<body style="visibility: hidden;">

   <?php include("include/menu.php");?>

	<main>

 
		



		<div class="container-fluid map">

		</div>

 
 



		<section class="sec-home1">
			<div class="container-fluid">
				<div class="home1">
					<h1><?php echo $home_heading_h1;?></h1>
					<h3><?php echo $home_heading_h2;?></h3>


					<div class="deal-type">
						<ul>
							<li <?php if($_SESSION['deal']=='1' or $_SESSION['deal']==''){ ?> class="active" <?php } ?>>
								<a href="../../include/process.php?deal=1"><?php echo $buy_title2;?></a>
							</li>
							<li <?php if($_SESSION['deal']=='2'){ ?> class="active" <?php } ?>>
								<a href="../../include/process.php?deal=2"><?php echo $rent_title;?></a>
							</li>
							<li >
								<a href="../../consignment/<?php if($lang!=''){ echo $lang;}else{ echo "th";} ?>"><?php echo $sell_title2;?></a>
							</li>
						</ul>
					</div>




        <!-- <form method="post" id="form1" enctype="multipart/form-data" action="../../include/process_search.php "  > -->

					<!-- <input type="text" name="search_s" id="" class="form-control" placeholder="<?php echo $search_title;?> "> -->
 
                    <div class="deal-search">

                      <select class="js-data-example-ajax form-control" title="<?php echo $project_s_title;?>" name="project_s" id="project_s_search" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}"   data-show-subtext="true" data-live-search="true"  width="500"   > 
                        
                          
        <!--
                           <option value="$baseUrl/include/process_search.php?lang=<?php echo $lang;?>&status=project&deal_s=<?php echo $deal_s;?>&type_s=<?php echo $type_s;?>&project_s=0&size_s=<?php echo $size_s;?>&price_s=<?php echo $price_s;?>&room_s=<?php echo $room_s;?>&search_s=0&sort_s=<?php echo $sort_s;?>" <?php if($project_s==""){?> selected="selected" <?php } ?>  width="100%"   >--<?php echo $all_title;?>--
                           </option> -->

                                 <option  selected="selected"><?php echo $project_s_title;?></option>

         

                        </select>

                  </div>


                        <input type="text" class="form-control" style="width: 100%;" name="page"  value="search" hidden="hidden" >
						<input type="text" name="deal_s" id="" value="<?php if($_SESSION['deal']=='sell'){ echo "1";}else if($_SESSION['deal']=='rent'){ echo "2";}else{} ?>" hidden="hidden" >
						<input type="text" name="lang" id="" value="<?php echo $lang ; ?>" hidden="hidden" >
						<!--<button class="btn">Search</button>-->
						<!--<input type="submit" class="btn" value="Search">  -->
					<!--</form> -->
				</div>
			</div>
		</section>
 

		<section class="sec-home2"> 
			<div class="container-fluid">

				<div class="row justify-content-center">
					<div class="col-xl-10">

						
						<div class="row pc-x"> 

							<div class="col-12">   
								<div id="item_box2" class="carousel slide" data-ride="carousel"> 
									<div class="carousel-inner">
 
						

                    <div class="carousel-item active">
											<a href="<?php echo $zone_g_url1;?>">
												<div class="img-cover1"   > 
                             <img src="images/zone_group/webp/<?php echo $zone_image1;?>" class="img-cover-1" alt="<?php echo $zone_type1;?>" title="<?php echo $zone_type1;?>" >
													<div class="des1">
													     <h3><?php echo $zone_type1;?> </h3>
													</div>
												</div>
											</a>  
										</div>  
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url2;?>">
												<div class="img-cover2" > 
                              <img src="images/zone_group/webp/<?php echo $zone_image2;?>" class="img-cover-2" alt="<?php echo $zone_type2;?>" title="<?php echo $zone_type2;?>" >   
													<div class="des2">
														<h3><?php echo $zone_type2;?></h3>
														 
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url3;?>">
												<div class="img-cover2" > 
                               <img src="images/zone_group/webp/<?php echo $zone_image3;?>" class="img-cover-2" alt="<?php echo $zone_type3;?>" title="<?php echo $zone_type3;?>" > 
													<div class="des2">
														<h3><?php echo $zone_type3;?></h3>
									 
													</div>
												</div> 
											</a>
										</div>  
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url4;?>">
												<div class="img-cover2" > 
                             <img src="images/zone_group/webp/<?php echo $zone_image4;?>" class="img-cover-2" alt="<?php echo $zone_type4;?>" title="<?php echo $zone_type4;?>" > 
													<div class="des2">
														<h3><?php echo $zone_type4;?></h3>  
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url5;?>">
												<div class="img-cover2" > 
                               <img src="images/zone_group/webp/<?php echo $zone_image5;?>" class="img-cover-2" alt="<?php echo $zone_type5;?>" title="<?php echo $zone_type5;?>" > 
													<div class="des2">
														<h3><?php echo $zone_type5;?></h3> 
													</div>
												</div> 
											</a>
										</div>  
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url6;?>">
												<div class="img-cover1" >
                              <img src="images/zone_group/webp/<?php echo $zone_image6;?>" class="img-cover-1" alt="<?php echo $zone_type6;?>" title="<?php echo $zone_type6;?>" >
													<div class="des1"> 
														<h3><?php echo $zone_type6;?></h3>
													</div>
												</div>
											</a>  
										</div>  
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url7;?>">
												<div class="img-cover1" >
                               <img src="images/zone_group/webp/<?php echo $zone_image7;?>" class="img-cover-1" alt="<?php echo $zone_type7;?>" title="<?php echo $zone_type7;?>" >
													<div class="des1"> 
														<h3><?php echo $zone_type7;?></h3>
													</div>
												</div>
											</a>  
										</div> 
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url8;?>">
												<div class="img-cover2" > 
                             <img src="images/zone_group/webp/<?php echo $zone_image8;?>" class="img-cover-2" alt="<?php echo $zone_type8;?>" title="<?php echo $zone_type8;?>" >
													<div class="des2">
														<h3><?php echo $zone_type8;?></h3>  
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url9;?>">
												<div class="img-cover2" > 
                              <img src="images/zone_group/webp/<?php echo $zone_image9;?>" class="img-cover-2" alt="<?php echo $zone_type9;?>" title="<?php echo $zone_type9;?>" >
													<div class="des2">
														<h3><?php echo $zone_type9;?></h3>  
													</div>
												</div> 
											</a>
										</div> 
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url10;?>">
												<div class="img-cover2" > 
                             <img src="images/zone_group/webp/<?php echo $zone_image10;?>" class="img-cover-2" alt="<?php echo $zone_type10;?>" title="<?php echo $zone_type10;?>" >
													<div class="des2">
														<h3><?php echo $zone_type10;?></h3>
													 
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url11;?>">
												<div class="img-cover2" > 
                            <img src="images/zone_group/webp/<?php echo $zone_image11;?>" class="img-cover-2" alt="<?php echo $zone_type11;?>" title="<?php echo $zone_type11;?>" >
													<div class="des2">
														<h3><?php echo $zone_type11;?></h3> 
													</div>
												</div> 
											</a>
										</div> 
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url12;?>">
												<div class="img-cover1"  >
                            <img src="images/zone_group/webp/<?php echo $zone_image12;?>" class="img-cover-1" alt="<?php echo $zone_type12;?>" title="<?php echo $zone_type12;?>" >
													<div class="des1"> 
														<h3><?php echo $zone_type12;?></h3>
													</div>
												</div>
											</a>  
										</div>  
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url13;?>">
												<div class="img-cover1" >
                            <img src="images/zone_group/webp/<?php echo $zone_image13;?>" class="img-cover-1" alt="<?php echo $zone_type13;?>" title="<?php echo $zone_type13;?>" >
													<div class="des1">
													 
														<h3><?php echo $zone_type13;?></h3>
													</div>
												</div>
											</a>  
										</div> 
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url14;?>">
												<div class="img-cover2" > 
                            <img src="images/zone_group/webp/<?php echo $zone_image14;?>" class="img-cover-2" alt="<?php echo $zone_type14;?>" title="<?php echo $zone_type14;?>" >
													<div class="des2">
														<h3><?php echo $zone_type14;?></h3> 
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url15;?>">
												<div class="img-cover2" > 
                             <img src="images/zone_group/webp/<?php echo $zone_image15;?>" class="img-cover-2" alt="<?php echo $zone_type15;?>" title="<?php echo $zone_type15;?>" >
													<div class="des2">
														<h3><?php echo $zone_type15;?></h3> 
													</div>
												</div> 
											</a>
										</div>
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url16;?>">
												<div class="img-cover2"  > 
                            <img src="images/zone_group/webp/<?php echo $zone_image16;?>" class="img-cover-2" alt="<?php echo $zone_type16;?>" title="<?php echo $zone_type16;?>" >
													<div class="des2">
														<h3><?php echo $zone_type16;?></h3> 
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url17;?>">
												<div class="img-cover2" > 
                            <img src="images/zone_group/webp/<?php echo $zone_image17;?>" class="img-cover-2" alt="<?php echo $zone_type17;?>" title="<?php echo $zone_type17;?>" >
													<div class="des2">
														<h3><?php echo $zone_type17;?></h3> 
													</div>
												</div> 
											</a>
										</div>
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url18;?>">
												<div class="img-cover1"  >
                            <img src="images/zone_group/webp/<?php echo $zone_image18;?>" class="img-cover-1" alt="<?php echo $zone_type18;?>" title="<?php echo $zone_type18;?>" >
													<div class="des1"> 
														<h3><?php echo $zone_type18;?></h3>
													</div>
												</div>
											</a>  
										</div> 

									</div> 
									<a class="carousel-control-prev" href="#item_box2" data-slide="prev" aria-label="เลื่อนไปทางซ้าย">
										<span class="carousel-control-prev-icon"></span>
									</a>
									<a class="carousel-control-next" href="#item_box2" data-slide="next" aria-label="เลื่อนไปทางขวา">
										<span class="carousel-control-next-icon"></span>
									</a>
								</div>
							</div>
						</div>

						<ul id="item2" class="item2 mb-x">


							<li>
								<a href="<?php echo $zone_g_url1;?>">
									<div class="img-cover1" > 
                       <img src="images/zone_group/webp/<?php echo $zone_image1;?>" class="img-cover-1" alt="<?php echo $zone_type1;?>" title="<?php echo $zone_type1;?>" >
										<div class="des1">
										    <h3><?php echo $zone_type1;?></h3>
										</div>
									</div>
								</a>  
							</li> 
							<li>
								<a href="<?php echo $zone_g_url2;?>">
									<div class="img-cover2" > 
                      <img src="images/zone_group/webp/<?php echo $zone_image2;?>" class="img-cover-2" alt="<?php echo $zone_type2;?>" title="<?php echo $zone_type2;?>" >
										<div class="des2">
											<h3><?php echo $zone_type2;?></h3>
									        
										</div>
									</div> 
								</a>
								<a href="<?php echo $zone_g_url3;?>">
									<div class="img-cover2"  > 
                       <img src="images/zone_group/webp/<?php echo $zone_image3;?>" class="img-cover-2" alt="<?php echo $zone_type3;?>" title="<?php echo $zone_type3;?>" >
										<div class="des2">
										  <h3><?php echo $zone_type3;?></h3>
										</div>
									</div> 
								</a>
							</li>
							<li>
								<a href="<?php echo $zone_g_url4;?>">
									<div class="img-cover2" > 
                       <img src="images/zone_group/webp/<?php echo $zone_image4;?>" class="img-cover-2" alt="<?php echo $zone_type4;?>" title="<?php echo $zone_type4;?>" >
										<div class="des2">
										    <h3><?php echo $zone_type4;?></h3>
										</div>
									</div> 
								</a>
								<a href="<?php echo $zone_g_url5;?>">
									<div class="img-cover2"  > 
                      <img src="images/zone_group/webp/<?php echo $zone_image5;?>" class="img-cover-2" alt="<?php echo $zone_type5;?>" title="<?php echo $zone_type5;?>" >
										<div class="des2">
											<h3><?php echo $zone_type5;?></h3>
										</div>
									</div> 
								</a>
							</li>						 

							<li>
								<a href="<?php echo $zone_g_url6;?>">
									<div class="img-cover1" >
                     <img src="images/zone_group/webp/<?php echo $zone_image6;?>" class="img-cover-1" alt="<?php echo $zone_type6;?>" title="<?php echo $zone_type6;?>" >
										<div class="des1">
										    <h3><?php echo $zone_type6;?></h3>
										</div>
									</div>
								</a>  
							</li> 
							<li>
								<a href="<?php echo $zone_g_url7;?>">
									<div class="img-cover1" >
                      <img src="images/zone_group/webp/<?php echo $zone_image7;?>" class="img-cover-1" alt="<?php echo $zone_type7;?>" title="<?php echo $zone_type7;?>" >
										<div class="des1">
											<h3><?php echo $zone_type7;?></h3>
										</div>
									</div>
								</a>  
							</li> 
							<li>
								<a href="<?php echo $zone_g_url8;?>">
									<div class="img-cover2"  >
                        <img src="images/zone_group/webp/<?php echo $zone_image8;?>" class="img-cover-2" alt="<?php echo $zone_type8;?>" title="<?php echo $zone_type8;?>" > 
										<div class="des2">
											<h3><?php echo $zone_type8;?></h3>
										</div>
									</div> 
								</a>
								<a href="<?php echo $zone_g_url9;?>">
									<div class="img-cover2"  > 
                       <img src="images/zone_group/webp/<?php echo $zone_image9;?>" class="img-cover-2" alt="<?php echo $zone_type9;?>" title="<?php echo $zone_type9;?>" > 
										<div class="des2">
											<h3><?php echo $zone_type9;?></h3>
										</div>
									</div> 
								</a>
							</li>
							<li>
								<a href="<?php echo $zone_g_url10;?>">
									<div class="img-cover2" >
                        <img src="images/zone_group/webp/<?php echo $zone_image10;?>" class="img-cover-2" alt="<?php echo $zone_type10;?>" title="<?php echo $zone_type10;?>" >  
										<div class="des2">
											<h3><?php echo $zone_type10;?></h3>
										</div>
									</div>
								</a>
								<a href="<?php echo $zone_g_url11;?>">
									<div class="img-cover2"  > 
                       <img src="images/zone_group/webp/<?php echo $zone_image11;?>" class="img-cover-2" alt="<?php echo $zone_type11;?>" title="<?php echo $zone_type11;?>" >  
										<div class="des2">
											<h3><?php echo $zone_type11;?></h3>
										</div>
									</div> 
								</a>
							</li>
							<li>
								<a href="<?php echo $zone_g_url12;?>">
									<div class="img-cover1" >
                        <img src="images/zone_group/webp/<?php echo $zone_image12;?>" class="img-cover-1" alt="<?php echo $zone_type12;?>" title="<?php echo $zone_type12;?>" >  
										<div class="des1">
											<h3><?php echo $zone_type12;?></h3>
										</div>
									</div>
								</a>  
							</li>

							<li>
								<a href="<?php echo $zone_g_url13;?>">
									<div class="img-cover1" >
                      <img src="images/zone_group/webp/<?php echo $zone_image13;?>" class="img-cover-1" alt="<?php echo $zone_type13;?>" title="<?php echo $zone_type13;?>" >  
										<div class="des1">
											<h3><?php echo $zone_type13;?></h3>
										</div>
									</div>
								</a>  
							</li>
							<li>
								<a href="<?php echo $zone_g_url14;?>">
									<div class="img-cover2" >
                      <img src="images/zone_group/webp/<?php echo $zone_image14;?>" class="img-cover-2" alt="<?php echo $zone_type14;?>" title="<?php echo $zone_type14;?>" >   
										<div class="des2">
											<h3><?php echo $zone_type14;?></h3>
										</div>
									</div> 
								</a>
								<a href="<?php echo $zone_g_url15;?>">
									<div class="img-cover2" > 
                     <img src="images/zone_group/webp/<?php echo $zone_image15;?>" class="img-cover-2" alt="<?php echo $zone_type15;?>" title="<?php echo $zone_type15;?>" >   
										<div class="des2">
											<h3><?php echo $zone_type15;?></h3>
										</div>
									</div> 
								</a>
							</li>
							<li>
								<a href="<?php echo $zone_g_url16;?>">
									<div class="img-cover2"  >
                       <img src="images/zone_group/webp/<?php echo $zone_image16;?>" class="img-cover-2" alt="<?php echo $zone_type16;?>" title="<?php echo $zone_type16;?>" >  
										<div class="des2">
											<h3><?php echo $zone_type16;?></h3>
										</div>
									</div> 
								</a>
								<a href="<?php echo $zone_g_url17;?>">
									<div class="img-cover2" > 
                      <img src="images/zone_group/webp/<?php echo $zone_image17;?>" class="img-cover-2" alt="<?php echo $zone_type17;?>" title="<?php echo $zone_type17;?>" >  
										<div class="des2">
											<h3><?php echo $zone_type17;?></h3>
										</div>
									</div> 
								</a>
							</li>
							<li>
								<a href="<?php echo $zone_g_url18;?>">
									<div class="img-cover1"  >
                      <img src="images/zone_group/webp/<?php echo $zone_image18;?>" class="img-cover-1" alt="<?php echo $zone_type18;?>" title="<?php echo $zone_type18;?>" >
										<div class="des1">
											<h3><?php echo $zone_type18;?></h3>
										</div>
									</div>
								</a>  
							</li>

						</ul>
					</div>
				</div>

				 
			</div>
		</section>

		<section class="sec-home3">
			<div class="container-fluid">
      <?php if($lang=='en'){ ?>
                <h2>Condominium</h2>
                <h3><?php echo $home_heading_h2;?></h3>
      <?php }else{ ?>
 
                <h2>คอนโดมิเนียม /   <span>Condominium</span></h2>
                <h3><?php echo "คอนโดมิเนียม ".$home_heading_h2_2;?></h3>
       <?php } ?>  
				
				<div class="row justify-content-center">
					<div class="col-xl-10">  
						<ul id="item3" class="item3">

 
 <?php   

 	 $sql_listing = "SELECT *  FROM dbo_data_excel_listing   
             WHERE ex_list_listing_type='1' and ex_list_public='1' and ex_list_premium='1' 
             ORDER BY ex_list_premium DESC , ex_list_listing_code DESC LIMIT 12 ";

		 $result_listing= $conn->query($sql_listing); 
    	  // output data of each row
         while($rs_listing= $result_listing->fetch_assoc()){       
              
              $ex_list_heading=$rs_listing['ex_list_heading'];
              $ex_list_heading_en=$rs_listing['ex_list_heading_en'];  
              $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
              $ex_list_price=$rs_listing['ex_list_price'];
              $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
              $ex_list_bathroom=$rs_listing['ex_list_bathroom']; 
              $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
              $ex_list_parking=$rs_listing['ex_list_parking'];
              $ex_list_sqm=$rs_listing['ex_list_sqm'];
              $ex_list_floor=$rs_listing['ex_list_floor']; 
              $ex_list_parking=$rs_listing['ex_list_parking']; 
              $project_id=$rs_listing['project_id']; 
              $ex_list_subdistrict=$rs_listing['ex_list_subdistrict'];
              $ex_list_district=$rs_listing['ex_list_district'];
              $ex_list_province=$rs_listing['ex_list_province'];
              $listing_img_folder=$rs_listing['listing_img_folder']; 
              $listing_img_name=$rs_listing['listing_img_webp'];
              
              $ex_list_pric=number_format($ex_list_price); 

              if($ex_list_deal_type=='ขาย' or $ex_list_deal_type=='1'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="SALE"; $sale_text="ขาย"; }
              else if($ex_list_deal_type=='เช่า' or $ex_list_deal_type=='2'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="RENT";   $sale_text="เช่า"; }
            /*  
              $sql_img="SELECT ex_list_listing_code,listing_img_folder,listing_img_name,listing_img_no 
                        FROM dbo_data_excel_listing_img 
                        WHERE ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC LIMIT 1  ";
              $result_img=$conn->query($sql_img); 
              $rs_img=$result_img->fetch_assoc();

              $listing_img_folder=$rs_img['listing_img_folder'];
              $listing_img_name=$rs_img['listing_img_name']; */
             
           
               
                     if($listing_img_folder!=''){   

                           $img_name_list=$listing_img_folder."webp/mini_w500/".$listing_img_name;

                     }else if($listing_img_name!=''){   
                           $img_name_list="../../images/listing/".$ex_list_listing_code."/webp/mini_w500/".$listing_img_name;  
                            
                     }else{  $img_name_list="../../images/noimages.jpg" ;  $test1 = "000"; 

                     }  
           

             $sql_project= "SELECT project_name , project_name_en , project_subdistrict , project_district , project_province
                            FROM  type_project WHERE  project_id='$project_id' LIMIT 1 "; 
             $result_project=$conn->query($sql_project); 
             $rs_project= $result_project->fetch_assoc();


              if($project_id!=''){

                     $project_name=$rs_project['project_name'];
                     $project_name_en=$rs_project['project_name_en'];
              	     $ex_list_subdistrict=$rs_project['project_subdistrict'];
                     $ex_list_district=$rs_project['project_district'];
                     $ex_list_province=$rs_project['project_province'];

              }


     ///////////////// จังหวัด ////////////////
                $sql_p="SELECT id , provinces_in_thai , provinces_in_english  FROM provinces WHERE id='$ex_list_province' LIMIT 1 "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province=$rs_p['provinces_in_thai'];
                $project_province_en=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT districts_in_thai ,districts_in_english FROM districts WHERE id='$ex_list_district' LIMIT 1 "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district=$rs_d['districts_in_thai'];
                $project_district_en=$rs_d['districts_in_english'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT subdistricts_in_thai ,subdistricts_in_english   FROM subdistricts WHERE id='$ex_list_subdistrict' LIMIT 1 "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $project_subdistrict=$rs_s['subdistricts_in_thai'];
                $project_subdistrict_en=$rs_s['subdistricts_in_english']; 


               if($province_id=='1'){
                     
                     $address= "".$project_subdistrict." , ".$project_district." , ".$project_province;

                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en;

               }else{

                       $address="".$project_subdistrict." , ".$project_district." , ".$project_province;

                      $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en; 
               }

			   if($ex_list_bedroom=='0') { $ex_list_bedroom='1'; }

			   if($lang=='th'){
                       
				        $address=$address;
						$project_name=$project_name;
						$type_name="คอนโด";
						$sale_text=$sale_text;
						$area_text=$area_th;
                        $alt_heading=$ex_list_heading;
			   }else{

			            $address=$address_en;
						$project_name=$project_name_en;
						$type_name="Condo";
						$sale_text=$sale_text_en;
						$area_text=$area_en;
                        $alt_heading=$ex_list_heading_en;
			   }    
 
 ?>


							<li>
								<a href="./property/<?php echo $_SESSION['lang'];?>/<?php echo $ex_list_listing_code;?>">
									<div class="condo-card">
										<div class="cover" > 
                                            <img src="<?php echo $img_name_list;?>"  class="coverimg" alt="<?php echo $alt_heading;?>" title="<?php echo $alt_heading;?>"  >
										</div>
										<div class="detail">
											<div class="detail_1">฿<?php echo $ex_list_pric;?> <span><?php echo $type_name;?>  </span> </div>
				
											<div class="detail_2"><?php echo $project_name;?> <span><?php echo $sale_text;?></span></div>
				
											<div class="detail_3"><?php echo $address;?></div>
										</div>
										<div class="option">
                    <table>
                      <tr> 
                         <td>
                              <img src="images/22.webp" alt="<?php echo $bedroom_title;?>" title="<?php echo $bedroom_title;?>">
                              <p><?php if($ex_list_bedroom==0){ ?><span><?php  echo $ex_list_bedroom; ?> </span> 
                                <?php }else{ echo $bedroom_title;?> <span><?php echo $ex_list_bedroom;?> </span> <?php } ?></p>
                         </td>
                         <td>
                              <img src="images/11.webp" alt="<?php echo $bathroom_title;?>" title="<?php echo $bathroom_title;?>">
                              <p><?php echo $bathroom_title;?> <span><?php echo $ex_list_bathroom;?> </span></p>
                         </td>
                         <td>
                              <img src="images/77.webp" alt="<?php echo $floors_title;?>" title="<?php echo $floors_title;?>" >
                              <p><?php echo $floors_title;?> <span><?php echo $ex_list_floor;?></span></p>
                         </td>
                         <td>
                              <img src="images/88.webp" alt="<?php echo $area_size_title;?>" title="<?php echo $area_size_title;?>">
                              <p><?php echo $area_land_title;?> <span><?php echo $list_sqm;?></span> <?php echo $sqm_title;?></p>
                         </td>
                      </tr>
                    </table>

											
										</div>
									</div>
								</a>
							</li>
					 
   <?php } ?>

						</ul> 
					</div>
				</div>
			</div> 
		</section>
		 
  
  
        <section class="sec-home4">
            <div class="container-fluid">
       <?php if($lang=='en'){ ?>
                <h2><span>House</span></h2>
                <h3><?php echo $home_heading_h2;?></h3>
       <?php }else{ ?> 
                <h2>บ้านเดี่ยว /   <span>House</span></h2>
                <h3><?php echo "บ้านเดี่ยว ".$home_heading_h2_2;?></h3>
       <?php } ?>  
                
                <div class="row justify-content-center">
                    <div class="col-xl-10 "> 
                        <ul id="item4" class="item4">
  <?php   


     $sql = "SELECT *  FROM dbo_data_excel_listing   
             WHERE ex_list_listing_type='2' and ex_list_public='1' and ex_list_premium='1' 
             ORDER BY ex_list_premium DESC, ex_list_listing_code DESC LIMIT 12 ";
 
         $result = $conn->query($sql); 
          // output data of each row
         while($rs = $result->fetch_assoc()){      $n2++;  
              
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
              $project_id=$rs['project_id'];
              $ex_list_total_floors=$rs['ex_list_total_floors'];
              $ex_list_rai=$rs['ex_list_rai'];
              $ex_list_ngan=$rs['ex_list_ngan'];
              $ex_list_wa=$rs['ex_list_wa'];
              $ex_list_subdistrict=$rs['ex_list_subdistrict'];
              $ex_list_district=$rs['ex_list_district'];
              $ex_list_province=$rs['ex_list_province'];
              $listing_img_folder=$rs['listing_img_folder'];
              $listing_img_name=$rs['listing_img_webp'];

              $ex_list_pric=number_format($ex_list_price); 

              if($ex_list_deal_type=='ขาย' or $ex_list_deal_type=='1'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="SALE"; $sale_text="ขาย"; }
              else if($ex_list_deal_type=='เช่า' or $ex_list_deal_type=='2'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="RENT";   $sale_text="เช่า"; }
            /*  
              $sql_img="SELECT ex_list_listing_code,listing_img_folder,listing_img_name,listing_img_no 
                        FROM dbo_data_excel_listing_img 
                        WHERE ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC LIMIT 1  ";
              $result_img=$conn->query($sql_img); 
              $rs_img=$result_img->fetch_assoc();

              $listing_img_folder=$rs_img['listing_img_folder'];
              $listing_img_name=$rs_img['listing_img_name']; */
               
           

                     if($listing_img_folder!=''){   

                           $img_name_list=$listing_img_folder."webp/mini_w500/".$listing_img_name;

                     }else if($listing_img_name!=''){   
                           $img_name_list="../../images/listing/".$ex_list_listing_code."/webp/mini_w500/".$listing_img_name;  
                            
                     }else{  $img_name_list="../../images/noimages.jpg" ;  $test1 = "000"; 

                     }  


             $sql_project= "SELECT pj.project_id , pj.project_name , pj.project_name_en , pj.project_subdistrict , pj.project_district , pj.project_province
                            FROM  type_project AS pj  
                            WHERE  pj.project_id='$project_id' LIMIT 1 "; 
             $result_project=$conn->query($sql_project); 
             $rs_project= $result_project->fetch_assoc();


              if($project_id!=''){

                     $project_name=$rs_project['project_name'];
                     $project_name_en=$rs_project['project_name_en'];
                     $ex_list_subdistrict=$rs_project['project_subdistrict'];
                     $ex_list_district=$rs_project['project_district'];
                     $ex_list_province=$rs_project['project_province']; 
              }


      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$ex_list_province' LIMIT 1"; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province=$rs_p['provinces_in_thai'];
                $project_province_en=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$ex_list_district' LIMIT 1"; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district=$rs_d['districts_in_thai'];
                $project_district_en=$rs_d['districts_in_english'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$ex_list_subdistrict' LIMIT 1"; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $project_subdistrict=$rs_s['subdistricts_in_thai'];
                $project_subdistrict_en=$rs_s['subdistricts_in_english'];
                $zip_code=$rs_s['zip_code'];


               if($province_id=='1'){
                     
                     $address= "".$project_subdistrict." , ".$project_district." , ".$project_province;

                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en;

               }else{

                       $address="".$project_subdistrict." , ".$project_district." , ".$project_province;

                      $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en; 
               }


               if($lang=='th'){
                       
                    $address=$address;
                        $project_name=$project_name;
                        $type_name="บ้านเดี่ยว";
                        $sale_text=$sale_text;
                        $area_text=$ex_list_wa;
                        $alt_heading=$ex_list_heading;
               }else{

                    $address=$address_en;
                        $project_name=$project_name_en;
                        $type_name="House";
                        $sale_text=$sale_text_en;
                        $area_text=$ex_list_wa;
                        $alt_heading=$ex_list_heading_en;
               }                     

       
                 /*
                     if($device=="m"){ 
                            $address=substr($address,1 , 90 ); 
                            $address=str_replace("�","...",$address,$count); 
                     }else{

                     } */
 ?>


                            <li>
                                <a href="./property/<?php echo $_SESSION['lang'];?>/<?php echo $ex_list_listing_code;?>">
                                    <div class="condo-card">
                                        <div class="cover" > 
                                            <img src="<?php echo $img_name_list;?>"  class="coverimg" alt="<?php echo $alt_heading;?>" title="<?php echo $alt_heading;?>"  >
                                        </div>
                                        <div class="detail">
                                            <div class="detail_1">฿<?php echo $ex_list_pric;?> <span><?php echo $type_name;?>  </span> </div>
                
                                            <div class="detail_2"><?php echo $project_name;?> <span><?php echo $sale_text;?></span></div>
                
                                            <div class="detail_3"><?php echo $address;?></div>
                                        </div>
                                        <div class="option">
                                          <table>
                                            <tr> 
                                               <td>
                                                    <img src="images/22.webp" alt="<?php echo $bedroom_title;?>" title="<?php echo $bedroom_title;?>">
                                                    <p><?php echo $bedroom_title;?> <span><?php echo $ex_list_bedroom;?> </span> </p>
                                               </td>
                                               <td>
                                                    <img src="images/11.webp" alt="<?php echo $bathroom_title;?>" title="<?php echo $bathroom_title;?>">
                                                    <p><?php echo $bathroom_title;?> <span><?php echo $ex_list_bathroom;?> </span></p>
                                               </td>
                                               <td>
                                                    <img src="images/77.webp" alt="<?php echo $floors_total_title;?>"  title="<?php echo $floors_total_title;?>">
                                                    <p><?php echo $floors_total_title;?> <span><?php echo $ex_list_total_floors;?></span></p>
                                               </td>                                             
                                               <td>
                                                    <img src="images/55.webp" alt="<?php echo $area_land_title;?>" title="<?php echo $area_land_title;?>">
                                                    <p><?php echo $area_land_title;?> <span><?php echo $area_text;?></span> <?php echo $sqw_title;?></p>
                                               </td>
                                            </tr>
                                          </table>
                                        </div>
                                    </div>
                                </a>
                            </li>
                     
   <?php }  ?>


                        </ul>
                    </div>
                </div>
            </div> 
        </section> 

        <section class="sec-home3">
            <div class="container-fluid"> 
       <?php if($lang=='en'){ ?>
                 <h2>Townhome</h2>
                <h3><?php echo $home_heading_h2;?></h3>
       <?php }else{ ?> 
                <h2>ทาวน์โฮม /   <span> Townhome</span></h2>
                <h3><?php echo "ทาวน์เฮ้าส์ ทาวน์โฮม ".$home_heading_h2_2;?></h3>
       <?php } ?>  

                <div class="row justify-content-center">
                    <div class="col-xl-10 "> 
                        <ul id="item5" class="item5">
 
<?php    

     $sql = "SELECT * FROM dbo_data_excel_listing 
             where ex_list_listing_type='4' and ex_list_public='1'  and ex_list_premium='1'
             order by ex_list_premium DESC, ex_list_listing_code DESC LIMIT 12 ";

         $result = $conn->query($sql); 
          // output data of each row
         while($rs = $result->fetch_assoc()){      $n3++;  
              
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
              $project_name=$rs['project_name'];
              $project_id=$rs['project_id'];
              $ex_list_floor=$rs['ex_list_floor'];
              $ex_list_total_floors=$rs['ex_list_total_floors'];
              $ex_list_rai=$rs['ex_list_rai'];
              $ex_list_ngan=$rs['ex_list_ngan'];
              $ex_list_wa=$rs['ex_list_wa'];
              $ex_list_subdistrict=$rs['ex_list_subdistrict'];
              $ex_list_district=$rs['ex_list_district'];
              $ex_list_province=$rs['ex_list_province'];
              $listing_img_folder=$rs['listing_img_folder'];
              $listing_img_name=$rs['listing_img_webp'];

              $ex_list_pric=number_format($ex_list_price); 

              if($ex_list_deal_type=='ขาย' or $ex_list_deal_type=='1'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="SALE"; $sale_text="ขาย"; }
              else if($ex_list_deal_type=='เช่า' or $ex_list_deal_type=='2'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="RENT";   $sale_text="เช่า"; }
           
            

                     if($listing_img_folder!=''){   

                           $img_name_list=$listing_img_folder."webp/mini_w500/".$listing_img_name;

                     }else if($listing_img_name!=''){   
                           $img_name_list="../../images/listing/".$ex_list_listing_code."/webp/mini_w500/".$listing_img_name;  
                            
                     }else{  $img_name_list="../../images/noimages.jpg" ;  $test1 = "000"; 

                     }  

             $sql_project= "SELECT pj.project_id , pj.project_name , pj.project_name_en , pj.project_subdistrict , pj.project_district , pj.project_province
                            FROM  type_project AS pj  
                            WHERE  pj.project_id='$project_id' LIMIT 1 "; 
             $result_project=$conn->query($sql_project); 
             $rs_project= $result_project->fetch_assoc();


              if($project_id!=''){

                     $project_name=$rs_project['project_name'];
                     $project_name_en=$rs_project['project_name_en'];
                     $ex_list_subdistrict=$rs_project['project_subdistrict'];
                     $ex_list_district=$rs_project['project_district'];
                     $ex_list_province=$rs_project['project_province'];

              } 


      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$ex_list_province' LIMIT 1"; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province=$rs_p['provinces_in_thai'];
                $project_province_en=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$ex_list_district' LIMIT 1"; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district=$rs_d['districts_in_thai'];
                $project_district_en=$rs_d['districts_in_english'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$ex_list_subdistrict' LIMIT 1"; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $project_subdistrict=$rs_s['subdistricts_in_thai'];
                $project_subdistrict_en=$rs_s['subdistricts_in_english'];
                $zip_code=$rs_s['zip_code'];


               if($province_id=='1'){
                     
                     $address= "".$project_subdistrict." , ".$project_district." , ".$project_province;

                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en;

               }else{

                       $address="".$project_subdistrict." , ".$project_district." , ".$project_province;

                      $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en; 
               }


               if($lang=='th'){
                       
                        $address=$address;
                        $project_name=$project_name;
                        $type_name="ทาวน์โฮม";
                        $sale_text=$sale_text;
                        $area_text=$ex_list_wa;
                        $alt_heading=$ex_list_heading;

               }else{

                        $address=$address_en;
                        $project_name=$project_name_en;
                        $type_name="Townhome";
                        $sale_text=$sale_text_en;
                        $area_text=$ex_list_wa;
                        $alt_heading=$ex_list_heading_en;
               }


 ?>


                            <li>
                                <a href="./property/<?php echo $_SESSION['lang'];?>/<?php echo $ex_list_listing_code;?>">
                                    <div class="condo-card">
                                        <div class="cover" style=""> 
                                            <img src="<?php echo $img_name_list;?>"  class="coverimg" alt="<?php echo $alt_heading;?>" title="<?php echo $alt_heading;?>" >
                                        </div> 
                                        <div class="detail">
                                            <div class="detail_1">฿<?php echo $ex_list_pric;?> <span><?php echo $type_name;?>  </span> </div>
                
                                            <div class="detail_2"><?php echo $project_name;?> <span><?php echo $sale_text;?></span></div>
                
                                            <div class="detail_3"><?php echo $address;?></div>
                                        </div>
                                        <div class="option"> 
                                            <table>
                                              <tr> 
                                                 <td>
                                                      <img src="images/22.webp" alt="<?php echo $bedroom_title;?>" title="<?php echo $bedroom_title;?>">
                                                      <p><?php echo $bathroom_title;?> <span><?php echo $ex_list_bedroom;?> </span></p>
                                                 </td>
                                                 <td>
                                                      <img src="images/11.webp" alt="<?php echo $bathroom_title;?>" title="<?php echo $bathroom_title;?>">
                                                      <p><?php echo $bathroom_title;?> <span><?php echo $ex_list_bathroom;?> </span></p>
                                                 </td>
                                                 <td>
                                                      <img src="images/77.webp" alt="<?php echo $floors_total_title;?>"  title="<?php echo $floors_total_title;?>">
                                                      <p><?php echo $floors_total_title;?> <span><?php echo $ex_list_floor;?></span></p>
                                                 </td>                                            
                                                 <td>
                                                      <img src="images/55.webp" alt="<?php echo $area_land_title;?>" title="<?php echo $area_land_title;?>">
                                                      <p><?php echo $area_land_title;?> <span><?php echo $area_text;?></span> <?php echo $sqm_title;?></p>
                                                 </td>
                                              </tr>
                                            </table>                                       
                                        </div>
                                    </div>
                                </a>
                            </li>
                     
   <?php }  ?>

                        </ul>
                    </div>
                </div>
            </div> 
        </section>
 

		<section class="sec-home6">
			<div class="container">
  
 <?php if($lang=='en'){ ?> 
         <h2><span>Our Services</span></h2>
         <h3><?php echo $services_h2_2;?></h3>
 <?php }else{ ?> 
        <h2>บริการของเรา   / <span> Our Services </span></h2>
        <h3><?php echo $services_h2_2;?></h3>
 <?php } ?>

 
				<div class="row">
					<div class="col-xl-4 col-12">
						<div class="our-ser">
							<center><div class="icon-ser" ><img src="<?php echo $part;?>images/icon/01.webp" alt="<?php echo $out_service_title_1;?>" title="<?php echo $out_service_title_1;?>" ></div></center>
							<h4><?php echo $out_service_title_1;?></h4>
							<p><?php echo $out_service_detail_1;?></p>
						</div>
					</div>
					<div class="col-xl-4 col-12">
						<div class="our-ser">
							<center><div class="icon-ser"><img src="<?php echo $part;?>images/icon/02.webp" alt="?php echo $out_service_title_2;?>" title="<?php echo $out_service_title_2;?>" ></div></center>
							<h4><?php echo $out_service_title_2;?></h4>
							<p><?php echo $out_service_detail_2;?></p>
						</div>
					</div>
					<div class="col-xl-4 col-12">
						<div class="our-ser">
							<center><div class="icon-ser"> <img src="<?php echo $part;?>images/icon/03.webp" alt="<?php echo $out_service_title_3;?>" title="<?php echo $out_service_title_3;?>" > </div></center>
							<h4><?php echo $out_service_title_3;?></h4>
							<p><?php echo $out_service_detail_3;?></p>
						</div>
					</div>
					<div class="col-xl-1 col-12">
						 
					</div>
					<div class="col-xl-5 col-12">
						<div class="our-ser">
							<center><div class="icon-ser"><img src="<?php echo $part;?>images/icon/04.webp" alt="<?php echo $out_service_title_4;?>" title="<?php echo $out_service_title_4;?>" ></div></center>
							<h4><?php echo $out_service_title_4;?></h4>
							<p><?php echo $out_service_detail_4;?></p>
						</div>
					</div>
					<div class="col-xl-5 col-12">
						<div class="our-ser">
							<center><div class="icon-ser"><img src="<?php echo $part;?>images/icon/05.webp" alt="<?php echo $out_service_title_5;?>" title="<?php echo $out_service_title_5;?>" ></div></center>
							<h4><?php echo $out_service_title_5;?></h4>
							<p><?php echo $out_service_detail_5;?></p>
						</div>
					</div>
					<div class="col-xl-1 col-12">
						 
					</div>
				</div>

				<div class="col text-center">
					<a href="../consignment/<?php echo $lang;?>" class="btn btn-yellow text-center"><?php echo $property_with_title;?></a>
				</div>
			</div> 
		</section>


		<section class="sec-home7">
			<div class="container-fluid">
				
				<div class="row justify-content-center">
					<div class="col-xl-10 owlm2"> 


     <?php if($lang=='en'){ ?> 
            <h2>News & Events</h2>
     <?php }else{ ?> 
            <h2>ข่าวและกิจกรรม   / <span> Events </span></h2>
     <?php } ?>	 
        
     <?php if($device=='pc'){ ?> 
						<a href="<?php echo $url_content;?>" class="btn btn-yellow2"><?php echo $more_title;?></a>
     <?php } ?> 


						<ul id="item7" class="item7">

			    <?php

				      $sql_content= "SELECT * FROM dbo_data_content  order by data_content_highlight DESC LIMIT 6";

					  $result_content= $conn->query($sql_content); 
			    	  // output data of each row
			          while($rs_content= $result_content->fetch_assoc()){      $content1++;  
 

				          	$data_content_title=$rs_content['data_content_title'];
				          	$data_content_img=$rs_content['data_content_img'];
				          	$data_content_url=$rs_content['data_content_url'];
				          	$data_content_meta_title=$rs_content['data_content_meta_title'];
				          	$data_content_meta_description=$rs_content['data_content_meta_description']; 
                            $data_content_title_en=$rs_content['data_content_title_en'];
                            $data_content_detail_en=$rs_content['data_content_detail_en'];
                            $data_content_meta_title_en=$rs_content['data_content_meta_title_en'];
                            $data_content_meta_keyword_en=$rs_content['data_content_meta_keyword_en'];
                            $data_content_meta_description_en=$rs_content['data_content_meta_description_en'];
                            $data_content_img_en=$rs_content['data_content_img_en']; 
                            $data_content_url_en=$rs_content['data_content_url_en'];


                            if($lang=='th'){
                                 
                 
                                 $heading=$data_content_title; 
                                 $detail=$data_content_meta_description; 
                                 $url=$data_content_url;
                       
                                    if($data_content_img!=''){

                                           $data_content_img="../../images/content/mini_400/".$data_content_img;
                                    }else{
                                           $data_content_img="../../images/noimages.webp";
                                    }
                             
                            }else{

                                 $img_name_list="../../images/content/".$data_content_img;
                                 $url=$data_content_url_en;

                                 $heading=$data_content_title_en; 
                                 $detail=$data_content_meta_description_en; 
                          

                                    if($data_content_img!=''){

                                           $data_content_img="../../images/content/mini_400/".$data_content_img;
                                    }else{
                                           $data_content_img="../../images/noimages.webp";
                                    }

                            } 
				   ?>

							<li>
								<a href="<?php echo $part;?>content_view/<?php echo $lang;?>/<?php echo $url;?>">
									<div class="news-card"  > 
                                <img src="<?php echo $part.$data_content_img;?>" class="img" alt="<?php echo $heading;?>" title="<?php echo $heading;?>" >
										<h4><?php echo $heading;?></h4>
										<p> <?php echo $detail;?>
										</p>
									</div>
								</a>
							</li>  
              <?php  } ?>
         
						</ul>  
					</div>  

				</div>
           
     <?php if($device=='m'){ ?> 
            <center style="margin-top: 10px;"><a href="<?php echo $url_content;?>" class="btn btn-yellow2"><?php echo $more_title;?></a></center>
     <?php } ?>   
			</div> 
		</section>


		<section class="sec-home8">
			<div class="container-fluid"> 
				<div class="row justify-content-center">
					<div class="col-xl-10">  

     <?php if($device=='m'){ ?> 
            <center style="margin: 10px 0px 20px 0px;"> 
             <?php if($lang=='en'){ ?> 
                    <h2><span>Past Work</span></h2>
             <?php }else{ ?> 
                    <h2>ผลงานที่ผ่าน   / <span> Past Work </span></h2>
             <?php } ?>   
            </center>
     <?php } ?>    

						<div class="row">
							<div class="col-xl-6">
								<div class="row">
									<div class="col-6 mb-1"  >
										<img src="<?php echo $part;?>images/pastwork/1.webp"  width="640" height="360" alt="<?php echo $heading;?>"  class="img-fluid m-auto d-block">
									</div>
									<div class="col-6 mb-1">
										<img src="<?php echo $part;?>images/pastwork/2.webp"  width="640" height="360" alt="<?php echo $heading;?>" class="img-fluid m-auto d-block">
									</div>
									<div class="col-6 mb-1">
										<img src="<?php echo $part;?>images/pastwork/3.webp" width="640" height="360" alt="<?php echo $heading;?>" class="img-fluid m-auto d-block">
									</div>
									<div class="col-6 mb-1">
										<img src="<?php echo $part;?>images/pastwork/4.webp" width="640" height="360" alt="<?php echo $heading;?>" class="img-fluid m-auto d-block">
									</div>
								</div>
							</div>
							<div class="col-xl-6 sec-home8-p"> 
     <?php if($device=='pc'){ 
               if($lang=='en'){ ?> 
                <h2><span>Past Work</span></h2>
         <?php }else{ ?> 
                <h2>ผลงานที่ผ่าน   / <span> Past Work </span></h2>
         <?php }
           } ?>  
 
								<p>
									<?php echo $pastwork_detail;?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="sec-home9">
 
			<div class="container-fluid">  

         <?php if($lang=='en'){  $height_testimonial="450px;"; ?> 
                <h2>Testimonial</h2>
         <?php }else{  $height_testimonial="380px;";  ?> 
                <h2>ความประทับใจจากลูกค้า   / <span> Testimonial </span></h2>
         <?php } ?> 
				<div class="row justify-content-center">
					<div class="col-xl-10">

						<ul id="item9" class="item9"  >
							<li  style="height: <?php echo $height_testimonial;?> " > 
								<div class="testimonial">
									<img src="images/testimonials/01.webp" alt="ประทับใจในการบริการมากครับ" title="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title1;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li style="height: <?php echo $height_testimonial;?> " > 
								<div class="testimonial">
									<img src="images/testimonials/02.webp" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title2;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li  style="height: <?php echo $height_testimonial;?> "> 
								<div class="testimonial">
									<img src="images/testimonials/03.webp" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title3;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li  style="height: <?php echo $height_testimonial;?> "> 
								<div class="testimonial">
									<img src="images/testimonials/04.webp" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title4;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li style="height: <?php echo $height_testimonial;?> "> 
								<div class="testimonial">
									<img src="images/testimonials/05.webp" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title5;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li style="height: <?php echo $height_testimonial;?> "> 
								<div class="testimonial">
									<img src="images/testimonials/06.webp" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title6;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li style="height: <?php echo $height_testimonial;?> "> 
								<div class="testimonial">
									<img src="images/testimonials/07.webp" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title7;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
						</ul>
					</div>
				</div>
 
			</div>
		</section>

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

 

 <?php include("include/footer.php"); ?>
<!--?v=<?php echo $today;?>-->

     <link rel="preload" href="https://code.jquery.com/jquery-3.5.1.min.js" as="script">
     <link rel="preload" href="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" as="script">
     <link rel="preload" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" as="script">
     <link rel="preload" href="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js" as="script">
     <link rel="preload" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" as="script">
     <link rel="preload" href="../js/select2_en.js" as="script">
     <link rel="preload" href="../js/select2_th.js" as="script">


     <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>    
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?v=<?php echo $today;?>"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js?v=<?php echo $today;?>"></script>  



       <!--  นำเข้า JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js?v=<?php echo $today;?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js?v=<?php echo $today;?>"></script>

<?php if($lang=='en'){ ?>

    <script src="../js/select2_en.js"></script> 

<?php }else{ ?>

    <script src="../js/select2_th.js"></script>

<?php } ?>


    <script type="text/javascript">
    
        $(document).ready(function() {
      /*กำหนดให้ class js-data-example-ajax  เรียกใช้งาน Function Select 2*/
      $(".js-data-example-ajax").select2({
        ajax: {
        url: "../include/json_data.php",/* Url ที่ต้องการส่งค่าไปประมวลผลการค้นข้อมูล*/
        dataType: 'json',
        delay: 250,
        data: function (params) {
          
          return {
          q: params.term, // ค่าที่ส่งไป
          page: params.page
          };

        },
        processResults: function (data, params) {
          // parse the results into the format expected by Select2
          // since we are using custom formatting functions we do not need to
          // alter the remote JSON data, except to indicate that infinite
          // scrolling can be used
          params.page = params.page || 3;

          return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
          };
        },
        cache: true
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 3,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
      });

        });
    

    function formatRepo (repo) {
    
      if (repo.loading) return repo.text;
      
      var markup = "<div class='select2-result-repository clearfix'>" +
      "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'> " + repo.value + "</div></div></div>";

      return markup;
    }

    
    function formatRepoSelection (repo) {
      return repo.value || repo.text;
    }

    </script>



      <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js" as="script">
      <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js" as="script">

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
	
	$conn->free_result();  ?>
</body>
</html>
