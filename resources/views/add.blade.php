<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Create A New Recipientm</title>
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
		<h1>Create A New Recipient</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
			<form  action="/store/recipent" name="createRe" onsubmit="return validateField()" method="POST">
			{{ csrf_field() }}			
			<table>
			<tr>
				<td colspan=2 align=center><a href="/validate" target="_blank">Click here to verify account name</a></td>
			</tr>
			<tr>
				<td>Full Name : </td> <td><input type="text" value="" name="txtname" required></td>
			</tr>
			<tr>
				<td>Description : </td><td><input type="text" value="" name="txtdesc" required></td>
			</tr>
			<tr>
				<td>Account Number : </td><td><input type="text" value="" name="txtaccount" required></td>
			</tr>
			<tr>
				<td>Bank Name : </td><td><select name="bankname">
				    <option value="044">Access Bank</option>
					<option value="023">Citibank Nigeria</option>
					<option value="063">Diamond Bank</option>
					<option value="050">Ecobank Nigeria</option>
					<option value="084">Enterprise Bank</option>
					<option value="070">Fidelity Bank</option>
					<option value="011">Firstbank</option>
					<option value="214">First City Monument Bank</option>
					<option value="058">Guaranty Trust Bank</option>
					<option value="030">Heritge Bank</option>
					<option value="082">Keystone Bank</option>
					<option value="014">Mainstreet Bank</option>
					<option value="076">Skye Bank</option>
					<option value="221">Stanbic IBTC Bank</option>
					<option value="068">Standard Chartered Bank</option>
					<option value="232">Sterling Bank</option>
					<option value="032">Union Bank Of Nigeria</option>
					<option value="033">United Bank for Africa</option>
					<option value="215">Unity Bank</option>
					<option value="035">Wema Bank</option>
					<option value="057">Zenith Bank</option>
				</select></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="cmdrep" value="Create Recipient"> </td>
			</tr>
			</table>	
		
	</form>
				<p>Don't have an Account? <a href="#"> Login Now!</a></p>
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