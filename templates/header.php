<?php
$top = get_top_quote();
console_log($top);
?>
<div class="jumbotron jumbotron-fluid my-bg-black mt-3">
	<div class="container w-md-50">
		<blockquote class="blockquote mb-0 text-left">
			<h1 class="display-3 my-0">“</h1>
			<p class="text-habibi"><?= $top['text'] ?></p>
			<h1>━</h1>

			<div class="row">
				<div class="col">
					<p class="small text-muted text-habibi"><?= $top['author'] ?></p>
				</div>
				<div class="col-3 text-right">
					<span class="like-btn">
						<?php if ($user != null) : ?>
							<?php if (count_likes_by_user_and_quote($user['id'], $top['id']) == 1) : ?>
								<button type="button" class="btn btn-sm text-white unlike" data-id="<?= $top['id']; ?>" style="display: inline;">
									<svg class="bi" width="16" height="16" fill="currentColor">
										<use xlink:href="vendor/bootstrap-icons.svg#heart-fill" />
									</svg>
									<span class="likes_count">
										<?= count_likes_by_quote_id($top['id']) ?>
									</span>
								</button>
								<button type="button" class="btn btn-sm text-white like" data-id="<?= $top['id']; ?>" style="display: none;">
									<svg class="bi" width="16" height="16" fill="currentColor">
										<use xlink:href="vendor/bootstrap-icons.svg#heart" />
									</svg>
									<span class="likes_count">
										<?= count_likes_by_quote_id($top['id']) ?>
									</span>
								</button>
							<?php else : ?>
								<button type="button" class="btn btn-sm text-white like" data-id="<?= $top['id']; ?>" style="display: inline;">
									<svg class="bi" width="16" height="16" fill="currentColor">
										<use xlink:href="vendor/bootstrap-icons.svg#heart" />
									</svg>
									<span class="likes_count">
										<?= count_likes_by_quote_id($top['id']) ?>
									</span>
								</button>
								<button type="button" class="btn btn-sm text-white unlike" data-id="<?= $top['id']; ?>" style="display: none;">
									<svg class="bi" width="16" height="16" fill="currentColor">
										<use xlink:href="vendor/bootstrap-icons.svg#heart-fill" />
									</svg>
									<span class="likes_count">
										<?= count_likes_by_quote_id($top['id']) ?>
									</span>
								</button>
							<?php endif; ?>
						<?php else : ?>
							<a type="button" class="btn btn-sm text-white" style="display: inline;" href="signin.php">
								<svg class="bi" width="16" height="16" fill="currentColor">
									<use xlink:href="vendor/bootstrap-icons.svg#heart" />
								</svg>
								<span class="likes_count">
									<?= count_likes_by_quote_id($top['id']) ?>
								</span>
							</a>
						<?php endif; ?>
					</span>
					<span class="save-btn">
						<?php if ($user != null) : ?>
							<?php if (count_saves_by_user_and_quote($user['id'], $top['id']) == 1) : ?>
								<button type="button" class="btn btn-sm text-white unsave" data-id="<?= $top['id']; ?>" style="display: inline;">
									<svg class="bi" width="16" height="16" fill="currentColor">
										<use xlink:href="vendor/bootstrap-icons.svg#bookmark-fill" />
									</svg>
								</button>
								<button type="button" class="btn btn-sm text-white save" data-id="<?= $top['id']; ?>" style="display: none;">
									<svg class="bi" width="16" height="16" fill="currentColor">
										<use xlink:href="vendor/bootstrap-icons.svg#bookmark" />
									</svg>
								</button>
							<?php else : ?>
								<button type="button" class="btn btn-sm text-white save" data-id="<?= $top['id']; ?>" style="display: inline;">
									<svg class="bi" width="16" height="16" fill="currentColor">
										<use xlink:href="vendor/bootstrap-icons.svg#bookmark" />
									</svg>
								</button>
								<button type="button" class="btn btn-sm text-white unsave" data-id="<?= $top['id']; ?>" style="display: none;">
									<svg class="bi" width="16" height="16" fill="currentColor">
										<use xlink:href="vendor/bootstrap-icons.svg#bookmark-fill" />
									</svg>
								</button>
							<?php endif; ?>
						<?php else : ?>
							<a type="button" class="btn btn-sm  text-white" style="display: inline;" href="signin.php">
								<svg class="bi" width="16" height="16" fill="currentColor">
									<use xlink:href="vendor/bootstrap-icons.svg#bookmark" />
								</svg>
							</a>
						<?php endif; ?>
					</span>

					<!-- <button type="button" class="btn btn-sm text-muted">
						<svg class="bi" width="16" height="16" fill="currentColor">
							<use xlink:href="vendor/bootstrap-icons.svg#heart" />
						</svg>
					</button>
					<button type="button" class="btn btn-sm text-muted">
						<svg class="bi" width="16" height="16" fill="currentColor">
							<use xlink:href="vendor/bootstrap-icons.svg#bookmark" />
						</svg>
					</button> -->
				</div>
			</div>
		</blockquote>
	</div>
</div>