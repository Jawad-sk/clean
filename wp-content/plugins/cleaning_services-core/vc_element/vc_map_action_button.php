<?php

/**
 * Add Shortcode To Visual Composer
 */
$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

$contact_forms = array();
if ($cf7) {
    foreach ($cf7 as $cform) {
        $contact_forms[$cform->post_title] = $cform->ID;
    }
} else {
    $contact_forms[__('No contact forms found', 'js_composer')] = 0;
}


vc_map(array(
    "name" => "Action Button",
    "base" => "cleaning_sevice_action_button",
    "description" => __("Action Button For Pop Up Or Modal", 'cleaning_services'),
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Button Title",
            "param_name" => "title",
            "admin_label" => true,
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', 'cleaning-services'),
            'param_name' => 'icon',
        ),
        array(
                "type" => "vc_link",
                "holder" => "div",
                "heading" => "Action Button",
                "param_name" => "call_action",  
             ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));

