<?php


  session_start();  

  require '../include/config.php';
  

  $_SESSION['deal']=$_GET['deal'];
   
  if($_SESSION['lang']=='th'){
   echo("<script> top.location.href='../../../'</script>");  
  }else{
   echo("<script> top.location.href='../../../en'</script>");  
  }
  



?>