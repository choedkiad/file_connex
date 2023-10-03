<?php
     include ("../../include/config.php"); 
 
 session_start();

$q=$_GET['q'];
$lang=$_SESSION['lang'];
$deal=$_SESSION['deal'];
$type_s=$_SESSION['type_s'];
$room_s=$_SESSION['room_s'];

if($deal==''){ $deal='all'; }
if($type_s==''){ $type_s='all'; }
if($room_s==''){ $room_s='all'; }

$part="../../../../../../../../../../../../";

$strSQL = "SELECT * FROM type_train_station where station_name LIKE '%$q%' or  
           station_name_en LIKE '%$q%' or 
           station_train LIKE '%$q%'
          "; 
$result=$conn->query($strSQL); 

	if (mysqli_num_rows($result) > 0) {

        while($rs = $result->fetch_assoc()) {  
        

            $tr_group=$rs["tr_group"];
            $station_name=$rs["station_name"];
            $station_name_en=$rs["station_name_en"]; 
	    	$search_s_id=$rs["search_s_id"];

             if($lang=='th'){
                          $url_name=str_replace(" ","-",$station_name ,$count);   
	                   	  $project_name_value=$tr_group."-".$rs["station_name"]."  ".$tr_group."-".$rs["station_name_en"];
             }else{
                          $url_name=str_replace(" ","-",$station_name_en ,$count);   
	                   	  $project_name_value=$tr_group."-".$rs["station_name_en"];
             }
                     $url_name=strtolower($url_name); 

	    	$search=$part."search/$lang/$deal/$type_s/".$search_s_id."/$room_s/$url_name/1";
		
			$data[] =  array(
				"id"=> $search,
				"value" => $project_name_value
			);

        }

    }

 

 $strSQL = "SELECT * FROM type_zone where zone_name LIKE '%$q%' or  zone_name_en LIKE '%$q%'   "; 
$result=$conn->query($strSQL); 

	if (mysqli_num_rows($result) > 0) {

        while($rs = $result->fetch_assoc()) {  
        

            $zone_name=$rs["zone_name"];
            $zone_name_en=$rs["zone_name_en"]; 
	    	$search_z_id=$rs["search_z_id"];

             if($lang=='th'){
                          $url_name=str_replace(" ","-",$zone_name ,$count);   
	                   	  $project_name_value="โซน : ".$rs["zone_name"]." - ".$rs["zone_name_en"];
             }else{
                          $url_name=str_replace(" ","-",$zone_name_en ,$count);   
	                   	  $project_name_value="Zone : ".$rs["zone_name_en"];
             }
                     $url_name=strtolower($url_name); 

	    	$search=$part."search/$lang/$deal/$type_s/".$search_z_id."/$room_s/$url_name/1";
		
			$data[] =  array(
				"id"=> $search,
				"value" => $project_name_value
			);

        }

    }


   $strSQL = "SELECT search_p_id  ,project_name , project_name_en , search_p_id 
          FROM type_project AS pj  
          where search_p_id!='' and project_name!=''  and  project_listing_count_public!='0' and project_name LIKE '%$q%' or 
                search_p_id!='' and project_name!=''  and  project_listing_count_public!='0' and project_name_en LIKE '%$q%' 
           "; 
  $result=$conn->query($strSQL);  
	if (mysqli_num_rows($result) > 0) {

	    while($rs_project = $result->fetch_assoc()){

            $project_name=$rs_project["project_name"];
            $project_name_en=$rs_project["project_name_en"];
	    	$search_p_id=$rs_project["search_p_id"];

             if($lang=='th'){
                          $url_name=str_replace(" ","-",$project_name ,$count);   
	    	              $project_name_value="โครงการ : ".$rs_project["project_name"]." - ".$rs_project["project_name_en"];
             }else{
                          $url_name=str_replace(" ","-",$project_name_en ,$count); 
	    	              $project_name_value="Project : ".$rs_project["project_name_en"];

             }
                     $url_name=strtolower($url_name); 

	    	$search=$part."search/$lang/$deal/$type_s/".$search_p_id."/$room_s/$url_name/1";

			$data[] =  array(
				"id"=> $search,
				"value" => $project_name_value
			);
		}
	}


	/* else {
		echo "0 results";
	}*/




		$json = array(
			"total"=>"",
			"items"=>$data	
		);

	
	echo json_encode($json);
	
mysqli_close($conn);
?>