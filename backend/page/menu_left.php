
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?page=upload_file_excel_check" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?page=portfolio_listing&update=1" class="nav-link">Portfolio Listing </a>
      </li>   
   <?php if( $_SESSION['STATUS_ID']=='2' or  $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?page=project" class="nav-link">Buildings </a>
      </li>
   <?php } ?>
<?php  if(  $_SESSION['STATUS_ID']=='4'   or $_SESSION['STATUS_ID']=='5' ){ ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?page=log_listing" class="nav-link">Log Listing </a>
      </li>

<?php } ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
 
       
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
       <!--<img src="#" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <span class="brand-text font-weight-light">CONNEX PROPERTY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex"> 
        <div class="image">
          <img src="../../images/team/noimages.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['NAME_ID'];?></a>
        </div>
      </div>
      <div class="user-panel mt-3 pb-3 mb-3 "> 


        
            <div class="info">
              <a href="?page=change_password" class="nav-link">Change Password </a><br>
              <a href="include/logout.php" class="d-block">ออกจากระบบ</a>
            </div> 
        </div>

 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="./" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
   
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                 จัดการลูกค้า   
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
    <?php if( $_SESSION['STATUS_ID']=='2' or  $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?>  
              <li class="nav-item">
                <a href="?page=buyer_contact" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ความต้องการของลูกค้า</p>
                </a>
              </li>
    <?php } ?>
              <li class="nav-item">
                <a href="?page=deal_buyer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>จัดการ Deal</p>
                </a>
              </li>
            </ul>
          </li>

    <?php if($_SESSION['OWNER_TEL']!='1'){ ?>  

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                 จัดการListing   
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=create_listing&status=create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มทรัพย์</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=upload_file_excel_check" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายการทรัพย์ทั้งหมด</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=upload_file_excel_check&p=public" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing (Public)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=upload_file_excel_check&p=draft" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing (Draft)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=upload_file_excel_check&p=premium" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing (Premium)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=upload_file_excel_check&p=boost_post" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing (Boost Post)</p>
                </a>
              </li>
            </ul>
          </li>
    
    <?php if( $_SESSION['STATUS_ID']=='4' and $_SESSION['STATUS_HEAD']=='0' or $_SESSION['STATUS_ID']=='4' and $_SESSION['STATUS_HEAD']=='2' or $_SESSION['STATUS_ID']=='5' ){ ?>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                ผู้ใช้งาน
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=create_register" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มผู้ใช้งาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=register" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ผู้ใช้งานทั้งหมด</p>
                </a>
              </li>
            </ul>
          </li>
      <?php } ?>
       
    <?php if( $_SESSION['STATUS_ID']=='4' and $_SESSION['STATUS_HEAD']=='0' or $_SESSION['STATUS_ID']=='4' and $_SESSION['STATUS_HEAD']=='2'  or $_SESSION['STATUS_ID']=='5'){ ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                DOWNLOADS   
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=download_file_excel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ดาวน์โหลด Listing</p>
                </a>
              </li>
            </ul>
          </li>





          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                UPLOAD   
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--
              <li class="nav-item">
                <a href="?page=upload_file_excel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>อัพโหลดไฟล์ Listing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=upload_file_project" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ไฟล์รายชื่อโครงการ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=upload_file_excel_check" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ไฟล์ข้อมูลจาก Excel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=upload_file_excel_img" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ซิงค์ภาพขึ้นระบบ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=upload_list_public" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ตั้งค่าListing ที่ไม่มีภาพเป็น แบบร่าง</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=upload_mini_images" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ย่อขนาดภาพให้เล็กลง</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="include/upload_position.php" class="nav-link" target="_black">
                  <i class="far fa-circle nav-icon"></i>
                  <p>กำหนด latitude และ longitude</p>
                </a>
              </li>   
              -->  
              <li class="nav-item">
                <a href="?page=upload_file_proppit" class="nav-link" target="_black">
                  <i class="far fa-circle nav-icon"></i>
                  <p>อัพโหลดไฟล์กำหนด Listing ไปยัง Proppit </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="?page=upload_file_propertyhub" class="nav-link" target="_black">
                  <i class="far fa-circle nav-icon"></i>
                  <p>อัพโหลดไฟล์กำหนด Listing ไปยัง Propertyhub </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="?page=feed_file" class="nav-link" target="_black">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เชื่อมโยง Post Feed</p>
                </a>
              </li>  
  
              <li class="nav-item">
                <a href="?page=update_count" class="nav-link" target="_black">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update จำนวน Listing ใน Project</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="?page=update_log" class="nav-link" target="_black">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update จำนวน log ทั้งหมดในระบบ</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="?page=create_file_pixel_fb_xml" class="nav-link" target="_black">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feed Facebook Pixel</p>
                </a>
              </li> 
            </ul>
          </li>

    <?php } ?>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                อื่นๆ
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=type_strengths" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>จุดเด่น / Strengths</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=type_furniture" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เฟอร์นิเจอร์ / Furniture</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=type_zone" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>โซนพื้นที่ / zone</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=type_subdistricts" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มตำบล</p>
                </a>
              </li>
            </ul>
          </li>
    <?php if( $_SESSION['STATUS_ID']=='2' or  $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?>  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                จัดการโครงการ/หมู่บ้าน
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=create_project&status=create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มโครงการ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=project" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>โครงการทั้งหมด</p>
                </a>
              </li>
            </ul>
          </li>
    <?php } ?>  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                รายงาน Listing
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=report_availabletorented" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> listing available to rented/sold </p>
                </a>
              </li>
             
            </ul>
          </li>

    <?php if( $_SESSION['STATUS_ID']=='4' or $_SESSION['STATUS_ID']=='5'){ ?>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                รายงาน
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--
              <li class="nav-item">
                <a href="?page=report_sale" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลเซลล์</p>
                </a>
              </li>-->
              <li class="nav-item">
                <a href="?page=report_stock" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report Stock / Sale</p>
                </a>
              </li> 
 
            </ul>
          </li>

    <?php } ?>

<?php if( $_SESSION['STATUS_ID']=='4' and $_SESSION['STATUS_HEAD']=='0' or $_SESSION['STATUS_ID']=='4' and $_SESSION['STATUS_HEAD']=='2'  or $_SESSION['STATUS_ID']=='5'){ ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                เว็บไซต์
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=web_seo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SEO Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=web_zone" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>กลุ่ม Zone</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=web_content" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Content</p>
                </a>
              </li>
               
            </ul>
          </li>
          
          <li class="nav-header">อื่นๆ</li>
          <!--
          <li class="nav-item">
            <a href="?page=report_sale" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>ข้อมูลเซลล์</p>
            </a>
          </li>-->
              <li class="nav-item">
                <a href="?page=report_login" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ประวัติการLog in</p>
                </a>
              </li>
   <?php } ?>

 
 <?php } ?>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>