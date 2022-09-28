<?php

vc_map(array(
    "name" => "News Slider",
    "base" => "cleaning_services_news_slider",
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "as_parent" => array('only' => 'cleaning_services_news_slider_item'),
    "content_element" => true,
    //"icon" => cleaning_services_SERVICES_THEME_URI . '/images/cleaning.png',
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('News Slide Extra Class', 'car_repair_services'),
            'param_name' => 'extra_class',
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many Slides to show?", 'cleaning_services'),
            "param_name" => "slides_to_show",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_show' => '3',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many scroll to show?", 'cleaning_services'),
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
            "heading" => __("How many Slides to dpeed?", 'cleaning_services'),
            "param_name" => "autoplay_speed",
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
    "name" => "News Slider Items",
    "base" => "cleaning_services_news_slider_item",
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "as_child" => array('only' => 'cleaning_services_news_slider'),
    "content_element" => true,
   // "icon" => cleaning_services_SERVICES_THEME_URI . '/images/cleaning.png',
    "show_settings_on_create" => true,
    "params" => array(

                array(
                      "type" => "attach_image",
                      "class" => "",
                      "heading" => esc_html__( "Thumbnail Image", "cleaning_services" ),
                      "param_name" =>  "image",
                    ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => "Type date news Item",
                    "param_name" => "date",
                    ),

                array(
                      "type" => "textfield",
                      "class" => "",
                      "heading" => esc_html__( "Title", "cleaning_services" ),
                      "param_name" => "title",
                        "holder" => "div",
                        "admin_label" => false,
                    ),
                    array(
                      "type" => "textarea",
                      "class" => "",
                      "heading" => esc_html__( "Description text", "cleaning_services" ),
                      "param_name" =>  "content",
                    ),
                    array(
                    "type" => "vc_link",
                    "holder" => "div",
                    "heading" => "Link URL",
                    "param_name" => "link_url",
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Extra Class', 'cleaning_services'),
                        'param_name' => 'extra_class',
                    ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Cleaning_Services_News_Slider extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Cleaning_Services_News_Slider_Item extends WPBakeryShortCode {
        
    }

}
 
 