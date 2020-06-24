<?php if ('post' === get_post_type()) {
    if (!has_post_format('link')) {
        ?>
        <div class="entry-meta magazinenp-parts-item">
            <?php magazinenp_posted_on(); ?>
            <?php if (comments_open()) { ?>
                <div class="comments">
                    <?php comments_popup_link(__('No Comments', 'magazinenp'), __('1 Comment', 'magazinenp'), __('% Comments', 'magazinenp'), '', __('Comments Off', 'magazinenp')); ?>
                </div>
            <?php } ?>
        </div>
    <?php }
} ?>