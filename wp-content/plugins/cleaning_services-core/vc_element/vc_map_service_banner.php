<?php

vc_map(
        array(
            "name" => __("Service Grid", 'cleaning_services'),
            "description" => __("Set banners here", 'cleaning_services'),
            "base" => "cleaning_services_banner",
            "class" => "",
            // "icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
            "weight" => 1000,
            "controls" => "full",
            "category" => esc_html__('Cleaning Services', 'cleaning_services'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => "Heading",
                    "param_name" => "heading",
                    "holder" => "div",
                    "admin_label" => true,
                ),
                array(
                    "type" => "textarea_html",
                    "holder" => "div",
                    "heading" => "Content",
                    "param_name" => "content",
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => __('Image', 'js_composer'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => __('Select image from media library.', 'js_composer'),
                    'admin_label' => true,
                ),
                array(
                    "type" => "vc_link",
                    "holder" => "div",
                    "heading" => "Action Button",
                    "param_name" => "call_action",
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => "Add Extra Class",
                    "param_name" => "extra_class",
                ),
            )
        )
);
vc_map(array(
    "name" => "Service Grid  Container",
    "description" => __("Service Grid Container", 'cleaning_services'),
    "base" => "cleaning_services_banner_container",
    "class" => "",
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "as_parent" => array('only' => 'cleaning_services_banner'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Mobile First", 'pool-services'),
            "param_name" => "mobile_first",
            'group' => __( 'Slider Settings'),
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many Slides to show?", 'cleaning_services'),
            "param_name" => "slides_to_show",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_show' => '1',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many Slides to show?", 'cleaning_services'),
            "param_name" => "slides_to_scroll",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_scroll' => '1',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Is infinite?", 'cleaning_services'),
            "param_name" => "infinite",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Autoplay", 'cleaning_services'),
            "param_name" => "autoplay",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many Slides to show?", 'cleaning_services'),
            "param_name" => "slides_to_scroll",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'autoplay_speed' => '2000',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Arrows", 'cleaning_services'),
            "param_name" => "arrows",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Dots", 'cleaning_services'),
            "param_name" => "dots",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        )
    )
));



if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Cleaning_Services_Banner_Container extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Cleaning_Services_Banner extends WPBakeryShortCode {
        
    }

}