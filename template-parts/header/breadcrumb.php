<?php if (!is_front_page() && !is_home() && function_exists('magazinenp_breadcrumbs') && (boolean)magazinenp_get_option('show_breadcrumb')) { ?>
    <div id="breadcrumb">
        <div class="container">
            <?php magazinenp_breadcrumbs(); ?>
        </div>
    </div>
<?php } ?>