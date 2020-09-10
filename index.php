<?php
require "php/db.php";
include_once 'php/functions.php';

$data = $_GET;
$sort_by = 'creation_date';
$order = 'desc';
$quantity_per_page = 10;

$request = '';
foreach (array_keys($data) as $key) {
	if ($key != 'page') {
		$request .= $key . '=' . $data[$key];
		if (key(array_slice($data, -1, 1, true)) != $key)
			$request .= '&';
	}
}

$total = intval((count_quotes() - 1) / $quantity_per_page) + 1;

if (isset($data['page']) and $data['page'] > 0) {
	if ($data['page'] > $total) {
		$page = $total;
	} else {
		$page  = $data['page'];
	}
} else {
	$page = 1;
}

$start = ($page - 1) * $quantity_per_page;

$quotes = get_quotes_limit($sort_by, $order, $start, $quantity_per_page);
?>

<!DOCTYPE html>
<html lang="ua">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Quotty</title>

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

	<!-- Quote of the day header -->
	<?php include_once 'templates/header.php'; ?>

	<!-- Page Content -->
	<section class="my-bg-gray text-dark">
		<div class="container py-5 w-75">
			<?php if ($quotes) :
				foreach ($quotes as $quote) : ?>
					<div class="card border-secondary shadow mb-4">
						<div class="card-body">
							<blockquote class="blockquote mb-0 text-left">
								<div class="container">
									<div class="row">
										<div class="col-1 p-0">
											<img src="img/quote_left.png" class="float-right" alt="quote">
										</div>
										<div class="col pt-2">
											<p><?= $quote['text'] ?></p>
										</div>
										<div class="col-1 align-self-end p-0">
											<img src="img/quote_right.png" class="float-left mb-3" alt="quote">
										</div>
									</div>
									<div class="row">
										<div class="col-1"></div>
										<div class="col">
											<footer class="blockquote-footer"><?= $quote['author'] ?></footer>
										</div>
										<div class="col-2 text-right">
											<button type="button" class="btn btn-sm">
												<svg class="bi" width="16" height="16" fill="currentColor">
													<use xlink:href="vendor/bootstrap-icons.svg#heart" />
												</svg>
												15
											</button>
											<button type="button" class="btn btn-sm">
												<svg class="bi" width="16" height="16" fill="currentColor">
													<use xlink:href="vendor/bootstrap-icons.svg#bookmark" />
												</svg>
											</button>
										</div>
									</div>
								</div>
							</blockquote>
						</div>
					</div>
				<?php endforeach; ?>

				<!-- Pagination-->
				<nav aria-label="Page navigation">
					<ul class="pagination justify-content-center mt-3 mt-md-0 mb-3">
						<?php if ($page == 1) : ?>
							<li class="page-item disabled">
								<span class="page-link">&laquo;</span>
							</li>
						<?php else : ?>
							<li class="page-item">
								<a class="page-link" href="index.php?page=<?= ($page - 1) . '&' . $request ?>">&laquo;</a>
							</li>
							<li class="page-item"><a class="page-link" href="index.php?page=1&<?= $request ?>">1</a></li>
							<?php if ($page > 4) : ?>
								<li class="page-item disabled"><a class="page-link">...</a></li>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page - 3) . '&' . $request ?>"><?= $page - 3 ?></a></li>
							<?php endif; ?>
							<?php if ($page > 3) : ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page - 2) . '&' . $request ?>"><?= $page - 2 ?></a></li>
							<?php endif; ?>
							<?php if ($page > 2) : ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page - 1) . '&' . $request ?>"><?= $page - 1 ?></a></li>
							<?php endif; ?>
						<?php endif; ?>

						<li class="page-item active">
							<span class="page-link"><?= $page ?><span class="sr-only">(current)</span></span>
						</li>

						<?php if ($page != $total) : ?>
							<?php if ($page + 1 < $total) : ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page + 1) . '&' . $request ?>"><?= $page + 1 ?></a></li>
							<?php endif; ?>
							<?php if ($page + 2 < $total) : ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page + 2) . '&' . $request ?>"><?= $page + 2 ?></a></li>
							<?php endif; ?>
							<?php if ($page + 3 < $total) : ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page + 3) . '&' . $request ?>"><?= $page + 3 ?></a></li>
								<?php if ($page + 3 != $total - 1) : ?>
									<li class="page-item disabled"><a class="page-link">...</a></li>
								<?php endif; ?>
							<?php endif; ?>

							<li class="page-item"><a class="page-link" href="index.php?page=<?= $total . '&' . $request ?>"><?= $total ?></a></li>

							<li class="page-item">
								<a class="page-link" href="index.php?page=<?= ($page + 1) . '&' . $request ?>">&raquo;</a>
							</li>
						<?php else : ?>
							<li class="page-item disabled">
								<span class="page-link">&raquo;</span>
							</li>
						<?php endif; ?>
					</ul>
				</nav>
			<?php else : ?>
				<div class="card border-secondary shadow mb-4">
					<div class="card-body">
						<blockquote class="blockquote mb-0 text-left">
							<div class="container">
								<div class="row">
									<div class="col-1 p-0">
										<img src="img/quote_left.png" class="float-right" alt="quote">
									</div>
									<div class="col pt-2">
										<p>There's no quotes yet.</p>
									</div>
									<div class="col-1 align-self-end p-0">
										<img src="img/quote_right.png" class="float-left mb-3" alt="quote">
									</div>
								</div>
								<div class="row">
									<div class="col-1"></div>
									<div class="col">
										<footer class="blockquote-footer">Developer`s team</footer>
									</div>
									<div class="col-2 text-right">
										<button type="button" class="btn btn-sm">
											<svg class="bi" width="16" height="16" fill="currentColor">
												<use xlink:href="vendor/bootstrap-icons.svg#heart" />
											</svg>
											∞
										</button>
										<button type="button" class="btn btn-sm">
											<svg class="bi" width="16" height="16" fill="currentColor">
												<use xlink:href="vendor/bootstrap-icons.svg#bookmark" />
											</svg>
										</button>
									</div>
								</div>
							</div>
						</blockquote>
					</div>
				</div>
			<?php endif; ?>
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