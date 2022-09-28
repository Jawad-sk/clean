<?php

vc_map(array(
    "name" => "Icon carousel box",
    "base" => "cleaning_services_carousel_box",
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "as_parent" => array('only' => 'cleaning_services_icon_carousel_items'),
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
            'heading' => esc_html__('Icon carousel box extra class', 'car_repair_services'),
            'param_name' => 'extra_class',
        ),
    )
));

vc_map(array(
    "name" => "Icon carousel box items",
    "base" => "cleaning_services_icon_carousel_items",
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    "as_child" => array('only' => 'cleaning_services_carousel_box'),
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
          'heading' => __('Select contact form for Pop Up Id', 'cleaning_services'),
          'param_name' => 'popup_id',
          'value' => $contact_forms,
          'save_always' => true,
          'description' => __('Choose previously created contact form from the drop down list.', 'cleaning_services'),
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
      'heading' => __( 'Select contact form for Pop Up Id', 'cleaning_services' ),
      'param_name' => 'popup_id',
      'value' => $contact_forms,
      'save_always' => true,
      'description' => __( 'Choose previously created contact form from the drop down list.', 'cleaning_services' ),
      'dependency' => array(
      'element' => 'button_action',
      'value' => '3',
      ),
      ),

      array(
      'type' => 'dropdown',
      'heading' => esc_html__('Icon size', 'cleaning_services'),
      'param_name' => 'icon_size',
      'value' => array(
      'Default' => '',
      'Small' => 'sm',
      )
      ) */
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Cleaning_Services_Carousel_Box extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Cleaning_Services_Icon_Carousel_Items extends WPBakeryShortCode {
        
    }

}
