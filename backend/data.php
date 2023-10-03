




    <?php 

$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){

   //MOBILE






          if($page=='upload_file_excel'){  

                   include('page/upload_file_excel.php');

          }else if($page=='upload_file_proppit'){
 
                   include('page/upload_file_proppit.php'); 

          }else if($page=='upload_file_propertyhub'){
 
                   include('page/upload_file_propertyhub.php'); 

          }else if($page=='upload_file_project'){

                   include('page/upload_file_project.php');         

          }else if($page=='upload_file_excel_check'){

                   include('page/upload_file_excel_check.php');

          }else if($page=='upload_file_excel_img'){

                   include('page/upload_file_excel_img.php');

          }else if($page=='upload_list_public'){

                   include('page/upload_list_public.php');

          }else if($page=='upload_mini_images'){

                   include('page/upload_mini_images.php');

          }else if($page=='upload_position'){

                   include('page/upload_position.php');

          }else if($page=='feed_file'){

                   include('page/feed_file.php');
 

          }else if($page=='create_file_pixel_fb_xml'){

                   include('page/create_file_pixel_fb_xml.php');

          }else if($page=='log_listing'){

                   include('page/log_listing.php');

          }else if($page=='log_listing_view'){

                   include('page/log_listing_view.php');

          }else if($page=='log_project'){

                   include('page/log_project.php');

          }else if($page=='log_project_view'){

                   include('page/log_project_view.php');

          }else if($page=='upload_file_excel_check_view'){

                   include('page/upload_file_excel_check_view.php');

          }else if($page=='create_listing'){

                   include('page/create_listing.php');

          }else if($page=='project'){

                   include('page/project.php');

          }else if($page=='create_project'){

                   include('page/create_project.php');

          }else if($page=='create_register'){

                   include('page/create_register.php');  //c reate_register
                   
          }else if($page=='change_password'){

                   include('page/change_password.php');  //c reate_register

          }else if($page=='register'){

                   include('page/register.php');

          // subdistricts

          }else if($page=='type_subdistricts'){

                   include('page/type_subdistricts.php');

          }else if($page=='create_type_subdistricts'){

                   include('page/create_type_subdistricts.php');

          // listing_del ลบ listing ถาวร

          }else if($page=='listing_del'){

                   include('page/listing_del.php');  

          // type_strengths

          }else if($page=='type_strengths'){

                   include('page/type_strengths.php');

          }else if($page=='create_type_strengths'){

                   include('page/create_type_strengths.php');

          // type_zone

          }else if($page=='type_zone'){

                   include('page/type_zone.php');

          // type_strengths

          }else if($page=='type_furniture'){

                   include('page/type_furniture.php');

          }else if($page=='create_type_furniture'){

                   include('page/create_type_furniture.php');               

          }else if($page=='facilities'){

                   include('page/facilities.php');

          }else if($page=='create_facilities'){

                   include('page/create_facilities.php');

          }else if($page=='buyer_contact'){

                   include('page/buyer_contact.php');

          }else if($page=='create_buyer_contact'){

                   include('page/create_buyer_contact.php');

          }else if($page=='deal_buyer'){

                   include('page/deal_buyer.php');
            
          }else if($page=='create_deal_buyer'){

                   include('page/create_deal_buyer.php');

          }else if($page=='request_deal'){

                   include('page/request_deal.php');

          }else if($page=='create_subdeal'){

                   include('page/create_subdeal.php');        

          }else if($page=='update_log'){

                   include('page/update_log.php');

          }else if($page=='report_sale'){

                   include('page/report_sale.php');

          }else if($page=='report_stock'){

                   include('page/report_stock.php');

          }else if($page=='download_file_excel'){

                   include('page/download_file_excel.php');

    //////////  portfolio_listing     //////////
          }else if($page=='portfolio_listing'){

                   include('page/portfolio_listing.php');

    //////////  web_seo //////////
                 
          }else if($page=='web_seo'){

                   include('page/web_seo.php'); 
 
          }else if($page=='web_zone'){

                   include('page/web_zone.php'); 

          }else if($page=='create_web_zone'){

                   include('page/create_web_zone.php');        

          }else if($page=='web_content'){

                   include('page/web_content.php');    

          }else if($page=='create_web_content'){

                   include('page/create_web_content.php');    

          }else{

                   include('page/dashboard.php');


          }
 


   }else{  //PC


          if($page=='upload_file_excel'){  

                   include('page/upload_file_excel.php');
                   
          }else if($page=='upload_file_proppit'){

                   include('page/upload_file_proppit.php');  

          }else if($page=='upload_file_propertyhub'){
 
                   include('page/upload_file_propertyhub.php'); 

          }else if($page=='upload_file_project'){

                   include('page/upload_file_project.php'); 
                         	
          }else if($page=='log_listing'){

                   include('page/log_listing.php');
                   
          }else if($page=='log_listing_view'){

                   include('page/log_listing_view.php');

          }else if($page=='log_project'){

                   include('page/log_project.php');

          }else if($page=='log_project_view'){

                   include('page/log_project_view.php');
                          
          }else if($page=='upload_file_excel_check'){

                   include('page/upload_file_excel_check.php');

          }else if($page=='upload_file_excel_img'){

                   include('page/upload_file_excel_img.php');

          }else if($page=='upload_list_public'){

                   include('page/upload_list_public.php');

          }else if($page=='upload_mini_images'){

                   include('page/upload_mini_images.php');

          }else if($page=='upload_position'){

                   include('page/upload_position.php');

          }else if($page=='feed_file'){

                   include('page/feed_file.php');
                   
          }else if($page=='create_file_pixel_fb_xml'){

                   include('page/create_file_pixel_fb_xml.php');

          }else if($page=='upload_file_excel_check_view'){

                   include('page/upload_file_excel_check_view.php');

          }else if($page=='create_listing'){

                   include('page/create_listing.php');

          }else if($page=='project'){

                   include('page/project.php');

          }else if($page=='create_project'){

                   include('page/create_project.php');

          }else if($page=='create_register'){

                   include('page/create_register.php');  //c reate_register
                   
          }else if($page=='change_password'){

                   include('page/change_password.php');  //c reate_register

          }else if($page=='register'){

                   include('page/register.php');

          // subdistricts

          }else if($page=='type_subdistricts'){

                   include('page/type_subdistricts.php');

          }else if($page=='create_type_subdistricts'){

                   include('page/create_type_subdistricts.php');

          // listing_del ลบ listing ถาวร

          }else if($page=='listing_del'){

                   include('page/listing_del.php');  

          // type_strengths

          }else if($page=='type_strengths'){

                   include('page/type_strengths.php');

          }else if($page=='create_type_strengths'){

                   include('page/create_type_strengths.php');

          // type_zone

          }else if($page=='type_zone'){

                   include('page/type_zone.php');

          // type_bts

          }else if($page=='type_bts'){

                   include('page/type_bts.php');

          // type_strengths


          }else if($page=='report_availabletorented'){

                   include('page/report_availabletorented.php');


          }else if($page=='type_furniture'){

                   include('page/type_furniture.php');

          }else if($page=='create_type_furniture'){

                   include('page/create_type_furniture.php');               

          }else if($page=='facilities'){

                   include('page/facilities.php');

          }else if($page=='create_facilities'){

                   include('page/create_facilities.php');

          }else if($page=='buyer_contact'){

                   include('page/buyer_contact.php');

          }else if($page=='create_buyer_contact'){

                   include('page/create_buyer_contact.php');

          }else if($page=='deal_buyer'){

                   include('page/deal_buyer.php');
            
          }else if($page=='request_deal'){

                   include('page/request_deal.php');
            
          }else if($page=='create_deal_buyer'){

                   include('page/create_deal_buyer.php');

          }else if($page=='create_subdeal'){

                   include('page/create_subdeal.php');   

          }else if($page=='update_log'){

                   include('page/update_log.php');

          }else if($page=='report_sale'){

                   include('page/report_sale.php');

          }else if($page=='update_count'){

                   include('page/update_count.php');

          }else if($page=='report_stock'){

                   include('page/report_stock.php');

          }else if($page=='download_file_excel'){

                   include('page/download_file_excel.php');

    //////////  portfolio_listing     //////////
          }else if($page=='portfolio_listing'){

                   include('page/portfolio_listing.php');

    //////////  web_seo //////////
                 
          }else if($page=='web_seo'){

                   include('page/web_seo.php'); 
 
          }else if($page=='web_zone'){

                   include('page/web_zone.php'); 

          }else if($page=='create_web_zone'){

                   include('page/create_web_zone.php');        

          }else if($page=='web_content'){

                   include('page/web_content.php');    

          }else if($page=='create_web_content'){

                   include('page/create_web_content.php');    

          }else{

                   include('page/dashboard.php');


          }
 
    }


    ?>
 