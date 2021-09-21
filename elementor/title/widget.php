<?php



class Widget extends  Elementor\Widget_Base{


    public function get_name()
    {
        return "title_";
    }    
    public function get_title()
    {
        return __('Title','Widget-name');
    }
    public function get_icon()
    {
        return 'eicon-t-letter' ;
    }
    public function get_categories()
    {
        return ['custome'];
    }

    public function __construct($data = [], $args = null) {

		parent::__construct($data, $args);
		wp_register_script( 'script-handle', 'path/to/file.js', [ 'elementor-frontend' ], '1.0.0', true );
		wp_register_style( 'style-handle', 'path/to/file.css');

	}


	public function get_script_depends() {
		return [ 'script-handle' ];
	}

	public function get_style_depends() {
		return [ 'style-handle' ];
	}



	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'primer' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'primer' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Enter Title', 'primer' ),
			]
		);

		$this->add_control(
			'heighlight',
			[
				'label'=>__('Heighlight Word','primer'),
				'type'=> \Elementor\Controls_Manager::NUMBER,
				'input_type'=>'number',
				'placeholder'=>__('Enter Heighlited word number'),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'style_section',
			[
				'label' => __('style','primer'),
				'tab'=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display();
		$title_arr=explode(" ",$settings['title'] );

		// $html = wp_oembed_get( $settings['url'] );

		// echo '<div class="oembed-elementor-widget">';

		// echo ( $html ) ? $html : $settings['url'];

		// echo '</div>';
		?>
		
		<div class="title-section">
			<h1 class="heading">
			<?php 
				$counter=1;
				foreach($title_arr as $arr)
				{
					if($settings['heighlight'] == $counter )
					{

						echo ' <span class="heighlight" data-title="'. $arr .'"> '.$arr.' </span>';
					}
					else
					{
						echo ' '.$arr;
					}
					$counter++;
				}
			?>
			</h1>
			</div>
			<?php
			// This is <span class="heighlight" data-title="Title Section"> Title Section </span>

	
	}

	protected function _content_template() {

    }



}
