<meta http-equiv="refresh" content="10;url=https://connex.in.th/backend2/set_up_date_rent_till.php"/>


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

		 $sql="SELECT * FROM dbo_data_excel_listing where  ex_list_rent_till!='' and ex_list_rent_till_date='0000-00-00' order by ex_list_id ASC  LIMIT 100  " ;
         $result = $conn->query($sql); 
         while($rs_listing=$result->fetch_assoc()) { 

   /*
         $sql="SELECT * FROM dbo_data_excel_listing   order by ex_list_id ASC   " ;
         $result = $conn->query($sql); 
         while($rs=$result->fetch_assoc()) {  */

         $ex_list_id=$rs_listing['ex_list_id'];  
         $ex_list_listing_code=$rs_listing['ex_list_listing_code'];  
         $ex_list_rent_till=$rs_listing['ex_list_rent_till'];  
         $ex_list_rent_till_date=$rs_listing['ex_list_rent_till_date'];  
         
 
        $year=substr($ex_list_rent_till,6 , 4 );
        $month=substr($ex_list_rent_till,3 , 2 );
        $day=substr($ex_list_rent_till,0 , 2 );



                if($ex_list_id!=''){

                     $date_up=$year."-".$month."-".$day;

                    
                    $sqls = "UPDATE dbo_data_excel_listing SET  
                                            ex_list_rent_till_date='".$date_up."'  
                                            WHERE ex_list_id='".$ex_list_id."' "; 
                            mysqli_query($conn, $sqls);   


                    echo $ex_list_listing_code." : ".$ex_list_id." แปลง ".$ex_list_rent_till." date : ".$date_up."<br>"; 


                }


       

        }





?>