<?php
require "php/db.php";
include_once 'php/functions.php';

$data = $_GET;
$user = null;
$sort_by = 'creation_date';
$order = 'desc';
$quantity_per_page = 10;

if(isset($_SESSION['logged_user']))
{
	$user = $_SESSION['logged_user'];
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

if (isset($_POST['liked'])) {
	$postid = $_POST['postid'];
	$n = get_likes_by_quote($postid)[0]['likes'];

	$like = R::dispense('likes');
	$like->user_id = $user['id'];
	$like->quote_id = $postid;
	R::store($like);

	update_quote_likes($n + 1, $postid);
	echo $n + 1;
	exit();
}
if (isset($_POST['unliked'])) {
	$postid = $_POST['postid'];
	$n = get_likes_by_quote($postid)[0]['likes'];

	$deleterow = R::exec('DELETE FROM likes WHERE quote_id = ? AND user_id = ?', [$postid, $user['id']]);

	update_quote_likes($n - 1, $postid);
	echo $n - 1;
	exit();
}

if (isset($_POST['saved'])) {
	$postid = $_POST['postid'];

	$save = R::dispense('saves');
	$save->user_id = $user['id'];
	$save->quote_id = $postid;
	R::store($save);

	exit();
}
if (isset($_POST['unsaved'])) {
	$postid = $_POST['postid'];

	$deleterow = R::exec('DELETE FROM saves WHERE quote_id = ? AND user_id = ?', [$postid, $user['id']]);

	exit();
}
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
	<!-- Habibi -->
	<link href="https://fonts.googleapis.com/css2?family=Habibi&display=swap" rel="stylesheet">
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
					<div class="card border-secondary mb-4">
						<div class="card-body">
							<blockquote class="blockquote mb-0 text-left">
								<div class="container">
									<div class="row">
										<div class="col-1 p-0">
											<img src="img/quote_left.png" class="float-right" alt="quote">
										</div>
										<div class="col pt-2">
											<p class="text-habibi"><?= $quote['text'] ?></p>
										</div>
										<div class="col-1 align-self-end p-0">
											<img src="img/quote_right.png" class="float-left mb-3" alt="quote">
										</div>
									</div>
									<div class="row">
										<div class="col-1"></div>
										<div class="col">
											<footer class="blockquote-footer text-habibi"><?= $quote['author'] ?></footer>
										</div>
										<div class="col-2 text-right">
											<span>
												<?php if (count_likes_by_user_and_quote($user['id'], $quote['id']) == 1) : ?>
													<button type="button" class="btn btn-sm unlike" data-id="<?= $quote['id']; ?>" style="display: inline;">
														<svg class="bi" width="16" height="16" fill="currentColor">
															<use xlink:href="vendor/bootstrap-icons.svg#heart-fill" />
														</svg>
														<span class="likes_count">
															<?= count_likes_by_quote_id($quote['id']) ?>
														</span>
													</button>
													<button type="button" class="btn btn-sm like" data-id="<?= $quote['id']; ?>" style="display: none;">
														<svg class="bi" width="16" height="16" fill="currentColor">
															<use xlink:href="vendor/bootstrap-icons.svg#heart" />
														</svg>
														<span class="likes_count">
															<?= count_likes_by_quote_id($quote['id']) ?>
														</span>
													</button>
												<?php else : ?>
													<button type="button" class="btn btn-sm like" data-id="<?= $quote['id']; ?>" style="display: inline;">
														<svg class="bi" width="16" height="16" fill="currentColor">
															<use xlink:href="vendor/bootstrap-icons.svg#heart" />
														</svg>
														<span class="likes_count">
															<?= count_likes_by_quote_id($quote['id']) ?>
														</span>
													</button>
													<button type="button" class="btn btn-sm unlike" data-id="<?= $quote['id']; ?>" style="display: none;">
														<svg class="bi" width="16" height="16" fill="currentColor">
															<use xlink:href="vendor/bootstrap-icons.svg#heart-fill" />
														</svg>
														<span class="likes_count">
															<?= count_likes_by_quote_id($quote['id']) ?>
														</span>
													</button>
												<?php endif; ?>
											</span>
											<span>
												<?php if (count_saves_by_user_and_quote($user['id'], $quote['id']) == 1) : ?>
													<button type="button" class="btn btn-sm unsave" data-id="<?= $quote['id']; ?>" style="display: inline;">
														<svg class="bi" width="16" height="16" fill="currentColor">
															<use xlink:href="vendor/bootstrap-icons.svg#bookmark-fill" />
														</svg>
													</button>
													<button type="button" class="btn btn-sm save" data-id="<?= $quote['id']; ?>" style="display: none;">
														<svg class="bi" width="16" height="16" fill="currentColor">
															<use xlink:href="vendor/bootstrap-icons.svg#bookmark" />
														</svg>
													</button>
												<?php else : ?>
													<button type="button" class="btn btn-sm save" data-id="<?= $quote['id']; ?>" style="display: inline;">
														<svg class="bi" width="16" height="16" fill="currentColor">
															<use xlink:href="vendor/bootstrap-icons.svg#bookmark" />
														</svg>
													</button>
													<button type="button" class="btn btn-sm unsave" data-id="<?= $quote['id']; ?>" style="display: none;">
														<svg class="bi" width="16" height="16" fill="currentColor">
															<use xlink:href="vendor/bootstrap-icons.svg#bookmark-fill" />
														</svg>
													</button>
												<?php endif; ?>
											</span>
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
								<a class="page-link" href="index.php?page=<?= ($page - 1) ?>">&laquo;</a>
							</li>
							<li class="page-item"><a class="page-link" href="index.php?page=1">1</a></li>
							<?php if ($page > 4) : ?>
								<li class="page-item disabled"><a class="page-link">...</a></li>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page - 3) ?>"><?= $page - 3 ?></a></li>
							<?php endif; ?>
							<?php if ($page > 3) : ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page - 2) ?>"><?= $page - 2 ?></a></li>
							<?php endif; ?>
							<?php if ($page > 2) : ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page - 1) ?>"><?= $page - 1 ?></a></li>
							<?php endif; ?>
						<?php endif; ?>

						<li class="page-item active">
							<span class="page-link"><?= $page ?><span class="sr-only">(current)</span></span>
						</li>

						<?php if ($page != $total) : ?>
							<?php if ($page + 1 < $total) : ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page + 1) ?>"><?= $page + 1 ?></a></li>
							<?php endif; ?>
							<?php if ($page + 2 < $total) : ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page + 2) ?>"><?= $page + 2 ?></a></li>
							<?php endif; ?>
							<?php if ($page + 3 < $total) : ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?= ($page + 3) ?>"><?= $page + 3 ?></a></li>
								<?php if ($page + 3 != $total - 1) : ?>
									<li class="page-item disabled"><a class="page-link">...</a></li>
								<?php endif; ?>
							<?php endif; ?>

							<li class="page-item"><a class="page-link" href="index.php?page=<?= $total ?>"><?= $total ?></a></li>

							<li class="page-item">
								<a class="page-link" href="index.php?page=<?= ($page + 1) ?>">&raquo;</a>
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
	<!-- Likes -->
	<script src="js/like.js"></script>
	<!-- Saves -->
	<script src="js/save.js"></script>

</body>

</html>