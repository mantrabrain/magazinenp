<div class="site-info bottom-footer">
	<div class="container">
		<div class="row">
			<?php

			if ((boolean)magazinenp_get_option('show_social_profile_on_footer')) {

				$social_style = magazinenp_get_option('social_profile_style');

				$social_class = 'mnp-social-profiles';
				$social_class .= $social_style == 'official' ? ' official' : '';
				?>
				<div class="col-lg-auto order-lg-2 ml-auto">
					<div class="<?php echo esc_attr($social_class); ?>">
						<?php magazinenp_social_profiles(); ?>
					</div>
				</div>
			<?php } ?>
			<div class="copyright col-lg order-lg-1 text-lg-left">
				<?php
				magazinenp_footer_text();
				?>
			</div>
		</div>
	</div>
</div>
