      <!--styles -->
<?php   session_start();  ?>


<?php

 $part="../../../../../../../../../../../../../";

  if($_GET['deal_s']!=''){ 
      $deal_s=$_GET['deal_s'];
  }

 
/*
 
if($_GET['lang']!='' and $_GET['id']!=''){

    $lang_th="property/th/".$_GET['id'];  
    $lang_en="property/en/".$_GET['id'];  
    $_SESSION['lang_id']=$_GET['lang'];


  $sql_ass_1="SELECT * FROM type_asset where name LIKE '%$id%' or name_en LIKE '%$id%'  ";  
  $result_ass_1= $conn->query($sql_ass_1);
  $rs_ass_1=$result_ass_1->fetch_assoc();

    if($rs_ass_1['name']!=''){
       
        $lang_th="search/th/".$rs_ass_1['name']."?page_no=1";  
        $lang_en="search/en/".$rs_ass_1['name_en']."?page_no=1";  
    }
 
}

 
 if($_SESSION['lang_id']=='en'){

       

 }else{

       $_SESSION['lang_id']="th";
 }
      
        
*/

 
?>

<?php if($lang=='en'){  ?>

<style type="text/css">
  .nav-link-pc3{
      width: 140px;
  }

</style>

<?php }else{ ?>
<style type="text/css">
  .nav-link-pc1{
      width: 140px;
  }
  .nav-link-pc2{
      width: 115px;
  }
  .nav-link-pc3{
      width: 125px;
  }
</style>

<?php } ?>
 

 

  <header> 
  
   <?php  

$http_ref = $_SERVER['REQUEST_URI'];
 
 
$explode_http_ref=explode("/",$http_ref);
 

   ?>

    <nav class="navbar navbar-light navbar-expand-xl bg-faded justify-content-center" >
      <a href="<?php echo $part;?><?php  if($lang=='en'){ echo "en"; } ?>" class="navbar-brand d-flex w-50 mr-auto">
        <img src="<?php echo $part;?>images/logo.webp" alt="Connex Property" title="Connex Property" >
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3" value="navbar" aria-label="navbar"  >
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
        <ul class="navbar-nav w-100 justify-content-center">
          <li class="nav-item <?php if($explode_http_ref[1]=='' or $explode_http_ref[1]=='en'){ echo 'active'; }?>">

            <a class="nav-link nav-link-pc2" href="<?php echo $part;?><?php  if($lang=='en'){ echo "en"; } ?>"><?php echo $link_home;?></a>
          </li>  
          <li class="nav-item <?php if($deal_s=='1' and $explode_http_ref[1]=='search' or $deal_s=='1' and $explode_http_ref[1]=='property'){ echo 'active'; }?>">
            <a class="nav-link" href="<?php echo $part;?>search/<?php echo $lang;?>/1/all/all/all/<?php echo $title_url_reset;?>/1"><?php echo $buy_title2;?></a>
          </li> 
          <li class="nav-item <?php if($deal_s=='2' and $explode_http_ref[1]=='search' or $deal_s=='2' and $explode_http_ref[1]=='property'){ echo 'active'; }?>">
            <a class="nav-link" href="<?php echo $part;?>search/<?php echo $lang;?>/2/all/all/all/<?php echo $title_url_reset;?>/1"><?php echo $rent_title;?></a> 
          </li> 
         <li class="nav-item <?php if($explode_http_ref[1]=='consignment'){ echo 'active'; }?>">
            <a class="nav-link nav-link-pc1"  href="<?php echo $part;?>consignment/<?php echo $lang;?>"   ><?php echo $sell_title;?></a>
          </li> 
          <li class="nav-item <?php if($explode_http_ref[1]=='content'){ echo 'active';}?>">
            <a class="nav-link nav-link-pc2" href="<?php echo $part;?>content/<?php echo $lang;?>/1"  ><?php echo $new_title;?></a>
          </li>           
          <li class="nav-item <?php if($explode_http_ref[1]=='contact'){ echo 'active'; }?>">
            <a class="nav-link nav-link-pc3" href="<?php echo $part;?>contact/<?php echo $lang;?>"  ><?php echo $contact_us_title;?></a>
          </li>
          <!--
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Contact </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sell </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->

       
          <li class="nav-item-1 dropdown">
    <?php if($lang=='th'){ ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $part;?>images/TH.webp" alt="เปลี่ยนภาษาไทย"> <i class="fa fa-angle-down icon_down" aria-hidden="true" style="font-size:10px"></i> </a>
            <div class="dropdown-menu menu-center" aria-labelledby="navbarDropdownMenuLink" style="">
              <a class="dropdown-item" href="<?php echo $url_en;?>" style=" "  ><img src="<?php echo $part;?>images/GB.webp" alt="เปลี่ยนภาษาอังกฤษ"> English</a> 
            </div>
    <?php }else{ ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $part;?>images/GB.webp" alt="เปลี่ยนภาษาอังกฤษ"> <i class="fa fa-angle-down icon_down" aria-hidden="true" style="font-size:10px;"></i></a>
            <div class="dropdown-menu menu-center" aria-labelledby="navbarDropdownMenuLink" style="">
              <a class="dropdown-item" href="<?php echo $url_th;?>" style=""><img src="<?php echo $part;?>images/TH.webp" alt="เปลี่ยนภาษาไทย"> Thai </a> 
            </div>
     <?php } ?>
          </li>  
        </ul>
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
          <!--
          <li class="nav-item">
            <a class="nav-link btn-tha" href="#">THA - ฿</a>
          </li>-->
 
        </ul>
      </div>
    </nav>
  </header>


   <div class="social-con">
      <a href="https://lin.ee/DXeU6rG" target="_black" aria-label="ติดต่อ Connex Property ทางไลน์" >
        <img src="https://connex.in.th/images/sc1.webp" alt="LINE" title="LINE">
      </a>
      <a href="https://www.facebook.com/connexprop" target="_black" aria-label="ติดต่อ Connex Property ทาง facebook" >
        <img src="https://connex.in.th/images/sc2.webp" alt="FACEBOOK" title="FACEBOOK">
      </a>
      <a href="https://m.me/177735605724407" target="_black" aria-label="ติดต่อ Connex Property ทาง Message Facebook" >
        <img src="https://connex.in.th/images/sc3.webp" alt="FACEOOK" title="FACEBOOK">
      </a>
      <a href="tel:0990199900" target="_black" aria-label="ติดต่อ Connex Property ทาง โทรศัพท์มือถือ">
        <img src="https://connex.in.th/images/sc4.webp" alt="TEL"  title="TEL">
      </a>
      <button aria-label="social" value="social" ><i class="fas fa-comment-lines"></i></button>
    </div>