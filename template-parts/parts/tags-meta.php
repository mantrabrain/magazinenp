<?php
if (is_single()) {
    echo get_the_tag_list(sprintf('<footer class="entry-meta"><span class="tag-links"><span class="label">%s:</span> ', esc_html__('Tags', 'magazinenp')), ', ', '</span><!-- .tag-links --></footer><!-- .entry-meta -->');
}