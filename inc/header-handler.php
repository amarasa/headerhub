<?php
function header_hub_get_custom_header($default_header = '')
{
    global $post;

    $custom_header = get_post_meta($post->ID, '_custom_header', true);
    if ($custom_header && $custom_header !== 'default') {
        if ($custom_header === 'header') {
            get_header();
        } else {
            get_header($custom_header);
        }
        return;
    }

    get_header($default_header);
}

function footer_hub_get_custom_footer($default_footer = '')
{
    global $post;

    $custom_footer = get_post_meta($post->ID, '_custom_footer', true);
    if ($custom_footer && $custom_footer !== 'default') {
        if ($custom_footer === 'footer') {
            get_footer();
        } else {
            get_footer($custom_footer);
        }
        return;
    }

    get_footer($default_footer);
}
