<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

$is_pro = false;
if (file_exists(dirname(__FILE__) . '/pro/classes/class-wpfront-notification-bar-entity-pro.php')) {
    include_once dirname(__FILE__) . '/pro/classes/class-wpfront-notification-bar-entity-pro.php';
    $is_pro = true;
}

if (file_exists(dirname(__FILE__) . '/pro/classes/class-wpfront-notification-bar-settings-entity.php')) {
    include_once dirname(__FILE__) . '/pro/classes/class-wpfront-notification-bar-settings-entity.php';
    $is_pro = true;
}

if (is_multisite()) {
    global $wpdb;
    $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
    $current_blog_id = get_current_blog_id();

    foreach ($blog_ids as $blog_id) {
        switch_to_blog($blog_id);

        wpfront_notification_bar_uninstall($is_pro);
    }

    switch_to_blog($current_blog_id);
} else {
    wpfront_notification_bar_uninstall($is_pro);
}

function wpfront_notification_bar_uninstall($is_pro) {
    $option_name = 'wpfront-notification-bar-options';
    delete_option($option_name);
    
    if($is_pro) {
        if (class_exists('\WPFront\Notification_Bar\Pro\WPFront_Notification_Bar_Entity_Pro')) {
            \WPFront\Notification_Bar\Pro\WPFront_Notification_Bar_Entity_Pro::uninstall();
        }
        if (class_exists('\WPFront\Notification_Bar\Pro\WPFront_Notification_Bar_Settings_Entity')) {
            \WPFront\Notification_Bar\Pro\WPFront_Notification_Bar_Settings_Entity::uninstall();
        }
    }
}

wp_cache_flush();
