<?php
require_once("../includes/facebook.php");

$config = array();
$config['appId'] = '535694033108343';
$config['secret'] = '4954b965a28f7ad9309c622dcca5a14';
$config[ 'fileUpload']= false; //optional

$facebook= new Facebook($config);
$params= array(
'redirect_uri'=> 'http://test.com/buy.php'
);
$loginUrl = $facebook -> getLoginUrl($params);

?>




<style>
#content.home {
	background: #fff url('img/headerfile2.jpg') bottom center no-repeat;
	height: 450px;
	padding: 30px 0;
}
#lead-title {
text-align: center;
padding: 10px 0;
font-size: 48px;
color: #828282;
margin-bottom: 30px;
font-family: Tahoma, sans-serif;
line-height: 100%;
background: -webkit-gradient(linear, left top, left bottom, from(#ACACAC), to(#828282));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
</style>
<script type="text/javascript">
	$(document).ready(function() {

		$('#facebook-connect-btn').onClick="location.href='../img/headerfile2.png'"
		

	});</script>
	
<script>
  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '535694033108343', // App ID
      channelUrl : 'localhost/html/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional init code here
    FB.getLoginStatus(function(response) {
     if (response.status === 'connected') {
      // connected
    } else if (response.status === 'not_authorized') {
    // not_authorized
    login();
    } 
    else {
    // not_logged_in
    login();
    }
 });
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
   
   function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            // connected
        } else {
            // cancelled
        }
    });
}

function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        console.log('Good to see you, ' + response.name + '.');
    });
}
</script>

<FORM>
<INPUT TYPE="button" VALUE="LOGIN"
onClick="FB.login()">
</body>

<div id="content" class="home">
	<div class="container">
		<h2 id="lead-title">Discover Who Likes You<br/>While Staying Anonymous </h2>
		<div class="aligncenter">
			<a id="facebook-connect-btn" style="cursor: pointer;"href=<?=$loginUrl?><strong>Anonymously Log In</strong></a>
		</div>

		<div class="bubble green-bubble bubble-1" style="bottom: 100px; left: 60px;">I think Hana is cute!</div>
		<div class="bubble pink-bubble bubble-2" style="bottom: 5px; left: 340px;">I totally want to hook up with Sydney!</div>
		<div class="bubble blue-bubble bubble-3" style="bottom: 42px; left: 608px;">How are you doing?</div>
		<div class="bubble yellow-bubble bubble-4" style="bottom: 140px; left: 750px;">OMG I like you too!</div>
	</div>
</div><!-- /#content en-us -->
	<div id="footer" class="container">
		<div class="row">
		<div class="span6">
			<ul id="footer-menu">
				<li><a href="/team">About</a></li>
				<li><a href="/jobs">Careers</a></li>
				<li><a href="mailto: info@chirpme.com">Feedback</a></li>
				<li><a href="/privacy">Privacy Policy</a></li>
			</ul>

			<div id="footer-copy">
				&copy; Hookup Harvard
			</div>
		</div>

		<div class="span6">
			
		</div>
	</div>
	</div>
	</body>
</html>

