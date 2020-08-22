<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly.
}

get_header();

$is_elementor_theme_exist = function_exists('elementor_theme_do_location');

if (is_singular())
{
    if (!$is_elementor_theme_exist || !elementor_theme_do_location('single'))
    {
        get_template_part('template-parts/single');
    }
}
else if (is_archive() || is_home())
{
    if (is_category())
    {
        if (!$is_elementor_theme_exist || !elementor_theme_do_location('category'))
        {
            get_template_part('template-parts/category');
        }
    }
    else if (!$is_elementor_theme_exist || !elementor_theme_do_location('archive'))
    {
        get_template_part('template-parts/archive');
    }
}

else if (is_search())
{
    if (!$is_elementor_theme_exist || !elementor_theme_do_location('archive'))
    {
        get_template_part('template-parts/search');
    }
}
else
{
    if (!$is_elementor_theme_exist || !elementor_theme_do_location('single'))
    {
        get_template_part('template-parts/404');
    }
}

get_footer();
