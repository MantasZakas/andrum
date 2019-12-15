<!-- Current project banner -->
<h1 class="page__title--homepage text-center">Šiuo metu vystomi projektai</h1>


<!-- Finished projects -->
<h2 class="page__title--homepage text-center">Įgyvendinti projektai</h2>

<div class="row">
	<?php
	$projects = get_posts ( [ 
			'numberposts' => 4,
			'category_name' => 'finished-projects'
	] );
	foreach ( $projects as $p ) {
	?>
	<div class="col-md-6 projectCard__wrapper">
		<img class="projectCard__image" src="<?= get_the_post_thumbnail_url($p) ?>">
		<div class="projectCard__text">
			<h3 class="projectCard__text--title"><?= get_the_title($p) ?></h3>
			<p class="projectCard__text--excerpt"><?= get_the_excerpt($p) ?></p>
		</div>
	</div>
	<?php } ?>
</div>
<!-- News -->
<h2 class="page__title--homepage text-center">Naujienos</h2>
<div class="container">
	<div class="row">
		<?php
		$news = get_posts ( [ 
				'numberposts' => 3,
				'category_name' => 'news'
		] );
		foreach ( $news as $n ) {
		?>
		<div class="col-md-4">
			<div class="newsCard__wrapper h-100">
				<img class="newsCard__image" src="<?= get_the_post_thumbnail_url($n) ?>">
				<h3 class="newsCard__title"><?= get_the_title($n) ?></h3>
				<p class="newsCard__excerpt"><?= get_the_excerpt($n) ?></p>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="d-flex justify-content-center">
		<a class="newsButton" href="<?= get_permalink(get_page_by_path('naujienos')) ?>">Visos naujienos</a>
	</div>
</div>
