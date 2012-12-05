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
<a href=<?=$loginUrl?>Login</a>



<style>
#content.home {
	background: #fff url('img/headerfile2.jpg') bottom center no-repeat;
	height: 450px;
	padding: 30px 0;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {

		$('#header-popover-close').click(function(){
			$('#header-popover').fadeOut(60);

			return false;
		});

		$('#facebook-connect-btn').hover(
			function()
			{
				$('#button-popover').fadeIn(500);
				$('#facebook-connect-btn').fadeTo(250,0.5);
			},
			function()
			{
				$('#button-popover').fadeOut(500);
				$('#facebook-connect-btn').fadeTo(250,1);
			});

	});</script>
	

<div id="content" class="home">
	<div class="container">
		<h2 id="lead-title">Discover Who Likes You<br/>While Staying Anonymous </h2>
		<div class="aligncenter">
			<a id="facebook-connect-btn" style="cursor: pointer;"><strong>Anonymously Log In</strong></a>
			<div id="button-popover">
\				<div class="button-popover-text" href="#">Currently not available</div>
				<div class="button-popover-text" href="#">in your area, coming soon!</div>
			</div>
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

