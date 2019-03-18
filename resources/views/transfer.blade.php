<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Transfer To A Recipient</title>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@include('sweet::alert')
<?php
?>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Transfer To A Recipient</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
	<form action="/otp" name="trans" method="POST">
	{{ csrf_field() }}
	<table>
		<tr>
			<td> Select Transfer Recipient</td> <td><select name="recTran">

				@foreach($recipients as $recipient)
				<option value="{{$recipient->recipientCode}}"> {{$recipient->fullname}}</option>
		
				@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Amount : </td> <td> <input type="text" name="amtTran"></td>
		</tr>
		<tr>
			<td>Reason : </td> <td> <input type="text" name="reason"></td>
		</tr>
		<tr>
			<td colspan=2 align=center><input type="submit" value="Transfer Now!" name="cmdtran"></td>
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