<style type="text/css">

a.footer_text:link ,a.footer_text:visited ,a.footer_text:hover ,a.footer_text:active{ 
   color: #ffffff;
}

</style>

<?php

        if($lang=='th'){

             $footer_head_1="ประกาศตามประเภททรัพย์";
             $footer_head_2="ประกาศตามโซน";
             $footer_head_3="ประกาศตามจังหวัด";
             $footer_head_4="ประกาศตามราคา";
        }else{

             $footer_head_1="Property by Type";
             $footer_head_2="Property by Zone";
             $footer_head_3="Property by Province";
             $footer_head_4="Property by Price Range";
        }

?>
    <footer>
        <div class="container-fluid">
            <div class="row"> 
          
                <div class="col">
                    <h3><?php echo $footer_head_1;?></h3>
                    <ul>
                        
                      <?php $str_asset="SELECT id ,name ,name_en  FROM type_asset order by id ASC "; 
                            $result_asset=$conn->query($str_asset);  
                            while($rs_asset=$result_asset->fetch_assoc()) { 

                                $asset_id=$rs_asset['id'];
                                $asset_name=$rs_asset['name'];
                                $asset_name_en=$rs_asset['name_en'];

                                if($lang=='th'){  
                                     $asset_name="ขาย".$asset_name;    
                                }else{ 
                                     $asset_name=$asset_name_en." for Sale";  
                                }
 
                            $url=$baseUrl."/search/$lang/1/".$asset_id."/all/all/all/all/".$title_url_reset."/1"; 

                                $url_station_name_en=str_replace(" ","-",$station_name_en ,$count);                   
                                $url_station_name_en=strtolower($url_station_name_en); 

                                $url=$baseUrl."/search/$lang/1/".$asset_id."/all/all/all/all/".$title_url_reset."/1"; 
                      ?>
                        <li><a class="footer_text" href="<?php echo $url;?>" target="_black" title="<?php echo $asset_name;?>" ><?php echo $asset_name;?></a></li>

                      <?php } ?>
                         <br>

                      <?php $str_asset="SELECT id ,name ,name_en  FROM type_asset order by id ASC "; 
                            $result_asset=$conn->query($str_asset);  
                            while($rs_asset=$result_asset->fetch_assoc()) { 

                                $asset_id=$rs_asset['id'];
                                $asset_name=$rs_asset['name'];
                                $asset_name_en=$rs_asset['name_en'];

                                if($lang=='th'){  
                                     $asset_name="เช่า".$asset_name;    
                                }else{ 
                                     $asset_name=$asset_name_en." for Rent";  
                                } 
                         
                            $url=$baseUrl."/search/$lang/2/".$asset_id."/all/all/all/all/".$title_url_reset."/1"; 

                                $url_station_name_en=str_replace(" ","-",$station_name_en ,$count);                   
                                $url_station_name_en=strtolower($url_station_name_en); 

                                $url=$baseUrl."/search/$lang/2/".$asset_id."/all/all/all/all/".$title_url_reset."/1"; 
                      ?>
                        <li><a class="footer_text" href="<?php echo $url;?>" target="_black" title="<?php echo $asset_name;?>" ><?php echo $asset_name;?></a></li> 

                      <?php } ?>     
                   
                    </ul>
                    <!--<a href="#" class="more">more <img src="images/dw.png" alt=""></a>-->
                </div>
                <div class="col">
                    <h3><?php echo $footer_head_2;?></h3>
                    
                    <ul>
                      
               <?php 
                     $sql_zone="SELECT zone_g_id  ,zone_g_name ,zone_g_name_en ,search_g_id 
                               FROM type_zone_group WHERE zone_g_id>=0 and zone_g_id<=14 and zone_g_id!='16' and 
                                    zone_g_id!='29' and zone_g_id!='32' and zone_g_id!='21' and 
                                    zone_g_id!='18' and zone_g_id!='26' and zone_g_id!='33'
                               order by zone_g_id ASC "; 
                     $result_zone=$conn->query($sql_zone);  
                     while($rs_zone=$result_zone->fetch_assoc()){ 

                            $search_g_id=$rs_zone['search_g_id'];

 
                        if($lang=='th'){
                            $zone_name="ขายคอนโด".$rs_zone['zone_g_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
                            $url=$baseUrl."/search/$lang/1/1/$search_g_id/all/all/all/".$url_zone."/1";
                        }else{
                            $zone_name="Condo for Sale ".$rs_zone['zone_g_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
                            $url=$baseUrl."/search/$lang/1/1/$search_g_id/all/all/all/".$url_zone."/1";
                        }
                ?> 
           
                        <li><a class="footer_text" href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>" ><?php echo $zone_name;?></a></li> 
               <?php } ?>  
                          <br>
                <?php 
                     $sql_zone="SELECT zone_g_id  ,zone_g_name ,zone_g_name_en ,search_g_id 
                               FROM type_zone_group WHERE zone_g_id>=0 and zone_g_id<=14 and  zone_g_id!='16' and 
                                    zone_g_id!='29' and zone_g_id!='32' and zone_g_id!='21' and zone_g_id!='18' and 
                                    zone_g_id!='26' and zone_g_id!='33'
                               order by zone_g_id ASC "; 
                     $result_zone=$conn->query($sql_zone);  
                     while($rs_zone=$result_zone->fetch_assoc()){ 

                            $search_g_id=$rs_zone['search_g_id'];

 
                        if($lang=='th'){
                            $zone_name="ให้เช่าคอนโด ".$rs_zone['zone_g_name'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
                            $url=$baseUrl."/search/$lang/2/1/$search_g_id/all/all/all/".$url_zone."/1";
                        }else{
                            $zone_name="Condo for Rent ".$rs_zone['zone_g_name_en'];
                            $url_zone=str_replace(" ","-",$zone_name ,$count);   
                            $url=$baseUrl."/search/$lang/2/1/$search_g_id/all/all/all/".$url_zone."/1";
                        }
                ?> 
           
                        <li><a class="footer_text" href="<?php echo $url;?>" target="_black" title="<?php echo $zone_name;?>" ><?php echo $zone_name;?></a></li> 
               <?php } ?>  
                     
                    </ul>
                     
                    </div>
                <div class="col">
                    <h3><?php echo $footer_head_3;?></h3>
                    <ul>
                      <?php $str_asset="SELECT id ,name ,name_en  FROM type_asset where id='1' or id='2' or id='4' or id='12'  order by id ASC "; 
                            $result_asset=$conn->query($str_asset);  
                            while($rs_asset=$result_asset->fetch_assoc()) { 

                                $asset_id=$rs_asset['id'];
                                $asset_name=$rs_asset['name'];
                                $asset_name_en=$rs_asset['name_en'];

                                if($lang=='th'){  
                                     $asset_name="ขาย".$asset_name;  
                                     $province_name1="กรุงเทพฯ";  
                                     $province_name2="นนทบุรี"; 
                                     $province_name3="ปทุมธานี";      
                                     $province_name4="สมุทรปราการ"; 
                                     $province_name5="สมุทรสาคร"; 
                                     $province_name6="นครปฐม"; 
                                }else{ 
                                     $asset_name=$asset_name_en." for Sale";  
                                     $province_name1="Bankok";  
                                     $province_name2="Nonthaburi"; 
                                     $province_name3="Pathum Thani";      
                                     $province_name4="Samut Prakan"; 
                                     $province_name5="Samut Sakhon"; 
                                     $province_name6="Nakhon Pathom"; 
                                }
 
                            $url1=$baseUrl."/search/$lang/1/".$asset_id."/v1/all/all/all/".$title_url_reset."/1"; 
                            $url2=$baseUrl."/search/$lang/1/".$asset_id."/v3/all/all/all/".$title_url_reset."/1"; 
                            $url3=$baseUrl."/search/$lang/1/".$asset_id."/v4/all/all/all/".$title_url_reset."/1"; 
                            $url4=$baseUrl."/search/$lang/1/".$asset_id."/v2/all/all/all/".$title_url_reset."/1"; 
                            $url5=$baseUrl."/search/$lang/1/".$asset_id."/v60/all/all/all/".$title_url_reset."/1"; 
                            $url6=$baseUrl."/search/$lang/1/".$asset_id."/v59/all/all/all/".$title_url_reset."/1";

                                $url_station_name_en=str_replace(" ","-",$station_name_en ,$count);                   
                                $url_station_name_en=strtolower($url_station_name_en); 
 
                      ?>
                        <li><a class="footer_text" href="<?php echo $url1;?>" target="_black" title="<?php echo $asset_name." ".$province_name1;?>" ><?php echo $asset_name." ".$province_name1;?></a></li>
                        <li><a class="footer_text" href="<?php echo $url2;?>" target="_black" title="<?php echo $asset_name." ".$province_name2;?>" ><?php echo $asset_name." ".$province_name2;?></a></li>
                        <li><a class="footer_text" href="<?php echo $url3;?>" target="_black" title="<?php echo $asset_name." ".$province_name3;?>" ><?php echo $asset_name." ".$province_name3;?></a></li>
                        <li><a class="footer_text" href="<?php echo $url4;?>" target="_black" title="<?php echo $asset_name." ".$province_name4;?>" ><?php echo $asset_name." ".$province_name4;?></a></li>
                        <li><a class="footer_text" href="<?php echo $url5;?>" target="_black" title="<?php echo $asset_name." ".$province_name5;?>" ><?php echo $asset_name." ".$province_name5;?></a></li>
                        <li><a class="footer_text" href="<?php echo $url6;?>" target="_black" title="<?php echo $asset_name." ".$province_name6;?>" ><?php echo $asset_name." ".$province_name6;?></a></li>
                      <br> 
                      <?php } ?>
                  
                    </ul> 
                   
                </div>
                <div class="col">
                    <h3><?php echo $footer_head_4;?></h3>
                    <ul>
                      <?php $str_asset="SELECT id ,name ,name_en  FROM type_asset where id='1' or id='2' or id='4'  order by id ASC "; 
                            $result_asset=$conn->query($str_asset);  
                            while($rs_asset=$result_asset->fetch_assoc()) { 

                                $asset_id=$rs_asset['id'];
                                $asset_name=$rs_asset['name'];
                                $asset_name_en=$rs_asset['name_en'];

                                if($lang=='th'){  
                                     $asset_name=$asset_name;  
                                     $province_name1="ราคาต่ำกว่า 2ล้าน";   
                                     $province_name2="ราคาต่ำกว่า 3ล้าน"; 
                                     $province_name3="ราคาต่ำกว่า 5ล้าน"; 
                                }else{ 
                                     $asset_name=$asset_name_en;  
                                     $province_name1="below 2 Million Baht";  
                                     $province_name2="below 3 Million Baht"; 
                                     $province_name3="below 5 Million Baht";
                                }
 
                                $url1=$baseUrl."/search/$lang/1/".$asset_id."/all/all/2/all/".$title_url_reset."/1"; 
                                $url2=$baseUrl."/search/$lang/1/".$asset_id."/all/all/3/all/".$title_url_reset."/1";
                                $url3=$baseUrl."/search/$lang/1/".$asset_id."/all/all/4/all/".$title_url_reset."/1";

                                $url_station_name_en=str_replace(" ","-",$station_name_en ,$count);                   
                                $url_station_name_en=strtolower($url_station_name_en);  
                      ?>
                        <li><a class="footer_text" href="<?php echo $url1;?>" target="_black" title="<?php echo $asset_name." ".$province_name1;?>" ><?php echo $asset_name." ".$province_name1;?></a></li>
                        <li><a class="footer_text" href="<?php echo $url2;?>" target="_black" title="<?php echo $asset_name." ".$province_name2;?>" ><?php echo $asset_name." ".$province_name2;?></a></li>
                        <li><a class="footer_text" href="<?php echo $url3;?>" target="_black" title="<?php echo $asset_name." ".$province_name3;?>" ><?php echo $asset_name." ".$province_name3;?></a></li>
                         <br>
                      <?php } ?>
                  
                    </ul> 
                   
                </div>
                <div class="col">
                    <h3><?php echo $contact_us_title;?></h3>
                    <a href="https://line.me/R/ti/p/@636paefg" target="_black" class="follow"><img src="<?php echo $part;?>images/icon/Line_black.webp" alt="LINE Connex Property" title="LINE Connex Property"></a>
                    <a href="https://www.facebook.com/connexprop" target="_black" class="follow"><img src="<?php echo $part;?>images/icon/Facebook_black.webp" alt="FB Connex Property" title="FB Connex Property"></a>
                    <a href="https://www.youtube.com/@connex_property/" target="_black" class="follow"><img src="<?php echo $part;?>images/icon/Youtube_black.webp" alt="Youtube Connex Property" title="Youtube Connex Property" ></a>
                    <a href="https://www.instagram.com/connex.property/?igshid=MzRlODBiNWFlZA%3D%3D" target="_black" class="follow"><img src="<?php echo $part;?>images/icon/icon-ig.webp" alt="Instagram Connex Property" title="Instagram Connex Property" ></a>
                    <a href="https://www.tiktok.com/@connexproperty_" target="_black" class="follow"><img src="<?php echo $part;?>images/icon/icon_tiktok.webp" alt="Tiktok Connex Property" title="Tiktok Connex Property" ></a>
                    
                </div>

        
            </div>
        </div>
        <div class="col-xl-12 bot-menu">
            <a href="<?php echo $part;?><?php  if($lang=='en'){ echo "en"; } ?>"><?php echo $link_home;?></a>
            <a href="<?php echo $part;?>search/<?php echo $lang;?>/1/all/all/all/all/all/<?php echo $title_url_reset;?>/1"><?php echo $buy_title;?></a>
            <a href="<?php echo $part;?>search/<?php echo $lang;?>/2/all/all/all/all/all/<?php echo $title_url_reset;?>/1"><?php echo $rent_title;?></a>
            <a href="<?php echo $part;?>consignment/<?php echo $lang;?>"><?php echo $sell_title;?></a>
            <a href="<?php echo $part;?>content/<?php echo $lang;?>/1"><?php echo $new_title;?></a>
            <a href="<?php echo $part;?>contact/<?php echo $lang;?>"><?php echo $contact_us_title;?></a>
            <a href="<?php echo $part;?>sitemap/<?php echo $lang;?>">Site Map</a> 
            <span>Copyrights © 2023, Connex property</span>
        </div>
    </footer>




<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMJTV22"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

 