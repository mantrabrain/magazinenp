<?php

class MagazineNP_Loops
{
	public static function init()
	{
		if (is_404()) {

			self::page404();
			return;
		}

		if (have_posts()) {


			self::header();


			if (!is_single()) {
				?>
				<div class="row gutter-parent-14 post-wrap">
				<?php
			}/* Start the Loop */


			if (is_single() && !is_page()) {

				$tmpl = 'content-single';

			} else if (is_page()) {

				$tmpl = 'content-page';

			} else {
				$tmpl = 'content-archive';

			}

			while (have_posts()) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */

				get_template_part('template-parts/' . $tmpl);

			endwhile;
			if (!is_single()) {
				?>
				</div><!-- .row .gutter-parent-14 .post-wrap-->

				<?php
			}
			self::post_navigation();

			if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) :
				comments_template();
			endif;


		} else {


			get_template_part('template-parts/content', 'none');

		}


	}

	private static function post_navigation()
	{
		if (!is_single()) {
			the_posts_pagination(array(
				'prev_text' => __('Previous', 'magazinenp'),
				'next_text' => __('Next', 'magazinenp'),
			));
		} else if (is_single() && !is_page()) {
			the_post_navigation();
		}
	}

	private static function header()
	{
		if (is_archive()) {
			?>
			<header class="page-header">
				<?php the_archive_title('<h1 class="page-title">', '</h1>');
				the_archive_description('<div class="archive-description">', '</div>'); ?>
			</header><!-- .page-header -->
			<?php
		} else if (is_home()) {


			if (is_home() && !is_front_page()) {

				if ((magazinenp_get_option('banner_display') === 'home-blog')) {
					magazinenp_title_html('h2', 'magazinenp-title', get_the_title(get_option('page_for_posts')));
					?>

				<?php } else { ?>

					<header class="page-header">
						<h2 class="page-title"><?php echo get_the_title(get_option('page_for_posts')); ?> </h2>
					</header><!-- .page-header -->

				<?php }

			}
		} else if (is_search()) {
			?>
			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf(esc_html__('Search Results for: %s', 'magazinenp'), '<span>' . get_search_query() . '</span>');
					?>
				</h1>
			</header><!-- .page-header -->
			<?php
		}

	}

	private static function page404()
	{
		?>
		<div class="type-page">
			<div class="error-404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'magazinenp'); ?></h1>
				</header><!-- .entry-header -->

				<div class="page-content">
					<p><?php esc_html_e('It looks like nothing was found at this location. May be please check the URL for typing errors or start a new search to find the page you are looking for.', 'magazinenp'); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</div><!-- .type-page -->
		<?php

	}


}
