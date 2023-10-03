

<meta http-equiv="refresh" content="10;url=../backend/?page=update_count"/>
	 <?php
												// Check connection
 
		 if ($conn->connect_error) {
    		 die("Connection failed: " . $conn->connect_error);
	     }

		 $no=0;

		 $date_count=date("Y-m-d");

		 $sql="SELECT * FROM type_project where project_listing_count_update!='$date_count' order by project_id  DESC LIMIT 20 ";  
		 $result = $conn->query($sql);

		 if($result->num_rows > 0) {
    	  // output data of each row
    		 while($rs_listing=$result->fetch_assoc()) {  




                      $project_id=$rs_listing['project_id'];
                      $project_name=$rs_listing['project_name'];


     /////////// project แบบร่าง ////////////////
             $sql_proj="SELECT * FROM dbo_data_excel_listing where project_id='$project_id' and ex_list_close='0' ";  
             $result_proj= $conn->query($sql_proj);
             $list_count=mysqli_num_rows($result_proj);

     /////////// ขาย และ แบบร่าง /////////////
             $sql_proj_d_1="SELECT * FROM dbo_data_excel_listing where project_id='$project_id' and ex_list_close='0' and ex_list_deal_type='1' ";  
             $result_proj_d_1= $conn->query($sql_proj_d_1);
             $list_count_deal_1=mysqli_num_rows($result_proj_d_1);
     ///////////////////////////////////////

     /////////// เช่า และ แบบร่าง /////////////
             $sql_proj_d_2="SELECT * FROM dbo_data_excel_listing where project_id='$project_id' and ex_list_close='0' and ex_list_deal_type='2' ";  
             $result_proj_d_2= $conn->query($sql_proj_d_2);
             $list_count_deal_2=mysqli_num_rows($result_proj_d_2);
     ///////////////////////////////////////

     /////////// public /////////////
             $sql_proj_1="SELECT * FROM dbo_data_excel_listing where project_id='$project_id' and ex_list_close='0' and ex_list_public='1' ";  
             $result_proj_1= $conn->query($sql_proj_1);
             $list_count_public=mysqli_num_rows($result_proj_1);

     /////////// ขาย และ public /////////////
             $sql_proj_public_sale="SELECT * FROM dbo_data_excel_listing where project_id='$project_id' and ex_list_close='0' and ex_list_public='1' and ex_list_deal_type='1' ";  
             $result_public_sale= $conn->query($sql_proj_public_sale);
             $list_count_public_sale=mysqli_num_rows($result_public_sale);
     ///////////////////////////////////////

     /////////// เช่า และ public /////////////
             $sql_proj_public_rent="SELECT * FROM dbo_data_excel_listing where project_id='$project_id' and ex_list_close='0' and ex_list_public='1' and ex_list_deal_type='2' ";  
             $result_public_rent= $conn->query($sql_proj_public_rent);
             $list_count_public_rent=mysqli_num_rows($result_public_rent);
     ///////////////////////////////////////


     /////////// เช็คราคาขาย ////////////////
             /*
             $sql_min="SELECT MIN(ex_list_price) AS SmallestPrice FROM dbo_data_excel_listing 
                        WHERE project_id='$project_id' and ex_list_deal_type='2' and ex_list_close='0' ";  
             $result_min= $conn->query($sql_min);
             $list_min=mysqli_num_rows($result_min);

             $price_min=$list_min['SmallestPrice'];*/
 
          
      ////////// End type_asset ////////////////


                  $sql1 = "UPDATE type_project SET  
                           project_listing_count='".$list_count."',
                           project_listing_count_sale='".$list_count_deal_1."',
                           project_listing_count_rent='".$list_count_deal_2."',
                           project_listing_count_public='".$list_count_public."',
                           project_listing_count_public_sale='".$list_count_public_sale."',
                           project_listing_count_public_rent='".$list_count_public_rent."',
                           project_listing_count_update='".$date_count."'  
                           WHERE project_id ='".$project_id."' ";  
                   $conn->query($sql1);



                   

                    
                   echo "Project : ".$project_name." - COUNT : ".$list_count." - PUBLIC : ".$list_count." เช่า MIN ".$price_min."<br>";

              }
          }