<?php

class cleaning_service_price {

    public $col_no;

    public  function __construct() {
        add_shortcode('cleaning_serivces_price', array($this, 'cleaning_price_func'));
        add_shortcode('cleaning_services_price_item', array($this, 'cleaning_services_price_item_func'));
    }

    public  function cleaning_price_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'extra_class' => 0,
            'col_no' => '1',
                        ), $atts));

        $changed_atts = shortcode_atts(array(
            'mobile_first' => 'false',
            'slides_to_show' => '4',
            'slides_to_scroll' => '4',
            'infinite' => 'false',
            'autoplay' => 'true',
            'autoplay_speed' => '2000',
            'dots' => 'true',
            'arrows' => 'false',
        ), $atts);

        wp_localize_script( 'cleaning-services-custom', 'ajax_priceslide', $changed_atts);
        ob_start();
        $this->col_no = $col_no;
        ?>
       <div class="price-carousel">
            <?php echo do_shortcode($content); ?>
        </div>
        <?php
        $output = ob_get_clean();
        $this->col_no = 0;
        return $output;
    }

    public  function cleaning_services_price_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title_text' => '',
            'appartment_text' => '',
            'estimate_text' => '',
            'call_action' => '',
                        ), $atts));


        $column_no = $this->col_no;
        ob_start();
        ?>

        <div class="prices-box">
            <h3 class="prices-box-title"><?php echo wp_kses_post($title_text); ?></h3>
            <div class="prices-box-price">
                <?php echo wp_kses_post($content); ?>
            </div>
            <div class="prices-box-row"><?php echo wp_kses_post($appartment_text); ?></div>
            <div class="prices-box-row"><?php echo wp_kses_post($estimate_text); ?></div>
            <div class="prices-box-link">

                <?php
                
                $href = vc_build_link($call_action);
                if (!empty($href['url']) && ( $href['url'] != '')) :
                    ?>
                    <a href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif; ?>    class="btn btn-sm" data-animation="fadeInUp" data-animation-delay="0.5s"  rel="<?php echo $href['rel']; ?>"  >   
                        <?php echo $href['title']; ?>   
                    </a>
                <?php endif; ?>
               
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        return $content;
    }

}

new cleaning_service_price();