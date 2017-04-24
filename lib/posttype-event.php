<?php

function event_init() {
    register_post_type( 'event', array(
        'labels'            => array(
            'name'                => __( 'Events', 'YOUR-TEXTDOMAIN' ),
            'singular_name'       => __( 'Event', 'YOUR-TEXTDOMAIN' ),
            'all_items'           => __( 'All Events', 'YOUR-TEXTDOMAIN' ),
            'new_item'            => __( 'New event', 'YOUR-TEXTDOMAIN' ),
            'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
            'add_new_item'        => __( 'Add New event', 'YOUR-TEXTDOMAIN' ),
            'edit_item'           => __( 'Edit event', 'YOUR-TEXTDOMAIN' ),
            'view_item'           => __( 'View event', 'YOUR-TEXTDOMAIN' ),
            'search_items'        => __( 'Search events', 'YOUR-TEXTDOMAIN' ),
            'not_found'           => __( 'No events found', 'YOUR-TEXTDOMAIN' ),
            'not_found_in_trash'  => __( 'No events found in trash', 'YOUR-TEXTDOMAIN' ),
            'parent_item_colon'   => __( 'Parent event', 'YOUR-TEXTDOMAIN' ),
            'menu_name'           => __( 'Events', 'YOUR-TEXTDOMAIN' ),
        ),
        'public'            => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'       => 'events',
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-admin-post',
        'show_in_rest'      => true,
        'rest_base'         => 'event',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ) );

}
add_action( 'init', 'event_init' );

function event_updated_messages( $messages ) {
    global $post;

    $permalink = get_permalink( $post );

    $messages['event'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => sprintf( __('Event updated. <a target="_blank" href="%s">View event</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
        2 => __('Custom field updated.', 'YOUR-TEXTDOMAIN'),
        3 => __('Custom field deleted.', 'YOUR-TEXTDOMAIN'),
        4 => __('Event updated.', 'YOUR-TEXTDOMAIN'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf( __('Event restored to revision from %s', 'YOUR-TEXTDOMAIN'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Event published. <a href="%s">View event</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
        7 => __('Event saved.', 'YOUR-TEXTDOMAIN'),
        8 => sprintf( __('Event submitted. <a target="_blank" href="%s">Preview event</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
        9 => sprintf( __('Event scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview event</a>', 'YOUR-TEXTDOMAIN'),
            // translators: Publish box date format, see http://php.net/date
            date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
        10 => sprintf( __('Event draft updated. <a target="_blank" href="%s">Preview event</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
    );

    return $messages;
}
add_filter( 'post_updated_messages', 'event_updated_messages' );
