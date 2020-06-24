<?php if (!is_single()) {
    ?>
    <figure class="post-featured-image mnp-post-image-wrap magazinenp-parts-item">
        <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" class="mnp-post-image"
           style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');"></a>
        <?php
        $show_category_on_blog_archive_page = (boolean)magazinenp_get_option('show_category_on_blog_archive_page');
        if ($show_category_on_blog_archive_page) {
            MagazineNP_Template_Helper::get_category_meta();
        }

        ?>
    </figure><!-- .post-featured-image .mnp-post-image-wrap -->
    <?php
} else if (is_single() && has_post_thumbnail()) {
    ?>
    <figure class="post-featured-image page-single-img-wrap magazinenp-parts-item">
        <div class="mnp-post-image"
             style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');"></div>
    </figure><!-- .post-featured-image .page-single-img-wrap -->
    <?php
}