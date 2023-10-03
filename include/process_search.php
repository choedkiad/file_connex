<?php


  session_start();  

  require '../include/config.php';
 

  $status=$_GET['status'];

  $page_s=$_POST['page'];
 
  //$_SESSION['lang']=$_POST['lang']; 
  $lang=$_SESSION['lang'];
  

 if($lang=='th'){   $url_project_name="รวมประกาศ" ;  }else{   $url_project_name="property-listing" ;    }



 if($status=='reset'){
            
            $_SESSION['price_min_c']='';
            $_SESSION['price_max_c']='';
            $_SESSION['size_min_c']='';
            $_SESSION['size_max_c']='';

           

           echo("<script> top.location.href='../searchtest/$lang/all/all/all/all/$url_project_name/1'</script>");   
  }


if($status=='project'){

   $_SESSION['sort_s']=$_GET['sort_s'];
   $_SESSION['deal']='';

  $search_s=$_GET['search_s'];
  $deal_s=$_GET['deal_s'];
  $type_s=$_GET['type_s'];
  $project_s=$_GET['project_s'];
  $room_s=$_GET['room_s'];
  $room_s_2=$_GET['room_s_2'];
 /*
  $size_s=$_GET['size_s'];
  $size_s_wa=$_GET['size_s_wa']; 
  $price_s=$_GET['price_s'];
  $price_s_sale=$_GET['price_s_sale'];*/

  $lang=$_GET['lang'];







      if($search_s==''){ $search_s='0';}

      if($deal_s==''){ 

            $deal_s='0';
            /*
            if($price_s==''){ $price_s='0'; }  */

      }else if($deal_s=='1' or $deal_s=='2'){
         
         /*
            if($price_s_sale==''){
                 $price_s='0'; 
            }else{
                 $price_s=$price_s_sale;
            } */

      }

      if($price_s==''){ $price_s='0'; } 

      if($type_s==''){ 

           $type_s='all';
      
      }else if($type_s=='1'){  
         
       //  $size_s=$size_s;

      }else{   

        //  $size_s=$size_s_wa;
      }


      if($project_s==''){ $project_s='0';}
     
 

  if($room_s==''){ $room_s='s';}else{ $room_s=$room_s;  }
  

/*
      if($type_s=='1' or $type_s==''){
           if($room_s==''){ $room_s='s';}else{ $room_s=$room_s;  }
      }else{ 
           if($room_s_2==''){ $room_s='s';}else{ $room_s=$room_s_2;  }
      }*/

 
      
      if($set_s==''){ $set_s='0';}

    $check_s=substr($project_s,0 , 1);

    if($check_s=='p'){

              $strSQL = "SELECT * FROM type_project where search_p_id='$project_s'   "; 
              $result=$conn->query($strSQL);  
              $rs_project = $result->fetch_assoc();

              $type_s=$rs_project['project_type'];
              $search_s=$rs_project['project_name_en'];
              $_SESSION['search_g_id']='';


    }else if($check_s=='z'){

              $strSQL = "SELECT * FROM type_zone where search_z_id='$project_s'   "; 
              $result=$conn->query($strSQL);  
              $rs_project = $result->fetch_assoc();

       
              $search_s=$rs_project['zone_name_en'];
              $_SESSION['search_g_id']='';

    }else if($check_s=='s'){

              $strSQL = "SELECT * FROM type_train_station where search_s_id='$project_s'   "; 
              $result=$conn->query($strSQL);  
              $rs_project = $result->fetch_assoc();

           
              $search_s=$rs_project['station_name_en'];
              $_SESSION['search_g_id']='';

    }                                            

              echo("<script> top.location.href='../search/$lang/$deal_s/$type_s/$project_s/$room_s/0/1'</script>");  

}else if($status=='group_zone'){

       $lang=$_GET['lang'];
       $_SESSION['search_g_id']=$_GET['search_g_id'];

              echo("<script> top.location.href='../search/$lang/0/0/0/s/0/1'</script>");  

}

//// กดค้นหา  ////

if($page_s=='search'){ 

  $_SESSION['sort_s']=$_POST['sort_s'];

  $search_s=$_POST['search_s'];
  $deal_s=$_POST['deal_s'];
  $type_s=$_POST['type_s'];
  $project_s=$_POST['project_s'];
  $room_s=$_POST['room_s'];
  $room_s_2=$_POST['room_s_2'];
  $size_min=$_POST['size_min'];
  $size_max=$_POST['size_max'];
  $price_min=$_POST['price_min'];
  $price_max=$_POST['price_max'];

  $_SESSION['size_min_c']=$size_min;
  $_SESSION['size_max_c']=$size_max;
  $_SESSION['price_min_c']=$price_min;
  $_SESSION['price_max_c']=$price_max;


    $check_s=substr($project_s,0 , 1);

      if($search_s==''){ $search_s='0';}

      if($deal_s==''){ 

            $deal_s='0';
            if($price_s==''){ $price_s='0'; } 

      }else if($deal_s=='1' or $deal_s=='2'){

            if($price_s_sale==''){
                 $price_s='0'; 
            }else{
                 $price_s=$price_s_sale;
            }

      }
      if($type_s==''){ 

           $type_s='all';
      
      }else if($type_s=='1'){  
         
       

      }else{   

        
      }


      if($project_s==''){ $project_s='0';}
  
 

    
  if($room_s==''){ $room_s='all';}else{ $room_s=$room_s;  }
 


  if($search_s=='0'){
      $search_s='all';
  } 
  if($deal_s=='0'){
      $deal_s='all';
  }
  if($type_s=='0'){
      $type_s='all';
  }
  if($project_s=='0'){
      $project_s='all';
  } 
  if($room_s_2=='0'){
      $room_s_2='all';
  }
  
 
 
      if($set_s==''){ $set_s='0';}
      


//https://connex.in.th/search/th/0/0/0//0/s/0/1
 
    if($check_s=='p'){

              $strSQL = "SELECT * FROM type_project where search_p_id='$project_s'   "; 
              $result=$conn->query($strSQL);  
              $rs_project = $result->fetch_assoc();

              $type_s=$rs_project['project_type'];
              $project_name=$rs_project['project_name'];
              $project_name_en=$rs_project['project_name_en'];
              $project_s=$rs_project['search_p_id'];

              if($lang=='th'){
                    $url_project_name=str_replace(" ","-",$project_name ,$count);                   
                    $url_project_name=strtolower($url_project_name); 
              }else{
                    $url_project_name=str_replace(" ","-",$project_name_en ,$count);                   
                    $url_project_name=strtolower($url_project_name); 
              }
 

    }else if($check_s=='z'){

              $strSQL = "SELECT * FROM type_zone where search_z_id='$project_s'   "; 
              $result=$conn->query($strSQL);  
              $rs_project = $result->fetch_assoc();

        
              $project_s=$rs_project['search_z_id'];
              $zone_name=$rs_project['zone_name'];
              $zone_name_en=$rs_project['zone_name_en'];

              if($lang=='th'){
                    $url_project_name=str_replace(" ","-",$zone_name ,$count);                   
                    $url_project_name=strtolower($url_project_name); 
              }else{
                    $url_project_name=str_replace(" ","-",$zone_name_en ,$count);                   
                    $url_project_name=strtolower($url_project_name); 
              }

    }else if($check_s=='s'){

              $strSQL = "SELECT * FROM type_train_station where search_s_id='$project_s'   "; 
              $result=$conn->query($strSQL);  
              $rs_project = $result->fetch_assoc();

       
              $project_s=$rs_project['search_s_id']; 
              $station_name=$rs_project['station_name'];
              $station_name_en=$rs_project['station_name_en'];

              if($lang=='th'){
                    $url_project_name=str_replace(" ","-",$station_name ,$count);                   
                    $url_project_name=strtolower($url_project_name); 
              }else{
                    $url_project_name=str_replace(" ","-",$station_name_en ,$count);                   
                    $url_project_name=strtolower($url_project_name); 
              }


    }else{
        $url_project_name="all";
    }

      $url_th= $baseUrl."/search/th/".$deal_s."/".$type_s."/".$project_s."/".$room_s."/".$search_s."/".$page_no;
 
              echo("<script> top.location.href='../search/$lang/$deal_s/$type_s/$project_s/$room_s/$url_project_name/1'</script>");   
 }



 









?>