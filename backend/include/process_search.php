<?php


  session_start();  
 
 $page=$_POST['page'];

if($page=='deal_buyer'){

     $p=$_POST['p'];
     $date_start=$_POST['date_start'];
     $date_end=$_POST['date_end'];
     $day_check=$_POST['day_check'];

     $month_u=substr($date_start,3 , 2);
     $year_u=substr($date_start,6 , 4 ); 
     $date_u=substr($date_start,0, 2 );
     $date_start_u=$year_u."-".$month_u."-".$date_u." 00:00:00";


     $month_u=substr($date_end,3 , 2);
     $year_u=substr($date_end,6 , 4 ); 
     $date_u=substr($date_end,0, 2 );
     $date_end_u=$year_u."-".$month_u."-".$date_u." 23:59:59";


      if($p=='report_case_won' or $p=='report_conversion'  or $p=='report_see_number' or $p=='report_market'  ){ 


           echo("<script> top.location.href='../?page=deal_buyer&status=report_case&p=$p&date_start=$date_start_u&date_end=$date_end_u'</script>"); 
      }else if($p==''){ 


           echo("<script> top.location.href='../?page=deal_buyer&status=report_case&day_check=$day_check'</script>"); 
      }





}else{

/*
if($page=='upload_file_excel_check'){

    unset($_SESSION['sqm_low']);
    unset($_SESSION['sqm_maximum']);
    unset($_SESSION['price_low']);
    unset($_SESSION['price_maximum']);

   echo("<script> top.location.href='../?page=upload_file_excel_check'</script>");      

}else{ */
      $p=$_POST['p'];
      $search=$_POST['search'];
   // $_SESSION['type']=$_POST['type'];
   // $_SESSION['deal']=$_POST['deal'];
      $type=$_POST['type'];
      $deal=$_POST['deal']; 
      $zone=$_POST['zone'];
      $project=$_POST['project'];
      $station=$_POST['station']; 
      $sort_data=$_POST['sort_data'];
       
      $values = $_POST['list_bts'];
      $bedroom=$_POST['bedroom'];
      $sqm_low=$_POST['sqm_low'];
      $sqm_maximum=$_POST['sqm_maximum'];
      $price_low=$_POST['price_low'];
      $price_maximum=$_POST['price_maximum'];
      $project=$_POST['project'];
      $listing_status=$_POST['listing_status'];
      $house_number=$_POST['house_number'];
      $list_floor=$_POST['list_floor'];
      $list_bts=$_POST['list_bts'];
      $score_img=$_POST['score_img'];
      $bargain=$_POST['bargain'];
      $request_pm=$_POST['request_pm'];

    foreach ($values as $a){
        $list_bts_ype=$a.",".$list_bts_ype;
    }

    echo $list_bts_ype;
 
      if($page=='log_listing'){

          echo("<script> top.location.href='../?page=log_listing&search=$search&p=$p&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&project=$project&type=$type&deal=$deal&bedroom=$bedroom&house_number=$house_number&list_floor=$list_floor&list_bts=$list_bts&listing_status=$listing_status&bargain=$bargain&score_img=$score_img&sort_data=$sort_data&page_no=1'</script>");
          
      }else if($page=='log_project'){

          echo("<script> top.location.href='../?page=log_project&search=$search&p=$p&type=$type&station=$station&zone=$zone&deal=$deal&project=$project&sort_data=$sort_data&page_no=1'</script>");

      }else if($page=='project'){
          echo("<script> top.location.href='../?page=project&search=$search&p=$p&type=$type&station=$station&zone=$zone&deal=$deal&project=$project&sort_data=$sort_data&page_no=1'</script>");

      }else{
   
          echo("<script> top.location.href='../?page=upload_file_excel_check&search=$search&p=$p&sqm_low=$sqm_low&sqm_maximum=$sqm_maximum&price_low=$price_low&price_maximum=$price_maximum&project=$project&type=$type&deal=$deal&bedroom=$bedroom&house_number=$house_number&list_floor=$list_floor&list_bts=$list_bts&listing_status=$listing_status&bargain=$bargain&request_pm=$request_pm&score_img=$score_img&sort_data=$sort_data&page_no=1'</script>");  
      }


  }