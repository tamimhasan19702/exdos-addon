<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_counter
 *
 * Elementor widget for exdos_counter.
 *
 * @since 1.0.0
 */
class Exdos_Counter extends Widget_Base
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
		return 'Exdos Counter';
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
		return __('Exdos Counter', 'exdos-addons');
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
		return 'eicon-counter exdos-addon';
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

/**
 * Retrieve the list of styles the widget depended on.
 *
 * Used to set style dependencies required to run the widget.
 *
 * @since 1.0.0
 *
 * @access public
 *
 * @return array Widget styles dependencies.
 */
public function get_style_depends()
{
    return ['flaticon_exdos', 'exdos-addons-css'];
}


	protected function exdos_counter()
	{
		$this->start_controls_section(
			'section_exdos_counter',
			[
				'label' => __('Exdos Counter', 'exdos-addons'),
			]
		);

		$this->add_control(
			'exdos_counter_type',
			[
				'label' => __('Type', 'exdos-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'image',
				'options' => [
					'icon' => __('Icon', 'exdos-addons'),
					'image' => __('Image', 'exdos-addons'),
				],
			]
		);

		
		
		$this->add_control(
			'exdos_counter_icon',
			[
				'label' => __('Icon', 'exdos-addons'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'flaticon-merging',
					'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
				'recommended' => [
					'fa-solid' => [
						'flaticon-merging',
						'flaticon-building',
						'flaticon-umbrella',
						'flaticon-award',
						'flaticon-award-1',
						'flaticon-award-2',
					],
				],
				'condition' => [
					'exdos_counter_type' => 'icon',
				],
				
			]
		);
		

		$this->add_control(
			'exdos_counter_image',
			[
				'label' => __('Image', 'exdos-addons'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'exdos_counter_type' => 'image',
				],
				
			]
		);

		
		
	

		$this->add_control(
			'exdos_counter_title',
			[
				'label' => __( 'Title', 'exdos-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Project completed', 'exdos-addons' ),
				'placeholder' => __( 'Enter title', 'exdos-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'exdos_counter_text',
			[
				'label' => __( 'Text', 'exdos-addons' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100000,
				'step' => 1,
				'default' => 796,
				'placeholder' => __( 'Enter text', 'exdos-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'exdos_counter_prefix',
			[
				'label' => __( 'Prefix', 'exdos-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Enter prefix', 'exdos-addons' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'exdos_counter_suffix',
			[
				'label' => __( 'Suffix', 'exdos-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Enter suffix', 'exdos-addons' ),
				'label_block' => true,
			]
		);

		

		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_counter();
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

<div class="tpfact text-center text-lg-start mb-40">
    <?php if (!empty($settings['exdos_counter_icon']['value'])): ?>
    <div class="tpfact__icon">
        <span><i class="<?php echo esc_attr($settings['exdos_counter_icon']['value']); ?>"></i></span>
    </div>
    <?php endif;?>
    <?php if (!empty($settings['exdos_counter_image']['url'])): ?>
    <div class="tpfact__icon">
        <span><img src="<?php echo esc_url($settings['exdos_counter_image']['url']); ?>"
                alt="<?php echo esc_attr($settings['exdos_counter_image']['alt']); ?>"></span>
    </div>
    <?php endif;?>
    <div class="tpfact__text">
        <?php if (!empty($settings['exdos_counter_title'])): ?>
        <h4 class="tpfact__title mb-30"><?php echo wp_kses_post($settings['exdos_counter_title']); ?></h4>
        <?php endif;?>
        <?php if (!empty($settings['exdos_counter_text'])): ?>
        <span>
            <?php echo esc_attr($settings['exdos_counter_prefix'] . $settings['exdos_counter_text'] . $settings['exdos_counter_suffix']); ?>
        </span>
        <?php endif;?>
    </div>
</div>

<?php
	}
}