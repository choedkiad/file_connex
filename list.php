<!DOCTYPE html>

<?php 
    
   $id=$_GET['id'];
   $u=$_GET['u'];

   if($id=='โกดังโรงงาน'){$id='โกดัง/โรงงาน'; }
  
  include ("include/config.php");

         /////////////////ประเภท คอนโดมิเนียม //////////////////
         $sql_as = "SELECT * FROM type_asset where name='".$id."' ";
         $result_as = $conn->query($sql_as); 
          // output data of each row
         $rs_as = $result_as->fetch_assoc();
    

         /////////////////แต่ละ CX //////
         ////////////
         $sql_1 = "SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='".$id."' ";
         $result_1 = $conn->query($sql_1); 
              // output data of each row
         $rs_1 = $result_1->fetch_assoc(); 



         if($rs_as['name']!=""){  $page_view="type";

         }else if($rs_1['ex_list_listing_code']!=""){  $page_view="listing";

         }else if($id=='all'){        $page_view="all";  }

         
         if($page_view=='type'){

             $ex_list_heading="ขาย".$rs_as['name']." | ".$rs_as['name_en']." | CONNEX PROPERTY";
             $description="ขาย".$rs_as['name']." | ".$rs_as['name_en']." | CONNEX PROPERTY รับฝากขายคอนโดมิเนียม บ้านเดี่ยว ทาวน์โฮม ทาวน์เฮ็าส์ ที่ดินพร้อมทำการตลาดโดยทีมงานมืออาชีพผู้มีประสบการณ์";
             $name=$rs_as['name'];

         }else if($page_view=="all"){

             $name="อสังหาริมทรัพย์ทั้งหมด";
             $ex_list_heading="ขาย".$name." | CONNEX PROPERTY";
             $description="ขาย".$name." | CONNEX PROPERTY รับฝากขายคอนโดมิเนียม บ้านเดี่ยว ทาวน์โฮม ทาวน์เฮ็าส์ อพาร์ทเม้นท์ โรงงาน ที่ดิน พร้อมทำการตลาดโดยทีมงานมืออาชีพผู้มีประสบการณ์";

         
         }else if($page_view=="listing"){ 

    		 if ($conn->connect_error) {
        		 die("Connection failed: " . $conn->connect_error);
    	     }

             $ex_list_listing_code=$rs_1['ex_list_listing_code'];
             $ex_list_deal_type=$rs_1['ex_list_deal_type'];
             $ex_list_heading=$rs_1['ex_list_heading'];
             $description=$rs_1['ex_list_heading'];
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

         }


      $p=$_GET['p'];


      echo $p."..";
?>


<html lang="en-gb" class="no-js">
  <head>
    <meta charset="utf-8">
	<title><?php echo $ex_list_heading;?></title>
    <meta name="author" content="CONNEX PROPERTY">
    <meta name="keywords" content="ขายบ้านเดี่ยว,ขายคอนโดมิเนียม,ขายทาวน์โฮม,ขายที่ดิน">
    <meta name="description" content="<?php echo $description;?>">		
		
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="icon" href="../../../images/icon.ico" width='48' type="image/x-icon">
  

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

  <?php include("include/menu.php");

            
            if($page_view=='type'){

                include("page/property_type.php");

            }else if($page_view=='listing'){

                include("page/property_view.php");

            }else if($page_view=="all"){

                include("page/property_type.php");

            }


   ?> 
      

   

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

