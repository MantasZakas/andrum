<div class="container d-flex justify-content-end header__top">
	<p>+370 527 27092</p>
	<div class="header__dash my-auto"></div>
	<p>pardavimai@andrum.lt</p>
</div>
<header class="banner sticky-top">
	<div class="">
		<nav class="navbar navbar-expand-md p-0 header__nav">
			<div class="container">
				<a class="navbar-brand p-0" href="<?php echo get_home_url() ?>">
					<img class="header__logo" alt="Site Logo" src="<?php echo get_template_directory_uri()?>/img/logo-full.svg">
				</a>
				<button class="navbar-toggler header__button" type="button" data-toggle="collapse" data-target="#mainNav">
    				<i class="fas fa-bars"></i>
  				</button>
				<?php wp_nav_menu([
					'menu' => 'top_menu',
					'container' => 'div',
					'container_class' => 'collapse navbar-collapse d-md-flex justify-content-end',
					'container_id' => 'mainNav',
					'menu_class' => 'navbar-nav',
					'walker'  => new Child_Wrap()
				])?>
			</div>
		</nav>
	</div>
</header>