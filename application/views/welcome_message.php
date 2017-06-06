<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to EE-cloud web portal</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: #333;
	}

	li {
	float: left;
	}

	li a {
	display: block;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
	}

	li a:hover {
	background-color: #111;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to EE-cloud web portal!</h1>
	<ul>
	  <li><a class="active" href="#home">Home</a></li>
	  <li><a href="csv">Send NIMS E-Mail</a></li>
	  <li><a href="#contact">Contact</a></li>
	  <li><a href="#about">About</a></li>
	</ul>
	<div id="body">		
		<p>The Start upload and converting <a href='<?php echo "index.php/csv/"; ?>' > Click here</a></p>
		<!--<p>Please read <a href='README.txt'>README.txt</a> section, to avoid any issue, however below points need to taken care</p>
		<code>  
		<p>
			<b><u>FOR Red Hat Enterprise Linux Server release 6.6 (Santiago), follow the below instruction</u></b>
			<div><ul>
			<li> Install apache in the rhel machine (yum install -y httpd) </li>
			<li> Start the apache service. (service httpd start) </li>
			<li> Copy the zip file to rhel 6.x machine </li>
			<li> extract the CI.zip </li>
			<li> change the permission (cd CI; chmod -R 777 system/) </li>
			<li> Go to browser and type http://IP-Addr/CI </li>
			</ul></div>

			<b><u>For WINDOWS, follow the below instruction</u></b>
			<div><ul>
			<li> Download and install XAMPP (https://www.apachefriends.org/download.html) </li>
			<li> under xampp/htdocs/ place the CI.zip file </li>
			<li> Extract the ZIP file </li>
			<li> Make sure apache is started </li>
			<li> go to browser and type http://localhost/CI </li>
			</ul></div>
		</p>
		</code>
		
		<p>The Start upload and send email <a href='<?php echo "index.php/csv/"; ?>' > Click here</a></p>-->
		

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>