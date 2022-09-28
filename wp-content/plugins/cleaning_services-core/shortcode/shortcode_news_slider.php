<?php

class Cleaning_Services_NewsSlider extends WPBakeryShortCode {

    public function __construct() {
        add_shortcode('cleaning_services_news_slider', array($this, 'cleaning_services_news_slider_func'));
        add_shortcode('cleaning_services_news_slider_item', array($this, 'cleaning_services_news_slider_item_func'));
    }

    public function cleaning_services_news_slider_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'navigation_type' => 0,
            'extra_class' => '',
                        ), $atts));

        $changed_atts = shortcode_atts(array(
            'slides_to_show' => '3',
            'slides_to_scroll' => '1',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '2000',
            'dots' => 'true',
            'arrows' => 'true',
        ), $atts);

        wp_localize_script( 'cleaning-services-custom', 'ajax_newsslide', $changed_atts);
        
        ob_start();
        ?>
            <div class="news-carousel row" >
                <?php echo do_shortcode($content); ?>
            </div>  
        <?php
        $output = ob_get_clean();
        return $output;
    }

    public function cleaning_services_news_slider_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' => '',
            'image' => '',
            'date' => '',
            'link_url' => '',
            'extra_class'=>'',
                        ), $atts));
         $href = vc_build_link($link_url);

         $sigle_img = wp_get_attachment_image_src($image, "large");
          ob_start();
         ?>
        <div class="col-sm-4">
            <div class="news-prw">
                <div class="news-prw-image">
                    <img src="<?php echo esc_attr__( $sigle_img[0]) ?>" alt="">
                    <?php if(isset($href['url']) && $href['url']!=''){ ?>
                        <a  <?php if($href['target']){ ?> target="<?php echo esc_url( $href['target']) ;?>" <?php } ?> href="<?php echo esc_url( $href['url']) ;?>" class="news-prw-link">
                           <i class="icon-right-arrow"></i>
                        </a>
                    <?php } ?>
                </div>
                <div class="news-prw-date"><?php echo esc_html__($date); ?></div>
                <h4 class="news-prw-title"><?php echo esc_html__($title); ?></h4>
                <p><?php echo esc_html__($content); ?></p>
            </div>
        </div>
        <?php
         $content = ob_get_clean();
        return $content;    
    }
}

new Cleaning_Services_NewsSlider();
