<header class="banner">
	<div class="container d-flex justify-content-end header__top">
		<p>+370 527 27092</p>
		<div class="header__dash my-auto"></div>
		<p>pardavimai@andrum.lt</p>
	</div>
	<div class="header__nav d-flex align-items-center">
		<div class="container h-100">
			<nav class="navbar navbar-expand-sm p-0 justify-content-between h-100">
				<a class="navbar-brand" href="#"><img class="header__logo" alt="Site Logo" src="<?php echo get_template_directory_uri()?>/img/logo-full.svg"></a>
				<?php wp_nav_menu([
					'menu' => 'top_menu',
					'container' => '',
					'items_wrap' => '<ul id="%1$s" class="navbar-nav h-100 p-0">%3$s</ul>',
					'menu_class' => 'nav-item d-flex'
				])?>
<!-- 				<ul class="navbar-nav h-100 p-0"> -->
<!-- 					<li class="nav-item d-flex"><a -->
<!-- 						class="nav-link align-self-stretch py-0 header__link" href="#">Link -->
<!-- 							1</a></li> -->
<!-- 					<li class="nav-item d-flex"><a class="nav-link align-self-stretch py-0 header__link" href="#">Link 2</a></li> -->
<!-- 					<li class="nav-item d-flex"><a class="nav-link align-self-stretch py-0 header__link" href="#">Link 3</a></li> -->
<!-- 				</ul> -->
			</nav>
		</div>
	</div>
</header>

