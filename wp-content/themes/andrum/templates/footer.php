<?php 
//constants for system post IDs
define('ABOUT_US_ID', 61);
define('CONTACTS_ID', 63);
?>

<footer class="content-info">
  <div class="footer__container">
  	<div class="container">
  		<div class="row">
<!--   		ABOUT US -->
  			<div class="col-md-3">
  				<h3 class="footer__heading footer__heading--main">Apie mus</h3>
  				<div class="footer__text">
  					<?= get_post(ABOUT_US_ID)->post_content ?>
  				</div>
  			</div>
<!--   		CURRENT PROJECTS -->
  			<div class="col-md-3">
  				<h3 class="footer__heading footer__heading--main">Plėtojami projektai</h3>
  				<?php
					$currentProjects = get_posts ( [ 
							'numberposts' => 2,
							'category_name' => 'current-projects'
					] );
					foreach ( $currentProjects as $p ) {
				?>
				<div class="row footer__card">
					<div class="col-4">
						<img class="footer__image" src="<?= get_the_post_thumbnail_url($p) ?>">
					</div>				
					<div class="col-8 footer__text">
						<h3 class="footer__heading"><?= get_the_title($p) ?></h3>
						<p class="mb-0"><?= get_the_excerpt($p) ?></p>
					</div>
				</div>
				<?php } ?>
  			</div>
<!--   		NEWS -->
  			<div class="col-md-3">
  				<h3 class="footer__heading footer__heading--main">Naujienos</h3>
  				<?php
					$news = get_posts ( [ 
							'numberposts' => 2,
							'category_name' => 'news'
					] );
					foreach ( $news as $n ) {
				?>
				<div class="row footer__card">
					<div class="col-4">
						<img class="footer__image" src="<?= get_the_post_thumbnail_url($n) ?>">
					</div>				
					<div class="col-8 footer__text d-flex align-items-center">
						<p class="mb-0"><?= get_the_title($n) ?></p>
					</div>
				</div>
				<?php } ?>
  			</div>
<!--   		CONTACTS -->
  			<div class="col-md-3">
  				<h3 class="footer__heading footer__heading--main">Kontaktai</h3>
  				<?php $contacts = get_post(CONTACTS_ID) ?>
  				<div class="row">
  					<div class="col-3">
  						<img class="footer__image" src="<?= get_the_post_thumbnail_url($contacts) ?>">
  					</div>
  					<div class="col-9 footer__text">
  						<?= $contacts->post_content ?>
  					</div>
  				</div>
  			</div>
  		</div>
<!--   	BOTTOM LINKS -->
  		<div class="row">
  			<div class="col-md-3"></div>
  			<div class="col-md-3 d-flex justify-content-center">
  				<a class="footer__link">Visi projektai</a>
  			</div>
  			<div class="col-md-3 d-flex justify-content-center">
  				<a class="footer__link">Visos naujienos</a>
  			</div>
  			<div class="col-md-3"></div>
  		</div>
  		<div class="row d-flex justify-content-center footer__madeBy">
  			<a class="footer__link">Sprendimas:<img class="footer__madeBy--logo" alt="Western Investment" src="<?= get_template_directory_uri()?>/img/wi-logo.svg"></a>
  		</div>
  	</div>
  </div>
</footer>
