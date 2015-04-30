<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>FileUpload</title>
	<meta name="description" content="Load file into the server">
	<meta name="author" content="dmitry.lobanow@gmail.com">

	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
<div class="container-narrow">
	<div class="masthead">
		<ul class="nav nav-pills pull-right">
			<li class="<?= $activeAll ?>"><a href="get?All">All user file</a></li>
			<li class="<?= $activeUser ?>"><a href="get?User">My file</a></li>
			<li class="<?= $activePut ?>"><a href="put">Upload</a></li>
			<li class="logout"><a href="logout">Logout</a></li>
		</ul>
		<h3 class="muted">FileUpload</h3>
	</div>

	<hr>

	<?php include 'application/views/' . $template . '.php'; ?>

	<hr>

	<div class="footer">
		<p>dmitry.lobanow@gmail.com</p>
	</div>

</div>
</body>

</html>