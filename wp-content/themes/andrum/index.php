<h1 class="page__title--homepage text-center">Šiuo metu vystomi projektai</h1>



<h2 class="page__title--homepage text-center">Įgyvendinti projektai</h2>



<h2 class="page__title--homepage text-center">Naujienos</h2>
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







