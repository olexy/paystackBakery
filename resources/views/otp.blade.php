<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Validate Account Number</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/html_style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Authorize Your Transfer</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
						<form action="/transfer/auth" name="createRe" onsubmit="return validateField()" method="POST">
						{{ csrf_field() }}			
			<table cellspacing=5 cellpadding=5>
			<tr>
				<td>Transfer Code : </td><td><input type="text" name="txt_transfercode" value="{{$arr[0]}}" readonly></td>
			</tr>
			<tr>
				<td>OTP : </td><td><input type="text" name="txtotp" required></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="cmdBank" value="Authorize Transfer!"> </td>
			</tr>
			</table>	
		
	</form>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2019 psBakery. All rights reserved | Design by <a href="/" target="_blank">psBakery</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>