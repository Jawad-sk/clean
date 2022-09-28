<?php

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "cleaning_services_opt";

$theme = wp_get_theme(); // For use with some settings. Not necessary.
$opt_prefix = 'cleaning_services';

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Cleaning Service Options', 'cleaning-services'),
    'page_title' => esc_html__('Cleaning Services Options', 'cleaning-services'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'disable_google_fonts_link' => true,
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.
    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => '',
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover',
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave',
            ),
        ),
    )
);


Redux::setArgs($opt_name, $args);

Redux::setSection($opt_name, array(
    'title' => esc_html__('Header Settings', 'cleaning-services'),
    'id' => 'header_settings',
    'desc' => esc_html__('All header settings', 'cleaning-services'),
    'customizer_width' => '400px',
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'id' => $opt_prefix . '-is_sticky_header',
            'type' => 'switch',
            'title' => esc_html__('Display Header Sticky', 'cleaning-services'),
            'subtitle' => esc_html__('Enable or Disable Header Sticky', 'cleaning-services'),
            'default' => true,
            'on' => esc_html__('Enable', 'cleaning-services'),
            'off' => esc_html__('Disable', 'cleaning-services'),
        ),
        array(
            'id' => $opt_prefix . '-logo',
            'type' => 'media',
            'url' => true,
            'compiler' => 'true',
            'desc' => esc_html__('Basic media uploader with disabled URL input field.', 'cleaning-services'),
            'subtitle' => esc_html__('Add/Upload logo using the WordPress native uploader', 'cleaning-services'),
            'title' => esc_html__('Site Logo', 'cleaning-services'),
            'default' => array(
                'url' => CLEANING_SERVICES_IMG_URL . 'logo.png',
            ),
        ),
        array(
            'id' => $opt_prefix . '-site-favicon',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Favicon URL', 'cleaning-services'),
            'compiler' => 'true',
            'desc' => esc_html__('Set favicon for your theme', 'cleaning-services'),
            'subtitle' => esc_html__('Upload favicon for the theme', 'cleaning-services'),
            'default' => array('url' => CLEANING_SERVICES_IMG_URL . 'favicon.ico'),
        ),
        array(
            'id' => 'Header',
            'type' => 'section',
            'title' => esc_html__('Header Content', 'cleaning-services'),
            'subtitle' => esc_html__('With the "section" field you can create indented option sections.', 'cleaning-services'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
        ),
        array(
            'id' => $opt_prefix . '-page-header-mobile',
            'type' => 'switch',
            'title' => esc_html__('Display Header Top Mobile', 'cleaning-services'),
            'subtitle' => esc_html__('Enable or disable header mobile content', 'cleaning-services'),
            'default' => false,
            'on' => esc_html__('Enable', 'cleaning-services'),
            'off' => esc_html__('Disable', 'cleaning-services'),
        ),
        array(
            'id' => $opt_prefix . '-page-header-mobile-location',
            'type' => 'editor',
            'title' => 'Page Header location',
            'default' => '3261 Anmoore Road Brooklyn, NY 11230'
        ),
        array(
            'id' => $opt_prefix . '-page-header-mobile-phone',
            'type' => 'editor',
            'title' => 'Page Header Phone',
            'default' => '800-123-4567, Fax: 718-724-3312'
        ),
        array(
            'id' => $opt_prefix . '-page-header-mobile-hour',
            'type' => 'editor',
            'title' => 'Page Header Hour',
            'default' => 'Mon-Fri: 9:00 am – 5:00'
        ),
        array(
            'id' => $opt_prefix . '-page-header-mobile-email',
            'type' => 'editor',
            'title' => 'Page Header Email',
            'default' => 'officeone@youremail.com'
        ),
        array(
            'id' => $opt_prefix . '-header-google-plus',
            'type' => 'text',
            'title' => esc_html__('Google Plus URL', 'cleaning-services'),
            'default' => '#'
        ),
        array(
            'id' => $opt_prefix . '-header-facebook',
            'type' => 'text',
            'title' => esc_html__('Facebook URL', 'cleaning-services'),
            'default' => '#'
        ),
        array(
            'id' => $opt_prefix . '-header-twitter',
            'type' => 'text',
            'title' => esc_html__('Twitter URL', 'cleaning-services'),
            'default' => '#'
        ),
        array(
            'id' => $opt_prefix . '-header-instagram',
            'type' => 'text',
            'title' => esc_html__('Instagram URL', 'cleaning-services'),
            'default' => '#'
        ),
        array(
            'id' => $opt_prefix . '-page-header-top-middle',
            'type' => 'switch',
            'title' => esc_html__('Display Header Top Middle', 'cleaning-services'),
            'subtitle' => esc_html__('Enable or disable header Right text', 'cleaning-services'),
            'default' => false,
            'on' => esc_html__('Enable', 'cleaning-services'),
            'off' => esc_html__('Disable', 'cleaning-services'),
        ),
        array(
            'id' => $opt_prefix . '-page-header-slogan',
            'type' => 'editor',
            'title' => 'Page Header slogan',
            'default' => 'We are Cleaning Experts!'
        ),
        array(
            'id' => $opt_prefix . '-page-header-shedule-header',
            'type' => 'editor',
            'title' => 'Page Header Shedule',
            'default' => '8:00am - 10:00pm<br>Mon - Sun'
        ),
        array(
            'id' => $opt_prefix . '-phone-caption-header',
            'type' => 'editor',
            'title' => 'Phone Caption',
            'default' => 'Call us on:'
        ),
        array(
            'id' => $opt_prefix . '-phone-number-header',
            'type' => 'editor',
            'title' => 'Phone Number',
            'default' => '800-123-4567'
        ),
        array(
            'id' => $opt_prefix . '-get-a-quote',
            'type' => 'editor',
            'title' => 'Get a Quote',
            'default' => 'GET A QUEATE'
        ),
        array(
            'id' => $opt_prefix . '-quote-url',
            'type' => 'text',
            'title' => __('Text Quote - URL Validated', 'cleaning-services'),
            'subtitle' => __('This must be a URL.', 'cleaning-services'),
            'desc' => __('This is the description field, again good for additional info.', 'cleaning-services'),
            'validate' => 'url',
            'default' => 'http://localhost/wp-themes/cleaning-services/order-form.html',
        ),
        array(
            'id' => 'section-info',
            'type' => 'info',
            'desc' => esc_html__('And now you can add more fields below and outside of the indent.', 'cleaning-services'),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Settings', 'cleaning-services'),
    'id' => 'blog_header_settings',
    'desc' => esc_html__('All Blog settings', 'cleaning-services'),
    'customizer_width' => '400px',
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'id' => $opt_prefix . '-show-breadcrumb',
            'type' => 'switch',
            'title' => esc_html__('Show Breadcrumb in Blog Page', 'cleaning-services'),
            'subtitle' => esc_html__('Enable or Disable Breadcrumb in Blog Page', 'cleaning-services'),
            'default' => true,
            'on' => esc_html__('Enable', 'cleaning-services'),
            'off' => esc_html__('Disable', 'cleaning-services'),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'cleaning-services'),
    'id' => 'fonts_settings',
    'desc' => esc_html__('Typography', 'cleaning-services'),
    'customizer_width' => '400px',
    'icon' => 'el el-font',
    'fields' => array(
        array(
            'id' => $opt_prefix . '-body_typography',
            'type' => 'typography',
            'title' => esc_html__('Body Typography', 'cleaning-services'),
            'subtitle' => esc_html__('Select body font family, size, line height, color and weight.', 'cleaning-services'),
            'text-align' => false,
            'subsets' => false,
            'default' => array(
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '16px',
                'line-height' => '28px',
            ),
        ),
        array(
            'id' => $opt_prefix . '-heading-1-2-lg-typography',
            'type' => 'typography',
            'title' => esc_html__('H1, H2 lg Font', 'cleaning-services'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'cleaning-services'),
            'google' => true,
            'text-align' => false,
            'default' => array(
                'font-size' => '50px',
                'font-family' => 'Open Sans',
                'font-weight' => '600',
                'line-height' => '60px',
            ),
        ),
        array(
            'id' => $opt_prefix . '-heading-2-1-sm-typography',
            'type' => 'typography',
            'title' => esc_html__('H2, H1 sm Font', 'cleaning-services'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'cleaning-services'),
            'google' => true,
            'text-align' => false,
            'default' => array(
                'font-size' => '36px',
                'font-family' => 'Open Sans',
                'font-weight' => '600',
                'line-height' => '40px',
            ),
        ),
        array(
            'id' => $opt_prefix . '-heading-3-typography',
            'type' => 'typography',
            'title' => esc_html__('H3 Font', 'cleaning-services'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'cleaning-services'),
            'google' => true,
            'text-align' => false,
            'default' => array(
                'font-size' => '24px',
                'font-family' => 'Open Sans',
                'font-weight' => '600',
                'line-height' => '1.2em',
            ),
        ),
        array(
            'id' => $opt_prefix . '-heading-4-typography',
            'type' => 'typography',
            'title' => esc_html__('H4 Font', 'cleaning-services'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'cleaning-services'),
            'google' => true,
            'text-align' => false,
            'default' => array(
                'font-size' => '22px',
                'font-family' => 'Open Sans',
                'font-weight' => '600',
                'line-height' => '28px',
            ),
        ),
        array(
            'id' => $opt_prefix . '-heading-5-typography',
            'type' => 'typography',
            'title' => esc_html__('H5 Font', 'cleaning-services'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'cleaning-services'),
            'google' => true,
            'text-align' => false,
            'default' => array(
                'font-size' => '20px',
                'font-family' => 'Open Sans',
                'font-weight' => '600',
                'line-height' => '28px',
            ),
        ),
        array(
            'id' => $opt_prefix . '-heading-6-typography',
            'type' => 'typography',
            'title' => esc_html__('H6 Font', 'cleaning-services'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'cleaning-services'),
            'google' => true,
            'text-align' => false,
            'default' => array(
                'font-size' => '16px',
                'font-family' => 'Open Sans',
                'font-weight' => '600',
                'line-height' => '28px',
            ),
        ),
        array(
            'id' => $opt_prefix . '-widget_title_typography',
            'type' => 'typography',
            'title' => esc_html__('Widget Title', 'cleaning-services'),
            'subtitle' => esc_html__('Widget title typography settings', 'cleaning-services'),
            'text-align' => false,
            'line-height' => false,
            'subsets' => false,
            'default' => array(
                'color' => '#000',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '24px',
            ),
        ),
)));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Settings', 'cleaning-services'),
    'id' => 'footer_settings',
    'desc' => esc_html__('These are really basic fields!', 'cleaning-services'),
    'customizer_width' => '400px',
    'icon' => 'el el-share',
    'fields' => array(
        array(
            'id' => $opt_prefix . '-footer-ribbon',
            'type' => 'media',
            'url' => true,
            'compiler' => 'true',
            'desc' => esc_html__('Basic media uploader with disabled URL input field.', 'cleaning-services'),
            'subtitle' => esc_html__('Add/Upload logo using the WordPress native uploader', 'cleaning-services'),
            'title' => esc_html__('Footer Ribbon', 'cleaning-services'),
            'default' => array(
                'url' => CLEANING_SERVICES_IMG_URL . 'footer-ribbon.png',
            ),
        ),
        array(
            'id' => $opt_prefix . '-footer_copyright',
            'type' => 'textarea',
            'title' => esc_html__('Copyright', 'cleaning-services'),
            'subtitle' => esc_html__('Copyright Text', 'cleaning-services'),
            'default' => esc_html__('&copy; 2017 Cleaner Service.', 'cleaning-services')
        ),
        array(
            'id' => $opt_prefix . '-footer-contact-info',
            'type' => 'switch',
            'title' => esc_html__('Display Footer Info', 'cleaning-services'),
            'subtitle' => esc_html__('Enable or disable Footer Content', 'cleaning-services'),
            'default' => false,
            'on' => esc_html__('Enable', 'cleaning-services'),
            'off' => esc_html__('Disable', 'cleaning-services'),
        ),
        array(
            'id' => $opt_prefix . '-footer-logo',
            'type' => 'media',
            'url' => true,
            'compiler' => 'true',
            'desc' => esc_html__('Basic media uploader with disabled URL input field.', 'cleaning-services'),
            'subtitle' => esc_html__('Add/Upload logo using the WordPress native uploader', 'cleaning-services'),
            'title' => esc_html__('Footer Logo', 'cleaning-services'),
            'default' => array(
                'url' => CLEANING_SERVICES_IMG_URL . 'logo-footer.png',
            ),
        ),
        array(
            'id' => $opt_prefix . '-page-footer-title',
            'type' => 'textarea',
            'title' => esc_html__('Contact Us', 'cleaning-services'),
            'default' => 'Contact Us'
        ),
        array(
            'id' => $opt_prefix . '-phone-caption',
            'type' => 'editor',
            'title' => 'Phone Caption',
            'default' => '3261 Anmoore Road <br> Brooklyn, NY 11230'
        ),
        array(
            'id' => $opt_prefix . '-phone-number',
            'type' => 'editor',
            'title' => 'Phone Number',
            'default' => '800-123-4567, Fax: 718-724-3312'
        ),
        array(
            'id' => $opt_prefix . '-page-header-shedule',
            'type' => 'editor',
            'title' => esc_html__('Business Hours', 'cleaning-services'),
            'default' => 'Mon-Fri: 9:00 am – 5:00 pm <br> Sat-Sun: 11:00 am – 16:00 pm'
        ),
        array(
            'id' => $opt_prefix . '-page-email-text',
            'type' => 'editor',
            'title' => esc_html__('Business Email', 'cleaning-services'),
            'default' => 'officeone@youremail.com'
        ),
        array(
            'id' => $opt_prefix . '-footer-google-plus',
            'type' => 'text',
            'title' => esc_html__('Google Plus URL', 'cleaning-services'),
            'default' => '#'
        ),
        array(
            'id' => $opt_prefix . '-footer-facebook',
            'type' => 'text',
            'title' => esc_html__('Facebook URL', 'cleaning-services'),
            'default' => '#'
        ),
        array(
            'id' => $opt_prefix . '-footer-twitter',
            'type' => 'text',
            'title' => esc_html__('Twitter URL', 'cleaning-services'),
            'default' => '#'
        ),
        array(
            'id' => $opt_prefix . '-footer-instagram',
            'type' => 'text',
            'title' => esc_html__('Instagram URL', 'cleaning-services'),
            'default' => '#'
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Extra Settings', 'computer-repair'),
    'id' => 'extra_settings',
    'desc' => esc_html__('These are really basic fields!', 'cleaning-services'),
    'customizer_width' => '400px',
    'icon' => 'el el-share',
    'fields' => array(
        array(
            'id' => $opt_prefix . '-slug_postype_cleaning_services',
            'type' => 'text',
            'title' => esc_html__('Slug Cleaning Service', 'cleaning-services'),
            'subtitle' => esc_html__('Change Cleaning Service Slug Name', 'cleaning-services'),
             'desc'  => 'You might have to flush your permalinks after you performed this action Settings=> Permalink Settings',
            'default' => '' ,
        ),
    )
));
