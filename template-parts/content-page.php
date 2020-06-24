<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MagazineNP
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    $show_page_feature_image = (boolean)magazinenp_get_option('show_page_feature_image');
    if (has_post_thumbnail() && $show_page_feature_image) { ?>

        <figure class="post-featured-image page-single-img-wrap">
            <div class="mnp-post-image"
                 style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');"></div>
        </figure>

    <?php } ?>

    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->
    <?php

    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages: ', 'magazinenp'),
        'separator' => '',
        'link_before' => '<span>',
        'link_after' => '</span>',
        'after' => '</div>'
    ));
    ?>
    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'magazinenp'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="btn btn-sm btn-outline-theme edit-link"><i class="fa fa-pencil"></i> ',
                '</span>'
            );
            ?>
        </footer>
    <?php endif; ?>
</div>
