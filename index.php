<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" >
<head>
<title>FB Like Gate</title>
<style>
.fb-like-modal{position:fixed !important;top:10% !important;left:50% !important;margin-left:-225px !important;width:450px !important;z-index:1024;background:#fff;padding:15px;box-shadow:0px 3px 6px #555;}
.fb-like-modal h4{font-size:15px;font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;margin:0 0 10px 0;color:#cc0000;}
.backdrop{position:fixed;top:0;left:0;bottom:0;right:0;background:rgba(85,85,85,0.8);z-index:1000;}
.hide{display: none;}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//connect.facebook.net/en_US/all.js"></script>
<script>
var fb_uid,
	fb_pid = 122671411130626;
FB.init({
	appId		: '407725032616899',
	channelUrl 	: '//jobnitor.com',
	status 		: true,
	cookie		: true,
	xfbml		: true,
});
FB.getLoginStatus(function(response){
	console.log(response);
	if(response.status=='connected'){		
		fb_uid = response.authResponse.userID;
		FB.api({
			method: 'fql.query',
			query: 'SELECT uid FROM page_fan WHERE page_id = '+fb_pid+'and uid='+fb_uid
		},function(r){
			if(r=='' && document.cookie.indexOf('like')==-1){
				$('body').append('<div class="backdrop"></div>');
				$('.fb-like-modal').show();
			}
		});
	}	
	else{
		authorize();
		$('body').append('<div class="backdrop"></div>');
		$('.fb-like-modal').show();
	}
});
/* capture event when like button clicked */
FB.Event.subscribe('edge.create',function(response) {
	if(response){
		$('.fb-like-modal').hide();
		$('.backdrop').remove();
		var date = new Date();
			date.setTime(date.getTime() + (60*1000*60*24*30));			
		/* trying to set a cookie due to long cache of method fql.query */
		document.cookie = 'like=1;expires='+date.toUTCString()+';path=/';
	}
});
function authorize(){
	FB.login(function(response){
		if(response.status=='connected'){		
			location.reload();
		}	
		else{
			$('.fb-like-must').show();
			authorize();
		}
	});
}
</script>
</head>
<body>
	<div class="fb-like-modal hide">
		<h4 class="fb-like-must hide">You need to authorized your account to access this page.</h4>
		<div class="fb-like-box" data-href="https://www.facebook.com/Calapenians" data-width="450" data-show-faces="true" data-stream="false" data-header="true"></div>
	</div>
</body>
</html>