<?php 




                $sql="SELECT *  FROM type_zone_group WHERE zone_g_highlight='1' order by zone_g_number ASC LIMIT 18"; 
                $result = $conn->query($sql); 
                      // output data of each row
                while($rs = $result->fetch_assoc()){   $zone_g++;
                    

                    if($zone_g=='1'){   $zone_type1_th=$rs['zone_g_name'];  $zone_type1_en=$rs['zone_g_name_en'];  
                                        $zone_image1=$rs['zone_g_image_webp'];
                                        $search_g_id1=$rs['search_g_id'];   
 
                          
                            if($_SESSION['lang']=='th'){
                                        $zone_type1_url=str_replace(" ","-",$zone_type1_th ,$count);                   
                                        $zone_type1_url=strtolower($zone_type1_url); 
                                        $zone_type1=$zone_type1_th;         $zone_g_url1="$baseUrl/search/th/$deal_s/all/$search_g_id1/all/$zone_type1_url/1";
                            }else{
                                        $zone_type1_url=str_replace(" ","-",$zone_type1_en ,$count);                   
                                        $zone_type1_url=strtolower($zone_type1_url); 
                                        $zone_type1=$zone_type1_en;         $zone_g_url1="$baseUrl/search/en/$deal_s/all/$search_g_id1/all/$zone_type1_url/1";
                            }

                                    }
                    if($zone_g=='2'){   $zone_type2_th=$rs['zone_g_name'];  $zone_type2_en=$rs['zone_g_name_en'];  
                                        $zone_image2=$rs['zone_g_image_webp']; 
                                        $search_g_id2=$rs['search_g_id']; 

                            if($_SESSION['lang']=='th'){
                                        $zone_type2_url=str_replace(" ","-",$zone_type2_th ,$count);                   
                                        $zone_type2_url=strtolower($zone_type2_url); 
                                        $zone_type2=$zone_type2_th;         $zone_g_url2="$baseUrl/search/th/$deal_s/all/$search_g_id2/all/$zone_type2_url/1";
                            }else{
                                        $zone_type2_url=str_replace(" ","-",$zone_type2_en ,$count);                   
                                        $zone_type2_url=strtolower($zone_type2_url); 
                                        $zone_type2=$zone_type2_en;         $zone_g_url2="$baseUrl/search/en/$deal_s/all/$search_g_id2/all/$zone_type2_url/1";
                            }

                                    }               
                    if($zone_g=='3'){   $zone_type3_th=$rs['zone_g_name'];  $zone_type3_en=$rs['zone_g_name_en'];  
                                        $zone_image3=$rs['zone_g_image_webp']; 
                                        $search_g_id3=$rs['search_g_id'];  

                            if($_SESSION['lang']=='th'){
                                        $zone_type3_url=str_replace(" ","-",$zone_type3_th ,$count);                   
                                        $zone_type3_url=strtolower($zone_type3_url); 
                                        $zone_type3=$zone_type3_th;         $zone_g_url3="$baseUrl/search/th/$deal_s/all/$search_g_id3/all/$zone_type3_url/1";
                            }else{
                                        $zone_type3_url=str_replace(" ","-",$zone_type3_en ,$count);                   
                                        $zone_type3_url=strtolower($zone_type3_url); 
                                        $zone_type3=$zone_type3_en;         $zone_g_url3="$baseUrl/search/en/$deal_s/all/$search_g_id3/all/$zone_type3_url/1";
                            }       
                                    }
                    if($zone_g=='4'){   $zone_type4_th=$rs['zone_g_name'];  $zone_type4_en=$rs['zone_g_name_en'];  
                                        $zone_image4=$rs['zone_g_image_webp']; 
                                        $search_g_id4=$rs['search_g_id'];
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type4_url=str_replace(" ","-",$zone_type4_th ,$count);                   
                                        $zone_type4_url=strtolower($zone_type4_url); 
                                        $zone_type4=$zone_type4_th;         $zone_g_url4="$baseUrl/search/th/$deal_s/all/$search_g_id4/all/$zone_type4_url/1";
                            }else{
                                        $zone_type4_url=str_replace(" ","-",$zone_type4_en ,$count);                   
                                        $zone_type4_url=strtolower($zone_type4_url); 
                                        $zone_type4=$zone_type4_en;         $zone_g_url4="$baseUrl/search/en/$deal_s/all/$search_g_id4/all/$zone_type4_url/1";
                            }     
                                    }
                    if($zone_g=='5'){   $zone_type5_th=$rs['zone_g_name'];  $zone_type5_en=$rs['zone_g_name_en'];  
                                        $zone_image5=$rs['zone_g_image_webp']; 
                                        $search_g_id5=$rs['search_g_id'];
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type5_url=str_replace(" ","-",$zone_type5_th ,$count);                   
                                        $zone_type5_url=strtolower($zone_type5_url); 
                                        $zone_type5=$zone_type5_th;         $zone_g_url5="$baseUrl/search/th/$deal_s/all/$search_g_id5/all/$zone_type5_url/1";
                            }else{
                                        $zone_type5_url=str_replace(" ","-",$zone_type5_en ,$count);                   
                                        $zone_type5_url=strtolower($zone_type5_url); 
                                        $zone_type5=$zone_type5_en;         $zone_g_url5="$baseUrl/search/en/$deal_s/all/$search_g_id5/all/$zone_type5_url/1";
                            }     
                                    }
                    if($zone_g=='6'){   $zone_type6_th=$rs['zone_g_name'];  $zone_type6_en=$rs['zone_g_name_en'];  
                                        $zone_image6=$rs['zone_g_image_webp']; 
                                        $search_g_id6=$rs['search_g_id'];
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type6_url=str_replace(" ","-",$zone_type6_th ,$count);                   
                                        $zone_type6_url=strtolower($zone_type6_url); 
                                        $zone_type6=$zone_type6_th;         $zone_g_url6="$baseUrl/search/th/$deal_s/all/$search_g_id6/all/$zone_type6_url/1";
                            }else{
                                        $zone_type6_url=str_replace(" ","-",$zone_type6_en ,$count);                   
                                        $zone_type6_url=strtolower($zone_type6_url); 
                                        $zone_type6=$zone_type6_en;         $zone_g_url6="$baseUrl/search/en/$deal_s/all/$search_g_id6/all/$zone_type6_url/1";
                            }   

                                    }
                    if($zone_g=='7'){   $zone_type7_th=$rs['zone_g_name'];  $zone_type7_en=$rs['zone_g_name_en'];  
                                        $zone_image7=$rs['zone_g_image_webp']; 
                                        $search_g_id7=$rs['search_g_id']; 

                            if($_SESSION['lang']=='th'){
                                        $zone_type7_url=str_replace(" ","-",$zone_type7_th ,$count);                   
                                        $zone_type7_url=strtolower($zone_type7_url); 
                                        $zone_type7=$zone_type7_th;         $zone_g_url7="$baseUrl/search/th/$deal_s/all/$search_g_id7/all/$zone_type7_url/1";
                            }else{
                                        $zone_type7_url=str_replace(" ","-",$zone_type7_en ,$count);                   
                                        $zone_type7_url=strtolower($zone_type7_url); 
                                        $zone_type7=$zone_type7_en;         $zone_g_url7="$baseUrl/search/en/$deal_s/all/$search_g_id7/all/$zone_type7_url/1";
                            }   
                                    }
                    if($zone_g=='8'){   $zone_type8_th=$rs['zone_g_name'];  $zone_type8_en=$rs['zone_g_name_en'];  
                                        $zone_image8=$rs['zone_g_image_webp']; 
                                        $search_g_id8=$rs['search_g_id']; 
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type8_url=str_replace(" ","-",$zone_type8_th ,$count);                   
                                        $zone_type8_url=strtolower($zone_type8_url); 
                                        $zone_type8=$zone_type8_th;         $zone_g_url8="$baseUrl/search/th/$deal_s/all/$search_g_id8/all/$zone_type8_url/1";
                            }else{
                                        $zone_type8_url=str_replace(" ","-",$zone_type8_en ,$count);                   
                                        $zone_type8_url=strtolower($zone_type8_url); 
                                        $zone_type8=$zone_type8_en;         $zone_g_url8="$baseUrl/search/en/$deal_s/all/$search_g_id8/all/$zone_type8_url/1";
                            }   
                                    }
                    if($zone_g=='9'){   $zone_type9_th=$rs['zone_g_name'];  $zone_type9_en=$rs['zone_g_name_en'];  
                                        $zone_image9=$rs['zone_g_image_webp']; 
                                        $search_g_id9=$rs['search_g_id']; 
  
                            if($_SESSION['lang']=='th'){
                                        $zone_type9_url=str_replace(" ","-",$zone_type9_th ,$count);                   
                                        $zone_type9_url=strtolower($zone_type9_url); 
                                        $zone_type9=$zone_type9_th;         $zone_g_url9="$baseUrl/search/th/$deal_s/all/$search_g_id9/all/$zone_type9_url/1";
                            }else{
                                        $zone_type9_url=str_replace(" ","-",$zone_type9_en ,$count);                   
                                        $zone_type9_url=strtolower($zone_type9_url); 
                                        $zone_type9=$zone_type9_en;         $zone_g_url9="$baseUrl/search/en/$deal_s/all/$search_g_id9/all/$zone_type9_url/1";
                            }   
                                    }
                    if($zone_g=='10'){  $zone_type10_th=$rs['zone_g_name'];  $zone_type10_en=$rs['zone_g_name_en'];  
                                        $zone_image10=$rs['zone_g_image_webp']; 
                                        $search_g_id10=$rs['search_g_id'];
 

                             if($_SESSION['lang']=='th'){
                                        $zone_type10_url=str_replace(" ","-",$zone_type10_th ,$count);                   
                                        $zone_type10_url=strtolower($zone_type10_url); 
                                        $zone_type10=$zone_type10_th;         $zone_g_url10="$baseUrl/search/th/$deal_s/all/$search_g_id10/all/$zone_type10_url/1";
                            }else{
                                        $zone_type10_url=str_replace(" ","-",$zone_type10_en ,$count);                   
                                        $zone_type10_url=strtolower($zone_type10_url); 
                                        $zone_type10=$zone_type10_en;         $zone_g_url10="$baseUrl/search/en/$deal_s/all/$search_g_id10/all/$zone_type10_url/1";
                            }   
                                    }
                    if($zone_g=='11'){  $zone_type11_th=$rs['zone_g_name'];  $zone_type11_en=$rs['zone_g_name_en'];  
                                        $zone_image11=$rs['zone_g_image_webp']; 
                                        $search_g_id11=$rs['search_g_id'];
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type11_url=str_replace(" ","-",$zone_type11_th ,$count);                   
                                        $zone_type11_url=strtolower($zone_type11_url); 
                                        $zone_type11=$zone_type11_th;         $zone_g_url11="$baseUrl/search/th/$deal_s/all/$search_g_id11/all/$zone_type11_url/1";
                            }else{
                                        $zone_type11_url=str_replace(" ","-",$zone_type11_en ,$count);                   
                                        $zone_type11_url=strtolower($zone_type11_url); 
                                        $zone_type11=$zone_type11_en;         $zone_g_url11="$baseUrl/search/en/$deal_s/all/$search_g_id11/all/$zone_type11_url/1";
                            }   
                                    }
                    if($zone_g=='12'){  $zone_type12_th=$rs['zone_g_name'];  $zone_type12_en=$rs['zone_g_name_en'];  
                                        $zone_image12=$rs['zone_g_image_webp']; 
                                        $search_g_id12=$rs['search_g_id'];
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type12_url=str_replace(" ","-",$zone_type12_th ,$count);                   
                                        $zone_type12_url=strtolower($zone_type12_url); 
                                        $zone_type12=$zone_type12_th;         $zone_g_url12="$baseUrl/search/th/$deal_s/all/$search_g_id12/all/$zone_type12_url/1";
                            }else{
                                        $zone_type12_url=str_replace(" ","-",$zone_type12_en ,$count);                   
                                        $zone_type12_url=strtolower($zone_type12_url); 
                                        $zone_type12=$zone_type12_en;         $zone_g_url12="$baseUrl/search/en/$deal_s/all/$search_g_id12/all/$zone_type12_url/1";
                            }   
                                     }
                    if($zone_g=='13'){  $zone_type13_th=$rs['zone_g_name'];  $zone_type13_en=$rs['zone_g_name_en'];  
                                        $zone_image13=$rs['zone_g_image_webp']; 
                                        $search_g_id13=$rs['search_g_id'];
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type13_url=str_replace(" ","-",$zone_type13_th ,$count);                   
                                        $zone_type13_url=strtolower($zone_type13_url); 
                                        $zone_type13=$zone_type13_th;         $zone_g_url13="$baseUrl/search/th/$deal_s/all/$search_g_id13/all/$zone_type13_url/1";
                            }else{
                                        $zone_type13_url=str_replace(" ","-",$zone_type13_en ,$count);                   
                                        $zone_type13_url=strtolower($zone_type13_url); 
                                        $zone_type13=$zone_type13_en;         $zone_g_url13="$baseUrl/search/en/$deal_s/all/$search_g_id13/all/$zone_type13_url/1";
                            }   
                                    }
                    if($zone_g=='14'){  $zone_type14_th=$rs['zone_g_name'];  $zone_type14_en=$rs['zone_g_name_en'];  
                                        $zone_image14=$rs['zone_g_image_webp']; 
                                        $search_g_id14=$rs['search_g_id'];
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type14_url=str_replace(" ","-",$zone_type14_th ,$count);                   
                                        $zone_type14_url=strtolower($zone_type14_url); 
                                        $zone_type14=$zone_type14_th;         $zone_g_url14="$baseUrl/search/th/$deal_s/all/$search_g_id14/all/$zone_type14_url/1";
                            }else{
                                        $zone_type14_url=str_replace(" ","-",$zone_type14_en ,$count);                   
                                        $zone_type14_url=strtolower($zone_type14_url); 
                                        $zone_type14=$zone_type14_en;         $zone_g_url14="$baseUrl/search/en/$deal_s/all/$search_g_id14/all/$zone_type14_url/1";
                            }   
                                    }
                    if($zone_g=='15'){  $zone_type15_th=$rs['zone_g_name'];  $zone_type15_en=$rs['zone_g_name_en'];  
                                        $zone_image15=$rs['zone_g_image_webp']; 
                                        $search_g_id15=$rs['search_g_id'];
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type15_url=str_replace(" ","-",$zone_type15_th ,$count);                   
                                        $zone_type15_url=strtolower($zone_type15_url); 
                                        $zone_type15=$zone_type15_th;         $zone_g_url15="$baseUrl/search/th/$deal_s/all/$search_g_id15/all/$zone_type15_url/1";
                            }else{
                                        $zone_type15_url=str_replace(" ","-",$zone_type15_en ,$count);                   
                                        $zone_type15_url=strtolower($zone_type15_url); 
                                        $zone_type15=$zone_type15_en;         $zone_g_url15="$baseUrl/search/en/$deal_s/all/$search_g_id15/all/$zone_type15_url/1";
                            }   
                                    }
                    if($zone_g=='16'){  $zone_type16_th=$rs['zone_g_name'];  $zone_type16_en=$rs['zone_g_name_en'];  
                                        $zone_image16=$rs['zone_g_image_webp'];
                                        $search_g_id16=$rs['search_g_id']; 
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type16_url=str_replace(" ","-",$zone_type16_th ,$count);                   
                                        $zone_type16_url=strtolower($zone_type16_url); 
                                        $zone_type16=$zone_type16_th;         $zone_g_url16="$baseUrl/search/th/$deal_s/all/$search_g_id16/all/$zone_type16_url/1";
                            }else{
                                        $zone_type16_url=str_replace(" ","-",$zone_type16_en ,$count);                   
                                        $zone_type16_url=strtolower($zone_type16_url); 
                                        $zone_type16=$zone_type16_en;         $zone_g_url16="$baseUrl/search/en/$deal_s/all/$search_g_id16/all/$zone_type16_url/1";
                            }  
                                    }

                    if($zone_g=='17'){  $zone_type17_th=$rs['zone_g_name'];  $zone_type17_en=$rs['zone_g_name_en'];  
                                        $zone_image17=$rs['zone_g_image_webp']; 
                                        $search_g_id17=$rs['search_g_id'];  
 

                            if($_SESSION['lang']=='th'){
                                        $zone_type17_url=str_replace(" ","-",$zone_type17_th ,$count);                   
                                        $zone_type17_url=strtolower($zone_type17_url); 
                                        $zone_type17=$zone_type17_th;         $zone_g_url17="$baseUrl/search/th/$deal_s/all/$search_g_id17/all/$zone_type17_url/1";
                            }else{
                                        $zone_type17_url=str_replace(" ","-",$zone_type17_en ,$count);                   
                                        $zone_type17_url=strtolower($zone_type17_url); 
                                        $zone_type17=$zone_type17_en;         $zone_g_url17="$baseUrl/search/en/$deal_s/all/$search_g_id17/all/$zone_type17_url/1";
                            }   

                                    }

                    if($zone_g=='18'){  $zone_type18_th=$rs['zone_g_name'];  $zone_type18_en=$rs['zone_g_name_en'];  
                                        $zone_image18=$rs['zone_g_image_webp']; 
                                        $search_g_id18=$rs['search_g_id'];  

                            if($_SESSION['lang']=='th'){
                                        $zone_type18_url=str_replace(" ","-",$zone_type18_th ,$count);                   
                                        $zone_type18_url=strtolower($zone_type18_url); 
                                        $zone_type18=$zone_type18_th;         $zone_g_url18="$baseUrl/search/th/$deal_s/all/$search_g_id18/all/$zone_type18_url/1";
                            }else{
                                        $zone_type18_url=str_replace(" ","-",$zone_type18_en ,$count);                   
                                        $zone_type18_url=strtolower($zone_type18_url); 
                                        $zone_type18=$zone_type18_en;         $zone_g_url18="$baseUrl/search/en/$deal_s/all/$search_g_id18/all/$zone_type18_url/1";
                            }   

                                    } 

                 } 

?>