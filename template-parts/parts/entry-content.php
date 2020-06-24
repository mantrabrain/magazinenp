<div class="entry-content magazinenp-parts-item">
	<?php if (is_singular()) {
		the_content();
		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages: ', 'magazinenp'),
			'separator' => '',
			'link_before' => '<span>',
			'link_after' => '</span>',
			'after' => '</div>'
		));
	} else {
		?>
		<p><?php echo magazinenp_get_excerpt(); ?></p>
		<?php
	} ?>
</div>
