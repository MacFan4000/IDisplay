<?php
$page=str_replace("[","&",$_GET["page"]);
?>
<html>
	<head>
		<title>Page Blocked</title>
		<style type="text/css">
			body
				{
				background-color: #DCDCDC;
				margin: 0 auto;
				}
			h1
				{
				position:absolute;
				top: 5%;
				text-align:center;
				width:95%;
				color:black;
				font-size:2.0em;
				}
			#link
				{
				position:absolute;
				top: 30%;
				width:95%;
				text-align:center;
				margin: 0 auto; 
				}
			#link img
				{
				border:0px;
				width: 20%;
				height: 20%;
				}
			#link a
				{
				color: black;
				font-size: 2.0em;
				text-decoration:none;
				}
			#text
				{
				position:absolute;
				bottom: 1%;
				text-align:center;
				width:95%;
				border-top:1px solid #808080; 
				color: #808080;
				font-size:0.8em;
				}
		</style>
	</head>
	<body>
		<h1>Weiter zur Anmeldung</h1>
		<div id="link">
			<a href="<?php echo $page;?>"><img src="unblock.png" alt="Unblock"/></a>
		</div>
		<div id="text">
			The page: <?php echo $page;?> has been blocked because it requires a Password.
			<br/>
			Press the Button to redirect to the site.
		</div>
	</body>
</html>
