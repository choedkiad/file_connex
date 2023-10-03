<?php
$curl = curl_init('https://goo.gl/maps/GJMVWEkFgx96fpyd9');
								curl_setopt($curl, CURLOPT_FAILONERROR, true);
								curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
 
						 /*
								$all=stristr($result,"https://maps.google.com/maps?q=");
 
								 $n1=substr($all,0 , 170); 
  
                       
                                $a2=stristr($n1,'">Maps');

                                $n1 = str_replace($a2,"",$n1,$count);

 


                                 $curl = curl_init($n1);
								curl_setopt($curl, CURLOPT_FAILONERROR, true);
								curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $result = curl_exec($curl);

                               $a2=stristr($result,'https://maps.google.com/maps/api/staticmap?center=');

                               $n1=substr($a2,50 , 11);

								 $n2=substr($a2,64 , 11 ); 

                                  echo  $n1." - ".$n2;*/

echo $result;
 
  
?>