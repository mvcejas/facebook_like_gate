<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" >
<head>
<title>FB Like Gate</title>
<style>
.fb-like-modal{position:fixed !important;top:10% !important;left:50% !important;margin-left:-225px !important;width:450px !important;z-index:1024;background:#fff;padding:15px;box-shadow:0px 3px 6px #555;}
.backdrop{position:fixed;top:0;left:0;bottom:0;right:0;background:rgba(85,85,85,0.8);z-index:1000;}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
<script src="//connect.facebook.net/en_US/all.js"></script>
<script>
FB.init({
	appId		: '407725032616899',
	channelUrl 	: '//localhost',
	status 		: true,
	cookie		: true,
	xfbml		: true,
});
FB.getLoginStatus(function(response) {
	console.log(response);
	if(response.status=='connected'){
		var fb_pid = 1226714111306260;
		var fb_uid = response.authResponse.userID;
		var fb_fql = "SELECT uid FROM page_fan WHERE page_id = "+fb_pid+"and uid="+fb_uid;
		FB.api({
			method: 'fql.query',
			query: fb_fql
		},function(r){
			console.log(r);
			if(r==''){
				$('body').append('<div class="backdrop"></div>');
				$('.fb-like-box').fadeIn();				
			}
		});
	}else{
		$('body').append('<div class="backdrop"></div>');
		$('.fb-like-box').fadeIn();		
	}
});
FB.Event.subscribe('edge.create',function(response) {
	if(response){
		$('.fb-like-box').hide();
		$('.backdrop').remove();
	}
});
</script>
</head>
<body>
	<div class="fb-like-modal">
		<div class="fb-like-box" data-href="https://www.facebook.com/Calapenians" data-width="450" data-show-faces="true" data-stream="false" data-header="true"></div>
		
	</div>
</body>
</html>