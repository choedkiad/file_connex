 
  <style type="text/css">
                         

 .lSGallery {
    position: relative;
    bottom: 0px;
    height: 22px;
}  
                     </style>  

<?php 

$useragent=$_SERVER['HTTP_USER_AGENT'];

$status_="/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i";

if(preg_match('$status',substr($useragent,0,4))){

            $height_s="400px;";

}else{

            $height_s="650px;";

}
?>




        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title"><?php echo $ex_list_project_en;?> </h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area single-property" style="background-color: #3b4753;">&nbsp;
            <div class="container">   

                <div class="clearfix padding-top-40" >

                      


                    <div class="col-md-8 single-property-content prp-style-2" >
                        <div class="">
                            <div class="row">
                                <div class="light-slide-item" style="max-height: <?php echo $height_s;?>">            
                                    <div class="clearfix" >
                                        <!--
                                        <div class="favorite-and-print">

                                            
                                            <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                                <i class="fa fa-star-o"></i>
                                            </a>
                                            <a class="printer-icon " href="javascript:window.print()">
                                                <i class="fa fa-print"></i> 
                                            </a>

                                           
                                                <img src="../../images/icon/icon-fb.png" width="70" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                            

                                            
                                        </div>  -->

                                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden" style="background-color: #3b4753;"  >

              <?php $i=0;

                 $sql_imgs="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$ex_list_listing_code' order by listing_img_no ASC ";
                 $result_imgs= $conn->query($sql_imgs); 
                  while($rs_imgs=$result_imgs->fetch_assoc()){ $i++; 

                 $listing_img_folder=$rs_imgs['listing_img_folder'];
                 $listing_img_name=$rs_imgs['listing_img_name'];
                 $ex_list_listing_code=$rs_imgs['ex_list_listing_code'];

                 if($listing_img_folder!=''){   

                       $url_img="https://connex.in.th/images/listing/".$ex_list_listing_code." New"."/".$listing_img_name;
                       $url_check="New";
                       $img_name_w100=$listing_img_folder."mini_w100/".$listing_img_name;


                       $listing_img_name=$listing_img_folder.$listing_img_name;

                       

                        // Calling getimagesize() function 
                        list($width, $height, $type, $attr) = getimagesize($url_img);        


                       if($width<$height){ $width_h="height:100%;";   }else{ $width_h="width: 100%;" ; }

                 }else{ 

                      $url_img="https://connex.in.th/images/listing/".$ex_list_listing_code."/".$listing_img_name;   
                      $url_check="";
                      $img_name_w100="../../images/listing/".$ex_list_listing_code."/mini_w100/".$listing_img_name; 
                       $listing_img_name="../../images/listing/".$ex_list_listing_code."/".$listing_img_name; 

                       

                        list($width, $height, $type, $attr) = getimagesize($url_img);     

                       if($width<$height){ $width_h="height:100%;";    }else{ $width_h="width: 100%;" ; }
                       
                 }
                        
 
                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){

                                    $width_h="max-height:500px;";  ?>


                 <?php   }else{

                                   

                        }


                 ?>  

                                             
                                             <li style=" max-height: 500px; " data-thumb="<?php echo $img_name_w100;?>"  > 
                                                <img src="<?php echo $listing_img_name;?>" style=" <?php echo $width_h;?> " />
                                                
                                            </li> 



 
               <?php      if($i<=2){ 
 
                            // flush the buffer
                            flush();
                          
                          }
                     } ?>
  
 
    
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="dealer-widget" style="background-color: #3b4753;margin-top: -20px;margin-bottom: -20px;">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">
                                        <div class="single-property-header"> <br>
                                            <center>
                                            <span class="property-price"><?php echo $ex_list_deal_type;?> <?php echo number_format($ex_list_price);?></span> <br>
                                            <span class="property-price">

                                              <?php if($ex_list_listing_score=='1'){?>

                                                         <img src="../../images/icon/star1.png" width="25">

                                              <?php }else if($ex_list_listing_score=='2'){ ?>
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">

                                              <?php }else if($ex_list_listing_score=='3'){ ?>
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">

                                              <?php }else if($ex_list_listing_score=='4'){ ?>
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                              
                                              <?php }else if($ex_list_listing_score=='5'){ ?>
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                              <?php }else{  ?>

                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">
                                                         <img src="../../images/icon/star1.png" width="25">

                                              <?php } ?>

                                            </span></center>
                                        </div>

                                        <div class="property-meta entry-meta clearfix ">   
                                         <!--
                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-tag">                                                                                      
                                                    <img src="../../assets/img/icon/sale-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">Status</span>
                                                    <span class="property-info-value">For Sale</span>
                                                </span>
                                            </div>
                                          -->
                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info icon-area" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;">
                                                    <img src="../../assets/img/icon/room-orange.png" >
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">Area</span>
                                                    <span class="property-info-value"><?php echo $ex_list_sqm;?> </b></span>
                                                </span>
                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-bed">
                                                    <img src="../../assets/img/icon/bed-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">Bedrooms</span>
                                                    <span class="property-info-value"><?php echo $ex_list_bedroom;?></span>
                                                </span>
                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-bed">
                                                    <img src="../../assets/img/icon/shawer-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">Bathrooms</span>
                                                    <span class="property-info-value"><?php echo $ex_list_bathroom;?></span>
                                                </span>
                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-bath">
                                                    <img src="../../assets/img/icon/cars-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">Parking</span>
                                                    <span class="property-info-value"><?php echo $ex_list_parking;?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                        </div>

                            <div class="single-property-wrapper">

                                <div class="section additional-details">

                                    <h4 class="s-property-title">Basic Information</h4>

                                    <ul class="additional-details-list clearfix">
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;" ><?php echo $project_title;?> </span>
                                            <span class="col-xs-8 col-sm-10 col-md-10 add-d-entry"><?php echo $ex_list_project;?></span>
                                        </li>

                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $address_title;?></span>
                                            <span class="col-xs-8 col-sm-10 col-md-10 add-d-entry"><?php echo $address;?></span>
                                        </li>
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $listing_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_listing_code;?></span>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $ex_list_deal_type;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo number_format($ex_list_price);?></span>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $area_size_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_sqm;?> </span>
                                        </li>

                 
                 <?php if($type_asset_s=='1'){    ?>  

                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $bed_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_bedroom;?></span>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $bath_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_bathroom;?></span>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $parking_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_parking;?></span>
                                        </li>
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $floors_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_total_floors;?></span>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $direction_title;?></span>
                                            <span class="col-xs-8 col-sm-6 col-md-6 add-d-entry"><?php echo $ex_list_direction;?></span>
                                        </li>  
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;font-size: 19px;"><?php echo $train_station_title;?></span>
                                            <span class="col-xs-8 col-sm-10 col-md-10 add-d-entry"><?php echo $ex_list_train_station;?></span>
                                        </li>  
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $zone_title;?></span>
                                            <span class="col-xs-8 col-sm-10 col-md-10 add-d-entry"><?php echo $project_zone;?></span>
                                        </li>                          
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $map_title;?></span>
                                            <span class="col-xs-8 col-sm-10 col-md-10 add-d-entry"><a target="_black" href="<?php echo $ex_list_googlmap;?>" ><?php echo $ex_list_googlmap;?></a></span>
                                        </li> 
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $score_title;?></span>
                                            <span class="col-xs-8 col-sm-6 col-md-6 add-d-entry"> 
                                           <?php if($ex_list_listing_score=='1'){?>

                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_listing_score=='2'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_listing_score=='3'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_listing_score=='4'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                              
                                              <?php }else if($ex_list_listing_score=='5'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                              <?php }else{  ?>

                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php } ?>
                                            </span>
                                         
                                        </li> 
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $price_score_title;?></span>
                                            <span class="col-xs-8 col-sm-6 col-md-6 add-d-entry"  > 
                                           <?php if($ex_list_price_score=='1'){?>

                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_price_score=='2'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_price_score=='3'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_price_score=='4'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                              
                                              <?php }else if($ex_list_price_score=='5'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                              <?php }else{  ?>

                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php } ?>
                                            </span>
                                        </li>



                 <?php }else{  ?> 
                  
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $area_land_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_rai;?></span> 
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $direction_title;?></span>
                                            <span class="col-xs-8 col-sm-6 col-md-6 add-d-entry"><?php echo $ex_list_direction;?></span> 
                                        </li>
                                        <li> 
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $bed_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_bedroom;?></span>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $bath_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_bathroom;?></span>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $parking_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_parking;?></span>
                                        </li>
   
                                        <li> 
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $floors_title;?></span>
                                            <span class="col-xs-8 col-sm-2 col-md-2 add-d-entry"><?php echo $ex_list_total_floors;?></span>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $train_station_title;?></span>
                                            <span class="col-xs-8 col-sm-6 col-md-6 add-d-entry"><?php echo $ex_list_train_station;?></span>
                                        </li>  
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $zone_title;?></span>
                                            <span class="col-xs-8 col-sm-10 col-md-10 add-d-entry"><?php echo $project_zone;?></span>
                                        </li>                          
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $map_title;?></span>
                                            <span class="col-xs-8 col-sm-10 col-md-10 add-d-entry"><a target="_black" href="<?php echo $ex_list_googlmap;?>" ><?php echo $ex_list_googlmap;?></a></span>
                                        </li> 
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $score_title;?></span>
                                            <span class="col-xs-8 col-sm-6 col-md-6 add-d-entry"> 
                                           <?php if($ex_list_listing_score=='1'){?>

                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_listing_score=='2'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_listing_score=='3'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_listing_score=='4'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                              
                                              <?php }else if($ex_list_listing_score=='5'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                              <?php }else{  ?>

                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php } ?>
                                            </span>
                                         
                                        </li> 
                                        <li>
                                            <span class="col-xs-4 col-sm-2 col-md-2 add-d-title" style="background-color: #3b4753;"><?php echo $price_score_title;?></span>
                                            <span class="col-xs-8 col-sm-6 col-md-6 add-d-entry"  > 
                                           <?php if($ex_list_price_score=='1'){?>

                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_price_score=='2'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_price_score=='3'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php }else if($ex_list_price_score=='4'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                              
                                              <?php }else if($ex_list_price_score=='5'){ ?>
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                              <?php }else{  ?>

                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">
                                                         <img src="../../images/icon/star1.png" width="20">

                                              <?php } ?>
                                            </span>
                                        </li>

                                          
                  <?php } ?> 
                                    </ul>
                                </div>  
                                <!-- End additional-details area  -->

                            <div id="ex_list_facilities"  hidden="hide">

                                <div class="section" >
                                    <h4 class="s-property-title" >Features</h4>
                                    <div class="s-property-content">
                                        <p style="font-size: 20px;"> <?php echo nl2br($ex_list_facilities);?>       </p>
                                    </div>
                                </div>
                                <!-- End description area  -->

                                <div class="section" >
                                    <h4 class="s-property-title" >สถานที่ใกล้เคียง</h4>
                                    <div class="s-property-content">
                                        <p style="font-size: 20px;"> <?php echo nl2br($ex_list_nearby_places);?>      </p>
                                    </div>
                                </div>


                                <div class="section" >
                                    <h4 class="s-property-title" >รายละเอียดเพิ่มเติม</h4>
                                    <div class="s-property-content">
                                        <p style="font-size: 20px;"> <?php echo nl2br($ex_list_details);?>      </p>
                                    </div>
                                </div>
  
                                <input type="button" value="ปิดข้อมูลเพิ่มเติม" id="b_2" onclick="showMessage2()">
                            </div>
                                <input type="button" value="แสดงข้อมูลเพิ่มเติม" id="b_1" onclick="showMessage()">
<script>
    function showMessage() {
         $("#ex_list_facilities").show();
         $("#b_1").hide();
    }
    function showMessage2() {
         $("#ex_list_facilities").hide();
         $("#b_1").show();
    }

</script>
                      <?php if($project_map!=''){ 
 
                           
                            $project_map = str_replace("600","100%",$project_map,$count);
                            $project_map = str_replace("450","250",$project_map,$count);
                        ?> 
                            <div id="ex_list_facilities"   >
                             
                                <div class="section" >
                                    <h4 class="s-property-title" >Map</h4>
                                 
                                        <div class="row">
                                            <div class="col-xs-12">
                                                 <p> <?php echo $project_map; ?></p>
                                            </div>
                                        </div>                          
                                </div>
                            </div>
                      <?php } ?>
<!--
                                <div class="section property-features">      

                                    <h4 class="s-property-title">Features</h4>                            
                                    <ul>
                                        <li><a href="properties.html">Swimming Pool</a></li>   
                                        <li><a href="properties.html">3 Stories</a></li>
                                        <li><a href="properties.html">Central Cooling</a></li>
                                        <li><a href="properties.html">Jog Path 2</a></li>
                                        <li><a href="properties.html">2 Lawn</a></li>
                                        <li><a href="properties.html">Bike Path</a></li>
                                    </ul>

                                </div>  -->
                                <!-- End features area  -->
<!--
                                <div class="section property-video"> 
                                    <h4 class="s-property-title">Property Video</h4> 
                                    <div class="video-thumb">
                                        <a class="video-popup" href="yout" title="Virtual Tour">
                                            <img src="assets/img/property-video.jpg" class="img-responsive wp-post-image" alt="Exterior">            
                                        </a>
                                    </div>
                                </div>  -->
                                <!-- End video area  -->
<!--
                                <div class="section property-share"> 
                                    <h4 class="s-property-title">Share width your friends </h4> 
                                    <div class="roperty-social">
                                        <ul> 
                                            <li><a title="Share this on dribbble " href="#"><img src="assets/img/social_big/dribbble_grey.png"></a></li>                                         
                                            <li><a title="Share this on facebok " href="#"><img src="assets/img/social_big/facebook_grey.png"></a></li> 
                                            <li><a title="Share this on delicious " href="#"><img src="assets/img/social_big/delicious_grey.png"></a></li> 
                                            <li><a title="Share this on tumblr " href="#"><img src="assets/img/social_big/tumblr_grey.png"></a></li> 
                                            <li><a title="Share this on digg " href="#"><img src="assets/img/social_big/digg_grey.png"></a></li> 
                                            <li><a title="Share this on twitter " href="#"><img src="assets/img/social_big/twitter_grey.png"></a></li> 
                                            <li><a title="Share this on linkedin " href="#"><img src="assets/img/social_big/linkedin_grey.png"></a></li>                                        
                                        </ul>
                                    </div>
                                </div> -->
                                <!-- End video area  -->
                            </div>
                        </div>

                    </div>




                    <div class="col-md-4 p0" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;">
                        <aside class="sidebar sidebar-property blog-asside-right property-style2">
                            <div class="dealer-widget" style="background-color: #3b4753;">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">
                                        
                                        <div class="dealer-section-space">
                                            <span style="font-size: 24px;">Real Estate Agent</span>
                                        </div>
                                        <div class="clear"  >
                                            <div class="col-xs-4 col-sm-4 dealer-face">
                                                <a href=""> 
                                                    <img src="<?php echo $register_img_url;?>"   class="img-circle">
                                                </a>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 ">
                                                <h3 class="dealer-name" style="text-align: left;">
                                                     <?php echo $register_name;?> <br>
                                                    <i class="pe-7s-call strong"> </i> <a href="tel:<?php echo $register_line;?>"><?php echo $register_tel;?></a><br>
                                                    <b>Line : </b><a href="https://line.me/ti/p/~<?php echo $register_line;?>"><?php echo  $register_line;?></a>   
                                                </h3>
                                                <div class="dealer-social-media">
                                                    <a class="twitter" target="_blank" href="">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                    <a class="facebook" target="_blank" href="">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                    <a class="gplus" target="_blank" href="">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                    <a class="linkedin" target="_blank" href="">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a> 
                                                    <a class="instagram" target="_blank" href="">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>       
                                                </div>

                                            </div>
                                        </div>

                                        <div class="clear">
                                             
                                            <p style="font-size: 20px;">**บริการปรึกษาสินเชื่อฟรี! ดอกเบี้ยพิเศษ และ วงเงินกู้สูงสุด 90-100% ของราคาประเมิน**</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                    <!--
                            <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ads her  </h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                    <img src="assets/img/ads.jpg">
                                </div>
                            </div>
                        -->




                            <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">Request Details</h3>
                                </div>
                                <div class="panel-body search-widget">
                                    <form action="" class=" form-inline"> 
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                        </fieldset>
                                         <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" placeholder="Tel">
                                                </div>
                                            </div>
                                        </fieldset>
                                         <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" placeholder="E-Mail">
                                                </div>
                                            </div>
                                        </fieldset>
                             
                           

                                         <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                     <textarea class="form-control" rows="5" style="height: 200px;" placeholder="Message" id="project_nearby_places" name="project_nearby_places"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>



                                        <fieldset >
                                            <div class="row">
                                                <div class="col-xs-12">  
                                                    <input class="button btn largesearch-btn" value="SEND NOW" type="submit">
                                                </div>  
                                            </div>
                                        </fieldset>                                     
                                    </form>
                                </div>
                            </div>



<!--
                            <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
                                </div>
                                <div class="panel-body search-widget">
                                    <form action="" class=" form-inline"> 
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" placeholder="Key word">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-6">

                                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Your City">

                                                        <option>New york, CA</option>
                                                        <option>Paris</option>
                                                        <option>Casablanca</option>
                                                        <option>Tokyo</option>
                                                        <option>Marraekch</option>
                                                        <option>kyoto , shibua</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6">

                                                    <select id="basic" class="selectpicker show-tick form-control">
                                                        <option> -Status- </option>
                                                        <option>Rent </option>
                                                        <option>Boy</option>
                                                        <option>used</option>  

                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">Price range ($):</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[0,450]" id="price-range" style="background-color: #3b4753;" ><br />
                                                    <b class="pull-left color">2000$</b> 
                                                    <b class="pull-right color">100000$</b>                                                
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="property-geo">Property geo (m2) :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[50,450]" id="property-geo" ><br />
                                                    <b class="pull-left color">40m</b> 
                                                    <b class="pull-right color">12000m</b>                                                
                                                </div>                                            
                                            </div>
                                        </fieldset>                                

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">Min baths :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[250,450]" id="min-baths" ><br />
                                                    <b class="pull-left color">1</b> 
                                                    <b class="pull-right color">120</b>                                                
                                                </div>

                                                <div class="col-xs-6">
                                                    <label for="property-geo">Min bed :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[250,450]" id="min-bed" ><br />
                                                    <b class="pull-left color">1</b> 
                                                    <b class="pull-right color">120</b>

                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Fire Place</label>
                                                    </div> 
                                                </div>

                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Dual Sinks</label>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Swimming Pool</label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> 2 Stories </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label><input type="checkbox"> Laundry Room </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Emergency Exit</label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox" checked> Jog Path </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox"> 26' Ceilings </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-12"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox"> Hurricane Shutters </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset >
                                            <div class="row">
                                                <div class="col-xs-12">  
                                                    <input class="button btn largesearch-btn" value="Search" type="submit">
                                                </div>  
                                            </div>
                                        </fieldset>                                     
                                    </form>
                                </div>
                            </div>


                        -->

                        </aside>


                        <div class="similar-post-section padding-top-40"> 
                            <div id="prop-smlr-slide_0"> 

    <?php    $rand_no=0;

                $sql_listing="SELECT * FROM dbo_data_excel_listing where ex_list_listing_type='$type_asset_s' ORDER BY RAND ()";
                $result_listing= $conn->query($sql_listing); 
                while($rs_listing=$result_listing->fetch_assoc()){  $rand_no++;


                   $header_list=$rs_listing['ex_list_heading'];
                   $price_list=$rs_listing['ex_list_price'];
                   $code_list=$rs_listing['ex_list_listing_code'];
                   $header_list=$rs_listing['ex_list_project'];
                   $ex_list_sqm=$rs_listing['ex_list_sqm'];

                     $sql_l_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$code_list' order by listing_img_no ASC ";
                     $result_l_img=$conn->query($sql_l_img); 
                     $rs_l_img=$result_l_img->fetch_assoc();

                     $folder_list=$rs_l_img['listing_img_folder'];
                     $name_list=$rs_l_img['listing_img_name']; 

                     if($folder_list!=''){   
                           $img_name_list=$folder_list.$name_list;
                     }else{   
                           $img_name_list="../../images/listing/".$code_list."/".$name_list;  
                     }      

                    if($rand_no<=5){

    ?>

                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="https://connex.in.th/property/<?php echo $lang;?>/<?php echo $code_list;?>" ><img src="<?php echo $img_name_list;?>"></a>
                                    </div>
                                    <div class="item-entry overflow">
                                        <h5><a href="https://connex.in.th/property/<?php echo $lang;?>/<?php echo $code_list;?>"> <?php echo $header_list;?> </a></h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left"><b> Area :</b> <?php echo $ex_list_sqm;?> </span>
                                        <span class="proerty-price pull-right"><?php echo number_format($price_list);?></span> 
                                    </div>
                                </div> 
            <?php   }
                }     ?> 
                            </div>
                        </div>







                    </div>

                </div>

            </div>
        </div>









 