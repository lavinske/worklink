
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div data-active-color="black" data-background-color="man-of-steel" data-image="../../app-assets/img/sidebar-bg/01.jpg" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix"><a href="http://<?php echo $_SERVER['HTTP_HOST'].$linkprefix;?>/admin/" class="logo-text float-left">
              <div class="logo-img"><img src="../../app-assets/img/logo.png"/></div><span class="text align-middle"><?php echo $namapersh; ?></span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
              <li class="nav-item <?php if($_SERVER['SCRIPT_NAME']==$linkprefix."/admin/home/index.php") { ?>active<?php } ?>"><a href="http://<?php echo $_SERVER['HTTP_HOST'].$linkprefix;?>/admin"><i class="fad fa-home"></i><span class="menu-title">Home</span></a>
              </li>
              <li class="has-sub nav-item"><a><i class="fad fa-wallet"></i><span class="menu-title">Financial</span></a>
                <ul class="menu-content">
                  <li class="has-sub nav-item"><a><i class="fad fa-sack-dollar"></i><span class="menu-title">Withdraw</span></a>
                <ul class="menu-content">
                  <li class="nav-item <?php if($_SERVER['SCRIPT_NAME']==$linkprefix."/admin/wd_user/index.php") { ?>active<?php } ?>"><a href="../wd_user"><i class="fad fa-user"></i><span data-i18n="" class="menu-title">User</span></a>
                  </li>
                  <li class="nav-item <?php if($_SERVER['SCRIPT_NAME']==$linkprefix."/admin/wd_company/index.php") { ?>active<?php } ?>"><a href="../wd_company"><i class="fad fa-building"></i><span data-i18n="" class="menu-title">Company</span></a>
                  </li>
                </ul>
              </li>
              <li class="nav-item <?php if($_SERVER['SCRIPT_NAME']==$linkprefix."/admin/tu_company/index.php") { ?>active<?php } ?>"><a href="../tu_company"><i class="fad fa-cash-register"></i><span class="menu-title">Top-Up Company</span></a>
              </li>
                </ul>
              </li>
              <li class="nav-item <?php if($_SERVER['SCRIPT_NAME']==$linkprefix."/admin/joblist/index.php") { ?>active<?php } ?>"><a href="../joblist"><i class="fad fa-list"></i><span data-i18n="" class="menu-title">Job</span></a>
              </li>
              <li class="nav-item <?php if($_SERVER['SCRIPT_NAME']==$linkprefix."/admin/userlist/index.php") { ?>active<?php } ?>"><a href="../userlist"><i class="fad fa-user"></i><span data-i18n="" class="menu-title">User List</span></a>
              </li>
              <li class="nav-item <?php if($_SERVER['SCRIPT_NAME']==$linkprefix."/admin/companylist/index.php") { ?>active<?php } ?>"><a href="../companylist"><i class="fad fa-building"></i><span data-i18n="" class="menu-title">Company List</span></a>
              </li>
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
      </div>
      