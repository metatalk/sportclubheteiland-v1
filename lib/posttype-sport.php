<?php

function sport_init() {
    register_post_type( 'sport', array(
        'labels'            => array(
            'name'                => __( 'Sports', 'YOUR-TEXTDOMAIN' ),
            'singular_name'       => __( 'Sport', 'YOUR-TEXTDOMAIN' ),
            'all_items'           => __( 'All Sports', 'YOUR-TEXTDOMAIN' ),
            'new_item'            => __( 'New sport', 'YOUR-TEXTDOMAIN' ),
            'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
            'add_new_item'        => __( 'Add New sport', 'YOUR-TEXTDOMAIN' ),
            'edit_item'           => __( 'Edit sport', 'YOUR-TEXTDOMAIN' ),
            'view_item'           => __( 'View sport', 'YOUR-TEXTDOMAIN' ),
            'search_items'        => __( 'Search sports', 'YOUR-TEXTDOMAIN' ),
            'not_found'           => __( 'No sports found', 'YOUR-TEXTDOMAIN' ),
            'not_found_in_trash'  => __( 'No sports found in trash', 'YOUR-TEXTDOMAIN' ),
            'parent_item_colon'   => __( 'Parent sport', 'YOUR-TEXTDOMAIN' ),
            'menu_name'           => __( 'Sports', 'YOUR-TEXTDOMAIN' ),
        ),
        'public'            => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => array( 'title', 'editor' ),
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-admin-post',
        'show_in_rest'      => true,
        'rest_base'         => 'sport',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ) );

}
add_action( 'init', 'sport_init' );

function sport_updated_messages( $messages ) {
    global $post;

    $permalink = get_permalink( $post );

    $messages['sport'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => sprintf( __('Sport updated. <a target="_blank" href="%s">View sport</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
        2 => __('Custom field updated.', 'YOUR-TEXTDOMAIN'),
        3 => __('Custom field deleted.', 'YOUR-TEXTDOMAIN'),
        4 => __('Sport updated.', 'YOUR-TEXTDOMAIN'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf( __('Sport restored to revision from %s', 'YOUR-TEXTDOMAIN'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Sport published. <a href="%s">View sport</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
        7 => __('Sport saved.', 'YOUR-TEXTDOMAIN'),
        8 => sprintf( __('Sport submitted. <a target="_blank" href="%s">Preview sport</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
        9 => sprintf( __('Sport scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview sport</a>', 'YOUR-TEXTDOMAIN'),
            // translators: Publish box date format, see http://php.net/date
            date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
        10 => sprintf( __('Sport draft updated. <a target="_blank" href="%s">Preview sport</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
    );

    return $messages;
}
add_filter( 'post_updated_messages', 'sport_updated_messages' );