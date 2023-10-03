<?php
ini_set('session.gc_maxlifetime', 100000);

session_start(); 

 include '../config.php'; 
 include '../setting.php'; 

         $id=$_GET['id'];
         $today=date("Y-m-d H:i:s");
         $status=$_GET['status'];

         $USER_ID=$_SESSION['USER_ID'];
     
      if($status=='draft'){

           if($id!=''){

             $sql_register="SELECT * FROM dbo_register where register_id='$id' ";
             $result_register= $conn->query($sql_register); 
            // output data of each row
             $rs_register=$result_register->fetch_assoc();


             $register_status_draft=$rs_register['register_status_draft'];
            
             
               if($register_status_draft=='1'){ $status=0; }else{ $status=1; }
      
                        $sql = "UPDATE dbo_register SET  
                                  register_status_draft='".$status."' 
                                  WHERE register_id='".$id."' "; 
         

                        if ($conn->query($sql) === TRUE) { ?>
                         
                         <script>
                             close();   // Closes the new window
                          </script>
    
                   <?php             
                        } else {
                       
                             echo '<script type="text/javascript">alert("Error");</script>';
                             echo "Error updating record: " . $conn->error;   
                        } 
          }

      }else if($status=='premium'){

           if($id!=''){

             $sql_register="SELECT * FROM dbo_register where register_id='$id' ";
             $result_register= $conn->query($sql_register); 
            // output data of each row
             $rs_register=$result_register->fetch_assoc();


             $register_status_premium=$rs_register['register_status_premium'];
            
             
               if($register_status_premium=='1'){ $status=0; }else{ $status=1; }
      
                        $sql = "UPDATE dbo_register SET  
                                  register_status_premium='".$status."' 
                                  WHERE register_id='".$id."' "; 
         

                        if ($conn->query($sql) === TRUE) { ?>
                         
                         <script>
                             close();   // Closes the new window
                          </script>
    
                   <?php             
                        } else {
                       
                             echo '<script type="text/javascript">alert("Error");</script>';
                             echo "Error updating record: " . $conn->error;   
                        } 
          }

      }else if($status=='boostpost'){

           if($id!=''){

             $sql_register="SELECT * FROM dbo_register where register_id='$id' ";
             $result_register= $conn->query($sql_register); 
            // output data of each row
             $rs_register=$result_register->fetch_assoc();


             $register_status_boostpost=$rs_register['register_status_boostpost'];
            
             
               if($register_status_boostpost=='1'){ $status=0; }else{ $status=1; }
      
                        $sql = "UPDATE dbo_register SET  
                                  register_status_boostpost='".$status."' 
                                  WHERE register_id='".$id."' "; 
         

                        if ($conn->query($sql) === TRUE) { ?>
                         
                         <script>
                             close();   // Closes the new window
                          </script>
    
                   <?php             
                        } else {
                       
                             echo '<script type="text/javascript">alert("Error");</script>';
                             echo "Error updating record: " . $conn->error;   
                        } 
          }

      }else if($status=='adv'){

           if($id!=''){

             $sql_register="SELECT * FROM dbo_register where register_id='$id' ";
             $result_register= $conn->query($sql_register); 
            // output data of each row
             $rs_register=$result_register->fetch_assoc();


             $register_status_ads=$rs_register['register_status_ads'];
            
             
               if($register_status_ads=='1'){ $status=0; }else{ $status=1; }
      
                        $sql = "UPDATE dbo_register SET  
                                  register_status_ads='".$status."' 
                                  WHERE register_id='".$id."' "; 
         

                        if ($conn->query($sql) === TRUE) { ?>
                         
                         <script>
                             close();   // Closes the new window
                          </script>
    
                   <?php             
                        } else {
                       
                             echo '<script type="text/javascript">alert("Error");</script>';
                             echo "Error updating record: " . $conn->error;   
                        } 
          }

      }


      
?>


 
  