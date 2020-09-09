<nav class="navbar navbar-expand-lg fixed-top py-3 navbar-dark">
	<div class="container">
		<a class="navbar-brand" href="index.php">Quotty</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav ml-auto small">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Collections</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Post</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Saved</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Profile</a>
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