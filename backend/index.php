<?php
 ini_set('session.gc_maxlifetime', 100000);
session_start(); 

 include 'config.php'; 
 include 'setting.php'; 
 
isset( $_SESSION['USER_ID'] ) ? $USER_ID = $_SESSION['USER_ID'] : $USER_ID = "";

isset( $_GET['clear'] ) ? $clear = $_GET['clear'] : $clear = "";

   $sql_check = "SELECT * FROM dbo_register where register_id='".$_SESSION['USER_ID']."' and register_lcok='1'  LIMIT 1  ";
   $result_check = $conn->query($sql_check);

   if($result_check->num_rows > 0) {

        echo("<script> top.location.href='./include/logout.php'</script>"); 

   }
   
if($clear=='1'){ //ลบ

    unset($_COOKIE['register']);
    setcookie('register', '', time() - 86400 * 365 ); // empty value and old timestamp
    $_SESSION['USER_ID']='';
    $_COOKIE['register']='';

    echo("<script> top.location.href='page/owner.php?clear=1'</script>"); 
}


$_SESSION['URL_Check']=$_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONNEX PROPERTY</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="template/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="template/plugins/ekko-lightbox/ekko-lightbox.css">


  <!-- Select2 -->
  <link rel="stylesheet" href="template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed"  >

<?php   

if($_SESSION['USER_ID']!='' and $_COOKIE["register"]==''){
        $register=$_SESSION['USER_ID']; 
        setcookie("register", $register, time() + 86400 * 365 ); // 86400 = 365 day 


}
/*

echo "USER_ID : ".$_SESSION['USER_ID']."<br>";
 echo "register : ".$register."<br>";
*/

 $URL_Check=$_SESSION['URL_Check'];
 
?>
<?php if($_COOKIE["register"]=="" and $register==""){  

             $_SESSION['URL_Check']=$_SERVER['REQUEST_URI'];  
             include("page/login.php");

     }else{   

          

          if($_SESSION['USER_ID']==""){

            $sql = "SELECT * FROM dbo_register where register_id='".$_COOKIE["register"]."' and register_lcok='0'  ";
            $result = $conn->query($sql);
            $row= $result->fetch_assoc();

             if ($row['register_email']!='') {
               
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
                   
                   $URL_Check=$_SESSION['URL_Check'];
 
                 $sql="INSERT INTO dbo_login  (register_id ,login_date ,login_status )
                       VALUES ('$userid','$date_create' ,'1' )";
                 mysqli_query($conn, $sql);  

                    if($_SESSION['URL_Check']!=''){

                       echo("<script> top.location.href='..$URL_Check'</script>"); 
                    }else{
                       echo("<script> top.location.href='?page=upload_file_excel_check&p=&page_no=1'</script>"); 
                    }

              }else{
                    
                    session_start();

                    session_destroy();


                    if (isset($_COOKIE['register'])) {
                        unset($_COOKIE['register']);
                        setcookie('register', '', time() - 86400 * 365, '/'); // empty value and old timestamp
                    }
                     

                    echo '<script type="text/javascript">alert("ออกจากระบบแล้ว");</script>';
                    echo("<script> top.location.href='./?clear=1'</script>");  

              }

          }


?>

<div class="wrapper"> 


<?php include('page/menu_left.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
  
   <?php include("data.php");?>
   




    <!-- /.content -->
  </div>
</div>

<?php } ?>
<?php include("include/script_jquery_main.php"); ?>