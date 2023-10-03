

<?php


$date_update=date("Y-m-d H:i:s");
  

   isset( $_POST['today'] ) ? $today = $_POST['today'] : $today = ""; 
   isset( $_POST['status'] ) ? $status = $_POST['status'] : $status = ""; 
   isset( $_POST['number'] ) ? $number = $_POST['number'] : $number = ""; 
 
  // $calExpireDate=date ("Y-m-d", strtotime("-1 day", strtotime($today)));

   isset( $_GET['number_check'] ) ? $number_check = $_GET['number_check'] : $number_check = ""; 
   isset( $_GET['date_check'] ) ? $date_check = $_GET['date_check'] : $date_check = ""; 
   isset( $_GET['status_get'] ) ? $status_get = $_GET['status_get'] : $status_get = ""; 

  if($number_check!='' and $date_check!=''){
      
      $status=$status_get;
      $today=$date_check;
      $number=$number_check;
  } 



 


if($status=='1'){  //Update จำนวนแก้ไขทรัพย์
 

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0'  "; 
        $result_register=$conn->query($sql_register);
        while($rs_register=$result_register->fetch_assoc()){ 
            
            $register_id=$rs_register['register_id'];

            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;

            $sql_record= "SELECT DISTINCT  ex_list_id  FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' "; 
            $result_record=$conn->query($sql_record);
            $rs_record=$result_record->fetch_assoc();

            $count_record=$result_record->num_rows;


            if($count_account!='0'){

                     $sql_update= "UPDATE report_account SET   
                                        edit_listing='".$count_record."',
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, edit_listing , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record' , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }


      }
      /*
      echo("<script> top.location.href='?page=update_log&today=$calExpireDate&status=$status&check=1'</script>");  */
      echo("<script> top.location.href='?page=update_log'</script>");  

}else if($status=='2'){  //Update จำนวนแก้ไขทรัพย์
 

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0'  "; 
        $result_register=$conn->query($sql_register);
        while($rs_register=$result_register->fetch_assoc()){ 
            
            $register_id=$rs_register['register_id'];

            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;
       /*
            $sql_record= "SELECT DISTINCT  ex_list_id  FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%ทำการเพิ่ม Listing%' and record_remark='1' "; 
            $result_record=$conn->query($sql_record);
            $rs_record=$result_record->fetch_assoc();

            $count_record=$result_record->num_rows;
      */

			 $sql_record_sum= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
			                            WHERE ex_list_date_create LIKE '%$today%'  and  ex_list_contact='$register_id'    "; 
			 $result_record_sum=$conn->query($sql_record_sum);
			 $rs_record_sum=$result_record_sum->fetch_assoc();
			 $count_record=$result_record_sum->num_rows;

            if($count_account!='0'){

                     $sql_update= "UPDATE report_account SET   
                                        create_listing='".$count_record."',
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, create_listing , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record' , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }


      }
      
      /*
      echo("<script> top.location.href='?page=update_log&today=$calExpireDate&status=$status&check=1'</script>");  */
      echo("<script> top.location.href='?page=update_log'</script>");  

}else if($status=='3'){  // คลิกดูเบอร์
 

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0'  "; 
        $result_register=$conn->query($sql_register);
        while($rs_register=$result_register->fetch_assoc()){ 
            
            $register_id=$rs_register['register_id'];

            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;

            $sql_record= "SELECT DISTINCT  ex_list_id  FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%คลิกดูเบอร์ Owner%' and record_remark='tel' "; 
            $result_record=$conn->query($sql_record);
            $rs_record=$result_record->fetch_assoc();

            $count_record=$result_record->num_rows;


            if($count_account!='0'){

                     $sql_update= "UPDATE report_account SET   
                                        see_number='".$count_record."',
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, see_number , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record' , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }


      }
      
      /*
      echo("<script> top.location.href='?page=update_log&today=$calExpireDate&status=$status&check=1'</script>");  */
      echo("<script> top.location.href='?page=update_log'</script>");  

}else if($status=='4'){  // เพิ่มภาพประกอบ
 

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0'  "; 
        $result_register=$conn->query($sql_register);
        while($rs_register=$result_register->fetch_assoc()){ 
            
            $register_id=$rs_register['register_id'];

            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;

            $sql_record= "SELECT DISTINCT  ex_list_id FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%เพิ่มภาพประกอบ รหัสทรัพย์%'   "; 
            $result_record=$conn->query($sql_record);
            $rs_record=$result_record->fetch_assoc();

            $count_record=$result_record->num_rows;


            if($count_account!='0'){

                     $sql_update= "UPDATE report_account SET   
                                        upload_images='".$count_record."',
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, upload_images , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record' , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }


      }
      
      /*
      echo("<script> top.location.href='?page=update_log&today=$calExpireDate&status=$status&check=1'</script>");  */
      echo("<script> top.location.href='?page=update_log'</script>");  

}else if($status=='5'){ // รวมทั้งหมด
 

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0' and register_number!='$number' LIMIT 1   "; 
        $result_register=$conn->query($sql_register);

       if($result_register->num_rows > 0) {

         $rs_register=$result_register->fetch_assoc(); 
            
            $register_id=$rs_register['register_id'];
            $register_name=$rs_register['register_name'];
            $register_lastname=$rs_register['register_lastname'];
            $register_nickname=$rs_register['register_nickname'];


            echo "กำลังอัพเดทข้อมูล".$register_id."-".$register_name." (".$register_nickname.") "." | ".$today." - ".$number;

            ///////////// อัพเดท ////////////////
                     $sql_register= "UPDATE dbo_register SET   
                                        register_number='".$number."' 
                                        WHERE register_id='".$register_id."'     "; 
                     mysqli_query($conn , $sql_register); 

            ///////////// END อัพเดท ////////////////


            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;

            $sql_record_1= "SELECT DISTINCT  ex_list_id  FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' "; 
            $result_record_1=$conn->query($sql_record_1);
            $rs_record_1=$result_record_1->fetch_assoc();
            $count_record_1=$result_record_1->num_rows;


      			 $sql_record_2= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
      			                            WHERE ex_list_date_create LIKE '%$today%'  and  ex_list_contact='$register_id'    "; 
      			 $result_record_2=$conn->query($sql_record_2);
      			 $rs_record_2=$result_record_2->fetch_assoc();
      			 $count_record_2=$result_record_2->num_rows;
			/* 
            $sql_record_2= "SELECT DISTINCT  ex_list_id  FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%ทำการเพิ่ม Listing%' and record_remark='1' "; 
            $result_record_2=$conn->query($sql_record_2);
            $rs_record_2=$result_record_2->fetch_assoc(); 
            $count_record_2=$result_record_2->num_rows; */


            $sql_record_3= "SELECT DISTINCT  ex_list_id  FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%คลิกดูเบอร์ Owner%' and record_remark='tel' "; 
            $result_record_3=$conn->query($sql_record_3);
            $rs_record_3=$result_record_3->fetch_assoc();
            $count_record_3=$result_record_3->num_rows;

            $sql_record_4= "SELECT DISTINCT  ex_list_id FROM dbo_record WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and record_note LIKE '%เพิ่มภาพประกอบ รหัสทรัพย์%'   "; 
            $result_record_4=$conn->query($sql_record_4);
            $rs_record_4=$result_record_4->fetch_assoc();
            $count_record_4=$result_record_4->num_rows;
 

            $sql_record_5= "SELECT DISTINCT  ex_list_id  FROM dbo_record 
                           WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='1' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='3' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='4' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='5' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='6' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='15' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' "; 
            $result_record_5=$conn->query($sql_record_5);
            $rs_record_5=$result_record_5->fetch_assoc();
            $count_record_5=$result_record_5->num_rows;


           //  Update  Listing ที่ได้ public ไม่รวมที่สร้าง
            $sql_record_6= "SELECT DISTINCT  record.ex_list_id  
                            FROM dbo_record AS record
                            LEFT JOIN dbo_data_excel_listing AS listing ON (record.ex_list_id=listing.ex_list_listing_code)
                            WHERE listing.ex_list_public_date LIKE '%$today%' and record.record_date LIKE '%$today%' and record.record_user_id='$register_id'  and 
                                  record.record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%'   "; 
            $result_record_6=$conn->query($sql_record_6);            
            $count_record_6=$result_record_6->num_rows; 
            while($rs_record_6=$result_record_6->fetch_assoc()){

            	   $ex_list_id=$rs_record_6['ex_list_id'];
			

			            $sql_record_sum= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
			                            WHERE ex_list_public_date LIKE '%$today%'  and  ex_list_contact='$register_id' and ex_list_public='1'  and  ex_list_listing_code='$ex_list_id'   "; 
			            $result_record_sum=$conn->query($sql_record_sum);
			            $rs_record_sum=$result_record_sum->fetch_assoc();
			            $count_record_sum=$result_record_sum->num_rows;
			                        
                        $count_record_6=$count_record_6-$count_record_sum;
 
            } 
 


            $sql_record_8= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
                            WHERE ex_list_public_date LIKE '%$today%'  and  ex_list_contact='$register_id' and ex_list_public='1' and ex_list_close='0'  "; 
            $result_record_8=$conn->query($sql_record_8);
            $rs_record_8=$result_record_8->fetch_assoc();
            $count_record_8=$result_record_8->num_rows;

          //จำนวนโดนลบ LISTING
            $sql_record_9= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
                            WHERE ex_list_date_create LIKE '%$today%'  and  ex_list_contact='$register_id'  and ex_list_close='1'  "; 
            $result_record_9=$conn->query($sql_record_9);
            $rs_record_9=$result_record_9->fetch_assoc();
            $count_record_9=$result_record_9->num_rows;

          //จำนวนการสร้าง Deal
            $sql_record_10= "SELECT   create_deal_code FROM   dbo_create_deal  
                            WHERE create_deal_create LIKE '%$today%'  and  user_id='$register_id'  "; 
            $result_record_10=$conn->query($sql_record_10);
            $rs_record_10=$result_record_10->fetch_assoc();
            $count_record_10=$result_record_10->num_rows;

          //จำนวนที่เสนอห้อง   
            $sql_record_11= "SELECT  subdeal_code  FROM   dbo_subdeal  
                            WHERE subdeal_create_date LIKE '%$today%'  and  user_id='$register_id' "; 
            $result_record_11=$conn->query($sql_record_11);
            $rs_record_11=$result_record_11->fetch_assoc();
            $count_record_11=$result_record_11->num_rows;


            if($count_account!='0'){

                     $sql_update= "UPDATE report_account SET   
                                        edit_listing='".$count_record_1."',
                                        create_listing='".$count_record_2."',
                                        see_number='".$count_record_3."',
                                        upload_images='".$count_record_4."',
                                        contact_listing='".$count_record_5."',
                                        listing_public='".$count_record_6."',
                                        create_listing_public='".$count_record_8."',
                                        delete_listing='".$count_record_9."',
                                        create_deal='".$count_record_10."',
                                        create_subdeal='".$count_record_11."',
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, edit_listing , create_listing , see_number , upload_images , contact_listing , listing_public, create_listing_public , delete_listing , create_deal , create_subdeal , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record_1'  , '$count_record_2'  , '$count_record_3'  , '$count_record_4' , '$count_record_5' , '$count_record_6' , '$count_record_8' , '$count_record_9' , '$count_record_10' , '$count_record_11' , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }


          echo("<script> top.location.href='?page=update_log&number_check=$number&date_check=$today&status_get=5'</script>");     

      }else{

          echo("<script> top.location.href='?page=update_log'</script>");          
      }
      /*
      echo("<script> top.location.href='?page=update_log&today=$calExpireDate&status=$status&check=1'</script>");  */


}else if($status=='6'){ // contact_listing โทรติดต่อได้ สถานะ Available , Rented , Sold(by Connex) , Sold(by Others) , own use , Under Renovation 
 

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0'  "; 
        $result_register=$conn->query($sql_register);
        while($rs_register=$result_register->fetch_assoc()){ 
            
            $register_id=$rs_register['register_id'];

            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;

            $sql_record_5= "SELECT DISTINCT  ex_list_id  FROM dbo_record 
                           WHERE record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='1' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='3' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='4' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='5' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='6' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' or 
                                 record_date LIKE '%$today%'  and record_user_id='$register_id' and ex_list_listing_status='15' and record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%' "; 
            $result_record_5=$conn->query($sql_record_5);
            $rs_record_5=$result_record_5->fetch_assoc();
            $count_record_5=$result_record_5->num_rows;
 


            if($count_account!='0'){

                     $sql_update="UPDATE report_account SET   
                                        contact_listing='".$count_record_5."', 
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, contact_listing , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record_5'  , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }


      }
      
      /*
      echo("<script> top.location.href='?page=update_log&today=$calExpireDate&status=$status&check=1'</script>");  */
      echo("<script> top.location.href='?page=update_log'</script>");  

}else if($status=='7'){ // listing_public  Listing ที่ได้ public 
 

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0' and  register_id='45' "; 
        $result_register=$conn->query($sql_register);
        while($rs_register=$result_register->fetch_assoc()){ 
            
            $register_id=$rs_register['register_id'];
            $register_name=$rs_register['register_name'];

            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;

 

 
            $sql_record_6= "SELECT DISTINCT  record.ex_list_id  
                            FROM dbo_record AS record
                            LEFT JOIN dbo_data_excel_listing AS listing ON (record.ex_list_id=listing.ex_list_listing_code)
                            WHERE listing.ex_list_public_date LIKE '%$today%' and record.record_date LIKE '%$today%' and record.record_user_id='$register_id'  and 
                                  record.record_note LIKE '%ดำเนินการแก้ไข/อัพเดท สถานะ Listing%'   "; 
            $result_record_6=$conn->query($sql_record_6);            
            $count_record_6=$result_record_6->num_rows; 
            while($rs_record_6=$result_record_6->fetch_assoc()){

            	   $ex_list_id=$rs_record_6['ex_list_id'];
			

			            $sql_record_sum= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
			                            WHERE ex_list_public_date LIKE '%$today%'  and  ex_list_contact='$register_id' and ex_list_public='1'  and  ex_list_listing_code='$ex_list_id'   "; 
			            $result_record_sum=$conn->query($sql_record_sum);
			            $rs_record_sum=$result_record_sum->fetch_assoc();
			            $count_record_sum=$result_record_sum->num_rows;
			                        
                        $count_record_6=$count_record_6-$count_record_sum;



                        echo $ex_list_id."<br>";
            } 
 

            $sql_record_8= "SELECT  ex_list_listing_code FROM   dbo_data_excel_listing  
                            WHERE ex_list_public_date LIKE '%$today%'  and  ex_list_contact='$register_id' and ex_list_public='1' and ex_list_close='0'  "; 
            $result_record_8=$conn->query($sql_record_8);
            $rs_record_8=$result_record_8->fetch_assoc();
            $count_record_8=$result_record_8->num_rows;

            echo $register_id." ".$register_name." ".$count_record_6." - ".$count_record_8."<br>";
 
 
/*
            if($count_account!='0'){

                     $sql_update="UPDATE report_account SET   
                                        listing_public='".$count_record_6."', 
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, listing_public , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record_6'  , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }  
 */

      }
      
   //   echo("<script> top.location.href='?page=update_log&today=$calExpireDate&status=$status&check=1'</script>"); 

}else if($status=='8'){ // create_listing_public จำนวนการสร้าง ที่ได้ public 

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0'  "; 
        $result_register=$conn->query($sql_register);
        while($rs_register=$result_register->fetch_assoc()){ 
            
            $register_id=$rs_register['register_id'];

            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;

            $sql_record_8= "SELECT DISTINCT  ex_list_listing_code 
                            FROM   dbo_data_excel_listing  
                            WHERE ex_list_date_create LIKE '%$today%'  and  ex_list_contact='$register_id' and ex_list_public='1'   "; 
            $result_record_8=$conn->query($sql_record_8);
            $rs_record_8=$result_record_8->fetch_assoc();
            $count_record_8=$result_record_8->num_rows;
 


            if($count_account!='0'){

                     $sql_update="UPDATE report_account SET   
                                        create_listing_public='".$count_record_8."', 
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, create_listing_public , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record_8'  , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }


      }
      
      /*
      echo("<script> top.location.href='?page=update_log&today=$calExpireDate&status=$status&check=1'</script>");  */
      echo("<script> top.location.href='?page=update_log'</script>");  

}else if($status=='9'){ // delete_listing จำนวนListing ที่สร้างโดนลบ

       

 
}else if($status=='10'){ // create_deal   จำนวนการสร้าง DEAL

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0'  "; 
        $result_register=$conn->query($sql_register);
        while($rs_register=$result_register->fetch_assoc()){ 
            
            $register_id=$rs_register['register_id'];

            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;

            $sql_record_10= "SELECT   create_deal_code FROM   dbo_create_deal  
                            WHERE create_deal_create LIKE '%$today%'  and  user_id='$register_id'  "; 
            $result_record_10=$conn->query($sql_record_10);
            $rs_record_10=$result_record_10->fetch_assoc();
            $count_record_10=$result_record_10->num_rows;
 


            if($count_account!='0'){

                     $sql_update="UPDATE report_account SET   
                                        create_deal='".$count_record_10."', 
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, create_deal , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record_10'  , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }


      }
      
      /*
      echo("<script> top.location.href='?page=update_log&today=$calExpireDate&status=$status&check=1'</script>");  */
      echo("<script> top.location.href='?page=update_log'</script>");  

}else if($status=='11'){ // create_subdeal   	จำนวนที่เสนอห้อง

        $sql_register= "SELECT * FROM dbo_register WHERE register_lcok='0'  "; 
        $result_register=$conn->query($sql_register);
        while($rs_register=$result_register->fetch_assoc()){ 
            
            $register_id=$rs_register['register_id'];

            $sql_report_account= "SELECT * FROM report_account WHERE report_account_date LIKE '%$today%'  and register_id='$register_id' "; 
            $result_report_account=$conn->query($sql_report_account);  
            $count_account=$result_report_account->num_rows;

            $sql_record_11= "SELECT  subdeal_code  FROM   dbo_subdeal  
                            WHERE subdeal_create_date LIKE '%$today%'  and  user_id='$register_id' "; 
            $result_record_11=$conn->query($sql_record_11);
            $rs_record_11=$result_record_11->fetch_assoc();
            $count_record_11=$result_record_11->num_rows;
 


            if($count_account!='0'){

                     $sql_update="UPDATE report_account SET   
                                        create_subdeal='".$count_record_11."', 
                                        report_account_update='".$date_update."'
                                        WHERE register_id='".$register_id."'  and  report_account_date LIKE '%$today%'   "; 
                     mysqli_query($conn , $sql_update);  

            }else{

                   $sql_1="INSERT INTO report_account (report_account_id , register_id, report_account_date, create_subdeal , report_account_update ) 
                   VALUES ('', '$register_id', '$today' , '$count_record_11'  , '$date_update' )";
                   mysqli_query($conn, $sql_1);  

            }


      }
      /*
      echo("<script> top.location.href='?page=update_log&today=$calExpireDate&status=$status&check=1'</script>");  */
      echo("<script> top.location.href='?page=update_log'</script>");  
}

?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>
              <!-- /.card-header --> 
              <!-- form start -->
              <form action="?page=update_log" method="post" enctype="multipart/form-data" name="form1">
         
             <input type="text" class="form-control" name="page"  value="<?php echo $_GET['page'];?>" hidden="hidden">

              <div class="col-md-12"><br>

                 <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-4 col-form-label">เลือกข้อมูล : </label>
                     <div class="col-sm-8">
                        <select class="form-control select2bs4"  name="status" style="width: 100%;" required> 
                          <option value="">ไม่เลือก</option>  
                          <option value="1">Update จำนวนแก้ไขทรัพย์</option>   
                          <option value="2">Update ทำการเพิ่ม Listing</option>
                          <option value="3">คลิกดูเบอร์</option>   
                          <option value="4">เพิ่มภาพประกอบ</option>   
                          <option value="6">Update โทรติดต่อได้ สถานะ Available , Rented , Under Renovation  </option>   
                          <option value="7">Update  Listing ที่ได้ public ไม่รวมที่สร้าง</option>  
                          <option value="8">Update จำนวนการสร้าง ที่ได้ public </option>
                          <option value="9">จำนวนListing ที่สร้างโดนลบ  </option>   
                          <option value="10">จำนวนการสร้าง Deal </option>  
                          <option value="11">จำนวนที่เสนอห้อง</option>  
                          <option value="5">รวมทั้งหมด</option>      
                        </select>
                     </div>  
                  </div> 
                  <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-4 col-form-label">กรอกวันที่ : </label>
                     <div class="col-sm-8">
                             <input type="text" class="form-control" name="today"  value="<?php if($today==''){  echo date("Y-m-d"); }else{ echo $today;} ?>" placeholder="2023-03-01" >
                     </div>
                  </div> 
                  <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-4 col-form-label">รหัส : </label>
                     <div class="col-sm-8">
                             <input type="text" class="form-control" name="number"  value="<?php  echo(rand(10000,99999)); ?>">
                     </div>
                  </div> 

                  
              </div>

           
                <!-- /.card-body --> 
                <div class="card-footer">
                  <center> 
                    <input type="submit" value=" submit" class="btn btn-primary" name="submit"></center>


                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
      </div>
    </section>





 <script>
$(function () {
  bsCustomFileInput.init();
});
</script>