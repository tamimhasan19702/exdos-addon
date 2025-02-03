<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_timeline
 *
 * Elementor widget for exdos_timeline.
 *
 * @since 1.0.0
 */
class Exdos_timeline extends Widget_Base
{
	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'Exdos Timeline';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return __('Exdos Timeline', 'exdos-addons');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-calendar exdos-addon';
	}

	public function get_style_depends(): array {
		return [ 'exdos-addons-css' ];
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['exdos-addons'];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends()
	{
		return ['exdos-addons'];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls()
	{
		$this->register_tab_controls();
		// $this->register_style_tab_controls();
	}

	protected function exdos_brand(){

$this->start_controls_section(
			'section_exdos_brand',
			[
				'label' => __('Exdos Brand', 'exdos-addons'),
			]
		);

		
		$this->add_control(
			'timeline_header',
			[
				'label' => __('Header Text', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Exdos received many global awards that inspired our member', 'exdos-addons'),
				'placeholder' => __('Enter Timeline Header', 'exdos-addons'),
			]
		);

		
		$this->add_control(
			'timeline_image',
			[
				'label' => __('Image', 'exdos-addons'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);
		

		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'timeline_heading',
			[
				'label' => __('Timeline Heading', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Best design award', 'exdos-addons'),
				'label_block' => true,
				'placeholder' => __('Enter Timeline Heading', 'exdos-addons'),
			]
		);

		$repeater->add_control(
			'timeline_time',
			[
				'label' => __('Timeline Time', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('2015 - 2016', 'exdos-addons'),
				'label_block' => true,
				'placeholder' => __('Enter Timeline Time', 'exdos-addons'),
			]
		);

		$this->add_control(
			'timeline_list',
			[
				'label' => __('Timeline List', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ timeline_heading }}}',
				'default' => [
					[
						'timeline_heading' => __('Best design award', 'exdos-addons'),
						'timeline_time' => __('2015 - 2016', 'exdos-addons'),
					],
					[
						'timeline_heading' => __('Dribbble winner', 'exdos-addons'),
						'timeline_time' => __('2017 - 2018', 'exdos-addons'),
					],
					[
						'timeline_heading' => __('Design of the year', 'exdos-addons'),
						'timeline_time' => __('2018 - 2019', 'exdos-addons'),
					],
					[
						'timeline_heading' => __('Graphic design', 'exdos-addons'),
						'timeline_time' => __('2019 - 2020', 'exdos-addons'),
					],
					[
						'timeline_heading' => __('Awwards winner', 'exdos-addons'),
						'timeline_time' => __('2020 - 2021', 'exdos-addons'),
					],
					[
						'timeline_heading' => __('Best jury awards', 'exdos-addons'),
						'timeline_time' => __('2022 - 2023', 'exdos-addons'),
					]
					
				],
			]
		);
		

	

		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_brand();
	}

	// register style tab controls
	protected function register_style_tab_controls()
	{
		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Style', 'exdos-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __('Text Transform', 'exdos-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __('None', 'exdos-addons'),
					'uppercase' => __('UPPERCASE', 'exdos-addons'),
					'lowercase' => __('lowercase', 'exdos-addons'),
					'capitalize' => __('Capitalize', 'exdos-addons'),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		

		?>

<div class="container">
    <div class="row">
        <div class="col-xl-6">
            <?php if (!empty($settings['timeline_header'])):?>
            <div class="tp-section-title-wrapper mb-40">
                <h2 class="tp-section-title mb-20">
                    <?php echo $settings['timeline_header'];?>
                </h2>
            </div>
            <?php endif;?>
            <?php if (!empty($settings['timeline_image'])):?>
            <div class="shape-arrow mb-40 d-none d-xl-block">
                <img src="<?php echo $settings['timeline_image']['url']; ?>"
                    alt="<?php echo $settings['timeline_image']['alt']; ?>" />
            </div>
            <?php endif;?>
        </div>
        <div class="col-xl-6">
            <div class="tpaward-wrapper mb-40">
                <div class="row gx-0">

                    <?php foreach ($settings['timeline_list'] as $item):?>

                    <div class="col-md-6">
                        <div class="tpaward">
                            <?php if (!empty($item['timeline_time'])):?>
                            <span><?php echo $item['timeline_time'];?></span>
                            <?php endif;?>
                            <?php if (!empty($item['timeline_heading'])):?>
                            <h3 class="tpaward__title"><?php echo $item['timeline_heading'];?></h3>
                            <?php endif;?>
                        </div>
                    </div>

                    <?php endforeach;?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
	}
}