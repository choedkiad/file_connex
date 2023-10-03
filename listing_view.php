<!DOCTYPE html>

<?php 
    
   $id=$_GET['id'];
  
  include ("include/config.php");




		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $sql_1 = "SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='".$id."' ";
		 $result_1 = $conn->query($sql_1); 
    	  // output data of each row
         $rs_1 = $result_1->fetch_assoc();

         $ex_list_listing_code=$rs_1['ex_list_listing_code'];
         $ex_list_deal_type=$rs_1['ex_list_deal_type'];
         $ex_list_heading=$rs_1['ex_list_heading'];
         $ex_list_project=$rs_1['ex_list_project'];
         $ex_list_contract_type=$rs_1['ex_list_contract_type'];
         $ex_list_contract_code=$rs_1['ex_list_contract_code'];
         $ex_list_listing_type=$rs_1['ex_list_listing_type'];
         $ex_list_house_number=$rs_1['ex_list_house_number']." ".$rs_1['ex_list_alley']." ".$rs_1['ex_list_road']." ".$rs_1['ex_list_subdistrict']." ".$rs_1['ex_list_district']." ".$rs_1['ex_list_province'];
         $ex_list_train_station=$rs_1['ex_list_train_station'];
         $ex_list_googlmap=$rs_1['ex_list_googlmap'];
         $ex_list_number_buildings=$rs_1['ex_list_number_buildings'];
         $ex_list_floor=$rs_1['ex_list_floor'];
         $ex_list_view=$rs_1['ex_list_view'];
         $ex_list_total_floors=$rs_1['ex_list_total_floors'];
         $ex_list_rai=$rs_1['ex_list_rai']."ไร่ - ".$rs_1['ex_list_ngan']."งาน - ".$rs_1['ex_list_wa']."ตารางวา";
         $ex_list_sqm=$rs_1['ex_list_sqm'];
         $ex_list_bedroom=$rs_1['ex_list_bedroom'];
         $ex_list_bathroom=$rs_1['ex_list_bathroom'];
         $ex_list_other_room=$rs_1['ex_list_other_room'];
         $ex_list_parking=$rs_1['ex_list_parking'];
         $ex_list_furniture=$rs_1['ex_list_furniture'];
         $ex_list_pets=$rs_1['ex_list_pets'];
         $ex_list_direction=$rs_1['ex_list_direction'];
         $ex_list_strengths=$rs_1['ex_list_strengths'];
         $ex_list_facilities=$rs_1['ex_list_facilities'];
         $ex_list_nearby_places=$rs_1['ex_list_nearby_places'];
         $ex_list_details=$rs_1['ex_list_details'];
         $ex_list_price=$rs_1['ex_list_price'];
         $ex_list_listing_score=$rs_1['ex_list_listing_score'];
         $ex_list_price_score=$rs_1['ex_list_price_score']; 

		 $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no ASC ";
		 $result_img = $conn->query($sql_img); 
    	  // output data of each row 

         $sql_asset = "SELECT * FROM type_asset where name='".$ex_list_listing_type."' or code='".$ex_list_listing_type."'  ";
         $result_asset = $conn->query($sql_asset); 
          // output data of each row
         $rs_asset = $result_asset->fetch_assoc();

         $name_type=$rs_asset['name'];
         $name_type_en=$rs_asset['name_en'];



          
?>


<html lang="en-gb" class="no-js">
  <head>
    <meta charset="utf-8">
	<title><?php echo $ex_list_heading;?></title>
    <meta name="author" content="CONNEX PROPERTY">
    <meta name="keywords" content="">
    <meta name="description" content="<?php echo $ex_list_heading;?>">		
		
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  

   <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    
	<body  data-spy="scroll" data-target="#main-menu">
 

  <!--Start Page loader -->

  <!--
  <div id="pageloader">   
        <div class="loader">
          <img src="../../../images/progress.gif" alt='loader' />
        </div>
   </div> -->
   <!--End Page loader -->

  <?php include("include/menu.php"); ?> 
      
 		<!--start page-header -->
		<section id="page-header" class="parallax">
             <div class="overlay"></div>
			<div class="container">  </div>
		</section>
		<!--End page-header -->
		
		<!--Start single-work -->
		<section id="single-work" class="section">
			<div class="container">
				<div class="row">	

                    <div class="col-md-12">  

                        <!--Start Breadcrumb-->
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="../">Home</a> / <a href="../type/<?php echo $name_type_en;?>"><?php echo $name_type;?> <?php echo $_GET['p'];?></a>
                                </li> 
                                <!--
                                <li class="current">
                                    <a href="single-work.html">Project details</a>
                                </li> -->
                            </ul>
                        </div>
                        <!--End Breadcrumb--> 

                    </div>




					<div class="col-md-7">						
					


 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>

<div class="w3-content w3-display-container">

                 <?php
                     while($rs_img=$result_img->fetch_assoc()){  

                             $url_img=$rs_img['listing_img_folder'].$rs_img['listing_img_name'];
             	 ?>

 
  <img class="mySlides" src="<?php echo $url_img;?>" alt="<?php echo $ex_list_heading;?>" style="width:100%">
  
 
	 <?php }?>   
<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>

</div>


                       
					</div>
                    
                    <!--Start Work Detail-->
					<div class="col-md-5 work-detail">

                            <h1 class="margin-bottom-15" style="font-size: 20px; "><?php echo $ex_list_heading;?></h1>	  			


						<ul class="work-detail-list">
							<li><span style="font-size: 18px;">โครงการ :</span> <?php echo $ex_list_project;?></li>
							<li><span style="font-size: 18px;">ที่ตั้ง : </span><?php echo $ex_list_house_number;?></li>
							<li><span style="font-size: 18px;">รหัสทรัพย์ : </span> <?php echo $ex_list_listing_code;?></li>
                            <li><span style="font-size: 18px;">ประเภท : </span><?php echo $ex_list_listing_type;?></li>
                            <li><span style="font-size: 18px;">จำนวนชั้น :</span><?php echo $ex_list_total_floors;?> ชั้น</li>
                            <li><span style="font-size: 18px;">พื้นที่ใช้สอย :</span><?php echo $ex_list_sqm;?> ตารางเมตร</li>
                            <li><span style="font-size: 18px;">เนื้อที่ดิน :</span><?php echo $ex_list_rai;?></li>
                            <li><span style="font-size: 18px;">จำนวนห้อง :</span><?php echo $ex_list_bedroom;?> ห้องนอน &nbsp;&nbsp; <?php echo $ex_list_bathroom;?> ห้องน้ำ &nbsp;&nbsp; <br> <?php echo $ex_list_other_room;?> &nbsp;&nbsp; <?php echo $ex_list_parking;?> ที่จอดรถ </li>
                            <li><span style="font-size: 18px;">ราคา :</span><?php echo $ex_list_price;?> บาท</li>
                            <li><span style="font-size: 18px;">สถานีรถไฟฟ้า :</span><?php echo $ex_list_train_station;?></li>
                            <li><span style="font-size: 18px;">เข้าชมแผนที่ Google Map :</span><a target="_black" href="<?php echo $ex_list_googlmap;?>" ><?php echo $ex_list_googlmap;?></a></li>
							<li><span style="font-size: 18px;">ทำเลดี สถานที่ใกล้เคียง :</span><br>
                              
                               <?php echo nl2br($ex_list_nearby_places);?>
                            
                            </li>

                            <li><span style="font-size: 18px;">สิ่งอำนวยความสะดวก :</span><br>
                               
                               <?php echo nl2br($ex_list_facilities);?>
                            
                            </li>

                            <li><span style="font-size: 18px;">รายละเอียดเพิ่มเติม :</span><br>

                                <?php echo nl2br($ex_list_facilities);?>

                            </li>
                            <li><span style="font-size: 18px;">**บริการปรึกษาสินเชื่อฟรี! ดอกเบี้ยพิเศษ และ วงเงินกู้สูงสุด 90-100% ของราคาประเมิน**</span> 
                            </li>
                            <li><span style="font-size: 18px;">ติดต่อสอบถาม :</span>คุณ น้ำ Tel : 082-695-6450</li>
						</ul>
                        



                        <a href="#" class="btn btn-gray-border">Visit website</a>
                        
					</div>
                    <!--End Work Detail-->
				</div> <!--/ row-->
			</div> <!--/ container-->		
		</section>
		<!--End single-work -->
		
	<!--related works -->
	<section id="featured-works" class="section parallax">
       <div class="container">
           <div class="row">
               
                <h3 class="margin-bottom-50">Related Projects</h3>
                   
           </div>
       </div> 
       
      <div class="related-project-carousel owl-carousel">
            <!-- Start Item-->
             <div class="item">
                 <div class="fworks-image">
                     <img src="images/works/1.jpg" alt=""/> 
                     
                     <!--Hover link-->
                     <div class="hover-link">
                        <a href="#">
                            <i class="fa fa-link"></i>
                        </a>

                        <a href="images/works/1.jpg" class="popup-image">
                            <i class="fa fa-plus"></i>
                        </a>
                     </div>
                     <!--End link-->
                     
                     <!--Hover Caption-->
                     <div class="featured-caption">
                                     <h4>ทาวน์เฮ้าส์หลังมุม</h4>
                                     <p>พระนครศรีอยุธยา</p>
                     </div>
                     <!--End Caption-->
                     
                 </div>
             </div>
            <!-- End Item-->
            
             <!-- Start Item-->
             <div class="item">
                 <div class="fworks-image">
                     <img src="images/works/2.jpg" alt=""/> 
                     
                     <!--Hover link-->
                     <div class="hover-link">
                        <a href="#">
                            <i class="fa fa-link"></i>
                        </a>

                        <a href="images/works/2.jpg" class="popup-image">
                            <i class="fa fa-plus"></i>
                        </a>
                     </div>
                     <!--End link-->
                     
                     <!--Hover Caption-->
                     <div class="featured-caption">
                                      <h4>ทาวน์เฮ้าส์หลังมุม</h4>
                                     <p>พระนครศรีอยุธยา</p>
                     </div>
                     <!--End Caption-->
                     
                 </div>
             </div>
            <!-- End Item-->

            <!-- Start Item-->
             <div class="item">
                 <div class="fworks-image">
                     <img src="images/works/3.jpg" alt=""/> 
                     
                     <!--Hover link-->
                     <div class="hover-link">
                        <a href="#">
                            <i class="fa fa-link"></i>
                        </a>

                        <a href="images/works/3.jpg" class="popup-image">
                            <i class="fa fa-plus"></i>
                        </a>
                     </div>
                     <!--End link-->
                     
                     <!--Hover Caption-->
                     <div class="featured-caption">
                                     <h4>ทาวน์เฮ้าส์หลังมุม</h4>
                                     <p>พระนครศรีอยุธยา</p>
                     </div>
                     <!--End Caption-->
                     
                 </div>
             </div>
            <!-- End Item-->

            <!-- Start Item-->
             <div class="item">
                 <div class="fworks-image">
                     <img src="images/works/4.jpg" alt=""/> 
                     
                     <!--Hover link-->
                     <div class="hover-link">
                        <a href="#">
                            <i class="fa fa-link"></i>
                        </a>

                        <a href="images/works/4.jpg" class="popup-image">
                            <i class="fa fa-plus"></i>
                        </a>
                     </div>
                     <!--End link-->
                     
                     <!--Hover Caption-->
                     <div class="featured-caption">
                                     <h4>ทาวน์เฮ้าส์หลังมุม</h4>
                                     <p>พระนครศรีอยุธยา</p>
                     </div>
                     <!--End Caption-->
                     
                 </div>
             </div>
            <!-- End Item-->

            <!-- Start Item-->
             <div class="item">
                 <div class="fworks-image">
                     <img src="images/works/5.jpg" alt=""/> 
                     
                     <!--Hover link-->
                     <div class="hover-link">
                        <a href="#">
                            <i class="fa fa-link"></i>
                        </a>

                        <a href="images/works/img5/default.htm" class="popup-image">
                            <i class="fa fa-plus"></i>
                        </a>
                     </div>
                     <!--End link-->
                     
                     <!--Hover Caption-->
                     <div class="featured-caption">
                         <h4>Project Title</h4>
                         <p>Design, Photography</p>
                     </div>
                     <!--End Caption-->
                     
                 </div>
             </div>
            <!-- End Item-->

            <!-- Start Item-->
             <div class="item">
                 <div class="fworks-image">
                     <img src="images/works/6.jpg" alt=""/> 
                     
                     <!--Hover link-->
                     <div class="hover-link">
                        <a href="#">
                            <i class="fa fa-link"></i>
                        </a>

                        <a href="images/works/6.jpg" class="popup-image">
                            <i class="fa fa-plus"></i>
                        </a>
                     </div>
                     <!--End link-->
                     
                     <!--Hover Caption-->
                     <div class="featured-caption">
                         <h4>Project Title</h4>
                         <p>Design, Photography</p>
                     </div>
                     <!--End Caption-->
                     
                 </div>
             </div>
             <!-- End Item-->
                 
          </div>
     </section>	
    <!-- End related works -->


<?php include("include/footer.php"); ?>


<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>


    
 </body>
</html>

