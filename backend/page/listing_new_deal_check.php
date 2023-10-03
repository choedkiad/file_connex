<?php
 

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 

         $date=date("Y-m-d H:i:s");
         $status=$_POST['status'];
         $USER_ID=$_SESSION['USER_ID'];
         $listing=$_GET['listing'];         
         $calExpireDate=date ("Y-m-d", strtotime("+15 day", strtotime($today))); 



     $sql="SELECT listing.project_id , listing.ex_list_listing_code , listing.ex_list_sqm  , listing.ex_list_price  , listing.ex_list_bedroom , listing.ex_list_listing_status , listing.ex_list_rent_till_date , listing.ex_list_deal_type , listing.ex_list_listing_type  , pj.project_train_station  FROM dbo_data_excel_listing AS listing
           LEFT JOIN type_project AS pj on listing.project_id=pj.project_id
           where listing.ex_list_listing_code='$listing'  ";
     $result = $conn->query($sql); 
        // output data of each row
     $rs_listing = $result->fetch_assoc();

         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];
         $project_id=$rs_listing['project_id'];
         $ex_list_contract_type=$rs_listing['ex_list_contract_type'];
         $ex_list_contract_code=$rs_listing['ex_list_contract_code'];
         $ex_list_price=$rs_listing['ex_list_price'];
         $ex_list_deal_type=$rs_listing['ex_list_deal_type'];
         $ex_list_listing_type=$rs_listing['ex_list_listing_type'];
         $ex_list_listing_type_check=$rs_listing['ex_list_listing_type'];
         $ex_list_number_buildings=$rs_listing['ex_list_number_buildings'];
         $ex_list_floor=$rs_listing['ex_list_floor'];
         $ex_list_sqm=$rs_listing['ex_list_sqm'];
         $ex_list_bedroom=$rs_listing['ex_list_bedroom'];
         $ex_list_bathroom=$rs_listing['ex_list_bathroom'];

         $ex_list_listing_status=$rs_listing['ex_list_listing_status'];
         $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];
         $project_train_station=$rs_listing['project_train_station'];

         if($ex_list_bedroom=='0'){ $ex_list_bedroom=''; }


         echo "project_id : ".$project_id."<br>";
         echo "ex_list_sqm : ".$ex_list_sqm."<br>";
         echo "ex_list_price : ".$ex_list_price."<br>";
         echo "ex_list_bedroom : ".$ex_list_bedroom."<br>";
         echo "ex_list_listing_status : ".$ex_list_listing_status."<br>";
         echo "ex_list_deal_type : ".$ex_list_deal_type."<br>";
         echo "ex_list_listing_type : ".$ex_list_listing_type."<br>";
         echo "project_train_station : ".$project_train_station."<br>";         


         $sql_deal="SELECT * FROM dbo_create_deal  WHERE  
                     project_id='$project_id' and create_deal_sqm_start<=$ex_list_sqm and  create_deal_sqm_end>=$ex_list_sqm and
                     create_deal_budget_start<=$ex_list_price and  create_deal_budget_end>=$ex_list_price and
                     create_deal_bedroom='$ex_list_bedroom' and $ex_list_listing_status='1' and
                     create_deal_attention LIKE '%$ex_list_deal_type%' and 
                     create_deal_type LIKE '%$ex_list_listing_type%' 
                     or
                     project_id='$project_id' and create_deal_sqm_start<=$ex_list_sqm and  create_deal_sqm_end>=$ex_list_sqm and
                     create_deal_budget_start<=$ex_list_price and  create_deal_budget_end>=$ex_list_price and
                     create_deal_bedroom='$ex_list_bedroom' and $ex_list_listing_status='3' and $ex_list_rent_till_date<=$calExpireDate and 
                     create_deal_attention LIKE '%$ex_list_deal_type%' and 
                     create_deal_type LIKE '%$ex_list_listing_type%'  
                     or
                     project_id='$project_id' and create_deal_sqm_start<=$ex_list_sqm and  create_deal_sqm_end>=$ex_list_sqm and
                     create_deal_budget_start<=$ex_list_price and  create_deal_budget_end>=$ex_list_price and
                     create_deal_bedroom='$ex_list_bedroom' and $ex_list_listing_status='7' and
                     create_deal_attention LIKE '%$ex_list_deal_type%' and 
                     create_deal_type LIKE '%$ex_list_listing_type%' 

                     ";  
          $result_deal = $conn->query($sql_deal);

        if($result_deal->num_rows > 0) { //num_rows
        // output data of each row
             while($rs_deal=$result_deal->fetch_assoc()) { $i++;


                   $create_deal_code=$rs_deal['create_deal_code'];
                   $create_deal_search_from=$rs_deal['create_deal_search_from'];
                   $create_deal_budget_start=$rs_deal['create_deal_budget_start'];
                   $create_deal_budget_end=$rs_deal['create_deal_budget_end'];
                   $create_deal_sqm_start=$rs_deal['create_deal_sqm_start'];
                   $create_deal_sqm_end=$rs_deal['create_deal_sqm_end'];

                    $sql_1="INSERT INTO dbo_listing_new_deal_check ( listing_new_deal_check_id ,ex_list_listing_code , project_id , station_id , zone_id , listing_new_deal_check_status , listing_new_deal_check_view, create_deal_code, create_deal_search_from , listing_new_deal_check_date   )
 
                    VALUES ( '','$ex_list_listing_code' , '$project_id' , '$project_train_station' , '$zone_id' , '1', '1' , '$create_deal_code' , '$create_deal_search_from' , '$date' )";
                     mysqli_query($conn, $sql_1);   

                     echo "create_deal_budget_start : ".$create_deal_budget_start."<=".$ex_list_price."<br>"; 
                     echo "create_deal_budget_end : ".$create_deal_budget_end.">=".$ex_list_price."<br>"; 
                     echo "create_deal_sqm_start : ".$create_deal_sqm_start."<=".$ex_list_sqm."<br>"; 
                     echo "create_deal_sqm_end : ".$create_deal_sqm_end.">=".$ex_list_sqm."<br>"; 
             }

        }

        
   if($project_train_station!='0'){

         $sql_deal_2="SELECT * FROM dbo_create_deal  WHERE                      
                     station_id='$project_train_station' and
                     create_deal_budget_start<=$ex_list_price and  create_deal_budget_end>=$ex_list_price and
                     create_deal_bedroom='$ex_list_bedroom' and $ex_list_listing_status='1' and
                     create_deal_attention LIKE '%$ex_list_deal_type%' and 
                     create_deal_type='$ex_list_listing_type' 
                     or     
                     station_id='$project_train_station' and              
                     create_deal_budget_start<=$ex_list_price and  create_deal_budget_end>=$ex_list_price and
                     create_deal_bedroom='$ex_list_bedroom' and $ex_list_listing_status='3' and $ex_list_rent_till_date<=$calExpireDate and 
                     create_deal_attention LIKE '%$ex_list_deal_type%' and 
                     create_deal_type='$ex_list_listing_type' 
                     or 
                     station_id='$project_train_station' and                  
                     create_deal_budget_start<=$ex_list_price and  create_deal_budget_end>=$ex_list_price and
                     create_deal_bedroom='$ex_list_bedroom' and $ex_list_listing_status='7' and
                     create_deal_attention LIKE '%$ex_list_deal_type%' and 
                     create_deal_type='$ex_list_listing_type' 

                     ";  
          $result_deal = $conn->query($sql_deal_2);

        if($result_deal->num_rows > 0) { //num_rows
        // output data of each row
             while($rs_deal=$result_deal->fetch_assoc()) { $i++;

                   $create_deal_code=$rs_deal['create_deal_code'];
                   $create_deal_search_from=$rs_deal['create_deal_search_from'];

                    $sql_2="INSERT INTO dbo_listing_new_deal_check ( listing_new_deal_check_id ,ex_list_listing_code, project_id  , station_id , zone_id , listing_new_deal_check_status , listing_new_deal_check_view, create_deal_code, create_deal_search_from , listing_new_deal_check_date   )
 
                    VALUES ( '','$ex_list_listing_code' , '$project_id' , '$project_train_station' , '$zone_id' , '2', '1' , '$create_deal_code' , '$create_deal_search_from' , '$date' )";
                     mysqli_query($conn, $sql_2);   

                     echo "create_deal_budget_start : ".$create_deal_budget_start."<=".$ex_list_price."<br>"; 
                     echo "create_deal_budget_end : ".$create_deal_budget_end.">=".$ex_list_price."<br>"; 
                     echo "create_deal_sqm_start : ".$create_deal_sqm_start."<=".$ex_list_sqm."<br>"; 
                     echo "create_deal_sqm_end : ".$create_deal_sqm_end.">=".$ex_list_sqm."<br>"; 
 
             }

        }

    }
?>

<script type="text/javascript">
  window.close(); 
</script>






