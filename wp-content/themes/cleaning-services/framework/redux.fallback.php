<?php

/**
 * fallback redux class
 */
if (!class_exists('Redux') && !class_exists('ReduxFramework')) {

    global $cleaning_services_opt;

    class Redux {

        public static $hasOptions = false;

        public static function setArgs($option, $args) {
            $options = get_option($option, false);
            if (!empty($options)) {
                self::$hasOptions = true;
            }
        }

        public static function setSection($option, $args) {
            if (isset($args['fields']) && !empty($args['fields']) && !self::$hasOptions) {
                foreach ($args['fields'] as $field) {
                    if (isset($field['default']) && isset($field['id'])) {
                        $id = $field['id'];
                        $updateArr = get_option($option, array());
                        if (is_array($field['default'])) {
                            foreach ($field['default'] as $key => $val) {
                                $updateArr[$id][$key] = $val;
                            }
                            update_option($option, $updateArr);
                        } else {
                            $updateArr[$id] = $field['default'];
                            update_option($option, $updateArr);
                        }
                    }
                }
            }
        }

    }

     function cleaning_services_redux_fallback_init_var() {
        global $cleaning_services_opt;
        if (!is_admin() && !isset($cleaning_services_opt)) {
            $cleaning_services_opt = get_option('cleaning_services_opt');
            foreach ($cleaning_services_opt as $yskey => $ysvalue) {
                if ($ysvalue == 'on') {
                    $cleaning_services_opt[$yskey] = true;
                } elseif ($ysvalue == 'off') {
                    $cleaning_services_opt[$yskey] = false;
                }
            }
        }
    }

    add_action('init', 'cleaning_services_redux_fallback_init_var', 1);
}
function cleaning_services_redux_get_infoData() {
    $transient_name = 'check_smart_update_theme' ;
    $info_updated = get_transient( $transient_name );
    if ( false === $info_updated ) {
        $my_theme = wp_get_theme('cleaning-services');
        if ($my_theme->exists()) {
            $themever = $my_theme->get('Version');
            $themename = $my_theme->get('Name');
        } else {
            $themever = '1.0';
            $themename = 'Cleaning Services';
        }
        $url = 'http://updates.smartdatasoft.net/check_for_updates.php';
        $response = wp_remote_post($url, array(
            'method' => 'POST',
            'timeout' => 45,
            'redirection' => 5,
            'blocking' => true,
            'headers' => array(),
            'body' => array(
                'purchase_key' => 'null',
                'operation' => 'check_update',
                'domain' => $_SERVER['HTTP_HOST'],
                'module' => 'wp-cleaning-services',
                'version' => $themever,
                'theme_name' => $themename,
                ),
            'cookies' => array()
            )
        );
        if (!is_wp_error($response) && isset($response['response']['code']) && $response['response']['code'] == 200) {
           set_transient( $transient_name, $response,MONTH_IN_SECONDS   );
       }
     }else{}
}

add_action( 'admin_init', 'cleaning_services_redux_get_infoData', 1 );