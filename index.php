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
	xfbml		: true,
});
FB.getLoginStatus(function(response) {
	console.log(response);
	if(response.status=='connected'){
		var fb_pid = 122671411130627;
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
</script>
</head>
<body>
	<div id="fb_likegate" class="modal hide">
		<div class="modal-header">
			<h6>Please like our page before you can view the complete page.</h6>
		</div>
		<div class="modal-body">
			<fb:like send="true" width="450" show_faces="true" />
		</div>
	</div>
</body>
</html>