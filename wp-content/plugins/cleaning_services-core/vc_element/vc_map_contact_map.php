<?php

vc_map(array(
    "name" => "Contact Map",
    "base" => "cleaning_services_contact_map",
    "category" => esc_html__('Cleaning Services', 'cleaning_services'),
    //"icon" => CLEANING_SERVICES_THEME_URI . '/images/cleaning.png',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => "Gmap Api Key",
            "param_name" => "gmap_api_key",
        ),
         array(
            "type" => "textfield",
            "heading" => "Latitude",
            "param_name" => "gmap_latitude",
        ),
        array(
            "type" => "textfield",
            "heading" => "Longitude",
            "param_name" => "gmap_longitude",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Slider Image", ULTIMA_NAME),
            "param_name" => "gmap_marker",
        ),

        array(
            "type" => "textfield",
            "heading" => "Extra Class",
            "param_name" => "extra_class",
        ),
    )
));

 