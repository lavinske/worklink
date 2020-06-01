<nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="fad fa-compress-wide"></i></a></span>
            <form role="search" class="navbar-form navbar-right mt-1">
              <div class="position-relative has-icon-right">
                <input type="text" placeholder="Search" class="form-control round"/>
                <div class="form-control-position"><i class="ft-search"></i></div>
              </div>
            </form>
          </div>
          <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                <li class="nav-item mr-2 d-none d-lg-block"><a id="navbar-fullscreen" href="javascript:;" class="nav-link apptogglefullscreen"><i class="fad fa-window-maximize font-medium-3 blue-grey darken-4"></i>
                    <p class="d-none">fullscreen</p></a></li>
                <li class="dropdown nav-item"><a id="dropdownBasic2" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="fad fa-bell font-medium-3 blue-grey darken-4"></i><span class="notification badge badge-pill badge-danger"><?= mysqli_num_rows($resNotifCount) ?> </span>
                    <p class="d-none">Notifications</p></a>
                  <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                    <div class="noti-list">
                      <?php if(mysqli_num_rows($resNotif) > 0 ){ 
                while($notifData = mysqli_fetch_array($resNotif)) { ?>
                      <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                        <i class="ft-bell <?php echo $notifData['priority'] != 0 ? ($notifData['priority'] == 1 ? 'warning' : 'danger') : 'info'; ?> float-left d-block font-large-1 mt-1 mr-2"></i>
                        <span class="noti-wrapper">
                          <span class="noti-title line-height-1 d-block text-bold-400 <?php echo $notifData['priority'] != 0 ? ($notifData['priority'] == 1 ? 'warning' : 'danger') : 'info'; ?>"><?= $notifData['title']; ?> - <small><?= $notifData['fname']; ?></small></span>
                          <span class="noti-text"><?= $notifData['content']; ?></span>
                        </span>
                      </a>
                      <?php } } else {?>
                      <span class="p-5 m-3">
                          No notifications right now.
                      </span>
                      <?php } ?>
                  </div>
                </li>
                <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="fad fa-user font-medium-3 blue-grey darken-4"></i>
                    <p class="d-none">User Settings</p></a>
                  <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST'].$linkprefix;?>/company/edit" class="dropdown-item py-1"><i class="fad fa-user-edit mr-2"></i><span>Edit Profile</span></a>
                    <div class="dropdown-divider"></div><a href="http://<?php echo $_SERVER['HTTP_HOST'].$linkprefix;?>/company/logout" class="dropdown-item"><i class="fad fa-sign-out mr-2"></i><span>Logout</span></a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>