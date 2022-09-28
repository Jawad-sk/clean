<?php

class cleaning_servicesTeam {

    public $col_no, $mask, $style;

    public function __construct() {
        add_shortcode('cleaning_services_team_carousel', array($this, 'cleaning_services_team_carousel_func'));
        add_shortcode('cleaning_services_team', array($this, 'cleaning_services_team_func'));
    }

    public function cleaning_services_team_carousel_func($atts = array(), $content = null) {
        extract(shortcode_atts(array(
            'team_col' => '4',
                        ), $atts));

        $changed_atts = shortcode_atts(array(
            'mobile_first' => 'false',
            'slides_to_show' => '3',
            'slides_to_scroll' => '1',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '2000',
            'dots' => 'true',
            'arrows' => 'true',
        ), $atts);

        wp_localize_script( 'cleaning-services-custom', 'ajax_teamcarousel', $changed_atts);

        $this->col_no = $team_col;
        $output = '<div class="row person-carousel">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        $this->col_no = 0;
        return $output;
    }

    public function cleaning_services_team_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'name' => '',
            'designation' => '',
            'image' => '',
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

        ob_start();
        ?>

        <div class="<?php echo $colclass; ?> person">
            <div class="person-img">
                <?php echo wp_get_attachment_image((int) $image, 'full'); ?>
            </div>
            <h3 class="person-name"><?php echo wp_kses_post($name); ?></h3>
            <h6 class="person-position"><?php echo wp_kses_post($designation); ?></h6>
            <div class="person-divider"></div>
            <p class="person-text"><?php echo wp_kses_post($content); ?></p>
        </div>
        <?php
        return ob_get_clean();
    }

}

new cleaning_servicesTeam();