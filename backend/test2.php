 
<meta http-equiv="refresh" content="30;url=https://connex.in.th/backend/test2.php">  

<?php


$servername = "localhost";
$username = "sirivala_connex1";
$password = "fORnIOTKuc";
$dbname = "sirivala_connex1";  

 
 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

date_default_timezone_set('Asia/Bangkok');

/*
 
 
$curl = curl_init('https://goo.gl/maps/ed9WZfp3dUGbZ92Z8');
curl_setopt($curl, CURLOPT_FAILONERROR, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 
$result = curl_exec($curl);

 
 
 
 
$all=stristr($result,"[null,null,[null,[2,");

 

 $n1=substr($all,20 , 10);

 $n2=substr($all,31 , 11 );

$n1 = str_replace(",","",$n1,$count);
$n2 = str_replace(",","",$n2,$count);   

 
echo $n1;
echo $n2;


 
echo $result;
echo $n1 . "<br>";
echo $n2 . "<br>";   */  

 
                          $sql="SELECT ex_list_googlmap,ex_list_listing_code, ex_list_latitude FROM 
                                dbo_data_excel_listing where ex_list_latitude='0'  and ex_list_googlmap LIKE '%map%'
                                order by ex_list_listing_code ASC ";
                          $result= $conn->query($sql);  
                         
                          $rs=$result->fetch_assoc();   $i++;
                           
                          if($rs['ex_list_googlmap']!=''){
                         
  

                             $ex_list_googlmap=$rs['ex_list_googlmap']; 
                             $ex_list_listing_code=$rs['ex_list_listing_code']; 
 

								$curl = curl_init($ex_list_googlmap);
								curl_setopt($curl, CURLOPT_FAILONERROR, true);
								curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
								 
								$result = curl_exec($curl);

								 
								 
								 
								 
								$all=stristr($result,"[null,null,[null,[2,");


								$all2=stristr($result,"https://maps.google.com/maps/api/staticmap?center=");
                                
                                $all3=stristr($result,"]],null,[[3,");
								
                                
                                if($all!=''){

								 $n1=substr($all,20 , 11);
								 $n2=substr($all,31 , 11 );

								 $n1 = str_replace(",","",$n1,$count);
								 $n2 = str_replace(",","",$n2,$count); 

                                }else if($all2!=''){

								 $n1=substr($all2,50 , 11);
								 $n2=substr($all2,64 , 11 );

								 $n1 = str_replace(",","",$n1,$count);
								 $n2 = str_replace(",","",$n2,$count); 
								 $n2 = str_replace("C","",$n2,$count);

                                }else if($all3!=''){
 
                                  $n1=substr($all3,12 , 11);
								 $n2=substr($all3,31 , 11 );

								 $n1 = str_replace(",","",$n1,$count);
								 $n2 = str_replace(",","",$n2,$count); 
                                 $n2 = str_replace("C","",$n2,$count); 

                                }
                        

                         
                        

                              $sql1 = "UPDATE dbo_data_excel_listing SET 
                                        ex_list_latitude='".$n2."',
                                        ex_list_longitude='".$n1."'
                                        WHERE ex_list_listing_code='".$ex_list_listing_code."' "; 

                              if ($conn->query($sql1) === TRUE) {  }  

                              	echo $ex_list_listing_code." : ".$n2." - ".$n1;

                            
                            }else{


		                          $sql="SELECT ex_list_googlmap,ex_list_listing_code, ex_list_latitude FROM 
		                                dbo_data_excel_listing where ex_list_latitude='0'  and ex_list_googlmap LIKE '%g.page%'
		                                order by ex_list_listing_code ASC ";
		                          $result= $conn->query($sql);  
		                         
		                          $rs=$result->fetch_assoc();  
	                                   
	                              if($rs['ex_list_googlmap']!=''){
	                                

                                         $ex_list_googlmap=$rs['ex_list_googlmap']; 
			                             $ex_list_listing_code=$rs['ex_list_listing_code']; 
			 

											$curl = curl_init('https://g.page/amarihuahin?share');
								curl_setopt($curl, CURLOPT_FAILONERROR, true);
								curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $result = curl_exec($curl);
 
						 
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

								 $n2 = str_replace("C","",$n2,$count); 

                                  

			                              $sql1 = "UPDATE dbo_data_excel_listing SET 
			                                        ex_list_latitude='".$n2."',
			                                        ex_list_longitude='".$n1."'
			                                        WHERE ex_list_listing_code='".$ex_list_listing_code."' "; 

			                              if ($conn->query($sql1) === TRUE) {  }  

			                              	echo "MAP2 | ".$ex_list_listing_code." : ".$n2." - ".$n1;


	                              }


                            }
                             



?>

 