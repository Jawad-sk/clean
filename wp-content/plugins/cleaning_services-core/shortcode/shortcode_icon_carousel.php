<?php

class cleaning_IconCarousel {

    public $col_no, $mask, $style;

    public function __construct() {
        add_shortcode('cleaning_services_icon_carousel_items', array($this, 'cleaning_services_icon_carousel_items_func'));
        add_shortcode('cleaning_services_carousel_box', array($this, 'cleaning_services_icon_carousel_func'));
    }

    function cleaning_services_icon_carousel_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'col_no' => '3',
            'extra_class' => '',
                        ), $atts));

        $this->col_no = $col_no;
        ob_start();
        $output = '';
        $output .= '<div class="row' . $extra_class . '">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        echo $output;
        $content = ob_get_contents();
        ob_end_clean();
        $this->col_no = 0;
        return $content;
    }

    function cleaning_services_icon_carousel_items_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'icon' => '',
            'heading' => '',
            //'extra_class' => '',
            //'icon_size' => '',
            //'button_action' => 'modal',
            // 'modal_id' => 'appointmentForm',
            //'popup_id' => '54',
            'call_action' => '',
                        ), $atts));


        $column_no = $this->col_no;
        switch ((int) $column_no) {
            case 2:
                $colclass = 'col-sm-6 col-xs-12';
                break;
            case 4:
                $colclass = 'col-md-3 col-sm-6 col-xs-12';
                break;
            default:
                $colclass = 'col-md-4 col-sm-6 col-xs-12';
                break;
        }

        ob_start()
        ?>
        <div class="<?php echo $colclass; ?> text-icon">
            <div class="text-icon-icon">
                <i class="icon <?php echo wp_kses_post($icon); ?>"></i>
            </div>
            <h5 class="text-icon-title"><?php echo wp_kses_post($heading); ?></h5>
            <div class="text-icon-text">
                <?php echo wp_kses_post($content); ?>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        return $content;
    }

}

new cleaning_IconCarousel();
