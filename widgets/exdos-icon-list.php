<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_icon_list
 *
 * Elementor widget for exdos_icon_list.
 *
 * @since 1.0.0
 */
class Exdos_Icon_List extends Widget_Base
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
		return 'Exdos Icon_List';
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
		return __('Exdos Icon List', 'exdos-addons');
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
		return 'eicon-list exdos-addon';
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

	protected function exdos_icon_list()
	{
		$this->start_controls_section(
			'iconList_section',
			[
				'label' => __('Icon List', 'exdos-addons'),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'type',
			[
				'label' => __( 'Type', 'exdos-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'icon' => __( 'Icon', 'exdos-addons' ),
					'image' => __( 'Image', 'exdos-addons' ),
				],
				'default' => 'icon',
				
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'exdos-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'type' => 'icon',
				],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Image', 'exdos-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'type' => 'image',
				],
			]
		);


		

		$repeater->add_control(
			'header',
			[
				'label' => __( 'Header', 'exdos-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Item' , 'exdos-addons' ),
				'placeholder' => __( 'List Item' , 'exdos-addons' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => __( 'Description', 'exdos-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'This is a description for the list item.' , 'exdos-addons' ),
				'placeholder' => __( 'This is a description for the list item.' , 'exdos-addons' ),
			]
		);

		$this->add_control(
			'icon_list',
			[
				'label' => __( 'Icon List' , 'exdos-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'icon' => [
							'value' => 'fas fa-star',
							'library' => 'fa-solid',
						],
						'header' => __( 'List Item 1' , 'exdos-addons' ),
						'description' => __( 'This is a description for the list item 1.' , 'exdos-addons' ),
					],
					[
						'icon' => [
							'value' => 'fas fa-star',
							'library' => 'fa-solid',
						],
						'header' => __( 'List Item 2' , 'exdos-addons' ),
						'description' => __( 'This is a description for the list item 2.' , 'exdos-addons' ),
					],
				],
				'title_field' => '{{{ header }}}',
			]
		);
		

		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_icon_list();
		// $this->register_style_tab_controls();
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


		$this->add_responsive_control(
			'content_alignment',
			[
				'label' => __('Alignment', 'exdos-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'exdos-addons'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'exdos-addons'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __('Right', 'exdos-addons'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .tp-contact-info.mb-30.wow.tpFadeInUp' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'max_width',
			[
				'label' => __('Max Width', 'exdos-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tp-contact-info.mb-30.wow.tpFadeInUp' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'max_height',
			[
				'label' => __('Max Height', 'exdos-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tp-contact-info.mb-30.wow.tpFadeInUp' => 'max-height: {{SIZE}}{{UNIT}};',
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


<?php foreach ($settings['icon_list'] as $key => $value) : ?>
<div class="d-flex mb-25">
    <?php if (!empty($value['icon']['value'])): ?>
    <div class="tp-about-feature-icon mr-25">
        <span><i class="<?php echo esc_attr($value['icon']['value']); ?>"></i></span>
    </div>
    <?php endif; ?>
    <?php if (!empty($value['image']['url'])): ?>
    <div class="tp-about-feature-icon mr-25">
        <span><img src="<?php echo esc_attr($value['image']['url']); ?>"
                alt="<?php echo esc_attr($value['image']['alt']); ?>"></span>
    </div>
    <?php endif; ?>
    <div class="tp-about-feature-content">
        <?php if (!empty($value['header'])): ?>
        <h3 class="tp-about-feature tp-fs-30"><?php echo esc_html($value['header']); ?></h3>
        <?php endif; ?>
        <?php if (!empty($value['description'])): ?>
        <p><?php echo esc_html($value['description']); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php
	endforeach;

	}
}