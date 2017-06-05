<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

$_SESSION['uid']="";

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

  //ABHI :  SETTING uid AS A SESSION VARIABLE IN THE SESSION 
$_SESSION["uid"] = $gpUserProfile['id'];
$_SESSION['lselect']="login";
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],

        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
    //    'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture']
        //'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);

	//STORING USER DATA INTO SESSION might not be required as already in db
	$_SESSION['userData'] = $userData;
  	//Render facebook profile data 
  //#DOUBT
    if(!empty($userData)){
      $output = '<h1>Details obtained from google</h1><h4>because we care about your privacy</h4><br><blockquote>';
        //$output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<div class="container">Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        //$output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google<br></blockquote></div>';

      //  $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
      //  $output .= '<br/>Logout from <a href="logout.php">Google</a>';
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<br><br><center><a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="btn btn-success" >Connect with Google</a></center>';
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>connect</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet"  />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
	<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" >#sharemyride</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
  <!--  <ul class="nav navbar-nav">
      <li class="active"><a href="#" data-vivaldi-spatnav-clickable="1">Link <span class="sr-only">(current)</span></a></li>
      <li><a href="#" data-vivaldi-spatnav-clickable="1">Link</a></li>

    </ul>

-->  <ul class="nav navbar-nav navbar-right">
  <li><a href="home_join_ride.php" data-vivaldi-spatnav-clickable="1">Find a ride</a></li>
</ul>
  <!--  <ul class="nav navbar-nav navbar-right">
			<li><a href="logout.php" data-vivaldi-spatnav-clickable="1">Logout</a></li>
		</ul>-->
  </div>
</div>
</nav>

<div class="jumbotron" >
	<div id="headp">


<h1>Share empty seats of your ride!</h1>
<p>#made_with_love_in_RIT.</p>
</div>
</div>

<div class="container"><?php echo $output; ?></div>
<!--<a href="create_profile.php">update</a> -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>
