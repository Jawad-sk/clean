<?php

vc_map(array(
    "name" => "Affiliate Office",
    "base" => "affiliate_office",
    "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title ', 'cleaning_services'),
            'param_name' => 'title',
            'value' => ''
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Phone ', 'cleaning_services'),
            'param_name' => 'location',
            'value' => ''
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Fax ', 'cleaning_services'),
            'param_name' => 'fax',
            'value' => ''
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Email ', 'cleaning_services'),
            'param_name' => 'email',
            'value' => ''
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Google Plus URL', 'cleaning_services'),
            'param_name' => 'google_plus',
            'value' => '#'
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Facebook URL', 'cleaning_services'),
            'param_name' => 'facebook',
            'value' => '#'
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Twitter URL', 'cleaning_services'),
            'param_name' => 'twitter',
            'value' => '#'
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Instagram URL', 'cleaning_services'),
            'param_name' => 'instagram',
            'value' => '#'
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Address", 'cleaning_services'),
            "param_name" => "content",
            "value" => "",
        ),
    )
));
