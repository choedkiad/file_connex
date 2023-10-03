<!DOCTYPE html>

<?php   session_start();
ini_set("max_execution_time","0");
ini_set("memory_limit","9999M"); 
$today=date("YmdHis");

?>
<?php   include ("include/config.php"); ?>
<?php   include_once ("setting.php"); 


        $part="../../../";

        $img_list1="https://connex.in.th/images/bg1.png";
        $url_th="https://connex.in.th/";
        $url_en="https://connex.in.th/en";


	    if($lang=='en'){

	    	 $settings_title="Connex Property ขายบ้าน คอนโด ทาวน์โฮม ที่ดิน อสังหาฯทุกประเภทบ้าน";
             $url_content="https://connex.in.th/content/en";
             $pastwork_detail="Connex Property aims to connect people to their desired property. We want to empower people to buy/sell their property with ease, efficiency, and transparency. To achieve that, we use cutting-edge technology to create simple, certain buying/selling experience for our customers. We offer the best selection that matches individual customer's need. And, we have market-expert professionals that is well-trained to give reliable, insightful advice allowing our customers to make best-informed decision. As a result, we have succeeded in helping a huge number of customers achieve their property goals, be it buying, selling, or renting.  "; 

             $url_content="https://connex.in.th/content/en/1";


             //our service
             $out_service_title_1="Professional Team";
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
 
       
	    }else{

	    	 $settings_title="Connex Property ขายบ้าน คอนโด ทาวน์โฮม ที่ดิน อสังหาฯทุกประเภทบ้าน";
	    	 $settings_keyword="ขายบ้านเดี่ยว,ขายคอนโดมิเนียม,ขายทาวน์โฮม,ขายที่ดิน";
	    	 $settings_description="Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ที่ดิน ทาวน์เฮ้าส์-ทาวน์โฮม อพาร์ทเม้นท์ให้เช่า พร้อม รีวิวโครงการบ้านและคอนโด โครงการใหม่ ครอบคลุมทุกอสังหาริมทรัพย์ ลงประกาศขาย-ให้เช่า";
             $url_en="https://connex.in.th/en";
             $url_content="https://connex.in.th/content/th/1";
             $lang='th';


             
             //our service

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

	    } 

        
        if($device=="pc"){ 

             $search_title="Search by location, station, project or unit ID";

        }else{

             $search_title="Search by location, station...";

        }



 



                $sql="SELECT *  FROM type_zone_group WHERE zone_g_highlight='1' order by zone_g_number ASC"; 
				$result = $conn->query($sql); 
			    	  // output data of each row
			    while($rs = $result->fetch_assoc()){   $zone_g++;
                    

                    if($zone_g=='1'){   $zone_type1_th=$rs['zone_g_name'];  $zone_type1_en=$rs['zone_g_name_en'];  $zone_image1=$rs['zone_g_image'];
                                        $search_g_id1=$rs['search_g_id'];   
                                    }
                    if($zone_g=='2'){   $zone_type2_th=$rs['zone_g_name'];  $zone_type2_en=$rs['zone_g_name_en'];  $zone_image2=$rs['zone_g_image']; 
                                        $search_g_id2=$rs['search_g_id'];
                                    }		    	
                    if($zone_g=='3'){   $zone_type3_th=$rs['zone_g_name'];  $zone_type3_en=$rs['zone_g_name_en'];  $zone_image3=$rs['zone_g_image']; 
                                        $search_g_id3=$rs['search_g_id'];   
                                    }
                    if($zone_g=='4'){   $zone_type4_th=$rs['zone_g_name'];  $zone_type4_en=$rs['zone_g_name_en'];  $zone_image4=$rs['zone_g_image']; 
                                        $search_g_id4=$rs['search_g_id'];
                                    }
                    if($zone_g=='5'){   $zone_type5_th=$rs['zone_g_name'];  $zone_type5_en=$rs['zone_g_name_en'];  $zone_image5=$rs['zone_g_image']; 
                                        $search_g_id5=$rs['search_g_id'];
                                    }
                    if($zone_g=='6'){   $zone_type6_th=$rs['zone_g_name'];  $zone_type6_en=$rs['zone_g_name_en'];  $zone_image6=$rs['zone_g_image']; 
                                        $search_g_id6=$rs['search_g_id'];
                                    }
                    if($zone_g=='7'){   $zone_type7_th=$rs['zone_g_name'];  $zone_type7_en=$rs['zone_g_name_en'];  $zone_image7=$rs['zone_g_image']; 
                                        $search_g_id7=$rs['search_g_id'];
                                    }
                    if($zone_g=='8'){   $zone_type8_th=$rs['zone_g_name'];  $zone_type8_en=$rs['zone_g_name_en'];  $zone_image8=$rs['zone_g_image']; 
                                        $search_g_id8=$rs['search_g_id']; 
                                    }
                    if($zone_g=='9'){   $zone_type9_th=$rs['zone_g_name'];  $zone_type9_en=$rs['zone_g_name_en'];  $zone_image9=$rs['zone_g_image']; 
                                        $search_g_id9=$rs['search_g_id']; 
                                    }
                    if($zone_g=='10'){  $zone_type10_th=$rs['zone_g_name'];  $zone_type10_en=$rs['zone_g_name_en'];  $zone_image10=$rs['zone_g_image']; 
                                        $search_g_id10=$rs['search_g_id'];
                                    }
                    if($zone_g=='11'){  $zone_type11_th=$rs['zone_g_name'];  $zone_type11_en=$rs['zone_g_name_en'];  $zone_image11=$rs['zone_g_image']; 
                                        $search_g_id11=$rs['search_g_id'];
                                    }
                    if($zone_g=='12'){  $zone_type12_th=$rs['zone_g_name'];  $zone_type12_en=$rs['zone_g_name_en'];  $zone_image12=$rs['zone_g_image']; 
                                        $search_g_id12=$rs['search_g_id'];
                                     }
                    if($zone_g=='13'){  $zone_type13_th=$rs['zone_g_name'];  $zone_type13_en=$rs['zone_g_name_en'];  $zone_image13=$rs['zone_g_image']; 
                                        $search_g_id13=$rs['search_g_id'];
                                    }
                    if($zone_g=='14'){  $zone_type14_th=$rs['zone_g_name'];  $zone_type14_en=$rs['zone_g_name_en'];  $zone_image14=$rs['zone_g_image']; 
                                        $search_g_id14=$rs['search_g_id'];
                                    }
                    if($zone_g=='15'){  $zone_type15_th=$rs['zone_g_name'];  $zone_type15_en=$rs['zone_g_name_en'];  $zone_image15=$rs['zone_g_image']; 
                                        $search_g_id15=$rs['search_g_id'];
                                    }
                    if($zone_g=='16'){  $zone_type16_th=$rs['zone_g_name'];  $zone_type16_en=$rs['zone_g_name_en'];  $zone_image16=$rs['zone_g_image'];
                                        $search_g_id16=$rs['search_g_id']; }

                    if($zone_g=='17'){  $zone_type17_th=$rs['zone_g_name'];  $zone_type17_en=$rs['zone_g_name_en'];  $zone_image17=$rs['zone_g_image']; 
                                        $search_g_id17=$rs['search_g_id'];  }

                    if($zone_g=='18'){  $zone_type18_th=$rs['zone_g_name'];  $zone_type18_en=$rs['zone_g_name_en'];  $zone_image18=$rs['zone_g_image']; 
                                        $search_g_id18=$rs['search_g_id']; } 

			     } 

                 
                 if($_SESSION['lang']=='th'){
                          $zone_type1=$zone_type1_th;         $zone_g_url1="https://connex.in.th/include/process_search.php?lang=th&search_g_id=$search_g_id1";
                          $zone_type2=$zone_type2_th;         $zone_g_url2="https://connex.in.th/search/th/0/0/$search_z_id2/0/0/s/$zone_type2_en/1";
                          $zone_type3=$zone_type3_th;         $zone_g_url3="https://connex.in.th/search/th/0/0/$search_z_id3/0/0/s/$zone_type3_en/1";
                          $zone_type4=$zone_type4_th;         $zone_g_url4="https://connex.in.th/search/th/0/0/$search_z_id4/0/0/s/$zone_type4_en/1";
                          $zone_type5=$zone_type5_th;         $zone_g_url5="https://connex.in.th/search/th/0/0/$search_z_id5/0/0/s/$zone_type5_en/1";
                          $zone_type6=$zone_type6_th;         $zone_g_url6="https://connex.in.th/search/th/0/0/$search_z_id6/0/0/s/$zone_type6_en/1";
                          $zone_type7=$zone_type7_th;         $zone_g_url7="https://connex.in.th/search/th/0/0/$search_z_id7/0/0/s/$zone_type7_en/1";
                          $zone_type8=$zone_type8_th;         $zone_g_url8="https://connex.in.th/search/th/0/0/$search_z_id8/0/0/s/$zone_type8_en/1";
                          $zone_type9=$zone_type9_th;         $zone_g_url9="https://connex.in.th/search/th/0/0/$search_z_id9/0/0/s/$zone_type9_en/1";
                          $zone_type10=$zone_type10_th;       $zone_g_url10="https://connex.in.th/search/th/0/0/$search_z_id10/0/0/s/$zone_type10_en/1";
                          $zone_type11=$zone_type11_th;       $zone_g_url11="https://connex.in.th/search/th/0/0/$search_z_id11/0/0/s/$zone_type11_en/1";
                          $zone_type12=$zone_type12_th;       $zone_g_url12="https://connex.in.th/search/th/0/0/$search_z_id12/0/0/s/$zone_type12_en/1";
                          $zone_type13=$zone_type13_th;       $zone_g_url13="https://connex.in.th/search/th/0/0/$search_z_id13/0/0/s/$zone_type13_en/1";
                          $zone_type14=$zone_type14_th;       $zone_g_url14="https://connex.in.th/search/th/0/0/$search_z_id14/0/0/s/$zone_type14_en/1";
                          $zone_type15=$zone_type15_th;       $zone_g_url15="https://connex.in.th/search/th/0/0/$search_z_id15/0/0/s/$zone_type15_en/1";
                          $zone_type16=$zone_type16_th;       $zone_g_url16="https://connex.in.th/search/th/0/0/$search_z_id16/0/0/s/$zone_type16_en/1";
                          $zone_type17=$zone_type17_th;       $zone_g_url17="https://connex.in.th/search/th/0/0/$search_z_id17/0/0/s/$zone_type17_en/1";
                          $zone_type18=$zone_type18_th;       $zone_g_url18="https://connex.in.th/search/th/0/0/$search_z_id18/0/0/s/$zone_type18_en/1";

                 }else{

                          $zone_type1=$zone_type1_en;         $zone_g_url1="https://connex.in.th/search/en/0/0/$search_z_id1/0/0/s/$zone_type1_en/1";
                          $zone_type2=$zone_type2_en;         $zone_g_url2="https://connex.in.th/search/en/0/0/$search_z_id2/0/0/s/$zone_type2_en/1";
                          $zone_type3=$zone_type3_en;         $zone_g_url3="../zone/en/".$zone_g_url3_en."/1";
                          $zone_type4=$zone_type4_en;         $zone_g_url4="../zone/en/".$zone_g_url4_en."/1";
                          $zone_type5=$zone_type5_en;         $zone_g_url5="../zone/en/".$zone_g_url5_en."/1";
                          $zone_type6=$zone_type6_en;         $zone_g_url6="../zone/en/".$zone_g_url6_en."/1";
                          $zone_type7=$zone_type7_en;         $zone_g_url7="../zone/en/".$zone_g_url7_en."/1";
                          $zone_type8=$zone_type8_en;         $zone_g_url8="../zone/en/".$zone_g_url8_en."/1";
                          $zone_type9=$zone_type9_en;         $zone_g_url9="../zone/en/".$zone_g_url9_en."/1";
                          $zone_type10=$zone_type10_en;       $zone_g_url10="../zone/en/".$zone_g_url10_en."/1";
                          $zone_type11=$zone_type11_en;       $zone_g_url11="../zone/en/".$zone_g_url11_en."/1";
                          $zone_type12=$zone_type12_en;       $zone_g_url12="../zone/en/".$zone_g_url12_en."/1";
                          $zone_type13=$zone_type13_en;       $zone_g_url13="../zone/en/".$zone_g_url13_en."/1";
                          $zone_type14=$zone_type14_en;       $zone_g_url14="../zone/en/".$zone_g_url14_en."/1";
                          $zone_type15=$zone_type15_en;       $zone_g_url15="../zone/en/".$zone_g_url15_en."/1";
                          $zone_type16=$zone_type16_en;       $zone_g_url16="../zone/en/".$zone_g_url16_en."/1";
                          $zone_type17=$zone_type17_en;       $zone_g_url17="../zone/en/".$zone_g_url17_en."/1";
                          $zone_type18=$zone_type18_en;       $zone_g_url18="../zone/en/".$zone_g_url18_en."/1";
                 }
 
			  
?>
<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <?php if($device=="pc"){ ?> 
    <link href="css/main.css?v=<?php echo $today;?>" rel="stylesheet" type="text/css" />   
 <?php }else{ ?>
    <link href="css/main_mobile.css?v=<?php echo $today;?>" rel="stylesheet" type="text/css" />   
 <?php } ?>
    <link rel="icon" type="image/x-icon" href="images/logo_icon.png"> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>  
	<title><?php echo $settings_title;?></title>
    <meta name="author" content="Connex Property">
    <meta name="keywords" content="<?php echo $settings_keyword;?>">
    <meta name="description" content="<?php echo $settings_description;?>">	


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
 

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" />


</head>
<body>

   <?php include("include/menu.php");?>

	<main>

 
		



		<div class="container-fluid map">

		</div>

		
		<section class="sec-home1">
			<div class="container-fluid">
				<div class="home1">
					<h1>Find your place</h1>
					<h4>Reliable services, hassle-free experience for your home search. </h4>


					<div class="deal-type">
						<ul>
							<li <?php if($_SESSION['deal']=='sell' or $_SESSION['deal']==''){ ?> class="active" <?php } ?>>
								<a href="../../include/process.php?deal=sell">Buy</a>
							</li>
							<li <?php if($_SESSION['deal']=='rent'){ ?> class="active" <?php } ?>>
								<a href="../../include/process.php?deal=rent">Rent</a>
							</li>
							<li >
								<a href="../../consignment/<?php if($lang!=''){ echo $lang;}else{ echo "th";} ?>">sell</a>
							</li>
						</ul>
					</div>
         <form method="post" id="form1" enctype="multipart/form-data" action="../../include/process_search.php "  >

						<input type="text" name="search_s" id="" class="form-control" placeholder="<?php echo $search_title;?> ">
            <input type="text" class="form-control" style="width: 100%;" name="page"  value="search" hidden="hidden" >
						<input type="text" name="deal_s" id="" value="<?php if($_SESSION['deal']=='sell'){ echo "1";}else if($_SESSION['deal']=='rent'){ echo "2";}else{} ?>" hidden="hidden" >
						<input type="text" name="lang" id="" value="<?php echo $lang ; ?>" hidden="hidden" >
						<!--<button class="btn">Search</button>-->
						<input type="submit" class="btn" value="Search">  
					</form>
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
												<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image1;?>);">
													<div class="des1">
														<h5></h5>
										                <h3><?php echo $zone_type1;?></h3>
													</div>
												</div>
											</a>  
										</div>  
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url2;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image2;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type2;?></h3>
														<h5> </h5>
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url3;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image3;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type3;?></h3>
														<h5> </h5>
													</div>
												</div> 
											</a>
										</div>  
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url4;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image4;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type4;?></h3>
														<h5> </h5>
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url5;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image5;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type5;?></h3>
														<h5> </h5>
													</div>
												</div> 
											</a>
										</div>  
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url6;?>">
												<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image6;?>);">
													<div class="des1">
														<h5> </h5>
														<h3><?php echo $zone_type6;?></h3>
													</div>
												</div>
											</a>  
										</div>  
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url7;?>">
												<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image7;?>);">
													<div class="des1">
														<h5> </h5>
														<h3><?php echo $zone_type7;?></h3>
													</div>
												</div>
											</a>  
										</div> 
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url8;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image8;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type8;?></h3>>
														<h5> </h5>
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url9;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image9;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type9;?></h3>>
														<h5> </h5>
													</div>
												</div> 
											</a>
										</div> 
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url10;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image10;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type10;?></h3>>
														<h5> </h5>
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url11;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image11;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type11;?></h3>>
														<h5> </h5>
													</div>
												</div> 
											</a>
										</div> 
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url12;?>">
												<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image12;?>);">
													<div class="des1">
														<h5> </h5>
														<h3><?php echo $zone_type12;?></h3>
													</div>
												</div>
											</a>  
										</div>  
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url13;?>">
												<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image13;?>);">
													<div class="des1">
														<h5> </h5>
														<h3><?php echo $zone_type13;?></h3>
													</div>
												</div>
											</a>  
										</div> 
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url14;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image14;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type14;?></h3>>
														<h5> </h5>
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url15;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image15;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type15;?></h3>>
														<h5> </h5>
													</div>
												</div> 
											</a>
										</div>
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url16;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image16;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type16;?></h3>>
														<h5> </h5>
													</div>
												</div> 
											</a>
											<a href="<?php echo $zone_g_url17;?>">
												<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image17;?>);"> 
													<div class="des2">
														<h3><?php echo $zone_type17;?></h3>>
														<h5> </h5>
													</div>
												</div> 
											</a>
										</div>
										<div class="carousel-item">
											<a href="<?php echo $zone_g_url18;?>">
												<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image18;?>);">
													<div class="des1">
														<h5> </h5>
														<h3><?php echo $zone_type18;?></h3>
													</div>
												</div>
											</a>  
										</div> 

									</div> 
									<a class="carousel-control-prev" href="#item_box2" data-slide="prev">
										<span class="carousel-control-prev-icon"></span>
									</a>
									<a class="carousel-control-next" href="#item_box2" data-slide="next">
										<span class="carousel-control-next-icon"></span>
									</a>
								</div>
							</div>
						</div>

						<ul id="item2" class="item2 mb-x">


							<li>
								<a href="<?php echo $zone_g_url1;?>">
									<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image1;?>);">
										<div class="des1">
											<h5></h5>
										    <h3><?php echo $zone_type1;?></h3>
										</div>
									</div>
								</a>  
							</li> 
							<li>
								<a href="<?php echo $zone_g_url2;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image2;?>);"> 
										<div class="des2">
											<h3><?php echo $zone_type2;?></h3>
											<h5> </h5>
									        
										</div>
									</div> 
								</a>
								<a href="<?php echo $zone_g_url3;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image3;?>);"> 
										<div class="des2">
										  <h3><?php echo $zone_type3;?></h3>
										  <h5> </h5>
										</div>
									</div> 
								</a>
							</li>
							<li>
								<a href="<?php echo $zone_g_url4;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image4;?>);"> 
										<div class="des2">
										    <h3><?php echo $zone_type4;?></h3>
											<h5> </h5>
										</div>
									</div> 
								</a>
								<a href="<?php echo $zone_g_url5;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image5;?>);"> 
										<div class="des2">
											<h3><?php echo $zone_type5;?></h3>
											<h5> </h5>
										</div>
									</div> 
								</a>
							</li>						 

							<li>
								<a href="<?php echo $zone_g_url6;?>">
									<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image6;?>);">
										<div class="des1">
											<h5> </h5>
										    <h3><?php echo $zone_type6;?></h3>
										</div>
									</div>
								</a>  
							</li> 
							<li>
								<a href="<?php echo $zone_g_url7;?>">
									<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image7;?>);">
										<div class="des1">
											<h5> </h5>
											<h3><?php echo $zone_type7;?></h3>
										</div>
									</div>
								</a>  
							</li> 
							<li>
								<a href="<?php echo $zone_g_url8;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image8;?>);"> 
										<div class="des2">
											<h3><?php echo $zone_type8;?></h3>
											<h5> </h5>
										</div>
									</div> 
								</a>
								<a href="<?php echo $zone_g_url9;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image9;?>);"> 
										<div class="des2">
											<h3><?php echo $zone_type9;?></h3>
											<h5> </h5>
										</div>
									</div> 
								</a>
							</li>
							<li>
								<a href="<?php echo $zone_g_url10;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image10;?>);"> 
										<div class="des2">
											<h3><?php echo $zone_type10;?></h3>
											<h5> </h5>
										</div>
									</div>
								</a>
								<a href="<?php echo $zone_g_url11;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image11;?>);"> 
										<div class="des2">
											<h3><?php echo $zone_type11;?></h3>
											<h5> </h5>
										</div>
									</div> 
								</a>
							</li>
							<li>
								<a href="<?php echo $zone_g_url12;?>">
									<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image12;?>);">
										<div class="des1">
											<h5></h5>
											<h3><?php echo $zone_type12;?></h3>
										</div>
									</div>
								</a>  
							</li>

							<li>
								<a href="<?php echo $zone_g_url13;?>">
									<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image13;?>);">
										<div class="des1">
											<h5></h5>
											<h3><?php echo $zone_type13;?></h3>
										</div>
									</div>
								</a>  
							</li>
							<li>
								<a href="<?php echo $zone_g_url14;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image14;?>);"> 
										<div class="des2">
											<h3><?php echo $zone_type14;?></h3>
											<h5></h5>
										</div>
									</div> 
								</a>
								<a href="<?php echo $zone_g_url15;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image15;?>);"> 
										<div class="des2">
											<h3><?php echo $zone_type15;?></h3>
											<h5></h5>
										</div>
									</div> 
								</a>
							</li>
							<li>
								<a href="<?php echo $zone_g_url16;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image16;?>);"> 
										<div class="des2">
											<h3><?php echo $zone_type16;?></h3>
											<h5></h5>
										</div>
									</div> 
								</a>
								<a href="<?php echo $zone_g_url17;?>">
									<div class="img-cover2" style="background: url(images/zone_group/<?php echo $zone_image17;?>);"> 
										<div class="des2">
											<h3><?php echo $zone_type17;?></h3>
											<h5></h5>
										</div>
									</div> 
								</a>
							</li>
							<li>
								<a href="<?php echo $zone_g_url18;?>">
									<div class="img-cover1" style="background: url(images/zone_group/<?php echo $zone_image18;?>);">
										<div class="des1">
											<h5></h5>
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
				<h1>คอนโดมิเนียม / <span>CONDOMINIUM</span></h1>
				<h3>Reliable services, hassle-free experience for your home search. </h3>
				
				<div class="row justify-content-center">
					<div class="col-xl-10">  
						<ul id="item3" class="item3">

 
 <?php   

 	 $sql = "SELECT data.ex_list_heading, data.ex_list_listing_code , data.ex_list_bedroom, data.ex_list_deal_type , data.ex_list_bathroom , data.ex_list_price ,
 	                data.ex_list_project , data.ex_list_sqm , data.ex_list_floor , data.project_id , data.ex_list_listing_type  , 
 	                data.ex_list_subdistrict , data.ex_list_district  , data.ex_list_province  ,
 	                pj.project_id , pj.project_name , pj.project_name_en , pj.project_subdistrict , pj.project_district , pj.project_province
		     FROM dbo_data_excel_listing AS data
		     LEFT JOIN type_project AS pj  On data.project_id=pj.project_id  

             WHERE data.ex_list_listing_type='1' and data.ex_list_public='1' and data.ex_list_premium='1'


             order by data.ex_list_premium DESC, data.ex_list_listing_code DESC";

		 $result = $conn->query($sql); 
    	  // output data of each row
         while($rs = $result->fetch_assoc()){      $n++;  
              
              $ex_list_heading=$rs['ex_list_heading'];
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
              $project_name_en=$rs['project_name_en'];
              $project_id=$rs['project_id'];

              $ex_list_subdistrict=$rs['ex_list_subdistrict'];
              $ex_list_district=$rs['ex_list_district'];
              $ex_list_province=$rs['ex_list_province'];
              
              $ex_list_pric=number_format($ex_list_price); 

              if($ex_list_deal_type=='ขาย' or $ex_list_deal_type=='1'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="FOR SALE"; $sale_text="ขาย"; }
              else if($ex_list_deal_type=='เช่า' or $ex_list_deal_type=='2'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="FOR RENT";   $sale_text="เช่า"; }
              
              $sql_img="SELECT ex_list_listing_code,listing_img_folder,listing_img_name,listing_img_no 
                        FROM dbo_data_excel_listing_img 
                        WHERE ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC  ";
		      $result_img=$conn->query($sql_img); 
		      $rs_img=$result_img->fetch_assoc();

		      $listing_img_folder=$rs_img['listing_img_folder'];
		      $listing_img_name=$rs_img['listing_img_name'];
               
                     if($listing_img_folder!=''){   

                           $img_name_list=$listing_img_folder."mini_w300/".$listing_img_name;

                     }else if($listing_img_name!=''){   
                           $img_name_list="../../images/listing/".$ex_list_listing_code."/mini_w300/".$listing_img_name;  
                            
                     }else{  $img_name_list="../../images/noimages.jpg" ;  $test1 = "000"; 

                     }  

              if($project_id!=''){

              	     $ex_list_subdistrict=$rs['project_subdistrict'];
                     $ex_list_district=$rs['project_district'];
                     $ex_list_province=$rs['project_province'];

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

			   }else{

			      $address=$address_en;
						$project_name=$project_name_en;
						$type_name="Condo";
						$sale_text=$sale_text_en;
						$area_text=$area_en;
			   }    

               if($n<=6  ){  


               	 if($device=="m"){

               	 	    $address=substr($address,1 , 100 );

               	 }else{

               	 }
 ?>


							<li>
								<a href="./property/<?php echo $_SESSION['lang'];?>/<?php echo $ex_list_listing_code;?>">
									<div class="condo-card">
										<div class="cover" style="background: url(<?php echo $img_name_list;?>);"> 
										</div>
										<div class="detail">
											<h4>฿<?php echo $ex_list_pric;?> <span><?php echo $type_name;?>  </span> </h4>
				
											<h5><?php echo $project_name;?> <span><?php echo $sale_text;?></span></h5>
				
											<h6><?php echo $address;?></h6>
										</div>
										<div class="option">
											<ul>
												 
											    <li  >
													<img src="images/22.png?v=<?php echo $today;?>" alt=""   >
													<h6><?php echo $bedroom_title;?> <span><?php echo $ex_list_bedroom;?> </span></h6>
												</li>
												<li>
													<img src="images/11.png?v=<?php echo $today;?>" alt="">
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
													<img src="images/77.png?v=<?php echo $today;?>" alt="">
													<h6><?php echo $floors_title;?> <span><?php echo $ex_list_floor;?></span></h6>
												</li>
												<li>
													<img src="images/88.png?v=<?php echo $today;?>" alt="">
													<h6> <span><?php echo $ex_list_sqm;?></span><?php echo $sqm_title;?></h6>
												</li>
												 
											</ul>
										</div>
									</div>
								</a>
							</li>
					 
   <?php        }
        } ?>

						</ul> 
					</div>
				</div>
			</div> 
		</section>
		

		<section class="sec-home4">
			<div class="container-fluid">
				<h1>บ้านเดี่ยว /   <span>HOUSE</span></h1>
				<h3>Reliable services, hassle-free experience for your home search. </h3>
				
				<div class="row justify-content-center">
					<div class="col-xl-10 "> 
						<ul id="item4" class="item4">
  <?php   

 	 $sql = "SELECT data.ex_list_heading, data.ex_list_listing_code , data.ex_list_total_floors  , data.ex_list_wa , data.ex_list_ngan , data.ex_list_rai  , data.ex_list_bedroom,
	                data.ex_list_deal_type , data.ex_list_bathroom , data.ex_list_price ,
 	                data.ex_list_project , data.ex_list_sqm , data.ex_list_floor , data.project_id , data.ex_list_listing_type  , 
 	                data.ex_list_subdistrict , data.ex_list_district  , data.ex_list_province  ,
 	                pj.project_id , pj.project_name , pj.project_name_en , pj.project_subdistrict , pj.project_district , pj.project_province
		     FROM dbo_data_excel_listing AS data
		     LEFT JOIN type_project AS pj  On data.project_id=pj.project_id  
		 
             where data.ex_list_listing_type='2' and data.ex_list_public='1'  and data.ex_list_premium='1'


             order by data.ex_list_premium DESC, data.ex_list_listing_code DESC";

		 $result = $conn->query($sql); 
    	  // output data of each row
         while($rs = $result->fetch_assoc()){      $n2++;  
              
              $ex_list_heading=$rs['ex_list_heading'];
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
			        $project_name_en=$rs['project_name_en'];
              $project_id=$rs['project_id'];
      			  $ex_list_total_floors=$rs['ex_list_total_floors'];
      			  $ex_list_rai=$rs['ex_list_rai'];
      			  $ex_list_ngan=$rs['ex_list_ngan'];
      			  $ex_list_wa=$rs['ex_list_wa'];

              $ex_list_subdistrict=$rs['ex_list_subdistrict'];
              $ex_list_district=$rs['ex_list_district'];
              $ex_list_province=$rs['ex_list_province'];
              
              $ex_list_pric=number_format($ex_list_price); 

			 
	   

              if($ex_list_deal_type=='ขาย' or $ex_list_deal_type=='1'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="FOR SALE"; $sale_text="ขาย"; }
              else if($ex_list_deal_type=='เช่า' or $ex_list_deal_type=='2'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="FOR RENT";   $sale_text="เช่า"; }
              
              $sql_img="SELECT ex_list_listing_code,listing_img_folder,listing_img_name,listing_img_no 
                        FROM dbo_data_excel_listing_img 
                        WHERE ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC  ";
		      $result_img=$conn->query($sql_img); 
		      $rs_img=$result_img->fetch_assoc();

		      $listing_img_folder=$rs_img['listing_img_folder'];
		      $listing_img_name=$rs_img['listing_img_name'];
               
                     if($listing_img_folder!=''){   

                           $img_name_list=$listing_img_folder."mini_w300/".$listing_img_name;

                     }else if($listing_img_name!=''){   
                           $img_name_list="../../images/listing/".$ex_list_listing_code."/mini_w300/".$listing_img_name;  
                            
                     }else{  $img_name_list="../../images/noimages.jpg" ;  $test1 = "000"; }  

              if($project_id!=''){

              	     $ex_list_subdistrict=$rs['project_subdistrict'];
                     $ex_list_district=$rs['project_district'];
                     $ex_list_province=$rs['project_province'];
 

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

			   }else{

			    	$address=$address_en;
						$project_name=$project_name_en;
						$type_name="House";
						$sale_text=$sale_text_en;
						$area_text=$ex_list_wa;
			   }                     

               if($n2<=6  ){   
 

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
										<div class="cover" style="background: url(<?php echo $img_name_list;?>);"> 
										</div>
										<div class="detail">
											<h4>฿<?php echo $ex_list_pric;?> <span><?php echo $type_name;?>  </span> </h4>
				
											<h5><?php echo $project_name;?> <span><?php echo $sale_text;?></span></h5>
				
											<h6><?php echo $address;?></h6>
										</div>
										<div class="option">
											<ul>
											    <li>
													<img src="images/22.png" alt="" >
													<h6><?php echo $bedroom_title;?> <span><?php echo $ex_list_bedroom;?> </span></h6>
												</li>
												<li>
													<img src="images/11.png" alt="">
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
													<h6>ที่จอดรถ <span>  </span></h6>
												</li> -->
												<li>
													<img src="images/77.png" alt="">
													<h6><?php echo $floors_total_title;?> <span><?php echo $ex_list_floor;?></span></h6>
												</li>
												<li>
													<img src="images/55.png" alt="">
													<h6><?php echo $area_land_title;?> <span><?php echo $area_text;?></span><?php echo $sqw_title;?></h6>
												</li>
											</ul>
										</div>
									</div>
								</a>
							</li>
					 
   <?php        }
        }  ?>


						</ul>
					</div>
				</div>
			</div> 
		</section>


		<section class="sec-home3">
			<div class="container-fluid">
				<h1>ทาวน์โฮม / <span> TOWNHOME </span></h1>
				<h3>Reliable services, hassle-free experience for your home search. </h3>
				
				<div class="row justify-content-center">
					<div class="col-xl-10 "> 
						<ul id="item5" class="item5">
 
<?php    

 	 $sql = "SELECT data.ex_list_heading, data.ex_list_listing_code , data.ex_list_total_floors  , data.ex_list_wa , data.ex_list_ngan , data.ex_list_rai , data.ex_list_bedroom, data.ex_list_deal_type , data.ex_list_bathroom , data.ex_list_price ,
 	                data.ex_list_project , data.ex_list_sqm , data.ex_list_floor , data.project_id , data.ex_list_listing_type  , 
 	                data.ex_list_subdistrict , data.ex_list_district  , data.ex_list_province  ,
 	                pj.project_id , pj.project_name , pj.project_name_en , pj.project_subdistrict , pj.project_district , pj.project_province
		     FROM dbo_data_excel_listing AS data
		     LEFT JOIN type_project AS pj  On data.project_id=pj.project_id  
             where data.ex_list_listing_type='4' and data.ex_list_public='1'  and data.ex_list_premium='1'
             order by data.ex_list_premium DESC, data.ex_list_listing_code DESC";

		 $result = $conn->query($sql); 
    	  // output data of each row
         while($rs = $result->fetch_assoc()){      $n3++;  
              
              $ex_list_heading=$rs['ex_list_heading'];
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
              
              $ex_list_pric=number_format($ex_list_price); 

			  

              if($ex_list_deal_type=='ขาย' or $ex_list_deal_type=='1'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="FOR SALE"; $sale_text="ขาย"; }
              else if($ex_list_deal_type=='เช่า' or $ex_list_deal_type=='2'){ $ex_list_pric=$ex_list_pric;   $sale_text_en="FOR RENT";   $sale_text="เช่า"; }
              
              $sql_img="SELECT ex_list_listing_code,listing_img_folder,listing_img_name,listing_img_no 
                        FROM dbo_data_excel_listing_img 
                        WHERE ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC  ";
		      $result_img=$conn->query($sql_img); 
		      $rs_img=$result_img->fetch_assoc();

		      $listing_img_folder=$rs_img['listing_img_folder'];
		      $listing_img_name=$rs_img['listing_img_name'];
               
                     if($listing_img_folder!=''){   

                           $img_name_list=$listing_img_folder."mini_w300/".$listing_img_name;

                     }else if($listing_img_name!=''){   
                           $img_name_list="../../images/listing/".$ex_list_listing_code."/mini_w300/".$listing_img_name;  
                            
                     }else{  $img_name_list="../../images/noimages.jpg" ;  $test1 = "000"; }  

              if($project_id!=''){

              	     $ex_list_subdistrict=$rs['project_subdistrict'];
                     $ex_list_district=$rs['project_district'];
                     $ex_list_province=$rs['project_province'];
 

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
                     
                     $address= " ,".$project_subdistrict." , ".$project_district." , ".$project_province;

                     $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en;

               }else{

                       $address=" , ".$project_subdistrict." , ".$project_district." , ".$project_province;

                      $address_en=$project_subdistrict_en." , ".$project_district_en." , ".$project_province_en; 
               }


			   if($lang=='th'){
                       
				        $address=$address;
						$project_name=$project_name;
						$type_name="ทาวน์โฮม";
						$sale_text=$sale_text;
						$area_text=$ex_list_wa;

			   }else{

			         	$address=$address_en;
						$project_name=$project_name_en;
						$type_name="Townhome";
						$sale_text=$sale_text_en;
						$area_text=$ex_list_wa;
			   }


                     

               if($n3<=6  ){ 
 ?>


							<li>
								<a href="./property/<?php echo $_SESSION['lang'];?>/<?php echo $ex_list_listing_code;?>">
									<div class="condo-card">
										<div class="cover" style="background: url(<?php echo $img_name_list;?>);"> 
										</div>
										<div class="detail">
											<h4>฿<?php echo $ex_list_pric;?> <span><?php echo $type_name;?>  </span> </h4>
				
											<h5><?php echo $project_name;?> <span><?php echo $sale_text;?></span></h5>
				
											<h6><?php echo $address;?></h6>
										</div>
										<div class="option">
											<ul>
											    <li>
													<img src="images/22.png" alt="">
													<h6><?php echo $bedroom_title;?> <span><?php echo $ex_list_bedroom;?> </span></h6>
												</li>
												<li>
													<img src="images/11.png" alt="">
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
													<h6>ที่จอดรถ <span>  </span></h6>
												</li> -->
												<li>
													<img src="images/77.png" alt="">
													<h6><?php echo $floors_total_title;?> <span><?php echo $ex_list_floor;?></span></h6>
												</li>
												<li>
													<img src="images/55.png" alt="">
													<h6><?php echo $area_land_title;?> <span><?php echo $area_text;?></span><?php echo $sqw_title;?></h6>
												</li>
											</ul>
										</div>
									</div>
								</a>
							</li>
					 
   <?php       }
        }  ?>

						</ul>
					</div>
				</div>
			</div> 
		</section>


		<section class="sec-home6">
			<div class="container">
				<h1>บริการของเรา   / <span> OUR SERVICES </span></h1>
				<h3> </h3>
				 
				<div class="row">
					<div class="col-xl-4 col-12">
						<div class="our-ser">
							<center><div class="icon-ser" ><img src="<?php echo $part;?>images/icon/01.png" alt="ไอคอน" ></div></center>
							<h4><?php echo $out_service_title_1;?></h4>
							<p><?php echo $out_service_detail_1;?></p>
						</div>
					</div>
					<div class="col-xl-4 col-12">
						<div class="our-ser">
							<center><div class="icon-ser"><img src="<?php echo $part;?>images/icon/02.png" alt="ไอคอน" ></div></center>
							<h4><?php echo $out_service_title_2;?></h4>
							<p><?php echo $out_service_detail_2;?></p>
						</div>
					</div>
					<div class="col-xl-4 col-12">
						<div class="our-ser">
							<center><div class="icon-ser"> <img src="<?php echo $part;?>images/icon/03.png" alt="ไอคอน" > </div></center>
							<h4><?php echo $out_service_title_3;?></h4>
							<p><?php echo $out_service_detail_3;?></p>
						</div>
					</div>
					<div class="col-xl-1 col-12">
						 
					</div>
					<div class="col-xl-5 col-12">
						<div class="our-ser">
							<center><div class="icon-ser"><img src="<?php echo $part;?>images/icon/04.png" alt="ไอคอน" ></div></center>
							<h4><?php echo $out_service_title_4;?></h4>
							<p><?php echo $out_service_detail_4;?></p>
						</div>
					</div>
					<div class="col-xl-5 col-12">
						<div class="our-ser">
							<center><div class="icon-ser"><img src="<?php echo $part;?>images/icon/05.png" alt="ไอคอน" ></div></center>
							<h4><?php echo $out_service_title_5;?></h4>
							<p><?php echo $out_service_detail_5;?></p>
						</div>
					</div>
					<div class="col-xl-1 col-12">
						 
					</div>
				</div>

				<div class="col text-center">
					<a href="https://connex.in.th/consignment/<?php echo $lang;?>" class="btn btn-yellow text-center"><?php echo $property_with_title;?></a>
				</div>
			</div> 
		</section>


		<section class="sec-home7">
			<div class="container-fluid">
				
				<div class="row justify-content-center">
					<div class="col-xl-10 owlm2"> 
						
						<h1> ข่าวและกิจกรรม /<b></b> <span>Events </span></h1>

						<a href="<?php echo $url_content;?>" class="btn btn-yellow2"><?php echo $more_title;?></a>


		 
						<ul id="item7" class="item7">

			    <?php

				      $sql = "SELECT *   FROM dbo_data_content  order by data_content_highlight DESC";

					  $result = $conn->query($sql); 
			    	  // output data of each row
			          while($rs = $result->fetch_assoc()){      $content1++;  


			          	if( $content1<=6){

				          	$data_content_title=$rs['data_content_title'];
				          	$data_content_img=$rs['data_content_img'];
				          	$data_content_url=$rs['data_content_url'];
				          	$data_content_meta_title=$rs['data_content_meta_title'];
				          	$data_content_meta_description=$rs['data_content_meta_description'];

				          	if($data_content_img!=''){

				          	       $data_content_img="../../images/content/".$data_content_img;
				          	}else{
				          		   $data_content_img="../../images/noimages.jpg";
				          	}
				   ?>

							<li>
								<a href="<?php echo $part;?>content_view/<?php echo $lang;?>/<?php echo $data_content_url;?>">
									<div class="news-card">
										<div class="img" style="background: url(<?php echo $part.$data_content_img;?>);"></div>
										<h4><?php echo $data_content_title;?></h4>
										<p> <?php echo $data_content_meta_description;?>
										</p>
									</div>
								</a>
							</li>  
                    <?php }
                      } ?>
         
						</ul> 
					 
					</div>
				</div>
				 
			 
			</div> 
		</section>


		<section class="sec-home8">
			<div class="container-fluid"> 
				<div class="row justify-content-center">
					<div class="col-xl-10"> 
						<div class="row">
							<div class="col-xl-6">
								<div class="row">
									<div class="col-6 mb-5">
										<img src="<?php echo $part;?>images/pastwork/1.png" alt="" class="img-fluid m-auto d-block">
									</div>
									<div class="col-6 mb-5">
										<img src="<?php echo $part;?>images/pastwork/2.png" alt="" class="img-fluid m-auto d-block">
									</div>
									<div class="col-6">
										<img src="<?php echo $part;?>images/pastwork/3.png" alt="" class="img-fluid m-auto d-block">
									</div>
									<div class="col-6">
										<img src="<?php echo $part;?>images/pastwork/4.png" alt="" class="img-fluid m-auto d-block">
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<h1>ผลงานที่ผ่าน  <span>/  past work  </span></h1>
								<h6> </h6>
								<p >
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
				<h1> ความประทับใจจากลูกค้า /<span>testimonial</span></h1>

				<div class="row justify-content-center">
					<div class="col-xl-10">

						<ul id="item9" class="item9">
							<li> 
								<div class="testimonial">
									<img src="images/testimonials/01.png" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title1;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li> 
								<div class="testimonial">
									<img src="images/testimonials/02.png" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title2;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li> 
								<div class="testimonial">
									<img src="images/testimonials/03.png" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title3;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li> 
								<div class="testimonial">
									<img src="images/testimonials/04.png" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title4;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li> 
								<div class="testimonial">
									<img src="images/testimonials/05.png" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title5;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li> 
								<div class="testimonial">
									<img src="images/testimonials/06.png" alt="ประทับใจในการบริการมากครับ">
									<p><?php echo $testimonials_title6;?></p>
									<!--<h6></h6>-->
								</div> 
							</li>
							<li> 
								<div class="testimonial">
									<img src="images/testimonials/07.png" alt="ประทับใจในการบริการมากครับ">
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
				<h1> พาร์ทเนอร์ <b>/</b> <span>Partners </span></h1>

				<div class="row justify-content-around">
					<div class="col-xl-9 mt-5">
						<div class="row">
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/ddproperty.png" alt="ddproperty" width="100%" > 
							</div>
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/propit.jpg" alt="propit" width="100%" > 
							</div>
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/dotproperty.png" alt="dotproperty" width="100%"  > 
							</div>
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/hipflat.png" alt="hipflat" width="100%"  > 
							</div>
							<div class="col">  
                <?php if($device=="pc"){ ?> 

								<img src="<?php echo $part;?>images/partner/thaihometown.jpg?v=1" alt="Thaihometown"  width="100%"  >

                <?php }else{ ?>
                <img src="<?php echo $part;?>images/partner/thaihometown-m.jpg?v=1" alt="Thaihometown"  width="100%"  >
                <?php } ?>  
							</div>							
						</div><br><br>
						<div class="row">
							<div class="col"> 
								<img src="<?php echo $part;?>images/partner/living-insider.jpg" alt="living-insider" width="100%" > 
							</div>
							<div class="col"> 
								<img src="<?php echo $part;?>images/partner/baanfinder.jpg" alt="Baanfinder" width="100%" > 
							</div>
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/trovit.png" alt="trovit" width="100%"  > 
							</div>
							
							<div class="col">  
								<img src="<?php echo $part;?>images/partner/baania.png" alt="Baania"  width="100%" > 
							</div>
					    </div>

					    <br><br>
					    <div style="max-height: 200px;"></div>
					</div>
				</div>
 
			</div>
		</section>

		
	</main>

 

 <?php include("include/footer.php"); ?>




	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
	 
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js"></script>


	<script>
		$('.deal-type li').click(function() {
			$('.deal-type li').removeClass("active");
			$(this).addClass("active");
		});
		// $('.social-con').click(function() { 
		// 	$(this).toggleClass("active");
		// }); 
		
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
