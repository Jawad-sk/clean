<?php

vc_map(array(
    "name" => "Number Carousel",
    "base" => "cleaning_services_numbers_carousel",
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "as_parent" => array('only' => 'cleaning_services_numbers_carousel_items'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Column no",
            "param_name" => "col_no",
            "value" => array(
                "2 Column" => "2",
                "3 Column" => "3",
                "4 Column" => "4",
            ),
            "std" => '',
            "description" => esc_html__('No of column.', 'cleaning_services'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'cleaning_services'),
            'param_name' => 'extra_class',
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
                'slides_to_show' => '4',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many Slides to scroll?", 'cleaning_services'),
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

vc_map(array(
    "name" => "Number Carousel Items",
    "base" => "cleaning_services_numbers_carousel_items",
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "as_child" => array('only' => 'cleaning_services_numbers_carousel'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Title",
            "param_name" => "title",
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "holder" => "span",
            "heading" => "Counter Value(must be numeric)",
            "param_name" => "count_number",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "holder" => "span",
            "heading" => "Speed(must be numeric)",
            "param_name" => "number_scrolling_speed",
            "admin_label" => false,
        ),
        array(
            'type' => 'attach_image',
            'heading' => __('Image', 'cleaning_services'),
            'param_name' => 'image',
            'value' => '',
            'description' => __('Select image from media library.', 'cleaning_services'),
            'admin_label' => true,
        ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Cleaning_Services_Numbers_Carousel extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Cleaning_Services_Numbers_Carousel_Items extends WPBakeryShortCode {
        
    }

}
