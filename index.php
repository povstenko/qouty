<?php
require "php/db.php";
include_once 'php/functions.php';

?>

<!DOCTYPE html>
<html lang="ua">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Quoty</title>

	<link rel="shortcut icon" href="favicon.ico">

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Google Material Design Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Font Awesome Icons -->
	<link href="vendor/fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet">

	<!--load all styles -->
	<link href="css/main.css" rel="stylesheet">
</head>

<body class="text-center text-white">
	<!-- Preloader -->
	<?php include_once 'templates/preloader.html'; ?>

	<!-- Back to top button -->
	<a id="back-to-top-button"></a>

	<!-- Navigation -->
	<?php include_once 'templates/navbar.php'; ?>

	<!-- Navigation -->
	<?php include_once 'templates/header.php'; ?>

	<!-- Page Content -->
	<section class="my-bg-gray text-dark">
		<div class="container py-5 w-75">
			<div class="card border-secondary shadow mb-4">
				<div class="card-body">
					<blockquote class="blockquote mb-0 text-left">
						<div class="container">
							<div class="row">
								<div class="col-1">
								<h1 class="display-3 my-0">“</h1>
								</div>
								<div class="col">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
								</div>
								<div class="col-1">
								<h1 class="display-3 my-0">”</h1>
								</div>
							</div>
						</div>
						<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
				</div>
			</div>
			<div class="card border-secondary shadow mb-4">
				<div class="card-body">
					<blockquote class="blockquote mb-0 text-left">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
				</div>
			</div>
			<div class="card border-secondary mb-4">
				<div class="card-body">
					<blockquote class="blockquote mb-0 text-left">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
				</div>
			</div>
			<div class="card border-secondary mb-4">
				<div class="card-body">
					<blockquote class="blockquote mb-0 text-left">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
				</div>
			</div>
			<div class="card border-secondary mb-4">
				<div class="card-body">
					<blockquote class="blockquote mb-0 text-left">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php include_once 'templates/footer.php'; ?>

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Main sctipt -->
	<script src="js/script.js"></script>
	<!-- Back to top button -->
	<script src="js/top.js"></script>

</body>

</html>