<?php include('../../app-assets/inc/companyheader.php'); ?>
<!DOCTYPE html>
<html lang="en" class="loading">
  <!-- BEGIN : Head-->
  <?php include('../../app-assets/inc/head.inc'); ?>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper sidebar-lg">


      <!-- main menu-->
      <?php include('../../app-assets/inc/mm-user.inc'); ?>
      <!-- / main menu-->


      <!-- Navbar (Header) Starts-->
      <?php include('../../app-assets/inc/header-user.inc'); ?>
      <!-- Navbar (Header) Ends-->

      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--User Profile Starts-->
<!--Basic User Details Starts-->
<section id="user-profile">
  <div class="row">
    <div class="col-12">
      <div class="card profile-with-cover">
        <div class="card-img-top img-fluid bg-cover height-300" style="background: url('../../app-assets/img/photos/14.jpg') 50%;"></div>
        <div class="media profil-cover-details row">
          <div class="col-5">
            <div class="align-self-start halfway-fab pl-3 pt-2">
              <div class="text-left">
                <h3 class="card-title white"><?php echo $fname." ".$lname;?></h3>
              </div>
            </div>
          </div>
          <div class="col-2">
            <div class="align-self-center halfway-fab text-center">
              <a class="profile-image">
                <img src="../../app-assets/img/portrait/avatars/avatar-08.png" class="rounded-circle img-border gradient-summer width-100"
                  alt="Card image">
              </a>
            </div>
          </div>
          <div class="col-5">
          </div>
          <div class="profile-cover-buttons">
            <div class="media-body halfway-fab align-self-end">
              <div class="text-right d-none d-sm-none d-md-none d-lg-block">
                <button type="button" class="btn btn-primary btn-raised mr-2"><i class="fa fa-plus"></i> Follow</button>
                <button type="button" class="btn btn-success btn-raised mr-3"><i class="fa fa-dashcube"></i> Message</button>
              </div>
              <div class="text-right d-block d-sm-block d-md-block d-lg-none">
                <button type="button" class="btn btn-primary btn-raised mr-2"><i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-success btn-raised mr-3"><i class="fa fa-dashcube"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="profile-section">
          <div class="row">
            <div class="col-lg-5 col-md-5 ">
              <ul class="profile-menu no-list-style">
                <li>
                  <a href="#about" class="primary font-medium-2 font-weight-600">About</a>
                </li>
                <li>
                  <a href="#user" class="primary font-medium-2 font-weight-600">Timeline</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-2 text-center">
              <span class="font-medium-2 text-uppercase"><?php echo $ucall." ".$fname;?></span>
              <p class="grey font-small-2">Freelancer <?php if($urole != 0) { ?><span class="badge badge-<?php echo $urole != 1 ? ($urole == 99 ? "warning" : "danger") : "info"; ?>"><?php echo $urole != 1 ? ($urole == 99 ? "BANNED" : "SUSPENDED") : "PRO"; ?></span><?php } ?></p>
            </div>
            <div class="col-lg-5 col-md-5">
              <ul class="profile-menu no-list-style">
                <li>
                  <a href="#friends" class="primary font-medium-2 font-weight-600">Friends</a>
                </li>
                <li>
                  <a href="#photos" class="primary font-medium-2 font-weight-600">Photos</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Basic User Details Ends-->

<!--About section starts-->
<section id="about">
  <div class="row">
    <div class="col-12">
      <div class="content-header">About</div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>Personal Information</h5>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="mb-3">
              <span class="text-bold-500 primary">About Me:</span>
              <span class="d-block overflow-hidden"><?php echo $about; ?>
              </span>
            </div>
            <hr>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <ul class="no-list-style">
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email:</a></span>
                    <a href="mailto:<?php echo $uemail; ?>" class="d-block overflow-hidden"><?php echo $uemail; ?></a>
                  </li>
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-globe font-small-3"></i> Location:</a></span>
                    <span class="d-block overflow-hidden"><?php echo $ulocation; ?></span>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <ul class="no-list-style">
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-user font-small-3"></i> Gender:</a></span>
                    <span class="d-block overflow-hidden"><?php echo $ugender; ?></span>
                  </li>

                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-monitor font-small-3"></i> Website:</a></span>
                    <a href="http://<?php echo $uwebsite; ?>" class="d-block overflow-hidden"><?php echo $uwebsite; ?></a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <ul class="no-list-style">
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Phone Number:</a></span>
                    <span class="d-block overflow-hidden"><?php echo $uphone; ?></span>
                  </li>
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-book font-small-3"></i> Joined:</a></span>
                    <span class="d-block overflow-hidden"><?php echo $fJoined; ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <hr>
            <div class="mt-2 overflow-hidden">
              <?php if(mysqli_num_rows($resAbility) > 0 ){ 
                while($abilityData = mysqli_fetch_array($resAbility)) { ?>
              <span title="<?= $abilityData['tooltip']; ?>" class="mr-3 mt-2 text-center float-left width-100"> <i class="<?= $abilityData['iconClass']; ?> fa-3x"></i>
                <div class="mt-2"><?= $abilityData['abilityName'] ?></div>
              </span>
              <?php }
              } else echo "No skills speciality published."; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
<!--About section ends-->

<!--User Timeline section starts-->
<section id="user">
  <div class="row">
    <div class="col-12">
      <div class="content-header">User Timeline</div>
    </div>
  </div>
  <div id="timeline" class="timeline-center timeline-wrapper">
    <ul class="timeline">
      <li class="timeline-line"></li>
      <li class="timeline-group">
        <a class="btn btn-raised btn-primary"><i class="fa fa-calendar-o"></i> Today</a>
      </li>
    </ul>
    <ul class="timeline">
      <li class="timeline-line"></li>
      <li class="timeline-item">
        <div class="timeline-badge">
          <span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i
              class="fa fa-plane"></i></span>
        </div>
        <div class="timeline-card card border-grey border-lighten-2">
          <div class="card-header">
            <h4 class="mb-0 card-title"><a>Portfolio project work</a></h4>
            <div class="card-subtitle text-muted mt-0">
              <span class="font-small-3">5 hours ago</span>
            </div>
          </div>
          <div class="card-content">
            <img class="img-fluid" src="../../app-assets/img/photos/06.jpg" alt="Timeline Image 1">
            <div class="card-content">
              <div class="card-body">
                <p class="card-text">Nullam facilisis fermentum aliquam. Suspendisse ornare dolor vitae libero
                  hendrerit auctor lacinia a ligula. Curabitur elit tellus, porta ut orci sed, fermentum bibendum nisi.</p>
                <div class="list-inline mb-1">
                  <span class="pr-1"><a class="primary"><span class="fa fa-thumbs-o-up"></span> Like</a></span>
                  <span class="pr-1"><a class="primary"><span class="fa fa-commenting-o"></span> Comment</a></span>
                  <span><a class="primary"><span class="fa fa-share-alt"></span> Share</a></span>
                </div>
              </div>
            </div>
            <div class="card-footer px-0 py-0">
              <div class="card-body">
                <form>
                  <fieldset class="form-group position-relative has-icon-left mb-0">
                    <input type="text" class="form-control" placeholder="Write comments...">
                    <div class="form-control-position">
                      <i class="fa fa-dashcube"></i>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="timeline-item mt-5">
        <div class="timeline-badge">
          <span class="avatar avatar-online" data-toggle="tooltip" data-placement="right" title="Eu pid nunc urna integer"><img
              src="../../app-assets/img/portrait/small/avatar-s-5.png" alt="avatar" width="40"></span>
        </div>
        <div class="timeline-card card card-inverse">
          <img class="card-img img-fluid" src="../../app-assets/img/photos/07.jpg" alt="Card image">
          <div class="card-img-overlay bg-overlay">
            <h4 class="card-title">Good Morning</h4>
            <p class="card-text"><small>15 hours ago</small></p>
          </div>
        </div>
      </li>
    </ul>

    <!-- 2016 -->
    <ul class="timeline">
      <li class="timeline-line"></li>
      <li class="timeline-group">
        <a class="btn btn-raised btn-primary"><i class="fa fa-calendar-o"></i> 2016</a>
      </li>
    </ul>
    <ul class="timeline">
      <li class="timeline-line"></li><!-- /.timeline-line -->
      <li class="timeline-item">
        <div class="timeline-badge">
          <span class="bg-warning bg-darken-1" data-toggle="tooltip" data-placement="right" title="Application API Support"><i
              class="fa fa-life-ring"></i></span>
        </div>
        <div class="timeline-card card border-grey border-lighten-2">
          <div class="card-header">
            <div class="media">
              <div class="media-left">
                <a>
                  <span class="avatar avatar-md avatar-busy"><img src="app-assets/img/portrait/small/avatar-s-11.png"
                      alt="avatar" width="50"></span>
                  <i></i>
                </a>
              </div>
              <div class="media-body">
                <h4 class="mb-0 card-title"><a>Application API Support</a></h4>
                <div class="card-subtitle text-muted mt-0">
                  <span class="font-small-3">15 Oct, 2016 at 8.00 A.M</span>
                  <span class="tag tag-pill tag-default tag-warning float-right">High</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-content">
            <img class="img-fluid" src="../../app-assets/img/photos/08.jpg" alt="Timeline Image 1">
            <div class="card-content">
              <div class="card-body">
                <p class="card-text">Nullam facilisis fermentum aliquam. Suspendisse ornare dolor vitae libero
                  hendrerit auctor lacinia a ligula. Curabitur elit tellus, porta ut orci sed, fermentum bibendum nisi.</p>
                <div class="list-inline mb-1">
                  <span class="pr-1"><a class="primary"><span class="fa fa-commenting-o"></span> Comment</a></span>
                </div>
              </div>
            </div>
            <div class="card-footer px-0 py-0">
              <div class="card-body">
                <div class="media">
                  <div class="media-left">
                    <a>
                      <span class="avatar avatar-online"><img src="app-assets/img/portrait/small/avatar-s-14.png"
                          alt="avatar" width="50"></span>
                    </a>
                  </div>
                  <div class="media-body">
                    <p class="text-bold-600 mb-0"><a>Crystal Lawson</a></p>
                    <p class="m-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                      sollicitudin commodo.</p>
                    <div class="media">
                      <div class="media-left">
                        <a>
                          <span class="avatar avatar-online"><img src="app-assets/img/portrait/small/avatar-s-16.png"
                              alt="avatar" width="50"></span>
                        </a>
                      </div>
                      <div class="media-body">
                        <p class="text-bold-600 mb-0"><a>Rafila Găitan</a></p>
                        <p>Gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <form>
                  <fieldset class="form-group position-relative has-icon-left mb-0">
                    <input type="text" class="form-control" placeholder="Write comments...">
                    <div class="form-control-position">
                      <i class="fa fa-dashcube"></i>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="timeline-item mt-5">
        <div class="timeline-badge">
          <span class="bg-amber bg-darken-1" data-toggle="tooltip" data-placement="left" title="Quote of the day"><i
              class="fa fa-smile-o"></i></span>
        </div>
        <div class="timeline-card card border-grey border-lighten-2">
          <div class="card-header">
            <h4 class="mb-0 card-title"><a>Quote of the day</a></h4>
            <div class="card-subtitle text-muted mt-0">
              <span class="font-small-3">03 March, 2016 at 5 P.M</span>
            </div>
          </div>
          <div class="card-content">
            <img class="img-fluid" src="app-assets/img/photos/09.jpg" alt="Timeline Image 1">
            <div class="card-body">
              <blockquote class="card-bodyquote">
                <p class="card-text">Eu pid nunc urna integer, sed, cras tortor scelerisque penatibus facilisis a
                  pulvinar, rhoncus sagittis ut nunc elit! Sociis in et?</p>
                <footer>Someone famous in <cite title="Source Title"> - Source Title</cite></footer>
              </blockquote>
            </div>
          </div>
        </div>
      </li>
    </ul>
    <!-- 2015 -->
    <ul class="timeline">
      <li class="timeline-line"></li>
      <li class="timeline-group">
        <a class="btn btn-raised btn-primary"><i class="fa fa-calendar-o"></i> Founded in 2015</a>
      </li>
    </ul>
  </div>
</section>
<!--User Timeline section ends-->

<!--User's friend section starts-->
<section id="friends">
  <div class="row">
    <div class="col-12">
      <div class="content-header">Friends</div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header text-center">
          <img src="app-assets/img/portrait/small/avatar-s-3.png" alt="Brek" width="150" class="rounded-circle gradient-mint">
        </div>
        <div class="card-content">
          <div class="card-body text-center">
            <h4 class="card-title">Brek Padio</h4>
            <p class="category text-gray font-small-4">CEO / Co-Founder</p>
            <a class="btn btn-lg gradient-mint font-small-2 white p-2 mr-2">Add as Friend</a>
            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
            <hr class="grey">
            <div class="row grey">
              <div class="col-4">
                <a><i class="ft-star mr-1"></i> <span>4.9</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-globe mr-1"></i> <span>USA</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-book mr-1"></i> <span>21</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header text-center">
          <img src="app-assets/img/portrait/small/avatar-s-18.png" alt="Jassi" width="150" class="rounded-circle gradient-pomegranate">
        </div>
        <div class="card-content">
          <div class="card-body text-center">
            <h4 class="card-title">Jassi Lee</h4>
            <p class="category text-gray font-small-4">Ninja Developer</p>
            <a class="btn btn-lg gradient-pomegranate font-small-2 white p-2 mr-2">Add as Friend</a>
            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
            <hr class="grey">
            <div class="row grey">
              <div class="col-4">
                <a><i class="ft-star mr-1">star</i> <span>4.7</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-globe mr-1"></i> <span>Canada</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-book mr-1"></i> <span>14</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header text-center">
          <img src="app-assets/img/portrait/small/avatar-s-11.png" alt="Brek" width="150" class="rounded-circle gradient-orange-amber">
        </div>
        <div class="card-content">
          <div class="card-body text-center">
            <h4 class="card-title">Peter Steven</h4>
            <p class="category text-gray font-small-4">Android Developer</p>
            <a class="btn btn-lg gradient-orange-amber font-small-2 white p-2 mr-2">Add as Friend</a>
            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
            <hr class="grey">
            <div class="row grey">
              <div class="col-4">
                <a><i class="ft-star mr-1">star</i> <span>5.0</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-globe mr-1"></i> <span>India</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-book mr-1"></i> <span>18</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header text-center">
          <img src="app-assets/img/portrait/small/avatar-s-6.png" alt="Maitri" width="150" class="rounded-circle gradient-red-pink">
        </div>
        <div class="card-content">
          <div class="card-body text-center">
            <h4 class="card-title">Maitri Rajput</h4>
            <p class="category text-gray font-small-4">UX Designer</p>
            <a class="btn btn-lg gradient-red-pink font-small-2 white p-2 mr-2">Add as Friend</a>
            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
            <hr class="grey">
            <div class="row grey">
              <div class="col-4">
                <a><i class="ft-star mr-1">star</i> <span>4.5</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-globe mr-1"></i> <span>India</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-book mr-1"></i> <span>19</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header text-center">
          <img src="app-assets/img/portrait/small/avatar-s-9.png" alt="Anibal" width="150" class="rounded-circle gradient-blackberry">
        </div>
        <div class="card-content">
          <div class="card-body text-center">
            <h4 class="card-title">Anibal Santo</h4>
            <p class="category text-gray font-small-4">Project Developer</p>
            <a class="btn btn-lg gradient-blackberry font-small-2 white p-2 mr-2">Add as Friend</a>
            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
            <hr class="grey">
            <div class="row grey">
              <div class="col-4">
                <a><i class="ft-star mr-1">star</i> <span>4.8</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-globe mr-1"></i> <span>London</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-book mr-1"></i> <span>20</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header text-center">
          <img src="app-assets/img/portrait/small/avatar-s-12.png" alt="Gini" width="150" class="rounded-circle gradient-back-to-earth">
        </div>
        <div class="card-content">
          <div class="card-body text-center">
            <h4 class="card-title">Gini Fredre</h4>
            <p class="category text-gray font-small-4">HR</p>
            <a class="btn btn-lg gradient-back-to-earth font-small-2 white p-2 mr-2">Add as Friend</a>
            <a class="btn btn-lg btn-outline-grey font-small-2 p-2">Message</a>
            <hr class="grey">
            <div class="row grey">
              <div class="col-4">
                <a><i class="ft-star mr-1">star</i> <span>4.4</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-globe mr-1"></i> <span>Korea</span></a>
              </div>
              <div class="col-4">
                <a><i class="ft-book mr-1"></i> <span>15</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--User's friend section starts-->

<!--User's uploaded photos section starts-->
<section id="photos">
  <div class="row">
    <div class="col-12">
      <div class="content-header">Photos</div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5>Photos Uploaded</h5>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="row">
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/1.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/2.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/3.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/4.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
            </div>
            <div class="row">
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/5.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/6.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/7.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/8.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
            </div>
            <div class="row">
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/9.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/10.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/11.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/12.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
            </div>
            <div class="row">
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/13.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/14.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/15.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
              <figure class="col-lg-3 col-md-6 col-12">
                <img class="img-thumbnail img-fluid" src="app-assets/img/gallery/16.jpg" itemprop="thumbnail" alt="Image description" />
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--User's uploaded photos section starts-->
<!--User Profile Starts-->

          </div>
        </div>
        <!-- END : End Main Content-->

        <!-- BEGIN : Footer-->
        <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; 2019 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
        </footer>
        <!-- End : Footer-->

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- START Notification Sidebar-->
    <aside id="notification-sidebar" class="notification-sidebar d-none d-sm-none d-md-block"><a class="notification-sidebar-close"><i class="ft-x font-medium-3"></i></a>
      <div class="side-nav notification-sidebar-content">
        <div class="row">
          <div class="col-12 mt-1">
            <ul class="nav nav-tabs">
              <li class="nav-item"><a id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#activity-tab" aria-expanded="true" class="nav-link active">Activity</a></li>
              <li class="nav-item"><a id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#chat-tab" aria-expanded="false" class="nav-link">Chat</a></li>
              <li class="nav-item"><a id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#settings-tab" aria-expanded="false" class="nav-link">Settings</a></li>
            </ul>
            <div class="tab-content px-1 pt-1">
              <div id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1" class="tab-pane active">
                <div id="activity" class="col-12 timeline-left">
                  <h6 class="mt-1 mb-3 text-bold-400">RECENT ACTIVITY</h6>
                  <div id="timeline" class="timeline-left timeline-wrapper">
                    <ul class="timeline">
                      <li class="timeline-line"></li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-purple bg-lighten-1"><i class="ft-shopping-cart"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="deep-purple-text medium-small">just now</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-info bg-lighten-1"><i class="fa fa-plane"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="cyan-text medium-small">Yesterday</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-success bg-lighten-1"><i class="ft-mic"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="green-text medium-small">5 Days Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-warning bg-lighten-1"><i class="ft-map-pin"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="amber-text medium-small">1 Week Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-red bg-lighten-1"><i class="ft-inbox"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="deep-orange-text medium-small">2 Week Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-cyan bg-lighten-1"><i class="ft-mic"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="brown-text medium-small">1 Month Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-amber bg-lighten-1"><i class="ft-map-pin"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="deep-purple-text medium-small">3 Month Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-grey bg-lighten-1"><i class="ft-inbox"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="grey-text medium-small">1 Year Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div id="chat-tab" aria-labelledby="base-tab2" class="tab-pane">
                <div id="chatapp" class="col-12">
                  <h6 class="mt-1 mb-3 text-bold-400">RECENT CHAT</h6>
                  <div class="collection border-none">
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-12.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Elizabeth Elliott</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.00 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Thank you</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-6.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Mary Adams</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.14 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Hello Boo</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-11.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Caleb Richards</h4><span class="medium-small float-right blue-grey-text text-lighten-3">9.00 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Keny !</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-18.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">June Lane</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.14 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Ohh God</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-1.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Edward Fletcher</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.15 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Love you</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-2.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Crystal Bates</h4><span class="medium-small float-right blue-grey-text text-lighten-3">8.00 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Can we</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-3.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Nathan Watts</h4><span class="medium-small float-right blue-grey-text text-lighten-3">9.53 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Great!</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-15.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Willard Wood</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.20 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Do it</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-19.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Ronnie Ellis</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.30 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Got that</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-14.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Gwendolyn Wood</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.34 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Like you</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-13.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Daniel Russell</h4><span class="medium-small float-right blue-grey-text text-lighten-3">12.00 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Thank you</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-22.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Sarah Graves</h4><span class="medium-small float-right blue-grey-text text-lighten-3">11.14 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Okay you</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-9.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Andrew Hoffman</h4><span class="medium-small float-right blue-grey-text text-lighten-3">7.30 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Can do</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-20.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Camila Lynch</h4><span class="medium-small float-right blue-grey-text text-lighten-3">2.00 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Leave it</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="settings-tab" aria-labelledby="base-tab3" class="tab-pane">
                <div id="settings" class="col-12">
                  <h6 class="mt-1 mb-3 text-bold-400">GENERAL SETTINGS</h6>
                  <ul class="list-unstyled">
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Notifications</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="notifications1" checked="checked" type="checkbox" class="custom-control-input">
                              <label for="notifications1" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>Use checkboxes when looking for yes or no answers.</p>
                    </li>
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Show recent activity</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="recent-activity1" checked="checked" type="checkbox" class="custom-control-input">
                              <label for="recent-activity1" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </li>
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Notifications</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="notifications2" type="checkbox" class="custom-control-input">
                              <label for="notifications2" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>Use checkboxes when looking for yes or no answers.</p>
                    </li>
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Show recent activity</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="recent-activity2" type="checkbox" class="custom-control-input">
                              <label for="recent-activity2" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </li>
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Show your emails</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="show-emails" type="checkbox" class="custom-control-input">
                              <label for="show-emails" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>Use checkboxes when looking for yes or no answers.</p>
                    </li>
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Show Task statistics</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="show-stats" type="checkbox" class="custom-control-input">
                              <label for="show-stats" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </aside>
    <!-- END Notification Sidebar-->
    <!-- END Notification Sidebar-->
    <!-- Theme customizer Starts-->
    <?php include('../../app-assets/inc/themecustomizer.inc');?>
    <!-- Theme customizer Ends-->
    <?php include('../../app-assets/inc/user-js-bawah.inc');?>
  </body>
  <!-- END : Body-->
</html>