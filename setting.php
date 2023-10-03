<?php


   isset( $_GET['id'] ) ? $id = $_GET['id'] : $id = "";
   isset( $_GET['lang'] ) ? $lang = $_GET['lang'] : $lang = "";
   isset( $_GET['page_no'] ) ? $page_no = $_GET['page_no'] : $page_no = "";
   isset( $_GET['page'] ) ? $page = $_GET['page'] : $page = "";

   if($_GET['lang']!=''){    $_SESSION['lang']=$_GET['lang'];  }else{    $_SESSION['lang']='th';  }
 
   if($_SESSION['deal']!=''){    }else{   $_SESSION['deal']='1';  } 

   if($explode_http_ref[1]!='search' and $explode_http_ref[1]!=''    ){
         $_SESSION['price_min_c']='';
         $_SESSION['price_max_c']='';
         $_SESSION['size_min_c']='';
         $_SESSION['size_max_c']='';
   }
 
/*   
   $id=$_GET['id'];
   $lang=$_GET['lang'];
   $page_no=$_GET['page_no'];
   $page=$_GET['page']; */

   $part="../../../";


// แสดงผลบนมือถือ 
$useragent=$_SERVER['HTTP_USER_AGENT'];


/*
if(preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){ */
 
  if(preg_match('/android|blackberry|ipad|iphone|ipod/i', $useragent)){



         $device="m";


  }else{

         $device="pc";

   }

   
  if($lang=='en'){

      $home_heading_h1="Find your place";
      if($device=='pc'){
      $home_heading_h2="Reliable services, hassle-free experience for your home search.";
      }else{
      $home_heading_h2="Reliable services, hassle-free experience <br> for your home search.";
      }

      $project_title="Project";
      $project_s1_title="Project / BTS MRT / Location";
      $project_s_title="Search Project / Location / BTS MRT";
      $developer_title="Developer";
      $unit_title="Number of Unit";
      $date_list_title="Date Listed";
      $completed_title="Completed";
      $location_title="Location";
      $address_title="Address";
      $listing_title="Listing ID";
      $area_size_title="Usable area";
      $area_land_title="Land";
      $direction_title="Direction";
      $furniture_title="Furniture";
      $bed_title="Bedroom";
      $bath_title="Bathroom";
      $parking_title="Parking";
      $floors_title="Floors";
      $floors_total_title="Floors";
      $zone_title="Zone";
      $train_station_title="Train Station";
      $map_title="Map";
      $score_title="Score Listing";
      $price_score_title="Price";
      $property_type_title="Property Type";
      $sqm_title="sqm.";
      $sqw_title="sq.wa";
      $bedroom_title="Bed";
      $bathroom_title="Bath";
      $all_title="All";
      $buy_title="Buy";    
      $buy_title2="Buy";    
      $rent_title="Rent";  
      $sale_title="Sale";  
      $sell_title="Sell";
      $sell_title2="Sell";
      $new_title="News"; 
      $new_des="";
      $details_title="Details";   
      $unit_interested_title="Enquire Now";   
      $more_title="View All";
      $na_title="N/A";
      $search_title="Search";
      $search_title_settings="Apply Filters";
      $copy_link_title="Copy URL";
      $about_title="About";
      $information_title="Basic Information";
      $minimum_title="Minimum"; 
      $maximum_title="Maximum";

      $unit_project_a_title="Units in";  
      $unit_project_b_title="Units in Nearby Projects"; 
      $near_project_title="Near by Projects"; 
      $street_view_title="Street View";  
      $location_map_title="Map";   
      $photo_title="Photos";
      $share_title="share";   
      $review_title="Review";   
      $share_link_title="Share Link";
      
      $topic_title="Topic";  
      $contact_us_title="Contact Us";  
      $or_title="or";
      $name_contact_title="First Name";
      $lastname_contact_title="Last Name";
      $email_contact_title="Email";
      $tel_contact_title="Phone number";
      $message_contact_title="Please add your message."; 

      $more_information_title="Ask for more information";
      $send_message_title="Send Message";
      $project_detail_title="Project detail";

      $deal_consignment_title="Please Specify";
      $property_type_consignment_title="Please Specify";
      $sale_price_consignment_title="Please Specify Sale (Bath)";
      $rent_price_consignment_title="Please Specify Rent (Bath)"; 
      $project_consignment_title="Please Specify Project"; 
      $room_consignment_title="Please Specify Bedroom"; 
      $bathroom_consignment_title="Please Specify Bathroom"; 
      $car_park_consignment_title="Please Specify Car Parking"; 
      $reset_title="Reset";
      $googlemap_consignment_title="Example : https://goo.gl/maps/nvc1Tbi9Qif3dQ7R8"; 
      $youtube_consignment_title="Example : https://youtu.be/DElXqbd_Adk";

      $property_type_title="Property Type";
      $project_title="Project";
      $sort_s_title="Sort By";
      $sort_s_title_0="Recommended";
      $sort_s_title_1="Prices (min-max)";
      $sort_s_title_2="Prices (max-min)"; 
      $price_title="Price range (Baht) ";
      $room_title="Bedroom";
      $deal_title="Post Types";  
      $size_title="Floor Size ";

      $subdistricts_title="Subdistricts";  
      $districts_title="Districts"; 
      $provinces_title="Provinces"; 
      $_SESSION['lang']='en';

      $link_home="Home";

      $deposit_title="List your Property";
      $mr_title="Mr.";
      $mrs_title="Mrs.";
      $miss_title="Miss.";
      $line_contact_title="Line ID";
      $property_details="Property Details";
      $sale_rent_title="Sale / Rent";
      $sale_price_title="Sale Price";
      $rent_price_title="Rent Price";
      $not_specified="Not Specified";
      $please_specify_here_title="In case your project does not appear on the list, please specify here.";
      $alley_title="Soi";
      $road_title="Road";
      $area_land_c_title="Land area";
      $area_size_c_title="Usable Area (sqm) ";
      $rai_consig_title="Rai";
      $ngan_consig_title="Ngan";
      $wa_consig_title="Sq.wa";
      $bedroom_title="Bedroom";
      $bathroom_title="Bathroom";
      $unit_number_title="Unit number";
      $carpark_title="Carpark";
      $pet_friendly_title="Pet friendly";
      $additional_information_title="Additional information / Property highlights";
      $not_allowed_title="Not Allowed";
      $allow_title="Allow";
      $upload_photos_title="Upload Photos (jpg, png, .bmp, ...)";
      $please_confirm_title="Please confirm I'm not an automated program.";
      $consent_title="Consent";

      $title_url_reset="property-listing";
      $title_sitemap="Sitemap";

      $contact_placeholder_1="Name Lastname";
      $contact_placeholder_2="Create an interesting title";
      $contact_placeholder_3="Details";


  }else {
     
      $home_heading_h1="ซื้อ ขาย เช่า บ้าน คอนโด ที่ดิน";    
      $home_heading_h2="อสังหาริมทรัพย์ ทำเลดี ราคาถูก ที่คัดสรรมาเพื่อคุณ";
      $home_heading_h2_2="ทำเลดี ราคาถูก ที่คัดสรรมาเพื่อคุณ";
      $project_title="โครงการ";
      $project_s1_title="โครงการ / สถานีรถไฟฟ้า / โซน";
      $project_s_title="ค้นหา โครงการ / ทำเล / รถไฟฟ้า";
      $developer_title="เจ้าของโครงการ";
      $unit_title="ยูนิต";
      $date_list_title="วันที่อัพเดท";
      $completed_title="สร้างเสร็จเมื่อ";
      $location_title="ทำเลที่ตั้ง";
      $address_title="ที่ตั้ง";
      $listing_title="รหัสทรัพย์";
      $area_size_title="พื้นที่ใช้สอย";
      $area_land_title="พื้นที่";
      $direction_title="ทิศ";
      $furniture_title="เฟอร์นิเจอร์";
      $bed_title="ห้องนอน";
      $bath_title="ห้องน้ำ";
      $parking_title="ที่จอดรถ";
      $floors_title="ชั้นที่";
      $floors_total_title="จำนวนชั้น";
      $zone_title="โซนพื้นที่";
      $train_station_title="สถานีรถไฟฟ้า";
      $map_title="แผนที่";
      $score_title="สภาพทรัพย์";
      $price_score_title="ราคาทรัพย์";
      $property_type_title="ประเภททรัพย์";
      $sqm_title="ตร.ม.";
      $sqw_title="ตร.ว.";
      $bedroom_title="ห้องนอน";
      $bathroom_title="ห้องน้ำ";
      $all_title="ทั้งหมด";
      $buy_title="ขาย";   
      $buy_title2="ซื้อ";    
      $rent_title="เช่า";   
      $sale_title="ขาย";
      $sell_title="ฝากขาย/เช่า"; 
      $sell_title2="ขาย"; 
      $new_title="บทความ"; 
      $new_des="ความรู้ดีๆเกี่ยวกับอสังหาริมทรัพย์";
      $details_title="รายละเอียด";  
      $unit_interested_title="สนใจยูนิตนี้";  
      $more_title="ดูทั้งหมด";
      $na_title="ไม่ระบุ";
      $unit_project_a_title="ยูนิตในโครงการ";  
      $unit_project_b_title="ยูนิตในโครงการใกล้เคียงกัน"; 
      $near_project_title="โครงการใกล้เคียง"; 
      $street_view_title="สตรีท วิว"; 
      $location_map_title="ทำเลที่ตั้ง";      
      $share_title="แชร์";   
      $photo_title="รูปภาพ";
      $search_title="ค้นหาข้อมูล";
      $search_title_settings="บันทึกการตั้งค่า";
      $review_title="รีวิว";   
      $copy_link_title="คัดลอกลิ้งค์";
      $share_link_title="คุณต้องการแชร์ไปยัง";
      $about_title="เกี่ยวกับ";
      $information_title="ข้อมูลเบื้องต้น";
      $project_detail_title="ข้อมูลโครงการ";
      $reset_title="คืนค่าเริ่มต้น";
      $minimum_title="ต่ำสุด";
      $maximum_title="สูงสุด"; 

      $deal_consignment_title="โปรดระบุ";
      $property_type_consignment_title="โปรดระบุ";
      $sale_price_consignment_title="โปรดระบุราคาขาย (บาท)";
      $rent_price_consignment_title="โปรดระบุราคาเช่า (บาท)"; 
      $project_consignment_title="โปรดเลือกโครงการ"; 
      $project_consignment_title="โปรดเลือกโครงการ"; 
      $room_consignment_title="โปรดระบุจำนวนห้องนอน"; 
      $bathroom_consignment_title="โปรดระบุจำนวนห้องนอน"; 
      $car_park_consignment_title="โปรดระบุจำนวนที่จอดรถ"; 
      $googlemap_consignment_title="ตัวอย่าง : https://goo.gl/maps/nvc1Tbi9Qif3dQ7R8"; 
      $youtube_consignment_title="ตัวอย่าง : https://youtu.be/DElXqbd_Adk";

      $topic_title="ชื่อเรื่อง";  
      $contact_us_title="ติดต่อเรา";  
      $or_title="หรือ";
      $name_contact_title="ชื่อ - นามสกุล";
      $lastname_contact_title="โปรดกรอกนามสกุล";
      $email_contact_title="อีเมล";
      $tel_contact_title="เบอร์โทรศัพท์";
      $message_contact_title="ข้อความ"; 

      $more_information_title="สอบถามข้อมูลเพิ่มเติม";
      $send_message_title="ส่งข้อความ";

      $property_type_title="ประเภททรัพย์";
      $project_title="โครงการ";
      $sort_s_title="เรียงลำดับ";
      $sort_s_title_0="ล่าสุด/แนะนำ";
      $sort_s_title_1="ราคา (น้อย-มาก)";
      $sort_s_title_2="ราคา (มาก-น้อย)";
      $price_title="ช่วงราคา ";
      $room_title="ห้องนอน";
      $deal_title="ประเภทดีล";    
      $size_title="พื้นที่ใช้สอย ";    

      $subdistricts_title="ตำบล ";  
      $districts_title="อำเภอ";  
      $provinces_title="จังหวัด"; 
      $_SESSION['lang']='th';
      $link_home="หน้าหลัก";

      $deposit_title="ฝากอสังหาริมทรัพย์";
      $mr_title="นาย";
      $mrs_title="นาง";
      $miss_title="นางสาว";
      $line_contact_title="ไลน์ไอดี";
      $property_details="รายละเอียดอสังหาริมทรัพย์";
      $sale_rent_title="ขาย / ให้เช่า";
      $sale_price_title="ราคาขาย";
      $rent_price_title="ราคาเช่า";
      $not_specified="ไม่ระบุ";
      $please_specify_here_title="หากไม่มีโครงการให้เลือก สามารถกรอกได้ที่ช่องนี้";
      $alley_title="ซอย";
      $road_title="ถนน";
      $area_land_c_title="พื้นที่ดิน";
      $area_size_c_title="พื้นที่ใช้สอย (ตร.ม.)";
      $rai_consig_title="ไร่";
      $ngan_consig_title="งาน";
      $wa_consig_title="ตารางวา";
      $bedroom_title="ห้องนอน";
      $bathroom_title="ห้องน้ำ";
      $unit_number_title="เลขที่ห้อง/บ้าน"; 
      $carpark_title="ที่จอดรถ";
      $pet_friendly_title="เลี้ยงสัตว์ได้ไหม";
      $additional_information_title="รายละเอียดเพิ่มเติม / จุดเด่น";
      $not_allowed_title="ไม่อนุญาต";
      $allow_title="อนุญาต";
      $upload_photos_title="อัพโหลดรูปภาพ * (jpg, png, .bmp, ...)";
      $please_confirm_title="กรุณายืนยัน ฉันไม่ใช่โปรแกรมอัตโนมัติ";
      $consent_title="ยอมรับ";
      $title_url_reset="รวมประกาศ";
      $title_sitemap="แผนที่เว็บไซต์";
  
      $contact_placeholder_1="จอร์น โดว";
      $contact_placeholder_2="สอบถามข้อมูล";
      $contact_placeholder_3="เนื้อหา";

  } 


 
 

   

 
?>