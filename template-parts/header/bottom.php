<?php
$bottom_header_sticky_status = (boolean)magazinenp_get_option('bottom_header_sticky_status');
$class = 'mnp-bottom-header navbar navbar-expand-lg d-block';

if ($bottom_header_sticky_status) {
	$class .= " mnp-sticky";
}
?>
<nav class="<?php echo esc_attr($class); ?>">
	<div class="navigation-bar">
		<div class="navigation-bar-top">
			<div class="container">
				<?php
				$show_home_icon = (boolean)magazinenp_get_option('bottom_header_show_home_icon');
				if ($show_home_icon) {
					?>
					<div class="mnp-home-icon"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><i
								class="fa fa-home"></i></a></div>

				<?php } ?>

				<button class="navbar-toggler menu-toggle collapsed" type="button" data-toggle="collapse"
						data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
						aria-label="<?php esc_attr_e('Toggle navigation', 'magazinenp'); ?>"></button>
				<?php
				$show_search_icon = (boolean)magazinenp_get_option('bottom_header_show_search_icon');
				if ($show_search_icon) {
					?>
					<button class="search-toggle"></button>
				<?php } ?>
			</div>

			<div class="search-bar">
				<div class="container">
					<div class="search-block off">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar-main">
			<div class="container">
				<?php
				if ($show_home_icon) {
					?>
					<div class="mnp-home-icon"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><i
								class="fa fa-home"></i></a></div>

				<?php } ?>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<div id="site-navigation"
						 class="main-navigation nav-uppercase"
						 role="navigation">
						<?php
						if (has_nav_menu('primary')) {
							wp_nav_menu(array(
								'theme_location' => 'primary',
								'container' => '',
								'items_wrap' => '<ul class="nav-menu navbar-nav d-lg-block">%3$s</ul>',
							));
						} else {
							wp_page_menu(array(
								'before' => '<ul class="nav-menu navbar-nav d-lg-block">',
								'after' => '</ul>',
							));
						}
						?>
					</div>
				</div>
				<?php

				if ($show_search_icon) {
					?>
					<div class="nav-search">
						<button class="search-toggle"></button>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

</nav>
