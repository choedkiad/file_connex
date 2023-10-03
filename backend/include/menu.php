      <!--styles -->
<?php   session_start();  ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0VQ8Z2EZ8Y"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0VQ8Z2EZ8Y');
</script>

  <!-- Google Fonts -->

<?php

   $id=$_GET['id'];
   $lang=$_GET['lang'];

 

 
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
      
       

 

 
?>
 

 

        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../../"><img src="../../../images/logo.png" alt="Company logo" style="padding: 5px; width: 80%;" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
  
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="dropdown ymm-sw " data-wow-delay="0.1s"><a href="../../" class="dropdown-toggle active" >Home</a></li>

                        <li class="wow fadeInDown" data-wow-delay="0.2s"><a class="" href="../../property/<?php echo $lang;?>/all">Properties</a></li>
                          

                        <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="../../">Contact</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.5s">
                          <a href="../../<?php echo $lang_th;?>"><img src="../../images/icon/icon_th.jpg" width="30" alt="" ></a>
                        
                        </li>
                        <li class="wow fadeInDown" data-wow-delay="0.5s">
                          
                          <a href="../../<?php echo $lang_en;?>"><img src="../../images/icon/icon_en.png" width="30" alt="" ></a>
                        </li>
                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->
