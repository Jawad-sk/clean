<?php

class cleaning_numbers_carousel {

    public $col_no, $style;

    public function __construct() {
        add_shortcode('cleaning_services_numbers_carousel_items', array($this, 'cleaning_services_numbers_carousel_items_func'));
        add_shortcode('cleaning_services_numbers_carousel', array($this, 'cleaning_services_numbers_carousel_func'));
    }

    function cleaning_services_numbers_carousel_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'col_no' => '4',
            'extra_class' => '',
                        ), $atts));

        $changed_atts = shortcode_atts(array(
            'mobile_first' => 'false',
            'slides_to_show' => '4',
            'slides_to_scroll' => '1',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '2000',
            'dots' => 'true',
            'arrows' => 'true',
        ), $atts);

        wp_localize_script( 'cleaning-services-custom', 'ajax_numberslide', $changed_atts);

        $this->col_no = $col_no;
        ob_start();
        $output = '';
        $output .= '<div class="row numbers-carousel ' . $extra_class . '">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        echo $output;
        $content = ob_get_contents();
        ob_end_clean();
        $this->col_no = 0;
        return $content;
    }

    function cleaning_services_numbers_carousel_items_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' => '',
            'count_number' => '',
            'number_scrolling_speed' => '',
            'image' => '',
            'extra_class' => '',
            'call_action' => '',
                        ), $atts));

        $column_no = $this->col_no;
        switch ((int) $column_no) {
            case 2:
                $colclass = 'col-sm-6 col-xs-12';
                break;
            case 4:
                $colclass = 'col-md-3 col-sm-4 col-xs-12';
                break;
            default:
                $colclass = 'col-md-4 col-sm-4 col-xs-12';
                break;
        }

        ob_start()
        ?>

        <div class="<?php echo esc_html($column_no); ?>">
            <div class="fact-item">
                <div class="fact-item-image">
                    <?php echo wp_get_attachment_image((int) $image, 'full'); ?>
                    <div class="fact-item-text-wrap">
                        <span class="fact-item-number number"><span class="count" data-to="<?php echo esc_html($count_number); ?>" data-speed=" <?php echo esc_html($number_scrolling_speed); ?>"> <?php echo esc_html($count_number); ?></span></span>
                        <div class="fact-item-text">
                            <?php echo esc_html($title); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        return $content;
    }

}

new cleaning_numbers_carousel();
