<?php
function header_hub_custom_header()
{
    global $post;

    if (is_singular() && in_the_loop() && is_main_query()) {
        $custom_header = get_post_meta($post->ID, '_custom_header', true);
        if ($custom_header) {
            get_header($custom_header);
            return false;
        }
    }
    return true;
}
add_filter('get_header', 'header_hub_custom_header');

function add_custom_meta_box()
{
    add_meta_box(
        'custom_header_meta_box',
        'Select Custom Header',
        'custom_header_meta_box_callback',
        'page',
        'side'
    );
}
add_action('add_meta_boxes', 'add_custom_meta_box');

function custom_header_meta_box_callback($post)
{
    wp_nonce_field('save_custom_header_meta_box_data', 'custom_header_meta_box_nonce');

    $value = get_post_meta($post->ID, '_custom_header', true);
    $header_files = glob(get_template_directory() . '/header-*.php');
    $headers = array_map(function ($file) {
        return str_replace('header-', '', pathinfo($file, PATHINFO_FILENAME));
    }, $header_files);

    echo '<select id="custom_header" name="custom_header">';
    echo '<option value="default">Header Configured in Template Page</option>';
    echo '<option value="header" ' . selected($value, 'header', false) . '>Main Theme Header</option>';
    foreach ($headers as $header) {
        echo '<option value="' . esc_attr($header) . '"' . selected($value, $header, false) . '>' . esc_html($header) . '</option>';
    }
    echo '</select>';
}



function save_custom_header_meta_box_data($post_id)
{
    if (!isset($_POST['custom_header_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['custom_header_meta_box_nonce'], 'save_custom_header_meta_box_data')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_page', $post_id)) {
        return;
    }
    if (isset($_POST['custom_header'])) {
        update_post_meta($post_id, '_custom_header', sanitize_text_field($_POST['custom_header']));
    }
}
add_action('save_post', 'save_custom_header_meta_box_data');
