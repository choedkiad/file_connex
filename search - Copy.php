<!DOCTYPE html >
<html lang="en" >


<?php   session_start();  ?>
<?php   include ("./include/config.php"); ?>
<?php   include ("./setting.php"); 

    $today=date("YmdHis");

    isset( $_GET['lang'] ) ? $lang = $_GET['lang'] : $lang = "";
    isset( $_GET['deal_s'] ) ? $deal_s = $_GET['deal_s'] : $deal_s = "";
    isset( $_GET['type_s'] ) ? $type_s = $_GET['type_s'] : $type_s = "";
    isset( $_GET['project_s'] ) ? $project_s = $_GET['project_s'] : $project_s = "";
    isset( $_GET['size_s'] ) ? $size_s = $_GET['size_s'] : $size_s = "";
    isset( $_GET['price_s'] ) ? $price_s = $_GET['price_s'] : $price_s = "";
    isset( $_GET['room_s'] ) ? $room_s = $_GET['room_s'] : $room_s = "";
    isset( $_GET['search_s'] ) ? $search_s = $_GET['search_s'] : $search_s = "";
    isset( $_GET['page_no'] ) ? $page_no = $_GET['page_no'] : $page_no = "";
 
    isset( $_SESSION['sort_s'] ) ? $sort_s = $_SESSION['sort_s'] : $sort_s = "";

/*
   if($_GET['lang']!=''){  $_SESSION['lang']=$lang;  }else{    $_SESSION['lang']='th';  } 
   if($_SESSION['deal']!=''){ $_SESSION['deal']=$deal_s;   }else{   $_SESSION['deal']='all';  } 
   if($_SESSION['type_s']!=''){ $_SESSION['type_s']=$type_s;   }else{   $_SESSION['type_s']='all';  }   
   if($_SESSION['size_s']!=''){ $_SESSION['size_s']=$size_s;   }else{   $_SESSION['size_s']='all';  }   
   if($_SESSION['price_s']!=''){ $_SESSION['price_s']=$size_s;   }else{   $_SESSION['price_s']='all';  }   
   if($_SESSION['room_s']!=''){ $_SESSION['room_s']=$room_s;   }else{   $_SESSION['room_s']='all';  }   
   if($_SESSION['room_s']!=''){ $_SESSION['room_s']=$room_s;   }else{   $_SESSION['room_s']='all';  }   */

 /*
     echo("<script> top.location.href='<?php echo BASE_URL;?>/search/$lang/$deal_s/$type_s/$project_s/$size_s/$price_s/$room_s/$search_s/1'</script>");  */
 
    $baseUrl = BASE_URL;  
    $part="../../../../../../../../../../../../";
    $myurl= $baseUrl."/search/".$lang."/".$deal_s."/".$type_s."/".$project_s."/".$size_s."/".$price_s."/".$room_s."/".$search_s."/";

    $myurl_check= $baseUrl."/search/".$lang."/".$deal_s."/".$type_s."/".$project_s."/".$size_s."/".$price_s."/".$room_s."/".$search_s."/".$page_no;
 
                 //ประเภทดีล

               if($lang=='en'){
                      if($deal_s==1){   $deal_s_title="For Sale";   $nav_title="All Property For Sale";
                      }else if($deal_s==2){$deal_s_title="For Rent";    $nav_title="All Property For Rent";
                      }else if($deal_s=="all"){ $deal_s_title="For Sale , Rent "; $nav_title="All Property For Sale , Rent";
                      }else {  echo("<script> top.location.href='https://www.connex.in.th/error/$lang'</script>");  }
               }else{
                      if($deal_s==1){   $deal_s_title="ขาย";  $nav_title="รวมประกาศ ขาย";
                      }else if($deal_s==2){$deal_s_title="ให้เช่า";  $nav_title="รวมประกาศ เช่า";
                      }else if($deal_s=="all"){$deal_s_title="ขาย ให้เช่า"; $nav_title="รวมประกาศ ขาย ให้เช่า";
                      }else { echo("<script> top.location.href='https://www.connex.in.th/error/$lang'</script>"); }
               }
 


    if($room_s!='all'){
               if($lang=='en'){ 
                    if($room_s=='0'){ $room_s_title=" Studio "; }else{ $room_s_title=" ".$room_s.' Bedroom '; }                      
               }else{
                    if($room_s=='0'){ $room_s_title=" ห้องสตูดิโอ "; }else{ $room_s_title=" ".$room_s.' ห้องนอน '; }
               }
    }

    if($size_s!='all'){

              $str_size="SELECT * FROM type_size where size_id='$size_s' "; 
              $result_size=$conn->query($str_size);  
              $rs_size=$result_size->fetch_assoc();

              if($type_s=='0' or $type_s=='1' or $type_s=='7' or $type_s=='11' ){
                   $size_title_th=$rs_size['size_title'];
                   $size_title_en=$rs_size['size_title_en'];
              }else{
                   $size_title_th=$rs_size['size_title_wa'];
                   $size_title_en=$rs_size['size_title_wa_en'];
              }


               if($lang=='en'){ 
                    $size_s_title=" usable area ".$size_title_en;           
               }else{
                    $size_s_title=" พื้นที่ใช้สอย ".$size_title_th; 
               }
    } 

    if($type_s!='all'){  //ประเภททรัพย์

              $str_type="SELECT * FROM type_asset where id='$type_s' "; 
              $result_type=$conn->query($str_type);  
              $rs_type=$result_type->fetch_assoc();

                   if($lang=='th'){ 
                          $type_s_title=$rs_type['name']." ";
                   }else{
                          $type_s_title=" ".$rs_type['name_en']." ";
                   } 
    }else{
                   if($lang=='th'){ 
                          $type_s_title="  คอนโด บ้าน ทาวน์เฮ้าส์/ทาวน์โฮม ที่ดิน  ";
                   }else{
                          $type_s_title="  Condo , House , Townhouse/Townhome , Land  ";
                   }   
    }


    if($search_g_id!=''){
            /*
           $search_g_id_check="zone_group.search_g_id='$project_s' and ";

              $strSQL = "SELECT * FROM type_zone_group where search_g_id='$search_g_id'  "; 
              $result=$conn->query($strSQL);  
              $rs=$result->fetch_assoc();
               
               if($lang=='th'){

                      $heading_title="โครงการเด่นใน ".$rs['zone_g_name'];
                      $title_zone=$rs['zone_g_name'];
                      $title_pro=" คอนโดมิเนียม ทาวน์โฮม บ้านเดี่ยว โซน".$rs['zone_g_name'];
                      $settings_keyword=$rs['zone_g_name'];
                      $settings_description=$rs['zone_g_name'];
               }else{

                      $heading_title="Project in ".$rs['zone_g_name_en'];
                      $title_zone=$rs['zone_g_name_en'];
                      $title_pro=" condo , home, townhome in Zone ".$rs['zone_g_name_en'];
                      $settings_keyword=$rs['zone_g_name_en'];
                      $settings_description=$rs['zone_g_name_en'];
               } */

    }else{
           
           $search_g_id_check='';
 

    }

    /* ประเภทดีล */
    if($deal_s=='all'){             
        
         $search_deal_s="";

     } else{ 

         $search_deal_s=" data.ex_list_deal_type='$deal_s' and  " ;

     }

 

    /* ประเภททรัพย์ */
    if($type_s=='all'){  

         $list_sqm="data.ex_list_sqm";

         $search_type_s="";

    }else if($type_s=='1'){  
         
         $list_sqm="data.ex_list_sqm";
         $search_type_s=" data.ex_list_listing_type='$type_s'  and ";

    }else{   

         $list_sqm="data.ex_list_wa_count";
         $search_type_s=" data.ex_list_listing_type='$type_s'  and ";
    }




    if($size_s=='all'){  $size_min=0; $size_max=9999999999999;  


    }else{


              $str_size="SELECT * FROM type_size where size_id='$size_s' order by size_id ASC "; 
              $result_size=$conn->query($str_size);  
              $rs_size=$result_size->fetch_assoc(); 

              $size_s=$rs_size['size_id']; 
              $size_min=$rs_size['size_min'];
              $size_max=$rs_size['size_max'];

    }

    if($price_s=='all'){ 

          $price_min=0; $price_max=9999999999999;   

    }else{


          if($deal_s=='1'){
 
              $str_price="SELECT * FROM type_price_range_sale where price_range_s_id='$price_s' order by price_range_s_id  ASC "; 
              $result_price=$conn->query($str_price);  
              $rs_price=$result_price->fetch_assoc(); 

              $price_s=$rs_price['price_range_s_id'];
              $price_min=$rs_price['price_range_s_number_min'];
              $price_max=$rs_price['price_range_s_number_max'];         

          }else{

              $str_price="SELECT * FROM type_price_range where price_range_id='$price_s' order by price_range_id ASC "; 
              $result_price=$conn->query($str_price);  
              $rs_price=$result_price->fetch_assoc(); 

              $price_s=$rs_price['price_range_id'];
              $price_min=$rs_price['price_range_number_min'];
              $price_max=$rs_price['price_range_number_max'];

          }

    }

    if($room_s=='all'){  
         $search_room_s="   " ;
    }else{
         $search_room_s=" data.ex_list_bedroom='$room_s'  and     " ;  
    } 


    //if($search_s=='all'){  $search_s='';  } else{} 

    if($sort_s=='1'){
           $set_s_text="data.ex_list_price ASC,data.ex_list_img_score DESC ,  data.ex_list_public_date DESC ";

    }else if($sort_s=='2'){
           $set_s_text="data.ex_list_price DESC ,data.ex_list_img_score DESC ,  data.ex_list_public_date DESC";
    }else{

           $set_s_text="data.ex_list_premium DESC ,data.ex_list_img_score DESC ,  data.ex_list_public_date DESC";
    }


///////////////////////////////////////////// SEO ///////////////////////////////////////////////////


               if($lang=='th'){ 
                       
                      $description_1="Connex Property ";
                      $description_2=" พร้อมทำการตลาด";
               }else{

                      $description_1="Connex Property ";
                      $description_2=" ";
               }
 
 


    /* โปรเจค */
    if($project_s=='all'){  //$project_s=''; 

                $check_s='s';

                $search_check='data.ex_list_heading';
                $search_check_id='data.ex_list_heading';

                if($deal_s=='1'){
                     if($lang=='th'){ 
                            $heading_title="รวมประกาศ ".$deal_s_title.$type_s_title; 
                     }else{ 
                            $heading_title="Property Listing ".$deal_s_title.$type_s_title; 
                     }
                }else if($deal_s=='2'){
                     if($lang=='th'){ 
                            $heading_title="รวมประกาศ ".$type_s_title; 
                     }else{ 
                            $heading_title="Property Listing ".$deal_s_title.$type_s_title; 
                     }
                }else{

                     if($lang=='th'){ 
                            $heading_title="รวมประกาศ ".$type_s_title; 
                     }else{ 
                            $heading_title="Property Listing ".$type_s_title; 
                     }

                }

    } else{  

           $check_s=substr($project_s,0 , 1);

           if($check_s=='p'){
                
                $search_check='pj.project_name_en';
                $search_check_id='pj.search_p_id';


              $strSQL = "SELECT * FROM type_project where search_p_id='$project_s' LIMIT 1  "; 
              $result=$conn->query($strSQL);  
              $rs_project = $result->fetch_assoc();

              $project_id=$rs_project['project_id'];
              
              $search_project_s=" data.project_id='$project_id' and ";

              $project_latitude=$rs_project['project_latitude'];
              $project_longitude=$rs_project['project_longitude']; 
              $project_proppit_latitude=$rs_project['project_proppit_latitude'];
              $project_proppit_longitude=$rs_project['project_proppit_longitude']; 
              $ex_list_subdistrict=$rs_project['project_subdistrict'];
              $ex_list_district=$rs_project['project_district'];
              $ex_list_province=$rs_project['project_province'];
              $project_name=$rs_project['project_name'];
              $project_name_en=$rs_project['project_name_en'];
              $project_type=$rs_project['project_type'];


              $type_s=$project_type;
 
               if($lang=='th'){

                      $heading_title="โครงการ ";
                      $title_zone=$rs_project['project_name'];
                      $title_pro="โครงการ ".$rs_project['project_name']; 
                      $settings_keyword=$rs_project['project_name'];
                      $settings_description=$rs_project['project_name'];

                      $url_project_name=str_replace(" ","-",$project_name_en ,$count);                   
                      $url_project_name=strtolower($url_project_name); 
               }else{

                      $heading_title="Project ";
                      $title_zone=$rs_project['project_name_en'];
                      $title_pro=" in Project".$rs_project['project_name_en'];
                      $settings_keyword=$rs_project['project_name_en'];
                      $settings_description=$rs_project['project_name_en'];

                      $url_project_name=str_replace(" ","-",$project_name ,$count);                   
                      $url_project_name=strtolower($url_project_name); 
               }

                      $project_s_title=$title_zone;
  
           }else if($check_s=='z'){
                
              $search_check='zone.zone_name_en';
              $search_check_id='zone.search_z_id';

              $strSQL = "SELECT zone_id , zone_name ,zone_name_en FROM type_zone where search_z_id='$project_s'    "; 
              $result=$conn->query($strSQL);  
              $rs=$result->fetch_assoc();

              $zone_id=$rs['zone_id'];
              $zone_name=$rs['zone_name'];
              $zone_name_en=$rs['zone_name_en'];

              $search_project_s=" data.zone_id='$zone_id' and ";
               
               if($lang=='th'){

                      $heading_title="โครงการเด่นใน ";
                      $title_zone=$rs['zone_name'];
                      $title_pro="".$rs['zone_name']; 
                      $settings_description=$rs['zone_name'];

                      $url_project_name=str_replace(" ","-",$zone_name_en ,$count);                   
                      $url_project_name=strtolower($url_project_name); 

               }else{

                      $heading_title="Project in ";
                      $title_zone=$rs['zone_name_en'];
                      $title_pro=" in Zone ".$rs['zone_name_en']; 
                      $settings_description=$rs['zone_name_en'];

                      $url_project_name=str_replace(" ","-",$zone_name ,$count);      
                      $url_project_name=str_replace(",","",$url_project_name ,$count);            
                      $url_project_name=strtolower($url_project_name); 
               }

                      $project_s_title=$title_zone;

           }else if($check_s=='s'){
                
                $search_check='train.station_name_en';
                $search_check_id='train.search_s_id';

                $strSQL = "SELECT station_id , station_name ,station_name_en ,tr_group  FROM type_train_station where search_s_id='$project_s'    "; 
                $result=$conn->query($strSQL);  
                $rs=$result->fetch_assoc();

                $station_id=$rs['station_id'];
                $station_name=$rs['station_name'];
                $station_name_en=$rs['station_name_en'];
                $tr_group=$rs['tr_group'];

                $search_project_s=" data.ex_list_train_station='$station_id' and ";
                 
                 if($lang=='th'){

                        $heading_title="โครงการแนวรถไฟฟ้า ";
                        $title_zone=$tr_group."-".$station_name;
                        $title_pro="โครงการแนวรถไฟฟ้า ".$title_zone; 
                        $settings_description=$rs['station_name'];

                        $url_project_name=str_replace(" ","-",$station_name_en ,$count);                   
                        $url_project_name=strtolower($url_project_name); 

                 }else{

                        $heading_title="Near to train ";
                        $title_zone=$tr_group."-".$station_name_en;
                        $title_pro=" in Near to train ".$rs['tr_group']."-".$rs['station_name_en']; 
                        $settings_description=$rs['station_name_en']." sale, rent, long lease condo Near to train";

                        $url_project_name=str_replace(" ","-",$station_name ,$count);   
                        $url_project_name=strtolower($url_project_name); 

                 }

                      $project_s_title=$title_zone;
                      
           }else if($check_s=='g'){
                
              $strSQL_g = "SELECT * FROM type_zone_group where search_g_id='$project_s'  "; 
              $result_g=$conn->query($strSQL_g);  
              $rs_g=$result_g->fetch_assoc();

              $zone_g_id=$rs_g['zone_g_id'];

              $strSQL = "SELECT * FROM type_zone where zone_g_id='$zone_g_id'  "; 
              $result=$conn->query($strSQL);  
              while($rs=$result->fetch_assoc()){ $g++;
                         
                    $zone_id=$rs['zone_id'];  

                  if($g=='1'){  

                         $search_group=" data.zone_id='$zone_id' and ";

                         $sql_all="         
                           $list_sqm>=$size_min and $list_sqm<=$size_max and
                           data.ex_list_price>=$price_min and data.ex_list_price<=$price_max  and
                           $search_deal_s
                           $search_project_s  
                           $search_group
                           $search_type_s
                           $search_room_s   
                           data.ex_list_public='1' and
                           data.ex_list_close='0'

                           ";
                  }else{

                         $search_group=" data.zone_id='$zone_id' and ";

                         $sql_check="  or       
                           $list_sqm>=$size_min and $list_sqm<=$size_max and
                           data.ex_list_price>=$price_min and data.ex_list_price<=$price_max  and
                           $search_deal_s
                           $search_project_s  
                           $search_group
                           $search_type_s
                           $search_room_s   
                           data.ex_list_public='1' and
                           data.ex_list_close='0'

                           ";

                           $sql_all=$sql_all.$sql_check;
                  }

              }
               
               if($lang=='th'){

                      $heading_title="โครงการเด่นใน ";
                      $title_zone=$rs_g['zone_g_name'];
                      $title_pro=" คอนโดมิเนียม ทาวน์โฮม บ้านเดี่ยว โซน".$rs_g['zone_g_name'];
                      $settings_keyword=$rs['zone_g_name'];
                      $settings_description=$rs['zone_g_name'];


                      $url_project_name=str_replace(" ","-",$rs_g['zone_g_name_en'] ,$count);   
               }else{

                      $heading_title="Project in ";;
                      $title_zone=$rs_g['zone_g_name_en'];
                      $title_pro=" condo , home, townhome in Zone ".$rs_g['zone_g_name_en'];
                      $settings_keyword=$rs_g['zone_g_name_en'];
                      $settings_description=$rs_g['zone_g_name_en'];

                      $url_project_name=str_replace(" ","-",$rs_g['zone_g_name'] ,$count);   
               }

           }else if($check_s=='v'){
 
                      $province_v=str_replace("v","",$project_s ,$count);   
                        
                      $strSQL_provinces = "SELECT * FROM provinces where id='$province_v'  "; 
                      $result_provinces=$conn->query($strSQL_provinces);  
                      $rs_provinces=$result_provinces->fetch_assoc();

                      $province_id=$rs_provinces['id'];
                      $provinces_in_thai=$rs_provinces['provinces_in_thai'];
                      $provinces_in_english=$rs_provinces['provinces_in_english'];
         
                      $search_group=" data.ex_list_province='$province_id' and ";   
               
               if($lang=='th'){

                      $heading_title="ประกาศจังหวัด ".$provinces_in_thai;
                      $title_zone=$rs_g['zone_g_name'];
                      $title_pro=" คอนโดมิเนียม ทาวน์โฮม บ้านเดี่ยว โซน".$rs_g['zone_g_name'];
                      $settings_keyword=$rs['zone_g_name'];
                      $settings_description=$rs['zone_g_name'];
 
                      $url_project_name="property-listing" ;    
               }else{

                      $heading_title="Property by Province ".$provinces_in_english;
                      $title_zone=$rs_g['zone_g_name_en'];
                      $title_pro=" condo , home, townhome in Zone ".$rs_g['zone_g_name_en'];
                      $settings_keyword=$rs_g['zone_g_name_en'];
                      $settings_description=$rs_g['zone_g_name_en'];

                      $url_project_name="property-listing" ; 
               }

           }else{
 

        


           }

     }
   /////////////////////////////////////////////////////////////////////


                      $settings_title=$deal_s_title.$type_s_title.$title_pro.$room_s_title.$size_s_title." | ".$description_1; 
                      $settings_description=$description_1.$settings_title.$description_2; 


    if($project_s=='all'){

           if($lang=='th'){ 

                      $settings_title="รวมประกาศ ".$deal_s_title.$type_s_title.$room_s_title.$size_s_title; 
                      $settings_description=$description_1.$settings_title.$description_2; 
                    
                      $url_project_name="property-listing" ;    

           }else{
                      $settings_title="All Property ".$deal_s_title.$type_s_title.$room_s_title.$size_s_title; 
                      $settings_description=$description_1.$settings_title.$description_2; 

                      $url_project_name="รวมประกาศ" ;    
           }


    }


   if($sql_all==''){

                  $sql_all="         
                           $list_sqm>=$size_min and $list_sqm<=$size_max and
                           data.ex_list_price>=$price_min and data.ex_list_price<=$price_max  and
                           $search_deal_s
                           $search_project_s  
                           $search_group
                           $search_type_s
                           $search_room_s   
                           data.ex_list_public='1' and
                           data.ex_list_close='0'

                           ";
   }

   if($lang=='th'){

      $url_th= $baseUrl."/search/th/".$deal_s."/".$type_s."/".$project_s."/".$size_s."/".$price_s."/".$room_s."/".$search_s."/".$page_no;
      $url_en= $baseUrl."/search/en/".$deal_s."/".$type_s."/".$project_s."/".$size_s."/".$price_s."/".$room_s."/".$url_project_name."/".$page_no;

   }else{

      $url_th= $baseUrl."/search/th/".$deal_s."/".$type_s."/".$project_s."/".$size_s."/".$price_s."/".$room_s."/".$url_project_name."/".$page_no;
      $url_en= $baseUrl."/search/en/".$deal_s."/".$type_s."/".$project_s."/".$size_s."/".$price_s."/".$room_s."/".$search_s."/".$page_no;

   }
  
 /*
 
   echo $size_s."---".$size_min." sizemax : ".$size_max."---".$price_s."---"." price_min : ".$price_min." price_max : ".$price_max." search_s : ".$search_s." deal_s : ".$deal_s." type_s : ".$type_s." project_s : ".$project_s." room_s".$room_s." " ;  */
 
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }
/*
		 $sql_zone="SELECT * FROM type_zone_group where zone_g_url='".$id."' ";
		 $result_zone=$conn->query($sql_zone); 
 
         $rs_zone=$result_zone->fetch_assoc();

         $zone_g_id=$rs_zone['zone_g_id'];
         $zone_g_name=$rs_zone['zone_g_name']; */

      /*

	    if($settings_title!=''){

              $settings_title=$settings_title;
              $settings_keyword=$settings_keyword;
              $settings_description=$settings_description;

	    }else{

              $settings_title="ขาย ให้เช่า เซ้งคอนโด บ้าน ที่ดิน ย่าน".$title_zone." | Connex Property";
              $settings_keyword=$title_zone." , ขายคอนโด".$title_zone.",ขายทาวน์เฮ้าส์" ;
              $settings_description=$settings_description." | Connex Property ซื้อขาย ฝากเช่าบ้าน บ้านมือสอง คอนโด ";

	    } */


?>
<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css?v=<?php echo $today;?>">-->

    <!-- Preload -->
    <link rel="preload" href="<?php echo $part;?>css/bootstrap.css" as="style" />  

    <link rel="stylesheet" href="<?php echo $part;?>css/bootstrap.css" />

 <?php if($device=="pc"){ ?> 
    <!-- Preload -->
    <link rel="preload" href="<?php echo BASE_URL;?>/css/bootstrap-select.css" as="style" />
    <link rel="preload" href="<?php echo BASE_URL;?>/css/select2_search.css" as="style" />
    <link rel="preload" href="<?php echo BASE_URL;?>/css/main.css" as="style" />  
    <!--END Preload -->

    <link href="<?php echo BASE_URL;?>/css/main.css" rel="stylesheet" type="text/css" />  
  <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">  -->
    <link href="<?php echo BASE_URL;?>/css/bootstrap-select.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL;?>/css/select2_search.css" rel="stylesheet" />
 <?php }else{ ?>

    <!-- Preload -->
    <link rel="preload" href="<?php echo BASE_URL;?>/css/main_mobile.css" as="style" />
    <link rel="preload" href="<?php echo BASE_URL;?>/css/bootstrap-select-mobile.css" as="style" />
    <link rel="preload" href="<?php echo BASE_URL;?>/css/select2_search.css" as="style" />
    <!--END Preload -->

    <link href="<?php echo BASE_URL;?>/css/main_mobile.css" rel="stylesheet" type="text/css" />   
    <link href="<?php echo BASE_URL;?>/css/bootstrap-select-mobile.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo BASE_URL;?>/css/select2_search.css" rel="stylesheet" type="text/css" />

 <?php } ?>
    <link rel="icon" type="<?php echo $part;?>image/x-icon" href="<?php echo  $part;?>images/logo_icon.webp"> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>  
	  <title><?php echo $settings_title;?> </title>
    <meta name="author" content="Connex Property"> 
    <meta name="description" content="<?php echo $settings_description;?> ">	

    <link rel="canonical" href="<?php echo $myurl_check;?>" />
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

    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" as="style" />  
    <link rel="preload" href="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" as="script" />  

    
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" />
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  

  <style type="text/css">
    
    .col{
    position: relative;
    width: 100%;
    padding-right: 5px;
    padding-left: 5px;
  </style>

</head>
<body>

<?php 

 if($_GET['page_no']==''){
	echo("<script> top.location.href='../../../search/$lang/$id/1'</script>");   
 }

 $page_no=$_GET['page_no']; 
   /*   
 $page_no= substr($_GET['page_no'],6);  

 $page_no = str_replace("=","",$page_no,$count); 
 $page_no = str_replace("o","",$page_no,$count); */
 //echo $page_no." ".$cate_id;
 
 
 ?>

   <?php include("./include/menu.php");   ?>

	<main>
 
    <div class="map-nav">
      <a href="<?php echo $part;?>" class="link_nav"><?php echo $link_home;?></a> / <?php echo $nav_title;?>
    </div> 

		<section class="category-sec">
			<div class="col-xl-11 col-lg-12">


          <div class="row">
             <div class="col-xl-12 ">
      
   <?php if($device=="pc"){   ?> 
           
        <?php if($project_s=='' and $search_g_id=='' ){  ?>

                 <h1 class="h1x"><?php echo $search_title;?> <span></span></h1>

        <?php }else{ ?>

                 <h1 class="h1x"><?php echo $heading_title;?> <span><?php echo $title_zone;?></span></h1>

        <?php } ?>
   

            <div class="row">

            <table style="width: 100%;">
              <tr>
                <td style="width: 25%;">

              <div class="col">
                <select class="js-data-example-ajax form-control" title="<?php echo $project_s_title;?>" name="project_s" id="project_s" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}"   data-show-subtext="true" data-live-search="true"  width="100%"   >  
                                 <option selected="selected"  ><?php echo $project_s_title;?></option>
                </select>
              </div>

                </td>
                <td style="width: 75%;">



                <table style="width: 100%;">
                  <tr>
                     <td style="width: 15%;">
                          <div class="col">
                            <select  class="form-control" title="<?php echo $property_type_title;?>" name="type_s" id="type_s"  width="100%" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}" > 
                              <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/all/<?php echo $project_s;?>/<?php echo $size_s;?>/<?php echo $price_s;?>/<?php echo $room_s;?>/<?php echo $search_s;?>/1"><?php echo $property_type_title;?></option> 
                    <?php 

                    if($check_s=='p'){

                            $str_asset="SELECT  id ,name ,name_en  FROM type_asset where id='$type_s' order by id ASC "; 
                            $result_asset=$conn->query($str_asset); 

                    }else{

                            $str_asset="SELECT id ,name ,name_en  FROM type_asset order by id ASC "; 
                            $result_asset=$conn->query($str_asset); 

                    }
                           
                            while($rs_asset=$result_asset->fetch_assoc()) { 

                              $asset_id=$rs_asset['id'];
                              $asset_name=$rs_asset['name'];
                              $asset_name_en=$rs_asset['name_en'];

                                  if($lang=='th'){ 

                                       $asset_name=$asset_name;  

                                  }else{ 
                                      $asset_name=$asset_name_en;  
                                  }

                            $url_station_name_en=str_replace(" ","-",$station_name_en ,$count);                   
                            $url_station_name_en=strtolower($url_station_name_en); 

                            $url="search/$lang/".$deal_s."/".$asset_id."/".$project_s."/".$size_s."/".$price_s."/".$room_s."/".$search_s."/1";

                    ?>
                                      <option value="<?php echo BASE_URL;?>/<?php echo $url;?>"name="type_s" id="type_s" <?php if($type_s==$asset_id){?> selected="selected" <?php } ?>  ><?php echo $asset_name;?></option> 

                           <?php } ?>
                            </select>
                          </div>

                     </td>
                     <td style="width: 10%;">
                        <div class="col">
                          <select class="form-control" title="<?php echo $deal_title;?>" data-show-subtext="true" data-live-search="true"  name="deal_s" id="deal_s" width="100%" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}" > 
                            <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/all/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/<?php echo $price_s;?>/<?php echo $room_s;?>/<?php echo $search_s;?>/1"><?php echo $deal_title;?></option> 
                            <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/1/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/<?php echo $price_s;?>/<?php echo $room_s;?>/<?php echo $search_s;?>/1" <?php if($deal_s=="1"){?> selected="selected" <?php } ?> ><?php echo $buy_title;?></option> 
                            <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/2/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/<?php echo $price_s;?>/<?php echo $room_s;?>/<?php echo $search_s;?>/1" <?php if($deal_s=="2"){?> selected="selected" <?php } ?> ><?php echo $rent_title;?></option> 
                          </select> 
                        </div>   
                     </td> 

                     <td style="width: 10%;" id="room_s_checks">
                        <div class="col" id="room_s_checks_condo">
                          <select class="form-control" title="<?php echo $room_title;?>" data-show-subtext="true" data-live-search="true" name="room_s" id="room_s_checks_condo" width="100%" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}" > 
                            <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/<?php echo $price_s;?>/all/<?php echo $search_s;?>/1" <?php if($room_s=="all"){ ?>selected="selected" <?php } ?>  ><?php echo $room_title;?></option> 
                            
                 <?php for($x=0; $x <= 10; $x++) { ?>
                            <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/<?php echo $price_s;?>/<?php echo $x;?>/<?php echo $search_s;?>/1" <?php if($room_s==$x and $room_s!='all'){ ?>selected="selected" <?php } ?> ><?php if($x==0){ echo "Studio"; }else{ echo $x." ".$bedroom_title; } ?>
                              
                            </option>  
                <?php  } ?>      
                          </select>
                        </div>

                        <div class="col" id="room_s_checks_home">
                          <select class="form-control" title="<?php echo $room_title;?>" data-show-subtext="true" data-live-search="true" name="room_s_2" id="room_s_checks_home" width="100%" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}" > 
                            <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/<?php echo $price_s;?>/all/<?php echo $search_s;?>/1" <?php if($room_s=="all"){ ?>selected="selected" <?php } ?>><?php echo $room_title;?></option> 
                            
                 <?php for($x = 1; $x <= 10; $x++) { ?>
                            <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/<?php echo $price_s;?>/<?php echo $x;?>/<?php echo $search_s;?>/1" <?php if($room_s==$x and $room_s!='all'){ ?>selected="selected" <?php } ?>><?php echo $x." ".$bedroom_title;?>
                              
                            </option>  
                <?php  } ?>      
                          </select>
                         </div>

                     </td>
                     <td style="width: 15%;">
                         <div class="col" id="size_s_checks_sqm" >
                            <select class="form-control" title="<?php echo $size_title;?>" data-show-subtext="true" data-live-search="true" name="size_s" id="sel1" width="100%" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}"  > 
                              <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/all/<?php echo $price_s;?>/<?php echo $room_s;?>/<?php echo $search_s;?>/1"><?php echo $size_title;?></option> 
                 <?php
                          $str_size="SELECT size_id ,size_title ,size_title_en  FROM type_size order by size_id  ASC "; 
                          $result_size=$conn->query($str_size); 
                           
                          while($rs_size=$result_size->fetch_assoc()) {  

                            $size_id=$rs_size['size_id'];
                            $size_title_c=$rs_size['size_title'];
                            $size_title_c_en=$rs_size['size_title_en'];

                              if($lang=='th'){ 
                                      $size_title_c=$size_title_c;     
                              }else{
                                      $size_title_c=$size_title_c_en;   
                              }

                  ?>
                              <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_id;?>/<?php echo $price_s;?>/<?php echo $room_s;?>/<?php echo $search_s;?>/1" <?php if($size_id==$size_s){?> selected="selected" <?php } ?>><?php echo $size_title_c;?></option> 
                  <?php } ?>
                            </select>
                          </div>

                          <div class="col" id="size_s_checks_sqwa" >
                            <select class="form-control" title="<?php echo $size_title;?>" data-show-subtext="true" data-live-search="true" name="size_s_wa" id="size_s_wa" width="100%" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}"> 
                              <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/all/<?php echo $price_s;?>/<?php echo $room_s;?>/<?php echo $search_s;?>/1" <?php if($size_s==0){?> selected="selected" <?php } ?>><?php echo $size_title;?></option> 
                 <?php
                          $str_size="SELECT size_id ,size_title_wa ,size_title_wa_en FROM type_size order by size_id  ASC "; 
                          $result_size=$conn->query($str_size); 
                           
                          while($rs_size=$result_size->fetch_assoc()) {  

                            $size_id_wa=$rs_size['size_id'];
                            $size_title_wa=$rs_size['size_title_wa'];
                            $size_title_wa_en=$rs_size['size_title_wa_en'];

                              if($lang=='th'){ 
                                      $size_title_c=$size_title_wa;     
                              }else{
                                      $size_title_c=$size_title_wa_en;   
                              }

                  ?> 
                              <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_id_wa;?>/<?php echo $price_s;?>/<?php echo $room_s;?>/<?php echo $search_s;?>/1" <?php if($size_id_wa==$size_s){?> selected="selected" <?php } ?>><?php echo $size_title_c;?></option> 
                  <?php } ?>
                            </select>
                          </div>
                     </td>

                     <td style="width: 15%;">

                        <div class="col" id="price_s_checks_rent"> 

                                    <select class="form-control" title="<?php echo $price_title;?>" data-show-subtext="true" data-live-search="true" name="price_s" id="sel1" width="100%" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}"> 
                     
                                      <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/all/<?php echo $room_s;?>/<?php echo $search_s;?>/1"><?php echo $price_title;?></option> 
                             <?php
                                    $str_price_range="SELECT price_range_id ,price_range_text ,price_range_text_en FROM type_price_range order by price_range_id  ASC "; 
                                    $result_price_range=$conn->query($str_price_range); 
                                   
                                    while($rs_price_range=$result_price_range->fetch_assoc()) { 

                                      $price_range_id=$rs_price_range['price_range_id'];

                                      if($lang=='th'){
                                            $price_range_text=$rs_price_range['price_range_text'];  
                                      }else{
                                            $price_range_text=$rs_price_range['price_range_text_en'];  
                                      } 
                                    ?> 

                                      <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/<?php echo $price_range_id;?>/<?php echo $room_s;?>/<?php echo $search_s;?>/1" <?php if($price_range_id=="$price_s"){?> selected="selected" <?php } ?>><?php echo $price_range_text;?></option>   
                              <?php } ?>
                                    </select>
                        </div> 

                        <div class="col" id="price_s_checks_sale"> 
                          
                                    <select class="form-control" title="<?php echo $price_title;?>" data-show-subtext="true" data-live-search="true" name="price_s_sale" id="price_s_sale" width="100%" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}"> 
                     
                                      <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/all/<?php echo $room_s;?>/<?php echo $search_s;?>/1"><?php echo $price_title;?></option> 
                             <?php
                                    $str_price_range="SELECT price_range_s_id ,price_range_s_text ,price_range_s_text_en FROM type_price_range_sale order by price_range_s_id ASC "; 
                                    $result_price_range=$conn->query($str_price_range); 
                                   
                                    while($rs_price_range=$result_price_range->fetch_assoc()) { 

                                      $price_range_s_id=$rs_price_range['price_range_s_id'];
                                      if($lang=='th'){
                                            $price_range_text=$rs_price_range['price_range_s_text'];  
                                      }else{
                                            $price_range_text=$rs_price_range['price_range_s_text_en'];  
                                      } 
                                    ?>
 
                                      <option value="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/<?php echo $deal_s;?>/<?php echo $type_s;?>/<?php echo $project_s;?>/<?php echo $size_s;?>/<?php echo $price_range_s_id;?>/<?php echo $room_s;?>/<?php echo $search_s;?>/1" <?php if($price_range_s_id=="$price_s"){?> selected="selected" <?php } ?>><?php echo $price_range_text;?></option>   
                              <?php } ?>
                                    </select>
                        </div> 

                     </td>

                     <td style="width: 5%;text-align: left;">
                         <a href="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/all/all/all/all/all/all/<?php echo $title_url_reset;?>/1"  ><label style="cursor:pointer;text-align: left;" ><?php echo $reset_title;?></label></a> 
                     </td>
<!--
                     <td style="width: 8%;">
                          <input type="submit" class="btn btn-des" value="Search">  
                     </td>-->

                     <td style="width: 15%;">
                        <div class="col">             
                          <select class="form-control bg-icon-sort" title="<?php echo $sort_s_title;?> " data-show-subtext="true" data-live-search="true"  name="sort_s" id="sel1" onchange="if (this.options[selectedIndex].value != '') {document.location.href=this.options[selectedIndex].value}"  >
                             
                            
                            <option value="<?php echo BASE_URL;?>/include/process_search.php?lang=<?php echo $lang;?>&status=project&deal_s=<?php echo $deal_s;?>&type_s=<?php echo $type_s;?>&project_s=<?php echo $project_s;?>&size_s=<?php echo $size_s;?>&price_s=<?php echo $price_s;?>&room_s=<?php echo $room_s;?>&search_s=<?php echo $search_s;?>&sort_s="  >
                              <?php echo $sort_s_title_0;?></option> 
                            <option value="<?php echo BASE_URL;?>/include/process_search.php?lang=<?php echo $lang;?>&status=project&deal_s=<?php echo $deal_s;?>&type_s=<?php echo $type_s;?>&project_s=<?php echo $project_s;?>&size_s=<?php echo $size_s;?>&price_s=<?php echo $price_s;?>&room_s=<?php echo $room_s;?>&search_s=<?php echo $search_s;?>&sort_s=1" <?php if($_SESSION['sort_s']==1){ ?> selected="selected" <?php } ?>><?php echo $sort_s_title_1;?></option> 
                            <option value="<?php echo BASE_URL;?>/include/process_search.php?lang=<?php echo $lang;?>&status=project&deal_s=<?php echo $deal_s;?>&type_s=<?php echo $type_s;?>&project_s=<?php echo $project_s;?>&size_s=<?php echo $size_s;?>&price_s=<?php echo $price_s;?>&room_s=<?php echo $room_s;?>&search_s=<?php echo $search_s;?>&sort_s=2" <?php if($_SESSION['sort_s']==2){ ?> selected="selected" <?php } ?>><?php echo $sort_s_title_2;?></option> 
                          </select>

                        </div>
                     </td>


                   </tr> 

                </table> 

 
            </td>
              
            

          </tr>
        </table>

            </div>
            
          </div>
        

   <script type="text/javascript">
$(document).ready(function(){
 

    $("#type_s").change(function(){
      var type_s = $("#type_s").val();
     
      if(type_s=="1"){

        $("#size_s_checks_sqm").show();
        $("#size_s_checks_sqwa").hide();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").show();
        $("#room_s_checks_home").hide();
        /*
        $("#p1").hide();
        $("#p_floor").show();
        //$("#txt_box").val(""); */
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */

      }else if(type_s=="2"){

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show();       

      }else if(type_s=="3"){

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show();  

      }else if(type_s=="4"){

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 


      }else if(type_s=="5"){     

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 


      }else if(type_s=="6"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 


      }else if(type_s=="7"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 

      }else if(type_s=="8"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 

      }else if(type_s=="9"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 

      }else if(type_s=="10"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 

      }else if(type_s=="11"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 

      }else if(type_s=="12"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").hide();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").hide(); 
        $("#room_s_checks").hide(); 


      }else if(type_s=="0"){  

        $("#size_s_checks_sqm").show();
        $("#size_s_checks_sqwa").hide();
        $("#room_s_checks_land").show();
 

      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */ 
        $("#size_s_checks_sqwa").hide();
        $("#price_s_checks_sale").hide();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").show();
        $("#room_s_checks_home").hide();
      }
    });

    $("#deal_s").change(function(){
      var deal_s = $("#deal_s").val();
     
      if(deal_s=="1"){

        $("#price_s_checks_rent").hide();
        $("#price_s_checks_sale").show();        
        /*
        $("#p1").hide();
        $("#p_floor").show();
        //$("#txt_box").val(""); */
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */

      }else if(deal_s=="2"){


        $("#price_s_checks_rent").show();
        $("#price_s_checks_sale").hide();        

        

      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */ 
        $("#price_s_checks_rent").show();
        $("#price_s_checks_sale").hide();  

      }
    });

});

 
 <?php if($type_s=='1' or $type_s=='0' or $type_s==''){  ?>

          $("#size_s_checks_sqm").show();
          $("#size_s_checks_sqwa").hide();
          $("#price_s_checks_rent").show();
          $("#price_s_checks_sale").hide();     
          $("#room_s_checks_land").show();
          $("#room_s_checks_condo").show();
          $("#room_s_checks_home").hide(); 

 <?php  }else if($type_s=='12'){  ?>

          $("#size_s_checks_sqm").hide();
          $("#size_s_checks_sqwa").show();
          $("#price_s_checks_rent").hide();
          $("#price_s_checks_sale").hide();   
          $("#room_s_checks_land").hide();
          $("#room_s_checks_condo").hide();
          $("#room_s_checks_home").hide(); 
          $("#room_s_checks").hide(); 

 <?php  }else{  ?>

          $("#size_s_checks_sqm").hide();
          $("#size_s_checks_sqwa").show();
          $("#price_s_checks_rent").hide();
          $("#price_s_checks_sale").show();   
          $("#room_s_checks_land").show();
          $("#room_s_checks_condo").hide();
          $("#room_s_checks_home").show(); 

  <?php } ?>  


    
 <?php if($deal_s=='1'){  ?>

        $("#price_s_checks_rent").hide();
        $("#price_s_checks_sale").show(); 

 <?php }else if($deal_s=='2' or $type_s=='0'){  ?>   

        $("#price_s_checks_rent").show();
        $("#price_s_checks_sale").hide(); 

 <?php }else{  ?>

        $("#price_s_checks_rent").show();
        $("#price_s_checks_sale").hide();    
 

  <?php } ?>  

</script>



  <?php }else{ ?>


            <link rel="stylesheet" href="<?php echo $part;?>css/w3.css?v=<?php echo $today;?>">

 
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>
  


             <!-- <button onclick="document.getElementById('id01').style.display='block'" class="btn search-detail" ><?php echo $search_title;?></button>-->
            

              <div class="inputWithIcon">
                <input type="text" class="search-text" id="myBtn" placeholder="<?php echo $search_title;?>" onclick="document.getElementById('id01').style.display='block'" >
                <i class="fa fa-search fa-lg fa-fw" aria-hidden="true" onclick="document.getElementById('id01').style.display='block'" ></i>
              </div>


<!-- The Modal -->
 

 
             <div id="id01" class="w3-modal modal">
                <div class="w3-modal-content w3-animate-top w3-card-4">
                  <header class="w3-container w3-teal"> 
                    <span onclick="document.getElementById('id01').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h2><?php echo $search_title;?></h2>
                  </header>
                  <div class="w3-container">




              <form method="post" id="form" enctype="multipart/form-data" action="<?php echo $part."include/process_search.php";?>"  > 
              
                <input type="text" class="form-control" style="width: 100%;" name="id"  value="<?php echo $id;?>" hidden="hidden" >
                <input type="text" class="form-control" style="width: 100%;" name="page"  value="search" hidden="hidden" >
                <input type="text" name="lang" id="" value="<?php echo $lang ; ?>" hidden="hidden" >
             <!--   <input type="text" class="form-control" style="width: 100%;" name="set_s"  value="<?php if($set_s==''){ echo "1";}else{ echo $set_s;}?>" hidden="hidden" >-->

            <div class="row"   >
              <div class="search_m">
              <!--  <label><?php echo $project_s_title;?></label> -->
                <select class="js-data-example-ajax form-control" title="<?php echo $project_s_title;?>" name="project_s" id="project_s"  data-show-subtext="true" data-live-search="true" style="width: 100%;"  >  
                                 <option selected="selected"  value="<?php echo $project_s;?>" ><?php echo $project_s_title;?></option>
                </select>
              </div>

             <div class="search_m"  >
                            <select  class="form-control" title="<?php echo $property_type_title;?>" name="type_s" id="type_s"  width="100%"   > 
                              <option value=""><?php echo $property_type_title;?> </option> 
                    <?php 
                 
                    if($check_s=='p'){

                            $str_asset="SELECT * FROM type_asset where id='$type_s' order by id ASC "; 
                            $result_asset=$conn->query($str_asset); 

                    }else{

                            $str_asset="SELECT * FROM type_asset order by id ASC "; 
                            $result_asset=$conn->query($str_asset); 

                    }
                           
                            while($rs_asset=$result_asset->fetch_assoc()) { 

                              $asset_id=$rs_asset['id'];
                              $asset_name=$rs_asset['name'];
                              $asset_name_en=$rs_asset['name_en'];

                                  if($lang=='th'){ 

                                       $asset_name=$asset_name;  

                                  }else{ 
                                      $asset_name=$asset_name_en;  
                                  }
 

                            $url="search/$lang/".$deal_s."/".$asset_id."/".$project_s."/".$size_s."/".$price_s."/".$room_s."/".$search_s."/1";
                    ?>
                                      <option value="<?php echo $asset_id;?>"name="type_s" id="type_s" <?php if($type_s==$asset_id){?> selected="selected" <?php } ?>  ><?php echo $asset_name;?></option> 

                           <?php } ?>
                            </select>
              </div>
 


              <div class="search_m">
                          <select class="form-control" title="<?php echo $deal_title;?>" data-show-subtext="true" data-live-search="true"  name="deal_s" id="deal_s" width="100%" > 
                            <option value=""><?php echo $deal_title;?> </option> 
                            <option value="1" <?php if($deal_s=="1"){?> selected="selected" <?php } ?> ><?php echo $buy_title;?></option> 
                            <option value="2" <?php if($deal_s=="2"){?> selected="selected" <?php } ?> ><?php echo $rent_title;?></option> 
                          </select> 
              </div>
              
               <div class="search_m" id="room_s_checks_condo">
                          <select class="form-control" title="<?php echo $room_title;?>" data-show-subtext="true" data-live-search="true" name="room_s" id="room_s_checks_condo" width="100%"  > 
                            <option value=""  selected="selected"  ><?php echo $room_title;?></option> 
                            
                 <?php for($x=0; $x <= 10; $x++) { ?>
                            <option value="<?php echo $x;?>" <?php if($room_s==$x and $room_s!='all'){ ?>selected="selected" <?php } ?> ><?php if($x==0){ echo "Studio"; }else{ echo $x." ".$bedroom_title; } ?>
                              
                            </option>  
                <?php  } ?>      
                          </select>
                 </div>

                <div class="search_m" id="room_s_checks_home">
                          <select class="form-control" title="<?php echo $room_title;?>" data-show-subtext="true" data-live-search="true" name="room_s_2" id="room_s_checks_home" width="100%" > 
                            <option value=""  selected="selected"   ><?php echo $room_title;?> </option> 
                            
                 <?php for($x = 1; $x <= 10; $x++) { ?>
                            <option value="<?php echo $x;?>" <?php if($room_s==$x and $room_s!='all'){ ?>selected="selected" <?php } ?>><?php echo $x." ".$bedroom_title;?>
                              
                            </option>  
                <?php  } ?>      
                          </select>
              </div>

                         

              <div class="search_m" id="size_s_checks_sqm">
                            <select class="form-control" title="<?php echo $size_title;?>" data-show-subtext="true" data-live-search="true" name="size_s" id="sel1" width="100%"   > 
                              <option value="" <?php if($size_s==0){?> selected="selected" <?php } ?>><?php echo $size_title;?></option> 
                 <?php
                          $str_size="SELECT size_id ,size_title ,size_title_en  FROM type_size order by size_id  ASC "; 
                          $result_size=$conn->query($str_size); 
                           
                          while($rs_size=$result_size->fetch_assoc()) {  

                            $size_id=$rs_size['size_id'];
                            $size_title_c=$rs_size['size_title'];
                            $size_title_en=$rs_size['size_title_en'];

                              if($lang=='th'){ 
                                      $size_title_c=$size_title_c;     
                              }else{
                                      $size_title_c=$size_title_en;   
                              }

                  ?>
                              <option value="<?php echo $size_id;?>" <?php if($size_id==$size_s){?> selected="selected" <?php } ?>><?php echo $size_title_c;?></option> 
                  <?php } ?>
                            </select>
              </div>


              <div class="search_m" id="size_s_checks_sqwa">
                            <select class="form-control" title="<?php echo $size_title;?>" data-show-subtext="true" data-live-search="true" name="size_s_wa" id="size_s_wa" width="100%" > 
                              <option value="" <?php if($size_s==0){?> selected="selected" <?php } ?>><?php echo $size_title;?> </option> 
                 <?php
                          $str_size="SELECT size_id ,size_title_wa ,size_title_wa_en FROM type_size order by size_id  ASC "; 
                          $result_size=$conn->query($str_size); 
                           
                          while($rs_size=$result_size->fetch_assoc()) {  

                            $size_id_wa=$rs_size['size_id'];
                            $size_title_wa=$rs_size['size_title_wa'];
                            $size_title_wa_en=$rs_size['size_title_wa_en'];

                              if($lang=='th'){ 
                                      $size_title=$size_title_wa;     
                              }else{
                                      $size_title=$size_title_wa_en;   
                              }

                  ?>
                              <option value="<?php echo $size_id_wa;?>" <?php if($size_id_wa==$size_s){?> selected="selected" <?php } ?>><?php echo $size_title;?></option> 
                  <?php } ?>
                            </select>
              </div>
              <div class="search_m" id="price_s_checks_rent"> 

                         <select class="form-control" title="<?php echo $price_title;?>" data-show-subtext="true" data-live-search="true" name="price_s" id="sel1" width="100%" > 
                     
                                      <option value=""><?php echo $price_title;?> </option> 
                             <?php
                                    $str_price_range="SELECT price_range_id ,price_range_text ,price_range_text_en FROM type_price_range order by price_range_id  ASC "; 
                                    $result_price_range=$conn->query($str_price_range); 
                                   
                                    while($rs_price_range=$result_price_range->fetch_assoc()) { 

                                      $price_range_id=$rs_price_range['price_range_id'];

                                      if($lang=='th'){
                                            $price_range_text=$rs_price_range['price_range_text'];  
                                      }else{
                                            $price_range_text=$rs_price_range['price_range_text_en'];  
                                      } 
                                    ?>
                                      <option value="<?php echo $price_range_id;?>" <?php if($price_range_id=="$price_s"){?> selected="selected" <?php } ?>><?php echo $price_range_text;?></option>   
                              <?php } ?>
                        </select>
                </div> 

                <div class="search_m" id="price_s_checks_sale"> 
                          
                       <select class="form-control" title="<?php echo $price_title;?>" data-show-subtext="true" data-live-search="true" name="price_s_sale" id="price_s_sale" width="100%" > 
                     
                                      <option value=""><?php echo $price_title;?> </option> 
                             <?php
                                    $str_price_range="SELECT price_range_s_id ,price_range_s_text ,price_range_s_text_en FROM type_price_range_sale order by price_range_s_id ASC "; 
                                    $result_price_range=$conn->query($str_price_range); 
                                   
                                    while($rs_price_range=$result_price_range->fetch_assoc()) { 

                                      $price_range_s_id=$rs_price_range['price_range_s_id'];
                                      if($lang=='th'){
                                            $price_range_text=$rs_price_range['price_range_s_text'];  
                                      }else{
                                            $price_range_text=$rs_price_range['price_range_s_text_en'];  
                                      } 
                                    ?>
                                      <option value="<?php echo $price_range_s_id;?>" <?php if($price_range_s_id=="$price_s"){?> selected="selected" <?php } ?>><?php echo $price_range_text;?></option>  
                              <?php } ?>
                     </select>
               </div>  

               <div class="search_m">             
                      <select class="form-control" title="<?php echo $sort_s_title;?> " data-show-subtext="true" data-live-search="true"  name="sort_s" id="sel1" > 
                            <option value=""><?php echo $sort_s_title_0;?></option> 
                            <option value="1" <?php if($_SESSION['sort_s']==1){ ?> selected="selected" <?php } ?>><?php echo $sort_s_title_1;?></option> 
                            <option value="2" <?php if($_SESSION['sort_s']==2){ ?> selected="selected" <?php } ?>><?php echo $sort_s_title_2;?></option> 
                     </select>
               </div>
               <br>
          

               
              <div class="search_m">
                  <a href="<?php echo BASE_URL;?>/search/<?php echo $lang;?>/all/all/all/all/all/all/<?php echo $title_url_reset;?>/1"  ><label style="cursor:pointer;">  คืนค่าเริ่มต้น </label></a>
              </div> 

               <div class="search_m">             
                    <input type="submit" class="btn-search" id="submit" name="btn_submit" value="<?php echo $search_title;?>" > 
               </div>

               
            </div>
            
          </div>
           

        </form>
 

                  </div>
                

                </div>
              </div>



<script>
// Get the modal
var modal = document.getElementById("id01");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


   <script type="text/javascript">
$(document).ready(function(){
 

    $("#type_s").change(function(){
      var type_s = $("#type_s").val();
     
      if(type_s=="1"){

        $("#size_s_checks_sqm").show();
        $("#size_s_checks_sqwa").hide();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").show();
        $("#room_s_checks_home").hide();
        /*
        $("#p1").hide();
        $("#p_floor").show();
        //$("#txt_box").val(""); */
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */

      }else if(type_s=="2"){

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show();       

      }else if(type_s=="3"){

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show();  

      }else if(type_s=="4"){

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 


      }else if(type_s=="5"){     

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 


      }else if(type_s=="6"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 


      }else if(type_s=="7"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 

      }else if(type_s=="8"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 

      }else if(type_s=="9"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 

      }else if(type_s=="10"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 

      }else if(type_s=="11"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").show(); 

      }else if(type_s=="12"){   

        $("#size_s_checks_sqm").hide();
        $("#size_s_checks_sqwa").show();
        $("#room_s_checks_land").hide();
        $("#room_s_checks_condo").hide();
        $("#room_s_checks_home").hide(); 

      }else if(type_s=="0"){  

        $("#size_s_checks_sqm").show();
        $("#size_s_checks_sqwa").hide();
        $("#room_s_checks_land").show();
 

      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */ 
        $("#size_s_checks_sqwa").hide();
        $("#price_s_checks_sale").hide();
        $("#room_s_checks_land").show();
        $("#room_s_checks_condo").show();
        $("#room_s_checks_home").hide();
      }
    });

    $("#deal_s").change(function(){
      var deal_s = $("#deal_s").val();
     
      if(deal_s=="1"){

        $("#price_s_checks_rent").hide();
        $("#price_s_checks_sale").show();        
        /*
        $("#p1").hide();
        $("#p_floor").show();
        //$("#txt_box").val(""); */
        /*
        $("#box").show();
        $("#txt_box").val("").focus(); */

      }else if(deal_s=="2"){


        $("#price_s_checks_rent").show();
        $("#price_s_checks_sale").hide();        

        

      }else{
        /* $("#box").hide();
        $("#txt_box").val(""); */ 
        $("#price_s_checks_rent").show();
        $("#price_s_checks_sale").hide();  

      }
    });

});

 
 <?php if($type_s=='1' or $type_s=='0' or $type_s==''){  ?>

          $("#size_s_checks_sqm").show();
          $("#size_s_checks_sqwa").hide();
          $("#price_s_checks_rent").show();
          $("#price_s_checks_sale").hide();     
          $("#room_s_checks_land").show();
          $("#room_s_checks_condo").show();
          $("#room_s_checks_home").hide(); 

 <?php  }else if($type_s=='12'){  ?>

          $("#size_s_checks_sqm").hide();
          $("#size_s_checks_sqwa").show();
          $("#price_s_checks_rent").hide();
          $("#price_s_checks_sale").hide();   
          $("#room_s_checks_land").hide();
          $("#room_s_checks_condo").hide();
          $("#room_s_checks_home").hide(); 

 <?php  }else{  ?>

          $("#size_s_checks_sqm").hide();
          $("#size_s_checks_sqwa").show();
          $("#price_s_checks_rent").hide();
          $("#price_s_checks_sale").show();   
          $("#room_s_checks_land").show();
          $("#room_s_checks_condo").hide();
          $("#room_s_checks_home").show(); 

  <?php } ?>  


    
 <?php if($deal_s=='1'){  ?>

        $("#price_s_checks_rent").hide();
        $("#price_s_checks_sale").show(); 

 <?php }else if($deal_s=='2' or $type_s=='0'){  ?>   

        $("#price_s_checks_rent").show();
        $("#price_s_checks_sale").hide(); 

 <?php }else{  ?>

        $("#price_s_checks_rent").show();
        $("#price_s_checks_sale").hide();    
 

  <?php } ?>  

</script>


  <?php } ?>

        </div>


<!--

   <script>
      function cek_db(){
        var id = $("#project_s").val();
        $.ajax({ 
          url : '<?php echo BASE_URL;?>/script/auto_process.php',
          data : "project_s="+id,
        }).success(function (data){
          var json = data,
          obj = JSON.parse(json);
          $('#type_s').val(obj.project_type); 
 
 
           

        })
      }

    </script> -->


        <!-- Preload-->
        <link rel="preload" href="<?php echo BASE_URL;?>/backend/js/1.12.4/jquery.js" as="script">
        <link rel="preload" href="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" as="script">
        <!-- END Preload-->

        <script src="<?php echo BASE_URL;?>/backend/js/1.12.4/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 



				<div class="row">
 

 

<?php   
 
 
//echo $sql_all;

// echo $project_s."-".$size_min."-".$size_max." / ".$price_min."-".$price_max." Search_s".$search_s." - ".$deal_s." | TYPE : ".$type_s." | PROJECT : ".$project_s.$room_s."";  

  if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }

$no=0;

 

if (isset($page_no) && $page_no!="" && $page_no!="l") {
$page_no = $page_no;
} else {
   $page_no = 1;
   }

$total_records_per_page = 10;
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2"; 


  
 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM dbo_data_excel_listing AS data 

 where  (   
            $sql_all 
  
        )");


    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1






		$sql="SELECT * FROM dbo_data_excel_listing AS data  

 where  (   

             $sql_all
  
        )

             
		               

 order by  $set_s_text  LIMIT $offset, $total_records_per_page ";  
$result = $conn->query($sql);

$row_num_sum = $result->num_rows;

	// output data of each row
	 while($rs=$result->fetch_assoc()) { $num++;


              $ex_list_heading=$rs['ex_list_heading'];
              $ex_list_heading_en=$rs['ex_list_heading_en'];
              $ex_list_listing_code=$rs['ex_list_listing_code'];
              $ex_list_price=$rs['ex_list_price'];
              $ex_list_bedroom=$rs['ex_list_bedroom'];
              $ex_list_bedroom_check=$rs['ex_list_bedroom'];
              $ex_list_bathroom=$rs['ex_list_bathroom']; 
              $ex_list_deal_type=$rs['ex_list_deal_type'];
              $ex_list_parking=$rs['ex_list_parking'];
              $ex_list_sqm=$rs['ex_list_sqm'];
              $ex_list_floor=$rs['ex_list_floor'];
              $ex_list_total_floors=$rs['ex_list_total_floors'];
              $ex_list_project=$rs['ex_list_project'];
              $ex_list_parking=$rs['ex_list_parking'];
              $ex_list_listing_type=$rs['ex_list_listing_type'];

              $listing_img_folder=$rs['listing_img_folder'];
              $listing_img_name=$rs['listing_img_webp'];

             if($project_s=='all' or $check_s=='p' or $check_s=='z' or $check_s=='s' or $check_s=='g' or $check_s=='v'){
                    
                    $project_id=$rs['project_id'];

                    $strSQL_pro= "SELECT project_id , project_latitude ,project_longitude , project_proppit_latitude , project_proppit_longitude , project_subdistrict , 
                              project_district ,project_province , project_name, project_name_en , search_p_id
                              FROM type_project where project_id='$project_id'  "; 
                    $result_pro=$conn->query($strSQL_pro);  
                    $rs_pro=$result_pro->fetch_assoc(); 

                    $project_latitude=$rs_pro['project_latitude'];
                    $project_longitude=$rs_pro['project_longitude']; 
                    $project_proppit_latitude=$rs_pro['project_proppit_latitude'];
                    $project_proppit_longitude=$rs_pro['project_proppit_longitude']; 
                    $ex_list_subdistrict=$rs_pro['project_subdistrict'];
                    $ex_list_district=$rs_pro['project_district'];
                    $ex_list_province=$rs_pro['project_province'];

                    $project_name=$rs_pro['project_name']; 
                    $project_name_en=$rs_pro['project_name_en']; 
              }



              
              if($project_id!='' or $project_id!='0'){
                    $ex_list_listing_name=$rs['ex_list_listing_name'];
                    $ex_list_listing_name_en=$rs['ex_list_listing_name'];
              }

              $search_p_id=$rs['search_p_id'];       
              $search_z_id=$rs['search_z_id'];    
              

           if($ex_list_province==''){   
              $ex_list_subdistrict=$rs['ex_list_subdistrict'];
              $ex_list_district=$rs['ex_list_district'];
              $ex_list_province=$rs['ex_list_province'];
           }

              $ex_list_latitude=$rs['ex_list_latitude'];
              $ex_list_longitude=$rs['ex_list_longitude'];
 

              $ex_list_rai=$rs['ex_list_rai'];
              $ex_list_ngan=$rs['ex_list_ngan'];
              $ex_list_wa=$rs['ex_list_wa'];

              $search_p_id=$rs['search_p_id'];

               $ex_list_rai=$ex_list_rai* 400; 
               $ex_list_ngan=$ex_list_ngan* 100;   

               $ex_list_wa=$ex_list_rai+$ex_list_ngan+$ex_list_wa;

        			 if($project_proppit_latitude!=''){

        						 $project_latitude=$project_proppit_latitude;
        						 $project_longitude=$project_proppit_longitude;

        			 }else if($project_proppit_latitude=='' and $project_latitude!=''){
                          

        						 $project_latitude=$project_latitude;
        						 $project_longitude=$project_longitude;

        			 }else{


        						 $project_latitude=$ex_list_latitude;
        						 $project_longitude=$ex_list_longitude;

        			 }


          // สำหรับที่ดินเท่านั้น

                if($ex_list_rai!='0' and $ex_list_ngan!='0' and $ex_list_wa!='0'){  

                           $area_th_2=$ex_list_rai." ไร่ ".$ex_list_ngan." งาน ".$ex_list_wa." ตร.ว.";
                           $area_en_2=$ex_list_rai." Rai ".$ex_list_ngan." Ngan ".$ex_list_wa." Sq.wah. "; 

                }else if($ex_list_rai=='0' and $ex_list_ngan!='0' and $ex_list_wa!='0'){

                           $area_th_2=$ex_list_ngan." งาน ".$ex_list_wa." ตร.ว.";
                           $area_en_2=$ex_list_ngan." Ngan ".$ex_list_wa." Sq.wah. ";   

                }else if($ex_list_rai=='0' and $ex_list_ngan=='0' and $ex_list_wa!='0'){

                           $area_th_2=$ex_list_wa." ตร.ว.";
                           $area_en_2=$ex_list_wa." Sq.wah. ";  

                }else if($ex_list_rai!='0' and $ex_list_ngan=='0' and $ex_list_wa=='0'){

                           $area_th_2=$ex_list_rai." ไร่ ";
                           $area_en_2=$ex_list_rai." Rai "; 

                }else if($ex_list_rai=='0' and $ex_list_ngan!='0' and $ex_list_wa=='0'){

                           $area_th_2=$ex_list_ngan." งาน ";
                           $area_en_2=$ex_list_ngan." Ngan "; 

                }else if($ex_list_rai!='0' and $ex_list_ngan!='0' and $ex_list_wa=='0'){
                           $area_th_2=$ex_list_rai." ไร่ ".$ex_list_ngan." งาน ";
                           $area_en_2=$ex_list_rai." Rai ".$ex_list_ngan." Ngan "; 

                }else{
         

                } 


         
              if($lang=='th'){
                      
                       $area_2=$area_th_2;
                       $url_project_name=str_replace(" ","-",$project_name ,$count);                   
                       $url_project_name=strtolower($url_project_name); 
                       $alt_heading=$ex_list_heading;
   
              }else{

                       $area_2=$area_en_2;

                       $url_project_name_en=str_replace(" ","-",$project_name_en ,$count);                   
                       $url_project_name=strtolower($url_project_name_en); 
                       $alt_heading=$ex_list_heading_en;
                 
              }
 

    /////////// type_asset ////////////////
      $sql_ass="SELECT * FROM type_asset where id='$ex_list_listing_type' ";  
      $result_ass= $conn->query($sql_ass);
      $rs_ass=$result_ass->fetch_assoc();

      if($rs_ass['id']!=''){ $type_th=$rs_ass['name'];   $type_en=$rs_ass['name_en'];}
                                                           
    ////////// End type_asset ////////////////


              
              $price=number_format($ex_list_price); 

              if($ex_list_deal_type=='ขาย' or $ex_list_deal_type=='1'){    $sale_text_th="ขาย"; $sale_text_en="SALE";}
              else if($ex_list_deal_type=='เช่า' or $ex_list_deal_type=='2'){   $sale_text_th="เช่า";   $sale_text_en="SALE";}
              
  
                     if($listing_img_folder!=''){   

                           $img_name_list="$baseUrl/".$listing_img_folder."webp/mini_w500/".$listing_img_name; 
					   
						               $img_name_list=str_replace(" ","%20",$img_name_list);

                     }else if($listing_img_name!=''){   
                           $img_name_list=$part."images/listing/".$ex_list_listing_code."/webp/mini_w500/".$listing_img_name;  

						               $img_name_list=str_replace(" ","%20",$img_name_list);
                            
                     }else{  $img_name_list=$part."images/noimages.jpg" ;  $test1 = "000"; 

                     }  
 
   

              if($project_id!='' and $project_id!='0'){

                         $search_p_id=$rs_pro['search_p_id'];

              	      
                     // TEXT ปักหมุด GOOGLE MAP https://connex.in.th/search/th/2/all/p00002/all/all/all/28-%E0%B8%8A%E0%B8%B4%E0%B8%94%E0%B8%A5%E0%B8%A1/1

      		    	          $project_name_text="Project : ".$project_name_en." &nbsp;&nbsp;&nbsp;"; 
                          $url_project=str_replace(" ","-",$project_name_en ,$count);  
      		                $project_name_text="<a href='$baseUrl/search/en/$ex_list_deal_type/all/$search_p_id/all/all/all/$url_project/1' target='_blank' >$project_name_text</a>"; 


              }else{
  
              	     $ex_list_subdistrict=$rs['ex_list_subdistrict'];
                     $ex_list_district=$rs['ex_list_district'];
                     $ex_list_province=$rs['ex_list_province'];

                     // TEXT ปักหมุด GOOGLE MAP

      		    	     	    $project_name_text=" ".$ex_list_listing_name."   &nbsp;&nbsp;&nbsp;";  
                          $url_project=str_replace(" ","-",$project_name_en ,$count);  
                          $project_name_text="<a href='$baseUrl/search/en/all/all/$project_s/all/all/all/$url_project/1' target='_blank' >$project_name_text</a>"; 
 
              }

 

                 if($ex_list_listing_type=='1'  or $ex_list_listing_type=='7' or $ex_list_listing_type=='13'){ 
                          $area_land_title='';
                          $sqm_title_s=$sqm_title; 
                          $list_sqm=$ex_list_sqm;
                 }else{ 
                          $area_land_title=$area_land_title;
                          $sqm_title_s=$sqw_title;
                          $list_sqm=$ex_list_wa;
                 }
   
      if($project_latitude!=''){

	        if($num==1){
	               $zone_project='["'.$project_name_text.'",'.$project_latitude.','.$project_longitude.']';

	               $latitude_s=$project_latitude;
	               $longitude_s=$project_longitude;

	        }else{
	               $zone_project=$zone_project.',["'.$project_name_text.'",'.$project_latitude.','.$project_longitude.']';
	        }
			 
      }



     ///////////////// จังหวัด ////////////////
                $sql_p="SELECT * FROM provinces WHERE id='$ex_list_province' LIMIT 1 "; 
                $result_p=$conn->query($sql_p);
                $rs_p=$result_p->fetch_assoc();

                $project_province=$rs_p['provinces_in_thai'];
                $project_province_en=$rs_p['provinces_in_english'];
                $province_id=$rs_p['id'];

      ///////////////// อำเภอ ////////////////
                $sql_d="SELECT * FROM districts WHERE id='$ex_list_district'  LIMIT 1 "; 
                $result_d=$conn->query($sql_d);
                $rs_d=$result_d->fetch_assoc();

                $project_district=$rs_d['districts_in_thai'];
                $project_district_en=$rs_d['districts_in_english'];


      //////////////// ตำบล ////////////////
                $sql_s="SELECT * FROM subdistricts WHERE id='$ex_list_subdistrict'  LIMIT 1 "; 
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
                 
 
                 $heading=$ex_list_heading;
                
                 $code=$ex_list_listing_code;
                
                if($project_id!='' and $project_id!='0'){ 


                    $project=$project_name;

                }else{

                    $project=$ex_list_listing_name;  

                }


                 $deal=$sale_text_th;
                 $address=$address;
                 $sale_text=$sale_text_th;
				         $type=$type_th;

                 if($ex_list_bedroom==0){ $ex_list_bedroom='สตูดิโอ'; }


            }else{
                 
 

                if($project_id!='' and $project_id!='0'){ 


                    $project=$project_name_en;

                }else{
                	
                    $project=$ex_list_listing_name;

                }

                 $heading=$ex_list_heading_en;
              
                 $code=$ex_list_listing_code;
                 $deal=$sale_text_en;
                 $address=$address_en;
                 $sale_text=$sale_text_en;
				         $type=$type_en;

                 if($ex_list_bedroom==0){ $ex_list_bedroom='Studio'; }
            }
            

            if($num<=14 and $num=='2' or $num=='1' and $row_num_sum>='1' and $row_num_sum<='1'){
 ?>

          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            
            <a href="<?php echo $part;?>property/<?php echo $_SESSION['lang'];?>/<?php echo $ex_list_listing_code;?>">
              <div class="condo-card">
              <div class="cover"  > 
                 <img src="<?php echo $img_name_list;?>"  class="coverimg_2" alt="<?php echo $alt_heading;?>" title="<?php echo $alt_heading;?>" >
              </div>
              <div class="detail">
                <div class="detail_1">฿<?php echo $price;?> <span><?php echo $type;?></span> </div>
  
                <h2><span><?php echo $sale_text;?></span><div class="title_h2"><?php echo $project;?></div></h2>
  
                <div class="detail_3"><?php echo $address;?></div>
              </div>
              <div class="option">

          <!-- ที่ดิน -->
       <?php if($ex_list_listing_type=='12'){ ?> 

              <?php if($ex_list_listing_type!='' and $ex_list_listing_type!='1'){ ?>
                    
                          <table style="width: 200px;">
                            <tr>
                               <td><img style="width: 40px; height:40px;" src="<?php echo $part;?>images/55.webp" alt="<?php echo $area_land_title;?>" title="<?php echo $area_land_title;?>" ></td>
                               <td><div  style="margin-top: 10px;">  <span><?php echo $area_2;?></span> </div></td>
                            </tr>
                          </table> 
                       
                <?php } ?>

       <?php }else{  ?><!-- END ที่ดิน -->


                <table>
                  <tr> 
                     <td>
                          <img src="<?php echo $part;?>images/22.webp" alt="<?php echo $bedroom_title;?>" title="<?php echo $bedroom_title;?>">
                          <p><?php if($ex_list_bedroom_check==0){ ?><span><?php  echo $ex_list_bedroom; ?> </span> 
                            <?php }else{ echo $bedroom_title;?> <span><?php echo $ex_list_bedroom;?> </span> <?php } ?></p>
                     </td>                      
                     <td>
                          <img src="<?php echo $part;?>images/11.webp" alt="<?php echo $bathroom_title;?>"  title="<?php echo $bathroom_title;?>">
                          <p><?php echo $bathroom_title;?> <span><?php echo $ex_list_bathroom;?> </span></p>
                     </td>

                <?php if($ex_list_listing_type==1){?>
                     <td>
                          <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_title;?>"  title="<?php echo $floors_title;?>">
                          <p><?php echo $floors_title;?> <span><?php echo $ex_list_floor;?></span></p>
                     </td>
                <?php }else{ ?>
                     <td>
                          <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_total_title;?>"  title="<?php echo $floors_total_title;?>">
                          <p><?php echo $floors_total_title;?> <span><?php echo $ex_list_total_floors;?></span></p>
                     </td>
                <?php } ?> 

                     <td>
                          <img src="<?php echo $part;?>images/88.webp" alt="<?php echo $area_land_title;?>"  title="<?php echo $area_land_title;?>">
                          <p><?php echo $area_land_title;?> <span><?php echo $list_sqm;?></span> <?php echo $sqm_title_s;?></p>
                     </td>
                  </tr>
                </table>

      <?php }   ?><!-- END ไม่ใช่ที่ดิน -->

                       
              </div>
            </div>
            </a>
          </div>   

					<div class="col-xl-6 col-map">
						<div class="div-map"> 
							<div class="map-arr"></div>
                             <div id="map"></div>
						</div>
					</div>


 <?php 

            }else if($num<=10 and $num!='2'){ 

 
?>

					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
						
						<a href="<?php echo $part;?>property/<?php echo $_SESSION['lang'];?>/<?php echo $ex_list_listing_code;?>">
							<div class="condo-card">
  							<div class="cover" > 
                   <img src="<?php echo $img_name_list;?>"  class="coverimg_2" alt="<?php echo $alt_heading;?>" title="<?php echo $alt_heading;?>" >
  							</div>
							<div class="detail">
								<div class="detail_1">฿<?php echo $price;?> <span><?php echo $type;?></span> </div>
	
								<h2><span><?php echo $sale_text;?></span><div class="title_h2"><?php echo $project;?></div></h2>
	
								<div class="detail_3"><?php echo $address;?></div>
							</div>
							<div class="option">


          <!-- ที่ดิน -->
       <?php if($ex_list_listing_type=='12'){ ?> 

              <?php if($ex_list_listing_type!='' and $ex_list_listing_type!='1'){ ?>
                          <table style="width: 200px;">
                            <tr>
                               <td><img style="width: 40px; height: 40px;" src="<?php echo $part;?>images/55.webp" alt="<?php echo $area_land_title;?>" title="<?php echo $area_land_title;?>"></td>
                               <td><div  style="margin-top: 10px;">  <span><?php echo $area_2;?></span> </div></td>
                            </tr>
                          </table> 
                <?php } ?>

       <?php }else{  ?><!-- END ที่ดิน -->

                <table>
                  <tr> 
                     <td>

                          <img src="<?php echo $part;?>images/22.webp" alt="<?php echo $bedroom_title;?>" title="<?php echo $bedroom_title;?>">
                          <p><?php if($ex_list_bedroom_check==0){ ?><span><?php  echo $ex_list_bedroom; ?> </span> 
                            <?php }else{ echo $bedroom_title;?> <span><?php echo $ex_list_bedroom;?> </span> <?php } ?></p>
                     </td>
                     <td>
                          <img src="<?php echo $part;?>images/11.webp" alt="<?php echo $bathroom_title;?>" title="<?php echo $bathroom_title;?>">
                          <p><?php echo $bathroom_title;?> <span><?php echo $ex_list_bathroom;?> </span></p>
                     </td>

                <?php if($ex_list_listing_type==1){?>
                     <td>
                          <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_title;?>" title="<?php echo $floors_title;?>" >
                          <p><?php echo $floors_title;?> <span><?php echo $ex_list_floor;?></span></p>
                     </td>
                <?php }else{ ?>
                     <td>
                          <img src="<?php echo $part;?>images/77.webp" alt="<?php echo $floors_total_title;?>"  title="<?php echo $floors_total_title;?>">
                          <p><?php echo $floors_total_title;?> <span><?php echo $ex_list_total_floors;?></span></p>
                     </td>
                <?php } ?> 
                   
                     <td>
                          <img src="<?php echo $part;?>images/88.webp" alt="<?php echo $area_size_title;?>" title="<?php echo $area_size_title;?>">
                          <p><?php echo $area_land_title;?> <span><?php echo $list_sqm;?></span> <?php echo $sqm_title;?></p>
                     </td>
                  </tr>
                </table>

      <?php }   ?><!-- END ไม่ใช่ที่ดิน -->
											 
							</div>
						</div>
						</a>
					</div>   
   <?php    } 
       
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
			  zoom: 12,
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
  



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI0mXvBUiE73pO0F22BJ2N6asExHtxWSc&callback=initMap" async defer></script>

 	


					<div class="col-12 text-center mt-5 numx">
						<ul class="number-page">

<?php if($device=="m"){ 
                 
            $num_page_1=14;    
            $num_page_2=5; 

      }else if($device=="pc"){

            $num_page_1=14;    
            $num_page_2=10; 

      }
?>			

			
			<?php if($page_no >1){  $last_page=$page_no-1;
				    echo "<li ><a href='$myurl$last_page' ><i class='far fa-angle-left';></i></a></li>";
			       } ?>
       
 	<?php 
    if ($total_no_of_pages <= $num_page_1){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a  >$counter</a></li>";  
                }else{
           echo "<li ><a href='$myurl$counter'   >$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > $num_page_2){
        
    if($page_no <= $num_page_2) {         
     for ($counter = 1; $counter < $num_page_2; $counter++){       
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

     elseif($page_no > $num_page_2 && $page_no < $total_no_of_pages - $num_page_2) {   
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

        for ($counter = $total_no_of_pages - $num_page_2; $counter <= $total_no_of_pages; $counter++) {
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
						<p><?php echo $page_no." of ".$total_no_of_pages; ?>	</p>
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


   <?php include("./include/footer.php"); 

 

   ?>


        <!-- Preload-->
        <link rel="preload" href="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" as="script">
        <link rel="preload" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" as="script">
        <link rel="preload" href="https://code.jquery.com/ui/1.12.1/jquery-ui.js" as="script">
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js" as="script">
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js" as="script">

        <link rel="preload" href="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js" as="script">
        <link rel="preload" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" as="script">
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" as="script">
        <!-- END Preload-->
 

  <!--
  	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>



       <!--  นำเข้า JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<?php if($device=="m"){ ?>


     <script type="text/javascript">
    
        $(document).ready(function() {
      /*กำหนดให้ class js-data-example-ajax  เรียกใช้งาน Function Select 2*/
      $(".js-data-example-ajax").select2({
        ajax: {
        url: "../../../../../../../../../../../../../../../include/json_data_m.php",/* Url ที่ต้องการส่งค่าไปประมวลผลการค้นข้อมูล*/
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


<?php }else{ ?>

     <script type="text/javascript">
    
        $(document).ready(function() {
      /*กำหนดให้ class js-data-example-ajax  เรียกใช้งาน Function Select 2*/
      $(".js-data-example-ajax").select2({
        ajax: {
        url: "../../../../../../../../../../../../../../../include/json_data.php",/* Url ที่ต้องการส่งค่าไปประมวลผลการค้นข้อมูล*/
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


 <?php } ?>

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
    <?php
  
  mysqli_close($conn);
  $conn->free_result();  ?>
</body>
</html>