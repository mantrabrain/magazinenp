<div class="mnp-popular-tags-wrap">
    <div class="container">
        <div class="mnp-popular-tags-box clearfix">
            <?php
            $popular_tags_title = magazinenp_get_option('popular_tags_heading');
            magazinenp_list_popular_taxonomies('post_tag', $popular_tags_title); ?>
        </div>
    </div>
</div>