<?php 

 
  session_start();  

  require '../config.php';

            $username=$_POST['email'];
            $password=$_POST['password'];
            $URL_Check=$_SESSION['URL_Check'];
            $page_get=$_GET['page'];

            $password=md5($password);
            $date_create=date("Y-m-d H:i:s");


        if($username!=''){
            $sql = "SELECT * FROM dbo_register where register_email='".$username."' and register_password='".$password."' and register_lcok='0' ";
            $result = $conn->query($sql);
            $row= $result->fetch_assoc();

            if ($row['register_email']!='') {
               
                 $register_id=$row['register_id'] ;
                 $_SESSION['USER_ID']=$row['register_id'] ;
                 $_SESSION['EMAIL_ID']=$row['register_email'] ;
                 $_SESSION['STATUS_HEAD']=$row['register_status_head'] ;
                 $_SESSION['STATUS_ID']=$row['register_status'] ;
                 $_SESSION['STATUS_DRAFT']=$row['register_status_draft'] ; 
                 $_SESSION['STATUS_PREMIUM']=$row['register_status_premium'] ; 
                 $_SESSION['STATUS_BOOSTPOST']=$row['register_status_boostpost'] ; 
                 $_SESSION['STATUS_OWNER_TEL']=$row['register_status_owner_tel'] ; 
                 $_SESSION['STATUS_ADS']=$row['register_status_ads'] ; 
                 $_SESSION['NAME_ID']=$row['register_name']." (".$row['register_nickname'].")" ; 
                 $_SESSION['IMG_ID']=$row['register_img'] ; 
                 $_SESSION['POSITION']=$row['register_position'] ; 
                 $_SESSION['OWNER_TEL']=$row['register_status_owner_tel'] ;  

                 $userid=$_SESSION['USER_ID'];
   /**/

                 $sql="INSERT INTO dbo_login  (register_id ,login_date ,login_status )
                                VALUES ('$userid','$date_create' ,'1' )";

                if (mysqli_query($conn, $sql)) {  

                    if($URL_Check!=''){

                       echo("<script> top.location.href='../../..$URL_Check'</script>"); 
                    }else{
                       echo("<script> top.location.href='../'</script>"); 
                    }

                 }
 

            }else{
                echo '<script type="text/javascript">alert("USERNAME หรือ PASSWORD ผิดพลาด โปรดเข้าสู่ระบบใหม่อีกครั้ง");</script>';
                echo("<script> top.location.href='../'</script>"); 
            }

            echo "-------";


         } 


         ?>