<?php
add_shortcode('affiliate_office', 'cleaning_item_func');

function cleaning_item_func($atts, $content = null) {

    extract(shortcode_atts(array(
        'title' => 'Affiliate Office',
        'location' => '',
        'phone' => '',
        'fax' => '',
        'email' => '',
        'google_plus' => '',
        'facebook' => '',
        'twitter' => '',
        'instagram' => '',
        'extra_class' => '',
                    ), $atts));
    ob_start();
    ?>
    <div class="address-box">
        <h3><?php echo esc_html($title) ?></h3>
        <div class="contact-info-sm">
            <i class="icon icon-map-marker"></i>
            <?php echo esc_html__('Phone', 'cleaning-services')?>: <?php echo esc_html($location) ?>
            <br> <?php echo esc_html__('Fax', 'cleaning-services')?>: <?php echo esc_html($fax) ?>
            <br> <?php echo esc_html__('Email', 'cleaning-services')?>: <a href="mailto:<?php echo esc_attr($email) ?>"><?php echo esc_html($email) ?></a>
            <br><?php echo wp_kses_post($content) ?>
            <br>
            <ul class="social-list social-list-sm">

                <?php if (!empty($google_plus)): ?>
                    <li>
                        <a href="<?php echo wp_kses_post($google_plus); ?>"><i class="icon-google-plus-logo"></i></a>
                    </li>
                <?php endif; ?>

                <?php if (!empty($facebook)): ?>
                    <li>
                        <a href="<?php echo wp_kses_post($facebook); ?>"><i class="icon-facebook-logo"></i></a>
                    </li>
                <?php endif; ?>

                <?php if (!empty($twitter)): ?>
                    <li>
                        <a href="<?php echo wp_kses_post($twitter); ?>"><i class="icon-twitter-logo"></i></a>
                    </li>
                <?php endif; ?>

                <?php if (!empty($instagram)): ?>
                    <li>
                        <a href="<?php echo wp_kses_post($instagram); ?>"><i class="icon-instagram-logo"></i></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <?php
    $content = ob_get_clean();
    return $content;
}
