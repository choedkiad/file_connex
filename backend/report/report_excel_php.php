<?php

   $date_start=$_GET['date_start'];
 
   if($date_start!=''){
       
       $date_start=$date_start.".xls";
        print '<script>';
        print 'window.open($date_start);';
        print '</script>';


 echo "<script>window.close();</script>";  


       }
?>