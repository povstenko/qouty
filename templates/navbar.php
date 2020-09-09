<nav class="navbar navbar-expand-lg fixed-top py-3 navbar-dark">
	<div class="container">
		<a class="navbar-brand" href="index.php">Quotty</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav ml-auto small">
				<li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "index.php") ? "active" : "" ?>">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "collections.php") ? "active" : "" ?>">
					<a class="nav-link" href="<?= (isset($_SESSION['logged_user'])) ? "collections.php" : "signin.php" ?>">Collections</a>
				</li>
				<li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "create.php") ? "active" : "" ?>">
					<a class="nav-link" href="<?= (isset($_SESSION['logged_user'])) ? "create.php" : "signin.php" ?>">Create</a>
				</li>
				<li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "saved.php") ? "active" : "" ?>">
					<a class="nav-link" href="<?= (isset($_SESSION['logged_user'])) ? "saved.php" : "signin.php" ?>">Saved</a>
				</li>
				<li class="nav-item <?= (basename($_SERVER['PHP_SELF']) == "profile.php") ? "active" : "" ?>">
					<a class="nav-link" href="<?= (isset($_SESSION['logged_user'])) ? "profile.php" : "signin.php" ?>">Profile</a>
				</li>
				<?php if (isset($_SESSION['logged_user'])) : ?>
					<li class="nav-item">
						<a class="btn btn-sm my-btn-outline-white my-2 ml-3 my-sm-0 text-white" href="php/logout.php">Log Out</a>
					</li>
				<?php else : ?>
					<li class="nav-item">
						<a class="btn btn-sm my-btn-outline-white my-2 ml-3 my-sm-0 text-white" href="signin.php">Sign In</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>

	</div>
</nav>