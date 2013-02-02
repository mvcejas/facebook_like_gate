<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" >
<head>
<title>FB Like Gate</title>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
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
	if(response.status=='connected'){
		var fb_pid = 1226714111306260;
		var fb_uid = response.authResponse.userID;
		var fb_fql = "SELECT uid FROM page_fan WHERE page_id = "+fb_pid+"and uid="+fb_uid;
		FB.api({
			method: 'fql.query',
			query: fb_fql
		},function(r){
			if(r==''){
				$('#fb_likegate').modal();
			}
		});
	}else{
		$('#fb_likegate').modal();
	}
});
FB.Event.subscribe('edge.create',function(response) {
	if(response){
		$('#fb_likegate').modal('hide');
	}
});
</script>
<style>
._5v4{display: none !important;}
</style>
</head>
<body>
	<div id="fb_likegate" class="modal hide">
		<div class="modal-header">
			<h5>Please like our page before you can view the complete page.</h5>
		</div>
		<div class="modal-body" style="height">
			<div class="fb-like-box" data-href="https://www.facebook.com/Calapenians" data-width="530" data-show-faces="true" data-stream="false" data-header="true"></div>
		</div>
	</div>
</body>
</html>