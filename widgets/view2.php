
	
			<div class="bg-white mt-3 price-box">
				<div class="pricing-name text-center">
					<h4 class="mb-0">
                         <?php echo esc_html($main_heading); ?>
                         	
                     </h4>
				</div>
				<div class="plan-price text-center mt-4">
					<h1 class="text-custom font-weight-normal mb-0"><?php echo esc_html($price_currency); ?><?php echo esc_html($main_price); ?><span>/<?php echo esc_html($price_unit); ?></span></h1>
				</div>
				<div class="price-features mt-5">
					                        <?php
                          if ( $settings['list'] ) {
          
                             foreach (  $settings['list'] as $item ) {
                            echo '<p><i class="fa fa-check"></i> <span class="elementor-repeater-item-' . esc_html($item['_id']). '">'; ?>
                            <?php echo wp_kses_post($item['list_item']); ?> </span></p>
               
                            <?php }
           
                           } ?>
		
				</div>
				<div class="text-center mt-5">
					<a href="<?php echo esc_url($pricing_btn_link); ?>" class="btn btn-custom"><?php echo esc_html($pricing_btn_txt); ?></a>
				</div>
			</div>
		
		

	
