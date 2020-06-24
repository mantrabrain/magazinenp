<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MagazineNP
 */

$left_sidebar = magazinenp_page_sidebar('magazinenp_left_sidebar');

if (!is_active_sidebar($left_sidebar)) {
    return;
}
$enable_sidebar_sticky = (boolean)magazinenp_get_option('enable_sidebar_sticky');

$sidebar_inner_class = $enable_sidebar_sticky ? 'sticky-sidebar' : 'no-sticky-sidebar';

?>

<aside id="secondary" class="col-lg-4 widget-area order-lg-1" role="complementary">
    <div class="<?php echo esc_attr($sidebar_inner_class); ?>>">
        <?php dynamic_sidebar($left_sidebar); ?>
    </div>
</aside>
