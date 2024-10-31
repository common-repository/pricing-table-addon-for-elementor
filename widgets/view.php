                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <h3 class="heading"><?php echo esc_html($main_heading); ?></h3>
                            <span class="subtitle"><?php echo esc_html($main_sub_heading); ?></span>
                            <div class="price-value"><?php echo esc_html($main_price); ?>
                                <span class="currency"><?php echo esc_html($price_currency); ?></span>
                                <span class="month">/<?php echo esc_html($price_unit); ?></span>
                            </div>
                        </div>
                        <ul class="pricing-content">
                        <?php
                          if ( $settings['list'] ) {
          
                             foreach (  $settings['list'] as $item ) {
                            echo '<li class="elementor-repeater-item-' .esc_html($item['_id']). '">'; ?>
                            <?php echo wp_kses_post($item['list_item']); ?> </li>
               
                            <?php }
           
                           } ?>

                        </ul>

                        <a href="<?php echo esc_url($pricing_btn_link); ?>" class="read"><?php echo esc_html($pricing_btn_txt); ?><i class="fa fa-angle-right"></i></a>
                    </div>
