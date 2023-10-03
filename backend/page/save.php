
<?php

  
  session_start();  

  require '../config.php';

  $id=$_GET["id"];
  $val=$_GET["val"];



                      $sql = "UPDATE dbo_data_excel_listing SET 
                                ex_list_listing_status='".$buyer_contact_type."',
                                ex_list_rent_till='".$buyer_contact_attention."' 
                                WHERE buyer_contact_id='".$id."' "; 


                      if ($conn->query($sql) === TRUE) {  }else{}
?>