<?php use yii\helpers\Url; ?>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div  class="header-container d-flex align-items-center">
        <div  style = "background-color:#4691d4;" class="logo mr-auto">
          <h1 class="text-light"><a href="<?= Url::to(['job/list'])?>"><span>GUtechJobs</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="<?= Url::to(['job/list'])?>">Jobs</a></li>

            <li><a href="<?= Url::to(['site/contact'])?>">Contact Us</a></li>
            <li class="drop-down"><a href="">Admin</a>
              <ul>
                <li><a href="<?= Url::to(['application/'])?>">Application</a></li>
                <li><a href="<?= Url::to(['job/create'])?>">New Job</a></li>
                <li><a href="<?= Url::to(['job/'])?>">Jobs</a></li>
                <li><a data-method='post' href="<?= Url::to(['site/logout'])?>">Signout</a></li>
              </ul>
            </li>
            <li><a href="<?= Url::to(['site/login'])?>">Login</a></li>


          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->
