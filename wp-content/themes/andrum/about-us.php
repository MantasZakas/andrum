<?php
/*
 * Template Name: About us
 */
?>
<div class="container">
	<h1 class="page__title--main text-center">Apie mus</h1>
	<h2 class="page__title--name text-center">Valdyba</h2>
	<div class="row d-flex justify-content-center">
		<?php 
		$totalEmployees = get_post_meta(get_the_ID(), "employeeCount", true); 
		for ($i=1; $i <= $totalEmployees; $i++) {
		?>
		<div class="col-md-4 page__card">
			<img class="page__image" src="<?= wp_get_attachment_image_url(get_post_meta(get_the_ID(), "employee-$i-image", true), '') ?>">
			<div class="page__description">
				<div class="page__description--top">
					<p class="page__description--text1 text-center">
						<?= get_post_meta(get_the_ID(), "employee-$i-description", true) ?>
					</p>
					<p class="page__description--text2 text-center">
						<?= get_post_meta(get_the_ID(), "employee-$i-qoute", true) ?>
					</p>
					</div>
				<div class="page__description--bottom">
					<h2 class="page__title--name text-center"><?= get_post_meta(get_the_ID(), "employee-$i-name", true) ?></h2>
					<h3 class="page__title--position text-center"><?= get_post_meta(get_the_ID(), "employee-$i-position", true) ?></h3>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
