<?php   

 


		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }
		 $sql_1="SELECT * FROM dbo_data_excel_listing where ex_list_listing_code='$id' ";
		 $result_1=$conn->query($sql_1); 
    	  // output data of each row
         $rs_1=$result_1->fetch_assoc();

         $ex_list_listing_code=$rs_1['ex_list_listing_code'];
         $ex_list_deal_type=$rs_1['ex_list_deal_type'];
       


		 $sql_img="SELECT * FROM dbo_data_excel_listing_img where ex_list_listing_code='$id' order by listing_img_no ASC ";
		 $result_img = $conn->query($sql_img); 
    	  // output data of each row 


?>