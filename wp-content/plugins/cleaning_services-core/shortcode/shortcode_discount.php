<?php

class cleaning_ServiceDiscount {

    public function __construct() {
        add_shortcode('cleaning_services_discount_items', array($this, 'cleaning_services_discount_items_func'));
        add_shortcode('cleaning_services_discount', array($this, 'cleaning_services_discount_func'));
    }

    function cleaning_services_discount_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'extra_class' => '',
                        ), $atts));
        ob_start();
        $output = '';
        $output .= '<div class="discount-box-row">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        echo $output;
        $outputcontent = ob_get_contents();
        ob_end_clean();
        return $outputcontent;
    }

    function cleaning_services_discount_items_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'color' => '1',
            'discount_type' => '',
                        ), $atts));
        ob_start();
        ?>

        <div class="discount-box discount-box--color<?php echo $color; ?>">
            <div class="discount-box-sale"><?php echo wp_kses_post($content); ?></div>
            <div><?php echo wp_kses_post($discount_type); ?></div>
        </div>

        <?php
        $outcontent = ob_get_clean();
        return $outcontent;
    }

}

new cleaning_ServiceDiscount();

