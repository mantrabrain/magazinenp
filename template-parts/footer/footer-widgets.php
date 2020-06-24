<?php
$footer_widget_area_column_class = apply_filters('magazinenp_footer_widget_area_column_class', 'col-sm-6 col-lg-3');
if (
	is_active_sidebar('magazinenp_footer_sidebar_1')
	|| is_active_sidebar('magazinenp_footer_sidebar_2')
	|| is_active_sidebar('magazinenp_footer_sidebar_3')
	|| is_active_sidebar('magazinenp_footer_sidebar_4')) { ?>
	<div class="widget-area">
		<div class="container">
			<div class="row">
				<?php if (apply_filters('magazinenp_footer_sidebar_1_enable', true)) { ?>
					<div class="<?php echo esc_attr($footer_widget_area_column_class); ?>">
						<?php
						if (is_active_sidebar('magazinenp_footer_sidebar_1')) :
							dynamic_sidebar('magazinenp_footer_sidebar_1');
						endif;
						?>
					</div>
				<?php }
				if (apply_filters('magazinenp_footer_sidebar_2_enable', true)) {
					?>
					<div class="<?php echo esc_attr($footer_widget_area_column_class); ?>">
						<?php

						if (is_active_sidebar('magazinenp_footer_sidebar_2')) :
							dynamic_sidebar('magazinenp_footer_sidebar_2');
						endif;
						?>
					</div>
				<?php }
				if (apply_filters('magazinenp_footer_sidebar_3_enable', true)) {
					?>
					<div class="<?php echo esc_attr($footer_widget_area_column_class); ?>">
						<?php

						if (is_active_sidebar('magazinenp_footer_sidebar_3')) :
							dynamic_sidebar('magazinenp_footer_sidebar_3');
						endif;
						?>
					</div>
				<?php }
				if (apply_filters('magazinenp_footer_sidebar_4_enable', true)) { ?>
					<div class="<?php echo esc_attr($footer_widget_area_column_class); ?>">
						<?php

						if (is_active_sidebar('magazinenp_footer_sidebar_4')) :
							dynamic_sidebar('magazinenp_footer_sidebar_4');
						endif;
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
