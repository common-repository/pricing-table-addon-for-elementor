
                   <div class="pricingTable1">
                        <div class="pricingTable1-header">
                            <span class="heading">
                                <?php echo esc_html($main_heading); ?>
                            </span>
                        </div>
                        <div class="pricing-plans">
                            <span class="price-value"><span class="price-currency"><?php echo esc_html($price_currency); ?></span><span class="main-price"><?php echo esc_html($main_price); ?></span></span>
                            <span class="subtitle"><?php echo esc_html($main_sub_heading); ?></span>
                        </div>
                        <div class="pricingContent">
                            <ul>
                        <?php
                          if ( $settings['list'] ) {
          
                             foreach (  $settings['list'] as $item ) {
                            echo '<li class="elementor-repeater-item-' . esc_html($item['_id']) . '">'; ?>
                            <?php echo wp_kses_post($item['list_item']); ?> </li>
               
                            <?php }
           
                           } ?>
                            </ul>
                        </div><!-- /  CONTENT BOX-->

                        <div class="pricingTable1-sign-up"><!-- BUTTON BOX-->
                            <a href="<?php echo esc_url($pricing_btn_link); ?>" class="btn btn-block btn-default"><?php echo esc_html($pricing_btn_txt); ?></a>
                        </div><!-- BUTTON BOX-->
                    </div>
           
