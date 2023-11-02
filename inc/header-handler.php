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
