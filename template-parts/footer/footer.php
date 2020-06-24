<?php
$footer_background = '';
$footer_background_image = magazinenp_get_option('footer_background_image');
if ('' != $footer_background_image) {
	$footer_background = 'style="background-image:url(\'' . esc_url($footer_background_image) . '\');"';
}
$footer_class = $footer_background_image != '' ? 'site-footer has-background' : 'site-footer';
?>
<footer id="colophon" class="<?php echo esc_attr($footer_class); ?>"
		role="contentinfo" <?php echo $footer_background; ?>>
	<?php

	get_template_part('template-parts/footer/footer-widgets');
	get_template_part('template-parts/footer/copyright');
	?>
</footer>
<?php

get_template_part('template-parts/footer/go-to-top');
?>
