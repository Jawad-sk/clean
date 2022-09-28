<?php

vc_map(array(
    "name" => "Icon Thumb box",
    "base" => "cleaning_services_icon_box",
    //"icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "as_parent" => array('only' => 'cleaning_services_icon_box_items'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Icon Thumb box extra class', 'car_repair_services'),
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
            "type" => "textfield",
            "heading" => __("How many Row in show?", 'cleaning_services'),
            "param_name" => "rows_per",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'rows_per' => '2',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many Slides Per Row ?", 'cleaning_services'),
            "param_name" => "slides_per_row",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_per_row' => '3',
            ),
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
    "name" => "Icon Thumb box items",
    "base" => "cleaning_services_icon_box_items",
    //"icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "as_child" => array('only' => 'cleaning_services_icon_box'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', 'cleaning_services'),
            'param_name' => 'icon',
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Heading 1st line",
            "param_name" => "heading",
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Description", 'cleaning_services'),
            "param_name" => "content",
            "value" => "",
        ),
        /*  array(
          'type' => 'dropdown',
          'heading' => esc_html__('Button Action', ULTIMA_NAME),
          'param_name' => 'button_action',
          'value' => array(
          'None' => '1',
          'Modal' => '2',
          'Pop Up' => '3',
          'Link' => '4',
          )
          ),
          array(
          "type" => "textfield",
          "holder" => "div",
          "heading" => "Modal Element Id",
          "param_name" => "modal_id",
          'dependency' => array(
          'element' => 'button_action',
          'value' => '2',
          ),
          ),
          /*     array(
          'type' => 'dropdown',
          'heading' => __('Select contact form for Pop Up Id', 'js_composer'),
          'param_name' => 'popup_id',
          'value' => $contact_forms,
          'save_always' => true,
          'description' => __('Choose previously created contact form from the drop down list.', 'js_composer'),
          'dependency' => array(
          'element' => 'button_action',
          'value' => '3',
          ),
          ),
         * */
        array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Action Button",
            "param_name" => "call_action",
        /* 'dependency' => array(
          'element' => 'button_action',
          'value' => '4',
          ), */
        ),
    /* array(
      'type' => 'dropdown',
      'heading' => __( 'Select contact form for Pop Up Id', 'js_composer' ),
      'param_name' => 'popup_id',
      'value' => $contact_forms,
      'save_always' => true,
      'description' => __( 'Choose previously created contact form from the drop down list.', 'js_composer' ),
      'dependency' => array(
      'element' => 'button_action',
      'value' => '3',
      ),
      ),

      array(
      'type' => 'dropdown',
      'heading' => esc_html__('Icon size', 'cleaning-services'),
      'param_name' => 'icon_size',
      'value' => array(
      'Default' => '',
      'Small' => 'sm',
      )
      ) */
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Cleaning_Services_Icon_Box extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Cleaning_Services_Icon_box_Items extends WPBakeryShortCode {
        
    }

}
