
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div data-active-color="black" data-background-color="man-of-steel" data-image="../../app-assets/img/sidebar-bg/01.jpg" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix"><a href="http://<?php echo $_SERVER['HTTP_HOST'].$linkprefix;?>/user/" class="logo-text float-left">
              <div class="logo-img"><img src="../../app-assets/img/logo.png"/></div><span class="text align-middle"><?php echo $namapersh; ?></span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
              <li class="nav-item <?php if($_SERVER['SCRIPT_NAME']==$linkprefix."/user/home/index.php") { ?>active<?php } ?>"><a href="http://<?php echo $_SERVER['HTTP_HOST'].$linkprefix;?>/user"><i class="ft-home"></i><span class="menu-title">Home</span></a>
              </li>
              <li class="nav-item <?php if($_SERVER['SCRIPT_NAME']==$linkprefix."/user/profile/index.php") { ?>active<?php } ?>"><a href="http://<?php echo $_SERVER['HTTP_HOST'].$linkprefix;?>/user/profile"><i class="ft-user"></i><span class="menu-title">Profile</span></a>
              </li>
              <li class="nav-item <?php if($_SERVER['SCRIPT_NAME']==$linkprefix."/user/withdraw/index.php") { ?>active<?php } ?>"><a href="../withdraw/"><i class="ft-message-square"></i><span data-i18n="" class="menu-title">Withdraw</span></a>
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
      