<?php

vc_map(array(
    "name" => "Cleaning Services Price",
    "base" => "cleaning_serivces_price",
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "as_parent" => array('only' => 'cleaning_services_price_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => "Extra Class",
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
                'slides_to_scroll' => '4',
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
            "admin_label" => false,
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
            "admin_label" => false
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
    "name" => "Cleaning Price Items",
    "base" => "cleaning_services_price_item",
        //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "as_child" => array('only' => 'cleaning_serivces_price'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title text", "cleaning_services"),
            "param_name" => "title_text",
            "holder" => "div",
            "admin_label" => false,
        ),

        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Price Content", 'cleaning_services'),
            "param_name" => "content",
            "value" => "",
        ),
        
        array(
            "type" => "textfield",
            "heading" => esc_html__("Appartment Text", "cleaning_services"),
            "param_name" => "appartment_text",
            "holder" => "div",
            "admin_label" => false,
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Estimated Text", "cleaning_services"),
            "param_name" => "estimate_text",
            "holder" => "div",
            "admin_label" => false,
        ),
          array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Action Button",
            "param_name" => "call_action"
        ),
    )
));

class WPBakeryShortCode_Cleaning_Serivces_Price extends WPBakeryShortCodesContainer {
    
}

class WPBakeryShortCode_Cleaning_Services_Price_Item extends WPBakeryShortCode {
    
}
