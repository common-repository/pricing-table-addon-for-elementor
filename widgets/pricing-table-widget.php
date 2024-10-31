<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Elementor Pricing Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Wtt_Pricing_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Pricing widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'pricing_table';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Pricing widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Wtt Pricing Table', 'wtt-pricing-table' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Pricing widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'dashicons dashicons-list-view';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Pricing widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'Wtt-category' ];
	}

	/**
	 * Register Pricing widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'wtt-pricing-table' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'pricing_layout_style',
			[
				'label' => __( 'Layout Style', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'view',
				'options' => [
					'view'  => __( 'Design one', 'wtt-pricing-table' ),
					'view1'  => __( 'Design Two', 'wtt-pricing-table' ),
					'view2'  => __( 'Design Three', 'wtt-pricing-table' ),
		
				],
			]
		);
		    // Heading
		$this->add_control(
			'main_heading',
			[
				'label' => __( 'Heading', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Standard',
                'label_block' => true,
                'separator'=> 'before',
				'placeholder' => __( 'Write Heading Here', 'wtt-pricing-table' ),
			]
        );

        // Sub Heading
		$this->add_control(
			'main_sub_heading',
			[
				'label' => __( 'Sub Heading', 'wtt-pricing-table' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Lorem ipsum dolor sit amet',
                'label_block' => true,
				'placeholder' => __( 'Write Sub Heading Here', 'wtt-pricing-table' ),
			]
        );
        
    
        
        // Price
		$this->add_control(
			'main_price',
			[
				'label' => __( 'Price: ', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '50',
                'separator'=> 'before',
				'placeholder' => __( 'Write Price Here', 'wtt-pricing-table' ),
			]
        );

        // Price currency
		$this->add_control(
			'price_currency',
			[
				'label' => __( 'Currency: ', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '$',
                'separator'=> 'before',
				'placeholder' => __( 'Write Price Currency Here', 'wtt-pricing-table' ),
			]
        );

       // Price Unit Name
		$this->add_control(
			'price_unit',
			[
				'label' => __( 'Unit Name: ', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'mon',
                'separator'=> 'before',
				'placeholder' => __( 'Write Price Unit Here', 'wtt-pricing-table' ),
			]
        );


		// pricing list 

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_item', [
				'label' => __( 'List Item', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Item' , 'wtt-pricing-table' ),
				'label_block' => true,
			]
		);

	

		$repeater->add_control(
			'list_color',
			[
				'label' => __( 'Color', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);
        $this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_item' => __( '50GB Disk Space', 'wtt-pricing-table' ),
						
					],
					[
						'list_item' => __( '15 Domains', 'wtt-pricing-table' ),
						
					],
				],
				'title_field' => '{{{ list_item }}}',
			]
		);


         	$this->add_control(
					'pricing_btn_link',
					[
						'label' => __( 'Pricing Button url:', 'wtt-pricing-table' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => __( 'Button url', 'wtt-pricing-table' ),
					]
				);

        	$this->add_control(
				'pricing_btn_txt',
				[
					'label' => __( 'Button Text: ', 'wtt-pricing-table' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' =>'Sign Up',
	                'label_block' => true,
	                'separator'=> 'before',
					'placeholder' => __( 'Button Text Here', 'wtt-pricing-table' ),
				]
        );


        $this->end_controls_section();


         // Style Tab
        $this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Styles', 'wtt-pricing-table' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

        //  Heading BG Options
		$this->add_control(
			'bg_heading',
			[
				'label' => __( 'Header Background:', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

        //  Heading BG Color
        $this->add_control(
			'header_bg_color',
			[
				'label' => __( 'Color', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
                'default' => '#08c6aa',
				'selectors' => [
					'{{WRAPPER}} .pricingTable .pricingTable-header' => 'background: {{VALUE}}',
				],
			]
        ); 

        // Title Options
		$this->add_control(
			'title_heading',
			[
				'label' => __( 'List Title', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

        //  Title Color
        $this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
                'default' => '#777',
				'selectors' => [
					'{{WRAPPER}} .pricingTable .heading,h4.mb-0,.pricingTable1 .heading' => 'color: {{VALUE}}',
				],
			]
        );
        
        // title Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'wtt-pricing-table' ),
				
				'selector' => '{{WRAPPER}} .pricingTable .heading, h4.mb-0,.pricingTable1 .heading',
			]
        );
        
        // Sub Title Options
		$this->add_control(
			'sub_title_heading',
			[
				'label' => __( 'List Sub Title', 'wtt-pricing-table' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
		);

        // Sub Title Color
        $this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Color', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
                'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .pricingTable .subtitle,.pricingTable1 .subtitle' => 'color: {{VALUE}}',
				],
			]
        );
        
        //Sub Title Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'label' => __( 'Typography', 'wtt-pricing-table' ),
				
				'selector' => '{{WRAPPER}} .pricingTable .subtitle,.pricingTable1 .subtitle',
			]
        ); 
        // Currency Options
		$this->add_control(
			'price_currency_color_option',
			[
				'label' => __( 'Price Color:', 'wtt-pricing-table' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
		);

        // Currency Color
        $this->add_control(
			'price_currency_color',
			[
				'label' => __( 'Color:', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
                'default' => '#ddd',
				'selectors' => [
					'{{WRAPPER}} .pricingTable .price-value,.text-custom, .navbar-custom .navbar-nav li a:hover, .navbar-custom .navbar-nav li a:active, .navbar-custom .navbar-nav li.active a, .service-box .services-icon, .price-features p i, .faq-icon, .social .social-icon:hover,.pricingTable1 .price-value,.plan-price h1 span' => 'color: {{VALUE}}',
				],
			]
        );
        
              $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_currency_typography',
				'label' => __( 'Typography', 'wtt-pricing-table' ),
				
				'selector' => '{{WRAPPER}} .pricingTable .price-value,h1.text-custom.font-weight-normal.mb-0,.plan-price h1 span',
			]
        ); 
        
        // Pricing Options
		$this->add_control(
			'pricing_list_item',
			[
				'label' => __( 'Pricing List:', 'wtt-pricing-table' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
		);

        
        // pricing list Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_list_item_typography',
				'label' => __( 'Typography', 'wtt-pricing-table' ),
				
				'selector' => '{{WRAPPER}} .pricingTable .pricing-content li,.mt-5, .my-5,.price-features p i,.pricingTable1 .pricingContent ul li',
			]
        );

		// Border Options
		$this->add_control(
			'list_border',
			[
				'label' => __( 'List Border', 'wtt-pricing-table' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
		);

		// Border 1 Background Color
        $this->add_control(
			'border1_color',
			[
				'label' => __( 'Border Color', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
                'default' => '#e3e3e3',
				'selectors' => [
					'{{WRAPPER}} .pricingTable' => 'border-color: {{VALUE}}',
				],
			]
        );

		// Border Hover Color
        $this->add_control(
			'border2_color',
			[
				'label' => __( 'Hover border Color', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
                'default' => '#08c6aa',
				'selectors' => [
					'{{WRAPPER}} .pricingTable:before ,{{WRAPPER}} .pricingTable:hover:after,.pricingTable1:hover' => 'border-color: {{VALUE}}',
				],
			]
        );		

		// Button Options
		$this->add_control(
			'list_button',
			[
				'label' => __( 'Button Section:', 'wtt-pricing-table' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
		);
        // Button Color
        $this->add_control(
			'signup_button_color',
			[
				'label' => __( 'Button Color:', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
                'default' => '#08c6aa',
				'selectors' => [
					
					'{{WRAPPER}} .pricingTable .read,a.btn.btn-block.btn-default,a.btn.btn-custom' => 'color: {{VALUE}}',
				
				],
			]
        ); 


         // Button Hover Color
        $this->add_control(
			'signup_button_hover_color',
			[
				'label' => __( 'Button Hover Color', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			
                'default' => '#28a745',
				'selectors' => [
					
					'{{WRAPPER}} .pricingTable .read:hover,a.btn.btn-custom:hover,a.btn.btn-block.btn-default:hover' => 'color: {{VALUE}}',
					
				],
			]
        );  
      // Button Bg Color
        $this->add_control(
			'signup_button_bg_color',
			[
				'label' => __( 'Button Background Color:', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			
                'default' => '#f6576e',
				'selectors' => [
					
					'{{WRAPPER}} a.btn.btn-custom,a.btn.btn-block.btn-default' => 'background-color: {{VALUE}}',
				
				],
			]
        ); 


         // Button bg Hover Color
        $this->add_control(
			'signup_button_bg_hover_color',
			[
				'label' => __( 'Button Hover Background Color', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			
                'default' => '#fff',
				'selectors' => [
					
					'{{WRAPPER}} a.btn.btn-block.btn-default:hover,a.btn.btn-custom:hover' => 'background-color: {{VALUE}}',
					
				],
			]
        );  

       // Button border Color
        $this->add_control(
			'button_border_color',
			[
				'label' => __( 'Button Border Color:', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			
                'default' => '#08c6aa',
				'selectors' => [
					'{{WRAPPER}} .pricingTable .read,a.btn.btn-block.btn-default' => 'border-color: {{VALUE}}',
					
					'{{WRAPPER}} .pricingTable .read:before,.pricingTable .read:after' => 'border-left: 2px solid  {{VALUE}}',
				],
			]
        ); 


         // Button Border Hover Color
        $this->add_control(
			'button_border_hover_color',
			[
				'label' => __( 'Button Border Hover Color', 'wtt-pricing-table' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			
                'default' => '#28a745',
				'selectors' => [
					'{{WRAPPER}} .pricingTable .read:hover,a.btn.btn-block.btn-default:hover' => 'border-color: {{VALUE}}',

					'{{WRAPPER}} .pricingTable .read:hover:before,.pricingTable .read:hover:after' => 'border-left-color: {{VALUE}}',
					
					
				],
			]
        );

         $this->end_controls_section();
	}

	/**
	 * Render Pricing widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */



	protected function render() {

 

        $settings = $this->get_settings_for_display();
        $main_sub_heading = $settings['main_sub_heading'];
         $main_heading = $settings['main_heading'];
         $main_price = $settings['main_price'];
         $price_currency = $settings['price_currency'];
         $price_unit = $settings['price_unit'];
        $pricing_btn_link = $settings['pricing_btn_link']['url'];
        $pricing_btn_txt = $settings['pricing_btn_txt'];

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/'. $settings['pricing_layout_style'] .'.php'; 
    	

	}

}