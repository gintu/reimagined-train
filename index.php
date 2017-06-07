<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

if(!empty($_SESSION['uid']))
{
  header("Location:profile.php");
}
if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	$redirectURL='profilecheck.php';

	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();

	//Initialize User class
	$user = new User();
//$cookie_name = "user";
//$cookie_value = $gpUserProfile['given_name'];
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

	//Insert or update user data to the database
$_SESSION["uid"] = $gpUserProfile['id'];
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],

        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture']
        //'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
  $_SESSION['picture'] = $gpUserProfile['picture'];
	//Storing user data into session
	$_SESSION['userData'] = $userData;

	//Render facebook profile data
  
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<center><a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="btn btn-common wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms" >Connect with Google</a></center>';
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>Index</title>

    <!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet"  />
    <link rel="stylesheet" href="titl/css/bootstrap.min.css">
    <link rel="stylesheet" href="titl/css/font-awesome.min.css">
    <link rel="stylesheet" href="titl/css/line-icons.css">
    <link rel="stylesheet" href="titl/css/owl.carousel.css">
    <link rel="stylesheet" href="titl/css/owl.theme.css">
    <link rel="stylesheet" href="titl/css/nivo-lightbox.css">
    <link rel="stylesheet" href="titl/css/magnific-popup.css">
    <link rel="stylesheet" href="titl/css/animate.css">
    <link rel="stylesheet" href="titl/css/menu_sideslide.css">
    <link rel="stylesheet" href="titl/css/main.css">
    <link rel="stylesheet" href="titl/css/responsive.css">

  </head>
  <body>

  	<!-- Header Section Start -->

    <header id="video-area" data-stellar-background-ratio="0.5"style="height:100vh">
      <div id="block" data-vide-bg="titl/video/123"></div>

      <div class="overlay overlay-2"></div>
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-10">
    <br><br><br><br><br>
            <div class="contents text-center"  style="">

              <h1 class="wow fadeInDown"  data-wow-duration="1000ms" data-wow-delay="0.3s"><div style="font-size:7.2vw;">#ShareMyRide</div></h1>
							<h1 class="lead  wow fadeIn"  data-wow-duration="1000ms" data-wow-delay="400ms"><div style="font-size:2.2vw;margin-top:5vh"> Because a shared trip is a better trip</div></h1>

							<div class="container" style="margin-top:5vh" ><?php echo $output; ?></div>
              <h1 class="lead  wow fadeIn"  data-wow-duration="1000ms" data-wow-delay="400ms"><div style="font-size:1.2vw;margin-top:25vh">Made with ♥ in RIT</div></h1>
            <!--  <a href="#" class="btn btn-common wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms"> Sign In With Google</a>-->

            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Header Section End -->




    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lnr lnr-arrow-up"></i>
    </a>

    <div id="loader">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>
		<!--<div class="container"><?php echo $output; ?></div>-->
		<!--<a href="create_profile.php">update</a> -->
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="js/bootstrap.min.js"></script>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="titl/js/jquery-min.js"></script>
    <script src="titl/js/tether.min.js"></script>
    <script src="titl/js/bootstrap.min.js"></script>
    <script src="titl/js/classie.js"></script>
    <script src="titl/js/mixitup.min.js"></script>
    <script src="titl/js/nivo-lightbox.js"></script>
    <script src="titl/js/owl.carousel.min.js"></script>
    <script src="titl/js/jquery.stellar.min.js"></script>
    <script src="titl/js/jquery.nav.js"></script>
    <script src="titl/js/smooth-scroll.js"></script>
    <script src="titl/js/smooth-on-scroll.js"></script>
    <script src="titl/js/wow.js"></script>
    <script src="titl/js/menu.js"></script>
    <script src="titl/js/jquery.vide.js"></script>
    <script src="titl/js/jquery.counterup.min.js"></script>
    <script src="titl/js/jquery.magnific-popup.min.js"></script>
    <script src="titl/js/waypoints.min.js"></script>
    <script src="titl/js/form-validator.min.js"></script>
    <script src="titl/js/contact-form-script.js"></script>
    <script src="titl/js/main.js"></script>

  </body>
</html>
