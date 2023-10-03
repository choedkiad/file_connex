<!DOCTYPE html>

<?php 
    
   $id=$_GET['id'];
   $lang=$_GET['lang'];

   if($id=='โกดังโรงงาน'){$id='โกดัง/โรงงาน'; }
  
  include ("include/config.php");
  include ("setting.php"); 

         /////////////////ประเภท คอนโดมิเนียม //////////////////
         $sql_as = "SELECT * FROM type_asset where name='".$id."' ";
         $result_as = $conn->query($sql_as); 
          // output data of each row
         $rs_as = $result_as->fetch_assoc();

         $code=$rs_as['code'];


         /////////////////ประเภท โปรเจค //////////////////
         $sql_as = "SELECT * FROM type_asset where name='".$id."' ";
         $result_as = $conn->query($sql_as); 
          // output data of each row
         $rs_as = $result_as->fetch_assoc();


         /////////////////แต่ละ CX //////////////////
         $sql_1 = "SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='".$id."'  ";
         $result_1 = $conn->query($sql_1); 
              // output data of each row
         $rs_1 = $result_1->fetch_assoc(); 

         $ex_list_close=$rs_1['ex_list_close'];

         $ex_list_public=$rs_1['ex_list_public'];
 
        if($ex_list_public=='0' or $ex_list_close=='1'){

            echo("<script> top.location.href='../../'</script>"); 

        }
  


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
             $ex_list_rai=$rs_1['ex_list_rai'];
             $ex_list_ngan=$rs_1['ex_list_ngan'];
             $ex_list_wa=$rs_1['ex_list_wa'];
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
             $project_id=$rs_1['project_id']; 
             $ex_list_contact=$rs_1['ex_list_contact']; 
             $ex_list_contact_id=$rs_1['ex_list_contact_id'];

         if($ex_list_direction!=''){ $ex_list_direction=$ex_list_direction; }else{ $ex_list_direction="ไม่ระบุ"; }
         
         if($ex_list_rai!='0' or $ex_list_ngan!='0' or $ex_list_wa!='0'){  $ex_list_rai=$rs_1['ex_list_rai']." - ".$rs_1['ex_list_ngan']." - ".$rs_1['ex_list_wa']."";    }
         if($ex_list_sqm!=''){ $ex_list_sqm=$ex_list_sqm." ตร.ม.";}
         if($ex_list_bedroom!=''){ $bedroom_num=$ex_list_bedroom;   $ex_list_bedroom=$ex_list_bedroom." ห้อง";  }
         if($ex_list_bathroom!=''){ $bathroom_num=$ex_list_bathroom;   $ex_list_bathroom=$ex_list_bathroom." ห้อง"; }
         if($ex_list_floor!=''){ $ex_list_floor=$ex_list_floor." "; }
         if($ex_list_total_floors!=''){ $ex_list_total_floors=$ex_list_total_floors." ชั้น"; }

        if($ex_list_deal_type=='1'){  

            if($lang=='th'){ $ex_list_deal_type="ราคาขาย"; }else{ $ex_list_deal_type="FOR SALE"; }    

        }else{
    
            if($lang=='th'){ $ex_list_deal_type="ราคาเช่า"; }else{ $ex_list_deal_type="FOR RENT"; }
        }

         $sql_projects="SELECT * FROM type_project where project_id='$project_id' order by project_id  ASC"; 
         $result_projects=$conn->query($sql_projects);
         $rs_projects= $result_projects->fetch_assoc();
         
         $project_type=$rs_projects['project_type'];
         $project_name=$rs_projects['project_name'];
         $project_name_en=$rs_projects['project_name_en'];
         $project_alley=$rs_projects['project_alley'];
         $project_road=$rs_projects['project_road'];
         $project_subdistrict=$rs_projects['project_subdistrict'];
         $project_district=$rs_projects['project_district'];
         $project_province=$rs_projects['project_province'];
         $project_train_station=$rs_projects['project_train_station'];
         $project_facilities=$rs_projects['project_facilities'];
         $project_nearby_places=$rs_projects['project_nearby_places'];
         $project_zone=$rs_projects['project_zone'];
         $project_map=$rs_projects['project_map'];


             if($rs_projects['project_id']!=''){  // project_id NO
        
                 $ex_list_listing_type=$project_type;
                 $ex_list_alley=$project_alley;
                 $ex_list_road=$project_road;
                 $ex_list_subdistrict=$project_subdistrict;
                 $ex_list_district=$project_district;
                 $ex_list_province=$project_province; 
                 $ex_list_train_station=$project_train_station;
                 $ex_list_nearby_places=$project_nearby_places;
                 $ex_list_facilities=$project_facilities;
                 $ex_list_zone=$project_zone;

                 $type_asset_s=$ex_list_listing_type;

                 
                  if($lang=='th'){ 
                        $ex_list_project=$project_name;
                  }else{ 
                        $ex_list_project=$project_name_en; }    
 
                 $ex_list_project_en=$project_name_en; 






      /////////// type_asset ////////////////
             $sql_ass="SELECT * FROM type_asset where id='$project_type' ";  
             $result_ass= $conn->query($sql_ass);
             $rs_ass=$result_ass->fetch_assoc();

             if($rs_ass['name']!=''){ $ex_list_listing_type=$rs_ass['name'];}
      ////////// End type_asset ////////////////


      ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$project_province' "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province=$rs_p['provinces_in_thai'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$project_district' "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district=$rs_d['districts_in_thai'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$project_subdistrict' "; 
                $result_s=$conn->query($sql_s);
                $rs_s=$result_s->fetch_assoc();
                  
                $project_subdistrict=$rs_s['subdistricts_in_thai'];
                $zip_code=$rs_s['zip_code'];

               if($province_id=='1'){
                     
                     $address= " แขวง".$project_subdistrict." ".$project_district." ".$project_province." ".$zip_code;
               }else{
                         $address=" ตำบล".$project_subdistrict." อำเภอ".$project_district." จังหวัด".$project_province." ".$zip_code;
               }

      /////////// type_project //////////////// 

      /////////// End type_project ////////////////


      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$project_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
      /////////// End type_train_station ////////////////
 


        if($ex_list_contact_id=='0'){ $ex_list_contact_id='11';  }

        //////////////  dbo_register  ////////////////////////////
             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact_id' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $register_name=$rs_register['register_name'];
             $register_tel=$rs_register['register_tel']; 
             $register_line=$rs_register['register_line']; 
             $register_whatsapp=$rs_register['register_whatsapp'];
             $register_img=$rs_register['register_img'];  

             if($register_img!=''){  $register_img_url="../../../images/team/$register_img";
             }else{ $register_img_url="../../../images/team/noimages.jpg";  } 



        }  // END project_id NO

        else{


      /////////// type_train_station ////////////////
             $sql_train="SELECT * FROM type_train_station where station_id='$ex_list_train_station' ";  
             $result_train= $conn->query($sql_train);
             $rs_train=$result_train->fetch_assoc(); 

             $station_name=$rs_train['station_train'];
             $station_name_en=$rs_train['station_name_en'];
  
             if($station_name!=''){ $ex_list_train_station=$rs_train['station_train']." | ".$rs_train['station_name_en'];}
      /////////// End type_train_station ////////////////


        }
    

        if($ex_list_contact_id=='0'){ $ex_list_contact_id='11';  }

        //////////////  dbo_register  ////////////////////////////
             $sql_register="SELECT * FROM dbo_register where register_id='$ex_list_contact_id' ";  
             $result_register= $conn->query($sql_register);
             $rs_register=$result_register->fetch_assoc(); 

             $register_name=$rs_register['register_name'];
             $register_tel=$rs_register['register_tel']; 
             $register_line=$rs_register['register_line']; 
             $register_whatsapp=$rs_register['register_whatsapp'];
             $register_img=$rs_register['register_img'];  

             if($register_img!=''){  $register_img_url="../../../images/team/$register_img";
             }else{ $register_img_url="../../../images/team/noimages.jpg";  }

             

          //////////////////////////////  dbo_data_excel_listing_img   //////////////////////////////

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
      <link rel="icon" href="../../images/icon.ico" width='48' type="image/x-icon">
  

   <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    

        <link rel="stylesheet" href="../../assets/css/normalize.css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../assets/css/fontello.css">
        <link href="../../assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="../../assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="../../assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="../../assets/css/price-range.css">
        <link rel="stylesheet" href="../../assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="../../assets/css/owl.theme.css">
        <link rel="stylesheet" href="../../assets/css/owl.transitions.css">
        <link rel="stylesheet" href="../../assets/css/lightslider.min.css">
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="stylesheet" href="../../assets/css/responsive.css">



	<body  >
 
  
        <!-- Body content -->
  <!--Start Page loader -->

  <!--
  <div id="pageloader">   
        <div class="loader">
          <img src="../../../images/progress.gif" alt='loader' />
        </div>
   </div> -->
   <!--End Page loader -->

  <?php include("include/menu.php");


$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){


            if($page_view=='type'){

                include("page/property_type.php");

            }else if($page_view=='listing'){

                include("page/property_view_mobile.php");

            }else if($page_view=="all"){

                include("page/property_type.php");

            }
}else{

            if($page_view=='type'){

                include("page/property_type.php");

            }else if($page_view=='listing'){

                include("page/property_view.php");

            }else if($page_view=="all"){

                include("page/property_type.php");

            }

}

   ?> 
      


 
    <?php include("include/footer.php"); ?> 

        <script src="../../assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="../../assets/js/jquery-1.10.2.min.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../assets/js/bootstrap-select.min.js"></script>
        <script src="../../assets/js/bootstrap-hover-dropdown.js"></script>
        <script src="../../assets/js/easypiechart.min.js"></script>
        <script src="../../assets/js/jquery.easypiechart.min.js"></script>
        <script src="../../assets/js/owl.carousel.min.js"></script>
        <script src="../../assets/js/wow.js"></script>
        <script src="../../assets/js/icheck.min.js"></script>
        <script src="../../assets/js/price-range.js"></script>
        <script type="text/javascript" src="../../assets/js/lightslider.min.js"></script>
        <script src="../../assets/js/main.js"></script>

        <script>
                            $(document).ready(function () {

                                $('#image-gallery').lightSlider({
                                    gallery: true,
                                    item: 1,
                                    thumbItem: 9,
                                    slideMargin: 0,
                                    speed: 500,
                                    auto: true,
                                    loop: true,
                                    onSliderLoad: function () {
                                        $('#image-gallery').removeClass('cS-hidden');
                                    }
                                });
                            });
        </script>
<!--
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
</script>-->


    
 </body>
</html>

