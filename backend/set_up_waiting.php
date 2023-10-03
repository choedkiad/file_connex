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



 //////////////////////// SET จุดเด่น ////////////////////////////////////

		 $sql="SELECT * FROM dbo_data_excel_listing where ex_list_pm_status!='' order by ex_list_bargain_date DESC   " ;
         $result = $conn->query($sql); 
         while($rs_listing=$result->fetch_assoc()) { 

   /*
         $sql="SELECT * FROM dbo_data_excel_listing   order by ex_list_id ASC   " ;
         $result = $conn->query($sql); 
         while($rs=$result->fetch_assoc()) {  */
            
            $ex_list_bargain=$rs_listing['ex_list_bargain'];  
        	$ex_list_bargain_date=$rs_listing['ex_list_bargain_date'];  
        	$ex_list_pm_status=$rs_listing['ex_list_pm_status']; 
            $ex_list_pm_waiting=$rs_listing['ex_list_pm_waiting'];
            $ex_list_listing_code=$rs_listing['ex_list_listing_code']; 
       


                if($ex_list_listing_code!=''){

                    
                    $sqls = "UPDATE dbo_data_excel_listing SET  
                                            ex_list_pm_waiting='".$ex_list_bargain."'  
                                            WHERE ex_list_listing_code='".$ex_list_listing_code."' "; 
                            mysqli_query($conn, $sqls);   


                    echo $ex_list_listing_code." - ".$ex_list_bargain." : ".$ex_list_pm_waiting."<br>"; 


                }


       

        }





?>