<?php

class MagazineNP_Template_Helper
{
    static function get_entry_meta()
    {

        get_template_part('template-parts/parts/entry-meta');

    }

    static function get_entry_header()
    {

        get_template_part('template-parts/parts/entry-header');

    }

    static function get_entry_content()
    {
        get_template_part('template-parts/parts/entry-content');

    }

    static function get_post_image()
    {

        get_template_part('template-parts/parts/post-image');

    }
    static function get_category_meta()
    {

        get_template_part('template-parts/parts/cat-meta');

    }
    static function get_tags_meta()
    {

        get_template_part('template-parts/parts/tags-meta');

    }
}
