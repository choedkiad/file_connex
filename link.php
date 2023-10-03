
<head>
<script>
function myHide()
{
  document.getElementById('hidepage').style.display='block';//content ที่ต้องการแสดงหลังจากเพจโหลดเสร็จ
  document.getElementById('hidepage2').style.display='none';//content ที่ต้องการแสดงระหว่างโหลดเพจ
}
</script>
</head>

<body onload="myHide();">
<div id="hidepage2" style="display:block; font-size: 24px;" align="center" width="100%">
<br>
<IMG SRC="backend/img/loading.gif" WIDTH="100" HEIGHT="100" BORDER="0" ALT=""><br>
<b >กรุณารอสักครู่...</b>
</div>

<div id="hidepage" style="display:none;">

</body>
 



<?php
     $p=$_GET['p'];
     $id=$_GET['id'];
     $deal=$_GET['deal'];
     $owner=$_GET['owner'];
     $deal_r=$_GET['deal_r'];
     $req_deal=$_GET['req_deal'];
     
     if($deal!=''){

             echo("<script> top.location.href='backend/?page=create_deal_buyer&status=edit&p_check=create_deal&code=$deal&d_check=4'</script>");

     }

     if($p=='deal_a'){

             echo("<script> top.location.href='backend/?page=create_deal_buyer&status=edit&p_check=create_deal&code=$id&d_check=1'</script>");

     } 

     if($deal_r!=''){

             echo("<script> top.location.href='backend/?page=create_deal_buyer&status=edit&p_check=create_deal&code=$deal_r&d_check=1&focus=1'</script>");

     }

     if($req_deal!=''){

             echo("<script> top.location.href='backend/?page=create_deal_buyer&status=edit&p_check=create_deal&code=$deal_r&d_check=1&focus=1'</script>"); 
     }


     if($owner!=''){

             echo("<script> top.location.href='backend/page/owner.php?id=$owner'</script>");

     }else{



     }


?>



